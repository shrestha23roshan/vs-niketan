<?php

namespace Modules\BulletinBoardManagement\Http\Requests\News;

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
            'heading' => 'required',
            'date' => 'required',
            'author' => 'required',
            'description' => 'required',
            'attachment' => 'mimes:jpg,jpeg,gif,png',
        ];
    }

    public function messages()
    {
        return [
            'heading.required' => 'Heading field is required.',
            'date.required' => 'Date field is required.',
            'author.required' => 'Author field is required.',
            'description.required' => 'Description field is required.',
            'attachment.required' => 'Attachment field is required.'
        ];
    }
}