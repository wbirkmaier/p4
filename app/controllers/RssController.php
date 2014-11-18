<?php

class RssController extends BaseController {

	public function __construct() {

		parent::__construct();
		//Only for logged in users to see
		$this->beforeFilter('auth');
	}


}

