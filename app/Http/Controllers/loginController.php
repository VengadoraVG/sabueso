<?php namespace App\Http\Controllers;

use Session;
use Auth;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class loginController extends Controller 
{

  public function loginScreen() {    
    return view('login');
  }

  public function requestSession() {
    if (Auth::attempt(['phone' => Input::get('phone'),
                       'password' => Input::get('password')])) {
      return redirect('control-panel');
    } else {
      return view('login')->with('woops', 'some dataz!');
    }
  }

  public function logout() {
    Auth::logout();
    Session::flush();
    return redirect('login');
  }

}
