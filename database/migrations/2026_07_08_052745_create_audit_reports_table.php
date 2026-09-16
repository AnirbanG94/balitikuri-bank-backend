<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
        {
            Schema::create('audit_reports', function (Blueprint $table) {

                $table->id();

                $table->string('audit_year');

                $table->string('report_name');

                $table->string('pdf_path');

                $table->timestamps();

            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_reports');
    }
};
