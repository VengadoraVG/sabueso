<?php namespace App\Http\Controllers;

use View;
use TG;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NotificationController extends Controller {

  public static function notifySector($sector) {
    return ['EXPIRADO' => 'WOOF! huelo productos expirados en el almacén'];
  }

  public static function notify () {
    $sectors = DB::table('sector')->get();

    foreach($sectors as $sector) {
      $subscriptions = DB::table('subscription')
        ->where('sector', $sector->id)->get();

      foreach($subscriptions as $subscription) {
        $user = DB::table('user')
          ->where('id', $subscription->user)->get();

        TG::sendMsg($user[0]->name,
                    self::notifySector($sector->name));
      }
    }

    return $message;

  }

  public function expired () {
    $expired_products = DB::table('storage')
      ->where('expiration_date', '<=', date('Y-m-d'))->get();

    if (sizeof($expired_products) > 0) {
      TG::sendMsg(Auth::user()->name,
                  'WOOF! huelo productos expirados en el almacén!');
    }

    return self::notify();

    return View::make('notify')->with('expired_products', $expired_products);
  }

}
