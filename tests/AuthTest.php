<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthTest extends TestCase
{
   use DatabaseTransactions;

   /** @test */

   function a_user_may_register_for_an_account_but_must_confirm_their_email_address()
   {
        $this->visit('register')
            ->type('JhonDoe', 'name')
            ->type('jhon@example.com', 'email')
            ->type('password', 'password')
            ->press('Register');

        $this->see('Please confirm your email address.')
            ->seeInDatabase('users', ['name'=>'JhonDoe', 'verified' => 0]);

        $user = User::whereName('JhonDoe')->first();

        //$this->login($user)->see('Could not sign you in.');

        $this->visit("register/confirm/{$user->token}")
          ->see('You are now confirmed. Please Login')
          ->seeInDatabase('users', ['name' => 'JhonDoe', 'verified' => 1]);
   }

   /** @test */

   function a_user_may_login()
   {
      $this->login()
        ->see('You are login.');
   }

   protected function login($user = null)
   {
      $user = $user ? : $this->factory->create('App\User', ['password' => 'password']);

      return $this->visit('login')
        ->type($user->email, 'email')
        ->type('password', 'password')
        ->press('Sign In');
   }
}
