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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('END_ID');
            $table->string('END_CEP',50);
            $table->string('END_LOG',255);
            $table->string('END_COMP',50);
            $table->string('END_CID',50);
            $table->string('END_BAI',50);
            $table->string('END_UF',2);
            $table->string('END_REF',255);
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
        Schema::dropIfExists('enderecos', function (Blueprint $table){
            $table->dropForeign('USUA_ID_FK');
          });
    }
};
