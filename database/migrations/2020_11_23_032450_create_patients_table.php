<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('no_hp',15);
            $table->text('alamat');
            $table->string('pekerjaan',30);
            $table->string('pendidikan',30);
            $table->string('rt',5);
            $table->string('rw',5);
            $table->string('kelurahan',50);
            $table->string('kecamatan', 50);
            $table->string('kota',50);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
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
        Schema::dropIfExists('patients');
    }
}