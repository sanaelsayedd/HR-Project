<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    
  public function up(): void{Schema::create('vecation_types', function (Blueprint $table) {
    $table->id();
    $table->string('TypeName');
    $table->string('Description');
    $table->string('Max_Days');
    $table->timestamps();
});}

    
  public function down(): void{Schema::dropIfExists('vecation_types');}
};