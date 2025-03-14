<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
  public function up(): void{Schema::create('permission_types', function (Blueprint $table) {
    $table->id();
    $table->string('TypeName');
    $table->string('Description');
    $table->string('Status');
    $table->timestamps();
});}

    
  public function down(): void{Schema::dropIfExists('permission_types');}
};