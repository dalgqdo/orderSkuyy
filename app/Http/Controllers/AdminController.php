<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // $login = $request->session()->get('login');
        // if($login == true){
            return view('admin.dashboardAdmin');
        // }else{
        //     return redirect('/loginAdmin');
        // }
    }
    public function dataOrder(Request $request)
    {
        return view('admin.dataOrderAdmin');
    }

    public function addData()
    {
        return view('admin.addData');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin');
    }
}
