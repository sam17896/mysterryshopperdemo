<?php

Class Main_model extends CI_Model {
 

	function can_login($username,$password,$type)
	{
		$this->db->where('user_name',$username);
		$this->db->where('user_password',$password);
		$this->db->where('user_type',$type);

		$query= $this->db->get('mysteryShopperUsers');
		 //echo $query->num_rows();
		if($query->num_rows()==0)
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}
	
	public function getAll($username)
{
        $this->db->where('user_name',$username);
	$query = $this->db->get('mysteryShopperUsers');
	$result= $query->row();
	return $result;
}



	function loginViaEmail($useremail,$password,$type)
	{
		$this->db->where('user_email',$useremail);
		$this->db->where('user_password',$password);
		$this->db->where('user_type',$type);

		$query= $this->db->get('mysteryShopperUsers');
		 //echo $query->num_rows();
		if($query->num_rows()==0)
		{
			return false;
		}
		else
		{
			return $query->row();
		}
	}
}

?>
