<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'billing_date',
        'received_amount',
        'due',
        'paid_by',
        'payment_type',
        'payment_method',
        'remarks',
        'status',
       
    ];

    



    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
