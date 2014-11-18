<?php

class DebugController extends BaseController {

	public function __construct()
	{

                parent::__construct();
        }


	public function getDebug()
	{
		return View::make('debug');
	}

}
