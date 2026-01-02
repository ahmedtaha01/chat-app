<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageEditsTable extends Migration
{
    public function up()
    {
        Schema::create('message_edits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('user_id'); // who made this version
            $table->text('old_body')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index('message_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_edits');
    }
}