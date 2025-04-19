<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
  public function up(): void{Schema::create('permission_balances', function (Blueprint $table) {
    $table->id();
    $table->integer('Balance_Amount');
    $table->foreignUuid('employee_id')->constrained('users','id')->restrictOnDelete();
    $table->foreignId('permissions_id')->constrained('user_permissions','id')->restrictOnDelete();
    $table->timestamps();
});
}


  public function down(): void{Schema::dropIfExists('permission_balances');}
};