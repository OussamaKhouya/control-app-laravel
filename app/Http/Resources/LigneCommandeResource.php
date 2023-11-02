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
            'a_bcc_num' => $this->a_bcc_num,
            'a_bcc_nupi' => $this->a_bcc_nupi,
            'a_bcc_lib' => $this->a_bcc_lib,
            'a_bcc_dep' => $this->a_bcc_dep,
            'a_bcc_qua' => $this->a_bcc_qua,
            'a_bcc_coe' => $this->a_bcc_coe,
            'a_bcc_boi' => $this->a_bcc_boi,
            'a_bcc_quch1' => $this->a_bcc_quch1,
            'a_bcc_boch1' => $this->a_bcc_boch1,
            'a_bcc_obs1' => $this->a_bcc_obs1,
            'a_bcc_quch2' => $this->a_bcc_quch2,
            'a_bcc_boch2' => $this->a_bcc_boch2,
            'a_bcc_obs2' => $this->a_bcc_obs2,
        ];
    }
}
