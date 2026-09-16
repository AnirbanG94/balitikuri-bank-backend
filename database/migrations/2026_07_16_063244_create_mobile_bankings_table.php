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
        Schema::create('mobile_bankings', function (Blueprint $table) {
            $table->id();

            $table->text('activate_mobile_banking_point_one');
            $table->text('activate_mobile_banking_point_two');
            $table->text('activate_mobile_banking_point_three');
            $table->text('activate_mobile_banking_point_four');
            $table->text('activate_mobile_banking_point_five');
            $table->text('activate_mobile_banking_point_six');
            $table->text('activate_mobile_banking_point_seven');

            $table->text('features_point_one');
            $table->text('features_point_two');
            $table->text('features_point_three');
            $table->text('features_point_four');
            $table->text('features_point_five');
            $table->text('features_point_six');
            $table->text('features_point_seven');
            $table->text('features_point_eight');
            $table->text('features_point_nine');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_bankings');
    }
};