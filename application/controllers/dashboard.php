<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
public function __construct() {
		parent::__construct();	
	
	}

	public function index(){
		
	$data['main_content'] = "dashboard_view"; 
	$this->load->view('dashboard_view',$data);
		
	}

	
	public function login() {
	 
	}
	
	public function logout() {
	
	}
	
	public function registration() {
	
	}
	
	public function admin_dashboard() {
	
	}
	
	public function user_dashboard() {
	
	}
	
	public function manager_dashboard() {
	
	}	

	public function orderprocessor_dashboard() {
	
	}

	
	

}