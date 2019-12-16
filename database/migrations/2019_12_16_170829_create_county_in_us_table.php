<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountyInUsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('county_in_us', function(Blueprint $table)
		{
			$table->integer('county_code')->primary()->comment('THis is the code associated with the county');
			$table->string('county_name', 45)->nullable()->comment('Name of the county');
			$table->string('state_name', 45)->nullable()->comment('The state where the county is located');
			$table->integer('state_code')->nullable()->comment('code of the state where the county is located');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('county_in_us');
	}

}
