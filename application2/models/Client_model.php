<?php

Class client_model extends CI_Model {

	function __construct() {


		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('mysteryshopper_client_branch_model');
		$this->load->model('Assignment_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');



	}
	function get_all()
	{
		//$sql = $this->db->query("Select * from nww_client");

		$sql=$this->db->get('mysteryshopper_client');
		$result = $sql->result_array();
		return $result;


	}

	function add($data)
	{
		//$sql = $this->db->query("Select * from nww_client");

		if($sql=$this->db->insert('mysteryshopper_client',$data))

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
		$this->db->from('mysteryshopper_client');
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

        $this->db->from('mysteryshopper_client');

        $this->db->where('mysteryShopper_client_category', 'Food');

        $query = $this->db->get();

        $result = $query->result_array();

        return $result;

    }

	function searchnm($client_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryshopper_client');
		$this->db->where('mysteryShopper_client_id', $client_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function getdetail($client_name)
	{
		$this->db->select('*');
		$this->db->from('mysteryshopper_client');
		$this->db->where('mysteryShopper_client_id', $client_name);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function update($id,$data)
	{
		   $this->db->where('mysteryShopper_client_id', $id);
        $this->db->update('mysteryshopper_client', $data);

	}
	function del($user_id,$client_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('mysteryShopper_client_id' , $client_id);
		$this->db->delete('mysteryshopper_client');
	}
	function delClientinUserTable($user_id)
	{
		$this->db->where('user_id', $user_id);

		$this->db->delete('mysteryshopperusers');
	}
}
?>
