<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_report");
       	$this->load->model("model_menu");
       	$this->load->helper('url');
       
    }
	
	public function index()
	{
		if($this->session->userdata('login'))
        {
		// session 
		    $session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		// session end

		// data grid
		
		$this->load->view('report/index',$data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}
	
	public function pdf()
	{
		if($this->session->userdata('login'))
        {
		// session 
		    $session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		// session end
        $data['combo'] = $this->model_report->reportall();
		// data grid
		
		$this->load->view('report/index2',$data);
		}else{
		redirect('welcome/relogin','refresh');	
		}
		
	}

    Public function excel() 
    {
		if($this->session->userdata('login'))
        {
		// session 
		    $session = $this->session->userdata('login');
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		// session end
        $tglawal = $this->input->post ('tglawal');
        $tglakhir = $this->input->post ('tglakhir');

       
	    $ambildata = $this->model_report->getallreport($tglawal, $tglakhir);
	    // print_r($query);die();
	    // // $this->excel_generator->set_query($query);
	    // // $this->excel_generator->getActiveSheet()->setTitle('Users list');
	    // // $this->excel_generator->set_header(array('ID','Nama Device','Temp'));
	    // // $this->excel_generator->set_column(array("c_date","total1","total2"));
	    // //$this->excel_generator->set_width(array(20, 20, 20, 20, 20, 20));
	    // //$this->excel_generator->exportTo2003("Report".$tglawal."_".$tglakhir);
	    // $this->load->library('PHPExcel/PHPExcel');
	    // $objPHPExcel = new PHPExcel();
    	// //$objPHPExcel->getActiveSheet()->setTitle('detil');
    	// $objPHPExcel->setActiveSheetIndex(0)
     //                //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
     //                //Hello merupakan isinya
     //                                    ->setCellValue('A1', 'Hello')
     //                                    ->setCellValue('B2', $query[0]['c_date'])
     //                                    ->setCellValue('C1', 'Excel')
     //                                    ->setCellValue('D2', 'Pertamaku');
     //        //set title pada sheet (me rename nama sheet)
     //        $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');

     //        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

     //        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     //        header("Cache-Control: no-store, no-cache, must-revalidate");
     //        header("Cache-Control: post-check=0, pre-check=0", false);
     //        header("Pragma: no-cache");
     //        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     //        //ubah nama file saat diunduh
     //        header('Content-Disposition: attachment;filename="hasilExcel.xlsx"');
     //        //unduh file
     //        $objWriter->save("php://output");

	    if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  	->setCreator("Jefri Widianto") //creator
                    ->setTitle("*_*");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Sample Sheet'); //sheet title
             
            $objget->getStyle("A7:C7")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );
 
            //table header
            $cols = array("A","B","C");
             
            $val = array("Bulan","Surat Keluar","Surat Masuk");

            $objset->setCellValue('A1', 'LAPORAN DATA SURAT KELUAR DAN SURAT MASUK PERBULAN DI UNIVERSITAS PENDIDIKAN INDONESIA (UPI)')->mergeCells('A1:C5');
            $objPHPExcel->getActiveSheet()->getStyle('A1:C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
             
            for ($a=0;$a<3; $a++) 
            {
                $objset->setCellValue($cols[$a].'7', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'7')->applyFromArray($style);
            }
             
            $baris  = 8;
            foreach ($ambildata as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $frow->c_date); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->total1); //membaca data alamat
                $objset->setCellValue("C".$baris, $frow->total2); //membaca data kontak
                 
                //Set number value
                //$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;
            }
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Laporan Surat');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Laporan".$tglawal."-".$tglakhir.".xlsx");
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            //unduh file
            $objWriter->save("php://output");
        }else{
            redirect('Excel');
        }
    

	    }else{

		redirect('welcome/relogin','refresh');

		}
  	}

  	public function report_pdf()
    {
    	ob_start();
    
		$tglawal = $this->input->post ('tglawal');
    $tglakhir = $this->input->post ('tglakhir');
    $data['listreport'] = $this->model_report->getalllog($tglawal, $tglakhir);
    $data['suratkeluar'] = $this->model_report->surat_keluar($tglawal, $tglakhir);
    $data['suratmasuk'] = $this->model_report->surat_masuk($tglawal, $tglakhir);
		//$nama = $this->model_surat_keluar->getnosurat($id_surat_keluar);
		$this->load->view('report/hasil', $data);
    	$html = ob_get_contents();
    	ob_end_clean(); 
    
        //print_r($nama);die();
        
	    require_once('./assets/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output('Log_surat.pdf', '');
	     //$this->load->view('report_pelaporan/top_pelaporan', $data);
    }

}