<?php

Class Accounts extends CI_Model {

	function __construct() {


		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');



	}
	function get_all_shoppers()
	{
        $date = date("Y-m-d");
        $dateofthemonth = date('d');
        if($dateofthemonth < 16){
            $startDate = date('Y').'-'.date('m').'-01';
            $endDate = date('Y').'-'.date('m').'-16';
        } else {
            $startDate = date('Y').'-'.date('m').'-16';
            $endDate = date('T').'-'.date('m').'-30';
        }

        $query = $this->db->query("SELECT mysteryshopper.*, sum(shopper_assignment.budget) as total FROM `mysteryshopper`, shopper_assignment where mysteryshopper.user_id in (SELECT DISTINCT(shopper_assignment.shopper_id) from shopper_assignment WHERE STATUS = 'Accept' and shopper_assignment.date between '$startDate' and '$endDate') and mysteryshopper.user_id = shopper_assignment.shopper_id and status = 'Accept' GROUP BY shopper_assignment.shopper_id");
        $result= $query->result_array();
        return $result;
    }

    function get_all_shoppers_paid(){
        $query = $this->db->query("SELECT mysteryshopper.*, sum(shopper_assignment.budget) as total FROM `mysteryshopper`, shopper_assignment where mysteryshopper.user_id in (SELECT DISTINCT(shopper_assignment.shopper_id) from shopper_assignment WHERE STATUS = 'Closed') and mysteryshopper.user_id = shopper_assignment.shopper_id and status = 'Closed' GROUP BY shopper_assignment.shopper_id");
        $result= $query->result_array();
        return $result;

    }

    function getShopperDetail($id){
        $query = $this->db->query("select * from client_assignment, shopper_assignment where client_assignment.assignment_id = shopper_assignment.assignment_id and shopper_assignment.status = 'Accept' and shopper_assignment.shopper_id = $id");
        $result= $query->result_array();
        return $result;
    }

    function getShopperDetailPaid($id){
        $query = $this->db->query("select * from client_assignment, shopper_assignment where client_assignment.assignment_id = shopper_assignment.assignment_id and shopper_assignment.status = 'Closed' and shopper_assignment.shopper_id = $id");
        $result= $query->result_array();
        return $result;
    }

    function getClients(){
        $query = $this->db->query("SELECT mysteryshopper_client.*, sum(shopper_assignment.budget) as total FROM mysteryshopper_client, shopper_assignment where mysteryshopper_client.user_id in (SELECT DISTINCT(client_assignment.client_id) from shopper_assignment,client_assignment WHERE STATUS = 'Closed' and client_assignment.assignment_id = shopper_assignment.assignment_id) and status = 'Closed' GROUP BY mysteryshopper_client.user_id");
        $result= $query->result_array();
        return $result;
    }

    function getClientsPayable(){
        $date = date("Y-m-d");
        $dateofthemonth = date('d');
        if($dateofthemonth < 16){
            $startDate = date('Y').'-'.date('m').'-01';
            $endDate = date('Y').'-'.date('m').'-16';
        } else {
            $startDate = date('Y').'-'.date('m').'-16';
            $endDate = date('T').'-'.date('m').'-30';
        }

        $query = $this->db->query("SELECT mysteryshopper_client.*, sum(shopper_assignment.budget) as total FROM `mysteryshopper_client`, shopper_assignment where mysteryshopper_client.user_id in (SELECT DISTINCT(client_assignment.client_id) from shopper_assignment,client_assignment WHERE STATUS = 'Accept' and shopper_assignment.date between '$startDate' and '$endDate' and client_assignment.assignment_id = shopper_assignment.assignment_id) and status = 'Accept' GROUP BY mysteryshopper_client.user_id");
        $result= $query->result_array();
        return $result;

    }

    function getClientTransactions($id){

        $query = $this->db->query("SELECT * FROM `shopper_assignment`,mysteryshopper_client_branch,client_assignment WHERE shopper_assignment.assignment_id in (SELECT DISTINCT(client_assignment.assignment_id) from client_assignment where client_assignment.client_id = $id) and shopper_assignment.branch_id = mysteryshopper_client_branch.branch_id and shopper_assignment.assignment_id = client_assignment.assignment_id and shopper_assignment.status = 'Closed'");
        $result= $query->result_array();
        return $result;

    }

    function getClientTransactionsPayable($id){
        $query = $this->db->query("SELECT * FROM `shopper_assignment`,mysteryshopper_client_branch,client_assignment WHERE shopper_assignment.assignment_id in (SELECT DISTINCT(client_assignment.assignment_id) from client_assignment where client_assignment.client_id = $id) and shopper_assignment.branch_id = mysteryshopper_client_branch.branch_id and shopper_assignment.assignment_id = client_assignment.assignment_id and shopper_assignment.status = 'Accept'");
        $result= $query->result_array();
        return $result;
    }


    function getTotalFromShopper(){
        $date = date("Y-m-d");
        $month = date('m');
        $query = $this->db->query("SELECT sum(shopper_assignment.budget) as total FROM `shopper_assignment` where status ='Closed' and Month(date) = $month");
        $result= $query->row();
        return $result;
    }

    function getTotalFromClient(){
        $Mdate= date('Y-m-d', strtotime('+1 month'));
        $monthNum=substr($Mdate,5,2);
        $year=subStr($Mdate,0,4);
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        $queryParam = $monthName.$year;
        $query = $this->db->query("SELECT sum(client_assignment.total_payout) as total FROM `client_assignment` where month = '$queryParam'");
        $result= $query->row();
        return $result;
    }

    function getAllClientAssignment(){
        $Mdate= date('Y-m-d', strtotime('+1 month'));
        $monthNum=substr($Mdate,5,2);
        $year=subStr($Mdate,0,4);
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        $queryParam = $monthName.$year;
        $query = $this->db->query("SELECT * FROM `client_assignment` where month = '$queryParam'");
        $result= $query->result_array();
        return $result;
    }
}


?>
