<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('summary')->nullable();
            $table->text('body')->nullable();
            $table->string('type')->default('article');
            $table->timestamp('published_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('is_active')->default(false);
            $table->string('photo')->nullable();
            $table->string('file')->nullable();
            $table->string('file_source')->nullable();
            $table->foreignId('author_id')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
