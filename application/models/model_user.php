<?php
	//File products_model.php
	class Model_user extends CI_Model  {


	function getAllUser() 
	{
		// Variable pendukung query	
		$this->db->select('a.id_user as id_user, a.nik as nik, a.nm_user, a.username, a.password, a.id_corp, b.id_user AS ID, b.nm_user as atasan, c.id_corp, c.nm_corp, d.id_level, d.nm_level as nm_level, a.active');
		$this->db->from('ref_user a');
		$this->db->join('ref_level d','a.id_level = d.id_level','left');
				$this->db->join('ref_user b','a.atasan = b.id_user','left');
						$this->db->join('ref_corp c','a.id_corp = c.id_corp','left');
		//select semua data yang ada pada table
		
	 
		return $this->db->get();
	}
	
	function getAllUserscor($sessions) 
	{
		// Variable pendukung query	
		$this->db->select('a.id_user, a.nm_user, a.username, a.password, a.id_corp, b.id_user, b.nm_user as atasan, c.id_corp, c.nm_corp, d.id_level, d.nm_level as nm_level, a.active');
		$this->db->from('ref_user a');
		$this->db->join('ref_level d','a.id_level = d.id_level','left');
				$this->db->join('ref_user b','a.atasan = b.id_user','left');
						$this->db->join('ref_corp c','a.id_corp = c.id_corp','left');
						$this->db->where('a.atasan', $sessions);
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
	
	function combobox_jabatan() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_corp");
	 
		return $this->db->get();
	}
	
	function combobox_atasan() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_user");
	 
		return $this->db->get();
	}


    function InsertUser($data) 
    {
    	$this->db->insert('ref_user', $data);
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
