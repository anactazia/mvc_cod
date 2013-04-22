<?php 
 
class HelloWorld2 extends CI_Controller {
 
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('helloworld_model', 'model');
  }
 
  public function index() {
    $data['var1'] = $this->model->load();
    $this->load->view('hello_world2', $data);
  }
 
  public function save($var1) {
    $this->model->save($var1);
    $this->index();
  }
 
}
