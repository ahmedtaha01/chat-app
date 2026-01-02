<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('last_message_id')->references('id')->on('messages')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['last_message_id']);
            $table->dropForeign(['creator_id']);
        });
    }
}