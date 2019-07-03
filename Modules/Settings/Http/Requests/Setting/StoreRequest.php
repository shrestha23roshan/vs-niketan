<?php

namespace Modules\Settings\Http\Requests\Setting;

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
            'site_name' => 'required',
            'site_logo' => 'required',
            'site_favicon' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => 'Name field is required.',
            'site_logo.required' => 'Name field is required.',
            'site_favicon.required' => 'Name field is required.',
        ];
    }
}
