<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSettings()
    {
        return view('user.settings');
    }

    public function postSettings()
    {
        if (isset($_POST['isVoice'])) {
            $isVoice = 1;
        } else {
            $isVoice = 0;
        }
        if (isset($_POST['isColor'])) {
            $isColor = 1;
        } else {
            $isColor = 0;
        }
        //DB::table('users')->where('id', Auth::user()->id)->update(array('firstname' => $_POST['firstname']));
        User::where('id', '=', Auth::user()->id)->update(array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'isVoice' => $isVoice, 'isColor' => $isColor, 'description' => $_POST['description']));
        return redirect("/profile");
    }

    public function getProfile()
    {
        return view('user.profile');
    }


}
