<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class StudentDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'document_title',
        'document',
        'student_id',       
    ];

    protected function document(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? Storage::disk('public')->url($value) : null,
            set: fn($value) => is_string($value) ? $value : $value->store('student_documents', 'public'),
        );
    }
    

    // public function setDocumentAttribute($value)
    // {
    //     if (!empty($value) && !is_string($value)) {
    //         $this->attributes['document'] = $value->store('student/requiedDocument', 'public');
    //     }
    // }

    // public function getDocumentUrlAttribute()
    // {
    //     return $this->attributes['document'] ? Storage::disk('public')->url($this->attributes['document']) : '';
    // }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}


