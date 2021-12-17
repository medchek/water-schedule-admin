<?php

namespace App\Http\Controllers;

use App\Http\Resources\TownResource;
use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Wilaya;
use App\Services\TownService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TownController extends Controller
{

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
                'arName' => 'required|between:3,30|regex:/^[ء-ي ]+$/iu',
            ]);

            if ($validated->fails()) {
                return response($validated->errors(), 400);
            }

            $wilayaId = $request->wilayaId;
            $wilaya = Wilaya::find($wilayaId);

            if (!$wilaya) {
                return response("invalid wilya, not found", 400);
            }

            $doesTownExists = Town::where('name', $request->name)->orWhere('ar_name', $request->arName)->where('wilaya_id', $request->wilayaId)->first();

            Log::channel("stderr")->debug($doesTownExists);

            if ($doesTownExists) {
                return response("town with this name already exists", 422);
            }

            $townServices = new TownService;

            // prepare the town code for the next town to be added by incrementing the current count
            $townCode = $wilaya->towns()->count() + 1;


            $town = new Town;
            $town->wilaya_id = $wilayaId;

            $town->name = strtolower($request->name);
            $town->ar_name = strtolower($request->arName);

            $town->code = $townServices->generateTownCode($wilayaId, $townCode);
            $town->protected = false; // so that the user can edit/delete it
            $town->added_by = Auth::id();

            // Log::channel("stderr")->debug($town);
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
        if (!isset($id) || !is_numeric($id) || $id <= 0) {
            return response('requested id is invalid', 400);
        }

        if (!isset($request->name) && !isset($request->arName)) {
            return response("invalid request", 400);
        }


        $validation = validator($request->all(), [
            "name" => "between:3,30|regex:/^[a-zàâçéèêëîïôûùüÿñæœ .\'-]+$/i",
            "arName" => "between:3,30|regex:/^[ء-ي ]+$/iu",
        ]);


        if ($validation->fails()) {
            return response("invalid request data", 400);
        }

        $townServices = new TownService;
        try {

            // check if town with the requested name already exists
            $name = strtolower($request->name);
            $ar_name = strtolower($request->arName);

            if ($townServices->checkTownExistance($name, $ar_name, $id)) {
                return response("@update: town with this name already exists", 422);
            }


            $town = Town::find($id);

            if (!$town) {
                return response("town not found", 404);
            }
            if ($town->protected === true) {
                return response("cannot change protected entry", 403);
            }

            if ($name === $town->name || $ar_name === $town->ar_name) {
                Log::channel("stderr")->error($name);
                return response("updated value cannot both be identical to the current ones", 403);
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
