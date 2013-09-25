<?php

class Dashboard extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		authUser(array('section' => 'log', 'sessvar' => array('user_user_id','user_username', 'user_fullname', 'user_user_level', 'user_islog')));
	
	
	}
	
	public function index(){
		$this->section();
	}
	
	public function section(){
		
		$section = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : '';
	
		switch($section){
				
			case 'home':
				$this->_view();
				break;
			default:
				$this->_view();
		}
	}
	
	private function _view(){
		$data['main_content'] = 'customer/dashboard/home';
		$this->load->view('includes/template', $data);
	}
}