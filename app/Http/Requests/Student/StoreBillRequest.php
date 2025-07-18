<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'received_amount' => ['required', 'string', 'max:255'],
            'due' => ['required', 'string', 'max:255'],
            'paid_by' => ['required', 'string', 'max:255'],
            'payment_method' => ['required', 'string', 'max:255'],
            'remarks' => ['required', 'string', 'max:255'],

        ];
    }
}
