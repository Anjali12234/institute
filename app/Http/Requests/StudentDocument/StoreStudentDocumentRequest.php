<?php

namespace App\Http\Requests\StudentDocument;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'documents' => ['nullable', 'array'],
            'documents.*.document' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'], // customize as needed
            'documents.*.document_title' => ['required', 'string', 'max:255'],
        ];
    }
}
