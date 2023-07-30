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
        Schema::create('golongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kepegawaian_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nip');
            $table->string('jabatan');
            $table->string('pergolongan');
            $table->date('tmt_masuk');
            $table->date('tmt_keluar');
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
        Schema::dropIfExists('golongans');
    }
};
