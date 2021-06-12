<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournoiRequest extends FormRequest
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
            'nom'=>['required', 'string', 'max:100'],
            'date'=>['required', 'date'] ,
            'adresse'=>['required', 'string', 'max:200'],
            'classement'=>['required', 'string', 'max:500'],
            'niveau_id'=>[ 'required', 'numeric', 'min:0'],
            'organisateur_id'=>['required', 'numeric', 'min:0']
        ];
    }
}
