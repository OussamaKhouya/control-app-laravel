<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LigneCommandeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'numero' => $this->numero,
            'numpiece' => $this->numpiece,
            'designation' => $this->designation,
            'quantite' => $this->quantite,
            'observation' => $this->observation,
            'quantitePartiel' => $this->quantite_partiel,
            'quantiteLiv' => $this->quantite_liv,
        ];
    }
}
