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
        Schema::create('holiday_home_descs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desc_one');
            $table->text('desc_two');
            $table->text('location');
            $table->text('facility');
            $table->string('pricing_one');
            $table->string('pricing_two');
            $table->string('pricing_three');
            $table->string('booking_address');
            $table->string('contact_info');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_home_descs');
    }
};
