<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Feedback;
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
        $data=array(
            "users"=>User::where('isAdmin','=','0')->get(),
            "feedbacks"=>Feedback::all()
                   );
        return view('admin.console', $data);
    }
}
