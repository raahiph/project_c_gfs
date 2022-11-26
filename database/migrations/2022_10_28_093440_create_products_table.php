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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->foreignId('unit_type_id')->constrained('unit_types');
            $table->integer('units');
            $table->integer('price');
            $table->integer('current_stock');
            $table->boolean('availability')->default(1);
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->string('storage_location')->nullable();
            $table->boolean('status')->default(true);                           // Active, Inactive
            $table->longText('image')->nullable();
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
        Schema::dropIfExists('products');
    }
};
