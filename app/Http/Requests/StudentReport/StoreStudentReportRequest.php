<?php

namespace App\Http\Requests\StudentReport;

use App\Enums\Gender;
use App\Enums\StudentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreStudentReportRequest extends FormRequest
{
 
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'registration_no' => ['nullable'],
            'full_name' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', new Enum(Gender::class)],
            'student_type' => ['nullable', new Enum(StudentType::class)],
            'email' => ['nullable', 'email', 'max:255'], 
            'd_o_b' => ['nullable', 'date'],
            'phone_number' => [
                'nullable',
                'digits:10',
                'regex:/^(97|98)\d{8}$/'
            ],
            'course_id' => ['nullable', Rule::exists('courses', 'id')->withoutTrashed()],
            'student_id' => ['nullable', Rule::exists('students', 'id')->withoutTrashed()],

        ];
    }
}
