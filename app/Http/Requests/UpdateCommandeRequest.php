<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommandeRequest extends FormRequest
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
            'date' => 'date',
            'client' => 'nullable',
            'etat' => 'nullable',
            'saisie' => 'nullable',
            'commercial' => 'nullable',
            'control1' => 'nullable',
            'control2' => 'nullable',
            'ver' => 'nullable',
        ];
    }
}
