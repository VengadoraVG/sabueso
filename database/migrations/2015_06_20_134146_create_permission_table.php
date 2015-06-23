<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
                        $table->integer('user')->unsigned();
                        $table->foreign('user')->references('id')->on('user');
                        
                        $table->integer('activity')->unsigned();
                        $table->foreign('activity')
                          ->references('id')->on('activity');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permission');
	}

}
