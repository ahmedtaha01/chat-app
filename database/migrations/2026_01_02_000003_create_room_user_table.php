<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomUserTable extends Migration
{
    public function up()
    {
        Schema::create('room_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('role', ['owner', 'admin', 'member']);
            $table->timestamp('joined_at')->useCurrent();
            $table->unique(['room_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_user');
    }
}