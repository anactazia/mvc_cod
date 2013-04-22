<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
{
	$data['news'] = $this->news_model->get_news();
	$data['title'] = 'News archive';
	$data['author'] = $this->session->userdata('nickname');

	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('news/index', $data);
	$this->load->view('footer');
}

	public function newslist()
{
	$data['news'] = $this->news_model->get_news();
	$data['title'] = 'News archive';
	$data['author'] = $this->session->userdata('nickname');


	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('news/newslist', $data);
	$this->load->view('footer');
}

	public function success()
{
	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('news/success');
	$this->load->view('footer');
}

	public function view($slug)
{	
	$data['news_item'] = $this->news_model->get_news($slug);
	$data['author'] = $this->session->userdata('nickname');
	if (empty($data['news_item']))
	{
		show_404();
	}

	$data['title'] = $data['news_item']['title'];
	$data['author'] = $this->session->userdata('nickname');
	
	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('news/view', $data);
	$this->load->view('footer');
}

	public function edit($slug)
{	
	$data['news_item'] = $this->news_model->get_news($slug);
	$data['author'] = $this->session->userdata('nickname');
	
	if (empty($data['news_item']))
	{
		show_404();
	}
	
	$this->session->set_userdata($data);

	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('news/edit', $data);
	$this->load->view('footer');
}


	public function create()
{
	$this->load->helper('form');
	$this->load->library('form_validation');
	
	$data['title'] = 'Skriv i bloggen';
	$data['author'] = $this->session->userdata('nickname');
	
	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');
	
	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('news/create', $data);
		$this->load->view('footer');
		
	}
	else
	{
		$this->news_model->set_news();
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('news/success');
		$this->load->view('footer');
	}
}

  public function edit_validation() {
  	  
 	$this->load->library('form_validation'); 
  	$this->load->model('news_model');
  	
  	$this->form_validation->set_rules('title', 'Titel', 'trim|required|xss_clean');			
	$this->form_validation->set_rules('text', 'Text', 'required|trim|');

	if ($this->form_validation->run()) {
		$this->load->database();

		$data = array( 
				'title' => $this->input->post('title'),
				'text' => $this->input->post('text'),
				'type' => $this->input->post('type'),
				'edited' => $this->input->post('edited'),
				'filter' => $this->input->post('filter'),
				'slug' => $this->input->post('slug'),
		
				);
		
		$this->db->where('slug', $this->input->post('slug'));
		$this->db->update('cod_news', $data);
		$this->session->set_userdata($data);
		
		redirect('index.php/news/success');
		$this->session->set_flashdata('message', 'Du har ändrat dina uppgifter!');
		} else {
		$this->session->set_flashdata('message', 'Något blev fel, försök igen!');
			  			    redirect('index.php/news/edit');}


		
	}

}
