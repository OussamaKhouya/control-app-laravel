<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandeResource extends JsonResource
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
            'numpiece' => $this->numpiece,
            'date' => $this->date->format('d-m-Y H:i:s'),
            'client' => $this->client,
            'etat' => $this->etat,
            'saisie' => $this->saisie,
            'commercial' => $this->commercial,
            'control1' => $this->control1,
            'control2' => $this->control2,
        ];
    }
}
