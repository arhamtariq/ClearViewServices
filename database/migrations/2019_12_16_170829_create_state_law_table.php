<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateLawTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state_law', function(Blueprint $table)
		{
			$table->integer('state_code')->primary()->comment('The code of the state that the law is associated with');
			$table->string('allow_tax_overages', 3)->nullable()->comment('Does this state allow the collection of tax overages');
			$table->string('state_tax_statute_overage_code', 250)->nullable()->comment('The title of the statute that governs the overages collected in the by the county\'s');
			$table->text('tax_overage_code_description', 65535)->nullable()->comment('the description of the statute for tax overages');
			$table->text('tax_overage_collection_time', 65535)->nullable()->comment('The avount of time and time limit to collect the tax overages');
			$table->string('allow_foreclosure_overages', 3)->nullable()->comment('Does the state allow foreclosure overages');
			$table->string('state_foreclosure_overage_code', 3)->nullable()->comment('the description of the statute for foreclosures');
			$table->text('mortgage_foreclosure_code_description', 65535)->nullable();
			$table->text('foreclosure_overage_collection_time', 65535)->nullable()->comment('The avount of time and time limit to collect the overages');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('state_law');
	}

}
