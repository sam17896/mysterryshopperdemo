<?php
   class ClientLoggedin extends CI_Controller {


   		function __construct() {


			parent::__construct();
      $this->load->model('Client_model');
      $this->load->model('Assignment_model');



		}



    	public function index()
      {
       if($this->session->userdata('username') && $this->session->userdata('type')=='CLIENT')
     {

      try{
            $id= $this->session->userdata('id');
            //API URL
            $url = base_url().'index.php/Api/get_client_from_user_id';

            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $usernames = "admin";
            $password = "1234";


            //create a new cURL resource
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
            curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'id' => $id,

    ));

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['client_data'] = $result['data'];
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }
         //print_r($data);


           $data['users']= $this->session->userdata('username');
           $data['allclient']=$this->Client_model->get_all();
           $this->load->view("Main/Client/Header",$data);
           $this->load->view("Main/Client/index",$data);
           $this->load->view("Main/Client/Footer");
          }

         else
         {

          $this->load->view("Main/Header");
           $this->load->view("Main/Login");
          $this->load->view("Main/Footer");
         }
      }

  public function invoice(){

  }
   public function addAssignment()
   {
      $data['users']= $this->session->userdata('username');
           $data['allclient']=$this->Client_model->get_all();
           $data['userid']=$this->session->userdata();
    $this->load->view("Main/Client/Header",$data);
    $this->load->view("Main/Client/AddAssignment", $data);
    $this->load->view("Main/Client/Footer");
   }
      public function store_assignments()
      {

        try{
            $id = $this->uri->segment(3);
            //API URL
            $url = base_url().'index.php/Api/get_client_assignments_from_user_id';

            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $usernames = "admin";
            $password = "1234";


            //create a new cURL resource
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
            curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'id' => $id,

    ));

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['alldata'] = $result['data'];
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

        if($this->session->userdata('username') && $this->session->userdata('type')=='CLIENT')
        {
          $data['users']= $this->session->userdata('username');
          $data['alldata'] = $this->Assignment_model->get_completed_assignment_against_client($id);
          $this->load->view("Main/Client/Header",$data);
          $this->load->view("Main/Client/store_assignments",$data);
          $this->load->view("Main/Client/Footer");
        }
         else
         {
          $this->load->view("Main/Header");
          $this->load->view("Main/Login");
          $this->load->view("Main/Footer");
         }
      }




  }


