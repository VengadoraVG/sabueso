<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StorageCheckinRelationship extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
                Schema::table('storage', function(Blueprint $table)
                {
                  $table->integer('checkin')->unsigned();
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
                Schema::table('storage', function(Blueprint $table)
                {
                  $table->dropForeign('storage_checkin_foreign');
                  $table->dropColumn('checkin');
                });
        }

}
