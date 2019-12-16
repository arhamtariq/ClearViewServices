<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->integer('company_code')->primary()->comment('This is the unique code for the company');
			$table->string('company_name', 45);
			$table->string('address', 45)->nullable()->comment('This is the address of the company');
			$table->string('city', 45)->nullable()->comment('This is the city of the company');
			$table->string('state', 2)->nullable()->comment('this is the state of the company');
			$table->integer('zip_code')->nullable()->comment('This is the zip code of the companyu');
			$table->timestamp('time_stamp_for_record_creation')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company');
	}

}
