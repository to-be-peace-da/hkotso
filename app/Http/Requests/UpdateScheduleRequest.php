<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'order_id' => ['required'],
            'group_id' => ['required'],
            'subject_id' => ['required'],
            'audience_id' => ['required'],
            'teacher_id' => ['required'],
            'day_id' => ['required'],
            'course_id' => ['required'],
            'department_id' => ['required'],
            'part_id' => ['required'],
        ];
    }
}
