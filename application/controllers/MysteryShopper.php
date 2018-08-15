<?php
/**
* 
*/
class MysteryShopper extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MysteryShopper_model');
         $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('User_model');
	}

	public function index()
	{
		 if($this->session->userdata('username'))
			{
	          
            $data['allMysteryShopper']=$this->MysteryShopper_model->getAll();
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("mysteryShopperView",$data); 
            $this->load->view("Footer");
        	
        	
          }
        	
        	else
        	{
        		$this->load->view("login");
        	}
	}

	public function add_mystery_shopper_view()
	{
		if($this->session->userdata('username'))
           {
      
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("addMysteryShopperView"); 
            $this->load->view("Footer");
          
            }
          
            else
            {
             echo 'Login First';
            }
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
      $this->form_validation->set_message('valid_password', 'Password must have at least 6 characters in length.');
      return FALSE;
    }
    if (strlen($password) > 32)
    {
      $this->form_validation->set_message('valid_password', 'Password cannot exceed 32 characters.');
      return FALSE;
    }
    return TRUE;
  }

    public function add_mystery_shopper()
    
    {
    
        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|xss_clean|callback_valid_password');
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("addMysteryShopperView"); 
            $this->load->view("Footer");
          
        
        }else{

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 102400;
                

                $this->load->library('upload', $config);
                 $image_path ='';
                 $video_path ='';

                if (!$this->upload->do_upload('pic'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());
                   

                     
                }
                else
                {
                    $profileImage = array('upload_data' => $this->upload->data());

                    //print_r($data['upload_data']['full_path']);
                    $image_path = $profileImage['upload_data']['file_name'];
                } 
                 
                if ( ! $this->upload->do_upload('profile_video'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());
                    
                    
                   // print_r($error);
                }
                else
                {
                       $profileVideo = array('upload_data' => $this->upload->data());
                      
                    //print_r($data['upload_data']['full_path']);
                     $video_path = $profileVideo['upload_data']['file_name']; 
                }
               
               $checkUserEmail = $this->User_model->checkUserExist($this->input->post('mystery_shopper_email'))->user_email;
              // echo $checkUserEmail;
               
               if($checkUserEmail==$this->input->post('mystery_shopper_email')){
               
               $this->session->set_flashdata('error','User already existed');	
				
			            $data['user']= $this->session->userdata('username');
			            $this->load->view("Header",$data);
			            $this->load->view("addMysteryShopperView"); 
			            $this->load->view("Footer");
			          
			          return false;
			        
			       
               
               }else{
               
                $shopperData = array(
          'user_name' => $this->input->post('mystery_shopper_name'),
          'user_password' => md5($this->input->post('userPassword')),
          'user_email' => $this->input->post('mystery_shopper_email'),
          'user_type' => 'MYSTERYSHOPPER',
          
          
        );
        }
        $this->User_model->add($shopperData);
        
        

        $usrId = $this->User_model->user_added_id();
     if(empty($image_path) && empty($video_path)) {
        $shopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
            //'mysteryShopper_video' =>  $video_path,
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            //'mysteryShopper_profile_image' =>  $image_path,
            'mysteryShopper_profile_image' =>  $this->input->post('category'),
            'user_id' => $usrId, 


        );
        }
        else{
        
        $shopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
           // 'mysteryShopper_video' =>  $video_path,
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            'mysteryShopper_profile_image' =>  $image_path,
            'mysteryShopper_profile_image' =>  $this->input->post('category'),
            'user_id' => $usrId, 


        );
        
        }
        $this->MysteryShopper_model->add($shopperData);
        redirect('/MysteryShopper') ;
  }
            
    }

    public function mysteryShopperUpdateView()
    {
        $id = $this->uri->segment(3);

        if($this->session->userdata('username'))
            {
              
            $data['allMysteryShopper']=$this->MysteryShopper_model->searchMysteryShopper($id);
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("mysteryShopperUpdate",$data); 
            $this->load->view("Footer");
            
            
          }
            
            else
            {
                $this->load->view("login");
            }

    }
    public function mysteryShopperUpdate()
    {
        if($this->session->userdata('username'))
            {
                

                $id = $this->uri->segment(3);

        $data_through_id = $this->MysteryShopper_model->searchMysteryShopper($id);
        $image_path = '';
        $video_path='';
        $userID = $this->session->userdata('user_id');
        echo "User_ID".$userID;

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 102400;
                

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('pic'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                  
                }
                else
                {
                    $profileImage = array('upload_data' => $this->upload->data());

                    //print_r($data['upload_data']['full_path']);
                } 
                 $image_path = $profileImage['upload_data']['file_name'];
                if ( ! $this->upload->do_upload('profile_video'))
                { 
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                   // print_r($error);
                }
                else
                {
                       $profileVideo = array('upload_data' => $this->upload->data());
                      
                    
                }
                $video_path = $profileVideo['upload_data']['file_name']; 
              
     
       if($image_path=='' && $video_path==''){
        $shopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
            // 'mysteryShopper_video' =>  $video_path,
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            
            );
        }
        else{
             unlink("uploads/".$data_through_id->mysteryShopper_profile_image);
            // unlink("uploads/".$data_through_id->mysteryShopper_video);

            $shopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
           // 'mysteryShopper_video' =>  $video_path,
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            'mysteryShopper_profile_image' =>  $image_path,
            
            );

        }
        


        
        $this->MysteryShopper_model->update($id,$shopperData);
        redirect('/MysteryShopper') ;
        }  
            
            else
            {
                $this->load->view("login");
            }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $data = $this->MysteryShopper_model->searchMysteryShopper($id);
        unlink("uploads/".$data->mysteryShopper_profile_image);
        unlink("uploads/".$data->mysteryShopper_video);
         $this->MysteryShopper_model->deleteMysteryShopper($id);
         
         $userid = $this->uri->segment(4);
         $data = $this->User_model->deleteuser($userid);
          redirect('/MysteryShopper') ;

        
    }
}

?>