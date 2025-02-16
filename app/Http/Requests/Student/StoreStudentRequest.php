<?php

namespace App\Http\Requests\Student;

use App\Enum\Gender;
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
            'tole' => ['required', 'string', 'max:255'],
            'course_id' => ['required',Rule::exists('courses', 'id')->withoutTrashed()], 
            'province_id' => ['required',Rule::exists('provinces', 'id')->withoutTrashed()], 
            'district_id' => ['required',Rule::exists('districts', 'id')->withoutTrashed()], 
            'local_body_id' => ['required',Rule::exists('local_bodies', 'id')->withoutTrashed()], 
            'ward_no' => ['required','numeric'], 
            'phone_number' => ['required', 'max:10', Rule::unique('students', 'phone_number')], 
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email' => ['required', 'email', 'max:255', Rule::unique('students', 'email')], // Required, valid email, unique
            'gender' => ['required', new Enum(Gender::class)],
            'student_type' => ['required', new Enum(StudentType::class)],
            'd_o_b' => ['nullable','date'],
            'parent_name' => ['nullable', 'string', 'max:255'],
            'parent_contact_number' => ['nullable','numeric'],
            'admission_date' => ['nullable','date'],
            'how_do_you_know' => ['nullable', 'string', 'max:255'],
            'remarks' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable','boolean'],
            'reference_by' => ['nullable',Rule::exists('students', 'id')->withoutTrashed()], 

        ];
    }
}
