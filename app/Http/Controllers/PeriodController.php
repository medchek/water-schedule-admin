<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeriodResource;
use App\Models\Period;
use Exception;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Period::all(), 200);
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
            'year' => 'required|unique:periods|digits:4',
            'week_number' => 'bail|required|digits_between:1,53',
            'week_start' => 'bail|required|date|before:week_end',
            'week_end' => 'bail|required|date|after:week_start',
            'town_id' => 'bail|required|integer|exists:App\Models\Town,id'
        ]);


        if ($validator->fails()) {
            return response($validator->errors()->toJson(), 401);
        }
        try {
            // $period = new Period();

            // $period->year = $request->year;
            // $period->week_start = $request->week_start;
            // $period->week_end = $request->week_end;
            // $period->town_id = $request->town_id;


            $period = Period::create($request->all());

            return response(new PeriodResource($period), 201);
        } catch (Exception $e) {
            report($e);
            return;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        //
    }
}
