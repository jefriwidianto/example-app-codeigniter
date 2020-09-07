<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	 function __construct(){
        parent::__construct();
      $this->load->model("model_menu");
	  $this->load->model("model_home");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        $data['report'] = $this->model_home->getAlltemp();
        $data['report1'] = $this->model_home->getAlltemp1();
        //$data['report2'] = $this->model_home->getAlltemp2();
        //$data['report3'] = $this->model_home->getAlltemp3();
        //print_r($data['report1']);die();
		
		
		$this->load->view('home', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}
	
	function sendmail()
  {
      $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'integratedsensor@gmail.com', // change it to yours
      'smtp_pass' => 'GTIMERAHPUTIH', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

          $message = 'Hallo Sir.....<br />
						Telah Berhasil Input Device Sensor <br />
							Thank you';
          $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('integratedsensor@gmail.com'); // change it to yours
        $this->email->to('coolsay7@gmail.com');// change it to yours
        $this->email->subject('Insert Reporting');
        $this->email->message($message);
        if($this->email->send())
       {
        echo 'Email sent.';
       }
       else
      {
       show_error($this->email->print_debugger());
      }
	  
	redirect('device');
  }
	
	


}