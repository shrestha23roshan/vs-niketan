<?php

namespace Modules\Alumni\Http\Requests\Alumni;

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
            'full_name' => 'required',
            'email' => 'required|unique:alumni',
            'batch' => 'required|numeric|digits:4',
            // 'address' => 'required',
            'phone_no' => 'required|unique:alumni|regex:/(98)[0-9]{8}/|size:10',
            'occupation' => 'required',
            'attachment' => 'required | max:1024'
        ];
    }
}

