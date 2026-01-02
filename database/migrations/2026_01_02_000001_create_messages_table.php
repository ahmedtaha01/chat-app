<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');
            $table->text('body')->nullable();
            $table->enum('type', ['text', 'image', 'video', 'voice', 'system']);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->bigInteger('sequence')->unsigned();
            $table->boolean('is_edited')->default(false);
            $table->timestamps();
            $table->softDeletes(); // deleted_at nullable
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}