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
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name',150);
            $table->text('description')->nullable();
            $table->text('username')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('location_details')->nullable();
            $table->float('price')->nullable();
            $table->integer('qty')->nullable();
            $table->float('discount')->nullable();
            $table->string('status',10)->nullable();
            $table->string('category_name',100)->nullable();
            $table->string('location_name',100)->nullable();
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
