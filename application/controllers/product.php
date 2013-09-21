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
	
		$section = ($this->uri->segment(3)) ? $this->uri->segment(3) : '';
		$id = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
		
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
	
	private function _addquantity($id = ''){
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT * FROM product WHERE product_ID={$id}";
		$this->mdldata->select($params);
		$data['products'] = $this->mdldata->_mRecords;
		// call_debug($data['products']);
	
		$data['main_content'] = 'product/addquantity_view.php';
		$this->load->view('includes/template', $data);
	}
	private function _addproduct(){
		$data['main_content'] = 'product/addproduct_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _viewproduct(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM product WHERE status=1';
		$this->mdldata->select($params);
		$data['products'] = $this->mdldata->_mRecords;
		
		$data['main_content'] = 'product/viewproduct_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _editproduct($id, $param =''){
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT * FROM product WHERE product_ID={$id}";
	//	$params['querystring2'] = "SELECT * FROM stock_receiving WHERE product_ID=($id)";
		
		$this->mdldata->select($params);
		$data['products'] = $this->mdldata->_mRecords;
		
		
		$data['error'] = $param;
		$data['main_content'] = 'product/editproduct_view';
		$this->load->view('includes/template', $data);
	}
	
	public function deleteproduct(){
		
		$this->load->model('mdldata');
		
		$params = array ('table' => array('name' => 'product', 'criteria_phrase' => 'product_ID= "' .$this->input->post('product_ID') . '"'),
						'fields' => array('status' => 0));
						
						call_debug($params);
						if ($this->mdldata->update($params)){
								redirect(base_url() . 'product');
						}else{
							echo "there was an error updating database";
						}	
		
			
		
		
	}
	
//============================================================
	
	public function validate_addquantity(){
				
			
		$this->load->library('form_validation');
		$this->load->model('mdldata');
		$this->load->helper('date');
		

		$this->form_validation->set_rules('quantity', 'Quantity', 'required');
		$this->form_validation->set_rules('unit_price', 'Unit Price', 'required');
		$this->form_validation->set_rules('discounted_price', 'Discounted Price', 'required');
		
		if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			
			$this->_addquantity('Please complete the form'); }
		else {
			
			// getInfo();
 			$params = array('user_user_id');
 			$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE
			$arr = $this->sessionbrowser->mData; 
			
			$params = array( 'table' => array('name' => 'stock_receiving'),
							 'fields' => array (
							 				'product_ID' => $this->input->post('product_ID'),
							 				'received_date' => date("Y-m-d"),
							 				'user_ID' => $arr['user_user_id'],
							 				'quantity' => $this->input->post('quantity'),
							 				'unit_price' =>$this->input->post('unit_price'),
							 				'discounted_price' =>$this->input->post('discounted_price')
							 ));
				
		
				//call_debug($params);
					$this->mdldata->insert($params);
						redirect(base_url() . 'product');
		}
 	
	}
	
	public function validate_addproduct(){
		$this->load->library('form_validation');
		$this->load->model('mdldata');

		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		
		//product_date, user_ID, status ==1
		
		if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->_addproduct('Please complete the form'); }
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
				//	call_debug($params);
					
					$this->mdldata->insert($params);
					redirect(base_url() . 'product');
		}
		
		
		
	}
	
	public function validate_editproduct(){
	
		$this->load->library('form_validation');
		$this->load->model('mdldata');
	
		
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		
	
		
		if($this->form_validation->run() == FALSE){   
			$this->_editproduct('Please complete the form'); }
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
				 			redirect(base_url() . 'product');
						}else{
							$this->_editproduct($this->input('product_ID'), 'database error');
						} 
				
			}	
	
	}

	public function do_upload() {
		
		$this->load->helper(array('form', 'url'));
		$this->load->view('upload_form', array('error' => ' ' ));
		
		$config['upload_path'] = '.estore/images/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			redirect(base_url() . 'product');
		}
		
	}
	

	
}