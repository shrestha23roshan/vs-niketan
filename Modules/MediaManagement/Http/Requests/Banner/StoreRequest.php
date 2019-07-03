<?php

namespace Modules\MediaManagement\Http\Requests\Banner;

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
            // 'title' => 'required',
            'attachment' => 'required|mimes:jpg,jpeg,png',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'Title field is required.',
    //     ];
    // }
}