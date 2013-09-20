<?php

class Dashboard extends CI_Controller {
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
		if($sess['user_user_level'] == 1) {
			redirect('dashboard/admin_dash');
		} else {
			redirect('dashboard/user_dash');
		}
		
	}
	
	public function admin_dash(){
	
		$data['main_content'] = "dashboard/admindash_view";
		$this->load->view('includes/template', $data);
		
		
	}
	
	public function user_dash(){
		
		$data['main_content'] = "dashboard/userdash_view";
		$this->load->view('includes/template', $data);
	}
	
	
//=================================================PRIVATE FUNCTIONS==========================================================================================================================	
	
	private function getSessionVar() {
		// getInfo();
 		$params = array('user_username', 'user_fullname', 'user_user_level');
 		$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE

 		// DATA:
		$arr = $this->sessionbrowser->mData; // returns array
		
		return $arr;
	}
	
	
	
}