<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response("ok", 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = validator($request->all(), [
            'wilaya_id' => 'required|exists:App\Models\Wilaya,id',
            'name' => 'required|max:100|unique:towns',
            'ar_name' => 'nullable|max:100|unique:towns',
            'code' => 'bail|numeric|unique:towns|digits_between:1,2400000',
        ], [
            'wilaya_id.required' => 'You must specify a wilaya'
        ]);

        if ($validated->fails()) {
            return response($validated->errors(), 400);
        }

        // otherwise the request if valid

        $town = new Town;

        $town->wilaya_id = $request->wilaya_id;
        // $town->wilaya()->associate()
        $town->name = $request->name;
        $town->ar_name = $request->ar_name ?? null;
        $town->code = $request->code ?? null;

        $town->save();

        return response($town->fre, 201);
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
     * @param  int  $id
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
