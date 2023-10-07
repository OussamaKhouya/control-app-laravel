<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLigneCommandeRequest extends FormRequest
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
            'observation1' => 'nullable',
            'observation2' => 'nullable',
            'quantite1' => 'nullable',
            'quantite2' => 'nullable',
            'username1' => 'nullable',
            'username2' => 'nullable'
        ];
    }
}
