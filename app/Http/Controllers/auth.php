<?php

namespace App\Http\Controllers;

use Cartalyst\Alerts\Native\Facades\Alert;
use Illuminate\Http\Request;
use Session;
use Redirect;

class auth extends Controller
{
    public function login()
    {
        
        print_r(Session::get('login'));
        if(!Session::get('login')){
            return view('auth/loginAdmin');
        }else{
        return redirect('admin/dashboardAdmin');
        }
    }
}
