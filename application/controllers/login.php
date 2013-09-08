<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$this->login();
	}
	
	public function login($param = ''){
		$data['error'] = $param;
		$data['main_content'] = "login/login_view";
		$this -> load -> view('includes/template', $data);
	}

	public function validatelogin() {
		
		//form validation
		$this->form_validation->set_rules('username','Username', 'required');   //set rules for username 
		$this->form_validation->set_rules('password', 'Password', 'required');    //set rules for password
	
		if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->login('Please complete the form');
		} else {
			
			
			if($this->_isUserExist()){	//checks user exist in the database
 				//redirect
				echo "success";
				
			}else{
				$this->login('username and password does not match');
			}
		}
	}
	
	private function _isUserExist(){
		$strqry  = " SELECT username, password FROM user WHERE username='{$this->input->post('username')}' AND password=md5( '{$this->input->post('password')}' )";
	//	echo $strqry; die();
		$params['querystring'] = $strqry;
		$this->load->model("mdldata");
		$this->mdldata->select($params);
		
		if($this->mdldata->_mRowCount<1)
			return false;
		else
			return true;
	}

 
	
	public function registration($param = ''){
	
		$data['error'] = $param;
		$data['main_content'] = "login/registration_view";
		$this -> load -> view('includes/template', $data);
	}
		
	public function validateregistration(){
			
		$this->load->library('form_validation');
		$this->load->model('mdldata');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[16]') ;
		$this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
		$this->form_validation->set_rules('firstname', 'Firstname','required');
		$this->form_validation->set_rules('middlename', 'Middlename','required');
		$this->form_validation->set_rules('lastname', 'Lastname','required');
		$this->form_validation->set_rules('contact_number', 'Contact Number','required');
		$this->form_validation->set_rules('birthdate', 'Birthdate');

	if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->registration('Please complete the form');
		}
	else{ 
			$params = array(
							'table' => array('name' => 'user'),
							'fields' => array(
												'username' => $this->input->post('username'),
												'password' => md5($this->input->post('password')),
												'email' => $this->input->post('email'),
												'firstname' => $this->input->post('firstname'),
												'middlename' => $this->input->post('middlename'),
												'lastname' => $this->input->post('lastname'),
												'contact_number' => $this->input->post('contact_number'),
												'birthdate' => $this->input->post('birthdate'),
												'user_level' => 0, //admin-1 user-0
												'status' => 1 //active-1 inactive-0
												) 
							);
						
					//	$this->mdldata->SQLText(TRUE);	
				//		 $query = $this->mdldata->buildQueryString();
						
						$this->mdldata->insert($params);
						$data['main_content'] = 'login/dashboard_view';
						$this->load->view('includes/template', $data);					
		}
					
	}
}