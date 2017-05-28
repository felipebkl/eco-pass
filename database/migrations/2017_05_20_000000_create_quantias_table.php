<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantiasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'quantias';

    /**
     * Run the migrations.
     * @table quantias
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idQuantia');
            $table->timestamp('data')->nullable();
            $table->unsignedInteger('copula_idcopula');
            $table->timestamps();
            $table->index(["copula_idcopula"], 'fk_quantia_copula1_idx');


            $table->foreign('copula_idcopula', 'fk_quantia_copula1_idx')
                ->references('idcopula')->on('copulas')
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
