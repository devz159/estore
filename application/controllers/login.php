<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$this->_login();
	}
	
	public function _login($param = ''){
		$data['error'] = $param;
		$data['main_content'] = "login/main_view";
		$this -> load -> view('includes/template', $data);
	}

	public function validatelogin() {
		
		//form validation
		$this->form_validation->set_rules('username','Username', 'required');   //set rules for username 
		$this->form_validation->set_rules('password', 'Password', 'required');    //set rules for password
	
		if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->_login('Please complete the form');
		} else {
			
			
			if($this->_isUserExist()){	//checks user exist in the database
				//go to dashboard
				//redirect
				echo "success";
				
			}else{
				$this->_login('username and password does not match');
			}
		}
	}
	
	private function _isUserExist(){
		$strqry  = "SELECT username, password FROM user WHERE username='{$this->input->post('username')}' AND password=md5( '{$this->input->post('password')}' )";
		// echo $strqry; die();
		$params['querystring'] = $strqry;
		$this->load->model("mdldata");
		$this->mdldata->select($params);
		
		if($this->mdldata->_mRowCount<1)
			return false;
		else
			return true;
	}



}
