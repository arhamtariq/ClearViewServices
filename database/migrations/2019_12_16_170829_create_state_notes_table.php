<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state_notes', function(Blueprint $table)
		{
			$table->integer('note_number')->primary()->comment('this is the record number associated whith the note');
			$table->integer('state_code')->comment('This field contains the state code.');
			$table->string('state_name', 2)->comment('This field contains the state name');
			$table->string('note_type', 45)->nullable()->comment('This field contains the type of note that is being entered');
			$table->string('note', 5000)->nullable()->comment('This field contains the notes about the state');
			$table->integer('user_code')->nullable()->comment('The code for the user that entered the record\n');
			$table->integer('company_code')->nullable()->comment('The code associated with the company that the user works for\n');
			$table->timestamp('time_stamp_for_record_creation')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('\\nThis is the date and time that record was entered and create\\n');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('state_notes');
	}

}
