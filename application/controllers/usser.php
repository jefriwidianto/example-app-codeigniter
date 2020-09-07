<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usser extends CI_Controller {
	
	 function __construct(){
        parent::__construct();
        $this->load->model("model_usser");
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
		
		
		$data['combobox_level'] = $this->model_usser->combobox_level();
		$data['listuser'] = $this->model_usser->getAllUsser();
		$this->load->view('usser/index', $data);
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
		'id_coba' => $this->input->post ('id_coba'),
   		'nm_coba' => $this->input->post ('nm_coba')
		);
		$this->model_usser->Insertusser($data);

		redirect('usser');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	

	Public function Delete($id_coba) 
	{
		if($this->session->userdata('login'))
        {
		//delete data yang ada pada table
		$this->model_user->DeletetUser($id_user);
		redirect('user');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_user) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		
		$data['combobox_level'] = $this->model_user->combobox_level();
		$data['listuserselect'] = $this->model_user->getAllUserselect($id_user);
		$this->load->view('user/update', $data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}

	Public function Update() 
	{
		if($this->session->userdata('login'))
        {
		$id_user = $this->input->post ('id_user');
		$data = array(
		
   		'id_user' => $this->input->post ('id_user'),
   		'username' => $this->input->post ('username'),
   		'password' => $this->input->post ('password'),
   		
   		'id_level' => $this->input->post ('id_level'),
   		'active' => $this->input->post ('active')	
		);	
		$this->model_user->UpdateUser($id_user, $data);
		redirect('user');
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}


}