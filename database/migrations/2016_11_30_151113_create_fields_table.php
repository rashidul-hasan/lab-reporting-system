<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function(Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('name');
            $table->string('unit')->nullable();
            $table->string('normal')->nullable();
            $table->string('abnormal')->nullable();
            $table->string('ref_range')->nullable();
            $table->integer('test_id')->unsigned()->nullable();
            $table->timestamps();
            
        });

        Schema::table('fields', function($table){

            $table->foreign('test_id')
                  ->references('id')->on('tests')
                  ->onDelete('set null');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fields');
    }
}
