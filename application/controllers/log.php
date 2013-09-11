<?php

class Log extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		//$data['main_content'] = "log/log_view";
		$this -> load -> view('log/log_view');
	}
	
	public function validatelogin() {
		$user = $this->input->post('username', TRUE);
		$pword = $this->input->post('password', TRUE);
		$userLevel = -1; // default value
		$userFullName = '';
		
		$stQry = sprintf("SELECT * FROM `user` WHERE username='%s' AND password='%s' AND `status`=1", $user, MD5($pword));
		$params['querystring'] = $stQry;
		$this->mdldata->select($params);
		
		// checks if user exists
		if($this->mdldata->_mRowCount == 1):
			// redirect
			foreach ($this->mdldata->_mRecords as $rec) {
				$userLevel = $rec->user_level; // gets the userlevel from the db
				$userFullName = $rec->firstname . " " . $rec->lastname;
				break; // exits from the loop
			}
			
			if($userLevel == 0) {
				$this->setSessionVar($user, $userFullName, $userLevel);
				
			} else {
				$this->setSessionVar($user, $userFullName, $userLevel);
			}
			
			// redirects to dashboard.
			redirect(base_url('dash'));
			
		else:
			// error
			echo "Username and password do not match.";
		endif;
	}
	
	public function signout () {
		// destroy();
 		$params = array('user_username', 'user_islog', 'user_fullname', 'user_user_level');
 		$this->sessionbrowser->destroy($params); // returns TRUE if successful, otherwise FALSE
 		redirect(base_url('log'));
 		
	}
	
	protected function setSessionVar ($user, $fullname, $ulevel) {
		// setInfo(); 
 		$params = array(
						'user_username' => $user,
						'user_islog' => TRUE,
						'user_fullname' => $fullname,
 						'user_user_level' => $ulevel
						);	
		$this->sessionbrowser->setInfo($params); // returns TRUE if successful, otherwise FALSE
	}
}