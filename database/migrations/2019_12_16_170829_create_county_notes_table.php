<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountyNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('county_notes', function(Blueprint $table)
		{
			$table->integer('note_number')->primary()->comment('This field contains the record number of the note that is being entered');
			$table->integer('county_code')->comment('This field contains the county code from the county table');
			$table->string('county_name', 45)->comment('This field contians the name of the county');
			$table->string('note_type', 45)->nullable()->comment('This field contains the type of notes about the state');
			$table->string('note', 5000)->nullable()->comment('This field contains notes that are related to the state');
			$table->integer('user_code')->nullable()->comment('The code for the user that entered the record');
			$table->integer('company_code')->nullable()->comment('The code associated with the company that the user works for
');
			$table->timestamp('time_stamp_for_record_creation')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('This is the date and time that record was entered and create');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('county_notes');
	}

}
