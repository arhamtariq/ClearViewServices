<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministartionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administartion_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_code')->comment('The code associated with the user')->nullable();
            $table->integer('created_by_code')->comment('The code associated with the user who created it');
            $table->boolean('package_status')->default(true)->comment('This Field will tell package is subscribed or not');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administartion_users');
    }
}
