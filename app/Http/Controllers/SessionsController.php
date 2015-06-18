<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function login()
    {
        return view('auth.login');
    } 

    public function postLogin(Request $request)
    {
        // validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to login you in
        if( Auth::attempt( $this->getCredentials($request) ) ){
            flash('You are now confirmed. Please login.');
            return redirect()->intended('/dashboard');
        }

        flash('Could not sign you in.');

        return redirect()->back();

    } 

    public function logout()
    {
        Auth::logout();
        flash('You are now been sign out. See ya.');
        return redirect('login');
    } 

    public function getCredentials( Request $request )
    {
        return [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'verified'  => 1
        ];
    } 
}
