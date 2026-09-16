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
        Schema::create('house_building_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desc');
            $table->string('eligibility');
            $table->text('purpose_point_one');
            $table->text('purpose_point_two');
            $table->text('max_amt_loan_point_one');
            $table->text('max_amt_loan_point_two');
            $table->string('processing_fee');
            $table->string('processing_fee_repayment');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_building_loans');
    }
};
