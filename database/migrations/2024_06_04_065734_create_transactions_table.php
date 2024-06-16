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
            // Define columns
            $table->id();
            $table->string('transactionNumber')->unique(); 
            $table->dateTime('transactionDateTime');
            $table->string('transactionStatus');
            $table->integer('transactionPaymentMethod'); 
            $table->integer('amount');
            $table->integer('transactionTotal');
            $table->string('userEmail'); // Foreign Key
            $table->unsignedBigInteger('customer_id'); // Foreign Key
            $table->unsignedBigInteger('package_id'); // Foreign Key
            
            // Define foreign key constraints
            $table->foreign('userEmail')->references('userEmail')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            
            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};