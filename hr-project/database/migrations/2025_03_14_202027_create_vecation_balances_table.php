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
        Schema::create('vecation_balances', function (Blueprint $table) {
                $table->id();
                $table->float('Total_balance');
                $table->dateTime('Total_Days');
                $table->integer('Remaining_Days');
                $table->foreignId('emloyee_id')->constrained('emloyees','id')->restrictOnDelete();
                $table->foreignId('vecation_type_id')->constrained('vecation_types','id')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vecation_balances');
    }
};
