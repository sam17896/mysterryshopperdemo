<?php

Class User_model extends CI_Model {


	function get_all()
	{ 
		//$sql = $this->db->query("Select * from nww_client");

		$sql=$this->db->get('mysteryShopperUsers');
		$result = $sql->result_array();
		return $result;

		
	}
	
	function get_all_client()
	{ 
		//$sql = $this->db->query("Select * from nww_client");
		$this->db->select('*');
		$this->db->from('mysteryShopperUsers');
		$this->db->where('user_type', 'CLIENT');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;

		
	}
		public function checkUserExist($user_email)
{
        $this->db->where('user_email',$user_email);
	$query = $this->db->get('mysteryShopperUsers');
	$result= $query->row();
	return $result;
}

	
	function user_added_id()
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(user_id) AS `maxid` FROM `mysteryShopperUsers`')->row();
		if ($row) {
    		$maxid = $row->maxid; 
		}
		return $maxid;
	}
	function add($data)
	{ 
		//$sql = $this->db->query("Select * from nww_client");

		$sql=$this->db->insert('mysteryShopperUsers',$data);

		
	}

	function searchnm($client_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopperUsers');
		$this->db->where('user_id', $client_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function getdetail($client_name)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopperUsers');
		$this->db->where('user_id', $client_name);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function update($id,$data)
	{
	$this->db->where('user_id', $id);
        $this->db->update('mysteryShopperUsers', $data);
     
	}
	function rest_user_password($userID,$data)
	{
	$this->db->where('user_id', $userID);
	
        $this->db->update('mysteryShopperUsers', $data);
     
	}
	
	
	public function deleteuser($id)
	{
		$this->db->where('user_id', $id);
        	$this->db->delete('mysteryShopperUsers');
	}
	
}

?>
