<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	
public function __construct() {
		parent::__construct();	
		
		authUser(array('sessvar' => array('user_username', 'user_islog', 'user_fullname')));
		
	}

	public function index(){
		
	$data['main_content'] = "products/create_view";
	$this->load->view('includes/template', $data);
	}
		
	
	public function create($param = ''){  
		
		$this->load->library('form_validation');
		$this->load->model('mdldata');
		
		$this->form_validation->set_rules('product_name', 'product_name', 'required');
		$this->form_validation->set_rules('quantity','quantity', 'required' );
		$this->form_validation->set_rules('selling_price','selling_price', 'required');
		$this->form_validation->set_rules('discounted_price','discounted_price', 'required');
		$this->form_validation->set_rules('color', 'color','required');
		$this->form_validation->set_rules('size', 'size','required');
		$this->form_validation->set_rules('description', 'description','required');
				
		if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->create('Please complete the form');
		}
	else{ 
			$params = array(
							'table' => array ('name' => 'product'),
							'fields' => array (
												'product_name' => $this->input->post('product_name'),
												'quantity' => $this->input->post('quantity'),
												'selling_price' => $this->input->post('selling_price'),
												'discounted_price' => $this->input->post('discounted_price'),
												'color' => $this->input->post('color'),
												'size' => $this->input->post('size'),
												'description' => $this->input->post('description'),
												'status' => 1 //active-1 inactive-0
												)
										);
							
					//	$this->mdldata->SQLText(TRUE);	
				//		 $query = $this->mdldata->buildQueryString();
						
					
						$this->mdldata->insert($params);
						$data['main_content'] = 'products/success_view';
						$this->load->view('includes/template', $data);					
		}
			
}
	
	
	 public function edit($param = ''){  
		
	$this->load->library('form_validation');
	$this->load->model('mdldata');
		
		$this->form_validation->set_rules('product_name', 'product_name', 'required');
		$this->form_validation->set_rules('quantity','quantity', 'required' );
		$this->form_validation->set_rules('selling_price','selling_price', 'required');
		$this->form_validation->set_rules('discounted_price','discounted_price', 'required');
		$this->form_validation->set_rules('color', 'color','required');
		$this->form_validation->set_rules('size', 'size','required');
		$this->form_validation->set_rules('description', 'description','required');
					
			if($this->form_validation->run() == FALSE){     //if form in fields are incomplete, returns you to login_view
			$this->create('Please complete the form');
		}
	
	else{ $params = array(
							'table' => array ('name' => 'product'),
							'fields' => array (
												'product_name' => $this->input->post('product_name'),
												'quantity' => $this->input->post('quantity'),
												'selling_price' => $this->input->post('selling_price'),
												'discounted_price' => $this->input->post('discounted_price'),
												'color' => $this->input->post('color'),
												'size' => $this->input->post('size'),
												'description' => $this->input->post('description'),
												'status' => 1 //active-1 inactive-0
												)
							);
					
						$this->mdldata->update($params);
						$data['main_content'] = 'products/success_view';
						$this->load->view('includes/template', $data);		
		}
	}

	 public function delete($param = ''){
	 		
		$this->load->model('mdldata');
		
				$params = array ( 'table' => array ('name' => 'product'),
									'fields' => array ( 'status' => 0 )
								);
			 		$this->mdldata->update($params);
					$data['main_content'] = 'products/success_view';
					$this->load->view('include/template');
				}






} 