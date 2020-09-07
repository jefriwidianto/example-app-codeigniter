<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("model_menu");
		$this->load->helper(array('form', 'url', 'download'));
	}

		public function index($id_surat)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['session_level'] = $session['id_level'];
        $data['id_user'] = $session['id_user'];

        $data['id_surat'] = $id_surat;
		$this->load->view('surat_masuk/contoh_upload', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}
	
	
	
	public function u_team($id_team)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['nm_user_last'] = $session['nm_user_last'];
        $data['session_level'] = $session['id_level'];
        $data['id_user'] = $session['id_user'];

        $data['id_team'] = $id_team;
		$this->load->view('team/contoh_upload', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}


	function do_upload()
	{
		$config['upload_path'] = 'uploads/gambar';
		$config['allowed_types'] = 'jpg|png|pdf';
		$config['max_size']	= '10000';
		$config['max_width']  = '10000';
		$config['max_height']  = '10000';
		$session = $this->session->userdata('login');
		$type = "S";
		$id_surat = $this->input->post('id_surat');
		$config['file_name']  = $type.$id_surat;
		$config['overwrite']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo "<script type='text/javascript'>alert('upload failed');window.history.back();</script>";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			redirect('surat_masuk');
		}
	}

	public function lakukan_download($id_surat){
		$type = "S";
		$id = $this->input->post('id_surat');
		$config  = $type.$id_surat;				
		//$path = file_get_contents(site_url().'uploads/gambar');
		$file_name = $config.'.jpg';
		$path = 'uploads/gambar/'.$file_name;

		if (file_exists($path)) {
			header('Content-Type: image/jpeg');
    		header("Content-Transfer-Encoding: Binary"); 
    		header("Content-disposition: attachment; filename=\"" . basename($file_name) . "\""); 
    		readfile($path);
		}
		else{
			echo 'file not found';
		}

		//redirect('surat_masuk');
	}	
	
	function dokumen()
	{
		$config['upload_path'] = 'uploads/dokumen';
		$config['allowed_types'] = 'zip|rar';
		$config['max_size']	= '1000000';
		/* $config['max_width']  = '1000000';
		$config['max_height']  = '10000'; */
		$session = $this->session->userdata('login');
		$type = "DOC";
		$id_pengajuan = $this->input->post('id_pengajuan');
		$config['file_name']  = $type.$id_pengajuan;
		$config['overwrite']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			echo "<script type='text/javascript'>alert('upload failed');window.history.back();</script>";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			redirect('home');
		}
	}
	
	function team_upload()
	{
		$config['upload_path'] = 'uploads/gambar';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '10000';
		$config['max_width']  = '10000';
		$config['max_height']  = '10000';
		$session = $this->session->userdata('login');
		$type = "T";
		$id_team = $this->input->post('id_team');
		$config['file_name']  = $type.$id_team;
		$config['overwrite']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->team_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo "<script type='text/javascript'>alert('upload failed');window.history.back();</script>";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			redirect('team');
		}
	}

}
?>