<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
  public function up(): void{Schema::create('permission_balances', function (Blueprint $table) {
    $table->id();
    $table->integer('Balance_Amount');
    $table->foreignId('employee_id')->constrained('employees','id')->restrictOnDelete();
    $table->foreignId('permissions_id')->constrained('permissions','id')->restrictOnDelete();
    $table->timestamps();
});}


  public function down(): void{Schema::dropIfExists('permission_balances');}
};