<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Adicionando a coluna motivo_contatos_id na tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //Atribuindo os valores da coluna motivo_contato para a coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id=motivo_contato');

        //Criando a FK (integridade referencial) e removendo a coluna motivo_contato da tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Criando a coluna motivo_contato da tabela site_contatos e removendo a FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //Atribuindo os valores da coluna motivo_contato_id para a coluna motivo_contatos
        DB::statement('update site_contatos set motivo_contatos=motivo_contato_id');

        //Removendo a coluna motivo_contatos_id na tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
