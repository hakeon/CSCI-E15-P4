<?php

class IndexController extends BaseController {

    public function __construct() {

        # Call BaseController CSRF filter
        parent::__construct();
    }

    public function getIndex() {

        return View::make('index');
    }
}