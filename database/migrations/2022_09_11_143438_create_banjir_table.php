<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banjir', function (Blueprint $table) {
            $table->increments('id_banjir');
            $table->date('tgl_kejadian');
            $table->string('kecamatan');
            // $table->string('kelurahan');
            // $table->string('titik_bencana');
            $table->string('terdampak_kk');
            $table->string('terdampak_jiwa');
            $table->enum('kerusakan', ['berat', 'sedang', 'ringan']);
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
        Schema::dropIfExists('banjir');
    }
}
