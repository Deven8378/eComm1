<?php
namespace app\controllers;


class User extends \app\core\Controller {

	public function index() { //login page
			if (isset($_POST['action'])) {
			//process input
			$user = new \app\models\User();
			$user = $user->getByUsername($_POST['username']);
			if ($user) {
				if (password_verify($_POST['password'], $user->password_hash)) {
					//the user is correct
					$_SESSION['user_id'] = $user->user_id;
					header('location:/User/profile');
				} else {
				header('location:/User/index?error=Bad username/password combination');	
				}
			} else {
				// no such user
				header('location:/User/index?error=Bad username/password combination');
			}
			

		} else {
			//display the form
			$this->view('User/index'); //TODO: add the new view file
		}


	}

	public function register() { //registration page
		if (isset($_POST['action'])) {
			//process input
			$user = new \app\models\User();
			$usercheck = $user->getByUsername($_POST['username']);
			if (!$usercheck) {
				$user->username = $_POST['username'];
			$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$user->insert();
			header('location:/User/index');

			} else {
				header('location:/User/register?error=Username ' . $_POST['username'] . ' already in use. Choose another.');
			}

		} else {
			//display the form
			$this->view('User/Register'); //TODO: add the new view file
		}

	}

	public function logout() {
		session_destroy();
		header('location:/User/index');
	}

	#[\app\filters\Login]
	public function profile() {
		if (!isset($_SESSION['user_id'])) {
			header('location:/User/index');
			return;
		}
		$message = new \app\models\Message();
		$messages = $message->getAllForUser($_SESSION['user_id']);
		$this->view('User/profile',$messages);

	}

	#[\app\filters\Login]
	public function somethignSecret() {
		echo 'if you see this, you are logged in';
	}

	
}