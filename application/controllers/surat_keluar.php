<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class surat_keluar extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_surat_keluar");
        $this->load->model("model_menu");
        $this->load->helper('url');
        $this->load->library(array('CKEditor'));
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        //print_r($session);die();
		//$data['combobox_kompetensi'] = $this->model_surat_masuk->combobox_kompetensi();
		$data['listsurat_keluar'] = $this->model_surat_keluar->getAllsuratkeluar();
		$data['codesurat_keluar'] = $this->model_surat_keluar->getCode();

		$width = '100%';
        $height = '500px';
        $this->editor($width,$height);

		$this->load->view('surat_keluar/index', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}

	Public function editor($width,$height) 
	{
	    //configure base path of ckeditor folder
	    $this->ckeditor->basePath = base_url().'assets/ckeditor/';
	    $this->ckeditor-> config['toolbar'] = 'Full';
	    $this->ckeditor->config['language'] = 'en';
	    $this->ckeditor-> config['width'] = $width;
	    $this->ckeditor-> config['height'] = $height;
  	}

	
	Public function Insert() 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		//insert semua data yang ada pada table
		$data = array(
		//'id_kompetensi' => $this->input->post ('id_kompetensi'),
   		'no_surat_keluar' => $this->input->post ('no_surat_keluar'),
		'id_user' => $this->input->post('id_user'),
		'atas_nama' => $this->input->post('atas_nama'),
		'hal' => $this->input->post('hal'),
		'isi_surat' => $this->input->post('isi_surat'),
		'cdate' => $this->input->post('cdate'),
		'keterangan' => $this->input->post('keterangan'),
		'prodi' => $this->input->post('prodi'),
		'id_user' => $session['id_user']
		);//print_r($data);die();	
		$this->model_surat_keluar->Insertsuratkeluar($data);

		$data1 = array(
		'id_surat' => $this->db->insert_id(),
   		'no_surat' => $this->input->post ('no_surat_keluar'),
   		'c_date' => $this->input->post('cdate'),
		'keterangan' => 'Surat Keluar'
		);	
		$this->model_surat_keluar->Insertt_chart($data1);

		redirect('surat_keluar');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	} 

	public function cetak($id_surat_keluar){
    	ob_start();
    
		$data['siswa'] = $this->model_surat_keluar->view_pdf($id_surat_keluar);
		$nama = $this->model_surat_keluar->getnosurat($id_surat_keluar);
		
		$this->load->view('surat_keluar/print', $data);
    	$html = ob_get_contents();
    	ob_end_clean(); 
    
        //print_r($nama);die();
        
	    require_once('./assets/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output('"'.$nama[0]->no_surat_keluar.'".pdf', '');
	}

	
	// Public function Insert_disposisi() 
	// {
	// 	if($this->session->userdata('login'))
 //        {
	// 	//insert semua data yang ada pada table
	// 	$data = array(
	// 	//'id_kompetensi' => $this->input->post ('id_kompetensi'),
 //   		'id_surat' => $this->input->post ('id_surat'),
	// 	'alasan' => $this->input->post('alasan'),
	// 	'note' => $this->input->post('note'),
	// 	'tujukan' => $this->input->post('tujukan')
	// 	//'keterangan' => $this->input->post('keterangan')
 //   		//'status' => $this->input->post ('status')	
	// 	);	
	// 	$this->model_surat_masuk->Insertdisposisi($data);
	
	// 	redirect('surat_masuk');
	// 	}else{
	// 	redirect('welcome/relogin','refresh');	
	// 	}
	// }
	
	Public function Delete($id_surat_keluar) 
	{
		if($this->session->userdata('login'))
        {
		//delete data yang ada pada table
		$this->model_surat_keluar->Deletesuratkeluar($id_surat_keluar);
		$this->model_surat_keluar->Deletet_chart($id_surat_keluar);
		redirect('surat_keluar');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_surat_keluar) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['listsurat_keluarselect'] = $this->model_surat_keluar->getAllsurat_keluarselect($id_surat_keluar);
		$this->load->view('surat_keluar/update', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	// Public function disposisi($id_surat) 
	// {
	// 	if($this->session->userdata('login'))
 //        {
	// 	$session = $this->session->userdata('login');
 //        $data['id_user'] = $session['id_user'];
 //        $data['session_level'] = $session['id_level'];
	// 	$data['listsurat_masukselect'] = $this->model_surat_masuk->getAllsurat_masukselect($id_surat);
	// 	$this->load->view('surat_masuk/form_disposisi', $data);
	// 	}else{
	// 	redirect('welcome/relogin','refresh');	
	// 	}
	// }

	Public function Update() 
	{
		if($this->session->userdata('login'))
        {
		$id_surat_keluar = $this->input->post ('id_surat_keluar');
		$data = array(
		
   		'no_surat_keluar' => $this->input->post ('no_surat_keluar'),
		'hal' => $this->input->post('hal'),
		'isi_surat' => $this->input->post('isi_surat'),
		'keterangan' => $this->input->post('keterangan'),
		'atas_nama' => $this->input->post('atas_nama'),
   		'status' => $this->input->post ('status')	
		);	
		//print_r($data);die();
		$this->model_surat_keluar->Updatesuratkeluar($id_surat_keluar, $data);
		redirect('surat_keluar');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}


}