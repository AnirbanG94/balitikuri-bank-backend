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
        Schema::table('apply_debit_cards', function (Blueprint $table) {
            $table->string('applicant_image')->nullable()->after('charges_applicable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apply_debit_cards', function (Blueprint $table) {
            $table->dropColumn('applicant_image');
        });
    }
};