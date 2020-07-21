<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplicant extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
         $model=array("M_home","My_model","Nata_hris_hr_model");
		$this->load->model($model);
        $helper=array("form","url");
        $this->load->helper($helper);
        $lib=array("session","form_validation");
        $this->load->library($lib);
	}

	public function index()
	{	
		if($this->session->userdata('user_type')==5 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){
 				$data['menuId']=array(64);
 				$data['content'] = 'hr/Dashboard';
 				$this->load->view('index',$data);
 			}else if($this->session->userdata('user_type')==5){
 				$data['menuId']=array(3,106);
 				redirect("Aplicant/recruitment");
 			}else{
 				redirect("home/login");	
 			}
 		}else{
			redirect("home/login");	
		}
	}
	public function recruitment()
	{	
		if($this->session->userdata('user_type')==5 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){
 				$data['menuId']=array(64);
 				$data['content'] = 'hr/Dashboard';
 				$this->load->view('index',$data);
 			}else if($this->session->userdata('user_type')==5){
 				//$data['menuId']=array(3);
 				$data['menuId']=array(3,106);
 				$data['content'] = 'aplicant/recruitment';

 				$wh1=array();
	            if($this->input->post('id_loker')!=""){
	                $wh1['a.id_master_jenis_project']=$this->input->post('id_loker');
	            }
	            $wh2=array();
	            if($this->input->post('id_lokasi')!=""){
	                $wh2['a.id_lokasi']=$this->input->post('id_lokasi');
	            }

 				// $id_pelamar=$this->session->userdata('id_pelamar');
 				// $data['datalokerpelamar'] = $this->My_model->dataLokerPelamar($id_pelamar)->row();
 				$wh=array('a.id_master_jenis_project >'=>'0');
 				$data['dataloker']=$this->My_model->dataLoker($wh,$wh1,$wh2);
 				$data['datalokasi'] = $this->Nata_hris_hr_model->dataLokasi();
 				$data['datajabatan']=$this->My_model->dataJabatan();
 				$data['datapekerjaan']=$this->Nata_hris_hr_model->dataPekerjaan();
 				$this->load->view('index',$data);
 			}else{
 				redirect("home/login");	
 			}
 		}else{
			redirect("home/login");	
		}
	}
	public function jadwal()
	{	
		if($this->session->userdata('user_type')==5 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){
 				$data['menuId']=array(64);
 				$data['content'] = 'hr/Dashboard';
 				$this->load->view('index',$data);
 			}else if($this->session->userdata('user_type')==5){
 				//$data['menuId']=array(3);
 				$data['menuId']=array(3,107);
 				$id_pelamar=$this->session->userdata('id_pelamar');
 				$data['datalokerpelamarall'] = $this->My_model->dataLokerPelamar($id_pelamar);
 				$data['datalokerpelamar'] = $this->My_model->dataLokerPelamar($id_pelamar)->row();
 				$data['datajadwallokerpelamar'] = $this->My_model->dataJadwalLokerPelamar($data['datalokerpelamar']->id_loker);
 				$data['content'] = 'aplicant/jadwal';
 				$this->load->view('index',$data);
 			}else{
 				redirect("home/login");	
 			}
 		}else{
			redirect("home/login");	
		}
	}
	public function tambahpelamar(){
		$data = array(
			'id_loker' => $this->input->post('id_loker'),
			'id_pelamar' =>$this->session->userdata('id_pelamar')
		);

		$this->My_model->insert($data);

		redirect('Aplicant/recruitment');
	}
	
	public function settings()
	{	
		if($this->session->userdata('user_type')==5 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(108);
				$id_pelamar=$this->session->userdata('id_pelamar');
 				$data['datatrxuserpelamar'] = $this->My_model->dataTrxUserPelamar($id_pelamar)->row();
 				$data['content'] = 'aplicant/settings';
 				$this->load->view('index',$data);
 		}else{
			redirect("home/login");	
		}
	}

	
}
