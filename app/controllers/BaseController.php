<?php

class BaseController extends Controller {

	// CSRF filter
	public function __construct() {
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
}