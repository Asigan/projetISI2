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
            'prenom'=>['required', 'string', 'max:100'],
            'nom'=>['required', 'string', 'max:100'] ,
            'nationalite'=>['required', 'string', 'max:100'],
            'elo'=>['required', 'numeric', 'min:0']
        ];
    }
}
