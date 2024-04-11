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
        Schema::create('orders_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Mã số đơn hàng kiểu int
            $table->unsignedBigInteger('product_id'); // Mã sản phẩm kiểu int
            $table->timestamps(); // Tạo cột created_at và updated_at kiểu datetime

            // Tạo foreign key với bảng orders
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            // Tạo foreign key với bảng products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_details');
    }
};
