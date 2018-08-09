<?php
   class Admin extends CI_Controller {

   		
   		function __construct() {


			parent::__construct();
			
		
		}

		public function db(){

			$this->load->database();
		}

    	public function index() {
        	
			if($this->session->userdata('username') && $this->session->userdata('type') == 'ADMIN')
			{
	        $data['user']= $this->session->userdata('username');
        	$this->load->view("Header",$data);
        	$this->load->view("index"); 
        	$this->load->view("Footer");
        	
        	}
        	
        	else
        	{
        		redirect(base_url().'index.php/main/login');
        	}
     	}

   } 


?> 