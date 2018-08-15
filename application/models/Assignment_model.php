<?php

Class Assignment_model extends CI_Model {


	function get_all()
	{ 
		//$sql = $this->db->query("Select * from nww_client");

		$sql=$this->db->get('mysteryShopper_assignment');
		$result = $sql->result_array();
		return $result;

		
	}
	function complete_assignment_review($id)
	{
		$this->db->select('*');
		$this->db->from('mystery_shopper_review');
		$this->db->where('mysteryShopper_assignment_id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	function complete_assignment_delivery_review($id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_online_review');
		$this->db->where('mysteryShopper_assignment_id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	
        function get_all_client_assignments($client_id)
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_client_id', $client_id);
		$this->db->where('mysteryShopper_assignment_status', 'Accept');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function AssignmentReview($data)
	{

		$sql=$this->db->insert('mystery_shopper_review',$data);
		
	}
	
	public function DeliveryAssignmentReview($data)
	{

		$sql=$this->db->insert('mysteryShopper_online_review',$data);
		
	}

	function get_all_pending()
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_status', 'Working');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	function get_all_Accept()
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_status', 'Accept');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function get_all_Expired()
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_status', 'Expired');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function get_all_Reject()
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_status', 'Reject');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	function get_all_complete()
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_status', 'Completed');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	function get_all_open_status()
	{ 
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_status', 'Open');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;

		
	}
	
	function get_all_edit($id)
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_status', 'Edit');
		$this->db->where('mysteryShopper_id', $id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function get_all_review()
	{ 
		
		$this->db->select('*');
		$this->db->from('mystery_shopper_review');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function get_all_review_delivery()
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_online_review');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function edit_searchnm($review_id)
	{
		$this->db->select('*');
		$this->db->from('mystery_shopper_review');
		$this->db->where('review_id', $review_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function edit_searchnm_delivery($review_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_online_review');
		$this->db->where('online_review_id', $review_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	
	
	
	

	function user_pending_assignments($id)
	{ 
		
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_id', $id);
		$this->db->where('mysteryShopper_assignment_status', 'Working');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	function add($data)
	{ 
		//$sql = $this->db->query("Select * from nww_client");

		$sql=$this->db->insert('mysteryShopper_assignment',$data);

		
	}

	function searchnm($client_id)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_id', $client_id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function getdetail($client_name)
	{
		$this->db->select('*');
		$this->db->from('mysteryShopper_assignment');
		$this->db->where('mysteryShopper_assignment_id', $client_name);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function update($id,$data)
	{
		   $this->db->where('mysteryShopper_assignment_id', $id);
        $this->db->update('mysteryShopper_assignment', $data);
     
	}
	function updateStatus($id,$data)
	{
		   $this->db->where('mysteryShopper_client_id', $id);
        $this->db->update('mysteryShopper_assignment', $data);
     
	}
	function del($id)
	{
		
		$this->db->where('mysteryShopper_assignment_id' , $id);
		$this->db->delete('mysteryShopper_assignment');
	}
	function review_update($id,$data)
	{
		   $this->db->where('review_id', $id);
        $this->db->update('mystery_shopper_review', $data);
     
	}
	function review_update_delivery($id,$data)
	{
		   $this->db->where('online_review_id', $id);
        $this->db->update('mysteryShopper_online_review', $data);
     
	}
}

?>
