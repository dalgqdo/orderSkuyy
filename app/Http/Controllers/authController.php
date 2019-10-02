<?php

namespace App\Http\Controllers;

use Cartalyst\Alerts\Native\Facades\Alert;
use Illuminate\Http\Request;
use Session;
use Redirect;

class authController extends Controller
{
    public function index(Request $request)
    {
        $login = $request->session()->get('login');
        if($login == true){
            return redirect('/admin');
        }else{
            return view('auth.loginAdmin');
        }
    }
    public function login(Request $request)
    {
        $name = $request->name;
        $role = $request->status;
        $uid = $request->uid;
        Session::put('name', $name);
        Session::put('status', $status);
        Session::put('uid', $uid);
        Session::put('login', TRUE);
        echo 1;
    }
}
