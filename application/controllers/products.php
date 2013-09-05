<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	
public function __construct() {
		parent::__construct();	
	
	}

	public function index(){
		
	$data['main_content'] = "products_view"; 
	$this->load->view('products_view',$data);
		
	}

	
	public function add() {
	
	
	}
	
	public function delete(){
		
	}
	
	
	public function edit(){
		
	}
	
	public function read(){
		
	}



}