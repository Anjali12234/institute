<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
class SystemSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'logo1',        
        'name',
        'address',
        'phone_number',
        'telephone_number',
        'email',
        'logo2',
    ];

    protected function logo1(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? Storage::disk('public')->url($value) : null,
            set: fn($value) => $value ? $value->store('systemSetting', 'public') : null,
        );
    }


    protected function logo2(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? Storage::disk('public')->url($value) : null,
            set: fn($value) => $value ? $value->store('systemSetting', 'public') : null,
        );
    }

    

}

