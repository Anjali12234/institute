<?php

namespace App\Http\Requests\Course;

use App\Enum\CourseType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreCourseRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'course_name' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'string', 'max:100'],
            'fee' => ['required',  'numeric'],
            'start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'end_date' => ['required', 'date', 'date_format:Y-m-d', 'after:start_date'],
            // 'required_documents' => ['required', 'string'],
            'course_type' => ['required', new Enum(CourseType::class)],
        ];
    }
}
