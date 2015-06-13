<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('sections', function(Blueprint $table)
		// {
		// 	$table->increments('id');
		// 	$table->integer('project_id')->unsigned();
		// 	$table->foreign('project_id')->references('id')->on('projects');
		// 	$table->string('name');
		// 	$table->timestamps();
		// 	$table->softDeletes();
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('sections');
	}

}
