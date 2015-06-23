<?php namespace App\Http\Controllers;

use TG;
use Hash;
use Input;
use App\User as User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class registerController extends Controller {

  public function view () {
    return view('register');
  }

  public function requestAccount () {
    
    $user = User::create(['phone' => Input::get('phone'),
                          'name' => Input::get('name'),
                          'password' => Hash::make(Input::get('password'))]);
    TG::contactAdd('00591'.$user->phone, $user->name, '');
    $user->save();

    return Redirect('login');
  }

}
