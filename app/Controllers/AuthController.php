<?php
namespace App\Controllers;
use Rakit\Validation\Validator;
/**
 * 
 */
class AuthController extends Controller
{
	
	public function __construct()
	{
		return $this->printView('auth/login');
	}

	public function login($request)
	{
		$validator = new Validator;
		$validation = $validator->validate($request, [
		    'username'			=> 'required',
		    'password'			=> 'required'
		]);

		if ($validation->fails()) {
			$errors = $validation->errors();
			$_SESSION['errors'] = $errors->firstOfAll();

			return header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {

			if ($request['username'] == 'admin' && $request['password'] == '123') {
				$_SESSION['user'] = 'admin';
				return header('Location: /admin');
			} else {
				$_SESSION['errors']['username'] = 'This user not found';
				return header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}
	}
}