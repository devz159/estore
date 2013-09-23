<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		authUser(array('section' => 'log', 'sessvar' => array('user_user_id','user_username', 'user_fullname', 'user_user_level', 'user_islog')));

		
	}
	
	public function index(){
		$this->section();
	}
	
	public function section(){
	
		$section = ($this->uri->segment(3)) ? $this->uri->segment(3) : '';
		$id = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
		
		switch($section){
			
			case 'viewuser':
				$this->_view();
				break;
			default:
				$this->_view();
		}
	}
	
	private function _view(){
		$data['users'] = $this->_getUsers();
		$data['main_content'] = 'admin/users/view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getUsers($param = ''){
		
		if(empty($param))
			$querystring = 'SELECT * FROM user';
		else
			$querystring = 'SELECT * FROM user WHERE user_ID=' . $param;
		
		$this->load->model('mdldata');
		
		$params['querystring'] = $querystring;
		
		if( $this->mdldata->select($params) ){
			
			$arrData = $this->mdldata->_mRecords;
			
			return $arrData;
		}else{
			return false;
		}
	}
	
}