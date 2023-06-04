<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'name' => ['required', 'unique:teachers,name,NULL,id,surname,' . $this->surname . ',patronymic,' . $this->patronymic],
            'surname' => ['required', 'unique:teachers,surname,NULL,id,name,' . $this->name . ',patronymic,' . $this->patronymic],
            'patronymic' => ['required', 'unique:teachers,patronymic,NULL,id,name,' . $this->name . ',surname,' . $this->surname],
        ];
    }
}
