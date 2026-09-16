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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->string('account_no',30);
            $table->string('branch');

            $table->string('name');
            $table->text('address');
            $table->string('phone_no',10);
            $table->string('email')->nullable();

            $table->enum('complaint_type',[
                'Transaction Related',
                'Non Transaction Related'
            ]);
            $table->string('transaction_type')->nullable();

            $table->string('debit_card_no')->nullable();

            $table->string('reference_no')->nullable();

            $table->date('transaction_date')->nullable();

            $table->decimal('transaction_amount',12,2)->nullable();

            $table->text('complaint_details')->nullable();
            $table->softdeletes();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
