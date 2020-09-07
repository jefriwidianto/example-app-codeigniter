<?php
	//File products_model.php
	class Model_home extends CI_Model  {
	
	
	function getAlldevice() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from('v_chart_log');
		
	 
		return $this->db->get();
	}


	function getAlltemp1() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$query1 = $this->db->query("SELECT
	date_format(a.c_date,'%M') AS c_date,
	COUNT(b.id_surat_keluar)AS total1,
	COUNT(c.id_surat)AS total2
FROM
	t_chart a LEFT 
	JOIN tr_surat_keluar b ON a.id_surat = b.id_surat_keluar LEFT
	JOIN tr_surat_masuk c ON a.id_surat = c.id_surat
GROUP BY
	MONTH(a.c_date)");
         
        if($query1->num_rows() > 0){
            foreach($query1->result() as $data){
                $hasil1[] = $data;
            }
            return $hasil1;
        }
	}
	
	function getAlltemp() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$query = $this->db->query("SELECT date_format(cdate,'%M') AS month, COUNT(id_surat_keluar) AS count FROM tr_surat_keluar WHERE MONTH(cdate) <= MONTH(CURRENT_DATE) GROUP BY month");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}
	
	function getAllasap() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from('v_chart_asap');
		
	 
		return $this->db->get();
	}
	function getAllhumidity() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from('v_chart_humidity');
		
	 
		return $this->db->get();
	}
	
	

	}
