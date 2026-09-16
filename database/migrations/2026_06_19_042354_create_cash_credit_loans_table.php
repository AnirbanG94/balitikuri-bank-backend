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
        Schema::create('cash_credit_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trade_license');
            $table->string('prof_tax');
            $table->string('current_electric_bill');
            $table->string('p_tax_challan');
            $table->string('rent_receipt');
            $table->string('pan_card');
            $table->string('gst_details');
            $table->string('sales_tax_no');
            $table->string('balance_sheet');
            $table->string('ssi_cert');
            $table->string('pollution_certificate');
            $table->string('machinery_dtl');
            $table->string('no_of_present_employee');
            $table->string('order_list_dtl');
            $table->string('income_tax_clr_cert');
            $table->string('goods_raw_mat');
            $table->string('insurance_of_stocks');
            $table->string('partnership_deeds');
            $table->string('condition_of_property');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_credit_loans');
    }
};
