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
        Schema::create('loan_type_taken', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('ph_no');
            $table->enum('loan_type', ['cash_credit', 'gold_loan','mortgage_loan','house_building_loan'])->default('cash_credit');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_interest_rates');
    }
};
