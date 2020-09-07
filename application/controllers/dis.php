<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dis extends CI_Controller {
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
		$data['listdis'] = $this->model_surat_masuk->getAlldis();
		$this->load->view('dis/index', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}
	


}