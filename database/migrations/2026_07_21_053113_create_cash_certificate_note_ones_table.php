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
        Schema::create('cash_certificate_note_ones', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cash_certificate_note_one_point_one');
            $table->text('cash_certificate_note_one_point_two');
            $table->text('cash_of_monthly_income_scheme_note_two_point_one');
            $table->text('note_three');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_certificate_note_ones');
    }
};
