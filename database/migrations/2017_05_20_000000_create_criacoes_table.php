<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriacoesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'criacoes';

    /**
     * Run the migrations.
     * @table criacoes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idcriacao');
            $table->integer('casal_idCasal');
            $table->timestamps();
            $table->index(["casal_idCasal"], 'fk_criacao_casal1_idx');


            $table->foreign('casal_idCasal', 'fk_criacao_casal1_idx')
                ->references('idCasal')->on('casais')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}