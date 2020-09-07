<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class kompetensi_Detail extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_kompetensi_detail");
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
		$data['combobox_kompetensi'] = $this->model_kompetensi_detail->combobox_kompetensi();
		$data['listkompetensi_detail'] = $this->model_kompetensi_detail->getAllkompetensi_detail();
		$this->load->view('kompetensi_detail/index', $data);
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
   		'nm_kompetensi_detail' => $this->input->post ('nm_kompetensi_detail'),
		'bobot' => $this->input->post('bobot'),
		'id_kompetensi' => $this->input->post('id_kompetensi'),
   		'status' => $this->input->post ('status')	
		);	
		$this->model_kompetensi_detail->Insertkompetensi_detail($data);

		redirect('kompetensi_detail');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($id_kompetensi) 
	{
		if($this->session->userdata('login'))
        {
		//delete data yang ada pada table
		$this->model_kompetensi->Deletekompetensi($id_kompetensi);
		redirect('kompetensi');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_kompetensi) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['listkompetensiselect'] = $this->model_kompetensi->getAllkompetensiselect($id_kompetensi);
		$this->load->view('kompetensi/update', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Update() 
	{
		if($this->session->userdata('login'))
        {
		$id_kompetensi = $this->input->post ('id_kompetensi');
		$data = array(
		
   		'nm_kompetensi' => $this->input->post ('nm_kompetensi'),
		'standarisasi' =>$this->input->post('standarisasi'),
		'status' => $this->input->post ('status')		
		);	
		$this->model_kompetensi->Updatekompetensi($id_kompetensi, $data);
		redirect('kompetensi');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}


}