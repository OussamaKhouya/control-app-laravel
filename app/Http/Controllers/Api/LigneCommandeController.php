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

        $numpiece = $request->input('a_bcc_nupi');
        if ($numpiece) {
            $listlc = LigneCommandeResource::collection(LigneCommande::where('a_bcc_nupi', $numpiece)->get());

            $newListlc = [];
            foreach ($listlc as $lc) {
           $photosUrls = $fileController->getFilesInFolder($lc->a_bcc_nupi, $lc->a_bcc_num);
           $nph1 = 0;
           $nph2 = 0;
           $ph_camion = 0;
           $phb_bon = 0;
            foreach ($photosUrls as $url) {
                if (strpos($url, 'c1') !== false) {
                    $nph1++;
                }
                if (strpos($url, 'c2') !== false) {
                    $nph2++;
                }
                if (strpos($url, 'camion') !== false) {
                    $ph_camion++;
                }
                if (strpos($url, 'bon') !== false) {
                    $phb_bon++;
                }
            }
                $newListlc[] =[
                    'a_bcc_num' => $lc->a_bcc_num,
                    'a_bcc_nupi' => $lc->a_bcc_nupi,
                    'a_bcc_lib' => $lc->a_bcc_lib,
                    'a_bcc_dep' => $lc->a_bcc_dep,
                    'a_bcc_qua' => $lc->a_bcc_qua,
                    'a_bcc_coe' => $lc->a_bcc_coe,
                    'a_bcc_boi' => $lc->a_bcc_boi,
                    'a_bcc_quch1' => $lc->a_bcc_quch1,
                    'a_bcc_boch1' => $lc->a_bcc_boch1,
                    'a_bcc_obs1' => $lc->a_bcc_obs1,
                    'a_bcc_quch2' => $lc->a_bcc_quch2,
                    'a_bcc_boch2' => $lc->a_bcc_boch2,
                    'a_bcc_obs2' => $lc->a_bcc_obs2,
                    'nph1' => $nph1,
                    'nph2' => $nph2,
                    'phc' => $ph_camion,
                    'phb' => $phb_bon,
                ];
            }
            return $newListlc;
        }
        $numero = $request->input('a_bcc_num');
        if ($numero) {
            return LigneCommandeResource::collection(LigneCommande::where('a_bcc_num', '=', $numero)->get());
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
        $ligneCommande = LigneCommande::where('a_bcc_num', $numero)->firstOrFail();
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
