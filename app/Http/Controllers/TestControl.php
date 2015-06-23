<?php namespace App\Http\Controllers;

use App\Http\Controllers\PermissionController as P;
use Input;
use PermissionController;
use DB;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestControl extends Controller {
  public function got_session() {
    return view::make('yay');
  }

  public function spamToSession() {
    TG::sendMsg(Auth::user()->name, 'SPAM!');
    return redirect()->back();
  }

  public function script() {
    $command = '/home/vg/project/sabueso/test-script';
    $output = shell_exec($command);
    return "<pre>$output</pre>";
  }

  public function askJson() {
    $json = array();
    $reagents = DB::table('storage');

    if (Input::has('reagent')) {
      $reagents
        ->where('reagent', 
                P::go_find_me('reagent', 
                              strtolower(Input::get('reagent')), 
                              'name'))
        ->orderBy('expiration_date');
    }

    $reagents = $reagents->get();

    foreach ($reagents as $reagent) {
      $name = DB::table('reagent')
        ->where('id', $reagent->reagent)
        ->get()[0]->name;
      array_push($json, ['id' => $reagent->id,
                         'reagent' => $name,
                         'expiration_date' => $reagent->expiration_date,
                         'stock' => $reagent->stock]);
    }

    return $json;
  }
}
