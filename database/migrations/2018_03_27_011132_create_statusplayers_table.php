<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusplayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('statusplayer', function (Blueprint $table) {
            $table->increments('id',8);
            $table->string('username',32)->unique();
            $table->integer('stamina')->length(16);
            $table->integer('sanity')->length(16);
            $table->timestamps('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('statusplayer');
    }
}
