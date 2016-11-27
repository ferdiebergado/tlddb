<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');            
            $table->bigInteger('PIN');
            $table->string('LastName');
            $table->string('FirstName');
            $table->char('MI')->nullable();
            $table->char('Gender',1)->nullable();
            $table->integer('DesID')->default(0);
            $table->integer('RegID')->default(0);
            $table->integer('DivID')->default(0);
            $table->string('Station')->nullable();
            $table->string('District')->nullable();
            $table->string('EmpNo')->nullable();
            $table->string('Mobile')->nullable();
            $table->string('TelNo')->nullable();
            $table->string('Email')->nullable();
            $table->boolean('IsELLNRegCoord')->nullable()->default(false);
            $table->boolean('IsLanguageCoord')->nullable()->default(false);
            $table->string('Address')->nullable();
            $table->integer('ModalityID')->nullable();
            $table->integer('UserID');
            $table->timestamps();
            $table->softDeletes();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
