<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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
            'firstname.required' => __('errorMessages.firstname.required'),
            'firstname.string' => __('errorMessages.firstname.string'),
            'firstname.between' => __('errorMessages.firstname.between'),
            'firstname.regex' => __('errorMessages.firstname.regex'),
            'lastname.required' => __('errorMessages.lastname.required'),
            'lastname.string' => __('errorMessages.lastname.string'),
            'lastname.between' => __('errorMessages.lastname.between'),
            'lastname.regex' => __('errorMessages.lastname.regex'),
            'description.string' => __('errorMessages.description.string'),
            'description.max' => __('errorMessages.description.max'),
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'firstname' => mb_convert_case(trim(preg_replace('/[~!@#$%^&*()_+={}|\[\]\/\\\\"№;%:?*]/', '', $this->input('firstname'))), MB_CASE_TITLE, "UTF-8"),
            'lastname' => mb_convert_case(trim(preg_replace('/[~!@#$%^&*()_+={}|\[\]\/\\\\"№;%:?*]/', '', $this->input('lastname'))), MB_CASE_TITLE, "UTF-8"),
            'description' => trim($this->input('description')),
        ]);
    }
}
