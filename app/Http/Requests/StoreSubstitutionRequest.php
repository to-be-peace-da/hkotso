<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubstitutionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'order_id' => ['required'],
            'group_id' => ['required'],
            'subject_id' => ['required'],
            'audience_id' => ['required'],
            'teacher_id' => ['required'],
            'date' => ['required', 'date'],
            'course_id' => ['required'],
            'department_id' => ['required'],
        ];
    }
}
