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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('First_Name');
            $table->string('Last_name');
            $table->string('Email');
            $table->dateTime('birthdate');
            $table->string('Gender');
            $table->string('PhoneNumber');
            $table->foreignId('job_position_id')->constrained('job_positions','id')->restrictOnDelete();
            $table->foreignId('Manager_id')->constrained('employees','id')->restrictOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
