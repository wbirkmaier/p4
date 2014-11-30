<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table)
            {
                $table->increments('id');
                $table->string('username', 128)->unique();
                $table->string('given', 128);
                $table->string('sur', 128);
                $table->string('password', 60);
                $table->string('email', 254)->unique();
                $table->rememberToken();
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
		Schema::drop('users');
	}

}
