<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
        $model=array("M_home","My_model","Nata_hris_employee_model","Nata_hris_hr_model");
		$this->load->model($model);
        $helper=array("form","url");
        $this->load->helper($helper);
        $lib=array("session","form_validation","Spreedsheet","pdf");
        $this->load->library($lib);
	}
	public function ambilsts(){
		$id=$this->input->post('id_sts');
		$where=array('id_leave_kategori'=>$id);
		// $where2=array('a.id_leave_kategori'=>$id);
		$data1 = $this->Nata_hris_employee_model->dataSts($where)->num_rows();
		if ($data1 > 0) {
			$data= $this->Nata_hris_employee_model->dataSts($where)->row();
		}
		$tmp1 = $this->Nata_hris_employee_model->data_cuti($where)->num_rows();
		if ($tmp1 > 0) {
			$tmp = $this->Nata_hris_employee_model->data_cuti($where)->row();

			$idleave = $this->Nata_hris_employee_model->data_cuti($where)->row()->id_leave_kategori;
			$nik = $this->session->userdata('nik');
			$leave = array('a.id_leave_kategori'=>$idleave,
							'a.nik'=>$nik);
			$tmppribadi = $this->Nata_hris_employee_model->data_cutipribadi($leave)->row();

			$kategori = $this->Nata_hris_employee_model->data_cutipribadi($leave)->num_rows();
			$arraytmp = 0;
			if ($data1 > 0) {
				$pribadi = $kategori>0?$tmppribadi->jumlah_hari:0;
				$biasa = $tmp1>0?$tmp->jumlah_hari:0;
				$arraytmp = intval($data->status==0?$pribadi:$biasa);
			}
			if ($kategori > 0) {
				echo json_encode(
									array(
										"status"=>$data1>0?$data->status:0,
										"id_leave_kategori"=>$tmppribadi->id_leave_kategori,
										"jumlah_hari"=>$arraytmp
									)
							);
			}else{
				echo json_encode(
									array(
										"status"=>$data1>0?$data->status:0,
										"id_leave_kategori"=>0,
										"jumlah_hari"=>$arraytmp
									)
								);
			}
		}

		// $idleave = $this->Nata_hris_employee_model->data_cuti($where)->row()->id_leave_kategori;
		// $nik = $this->session->userdata('nik');
		// $leave = array('a.id_leave_kategori'=>$idleave,
		// 				'a.nik'=>$nik);
		// $tmppribadi = $this->Nata_hris_employee_model->data_cutipribadi($leave)->row();
		// $kategori = $this->Nata_hris_employee_model->data_cutipribadi($leave)->num_rows();

		// if ($kategori > 0) {
		// 	echo json_encode(array("status"=>$data->status,
		// 						"id_leave_kategori"=>$tmppribadi->id_leave_kategori,
		// 						"jumlah_hari"=>intval($data->status==0?$tmppribadi->jumlah_hari:$tmp->jumlah_hari)));
		// }else{
		// 	echo json_encode(array("status"=>$data->status,
		// 						"id_leave_kategori"=>0,
		// 						"jumlah_hari"=>intval($data->status==0?$tmppribadi->jumlah_hari:$tmp->jumlah_hari)));
		// }
		
	}

	public function index()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(1);
			$nik = $this->session->userdata('nik');
			$nikatasan=array('a.nama_atasan'=>$nik);
			$niksendiri=array('a.nik'=>$nik);
			$data['dataAtasan'] = $this->Nata_hris_employee_model->data_atasan($nikatasan);
			$nikatasancuti=array('a.nik_atasan'=>$nik);
			$data['dataAtasaCutiApproval'] = $this->Nata_hris_employee_model->data_leave_request2($nikatasancuti);
			$data['dataCutiSendiri'] = $this->Nata_hris_employee_model->data_leave_request2($niksendiri);
			$wh = array('a.nik_atasan'=> $nik);
			$data['dataOvertime'] = $this->Nata_hris_employee_model->data_overtime_lembur($wh);
			$data['dataOvertimeSendiri'] = $this->Nata_hris_employee_model->data_overtime_lembur($niksendiri);
			
			
			$wh=array('status'=>'1');
			$limit = 1;
			$limitpengumuman = 10;
			$data['dataKuesionerRow'] = $this->Nata_hris_employee_model->data_kuesioner_table("",$wh,$limit)->row();
			$data['dataKuesioner'] = $this->Nata_hris_employee_model->data_kuesioner_table("",$wh,$limit);
			$data['dataAbsensi'] = $this->Nata_hris_employee_model->data_absensi($nik)->row();
			$data['dataAbsensiRows'] = $this->Nata_hris_employee_model->data_absensi($nik)->num_rows();
            $niktask=array("d.nik"=>$nik);
            $data['dataTask'] = $this->Nata_hris_employee_model->data_task($niktask);
            $data['dataCuti'] = $this->Nata_hris_employee_model->data_dtl_cuti($niktask);
			$data['dataAbsensiMasuk'] = $this->Nata_hris_employee_model->data_absensi($nik)->num_rows();
			$data['dataPenKerjaRow'] = $this->Nata_hris_employee_model->data_leave_request($nik,1);
			$data['dataClaimRemburse'] = $this->Nata_hris_employee_model->total_remburse($nik)->row();
			$data['dataClaimRemburseRows'] = $this->Nata_hris_employee_model->total_remburse($nik)->num_rows();
			$data['datakaryawan']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			$data['dataBerita'] = $this->Nata_hris_employee_model->data_berita($wh,$limit);
			$data['dataPengumuman']=$this->Nata_hris_employee_model->data_pengumuman($limitpengumuman);
			$data['dataPengumumansatu']=$this->Nata_hris_employee_model->data_pengumuman($limit);

			$data['content'] = 'employee/Dashboard';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}
    public function checkPass(){
        $nik = $this->session->userdata('nik');
        $wh=array("nik"=>$nik,"password"=>$this->input->post("oldpass"));
        $numrows=$this->Nata_hris_employee_model->data_user($wh)->num_rows();
        echo $numrows;
    }
	public function recruitment()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(3,94);
				$data['content'] = 'employee/recruitment';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
			
	}
	public function jadwal()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(3,95);
				$data['content'] = 'employee/jadwal';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
			

	}
	public function viewprof(){
		$nik=$this->input->post('nik');
		$tamp=array('nik'=>$nik);
		$datakaryawan =$this->My_model->data_karyawan($nik);
		$ambildepartemen =$this->My_model->ambildepartemen($nik);
        $dataKaryawandept=$this->My_model->data_karyawan_dept($ambildepartemen->id_departemen);

        $ambildataKepala=$this->My_model->ambil_data_kepala($ambildepartemen->id_jabatan);
        $ambildatanamaKepala=$this->My_model->ambil_data_nama_kepala($ambildataKepala->parent_id_jabatan);
        if($datakaryawan->status_karyawan=='1'){
        	$datakaryawan->status_karyawan='Tetap';	
        }else if($datakaryawan->status_karyawan=='2'){
        	$datakaryawan->status_karyawan='Kontrak';
        }
        else if($datakaryawan->status_karyawan=='3'){
        	$datakaryawan->status_karyawan='Training';
        }
        
        $result=array('datakaryawan'=>$datakaryawan,'datanamaKepala'=>$ambildatanamaKepala);
		echo json_encode($result);
	}
	public function viewLamaran(){
		setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
		$id=array('a.id_loker'=>$this->input->post('id'));
		$id_pelamar = $this->session->userdata('id_pelamar');
		$id_loker=$this->input->post('id');
		// $tamp=array('nik'=>$nik);
		$dataLokerPelamar =$this->My_model->dataLokerPelamar($id_pelamar,$id_loker)->row();
		$dataLokerPelamarrows =$this->My_model->dataLokerPelamar($id_pelamar,$id_loker)->num_rows();
        $stslamar=array("e.status_lamar"=>"2");
        $dataLokerDiterimarows =$this->My_model->dataLokerPelamar($id_pelamar,"",$stslamar)->num_rows();
        $stslamar=array("e.status_lamar"=>"0");
        $dataLokerProsesrows =$this->My_model->dataLokerPelamar($id_pelamar,"",$stslamar)->num_rows();
		$dataLoker =$this->My_model->data_loker($id)->row();
		$tgl_selesai=$dataLoker->tanggal_selesai;
		$dataLoker->tanggal_mulai=strftime(" %d %B ",strtotime($dataLoker->tanggal_mulai));
		$dataLoker->tanggal_selesai=strftime(" %d %B %Y",strtotime($dataLoker->tanggal_selesai));

		$start_date = new DateTime($tgl_selesai);
        $end_date = new DateTime(date('Y-m-d'));
        $interval = $start_date->diff($end_date);
        $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
        $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
        $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
        $tot=$interval->format('%r%a');
		//$dataLokasi=$this->My_model->data_lokasi($id);
		// $ambildepartemen =$this->My_model->ambildepartemen($nik);
  //       $dataKaryawandept=$this->My_model->data_karyawan_dept($ambildepartemen->id_departemen);
  //       $ambildataKepala=$this->My_model->ambil_data_kepala($ambildepartemen->id_jabatan);
  //       $ambildatanamaKepala=$this->My_model->ambil_data_nama_kepala($ambildataKepala->parent_id_jabatan);
         $result=array('dataLoker'=>$dataLoker,
         	'dataLokerPelamar'=>$dataLokerPelamar,'dataLokerPelamarrow'=>$dataLokerPelamarrows,'interval'=>$tot,
             'dataLokerDiterima'=>$dataLokerDiterimarows,'dataLokerProses'=>$dataLokerProsesrows);
		echo json_encode($result);
	}

	public function absenEmployee(){
		$nik = $this->session->userdata('nik');
		$tanggal = $this->Nata_hris_employee_model->data_absensi($nik)->row();
		$sts = $this->input->post('sts');
		if ($sts == 'signin') {
			$data = array(
					'tanggal_mulai' => $this->input->post('tanggal_mulai'),
					'nik' => $nik,
					'status' => $this->input->post('status')
				);
		
			$this->Nata_hris_employee_model->insert_absensi($data);
		}else{
			$data = array(
				'tanggal_mulai' => $tanggal->tanggal_mulai,
				'nik' => $nik,
			);
			$dt = array();
			if ($sts == 'lunch') {
				$dt=array('lunch' => $this->input->post('tanggal_mulai')) ;
			}if($sts == 'break'){
				$dt=array('break' => $this->input->post('tanggal_mulai'));
			}if($sts == 'extra'){
				$dt=array('extra_break' => $this->input->post('tanggal_mulai'));
			}if ($sts == 'signout') {
				$dt=array('tanggal_selesai' => $this->input->post('tanggal_mulai'));
			}if($sts == 'start_lunch'){
				$dt=array('start_lunch' => $this->input->post('tanggal_mulai'));
			}if ($sts == 'start_break') {
				$dt=array('start_break' => $this->input->post('tanggal_mulai'));
			}if ($sts == 'start_extra_break') {
				$dt=array('start_extra_break' => $this->input->post('tanggal_mulai'));
			}
			$this->Nata_hris_employee_model->update_absensi($data,$dt);
		}
	}

	public function myInformation()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(4,5);
				$nikktp=$this->session->userdata('nikktp');
				$nik=$this->session->userdata('nik');
				$nikprojek=array('a.nik'=>$nik);
				$data['dataTanggunganKaryawan'] = $this->Nata_hris_employee_model->data_tanggungan_karyawan($nikktp);
				$data['dataJenisProject'] = $this->Nata_hris_employee_model->data_karyawan_projek($nikprojek)->row();
				$data['dataKontrak'] = $this->Nata_hris_employee_model->data_karyawan_kontrak($nik)->num_rows();
				$data['dataKontrakRow'] = $this->Nata_hris_employee_model->data_karyawan_kontrak($nik)->row();
				$data['dataKlienKaryawan'] = $this->Nata_hris_employee_model->data_karyawan_klien($nikprojek)->row();
				$data['dataPendidikanKaryawan'] = $this->Nata_hris_employee_model->data_pendidikan_karyawan($nik);
				$data['dataRekeningKaryawan'] = $this->Nata_hris_employee_model->data_rekening_karyawan($nik);
				$data['dataPengalamanKaryawan'] = $this->Nata_hris_employee_model->data_pengalaman_karyawan($nik);
				$data['content'] = 'employee/employee-information';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}

	public function eCertificate()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(4,150);
				$nikktp=$this->session->userdata('nikktp');
				$nik=$this->session->userdata('nik');
				$nikprojek=array('a.nik'=>$nik);
				$data['dataTanggunganKaryawan'] = $this->Nata_hris_employee_model->data_tanggungan_karyawan($nikktp);
				$data['dataJenisProject'] = $this->Nata_hris_employee_model->data_karyawan_projek($nikprojek)->row();
				$data['dataKontrak'] = $this->Nata_hris_employee_model->data_karyawan_kontrak($nik)->num_rows();
				$data['dataKontrakRow'] = $this->Nata_hris_employee_model->data_karyawan_kontrak($nik)->row();
				$data['dataKlienKaryawan'] = $this->Nata_hris_employee_model->data_karyawan_klien($nikprojek)->row();
				$data['dataPendidikanKaryawan'] = $this->Nata_hris_employee_model->data_pendidikan_karyawan($nik);
				$data['dataRekeningKaryawan'] = $this->Nata_hris_employee_model->data_rekening_karyawan($nik);
				$data['dataPengalamanKaryawan'] = $this->Nata_hris_employee_model->data_pengalaman_karyawan($nik);
				$data['content'] = 'employee/certificate';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}

	public function Course()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(118,0);
			$nik = $this->session->userdata('nik');
			$data['content'] = 'employee/course';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function Examp()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(32,0);
			$data['content'] = 'employee/examp';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function scrop(){
		$nik=$this->input->post('nik');
                

        $path='assets/img/karyawan/';
		$config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1                    
	    );

        $this->load->library('upload', $config);

		  $images = array();
		  $files=$_FILES['gambar_foto']['name'];

            $fileName = str_replace(' ','_',$_FILES['gambar_foto']['name']);

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);
            $data1=array();
            if ($this->upload->do_upload('gambar_foto')) {
            	$data1 = array( 
            		'gambar_foto'=>$fileName
            	); 
                $this->upload->data();
               // $this->model->ubahfotoprofil($data1,$id);
				echo $fileName;
            } else {
            	echo "gagal ubah ";
            }
            $data = $this->input->post('hcrop');
         	$image_parts = explode(";base64,", $data);

	        $image_type_aux = explode("image/", $image_parts[0]);

	        $image_type = $image_type_aux[1];

	        $image_base64 = base64_decode($image_parts[1]);
	        $tampfile=uniqid() . '.png';
	        $file = $path.$tampfile ;
	        echo $file;
	        file_put_contents($file, $image_base64);
	        $data1['gambar_foto']=$tampfile;

	        $select = $this->Nata_hris_employee_model->data_karyawan_kontrak($nik)->row();
          	$dokumen = $select->gambar_foto;
            $gambar= $dokumen;
            $path_karyawan = 'assets/img/karyawan/'.$gambar;
            unlink($path_karyawan);
            
	        $this->Nata_hris_employee_model->ubahfotoprofil($data1,$nik);
	        redirect('Employee/myInformation');

	}

	public function informasiKontrak()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(4,91);
				$data['content'] = 'employee/employee-informationkontrak';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
			

	}

	public function KPI()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(4,92);
				$nik = $this->session->userdata('nik');
				$data['dataKJ'] = $this->Nata_hris_employee_model->data_employee($nik)->row();
				$data['dataKPI'] = $this->Nata_hris_employee_model->kpi($data['dataKJ']->id_jenis_projek)->row();
                $data['dataKPIrows'] = $this->Nata_hris_employee_model->kpi($data['dataKJ']->id_jenis_projek)->num_rows();
				$data['content'] = 'employee/employee-kpi';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
			

	}
	public function Teguran()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(4,137);
				$nik = $this->session->userdata('nik');
				$wh=array('nik'=>$nik);
				$data['dataTeguran'] = $this->Nata_hris_employee_model->data_teguran($wh);
				$data['content'] = 'employee/employee-teguran';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
			

	}

	public function keuanganPajak()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(4,93);
				$nik=$this->session->userdata('nik');
				$data['data_GajiLainnya'] =$this->My_model->data_gajiLainnya($nik);
                $data['data_GajiLainnyaRow'] =$this->My_model->data_gajiLainnya($nik)->num_rows();
				$data['content'] = 'employee/employee-keuanganpajak';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
			

	}
	public function prosesUbahProfil(){
		$nik=$this->session->userdata('nik');
		$nikktp=$this->session->userdata('nikktp');
 	// 	$data = array( 
		// 	'nama_lengkap' =>$this->input->post('nama_lengkap'),
		// 	'nama_panggilan' =>$this->input->post('nama_panggilan'),
		// 	'tempat_lahir' =>$this->input->post('tempat_lahir'),
		// 	'tanggal_lahir' =>$this->input->post('tanggal_lahir'),
		// 	'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
		// 	'id_agama' =>$this->input->post('id_agama'),
		// 	'id_sts_nikah' =>$this->input->post('id_sts_nikah'),
		// 	'golongan_darah' =>$this->input->post('golongan_darah'),
		// 	'alamat' =>$this->input->post('alamat'),
		// 	'alamat' =>$this->input->post('alamat'),
		// 	'id_kecamatan' =>$this->input->post('id_kecamatan'),
		// 	'kode_pos' =>$this->input->post('kode_pos'),
		// 	'nomor_telepon' =>$this->input->post('nomor_telepon'),
		// 	'email' =>$this->input->post('email')
		// );
		$data = array('nomor_telepon'=>$this->input->post('nomor_telepon'),
					'nomor_telepon_kerabat'=>$this->input->post('nomor_telepon_kerabat')	
		);

		$dataKaryawan = $this->Nata_hris_employee_model->ubah_profil($data,$nik);

		$splitbank =explode("|", $this->input->post('id_bank')) ;
		$data2 = array( 
			'nomor_rek' =>$this->input->post('nomor_rek'),
			'id_bank' =>$splitbank[0],
			'atas_nama_rek' =>$this->input->post('atas_nama_rek')
		);

		// $data3 = array(
		// 	'id_pendidikan' => $this->input->post('id_pendidikan'),
		// 	'nama_sekolah' => $this->input->post('nama_sekolah'),
		// 	'jurusan' => $this->input->post('jurusan'),
		// 	'tahun_masuk' => $this->input->post('tahun_masuk'),
		// 	'tahun_lulus' => $this->input->post('tahun_lulus')
		// );

		// $data4 = array(
		// 	'nama_perusahaan' => $this->input->post('nama_perusahaan'),
		// 	'nama_jabatan' => $this->input->post('nama_jabatan'),
		// 	'tahun_mulai' => $this->input->post('tahun_mulai'),
		// 	'tahun_selesai' => $this->input->post('tahun_selesai')
		// );

		// $data5 = array(
		// 	'nama' => $this->input->post('namatanggungan'),
		// 	'status_hubungan_keluarga' => $this->input->post('hubungan')
		// );

		
		$dataGaji = $this->Nata_hris_employee_model->data_gaji($nik)->num_rows();
		if($dataKaryawan > 0){
			$res=$this->Nata_hris_employee_model->ubah_profil_rek($data,$nik);
			$result=array();
            if ($res > 0) {
	       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Profile Karyawan Berhasil di Rubah");
	       	}else{
	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Profile Karyawan Gagal di Rubah");
	       	}
			// print_r($data);
            $this->session->set_flashdata($result);
		}
		if ($dataGaji > 0) {
			$res=$this->Nata_hris_employee_model->ubah_profil_rek($data2,$nik);
			$result=array();
            if ($res > 0) {
	       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Profile Bank Berhasil di Rubah");
	       	}else{
	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Profile Bank Gagal di Rubah");
	       	}
			// print_r($data);
            $this->session->set_flashdata($result);
		}else{
			$data2['nik'] = $nik;
			$res=$this->Nata_hris_employee_model->insert_profil_rek($data2);
			$result=array();
            if ($res > 0) {
	       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Profile Bank Berhasil di Tambah");
	       	}else{
	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Profile Bank Absensi Gagal di Tambah");
	       	}
			// print_r($data);
            $this->session->set_flashdata($result);
		}
		// $dataPendidikanKaryawan = $this->Nata_hris_employee_model->data_pendidikan_karyawan($nik)->num_rows();
		// if ($dataPendidikanKaryawan > 0) {
		// 	$this->Nata_hris_employee_model->ubah_profil_pend($data3,$nik);
		// }else{
		// 	$data3['nik'] = $nik;
		// 	$this->Nata_hris_employee_model->insert_profil_pend($data2);
		// }
		
		// $dataPengalamanKaryawan = $this->Nata_hris_employee_model->data_pengalaman_karyawan($nik)->num_rows();
		// if ($dataPengalamanKaryawan > 0) {
		// 	$this->Nata_hris_employee_model->ubah_profil_pengalaman($data4,$nik);
		// }else{
		// 	$data4['nik'] = $nik;
		// 	$this->Nata_hris_employee_model->insert_profil_pengalaman($data4);
		// }
		
		// echo "success";
		redirect('Employee/myInformation');
	}

	public function prosesTanggungan(){
		
		$nikktp=$this->session->userdata('nikktp');

		$data = array(
			'nama' => $this->input->post('namatanggungan'),
			'status_hubungan_keluarga' => $this->input->post('hubungan'),
			'nik_ktp' => $nikktp
		);

		// print_r($data);
		$this->Nata_hris_employee_model->insert_profil_keluarga($data);

		$dataTanggungan = $this->Nata_hris_employee_model->data_tanggungan_karyawan($nikktp);
		$no = 1;
		foreach ($dataTanggungan->result() as $tanggungan) {
			echo '<tr>
                                            
                       <td> '.$no.'</td>
                       <td>'.$tanggungan->nama.'</td>
                       <td>'.$tanggungan->status_hubungan_keluarga.'</td>
                    	<td>
                    	<a href="javascript:void(0);" class="btn btn-primary" onclick="editTanggungan( '.$tanggungan->id_keluarga_pasangan.' ,\''.$tanggungan->nama.'\',\''.$tanggungan->status_hubungan_keluarga.'\')">
                                                  Edit
                                             </a>

                       <a href="'.base_url().'Employee/prosesHapusTanggungan/'.$tanggungan->id_keluarga_pasangan.'"  class="btn btn-red1" onClick="return confirm(\'Anda yakin ingin menghapus data ini? \')" title="Batal">Hapus
                        </a></td>
                   </tr>';
            $no++;
		}
	}

	public function editTanggungan(){
		$nikktp=$this->session->userdata('nikktp');
		$where = array('id_keluarga_pasangan'=>$this->input->post('id_pasangan'));
		$data = array(
			'nama' => $this->input->post('namatanggungan'),
			'status_hubungan_keluarga' => $this->input->post('hubungan'),
			'nik_ktp' => $nikktp
		);

		// print_r($data);
		$this->Nata_hris_employee_model->ubah_profil_keluarga($data,$where);

		$dataTanggungan = $this->Nata_hris_employee_model->data_tanggungan_karyawan($nikktp);
		$no = 1;
		foreach ($dataTanggungan->result() as $tanggungan) {
			echo '<tr>
                                            
                       <td> '.$no.'</td>
                       <td>'.$tanggungan->nama.'</td>
                       <td>'.$tanggungan->status_hubungan_keluarga.'</td>
                    	<td>
                    	<a href="javascript:void(0);" class="btn btn-primary" onclick="editTanggungan( '.$tanggungan->id_keluarga_pasangan.' ,\''.$tanggungan->nama.'\',\''.$tanggungan->status_hubungan_keluarga.'\')">
                                                  Edit
                                             </a>

                       <a href="'.base_url().'Employee/prosesHapusTanggungan/'.$tanggungan->id_keluarga_pasangan.'"  class="btn btn-red1" onClick="return confirm(\'Anda yakin ingin menghapus data ini? \')" title="Batal">Hapus
                        </a></td>
                   </tr>';
            $no++;
		}
	}

	public function prosesHapusTanggungan($id){
		$this->Nata_hris_employee_model->hapusTanggungan($id);
		redirect('Employee/myInformation');
	}

	public function ubahProfil(){
		$data['menuId']=array(4,5);
		$nik=$this->session->userdata('nik');
		$nikktp=$this->session->userdata('nikktp');
		$data['dataKaryawanProfil'] = $this->Nata_hris_employee_model->data_employee($nik)->row();
		$data['dataPendidikanKaryawanProfil'] = $this->Nata_hris_employee_model->data_pendidikan_karyawan($nik);
		$data['dataTanggunganKaryawanProfil'] = $this->Nata_hris_employee_model->data_tanggungan_karyawan($nikktp);
		$data['dataTanggunganKaryawanProfilRow'] = $this->Nata_hris_employee_model->data_tanggungan_karyawan($nikktp)->row();
		$data['dataPengalamanKaryawanProfil'] = $this->Nata_hris_employee_model->data_pengalaman_karyawan($nik);
		$data['dataNikah'] = $this->Nata_hris_employee_model->data_nikah();
		$data['dataGaji'] = $this->Nata_hris_employee_model->data_gaji($nik)->row();
		$data['dataBank'] = $this->Nata_hris_employee_model->data_bank();
		$data['dataGajiRows'] = $this->Nata_hris_employee_model->data_gaji($nik)->num_rows();
		$data['dataAgama'] = $this->Nata_hris_employee_model->data_agama();
		$data['dataKecamatan'] = $this->Nata_hris_employee_model->data_kecamatan();
		$data['dataKabupaten'] = $this->Nata_hris_employee_model->data_kabupaten();
		$data['dataProvinsi'] = $this->Nata_hris_employee_model->data_provinsi();
		$data['dataPendidikanKar'] = $this->Nata_hris_employee_model->data_pendidikan();
 		$data['content'] = 'employee/ubah_employee-information_profil';
        // $this->load->view('index',$data);
        $this->load->view('employee/ubah_employee-information_profil',$data);
	}

	public function departement()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(4,6);
			$data['dataKaryawanProject']=$this->Nata_hris_employee_model->data_karyawan_projek();
			$data['content'] = 'employee/employee-departement';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}
	public function departementDetail()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(4,6);
			$data['content'] = 'employee/departement-detail';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}

	public function attendanceActivityAjax()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){

			$data['menuId']=array(118,39);
			$nik=$this->session->userdata('nik');
			// storing  request (ie, get/post) global array to a variable  
			$requestData= $this->input->post();

			$columns = array( 
			// datatable column index  => database column name
				0 =>'tanggal_mulai', 
				1 => 'tanggal_mulai',
				2 => 'tanggal_selesai',
				3 => 'status'
			);
			$monthyear = $this->input->post('yearmonth');
			$dataTabelAbsensiEmployee2 = $this->Nata_hris_employee_model->data_absensi_employee_ajax($nik,'','','','',$monthyear);
			$totalData = $dataTabelAbsensiEmployee2->num_rows();
			$totalFiltered = $totalData;
			
			if (!empty($requestData['search']['value'])) {
				$dataTabelAbsensiEmployee2 = $this->Nata_hris_employee_model->data_absensi_employee_ajax($nik,$columns,$requestData,'','',$monthyear);
				$totalFiltered = $dataTabelAbsensiEmployee2->num_rows();
			}else{
				$dataTabelAbsensiEmployee2 = $this->Nata_hris_employee_model->data_absensi_employee_ajax($nik,$columns,$requestData,'','',$monthyear);
			}
			$data = array();
			$no = 0;
			foreach ($dataTabelAbsensiEmployee2->result() as $row) {
				// preparing an array
				$requestData['start']++;
				$nestedData=array(); 
				$no++;
				
				
				$nestedData[] = $row->tanggal_mulai;
				$nestedData[] = $row->time_mulai;
				$nestedData[] = $row->time_selesai;
				$nestedData[] = $row->status==1?'<label class="Rectangle-permanent">Masuk</label>':($row->status==0?'<label class="Rectangle-resign">Sakit</label>':($row->status==3?'<label class="Rectangle-probation">Tanpa Keterangan</label>':''));
				
				$data[] = $nestedData;
			}  

			$json_data = array(
						"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
						"recordsTotal"    => intval( $totalData ),  // total number of records
						"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
						"data"            => $data   // total data array
						);

			echo json_encode($json_data);  // send data as json format
			}else{
				redirect('home');
			}

		}

	public function attendanceActivity()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(118,39);
			$nik=$this->session->userdata('nik');
			$data['dataEmployee'] = $this->Nata_hris_employee_model->data_employee($nik)->row();
			$bulan = "a.tanggal_mulai like '".date('Y-m')."%'";
			$data['dataAbsensiEmployee'] = $this->Nata_hris_employee_model->data_absensi_employee($nik,'1',$bulan);
			$data['dataTabelAbsensiEmployee'] = $this->Nata_hris_employee_model->data_absensi_employee($nik);
			$data['dataAbsensiEmployeeRow'] = $this->Nata_hris_employee_model->data_absensi_employee($nik)->row();
			$data['dataAbsensiEmployeeSakit'] = $this->Nata_hris_employee_model->data_absensi_employee($nik,'3');
			$data['dataAbsensiEmployeeBolos'] = $this->Nata_hris_employee_model->data_absensi_employee($nik,'0');
			$data['dataAbsensiLeaveRow'] = $this->Nata_hris_employee_model->data_leave_request($nik,1);
            
            $data['dataAbsensiMasuk'] = $this->Nata_hris_employee_model->data_absensi($nik)->num_rows();
            $data['dataAbsensi'] = $this->Nata_hris_employee_model->data_absensi($nik)->row();
			$data['content'] = 'employee/employee-attendance-activity';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}

	public function viewAttendanceActivity()
	{	
		$id_absensi=$this->input->post('id_absensi');
		$nik=$this->input->post('nik');
		$data['dataViewAttendance'] = $this->Nata_hris_employee_model->data_view_policies($id_absensi,$nik);
		$this->load->view('employee/view-attendance-activity',$data);
		
	}

	public function leaverequestAjax(){
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(118,40);
			$nik=$this->session->userdata('nik');
			$requestData= $this->input->post();

			$columns = array( 
			// datatable column index  => database column name
				0 =>'deskripsi', 
				1 => 'tanggal',
				2 => 'sampe_tanggal',
				3 => 'tanggal',
				4 => 'a.status'
			);

			$monthyear = $this->input->post('yearmonth');
			$dataTabelCuti = $this->Nata_hris_employee_model->data_leave_requestAjax($nik,'','','',$monthyear);
			$totalData = $dataTabelCuti->num_rows();
			$totalFiltered = $totalData;

			if (!empty($requestData['search']['value'])) {
				$dataTabelCuti = $this->Nata_hris_employee_model->data_leave_requestAjax($nik,$columns,$requestData,'',$monthyear);
				$totalFiltered = $dataTabelCuti->num_rows();
			}else{
				$dataTabelCuti = $this->Nata_hris_employee_model->data_leave_requestAjax($nik,$columns,$requestData,'',$monthyear);
			}
			$data = array();
			$no = 0;
			foreach ($dataTabelCuti->result() as $row) {
				// preparing an array
				$requestData['start']++;
				$nestedData=array();
				$no++;
				
				//Our "then" date.
                $then = "2009-02-04";
                 
                //Convert it into a timestamp.
                $then = strtotime($row->tanggal);
                 
                //Get the current timestamp.
                $now = strtotime($row->sampe_tanggal);
                 
                //Calculate the difference.
                $difference = $now - $then;
                 
                //Convert seconds into days.
                $days = floor($difference / (60*60*24) );
                $tmp = $days+1;
                
				
				$nestedData[] = $row->desLeave;
				$nestedData[] = strftime(" %d %B %Y",strtotime($row->tanggal));
				$nestedData[] = strftime(" %d %B %Y",strtotime($row->sampe_tanggal));
				$nestedData[] = $tmp." Hari";
				if ($row->status == '0') {
					$nestedData[] = '<label class=" Rectangle-probation">Pengajuan</label>';
				}elseif($row->status == '1'){
					$nestedData[] = '<label class=" Rectangle-permanent">Disetujui</label>';
				}elseif($row->status == '2'){
					$nestedData[] = '<label class=" Rectangle-resign">Ditolak</label>';
				}
				
				$nestedData[] = ' <a href="javascript:;" onclick="view('.$row->id_absensi_leave.')" class="btn btn-aksi"><img src="https://Natadev.id/Penata/assets/img/View.svg" class="padd-right-5">Lihat</a>';
				// <form action="'. base_url().'Employee/viewleaveRequest" method="post">
    //                                 <input type="hidden" name="id" value="'.$row->id_absensi_leave.'">
    //                                 <button type="submit" class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button>
    //                             </form>';
				
				$data[] = $nestedData;
			}
			$json_data = array(
						"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
						"recordsTotal"    => intval( $totalData ),  // total number of records
						"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
						"data"            => $data   // total data array
						);

			echo json_encode($json_data);  // send data as json format
			}else{
				redirect('home');
			}
	}
	
	public function ViewApprovalCuti($id){	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(118,40);
			// $data['content'] = 'hr/hr-permohonan-cuti-detail';
			$id=array('id_absensi_leave'=>$id);
			$data['datapermohonancuti'] = $this->Nata_hris_hr_model->dataPermohonanCutiKontrak($id)->row();
			$this->load->view('employee/view-approval-cuti',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ubahstsapprovalcuti(){
		$id=$this->input->post('id');
		$sts=$this->input->post('sts');
		$alasan=$this->input->post('alasan');
		$res = $this->Nata_hris_hr_model->ubahstscuti($id,$sts,$alasan);
        
	}
	public function leaveRequest()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(118,40,1);
			$nik=$this->session->userdata('nik');
			$wh = array('a.nik_atasan'=> $nik);
			$nikarray =array('a.nik'=> $nik);
			$data['dataLeaveCuti']=$this->Nata_hris_employee_model->data_karyawan_projek($nikarray)->row();
			$data['dataKaryawanLeave']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			$data['dataLeaveRow'] = $this->Nata_hris_employee_model->data_leave_request($nik)->row();
			$data['dataLeaves']=$this->Nata_hris_employee_model->data_leave_request($nik);
			$data['dataLeave'] = $this->Nata_hris_employee_model->data_leave_request($nik,1);

			$data['dataLeaveRequest'] = $this->Nata_hris_employee_model->data_leave_request($nik,'','0');
			$data['dataLeaveRequestKhusus'] = $this->Nata_hris_employee_model->data_leave_request($nik,'','1');
			$data['dataLeaveRequestSakit'] = $this->Nata_hris_employee_model->data_leave_request($nik,'','2');

			$data['dataPermohonanCuti'] = $this->Nata_hris_employee_model->data_permohonancuti($wh);
			$data['dataCuti'] = $this->Nata_hris_employee_model->data_cuti();
			$data['dataCutiPribadi'] = $this->Nata_hris_employee_model->data_cutipribadi($nikarray);
			$data['dataSumCutiPribadi'] = $this->Nata_hris_employee_model->data_sumcutipribadi($nikarray);
			$nikdtl =array('d.nik'=> $nik);
			$data['datadtlcuti'] = $this->Nata_hris_employee_model->data_dtl_cuti($nikdtl);
			$data['content'] = 'employee/leave-request';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}
	public function viewleaveRequest($a)
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(118,40);
			//$id=$this->input->post('id');
			$data['dataleaverequest'] = $this->Nata_hris_employee_model->dataLeaverequest($a)->row();
			//$data['content'] = 'employee/view-leave-request';
			$this->load->view('employee/view-leave-request',$data);
		}else{
			redirect('home');
		}
	}

	public function viewpermohonanleaveRequest($a)
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(118,40);
			$id=array('a.id_absensi_leave'=>$a);
			$data['dataviewCuti'] = $this->Nata_hris_employee_model->data_permohonancuti($id);
			$data['datapermohonanCuti'] = $this->Nata_hris_employee_model->data_permohonancuti($id)->row();
			// $data['content'] = 'employee/view-permohonancuti';
			$this->load->view('employee/view-permohonancuti',$data);
		}else{
			redirect('home');
		}
	}

	public function viewpermohonanapprovalleaveRequest($a)
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(118,40);
			$id=array('a.id_absensi_leave'=>$a);
			$data['dataviewCuti'] = $this->Nata_hris_employee_model->data_permohonancuti($id);
			$data['datapermohonanCuti'] = $this->Nata_hris_employee_model->data_permohonancuti($id)->row();
			// $data['content'] = 'employee/view-permohonancuti';
			$this->load->view('employee/view-permohonanapprovalcuti',$data);
		}else{
			redirect('home');
		}
	}

	public function ajukanCuti($sts){
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(118,40,1);
				
				$statuscuti=array('status'=>$sts);

				$nik=$this->session->userdata('nik');
				$nikarray =array('a.nik'=> $nik);
				$data['dataSumCutiPribadi'] = $this->Nata_hris_employee_model->data_sumcutipribadi($nikarray);
				$data['dataLeave']=$this->Nata_hris_employee_model->data_karyawan_projek($nikarray)->row();
				$data['dataLeaves']=$this->Nata_hris_employee_model->data_leave_request($nik);
                $data['dataLeaveRequest'] = $this->Nata_hris_employee_model->data_leave_request($nik)->num_rows();
				$data['dataCuti'] = $this->Nata_hris_employee_model->data_cuti($statuscuti);
				$data['dataAtasan'] = $this->Nata_hris_employee_model->data_atasan($nikarray)->row();
				//$data['content'] = 'employee/leaverequest/form_ajukan_cuti';
				$this->load->view('employee/leaverequest/form_ajukan_cuti',$data);
			}else{
			redirect('home');
		}
	}

	public function prosesAjukanCuti(){
		$id_cuti = $this->input->post('id_leave');
		$id_leave_kategori = array('id_leave_kategori'=>$this->input->post('id_leave_kategori'));
		$jenis = $this->Nata_hris_employee_model->data_cuti_row($id_cuti)->row();
		$nik=$this->input->post('nik');
		
		$data = array( 
				'nik' =>$this->input->post('nik'),
				'id_leave_kategori' =>$this->input->post('id_leave_kategori'),
				'tanggal' =>$this->input->post('leave_from'),
				'sampe_tanggal' =>$this->input->post('leave_to'),
				'status' =>$this->input->post('status'),
				'nik_atasan' =>$this->input->post('nik_atasannya'),
				'keterangan' =>$this->input->post('keterangan'),
				'tanggal_create' =>date('Y-m-d'),
				'contact_person' =>$this->input->post('contact_person'),
				'contact' =>$this->input->post('contact'),
				'serah_tugas_kepada' =>$this->input->post('serah_tugas_kepada'),
				// 'bagian' =>$this->input->post('bagian')
			);

		if ( $_FILES['dokumen']['name'] != '' ) {
					$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['dokumen']['name']);
					$filename = str_replace('(', '', $filename);
					$filename = str_replace(')', '', $filename);
					$data['dokumen'] = $filename;

					// $result = $this->M_article->insert($data);

					
						$config['upload_path']          = 'assets/img/cuti/';
						$config['allowed_types']        = 'jpg|png|pdf';
						$config['file_name']        = $filename;
						$config['overwrite'] 	= TRUE;
						// $config['max_size']             = 100;
						// $config['max_width']            = 1024;
						// $config['max_height']           = 768;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

			            if ($this->upload->do_upload('dokumen')) {
			            	
			            	}
				    }
		$idleave = $this->Nata_hris_employee_model->data_cuti($id_leave_kategori)->row()->id_leave_kategori;
		$leave = array('a.id_leave_kategori'=>$idleave,
						'a.nik'=>$nik);
		$tmppribadi = $this->Nata_hris_employee_model->data_cutipribadi($leave)->row()->jumlah_hari;
		
		//Convert it into a timestamp.
		$awal = $this->input->post('leave_from');
		$akhir = $this->input->post('leave_to');
		$then = strtotime($awal);

		//Get the current timestamp.
		$now = strtotime($akhir);
		// for 2 hari
		$lewat = array("Saturday","Sunday");
		$days = 0;
		$tmp=0;
		for ( $i = $then; $i <= $now; $i = $i + 86400 ) {
			$thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
			$tanggal = strftime("%A",strtotime($thisDate));
			if (!in_array($tanggal,$lewat)) {
				$days++;
			}
		}
		//Calculate the difference.
		// $difference = $now - $then;

		//Convert seconds into days.
		// $days = floor($difference / (60*60*24) );
		if($days == 0){
			$tmp=0;
		}else{
			$tmp = $days;
			
		}
		$hasil = 0;
		$hasil = $tmppribadi-$tmp;
		echo "sisa cuti :".$hasil."<br/>";
		$where = array('id_leave_kategori'=>$idleave,
						'nik'=>$nik);
		// print_r($where);
		$dataUpdate = array('jumlah_hari'=>$hasil);
		print_r($dataUpdate);
		$res = $this->Nata_hris_employee_model->update_cutipribadi($where,$dataUpdate);
		$res = $this->Nata_hris_employee_model->tambah_ajuakan_cuti($data);
		
		$result=array();
		if ($res > 0) {
       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Cuti Berhasil di Tambah");
       	   $this->session->set_flashdata($result);
       	}else{
       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Cuti Gagal di Tambah");
       	   $this->session->set_flashdata($result);
       	}

		// print_r($data);
		redirect('Employee/leaveRequest');
		//echo "succes";
	}
	public function HapusLeaveRequest($id)
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_absensi_leave"=>$id);
		  
		  $select = $this->Nata_hris_employee_model->dataLeaverequest($id)->row();
		  $dokumen = $select->dokumen;
		  	$gambar= $dokumen;
			$path = 'assets/img/cuti/'.$gambar;
			unlink($path);
		  $this->Nata_hris_employee_model->del_data("trx_absensi_leave",$where);
          redirect("Employee/leaveRequest");
 		}else{
			redirect("home/login");	
		}
	}
	

	public function organizationStructure()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(32,41);
			$data['content'] = 'employee/organization-structure';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}
	public function jsonOrg()
	{	
		if(($this->session->userdata('user_type')==1 || $this->session->userdata('user_type')==3) && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(32,41);
			$this->load->view('employee/json-org',$data);
		}else{
			redirect('home');
		}

	}
	public function policies()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(32,42);
			$data['dataPolicies'] = $this->Nata_hris_employee_model->data_policies();
			$data['content'] = 'employee/policies';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}
	public function viewPolicies($a)
	{	
		$data['dataViewPolicies'] = $this->Nata_hris_employee_model->data_view_policies($a);
		$this->load->view('employee/view-policies',$data);
		
	}
    public function penilaianKinerja(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(96,97);
            $nik = $this->session->userdata('nik');
			$data['dataPenKerja'] = $this->Nata_hris_employee_model->data_penkerja($nik);
			$data['content'] = 'employee/penilaianKinerja';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }
    public function viewPenKerja()
	{	
		// $id_kebijakan=$this->input->post('id_kebijakan');
		// $data['dataViewPenKerja'] = $this->Nata_hris_employee_model->data_view_penkerja($id_kebijakan);
		// $this->load->view('employee/view-penkerja',$data);
		$id_kebijakan=$this->input->post('id_review_score');
		$nik=$this->input->post('nik');
		$tanggal=$this->input->post('tanggal');
		$datapenkerja=$this->Nata_hris_employee_model->data_view_penkerja($id_kebijakan,$nik);
		$wh=array('a.nik'=>$nik);
		//if($datapenkerja->num_rows()==0){
		//	$datapenkerja = $this->Nata_hris_employee_model->data_karyawan($wh);
		//}
		$data['dataViewPenKerja'] = $datapenkerja->row();
		$data['dataPenKerja360'] = $this->Nata_hris_employee_model->data_review($nik)->row();
		$data['dataViewPenKerjaRow'] = $this->Nata_hris_employee_model->data_view_penkerja($id_kebijakan,$nik)->num_rows();
		$data['dataAspek'] = $this->Nata_hris_employee_model->data_aspek_penilaian();
		$data['dataCuti'] = $this->Nata_hris_employee_model->data_cuti_leave($nik)->row();
		$data['dataCutiRow'] = $this->Nata_hris_employee_model->data_cuti_leave($nik)->num_rows();
		$data['nik'] = $nik;
		$data['tanggal'] =$tanggal;
		$data['id_review_score'] =$id_kebijakan;
		$this->load->view('employee/view-penkerja',$data);
		
	}
    public function review360(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(96,98);
            $nik = $this->session->userdata('nik');
			$dataKaryawanBawahan = $this->Nata_hris_employee_model->karyawan_bawahan($nik);
			// $dataBawahan = $this->Nata_hris_employee_model->bawahan($dataKaryawanBawahan->id_organisasi);
			$nikbawahan = array();
			// foreach ($dataBawahan->result() as $bawahan) {
			// 	$nikbawahan[] = "'".$bawahan->nik."'";
			// }
			
			$nikbawahan[] = "'".$nik."'";
			
			$pisah = implode(',', $nikbawahan);
			$data['dataPenKerja'] = $this->Nata_hris_employee_model->data_review($pisah);
			$data['content'] = 'employee/penilaianKinerja360';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }
   //  public function review360Outsource(){
   //  	if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			// $data['menuId']=array(96,98);
   //          $nik = $this->session->userdata('nik');
   //          $data['content'] = 'employee/penilaianKinerja360';
			// $this->load->view('index',$data);
   //      }else{
   //      	redirect('home');
   //      }
   //  }
    public function viewPenKerja360()
	{	
		$id_kebijakan=$this->input->post('id_review_score');
		$nik=$this->input->post('nik');
		$tanggal=$this->input->post('tanggal');
		$data['dataViewPenKerja'] = $this->Nata_hris_employee_model->data_view_penkerja($id_kebijakan,$tanggal)->row();
		
		$data['dataPenKerjaSakit'] = $this->Nata_hris_employee_model->data_absensi_employee($nik,'3');
		$data['dataPenKerjaBolos'] = $this->Nata_hris_employee_model->data_absensi_employee($nik,'0');
		$data['dataPenKerjaRow'] = $this->Nata_hris_employee_model->data_leave_request($nik,1);
		$dataTerlambat = $this->Nata_hris_employee_model->data_setting_claim("jam_masuk");
		$masuk = $dataTerlambat->value;
		
		$hasilmasuk = explode(':', $masuk);
		$jamMasuk = $hasilmasuk[0];
		$menitMasuk = intval($hasilmasuk[1])+15;
		$num_padded = sprintf("%02d", $menitMasuk);
		$timediff = "time_to_sec(timediff(concat(substring_index(tanggal_mulai,' ',1),' ".$jamMasuk.':'.$num_padded.":00'),tanggal_mulai )) < 0";
		$data['dataTerlambat360'] = $this->Nata_hris_employee_model->data_leave_request($nik,1,$timediff);

		$data['dataPenKerja360'] = $this->Nata_hris_employee_model->data_review($nik)->row();
		$data['dataViewPenKerjaRow'] = $this->Nata_hris_employee_model->data_view_penkerja($id_kebijakan,$tanggal)->num_rows();
		$data['dataAspek'] = $this->Nata_hris_employee_model->data_aspek_penilaian();
		$data['dataCuti'] = $this->Nata_hris_employee_model->data_cuti_leave($nik)->row();
		$data['dataCutiRow'] = $this->Nata_hris_employee_model->data_cuti_leave($nik)->num_rows();
		$data['nik'] = $nik;
		$data['tanggal'] =$tanggal;
		$data['id_review_score'] =$id_kebijakan;
		$this->load->view('employee/view-penkerja360',$data);
		
	}
    public function viewAspek(){
        $dataaspek=$this->Nata_hris_employee_model->data_aspek_penilaian();
        $result=array('dataaspek'=>$dataaspek->result_array());
		echo json_encode($result);
    }
    public function prosesPenKerja360(){
    	$id_aspek = explode(',',$_POST['id_aspek']);
    	$ratingValue = explode(',', $_POST['ratingValue']);
    	$num = 0;
    	$nik = $this->input->post("nik");
    	$periode = $this->input->post("periode");

    	$hapusScore = $this->Nata_hris_employee_model->hapusReviewScore($nik,$periode);
    	$hapusReview = $this->Nata_hris_employee_model->hapusReview($nik,$periode);
    	$id_review = array();
    	foreach ($id_aspek as $id) {
    		$data = array();
    		$data=array(
    			"nik"=>$this->input->post("nik"),
	           	"tanggal"=>date("Y-m-d H:i:s"),
	            "id_review_aspek"=>$id,
	            "periode"=>$this->input->post("periode")
	        );
    		if ($ratingValue[$num] == 5) {
    			$data['opsi_istimewa'] = 1;
    		}elseif($ratingValue[$num] == 4){
    			$data['opsi_memuaskan'] = 1;
    		}elseif($ratingValue[$num] == 3){
    			$data['opsi_cukup'] = 1;
    		}elseif($ratingValue[$num] == 2){
    			$data['opsi_buruk'] = 1;
    		}elseif($ratingValue[$num] == 1){
    			$data['opsi_buruk_sekali'] = 1;
    		}
    		
	        $num++;
	        
	        $insertreview = $this->Nata_hris_employee_model->insert_review($data);
	        $id_review[] = $insertreview;
    	}
        $dataupdate=array(
	        	"id_review"=>implode(',', $id_review),
	        	"nik"=>$this->input->post("nik"),
	        	"score"=>$this->input->post("nilai"),
	        	"hasil"=>$this->input->post("rata"),
	        	"hasil_akhir"=>$this->input->post("akhir"),
	        	"keterangan"=>$this->input->post("keterangan"),
	        	"tanggal"=>date("Y-m-d H:i:s"),
	        	"periode"=>$this->input->post("periode")
	        );
	        
        // print_r($dataupdate);
        // print_r($idreviewscore);

        $res=$this->Nata_hris_employee_model->insert_review360($dataupdate);
        if($res){
            $this->session->set_flashdata("msg",'success');
        } else {
            $this->session->set_flashdata("msg",'failed');
        }
        redirect('Employee/review360');
    }

	public function payslip()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(34,43);
			$nik=$this->session->userdata('nik');
			$nik2 = array('pa.nik'=>$nik);
			$data['dataPayslip'] = $this->Nata_hris_employee_model->dataPayrolApproveHistory($nik2)->result();
			$data['dataPerusahaan'] = $this->Nata_hris_employee_model->data_perusahaan($nik)->row();
			$data['content'] = 'employee/payslip';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}
	public function viewPayslip()
	{	
		$data['menuId']=array(34,43);
		$id_payroll=$this->input->post('id_payroll');
		$nik=$this->session->userdata('nik');
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');
		$nik2 = array('a.nik'=>$nik);
		$nik3 = array('a.nik'=>$nik,
					'tpa.bulan'=>$bulan,
					'tpa.tahun'=>$tahun
			);
		$nikktp=$this->session->userdata('nikktp');
		
		$data['datainformasigaji']= $this->Nata_hris_hr_model->dataInformasiGaji($nik2)->row();
		$data['datainformasigajitunjangan']= $this->Nata_hris_employee_model->data_informasi_tunjangan($nik);
		$data['data_GajiLainnyaRow']= $this->Nata_hris_employee_model->dataInformasiGajiTunjangan( $data['datainformasigaji']->nik)->num_rows();
		$data['dataPerusahaan'] = $this->Nata_hris_employee_model->data_perusahaan($nik)->row();
		$data['dataTunjangan'] = $this->Nata_hris_employee_model->data_informasi_tunjangan($nik);
		$data['dataJabatan'] = $this->Nata_hris_employee_model->data_karyawan_projek($nik2)->row();
		$data['dataNPWP'] = $this->Nata_hris_employee_model->data_view_npwp($nikktp)->row();
		$data['dataViewPayslip2'] = $this->Nata_hris_employee_model->data_payslip($nik2)->row();
		$data['dataViewPayslip']= $this->Nata_hris_hr_model->dataPegawaiDtlPayrollApprove($nik3)->row();
		$this->load->view('employee/view-payslip',$data);
		
	}
	// public function overtime()
	// {	
	// 	if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
	// 		$data['menuId']=array(34,44);
	// 		$nik=$this->session->userdata('nik');
	// 		$data['dataOvertime']=$this->Nata_hris_employee_model->data_overtime($nik)->result();
	// 		$data['content'] = 'employee/payroll/overtime';
	// 		$this->load->view('index',$data);
	// 	}else{
	// 		redirect('home');
	// 	}

	// }

	// public function tambahOvertime()
	// {	
	// 	if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
	// 			$data['menuId']=array(35,44);
	// 			$data['content'] = 'employee/payroll/form_tambah_overtime';
	// 			$this->load->view('index',$data);
	// 		}else{
	// 		redirect('home');
	// 	}
	// }
	// public function prosesTambahOvertime()
	// {	
	// 		$data = array( 
	// 				'nik' =>$this->input->post('nik'),
	// 				'tanggal' =>$this->input->post('tanggal'),
	// 				'jumlah_jam_lembur' =>$this->input->post('jumlah_jam_lembur'),
	// 				'title' =>$this->input->post('title'),
	// 				'keterangan' =>$this->input->post('keterangan'),
	// 				'status' =>$this->input->post('status')
	// 			);
	// 		$this->Nata_hris_employee_model->tambah_overtime($data);
		
	// 		echo "succes";
	// }
	// public function prosesHapusOvertime()
	// {	
	// 	$id=$this->input->post('id');
	// 	$this->Nata_hris_employee_model->hapusOvertime($id);
	// } 

	public function benefitInformation()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(35,45);
			$nik=$this->session->userdata('nik');
			// $data['datakaryawan']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			$data['dataKaryawanGaji'] = $this->Nata_hris_employee_model->data_informasi_tunjangan($nik);
			$data['dataKaryawanRow'] = $this->Nata_hris_employee_model->data_informasi_tunjangan($nik)->row();
			// $claim_time = 'claim_time';
			// $employee_share = 'employee_share';
			// $organization_share = 'organization_share';
			// $data['dataRembursement'] = $this->Nata_hris_employee_model->data_rembursement($nik);
			// $data['dataSettingClaim'] = $this->Nata_hris_employee_model->data_setting_claim($claim_time);
			// $data['dataEmployeeShare'] = $this->Nata_hris_employee_model->data_setting_claim($employee_share);
			// $data['dataOrganizationShare'] = $this->Nata_hris_employee_model->data_setting_claim($organization_share);
			// $data['dataAsuransi'] = $this->Nata_hris_employee_model->data_asuransi($nik);
			$data['content'] = 'employee/benefit-information';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}

	public function claimAjax()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(136,46);
			$nik=$this->session->userdata('nik');

			$requestData= $this->input->post();

			$columns = array( 
			// datatable column index  => database column name
				0 =>'tanggal', 
				1 => 'total',
				2 => 'id_claim_remburse',
				3 => 'status',
				4 => 'deskripsi'
			);

			$monthyear = $this->input->post('yearmonth');
			$dataTabelKlaim = $this->Nata_hris_employee_model->data_claim_remburseAjax($nik,'','',$monthyear);
			$totalData = $dataTabelKlaim->num_rows();
			$totalFiltered = $totalData;

			if (!empty($requestData['search']['value'])) {
				$dataTabelKlaim = $this->Nata_hris_employee_model->data_claim_remburseAjax($nik,$columns,$requestData,$monthyear);
				$totalFiltered = $dataTabelKlaim->num_rows();
			}else{
				$dataTabelKlaim = $this->Nata_hris_employee_model->data_claim_remburseAjax($nik,$columns,$requestData,$monthyear);
			}

			$data = array();
			$no = 0;
			foreach ($dataTabelKlaim->result() as $row) {
				// preparing an array
				$requestData['start']++;
				$nestedData=array();
				$no++;                 
				
				$nestedData[] = strftime("%d %B %Y",strtotime($row->tanggal));
				$nestedData[] = 'Rp. '.number_format($row->total,0,'.','.');
				$nestedData[] = $row->deskripsi;

				if ($row->status == '0') {
					$nestedData[] = '<label class="Rectangle-probation">Pengajuan</label>';
				}elseif($row->status == '1'){
					$nestedData[] = '<label class="Rectangle-permanent ">Diterima</label>';
				}elseif($row->status == '2'){
					$nestedData[] = '<label class="Rectangle-resign">Ditolak</label>';
				}elseif($row->status == '3'){
					$nestedData[] = '<label class="Rectangle-permanent">Sudah Cair</label>';
				}
				
				//$nestedData[] = '<form action="'. base_url().'Employee/viewClaimRemburse" method="post">
                                //     <input type="hidden" name="id" value="'.$row->id_claim.'">
                                //     <button type="submit"  class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button>
                                // </form>';


				 $nestedData[] = '<a href="javascript:;" onclick="view('.$row->id_claim.')"><button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button></a>';

				
				$data[] = $nestedData;
			}
			$json_data = array(
						"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
						"recordsTotal"    => intval( $totalData ),  // total number of records
						"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
						"data"            => $data   // total data array
						);

			echo json_encode($json_data);  // send data as json format
		}else{
			redirect('home');
		}

	}

	public function claim()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(136,46);
			$nik=$this->session->userdata('nik');
			$wh= array('a.nik'=>$nik);
			$data['datakaryawan']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			$saldo = 'saldo_claim';
			$data['dataClaimRemburse'] = $this->Nata_hris_employee_model->data_claim_remburse($wh);
			$data['dataClaimRemburseRow'] = $this->Nata_hris_employee_model->data_claim_remburse_row($wh);
			$data['dataSettingClaim'] = $this->Nata_hris_employee_model->data_setting_claim($saldo);
			$data['dataTotalClaim'] = $this->Nata_hris_employee_model->data_total_claim($nik);
			$data['content'] = 'employee/claim';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}

	}

	public function cetakClaimReimbursement($id){
        $wh=array("a.id_claim_remburse"=>$id);
        $data['dataKlaim']= $this->Nata_hris_employee_model->data_claim_remburse_row($wh);
        // $whdok=array("a.id_claim_remburse"=>$id);
        $data['dataKlaimFile']= $this->Nata_hris_employee_model->dataKlaimReimbursementFile($wh);
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "ClaimReimbursement".date("Ymd").".pdf";
        $this->pdf->load_view('cetakClaimReimbursementemployee', $data);
    }

	public function tambahCLaim()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(136,46);
				$nik=$this->session->userdata('nik');
				$wh= array('a.nik'=>$nik);
				$saldo = 'saldo_claim';
				$data['dataBenefit']=$this->Nata_hris_employee_model->data_benefit()->result();
				$data['dataSettingClaim'] = $this->Nata_hris_employee_model->data_setting_claim($saldo);
				$data['dataClaimRemburse'] = $this->Nata_hris_employee_model->data_claim_remburse($wh);
				$data['datakaryawan']=$this->Nata_hris_employee_model->data_employee($nik)->row();
				// $data['content'] = 'employee/claim/form_tambah_claim';
				$this->load->view('employee/claim/form_tambah_claim',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesTambahClaim()
	{	
		// $id_benefit=$this->input->post('id_benefit');
		// $jenis=$this->Nata_hris_employee_model->data_benefit_row($id_benefit)->row();
		$data = array();
		$result=array();
		$uploadData=array();

		$dataawal = array( 
					'total' =>$this->input->post('total'),
					'tanggal' =>$this->input->post('tanggal'),
					'nik' =>$this->input->post('nik'),
					'status' =>$this->input->post('status'),
					'deskripsi' =>$this->input->post('deskripsi')
				);

			if(!empty($_FILES['file_bukti_transaksi']['name'])){
                $filesCount = count($_FILES['file_bukti_transaksi']['name']);
                $id = $this->Nata_hris_employee_model->tambah_claim_remburse($dataawal);
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['file']['name']     = $_FILES['file_bukti_transaksi']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['file_bukti_transaksi']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_bukti_transaksi']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['file_bukti_transaksi']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['file_bukti_transaksi']['size'][$i];
                    
                    // File upload configuration
                    $uploadPath = 'assets/foto/claimremburse/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                    $config['overwrite']=TRUE;
                    
                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        
                        $uploadData[$i]['id_claim_remburse'] = $id;
                        $uploadData[$i]['file_bukti_transaksi'] = $fileData['file_name'];
                        $uploadData[$i]['created_by_nik'] = $this->input->post('nik');
                        $uploadData[$i]['created_by_date'] = $this->input->post('tanggal');
                        
                      
                        
						// print_r($dataawal);
					
                    } else {
                        //echo "errpr".$this->upload->display_errors();
                        $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Claim Gagal Ditambahkan Luar Upload");
                        $this->session->set_flashdata($result);
						redirect('Employee/claim');
                        
                    }

                }

                
                
                // if(!empty($uploadData)){
                //     // Insert files data into the database
                    
                    
                //     // Upload status message
                //     // if ($insert == true) {
                //     // 	$result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Permohonan Cuti Berhasil Ditambahkan");
                //     // }else{
                //     // 	$result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Cuti Gagal Ditambahkan");
                //     // }
                    
                // }
                // else{
                // 	$result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Cuti Gagal Ditambahkan");
                // }
            }else{
				$result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Claim If 2 Gagal Ditambahkan");
            }
            // redirect('Employee/claim');
            $insert = $this->Nata_hris_employee_model->tambah_claim_remburse_detail($uploadData);
        	if ($id > 0 && $insert == true) {
						
						// If file upload form submitted
			            // print_r($dataawal);
			            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Permohonan Claim Berhasil Ditambahkan");
			   		$this->session->set_flashdata($result);
					//print_r($_FILES);
					//;
				  
					}else{
							$result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Claim If 1 Gagal Ditambahkan");
			        }
           redirect('Employee/claim');

        // print_r($result);
           // print_r($id);
		// $this->session->set_flashdata($result);
		// redirect('Employee/claim');
	}
		
		
	
	public function prosesHapusClaim()
	{
		$id_claim=$this->input->post('id_claim');
		
			$select = $this->Nata_hris_employee_model->data_view_claim_remburse($id_claim);
			foreach ($select->result() as $sel) {
				$dokumen = $sel->file_bukti_transaksi;
            	$gambar= $dokumen;
				$path = 'assets/foto/claimremburse/'.$gambar;
            	unlink($path);
			}
			$this->Nata_hris_employee_model->hapusClaimRembursefile($id_claim);
			$res = $this->Nata_hris_employee_model->hapusClaimRemburse($id_claim);
			$result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Permohonan Cuti Berhasil Ditambahkan");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Cuti Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);
			redirect('Employee/claim');
		
			
	}

	public function Overtime(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(136,145);
			$nik = $this->session->userdata('nik');
			$where = array('a.nik'=>$nik);
			$data['dataOvertime'] = $this->Nata_hris_employee_model->data_overtime_lembur($where);
			
			$data['content'] = 'employee/overtime';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }

    public function PermohonanOvertime(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(136,146);
			$nik = $this->session->userdata('nik');
			$wh = array('a.nik_atasan'=> $nik);
			$data['dataOvertime'] = $this->Nata_hris_employee_model->data_overtime_lembur($wh);
			$data['content'] = 'employee/permohonanovertime';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }

    public function ambilNamakaryawan(){
        $wh=array("a.nik"=>$this->input->post("nik"));
        $dataLoker = $this->Nata_hris_employee_model->dataKaryawanAbsensiKontrak($wh)->row();
        $callback = array('data_karyawan'=>$dataLoker);
        echo json_encode($callback);
    }

    public function viewOvertime($a)
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		$data['menuId']=array(136,46);
		$id=array('a.id_overtime'=>$a);
		//$id_claim=$this->input->post('id');
		//$data['content'] = 'employee/view-claim-remburse';
		$data['dataViewOvertime'] = $this->Nata_hris_employee_model->data_overtime_lembur($id);
		$data['dataOvertimeRow'] = $this->Nata_hris_employee_model->data_overtime_lembur($id)->row();
		$this->load->view('employee/view-overtime',$data);
		}else{
			redirect('home');
		}
	}

	public function viewPermohonanOvertime($a)
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		$data['menuId']=array(136,46);
		$id=array('a.id_overtime'=>$a);
		//$id_claim=$this->input->post('id');
		//$data['content'] = 'employee/view-claim-remburse';
		$data['dataViewOvertime'] = $this->Nata_hris_employee_model->data_permohonan_overtime($id);
		$data['dataOvertimeRow'] = $this->Nata_hris_employee_model->data_permohonan_overtime($id)->row();
		$this->load->view('employee/view-permohonanovertime',$data);
		}else{
			redirect('home');
		}
	}

	public function ubahstsovertime(){
		$id=$this->input->post('id');
		$sts=$this->input->post('sts');
		$alasan=$this->input->post('alasan');
		$res = $this->Nata_hris_employee_model->ubahstsovertime($id,$sts,$alasan);
        $result=array();
		if ($res > 0) {
	   	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Overtime Berhasil di Rubah");
	   	   $this->session->set_flashdata($result);
	   	}else{
	   	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Overtime Gagal di Rubah");
	   	   $this->session->set_flashdata($result);
	   	}
	}

	public function ubahstscuti(){
		$id=$this->input->post('id');
		$sts=$this->input->post('sts');
		$nik=$this->input->post('nik');
		$alasan=$this->input->post('alasan');
		$res = $this->Nata_hris_employee_model->ubahstscuti($id,$sts,$alasan);
        
		if ($res > 0) {
	   	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Permohonan Cuti Berhasil di Rubah");
	   	   
	   	}else{
	   	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Cuti Gagal di Rubah");
	   	  	
	   	}

	   	if($sts=='2'){
	        $wh=array('a.nik'=>$nik,'a.id_absensi_leave'=>$id);
	        $tamp=$this->Nata_hris_employee_model->data_leave($wh)->row();
	        $wh2=array('a.nik'=>$nik,'a.id_leave_kategori'=>$tamp->id_leave_kategori);
	        $jumlahhari=$this->Nata_hris_employee_model->datadtlcutipribadi($wh2)->row();  
	            $start_date = new DateTime($tamp->tanggal);
	            $end_date = new DateTime($tamp->sampe_tanggal);
	            $interval = $start_date->diff($end_date);
	            $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
	            $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
	            $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
	            $awal=$interval->days+1;
	        $dt=array('a.jumlah_hari'=>$awal+$jumlahhari->jumlah_hari);
	        $this->Nata_hris_employee_model->upd_data('trx_detail_cutipribadi_karyawan a',$dt,$wh2);
	        $this->Nata_hris_employee_model->ubahstscuti($id,$sts,$alasan);
	    }else{
	         $this->Nata_hris_employee_model->ubahstscuti($id,$sts,$alasan);
	    }
	}

    public function tambahOvertime()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
				$data['menuId']=array(136,145);
				$nik=$this->session->userdata('nik');
				$wh=array('nik'=>$nik);
				$where=array('a.nik'=>$nik);
				$data['ambildataKaryawan']=$this->Nata_hris_employee_model->ambildataKaryawan();
				$data['dataKaryawan']=$this->Nata_hris_employee_model->dataKaryawan();
				$data['dataKaryawanRow']=$this->Nata_hris_employee_model->dataKaryawan($wh)->row();
				$data['dataAtasan'] = $this->Nata_hris_employee_model->data_atasan($where)->row();
				$this->load->view('employee/overtime/form_ajukan_overtime',$data);
			}else{
			redirect('home');
		}
	}

	public function prosesOvertime(){
		$jammulai = $this->input->post('awal');
		$jamakhir = $this->input->post('akhir');
		$start_date = new DateTime($jammulai);
		$since_start = $start_date->diff(new DateTime($jamakhir));
		$minutes = $since_start->days * 24 * 60;
		$minutes += $since_start->h * 60;
		$minutes += $since_start->i;

		$data = array( 
				'nik' =>$this->input->post('nik'),
				'nik_atasan' =>$this->input->post('nik_atasan'),
				'tanggal' =>$this->input->post('tanggal'),
				'jam_mulai' =>$jammulai,
				'jam_selesai' =>$jamakhir,
				'total_menit' =>$minutes,
				'keterangan' =>$this->input->post('keterangan'),
				'status'=>'0'
			);

		if ( $_FILES['dokumen']['name'] != '' ) {
			$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['dokumen']['name']);
			$filename = str_replace('(', '', $filename);
			$filename = str_replace(')', '', $filename);
			$data['dokumen'] = $filename;

			// $result = $this->M_article->insert($data);

				$config['upload_path']          = 'assets/img/overtime/';
				$config['allowed_types']        = 'jpg|png|pdf';
				$config['file_name']        = $filename;
				$config['overwrite'] 	= TRUE;
				// $config['max_size']             = 100;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

	            if ($this->upload->do_upload('dokumen')) {
	            	
	            }
		}

		
		$res = $this->Nata_hris_employee_model->tambah_overtime($data);
		$result=array();
		if ($res > 0) {
       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Overtime Berhasil di Tambah");
       	   $this->session->set_flashdata($result);
       	}else{
       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Overtime Gagal di Tambah");
       	   $this->session->set_flashdata($result);
       	}
       	// echo $diff;
		// print_r($data);
		redirect('Employee/Overtime');
		//echo "succes";
	}

	public function dowloadFileOvertime(){
		$path = $this->input->post('path');
		$claim = $this->input->post('overtime');
		$id = $this->input->post('id_overtime_detail_file');
		$this->load->helper('download');
		$var = file_get_contents(base_url($path));
		force_download($claim,$var,$id);
	}

	public function dowloadFileCuti(){
		$path = $this->input->post('path');
		$cuti = $this->input->post('cuti');
		$id = $this->input->post('id_cuti_detail_file');
		$this->load->helper('download');
		$var = file_get_contents(base_url($path));
		force_download($claim,$var,$id);
	}

	public function dowloadFileKlaim(){
		$path = $this->input->post('path');
		$claim = $this->input->post('claim');
		$id = $this->input->post('id_claim_detail_file');
		$this->load->helper('download');
		$var = file_get_contents(base_url($path));
		force_download($claim,$var,$id);
		
	}
	public function viewClaimRemburse($a)
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		$data['menuId']=array(136,46);
		//$id_claim=$this->input->post('id');
		//$data['content'] = 'employee/view-claim-remburse';
		$data['dataViewClaimRemburse'] = $this->Nata_hris_employee_model->data_view_claim_remburse($a)->row();
		$data['dataViewClaimRemburses'] = $this->Nata_hris_employee_model->data_view_claim_remburse($a);
		$this->load->view('employee/view-claim-remburse',$data);
		}else{
			redirect('home');
		}
	}
	public function viewRemburse()
	{	
		$data['menuId']=array(35,46);
		$id_claim=$this->input->post('id_claim');
		$jenis_claim=$this->input->post('jenis_claim');
		if($jenis_claim=='remburse'){
			$data['dataViewRemburse'] = $this->Nata_hris_employee_model->data_view_claim_remburse($id_claim);	
		}else{
			$data['dataViewRemburse'] = $this->Nata_hris_employee_model->data_view_claim_asuransi($id_claim);	
		}
		$this->load->view('employee/view-remburse',$data);
		
	}
    public function announcement()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,0);
			$data['content'] = 'employee/announcement';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}
    public function settings()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(38,0);
				$data['content'] = 'employee/settings';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}
	public function prosesUbahPassword(){
		$nik=$this->session->userdata('nik');
		$id_jenis_user=$this->session->userdata('user_type');
		 		$data = array( 
					'password' =>$this->input->post('password_konf')
					
				);
				$where=array( 
					'id_jenis_user' =>$id_jenis_user,
					'nik' =>$nik
				);
			$this->Nata_hris_employee_model->ubah_password($data,$where);
			echo "succes";
	}
    public function berita(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,104);
            $wh=array("status"=>"1");
			$data['dataBerita'] = $this->Nata_hris_employee_model->data_berita($wh);
			$data['content'] = 'employee/berita';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }
    public function viewBerita(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,104);
			$id=$this->input->post('id');
			$data['dataviewberita'] = $this->Nata_hris_employee_model->dataViewBerita($id)->row();
			$data['dataviewberita2'] = $this->Nata_hris_employee_model->dataViewBerita2($id);
			$this->load->view('employee/view-berita',$data);
		}else{
			redirect('home');
		}
    }
    public function jadwalPelatihanAjax(){
    	if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(100,102);
			$nik=$this->session->userdata('nik');
			$requestData= $this->input->post();
			$columns = array( 
			// datatable column index  => database column name
				0 =>'nama_program', 
				1 => 'lokasi',
				2 => 'tanggal_mulai',
				3 => 'tanggal_selesai'
			);
			$monthyear = $this->input->post('yearmonth');
			$dataTabelPelatihan = $this->Nata_hris_employee_model->ambildataPelatihanAjax('','',$monthyear);
			$totalData = $dataTabelPelatihan->num_rows();
			$totalFiltered = $totalData;

			if (!empty($requestData['search']['value'])) {
				$dataTabelPelatihan = $this->Nata_hris_employee_model->ambildataPelatihanAjax($columns,$requestData,$monthyear);
				$totalFiltered = $dataTabelPelatihan->num_rows();
			}else{
				$dataTabelPelatihan = $this->Nata_hris_employee_model->ambildataPelatihanAjax($columns,$requestData,$monthyear);
			}
			$data = array();
			$no = 0;
			foreach ($dataTabelPelatihan->result() as $row) {
				// preparing an array
				$requestData['start']++;
				$nestedData=array();
				$no++;

				$nestedData[] = $row->nama_program;
				$nestedData[] = $row->lokasi;
				$nestedData[] =  strftime(" %d %B %Y",strtotime($row->tanggal_mulai));
				$nestedData[] =  strftime(" %d %B %Y",strtotime($row->tanggal_selesai));
				
				
				$data[] = $nestedData;
			}
			$json_data = array(
				"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
				"recordsTotal"    => intval( $totalData ),  // total number of records
				"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
				"data"            => $data   // total data array
			);

			echo json_encode($json_data);  // send data as json format

		}else{
			redirect('home');
		}
    }
    public function jadwalPelatihan(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(100,102);
			$nik=$this->session->userdata('nik');
			$data['content'] = 'employee/employee-jadwalPelatihan';
			//$data['dataemployee']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			$data['datapelatihan']=$this->Nata_hris_employee_model->dataPelatihan();
			
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }
    public function pengumumanPerusahaan(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,103);
			$data['dataPengumumanPerusahaan'] = $this->Nata_hris_employee_model->data_pengumuman_perusahaan();
			$data['content'] = 'employee/employee-pengumumanPerusahaan';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }
     public function DetailPengumumanPerusahaan($id){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,103);
			$data['dataPengumumanPerusahaan'] = $this->Nata_hris_employee_model->data_pengumuman_perusahaan($id)->row();
			//$data['content'] = 'employee/view-pengumumanPerusahaan';
			$this->load->view('employee/view-pengumumanPerusahaan',$data);
		}else{
			redirect('home');
		}
    }
    public function kuesioner(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,105);
			$nik=$this->session->userdata('nik');
			$data['dataemployee']=$this->Nata_hris_employee_model->data_employee($nik)->row();
            $wh=array("status"=>'1');
			$data['dataKuesioner'] = $this->Nata_hris_employee_model->data_kuesioner_table("",$wh);
			$data['content'] = 'employee/employee-kuesioner';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }

    public function ProsesKuesioner($id){
    	$tmpid = array('id_questioner'=>$id);
    	$data = array('hasil_isi'=>1);
    	$result = $this->Nata_hris_employee_model->update_questioner($tmpid,$data);
    	if($result){
            $this->session->set_flashdata("msg",'success');
        } else {
            $this->session->set_flashdata("msg",'failed');
        }
        redirect('Employee/kuesioner');
    }

    public function isiKuesioner($a){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,105);
			// $nik=$this->session->userdata('nik');
			// $data['dataemployee']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			// $data['dataKuesioner'] = $this->Nata_hris_employee_model->data_kuesioner($data['dataemployee']->id_departemen);
			//$id=$this->input->post('id');
			//$nik=$this->session->userdata('nik');
			//$data['content'] = 'employee/employee-isi-kuesioner';
			$data['datakuesioner'] = $this->Nata_hris_employee_model->dataKuesioner($a)->row();
			$data['datapertanyaankuesioner'] = $this->Nata_hris_employee_model->dataPertanyaanKuesioner($a);
			$this->load->view('employee/employee-isi-kuesioner',$data);
		}else{
			redirect('home');
		}
    }

    public function prosesQuestionerPertanyaan(){
    	$id_questioner_pertanyaan = explode(',',$_POST['id_questioner_pertanyaan']);
    	$ratingValue = explode(',', $_POST['ratingValue']);
    	$num = 0;
    	$nik = $this->session->userdata('nik');
    	$id_questioner = array('id_questioner'=>$this->input->post('id_questioner'));
    	$id_questioner_array = array();
    	foreach ($id_questioner_pertanyaan as $id) {
    		$data = array();
    		$data=array(
    			"nik"=>$this->session->userdata('nik'),
	           	"tanggal"=>date("Y-m-d H:i:s"),
	            "id_questioner_pertanyaan"=>$id,
	            
	        );
    		if ($ratingValue[$num] == 5) {
    			$data['opsi_istimewa'] = 1;
    		}elseif($ratingValue[$num] == 4){
    			$data['opsi_memuaskan'] = 1;
    		}elseif($ratingValue[$num] == 3){
    			$data['opsi_cukup'] = 1;
    		}elseif($ratingValue[$num] == 2){
    			$data['opsi_buruk'] = 1;
    		}elseif($ratingValue[$num] == 1){
    			$data['opsi_buruk_sekali'] = 1;
    		}
    		
	        $num++;
	        
	        $insertquestioner = $this->Nata_hris_employee_model->insert_questioner($data);
	        // $id_questioner_array[] = $insertquestioner;
	        
    	}

    	// $dataupdate=array(
	    //     	// "status"=>'1',
	    //     	"nik"=>$this->session->userdata('nik')
	    //     );

        // $res=$this->Nata_hris_employee_model->update_questioner($id_questioner,$dataupdate);
        $result=array();
        
		$result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kuesioner Berhasil di Tambah");
		$this->session->set_flashdata($result);
        
        // print_r($id_questioner);
        redirect('Employee/kuesioner');
    }

    public function viewKuesioner(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,105);
			// $nik=$this->session->userdata('nik');
			// $data['dataemployee']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			// $data['dataKuesioner'] = $this->Nata_hris_employee_model->data_kuesioner($data['dataemployee']->id_departemen);
			$id=$this->input->post('id');
			$data['content'] = 'employee/view-kuesioner';
			$data['datakuesioner'] = $this->Nata_hris_employee_model->dataKuesioner($id)->row();
			$data['dataQuesionerLog'] = $this->Nata_hris_employee_model->dataPertanyaanKuesionerLog($id)->row();
			$data['dataQuesionerLogRow'] = $this->Nata_hris_employee_model->dataPertanyaanKuesionerLog($id);
			$data['datapertanyaankuesioner'] = $this->Nata_hris_employee_model->dataPertanyaanKuesioner($id);
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }

    public function jenjangPelatihanAjax(){
    	if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(100,101);
			$nik=$this->session->userdata('nik');
			
			$requestData= $this->input->post();

			$columns = array( 
			// datatable column index  => database column name
				0 =>'nama_program', 
				1 => 'nama_pelatih',
				2 => 'lokasi',
				3 => 'tanggal_mulai'
				

			);

			$monthyear = $this->input->post('yearmonth');
			$dataTabelPelatihan = $this->Nata_hris_employee_model->ambildataPelatihanAjax('','',$monthyear);
			$totalData = $dataTabelPelatihan->num_rows();
			$totalFiltered = $totalData;

			if (!empty($requestData['search']['value'])) {
				$dataTabelPelatihan = $this->Nata_hris_employee_model->ambildataPelatihanAjax($columns,$requestData,$monthyear);
				$totalFiltered = $dataTabelPelatihan->num_rows();
			}else{
				$dataTabelPelatihan = $this->Nata_hris_employee_model->ambildataPelatihanAjax($columns,$requestData,$monthyear);
			}

			$data = array();
			$no = 0;
			foreach ($dataTabelPelatihan->result() as $row) {
				// preparing an array
				$requestData['start']++;
				$nestedData=array();
				$no++;

				$nestedData[] = $row->nama_program;
				$nestedData[] = $row->nama_pelatih;
				$nestedData[] = $row->lokasi;
				$nestedData[] =  strftime(" %d %B %Y",strtotime($row->tanggal_mulai));
				
				$nestedData[] = '<form action="'. base_url().'Employee/ViewJenjangPelatihan" method="post">
                                    <input type="hidden" name="id" value="'.$row->id_training_jadwal.'">
                                    <input type="hidden" name="nik" value="'.$this->session->userdata('nik').'">
                                    <button type="submit" class="btn btn-green">Lihat</button>
                                </form>';
				
				$data[] = $nestedData;
			}
			$json_data = array(
				"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
				"recordsTotal"    => intval( $totalData ),  // total number of records
				"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
				"data"            => $data   // total data array
			);

			echo json_encode($json_data);  // send data as json format
		}else{
			redirect('home');
		}
    }

    public function jenjangPelatihan(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(100,101);
			$data['content'] = 'employee/employee-jenjangPelatihan';
			$nik=$this->session->userdata('nik');
			$data['dataemployee']=$this->Nata_hris_employee_model->data_employee($nik)->row();
			$data['datapelatihan']=$this->Nata_hris_employee_model->dataPelatihan($data['dataemployee']->id_departemen);
			$data['ambildatapelatihan']=$this->Nata_hris_employee_model->ambildataPelatihan();
			$data['datapelatihanjenjang']=$this->Nata_hris_employee_model->dataPelatihan($data['dataemployee']->id_departemen)->row();
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }   
    public function ViewJenjangPelatihan(){
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(100,101);
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$data['content'] = 'employee/view-jenjangPelatihan';
			$data['datajenjangpelatihan']=$this->Nata_hris_employee_model->dataJenjangPelatihan($id)->row();
			$data['datajenjangpelatihanpeserta']=$this->Nata_hris_employee_model->dataJenjangPelatihan($id);
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
    }

    public function ambilPelatihan(){
    	$id_training= array('id_training_jadwal'=>$this->input->post('id_training_jadwal'));
    	$status = array('status'=>$this->input->post('status'));
    	$data= array(
    		'nik' =>$this->session->userdata('nik'),
    		'status'=>$this->input->post('status'),
    		'id_training_jadwal'=>$this->input->post('id_training_jadwal')
    		);

    	$res = $this->Nata_hris_employee_model->tambah_pelatihan($data);
    	if($res){
            $this->session->set_flashdata("msg",'success');
        } else {
            $this->session->set_flashdata("msg",'failed');
        }
        redirect('Employee/jenjangPelatihan');
    }

    public function cariBerita()
			{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,104);
			$judul=$this->input->post('cari');
			$wh=array('judul'=>$judul);
			$wh1=array('status'=>'1');
			$data['content'] = 'employee/berita';
			$databerita= $this->Nata_hris_hr_model->dataBerita($wh,$wh1);
			foreach ($databerita->result() as $dtBerita) { 


           echo ' <div class="row">
                  <div class="col-12 col-md-2 text-center">
                      <img src="'.base_url().'assets/img/berita/'.($dtBerita->image!=''?$dtBerita->image:'noimage.png') .'" class="img-fluid" />
                  </div>
                  <div class="col-sm-8 col-md-8 m-t-10">
                      <h6>'.$dtBerita->judul.'</h6>
                      <p class="fz-14-isi">'.$dtBerita->location.','.strftime(" %d %B %Y",strtotime($dtBerita->tanggal)).'</p>
                      <p class="fz-14-isi">'.substr($dtBerita->deskripsi,0,175) .'...</p>
                    <span>
                        <button class="btn btn-aksi  col-md-3 selengkapnya" data-id="'.$dtBerita->id_berita.'" type="button"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Selengkapnya </button> 
                    </span>
                  </div>
                  <div class="col-sm-2 col-md-2">
                     
                  </div>
              </div> 
              <hr> ';
         } 
			//$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function cetakgaji($bulan,$tahun){
		$data = array();
		// $nik = '0204151';
		// $nikktp = '3205171707980008';
		$nik = $this->session->userdata('nik');
		$nikktp = $this->session->userdata('nikktp');
		$nik2 = array('a.nik'=>$nik);
		$nik3 = array('a.nik'=>$nik,
					'tpa.bulan'=>$bulan,
					'tpa.tahun'=>$tahun	
				);
		$nikkes = array('ko.nik'=>$nik);
		$nikktp2 = array('nik_ktp'=>$nikktp);

		// $id_payroll=1;
		// Untuk Perhitungan PPH
		$id_setting = 9;

		$id_settingarray = array('id_setting'=>$id_setting);
		$data['nikktp'] = $nikktp;
		$bulan = "a.tanggal_mulai like '".date('Y-m')."%'";
		
		$data['datainformasigaji']= $this->Nata_hris_hr_model->dataInformasiGaji($nik2)->row();
		$data['datainformasigajitunjangan']= $this->Nata_hris_employee_model->data_informasi_tunjangan($nik);
		$data['data_GajiLainnyaRow']= $this->Nata_hris_employee_model->dataInformasiGajiTunjangan( $data['datainformasigaji']->nik)->num_rows();

		$data['dataPerusahaan'] = $this->Nata_hris_employee_model->data_perusahaan($nik)->row();
		$data['dataAbsensiEmployee'] = $this->Nata_hris_employee_model->data_absensi_employee($nik,'1',$bulan);
		$data['dataTunjangan'] = $this->Nata_hris_employee_model->data_informasi_tunjangan($nik);
		$data['dataMasterTunjangan'] = $this->Nata_hris_employee_model->data_tunjangan_muncul($nik);
		$data['dataTunjanganRow'] = $this->Nata_hris_employee_model->data_informasi_tunjangan($nik)->row();
		$data['dataJabatan'] = $this->Nata_hris_employee_model->data_karyawan_projek($nik2)->row();
		$data['datainformasigaji']= $this->Nata_hris_hr_model->dataInformasiGaji($nik2)->row();
		$data['datainformasigajitunjangan']= $this->Nata_hris_employee_model->data_informasi_tunjangan($nik);
		$data['data_GajiLainnyaRow']= $this->Nata_hris_employee_model->dataInformasiGajiTunjangan( $data['datainformasigaji']->nik)->num_rows();
		// $data['dataBPJS'] = $this->Nata_hris_employee_model->data_bpjs($nikktp2)->num_rows();
		// $data['dataBPJSRes'] = $this->Nata_hris_employee_model->data_bpjs($nikktp2);
		// $data['dataBPJSRow'] = $this->Nata_hris_employee_model->data_bpjs($nikktp2)->row();
		// $data['dataBPJSKesRow'] = $this->Nata_hris_employee_model->data_bpjs_kes($nikkes)->row();
		// $data['dataBPJSTKRow'] = $this->Nata_hris_employee_model->data_bpjs_tk($nikkes)->row();
		// $data['dataBPJSPPHRow'] = $this->Nata_hris_employee_model->data_pph($nikkes)->row();
		$data['dataKlien'] = $this->Nata_hris_employee_model->data_karyawan_klien($nik2)->row();
		$data['dataViewPayslip'] = $this->Nata_hris_employee_model->data_view_payslip($nik2);
		$data['dataSettingRow'] = $this->Nata_hris_employee_model->data_setting($id_settingarray)->row();
		$data['dataViewPayslipall'] = $this->Nata_hris_employee_model->data_payslip($nik2)->row();
		$data['dataViewPayslip']= $this->Nata_hris_hr_model->dataPegawaiDtlPayrollApprove($nik3)->row();
		// $data['dataLogoPerusahaan'] = $this->Nata_hris_employee_model->data_payslip($nik2)->row();
		$this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Gaji".date("Ymd").".pdf";
        $this->pdf->load_view('samplegaji', $data);

		// $viewfile = $this->load->view('samplegaji', $data, TRUE);
		// echo $viewfile;
        // pdf_create($viewfile, 'Gaji'.date("YmdHis"),false,"legal","portrait");
	}

}
