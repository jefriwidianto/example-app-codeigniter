<?php
	//File products_model.php
	class Model_kompetensi extends CI_Model  {
	

	function getAllkompetensi() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("tr_kompetensi");
	 
		return $this->db->get();
	}

    function Insertkompetensi($data) 
    {
    	$this->db->insert('tr_kompetensi', $data);
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
