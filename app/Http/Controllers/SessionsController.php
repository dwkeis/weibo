<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    
    public function create()
    {
    	return view('sessions.create');
    }

    public function store(Request $request)
    {
       $credentials = $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       ]);

       if (Auth::attempt($credentials, $request->has('remember'))) {
           session()->flash('success', 'Welcome back !');
           return redirect()->route('users.show', [Auth::user()]);
       } else {
           session()->flash('danger', 'Sorry, Username or password incorrect.');
           return redirect()->back()->withInput();
       }

    	return;
    }

    public function destory()
    {
    	Auth::logout();
    	session()->flash('success','You\'ve logged out');
    	return redirect('login');
    }
}
