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
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('category_id');
            $table->string('images');
            $table->string('title');
            $table->string('metaTitle')->nullable();
            $table->string('slug');
            $table->text('summary');
            $table->smallInteger('type');
            $table->string('sku');
            $table->string('colors')->nullable();
            $table->string('sizes')->nullable();
            $table->float('price');
            $table->float('old_price')->nullable();
            $table->float('discount')->nullable();
            $table->smallInteger('quantity');
            $table->dateTime('startsAt')->nullable();
            $table->dateTime('endsAt')->nullable();
            $table->text('content');
            $table->enum('is_published', ['1', '0']);
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

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