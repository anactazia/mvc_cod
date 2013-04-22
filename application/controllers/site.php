<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function index() {
		$this->home();
		
}

	public function home() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("home");
		$this->load->view("footer");
}

	public function about() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("about");
		$this->load->view("footer");
}
	public function contact() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("contact");
		$this->load->view("footer");
}

	
		
}
