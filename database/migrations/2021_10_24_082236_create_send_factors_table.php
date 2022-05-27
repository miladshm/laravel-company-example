<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_factors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factor_id');
            $table->unsignedBigInteger('send_method_id');
            $table->string('send_price',15);
            $table->enum('status', ['pending', 'stocked', 'posted', 'cancel']);
            $table->text('address');
            $table->string('post_tracking')->nullable();
            $table->timestamp('stocked_at')->nullable();
            $table->timestamp('posted_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
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
        Schema::dropIfExists('send_factors');
    }
}
