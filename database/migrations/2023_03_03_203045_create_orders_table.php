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
            $table->bigIncrements('id');
            $table->foreignId('user_id');
            $table->string('user_name');
            $table->string('Phone');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('product_name');
            $table->string('image');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('qty');
            $table->string('price');
            $table->enum('status',['Pending','Confirm'])->default('Pending');
            $table->timestamps();
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
