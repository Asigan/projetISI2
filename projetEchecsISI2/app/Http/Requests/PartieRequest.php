<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartieRequest extends FormRequest
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
            'joueur1_id'=>['required', 'numeric', 'min:0'],
            'joueur2_id'=>['required', 'numeric', 'min:0'] ,
            'tournoi_id'=>['required', 'numeric', 'min:0'],
            'date'=>['required', 'date'],
            'statut'=>['required', 'numeric', 'min:0', 'max:4']
        ];
    }
}
