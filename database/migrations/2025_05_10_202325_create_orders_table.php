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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('game_uid');
            $table->string('sender_number');
            $table->string('transaction_id');
            $table->string('payment_method');
            $table->unsignedBigInteger('top_up_product_id');
            $table->unsignedBigInteger('game_id');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('pending');
            $table->timestamps();

           $table->foreignId('product_id')->constrained('top_up_products')->onDelete('cascade');

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
