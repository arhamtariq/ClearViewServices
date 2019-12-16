<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountyDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('county_document', function(Blueprint $table)
		{
			$table->integer('document_number')->primary();
			$table->string('county_code', 2)->nullable();
			$table->string('county_name', 2)->nullable()->comment('This is the name of the county the document is from');
			$table->string('document_type        ', 45)->nullable();
			$table->string('document_name', 250)->nullable()->comment('This field contains the name of the docuument');
			$table->string('document_directory', 250)->nullable()->comment('This filed contains the path to the document directory');
			$table->string('document_link', 250)->nullable()->comment('This field contains the URL link to the document');
			$table->integer('user_code')->nullable()->comment('The code for the user that entered the record
');
			$table->integer('company_code')->nullable()->comment('The code associated with the company that the user works for
');
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
		Schema::drop('county_document');
	}

}
