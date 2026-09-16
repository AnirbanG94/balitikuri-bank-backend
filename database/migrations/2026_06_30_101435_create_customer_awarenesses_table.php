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
        Schema::create('customer_awarenesses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('point_one');
            $table->text('point_two');
            $table->text('point_three');
            $table->text('point_four');
            $table->text('point_five');
            $table->text('point_six');
            $table->text('point_seven');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_awarenesses');
    }
};
