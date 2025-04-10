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

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'document_title',
        'document',
        'student_id',
       
    ];

    

    public function setDocumentAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['document'] = $value->store('student/requiedDocument', 'public');
        }
    }

    public function getDocumentUrlAttribute()
    {
        return $this->attributes['document'] ? Storage::disk('public')->url($this->attributes['document']) : '';
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
