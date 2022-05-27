<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optionable', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id');
            $table->morphs('model');
            $table->boolean('is_visible');
            $table->boolean('is_variable');
            $table->softDeletes();
            $table->timestamps();

            $table->primary(['option_id', 'model_id', 'model_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('optionables');
    }
}
