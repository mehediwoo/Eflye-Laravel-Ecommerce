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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->foreignId('category_id');
            $table->foreignId('sub_cat_id')->nullable();
            $table->mediumText('short_description');
            $table->longText('desc');
            $table->string('thumbnail');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->integer('qty');
            $table->string('price');
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
