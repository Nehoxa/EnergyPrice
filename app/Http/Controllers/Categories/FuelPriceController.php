<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\FuelPriceRequest;
use App\Http\Resources\Api\FuelPriceResource;
use App\Models\FuelPrice;
use App\Models\FuelType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FuelPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $fueltypes = FuelType::all();
        $filters = $request->all('query');

        if ($request->filled('query')) {
            $fuelprices = FuelPriceResource::collection(FuelPrice::search($filters['query'])->paginate(10));
        } else {
            $fuelprices = FuelPriceResource::collection(FuelPrice::paginate(10));
        }

        return Inertia::render('Categories/FuelPrice/Index', compact('fuelprices', 'fueltypes', 'filters'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(FuelPriceRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\FuelPrice  $fuelprice
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(FuelPrice $fuelprice)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FuelPrice  $fuelprice
     * @return \Inertia\Response
     */
    public function edit(FuelPrice $fuelprice)
    {
        $fueltypes = FuelType::all();
        return Inertia::render('Categories/FuelPrice/Edit', compact('fuelprice', 'fueltypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FuelPriceRequest  $request
     * @param  \App\Models\FuelPrice  $fuelprice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FuelPriceRequest $request, FuelPrice $fuelprice)
    {
        $fuelprice->update($request->validated());
        return Redirect::route('fuelprice.index')->with(['message' => "Prix update !", 'class' => 'bg-green-100  text-green-700']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FuelPrice  $fuelprice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FuelPrice $fuelprice): RedirectResponse
    {
        $fuelprice->delete();
        return Redirect::route('fuelprice.index')->with(['message' => "Prix delete !", 'class' => 'bg-red-100  text-red-700']);
    }
}
