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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');
            $table->boolen('Status');
            $table->foreignId('Permission_Balance_id')->constrained('permission_balances','id')->restrictOnDelete();
            $table->foreignId('Permission_Type_id')->constrained('permission_types','id')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
