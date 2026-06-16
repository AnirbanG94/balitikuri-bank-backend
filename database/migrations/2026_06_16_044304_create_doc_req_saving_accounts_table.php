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
        Schema::create('doc_req_saving_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identity_proof');
            $table->string('address_proof');
            $table->string('stamp_size_photo');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_req_saving_accounts');
    }
};
