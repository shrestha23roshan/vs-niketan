<?php

namespace Modules\ContentManagement\Http\Requests\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
 /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */
    public function rules()
    {
        return [
            'high_school_description' => 'sometimes|required',
            'bachelors_description' => 'sometimes|required',
            'masters_description' => 'sometimes|required',
            'plus-two_description' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'high_school_description.required' => 'High School Description field is required.',
            'bachelors_description.required' => 'Bachelors Description field is required.',
            'masters_description.required' => 'Masters Description field is required.',
            'plus-two_description.required' => 'Kindergarten Description field is required.',
        ];
    }
}