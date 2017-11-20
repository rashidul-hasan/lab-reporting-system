<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function(Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->enum('status', ['unpaid', 'paid', 'due']);
            $table->enum('payment_method', ['cash', 'bkash', 'paypal']);
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->decimal('due_amount', 10, 2)->nullable();
            $table->text('notes')->nullable();

            
            $table->timestamps();
        });

        Schema::table('payments', function($table) {

           $table->foreign('invoice_id')
                  ->references('id')->on('invoices')
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
        Schema::drop('payments');
    }
}
