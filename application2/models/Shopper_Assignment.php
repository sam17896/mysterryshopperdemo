<?php

Class Shopper_Assignment extends CI_Model {

	function __construct() {


		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');



	}
	function add($data){
        $this->db->insert('shopper_assignment',$data);
	}

	function getMyAssignment($id){

		$query = $this->db->query("SELECT * FROM `mysteryshopper_client`, shopper_assignment, client_assignment WHERE client_assignment.assignment_id = shopper_assignment.assignment_id and client_assignment.client_id = mysteryshopper_client.user_id and status = 'WORKING'");
		$result = $query->result_array();
		return $result;
	}

	function updateAssignmentStatus($id,$status){
		$query = $this->db->query("Update shopper_assignment set status = '$status' where id = '$id'");
		$result = $query->result_array();
	}


}


?>
