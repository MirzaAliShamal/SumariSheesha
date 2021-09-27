<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_products', function (Blueprint $table) {
            $table->id();
            $table->integer('uuid')->unique();
            $table->text('image')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->constrained()->onDelete('cascade');
            $table->foreignId('flavour_id')->nullable()->references('id')->on('flavours')->constrained()->onDelete('cascade');
            $table->foreignId('color_id')->nullable()->references('id')->on('colors')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->constrained()->onDelete('cascade');
            $table->float('price')->default(0);
            $table->integer('quantity')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('availablity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_products');
    }
}
