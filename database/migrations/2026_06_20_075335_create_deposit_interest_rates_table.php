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
        Schema::create('deposit_interest_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('period_in_days');
            $table->string('interest_rate_general');
            $table->string('interest_rate_senior_citizen');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_interest_rates');
    }
};
