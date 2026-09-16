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
        Schema::create('daily_deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desc');
            $table->text('scheme_desc');
            $table->text('scheme_desc_point_one');
            $table->text('scheme_desc_point_two');
            $table->text('scheme_desc_point_three');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_deposits');
    }
};
