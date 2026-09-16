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
        Schema::create('imps', function (Blueprint $table) {
            $table->increments('id');
            $table->text('about_imps');
            $table->string('feature_one');
            $table->string('feature_two');
            $table->string('feature_three');
            $table->string('feature_four');
            $table->string('feature_five');
            $table->string('feature_six');
            $table->string('feature_seven');
            $table->string('trf_fund_imps_one');
            $table->string('trf_fund_imps_two');
            $table->string('trf_fund_imps_three');
            $table->string('trf_fund_imps_four');
            $table->string('trf_fund_imps_five');
            $table->string('trf_fund_imps_six');
            $table->string('trf_fund_imps_seven');
            $table->string('trf_fund_imps_eight');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imps');
    }
};
