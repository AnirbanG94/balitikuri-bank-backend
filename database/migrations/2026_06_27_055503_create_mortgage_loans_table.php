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
        Schema::create('mortgage_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desc');
            $table->text('point_one');
            $table->text('point_two');
            $table->text('point_three');
            $table->text('criteria_to_avail_point_one');
            $table->text('criteria_to_avail_point_two');
            $table->text('criteria_to_avail_point_three');
            $table->text('criteria_to_avail_point_four');
            $table->text('criteria_to_avail_point_five');
            $table->text('criteria_to_avail_point_six');
            $table->text('criteria_to_avail_point_seven');
            $table->text('criteria_to_avail_point_eight');
            $table->text('criteria_to_avail_point_nine');
            $table->text('criteria_to_avail_point_ten');
            $table->text('criteria_to_avail_point_eleven');
            $table->text('criteria_to_avail_point_twelve');
            $table->text('criteria_to_avail_point_thirteen');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgage_loans');
    }
};
