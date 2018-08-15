<?php
   class Assignment extends CI_Controller {

   		
   		function __construct() {


			      parent::__construct();
            $this->load->model('User_model');
            $this->load->model('Assignment_model');
            $this->load->model('MysteryShopper_model');
            $this->load->model('Client_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library("myfpdf");


		
		}


    	public function index() {
        	
			if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
			{
	          
            $data['alldata']=$this->Assignment_model->get_all_open_status();
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("assignment",$data); 
            $this->load->view("Footer");
        	
        	
          }
        	
        	else
        	{
        		$this->load->view("login");
        	}
     	}

      public function pending_assignment() {
          
      if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
      {
            
            $data['alldata']=$this->Assignment_model->get_all_pending();
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("pending_assignment",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }
      }
      
      public function assignmentAccept()
      {
        $id = $this->uri->segment(3);
        $status = 'Accept';

          $statusAccept = array(
          'mysteryShopper_assignment_status' => $status,
           );

         $this->Assignment_model->update($id,$statusAccept);
         redirect('/assignment') ;

        
      }
      public function assignmentEditDescriptionView()
      {
        $id = $this->uri->segment(3);
       if($this->session->userdata('username'))
      {
            
           
            
            $data['user']= $this->session->userdata('username');
             $data['selected_assignment']=$this->Assignment_model->searchnm($id);
            $this->load->view("Header",$data);
            $this->load->view("assignmentEditDescriptionView",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }

        
      }
      public function assignmentEditDescription()
      {
         $id = $this->input->post('id');
         $editInstruction = $this->input->post('editReport');
          $userId=$this->Assignment_model->searchnm($id)->mysteryShopper_id;
          $mySteryShopperEmail=$this->User_model->searchnm($userId)->user_email;
          //$mySteryShopperName=$this->User_model->searchnm($userId)->user_name;
          $mySteryShopperName ='MYSTERYSHOPPERS PAKISTAN';
          //$Client_name=$this->Client_model->search_by_user_id($userId)->mysteryShopper_client_name;
          
          
         // echo $mySteryShopperEmail;
        $status = 'Edit';

          $statusEditWithInstruction = array(
          'mysteryShopper_assignment_status' => $status,
          'report_edit' =>$editInstruction,
           );
           
           //get the form data
            $name = $mySteryShopperName;
            $from_email = 'info@mysteryshopperspakistan.com';
            $subject = 'Report Edit Instructions';
            $message = '<br><br>'.$editInstruction.'<br><br><br><br>'.'Regards.'.'<br>'.'Team Mystery Shoppers Pakistan';

            //set to_email id to which you want to receive mails
            $to_email = $mySteryShopperEmail;
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
            $this->email->from($from_email, $mySteryShopperName);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
//print_r($config);

            $this->email->send();
            

         $this->Assignment_model->update($id,$statusEditWithInstruction);
         redirect('/assignment') ;
        
      }
      public function assignmentReject()
      {
        $id = $this->uri->segment(3);
        $status = 'Reject';

          $statusReject = array(
          'mysteryShopper_assignment_status' => $status,
           );

         $this->Assignment_model->update($id,$statusReject);
         redirect('/assignment') ;

        
      }
      
      public function accept_assignment() {
          
      if($this->session->userdata('username'))
      {
            
            $data['alldata']=$this->Assignment_model->get_all_Accept();
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("accept_assignment",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }
      }
      
      public function expired_assignment() {
          
      if($this->session->userdata('username'))
      {
            
            $data['alldata']=$this->Assignment_model->get_all_Expired();
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("expired_assignment",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }
      }

      public function reject_assignment() {
          
      if($this->session->userdata('username'))
      {
            
            $data['alldata']=$this->Assignment_model->get_all_Reject();
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("reject_assignment",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }
      }

      public function complete_assignment() {
          
      if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
      {
            
            $data['alldata']=$this->Assignment_model->get_all_complete();
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("complete_assignment",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }
      }
      
      public function complete_assignment_detail() {
          
      if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
      {
            $id = urldecode($this->uri->segment(3));
            $data['selected_assignment']=$this->Assignment_model->searchnm($id);
            $data['selected_assignment_detail']=$this->Assignment_model->complete_assignment_review($id);
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("complete_assignment_detail",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }
      }
      public function complete_assignment_delivery_detail() {
          
      if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
      {
            $id = urldecode($this->uri->segment(3));
            $data['selected_assignment']=$this->Assignment_model->searchnm($id);
            $data['selected_assignment_detail']=$this->Assignment_model->complete_assignment_delivery_review($id);
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("deliveryAssignmentReport",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
            $this->load->view("login");
          }
      }

      public function complete_assignment_detail_for_client() {
          
      if($this->session->userdata('username')  && $this->session->userdata('type') == 'CLIENT')
      {
            $id = urldecode($this->uri->segment(3));
            $data['selected_assignment']=$this->Assignment_model->searchnm($id);
            $data['selected_assignment_detail']=$this->Assignment_model->complete_assignment_review($id);
            $data['allshopper']=$this->MysteryShopper_model->all_shopper();
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("complete_assignment_detail",$data); 
            $this->load->view("Footer");
          
          
          }
          
          else
          {
$this->load->view("Main/Header");
            $this->load->view("Main/Login");

$this->load->view("Main/Footer");
          }
      }


       public function add_assignment() 
    {
          
           if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {
      
            $data['user']= $this->session->userdata('username');
            $data['allclient']=$this->Client_model->get_all();
            $this->load->view("Header",$data);
            $this->load->view("addAssignment"); 
            $this->load->view("Footer");
          
            }
          
            else
            {
             $this->load->view("login");
            }
     }
     public function update_assignment()
     {
            if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {

            $id = urldecode($this->uri->segment(3));
            $data1['selected_assignment']=$this->Assignment_model->searchnm($id);
            $data1['allclient']=$this->Client_model->get_all();
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("updateAssignment",$data1); 
            $this->load->view("Footer");
          
            }
          
            else
            {
             echo 'Login First';
            }
     }

     public function insert()
     {          
                $data = array(
          'mysteryShopper_assignment_toDate' => $this->input->post('to_date'),
          'mysteryShopper_assignment_category' => $this->input->post('category'),
          'mysteryShopper_assignment_fromDate' => $this->input->post('from_date'),
          'mysteryShopper_assignment_status' => $this->input->post('avaiability'),
          'mysteryShopper_client_id' => $this->input->post('client'),
          'mysteryShopper_assignment_ratting_from' => $this->input->post('rating_from'),
          'mysteryShopper_assignment_ratting_to' => $this->input->post('rating_to'),
          'mysteryShopper_assignment_description' => $this->input->post('description'),
          'assignment_budget' => $this->input->post('assignment_budget'),
          'mysteryShopper_assignment_category' => $this->input->post('assignment_category'),
          'mysteryShopper_assignment_city' => $this->input->post('assignment_city'),
          
        );

        //print_r($data);

        
        $this->Assignment_model->add($data);
        //Loading View
        redirect('/assignment') ;

        
        
     }
      

      public function update()
     {
        $id = $this->input->post('id');
        $data_through_id = $this->Assignment_model->searchnm($id);
        
                
        
         
                $data = array(
          'mysteryShopper_assignment_toDate' => $this->input->post('to_date'),
          'mysteryShopper_assignment_fromDate' => $this->input->post('from_date'),
          'mysteryShopper_assignment_status' => $this->input->post('avaiability'),
          'mysteryShopper_assignment_ratting_from' => $this->input->post('rating_from'),
          'mysteryShopper_assignment_ratting_to' => $this->input->post('rating_to'),
          'mysteryShopper_assignment_description' => $this->input->post('description'),
          'assignment_budget' => $this->input->post('assignment_budget'),
          'mysteryShopper_assignment_category' => $this->input->post('assignment_category'),
          'mysteryShopper_assignment_city' => $this->input->post('assignment_city'),
          
        );
        //print_r($data);
        //echo $id;
        $this->Assignment_model->update($id,$data);
        //Loading View
        redirect('/assignment') ;
        
     }

     public function delete()
     {
	if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
      {
         
        $id = urldecode($this->uri->segment(3));
        $this->Assignment_model->del($id);
        redirect('/assignment') ;
         }
          
            else
            {
             $this->load->view("login");
            }

     }

   } 


?> 