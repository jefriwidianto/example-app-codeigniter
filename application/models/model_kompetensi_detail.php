<?php
	//File products_model.php
	class model_kompetensi_detail extends CI_Model  {
	

	function getAllkompetensi_detail() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->select('a.id_kompetensi_detail, a.nm_kompetensi_detail, a.bobot, a.status, b.id_kompetensi, b.nm_kompetensi');
		$this->db->from("tr_kompetensi_detail a");
		$this->db->join('tr_kompetensi b','a.id_kompetensi = b.id_kompetensi');
	 
		return $this->db->get();
	}
	
	function getAllkompetensi_details($id) 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->select('a.id_kompetensi_detail, a.nm_kompetensi_detail, a.bobot, a.status, b.id_kompetensi, b.nm_kompetensi');
		$this->db->from("tr_kompetensi_detail a");
		$this->db->join('tr_kompetensi b','a.id_kompetensi = b.id_kompetensi');
		if($id == 0)
		{}
		else
		{ $this->db->where('b.id_kompetensi', $id); }
		return $this->db->get();
	}
	
	function combobox_kompetensi() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("tr_kompetensi");
	 
		return $this->db->get();
	}

    function Insertkompetensi_detail($data) 
    {
    	$this->db->insert('tr_kompetensi_detail', $data);
    }

     function Deletetkompetensi($id_kompetensi) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_kompetensi', $id_kompetensi);
		$this->db->delete('tr_kompetensi');
	}
	
	function getAllkompetensiselect($id_kompetensi) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("tr_kompetensi");
	
		$this->db->where('id_kompetensi', $id_kompetensi); 
		return $this->db->get();
	}

	 function Updatekompetensi($id_kompetensi, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_kompetensi', $id_kompetensi);
		$this->db->update('tr_kompetensi', $data);
	}

	}
