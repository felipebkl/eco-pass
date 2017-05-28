<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasaisTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'casais';

    /**
     * Run the migrations.
     * @table casais
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idCasal');
            $table->integer('gaiola');
            $table->timestamps();
            $table->unsignedInteger('passaro_idPassaro_macho');
            $table->unsignedInteger('passaro_idPassaro_femea');

            $table->index(["passaro_idPassaro_macho"], 'fk_casal_macho_idx');

            $table->index(["passaro_idPassaro_femea"], 'fk_casal_femea_idx');


            $table->foreign('passaro_idPassaro_macho', 'fk_casal_macho_idx')
                ->references('idPassaro')->on('passaros')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('passaro_idPassaro_femea', 'fk_casal_femea_idx')
                ->references('idPassaro')->on('passaros')
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
