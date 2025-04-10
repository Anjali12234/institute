<?php

namespace App\Models;

use App\Enums\CourseType;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use HasFactory, SoftDeletes, Sluggable, Notifiable;

    protected $fillable = [
        'course_name',
        'duration',
        'start_date',
        'end_date',
        'slug',
        'position',
        'fee',
        'course_type',
        'status',
    ];
   
  
    protected $casts = [
        'course_type' => CourseType::class,
    ];

  
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'course_name'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->position = static::max('position') + 1;
        });
    }
    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function requiredDocuments()
    {
        return $this->hasMany(RequiredDocument::class);
    }
}
