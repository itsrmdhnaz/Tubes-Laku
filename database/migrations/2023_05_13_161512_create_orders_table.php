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
            $table->string('order_id')->default("")->primary();
            $table->timestamp('order_date')->nullable();
            $table->timestamp('pickup_date')->nullable();
            $table->timestamp('process_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->timestamp('received_date')->nullable();
            $table->string('message_order')->nullable();
            $table->double('total_price')->default(0);
            $table->string('address_id');
            $table->string('user_id');
            $table->string('courier_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('method_order')->default(0);
            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('is_read_kurir')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('address_id')->on('addresses')->onDelete('cascade');
            $table->foreign('courier_id')->references('user_id')->on('users')->onDelete('set null');
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
