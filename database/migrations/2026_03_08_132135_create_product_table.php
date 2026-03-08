<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->integer('price');
            $table->string('unit');
            $table->double('inter')->nullable();
            $table->boolean('is_displayed');
            $table->boolean('has_stock');
            $table->integer('stock')->nullable();
            $table->boolean('limited');
            $table->boolean('discount');
            $table->string('discount_text')->nullable();
            $table->string('image');
            $table->boolean('is_deleted');
            $table->timestamps();
            $table->index(['user_id'], 'IDX_D34A04ADA76ED395');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product');
    }
};
