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
            $table->increments('id');
            $table->string('nama', 50);
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('no_hp',15);
            $table->text('alamat');
            $table->char('nik');
            $table->string('pekerjaan',30);
            $table->string('pendidikan',30);
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
