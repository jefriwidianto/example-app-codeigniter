<?php
	//File products_model.php
	class Model_usser extends CI_Model  {


	function getAllUsser() 
	{
		// Variable pendukung query	
		$this->db->select('a.id_user, a.nm_user, a.username, a.password, d.id_level, d.nm_level as nm_level, a.active');
		$this->db->from('ref_user a');
		$this->db->join('ref_level d','a.id_level = d.id_level');
		//select semua data yang ada pada table
		
	 
		return $this->db->get();
	}

	


	function combobox_level() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_level");
	 
		return $this->db->get();
	}


    function InsertUsser($data) 
    {
    	$this->db->insert('tr_coba', $data);
    }

	
	
     function DeletetUser($id_user) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_user', $id_user);
		$this->db->delete('ref_user');
	}
	
	function getAllUserselect($id_user) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_user");
	
		$this->db->where('id_user', $id_user); 
		return $this->db->get();
	}

	 function UpdateUser($id_user, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_user', $id_user);
		$this->db->update('ref_user', $data);
	}


}
