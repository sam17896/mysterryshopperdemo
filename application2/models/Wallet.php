<?php

Class Wallet extends CI_Model {

	function __construct() {


		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');



	}
	function getTotalAssigmentApproved($id)
	{
		$query = $this->db->query("select count(*) as total from shopper_assignment where status = 'Accept' or status = 'Closed' and shopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAssigmentPending($id){
		$query = $this->db->query("select count(*) as total from shopper_assignment where status = 'Completed' or status = 'Pending' and shopper_id = {$id}");
        $result= $query->result_array();
        return $result;

    }

    function getTotalAssigmentRejected($id){
		$query = $this->db->query("select count(*) as total from shopper_assignment where status = 'Reject' and shopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAssigmentRejectedAmount($id){
		$query = $this->db->query("select sum(shopper_assignment.budget) as total_amount from shopper_assignment where status = 'Reject' and shopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAssignmentApprovedAmount($id){
        $query = $this->db->query("select sum(shopper_assignment.budget) as total_amount from shopper_assignment where status = 'Accept' and shopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAmount($id){
        $query = $this->db->query("select sum(shopper_assignment.budget) as total_amount from shopper_assignment where status = 'Closed' and shopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getAllAssignmentDetailPaid($id){
        $query = $this->db->query("select * from client_assignment, shopper_assignment, mysteryshopper_client where client_assignment.assignment_id = shopper_assignment.assignment_id and shopper_assignment.shopper_id = $id and client_assignment.client_id = mysteryshopper_client.user_id and shopper_assignment.status = 'Closed'");
        $result= $query->result_array();
        return $result;
    }
}
?>
