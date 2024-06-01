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
        Schema::create('reports', function (Blueprint $table) {
            $table->integer('report_id')->primary();
            $table->timestamps();
            $table->string('report_no')->unique();
            
            $table->foreignUuid('transaction_id')->references('id')->on('transactions')->onDelete('restrict')->onUpdate('restrict');
            
            $table->text('report_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
