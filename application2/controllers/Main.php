<?php
   class Main extends CI_Controller {

   		
   		function __construct() {


			parent::__construct();
			// Load url helper
			$this->load->helper('url');
		
		}

    	public function login() 
    	{
    		if($this->session->userdata('username') && $this->session->userdata('type') == 'ADMIN')
			{
				redirect(base_url().'index.php/Admin');
			}
			else
			{
    		$this->load->view("login");
    		}
        
        }

        public function login_validation()
        {
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('username','Username','required');
        	$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run())
			{
				$username=$this->input->post('username');
				
				//echo $username;
				
				$password=$this->input->post('password');
				$type = 'ADMIN';
				$this->load->model('Main_model');
				//$this->Main_model->can_login($username,$password,$type);
				$username1 = $this->Main_model->getAll($username)->user_name;
				
				if(strcmp($username,$username1)==0){
				
				if($this->Main_model->can_login($username,$password,$type))
				{
					$session_data = array(
						'username' => $username,
						'type' => 'ADMIN'
						
					);

					$this->session->set_userdata($session_data);

					//print session variable
					//echo $this->session->userdata('username');
					redirect(base_url().'index.php/Admin');
				}
				else
				{
					$this->session->set_flashdata('error','Invalid Username and Password');	
					redirect(base_url().'index.php/main/login');
				}
				
				

					} else {
					    $this->session->set_flashdata('error','Invalid Username');	
					    redirect(base_url().'index.php/main/login');
					}
									
				
				
				
				
				
			}
			else
			{
				$this->login(); 
			}        	
        }

        public function logout()
        {
        	$this->session->unset_userdata('username');
        	$this->session->unset_userdata('type');
        	redirect(base_url());
	
        }
        public function changePassword()
{
	$data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
	$this->load->view('changePassword');
	$this->load->view('Footer');
}

   } 


?> 