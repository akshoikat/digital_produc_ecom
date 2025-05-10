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
        Schema::create('top_up_products', function (Blueprint $table) {
            $table->id();
              $table->foreignId('game_id')->constrained()->onDelete('cascade'); // গেমের সাথে সম্পর্কিত
            $table->string('product_name');
            $table->decimal('amount', 8, 2); // পরিমাণ (যেমন UC বা অন্যান্য)
            $table->decimal('price', 8, 2); // প্রাইজ (BDT/USD)
            $table->string('delivery_time'); // ডেলিভারি সময়
            $table->text('instructions'); // নির্দেশনা
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_up_products');
    }
};
