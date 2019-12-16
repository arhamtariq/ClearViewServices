<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_notes', function(Blueprint $table)
		{
			$table->integer('note_number')->primary()->comment('record number of the note record');
			$table->string('record_number', 5)->nullable()->comment('This is the record number of the owner from the county_list table, which associates this contact record with the owner.');
			$table->string('note_type', 45)->nullable();
			$table->text('note_details', 65535)->nullable();
			$table->string('issue_resolve', 3)->nullable()->comment('Have the issue been resolved');
			$table->integer('user_code')->nullable()->comment('The code for the user that entered the record\n');
			$table->integer('company_code')->nullable()->comment('The code associated with the company that the user works for');
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
		Schema::drop('client_notes');
	}

}
