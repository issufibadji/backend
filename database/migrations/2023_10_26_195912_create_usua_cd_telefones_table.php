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
        Schema::create('usua_cd_telefones', function (Blueprint $table) {
            $table->increments('USUA_CD_TELEFONE_ID');
            $table->string('USUA_CD_TELEFONE');
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
        Schema::dropIfExists('usua_cd_telefones',function (Blueprint $table){
            $table->dropForeign('USUA_ID_FK');

          });
        }
};
