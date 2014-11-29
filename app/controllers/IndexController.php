<?php

class IndexController extends BaseController {

	public function __construct()
        {
            parent::__construct();
        }

	public function showIndex()
        {
            return View::make('index');
        }
    
    public function getRegister()
        {
            return View::make('register');
        }

	public function postRegister()
        {
            return View::make('register');
        }

	public function getLogin()
        {
            return View::make('login');
        }

    public function postLogin()
        {
            return View::make('login');
        }

	public function getLogout()
        {
            return View::make('index');
        }

}
