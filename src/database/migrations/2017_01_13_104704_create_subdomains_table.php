<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubdomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdomains', function (Blueprint $table){
            $table->increments('id');
            $table->string('subdomain')->nullable();
            $table->string('language');
            $table->boolean('default')->default(0);
            $table->timestamps();
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
        Schema::drop('subdomains');
    }

    /**
     * Add a default value to the DB so this stuff doesn't error out
     */
    private function seedDatabase()
    {
        DB::table('subdomains')->insert([
            'subdomain' => 'www',
            'default' => '1',
        ]);
    }
}
