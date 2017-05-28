<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopulasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'copulas';

    /**
     * Run the migrations.
     * @table copulas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idcopula');
            $table->integer('criacao_idcriacao');
            $table->timestamps();

            $table->index(["criacao_idcriacao"], 'fk_copula_criacao1_idx');


            $table->foreign('criacao_idcriacao', 'fk_copula_criacao1_idx')
                ->references('idcriacao')->on('criacoes')
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