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
          if(Auth::user()->activated) {
           session()->flash('success', 'Welcome back !');
           $fallback = route('users.show', Auth::user());
           return redirect()->intended($fallback);
          } else {
            Auth::logout();
            session()->flash('warning', 'Account not activated, please check your email to activate your account.');
            return redirect('/');
          }
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
