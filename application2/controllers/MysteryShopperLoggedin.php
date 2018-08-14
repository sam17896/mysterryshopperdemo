<?php
   class MysteryShopperLoggedin extends CI_Controller {


   		function __construct() {


			parent::__construct();
      $this->load->model('Client_model');
      $this->load->model('Assignment_model');
      $this->load->model('User_model');
      $this->load->model('Client_assignment_model');
      $this->load->model('MysteryShopper_model');
      $this->load->model('Shopper_Assignment');
      $this->load->model('Wallet');



		}



    	public function index() {

          $id = $this->session->userdata('id');
          $data['shopperCity'] = $this->MysteryShopper_model->searchMysteryShopperUser($id);
          try{
              $url2 = base_url().'index.php/Api/allUser';
              $apiKey = 'CODEX@123';
              $usernames = "admin";
              $password = "1234";
              $ch = curl_init($url2);
              curl_setopt($ch, CURLOPT_TIMEOUT, 30);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
              curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
              curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");
              $result = curl_exec($ch);
              $result = json_decode($result, true);

                curl_close($ch);
                $data['allUser'] = $result['data'];
              }
              catch(Exception $e)
              {
                echo $e;
              }
              $data['user_id'] = $this->session->userdata('id');
              $data['users']= $this->session->userdata('username');
              $data['takenAssignment'] = $this->Client_assignment_model->getTotalTakenAssignment($data['user_id'])[0];
              $data['allclient']=$this->Client_model->get_all();
              $this->load->view("Main/Mystery_Shopper/Header",$data);
              $data1['allAssignment'] = $this->Client_assignment_model->getAllAssignments($data['user_id']);
              $this->load->view("Main/Mystery_Shopper/index",$data1);
              $this->load->view("Main/Mystery_Shopper/Footer");
            }
     	public function ReviewUploadGreeting()
        {
        $data['users']= $this->session->userdata('username');
          $this->load->view("Main/Mystery_Shopper/Header",$data);
          $this->load->view("Main/ReviewUploadGreetingPage");
          $this->load->view("Main/Mystery_Shopper/Footer");
        }

      public function assignment_detail()
      {

         $id = urldecode($this->uri->segment(3));
         $branch_id = urldecode($this->uri->segment(4));
         $data['users']= $this->session->userdata('username');
         $data['allclient']=$this->Client_model->get_all();
         $user_id = $this->session->userdata('id');
         $data['shopperCity'] = $this->MysteryShopper_model->searchMysteryShopperUser($user_id);
         $data['selected_assignment'] = $this->Client_assignment_model->searchAssignment($id,$branch_id)[0];

         if($this->session->userdata('username') && $this->session->userdata('type') == 'MYSTERYSHOPPER')
         {
             $this->load->view("Main/Mystery_Shopper/Header",$data);
             $this->load->view("Main/Mystery_Shopper/assignment_detail",$data);
             $this->load->view("Main/Mystery_Shopper/Footer");

             }
              else
             {
              redirect(base_url().'index.php/Web/login');
             }

      }
       public function get_assignment()
      {

        $id = urldecode($this->uri->segment(3));
        $budget= urldecode($this->uri->segment(4));
        $branch_id =urldecode($this->uri->segment(5));
        $mystery_shopper_id = $this->session->userdata('id');

        $username = 'admin';
    	  $password = '1234';


        $url =  base_url().'index.php/Api/get_assignment';
        $noOfAssignment = $this->User_model->getTotalTakenAssingmentCount($mystery_shopper_id);
   $data = array(
        'mystery_shopper_id' => $mystery_shopper_id,
        'id' => $id,
        'budget'=> $budget,
        'takenAssignment' => $noOfAssignment->takenAssignment + 1,
    );
			$user_id =$mystery_shopper_id;

        $takenAssignment = array(
            'takenAssignment' => $noOfAssignment->takenAssignment + 1,
        );
		$this->User_model->update($user_id,$takenAssignment);

		$shopper_assignment = array(
			'shopper_id'=>$user_id,
      'assignment_id'=>$id,
      'budget'=>$budget,
      'branch_id'=>$branch_id,
			'status' => 'Working',
		);
    $this->Shopper_Assignment->add($shopper_assignment);
    redirect(base_url().'index.php/MysteryShopperLoggedin');
    }


      public function mystery_shopper_assignment() {


          try{

            $id = $this->session->userdata('id');

          //API URL
            $url = base_url().'index.php/Api/takken_pending_assignments/'.$id;

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['allAssignment'] = $result['data'];
          //print_r($data);
           $expireAssignmentCheck =  $result['data'];

         }
         catch(Exception $e)
         {
          echo $e;
         }


          if($this->session->userdata('username'))
     {

      if($expireAssignmentCheck != null){
     foreach($expireAssignmentCheck as $key => $value){
          if($value['mysteryShopper_assignment_toDate'] < date("Y-m-d")){
		      $id = $value['mysteryShopper_assignment_id'];
		      $mystery_shopper_id = $this->session->userdata('id');
		           try{
          //API URL
            $url2 = base_url().'index.php/Api/allUser';
            //API key
            $apiKey = 'CODEX@123';
            //Auth credentials
            $usernames = "admin";
            $password = "1234";
            //create a new cURL resource

            $ch = curl_init($url2);

            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));

            curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");

            $result = curl_exec($ch);

            $result = json_decode($result, true);



          //print_r($result);

          //echo $result['data'];



          //close cURL resource

          curl_close($ch);

          $dataUser = $result['data'];

          //print_r($data);

          foreach ($dataUser as $key => $value)
         {
         if($value['user_id'] == $mystery_shopper_id && $value['user_type'] =='MYSTERYSHOPPER' )
          {
              $noOfAssignment =    $value['takenAssignment']-1;
         }
         }

         }

         catch(Exception $e)

         {

          echo $e;

         }



		    $username = 'admin';
		    $password = '1234';

		    // Alternative JSON version
		    // $url = 'http://twitter.com/statuses/update.json';
		    // Set up and execute the curl process
		    $url =  base_url().'index.php/Api/ExpireTakkenAssignment';
		    //echo $url;
		    $curl_handle = curl_init();
		    curl_setopt($curl_handle, CURLOPT_URL,$url);
		    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($curl_handle, CURLOPT_POST, 1);
		    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
		        'mystery_shopper_id' => $mystery_shopper_id,
		        'id' => $id,
           		'takenAssignment' => $noOfAssignment,

		    ));

		    // Optional, delete this line if your API is open
		    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);

		    $buffer = curl_exec($curl_handle);
		    curl_close($curl_handle);

		    $result = json_decode($buffer);
		   // print_r($result);

		    if(isset($result->status) && $result->status == 'success')
		    {
		       // echo 'User has been updated.';
		    }

		    else
		    {
		       // echo 'Something has gone wrong';
		        //print_r($result);
		    }



          }





         }
        }












          $data['users']= $this->session->userdata('username');
          $data['allclient']=$this->Client_model->get_all();
          $data['allassignment']= $this->Shopper_Assignment->getMyAssignment($id);

          $this->load->view("Main/Mystery_Shopper/Header",$data);
          $this->load->view("Main/Mystery_Shopper/takken_assignments",$data);
          $this->load->view("Main/Mystery_Shopper/Footer");
          }

         else
         {
           $this->load->view("login");
         }


      }

      function upload_review()
      {

        $id = urldecode($this->uri->segment(3));  //assignment id

        try{


          //API URL
            $url = base_url().'index.php/Api/assignment_detail/'.$id;

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['selected_assignment'] = $result['data']; //assignment data
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

        if($this->session->userdata('username'))
     {
          $data['users']= $this->session->userdata('username');
          $data['allclient']=$this->Client_model->get_all();
          $data['id'] = $id;

          $this->load->view("Main/Mystery_Shopper/Header",$data);
          $this->load->view("Main/Mystery_Shopper/upload_review",$data);
          $this->load->view("Main/Mystery_Shopper/Footer");
          }

         else
         {
           $this->load->view("login");
         }


      }

      function delivery_upload_review()
      {

        $id = urldecode($this->uri->segment(3));  //assignment id

        try{


          //API URL
            $url = base_url().'index.php/Api/assignment_detail/'.$id;

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['selected_assignment'] = $result['data']; //assignment data
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

        if($this->session->userdata('username'))
     {
          $data['users']= $this->session->userdata('username');
          $data['allclient']=$this->Client_model->get_all();
          $data['id'] = $id;

          $this->load->view("Main/Mystery_Shopper/Header",$data);
          $this->load->view("Main/Mystery_Shopper/review_delivery",$data);
          $this->load->view("Main/Mystery_Shopper/Footer");
          }

         else
         {
           $this->load->view("login");
         }


      }


      public function CompletedAssignments()
      {
        $id = $this->input->post('id');
        // $id = urldecode($this->uri->segment(3));
        $mystery_shopper_id = $this->session->userdata('id');

         $username = 'admin';
    $password = '1234';

    // Alternative JSON version
    // $url = 'http://twitter.com/statuses/update.json';
    // Set up and execute the curl process
    $url =  base_url().'index.php/Api/CompletedAssignment';
    //echo $url;
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL,$url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
        'mystery_shopper_id' => $mystery_shopper_id,
        'id' => $id,

    ));

    // Optional, delete this line if your API is open
    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);

    $buffer = curl_exec($curl_handle);
    curl_close($curl_handle);

    $result = json_decode($buffer);
    //print_r($result);

    if(isset($result->status) && $result->status == 'success')
    {
        echo 'User has been updated.';
    }

    else
    {
        echo 'Something has gone wrong';
    }

      }


public function textArearLength($textarea)
  {
      $textarea = trim($textarea);
    if (strlen($textarea) < 200)
    {
      $this->form_validation->set_message('textArearLength', 'Must Use at least min 200 characters .');
      return FALSE;
    }

    return TRUE;

  }

function AssignmentDeliveryReview()
      {

        $id = $this->input->post('id');  //review id


        //$id = $this->input->post('id');  //assignment id

        $this->form_validation->set_rules('call_center', 'Call Center', 'trim|required|xss_clean|callback_textArearLength');
        $this->form_validation->set_rules('online', 'Online', 'trim|required|xss_clean|callback_textArearLength');
        $this->form_validation->set_rules('rider', 'Rider', 'trim|required|xss_clean|callback_textArearLength');


          if ($this->form_validation->run() == FALSE)
        {
        $data['users']= $this->session->userdata('username');
            //validation fails
              $this->load->view("Main/Mystery_Shopper/Header",$data);
              $this->load->view("Main/Mystery_Shopper/review_delivery");
              $this->load->view("Main/Mystery_Shopper/Footer");
        }
        else{



        $Image1='';
        $Image2='';
        $Image3='';
        $Image4='';
        $Image5='';

        $image_path_1 ='';
        $image_path_2 ='';
        $image_path_3 ='';
        $image_path_4 ='';
        $image_path_5 ='';
        try{

          //API URL
         $mystery_shopper_id  = $this->session->userdata('id');
            $url2 = base_url().'index.php/Api/allUser';

            //API key

            $apiKey = 'CODEX@123';

            //Auth credentials

            $usernames = "admin";

            $password = "1234";

            //create a new cURL resource

            $ch = curl_init($url2);

            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));

            curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");

            $result = curl_exec($ch);

            $result = json_decode($result, true);



          //print_r($result);

          //echo $result['data'];



          //close cURL resource

          curl_close($ch);

          $data = $result['data'];

          //print_r($data);

          foreach ($data as $key => $value)
         {
         if($value['user_id'] == $mystery_shopper_id && $value['user_type'] =='MYSTERYSHOPPER' )
          {
              $noOfAssignment =    $value['takenAssignment']-1;
         }
         }

         }

         catch(Exception $e)

         {

          echo $e;

         }



        try{


          //API URL
            $url = base_url().'index.php/Api/DeliveryReviewAdd/';

            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $usernames = "admin";
            $password = "1234";

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc|mp4';
                $config['max_size']             = 102400;
                //$this->form_validation->set_rules('mystery_shopper_nic_number', 'NIC Number', 'required|regex_match[/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/]');

                $this->load->library('upload', $config);
                $image_path ='';
                $video_path ='';
                $image_path_1 = '';
                $image_path_2 = '';
                $image_path_3= '';
                $image_path_4= '';
                $image_path_5= '';

                $Image1 = '';
                $Image2 = '';
                $Image3 = '';
                $Image4 = '';
                $Image5 = '';


	if ( !$this->upload->do_upload('image1')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
              }
                else{
                    $Image1 = array('upload_data' => $this->upload->data());
                    $image_path_1 = $Image1['upload_data']['file_name'];
                    //print_r($data['upload_data']['full_path']);
                }



       if ( !$this->upload->do_upload('image2')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image2 = array('upload_data' => $this->upload->data());
                   $image_path_2 = $Image2['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }



                if ( !$this->upload->do_upload('image3')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
              }
                else{
                    $Image3 = array('upload_data' => $this->upload->data());
                    $image_path_3 = $Image3['upload_data']['file_name'];
                    //print_r($data['upload_data']['full_path']);
                }



       if ( !$this->upload->do_upload('image4')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image4 = array('upload_data' => $this->upload->data());
                   $image_path_4 = $Image4['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }


                if ( !$this->upload->do_upload('image5')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image5 = array('upload_data' => $this->upload->data());
                   $image_path_5 = $Image5['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }



            $AssignmentReviews= array(

           'mysteryShopper_assignment_id' => $id,
           'outlet' => $this->input->post('Outlet'),
           'date' => $this->input->post('reviewDate'),
           'time' => $this->input->post('reviewTime'),
           'call_center' => $this->input->post('call_center'),
           'online' => $this->input->post('online'),
           'rider' => $this->input->post('rider'),
           'billing' => $this->input->post('Billing'),
           'loyalty' => $this->input->post('loyaltyProgram'),
           'bribe' => $this->input->post('Bribe'),
           'food_packaging' => $this->input->post('foodPackaging'),
           'food_itself' => $this->input->post('foodItself'),
           'extra' => $this->input->post('extraDetails'),
           'image1' => $image_path_1,
           'image2' => $image_path_2,
           'image3' => $image_path_3,
           'image4' => $image_path_4,
           'image5' => $image_path_5,
           'mystery_shopper_id' => $mystery_shopper_id,
           'takenAssignment' => $noOfAssignment,



       );


   //  print_r($AssignmentReviews);
            //create a new cURL resource
            $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $AssignmentReviews);


          $result = curl_exec($ch);
          $result = json_decode($result,true);

         // print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);



          //$data['selected_assignment'] = $result['data']; //assignment data
          //print_r($result);
          $this->CompletedAssignments();

          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your review has been sent for approval. <br><br> Thankyou for Shopping with us</div>');
                redirect('MysteryShopperLoggedin/ReviewUploadGreeting');

         }
         catch(Exception $e)
         {
          echo $e;
         }

     }


      }




      function AddAssignmentReview()
      {

        $id = $this->input->post('id');  //assignment id
        $this->form_validation->set_rules('service', 'Service', 'trim|required|xss_clean|callback_textArearLength');
        $this->form_validation->set_rules('food', 'Food', 'trim|required|xss_clean|callback_textArearLength');
        //$this->form_validation->set_rules('Complaints', 'Complaints', 'trim|required|xss_clean|callback_textArearLength');


          if ($this->form_validation->run() == FALSE)
        {
        $data['users']= $this->session->userdata('username');
            //validation fails
              $this->load->view("Main/Mystery_Shopper/Header",$data);
              $this->load->view("Main/Mystery_Shopper/upload_review");
              $this->load->view("Main/Mystery_Shopper/Footer");
        }
        else{


try{

          //API URL
         $mystery_shopper_id  = $this->session->userdata('id');
            $url2 = base_url().'index.php/Api/allUser';

            //API key

            $apiKey = 'CODEX@123';

            //Auth credentials

            $usernames = "admin";

            $password = "1234";

            //create a new cURL resource

            $ch = curl_init($url2);

            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));

            curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");

            $result = curl_exec($ch);

            $result = json_decode($result, true);



          //print_r($result);

          //echo $result['data'];



          //close cURL resource

          curl_close($ch);

          $data = $result['data'];

          //print_r($data);

          foreach ($data as $key => $value)
         {
         if($value['user_id'] == $mystery_shopper_id && $value['user_type'] =='MYSTERYSHOPPER' )
          {
              $noOfAssignment =    $value['takenAssignment']-1;
         }
         }

         }

         catch(Exception $e)

         {

          echo $e;

         }






        try{


          //API URL
            $url = base_url().'index.php/Api/ReviewAdd/';

            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $usernames = "admin";
            $password = "1234";

            	$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc|mp4';
                $config['max_size']             = 102400;
                //$this->form_validation->set_rules('mystery_shopper_nic_number', 'NIC Number', 'required|regex_match[/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/]');

                $this->load->library('upload', $config);
                $image_path ='';
                $video_path ='';
                $image_path_1 = '';
                $image_path_2 = '';
                $image_path_3= '';
                $image_path_4= '';
                $image_path_5= '';

                $Image1 = '';
                $Image2 = '';
                $Image3 = '';
                $Image4 = '';
                $Image5 = '';


	if ( !$this->upload->do_upload('image1')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
              }
                else{
                    $Image1 = array('upload_data' => $this->upload->data());
                    $image_path_1 = $Image1['upload_data']['file_name'];
                    //print_r($data['upload_data']['full_path']);
                }



       if ( !$this->upload->do_upload('image2')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image2 = array('upload_data' => $this->upload->data());
                   $image_path_2 = $Image2['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }



                if ( !$this->upload->do_upload('image3')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
              }
                else{
                    $Image3 = array('upload_data' => $this->upload->data());
                    $image_path_3 = $Image3['upload_data']['file_name'];
                    //print_r($data['upload_data']['full_path']);
                }



       if ( !$this->upload->do_upload('image4')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image4 = array('upload_data' => $this->upload->data());
                   $image_path_4 = $Image4['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }


                if ( !$this->upload->do_upload('image5')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image5 = array('upload_data' => $this->upload->data());
                   $image_path_5 = $Image5['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }




 $AssignmentReviews= array(
           'mysteryShopper_assignment_id' => $id,
           'outlet' => $this->input->post('Outlet'),
           'date' => $this->input->post('reviewDate'),
           'time' => $this->input->post('reviewTime'),
           'no_customer' => $this->input->post('noCustomer'),
           'no_staff' => $this->input->post('noStaff'),
           'server_name' => $this->input->post('serverName'),
           'manager_on_duty' => $this->input->post('managerDuty'),
           'parking_area' => $this->input->post('parkingArea'),
           'outside_ambiance' => $this->input->post('outsideAmbiacne'),
           'greeter' => $this->input->post('greeter'),
           'complimentary_drink' => $this->input->post('complimentarydrink'),
           'table_allotment' => $this->input->post('tableAllotmet'),
           'feel_of_place' => $this->input->post('feel_of_place'),
           'menu_presentation' => $this->input->post('menuPresentation'),
           'screen' => $this->input->post('screen'),
           'self_ordering' => $this->input->post('selfOrder'),
           'washroom' => $this->input->post('Washroom'),
           'service' => $this->input->post('service'),
           'food' => $this->input->post('food'),
           'complaints' => $this->input->post('Complaints'),
           'billing' => $this->input->post('Billing'),
           'loyalty_program' => $this->input->post('loyaltyProgram'),
           'bribe' => $this->input->post('Bribe'),
           'smiles_while_leaving' => $this->input->post('smileWhileLeaving'),
           'valet_operation' => $this->input->post('valetOperation'),
           'takeaway' => $this->input->post('TakeAway'),
           'extra_detail' => $this->input->post('extraDetails'),
           'image1' => $image_path_1,
           'image2' => $image_path_2,
           'image3' => $image_path_3,
           'image4' => $image_path_4,
           'image5' => $image_path_5,
           'mystery_shopper_id' => $mystery_shopper_id,
           'takenAssignment' => $noOfAssignment,



       );
       //print_r($AssignmentReviews);

            //create a new cURL resource
            $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $AssignmentReviews);


          $result = curl_exec($ch);
          $result = json_decode($result,true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          //$data['selected_assignment'] = $result['data']; //assignment data
          //print_r($result);
          $this->CompletedAssignments();

          $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your review has been sent for approval. <br><br> Thankyou for Shopping with us</div>');
                redirect('MysteryShopperLoggedin/ReviewUploadGreeting');

         }
         catch(Exception $e)
         {
          echo $e;
         }

     //    if($this->session->userdata('username'))
     // {
     //      $data['users']= $this->session->userdata('username');
     //      $data['allclient']=$this->Client_model->get_all();
     //      $data['id'] = $id;

     //      $this->load->view("Main/Mystery_Shopper/Header",$data);
     //      $this->load->view("Main/Mystery_Shopper/upload_review",$data);
     //      $this->load->view("Main/Mystery_Shopper/Footer");
     //      }

     //     else
     //     {
     //       $this->load->view("login");
     //     }


      }

      }
     public function edit_assignment() {


      try{

          $id= $this->session->userdata('id');
          //API URL
            $url = base_url().'index.php/Api/edit_assignment/'.$id;

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['editAssignment'] = $result['data'];
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

         try{

          $id= $this->session->userdata('id');
          //API URL
            $url = base_url().'index.php/Api/all_review';

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['allreview'] = $result['data'];
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

         try{

          $id= $this->session->userdata('id');
          //API URL
            $url = base_url().'index.php/Api/all_review_delivery';

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['all_review_delivery'] = $result['data'];
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

         if($this->session->userdata('username') && $this->session->userdata('type')=='MYSTERYSHOPPER')
     {
          $data['users']= $this->session->userdata('username');
          $data['allclient']=$this->Client_model->get_all();
          $this->load->view("Main/Mystery_Shopper/Header",$data);
          $this->load->view("Main/Mystery_Shopper/edit_assignment_list",$data);
          $this->load->view("Main/Mystery_Shopper/Footer");
          }

         else
         {
          redirect(base_url().'index.php/Web/login');
         }

      }


     public function edit_assignment_detail()
      {

         $id = urldecode($this->uri->segment(3));
         $data['users']= $this->session->userdata('username');
         $data['allclient']=$this->Client_model->get_all();

         try{


          //API URL
            $url = base_url().'index.php/Api/edit_assignment_detail/'.$id;

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['selected_assignment'] = $result['data'];
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

         //print_r($data);
         $this->load->view("Main/Mystery_Shopper/Header",$data);
         $this->load->view("Main/Mystery_Shopper/update_dine_review",$data);
         $this->load->view("Main/Mystery_Shopper/Footer");

      }


      public function edit_assignment_detail_delivery()
      {

         $id = urldecode($this->uri->segment(3));
         $data['users']= $this->session->userdata('username');
         $data['allclient']=$this->Client_model->get_all();

         try{


          //API URL
            $url = base_url().'index.php/Api/edit_assignment_detail_delivery/'.$id;

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

            $result = curl_exec($ch);
            $result = json_decode($result, true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);

          $data['selected_assignment'] = $result['data'];
          //print_r($data);

         }
         catch(Exception $e)
         {
          echo $e;
         }

         //print_r($data);
         $this->load->view("Main/Mystery_Shopper/Header",$data);
         $this->load->view("Main/Mystery_Shopper/edit_review_delivery",$data);
         $this->load->view("Main/Mystery_Shopper/Footer");

      }

function updateAssignmentReview()
      {

        $id = $this->input->post('review_id');  //review id

        //$this->form_validation->set_rules('service', 'Service', 'trim|required|xss_clean|callback_textArearLength');
        //$this->form_validation->set_rules('food', 'Food', 'trim|required|xss_clean|callback_textArearLength');
        //$this->form_validation->set_rules('Complaints', 'Complaints', 'trim|required|xss_clean|callback_textArearLength');






        try{


          //API URL
            $url = base_url().'index.php/Api/updateReview/';

            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $usernames = "admin";
            $password = "1234";

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc|mp4';
                $config['max_size']             = 102400;
                //$this->form_validation->set_rules('mystery_shopper_nic_number', 'NIC Number', 'required|regex_match[/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/]');

                $this->load->library('upload', $config);
                $image_path ='';
                $video_path ='';

        $Image1='';
        $Image2='';
        $Image3='';
        $Image4='';
        $Image5='';

        $image_path_1 ='';
        $image_path_2 ='';
        $image_path_3 ='';
        $image_path_4 ='';
        $image_path_5 ='';

                if ( !$this->upload->do_upload('image1')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }
                else{
                    $Image1 = array('upload_data' => $this->upload->data());
                    $image_path_1 = $Image1['upload_data']['file_name'];

                    //print_r($data['upload_data']['full_path']);
                }


                if ( !$this->upload->do_upload('image2')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image2 = array('upload_data' => $this->upload->data());
                   $image_path_2 = $Image2['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }



                if ( !$this->upload->do_upload('image3')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }
                else{
                    $Image3 = array('upload_data' => $this->upload->data());
                    $image_path_3 = $Image3['upload_data']['file_name'];
                    //print_r($data['upload_data']['full_path']);
                }



                if ( !$this->upload->do_upload('image4')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image4 = array('upload_data' => $this->upload->data());
                   $image_path_4 = $Image4['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }


                if ( !$this->upload->do_upload('image5')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image5 = array('upload_data' => $this->upload->data());
                   $image_path_5 = $Image5['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }



            $AssignmentReviews= array(
              'id' => $id,
          'mysteryShopper_assignment_id' => $this->input->post('id'),
           'outlet' => $this->input->post('Outlet'),
           'date' => $this->input->post('reviewDate'),
           'time' => $this->input->post('reviewTime'),
           'no_customer' => $this->input->post('noCustomer'),
           'no_staff' => $this->input->post('noStaff'),
           'server_name' => $this->input->post('serverName'),
           'manager_on_duty' => $this->input->post('managerDuty'),
           'parking_area' => $this->input->post('parkingArea'),
           'outside_ambiance' => $this->input->post('outsideAmbiacne'),
           'greeter' => $this->input->post('greeter'),
           'complimentary_drink' => $this->input->post('complimentarydrink'),
           'table_allotment' => $this->input->post('tableAllotmet'),
           'feel_of_place' => $this->input->post('feel_of_place'),
           'menu_presentation' => $this->input->post('menuPresentation'),
           'screen' => $this->input->post('screen'),
           'self_ordering' => $this->input->post('selfOrder'),
           'washroom' => $this->input->post('Washroom'),
           'service' => $this->input->post('service'),
           'food' => $this->input->post('food'),
           'complaints' => $this->input->post('Complaints'),
           'billing' => $this->input->post('Billing'),
           'loyalty_program' => $this->input->post('loyaltyProgram'),
           'bribe' => $this->input->post('Bribe'),
           'smiles_while_leaving' => $this->input->post('smileWhileLeaving'),
           'valet_operation' => $this->input->post('valetOperation'),
           'takeaway' => $this->input->post('TakeAway'),
           'extra_detail' => $this->input->post('extraDetails'),
           'image1' => $image_path_1,
           'image2' => $image_path_2,
           'image3' => $image_path_3,
           'image4' => $image_path_4,
           'image5' => $image_path_5,
            );
     //print_r($AssignmentReviews);
            //create a new cURL resource
            $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $AssignmentReviews);


          $result = curl_exec($ch);
          $result = json_decode($result,true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);



          //$data['selected_assignment'] = $result['data']; //assignment data
          //print_r($result);
          $this->CompletedAssignments();
          //$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your review has been sent for approval. <br><br> Thankyou for Shopping with us</div>');
          redirect('MysteryShopperLoggedin');

         }
         catch(Exception $e)
         {
          echo $e;
         }




      }
      function updateAssignmentDeliveryReview()
      {

        $id = $this->input->post('review_id');  //review id

        //$this->form_validation->set_rules('service', 'Service', 'trim|required|xss_clean|callback_textArearLength');
        //$this->form_validation->set_rules('food', 'Food', 'trim|required|xss_clean|callback_textArearLength');
        //$this->form_validation->set_rules('Complaints', 'Complaints', 'trim|required|xss_clean|callback_textArearLength');


        try{


          //API URL
            $url = base_url().'index.php/Api/updateReviewDelivery/';

            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $usernames = "admin";
            $password = "1234";

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc|mp4';
                $config['max_size']             = 102400;
                //$this->form_validation->set_rules('mystery_shopper_nic_number', 'NIC Number', 'required|regex_match[/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/]');

                $this->load->library('upload', $config);
                $image_path ='';
                $video_path ='';
                $Image1='';
	        $Image2='';
	        $Image3='';
	        $Image4='';
	        $Image5='';

	        $image_path_1 ='';
	        $image_path_2 ='';
	        $image_path_3 ='';
	        $image_path_4 ='';
	        $image_path_5 ='';


                if ( !$this->upload->do_upload('image1')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }
                else{
                    $Image1 = array('upload_data' => $this->upload->data());
                    $image_path_1 = $Image1['upload_data']['file_name'];

                    //print_r($data['upload_data']['full_path']);
                }


                if ( !$this->upload->do_upload('image2')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image2 = array('upload_data' => $this->upload->data());
                   $image_path_2 = $Image2['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }



                if ( !$this->upload->do_upload('image3')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }
                else{
                    $Image3 = array('upload_data' => $this->upload->data());
                    $image_path_3 = $Image3['upload_data']['file_name'];
                    //print_r($data['upload_data']['full_path']);
                }



                if ( !$this->upload->do_upload('image4')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image4 = array('upload_data' => $this->upload->data());
                   $image_path_4 = $Image4['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }


                if ( !$this->upload->do_upload('image5')){

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }

                  else{
                   $Image5 = array('upload_data' => $this->upload->data());
                   $image_path_5 = $Image5['upload_data']['file_name'];
                      //print_r($data['upload_data']['full_path']);
                }



            $AssignmentReviews= array(
              'id' => $id,
           'mysteryShopper_assignment_id' => $this->input->post('id'),
           'outlet' => $this->input->post('Outlet'),
           'date' => $this->input->post('reviewDate'),
           'time' => $this->input->post('reviewTime'),
           'call_center' => $this->input->post('call_center'),
           'online' => $this->input->post('online'),
           'rider' => $this->input->post('rider'),
           'billing' => $this->input->post('Billing'),
           'loyalty' => $this->input->post('loyaltyProgram'),
           'bribe' => $this->input->post('Bribe'),
           'food_packaging' => $this->input->post('foodPackaging'),
           'food_itself' => $this->input->post('foodItself'),
           'extra' => $this->input->post('extraDetails'),
           'image1' => $image_path_1,
           'image2' => $image_path_2,
           'image3' => $image_path_3,
           'image4' => $image_path_4,
           'image5' => $image_path_5,




       );


     print_r($AssignmentReviews);
            //create a new cURL resource
            $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$usernames:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $AssignmentReviews);


          $result = curl_exec($ch);
          $result = json_decode($result,true);

          //print_r($result);
          //echo $result['data'];

          //close cURL resource
          curl_close($ch);



          //$data['selected_assignment'] = $result['data']; //assignment data
          //print_r($result);
          $this->CompletedAssignments();
          //$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your review has been sent for approval. <br><br> Thankyou for Shopping with us</div>');
          redirect('MysteryShopperLoggedin');

         }
         catch(Exception $e)
         {
          echo $e;
         }




      }

      public function my_wallet(){
          if($this->session->userdata('username')  && $this->session->userdata('type') == 'MYSTERYSHOPPER')
          {

              $data1['pending']=$this->Wallet->getTotalAssigmentPending($this->session->userdata('id'));
              $data1['accept']=$this->Wallet->getTotalAssigmentApproved($this->session->userdata('id'));
              $data1['reject']=$this->Wallet->getTotalAssigmentRejected($this->session->userdata('id'));
              $data1['reject_amount']=$this->Wallet->getTotalAssigmentRejectedAmount($this->session->userdata('id'));
              $data1['payable_amount']=$this->Wallet->getTotalAssignmentApprovedAmount($this->session->userdata('id'));
              $data1['amount']=$this->Wallet->getTotalAmount($this->session->userdata('id'));
              $data['users']= $this->session->userdata('username');
              $data['user_id']=$this->session->userdata('id');
              $this->load->view("Main/Mystery_Shopper/Header",$data);
              $this->load->view("Main/Mystery_Shopper/my_wallet",$data1);
              $this->load->view("Main/Mystery_Shopper/Footer");

           }

           else
           {
            $this->load->view("login");
           }

      }

      public function mystery_shopper_assignment_detail(){
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'MYSTERYSHOPPER')
        {

            $data['users']= $this->session->userdata('username');
            $data['user_id']=$this->session->userdata('id');
            $data['alldata']=$this->Wallet->getAllAssignmentDetailPaid($this->session->userdata('id'));
            $this->load->view("Main/Mystery_Shopper/Header",$data);
            $this->load->view("Main/Mystery_Shopper/shopper-detail",$data);
            $this->load->view("Main/Mystery_Shopper/Footer");

         }

         else
         {
          $this->load->view("login");
         }
      }

   }


?>