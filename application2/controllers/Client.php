<?php
   class Client extends CI_Controller {


   		function __construct() {


			parent::__construct();
            $this->load->model('User_model');
      $this->load->model('Client_model');
      $this->load->model('Assignment_model');
      $this->load->model('Client_assignment_model');
      $this->load->helper(array('form', 'url'));



            $this->load->model('Accounts');

            $this->load->library('form_validation');

		}


    	public function index() {

			if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
			{

            $data['allclient']=$this->Client_model->get_all();
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("client",$data);
            $this->load->view("Footer");


          }

        	else
        	{

        		$this->load->view("login");
        	}
     	}

    public function client_more() {

      if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
      {

            $data['alluser']=$this->User_model->get_all_client();
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("client_more",$data);
            $this->load->view("Footer");


          }

          else
          {
            $this->load->view("login");
          }
      }

      public function Accounts() {

        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
        {

              $data['allShoppers']=$this->Accounts->get_all_shoppers();
              $date = date("Y-m-d");
              $dateofthemonth = date('d');
              if($dateofthemonth < 16){
                  $startDate = date('Y').'-'.date('m').'-01';
                  $endDate = date('Y').'-'.date('m').'-16';
              } else {
                  $startDate = date('Y').'-'.date('m').'-16';
                  $endDate = date('T').'-'.date('m').'-30';
              }
              $data['start_date'] = $startDate;
              $data['end_date']=$endDate;

              $data['user']= $this->session->userdata('username');
              $this->load->view("Header",$data);
              $this->load->view("accounts",$data);
              $this->load->view("Footer");


            }

            else
            {
              $this->load->view("login");
            }
        }

      public  function ShopperPaid(){
          if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
          {

                $data['allShoppers']=$this->Accounts->get_all_shoppers_paid();
                $data['user']= $this->session->userdata('username');
                $this->load->view("Header",$data);
                $this->load->view("accounts-shopper-paid",$data);
                $this->load->view("Footer");


              }

              else
              {
                $this->load->view("login");
              }
        }

       public function add_client()
    {

           if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {

            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("addClient");
            $this->load->view("Footer");

            }

            else
            {
             $this->load->view("login");
            }
     }

       public function add_more_store()
    {

           if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {
            $user_id = urldecode($this->uri->segment(3));
            $data['selected_user']=$this->User_model->searchnm($user_id);
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("add_more_store");
            $this->load->view("Footer");

            }

            else
            {
             $this->load->view("login");
            }
     }

     public function update_client()
     {
            if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {

            $client_id = urldecode($this->uri->segment(3));
            $data1['selected_client']=$this->Client_model->searchnm($client_id);

            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("updateClient",$data1);
            $this->load->view("Footer");

            }

            else
            {
             $this->load->view("login");
            }
     }
     public function insert_more_store()
     {

                //$base_path = base_url();

        //echo $image_path;


        $usrId = $this->input->post('user_id');
                $data2 = array(
          'client_id' => $usrId,
          'Address' => $this->input->post('address'),

          'city' => $this->input->post('city'),


        );

        //print_r(array_values($data));


        $this->Client_model->add_branch($data2);
        //Loading View
        redirect('/Client') ;



     }
     public function addAssignment()
     {
     $user_id=$this->input->post('user_id');
     $branch_assignments[]=$this->input->post('branch_assignments');
     $city_budgets[]=$this->input->post('city_budgets');
     print_r($city_budgets);
     $city_assignments[]=$this->input->post('city_assignments');

     $client_data=$this->Client_assignment_model->get_branches_by_id($user_id);

     $Mdate= date('Y-m-d', strtotime('+1 month'));
    $monthNum=substr($Mdate,5,2);
     $year=subStr($Mdate,0,4);
     $dateObj   = DateTime::createFromFormat('!m', $monthNum);
     $monthName = $dateObj->format('F');
     $assignment_number=$this->input->post('assignment_number');
     $total=0;

      //  $note=$this->input->post('note');
      $note="hello ";
        for ($i=0;$i<=sizeof($city_assignments);$i++)
        {
          echo "<br>".$city_assignments[0][$i];

          $total=$total+ (int)$city_assignments[0][$i]*(int)$city_budgets[0][$i];

       }
        $data = array(

        'client_id'=> $user_id,
        'Month'=>$monthName.$year,
        'total_budget'=>$total,
        'total_payout'=>$total+($total*.30),
        'speical_note'=>$note,

        );


       $this->Client_assignment_model->add($data);
       $assignment_id= $this->db->insert_id();
      for ($i=0;$i<sizeof($client_data);$i++)
      {
        $data =array (
       'branch_id'=>$client_data[$i]['branch_id'],
       'client_assignment_id'=>$assignment_id,
        'number_of_assignment'=>$branch_assignments[0][$i],
        'budget_for_each'=>$city_budgets[0][$i],
        );
        print_r($data);
         $this->db->insert('client_assignment_citybifraction',$data);
      }
      //redirect


		 		redirect(base_url().'index.php/ClientLoggedin');
     }
     public function insert()
     {


                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
                $config['max_size']             = 1000;
                $config['max_width']            = 1200;
                $config['max_height']           = 1200;

                $this->load->library('upload', $config);
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[mysteryShopperUsers. user_email]');

                if ($this->form_validation->run())
        {
                if ( ! $this->upload->do_upload('pic'))
                {

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    print_r($error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    //print_r($data['upload_data']['file_name']);
                }
                //$base_path = base_url();
        $image_path = $data['upload_data']['file_name'];
        //echo $image_path;

        $userData = array(
          'user_name' => $this->input->post('owner_name'),
          'user_password' => $this->input->post('password'),
          'user_email' => $this->input->post('email'),
          'user_type' => 'CLIENT',

        );
        $this->User_model->add($userData);

        $usrId = $this->User_model->user_added_id();
                $data2 = array(
          'mysteryShopper_client_name' => $this->input->post('name'),
          'mysteryShopper_client_address' => $this->input->post('address'),
          'mysteryShopper_client_image' => $image_path,
          'mysteryShopper_client_owner_name' => $this->input->post('owner_name'),
          'user_id' => $usrId,
          'mysteryShopper_client_category' => $this->input->post('category'),
          'Minimum_assignments' => $this->input->post('Minimum_assignments'),

        );

        //print_r(array_values($data));


        $this->Client_model->add($data2);

          redirect('/Client') ;

        }
        else
        {
        	echo '<script>alert("Same Client Already Exist");  window.location.href = window.location.origin+"/index.php/client/add_client";  </script>';
          	//redirect('Client/add_client') ;
        }





     }


      public function update()
     {
        $id = $this->input->post('id');
        $data_through_id = $this->Client_model->searchnm($id);
           $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
                $config['max_size']             = 1000;
                $config['max_width']            = 1200;
                $config['max_height']           = 1200;

                $this->load->library('upload', $config);
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[mysteryShopperUsers. user_email]');


                if ( ! $this->upload->do_upload('pic'))
                {

                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    //print_r($error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    //print_r($data['upload_data']['file_name']);
                }
                //$base_path = base_url();
        $image_path = $data['upload_data']['file_name'];
                //$base_path = base_url();


          if($image_path=='')
          {
                $data2 = array(
          'mysteryShopper_client_name' => $this->input->post('name'),
          'mysteryShopper_client_address' => $this->input->post('address'),
          'mysteryShopper_client_owner_name' => $this->input->post('owner_name'),
          'mysteryShopper_client_category' => $this->input->post('category'),

        );
          }
            else
            {
              unlink("uploads/".$data_through_id->mysteryShopper_client_image);
              $data2 = array(
          'mysteryShopper_client_name' => $this->input->post('name'),
          'mysteryShopper_client_address' => $this->input->post('address'),
          'mysteryShopper_client_image' => $image_path,
          'mysteryShopper_client_owner_name' => $this->input->post('owner_name'),
          'mysteryShopper_client_category' => $this->input->post('category'),

        );
        }
        //print_r($id);

        //print_r($data2);
        $this->Client_model->update($id,$data2);
        //Loading View
        redirect('/Client') ;

     }

     public function delete()
     {

if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {
        $user_id = urldecode($this->uri->segment(3));
        $client_id = urldecode($this->uri->segment(4));
        $data = $this->Client_model->searchnm($client_id);
        unlink("uploads/".$data->mysteryShopper_client_image);
        $this->Client_model->del($user_id,$client_id);
        $this->Client_model->delClientinUserTable($user_id);
        $status = 'Close';

          $statusReject = array(
          'mysteryShopper_assignment_status' => $status,
           );

         $this->Assignment_model->updateStatus($client_id,$statusReject);
        redirect('/Client') ;
        }else
            {
             $this->load->view("login");
            }


     }

   }

?>