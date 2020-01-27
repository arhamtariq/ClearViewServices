<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAdministartionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('administartion_users', function (Blueprint $table) {
             $table->boolean('package_status')->default(true)->comment('This Field will tell package is subscribed or not');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administartion_users', function (Blueprint $table) {
            //
        });
    }
}
