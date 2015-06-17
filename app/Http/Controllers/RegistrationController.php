<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;

class RegistrationController extends Controller
{
    public function register()
    {
    	return view('auth.register');
    }

    public function postRegister( Request $request, AppMailer $mailer )
    {
     	// Validate Request
     	$this->validate( $request,[
     		'name' 		=> 'required',
     		'email'		=> 'required|email|unique:users',
     		'password'	=> 'required'	
     	]);

     	// Create the user
     	$user = User::create( $request->all() );

     	// email verification
     	$mailer->sendConfirmationTo( $user );

     	flash('Please confirm your email address.');

     	return redirect()->back();
    }

    public function confirmEmail($token)
    {
    	$user = User::whereToken($token)->firstOrFail()->confirmEmail();

    	flash('You are now confirmed. Please Login');
    	
    	return redirect('login');   	
    }   
}
