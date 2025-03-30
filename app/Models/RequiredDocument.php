<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class RequiredDocument extends Model
{

    use HasFactory, SoftDeletes, Sluggable;
    protected $fillable = [
        'title',
        'file',
        'slug',
        'position',
        'status',
    ];

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? Storage::disk('public')->url($value) : null,
            set: fn($value) => $value ? $value->store('requiredDocument', 'public') : null,
        );
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($requiredDocument) {
            $requiredDocument->position = static::max('position') + 1;

        });
    }
}
