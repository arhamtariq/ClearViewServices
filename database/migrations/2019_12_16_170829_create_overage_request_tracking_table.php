<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOverageRequestTrackingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('overage_request_tracking', function(Blueprint $table)
		{
			$table->integer('record_number')->primary()->comment('This is the record number of the owner from the county_list table, which associates this contact record with the owner.');
			$table->string('county_document_sent', 3)->nullable()->comment('Did you send the document yes or no');
			$table->string('county_receive_document', 45)->nullable()->comment('Did the county receive the documents, Yes or No');
			$table->string('document_accept_reject', 3)->nullable()->comment('Were the documents accepted or rejected by the county');
			$table->string('receive_check_from_county', 45)->nullable()->comment('Have you received the check from the county');
			$table->string('check_cleared', 3)->nullable()->comment('has the check cleased ');
			$table->string('send_check_to_owner', 45)->nullable()->comment('Has the check been sent to the owner');
			$table->date('date_check_receive')->nullable()->comment('Date the check was recieve by you');
			$table->date('date_check_sent')->nullable()->comment('Date the check was sent to the owner.');
			$table->string('record_close', 3)->nullable()->comment('Is this record close, yes or no.');
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
		Schema::drop('overage_request_tracking');
	}

}
