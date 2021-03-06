<?php

class UserController extends BaseController {

	public function __construct() {

		# Call BaseController CSRF filter
		parent::__construct();

		$this->beforeFilter('guest',
			array(
				'only' => array('getLogin','getSignup')
			));
	}


	/**
	 * Show the new user signup form
	 * @return View
	 */
	public function getSignup() {

		return View::make('user_signup');
	}

	/**
	 * Process the new user signup
	 * @return Redirect
	 */
	public function postSignup() {

		# Step 1) Define the rules
		$rules = array(
			'username' => 'required|unique:users',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$user = new User;
		$user->username = Input::get('username');
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please try again.')
				->withInput();
		}

		# Log in
		Auth::login($user);

		return Redirect::to('/')->with('flash_message', 'you are here to todododo');

	}

	/**
	 * Display the login form
	 * @return View
	 */
	public function getLogin() {

		return View::make('user_login');

	}

	/**
	 * Process the login form
	 * @return View
	 */
	public function postLogin() {

		$credentials = Input::only('username','email', 'password');

		# Note we don't have to hash the password before attempting to auth - Auth::attempt will take care of that for us
		if (Auth::attempt($credentials, $remember = false)) {
			return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput();
		}
	}


	/**
	 * Logout
	 * @return Redirect
	 */
	public function getLogout() {

		# Log out
		Auth::logout();

		# Send them to the homepage
		return Redirect::to('/');

	}
}