<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('screen_seconds')->nullable();
            $table->integer('screen_amount')->nullable();
            $table->string('session_code')->unique();
            $table->integer('user_id')->nullable();
            $table->integer('time')->nullable();
            $table->integer('aimed_time')->nullable();
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
        Schema::dropIfExists('session_datas');
    }
}
