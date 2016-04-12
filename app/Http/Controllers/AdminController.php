<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getConsole()
    {
        $data=array("users"=>DB::table('users')->where('isAdmin','=','0')->get());
        return view('admin.console', $data);
    }
}
