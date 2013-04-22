<?php
class User extends CI_Controller{
	
  public function __construct(){
    parent::__construct();
    $this->load->model('user_model');
    $this->load->helper(array('form','url'));
    $this->load->library('form_validation'); 
  }	
  
  public function index() {
  	  $this->login();
  }	  
  	  
  public function login() {
	$this->load->view("header");
	$this->load->view("nav");
	$this->load->view("user/login");
	$this->load->view("footer");
}	  
	
  public function signup(){
	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('user/signup');
	$this->load->view('footer');
  }

  public function members() {
		
	if($this->session->userdata('is_logged_in')) {	
	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('user/members');
	$this->load->view('footer');
	} else {
	redirect('index.php/user/restricted');
	}
  }

  public function restricted(){
  	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('user/restricted');
	$this->load->view('footer');
	
  }
  
   public function profile(){
   	 
   	if($this->session->userdata('is_logged_in')) {
   		$this->db->get('cod_users');
   	$email = 	$this->input->post('email');
   	$query = "SELECT * FROM 'cod_users' WHERE email = '$email'";
   	
   	$data = array( 
				'name' => $query['name'],
				'nickname' => $query['nickname'],
				'email' => $query['email'],
				'password' => $query['password'],
				'role' => $query['role'],
				);

   	
	
  	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('user/profile');
	$this->load->view('footer');
	} else {
	redirect('index.php/user/restricted');
	}
	
  }
  
  public function login_validation() {
				
	$this->load->library('form_validation'); 
	
	$this->form_validation->set_rules('email', 'E-Mail', 'required|trim|xss_clean|callback_validate_credentials');
	$this->form_validation->set_rules('password', 'Lösenord', 'required|md5|trim');
	
	$this->form_validation->set_message('required', "Du måste fylla i alla fält!");
	$this->form_validation->set_message('required', "Dina uppgifter stämmer inte!");
	
	if ($this->form_validation->run()) {
		
		$data = array( 
				'email' => $this->input->post('email'),
				'is_logged_in' => 1);
		$this->session->set_userdata($data);
		redirect('index.php/user/members');
		} else {
		$this->session->set_flashdata('message', 'Något blev fel, försök igen!');
			  			    redirect('index.php/user/login');}

	}
		
 

  public function signup_validation() {
	
  	$this->load->library('form_validation'); 
			
	$this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email|is_unique[cod_users.email]');
	$this->form_validation->set_rules('password', 'Lösenord','required|trim');
	$this->form_validation->set_rules('cpassword', 'Bekräfta Lösenord', 'required|trim|matches[password]');
	
	$this->form_validation->set_message('is_unique', "E-Mail adressen är redan registrerad!");
	$this->form_validation->set_message('required', "Du måste skriva in ett lösenord!");
	$this->form_validation->set_message('matches', "Du skrev in olika lösenord!");
	$this->form_validation->set_message('valid_email', "E-Mail adressen är inte giltig!");


			
		if ($this->form_validation->run()){
			//generate a random key
			$key = md5(uniqid());
			
			$this->load->library('email', array('mailtype'=>'html'));
			$this->load->model('user_model');
			
			$this->email->from('anactazia@hotmail.com', "Anna");
			$this->email->to($this->input->post('email'));
			$this->email->subject("Bekräfta ditt konto!");
			
			$message = "<p>Tack för att du skapade ett konto.<br/>Välkommen som medlem!</p>";
			$message .= "<p><a href='".base_url()."index.php/user/register_user/$key'>Tryck här</a> för att bekräfta ditt konto.</p>";
			
			$this->email->message($message);
			
			//send an email to the user
			if($this->user_model->add_temp_user($key)) {
			  if($this->email->send()) {$this->session->set_flashdata('message', 'Ett E-Mail har skickats till din adress!');
			  			    redirect('index.php/user/signup');} 
			                           else 
			                           {$this->session->set_flashdata('message', 'Kunde inte skicka email!');
			  			    redirect('index.php/user/signup');} 
			  } else {$this->session->set_flashdata('message', 'Problem adding to database!');
			  			    redirect('index.php/user/signup');} 
							
			//add them to the temp_users db
			
			
			
			} else {
			$this->signup();

		}
  }

  public function profile_validation() {
	
  	$this->load->library('form_validation'); 
  	$this->load->model('user_model');
  	
			
	$this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');
	$this->form_validation->set_rules('password', 'Lösenord','required|trim');
	
	

	$this->form_validation->set_message('required', "Du måste skriva in ett lösenord!");
	$this->form_validation->set_message('matches', "Du skrev in olika lösenord!");
	$this->form_validation->set_message('valid_email', "E-Mail adressen är inte giltig!");
  
	if ($this->form_validation->run()) {
		$data = array( 
				'name' => $this->input->post('name'),
				'nickname' => $this->input->post('nickname'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
	
		
				);
		
		$this->db->where('email', $this->input->post('email'));
		$this->db->update('cod_users', $data);
		$this->session->set_userdata($data);

		
		redirect('index.php/user/profile');
		$this->session->set_flashdata('message', 'Du har ändrat dina uppgifter!');
		} else {
		$this->session->set_flashdata('message', 'Något blev fel, försök igen!');
			  			    redirect('index.php/user/profile');}


		
	}
	
	
	
	
	
	
	
  public function validate_credentials() {

  	  $this->load->model('user_model');
			
		if($this->user_model->can_log_in()){
			return true;
			} else {
			$this->form_validation->set_message('validate_credentials', 'Felaktig e-mail-adress eller lösenord. ');
			return false;
		}
  }
		
  public function logout() {
			
  	  $this->session->sess_destroy();

  	$this->load->view('header');
	$this->load->view('nav');
	$this->load->view('user/logout');
	$this->load->view('footer');
	

  }
  
  public function register_user($key) {
  	  $this->load->model('user_model');
  	  
  	  if($this->user_model->is_key_valid($key)) {
  	  	  if($newemail = $this->user_model->add_user($key)){
  	  	  	  $data = array(
  	  	  	  	  'email' => $newemail,
  	  	  	  	  'is_logged_in' => 1 
  	  	  	  	  );
  	  	  	  $this->session->set_userdata($data);
  	  	  	  redirect('index.php/user/members');
  	  	  	  
  	  	  } else { echo "failed to add user, please try again.";}
  	  
  	  }else{ echo "invalid key";}
  }
  
   	  
  
}  
