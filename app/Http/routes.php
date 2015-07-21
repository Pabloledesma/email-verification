<?php

get('register', 'RegistrationController@register');
post('register', 'RegistrationController@postRegister');

get('register/confirm/{token}', 'RegistrationController@confirmEmail');

get('login', 'SessionsController@login');
post('login', 'SessionsController@postLogin');
get('logout', 'SessionsController@logout');

/*** Vue example ***/

get('guestbook', function(){
	return view('guestbook');
});

get('api/messages', function(){
	return App\Message::all();
});

post('api/messages', function(){
	App\Message::create(Request::all());
});