<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLigneCommandeRequest;
use App\Http\Requests\UpdateLigneCommandeRequest;
use App\Http\Resources\LigneCommandeResource;
use App\Models\LigneCommande;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LigneCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return LigneCommandeResource::collection(LigneCommande::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreLigneCommandeRequest $request)
    {
        return new LigneCommandeResource(LigneCommande::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param LigneCommande $ligneCommande
     * @return Response
     */
    public function show(LigneCommande $ligneCommande)
    {
        return new LigneCommandeResource($ligneCommande);
    }

    public function search(Request $request)
    {
        $fileController = new FileHandlerController;

        $numpiece = $request->input('numpiece');
        if ($numpiece) {
            $listlc = LigneCommandeResource::collection(LigneCommande::where('numpiece', $numpiece)->get());

            $newListlc = [];
            foreach ($listlc as $lc) {
           $photos = $fileController->getFilesInFolder($lc->numpiece, $lc->numero);
                $newListlc[] =[
                    'numero' => $lc->numero,
                    'numpiece' => $lc->numpiece,
                    'designation' => $lc->designation,
                    'quantite' => $lc->quantite,
                    'quantite1' => $lc->quantite1,
                    'quantite2' => $lc->quantite2,
                    'observation1' => $lc->observation1,
                    'observation2' => $lc->observation2,
                    'username1' => $lc->username1,
                    'username2' => $lc->username2,
                    'nbrPhoto' => count($photos)
                ];
            }
            return $newListlc;
        }
        $numero = $request->input('numero');
        if ($numero) {
            return LigneCommandeResource::collection(LigneCommande::where('numero', '=', $numero)->get());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LigneCommande $ligneCommande
     * @return Response
     */
    public function update(UpdateLigneCommandeRequest $request, $numero)
    {
        $ligneCommande = LigneCommande::where('numero', $numero)->firstOrFail();
       $ligneCommande->update($request->validated());
        return new LigneCommandeResource($ligneCommande);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LigneCommande $ligneCommande
     * @return Response
     */
    public function destroy(LigneCommande $ligneCommande)
    {
        $ligneCommande->delete();
        return response()->noContent();
    }
}
