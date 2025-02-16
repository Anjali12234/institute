<?php

namespace App\Models;

use App\Enum\StudentType;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Storage;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes, Sluggable, Notifiable;

    protected $fillable = [
        'full_name',
        'gender',
        'd_o_b',
        'email',
        'parent_name',
        'parent_contact_number',
        'phone_number',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'tole',
        'admission_date',
        'how_do_you_know',
        'reference_by',
        'course_id',
        'image',
        'remarks',
        'status',
        'student_type',
        'position',
        'slug',
        'registration_no',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'student_type' => StudentType::class,
    ];

    public function setPasswordAttribute($value): void
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
  
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? Storage::disk('public')->url($value) : null,
            set: fn($value) => $value ? $value->store('student', 'public') : null,
        );
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->position = static::max('position') + 1;
        });
    }
    public function course():BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
  
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function requiredDocuments()
    {
        return $this->hasMany(RequiredDocument::class);
    }
}
