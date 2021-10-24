<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Town;
use App\Models\Wilaya;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use Carbon\CarbonImmutable;
use Carbon\Carbon;

// use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response("ok");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request
        // Log::channel("stderr")->debug($request);
        $wilayaCode = $request->wilayaCode;
        $townCode = $request->townCode;

        // Log::channel("stderr")->debug("[OK] All variables are set");

        // check wilaya existance
        if (!isset($wilayaCode) || !is_numeric($wilayaCode) || $wilayaCode <= 0) {
            return response("invalid wilyaCode", 406);
        }

        $doesWilayaExist = Wilaya::where('code', $wilayaCode)->count();
        if (!$doesWilayaExist) {
            return response("wilya not found", 406);
        }
        // Log::channel("stderr")->debug("[OK] WilayaCode verification passed");


        if (!isset($townCode) || !is_numeric($townCode) || $townCode <= 0) {
            return response("invalid townCode", 406);
        }
        $doesTownExist = Town::where('code', $townCode)->count();
        if (!$doesTownExist) {
            return response("town not found", 406);
        }
        // Log::channel("stderr")->debug("[OK] Town verification passed");


        // if ($current && $next) {

        try {
            $current = $request->current;
            $next = $request->next;

            $this->validateSchedule($current, "current");
            $this->validateSchedule($next, "next");
            // if no errors are registerd, everything is ok
            $data = $request->all();
            $data["created_by"] = Auth::id();

            $currentWeekSchedule = $this->prepareScheduleModel($request, "current");
            $nextWeekSchedule = $this->prepareScheduleModel($request, "next");

            Log::channel("stderr")->debug("[OK] All variables are set, MODELS SET");

            $response_data = [];
            if ($currentWeekSchedule) {
                $currentWeekSchedule->save();
                $response_data["current"] =  new ScheduleResource($currentWeekSchedule);
            }
            if ($nextWeekSchedule) {
                $nextWeekSchedule->save();
                $response_data["next"] =  new ScheduleResource($nextWeekSchedule);
            }

            $this->clg("CLGING THE RESPONSE DATA");
            $this->clg($response_data);
            return response()->json($response_data, 201);
            // return response($currentScheduleCollection, 201);
        } catch (Exception $e) {
            return response($e->getMessage(), 406);
        }
        // } else {
        //     Log::channel("stderr")->debug("AN EXCPETION WAS THROWN AFTER validateSchedule()");
        //     return response("missing schedules", 406);
        // }



        // $schedule = Schedule::create($request->all());

        // return new ScheduleResource($schedule);
    }
    /**
     * Displays the water schedule for the current and next week
     *
     * @param  int  $town_code the id of the town
     * @param  int  $week_number the current week number
     * @return \Illuminate\Http\Response
     */
    public function show($town_code)
    {

        if (isset($town_code) && is_numeric($town_code)) {
            $town = Town::where('code', $town_code)->count();


            if ($town === 0) {
                return response()->json(['code' => 1, 'message' => 'invalid town'], 406);
            };
            $currentWeekSchedule = Schedule::where('town_code', $town_code)->where('week_number', $this->getCurrentWeekNumber())->where('year', $this->getCurrentYear())->first();
            $nextWeekSchedule = Schedule::where('town_code', $town_code)->where('week_number', $this->getNextWeekNumber())->where('year', $this->getNextWeekYear())->first();

            $responseData = [
                // "townCode" => $town_code,
                "current" => isset($currentWeekSchedule) ? new ScheduleResource($currentWeekSchedule) : null,
                "next" => isset($nextWeekSchedule) ? new ScheduleResource($nextWeekSchedule) : null
            ];

            return response()->json($responseData, 201);
        } else {
            return response("unexpected request", 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $schedule_code the schedule id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $schedule_code)
    {
        $schedule = Schedule::where('code', $schedule_code)->first();
        if (!$schedule) {
            return response('schedule not found', 406);
        }

        return response("update ok", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Validates a schedule according to the expected structure. Throws an error when encountering an error
     */
    private function validateSchedule($schedule, string $type)
    {
        // the structure should be
        //   'skip' => false,
        //   'update' => true,
        //   'data' =>

        if (!isset($schedule)) {
            throw new Exception("[{$type}] schedule was not found");
        } else {
            if (!isset($schedule["skip"]) || !is_bool($schedule["skip"])) {
                throw new Exception("[{$type}] invalid schedule data, expected skip value to be set & of bool type");
            }

            if (!isset($schedule["update"]) || !is_bool($schedule["update"])) {
                throw new Exception("[{$type}] invalid schedule data, expected update value to be set & of bool type");
            } else {
                // if the update is set to true, the schedule code must be sent along
                if ($schedule["update"] && (!isset($schedule["scheduleCode"]) || !is_numeric($schedule["scheduleCode"]))) {
                    throw new Exception("[{$type}] update requested but schedule code was missing");
                }
            }

            // null signifies that the water is unavailable through the week, hence allowing it as a valid value
            if ($schedule["data"] !== null) {

                $sheduleData = $schedule["data"];

                if (!is_array($sheduleData)) {
                    throw new Exception("[{$type}] invalid schedule data type, expected array");
                }

                if (count($sheduleData) !== 7) {
                    throw new Exception("[{$type}] invalid schedule length");
                }
                foreach ($sheduleData as $day => $periodArr) {
                    $allowedDays = ["saturday", "sunday", "monday", "tuesday", "wednesday", "thursday", "friday"];
                    // allow only the authorized days as object keys
                    if (!in_array($day, $allowedDays)) {
                        throw new Exception("Unexpected object key {$day}");
                    }
                    $arrCount = count($periodArr);

                    if (!is_array($periodArr) || $arrCount <= 0) {
                        throw new Exception("[{$type}] invalid structure for period:{$day}");
                    }
                    // these values should be stored as they are in the db (as json)
                    // but the input must be checked for 
                    $index = 0;
                    foreach ($periodArr as $period) {
                        // $from = $period["from"];
                        // $to = $period["to"];
                        try {
                            // pass the previous segment values to the function for inspection as well
                            // Log::channel("stderr")->debug("verifying {$type} array in schedule indexed at ${index} day:[{$day}]");
                            $previousPeriod = $index > 0 ? $periodArr[$index] : null;
                            $this->compareTimes($period, $previousPeriod);
                            $index++;
                        } catch (Exception $e) {
                            // return response(, 406);
                            throw new Exception("[{$type}] {$e->getMessage()}");
                        }
                    }
                }
            }
        }

        Log::channel("stderr")->debug("Verification successfully completed");
    }

    private function compareTimes($period, $previousPeriod = null)
    {
        $from_h = $period["from"]["hours"];
        $from_m = $period["from"]["minutes"];
        $to_h = $period["to"]["hours"];
        $to_m = $period["to"]["minutes"];

        if ($from_h !== null && $to_h !== null) {
            if (!is_numeric($from_h) || !is_numeric($to_h)) {
                throw new Exception("from and to hours values have unexpected type");
            }
            if ($from_h < 0 || $from_h > 23 || $to_h < 0 || $to_h > 23 || $from_h > $to_h) {
                throw new Exception("from and to hours values have invalid values");
            }

            if ($previousPeriod !== null) {
                if ($from_h > $previousPeriod["to"]["hours"]) {
                    throw new Exception("'to' hours value of previous segement cannot be greater than the 'from' mintues value of current segement");
                }
                // if they are equal, check for the mintues
                if ($from_h === $previousPeriod["to"]["hours"]) {
                    if ($from_m > $previousPeriod["to"]["minutes"]) {
                        throw new Exception("'to' mintues value of previous segement cannot be greater than the 'from' mintues value of current segement when hours value are equal in both");
                    }
                }
            }

            // else {
            //     // if the previous period is null, the next segement cannot be set
            //     if (isset($from_h)) {
            //         throw new Exception("a new segement cannot be set when the 'to' value of the previous segement is null");
            //     }
            // }

            // only check for minutes values if the both from & to values are equal
            if ($from_h === $to_h) {
                // checking from minutes
                if ($from_m !== null) {
                    if (!is_numeric($from_m) || $from_m < 0 || $from_m > 59) {
                        throw new Exception("from minutes values are invalid");
                    }
                    if ($from_h === 23 && $from_m === 59) {
                        throw new Exception("from value cannot be 23:59");
                    }
                    if ($from_m > $to_m) {
                        throw new Exception("from value cannot be greater than to when the hours values are equal");
                    }
                }
                // checking to minutes
                if ($to_m !== null) {
                    if (!is_numeric($to_m) || $to_m < 0 || $to_m > 59) {
                        throw new Exception("to minutes values are invalid");
                    }
                    if ($to_h === 0 && $to_m === 0) {
                        throw new Exception("to value cannot be 00:00");
                    }
                    if ($to_m < $from_m) {
                        throw new Exception("to value cannot be less than from when the hours values are equal");
                    }
                }
            } else {
                // check for mintues value types only if both from/to hours values are not equal
                if ($from_m !== null) {
                    if (!is_numeric($from_m)) {
                        throw new Exception("from minutes values are type-invalid");
                    }
                }

                if ($to_m !== null) {
                    if (!is_numeric($to_m)) {
                        throw new Exception("to minutes values are type-invalid");
                    }
                }
            }
        } else {
            return true;
        }
    }
    /**
     * prepares a Schedule model instance for database insertion or update
     * @param request_data the request data associative array. (Must be fully verified prior to calling this method) 
     * @param target the target schedule either current or next
     * @return Schedule the schedule model with all the data prepared to be saved
     */
    private function prepareScheduleModel($request_data, string $target)
    {
        $this->clg("PREPARING [{$target}]");

        if (empty($target) || !is_string($target)) {
            if ($target != "current" || $target != "next") {
                throw new Exception("[prepareScheduleModel] missing or invalid target schedule value:{$target}");
            }
        }

        $skip = $request_data[$target]["skip"];
        if ($skip) return;


        $update = $request_data[$target]["update"];
        // UPDATING
        if ($update) {

            $schedule_code = $request_data[$target]["scheduleCode"];
            $schedule_to_update = Schedule::where('code', $schedule_code)->first();

            if (!$schedule_to_update) {
                throw new Exception("Cannot update, entry does not exist");
            }
            // encode the json to save it into the database
            $schedule_to_update->schedule = json_encode($request_data[$target]["data"]);
            $schedule_to_update->modified_by = Auth::id();
            return $schedule_to_update;
        } else {
            // INSERTING


            // if the action is not update then insert a new entry intothe database
            $week_number =  $target === 'current' ? $this->getCurrentWeekNumber() : $this->getNextWeekNumber();
            $year = $target === 'current' ? $this->getCurrentYear() : $this->getNextWeekYear();
            $this->clg("INSERTING YEAR [{$year}]");

            // generate the schedule code
            $schedule_code = intval($request_data->townCode . $week_number . $year);



            $alreadyExist = Schedule::where('code', $schedule_code)->first();

            if ($alreadyExist) {
                throw new Exception("Entry already exists");
            }

            $schedule = new Schedule;

            $schedule->code = $schedule_code;
            $schedule->year = $year;
            $schedule->week_number = $week_number;
            // only add the next week number if the target schedule is the current one
            if ($target === "current") {
                $schedule->next_week_number = $this->getNextWeekNumber();;
            }
            $schedule_program = $request_data[$target]["data"];
            // prevent converting null to 'null' string (from json_encode) by returning null when the value is actually null
            $schedule->schedule =  $schedule_program === null ? null :  json_encode($schedule_program);
            $schedule->created_by = Auth::id();
            $schedule->town_code = $request_data->townCode;

            return $schedule;
        }
    }

    private function getCurrentDate()
    {
        // $date = new Carbon(new DateTime('2021-04-14'), new DateTimeZone('Africa/Algiers'));
        $date = CarbonImmutable::now()->timezone('Africa/Algiers')->locale('en_DZ');
        $date->startOfWeek(Carbon::SUNDAY);
        return $date;
    }

    private function getCurrentWeekNumber()
    {
        return $this->getCurrentDate()->isoWeek;
    }
    private function getNextWeekNumber()
    {
        return $this->getCurrentDate()->addWeek()->isoWeek;
    }
    private function getCurrentYear()
    {
        return $this->getCurrentDate()->year;
    }
    private function getNextWeekYear()
    {
        return $this->getCurrentDate()->addWeek()->year;
    }

    private function clg($message)
    {
        Log::channel("stderr")->debug($message);
    }
}
