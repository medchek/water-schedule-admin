<?php

namespace App\Services;

use App\Models\Town;
use Error;

class TownService
{
  private function addZeroToSingleDigitNumber(int $n): string
  {
    return $n < 10 ? "0" . $n : (string) $n;
  }
  /**
   * Generates the code of the town based on the wilayaCode and townCode
   * @param int $wilayaCode the wilaya code
   * @param int $townCode the town code
   * @return int the generated town code
   */
  public function generateTownCode(int $wilayaCode, int $townCode)
  {
    return intval($wilayaCode . 0 . $this->addZeroToSingleDigitNumber($townCode));;
  }

  private function checkIfTownNameExist(string $name, int $wilayaId)
  {
    return Town::where("wilaya_id", $wilayaId)->where("name", $name)->first() !== null;
  }

  private function checkIfArabicTownNameExist(string $arName, int $wilayaId)
  {
    // dd(Town::where("wilaya_id", $wilaya_id)->where("ar_name", $arName)->first());
    return Town::where("wilaya_id", $wilayaId)->where("ar_name", $arName)->first() !== null;
  }

  private function checkIfEitherTownNamesExist(string $name, string $arName, int $wilayaId)
  {
    return Town::where("wilaya_id", $wilayaId)->where("name", $name)->orWhere("ar_name", $arName)->first() !== null;
  }

  /**
   * Check if the town with the given code exist*
   * @return bool true if the town is present, false otherwise
   */
  public function checkTownCodeExistence(int $townCode)
  {
    return Town::where("code", $townCode)->first() !== null;
  }

  /**
   * Check if the given names exist in the the database 
   */
  public function checkTownExistence(string $name, string $arName, int $wilayaId)
  {
    if (!isset($wilayaId) || !is_numeric($wilayaId) || $wilayaId <= 0) {
      throw new Error("Invalid wilaya id");
    }

    if (isset($name) && !isset($arName)) {
      // if name is given an not arName
      return $this->checkIfTownNameExist($name, $wilayaId);
    } else
      // if arName is given an not name
      if (isset($arName) && !isset($name)) {
        return $this->checkIfArabicTownNameExist($arName, $wilayaId);
      } else {
        // if both names are given
        return $this->checkIfEitherTownNamesExist($name, $arName, $wilayaId);
      }
  }
}
