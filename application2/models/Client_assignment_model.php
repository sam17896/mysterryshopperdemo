
<?php

Class Client_assignment_model extends CI_Model {
// Copied the other controler here so this file have few extra functions
	function __construct() {


		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Client_model');
		$this->load->model('Mysteryshopper_client_branch_model');
		$this->load->model('Assignment_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');



	}
	function get_all()
	{
		//$sql = $this->db->query("Select * from nww_client");

		$sql=$this->db->get('mysteryShopper_client');
		$result = $sql->result_array();
		return $result;


	}

	function add($data)
	{
		//$sql = $this->db->query("Select * from nww_client");

		if($sql=$this->db->insert('client_assignment',$data))

		{
		return true;
		}
		else
		{
		return false;
		}


	}
        function search_by_user_id($user_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_client');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function get_branches_by_id($user_id)
	{
	return $this->Mysteryshopper_client_branch_model->search_by_user_id($user_id);
	}
	function searchfood()

    {

        $this->db->select('*');

        $this->db->from('mysteryShopper_client');

        $this->db->where('mysteryShopper_client_category', 'Food');

        $query = $this->db->get();

        $result = $query->result_array();

        return $result;

    }

	function searchnm($client_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_client');
		$this->db->where('mysteryShopper_client_id', $client_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function getdetail($client_name)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_client');
		$this->db->where('mysteryShopper_client_id', $client_name);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function update($id,$data)
	{
		   $this->db->where('mysteryShopper_client_id', $id);
        $this->db->update('mysteryShopper_client', $data);

	}
	function del($user_id,$client_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('mysteryShopper_client_id' , $client_id);
		$this->db->delete('mysteryShopper_client');
	}
	function delClientinUserTable($user_id)
	{
		$this->db->where('user_id', $user_id);

		$this->db->delete('mysteryShopperUsers');
	}


	function getAllAssignments($shopper_id){
		$now = new DateTime('now');
		$month = $now->format('m');
		$year = $now->format('Y');
		$month = intval($month);
		$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
		$queryParam = $months[$month].$year;
		$query = $this->db->query("SELECT * FROM `client_assignment`,
		`mysteryshopper_client`, `client_assignment_citybifraction`, `mysteryshopper_client_branch` where client_assignment.assignment_id in
		(SELECT DISTINCT(client_assignment.assignment_id) from client_assignment,
		client_assignment_citybifraction, mysteryshopper_client_branch
		where client_assignment.assignment_id = client_assignment_citybifraction.client_assignment_id and
		client_assignment_citybifraction.branch_id = mysteryshopper_client_branch.branch_id) and
		client_assignment_citybifraction.client_assignment_id = client_assignment.assignment_id and
		client_assignment_citybifraction.branch_id = mysteryshopper_client_branch.branch_id and
		mysteryshopper_client.user_id = client_assignment.client_id and client_assignment.assignment_id not in
		 (Select assignment_id from shopper_assignment where shopper_id = '$shopper_id')");
		$result= $query->result_array();
		return $result;

	}


	function getAllAssignmentsByCity($city){
		$now = new DateTime('now');
		$month = $now->format('m');
		$year = $now->format('Y');
		$month = intval($month);
		$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
		$queryParam = $months[$month].$year;


		$result = $this->db->query("SELECT * FROM
		`client_assignment`,
		client_assignment_citybifraction,
		mysteryshopper_client_branch
		where
		client_assignment.assignment_id = client_assignment_citybifraction.client_assignment_id and
		client_assignment.month = '$queryParam' and
		client_assignment_citybifraction.branch_id = mysteryshopper_client_branch.branch_id and
		mysteryshopper_client_branch.City = '$city'");
	}


	function getTotalTakenAssignment($username){
		$query = $this->db->query("SELECT takenAssignment FROM `mysteryshopperusers`
		where user_id = '$username'");
		$result= $query->result_array();
		return $result;
	}

	function searchAssignment($id,$branch_id){
		$query = $this->db->query("Select * from
		client_assignment,
		mysteryshopper_client,
		client_assignment_citybifraction,
		mysteryshopper_client_branch
		where client_assignment.assignment_id = '$id' and
		mysteryshopper_client.user_id = client_assignment.client_id and
		client_assignment_citybifraction.id = $branch_id and
		client_assignment_citybifraction.branch_id = mysteryshopper_client_branch.branch_id and
		client_assignment_citybifraction.client_assignment_id = client_assignment.assignment_id
		");
		$result = $query->result_array();
		return $result;
	}
}


?>
