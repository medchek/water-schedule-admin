<?php

namespace App\Http\Controllers;

use App\Http\Resources\TownResource;
use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Wilaya;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($wilaya_id)
    {
        return response("ok", 200);
    }

    /**
     * Display a listing of the resource by the given wilaya_id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByWilayaId($wilaya_id)
    {
        if (isset($wilaya_id) && is_numeric($wilaya_id) && $wilaya_id > 0) {

            $wilaya = Wilaya::find($wilaya_id);

            if ($wilaya) {
                $towns = $wilaya->towns()->get();
                // Log::channel("stderr")->debug($towns);
                return response(TownResource::collection($towns), 200);
            } else {
                return response('wilaya not found', 404);
            }
        }
    }

    /**
     * Display a listing of the resource by the given wilaya_id.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicGetByWilayaId($wilaya_id)
    {
        if (isset($wilaya_id) && is_numeric($wilaya_id) && $wilaya_id > 0) {
            try {

                $towns = Town::where('wilaya_id', $wilaya_id)->get();
                return response(TownResource::collection($towns), 200);
            } catch (Exception $err) {
                return response('could not find towns', 404);
            }
        } else {
            return response('invalid arguments', 400);
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
        try {
            // Log::channel("stderr")->debug($request);
            $validated = validator($request->all(), [
                'wilayaId' => 'required|digits_between:1,58|exists:App\Models\Wilaya,id',
                'name' => 'required|between:3,30|regex:/^[a-zàâçéèêëîïôûùüÿñæœ .\'-]+$/i',
                'arName' => 'nullable|between:3,30|regex:/^[ء-ي ]+$/iu',
                // 'arName' => 'nullable|between:3,30|regex:/^[\u0621-\u064A]+$/i/',
                // 'code' => 'bail|numeric|unique:towns|digits_between:1,2400000',
            ]);
            // [
            //     'wilayaId.required' => 'You must specify a wilaya'
            // ]

            if ($validated->fails()) {
                return response($validated->errors(), 400);
            }

            $wilaya_id = $request->wilayaId;
            $wilaya = Wilaya::find($wilaya_id);

            if (!$wilaya) {
                return response("invalid wilya, not found", 400);
            }

            // check if the wilaya already has a town with the same name
            $doesTownExists = null;
            if (isset($request->arName) && !empty($request->arName)) {
                // takes into account the arabic word as well
                $doesTownExists = Town::where('name', $request->name)->orWhere('ar_name', $request->arName)->where('wilaya_id', $request->wilayaId)->first();
            } else {
                $doesTownExists = Town::where('name', $request->name)->where('wilaya_id', $request->wilayaId)->first();
            }

            if ($doesTownExists) {
                return response("town with this name already exists", 422);
            }
            // prepare the town code for the next town to be added by incrementing the current count
            $town_code = $wilaya->towns()->count() + 1;



            $town = new Town();


            $town->wilaya_id = $wilaya_id;

            $town->name = strtolower($request->name);
            $town->ar_name = $request->arName ? strtolower($request->arName) : null;


            $town_code = intval($wilaya_id . 0 . ($town_code < 10 ? '0' . $town_code : $town_code));
            $town->code = $town_code;
            $town->protected = false; // so that the user cannot edit/delete it
            $town->added_by = Auth::id();

            Log::channel("stderr")->debug($town);

            $town->save();
            return response()->json(new TownResource($town), 201);
        } catch (Exception $e) {
            response($e->getMessage(), 503);
        }
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
        Log::channel("stderr")->debug("Patch request id => {$request->arName}");

        if (!isset($request->name) && !isset($request->arName)) {
            return;
        }
        $validated = validator($request->all(), [
            'name' => 'between:3,30|regex:/^[a-zàâçéèêëîïôûùüÿñæœ .\'-]+$/i',
            'arName' => 'between:3,30|regex:/^[ء-ي ]+$/iu',
        ], [
            "arName.regex" => "invalid regex"
        ]);
        if ($validated->fails()) {
            return response($validated->errors(), 400);
        }

        if (!isset($id) || !is_numeric($id) || $id <= 0) {
            return response('requested id is invalid', 400);
        }

        try {

            // check if town with the requested name already exists
            $name = strtolower($request->name);
            $ar_name = $request->arName;

            if ($this->checkIfTownNameExists($name, $ar_name)) {
                return response("@update: town with this name already exists", 422);
            }


            $town = Town::find($id);

            if (!$town) {
                return response('town not found', 404);
            }
            if ($town->protected === true) {
                return response('cannot change protected entry', 403);
            }



            if (strtolower($name) === strtolower($town->name) && !isset($ar_name)) {
                Log::channel("stderr")->error($name);
                return response('updated value cannot have the same name', 403);
            }
            // if the arabic name was given, check if both values are identical
            if (isset($ar_name)) {
                if (strtolower($name) === strtolower($town->name) && $ar_name === $town->ar_name) {
                    return response('updated value cannot both be identical to the current ones', 403);
                }
            }

            // everything is ok by now

            if ($name) {
                $town->name = strtolower($name);
            }
            if ($ar_name) {
                $town->ar_name = strtolower($ar_name);
            }
            // Log::channel("stderr")->error($town);

            $town->save();
            return response()->json(new TownResource($town), 200);
        } catch (Exception $e) {
            return response($e->getMessage(), 503);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!isset($id) || !is_numeric($id) || $id <= 0) {
            return response('requested id is invalid', 400);
        }

        try {
            $town = Town::find($id);

            if (!$town) {
                return response('town not found', 404);
            }

            if ($town->protected === true) {
                return response('cannot delete protected entry', 403);
            }
            Log::channel("stderr")->debug("DESTROY");
            $response = [
                "wilayaId" => $town->wilaya_id,
                "townId" => intval($id)
            ];

            $town->delete();

            return response()->json($response, 200);
        } catch (Exception $e) {
            return response($e->getMessage(), 503);
        }
    }

    /**
     * Queries the towns db to check whether $name or $ar_name already exist
     */
    private function checkIfTownNameExists($name, $ar_name)
    {

        $ar_name_sql = "";
        if (isset($ar_name)) {
            $ar_name_sql = "OR ar_name='{$ar_name}'";
        }
        $alreadyExists = DB::table("towns")->select("name", "ar_name")->whereRaw("name='{$name}' {$ar_name_sql}")->get();

        return count($alreadyExists) > 0;
    }
}
