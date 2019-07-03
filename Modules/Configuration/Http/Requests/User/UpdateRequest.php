<?php

namespace Modules\Configuration\Http\Requests\User;

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
     * @return arry
     */
    public function rules()
    {
        return [
            'id' => 'required | exists:users,id',
            'username' => 'required',
            'full_name' => 'required'
        ];
    }
}