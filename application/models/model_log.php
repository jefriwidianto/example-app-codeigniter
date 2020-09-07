<?php
	//File products_model.php
	class Model_log extends CI_Model  {
	

	function getAlllog() 
	{
		// Variable pendukung query	
		$this->db->select('a.id_log, a.mac_address, a.temp, a.humidity, a.asap, a.time, c.nm_device as nm_device, c.mac_address, c.min_temp, c.max_temp, c.min_asap, c.max_asap, c.min_humidity, c.max_humidity');
		//select semua data yang ada pada table
		$this->db->from("log a");
		$this->db->join('m_device c','a.mac_address = c.mac_address');
	 
		return $this->db->get();
	}

	}
