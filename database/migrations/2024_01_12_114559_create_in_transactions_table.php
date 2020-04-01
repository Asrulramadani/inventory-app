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
        Schema::create('in_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code');
            $table->foreignId('id_stock')->nullable()->constrained();
            $table->integer('total_item');
            $table->text('information');
            $table->foreignId('id_unit')->nullable()->constrained();
            $table->foreignId('id_category')->nullable()->constrained();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_transactions');
    }
};
