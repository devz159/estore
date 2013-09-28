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
				
			case 'faq':
				$this->_faq();
				break;
			case 'contacts':
				$this->_contacts();
				break;
			case 'about_us':
				$this->_aboutUs();
				break;
			default:
				$this->_faq();
		}
	}
	
	private function _faq(){
		$data['main_content'] = 'customer/pages/faq';
		$this->load->view('includes/template', $data);
	}
	
	private function _aboutUs(){
		$data['main_content'] = 'customer/pages/about_us';
		$this->load->view('includes/template', $data);
	}
	
	private function _contacts(){
		$data['main_content'] = 'customer/pages/contacts';
		$this->load->view('includes/template', $data);
	}
	

}