<?php

namespace App\Http\Requests;

use App\Rules\CheckGroupSize;
use Illuminate\Foundation\Http\FormRequest;

class TeamFormRequest extends FormRequest
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
        $id = !empty($this->id) ? $this->id : NULL;
        return [
            'name' => 'required|string|max:255|unique:teams,name,' . $id,
            'code' => 'required|string|max:255|unique:teams,code,' . $id,
            'group_id' => [
                'required',
                new CheckGroupSize($this->group_id,$id)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please enter team name',
            'code.required'=>'Please enter team code',
            'group_id.required'=>'Please select group'
        ];
    }
}
