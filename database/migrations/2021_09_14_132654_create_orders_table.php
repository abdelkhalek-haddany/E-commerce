<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('livreur_id')->nullable();
            $table->text('token')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('city');
            $table->string('province');
            $table->string('phone');
            $table->smallInteger('status')->nullable();
            $table->float('subTotal');
            $table->float('tax')->nullable();
            $table->float('shipping');
            $table->float('total');
            $table->string('promo')->nullable();
            $table->float('discount')->nullable();
            $table->float('grandTotal')->nullable();
            $table->text('content')->nullable();
            $table->enum('confirmation', ['1', '0'])->default('0');
            $table->enum('delivery', ['1', '0'])->default('0');
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('livreur_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
