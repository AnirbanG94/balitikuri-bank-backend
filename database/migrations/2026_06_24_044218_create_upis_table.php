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
        Schema::create('upis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('about_upi');
            $table->string('feature_one');
            $table->string('feature_two');
            $table->string('feature_three');
            $table->string('feature_four');
            $table->string('feature_five');
            $table->string('feature_six');
            $table->string('feature_seven');
            $table->string('feature_eight');
            $table->string('step_for_reg_one');
            $table->string('step_for_reg_two');
            $table->string('step_for_reg_three');
            $table->string('gen_upi_pin_one');
            $table->string('gen_upi_pin_two');
            $table->string('change_upi_pin_one');
            $table->string('change_upi_pin_two');
            $table->string('change_upi_pin_three');
            $table->string('change_upi_pin_four');
            $table->string('change_upi_pin_five');
            $table->string('change_upi_pin_six');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upis');
    }
};
