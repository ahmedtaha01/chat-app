<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageUserTable extends Migration
{
    public function up()
    {
        Schema::create('message_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('seen_at')->nullable();
            $table->index(['message_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_user');
    }
}