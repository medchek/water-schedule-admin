<?php

namespace App\Http\Controllers;

use App\Http\Resources\TownResource;
use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Wilaya;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = validator($request->all(), [
            'wilayaId' => 'required|exists:App\Models\Wilaya,id',
            'name' => 'required|max:30|regex:/^[a-zàâçéèêëîïôûùüÿñæœ .\'-]+$/gi',
            'arName' => 'nullable|max:30|regex:/^[ء-ي]+$/gi/',
            // 'code' => 'bail|numeric|unique:towns|digits_between:1,2400000',
        ], [
            'wilayaId.required' => 'You must specify a wilaya'
        ]);

        if ($validated->fails()) {
            return response($validated->errors(), 406);
        }


        $wilaya_id = $request->wilayaId;
        $wilaya = Wilaya::find($wilaya_id);

        if (!$wilaya) {
            return response("invalid wilya, not found", 406);
        }

        // prepare the town code for the next town to be added by incrementing the current count
        $town_code = $wilaya->towns()->count() + 1;
        // otherwise the request if valid

        $town = new Town();




        $town->wilaya_id = $wilaya_id;
        // $town->wilaya()->associate()
        $town->name = $request->name;
        $town->ar_name = $request->arName ?? null;
        $town->code = intval($wilaya_id . $town_code < 10 ? '0' . $town_code : $town_code);

        $town->save();

        return response("ok", 201);
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
