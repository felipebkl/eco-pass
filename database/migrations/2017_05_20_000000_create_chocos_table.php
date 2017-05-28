<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChocosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'chocos';

    /**
     * Run the migrations.
     * @table chocos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idChoco');
            $table->dateTime('dataInicio');
            $table->string('local', 45);
            $table->dateTime('dataFim')->nullable();
            $table->text('obs')->nullable();
            $table->integer('criacao_idcriacao');
            $table->integer('quantiaOvos')->nullable();
            $table->timestamps();

            $table->index(["criacao_idcriacao"], 'fk_Choco_criacao1_idx');


            $table->foreign('criacao_idcriacao', 'fk_Choco_criacao1_idx')
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
