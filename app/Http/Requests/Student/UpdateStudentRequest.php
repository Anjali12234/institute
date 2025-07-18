<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'how_know' => ['required', 'string', 'max:255'],

            'qualification' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('students', 'email')->withoutTrashed()->ignore($this->student)],
            'd_o_b' => ['required', 'date'],
            'phone_number' => ['required', 'max:10', Rule::unique('students', 'phone_number')->withoutTrashed()->ignore($this->student)], 
            'course_id' => ['required',Rule::exists('courses', 'id')->withoutTrashed()], 
            'province_id' => ['required',Rule::exists('provinces', 'id')->withoutTrashed()], 
            'district_id' => ['required',Rule::exists('districts', 'id')->withoutTrashed()], 
            'local_body_id' => ['required',Rule::exists('local_bodies', 'id')->withoutTrashed()], 
            'ward_no' => ['required','numeric'], 
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'parent_name' => ['required', 'string', 'max:255'],
            'parent_contact_number' => ['required','numeric'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_contact_number' => ['required','numeric'],
            'remarks' => ['nullable', 'string', 'max:255'],
            'student_id' => ['nullable',Rule::exists('students', 'id')->withoutTrashed()], 
        ];
    }
}
