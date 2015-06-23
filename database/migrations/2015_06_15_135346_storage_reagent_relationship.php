<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StorageReagentRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage', function(Blueprint $table)
		{
                  $table->integer('reagent')->unsigned();
                  $table->foreign('reagent')->references('id')->on('reagent');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage', function(Blueprint $table)
		{
                  
                  $table->dropForeign('storage_reagent_foreign');
                  $table->dropColumn('reagent');

		});
	}

}
