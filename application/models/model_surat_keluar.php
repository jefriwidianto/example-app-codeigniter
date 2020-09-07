<?php
	//File products_model.php
	class Model_surat_keluar extends CI_Model  {
	 

	function getAllsuratkeluar() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("tr_surat_keluar");
	 
		return $this->db->get();
	}

	function getCode() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->select_max("no_surat_keluar");
		$this->db->from("tr_surat_keluar");
	 
		return $this->db->get();
	}

	function getnosurat($id_surat_keluar) 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
	 	$this->db->select("no_surat_keluar");
	 	$this->db->from("tr_surat_keluar");
	 	$this->db->where('id_surat_keluar', $id_surat_keluar);
		return $this->db->get()->result();
	}

	function getnama($id_surat_keluar) 
	{
		// Variable pendukung query	
	
		$this->db->select(" a.no_surat_keluar as no_surat_keluar, b.*",FALSE);
		$this->db->from('tr_surat_keluar a');
		$this->db->join('ref_user b', 'a.id_user = b.id_user','inner');
		$this->db->where('a.id_surat_keluar', $id_surat_keluar);
		
		return $this->db->get()->result();
	}	

	public function view_pdf($id_surat_keluar)
	{
		$this->db->select(" a.*, b.*",FALSE);
		$this->db->from('tr_surat_keluar a');
		$this->db->join('ref_user b', 'a.id_user = b.id_user','inner');
		$this->db->where('a.id_surat_keluar', $id_surat_keluar); 
		return $this->db->get();
  	}
	
	function getAlldis() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("tr_dis");
	 
		return $this->db->get();
	}

    function Insertsuratkeluar($data) 
    {
    	$this->db->insert('tr_surat_keluar', $data);
    }

    function Insertt_chart($data1) 
    {
    	$this->db->insert('t_chart', $data1);
    }
	
	 function Insertdisposisi($data) 
    {
    	$this->db->insert('tr_dis', $data);
    }

     function Deletesuratkeluar($id_surat_keluar) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_surat_keluar', $id_surat_keluar);
		$this->db->delete('tr_surat_keluar');
	}

	function Deletet_chart($id_surat_keluar) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_surat', $id_surat_keluar);
		$this->db->delete('t_chart');
	}
	
	function getAllsurat_keluarselect($id_surat_keluar) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("tr_surat_keluar");
	
		$this->db->where('id_surat_keluar', $id_surat_keluar); 
		return $this->db->get();
	}

	 function Updatesuratkeluar($id_surat_keluar, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_surat_keluar', $id_surat_keluar);
		$this->db->update('tr_surat_keluar', $data);
	}

	}
