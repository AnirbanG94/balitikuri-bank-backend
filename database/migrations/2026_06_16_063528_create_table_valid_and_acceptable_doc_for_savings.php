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
        Schema::create('valid_and_acceptable_doc_for_savings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pan_card');
            $table->string('aadhar_card');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valid_and_acceptable_doc_for_savings');
    }
};
