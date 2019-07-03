<?php

namespace Modules\MediaManagement\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'heading' => 'required',
            'description' => 'required',
            'video_url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'heading.required' => 'Heading field is required.',
            'description.required' => 'Description field is required.',
            'video_url.required' => 'Video URL field is required.',
        ];
    }
}