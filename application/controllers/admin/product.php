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
			
			case 'addquantity':
				$this->_addquantity($id);
				break;
			case 'add':
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

	// view product
	private function _viewproduct(){
		
		$data['products'] = $this->_qryproduct();
		//call_debug($data['products']);
		$data['main_content'] = 'admin/product/viewall';
		$this->load->view('admin/includes/template', $data);
	}
	
	//query all products
	private function _qryproduct(){
		
		$this->load->model('mdldata');
		
		$params['querystring'] = 'SELECT p.*, pp.quantity as quantity FROM product p LEFT JOIN product_price pp ON p.product_ID=pp.product_ID WHERE p.status=1 ORDER BY product_ID DESC';
		
		$this->mdldata->select($params);
		
		return $this->mdldata->_mRecords;
	}
	
	//add product view
	private function _addproduct(){
		
		$data['main_content'] = 'admin/product/addproduct';
		$this->load->view('admin/includes/template', $data);
	}
	
	// validate add product
	public function validateaddproduct(){
		
		$this->load->library('form_validation');
		
	
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
	
		//product_date, user_ID, status ==1
	
		if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->_addproduct();
		}
		else{
				
			$params = array('user_user_id');
			$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE
			$arr = $this->sessionbrowser->mData;
				
			$params = array(
					'table' => array('name' => 'product'),
					'fields' => array(
							'product_name' => $this->input->post('product_name'),
							'color' => $this->input->post('color'),
							'category' => $this->input->post('category'),
							'description' => $this->input->post('description'),
							'product_date' => date("Y-m-d"),
							'user_ID' => $arr['user_user_id'],
							'status' => 1
					)
			);
			
			$this->load->model('mdldata');
			$this->mdldata->insert($params);
			redirect(base_url() . 'admin/product');
		}
	
	
	
	}
	
	
	//add quantity view
	private function _addquantity($id = ''){
		
		$data['products'] = $this->_qryoneproduct($id);
		
		$data['main_content'] = 'admin/product/quantityview';
		$this->load->view('admin/includes/template', $data);
	}
	
	//query product with id
	private function _qryoneproduct($id){
	
		$this->load->model('mdldata');
	
		$params['querystring'] = "SELECT *, p.product_ID as product_ID FROM product p LEFT JOIN product_price pp ON p.product_ID=pp.product_ID WHERE p.product_ID={$id}";
		$this->mdldata->select($params);
	
		return $this->mdldata->_mRecords;
	}
	
	public function validateaddquantity(){
	
			
		$this->load->library('form_validation');
		$this->load->model('mdldata');
		$this->load->helper('date');
	
	
		$this->form_validation->set_rules('quantity', 'Quantity', 'required');
		$this->form_validation->set_rules('unit_price', 'Unit Price', 'required');
		$this->form_validation->set_rules('discounted_price', 'Discounted Price', 'required');
	
		if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
				
			$this->_addquantity($this->input->post('product_ID'));
		}else {
			$this->load->model('mdldata');
				
			$params['querystring'] = 'SELECT * FROM product_price WHERE product_ID=' . $this->input->post('product_ID');
				
			$this->mdldata->select($params);
				
			$dataarr = $this->mdldata->_mRecords;
			
			if($this->mdldata->_mRowCount < 1){
				$params = array(
						'table' => array('name' => 'product_price'),
						'fields' => array(
								'product_ID' => $this->input->post('product_ID'),
								'quantity' => $this->input->post('quantity'),
								'price' => $this->input->post('unit_price')
						)
				);
				$this->load->model('mdldata');
				$this->mdldata->insert($params);
			}else{
				
				
				$params = array(
						'table' => array('name' => 'product_price'),
						'fields' => array(
								'quantity ' => $this->input->post('quantity') + $dataarr[0]->quantity,
								'price' => $this->input->post('unit_price')
						)
				);
				$params['table']['criteria_phrase'] = 'product_ID =' . $this->input->post('product_ID');
					
				$this->load->model('mdldata');
				$this->mdldata->update($params);
				
			}
			
			//$quantity =
				
			redirect(base_url() . 'admin/product');
		}
	
	}
	


	
	//edit view of product
	private function _editproduct($id, $param =''){
		
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT * FROM product WHERE product_ID={$id}";
		
		$this->mdldata->select($params);
		$data['products'] = $this->mdldata->_mRecords;
		
		$data['error'] = $param;
		
		$data['main_content'] = 'admin/product/editproduct_view';
		$this->load->view('admin/includes/template', $data);
		
	}
	
	public function validateeditproduct(){
	
		$this->load->library('form_validation');
		$this->load->model('mdldata');
	
	
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
	
	
	
		if($this->form_validation->run() == FALSE){
			$this->_editproduct();
		}
		else{
	
				
			$params = array(
					'table' => array('name' => 'product', 'criteria_phrase' => 'product_ID= "' .$this->input->post('product_ID') . '"'),
					'fields' => array(
							'product_name' 	=> $this->input->post('product_name'),
							'color' => $this->input->post('color'),
							'category' 	=> $this->input->post('category'),
							'description' => $this->input->post('description')));
	
			//$this->mdldata->reset();
			//$this->mdldata->SQLText(true);
			$this->mdldata->update($params);
			if ($this->mdldata->update($params)){
				redirect(base_url() . 'admin/product');
			}else{
				$this->_editproduct();
			}
	
		}
	
	}
	
	public function deleteproduct(){
		
		$this->load->model('mdldata');
		
		$params['table'] = array('name' => 'product_price', 'criteria' => 'product_ID', 'criteria_value' => $this->input->post('product_ID'));
		$this->mdldata->delete($params);
		$params['table'] = array('name' => 'product', 'criteria' => 'product_ID', 'criteria_value' => $this->input->post('product_ID'));
		$this->mdldata->delete($params);
		
		echo '1';
	}

	
	
}