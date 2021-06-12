<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoueurRequest extends FormRequest
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
            'date'=>['required', 'string', 'min:10', 'max:10'] ,
            'adresse'=>['required', 'string', 'max:200'],
            'classement'=>['required', 'string', 'max:500'],
            'elo'=>['required', 'numeric', 'min:0'],
            'organisateur'=>['required', 'string', 'max:100']
        ];
    }
}
