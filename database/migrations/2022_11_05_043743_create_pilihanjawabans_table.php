<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilihanjawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihanjawabans', function (Blueprint $table) {
            $table->id();
            $table->string('pilihan_jawaban');
            $table->integer('poin')->unsigned()->default(1);
            $table->foreignId('pertanyaan_id')->constrained();
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
        Schema::dropIfExists('pilihanjawabans');
    }
}