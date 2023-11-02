<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CommandeResource;
use App\Models\Category;
use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchThese = ['bcc_eta' => 'INITIAL'];

        $orThose = ['bcc_eta' => 'EN PREPARATION'];

        return CommandeResource::collection(
            Commande::where($matchThese)
                ->orWhere($orThose)
                ->orderBy('bcc_dat', 'desc')
                ->get());
    }

    public function new()
    {
        return CommandeResource::collection(
            Commande::whereIn('bcc_eta', ['INITIAL','EN PREPARATION','TERMINE'])
                ->orderBy('bcc_dat', 'desc')
                ->get());
    }

    public function all()
    {
        return CommandeResource::collection(
            Commande::orderBy('bcc_dat', 'desc')
                ->get());
    }

    public function search(Request $request)
    {

        $numpiece = $request->input('bcc_nupi');

        if ($numpiece) {
            $listlc = CommandeResource::collection(Commande::where('bcc_nupi', $numpiece)->orderBy('bcc_dat', 'desc')->get());

            return $listlc;
        }
        $date = $request->input('bcc_dat');
        if ($date) {
            $newDate = Carbon::createFromFormat('d-m-Y H:i:s', $date)
                ->format('Y-m-d H:i:s');
            return CommandeResource::collection(Commande::where('bcc_dat', '>', $newDate)->orderBy('bcc_dat', 'desc')->get());
        }

        return CommandeController::all();
    }

    public function stats()
    {
        $data = Commande::select('bcc_eta', DB::raw('COUNT(*) as count'))
            ->groupBy('bcc_eta')
            ->get();
        $transformedData = collect($data)->pluck('count', 'bcc_eta')
            ->mapWithKeys(function ($item, $key) {
                return [strtolower($key) => $item];
            });

        return $transformedData->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CommandeResource
     */
    public function store(StoreCommandeRequest $request)
    {
        return new CommandeResource(Commande::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        return new CommandeResource($commande);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $commande->update($request->validated());
        return new CommandeResource($commande);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
       $commande->delete();
       return response()->noContent();
    }
}
