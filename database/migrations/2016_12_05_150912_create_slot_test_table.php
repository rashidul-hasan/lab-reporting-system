<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('slot_test', function(Blueprint $table) {

        //     $table->engine = 'InnoDB';
            
        //     $table->integer('slot_id')->unsigned();
        //     $table->integer('test_id')->unsigned();
        //     $table->foreign('slot_id')
        //           ->references('id')->on('slots')
        //           ->onDelete('cascade');
        //     $table->foreign('test_id')
        //           ->references('id')->on('tests')
        //           ->onDelete('cascade');      
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('slot_test');
    }
}
