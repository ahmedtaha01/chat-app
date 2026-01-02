<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMessageUserTable extends Migration
{
    public function up()
    {
        Schema::table('message_user', function (Blueprint $table) {
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('message_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['message_id']);
        });
    }
}