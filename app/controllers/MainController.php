<?php

class MainController extends BaseController {

	public function showIndex()
	{
		return View::make('index');
	}

	public function showOops()
	{
		return View::make('oops');
	}

}
