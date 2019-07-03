<?php

namespace Modules\ContentManagement\Http\Requests\Achievement;

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
            'certified_teacher' => 'required',
            'graduated_student' => 'required',
            'award_winner' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'certified_teacher.required' => 'Certified Teacher field is required.',
            'graduated_student.required' => 'Graduated Student field is required.',
            'award_winner.required' => 'Award Winner field is required.'
        ];
    }
}