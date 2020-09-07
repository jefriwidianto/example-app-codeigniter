<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class grafik extends CI_Controller {
	 function __construct(){
        parent::__construct();
      $this->load->model("model_menu");
      $this->load->model("model_grafik");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['nm_user_last'] = $session['nm_user_last'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['bus'] = $this->model_grafik->getAllbus();
		$data['motor'] = $this->model_grafik->getAllmotor();
		$data['elf'] = $this->model_grafik->getAllelf();
		$data['mobil'] = $this->model_grafik->getAllmobil();
		//$data['grafikperawatanservice'] = $this->model_grafik->getAllgrafikservice();
		$this->load->view('laporan/laporan_grafik', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}
	
	public function service()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['nm_user_last'] = $session['nm_user_last'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['sbus'] = $this->model_grafik->getAllbuss();
		$data['smotor'] = $this->model_grafik->getAllmotors();
		$data['self'] = $this->model_grafik->getAllelfs();
		$data['smobil'] = $this->model_grafik->getAllmobils();
		//$data['grafikperawatanservice'] = $this->model_grafik->getAllgrafikservice();
		$this->load->view('laporan/laporan_grafiks', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}
	
	


}