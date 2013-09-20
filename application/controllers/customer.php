<?php

//CRUD for customers

 class Customer extends CI_Controller{
 	
	public function __construct() {
		parent::__construct();
		
		authUser(array('sessvar' => array('user_user_id, user_user_level, user_username', 'user_islog', 'user_fullname')));
	}
	
	
	public function index(){
		//this function is the fallback if the method in this controller is not specified, it could be a VIEWS 
	$this->load->view('dashboard/admindash_view');
	
	}
	
	private function _searchcustomer(){
		//this function is for searching customers
		
	}
	
	private function _displaycustomer(){
		//this function is for the tabular display of ALL customers
		
	}
	
	private function _addcustomer () {
		//this function is for adding customers
		
		
	}
 	
	private function _editcustomer (){
		//this function is for editing customers
		
		
	}
	
	private function _deletecustomer() {
		//this function is for deleting 
		
	}


 } 