<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRoomUserTable extends Migration
{
    public function up()
    {
        Schema::table('room_user', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('room_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['room_id']);
        });
    }
}
