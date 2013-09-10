<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct() {
		parent::__construct();
		
		
		authUser(array('sessvar' => array('user_username', 'user_islog', 'user_fullname')));
		
	}
	
	public function dashboard(){
		
		$data['main_content'] = "dashboard/admindashboard_view"; 
		$this->load->view('dashboard/admindashboard_view',$data);	
	}
	 
		
}