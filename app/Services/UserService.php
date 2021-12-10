<?php

namespace App\Services;

use App\Http\Resources\UserSettingsResource;
use App\Models\Town;
use App\Models\User;
use App\Models\UserSetting;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserService
{
  /**
   * Updates the user password
   */
  public function resetUserPassword(array $data): Response
  {
    $validator = Validator::make(
      $data,
      [
        // "user_id" => "required|integer|exists:App\Models\User,id",
        "current_password" => "bail|required|current_password",
        // "new_password" => "bail|required|confirmed|different:current_password|min:8|regex:/(?=.*[a-zA-Z])(?=.*[0-9])/", // must contain both numbers and letters
        "new_password" => ["bail", "required", "confirmed", "different:current_password", Password::min(8)->letters()->numbers()->uncompromised()]
      ],
      // custom error messages
      // [
      //   "current_password" => "Votre mot de passe actuel est incorrect",
      //   "new_password" => "Le nouveau mot de passe doit contenir des chiffres et des letters",
      //   "new_password.confirmed" => "Vous devez confirmer le nouveau mot de passe"
      // ]
      [
        "new_password.password.uncompromised" => "test"
      ]
      //
    );
    // get the failed rules


    if ($validator->fails()) {
      $failedRules = $validator->failed();
      // check if the leaked message exists in the validation error message for the new password
      $isPasswordLeaked = in_array("The given new password has appeared in a data leak. Please choose a different new password.", $validator->errors()->get("new_password"));
      // if the current password is incorrect send a 403 (forbidden)

      if (isset($failedRules["current_password"])) {
        return response("invalid password", 403);
      } else {

        // intial message
        $errorMessage = "invalid data";
        if ($isPasswordLeaked) {
          // if the error was about a compromised password
          $errorMessage = "leaked password";
        }
        // if the new password is incorrect send a 400 (bad request )status
        return response($errorMessage, 400);
      }
    }
    try {

      // if everything is ok, update the user password
      $user = User::find(Auth::id());

      $user->password = Hash::make($data["new_password"]);
      $user->save();

      // everthing is ok
      return response("", 200);
    } catch (Exception $err) {
      Log::channel("stderr")->error($err);
      return response("server error", 500);
    }
  }
  /**
   * Valides the user app settings that should contain the wilaya_code and town_code that the user wishes to use by default
   * @return string if error is encountered while validating, returns a string containing the error message. If the validation succeeds, returns an empty string 
   */
  private function validateUserAppSettingsData(array $data): string
  {
    // firs validate the wilaya_code
    $wilayCodeValidator = Validator::make($data, [
      "wilaya_code" => "bail|required|filled|numeric|digits_between:1,58|exists:App\Models\Wilaya,id",
    ]);
    if ($wilayCodeValidator->fails()) {
      return "invalid wilaya_code";
    }
    // wilaya_code will now be correct
    $wilayaCode = $data["wilaya_code"];
    // validate the town_code now

    $townCodeValidator = Validator::make($data, [
      "town_code" =>  ["required", "filled", "numeric", "starts_with:" . $wilayaCode],
    ]);

    if ($townCodeValidator->fails()) {
      return "invalid town_code";
    }
    // wilaya_code will now be correct
    $townCode = $data["town_code"];
    // check if town belongs to the wilaya
    $town = Town::where("code", $townCode)->first();
    if (!isset($town)) {
      return "town does not exist";
    }
    // town exist now check if the town model wilaya_id matches the requested wilaya_code

    if ($town->wilaya_id !== $wilayaCode) {
      return "town does not belong to specified wilaya";
    }

    // if everthing was ok return an empty string
    return "";
  }
  /**
   * STORE REQUEST HANDLING
   */
  public function storeUserAppSettings(array $data): Response
  {
    $currentUser = User::find(Auth::id());
    $doUserSettingsExist = $currentUser->settings;
    // if the settings are already set, a post request is forbidden
    if (isset($doUserSettingsExist)) {
      return response("settings already exist, cannot store", 403);
    }



    $errorMessage = $this->validateUserAppSettingsData($data);
    if ($errorMessage !== "") {
      return response($errorMessage, 400);
    }


    // insert the user settings
    $userSettings = new UserSetting();

    $userSettings->wilaya_code = $data["wilaya_code"];
    $userSettings->town_code = $data["town_code"];
    $userSettings->user_id = Auth::id();

    $userSettings->save();

    // doesTownCodeBelongToWilaya
    return response(new UserSettingsResource($userSettings), 201);
  }


  /**
   * PATCH REQUEST HANDLING
   */
  public function updateUserAppSettings(array $data): Response
  {
    $currentUser = User::find(Auth::id());
    $userSettings = $currentUser->settings;



    // if the settings doe not exist, a patch request is forbidden
    if (!isset($userSettings)) {
      return response("settings don't exist, cannot patch", 403);
    }

    // quickly check if the values are the same and prevent any further checks that would require database access

    $initialValidation = Validator::make($data, [
      "wilaya_code" => ["required", "filled", "numeric", "digits_between:1,58"],
      "town_code" => ["required", "filled", "numeric", "min:1"]
    ]);

    if ($initialValidation->fails()) {
      return response("invalid data", 400);
    }

    $wilayaCode = $data["wilaya_code"];
    $townCode = $data["town_code"];

    // if no data should be changed cancel further validation
    if ($wilayaCode === $userSettings->wilaya_code && $townCode === $userSettings->town_code) {
      return response("nothing to change", 422);
    }

    // if the settings are not identical, thus being able to be patched, check for validity
    $errorMessage = $this->validateUserAppSettingsData($data);
    if ($errorMessage !== "") {
      return response($errorMessage, 400);
    }
    // only update data when it's different (patch)
    if ($userSettings->wilaya_code !== $wilayaCode) $userSettings->wilaya_code = $wilayaCode;
    if ($userSettings->town_code !== $townCode) $userSettings->town_code = $townCode;

    $userSettings->save();
    return response(new UserSettingsResource($userSettings), 200);
  }
}
