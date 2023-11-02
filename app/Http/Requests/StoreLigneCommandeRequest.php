<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLigneCommandeRequest extends FormRequest
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
            'a_bcc_num' => 'required',
            'a_bcc_nupi' => 'required',
            'a_bcc_lib' => 'nullable',
            'a_bcc_dep' => 'nullable',
            'a_bcc_qua' => 'nullable',
            'a_bcc_coe' => 'nullable',
            'a_bcc_boi' => 'nullable',
            'a_bcc_quch1' => 'nullable',
            'a_bcc_boch1' => 'nullable',
            'a_bcc_obs1' => 'nullable',
            'a_bcc_quch2' => 'nullable',
            'a_bcc_boch2' => 'nullable',
            'a_bcc_obs2' => 'nullable',
        ];
    }
}
