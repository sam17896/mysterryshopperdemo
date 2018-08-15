<?php

/**
* 
*/
class MysteryShopperWeb extends CI_Controller
{
	
	function __construct()
	{
	    parent::__construct();
	    $this->load->helper('url');
       $this->load->model('User_model');
       $this->load->model('MysteryShopper_model');
	}

	 public function sign_up_view()
      {
         $this->load->view("Main/Header2");
          $this->load->view("Main/sign_up"); 
          $this->load->view("Main/Footer2");
      }

     

      public function mysteryShopperProfileUpdateView()
      {
        if($this->session->userdata('username'))
      {

          $id= $this->session->userdata('id');
          $data['users']= $this->session->userdata('username');
          $data['allMysteryShopper']=$this->MysteryShopper_model->searchMysteryShopperUser($id);
          $this->load->view("Main/Mystery_Shopper/Header",$data);
          $this->load->view("Main/Mystery_Shopper/mysteryShopperProfileUpdateView",$data); 
          $this->load->view("Main/Mystery_Shopper/Footer");

          }
          
          else
          {
            redirect(base_url());
          }
      }
      public function mysteryShopperProfileUpdate()
      {

                 $url = base_url().'index.php/api/updateMysteryShopper/';
                  //API key
                 $apiKey = 'CODEX@123';
                  //Auth credentials
                 $username = "admin";
                 $password = "1234";


                $userID = $this->session->userdata('id');
                $data_through_id = $this->MysteryShopper_model->searchMysteryShopperUser($userID);
                $image_path = '';
                $video_path='';
        
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc|mp4';
                $config['max_size']             = 102400;
                

                $this->load->library('upload', $config);

                if ( !$this->upload->do_upload('pic'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    print_r($error);
                }
                else
                {
                    $profileImage = array('upload_data' => $this->upload->data());

                    //print_r($data['upload_data']['full_path']);
                } 
                 $image_path = $profileImage['upload_data']['file_name'];

              
                // if ( !$this->upload->do_upload('profile_video_1'))
                // { 
                        
                //     $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                //     $error = array('error' => $this->upload->display_errors());

                //     print_r($error);
                // }
                // else
                // {
                //        $profileVideo = array('upload_data' => $this->upload->data());
                      
                    
                // }
                // $video_path = $profileVideo['upload_data']['file_name'];

               


          if($image_path=='' && $video_path==''){
        $shopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            'mysteryShopper_category' => $this->input->post('category'),
            'mysteryShopper_profile_image' =>  $this->input->post('profile_image'),
            'mysteryShopper_travel_field' => $this->input->post('travel'),
            'mysteryShopper_account_contact' => $this->input->post('account_contact'),
            'user_id' => $this->input->post('user_id'),
           
            
            
            );
        }
        else{
             unlink("uploads/".$data_through_id->mysteryShopper_profile_image);
             unlink("uploads/".$data_through_id->mysteryShopper_video);

            $shopperData = array(
            'mysteryShopper_name' => $this->input->post('mystery_shopper_name'),
            'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            'mysteryShopper_card_type' => $this->input->post('mystery_shopper_card_type'),
            'mysteryShopper_bank_name' => $this->input->post('mystery_shopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mystery_shopper_address'),
            'mysteryShopper_email' => $this->input->post('mystery_shopper_email'),
            'mysteryShopper_account_no' => $this->input->post('mystery_shopper_account_number'),
            'mysteryShopper_contact_number' => $this->input->post('mystery_shopper_contact_number'),
            'mysteryShopper_category' => $this->input->post('category'),
            'mysteryShopper_profile_image' =>  $image_path,
            'mysteryShopper_travel_field' => $this->input->post('travel'),
            'mysteryShopper_account_contact' => $this->input->post('account_contact'),
            'user_id' => $this->input->post('user_id'),
            
            
            
            );
        }

        //print_r($shopperData);
        

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
          redirect(base_url().'index.php/MysteryShopperLoggedin');
          //print_r($result);

          //close cURL resource
          curl_close($ch);
      }
      
      public function mysteryShopperContact_NIC_update()
      {

                 $url = base_url().'index.php/api/updateMysteryShopper_contact/';
                  //API key
                 $apiKey = 'CODEX@123';
                  //Auth credentials
                 $username = "admin";
                 $password = "1234";


                $userID = $this->session->userdata('id');
                $data_through_id = $this->MysteryShopper_model->searchMysteryShopperUser($userID);
                
             


         
        $shopperData = array(
            'mysteryShopper_nic' => $this->input->post('mystery_shopper_nic_number'),
            'mysteryShopper_account_contact' => $this->input->post('account_contact'),
            'user_id' => $this->input->post('user_id'),
            );
       
        
            


        //print_r($shopperData);
        

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
           $id = $this->input->post('assignment_id');
          redirect(base_url().'index.php/MysteryShopperLoggedin/assignment_detail/'.$id);
          print_r($result);

          //close cURL resource
          curl_close($ch);
      }
      
}



?>