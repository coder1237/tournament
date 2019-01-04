<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsFormRequest extends FormRequest
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
            'group_size'=>'required|min:1',
            'number_of_matches'=>'required|min:1',
        ];
    }
    public function messages()
    {
        return [
            'group_size.required'=>'Please insert group size',
            'group_size.min'=>'Group size must be greater than 0',
            'number_of_matches.required'=>'Please insert number of matches for each team',
            'number_of_matches.min'=>'Matches for each team must be greater than 0',
        ];
    }
}
