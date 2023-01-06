<?php

namespace App\Http\Controllers\Api;

use App\Filters\ConsoFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ConsoElecGazResource;
use App\Models\ConsoElecGaz;
use Illuminate\Http\Request;

class ConsoElecGazController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ConsoFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            // dd(ConsoElecGazResource::collection(ConsoElecGaz::paginate()))->toArray();
            // return ConsoElecGazResource::collection(ConsoElecGaz::paginate());
            return response(collect(ConsoElecGazResource::collection(ConsoElecGaz::paginate()))->toArray());
        } else {
            return response(collect(ConsoElecGazResource::collection(ConsoElecGaz::where($queryItems)->paginate()))->toArray());
        }
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsoElecGaz  $consoElecGaz
     * @return \Illuminate\Http\Response
     */
    public function show(ConsoElecGaz $consoElecGaz)
    {
        // dd((new ConsoElecGazResource($consoElecGaz)));
        return response(collect(new ConsoElecGazResource($consoElecGaz))->toArray());
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\ConsoElecGaz  $consoElecGaz
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, ConsoElecGaz $consoElecGaz)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\ConsoElecGaz  $consoElecGaz
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(ConsoElecGaz $consoElecGaz)
    // {
    //     //
    // }
}
