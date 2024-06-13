<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // This is an auto-incrementing ID column
            $table->string('uuid', 36)->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['shampoo', 'soap']);
            $table->decimal('price', 8, 2);
            $table->integer('stock_quantity');
            $table->string('brand')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
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
}
