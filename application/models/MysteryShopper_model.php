<?php
/**
* 
*/
class MysteryShopper_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

public function getAll()
{
	$query = $this->db->get('mysteryShopper');
	$result= $query->result_array();
	return $result;
}

public function all_shopper()
{

		$this->db->select('*');
		$this->db->from('mysteryShopperUsers');
		$this->db->where('user_type', 'MYSTERYSHOPPER');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	
}
function add($data)
	{ 
		//$sql = $this->db->query("Select * from nww_client");

		$sql=$this->db->insert('mysteryShopper',$data);

		
	}

	public function update_ratting($id,$data)
	{
		$this->db->where('user_id', $id);
        $this->db->update('mysteryShopper', $data);
		
	}
	
	function searchMysteryShopperUser($user_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function searchMysteryShopper($mysteryShopper_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper');
		$this->db->where('mysteryShopper_id', $mysteryShopper_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	// function getdetail($client_name)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('mysteryShopper');
	// 	$this->db->where('mysteryShopper_id', $client_name);
	// 	$query = $this->db->get();
	// 	$result = $query->result();
	// 	return $result;
	// }

	function update($id,$data)
	{
		   $this->db->where('mysteryShopper_id', $id);
        $this->db->update('mysteryShopper', $data);
     
	}

	public function deleteMysteryShopper($id)
	{
		$this->db->where('mysteryShopper_id', $id);
        $this->db->delete('mysteryShopper');
	}

}

?>