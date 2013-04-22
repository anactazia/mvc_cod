<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Theme extends CI_Controller {

     public function __construct() { 
      	      
      	parent::__construct();
     	}


     public function Index() {
        $this->load->view("header");
	$this->load->view("nav");
	$this->load->view("theme/index");
	$this->load->view("footer");
  }
 
  		public function testtext() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("theme/testtext");
		$this->load->view("footer");
}
    

      public function someregions() {
            	$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("theme/someregions");
		$this->load->view("footer");

      }


      public function allregions() {
                $this->load->view("header");
		$this->load->view("nav");
		$this->load->view("theme/allregions");
		$this->load->view("footer");
        
      }      
    
     
}

