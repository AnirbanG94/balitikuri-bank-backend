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
        Schema::create('term_deposit_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->text('header');
            $table->string('fixed_deposit');
            $table->string('monthly_income_scheme');
            $table->string('cash_certificate');
            $table->text('recurring_deposit_account');
            $table->string('nitya_nidhi');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_deposit_requirements');
    }
};
