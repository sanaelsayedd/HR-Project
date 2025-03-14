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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('Start_Date');
            $table->dateTime('End_Date');
            $table->float('Growth_Salary');
            $table->float('Net_Salary');
            $table->foreignId('job_position_id')->constrained('job_positions','id')->restrictOnDelete();
            $table->foreignId('employee_id')->constrained('employees','id')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
