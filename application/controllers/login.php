<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {
	parent::__construct();
		
	// getInfo();
 			$params = array('user_islog');
 			$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE

 
}
	
	public function index() {
	
		
		$data['main_content'] = "home/home_view";
		$this -> load -> view('includes/template', $data);
		

	}

	public function validatelogin() {
			
		$data['error'] = $param;
		$data['main_content'] = "login/login_view";
		$this ->load-> view('includes/template', $data);
		
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$userlevel = -1; //default value
		$fullname = '';
		
		
  $stQry = sprintf("SELECT * FROM `user` WHERE username='%s' AND password='%s' AND `status`=1", $username, MD5($password));
  $params['querystring'] = $strQry;
  $this->mdldata->select($params);
	
	//checks if user exists
	if($this->mdldata->_mRowCount == 1) {
      // redirect
      foreach ($this->mdldata->_mRecords as $rec) {
        $userLevel = $rec->user_level; // gets the userlevel from the db
        $userFullName = $rec->firstname . " " . $rec->lastname;
        break; // exits from the loop
       	}
	  
	  	if ($userlevel ==0) {
	  	$this->setSessionVar($username, $fullname, $userlevel);
	  	} 
	  	else{
	  		$this->setSessionVar($username, $fullname, $userlevel);
	  	}
	}
	else {
		redirect(base_url(admin/dashboard));
		} 
	  
	}		
	
	
 	public function logout(){
 		
			$params = array('user_username', 'user_islog', 'user_fullname','user_user_level');
		 	$this->sessionbrowser->destroy($params); // returns TRUE if successful, otherwise FALSE
		 	
 			// DATA:
 			$arr = $this->sessionbrowser->mData;
			
			redirect(base_url());						 
	}


	
	public function register($param = ''){
	
		$data['error'] = $param;
		$data['main_content'] = "login/register_view";
		$this -> load -> view('includes/template', $data);
	}

		
		
	public function validateregister(){
			
		$this->load->library('form_validation');
		$this->load->model('mdldata');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[16]') ;
		$this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
		$this->form_validation->set_rules('firstname', 'Firstname','required');
		$this->form_validation->set_rules('middlename', 'Middlename','required');
		$this->form_validation->set_rules('lastname', 'Lastname','required');
		$this->form_validation->set_rules('contact_number', 'Contact Number','required');

	if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->register('Please complete the form');
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
												'user_level' => 0, //admin-1 user-0
												'status' => 1 //active-1 inactive-0
												) 
							);
						
					//	$this->mdldata->SQLText(TRUE);	
				//		 $query = $this->mdldata->buildQueryString();
				//		call_debug($params);
						$this->mdldata->insert($params);
						
						
						$params = array(
 							'user_username' => $this->input->post('username'),
 							'user_islog' => TRUE,
 							'user_fullname' => $this->getfullname($this->input->post('username')), 
 						);
 				
 						$this->sessionbrowser->setInfo($params); // returns TRUE if successful, otherwise FALSE
		//	call_debug($params);	
					redirect(base_url('user/dashboard'));
					}
	}

//==========================================PRIVATE VARIABLES============================================================//
//private variables

	private function getuserlevel($username) {
		
	$params["querystring"] = "SELECT user_level FROM `user` WHERE username = '".$username."'";
	$this->mdldata->select($params);
	$records = $this->mdldata->_mRecords;
	foreach ($records as $rec){
		
		return $rec->user_level;
			}
	}

	private function getfullname($username) {
		
		$strQry = "SELECT CONCAT( firstname,  ' ', middlename,  ' ', lastname ) AS fullname FROM `user` WHERE username = '".$username. "'";
		
		$records = $this->db->query($strQry)->result();
		
		foreach($records as $rec) {
			return $rec->fullname;
		}
		
		return "no user";
		
	}
	
	private function _isUserExist(){
		$strqry  = " SELECT username, password FROM user WHERE username='{$this->input->post('username')}' AND password=md5( '{$this->input->post('password')}' )";
	//	echo $strqry; die();
		$params['querystring'] = $strqry;
		$this->load->model('mdldata');
		$this->mdldata->select($params);
		
		if($this->mdldata->_mRowCount<1){
			return false; }
		else {
			return true;
		}
	
	}

	 protected function setSessionVar ($username, $fullname, $userlevel){
    // setInfo();
     $params = array(
            'user_username' => $username,
            'user_islog' => TRUE,
            'user_fullname' => $fullname,
            'user_user_level' => $userlevel
            );  
    $this->sessionbrowser->setInfo($params); // returns TRUE if successful, otherwise FALSE
  }
 }