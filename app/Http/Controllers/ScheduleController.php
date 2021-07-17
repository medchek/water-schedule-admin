<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'sunday_from' => 'nullable|date_format:H:i',
            'sunday_to' => 'nullable|date_format:H:i',
            'monday_from' => 'nullable|date_format:H:i',
            'monday_to' => 'nullable|date_format:H:i',
            'tuesday_from' => 'nullable|date_format:H:i',
            'tuesday_to' => 'nullable|date_format:H:i',
            'wednesday_from' => 'nullable|date_format:H:i',
            'wednesday_to' => 'nullable|date_format:H:i',
            'thursday_from' => 'nullable|date_format:H:i',
            'thursday_to' => 'nullable|date_format:H:i',
            'friday_from' => 'nullable|date_format:H:i',
            'friday_to' => 'nullable|date_format:H:i',
            'saturday_from' => 'nullable|date_format:H:i',
            'saturday_to' => 'nullable|date_format:H:i',
            'period_id' => 'bail|required|integer|exists:App\Models\Period,id'
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->toJson(), 401);
        }

        $schedule = Schedule::create($request->all());

        return new ScheduleResource($schedule);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int'  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
