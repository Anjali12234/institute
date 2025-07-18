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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('billing_date')->nullable();
            $table->string('received_amount');
            $table->string('due');
            $table->string('paid_by');
            $table->string('payment_type')->nullable();
            $table->string('payment_method');
            $table->string('remarks');
            $table->boolean('status')->default('1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
