<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class surat_keluar extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_surat_masuk");
        $this->load->model("model_menu");
        $this->load->helper(array('form', 'url', 'download'));
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
	
		public function lakukan_download($id_surat){
		$data['listsurat_masukselect'] = $this->model_surat_masuk->getAllsurat_masukselect($id_surat);
		// $type = "S";
		// //$id_surat = $this->input->post('id_surat');
		// //print_r($id_surat);die();
		// $config['file_name']  = $type.$id_surat;				
		// $path = file_get_contents('uploads/gambar/'.$id_surat.".jpg");
		// print_r($id_surat);die();

		// force_download($path);

		//redirect('surat_masuk');
	}

}

