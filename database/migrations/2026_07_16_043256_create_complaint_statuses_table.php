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
        Schema::create('complaint_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile', 10);
            $table->string('address');
            $table->string('ph_no');
            $table->enum('status', ['Pending', 'Resolved'])->default('Pending');
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_statuses');
    }
};
