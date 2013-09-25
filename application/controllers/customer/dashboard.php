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
		call_debug('dsd');
		$section = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : '';
	
		switch($section){
				
			case 'addquantity':
				$this->_addquantity($id);
				break;
			case 'addproduct':
				$this->_addproduct();
				break;
			case 'viewproduct':
				$this->_viewproduct();
				break;
			case 'editproduct':
				$this->_editproduct($id);
				break;
			default:
				$this->_viewproduct();
		}
	}
	
	
}