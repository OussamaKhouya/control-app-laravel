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
            'quantite1' => $this->quantite1,
            'quantite2' => $this->quantite2,
            'observation1' => $this->observation1,
            'observation2' => $this->observation2,
            'username1' => $this->username1,
            'username2' => $this->username2,
        ];
    }
}
