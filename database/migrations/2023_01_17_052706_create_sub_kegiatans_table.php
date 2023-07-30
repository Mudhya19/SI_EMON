<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kepegawaian_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kegiatan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kode');
            $table->string('nama');
            $table->string('indikator');
            $table->string('target');
            $table->string('satuan');
            $table->string('pagu');
            $table->string('kendala')->nullable();
            $table->string('solusi')->nullable();
            $table->string('tindak_lanjut')->nullable();
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
        Schema::dropIfExists('subkegiatans');
    }
};
