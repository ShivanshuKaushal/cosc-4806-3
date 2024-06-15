<?php

class Login extends Controller {

		public function index() {		
			$this->view('login/index');
		}

		public function verify(){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];

			$user = $this->model('User');
			$user->check_username_exists($username);
			if (isset($_SESSION['username_exists']) && $_SESSION['username_exists'] == 0) {
				header('location: /login');
				die;
			}
			$user->authenticate($username, $password); 
		}
			$log = $this->model('Log');

			if ($_SESSION['auth'] == 1) {
				$success = 1;
			}
			else if (isset($_SESSION['failedAuth'])) {
				$success = 0;
			}
			date_default_timezone_set('America/Toronto');
			$date = date('Y-m-d H:i:s');
			$log->log_attempt($username, $success, $date);
	}

}