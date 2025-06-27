<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
        'first_name'  => 'required|string|max:255',
        'last_name'   => 'required|string|max:255',
        'email'       => 'required|email|max:255|unique:students,email',
        'age'         => 'required|integer|min:1|max:150',
        'province'    => 'required|string|max:100',
        'class'  => 'required|string|max:100',
        'grade'       => 'required|string|max:100',
        'teacher_id'  => 'required|integer|exists:teachers,id',
    ];
    }
}
