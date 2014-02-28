<?php

class UserController extends BaseController {

	public function login() {
		return View::make('users.login');
	}

	public function logout() {
		Auth::logout();

		return Redirect::to('/');
	}

	public function authenticate() {
		$validation = User::validate_login(Input::all());
		
		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('/')->with('error_index', $failed)->withErrors($validation)->withInput();
		} else {
			$credentials = array(
			  'username' => Input::get('username'),
			  'password' => Input::get('password')
			);

		
			if (Auth::attempt($credentials)) {
				return Redirect::to('dashboard');
			} else {
				return Redirect::to('/')
		            ->with('flash_error', 'Your username/password was incorrect.')
		            ->withInput();	
			}

		}

	}

	/*public function new_user() {
		return View::make('users.new_user');
	}

	public function add_new_user() {
		$validation = User::validate_login(Input::all());

		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('/')->with('error_index', $failed)->withErrors($validation)->withInput();
		} else {
			$insert = array(
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password')),
				);

			$user = User::create($insert);

			return Redirect::to('new_user')
					->with('message', 'Succesfully Added');

		}
	}*/

}