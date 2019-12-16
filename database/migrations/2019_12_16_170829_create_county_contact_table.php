<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountyContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('county_contact', function(Blueprint $table)
		{
			$table->integer('contact_record_id')->primary()->comment('The record ID for the contact');
			$table->integer('county_code')->comment('county code');
			$table->string('county_name', 45)->comment('county name');
			$table->string('contact_name', 45)->nullable()->comment('Name of the contact person');
			$table->string('email', 250)->nullable()->comment('email address of contact');
			$table->string('address', 250)->nullable()->comment('address of contact');
			$table->string('city', 45)->nullable()->comment('the city of the address');
			$table->string('state', 45)->nullable()->comment('The state of the address');
			$table->string('phone_1', 10)->nullable()->comment('Phone number 1');
			$table->string('phone_extention_1', 10)->nullable()->comment('phone extention 1');
			$table->string('phone_2', 10)->nullable()->comment('phone number 2');
			$table->string('phone_extention_2', 10)->nullable()->comment('phone extention 2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('county_contact');
	}

}
