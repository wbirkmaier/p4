<?php

class UserController extends BaseController {

	public function showRegister()
        {
                return View::make('register');
        }

	public function showLogin()
        {
                return View::make('login');
        }


}

