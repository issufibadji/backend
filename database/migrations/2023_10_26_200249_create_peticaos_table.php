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
        Schema::create('peticaos', function (Blueprint $table) {
            $table->bigIncrements('PETI_ID');
            $table->bigInteger('PETI_PROC')->nullable();
            $table->string('PETI_TIPO_PROC',255);
            $table->string('PETI_ORG',50);
            $table->dateTime('PETI_DTH')->nullable();;
            $table->string('PETI_DESC_MEDI',255);
            $table->string('PETI_ESPE_MEDI',255);
            $table->string('PETI_SINT_INCA',255);
            $table->string('PETI_ATIV_EXER',255);
            $table->string('PETI_DESC_INDI',255);
            $table->float('PETI_VAL_INDI', 8, 2);
            $table->string('PETI_CIEN_ACAO', 5);
            $table->string('PETI_REN_VAL',5);
            $table->boolean('PETI_RECE_EMAIL');
            $table->unsignedBigInteger('USUA_ID_FK');
            $table->foreign('USUA_ID_FK')->references('USUA_ID')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peticaos',function (Blueprint $table){
            $table->dropForeign('USUA_ID_FK');
          });
    }
};
