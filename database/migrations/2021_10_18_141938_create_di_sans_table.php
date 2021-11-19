<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiSansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('di_sans', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->longText('mota');
            $table->string('anh');
            $table->string('video');
            $table->string('audio');
            $table->integer('luotxem');
            $table->integer('loai_id');
            $table->integer('cap_id');
            $table->string('diadiem');
            $table->string('xa');
            $table->string('huyen');
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
        Schema::dropIfExists('di_sans');
    }
}
