<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	

	function __construct(){
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
			
			case 'view':
				$this->_view();
				break;
			default:
				$this->_viewproduct();
		}
	}

	// view product
	private function _view(){
		
		$data['products'] = $this->_qryproduct();
		//call_debug($data['products']);
		$data['main_content'] = 'customer/product/home';
		$this->load->view('includes/template', $data);
	}
	
	//query all products
	private function _qryproduct(){
		
		$this->load->model('mdldata');
		
		$params['querystring'] = 'SELECT p.*, pp.quantity as quantity FROM product p LEFT JOIN product_price pp ON p.product_ID=pp.product_ID WHERE p.status=1 ORDER BY product_ID DESC';
		
		$this->mdldata->select($params);
		
		return $this->mdldata->_mRecords;
	}
	
	
}