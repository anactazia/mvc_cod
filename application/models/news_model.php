<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_news($slug = FALSE)
{
	if ($slug === FALSE)
	{
		$query = $this->db->get('cod_news');
		return $query->result_array();
	}
	
	$query = $this->db->get_where('cod_news', array('slug' => $slug));
	return $query->row_array();
}

	public function set_news()
{
	$this->load->helper('url');
	
	$slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	$data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text'),
		'type' => $this->input->post('type'),
		'filter' => $this->input->post('filter'),
		'author' => $this->session->userdata('nickname'),

	);
	
	return $this->db->insert('cod_news', $data);
}


	public function getAll() {
	$query = $this->db->query("SELECT * FROM cod_news");
	return $query->result();
}

	public function getOne($slug) {
	$query = $this->db->query("SELECT * FROM cod_news WHERE slug = $slug");
	return $query->singleresult($slug);

	}
	public function update($slug){
	$this->db->update("cod_news", $data, "slug = $slug");
}



}
