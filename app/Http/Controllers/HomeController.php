<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (session('user_id')) {
            redirect()->route('quiz.index')->send();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(session()->all());
        return view("welcome");
    }

    public function validate_user(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $user=User::where('email',$request->email)->firstOrFail();
        if($user){
            session::put('user_id',$user->id);
            session::put('user_name',$user->name);
            return redirect()->route('quiz.result');
        }
    }
}
