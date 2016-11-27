<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->bigInteger('TransactID');          
            $table->integer('EventID');
            $table->bigInteger('PIN');
            $table->integer('LAID')->nullable();
            $table->integer('LID')->nullable();
            $table->integer('PTID')->nullable();
            $table->integer('UserID');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
