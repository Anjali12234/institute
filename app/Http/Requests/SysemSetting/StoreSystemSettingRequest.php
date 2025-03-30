<?php

namespace App\Http\Requests\SysemSetting;

use Illuminate\Foundation\Http\FormRequest;

class StoreSystemSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'telephone_number' => ['required', 'string'],
            'email' => ['required', 'email'],
            'logo' => ['nullable', 'image'],
            'thumbnail' => ['nullable', 'image'],
           
        ];
    }
}
