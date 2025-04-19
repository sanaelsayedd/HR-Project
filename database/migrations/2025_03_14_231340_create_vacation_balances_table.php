<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
  public function up(): void{Schema::create('vacation_balances', function (Blueprint $table) {
    $table->id();
    $table->float('Total_balance');
    $table->integer('Total_Days');
    $table->integer('Remaining_Days');
    $table->foreignUuid('employee_id')->constrained('users','id')->restrictOnDelete();
    $table->timestamps();
});}

  
  public function down(): void{Schema::dropIfExists('vacation_balances');}
};