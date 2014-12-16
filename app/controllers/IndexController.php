<?php

class IndexController extends BaseController {

	/**
	*  CSRF filter
	*/
	public function __construct() {

		# call the BaseController construct
		parent::__construct();

	}

	/**
	* index View
	*/
	public function getIndex() {

		return View::make('index');

	}

}
