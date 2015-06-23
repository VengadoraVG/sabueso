<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubscribeUserSector extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('subscription', function(Blueprint $table)
                  {
                    $table->integer('sector')->unsigned();
                    $table->foreign('sector')->references('id')->on('sector');

                    $table->integer('user')->unsigned();
                    $table->foreign('user')->references('id')->on('user');
                    
                  });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('subscription', function(Blueprint $table)
                  {
                    // $table->dropForeign('user');
                    // $table->dropForeign('sector');

                    // $table->dropColumn(['sector', 'user']);
                  });
  }

}
