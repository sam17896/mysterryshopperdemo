<?php

Class Wallet extends CI_Model {

	function __construct() {


		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	}
	function getTotalAssigmentApproved($id)
	{
		$query = $this->db->query("select count(*) as total from mysteryShopper_assignment where (mysteryShopper_assignment_status = 'Accept' or mysteryShopper_assignment_status = 'Closed') and mysteryShopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAssigmentPending($id){
		$query = $this->db->query("select count(*) as total from mysteryShopper_assignment where (mysteryShopper_assignment_status = 'Completed' or mysteryShopper_assignment_status = 'Pending') and mysteryShopper_id = {$id}");
        $result= $query->result_array();
        return $result;

    }

    function getTotalAssigmentRejected($id){
		$query = $this->db->query("select count(*) as total from mysteryShopper_assignment where mysteryShopper_assignment_status = 'Reject' and mysteryShopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAssigmentRejectedAmount($id){
		$query = $this->db->query("select sum(mysteryShopper_assignment.assignment_budget) as total_amount from mysteryShopper_assignment where mysteryShopper_assignment_status = 'Reject' and mysteryShopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAssignmentApprovedAmount($id){
        $query = $this->db->query("select sum(mysteryShopper_assignment.assignment_budget) as total_amount from mysteryShopper_assignment where mysteryShopper_assignment_status = 'Accept' and mysteryShopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getTotalAmount($id){
        $query = $this->db->query("select sum(mysteryShopper_assignment.assignment_budget) as total_amount from mysteryShopper_assignment where mysteryShopper_assignment_status = 'Closed' and mysteryShopper_id = {$id}");
        $result= $query->result_array();
        return $result;
    }

    function getAllAssignmentDetailPaid($id){
        $query = $this->db->query("select * from  mysteryShopper_assignment, mysteryShopper_client where mysteryShopper_assignment.mysteryShopper_client_id = mysteryShopper_client.mysteryShopper_client_id and mysteryShopper_assignment.mysteryShopper_id = $id and mysteryShopper_assignment.mysteryShopper_assignment_status = 'Closed'");
        $result= $query->result_array();
        return $result;
    }
}
?>
