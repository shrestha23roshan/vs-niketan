<?php

namespace Modules\BulletinBoardManagement\Http\Requests\Event;

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
            'heading' => 'required|max:145',
            'date' => 'required',
            'description' => 'required',
            'venue' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'heading.required' => 'Heading field is required.',
            'date.required' => 'Date field is required.',
            'description.required' => 'Description field is required.',
            'venue.required' => 'Venue field is required.',
        ];
    }
}