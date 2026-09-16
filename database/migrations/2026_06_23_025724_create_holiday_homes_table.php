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
        Schema::create('holiday_homes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('holiday_home_name');
            $table->string('no_of_rooms');
            $table->string('rooms_desc');
            $table->string('room_no');
            $table->string('room_type');
            $table->string('room_occupancy');
            $table->string('members_non_members');
            $table->string('contact_info_phone');
            $table->string('booking_add_one');
            $table->string('booking_add_two');
            $table->string('booking_add_three');
            $table->string('email');
            $table->string('website');
            $table->string('content_one');
            $table->string('content_twwo');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_homes');
    }
};
