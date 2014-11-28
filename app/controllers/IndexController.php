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

}
