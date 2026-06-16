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
        Schema::create('contact_branch_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_name');
            $table->string('address');
            $table->string('contact_number');
            $table->string('office_email_id');
            $table->string('main_branch_email_id');
            $table->string('banking_hours');
            $table->string('weekday_timing');
            $table->string('sunday_timing');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_branch_details');
    }
};
