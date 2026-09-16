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
        Schema::create('terms_conditions_current_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trade_license');
            $table->string('prof_tax_enroll');
            $table->string('prof_tax_challan');
            $table->string('aadhar_card');
            $table->string('pan_card');
            $table->string('business_address_proof');
            $table->string('photograph');
            $table->string('partnership_deeds');
            $table->string('memorandum');
            $table->string('minimum_balance');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_conditions_current_account');
    }
};
