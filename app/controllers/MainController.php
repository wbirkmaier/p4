<?php

class MainController extends BaseController {

	public function showIndex()
	{
		return View::make('index');
	}

	public function showRegister()
        {
                return View::make('register');
        }

	public function showLogin()
        {
                return View::make('login');
        }


}
