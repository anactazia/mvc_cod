<?php 
 
class HelloWorld extends CI_Controller {
  public function say($arg1 = "Hello World") {
    $data['arg1'] = $arg1;
    $this->load->view('hello_world', $data);
  }
 
}
