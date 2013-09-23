<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct() {
		parent::__construct();

	}
	
	public function index(){
		$data['main_content'] = "home/home_view";
		$this -> load -> view('includes/template_login', $data);
	}
	
	public function about_us() {
		
		
	}
	
	public function contact_us(){
		
		
	}
	
	public function faq(){
		
		
	}


}