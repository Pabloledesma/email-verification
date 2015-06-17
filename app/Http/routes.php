<?php

get('register', 'RegistrationController@register');
post('register', 'RegistrationController@postRegister');

get('register/confirm/{token}', 'RegistrationController@confirmEmail');

get('login', 'SessionsController@login');
post('login', 'SessionsController@postLogin');
get('logout', 'SessionsController@logout');