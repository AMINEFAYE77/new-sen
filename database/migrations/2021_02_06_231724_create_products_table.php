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
            $table->string('name', 255);
            $table->string('description', 500);
            $table->string('image')->nullable();
            $table->string('lieu');
            $table->integer('superficie');
            $table->boolean('status')->default(false);
            $table->decimal('price', 22)->nullable()->default(0.00);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('commune_id');
            $table->unsignedBigInteger('type_product_id');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('type_product_id')->references('id')->on('type_products')->onDelete('cascade');
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
