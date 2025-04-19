<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
  public function up(): void{Schema::create('payrolls', function (Blueprint $table) {
    $table->id();
    $table->float('Amount');
    $table->float('Deduction');
    $table->float('Bonus');
    $table->dateTime('date');
    $table->foreignUuid('employee_id')->constrained('users','id')->restrictOnDelete();
    $table->timestamps();});}


  public function down(): void{Schema::dropIfExists('payrolls');}
};