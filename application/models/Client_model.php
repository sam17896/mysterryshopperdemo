<?php

Class client_model extends CI_Model {


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

		if($sql=$this->db->insert('mysteryShopper_client',$data))
		
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
	
	function searchnmAssignment($client_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_client_id', $client_id);
		$query = $this->db->get();
		$result = $query->result_array();
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
}

?>
