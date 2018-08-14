<?php
   class Account extends CI_Controller {


   		function __construct() {


			parent::__construct();
            $this->load->model('Accounts');
            $this->load->model('Assignment_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

		}


        public function Bank(){
            if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
            {

                $data1['total_client']=$this->Accounts->getTotalFromClient()->total * .3  + $this->Accounts->getTotalFromClient()->total;
                $data1['total_shopper']=$this->Accounts->getTotalFromClient()->total;


                $data['user']= $this->session->userdata('username');
                $this->load->view("Header",$data);
                $this->load->view("Bank",$data1);
                $this->load->view("Footer");

             }

             else
             {
                $this->load->view("login");
             }

        }

        public function Tax(){
            if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
            {

                $data1['all_client_assignment'] = $this->Accounts->getAllClientAssignment();
                $data['user']= $this->session->userdata('username');
                $this->load->view("Header",$data);
                $this->load->view("Tax",$data1);
                $this->load->view("Footer");

             }

             else
             {
                $this->load->view("login");
             }

        }



    public function Clients(){
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
        {

         $data1['allclients']=$this->Accounts->getClients();

         $data['user']= $this->session->userdata('username');
         $this->load->view("Header",$data);
         $this->load->view("accounts-client",$data1);
         $this->load->view("Footer");

         }

         else
         {
          $this->load->view("login");
         }
    }

    public function Cycle(){
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
        {

         $data1['allclients']=$this->Accounts->getClientsPayable();
         $date = date("Y-m-d");
         $dateofthemonth = date('d');
         if($dateofthemonth < 16){
             $startDate = date('Y').'-'.date('m').'-01';
             $endDate = date('Y').'-'.date('m').'-16';
         } else {
             $startDate = date('Y').'-'.date('m').'-16';
             $endDate = date('T').'-'.date('m').'-30';
         }
         $data1['start_date'] = $startDate;
         $data1['end_date']=$endDate;
         $data['user']= $this->session->userdata('username');
         $this->load->view("Header",$data);
         $this->load->view("account-client-payable",$data1);
         $this->load->view("Footer");

         }

         else
         {
          $this->load->view("login");
         }
    }



    public function client_detail(){
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
        {

            $client_id = urldecode($this->uri->segment(3));
            $data1['assignments']=$this->Accounts->getClientTransactions($client_id);

            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("account-client-transaction",$data1);
            $this->load->view("Footer");

         }

         else
         {
          $this->load->view("login");
         }
    }

    public function Payment(){
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
        {

            $assignment_id = urldecode($this->uri->segment(3));
            $data['assignment_id']=$assignment_id;
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("assignment_pay",$data);
            $this->load->view("Footer");

         }

         else
         {
          $this->load->view("login");
         }
    }

    public function pay(){
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
        {

            $assignment_id = $this->input->post('assignment_id');
            $ref_id = $this->input->post('ref_id');
            $data['user']= $this->session->userdata('username');
            $ref = array(
                'ref_id' => $ref_id,
                'status' => 'Closed'
            );

            print_r($ref);

            $this->Assignment_model->update($assignment_id,$ref);

            redirect("/Client/Accounts");

         }

         else
         {
          $this->load->view("login");
         }
    }

    public function client_detail_payable(){
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
        {

            $client_id = urldecode($this->uri->segment(3));
            $data1['assignments']=$this->Accounts->getClientTransactionsPayable($client_id);
            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("account-client-transaction-payable",$data1);
            $this->load->view("Footer");

         }

         else
         {
          $this->load->view("login");
         }
    }



     public function get_shopper_detail()
     {
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {

            $shopper_id = urldecode($this->uri->segment(3));
            $data1['assignments']=$this->Accounts->getShopperDetail($shopper_id);

            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("account_shopper_detail",$data1);
            $this->load->view("Footer");

            }

            else
            {
             $this->load->view("login");
            }
     }

     public function get_shopper_detail_paid()
     {
        if($this->session->userdata('username')  && $this->session->userdata('type') == 'ADMIN')
           {

            $shopper_id = urldecode($this->uri->segment(3));
            $data1['assignments']=$this->Accounts->getShopperDetailPaid($shopper_id);

            $data['user']= $this->session->userdata('username');
            $this->load->view("Header",$data);
            $this->load->view("account_shopper_detail_paid",$data1);
            $this->load->view("Footer");

            }

            else
            {
             $this->load->view("login");
            }
     }
   }

?>