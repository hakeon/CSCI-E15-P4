<?php

class BaseController extends Controller {

	/**
	 * csrf global POST filter
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
}