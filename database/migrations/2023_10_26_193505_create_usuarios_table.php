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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('USUA_ID');
            $table->string('USUA_NM',50)->nullable();
            $table->string('USUA_CD_CPF',20)->unique();
            $table->string('USUA_RG',20)->nullable();
            $table->string('USUA_PROF',50)->nullable();
            $table->string('USUA_NACIO',50)->nullable();
            $table->string('USUA_ES_CIVIL',50)->nullable();
            $table->string('USUA_TX_EMAIL')->unique();
            $table->string('USUA_TX_SENHA');
            $table->string('token');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('confirmation_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
