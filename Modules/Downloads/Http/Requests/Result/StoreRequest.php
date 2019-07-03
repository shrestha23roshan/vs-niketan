<?php

namespace Modules\Downloads\Http\Requests\Result;

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
            'download_caption' => 'required',
            'download_attachment' => 'required|mimes:jpg,jpeg,gif,png,doc,docx,xls,xlsx,pdf,txt,zip',
        ];
    }

    public function messages()
    {
        return [
            'download_caption.required' => 'Caption field is required.',
            'download_attachment.required' => 'Download Attachment field is required.'
        ];
    }
}