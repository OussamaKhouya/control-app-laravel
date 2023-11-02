<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bcc_nupi' => 'required',
            'bcc_dat' => 'required|date',
            'bcc_dach1' => 'nullable|date',
            'bcc_dach2' => 'nullable|date',
            'bcc_lcli' => 'nullable',
            'bcc_lrep' => 'nullable',
            'bcc_lexp' => 'nullable',
            'bcc_veh' => 'nullable',
            'bcc_eta' => 'nullable',
            'bcc_val' => 'nullable',
            'bcc_usr_sai' => 'nullable',
            'bcc_usr_com' => 'nullable',
            'bcc_usr_con1' => 'nullable',
            'bcc_usr_con2' => 'nullable',
            'bcc_usr_sup' => 'nullable'
        ];
    }
}
