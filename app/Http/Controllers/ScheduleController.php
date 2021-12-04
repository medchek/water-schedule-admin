<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Town;
use App\Services\ScheduleService;
use Exception;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response("ok", 204);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $scheduleServices = new ScheduleService();
            // this will throw an exception when encountring an error
            $models = $scheduleServices->prepareScheduleModels($request->all());

            $responseData = [];

            foreach ($models as $targetSchedule => $model) {
                $responseData[$targetSchedule] = new ScheduleResource($model);
                $model->save();
            }

            return response()->json($responseData, 200);
        } catch (Exception $e) {
            return response($e->getMessage(), 406);
        }
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
                return response('invalid town', 404);
            };

            $scheduleServices = new ScheduleService;
            $currentWeekScheduleCode =  $scheduleServices->getScheduleCode($town_code);
            $nextWeekScheduleCode = $scheduleServices->getScheduleCode($town_code, true);

            $currentWeekSchedule = Schedule::where('code', $currentWeekScheduleCode)->first();
            $nextWeekSchedule = Schedule::where('code', $nextWeekScheduleCode)->first();

            $responseData = [
                "current" => isset($currentWeekSchedule) ? new ScheduleResource($currentWeekSchedule) : null,
                "next" => isset($nextWeekSchedule) ? new ScheduleResource($nextWeekSchedule) : null
            ];

            return response()->json($responseData, 200);
        } else {
            return response("unexpected request", 400);
        }
    }

    /**
     * Returns the publicly available schedule resource
     * @param int $town_code  the town code
     * @param bool $next whether the method returns the current week or next week schedule
     */
    private function getPublicWeekSchedule($town_code, $next = false)
    {
        $scheduleServices = new ScheduleService;
        $schedule_code = $next ? $scheduleServices->getScheduleCode($town_code, true) : $scheduleServices->getScheduleCode($town_code);

        $schedule = Schedule::where('code', $schedule_code)->first();

        if ($schedule !== null) {

            return response(new ScheduleResource($schedule), 200);
            //  	}
        } else {
            return response("schedule not found", 404);
        }
    }

    public function getCurrentWeekSchedule($town_code)
    {
        return $this->getPublicWeekSchedule($town_code);
    }
    public function getNextWeekSchedule($town_code)
    {
        return $this->getPublicWeekSchedule($town_code, true);
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

    private function clg($message)
    {
        Log::channel("stderr")->debug($message);
    }
}
