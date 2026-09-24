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
            // Location hierarchy for dependent dropdowns
            $table->unsignedBigInteger('country_id')->nullable()->after('ph_no');
            $table->unsignedBigInteger('state_id')->nullable()->after('country_id');
            $table->unsignedBigInteger('city_id')->nullable()->after('state_id');

            // Card application parameters
            $table->string('employment_type')->nullable()->after('city_id');
            $table->string('card_type')->after('employment_type');
            $table->decimal('account_balance', 15, 2)->default(0.00)->after('card_type');
            $table->decimal('charges_applicable', 10, 2)->default(0.00)->after('account_balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apply_debit_cards', function (Blueprint $table) {
            $table->dropColumn([
                'country_id',
                'state_id',
                'city_id',
                'employment_type',
                'card_type',
                'account_balance',
                'charges_applicable'
            ]);
        });
    }
};