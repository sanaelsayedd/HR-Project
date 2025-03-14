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
        Schema::create('vecations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees','id')->restrictOnDelete();
            $table->foreignId('VacationTypeID')->constrained('vecation_types','id')->restrictOnDelete();
            $table->dateTime('Start_Date');
            $table->dateTime('End_Date');
            $table->string('Duration');
            $table->dateTime('RequestDate');
            $table->dateTime('ApprovalDate');
            $table->string('Status');
            $table->string('Comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vecations');
    }
};