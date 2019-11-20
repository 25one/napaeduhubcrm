<?php

//use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->string('contacts');                         
            $table->integer('test_id')->unsigned()->index();
            $table->integer('statuse_id')->unsigned()->index();               
            $table->integer('course_id')->unsigned()->index();
            $table->date('datelesson')->nullable();
            $table->string('timeteacherlesson')->nullable();                         
            $table->string('note')->nullable();               
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('students');        
    }
}
