<?php

namespace App\Http\Requests\Student;

use App\Enums\Gender;
use App\Enum\StudentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
           'gender' => ['required', new Enum(Gender::class)],
             'how_know' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('students', 'email')], // Required, valid email, unique
            'd_o_b' => ['required', 'date'],
            'qualification' => ['required', 'string', 'max:255'],
            'phone_number' => [
                'required',
                'digits:10',
                'regex:/^(97|98)\d{8}$/',
                Rule::unique('students', 'phone_number'),
            ],
            'tole' => ['required', 'string', 'max:255'],
            'course_id' => ['required', Rule::exists('courses', 'id')->withoutTrashed()],
            'province_id' => ['required', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'parent_name' => ['required', 'string', 'max:255'],
            'parent_contact_number' => [
                'required',
                'digits:10',
                'regex:/^(97|98)\d{8}$/',
                Rule::unique('students', 'parent_contact_number'),
            ],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_contact_number' => [
                'required',
                'digits:10',
                'regex:/^(97|98)\d{8}$/',
                Rule::unique('students', 'guardian_contact_number'),
            ],
            'remarks' => ['nullable', 'string', 'max:255'],
            'student_id' => ['nullable', Rule::exists('students', 'id')->withoutTrashed()],

        ];
    }
}
