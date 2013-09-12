<?php

class dash extends CI_Controller {
	private $userLevel = -1;
	private $username = "";
	private $userfullname = "";
	
	public function __construct() {
		parent::__construct();
		
		authUser(array('section' => 'log', 'sessvar' => array('user_username', 'user_fullname', 'user_user_level', 'user_islog')));
				
	}
	
	
	public function index() {
		$sess = $this->getSessionVar();
		
		// put this block of codes in every method of a controller
		if($sess['user_user_level'] == 0) {
			echo "You're an admin. Loads a customed view for an admin " . anchor(base_url('log/signout'), 'Sign-out');
		} else {
			echo "You're a mere user only. Loads a customed view for a mere user " . anchor(base_url('log/signout'), 'Sign-out');
		}
		
	}
	
	private function getSessionVar() {
		// getInfo();
 		$params = array('user_username', 'user_fullname', 'user_user_level');
 		$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE

 		// DATA:
		$arr = $this->sessionbrowser->mData; // returns array
		
		return $arr;
	}
	
}