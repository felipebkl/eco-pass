<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassarosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'passaros';

    /**
     * Run the migrations.
     * @table passaros
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPassaro');
            $table->string('anilha');
            $table->string('nome');
            $table->dateTime('dataNasc');
            $table->timestamp('dataCadastro')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->unsignedInteger('especie_idEspecie');
            $table->unsignedInteger('sexo_idsexo');
            $table->integer('idPai')->nullable();
            $table->integer('idMae')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('users_id');
            $table->timestamps();
            $table->index(["users_id"], 'fk_passaros_users1_idx');

            $table->index(["sexo_idsexo"], 'fk_passaro_sexo1_idx');

            $table->index(["especie_idEspecie"], 'fk_passaro_especie_idx');

            $table->unique(["anilha"], 'anilha');


            $table->foreign('especie_idEspecie', 'fk_passaro_especie_idx')
                ->references('idEspecie')->on('especies')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('sexo_idsexo', 'fk_passaro_sexo1_idx')
                ->references('idsexo')->on('sexos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_passaros_users1_idx')
                ->references('id')->on('users')
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
