<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->integer('task_code',true);
			$table->integer('user_code')->comment('This is the user record number of the user who the task is assigned to');
			$table->integer('task_creator')->comment('the user code o the task creator');
			$table->string('task_name', 45)->nullable()->comment('then name of the task');
			$table->string('task_discription', 5000)->nullable()->comment('the details about the task');
			$table->string('due_date',22)->nullable()->comment('The date the task is due');
			$table->string('task_status', 45)->nullable()->comment('this is the status of the stask');
			$table->string('esculate_stask', 45)->nullable()->comment('Esculate the task to someone else');
			$table->string('esculate_task', 45)->nullable();
			$table->string('reassign_task', 45)->nullable()->comment('Reassign the task to someone else');
			$table->string('task_notes', 5000)->nullable();
			$table->string('time_stamp_for_record_creation',45)->nullable()->comment('This is the date and time that record was entered and create');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
