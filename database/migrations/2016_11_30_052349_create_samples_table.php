<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function(Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->enum('sample_type', ['blood', 'urine']);
            $table->date('collect_date');
            $table->integer('patient_id')->unsigned()->nullable();
            $table->integer('test_id')->unsigned()->nullable();
            $table->integer('appointment_id')->unsigned()->nullable();
            $table->timestamps();
            
        });


        Schema::table('samples', function($table) {

           $table->foreign('patient_id')
                  ->references('id')->on('patients')
                  ->onDelete('set null');

            $table->foreign('test_id')
                  ->references('id')->on('tests')
                  ->onDelete('set null');

            $table->foreign('appointment_id')
                  ->references('id')->on('appointments')
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
        Schema::drop('samples');
    }
}
