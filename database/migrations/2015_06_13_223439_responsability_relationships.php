<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResponsabilityRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('checkin_responsability', function(Blueprint $table)
		{
                  $table->integer('user')->unsigned();
                  $table->integer('checkin')->unsigned();
                  
                  $table->foreign('user')->references('id')->on('user');
                  $table->foreign('checkin')->references('id')->on('checkin');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('checkin_responsability', function(Blueprint $table)
		{
                  $table->dropForeign('checkin_responsability_user_foreign');
                  $table->dropForeign('checkin_responsability_checkin_foreign');

                  $table->dropColumn(['user', 'checkin']);
		});
	}

}
