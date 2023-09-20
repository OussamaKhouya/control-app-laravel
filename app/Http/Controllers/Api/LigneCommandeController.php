<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\StoreLigneCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Http\Requests\UpdateLigneCommandeRequest;
use App\Http\Resources\CommandeResource;
use App\Http\Resources\LigneCommandeResource;
use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Http\Request;

class LigneCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LigneCommandeResource::collection(LigneCommande::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLigneCommandeRequest $request)
    {
        return new LigneCommandeResource(LigneCommande::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LigneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function show(LigneCommande $ligneCommande)
    {
        return new LigneCommandeResource($ligneCommande);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LigneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLigneCommandeRequest $request, LigneCommande $ligneCommande)
    {
        $ligneCommande->update($request->validated());
        return new LigneCommandeResource($ligneCommande);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LigneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function destroy(LigneCommande $ligneCommande)
    {
        $ligneCommande->delete();
        return response()->noContent();
    }
}
