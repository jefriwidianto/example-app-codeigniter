<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class surat_masuk extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_surat_masuk");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		//$data['combobox_kompetensi'] = $this->model_surat_masuk->combobox_kompetensi();
		$data['listsurat_masuk'] = $this->model_surat_masuk->getAllsuratmasuk();
		$this->load->view('surat_masuk/index', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}
	
	Public function Insert() 
	{
		if($this->session->userdata('login'))
        {
		//insert semua data yang ada pada table
		$data = array(
		//'id_kompetensi' => $this->input->post ('id_kompetensi'),
   		'no_surat' => $this->input->post ('no_surat'),
		'id_user' => $this->input->post('id_user'),
		'intansi' => $this->input->post('intansi'),
		'cdate' => $this->input->post('cdate'),
		'hal' => $this->input->post('hal'),
		'tujukan' => $this->input->post('tujukan'),
		'keterangan' => $this->input->post('keterangan')
   		//'status' => $this->input->post ('status')	
		);	
		$this->model_surat_masuk->Insertsuratmasuk($data);

		$data1 = array(
		'id_surat' => $this->db->insert_id(),
   		'no_surat' => $this->input->post ('no_surat'),
   		'c_date' => $this->input->post('cdate'),
		'keterangan' => 'Surat Masuk'
		);	
		$this->model_surat_masuk->Insertt_chart($data1);

		redirect('surat_masuk');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	} 

	
	Public function Insert_disposisi() 
	{
		if($this->session->userdata('login'))
        {
		//insert semua data yang ada pada table
		$data = array(
		//'id_kompetensi' => $this->input->post ('id_kompetensi'),
   		'id_surat' => $this->input->post ('id_surat'),
		'alasan' => $this->input->post('alasan'),
		'note' => $this->input->post('note'),
		'tujukan' => $this->input->post('tujukan')
		//'keterangan' => $this->input->post('keterangan')
   		//'status' => $this->input->post ('status')	
		);	
		$this->model_surat_masuk->Insertdisposisi($data);
	
		redirect('surat_masuk');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function Delete($id_surat) 
	{
		if($this->session->userdata('login'))
        {
		//delete data yang ada pada table
		$this->model_surat_masuk->Deletesuratmasuk($id_surat);
		$this->model_surat_masuk->Deletet_chart($id_surat);
		redirect('surat_masuk');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_surat) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['listsurat_masukselect'] = $this->model_surat_masuk->getAllsurat_masukselect($id_surat);
		$this->load->view('surat_masuk/update', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function disposisi($id_surat) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['listsurat_masukselect'] = $this->model_surat_masuk->getAllsurat_masukselect($id_surat);
		$this->load->view('surat_masuk/form_disposisi', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Update() 
	{
		if($this->session->userdata('login'))
        {
		$id_surat = $this->input->post ('id_surat');
		$data = array(
		
   		'no_surat' => $this->input->post ('no_surat'),
		'id_user' => $this->input->post('id_user'),
		'intansi' => $this->input->post('intansi'),
		'hal' => $this->input->post('hal'),
		'tujukan' => $this->input->post('tujukan'),
		'keterangan' => $this->input->post('keterangan'),
		'status' => $this->input->post ('status')		
		);	
		$this->model_surat_masuk->Updatesuratmasuk($id_surat, $data);
		redirect('surat_masuk');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}


}