<?php

namespace App\Services;

use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Error;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ScheduleService
{

  private function getCurrentDate()
  {
    // $date = new Carbon(new DateTime('2021-04-14'), new DateTimeZone('Africa/Algiers'));
    $date = CarbonImmutable::now()->timezone('Africa/Algiers')->locale('en_DZ');
    $date->startOfWeek(Carbon::SUNDAY);
    return $date;
  }

  /**
   * Get the number of the current week
   */
  public function getCurrentWeekNumber()
  {
    return $this->getCurrentDate()->isoWeek;
  }
  /**
   * get the number of next week
   */
  public function getNextWeekNumber()
  {
    return $this->getCurrentDate()->addWeek()->isoWeek;
  }
  /** get the number of week of two weeks from now*/
  public function getNextWeekNumberOfNextWeek()
  {
    return $this->getCurrentDate()->addWeeks(2)->isoWeek;
  }


  /**
   * get the year of the current week
   */
  public function getCurrentWeekYear()
  {
    return $this->getCurrentDate()->year;
  }
  /**
   * get the year of next week
   */
  public function getNextWeekYear()
  {
    return $this->getCurrentDate()->addWeek()->year;
  }

  /**
   * Get the date on which the current week starts
   */
  public function getCurrentWeekStartDate()
  {
    return $this->getCurrentDate()->startOfWeek()->format("d-m-Y");
  }
  /**
   * Get the date on which the current week ends
   */
  public function getCurrentWeekEndDate()
  {
    return $this->getCurrentDate()->endOfWeek()->format("d-m-Y");
  }
  /**
   * Get the date on which the next week starts
   */
  public function getNextWeekStartDate()
  {
    return $this->getCurrentDate()->addWeek()->startOfWeek()->format("d-m-Y");
  }
  /**
   * Get the date on which the next week ends
   */
  public function getNextWeekEndDate()
  {
    return $this->getCurrentDate()->addWeek()->endOfWeek()->format("d-m-Y");
  }

  /**
   * Generates the schedule code based on the given town code
   * - the format of the code is : {town_code}{week_number}{year}
   * @param int $town_code The town code for which to generate the schedule code
   * @param boolean $next Whether to generate the code for next week as opposed to the current one
   * @return int the schedule code
   */
  public function getScheduleCode($town_code, $next = false)
  {
    $scheduleServices = new ScheduleService;
    $week_number =  !$next ? $scheduleServices->getCurrentWeekNumber() : $scheduleServices->getNextWeekNumber();
    $year = !$next ? $scheduleServices->getCurrentWeekYear() : $scheduleServices->getNextWeekYear();
    return intval($town_code . $week_number . $year);
  }
  // -------------------------------------------------------------------------------
  // SCHEDULE VALIDATION
  /**
   * Checks if the timeA values are greater than timeB
   * @return boolean true if timeA time is later than timeB
   */
  public function isTimeAGreaterThanB($timeA, $timeB)
  {
    $aHours = $timeA["hours"];
    $aMins = $timeA["minutes"];
    $bHours = $timeB["hours"];
    $bMins = $timeB["minutes"];

    if (!is_numeric($aHours) || !is_numeric($aMins) || !is_numeric($bHours) || !is_numeric($bMins)) {
      throw new Error("invalid argument type");
    };

    if ($aHours > $bHours) return true;
    if ($aHours === $bHours) {
      if ($aMins >  $bMins) return true;
    }
    return false;
  }

  /**
   * Checks if the hours & mintues are both null
   * (*does not check for time validity*)
   * @return boolean true if time is empty, false otherwise
   */
  private function isTimeEmpty($time)
  {
    return is_null($time["hours"]) && is_null($time["minutes"]);
  }

  /**
   * Checks if the period times are not empty
   * does not check for structure validity
   * @return boolean true if period is empty, false otherwise
   */
  private function isPeriodEmpty($period)
  {
    if ($this->isTimeEmpty($period["from"]) && $this->isTimeEmpty($period["to"])) return true;
  }

  /**
   * Validates a time that should contain an hours and mintues values
   * @param array $time an associative array containing the hours and minutes values
   * @return bool true if the time is valid, false if not
   */
  public function validateTime($time)
  {
    if (is_array($time) && count($time) === 2) {
      if (!array_key_exists("hours", $time) || !array_key_exists("minutes", $time)) {
        return false;
      }

      $hours = $time["hours"];
      $minutes = $time["minutes"];

      if (is_null($hours) && is_null($minutes)) {
        return true;
      }

      if (!is_numeric($hours) || !is_numeric($minutes)) {
        return false;
      }
      if ($hours < 0 || $hours > 23) {
        return false;
      }
      if ($minutes < 0 || $minutes > 59) {
        return false;
      }
      return true;
    } else {
      return false;
    }
  }
  /**
   * Validates a period that should contain a from and to time values
   * @param array $period the period associate array containing from and to time values
   */
  public function validatePeriod($period)
  {
    if (is_array($period) && count(($period)) === 2) {

      if (!array_key_exists("from", $period) && !array_key_exists("to", $period)) {
        return false;
      }
      $from = $period["from"];
      $to = $period["to"];


      // check if time is valid
      if (!$this->validateTime($from)) return false;

      if (!$this->validateTime($to)) return false;
      // if both from & to are emty, validate them as true; 
      if ($this->isPeriodEmpty($period)) return true;
      // if the method did not exit then all values must be set

      // check if to is greater than from as it should be
      return $this->isTimeAGreaterThanB($to, $from);

      return true;
    } else {
      return false;
    }
  }
  /**
   * Validates multiple segments of periods in a day
   * @param array $periods an array containing a list of periods of a day
   */
  public function validateDay($periods)
  {
    $count = count($periods);
    // only two periods are allowed for now

    if (is_array($periods) &&  $count >= 1 && $count <= 2) {
      foreach ($periods as $index => $period) {
        if (!$this->validatePeriod($period)) return false;
        // after validating the current period
        // and when the index is greater than 0, compare the time of current period segement to the previous one
        if ($index > 0) {
          $previousPeriod = $periods[$index - 1];
          $previousTo = $previousPeriod["to"];
          $currentFrom = $period["from"];

          if ($this->isTimeAGreaterThanB($previousTo, $currentFrom)) return false;
        }
      }
      return true;
    } else {
      return false;
    }
  }
  /**
   * Validates an entier week schedule
   * @param array $schedule an array containing all the days of the week with their respective time periods
   * @return bool true if no error is encountered, false as soon as an error is encountered in any of the verifications
   */
  public function validateSchedule($schedule)
  {
    if (is_null($schedule)) return true;
    // if the schedule is not empty
    if (is_array($schedule) && count($schedule) === 7) {
      // if it does not includes any of the necessary keys (days of the week), return false
      if (!array_key_exists("sunday", $schedule) || !array_key_exists("monday", $schedule) || !array_key_exists("tuesday", $schedule) || !array_key_exists("wednesday", $schedule) || !array_key_exists("thursday", $schedule) || !array_key_exists("friday", $schedule) || !array_key_exists("saturday", $schedule)) {
        return false;
      }

      foreach ($schedule as $_ => $periods) {
        if (!$this->validateDay($periods)) return false;
      }
      // if everything is correct;
      return true;
    } else {
      return false;
    }
  }

  /**
   * Validates a single schedule from the user request. (disregarding if it's current or next)
   */
  public function validateSingleScheduleRequest(array $schedule)
  {
    if (is_array($schedule)) {
      if (!array_key_exists("method", $schedule) || !array_key_exists("data", $schedule)) return false;
      $method = $schedule["method"];
      // verify the method validity
      if (!is_string($method) || ($method !== "patch" && $method !== "post")) return false;

      // if the rquested method is patch
      if ($method === "patch") {
        // check if the scheduleCode is present
        if (!array_key_exists("scheduleCode", $schedule) || !is_numeric($schedule["scheduleCode"])) return false;
      }

      $data = $schedule["data"];
      // lastrly, verify data integrity 
      return $this->validateSchedule($data);
    }
    return false;
  }
  /**
   * Validate the full client request
   * @return bool false upon the encoutner of any error that does not match the entended structure, true if everything is valid
   */
  public function validateClientRequest(array $request): bool
  {
    if (!array_key_exists("townCode", $request)) return false;
    // at least one schedule is required for any action to be taken by the server
    if (!array_key_exists("next", $request) &&  !array_key_exists("current", $request)) return false;

    $townCode = $request["townCode"];
    if (!is_numeric($townCode)) return false;

    // checks for when the current schedule is requested
    if (array_key_exists("current", $request)) {
      // validate it
      if (!$this->validateSingleScheduleRequest($request["current"])) return false;
    }
    if (array_key_exists("next", $request)) {
      // validate it
      if (!$this->validateSingleScheduleRequest($request["next"])) return false;
    }

    return true;
  }


  /**
   * Prepares a new mode to be inserted into the database (does not save the model)
   * @param int $townCode the town code that the schedule belongs to
   * @param array|null $scheduleData the actual schedule data
   * @param bool $isNext the target schedule so that the function generates week number and year of the next week
   * @return Schedule schedule model instance intended to be inserted into the database
   */
  private function preparePostModel(int $townCode,  /* array | null */ $scheduleData, bool $isNext = false): Schedule
  {

    $weekNumber =  !$isNext ? $this->getCurrentWeekNumber() : $this->getNextWeekNumber();
    $year = !$isNext ? $this->getCurrentWeekYear() : $this->getNextWeekYear();

    // generate the schedule code
    $scheduleCode = $this->getScheduleCode($townCode, $isNext);

    $alreadyExist = Schedule::where('code', $scheduleCode)->first();

    if ($alreadyExist) {
      throw new Exception("Entry already exists");
    }

    $schedule = new Schedule;

    $schedule->town_code = $townCode;
    $schedule->code = $scheduleCode;
    $schedule->year = $year;
    $schedule->week_number = $weekNumber;
    // only add the next week number if the target schedule is the current one

    $schedule->next_week_number = !$isNext ? $this->getNextWeekNumber() : $this->getNextWeekNumberOfNextWeek();

    // prevent converting null to 'null' string (from json_encode) by returning null when the value is actually null
    $schedule->schedule = json_encode($scheduleData);
    $schedule->created_by = Auth::id();

    return $schedule;
  }
  /**
   * Prepares an existing database record to be updated (does not save the model)
   * @param int $scheduleCode the schedule code to be updated
   * @param array|null $schedule the actual schedule data
   * @return Schedule schedule model instance to be updated
   */
  private function preparePatchModel(int $scheduleCode, array $scheduleData): Schedule
  {
    $schedule = Schedule::where('code', $scheduleCode)->first();

    if (!$schedule) {
      throw new Exception("Cannot update, entry does not exist");
    }
    // check if the voth the schedule data values are equal
    if (json_decode($schedule->schedule) === $scheduleData) {
      throw new Exception("Cannot update, values are identical");
    }
    // encode the json to save it into the database
    $schedule->schedule = json_encode($scheduleData);

    $schedule->modified_by = Auth::id();
    return $schedule;
  }

  /**
   * prepares the schjedule model for insertion or updating based on the request methods
   * @param array $request the request array
   * @return array an array containing a the prepared models
   */
  public function prepareScheduleModels(array $request): array
  {
    $modelsArray = [];
    // the request should be validated by now
    if ($this->validateClientRequest($request)) {
      // current
      if (array_key_exists("current", $request)) {

        // target schedule
        $currentSchedule = $request["current"];
        // the actual schedule data
        $scheduleData = $currentSchedule["data"];
        // the requested method, post or patch
        $method = $currentSchedule["method"];
        // initialize the model variable
        $currentScheduleModel = null;

        if ($method === "patch") {
          // get the schedule code
          $scheduleCode = $currentSchedule["scheduleCode"];
          // get the model as a patch request
          $currentScheduleModel = $this->preparePatchModel($scheduleCode, $scheduleData);
        } else {
          // get the town code
          $townCode = $request["townCode"];
          // get the model as a post request
          $currentScheduleModel = $this->preparePostModel($townCode, $scheduleData, false);
        }
        $modelsArray["current"] = $currentScheduleModel;
      }
      // next
      // same steps to be followed as above
      // TODO: repetition, refactor to a function
      if (array_key_exists("next", $request)) {
        $nextSchedule = $request["next"];
        $scheduleData = $nextSchedule["data"];
        $method = $nextSchedule["method"];
        $nextScheduleModel = null;

        if ($method === "patch") {
          $scheduleCode = $nextSchedule["scheduleCode"];
          $nextScheduleModel = $this->preparePatchModel($scheduleCode, $scheduleData);
        } else {
          $townCode = $request["townCode"];
          $nextScheduleModel = $this->preparePostModel($townCode, $scheduleData, true);
        }
        // array_push($modelsArray, $nextScheduleModel);
        $modelsArray["next"] = $nextScheduleModel;
      }

      return $modelsArray;
    } else {
      throw new Exception("invalid request");
    }
  } // prepareScheduleModels

  /**
   * Deletes all previously stored schedule entries related to the target town that matches the $townCode. 
   * Deletion is based on both the current week number and current week year
   * @param int $townCode the target town code 
   */
  public function deleteOldSchedules(int $townCode)
  {
    // used to delete any schedule that is prior to the current week & year
    $currentWeekNumber =  $this->getCurrentWeekNumber();
    $currentWeekYear = $this->getCurrentWeekYear();
    // remove any old entries that belong to the same town
    // delete reconds that belong to previous week(s) of the same or previous year(s)
    Log::channel("stderr")->debug("deleting old schedules");
    try {

      Schedule::where("town_code", $townCode)->where("year", "<", $currentWeekYear)->orWhere(function ($query) use ($currentWeekNumber, $currentWeekYear) {
        $query->where("week_number", "<", $currentWeekNumber)
          ->where("year", '<=', $currentWeekYear);
      })->chunk(
        50,
        function ($schedules) {
          foreach ($schedules as $schedule) {
            $schedule->delete();
          }
        }
      );
    } catch (Exception $e) {
      Log::channel("stderr")->error($e->getMessage());
    }
  }
}
