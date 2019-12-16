<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateInUsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state_in_us', function(Blueprint $table)
		{
			$table->integer('state_code')->primary()->comment('Record code associated with code');
			$table->string('state_name', 45)->nullable()->comment('State Name');
			$table->string('state_abbreviation', 2)->nullable()->comment('The state potal code abbreviation');
			$table->string('state_rank', 1)->nullable()->comment('The state ranking of 1 to 5 to determine how viable collection is in that state. The ranking is 1 for very viable to 5 for not viable.');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('state_in_us');
	}

}
