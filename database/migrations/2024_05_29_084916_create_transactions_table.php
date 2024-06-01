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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('transaction_no')->unique();

            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');

            
            $table->foreignUuid('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('restrict');

            
            $table->foreignUuid('package_id')->references('id')->on('packages')->onDelete('restrict')->onUpdate('restrict');

            
            $table->integer('amount');
            $table->string('status');
            $table->integer('total_payment');
        });

        // Schema::table('transactions', function ($table) {
            
            
            
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
