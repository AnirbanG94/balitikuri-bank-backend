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
        Schema::create('bank_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->text('location');
            $table->text('branch_timing');
            $table->text('commitment');
            $table->text('banking_services');
            $table->text('history');
            $table->text('infrastructure');
            $table->text('locker_facility');
            $table->text('deposits');
            $table->text('loan');
            $table->text('cheque_clearing');
            $table->text('neft_rtgs');
            $table->text('lpg_subsidy');
            $table->text('pay_order');
            $table->text('bank_guarantee');
            $table->text('gst_payment');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_profiles');
    }
};
