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
        Schema::create('debit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desc');
            $table->text('features_point_one');
            $table->text('features_point_two');
            $table->text('features_point_three');
            $table->text('features_point_four');
            $table->text('features_point_five');
            $table->text('features_point_six');
            $table->text('usage_point_one');
            $table->text('usage_point_two');
            $table->text('usage_point_three');
            $table->text('usage_point_four');
            $table->text('usage_point_five');
            $table->text('usage_point_six');
            $table->text('usage_point_seven');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debit_cards');
    }
};
