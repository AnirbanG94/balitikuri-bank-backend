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
        Schema::create('locker_features', function (Blueprint $table) {
            $table->increments('id');
            $table->text('header_one');
            $table->string('point_one');
            $table->string('point_two');
            $table->string('point_three');
            $table->string('point_four');
            $table->string('point_five');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locker_features');
    }
};
