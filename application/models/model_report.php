<?php
	//File products_model.php
	class Model_report extends CI_Model  {


	function getallreport($tglawal, $tglakhir) 
	{
		// Variable pendukung query	
		
		//select semua data yang ada pada table
		$query = $this->db->query("SELECT
										date_format(a.c_date,'%M') AS c_date,
										COUNT(b.id_surat_keluar)AS total1,
										COUNT(c.id_surat)AS total2
									FROM
										t_chart a LEFT 
										JOIN tr_surat_keluar b ON a.id_surat = b.id_surat_keluar LEFT
										JOIN tr_surat_masuk c ON a.id_surat = c.id_surat
									GROUP BY
										MONTH(a.c_date)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	function getalllog($tglawal, $tglakhir) 
	{
		// Variable pendukung query	
		
		//select semua data yang ada pada table
		$this->db->select(" a.keterangan, date_format(a.c_date, '%M') as c_date, count(b.id_surat_keluar) as total1, count(c.id_surat) as total2",FALSE);
		$this->db->from('t_chart a');
		$this->db->join('tr_surat_keluar b', 'a.id_surat = b.id_surat_keluar','left');
		$this->db->join('tr_surat_masuk c', 'a.id_surat = c.id_surat','left');
		$this->db->where("a.c_date >=", $tglawal." 00:00:00");
		$this->db->where("a.c_date <=", $tglakhir." 23:59:59");
		//$this->db->or_where("a.keterangan <=", $jenis."");
		$this->db->group_by('MONTH(a.c_date)'); 

	
	 	
	 	
		return $this->db->get();
	}

	function reportall() 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->distinct();
		$this->db->SELECT('keterangan');
		$this->db->from("t_chart");
	 
		return $this->db->get();
	}


	function surat_keluar($tglawal, $tglakhir) 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table
		
		$this->db->from("tr_surat_keluar");
		$this->db->where("cdate >=", $tglawal." 00:00:00");
		$this->db->where("cdate <=", $tglakhir." 23:59:59");
		
	 
		return $this->db->get();
	}

	function surat_masuk($tglawal, $tglakhir) 
	{
		// Variable pendukung query	
	
		//select semua data yang ada pada table

		$this->db->from("tr_surat_masuk");
		$this->db->where("cdate >=", $tglawal." 00:00:00");
		$this->db->where("cdate <=", $tglakhir." 23:59:59");
	 
		return $this->db->get();
	}


	

	
}
