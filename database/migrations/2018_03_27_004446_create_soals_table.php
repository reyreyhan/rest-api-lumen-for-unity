<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('soals', function (Blueprint $table) {
            $table->increments('id',8);
            $table->integer('id_posisi')->length(4);
            $table->text('soal');
            $table->string('A',64);
            $table->string('B',64);
            $table->string('C',64);
            $table->string('D',64);
            $table->string('benar',64);
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
        Schema::dropIfExists('soals');
    }
}
