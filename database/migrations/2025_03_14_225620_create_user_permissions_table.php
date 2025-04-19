<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
  public function up(): void{Schema::create('user_permissions', function (Blueprint $table) {
    $table->id();
    $table->dateTime('StartDate');
    $table->dateTime('EndDate');
    $table->boolean('Status');
    $table->foreignId('Permission_Type_id')->constrained('permission_types','id')->restrictOnDelete();
    $table->timestamps();
});}

    
  public function down(): void{Schema::dropIfExists('user_permissions');}
};