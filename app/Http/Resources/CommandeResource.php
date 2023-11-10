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
            'bcc_nupi' => $this->bcc_nupi,
            'bcc_dat' => CommandeResource::formatDateTime($this->bcc_dat),
            'bcc_dach1' => CommandeResource::formatDateTime($this->bcc_dach1),
            'bcc_dach2' => CommandeResource::formatDateTime($this->bcc_dach2),
            'bcc_lcli' => $this->bcc_lcli,
            'bcc_lrep' => $this->bcc_lrep,
            'bcc_lexp' => $this->bcc_lexp,
            'bcc_veh' => $this->bcc_veh,
            'bcc_eta' => $this->bcc_eta,
            'bcc_val' => $this->bcc_val,
            'bcc_usr_sai' => $this->bcc_usr_sai,
            'bcc_usr_com' => $this->bcc_usr_com,
            'bcc_usr_con1' => $this->bcc_usr_con1,
            'bcc_usr_con2' => $this->bcc_usr_con2,
            'bcc_usr_sup' => $this->bcc_usr_sup,
        ];
    }


    public function formatDateTime($dateTime, $format = 'd-m-Y H:i:s') {
        if ($dateTime !== null) {
            return $dateTime->format($format);
        } else {
            return null;
        }
    }
}
