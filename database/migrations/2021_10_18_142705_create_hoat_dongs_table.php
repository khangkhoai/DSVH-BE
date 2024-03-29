<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoatDongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoat_dongs', function (Blueprint $table) {
            $table->id();
            $table->integer('disan_id');
            $table->string('ten');
            $table->longText('mota');
            $table->date('batdau');
            $table->date('ketthuc');
            $table->string('anh');
            $table->string('diadiem');
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
        Schema::dropIfExists('hoat_dongs');
    }
}
