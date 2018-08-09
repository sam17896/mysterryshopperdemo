<?php
   class Web extends CI_Controller {

   		
   		function __construct() {


			parent::__construct();
      $this->load->model('User_model');


		
		}

		

    	public function index() {
        	
	
      $data['users']= $this->session->userdata('username'); 
	        try{

          //API URL

            $url = base_url().'index.php/Api/allClient';

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

          $data['allclient'] = $result['data'];

          //print_r($data);

         }

         catch(Exception $e)

         {

          echo $e;

         }
          if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
         
         else
         {
         
           $this->load->view("Main/Header2");
	   $this->load->view("Main/index",$data); 
	   $this->load->view("Main/Footer2");
         }
        	
        	
     	}
	public function forget_password()
      {
      $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
          $this->load->view("Main/Header2");
          $this->load->view("Main/forget_password"); 
          $this->load->view("Main/Footer2");
          }
      }

     
      
      public function pass_reset()
      {
        $email = $this->input->post('email');
       
        try{

          //API URL

            $url = base_url().'index.php/Api/allUser';

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

          $data = $result['data'];

          //print_r($data);

         }

         catch(Exception $e)

         {

          echo $e;

         }

         foreach ($data as $key => $value)
         {
         
          if($value['user_email'] == $email && $value['user_type'] =='MYSTERYSHOPPER' )
          {
             //$this->load->library('encrypt');
			//echo 'AAAAAAAAAAAAAA';
            $name = $this->input->post('contactUs_name');
            $from_email = 'info@mysteryshopperspakistan.com';
            $subject = 'Mystery Shopper Credentials';
            $key ="mysteryshopperspakistan";
           $userId = base64_encode($value['user_id']);
           //$userId = $value['user_id'];
$message = 'Dear MYSTERYSHOPPER'.'<br><br><br>'.'Please Click On Following Link To Reset Your Password'.'<br><br><br>'.'https://www.mysteryshopperspakistan.com/index.php/Web/reset_password_via_email_view/?msp='.$userId.'<br><br>'.'Regards'.'<br>'.'MyStery Shopper Team';

            //set to_email id to which you want to receive mails
            $to_email = $email;
            $this->load->library('email');

            //configure email settings

            $config = array();
            $config['protocol'] = 'mail';
            $config['smtp_host'] = 'ssl://smtp.mysteryshopperspakistan.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'info@mysteryshopperspakistan.com';
            $config['smtp_pass'] = 'omgomgsk';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;

            
           //$this->load->library('email',$config);

            $this->email->initialize($config); 
             $this->email->set_newline("\r\n");                       

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
//print_r($config);

            if ($this->email->send())
            {
                // mail sent
              redirect('Web/reset_success');
            }
            else
            {
                //error
               $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Provided Email Dose not Excited</div>');  
                 redirect('Web/pass_reset');
            }


          }
          
         }

      }
      
       public function reset_success()
      {
        $this->load->view("Main/Header2");
          $this->load->view("Main/password_reset_success.php"); 
          $this->load->view("Main/Footer2");
      }
      
    //  public function reset_success()
     // {
     //   $this->load->view("Main/Header2");
     //     $this->load->view("Main/password_reset_success.php"); 
      //    $this->load->view("Main/Footer2");
    //  }
      
      public function reset_password_via_email_view()
      {
        $this->load->view("Main/Header2");
          $this->load->view("Main/rest_password.php"); 
          $this->load->view("Main/Footer2");
      }
      public function reset_password_via_email()
      {
        $this->load->library('encrypt');
        $user_id= base64_decode($this->input->post('user_id'));
        $user_email = $this->User_model->searchnm($user_id)->user_email;
        $newPassword = $this->input->post('newPassword');
        $retypePassword = $this->input->post('retypePassword');
        try{
        
         if($newPassword==$retypePassword){

            $url = base_url().'index.php/Api/UsersPasswordReset/';
                  //API key
                 $apiKey = 'CODEX@123';
                  //Auth credentials
                 $username = "admin";
                 $password = "1234";


         $name = $this->input->post('contactUs_name');
            $from_email = 'info@mysteryshopperspakistan.com';
            $subject = 'Password Updated';
            $userId = base64_encode($user_id);

            $message = 'Dear MYSTERYSHOPPER'.'<br><br><br>'.'Your Password Has Been Updated Successfully'.'<br><br>'.'If it Was not you click on below Link'.'<br><br><br>'.'https://www.mysteryshopperspakistan.com/index.php/Web/reset_password_via_email_view/?msp='.$userId.'<br><br>'.'Regards'.'<br>'.'MyStery Shopper Team';

            //set to_email id to which you want to receive mails
            $to_email = $user_email;
            $this->load->library('email');

            //configure email settings

            $config = array();
            $config['protocol'] = 'mail';
            $config['smtp_host'] = 'ssl://smtp.mysteryshopperspakistan.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'info@mysteryshopperspakistan.com';
            $config['smtp_pass'] = 'omgomgsk';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;

            
           //$this->load->library('email',$config);

            $this->email->initialize($config); 
             $this->email->set_newline("\r\n");                       

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
//print_r($config);

           $this->email->send();
           

            $updatePassword = array(
            'user_password' =>  md5($newPassword),
             'user_id' => $user_id,
            
                        );
                      
        
        

          //create a new cURL resource
          $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $updatePassword );


          $result = curl_exec($ch);
          $result = json_decode($result,true);
          redirect(base_url().'index.php/Web/login');
         // print_r($result);
          curl_close($ch);
            }else{
                        
                     $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Password not matching</div>');  
                     // echo $user_id;
                      redirect(base_url().'index.php/Web/reset_password_via_email_view/'.$user_id);
                        
                        }

          //close cURL resource
          //curl_close($ch);
          
          
          
          }
           catch(Exception $e)

         {

          echo $e;

         }
			
      }
      
      
      
      
      public function login()
      {
      $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
        $this->load->view("Main/Header2");
          $this->load->view("Main/Login"); 
          $this->load->view("Main/Footer2");
          }
      }
      public function client_login()
      {
      $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
        
        $this->load->view("Main/Header2");
          $this->load->view("Main/clientLogin"); 
          $this->load->view("Main/Footer2");
          }
      }
      public function services()
      {
      		  $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
        $this->load->view("Main/Header2");
          $this->load->view("Main/services"); 
          $this->load->view("Main/Footer2");}
      } 
      public function faq()
      {
      		  $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
        $this->load->view("Main/Header2");
          $this->load->view("Main/faq"); 
          $this->load->view("Main/Footer2");}
      } 
      public function about_us()
      {
      $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
        $this->load->view("Main/Header2");
          $this->load->view("Main/about_us"); 
          $this->load->view("Main/Footer2");
          }
      }
      
      public function greetings()
       {
       $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
         $this->load->view("Main/Header2");
          $this->load->view("Main/greetingPage"); 
          $this->load->view("Main/Footer2");
          }
       }
       public function ContactFormConformation()
        {
         		
     		
          $this->load->view("Main/Header2");
          $this->load->view("Main/ContactFormConformation"); 
          $this->load->view("Main/Footer2");
          
        } 
       function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'Name must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } 
      public function contact_us()
      {
        $data['users']= $this->session->userdata('username'); 
        $this->form_validation->set_rules('contactUs_name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('contactUs_email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('contactUs_subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contactUs_message', 'Message', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
            if($this->session->userdata('type') == 'CLIENT')
     		{
     		$this->load->view("Main/Client/Header",$data);
              $this->load->view("Main/contact_us"); 
               $this->load->view("Main/Client/Footer");
     		}
     		elseif($this->session->userdata('type') == 'MYSTERYSHOPPER')
     		{
     		$this->load->view("Main/Mystery_Shopper/Header",$data);
              $this->load->view("Main/contact_us"); 
               $this->load->view("Main/Mystery_Shopper/Footer");
     		}
     		else
     		{
              $this->load->view("Main/Header2");
              $this->load->view("Main/contact_us"); 
               $this->load->view("Main/Footer2");
               }
        }
         else
        {
            //get the form data
            $name = $this->input->post('contactUs_name');
            $from_email = $this->input->post('contactUs_email');
            $subject = $this->input->post('contactUs_subject');
            $message = $this->input->post('contactUs_message');

            //set to_email id to which you want to receive mails
            $to_email = 'info@mysteryshopperspakistan.com';
            $this->load->library('email');

            //configure email settings

            $config = array();
            $config['protocol'] = 'mail';
            $config['smtp_host'] = 'ssl://smtp.mysteryshopperspakistan.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'info@mysteryshopperspakistan.com';
            $config['smtp_pass'] = 'omgomgsk';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;

            
           //$this->load->library('email',$config);

            $this->email->initialize($config); 
             $this->email->set_newline("\r\n");                       

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
//print_r($config);

            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Contact form successfully submitted.    , We will get back to you ASAP!</div>');
                redirect('Web/ContactFormConformation');
            }
            else
            {
                //error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                redirect('Web/contact_us');
            }
        }

      } 
      public function guidnessPage()
      {
         $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
        $this->load->view("Main/Header2");
          $this->load->view("Main/guidnessPage"); 
          $this->load->view("Main/Footer2");
          }
      }
      
      
      public function surveyForm()
      {
         $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
        $this->load->view("Main/Header2");
          $this->load->view("Main/survey_form"); 
          $this->load->view("Main/Footer2");
          }
      
      }
      public function ShopperScore() 
      {
         $correct = 0;
           $Q1 = $this->input->post('Q1');
           $Q2 = $this->input->post('Q2');
           $Q3 = $this->input->post('Q3');
           $Q4 = $this->input->post('Q4');
           $rating = '';

           if($Q1 == 'right')
           {
            $correct++;
           }
           if($Q2 == 'right')
           {
            $correct++;
           }
           if($Q3 == 'right')
           {
            $correct++;
           }
           if($Q4 == 'right')
           {
            $correct++;
           }

           //echo $correct; 

           if($correct == 3 || $correct == 4)
           {
        $rating = 'A';            
           }
           if($correct == 2)
           {
        $rating = 'B';            
           }
           if($correct == 1)
           {
        $rating = 'C';            
           }
           if($correct == 0)
           {
        $rating = 'D';            
           }


           echo $rating;

           $url = base_url().'index.php/Api/updateRatting/';
                  //API key
                 $apiKey = 'CODEX@123';
                  //Auth credentials
                 $username = "admin";
                 $password = "1234";


         

            $shopperData = array(
            'mysteryShopper_ratting' => $rating,
            
                        );
        
        

          //create a new cURL resource
          $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $shopperData);


          $result = curl_exec($ch);
          $result = json_decode($result,true);
          redirect(base_url().'index.php/Web/greetings');
          //print_r($result);

          //close cURL resource
          curl_close($ch);
      }
      
       function nicValidation($str)
    {
        if (!preg_match("/^[0-9+]{5}[0-9+]{7}[0-9]{1}$/",$str))
        {
            $this->form_validation->set_message('nicValidation', 'Use Valid CNIC Pattern 1234512345671');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    function PhoneValidation($str)
    {
        if (!preg_match("/^[0-9+]{4}[0-9+]{7}$/",$str))
        {
            $this->form_validation->set_message('PhoneValidation', 'Use Valid Phone Pattern 00000000000');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
     public function valid_password($password)
  {
    $password = trim($password);
    $regex_lowercase = '/[a-z]/';
    $regex_uppercase = '/[A-Z]/';
    $regex_number = '/[0-9]/';
    $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
    if (empty($password))
    {
      $this->form_validation->set_message('valid_password', 'Password is required.');
      return FALSE;
    }
    
   /* if (preg_match_all($regex_uppercase, $password) < 1)
    {
      $this->form_validation->set_message('valid_password', 'Password must have at least one uppercase letter.');
      return FALSE;
    }
   
    */
    if (strlen($password) < 6)
    {
      $this->form_validation->set_message('valid_password', 'Password have must have at least 6 characters in length.');
      return FALSE;
    }
    if (strlen($password) > 8)
    {
      $this->form_validation->set_message('valid_password', 'Password cannot exceed 8 characters.');
      return FALSE;
    }
    return TRUE;
  }

      public function mysteryShopper_signUp()
      {
      
      
      	//$this->form_validation->set_rules('mystery_shopper_nic_number', 'CNIC Number', 'trim|required|xss_clean|callback_nicValidation');
        $this->form_validation->set_rules('mystery_shopper_email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('mystery_shopper_name', 'Shopper Name', 'trim|required|xss_clean|callback_alpha_space_only');
        //$this->form_validation->set_rules('mystery_shopper_contact_number', 'Contact Number', 'trim|required|xss_clean|callback_PhoneValidation');
        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|xss_clean|callback_valid_password');
        $this->form_validation->set_rules('mystery_shopper_address', 'Select City', 'trim|required|xss_clean');

        // $this->form_validation->set_rules('mystery_shopper_bank_name', ' Name Bank ', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('mystery_shopper_address', 'Address', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('mystery_shopper_card_type', 'Card Type', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('mystery_shopper_account_number', 'Contact Number', 'trim|required|xss_clean|callback_PhoneValidation');


        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
              //$this->load->view("Main/Header");
              $data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
       $url = base_url().'index.php/Api/allClient';

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

          $data['allclient'] = $result['data'];

      
             $this->load->view("Main/Header2");
	   $this->load->view("Main/index",$data); 
	   $this->load->view("Main/Footer2");
              }
               //$this->load->view("Main/Footer");
        }

        else {


                  
                  //API key
                 $apiKey = 'CODEX@123';
                  //Auth credentials
                 $username = "admin";
                 $password = "1234";



            $this->load->library('email');
            //get the form data
            $admin = 'MYSTERYSHOPPER';
            $from_email = $this->input->post('mystery_shopper_email');
            $Email= $this->input->post('mystery_shopper_email');
            $password =$this->input->post('userPassword');
            $ShopperName =$this->input->post('mystery_shopper_name');
            
            
            $to_email = 'info@mysteryshopperspakistan.com';
            
            
            $Conformationsubject= 'Registration Conformation';
             $messageAdmin = 'Dear '.$ShopperName.'<br><br>'.'User Email: '.$Email.' <br> '.'User Password: '.$password.'<br><br><br><br><br><br><br>'.'We would like to congratulate you on becoming our mystery shopper now you can enjoy free meals on completion of each assignments or free vouchers on completion of surveys.'.'<br>'.'Just keep checking our website for new assignments.All the available assignments would be shown in your profile select any of them, perform the assignments, submit the assignment, once its approved you will be sent your money within a week of approval.'.'<br>'.'Do not forget to send us bank details or easy paisa account number in your profile'.'<br><br><br>'.'Happy Shopping'.'<br>'.'Team Mystery Shoppers Pakistan';
            //send email back to user 
            
            //configure email settings

            $config = array();
            $config['protocol'] = 'mail';
            $config['smtp_host'] = 'ssl://smtp.mysteryshopperspakistan.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'info@mysteryshopperspakistan.com';
            $config['smtp_pass'] = 'omgomgsk';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            
            $this->email->initialize($config); 
             $this->email->set_newline("\r\n");                       

            //send mail to admin
            $this->email->from($to_email,$admin);
            $this->email->to($from_email);
            $this->email->subject($Conformationsubject);
            $this->email->message($messageAdmin);
            $this->email->send();

            //print_r($config);

           
              
                  
                  //API key
                 $apiKey = 'CODEX@123';
                  //Auth credentials
                 $username = "admin";
                 $password = "1234";
                  //user information
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc|mp4';
                $config['max_size']             = 102400;
                $this->form_validation->set_rules('mystery_shopper_nic_number', 'NIC Number', 'required|regex_match[/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/]');
                
                $this->load->library('upload', $config);
                $image_path ='';
                $video_path ='';

     
// if ( $this->upload->do_upload('pic')){
//                           $profileImage = array('upload_data' => $this->upload->data()); 
//                   //  $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

//                     //$error = array('error' => $this->upload->display_errors());

//                     //print_r($error);
//               }
//                 //else{
//                //     $profileImage = array('upload_data' => $this->upload->data());
//                     //print_r($data['upload_data']['full_path']);
//                // } 

//                  $image_path = $profileImage['upload_data']['file_name'];

//        if ( $this->upload->do_upload('profile_video')){
//                        $profileVideo = array('upload_data' => $this->upload->data());  
                  
//                 }
                
//                   else{
//                    //$profileVideo = array('upload_data' => $this->upload->data());
//                       //print_r($data['upload_data']['full_path']);
//                 }

//                 $video_path = $profileVideo['upload_data']['file_name'];  
               
               
          $userData = array(
          'user_name' => $this->input->post('mystery_shopper_name'),
          'user_password' => md5($this->input->post('userPassword')),
          'user_email' => $this->input->post('mystery_shopper_email'),
          'user_type' => 'MYSTERYSHOPPER',
          
        );

        $usrId = $this->User_model->user_added_id();
      //$category = $this->input->post('category');
      //$all_cat = implode(",",$category);
if(empty($image_path) && empty($video_path)) {
        $mysteryShopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            //'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            //'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            //'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            //'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
            // 'mysteryShopper_video' =>  $video_path,
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            // 'mysteryShopper_profile_image' =>  $image_path,
            'user_id' => $usrId,
            //'mysteryShopper_category' => $all_cat, 
            //'mysteryShopper_travel_field' => $this->input->post('travel_field')
        );
      }
      else{
        $mysteryShopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            //'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            //'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            //'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            //'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
            //'mysteryShopper_video' =>  $video_path,
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            //'mysteryShopper_profile_image' =>  $image_path,
            'user_id' => $usrId,
            //'mysteryShopper_category' => $all_cat, 
            //'mysteryShopper_travel_field' => $this->input->post('travel_field')
        );
      }
       
        $combineResult = array_merge($userData, $mysteryShopperData);
         //print_r($combineResult);
        //create a new cURL resource
       
///////////////////////////
        $url = base_url().'index.php/Api/AddMysteryShopper/';
    //echo $url;
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL,$url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $combineResult);
     
    // Optional, delete this line if your API is open
    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
     
    $buffer = curl_exec($curl_handle);
    curl_close($curl_handle);
     //print_r($buffer);
    $result = json_decode($buffer);
    
   //print_r($result);
    
     //redirect(base_url().'index.php/Web/guidnessPage');
    if($buffer)
     {
     
     echo '<script>alert("Same User Already Exist");  window.location.href = window.location.origin+"/index.php/MysteryShopperWeb/sign_up_view";  </script>';
           return;
     }

     
     redirect(base_url().'index.php/Web/guidnessPage');
    
     
    
     


     }   
      }

      public function user_login()
      {
        
          $this->load->library('form_validation');
          $this->form_validation->set_rules('email','Email','required');
          $this->form_validation->set_rules('password','Password','required');


      if($this->form_validation->run())
      {
        $username1=$this->input->post('email');
        $password=$this->input->post('password');
        $type="MYSTERYSHOPPER";
         $shopperLogin = array(
            'user_name' => $this->input->post('email'),
            'user_password' =>  md5($this->input->post('password')),
            'type' => $type,
            );

        
        
        //API URL
            $url = base_url().'index.php/api/UsersLogin/';



            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $username = "admin";
            $password = "1234";


            //create a new cURL resource
           $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $shopperLogin);

            $result = curl_exec($ch);
          $result = json_decode($result, true);
         
           print_r($result['data']);
           //echo $result['data'];
           if($result['data'])
           {
            $session_data = array(
           'username' => $result['data']['user_name'],
           'id' => $result['data']['user_id'],
           'type' => 'MYSTERYSHOPPER',
         );
            $this->session->set_userdata($session_data);

            echo $this->session->userdata('username');

             //print_r($session_data);
             redirect(base_url().'index.php/MysteryShopperLoggedin');
           }
           else
           {
            //print_r($shopperLogin );
            $this->session->set_flashdata('error','Invalid Username or Password'); 
          redirect(base_url().'index.php/web/Login');
           }
           echo $result['status'];
            //close cURL resource
            curl_close($ch);
        }
        else
        {
          $this->Login();
        }
      }



      //Client Login

      public function clientLogin()
      {
        echo "hello";
          $this->load->library('form_validation');
          $this->form_validation->set_rules('email','Email','required');
          $this->form_validation->set_rules('password','Password','required');


      if($this->form_validation->run())
      {
        $username1=$this->input->post('email');
        $password=$this->input->post('password');
        $type="CLIENT";
         $shopperLogin = array(
            'user_name' => $this->input->post('email'),
            'user_password' => $this->input->post('password'),
            'type' => $type,
            );

        
        
        //API URL
            $url =  base_url().'index.php/api/UsersLogin/';



            //API key
            $apiKey = 'CODEX@123';

            //Auth credentials
            $username = "admin";
            $password = "1234";


            //create a new cURL resource
           $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $shopperLogin);

            $result = curl_exec($ch);
          $result = json_decode($result, true);
         
           //print_r($result['data']);
           //echo $result['data'];
           if($result['data'])
           {
            $session_data = array(
           'username' => $result['data']['user_name'],
           'id' => $result['data']['user_id'],
           'type' => 'CLIENT'
         );
            $this->session->set_userdata($session_data);

            //echo $this->session->userdata('username');

             //print_r($session_data);
             // 
           redirect(base_url().'index.php/ClientLoggedin');
           }
           else
           {
            $this->session->set_flashdata('error','Invalid Username or Password'); 
          redirect(base_url().'index.php/web/client_login');
           }
           //echo $result['status'];
            //close cURL resource
            curl_close($ch);
        }
        else
        {
          $this->client_login();
        }
      }

      public function food()

    {

          try{

          //API URL

            $url = base_url().'index.php/Api/allClient';

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

          $data['alldata'] = $result['data'];

          //print_r($data);

         }

         catch(Exception $e)

         {

          echo $e;

         }

$data['users']= $this->session->userdata('username'); 
      if($this->session->userdata('type') == 'MYSTERYSHOPPER')
          {
        	 redirect('mysteryShopper');

          }
          elseif($this->session->userdata('type') == 'CLIENT')
          {
      
        	redirect('client');

          }
      else{
      $this->load->view("Main/Header2");

          $this->load->view("Main/cat_food",$data); 

          $this->load->view("Main/Footer2");
          }

    }



      public function logout()
       {
         $this->session->unset_userdata('username');
         $this->session->unset_userdata('type');
         redirect(base_url());
 
       }





      
    

   } 


?> 