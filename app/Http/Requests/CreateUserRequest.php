<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => 'required|string|between:2,50|regex:/^[а-яА-Яa-zA-Z\s]+$/u',
            'lastname' => 'required|string|between:2,50|regex:/^[а-яА-Яa-zA-Z\s]+$/u',
            'description' => 'string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => ('errorMessages.firstname.required'),
            'firstname.string' => ('errorMessages.firstname.string'),
            'firstname.between' => ('errorMessages.firstname.between'),
            'firstname.regex' => ('errorMessages.firstname.regex'),
            'lastname.required' => ('errorMessages.lastname.required'),
            'lastname.string' => ('errorMessages.lastname.string'),
            'lastname.between' => ('errorMessages.lastname.between'),
            'lastname.regex' => ('errorMessages.lastname.regex'),
            'description.string' => ('errorMessages.description.string'),
            'description.max' => ('errorMessages.description.max'),
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'firstname' => mb_convert_case(trim(preg_replace('/[~!@#$%^&*()_+={}|\[\]\/\\\\"№;%:?*]/', '', $this->input('firstname'))), MB_CASE_TITLE, "UTF-8"),
            'lastname' => mb_convert_case(trim(preg_replace('/[~!@#$%^&*()_+={}|\[\]\/\\\\"№;%:?*]/', '', $this->input('lastname'))), MB_CASE_TITLE, "UTF-8"),
            'description' => trim($this->input('description')),
        ]);
    }
}