<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            ///$table->bigIncrements('id');
            $table->integer('user_code', true);
            $table->integer('company_code')->comment('The code associated with the user')->nullable();
            $table->string('username', 25)->comment('This field is the username of the user');
            $table->string('email', 100)->comment('this is the email address of the user');
            $table->string('password',99)->comment('this is the password of the user');
            $table->string('first_name', 45)->comment('this is the first name of ther user');
            $table->string('last_name', 45)->comment('This is the last name of the user');
            $table->string('phone_number', 10)->nullable()->comment('The phone number of the user');
            $table->string('address', 250)->nullable()->comment('the address of the user');
            $table->string('city', 45)->nullable()->comment('The city of the user');
            $table->string('state', 2)->nullable()->comment('The state of the user');
            $table->integer('zip_code')->nullable()->comment('the zip code of the user');
            $table->string('role', 45);
            $table->boolean('email_verified')->comment('The status that email is verifed or not')->default(0);
            $table->string('email_verification_token')->comment('The token that is sent for registration verification',45)->nullable();
            $table->timestamp('time_stamp_for_record_creation')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('This is the time of when the record was create');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
