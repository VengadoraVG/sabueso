<?php namespace App\Http\Controllers;

use DB;
use Input;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PermissionController extends Controller {

  public static function go_find_me($table, $search_term, $search_field) {
    $found = DB::table($table)->where($search_field, $search_term)->get();

    if (sizeof($found) == 0) {
      return DB::table($table)->insertGetId([$search_field => $search_term]);
    } else {
      return $found[0]->id;
    }
  }

  public function controlPanelScreen () {
    if(Auth::check()) {      
      return view('control-panel');
    } else {
      return redirect('login');
    }
  }

  public function checkinScreen() {
    return view('checkin')->with('storage_date', date("Y-m-d H:i:s", time()));
  }

  public function checkinSubmit() {
    $checkin = DB::table('checkin')->insertGetId(['storage_date' => 
                                                  Input::get('storage_date')]);
    
    $reagents = json_decode(Input::get('new_reagents'));

    foreach ($reagents as $reagent) {
      $reagent->reagent = strtolower($reagent->reagent);
      $s = strtotime($reagent->expirationDate);
      DB::table('storage')
        ->insert(['expiration_date' => date('Y-m-d', $s),
                  'reagent' => self::go_find_me('reagent', 
                                                $reagent->reagent, 'name'),
                  'checkin' => $checkin,
                  'stock' => $reagent->stock]);
    }

    return view('success')->with('data', date('Y-m-d', $s));
  }

  public function checkoutScreen() {
    return view('checkout');
  }

  public function requestStorage() {
    $storage = array();
    $reagents = DB::table('storage')->get();

    foreach ($reagents as $reagent) {
      $name = DB::table('reagent')
        ->where('id', $reagent->reagent)
        ->get()[0]->name;
    }
  }

}
