<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('users', function (Blueprint $table) {
	    	$table->integer('type')->unsigned()->default(0);
    	});

    	$this->seedDatabase();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('users', function (Blueprint $table) {
    		$table->dropColumn('type');
    	});
    }
}
