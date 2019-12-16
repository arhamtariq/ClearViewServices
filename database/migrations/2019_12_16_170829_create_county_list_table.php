<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountyListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('county_list', function(Blueprint $table)
		{
			$table->integer('record_number')->unsigned()->primary()->comment('The record or file number the county use to track the sale');
			$table->string('county_record_number', 45)->comment('This is the file or record number that the county provides wiht the list');
			$table->integer('county_code')->nullable()->comment('The code associated with the county from the county table');
			$table->string('County', 45)->nullable()->comment('The name of the county the list was obtain from and where the property resides');
			$table->string('first_name', 45)->nullable()->comment('The property owner\'s first name');
			$table->string('middle_name', 45)->nullable()->comment('This is the middle name of the proberty owner');
			$table->string('last_name', 45)->nullable()->comment('This is the last name of the property owner');
			$table->string('parcel_number', 45)->nullable()->comment('This is the parcel number some counties do not provide address, they provide parcel numbers ');
			$table->string('property_address', 45)->nullable()->comment('The address of the property that was sold, not the owners mailing address');
			$table->string('City', 45)->nullable()->comment('City where the property is located');
			$table->string('State', 45)->nullable()->comment('Name of the state where the proberty is located');
			$table->string('zip_code', 45)->nullable()->comment('Zip code of where the proberty is located');
			$table->date('sale_date')->nullable()->comment('The date the property was sold in the tax sale');
			$table->string('overage_amount_collected', 10)->nullable()->comment('This is the amount the property was sold for at the tax sale');
			$table->string('overage_amount_owed_to_owner', 10)->nullable()->comment('The amount that is owed to the property owner after the taxes and fees are paid');
			$table->integer('user_code')->nullable()->comment('The code for the user that entered the record');
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
		Schema::drop('county_list');
	}

}
