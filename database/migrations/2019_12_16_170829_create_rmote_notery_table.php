<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRmoteNoteryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rmote_notery', function(Blueprint $table)
		{
			$table->integer('notery_code', true)->comment('This is the record code for the notery public');
			$table->string('state_name', 2)->nullable()->comment('This field is the code of the state where the Notery works');
			$table->string('notery_name', 45)->nullable()->comment('The name of the notory public');
			$table->string('address', 250)->nullable()->comment('This field contains the mailing address of the notery');
			$table->string('city', 45)->nullable()->comment('This field contains the city of the notory mailing address');
			$table->string('state', 45)->nullable()->comment('This field is the state of the notery\'s mailing address');
			$table->integer('zip_code')->nullable()->comment('this is the zipcode of the notery');
			$table->integer('phone_number')->nullable()->comment('This is the phone number of the notery publick');
			$table->integer('phone_extention')->nullable()->comment('This is the extention of the notery\'s phone number if  there is one');
			$table->integer('phone_number_2')->nullable()->comment('This is an alternitive number for the notery public');
			$table->integer('phone_extention_2')->nullable()->comment('this is an extention for the alternative number if there is one');
			$table->integer('user_code')->nullable()->comment('The code for the user that entered the record
');
			$table->integer('company_code')->nullable()->comment('The code associated with the company that the user works for
');
			$table->timestamp('time_stamp_for_record_creation')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('his is the date and time that record was entered and create');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rmote_notery');
	}

}
