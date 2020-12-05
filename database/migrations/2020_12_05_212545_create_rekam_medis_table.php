<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('dokter_id')->unsigned();
            $table->tinyInteger('pelayanan_id')->unsigned();
            $table->string('diagnosa');
            $table->string('keluhan');
            $table->text('anamnesis')->default('-');
            $table->string('tindakan', 150);
            $table->text('keterangan')->default('-');
            $table->string('alergi_obat', 1)->default('0');
            $table->string('berat_badan', 8);
            $table->string('tinggi_badan', 8);
            $table->string('tensi', 7);
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
        Schema::dropIfExists('rekam_medis');
    }
}
