<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->bigIncrements('ARQU_ID');
            $table->string('ARQU_NM',50);
            $table->string('ARQU_TP',50);
            $table->string('ARQU_PATH',255);
            $table->binary('ARQU_BT');
            $table->unsignedBigInteger('PETI_ID_FK');
            $table->foreign('PETI_ID_FK')->references('PETI_ID')->on('peticaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arquivos', function (Blueprint $table){
            $table->dropForeign('PETI_ID_FK');
         });
    }
};
