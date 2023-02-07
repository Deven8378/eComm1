<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	function index() {
		$this->view('Main/index');
	}

	function index2() {
		$this->view('Main/index2');
	}

	function greetings($name = "Carl") { //name is an optional parameter
		$this->view('Main/greetings', $name);
	}

	function logUser() {
		if (isset($_POST['action'])) {
			//data is sent
			$userLog = new \app\models\UserLog();
			$userLog->name = $_POST['name'];
			$userLog->insert();
			//open the log.txt file for appending
			//ToDo: lock the file for reserved access
			
			header('location:/Main/logUser');

		} else {
			// no data submitted: the user needs to see the form
			$this->view('Main/logUser');

		}
	}

	function viewUserLog() {
		$userLog = new \app\models\UserLog();
		$contents = $userLog->getAll();
		$this->view("Main/userLogList", $contents);
	}

	function logDelete($LineNumber) {
		$userLog = new \app\models\UserLog();
		$userLog->delete($LineNumber);
		header('location:/Main/viewUserLog'); //redirect
	}
}