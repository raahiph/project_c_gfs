<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');;
            $table->foreignId('customer_id')->constrained('customers');
            $table->string('location');
            $table->boolean('payment_status'); // Paid
            $table->string('payment_method'); // Cash, Credit
            $table->integer('quantity');
            $table->integer('total_amount');
            $table->integer('total_paid');
            $table->integer('total_dues');
            $table->string('status');
            $table->string('shipping_details');
            $table->string('notes');
            $table->foreignId('user_id')->constrained('users');
            $table->longText('delivery_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
