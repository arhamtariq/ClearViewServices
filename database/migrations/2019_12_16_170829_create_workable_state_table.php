<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkableStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workable_state', function(Blueprint $table)
		{
			$table->integer('state_code')->primary()->comment('unique code of the state');
			$table->string('state_name', 45)->nullable()->comment('the name of the state');
			$table->text('timeframe_before_finders_fee', 65535)->nullable()->comment('This is the timeframe that overages can be collected before the state impose a finders fee.');
			$table->text('where_list_is_located', 65535)->nullable()->comment('The person at the state level, where the list is located. This is not the same as the county level.');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('workable_state');
	}

}
