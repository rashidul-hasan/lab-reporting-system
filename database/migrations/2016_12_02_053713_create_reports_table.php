<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function(Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('sample_id')->unsigned()->nullable();
            $table->json('results');
            $table->text('remarks');
            
            $table->timestamps();
        });

        Schema::table('reports', function($table){

            $table->foreign('sample_id')
                  ->references('id')->on('samples')
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
        Schema::drop('reports');
    }
}
