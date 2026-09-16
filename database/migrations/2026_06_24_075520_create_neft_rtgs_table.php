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
        Schema::create('neft_rtgs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('about_neft');
            $table->text('about_rtgs');
            $table->text('about_bank_trf');
            $table->text('rtgs_desc');
            $table->text('neft_desc');
            $table->string('min_max_amt_type_retail');
            $table->string('min_rtgs_ret');
            $table->string('max_rtgs_ret');
            $table->string('min_neft_ret');
            $table->string('max_neft_ret');
            $table->string('min_max_amt_type_corporate');
            $table->string('min_rtgs_corporate');
            $table->string('max_rtgs_corporate');
            $table->string('min_neft_corporate');
            $table->string('max_neft_corporate');
            $table->text('ben_rtgs');
            $table->text('ben_neft');
            $table->string('rtgs_trn_rbi_weekday');
            $table->string('rtgs_trn_rbi_saturday');
            $table->string('rtgs_trn_rbi_start_time_weekday');
            $table->string('rtgs_trn_rbi_end_time_weekday');
            $table->string('rtgs_trn_rbi_start_time_sat');
            $table->string('rtgs_trn_rbi_end_time_sat');
            $table->string('neft_trn_rbi_weekday');
            $table->string('neft_trn_rbi_saturday');
            $table->string('neft_trn_rbi_start_time_weekday');
            $table->string('neft_trn_rbi_end_time_weekday');
            $table->string('neft_trn_rbi_start_time_sat');
            $table->string('neft_trn_rbi_end_time_sat');
            $table->string('service_chrg_type_rtgs');
            $table->string('service_chrg_type_rtgs_hrs_morning');
            $table->string('service_chrg_type_rtgs_hrs_noon');
            $table->string('service_chrg_type_rtgs_hrs_afternoon');
            $table->string('service_chrg_rtgs_hrs_morning');
            $table->string('service_chrg_rtgs_hrs_noon');
            $table->string('service_chrg_rtgs_hrs_afternoon');
            $table->string('service_chrg_type_neft');
            $table->string('service_chrg_neft_one');
            $table->string('service_chrg_neft_two');
            $table->string('service_chrg_neft_three');
            $table->string('whom_to_contact');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neft_rtgs');
    }
};
