<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ConsoElecGazResource;
use App\Models\ConsoElecGaz;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConsoElecGazController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = ConsoElecGaz::category();
        $filieres = ConsoElecGaz::filiere();
        $secteurs = ConsoElecGaz::secteur();

        if ($request->filled('searchId') || $request->filled('searchOp') || $request->filled('searchAnnee') || $request->filled('searchfiliere') || $request->filled('searchCategory') || $request->filled('searchSecteurs') || $request->filled('searchConso') || $request->filled('searchPDL') || $request->filled('searchRegion') || $request->filled('searchCodeRegion')) {
            $consomations = ConsoElecGazResource::collection(ConsoElecGaz::where('id', 'LIKE', $request->searchId)
                ->where('operateur', 'LIKE', '%' . $request->searchOp . '%')
                ->where('annee', 'LIKE', $request->searchAnnee)
                ->where('filiere', 'LIKE', $request->searchfiliere)
                ->where('libelle_categorie_consommation', 'LIKE', $request->searchCategory)
                ->where('libelle_grand_secteur', 'LIKE', $request->searchSecteurs)
                ->where('conso', 'LIKE', $request->searchConso)
                ->where('pdl', 'LIKE', $request->searchPDL)
                ->where('libelle_region', 'LIKE', '%' . $request->searchRegion . '%')
                ->where('code_region', 'LIKE', $request->searchCodeRegion)
            ->paginate(15));
        } else {
            $consomations = ConsoElecGazResource::collection(ConsoElecGaz::paginate(15));
        }
        // dd($consomations);

        return Inertia::render('Categories/ConsoGazElec/Index', compact('consomations', 'categories', 'filieres', 'secteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsoElecGaz  $consoElecGaz
     * @return \Illuminate\Http\Response
     */
    public function show(ConsoElecGaz $consoElecGaz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsoElecGaz  $consoElecGaz
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsoElecGaz $consoElecGaz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsoElecGaz  $consoElecGaz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsoElecGaz $consoElecGaz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsoElecGaz  $consoElecGaz
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsoElecGaz $consoElecGaz)
    {
        //
    }
}
