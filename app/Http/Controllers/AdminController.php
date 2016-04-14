<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Feedback;
use App\Point;
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
    public function getSettingsUser($id)
    {
        $data=array(
            //
        );
        return view('user.settings', $data);
    }
    public function getConsole()
    {
        return view('admin.console');
    }
    public function getUsersConsole()
    {
        $data=array(
            "users"=>User::where('isAdmin','=','0')->get()
        );
        return view('admin.ajaxConsole', $data);
    }
    public function getFeedbacksConsole()
    {
        $data=array(
            "feedbacks"=>Feedback::all()
        );
        return view('admin.ajaxConsole', $data);
    }
    public function getPointsConsole()
    {
        $data=array(
            "points"=>Point::all()->where("isValidate", "=", false)
        );
        return view('admin.ajaxConsole', $data);
    }
    public function getPointsValidateConsole()
    {
        $data=array(
            "pointsValidate"=>Point::all()->where("isValidate", "=", true)
        );
        return view('admin.ajaxConsole', $data);
    }

    public function putValidatePoint($id)
    {
        Point::find($id)->update(['isValidate' => true]);
    }

    public function deletePoint($id)
    {
        Point::find($id)->delete();
    }

    public function deleteUsersConsole($id)
    {
        User::find($id)->feedbacksRemove();
        User::find($id)->pointsRemove();
        User::find($id)->delete();
    }
}
