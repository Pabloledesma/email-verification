<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function login()
    {
        return view('auth.login');
    } 

    public function postLogin()
    {
        return;
    } 

    public function logout()
    {
        Auth::logout();
        flash('You are now been sign out. See ya.');
        return redirect('login');
    } 
}
