<?php

namespace App\Http\Controllers\Api;

use App\Filters\FuelPriceFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\FuelPriceResource;
use App\Models\FuelPrice;
use Illuminate\Http\Request;

class FuelPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new FuelPriceFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0 ) {
            return response(collect(FuelPriceResource::collection(FuelPrice::paginate()))->toArray());
        } else {
            return response(collect(FuelPriceResource::collection(FuelPrice::where($queryItems)->paginate()))->toArray());
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
     * @param  \App\Models\FuelPrice  $fuelPrice
     * @return \Illuminate\Http\Response
     */
    public function show(FuelPrice $fuelPrice)
    {
        return response(collect(new FuelPriceResource($fuelPrice))->toArray());
    }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\fuelPrice  $fuelPrice
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, FuelPrice $fuelPrice)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\FuelPrice  $fuelPrice
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(FuelPrice $fuelPrice)
//     {
//         //
//     }
}
