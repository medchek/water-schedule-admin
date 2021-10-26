<?php

namespace App\Http\Controllers;

use App\Http\Resources\TownResource;
use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Wilaya;
use Illuminate\Support\Facades\Auth;

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
        // Log::channel("stderr")->debug($request);
        $validated = validator($request->all(), [
            'wilayaId' => 'required|digits_between:1,58|exists:App\Models\Wilaya,id',
            'name' => 'required|between:3,30|regex:/^[a-zàâçéèêëîïôûùüÿñæœ .\'-]+$/i',
            'arName' => 'nullable|between:3,30|regex:/^[ء-ي]+$/i/',
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

        // check if the wilaya already has a town with the same name
        $isTownExists = Town::where('name', $request->name)->where('wilaya_id', $request->wilayaId)->first();

        if ($isTownExists) {
            return response("town with this name already exists", 422);
        }

        // prepare the town code for the next town to be added by incrementing the current count
        $town_code = $wilaya->towns()->count() + 1;



        $town = new Town();


        $town->wilaya_id = $wilaya_id;

        $town->name = $request->name;
        $town->arName = $request->arName ?? null;


        $town_code = intval($wilaya_id . 0 . ($town_code < 10 ? '0' . $town_code : $town_code));
        $town->code = $town_code;
        $town->protected = false; // so that the user can edit/delete it
        $town->added_by = Auth::id();

        // $town->save();

        return response()->json(new TownResource($town), 201);
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
