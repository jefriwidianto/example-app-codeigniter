<?php
	//File products_model.php
	class Model_surat_masuk extends CI_Model  {
	 

	function getAllsuratmasuk() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("tr_surat_masuk");
	 
		return $this->db->get();
	}
	
	function getAlldis() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("tr_dis");
	 
		return $this->db->get();
	}

    function Insertsuratmasuk($data) 
    {
    	$this->db->insert('tr_surat_masuk', $data);
    }

    function Insertt_chart($data1) 
    {
    	$this->db->insert('t_chart', $data1);
    }
	
	 function Insertdisposisi($data) 
    {
    	$this->db->insert('tr_dis', $data);
    }

     function Deletesuratmasuk($id_surat) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_surat', $id_surat);
		$this->db->delete('tr_surat_masuk');
	}

	function Deletet_chart($id_surat_keluar) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_surat', $id_surat);
		$this->db->delete('t_chart');
	}
	
	function getAllsurat_masukselect($id_surat) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("tr_surat_masuk");
	
		$this->db->where('id_surat', $id_surat); 
		return $this->db->get();
	}

	 function Updatesuratmasuk($id_surat, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_surat', $id_surat);
		$this->db->update('tr_surat_masuk', $data);
	}

	}
