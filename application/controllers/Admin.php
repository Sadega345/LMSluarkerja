<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
        $model=array("M_home","My_model","Admin_model");
		$this->load->model($model);
        $helper=array("form","url");
        $this->load->helper($helper);
        $lib=array("session","form_validation");
        $this->load->library($lib);
	}

	public function index()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){

 				$data['content'] = 'hr/Dashboard';
 				$this->load->view('index',$data);
 			}else if($this->session->userdata('user_type')==4){
 				$data['menuId']=array(64);
 				$data['content'] = 'Admin/Dashboard';
 				$this->load->view('index',$data);
 			}else{
 				redirect("home/login");	
 			}
 		}else{
			redirect("home/login");	
		}
	}
	public function mstAgama()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,69);
				$data['dt_mstAgama']=$this->Admin_model->dt_mstAgama();
				$data['content'] = 'Admin/mst_Agama/mst-agama';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstAgama()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,69);
				$data['content'] = 'Admin/mst_Agama/form_tambah_mst_agama';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahAgama()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_agama($data);
			echo "succes";
	}
	public function ubahAgama(){
		 $id=$this->uri->segment(3);
		 $data['dataAgama']=$this->Admin_model->data_mst_agama($id);
		 $data['content'] = 'Admin/mst_Agama/form_ubah_mst_agama';
         $this->load->view('index',$data);
	}
	public function prosesUbahAgama(){
    	 $id=$this->input->post('id_agama');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_agama($data,$id);
			echo "succes";
	}
	public function prosesHapusAgama()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusAgama($id);
	} 
			
	public function mstStatusNikah()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,70);
				$data['dt_mstStatusNikah']=$this->Admin_model->dt_mstStatusNikah();
				$data['content'] = 'Admin/mst_Status_Nikah/mst-status-nikah';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstStatusNikah()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,70);
				$data['content'] = 'Admin/mst_Status_Nikah/form_tambah_mst_status_nikah';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahStatusNikah()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_status_nikah($data);
			echo "succes";
	}
	public function ubahStatusNikah(){
		 $id=$this->uri->segment(3);
		 $data['dataStatusNikah']=$this->Admin_model->data_mst_status_nikah($id);
		 $data['content'] = 'Admin/mst_Status_Nikah/form_ubah_mst_status_nikah';
         $this->load->view('index',$data);
	}
	public function prosesUbahStatusNikah(){
    	 $id=$this->input->post('id_sts_nikah');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_status_nikah($data,$id);
			echo "succes";
	}
	public function prosesHapusStatusNikah()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusStatusNikah($id);
	}
	public function mstProvinsi()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,71);
				$data['dt_mstProvinsi']=$this->Admin_model->dt_mstProvinsi();
				$data['content'] = 'Admin/mst-provinsi';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function mstKabupaten()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,72);
				$data['dt_mstKabupaten']=$this->Admin_model->dt_mstKabupaten();
				$data['content'] = 'Admin/mst-kabupaten';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function mstKecamatan()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,73);
				$data['dt_mstKecamatan']=$this->Admin_model->dt_mstKecamatan();
				$data['content'] = 'Admin/mst-kecamatan';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function mstJabatan()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,74);
				$data['dt_mstJabatan']=$this->Admin_model->dt_mstJabatan();
				$data['content'] = 'Admin/mst_Jabatan/mst-jabatan';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstJabatan()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,74);
				$data['content'] = 'Admin/mst_Jabatan/form_tambah_mst_jabatan';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahJabatan()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi'),
					'keterangan' =>$this->input->post('keterangan')
				);
			$this->Admin_model->add_mst_jabatan($data);
			echo "succes";
	}
	public function ubahJabatan(){
		 $id=$this->uri->segment(3);
		 $data['dataJabatan']=$this->Admin_model->data_mst_jabatan($id);
		 $data['content'] = 'Admin/mst_Jabatan/form_ubah_mst_jabatan';
         $this->load->view('index',$data);
	}
	public function prosesUbahJabatan(){
    	 $id=$this->input->post('id_jabatan');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi'),
					'keterangan' =>$this->input->post('keterangan')
				);
			$this->Admin_model->ubah_jabatan($data,$id);
			echo "succes";
	}
	public function prosesHapusJabatan()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusJabatan($id);
	}
	public function mstDepartement()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,75);
				$data['dt_mstDepartement']=$this->Admin_model->dt_mstDepartement();
				$data['content'] = 'Admin/mst_Departement/mst-departement';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstDepartement()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,75);
				$data['content'] = 'Admin/mst_Departement/form_tambah_mst_departement';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahDepartement()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi'),
					'keterangan' =>$this->input->post('keterangan')
				);
			$this->Admin_model->add_mst_departement($data);
			echo "succes";
	}
	public function ubahDepartement(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,75);
				 $id=$this->uri->segment(3);
				 $data['dataDepartement']=$this->Admin_model->data_mst_departement($id);
				 $data['content'] = 'Admin/mst_Departement/form_ubah_mst_departement';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahDepartement(){
    	 $id=$this->input->post('id_departemen');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi'),
					'keterangan' =>$this->input->post('keterangan')
				);
			$this->Admin_model->ubah_departement($data,$id);
			echo "succes";
	}
	public function prosesHapusDepartement()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusDepartement($id);
	}
	public function mstStatusKerja()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,76);
				$data['dt_mstStatusKerja']=$this->Admin_model->dt_mstStatusKerja();
				$data['content'] = 'Admin/mst_Status_Kerja/mst-status-kerja';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstStatusKerja()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,76);
				$data['content'] = 'Admin/mst_Status_Kerja/form_tambah_mst_status_kerja';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function ubahMstStatusKerja(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,76);
				 $id=$this->uri->segment(3);
				 $data['dataMstStatusKerja']=$this->Admin_model->data_mst_status_kerja($id);
				 $data['content'] = 'Admin/mst_Status_Kerja/form_ubah_mst_status_kerja';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstStatusKerja(){
    	 $id=$this->input->post('id_sts_kerja');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_status_kerja($data,$id);
			echo "succes";
	}
	public function prosesTambahStatusKerja()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_status_kerja($data);
			echo "succes";
	}
	public function prosesHapusStatusKerja()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusStatusKerja($id);
	}
	public function mstSuku()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,77);
				$data['dt_mstSuku']=$this->Admin_model->dt_mstSuku();
				$data['content'] = 'Admin/mst_Suku/mst-suku';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstSuku()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,77);
				$data['content'] = 'Admin/mst_Suku/form_tambah_mst_suku';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahSuku()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_suku($data);
			echo "succes";
	}
	public function ubahMstSuku(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,77);
				 $id=$this->uri->segment(3);
				 $data['dataMstSuku']=$this->Admin_model->data_mst_suku($id);
				 $data['content'] = 'Admin/mst_Suku/form_ubah_mst_suku';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstSuku(){
    	 $id=$this->input->post('id_suku');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_suku($data,$id);
			echo "succes";
	}
	public function prosesHapusSuku()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusSuku($id);
	}
	public function mstPendidikan()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,78);
				$data['dt_mstPendidikan']=$this->Admin_model->dt_mstPendidikan();
				$data['content'] = 'Admin/mst_Pendidikan/mst-pendidikan';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstPendidikan()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,78);
				$data['content'] = 'Admin/mst_Pendidikan/form_tambah_mst_pendidikan';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahPendidikan()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_pendidikan($data);
			echo "succes";
	}
	public function ubahMstPendidikan(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,78);
				 $id=$this->uri->segment(3);
				 $data['dataMstPendidikan']=$this->Admin_model->data_mst_pendidikan($id);
				 $data['content'] = 'Admin/mst_Pendidikan/form_ubah_mst_pendidikan';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstPendidikan(){
    	 $id=$this->input->post('id_pendidikan');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_pendidikan($data,$id);
			echo "succes";
	}
	public function prosesHapusPendidikan()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusPendidikan($id);
	}
	public function mstBank()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,79);
				$data['dt_mstBank']=$this->Admin_model->dt_mstBank();
				$data['content'] = 'Admin/mst_Bank/mst-bank';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstBank()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,79);
				$data['content'] = 'Admin/mst_Bank/form_tambah_mst_bank';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahBank()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_bank($data);
			echo "succes";
	}
	public function ubahMstBank(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,79);
				 $id=$this->uri->segment(3);
				 $data['dataMstBank']=$this->Admin_model->data_mst_bank($id);
				 $data['content'] = 'Admin/mst_Bank/form_ubah_mst_bank';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstBank(){
    	 $id=$this->input->post('id_bank');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_bank($data,$id);
			echo "succes";
	}
	public function prosesHapusBank()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusBank($id);
	}
	public function mstLeaveKategori()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,80);
				$data['dt_mstLeaveKategori']=$this->Admin_model->dt_mstLeaveKategori();
				$data['content'] = 'Admin/mst_Leave_Kategori/mst-leave-kategori';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahmstLeaveKategori()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,80);
				$data['content'] = 'Admin/mst_Leave_Kategori/form_tambah_mst_leave_kategori';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahLeaveKategori()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_leave_kategori($data);
			echo "succes";
	}
	public function ubahMstLeaveKategori(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,80);
				 $id=$this->uri->segment(3);
				 $data['dataMstLeaveKategori']=$this->Admin_model->data_mst_leave_kategori($id);
				 $data['content'] = 'Admin/mst_Leave_Kategori/form_ubah_mst_leave_kategori';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstLeaveKategori(){
    	 $id=$this->input->post('id_leave_kategori');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_leave_kategori($data,$id);
			echo "succes";
	}
	public function prosesHapusLeaveKategori()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusLeaveKategori($id);
	}
	public function mstBenefit()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,81);
				$data['dt_mstBenefit']=$this->Admin_model->dt_mstBenefit();
				$data['content'] = 'Admin/mst_Benefit/mst-benefit';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahmstBenefit()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,81);
				$data['content'] = 'Admin/mst_Benefit/form_tambah_mst_benefit';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahBenefit()
	{	
		$data = array( 
					'jenis' =>$this->input->post('jenis'),
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_benefit($data);
			echo "succes";
	}
	public function ubahMstBenefit(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,81);
				 $id=$this->uri->segment(3);
				 $data['dataMstBenefit']=$this->Admin_model->data_mst_benefit($id);
				 $data['content'] = 'Admin/mst_Benefit/form_ubah_mst_benefit';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstBenefit(){
    	 $id=$this->input->post('id_benefit');
		 		$data = array( 
		 			'jenis' =>$this->input->post('jenis'),
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_benefit($data,$id);
			echo "succes";
	}
	public function prosesHapusbenefit()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusbenefit($id);
	}
	public function mstModul()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,82);
				$data['dt_mstModul']=$this->Admin_model->dt_mstModul();
				$data['content'] = 'Admin/mst_Modul/mst-modul';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesCek(){
		$link = $this->input->post('link');

		$url = $this->Admin_model->select_url($link);
		
		if ($url->num_rows() > 0) {
			echo "Link sudah ada yang menggunakan";
		}else{
			echo "Link Belum ada ";
		}
	}
	public function tambahMstModul()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,82);
				$where = array('parent'=>0);
				$data['dt_mstModul']=$this->Admin_model->dt_mstModul($where);
				$data['content'] = 'Admin/mst_Modul/form_tambah_mst_modul';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahModul()
	{	
		$link = $this->input->post('link');

		$url = $this->Admin_model->select_url($link);
		if ($url->num_rows() > 0 ) {
			echo "Link Sudah Ada";
		}else{
			$data = array(
				'nama_modul'=>$this->input->post('nama_modul'),
				'link'=>$this->input->post('link'),
				'parent'=>$this->input->post('parent'),
				'status'=>$this->input->post('status'),
				'sort'=>$this->input->post('sort'),
				'icon'=>$this->input->post('icon')
			);
			$data = $this->input->post();
			$this->Admin_model->add_mst_modul($data);
			echo "succes";
		}
	}
	public function ubahMstModul(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,82);
				 $id=$this->uri->segment(3);
				 $where = array('parent'=>0);
				 $data['dataMstModul']=$this->Admin_model->data_mst_modul($id);
				 $data['dataMstParentModul']=$this->Admin_model->dt_mstModul($where);
				 $data['content'] = 'Admin/mst_Modul/form_ubah_mst_modul';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstModul(){
		 $link = $this->input->post('link');
		 $url = $this->Admin_model->select_url($link);
		 if ($url->num_rows() > 0 && $link != $url->row()->link) {
			echo "Link Sudah Ada";
		 }else{
    	 		$id=$this->input->post('id_modul');
		 		$data = array(
				'nama_modul'=>$this->input->post('nama_modul'),
				'link'=>$this->input->post('link'),
				'parent'=>$this->input->post('parent'),
				'status'=>$this->input->post('status'),
				'sort'=>$this->input->post('sort'),
				'icon'=>$this->input->post('icon')
			);
			$this->Admin_model->ubah_mst_modul($data,$id);
			echo "succes";
		}
	}
	public function prosesHapusModul()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusModul($id);
	}
	public function mstJenisUser()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,83);
				$data['dt_mstJenisUser']=$this->Admin_model->dt_mstJenisUser();
				$data['content'] = 'Admin/mst_Jenis_User/mst-jenis-user';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstJenisUser()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,83);
				$data['content'] = 'Admin/mst_Jenis_User/form_tambah_mst_jenis_user';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahMstJenisUser()
	{	
		$data = array( 
					'status' =>$this->input->post('status'),
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_jenis_user($data);
			echo "succes";
	}
	public function ubahMstJenisUser(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,83);
				 $id=$this->uri->segment(3);
				 $data['dataMstJenisUser']=$this->Admin_model->data_mst_jenis_user($id);
				 $data['content'] = 'Admin/mst_Jenis_User/form_ubah_mst_jenis_user';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstJenisUser(){
    	 $id=$this->input->post('id_jenis_user');
		 		$data = array( 
		 			'status' =>$this->input->post('status'),
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_jenis_user($data,$id);
			echo "succes";
	}
	public function prosesHapusMstJenisUser()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusMstJenisUser($id);
	}
	public function mstJenisUserAkses()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,84);
				$data['dt_mstJenisUserAkses']=$this->Admin_model->dt_mstJenisUserAkses();
				$data['content'] = 'Admin/mst-jenis-user-akses';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function mstReviewAspek()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,85);
				$data['dt_mstReviewAspek']=$this->Admin_model->dt_mstReviewAspek();
				$data['content'] = 'Admin/mst_Review_Aspek/mst-review-aspek';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahmstReviewAspek()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,85);
				$data['content'] = 'Admin/mst_Review_Aspek/form_tambah_mst_review_aspek';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahReviewAspek()
	{	
		$data = array( 
					'judul' =>$this->input->post('judul'),
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_review_aspek($data);
			echo "succes";
	}
	public function ubahMstReviewAspek(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,85);
				 $id=$this->uri->segment(3);
				 $data['dataMstReviewAspek']=$this->Admin_model->data_mst_review_aspek($id);
				 $data['content'] = 'Admin/mst_Review_Aspek/form_ubah_mst_review_aspek';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstReviewAspek(){
    	 $id=$this->input->post('id_review_aspek');
		 		$data = array( 
					'judul' =>$this->input->post('judul'),
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_review_aspek($data,$id);
			echo "succes";
	}
	public function prosesHapusReviewAspek()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusReviewAspek($id);
	}

	public function mstCompany()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,88);
				$data['dt_mstCompany']=$this->Admin_model->dt_mstCompany();
				$data['content'] = 'Admin/mst_Company/mst-company';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstCompany()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,88);
				$data['content'] = 'Admin/mst_Company/form_tambah_mst_company';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahMstCompany()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_company($data);
			echo "succes";
	}
	public function ubahMstCompany(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,88);
				 $id=$this->uri->segment(3);
				 $data['dataMstCompany']=$this->Admin_model->data_mst_company($id);
				 $data['content'] = 'Admin/mst_Company/form_ubah_mst_company';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstCompany(){
    	 $id=$this->input->post('id_company');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_company($data,$id);
			echo "succes";
	}
	public function prosesHapusMstCompany()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusMstCompany($id);
	}
	public function MstStation()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,89);
				$data['dt_mstStation']=$this->Admin_model->dt_mstStation();
				$data['content'] = 'Admin/mst_Station/mst-station';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstStation()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,89);
				$data['content'] = 'Admin/mst_Station/form_tambah_mst_station';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahMstStation()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_station($data);
			echo "succes";
	}
	public function ubahMstStation(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,89);
				 $id=$this->uri->segment(3);
				 $data['dataMstStation']=$this->Admin_model->data_mst_station($id);
				 $data['content'] = 'Admin/mst_Station/form_ubah_mst_station';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstStation(){
    	 $id=$this->input->post('id_station');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_station($data,$id);
			echo "succes";
	}
	public function prosesHapusMstStation()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusMstStation($id);
	}

	public function MstPolicies()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,87);
				$data['dt_mstPolice']=$this->Admin_model->dt_mstPolice();
				$data['content'] = 'Admin/mst_Police/mst-police';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstPolice()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,87);
				$data['content'] = 'Admin/mst_Police/form_tambah_mst_police';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahMstPolice()
	{	
		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->add_mst_police($data);
			echo "succes";
	}
	public function ubahMstPolice(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,87);
				 $id=$this->uri->segment(3);
				 $data['dataMstPolice']=$this->Admin_model->data_mst_police($id);
				 $data['content'] = 'Admin/mst_Police/form_ubah_mst_police';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstPolice(){
    	 $id=$this->input->post('id_policetype');
		 		$data = array( 
					'deskripsi' =>$this->input->post('deskripsi')
				);
			$this->Admin_model->ubah_mst_police($data,$id);
			echo "succes";
	}
	public function prosesHapusMstPolice()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusMstPolice($id);
	}
	public function MstSetting()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,86);
				$data['dt_mstSetting']=$this->Admin_model->dt_mstSetting();
				$data['content'] = 'Admin/mst_Setting/mst-setting';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function tambahMstSetting()
	{	
		if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,86);
				$data['content'] = 'Admin/mst_Setting/form_tambah_mst_setting';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahMstSetting()
	{	
		$data = array( 
					'variable' =>$this->input->post('variable'),
					'value' =>$this->input->post('value')
				);
			$this->Admin_model->add_mst_setting($data);
			echo "succes";
	}
	public function ubahMstSetting(){
			if($this->session->userdata('user_type')==4 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
				$data['menuId']=array(68,86);
				 $id=$this->uri->segment(3);
				 $data['dataMstSetting']=$this->Admin_model->data_mst_setting($id);
				 $data['content'] = 'Admin/mst_Setting/form_ubah_mst_setting';
		         $this->load->view('index',$data);
		         }else{
			redirect('home');
		}
	}
	public function prosesUbahMstSetting(){
    	 $id=$this->input->post('id_setting');
		 		$data = array( 
					'variable' =>$this->input->post('variable'),
					'value' =>$this->input->post('value')
				);
			$this->Admin_model->ubah_mst_setting($data,$id);
			echo "succes";
	}
	public function prosesHapusMstSetting()
	{	
		$id=$this->input->post('id');
		$this->Admin_model->hapusMstSetting($id);
	}

}
