<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOwnerContactListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('owner_contact_list', function(Blueprint $table)
		{
			$table->integer('contact_record_number        ', true)->comment('This is the record number for the contact information ');
			$table->integer('record_nunber        ')->comment('This is the record number of the owner from the county_list table, which associates this contact record with the owner.');
			$table->string('contact_name        ', 60)->nullable()->comment('This is the name of the contact, which could be the owner or anyone else that is related from the search');
			$table->string('relationship        ', 45)->nullable()->comment('if the contact is not the owner, what is the relationship of the contact to the owner?');
			$table->string('address        ', 200)->nullable()->comment('This is the address of the concact for this record');
			$table->string('city', 45)->nullable()->comment('This is the city of the contact live');
			$table->string('state        ', 45)->nullable()->comment(' this is the state that the contact lives in');
			$table->string('zip_code', 5)->nullable()->comment('This is the zip code of the contact address');
			$table->string('address_type', 45)->nullable()->comment('What type of address is this, dwelling or business');
			$table->string('cell_phone        ', 45)->nullable()->comment('is this a cell phone number for the contact');
			$table->string('work_phone', 45)->nullable()->comment('This the contacts work phone number');
			$table->string('home_phone', 45)->nullable()->comment('This the contacts home phone number');
			$table->string('contact_status', 45)->nullable()->comment('Is this contact infornation usable');
			$table->string('contact_detail_status', 45)->nullable()->comment('Are the details of the for the contact correct');
			$table->string('user_code', 45)->nullable()->comment('The code for the user that entered the record');
			$table->string('company_code', 45)->nullable()->comment('The code associated with the company that the user works for');
			$table->string('skip_tracing_source', 45)->nullable()->comment('Which source of was the information collected');
			$table->timestamp('time_stamp_for_record_creation')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('
This is the date and time that record was entered and create
');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('owner_contact_list');
	}

}
