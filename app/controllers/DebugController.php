<?php

class DebugController extends BaseController {

	public function __construct()
	{

                parent::__construct();
        }


	public function getDebug()
	{
        $feeds = Feed::all();
        return View::make('debug', compact('feeds'));
	}

}
