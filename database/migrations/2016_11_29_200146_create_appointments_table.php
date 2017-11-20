<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function(Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->nullable();
            $table->integer('test_id')->unsigned()->nullable();
            $table->date('date');
            //$table->string('slot_id'); 
            $table->integer('slot_id')->unsigned()->nullable();

            $table->enum('status', ['done', 'pending', 'processing', 'cancelled']);
            $table->timestamps();
            
        });

        Schema::table('appointments', function($table) {

           $table->foreign('patient_id')
                  ->references('id')->on('patients')
                  ->onDelete('set null');
                  
            $table->foreign('test_id')
                  ->references('id')->on('tests')
                  ->onDelete('set null');

            // $table->foreign('slot_id')
            //       ->references('id')->on('slots')
            //       ->onDelete('set null');
       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointments');
    }
}
