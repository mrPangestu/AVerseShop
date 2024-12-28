<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Untuk user yang login
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Produk terkait
            $table->integer('quantity')->default(1); // Kuantitas produk
            $table->decimal('price', 10, 2); // Harga per item
            $table->decimal('total_price', 10, 2); // Total harga = quantity x price
            $table->enum('status', ['active', 'completed'])->default('active'); // Status keranjang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
}

