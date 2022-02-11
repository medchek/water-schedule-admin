<?php

namespace App\Http\Controllers;

use App\Http\Resources\WilayaResource;
use App\Models\Wilaya;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Response;

class WilayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $wilayas = Cache::rememberForever("wilayas", function () {
                return Wilaya::all();
            });
            return response()->json(WilayaResource::collection($wilayas), 200);
        } catch (Exception $_) {
            return response("error while getting data", 503);
        }
    }

    /**
     * Returns only the wilayas that have towns
     */
    public function getPublicWilayas()
    {
        try {

            $wilayas = DB::table('wilayas')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('towns')
                        ->whereColumn('towns.wilaya_id', 'wilayas.id');
                })
                ->get();
            return response(WilayaResource::collection($wilayas), 200);
        } catch (Exception $_) {
            return response("error while getting data", 503);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validationRules = [
            'name' => 'required|max:100|unique:wilayas',
            'ar_name' => 'nullable|max:100|unique:wilayas',
            'code' => 'bail|numeric|unique:wilayas|digits_between:1,2400000',
        ];

        $validator = validator($request->all(), $validationRules, [
            'unique' => 'This value already exists'
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->toJson(), 400);
        } else {

            $wilaya = new Wilaya;

            $wilaya->name = $request->name;
            $wilaya->ar_name = $request->ar_name ?? null;
            $wilaya->code = $request->code;


            $wilaya->save();

            return response($validator->validated(), 201);
        }
    }

    /**
     * Display a single wilaya entry
     *
     * @param  int  $wilaya_code
     * @return \Illuminate\Http\Response
     */
    public function show($wilaya_code)
    {
        if (isset($wilaya_code) && is_numeric($wilaya_code) && $wilaya_code > 0) {
            return Wilaya::where('code', $wilaya_code)->firstOrFail();
        }
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
