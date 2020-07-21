<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

			$data['content'] = 'user/Dashboard';
			$this->load->view('index',$data);
		}else{
			redirect('home');
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
				$data['content'] = 'user/employee-information';
				$this->load->view('index',$data);
			}else{
			redirect('home');
		}
	}

	public function EditInformation()
    {   
        if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
           	$data['menuId']=array(4,5);
           
            // $data['content'] = 'user/edit-information';
            $data['datakaryawan'] = $this->Nata_hris_hr_model->dataKaryawan();
            $this->load->view('user/edit-information',$data);
        }else{
            redirect("home/login"); 
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
				$data['content'] = 'user/certificate';
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
			$data['content'] = 'user/course';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function Examp()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(32,0);
			$data['content'] = 'user/examp';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function Forum()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(34,0);
			$data['content'] = 'user/forum';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function DetailForum()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(34,0);
			$data['content'] = 'user/detailforum';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function DetailForumKoment()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(34,0);
			$data['content'] = 'user/forumdetailkoment';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function Score()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(37,0);
			$data['content'] = 'user/score';
			$this->load->view('index',$data);
		}else{
			redirect('home');
		}
	}

	public function jsonDataSample(){
        $dataPengumuman = $this->Nata_hris_hr_model->datPengumumanPerusahaan();
        $dataalarmkontrak= $this->Nata_hris_hr_model->dataAlarmKontrakAll();
        $dataalarmhabiskontrak= $this->Nata_hris_hr_model->dataAlarmHabisKontrak();
        $dataUltah = $this->Nata_hris_hr_model->dataUltah();
        $a=array();
        foreach ($dataPengumuman->result() as $dt) {
                $a[]=array(
                    "title"=>$dt->judul,
                    "start"=>$dt->tanggal_mulai,
                    "end"=>$dt->tanggal_selesai,
                    "className"=> 'bg-info'
                    );
        }    
        foreach ($dataalarmkontrak->result() as $dt) {
                $a[]=array(
                    "title"=>$dt->status_pegawai,
                    "start"=>$dt->tanggal_keluar,
                     "className"=> 'bg-danger'
                    );
        } 
        foreach ($dataalarmhabiskontrak->result() as $dt) {
            $a[]=array(
                "title"=>"Nik : ".$dt->nik." ".$dt->nama_panggilan,
                "start"=>$dt->tanggal_keluar,
                 "className"=> 'bg-danger'
                );
        }    
        foreach ($dataUltah->result() as $dt) {
            $exstart=explode('-',$this->input->post('start'));
            $exend=explode('-',$this->input->post('end'));
            
            $ex=explode('-', $dt->tanggal_lahir);
            // print_r($exstart[1]); 
                $a[]=array(
                    "id"=>$dt->id_karyawan,
                    "title"=>"BDay ".$dt->nama_panggilan,
                    "start"=>$exstart[0]."-".$ex[1]."-".$ex[2],
                    "className"=> 'bg-warning',
                    "repeat"=>2
                    );
            if($exstart[0] != $exend[0]){
                $a[]=array(
                    "id"=>$dt->id_karyawan,
                    "title"=>"BDay ".$dt->nama_panggilan,
                    "start"=>$exend[0]."-".$ex[1]."-".$ex[2],
                    "className"=> 'bg-warning',
                    "repeat"=>2
                    );
            }
        }        
                echo json_encode($a);
    }

	public function Schedule()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' && $this->session->userdata('nik')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(96,0);
			$data['content'] = 'user/schedule';
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
	        redirect('User/myInformation');

	}

	public function settings()
	{	
		if($this->session->userdata('user_type')==1 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(38,0);
				$data['content'] = 'user/settings';
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

}
