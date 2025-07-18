<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('how_know');
            $table->string('gender');
            $table->string('d_o_b')->nullable();
            $table->string('qualification');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('registration_no')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable(); 
            $table->string('parent_name')->nullable();
            $table->string('parent_contact_number')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_contact_number')->nullable();
            $table->string('province_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('local_body_id')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('tole');
            $table->string('admission_date')->nullable();
            $table->string('student_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade');
            $table->longText('remarks')->nullable();          
            $table->boolean('status')->default(true);
            $table->string('student_type')->nullable();
            $table->string('position');
            $table->string('slug')->nullable();
            $table->string('password')->nullable(); 
            $table->rememberToken();                      
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
