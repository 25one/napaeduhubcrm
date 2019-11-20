<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
 		Schema::table('students', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});	
 		Schema::table('students', function(Blueprint $table) {
			$table->foreign('statuse_id')->references('id')->on('statuses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
 		Schema::table('students', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('courses_course_id_foreign');
		});	
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('statuses_statuse_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('tests_test_id_foreign');
		});
	}
}
