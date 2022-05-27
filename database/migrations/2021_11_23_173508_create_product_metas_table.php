<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_metas', function (Blueprint $table) {
            $table->morphs('item');
            $table->string('price',12)->nullable();
            $table->string('sale_price',12)->nullable();
            $table->string('fixed_price',12)->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->unsignedSmallInteger('stock')->default(0);
            $table->string('sku',50)->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->primary(['item_id','item_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_metas');
    }
}
