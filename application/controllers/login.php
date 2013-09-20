<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {
	parent::__construct();
		
	// getInfo();
 			$params = array('user_islog');
 			$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE
}
	
public function index() {
	
	
		$data['main_content'] = "login/login_view";
		$this -> load -> view('includes/template', $data);
		//$data['main_content'] = "login/login_view";
	}
	
	public function validatelogin(){
		$username= $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$userlevel = -1; // default value
		$userfullname = '';
		
		$this->load->model('mdldata');
		
		$stQry = sprintf("SELECT * FROM `user` WHERE username='%s' AND password='%s' AND `status`=1", $username, MD5($password));
		$params['querystring'] = $stQry;
		$this->mdldata->select($params);
		
		// checks if user exists

		
		if($this->mdldata->_mRowCount == 1):
			// redirect
			foreach ($this->mdldata->_mRecords as $rec) {
				$userid = $rec->user_ID;
				$userlevel = $rec->user_level; // gets the userlevel from the db
				$userfullname = $rec->firstname . " " . $rec->lastname;
				break; // exits from the loop
			}
			
			if($userlevel == 1) {
				$this->setSessionVar($userid,$username, $userfullname, $userlevel);
				redirect('dashboard/admin_dash');
				
			} else {
				$this->setSessionVar($userid,$username, $userfullname, $userlevel);
				redirect('dashboard/user_dash');
			}
			
			// redirects to dashboard.
			
		else:
			// error
			echo "Username and password do not match.";
		endif;
	}
	
	
 	
	public function register($param = ''){
	
		$data['error'] = $param;
		$data['main_content'] = "login/register_view";
		$this->load->view('includes/template', $data);
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
	

	else { 
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
					redirect(base_url('dashboard/user_dash'));
					}
	}

public function logout () {
		// destroy();
 		$params = array('user_username', 'user_islog', 'user_fullname', 'user_user_level');
 		$this->sessionbrowser->destroy($params); // returns TRUE if successful, otherwise FALSE
 		redirect(base_url('login'));
 		
	}

//==========================================PRIVATE FUNCTIONS============================================================//


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
		$strQry  = " SELECT username, password FROM user WHERE username='{$this->input->post('username')}' AND password=md5( '{$this->input->post('password')}' )";
	//	echo $strQry; die();
		$params['querystring'] = $strQry;
		$this->load->model('mdldata');
		$this->mdldata->select($params);
		
		if($this->mdldata->_mRowCount<1){
			return false; }
		else {
			return true;
		}
	
	}

 protected function setSessionVar ($userid, $username, $fullname, $userlevel) {
		// setInfo(); 
//		echo $username;
//		echo ' '.$fullname;
//e		call_debug(' '. $userlevel);
		
 		$params = array(
 						'user_user_id' => $userid,
						'user_username' => $username,
						'user_islog' => TRUE,
						'user_fullname' => $fullname,
 						'user_user_level' => $userlevel
						);	
						
		$this->sessionbrowser->setInfo($params); // returns TRUE if successful, otherwise FALSE
		}
	}