<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HR extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
        $model=array("M_home","My_model","Nata_hris_hr_model","Nata_hris_employee_model");
		$this->load->model($model);
        $helper=array("form","url");
        $this->load->helper($helper);
        $lib=array("session","form_validation","Spreedsheet","menu","pdf");
        $this->load->library($lib);
        $this->load->library('Csvimport');
	}

	public function index()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login' ){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){
                $data['dataAkses'] = $this->menu->getAkses(64);
 				$data['menuId']=array(64);

 				$wh='(date(a.tanggal)=date(now()) or date(a.sampe_tanggal)=date(now()))';

 				$wh2=array('a.tanggal'=>date('Y-m-d'));
                $wh3=array('a.sampe_tanggal'=>date('Y-m-d'));
                $wh1=array('a.status'=>'1');

                $data['dataOvertime'] = $this->Nata_hris_employee_model->data_overtime_lembur("");
                $data['dataAtasaCutiApproval'] = $this->Nata_hris_employee_model->data_leave_request2("");

                
                $data['datapermohonancuti'] = $this->Nata_hris_hr_model->dataPermohonanCutidashboard($wh,$wh1);

                $data['datatenagakerja'] = $this->Nata_hris_hr_model->dataTenagaKerja();
 				$data['dataalarmkontrak'] = $this->Nata_hris_hr_model->dataAlarmKontrak();
                $data['dataalarmkontrakPKWT'] = $this->Nata_hris_hr_model->dataAlarmKontrakPKWT();
                $data['dataalarmkontrakPKWTT'] = $this->Nata_hris_hr_model->dataAlarmKontrakPKWTT();
                 $data['dataalarmkontrakall']= $this->Nata_hris_hr_model->dataAlarmKontrakAll();
 				$wh=array('a.id_master_jenis_project >'=>'0');
				$wh2=array();
 				$data['dataloker'] = $this->Nata_hris_hr_model->dataLoker($wh,$wh2);
                $data['dataloker2'] = $this->Nata_hris_hr_model->dataLoker2();
 				$data['dataAbsensiEmployeeSakit'] = $this->Nata_hris_hr_model->data_absensi_employee('3');
				$data['dataAbsensiEmployeeBolos'] = $this->Nata_hris_hr_model->data_absensi_employee('0');
				$data['dataAbsensiEmployee'] = $this->Nata_hris_hr_model->data_absensi_employee('1');
				$data['dataAbsensiLeaveRow'] = $this->Nata_hris_hr_model->data_leave_request('1');
                $data['dataPengumumanHariIni']=$this->Nata_hris_employee_model->data_pengumumanhariini();
				$data['dataPengumuman']=$this->Nata_hris_employee_model->data_pengumuman();
                $data['dataTask']=$this->Nata_hris_employee_model->data_task();
				//grafik
				$data['dataGrafikAktif']= $this->Nata_hris_hr_model->data_grafik_aktif(date('Y'));
				$data['dataGrafikTurnover']= $this->Nata_hris_hr_model->data_grafik_turnover(date('Y'));
				$data['dataGrafikPie']= $this->Nata_hris_hr_model->data_grafik_pie(date('Y'));

 				$data['content'] = 'hr/Dashboard';
 				$this->load->view('index',$data);
 			}else if($this->session->userdata('user_type')==6){
 				$data['menuId']=array(109);
 				$data['content'] = 'hr/Dashboard';
 				$this->load->view('index',$data);
 			}else{
 				redirect("home/login");	
 			}
 		}else{
			redirect("home/login");	
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
    public function jsonDataSampleUser(){
       // $dataPengumuman = $this->Nata_hris_hr_model->datPengumumanPerusahaan();
        //$dataalarmkontrak= $this->Nata_hris_hr_model->dataAlarmKontrakAll();
        $dataUltah = $this->Nata_hris_hr_model->dataUltah();
        $a=array();
        // foreach ($dataPengumuman->result() as $dt) {
        //         $a[]=array(
        //             "title"=>$dt->judul,
        //             "start"=>$dt->tanggal_mulai,
        //             "end"=>$dt->tanggal_selesai,
        //             "className"=> 'bg-info'
        //             );
        // }    
        // foreach ($dataalarmkontrak->result() as $dt) {
        //         $a[]=array(
        //             "title"=>$dt->status_pegawai,
        //             "start"=>$dt->tanggal_keluar,
        //              "className"=> 'bg-danger'
        //             );
        // }   
        foreach ($dataUltah->result() as $dt) {
            $exstart=explode('-',$this->input->post('start'));
            $exend=explode('-',$this->input->post('end'));
            
            $ex=explode('-', $dt->tanggal_lahir);
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

     public function ambilPO(){
        $wh="";
        if($this->input->post("id_client")!='0'){
            $wh=array("b.id_master_perusahaan"=>$this->input->post("id_client"));
        }else{
            $wh="";
        }
        $dataPO = $this->Nata_hris_hr_model->data_po_marketing($wh);
        $html = "<option   value='0'>-- Pilih Kontrak --</option>";
        foreach($dataPO->result() as $dtl){
            $html .= "<option value='".$dtl->id_projek_order."'>".$dtl->no_projek_order."</option>"; 
        }
        $callback = array('data_po'=>$html);
        echo json_encode($callback);
    }
    public function ambilKaryawan(){
        $wh="";
        if($this->input->post("id_master_perusahaan")!='0'){
            $wh=array("b.id_master_perusahaan"=>$this->input->post("id_master_perusahaan"));
        }else{
            $wh="";
        }
        $dataKaryawan = $this->Nata_hris_hr_model->dataKaryawannilai2($wh);
        $html = "";
        foreach($dataKaryawan->result() as $dt){
            $html .= "<tr>
                        <td>".$dt->nik."</td>
                        <td>".$dt->nama_lengkap."</td>
                        <td>
                            <a href='".base_url()."HR/HRNilaiKinerja/".$dt->nik."'><button class='btn btn-yellow'>Nilai</button></a> 
                        </td>
                    </tr>"; 
        }
        $callback = array('data_karyawan'=>$html);
        echo json_encode($callback);
    }
    public function ambilKaryawanpelatihan(){
        $wh="";
        if($this->input->post("id_jenis_projek")!='0'){
            $wh=array("b.id_departemen"=>$this->input->post("id_jenis_projek"));
        }else{
            $wh="";
        }
        $dataKaryawan = $this->Nata_hris_hr_model->dataKaryawanpelatihan($wh);
        //  $wh=array("e.id_training_jadwal"=>$this->input->post("id_training_jadwal"));
        //  $id=$this->input->post("id_training_jadwal");
        //     $datadataPegawai= $this->Nata_hris_hr_model->dataPegawaiJumChecked("",$id);
         $html = "";
        foreach($dataKaryawan->result() as $dt){
            $html .= "<tr>
                        <td>".$dt->nik."</td>
                        <td>".$dt->nama_lengkap."</td>
                        <td>
                            <label class='fancy-checkbox cbkar' data-jk='L'>
                                <input type='checkbox' name='pilih_karyawan[]' value='".$dt->nik."' class='cbkaryawan' data-jk='L' >
                                <span></span>
                            </label>
                        </td>
                    </tr>"; 
        }
        $callback = array('data_karyawan'=>$html);
        echo json_encode($callback);
    }
    
    public function ambilClient(){
        $wh=array("a.id_lokasi_kantor"=>$this->input->post("id_lokasi"));
        $dataLoker = $this->Nata_hris_hr_model->dataPerusahaanClient($wh);
        $html = "<option selected disabled value=''>-- Pilih Client --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_master_perusahaan."'>".$dtl->nama_perusahaan." ".$dtl->jumlokasi."</option>"; 
        }
        $callback = array('data_client'=>$html);
        echo json_encode($callback);
    }
    public function ambilDept(){
        $wh=array("id_master_perusahaan"=>$this->input->post("id_client"));
        $dataLoker = $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
        $html = "<option selected disabled value=''>-- Pilih Departemen --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_departemen."'>".$dtl->nama_departemen."</option>"; 
        }
        $callback = array('data_dept'=>$html);
        echo json_encode($callback);
    }
    public function ambilLokasi(){
        $wh=array("a.id_master_perusahaan"=>$this->input->post("id_client"));
        $dataLoker = $this->Nata_hris_hr_model->ambilDataLokasi($wh);
        $html = "<option selected disabled value=''>-- Pilih Lokasi --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_lokasi_kantor."'>".$dtl->deskab."</option>"; 
        }
        $callback = array('data_lokasi'=>$html);
        echo json_encode($callback);
    }
    
    public function ambilDivisi(){
        $wh=array("id_departemen"=>$this->input->post("departemen"));
        $dataDivisi = $this->Nata_hris_hr_model->dataDivisi($wh);
        $html = "<option selected disabled value=''>Pilih Divisi</option>";
        foreach($dataDivisi->result() as $dtr){
            $html .= "<option value='".$dtr->id_divisi."'>".$dtr->nama_divisi."</option>"; 
        }
        $callback = array('data_divisi'=>$html);
        echo json_encode($callback);
    }
    public function ambilLoker(){
        $wh=array("l.id_lokasi"=>$this->input->post("id_lokasi_kantor"));
        $wh2=array("j.id_master_jenis_project IS NOT NULL");
        $dataLoker= $this->Nata_hris_hr_model->dataPekerjaanL('',$wh2);
        $html = "<option selected disabled value=''>-- Pilih Pekerjaan --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_loker."'>".$dtl->jenis_project."</option>"; 
        }
        $callback = array('data_loker'=>$html);
        echo json_encode($callback);
    }
    public function ambilKab(){
        $wh=array("id_provinsi"=>$this->input->post("id_provinsi"));
        $dataLoker = $this->Nata_hris_hr_model->dataKabupaten($wh);
        $html = "<option selected disabled value=''>-- Pilih Kabupaten --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_kabupaten."'>".$dtl->deskripsi."</option>"; 
        }
        $callback = array('data_kabupaten'=>$html);
        echo json_encode($callback);
    }
    public function ambilPerusahaan(){
        $wh=array("a.id_master_perusahaan"=>$this->input->post("id_perusahaan"));
        $dataLoker = $this->Nata_hris_hr_model->dataDepartemenKontrak($wh);
        $html = "<option value='0'>-- Semua Departemen --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_departemen."'>".$dtl->deskripsi."</option>"; 
        }
        $wh=array("p.id_master_perusahaan"=>$this->input->post("id_perusahaan"));
        $dataPerusahaan = $this->Nata_hris_hr_model->dataPerusahaanLokasi($wh);
        $kabprov = $dataPerusahaan->num_rows()>0?$dataPerusahaan->row()->desKabupaten.", ".$dataPerusahaan->row()->desProvinsi:"-";
        $callback = array('data_departemen'=>$html,'data_lokasi'=>$kabprov);
        echo json_encode($callback);
    }
    
    public function ambilKabLokasi(){
        $wh=array("k.id_provinsi"=>$this->input->post("id_provinsi"));
        $dataLoker = $this->Nata_hris_hr_model->dataKabupatenLokasi($wh);
        $html = "<option selected disabled value=''>-- Pilih Kabupaten --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_lokasi_kantor."'>".$dtl->deskripsi."</option>"; 
        }
        $callback = array('data_kabupaten'=>$html);
        echo json_encode($callback);
    }
    public function ambilKabUMK(){
        $wh=array("id_provinsi"=>$this->input->post("id_provinsi"));
        $dataLoker = $this->Nata_hris_hr_model->dataKabupatenUMK($wh);
        $html = "<option selected disabled value=''>-- Pilih Kabupaten --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_kabupaten."'>".$dtl->deskripsi."</option>"; 
        }
        $callback = array('data_kabupaten'=>$html);
        echo json_encode($callback);
    }
    public function ambilNamakaryawan(){
        $wh=array("a.nik"=>$this->input->post("nik"));
        $dataLoker = $this->Nata_hris_hr_model->dataKaryawanAbsensiKontrak($wh)->row();
        $callback = array('data_karyawan'=>$dataLoker);
        echo json_encode($callback);
    }
    public function ambilKec(){
        $wh=array("id_kabupaten"=>$this->input->post("id_kabupaten"));
        $dataLoker = $this->Nata_hris_hr_model->dataKecamatan($wh);
        $html = "<option selected disabled value=''>-- Pilih Kecamatan --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_kecamatan."'>".$dtl->deskripsi."</option>"; 
        }
        $callback = array('data_kecamatan'=>$html);
        echo json_encode($callback);
    }
    public function ambilPelamar(){
        $wh=array("pl.id_loker"=>$this->input->post("id_loker")
        	,"pl.status_lamar"=>'2');
        $dataLoker = $this->Nata_hris_hr_model->dataPelamar2($wh);
        $idjablok=0;
        $idjenpro=0;
        $html = "<option selected disabled value='0'>-- Pilih Pelamar --</option>";
        foreach($dataLoker->result() as $dtl){
            $html .= "<option value='".$dtl->id_pelamar."'>".$dtl->nama_lengkap."</option>";
            $idjablok=$dtl->id_jabatan_loker;
            $idjenpro=$dtl->id_master_jenis_project; 
        }
        $callback = array('data_pelamar'=>$html,'id_master_jenis_project'=>$idjenpro);
        echo json_encode($callback);
    }
    public function ambilPelamarDtl(){
        $wh=array("pl.id_pelamar"=>$this->input->post("id_pelamar")
        	,"status_lamar"=>'2');
        $dataLoker = $this->Nata_hris_hr_model->dataPelamar($wh);
        $callback = array('data_pelamar'=>$dataLoker->row());
        echo json_encode($callback);
    }
    public function ambilKaryawanHR(){
        $wh=array("nik"=>$this->input->post("nik"));
        $dataKaryawan = $this->Nata_hris_hr_model->dataKaryawan($wh);
        $callback = array('data_karyawan'=>$dataKaryawan->row());
        echo json_encode($callback);
    }
    public function ambilJabatan(){
        $wh=array("ko.id_master_perusahaan"=>$this->input->post("idperusahaan"),"ko.id_departemen"=>$this->input->post("iddepartemen"));
        $wh2=array("s.id_master_perusahaan"=>$this->input->post("idperusahaan"),"s.id_departemen"=>$this->input->post("iddepartemen"));
        //$wh2=array("ko.id_master_perusahaan"=>$this->input->post("idperusahaan"));
       // $wh2=array("j.id_master_jenis_project IS NOT NULL");
        $dataJabatanko= $this->Nata_hris_hr_model->dataPegawaiKontrakJenisProject($wh);
        $dataJabatanko2= $this->Nata_hris_hr_model->dataPegawaiKontrakJenisProject2($wh2);
        //$dataJabatan2= $this->Nata_hris_hr_model->dataPekerjaanL($wh,$wh2);
        $datajp=$this->Nata_hris_hr_model->dataJenisProjek();
        $html = "<option selected disabled value=''>-- Pilih Pekerjaan --</option>";
        foreach($dataJabatanko->result() as $dtl){
            $html .= "<option value='".$dtl->id_jenis_project."'>".$dtl->jenis_project."</option>"; 
        }
        foreach($dataJabatanko2->result() as $dtl){
            $html .= "<option value='".$dtl->id_master_jenis_project."'>".$dtl->jenis_project."</option>"; 
        }
        $callback = array('data_jp'=>$html);
        echo json_encode($callback);
    }
    
    

	public function HRRecruitment(){	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){

            $data['dataAkses'] = $this->menu->getAkses(117);
            $data['menuId']=array(3,117);
		 	$wh=array('a.id_master_jenis_project >'=>'0');
			$data['content'] = 'hr/hr-recruitment';
            $wh2=array();
            if($this->input->post('id_loker')!=""){
                $wh2['a.id_master_jenis_project']=$this->input->post('id_loker');
            }
            if($this->input->post('id_lokasi')!=""){
                $wh2['a.id_lokasi']=$this->input->post('id_lokasi');
            }
            $data['datalokasi'] = $this->Nata_hris_hr_model->dataLokasi();
            $data['dataloker'] = $this->Nata_hris_hr_model->dataLoker($wh,$wh2);
            $data['datapekerjaan'] = $this->Nata_hris_hr_model->dataPekerjaan();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}	

	
    public function TambahHRTask()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(64);
            $data['content'] = 'hr/tambah-hr-task';
             $data['datakaryawan'] = $this->Nata_hris_hr_model->dataKaryawan();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesTambahTask(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(64);
            $data = array(
                'nik' => $this->input->post('nik'),
                'tanggal_mulai'=> $this->input->post('tanggal_mulai'),
                'tanggal_selesai'=>$this->input->post('tanggal_selesai'),
                'task'=> $this->input->post('task'),
                'tanggal_create'=> date('Y-m-d')
            );
            $this->Nata_hris_hr_model->TambahTask($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Task Berhasil di Tambah");
             }else{
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Task Gagal di Tambah");
             }
            $this->session->set_flashdata($result);
           redirect("HR");
        }else{
            redirect("home/login"); 
        }
    }
    public function HapusTask($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $idloker=$id_loker;
          $where=array("id_detail_task"=>$id);
          
            $res = $this->My_model->del_data("trx_detail_task",$where);
            $result=array();
            if ($res > 0) {
               $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berhasil di hapus");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Gagal di hapus");
            }
          $this->session->set_flashdata($result);
          redirect("HR");
        }else{
            redirect("home/login"); 
        }
    }
    public function EditHRTask($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(64);
           
            $data['content'] = 'hr/edit-hr-task';
             $wh=array('a.id_detail_task'=>$id);
            $data['datatask'] = $this->Nata_hris_hr_model->data_task($wh)->row();
            $data['datakaryawan'] = $this->Nata_hris_hr_model->dataKaryawan();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }   
    public function ProsesEditTask(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(64);
            $id=$this->input->post('id_detail_task');
            $data = array(
                'nik' => $this->input->post('nik'),
                'tanggal_mulai'=> $this->input->post('tanggal_mulai'),
                'tanggal_selesai'=>$this->input->post('tanggal_selesai'),
                'task'=> $this->input->post('task'),
                'tanggal_create'=> date('Y-m-d')
            );
            $this->Nata_hris_hr_model->EditTask($data,$id);
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Recruitment Berhasil di Tambah");
            $this->session->set_flashdata($result);
           redirect("HR");
        }else{
            redirect("home/login"); 
        }
    }

	public function TambahHRRecruitment()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(64,117);
			// $data['content'] = 'hr/tambah-hr-recruitment';
            $data['datalokasi'] = $this->Nata_hris_hr_model->dataLokasi();
            $data['datajabatan'] = $this->Nata_hris_hr_model->dataJabatan();
            $data['dataDepartemennya'] = $this->Nata_hris_hr_model->dataDepartemen();
            $data['datapekerjaan'] = $this->Nata_hris_hr_model->dataPekerjaan();
            $data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaan();
			$this->load->view('hr/tambah-hr-recruitment',$data);
		}else{
			redirect("home/login");	
		}

	}
    public function ProsesTambahRecruitment(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(64,117);
			$data = array(
	            // 'id_jabatan' => $this->input->post('id_jabatan'),
	            // 'id_divisi' => $this->input->post('id_divisi'),
	            'id_master_jenis_project' => $this->input->post('id_master_jenis_project'),
                //'id_master_perusahaan'=> $this->input->post('id_client'),
	            // 'id_lokasi'=> $this->input->post('id_lokasi'),
	            'tanggal_mulai'=> $this->input->post('tanggal_mulai'),
	            'tanggal_selesai'=>$this->input->post('tanggal_selesai'),
                'requirement'=> $this->input->post('requirement'),
                'jobdesc'=> $this->input->post('jobdesc')
	        );
			// if ( $_FILES['image']['name'] != '' ) {
			// 		$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['image']['name']);
			// 		$filename = str_replace('(', '', $filename);
			// 		$filename = str_replace(')', '', $filename);
			// 		$data['image'] = $filename;

			// 		// $result = $this->M_article->insert($data);

					
			// 			$config['upload_path']          = 'assets/img/recruitment/';
			// 			$config['allowed_types']        = 'gif|jpg|png';
			// 			$config['file_name']        = $filename;
			// 			$config['overwrite'] 	= TRUE;
			// 			// $config['max_size']             = 100;
			// 			// $config['max_width']            = 1024;
			// 			// $config['max_height']           = 768;
			// 			$this->load->library('upload', $config);
			// 			$this->upload->initialize($config);

			//             if ($this->upload->do_upload('image')) {
			            	
			//             	}
			// 	    }


			$idnya=$this->Nata_hris_hr_model->TambahRecruitment($data);
			for($i=0;$i<count($_POST['tanggal']);$i++){
                $dt=array(
                    "tanggal"=>$_POST['tanggal'][$i],
                    "jenis"=>$_POST['jenis'][$i],
                    "id_loker"=>$idnya
                );
                $this->Nata_hris_hr_model->TambahRecruitmentDtl($dt);
			}
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Recruitment Berhasil di Tambah");
            $this->session->set_flashdata($result);
            redirect("HR/HRRecruitment");
		}else{
			redirect("home/login");	
		}
    }
	public function EditHRRecruitment($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(64,117);
		 	$wh=array('a.id_loker'=>$id);
			//$data['content'] = 'hr/edit-hr-recruitment';
            $data['dataloker'] = $this->Nata_hris_hr_model->dataLokerUbah($wh)->row();
            $data['datalokerjadwal'] = $this->Nata_hris_hr_model->dataLokerUbah($wh);
            $data['datajadwal'] = $this->Nata_hris_hr_model->dataAmbilJadwal($wh);
            $data['datapekerjaan'] = $this->Nata_hris_hr_model->dataPekerjaan();
            $data['datalokasi'] = $this->Nata_hris_hr_model->dataLokasi();
            $data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaan();
			$this->load->view('hr/edit-hr-recruitment',$data);
		}else{
			redirect("home/login");	
		}
	}	
	public function ProsesEditRecruitment(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(64,117);
			$idloker=$this->input->post('id_loker');
			$data = array(
	            'id_master_jenis_project' => $this->input->post('id_master_jenis_project'),
	            // 'id_lokasi'=> $this->input->post('id_lokasi'),
             //    'id_master_perusahaan'=> $this->input->post('id_client'),
	            'tanggal_mulai'=> $this->input->post('awal'),
	            'tanggal_selesai'=>$this->input->post('akhir'),
                'requirement'=> $this->input->post('requirement'),
                'jobdesc'=> $this->input->post('jobdesc')
	        );
	        $this->Nata_hris_hr_model->EditRecruitment($data,$idloker);
	        for($i=0;$i<count($_POST['tanggal']);$i++){
                $dtu=array(
                    "tanggal"=>$_POST['tanggal'][$i],
                    "jenis"=>$_POST['jenis'][$i]
                   
                );
                $this->Nata_hris_hr_model->EditRecruitmentDtl($dtu,$_POST['id_loker_jadwal'][$i]);
			}
			for($i=0;$i<count($_POST['tanggalbaru']);$i++){
                $dt=array(
                    "tanggal"=>$_POST['tanggalbaru'][$i],
                    "jenis"=>$_POST['jenisbaru'][$i],
                    "id_loker"=>$idloker
                );
                $this->Nata_hris_hr_model->TambahRecruitmentDtl($dt);
			}
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Recruitment Berhasil di Edit");
            $this->session->set_flashdata($result);
            redirect("HR/HRRecruitment");
		}else{
			redirect("home/login");	
		}
    }
    public function HapusRecruitment($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $where=array("id_loker"=>$id);
          $this->My_model->del_data("trx_loker_jadwal",$where);
          $this->My_model->del_data("trx_loker",$where);
          $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jadwal Berhasil di Hapus");
          $this->session->set_flashdata($result);
        }else{
            redirect("home/login"); 
        }
    }
    public function HapusCuti($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $where=array("id_absensi_leave"=>$id);
          $this->My_model->del_data("trx_absensi_leave",$where);
        //   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berhasil di Hapus");
        //   $this->session->set_flashdata($result);
        }else{
            redirect("home/login"); 
        }
    }
	public function HapusJadwal($id,$id_loker)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			$idloker=$id_loker;
		  $where=array("id_loker_jadwal"=>$id);
		  $this->My_model->del_data("trx_loker_jadwal",$where);
          $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jadwal Berhasil di Hapus");
          $this->session->set_flashdata($result);
          redirect("HR/EditHRRecruitment/".$idloker);
 		}else{
			redirect("home/login");	
		}
	}
	public function HRRecruitmentDetail($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(64,117);
			// $data['content'] = 'hr/hr-recruitment-detail';
			$wh=array('a.id_loker'=>$id);
			$id=array('pl.id_loker'=>$id);
			$data['dataloker'] = $this->Nata_hris_hr_model->dataLokerUbah($wh)->row();
            $data['ambildatajadwal'] = $this->Nata_hris_hr_model->dataAmbilJadwal($wh);
			$data['datajadwal'] = $this->Nata_hris_hr_model->dataLokerUbah($wh);
			$data['datapelamar'] = $this->Nata_hris_hr_model->dataPelamar($id);
			$this->load->view('hr/hr-recruitment-detail',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRRecruitmentDetailPelamar($id,$idloker)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(64,117);
			$data['content'] = 'hr/hr-recruitment-detail-pelamar';

			$id=array('pl.id_pelamar'=>$id);
			$wh=array('pl.id_loker'=>$idloker);
			$data['datapelamar'] = $this->Nata_hris_hr_model->dataPelamar($id,$wh)->row();
			$wh=array('a.id_loker'=>$idloker);
			$data['dataloker'] = $this->Nata_hris_hr_model->dataLokerUbah($wh)->row();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ubahstsloker(){
		$id_loker=$this->input->post('id');
		$sts=$this->input->post('sts');
        $status=$sts=="0"?"Diaktifkan":"Dinonaktifkan";
		$res=$this->Nata_hris_hr_model->ubahstsloker($id_loker,$sts);
        $result=array();
        if($res>0){
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Recruitment Berhasil ".$status);
        } else {
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Recruitment Berhasil ".$status);
        }
        $this->session->set_flashdata($result); 
	}
	public function ubahstslamar(){
		$id=$this->input->post('id');
		$id_loker=$this->input->post('id_loker');
		$sts=$this->input->post('sts');
        $status=$sts=="2"?"Diterima":"Ditolak";
		$res=$this->Nata_hris_hr_model->ubahstslamar($id,$id_loker,$sts);
        $result=array();
        if($res>0){
            $st=$sts=="2"?"diterima":"ditolak";
            $whnik=array("b.id_pelamar"=>$id);
            $datakar=$this->My_model->dataPelamar($whnik)->row();
            $kirimemail=$this->kirimEmailny($st,$datakar->nik,$datakar->email,"");
            $result=array();
            if ($kirimemail=="success") {
	       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Recruitment Berhasil ".$status);
	       	}else{
	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Gagal Update");
	       	}
        } else {
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Recruitment Gagal ".$status);
        }
        $this->session->set_flashdata($result);    
	}
    
    public function MailFormatView($format="",$nik="",$resetkey=""){
        //if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			//$data['menuId']=array(52,62);
            $wh=array("mail_company"=>"semanggi3");
            $data['mailserver'] = $this->My_model->mailserver($wh)->row();
            $title="Title";
            if($format=="baru" || $format=="diterima" || $format=="ditolak"){
                $title="Thank You";
            } else if($format=="reset"){
                $title="Forgot Your Password";
            } else if($format=="pegawai"){
                $title="Welcome";
            }
            $whnik=array("c.nik"=>$nik);
            $datakar=$this->My_model->getUserKaryawan($whnik);
            //if($datakar->num_rows()>0){
                $data['datakar'] = $datakar->row();
                $data['datajadwal'] = $this->My_model->dataJadwalLokerPelamar($data['datakar']->idlokerdl);
            /* } else {
                $whnik=array("a.nik"=>$nik);
                $datakar=$this->My_model->dataPelamar($whnik);
                $data['datakar'] = $datakar->row();
            } */
            $data['mailtitle'] = $title;
            $data['resetkey'] = $resetkey;
            $data['mailformat'] = $format;
			return $this->load->view('hr/hr-mail-format',$data,TRUE);
		/* }else{
			redirect("home/login");	
		} */
    }
    public function kirimEmailny($format,$nik,$mailTo,$msg){
        /*
        baru,diterima,ditolak,reset,pegawai
        */
        $mailformat = $this->MailFormatView($format,$nik,"123");
        $mail= $this->My_model->kirimEmailnya($mailTo,$mailformat);
        if($mail=="success"){
            return "success";
        } else {
            return "fail";
        }
    }
    public function ubahstsklaim(){
		$id=$this->input->post('id');
		$sts=$this->input->post('sts');
		$alasan=$this->input->post('alasan');
        $status=$sts=="1"?"Diterima":"Ditolak";
		$a=$this->Nata_hris_hr_model->ubahstsklaim($id,$sts,$alasan);
       // if($sts=="1"){
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Claim Berhasil ".$status);
        //}else{
         //    $result=array("result"=>"error","title"=>"Sukses","msg"=>"Data Claim Berhasil ".$status);
        //}
           
        $this->session->set_flashdata($result);   

	}

	public function HRAktifitasAbsensi()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(54);
			$data['menuId']=array(31,54);
			$data['content'] = 'hr/hr-aktifitas-absensi';
			$wh1=array();
            if($this->input->post('id_master_perusahaan')!=""){
                $wh1['b.id_master_perusahaan']=$this->input->post('id_master_perusahaan');
            }
			$wh2=array();
            if($this->input->post('id_departemen')!=""){
                $wh2['b.id_departemen']=$this->input->post('id_departemen');
            }
            $wh3=array();
            if($this->input->post('nama_lengkap')!=""){
                $wh3['b.nama_lengkap']=$this->input->post('nama_lengkap');
            }
            $wh4=array();
            if($this->input->post('tanggal_mulai')!=""){
                $wh4['a.tanggal_mulai >= ']=$this->input->post('tanggal_mulai');
            }
            $wh5=array();
            if($this->input->post('tanggal_selesai')!=""){
                $wh5['a.tanggal_mulai <=']=$this->input->post('tanggal_selesai');
            }
			//$data['dataaktifitasabsensi'] = $this->Nata_hris_hr_model->dataAktifitasAbsensi($wh1,$wh2,$wh3,$wh4,$wh5);
            $data['dataaktifitasabsensi'] = $this->Nata_hris_hr_model->dataAktifitasAbsensiKontrak($wh1,$wh2,$wh3,$wh4,$wh5);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak();
			$data['dataklien'] = $this->Nata_hris_hr_model->dataPerusahaan();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_master_perusahaan')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function TambahHRAktifitasAbsensi()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(31,54);
			//$data['content'] = 'hr/tambah-hr-aktifitas-absensi';
			$data['datakaryawan'] = $this->Nata_hris_hr_model->dataKaryawan();

			$this->load->view('hr/tambah-hr-aktifitas-absensi',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function ProsesTambahAktifitasAbsensi()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(31,54);
			$waktuawal = $this->input->post('tgl_kehadiran')." ".$this->input->post('awal');
			$waktuakhir = $this->input->post('tgl_keluar')." ".$this->input->post('akhir');
			$data = array(
	            'nik'=>$this->input->post('nik'),
	            'tanggal_mulai'=>$waktuawal,
	            'tanggal_selesai'=>$waktuakhir
	        );
			
	       	$res = $this->Nata_hris_hr_model->TambahAktifasiAbsensi($data);
	       	$result=array();
            if ($res > 0) {
	       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Absensi Berhasil di Tambah");
	       	}else{
	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Absensi Gagal di Tambah");
	       	}
			// print_r($data);
            $this->session->set_flashdata($result);
			redirect('HR/HRAktifitasAbsensi');
		}else{
			redirect("home/login");	
		}
	}

	public function EditAktifitasAbsensi($id)
	{   
	    if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
	        $data['menuId']=array(31,54);
	        // $data['content'] = 'hr/edit-hr-aktifasi-absensi';
	        $where=array('id_absensi'=>$id);
	        $data['dataKaryawanRow']=$this->Nata_hris_hr_model->dataAktifitasAbsensiKontrak($where)->row();

	        
	        $this->load->view('hr/edit-hr-aktifasi-absensi',$data);
	    }else{
	        redirect("home/login"); 
	    }
	}

	public function ProsesEditAktifitasAbsen(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  	$id_absensi = $this->input->post('id');
		 	$waktuawal = $this->input->post('tgl_kehadiran')." ".$this->input->post('awal');
			$waktuakhir = $this->input->post('tgl_keluar')." ".$this->input->post('akhir');
			$data = array(
	            'tanggal_mulai'=>$waktuawal,
	            'tanggal_selesai'=>$waktuakhir
	        );
	      //  print_r($data);
		  	$res = $this->Nata_hris_hr_model->EditAbsensi($data,$id_absensi);
            $result=array();
	       	if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Absensi Berhasil Dirubah");
	       	}else{
	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Absensi Gagal Dirubah");
	       	}
            $this->session->set_flashdata($result);
          	redirect("HR/HRAktifitasAbsensi/");
 		}else{
			redirect("home/login");	
		}
    }

    public function HapusAktifitasAbsensi($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $where=array("id_absensi"=>$id);
            $res = $this->My_model->del_data("trx_absensi",$where);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Absensi Berhasil Dihapus");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Absensi Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
	        redirect("HR/HRAktifitasAbsensi");
			}else{
			redirect("home/login");	
		}
	}

	public function HRAktifitasAbsensiDetail()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(31,54);
			$data['content'] = 'hr/hr-aktifitas-absensi-detail';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRPermohonanCuti()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(55);
			$data['menuId']=array(31,55);
			$data['content'] = 'hr/hr-permohonan-cuti';
			$wh=array();
			if($this->input->post('nama_lengkap')!=""){
                $wh['b.nama_lengkap']=$this->input->post('nama_lengkap');
            }
            $wh1=array();
			if($this->input->post('id_departemen')!=""){
                $wh1['ko.id_departemen']=$this->input->post('id_departemen');
            }
            $wh2=array();
            $wh3=array();
			if($this->input->post('tanggal')!="" && $this->input->post('sampe_tanggal')!=""){
                $wh2['a.tanggal']=$this->input->post('tanggal');
                $wh3['a.sampe_tanggal']=$this->input->post('sampe_tanggal');
            }
            $wh4=array();
            if($this->input->post('id_leave_kategori')!=""){
            	$wh4['a.id_leave_kategori']=$this->input->post('id_leave_kategori');
            }
            $wh5=array();
            if($this->input->post('status')!=""){
            	$wh5['a.status']=$this->input->post('status');
            }
            $wh6=array();
            if($this->input->post('id_master_perusahaan')!=""){
                $wh6['ko.id_master_perusahaan']=$this->input->post('id_master_perusahaan');
            }
			$data['datapermohonancuti'] = $this->Nata_hris_hr_model->dataPermohonanCutiKontrak($wh,$wh1,$wh2,$wh3,$wh4,$wh5,$wh6);
			$data['datadepartemen']=$this->Nata_hris_hr_model->dataDepartemenKontrak();
			$data['dataleavekategori']=$this->Nata_hris_hr_model->dataLeaveKategori();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_master_perusahaan')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function TambahHRPermohonanCuti()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(31,55);
			$data['content'] = 'hr/tambah-hr-permohonan-cuti';
			$data['datakaryawan'] = $this->Nata_hris_hr_model->dataKaryawan();
			$data['datakategoricuti'] = $this->Nata_hris_hr_model->dataKategoriCuti();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}


public function ProsesTambahCuti(){   
        $data = array();
        $result=array();
        $uploadData=array();


        $dataawal = array( 
                    'nik' => $this->input->post('nik'),
                    'id_leave_kategori'=>$this->input->post('id_leave_kategori'),
                    'tanggal'=>$this->input->post('tanggal'),
                    'sampe_tanggal'=>$this->input->post('sampe_tanggal'),
                    'tanggal_create'=>date('Y-m-d'),
                    'status'=>0,
                    'keterangan'=>$this->input->post('keterangan')
                );

            if ( $_FILES['dokumen']['name'] != '' ) {
                $filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['dokumen']['name']);
                $filename = str_replace('(', '', $filename);
                $filename = str_replace(')', '', $filename);
                $dataawal['dokumen'] = $filename;
                
                $config['upload_path']          = 'assets/img/cuti/';
                $config['allowed_types']        = 'jpg|jpeg|png|pdf';
                $config['file_name']        = $filename;
                $config['overwrite']    = TRUE;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('dokumen')) {
                    
                
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        //$dataawal['dokumen'] = $fileData['file_name'];
                        
                    
                    }else{
                         $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Cuti  Gagal Ditambahkan");
                                $this->session->set_flashdata($result);
                                redirect('HR/TambahHRPermohonanCuti');
                    }
                }
                $id=$this->Nata_hris_hr_model->TambahCuti($dataawal);
                        if ($id > 0) {
                            
                            // If file upload form submitted
                            // print_r($dataawal);
                            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Permohonan Cuti Berhasil Ditambahkan");
                        $this->session->set_flashdata($result);
                        redirect('HR/HRPermohonanCuti');
                      
                        }else{
                                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Cuti  Gagal Ditambahkan");
                                $this->session->set_flashdata($result);
                                redirect('HR/TambahHRPermohonanCuti');
                        }      
        }


	public function ProsesTambahCutii()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(31,55);
            
			$data = array(
	            'nik' => $this->input->post('nik'),
	            'id_leave_kategori'=>$this->input->post('id_leave_kategori'),
	            'tanggal'=>$this->input->post('tanggal'),
	            'sampe_tanggal'=>$this->input->post('sampe_tanggal'),
	            'tanggal_create'=>date('Y-m-d'),
	            'status'=>0,
	            'keterangan'=>$this->input->post('keterangan')
	        );

			if ( $_FILES['dokumen']['name'] != '' ) {
				$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['dokumen']['name']);
				$filename = str_replace('(', '', $filename);
				$filename = str_replace(')', '', $filename);
				$data['dokumen'] = $filename;
                
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
            $res = $this->Nata_hris_hr_model->TambahCuti($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Permohonan Cuti Berhasil Ditambahkan");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Permohonan Cuti Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRPermohonanCuti");
		}else{
			redirect("home/login");	
		}

	}
	public function HRPermohonanCutiDetail($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(31,55);
			// $data['content'] = 'hr/hr-permohonan-cuti-detail';
			$id=array('a.id_absensi_leave'=>$id);
			$data['datapermohonancuti'] = $this->Nata_hris_hr_model->dataPermohonanCutiKontrakHR($id)->row();
            $nikatasan=array('nik'=>$data['datapermohonancuti']->nama_atasan);
            $data['datanamaatasan'] = $this->Nata_hris_hr_model->dataNamaAtasan($nikatasan)->row();
			$this->load->view('hr/hr-permohonan-cuti-detail',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ubahstscuti(){
			$id=$this->input->post('id');
			$sts=$this->input->post('sts');
            $nik=$this->input->post('nik');
			$alasan=$this->input->post('alasan');
			$res=$this->Nata_hris_hr_model->ubahstscuti($id,$sts,$alasan);
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berhasil DiUbah");
            } else {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berhasil DiUbah");
            }
                if($sts=='2'){
                    $wh=array('a.nik'=>$nik,'a.id_absensi_leave'=>$id);
                    $tamp=$this->Nata_hris_hr_model->data_leave($wh)->row();
                    $wh2=array('a.nik'=>$nik,'a.id_leave_kategori'=>$tamp->id_leave_kategori);
                    $jumlahhari=$this->Nata_hris_hr_model->datadtlcutipribadi($wh2)->row();  
                        // $start_date = new DateTime($tamp->tanggal);
                        // $end_date = new DateTime($tamp->sampe_tanggal);
                        // $interval = $start_date->diff($end_date);
                        // $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
                        // $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
                        // $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
                        // $awal=$interval->days+1;
                        // $dt=array('a.jumlah_hari'=>$awal+$jumlahhari->jumlah_hari);
                        // print_r($dt);
                    $id_leave_kategori = array('id_leave_kategori'=>$tamp->id_leave_kategori);
                    $idleave = $this->Nata_hris_employee_model->data_cuti($id_leave_kategori)->row()->id_leave_kategori;
                    $leave = array('a.id_leave_kategori'=>$idleave,
                                    'a.nik'=>$nik);
                    $tmppribadi = $this->Nata_hris_employee_model->data_cutipribadi($leave)->row()->jumlah_hari;
                    $awal = $tamp->tanggal;
                    $akhir = $tamp->sampe_tanggal;
                    $then = strtotime($awal);
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
                    if($days == 0){
                        $tmp=0;
                    }else{
                        $tmp = $days;
                        
                    }
                    $hasil = 0;
		            $hasil = $tmppribadi+$tmp;
                    $dt=array('a.jumlah_hari'=>$hasil);
                    print_r($dt);
                    $this->Nata_hris_hr_model->upd_data('trx_detail_cutipribadi_karyawan a',$dt,$wh2);
                    $this->Nata_hris_hr_model->ubahstscuti($id,$sts,$alasan);
                }else{
                     $this->Nata_hris_hr_model->ubahstscuti($id,$sts,$alasan);
                }
		}


	public function HRPayrollCreator($uri='')
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(56);
			$data['menuId']=array(50,56);
            $data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
            $data['dataDeptC']= $this->Nata_hris_hr_model->dataDepartemen();
			$data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi();
			$data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
			
            $where = array('pc.status'=>'upload');
            // Draft
            $wh=array();

            if($this->input->post('bank')!=""){
                $wh['pc.id_bank']=$this->input->post('bank');
            }
            
            if($this->input->post('nama_karyawan')!=""){
                $wh['pc.nama']=$this->input->post('nama_karyawan');
            }
            
            if($this->input->post('nik')!=""){
                $wh['pc.nik']=$this->input->post('nik');
            }

            if($this->input->post('bulan')!=""){
                $wh['pc.tanggal']=$this->input->post('bulan');
            }

            
            if ($this->input->post('id_client')) {
                $wh['k.id_master_perusahaan']=$this->input->post('id_client');
            }

            
            if ($this->input->post('id_dept')) {
                $wh['k.id_departemen']=$this->input->post('id_dept');
            }

            // Approve
            $wh2=array();
            $whtext=array();
            if($this->input->post('bank_approve')!=""){
                $whtext['pa.id_bank']=$this->input->post('bank_approve');
            }
            
            if($this->input->post('nama_karyawan_approve')!=""){
                $wh2['pa.nama']=$this->input->post('nama_karyawan_approve');
            }
            
            if($this->input->post('nik_approve')!=""){
                $wh2['pa.nik']=$this->input->post('nik_approve');
            }

            // if($this->input->post('tanggal_approve')!=""){
            //     $wh2['pa.tanggal']=$this->input->post('tanggal_approve');
            // }

            
            if ($this->input->post('id_client_approve')) {
                $whtext['k.id_master_perusahaan']=$this->input->post('id_client_approve');
            }

            
            if ($this->input->post('id_dept_approve')) {
                $whtext['k.id_departemen']=$this->input->post('id_dept_approve');
            }

            $data['dataUploadCsv']= $this->Nata_hris_hr_model->dataPayrolCSV('',$wh);
            $data['dataApprove']= $this->Nata_hris_hr_model->dataPayrolApprove($wh2,$whtext);

			$data['content'] = 'hr/hr-payroll-creator';
			$this->load->view('index',$data);

		}else{
			redirect("home/login");	
		}
	}

    public function hapusPayrollCreator($nik){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $where=array("nik"=>$nik);
          $res = $this->Nata_hris_hr_model->del_data("trx_payroll_create",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Payroll Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Payroll Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRPayrollCreator/3");
        }else{
            redirect("home/login"); 
        }
    }
    
	public function HRBuatDraftOtomatis()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,56);
			$data['content'] = 'hr/hr-buat-draft_otomatis';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

    public function spreadsheet($bank=""){

        $spreadsheet = $this->spreedsheet->load();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Maarten Balliauw')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');
        $id_bank = "";
        if ($bank == "") {
            $id_bank = "";
        }else{
            $id_bank = array('a.id_bank'=>$bank);
        }
        
        $data_approve = $this->Nata_hris_hr_model->payrollApprove($id_bank);
        $nomor = 2;
        foreach ($data_approve->result() as $approve) {
            if ($bank == 3) {
                // Add some data
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Rekening')
                ->setCellValue('B1', 'Nama')
                ->setCellValue('C1', 'Biaya')
                ->setCellValue('D1', 'Nominal')
                ->setCellValue('E1', 'Total Disetorkan')
                ->setCellValue('A'.$nomor, $approve->rekening)
                ->setCellValue('B'.$nomor, $approve->nama)
                ->setCellValue('C'.$nomor, $approve->biaya)
                ->setCellValue('D'.$nomor, $approve->nominal)
                ->setCellValue('E'.$nomor, $approve->disetorkan);
            }if ($bank == 4) {
                // Add some data
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'NAMAPEG')
                ->setCellValue('B1', 'NOREK')
                ->setCellValue('C1', 'JMLGAJI')
                ->setCellValue('A'.$nomor, $approve->nama)
                ->setCellValue('B'.$nomor, $approve->rekening)
                ->setCellValue('C'.$nomor, $approve->disetorkan);
            }else{
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Bank')
                ->setCellValue('B1', 'Tanggal')
                ->setCellValue('C1', 'NIK')
                ->setCellValue('D1', 'Nama Karyawan')
                ->setCellValue('E1', 'Rekening')
                ->setCellValue('F1', 'Nominal')
                ->setCellValue('G1', 'Keterangan')
                ->setCellValue('H1', 'Rekening Perusahaan')
                ->setCellValue('I1', 'Biaya')
                ->setCellValue('J1', 'Disetorkan')
                ->setCellValue('A'.$nomor, $approve->bank)
                ->setCellValue('B'.$nomor, $approve->tanggal)
                ->setCellValue('C'.$nomor, $approve->nik)
                ->setCellValue('D'.$nomor, $approve->nama)
                ->setCellValue('E'.$nomor, $approve->rekening)
                ->setCellValue('F'.$nomor, $approve->nominal)
                ->setCellValue('G'.$nomor, $approve->keterangan)
                ->setCellValue('H'.$nomor, $approve->rekening_perusahaan)
                ->setCellValue('I'.$nomor, $approve->biaya)
                ->setCellValue('J'.$nomor, $approve->disetorkan);
            }
            
            $nomor++; 
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('CSV Payroll');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        $date = date('Y-m-d_His');
        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Payroll'.$date.'.csv"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        // echo $spreadsheet;
        $writer = $this->spreedsheet->IOFactory($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    public function exportpegawai(){

        $spreadsheet = $this->spreedsheet->load();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Maarten Balliauw')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $data_pegawai = $this->Nata_hris_hr_model->dataPegawaiKontrak();
        $nomor = 2;
        foreach ($data_pegawai->result() as $pegawai) {
            
                 $wh=array('nik'=>$pegawai->nama_atasan);
                 $atasan = $this->Nata_hris_hr_model->dataNamaAtasan($wh)->row();

                 $whp=array('id_pendidikan'=>$pegawai->id_pendidikan);
                 $pendidikan = $this->Nata_hris_hr_model->dataNamapendidikan($whp)->row();

           
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'NIK')
                ->setCellValue('B1', 'NO KTP')
                ->setCellValue('C1', 'NPWP')
                ->setCellValue('D1', 'NAMA PANGGILAN')
                ->setCellValue('E1', 'NAMA LENGKAP')
                ->setCellValue('F1', 'TEMPAT LAHIR')
                ->setCellValue('G1', 'TANGGAL LAHIR')
                ->setCellValue('H1', 'ATASAN')
                ->setCellValue('I1', 'JENIS KELAMIN')
                ->setCellValue('J1', 'ALAMAT')
                ->setCellValue('K1', 'ALAMAT KETIKA URGENT')
                ->setCellValue('L1', 'KODE POS')
                ->setCellValue('M1', 'NOMOR TELEPON')
                ->setCellValue('N1', 'EMAIL')
                ->setCellValue('O1', 'PENDIDIKAN TERAKHIR')
                ->setCellValue('P1', 'UNIT BISNIS')
                ->setCellValue('Q1', 'DEPARTEMEN')
                ->setCellValue('R1', 'JABATAN')
                ->setCellValue('S1', 'TGL MASUK')
                ->setCellValue('T1', 'TGL KELUAR')
                ->setCellValue('U1', 'STATUS KARYAWAN')
                ->setCellValue('A'.$nomor, $pegawai->nik)
                ->setCellValue('B'.$nomor, $pegawai->nik_ktp)
                ->setCellValue('C'.$nomor, $pegawai->no_npwp)
                ->setCellValue('D'.$nomor, $pegawai->nama_panggilan)
                ->setCellValue('E'.$nomor, $pegawai->nama_lengkap)
                ->setCellValue('F'.$nomor, $pegawai->tempat_lahir)
                ->setCellValue('G'.$nomor, $pegawai->tanggal_lahir)
                ->setCellValue('H'.$nomor, ($pegawai->nama_atasan==""?"-":$atasan->nama_lengkap))
                ->setCellValue('I'.$nomor, $pegawai->jenis_kelamin)
                ->setCellValue('J'.$nomor, $pegawai->alamat)
                ->setCellValue('K'.$nomor, $pegawai->alamat_ketika_urgent)
                ->setCellValue('L'.$nomor, $pegawai->kode_pos)
                ->setCellValue('M'.$nomor, $pegawai->nomor_telepon)
                ->setCellValue('N'.$nomor, $pegawai->email)
                ->setCellValue('O'.$nomor, ($pegawai->id_pendidikan==0?"-":$pendidikan->deskripsi))
                ->setCellValue('P'.$nomor, $pegawai->nama_perusahaan)
                ->setCellValue('Q'.$nomor, $pegawai->desDepartemen)
                ->setCellValue('R'.$nomor, $pegawai->jenis_project)
                ->setCellValue('S'.$nomor, $pegawai->tanggal_keluar)
                ->setCellValue('T'.$nomor, $pegawai->tanggal_masuk)
                ->setCellValue('U'.$nomor, $pegawai->status_karyawan);
            $nomor++; 
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('CSV Pegawai');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        $date = date('Y-m-d_His');
        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pegawai'.$date.'.csv"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        // echo $spreadsheet;
        $writer = $this->spreedsheet->IOFactory($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    public function exportabsensi(){
        $whb="";
        $bln=$this->input->post('bulan');
        if($bln!=""){
            $whb=array('month(tanggal_mulai)'=>$bln);
        }

        $spreadsheet = $this->spreedsheet->load();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Maarten Balliauw')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $data_absensi = $this->Nata_hris_hr_model->dataAktifitasAbsensiKontrak($whb,"","","","");
        $nomor = 2;
        foreach ($data_absensi->result() as $absensi) {
                $masuk=explode(' ',$absensi->tanggal_mulai);
                $keluar=explode(' ',$absensi->tanggal_selesai);
                $date1 = strtotime($absensi->tanggal_mulai);
                $date2 = strtotime($absensi->tanggal_selesai);
                $interval = $date2 - $date1;
                $seconds = $interval % 60;
                $minutes = floor(($interval % 3600) / 60);
                $hours = floor($interval / 3600);
                

           
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'NIK')
                ->setCellValue('B1', 'NAMA LENGKAP')
                ->setCellValue('C1', 'TANGGAL')
                ->setCellValue('D1', 'SIGN IN')
                ->setCellValue('E1', 'SIGN OUT')
                ->setCellValue('F1', 'DURASI')
                ->setCellValue('A'.$nomor, $absensi->nik)
                ->setCellValue('B'.$nomor, $absensi->nama_lengkap)
                ->setCellValue('C'.$nomor, (strftime(" %d %B %Y",strtotime($absensi->tanggal_mulai))))
                ->setCellValue('D'.$nomor, ($absensi->tanggal_mulai!=''?$masuk[1]:'-'))
                ->setCellValue('E'.$nomor, ($absensi->tanggal_selesai!=''?$keluar[1]:'-'))
                ->setCellValue('F'.$nomor, ($absensi->tanggal_selesai!=''?$hours." Jam":'-'));
            $nomor++; 
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('CSV Absensi');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        $date = date('Y-m-d_His');
        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Absensi'.$date.'.csv"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        // echo $spreadsheet;
        $writer = $this->spreedsheet->IOFactory($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function exportOvertime(){

        $spreadsheet = $this->spreedsheet->load();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Maarten Balliauw')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');
        
        
        $data_overtime = $this->Nata_hris_hr_model->data_overtime_lembur();
        $nomor = 2;

       



        foreach ($data_overtime->result() as $overtime) {

                $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
                $hari_ini = date("Ymd",strtotime(date("Y-m-d")));
                $tmplemburan=0;
          
                $tanggal = strftime("%A",strtotime($overtime->tanggal));
                if ($tanggal == "Saturday"  || $tanggal == "Sunday") {
                    $jam=($overtime->total_menit*60) / 3600;
                        if ($jam > 1 && $jam <= 5 ) {
                            $tmplemburan=50000*$jam;

                        }else if ($jam > 5) {
                            $tmplemburan2=70000*($jam-5);
                            $tmplemburan=(50000*5)+$tmplemburan2;
                        }
                }else if (isset($array[$hari_ini]) ) {
                    
                    $jam=($overtime->total_menit*60) / 3600;
                        if ($jam > 1 && $jam <= 5 ) {
                            $tmplemburan=50000*$jam;

                        }else if ($jam > 5) {
                            $tmplemburan2=70000*($jam-5);
                            $tmplemburan=(50000*5)+$tmplemburan2;
                        }
                }else{
                    $jam=($overtime->total_menit*60) / 3600;
                    $tmplemburan=$overtime->lemburan*$jam;
                }
            



            $tmp='';
            if ($overtime->status == '0') {
                $tmp='Pengajuan';
            }else if ($overtime->status == '1') {
                $tmp='Diterima';
            }else  {
                $tmp='Ditolak';
            }
            $signin=explode(' ',$overtime->jam_mulai);
            $signout=explode(' ',$overtime->jam_selesai);
                // Add some data
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Employee Name')
                ->setCellValue('B1', 'Departement')
                ->setCellValue('C1', 'Station')
                ->setCellValue('D1', 'Title')
                ->setCellValue('E1', 'Overtime Date')
                ->setCellValue('F1', 'Time In')
                ->setCellValue('G1', 'Time Out')
                ->setCellValue('H1', 'Overtime Hours')
                ->setCellValue('I1', 'Overtime Amount')
                ->setCellValue('J1', 'Status')
                ->setCellValue('A'.$nomor, $overtime->nama_lengkap)
                ->setCellValue('B'.$nomor, $overtime->desDepartemen)
                ->setCellValue('C'.$nomor, $overtime->nama_perusahaan)
                ->setCellValue('D'.$nomor, $overtime->jenis_project)
                ->setCellValue('E'.$nomor, (strftime("%A,%B %d, %Y",strtotime($overtime->tanggal))) )
                ->setCellValue('F'.$nomor, $signin[1])
                ->setCellValue('G'.$nomor, $signout[1])
                ->setCellValue('H'.$nomor, ($overtime->total_menit/60))
                ->setCellValue('I'.$nomor, "Rp.".$tmplemburan)
                ->setCellValue('J'.$nomor, $tmp);
                
            
            $nomor++; 

        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Overtime');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        $date = date('Y-m-d_His');
        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Overtime'.$date.'.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        // echo $spreadsheet;
        $writer = $this->spreedsheet->IOFactory($spreadsheet);
        $writer->save('php://output');
        exit;
    }

	
	public function prosesHRUploadCSV()
	{	
        $uploadData=array();
		if($this->input->post('id_bank') !=""){
				$data['cekbank'] =$this->input->post('id_bank');
				$fileName = $_FILES["filecsv"]["tmp_name"];


				if ($_FILES["filecsv"]["size"] > 0) {
					$result = 0;
					$file = fopen($fileName, "r");
					$idx = 0;
                    $res=array();
                    $msg = "<table><thead class='thead-dark'><tr><th>Nik</th></tr></thead>";
					while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
						$data ="";
						
						if($idx > 0){
							
								$data = array(
									'id_bank' => $this->input->post('id_bank'),
									'bulan'=> date('mm'),
									'tahun'=> date('Y'),
									'tanggal'=>date('Y-m-d'),
									'no'=> $column[0],
									'nik'=> $column[1],
                                    'nik_upload'=> $this->session->userdata('nik'),
									'nama'=> $column[2],
									'rekening'=> $column[3],
									'nominal'=> $column[4],
									'keterangan'=> $column[5],
									'rekening_perusahaan'=> $column[6],
									'plus'=> $column[7],
									'cd'=> $column[8],
									'biaya'=> $column[9],
									'disetorkan'=> $column[10],
									'status'=> 'upload'
								);
                            $untukkaryawan = array('nik'=>$column[1]);
                            $nik = array('nik'=>$column[1]
                                    );
                            $tanggal = array('tanggal'=>date('Y-m'));

                            $wherekaryawan = $this->Nata_hris_hr_model->cekkaryawanpayroll($untukkaryawan)->num_rows();
                            $dataKaryawanPayroll = $this->Nata_hris_hr_model->cekkaryawanpayroll($untukkaryawan);
							$where = $this->Nata_hris_hr_model->cekPayrollCSV($nik,$tanggal)->num_rows();

                            // print_r($wherekaryawan);
                            // print_r($where);
                            if ($wherekaryawan > 0) {
                                if ($where <= 0) {
                                $result = $this->Nata_hris_hr_model->TambahPayrolCSV($data);

                                    if ($result > 0) {
                                        $res=array("result"=>"success","title"=>"Sukses","msg"=>"Data Payroll Berhasil Diupload");
                                    }else{
                                       $res=array("result"=>"warning","title"=>"Warning","msg"=>"Data Payroll Berhasil Diupload Namun ada yang gagal");
                                    }
                                }
                                else{
                                    $msg .= '<tr><td>'.$column[1].'</td></tr>';
                                    $res=array("result"=>"error","title"=>"Gagal","msg"=>"Data Payroll Gagal Diupload <br>Data yang salah ".$msg." ");
                                }
                            }else{
                                $msg .= '<tr><td>'.$column[1].'</td></tr>';
                                $res=array("result"=>"error","title"=>"Gagal","msg"=>"Data Payroll Gagal Diupload<br>Data yang <br>salah".$msg." ");
                            }
						}else{
                                $res=array("result"=>"error","title"=>"Gagal","msg"=>"Data Payroll Gagal Diupload");
                            }
						$idx++;
					}
                    $msg .= "</table>";
					if($result){
                        $this->session->set_flashdata($res);
                        redirect("HR/HRPayrollCreator/3");
					}else{
                        $this->session->set_flashdata($res);
                        redirect("HR/HRPayrollCreator");
                    }
				}else{
                    $this->session->set_flashdata($res);
                    redirect("HR/HRPayrollCreator");
                }
				
			}else{
				$this->session->set_flashdata($res);
                redirect("HR/HRPayrollCreator");
			}
            print_r($res);
	}
	public function HRUploadCSV()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		$data['cekbank'] ="";
				$data['menuId']=array(50,56);
				$data['content'] = 'hr/hr-upload-CSV';
				$data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
				$this->load->view('index',$data);
			
		}else{
			redirect("home/login");	
		}
	}
	public function HRUploadDataPayroll()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,56);
			$data['content'] = 'hr/hr-upload-data-payroll';
			$data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
			
			$where = array('pc.status'=>'upload');
			$data['datapayroll']= $this->Nata_hris_hr_model->dataPayrolCSV($where);
			
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRKalkulasiPayroll()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,56);
			$data['content'] = 'hr/hr-kalkulasi-payroll';
			$data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
			$where = array('pc.status'=>'upload');
			$data['datapayroll']= $this->Nata_hris_hr_model->dataPayrolCSV($where);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

    public function prosesApprovePayrollX(){
        $payapprove = $this->Nata_hris_hr_model->payrollCreate()->result_array();
        // print_r($payapprove);
        $res = $this->Nata_hris_hr_model->TambahApprovePayrol($payapprove);
        $res = $this->Nata_hris_hr_model->delPayrollApprove('trx_payroll_create');
        
        
        $result=array();
        if ($res == true) {
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Payroll Berhasil Diapprove");
        } else {
           $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Payroll Gagal Diapprove");
        }

        $this->session->set_flashdata($result);
        // redirect("HR/HRApprovePayroll");
        redirect("HR/HRPayrollCreator/4");
    }
    public function prosesApprovePayroll(){
      
        $ambildataapp5 = $this->Nata_hris_hr_model->ambildataapp5();
        foreach ($ambildataapp5->result_array() as $dt) {
            $data= $dt;
            unset($data['id']);
            unset($data['nik_upload']);
            unset($data['status']);
            unset($data['approval']);
            unset($data['jumapprove']);

            if($dt['jumapprove']>0){
                $updatepayapprove = $this->Nata_hris_hr_model->updatepayapprove($data,$data['nik']);
            }else{
                $insertpayapprove = $this->Nata_hris_hr_model->insertpayapprove($data);
            } 
            $deletepaycreate = $this->Nata_hris_hr_model->delPayrollCreate($data['nik']);
        }
        
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Payroll Berhasil Diapprove");
         $this->session->set_flashdata($result);
       
        redirect("HR/HRPayrollCreator/4");
    }


	public function HRApprovePayroll()
	{	
		
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			$data['menuId']=array(50,56);
			$data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
			
			// $where = array('status'=>'upload');
			// $updateStatus = $this->Nata_hris_hr_model->ubahStatusPayrollCreate('approve',$where);
			
			$data['datapayroll']= $this->Nata_hris_hr_model->dataPayrolApprove();


			$data['content'] = 'hr/hr-aprove-payroll';
			$data['message'] = 'Berhasil proses approval';

			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HREkseskusiPayroll()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,56);
			
			$data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
			
			$where = array('status'=>'approve');
			$updateStatus = $this->Nata_hris_hr_model->ubahStatusPayrollCreate('complete',$where);
			
			$where = array('status'=>'complete');
			$data['datapayroll']= $this->Nata_hris_hr_model->dataPayrolCSV($where);
		
			
			$data['content'] = 'hr/hr-ekseskusi-payroll';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function HRPayrollHistory()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(57);
			$data['menuId']=array(50,57);
            // $data['dataHistory'] = $this->Nata_hris_hr_model->payrollApprove();
            $data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
            $wh=array();
            if($this->input->post('bank_history')!=""){
                $wh['pa.id_bank']=$this->input->post('bank_history');
            }
            if($this->input->post('tanggal_approve_history')!=""){
                $wh['pa.tanggal']=$this->input->post('tanggal_approve_history');
            }
            $data['dataHistory']= $this->Nata_hris_hr_model->dataPayrolApproveHistory($wh);
			$data['content'] = 'hr/hr-payroll-history';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ViewHRPayrollHistory($nik,$bulan,$tahun)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,57);
			// $data['content'] = 'hr/view-hr-payroll-history';
			// $where = array('a.nik'=>$nik);
			// $data['datapegawai']= $this->Nata_hris_hr_model->dataPegawaiDtl($where);
             $where = array('ko.nik'=>$nik,
                            'tpa.bulan'=>$bulan,
                            'tpa.tahun'=>$tahun    
                    );
            $data['datapegawai']= $this->Nata_hris_hr_model->dataPegawaiDtlPayrollApprove($where);
			$this->load->view('hr/view-hr-payroll-history',$data);
		}else{
			redirect("home/login");	
		}
	}

    public function ViewHRPayrollCreator($nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(50,56);
            $data['content'] = 'hr/view-hr-payroll-creator';
            $where = array('ko.nik'=>$nik);
            //$data['datapegawai']= $this->Nata_hris_hr_model->dataPegawaiDtlPayroll($where);
            $data['datapegawai']= $this->Nata_hris_hr_model->dataPegawaiDtlPayrollHistory($where)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function ViewHRPayrollCreatorApprove($nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(50,56);
            // $data['content'] = 'hr/view-hr-payroll-creator-approve';
            $where = array('ko.nik'=>$nik);
            $data['datapegawai']= $this->Nata_hris_hr_model->dataPegawaiDtlPayrollApprove($where);
            $this->load->view('hr/view-hr-payroll-creator-approve',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function EditHRPayrollCreator($nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(50,56);
            // $data['content'] = 'hr/edit-hr-payroll-creator';
            $where = array('a.nik'=>$nik);
            $data['datapegawai']= $this->Nata_hris_hr_model->dataPegawaiDtlPayrollHistory($where)->row();
            $wh = array('nik'=>$nik);
            $data['datapotongan']= $this->Nata_hris_hr_model->dataPotongan($wh);
            $this->load->view('hr/edit-hr-payroll-creator',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function ProsesEditHRPayrollCreator()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          // $data=$this->input->post();
          // $where=array("nik"=>$data['nik']);
          // unset($data['nik']);
          //  $res=$this->Nata_hris_hr_model->upd_data("trx_payroll_create",$data,$where);

        $id=$this->input->post('nik');
          $data=array(
            "keterangan"=>$this->input->post('keterangan'),
            "biaya"=>$this->input->post('biaya'),
            "disetorkan"=>$this->input->post('disetorkan')
          );
          $this->Nata_hris_hr_model->upddata($data,$id);

         
            for($i=0;$i<count($_POST['nominal']);$i++){
                $dt=array(

                    "nik"=>$_POST['nik'],
                    "tanggal"=>$_POST['tanggal'],
                    "nominal"=>$_POST['nominal'][$i],
                    "deskripsi"=>$_POST['deskripsi'][$i]
                );
                if($_POST['nominal'][$i]!="" && $_POST['deskripsi'][$i]!="" ){
                    $this->Nata_hris_hr_model->TambahPotongan($dt);
                }
            }
            for($x=0;$x<count($_POST['nominallama']);$x++){
                $where=$_POST['id'][$x];
                $dt=array(
                    "nominal"=>$_POST['nominallama'][$x],
                    "deskripsi"=>$_POST['deskripsilama'][$x]
                );
               // if($_POST['nominal'][$i]!="" && $_POST['deskripsi'][$i]!="" ){
                    $this->Nata_hris_hr_model->EditPotongan($dt,$where);
               /// }
            }

          $result=array();
            // if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Payroll Creator Berhasil Dirubah");
            // } else {
            //    $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Payroll Creator Gagal Dirubah");
            // }
            $this->session->set_flashdata($result);
          redirect("HR//HRPayrollCreator/3");
        }else{
            redirect("home/login"); 
        }
    }
    public function HapusPotongan($id,$nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $nik=$nik;
            $wh=array("a.nik"=>$nik);
            $where=array("id_payrol_potongan"=>$id);
            $dataPotongan = $this->Nata_hris_hr_model->dataPotongan($where)->row();
            $datamaster = $this->Nata_hris_hr_model->dataPegawaiDtlPayroll($wh)->row();
            $tot=$datamaster->disetorkan+$dataPotongan->nominal;
            $whnik=array("nik"=>$nik);
            $dt=array(
                'disetorkan'=>$tot
                );
          $this->Nata_hris_hr_model->updatagaji($dt,$whnik);
          $this->My_model->del_data("trx_payrol_potongan",$where);
          $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil di Hapus");
          $this->session->set_flashdata($result);
        //   redirect("HR/EditHRPayrollCreator/".$nik);
          redirect("HR//HRPayrollCreator/3");
        }else{
            redirect("home/login"); 
        }
    }
	public function HRClaimReimbursement()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){

			$data['menuId']=array(50,58);
			$data['content'] = 'hr/hr-claim-reimbursement';
			$wh=array();
			if($this->input->post('id_departemen')!=""){
                $wh['ko.id_departemen']=$this->input->post('id_departemen');
            }
            $wh1=array();
			if($this->input->post('nik')!=""){
                $wh1['a.nik']=$this->input->post('nik');
            }
            $wh2=array();
			if($this->input->post('nama_lengkap')!=""){
                $wh2['c.nama_lengkap']=$this->input->post('nama_lengkap');
            }
            $wh3=array();
			if($this->input->post('status')!=""){
                $wh3['cr.status']=$this->input->post('status');
            }
            $wh4=array();
            if($this->input->post('id_master_perusahaan')!=""){
                $wh4['ko.id_master_perusahaan']=$this->input->post('id_master_perusahaan');
            }
            $data['dataKlaim']= $this->Nata_hris_hr_model->dataKlaimReimbursement($wh,$wh1,$wh2,$wh3,$wh4);
            $data['datadepartemen']= $this->Nata_hris_hr_model->dataDepartemenKontrak();

            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_master_perusahaan')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
			
            $this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRClaimReimbursementDetail($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(58);
		 	$data['menuId']=array(50,58);
		//	$data['content'] = 'hr/hr-claim-reimbursement-detail';
            $wh=array("cr.id_claim_remburse"=>$id);
            $data['dataKlaim']= $this->Nata_hris_hr_model->dataKlaimReimbursement($wh)->row();
            $data['dataKlaims']= $this->Nata_hris_hr_model->dataKlaimReimbursement($wh);
            $wh=array("a.id_claim_remburse"=>$id);
            $data['dataKlaimFile']= $this->Nata_hris_hr_model->dataKlaimReimbursementFile($wh);
			$this->load->view('hr/hr-claim-reimbursement-detail',$data);
		}else{
			redirect("home/login");	
		}

	}
    public function cetakClaimReimbursement($id){
        $wh=array("cr.id_claim_remburse"=>$id);
        $data['dataKlaim']= $this->Nata_hris_hr_model->dataKlaimReimbursement($wh)->row();
        $whdok=array("a.id_claim_remburse"=>$id);
        $data['dataKlaimFile']= $this->Nata_hris_hr_model->dataKlaimReimbursementFile($whdok);
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "ClaimReimbursement".date("Ymd").".pdf";
        $this->pdf->load_view('cetakClaimReimbursement', $data);
    }
    public function cetakPermohonanCuti($id){
        $id=array('id_absensi_leave'=>$id);
        $data['datapermohonancuti'] = $this->Nata_hris_hr_model->dataPermohonanCutiKontrak($id)->row();
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "cuti".date("Ymd").".pdf";
        $this->pdf->load_view('cetakPermohonanCuti', $data);
    }

    public function HRPermohonanOvertimeAjax(){
        
        
        $date=array(
            "a.tanggal >= "=>$this->input->post('startdate'),
            "a.tanggal <= "=>$this->input->post('enddate')
        );

        $data['dataOvertime'] = $this->Nata_hris_hr_model->data_overtime_lembur($date);
        
        $this->load->view('hr/permohonanovertimeajax',$data);
    }
    public function HRPermohonanOvertime(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(50,147); 

            $wh1='';
            if($this->input->post('nik')!=""){
                $wh1['a.nik']=$this->input->post('nik');
            }
            
            if($this->input->post('nama_lengkap')!=""){
                $wh1['b.nama_lengkap']=$this->input->post('nama_lengkap');
            }
            
            if($this->input->post('status')!=""){
                $wh1['a.status']=$this->input->post('status');
            }
            $data['dataOvertime'] = $this->Nata_hris_hr_model->data_overtime_lembur($wh1);
            $data['content'] = 'hr/permohonanovertime';
            $this->load->view('index',$data);
        }else{
            redirect('home');
        }
    }
    public function HapusOvertime($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $where=array("id_overtime"=>$id);
          $this->Nata_hris_hr_model->del_data("trx_overtime",$where);
        //   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berhasil di Hapus");
        //   $this->session->set_flashdata($result);
        }else{
            redirect("home/login"); 
        }
    }
    public function viewPermohonanOvertime($a)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
        $data['menuId']=array(50,147);
        $id=array('a.id_overtime'=>$a);
        //$id_claim=$this->input->post('id');
        //$data['content'] = 'employee/view-claim-remburse';
        $data['dataViewOvertime'] = $this->Nata_hris_hr_model->data_overtime_lembur($id);
        $data['dataOvertimeRow'] = $this->Nata_hris_hr_model->data_overtime_lembur($id)->row();
        $this->load->view('hr/view-permohonanovertime',$data);
        }else{
            redirect('home');
        }
    }
    public function ubahstsovertime(){
        $id=$this->input->post('id');
        $sts=$this->input->post('sts');
        $alasan=$this->input->post('alasan');
        $res = $this->Nata_hris_hr_model->ubahstsovertime($id,$sts,$alasan);
    }
	public function HRPegawai()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(59);
			$data['menuId']=array(51,59);
           
			$data['content'] = 'hr/hr-pegawai';
			$wh=array();
			 if($this->input->post('id_departemen')!=""){
                $wh['a.id_departemen']=$this->input->post('id_departemen');
            }
            $wh1=array();
			 if($this->input->post('status_karyawan')!=""){
                $wh1['a.status_karyawan']=$this->input->post('status_karyawan');
            }
            $wh2=array();
			 if($this->input->post('nama_lengkap')!=""){
                $wh2['a.nama_lengkap']=$this->input->post('nama_lengkap');
            }
            $wh3=array();
			 if($this->input->post('nik')!=""){
                $wh3['a.nik']=$this->input->post('nik');
            }
             $wh4=array();
             if($this->input->post('id_master_perusahaan')!=""){
                $wh4['ko.id_master_perusahaan']=$this->input->post('id_master_perusahaan');
            }
            //$data['dataKontrak']= $this->Nata_hris_hr_model->dataPegawaiKontrak($wh,$wh1,$wh2,$wh3,$wh4);
            $data['datadepartemen']= $this->Nata_hris_hr_model->dataDepartemenKontrak();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_master_perusahaan')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
    public function ajaxTablePegawai()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $dataAkses = $this->menu->getAkses(59);
            
            $nik=$this->input->post('nik');
            $nama_lengkap=$this->input->post('nama_lengkap');
            $id_departemen=$this->input->post('id_departemen');
            $id_master_perusahaan=$this->input->post('id_master_perusahaan');
            $status_karyawan=$this->input->post('status_karyawan');

            $requestData= $this->input->post();

            $columns = array( 
            // datatable column index  => database column name
                0 =>'a.nik', 
                1 => 'a.nama_lengkap',
                2 => 'b.nama_perusahaan',
                3 => 'e.deskripsi',
                4 => 'f.jenis_project',
                5 => 'ko.status_karyawan',
                6 => 'a.nik'
                
            );
            $wr="";
            $wl="";
            if($nik!=""){
                $wl['a.nik']=$nik;
            }
            if($nama_lengkap!=""){
                $wl['a.nama_lengkap']=$nama_lengkap;
            }
            if($id_departemen!=""){
                $wr['ko.id_departemen']=$id_departemen;
            }
            if($id_master_perusahaan!=""){
                $wr['ko.id_master_perusahaan']=$id_master_perusahaan;
            }
            if($status_karyawan!=""){
                $wr['ko.status_karyawan']=$status_karyawan;
            }
            
            $dataKontrak = $this->Nata_hris_hr_model->dataPegawaiKontrak("-",$requestData,$columns,$wr,$wl);
            $totalData = $dataKontrak->num_rows();
            $totalFiltered = $totalData;

            if (!empty($requestData['search']['value'])) {
                $dataKontrak = $this->Nata_hris_hr_model->dataPegawaiKontrak("",$requestData,$columns,$wr,$wl);
                //$totalFiltered = $dataKontrak->num_rows();
            }else{
                $dataKontrak = $this->Nata_hris_hr_model->dataPegawaiKontrak("",$requestData,$columns,$wr,$wl);
            } 

            $data = array();
            $no = 0;
            foreach ($dataKontrak->result() as $dt) {
                // preparing an array
                $requestData['start']++;
                $nestedData=array();
                $no++;                 
                
                $nestedData[] = $dt->nik;
                $nestedData[] = $dt->nama_lengkap;
                $nestedData[] = $dt->nama_perusahaan;
                $nestedData[] = $dt->desDepartemen;
                $nestedData[] = $dt->jenis_project;
                if($dt->status_karyawan=='1'){
                    $nestedData[] = '<label class="Rectangle-permanent">'.$dt->status_pegawai.'</label>';
                }else if($dt->status_karyawan=='2'){
                    $nestedData[] = '<label class="Rectangle-contract">'.$dt->status_pegawai.'</label>';
                }else if($dt->status_karyawan=='3'){
                    $nestedData[] = '<label class="Rectangle-probation">'.$dt->status_pegawai.'</label>';
                }else if($dt->status_karyawan=='4'){
                    $nestedData[] = '<label class="Rectangle-probation">'.$dt->status_pegawai.'</label>';
                }else if($dt->status_karyawan=='5'){
                    $nestedData[] = '<label class="Rectangle-resign">'.$dt->status_pegawai.'</label>';
                }
                // else if($dt->status_karyawan=='4'){
                //     $nestedData[] = '<label class="btn btn-orange2">Kontrak PKWTT</label>';
                // }else if($dt->status_karyawan=='5'){
                //     $nestedData[] = '<label class="btn btn-orange2">Resign</label>';
                // }else if($dt->status_karyawan=='6'){
                //     $nestedData[] = '<label class="btn btn-orange2">Kontrak</label>';
                // }
                ; 
                $lihat ='<a href="javascript:;" onclick="viewinfopegawai(\''.$dt->nik.'\')" class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">lihat</a>';

                    //  '<a href="'.base_url().'HR/ViewHRPegawai/'.$dt->nik.'" class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">
                    // Lihat</a>';

                if ($dataAkses == '1') {
                	$lihat.= '<a href="javascript:;" onclick="editpegawai(\''.$dt->nik.'\')" class="btn btn-aksi"><img src="'.base_url().'assets/img/Update.svg" class="padd-right-5">Edit</a>';
                    $lihat.= '<a href="javascript:;"  class="btn btn-aksi hapus"  onclick="hapus(\''.$dt->nik.'\')" title="Hapus"><img src="'.base_url().'assets/img/Delete.svg" class="padd-right-5">Hapus</a>';


                }
                $nestedData[] = $lihat;
                
                	
                
                	
                                         
                
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
            echo 'error';
            //redirect('home');
        }

    }
	public function TambahHRPegawai()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(51,59);
			// $data['content'] = 'hr/tambah-hr-pegawai';
            $data['datakar'] = $this->Nata_hris_hr_model->dataKaryawan();
            $data['dataPelamarnya'] = $this->Nata_hris_hr_model->dataPelamar();
            $data['dataJabatannya'] = $this->Nata_hris_hr_model->dataJabatan();
            $data['dataKaryawannya'] = $this->Nata_hris_hr_model->dataKaryawan();
            $data['dataDepartemennya'] = $this->Nata_hris_hr_model->dataDepartemen();
            $data['dataLoker'] = $this->Nata_hris_hr_model->dataLoker();
            $data['dataJenisTunjangannya']= $this->Nata_hris_hr_model->data_jenis_tunjangan();
           // $data['dataPOnya']= $this->Nata_hris_hr_model->data_projek_order();
            $data['databankpegawai']= $this->Nata_hris_hr_model->data_bank_payroll();
            $data['dataAgama']= $this->Nata_hris_hr_model->dataAgama();
            $data['dataStsNikah']= $this->Nata_hris_hr_model->dataStsNikah();
            $data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsi();
            $data['dataPendidikan']= $this->Nata_hris_hr_model->dataPendidikan();
            $data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $data['dataDeptC']= $this->Nata_hris_hr_model->dataDepartemen();
            $data['dataPekerjaan']= $this->Nata_hris_hr_model->dataPekerjaan();
            $wh=array("j.id_master_jenis_project IS NOT NULL");
            $data['dataPekerjaanL']= $this->Nata_hris_hr_model->dataPekerjaanL("",$wh);
			$this->load->view('hr/tambah-hr-pegawai',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function tambahCsvKaryawan(){
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,59);
			// $data['content'] = 'hr/tambah-hr-csvpegawai';
			$this->load->view('hr/tambah-hr-csvpegawai',$data);
		}else{
			redirect("home/login");	
		}
	}

	public function EditHRPegawai($nik)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(51,59);
			// $data['content'] = 'hr/edit-hr-pegawai';
            $data['datakar'] = $this->Nata_hris_hr_model->dataKaryawan();
            $tmp = str_replace(" ", "", $nik);
			$nik=array('a.nik'=>$tmp);
			//$data['dataKaryawannya'] = $this->Nata_hris_hr_model->dataPegawaiDtl($nik)->row();
            $data['dataKaryawannya'] = $this->Nata_hris_hr_model->dataPegawaiKontrak($nik)->row();
			$data['dataKaryawannyanumb'] = $this->Nata_hris_hr_model->dataPegawaiKontrak($nik)->num_rows();
            
            $data['dataJenisTunjanganKaryawan']= $this->Nata_hris_hr_model->data_jenis_tunjangan_karyawan($nik);
             $data['datadtlcutipribadi']= $this->Nata_hris_hr_model->datadtlcutipribadi($nik);
			// $id_master_perusahaan=array('id_master_perusahaan'=>$data['dataKaryawannya']->id_master_perusahaan);
   //          $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaan($id_master_perusahaan)->row();
   //          $id_lokasi_kantor=array('a.id_lokasi_kantor'=>$data['dataClient']->id_lokasi_kantor);
			// $data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi($id_lokasi_kantor)->row();
			// $id_departemen=array('a.id_departemen'=>$data['dataKaryawannya']->id_departemen);
			// $data['dataDepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($id_departemen)->row();
			// $id_master_jenis_project=array('id_master_jenis_project'=>$data['dataKaryawannya']->id_jenis_projek);
			// $data['datajenisprojek'] = $this->Nata_hris_hr_model->dataJenisProjek($id_master_jenis_project)->row();
			// $data['datajenisprojeknumb'] = $this->Nata_hris_hr_model->dataJenisProjek($id_master_jenis_project)->num_rows();
            
            
			$data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaan();
			$data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi();
			$data['dataPelamarnya'] = $this->Nata_hris_hr_model->dataJenisProjek();
            $data['dataJabatannya'] = $this->Nata_hris_hr_model->dataJabatan();
            $data['dataDepartemennya'] = $this->Nata_hris_hr_model->dataDepartemen();
            $wh=array("id_provinsi"=>$data['dataKaryawannya']->id_provinsi);
            $data['dataKabupaten'] = $this->Nata_hris_hr_model->dataKabupaten($wh);
            $wh=array("id_kabupaten"=>$data['dataKaryawannya']->id_kabupaten);
            $data['dataKecamatan'] = $this->Nata_hris_hr_model->dataKecamatan($wh);
            
            $data['dataLoker'] = $this->Nata_hris_hr_model->dataLoker();
            $data['dataJenisTunjangannya']= $this->Nata_hris_hr_model->data_jenis_tunjangan();
           //  $data['dataPOnya']= $this->Nata_hris_hr_model->data_projek_order();
            $data['databankpegawai']= $this->Nata_hris_hr_model->data_bank_payroll();

             $data['dataAgama']= $this->Nata_hris_hr_model->dataAgama();
             $data['dataStsNikah']= $this->Nata_hris_hr_model->dataStsNikah();
             $data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsi();
             $data['dataPendidikan']= $this->Nata_hris_hr_model->dataPendidikan();
            
            $data['dataDeptC']= $this->Nata_hris_hr_model->dataDepartemen();
            $data['dataPekerjaan']= $this->Nata_hris_hr_model->dataPekerjaan();
            $wh=array("j.id_master_jenis_project IS NOT NULL");
            $data['dataPekerjaanL']= $this->Nata_hris_hr_model->dataPekerjaanL("",$wh);
			$this->load->view('hr/edit-hr-pegawai',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ViewHRPegawai($nik)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(51,59);
			// $data['content'] = 'hr/view-hr-pegawai';
			$nik=array('a.nik'=>$nik);
			$data['dataKaryawannya'] = $this->Nata_hris_hr_model->dataPegawaiDtl($nik)->row();
            $nikatasan=array('nik'=>$data['dataKaryawannya']->nama_atasan);
            $data['datanamaatasan'] = $this->Nata_hris_hr_model->dataNamaAtasan($nikatasan)->row();

			$data['dataKaryawannyanumb'] = $this->Nata_hris_hr_model->dataPegawaiDtl($nik)->num_rows();

			// $id_master_perusahaan=array('id_master_perusahaan'=>$data['dataKaryawannya']->id_master_perusahaan);
   //          $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaan($id_master_perusahaan)->row();
   //          $id_lokasi_kantor=array('a.id_lokasi_kantor'=>$data['dataClient']->id_lokasi_kantor);
			// $data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi($id_lokasi_kantor)->row();
			// $id_departemen=array('a.id_departemen'=>$data['dataKaryawannya']->id_departemen);
			// $data['dataDepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($id_departemen)->row();
			// $id_master_jenis_project=array('id_master_jenis_project'=>$data['dataKaryawannya']->id_jenis_projek);
			// $data['datajenisprojek'] = $this->Nata_hris_hr_model->dataJenisProjek($id_master_jenis_project)->row();
			// $data['datajenisprojeknumb'] = $this->Nata_hris_hr_model->dataJenisProjek($id_master_jenis_project)->num_rows();

			// $data['dataPelamarnya'] = $this->Nata_hris_hr_model->dataJenisProjek();
   //          $data['dataJabatannya'] = $this->Nata_hris_hr_model->dataJabatan();
   //          $data['dataDepartemennya'] = $this->Nata_hris_hr_model->dataDepartemen();
   //          $data['dataLoker'] = $this->Nata_hris_hr_model->dataLoker();
   //          $data['dataJenisTunjangannya']= $this->Nata_hris_hr_model->data_jenis_tunjangan();
   //          $data['dataPOnya']= $this->Nata_hris_hr_model->data_projek_order();
   //          $data['databankpegawai']= $this->Nata_hris_hr_model->data_bank_payroll();
   //          $data['dataAgama']= $this->Nata_hris_hr_model->dataAgama();
   //          $data['dataStsNikah']= $this->Nata_hris_hr_model->dataStsNikah();
   //          $data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsi();
   //          $data['dataPendidikan']= $this->Nata_hris_hr_model->dataPendidikan();
            
   //          $data['dataDeptC']= $this->Nata_hris_hr_model->dataDepartemen();
   //          $data['dataPekerjaan']= $this->Nata_hris_hr_model->dataPekerjaan();
   //          $wh=array("j.id_master_jenis_project IS NOT NULL");
   //          $data['dataPekerjaanL']= $this->Nata_hris_hr_model->dataPekerjaanL("",$wh);
			$this->load->view('hr/view-hr-pegawai',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function HRDepartemen()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(144);
			$data['menuId']=array(51,144);
			$data['content'] = 'hr/hr-departemen';
			$data['datadepartemen']=$this->Nata_hris_hr_model->dataDepartemen();
			$data['datakliendepartemen']=$this->Nata_hris_hr_model->dataKlienDepartemen();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function TambahHRKlien()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(51,60);
			// $data['content'] = 'hr/tambah-hr-klien';
            $data['datalokasi'] = $this->Nata_hris_hr_model->dataLokasi();
            $data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsiLokasi();
			$data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
			$data['datacompany']=$this->Nata_hris_hr_model->dataCompany();
			$this->load->view('hr/tambah-hr-klien',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesTambahKlien(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
		  $this->My_model->add_data("master_perusahaan",$data);
          redirect("HR/HRDepartemen");
 		}else{
			redirect("home/login");	
		}
    }
    public function HapusKlien($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_master_perusahaan"=>$id);
		  $this->My_model->del_data("master_perusahaan",$where);
          redirect("HR/HRDepartemen");
 		}else{
			redirect("home/login");	
		}
	}
	
	public function TambahHRDepartemen($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(51,60);
			$data['content'] = 'hr/tambah-hr-departemen';
			$data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();

            $wh=array('a.id_master_perusahaan'=>$id);
            $datadepartemenwhi=$this->Nata_hris_hr_model->ambilDataDepartemen($wh);
            $whi=array();
            foreach ($datadepartemenwhi->result() as $dt) {
                $whi[]=$dt->id_master;
            }


            
            $data['datadepartemen']=$this->Nata_hris_hr_model->ambilDataDepartemen();
            $data['datadept']=$this->Nata_hris_hr_model->ambilDataDept('',$whi);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesTambahDepartemen($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,60);
			//$id=$this->uri->segment(3);
			$data = array(
	            //'deskripsi' => $this->input->post('deskripsi'),
                'id_master' => $this->input->post('id_master'),
	            'id_master_perusahaan' => $this->input->post('id_master_perusahaan')
	            // 'kepala_departemen' => $this->input->post('kepala_departemen')
	        );
	        $res = $this->Nata_hris_hr_model->TambahDepartemen($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Departemen Berhasil Ditambahkan");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Departemen Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);  
            //redirect("HR/HRDepartemen");          
			 redirect("HR/ViewHRKlienDepartemen/".$id);
		}else{
			redirect("home/login");	
		}
	}
	public function HapusDepartemen($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			$id_per=$this->uri->segment(4);
		  $where=array("id_departemen"=>$id);
		  $res = $this->My_model->del_data("mst_departemen",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Departemen Berhasil Dihapus");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Departemen Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/ViewHRKlienDepartemen/".$id_per);
 		}else{
			redirect("home/login");	
		}
	}
	public function HapusDivisi($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			$id_dep=$this->uri->segment(4);
		  $where=array("id_divisi"=>$id);
		  $res = $this->My_model->del_data("mst_divisi",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Divisi Berhasil Ditambahkan");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Divisi Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);
          redirect("HR/TambahHRDivisi/".$id_dep);
 		}else{
			redirect("home/login");	
		}
	}
	public function EditHRDivisi($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data['content'] = 'hr/edit-hr-divisi';
            $wh=array('id_divisi'=>$id);
            $data['datadivisi']=$this->Nata_hris_hr_model->dataDivisi($wh)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditDivisi($id){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_divisi"=>$data['id']);
          unset($data['id']);
		  $res=$this->Nata_hris_hr_model->upd_data("mst_divisi",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Divisi Berhasil Dirubah");
            }else{
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Divisi Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/TambahHRDivisi/".$id);
 		}else{
			redirect("home/login");	
		}
    }
	public function EditDepartemen($id,$idp)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data['content'] = 'hr/edit-hr-departemen';
            $where=$id;
            $data['datadepartemen']=$this->Nata_hris_hr_model->getDept($where)->row();

            $wh=array('a.id_master_perusahaan'=>$idp);
            $datadepartemenwhi=$this->Nata_hris_hr_model->ambilDataDepartemen($wh);
            $wh1=array('a.id_departemen'=>$id);
            $datadepartemenid=$this->Nata_hris_hr_model->ambilDataDepartemen($wh1)->row();
            $whi=array();
            foreach ($datadepartemenwhi->result() as $dt) {
                if($dt->id_master != $datadepartemenid->id_master ){
                     $whi[]=$dt->id_master;
                }
               
            }

            $data['datadept']=$this->Nata_hris_hr_model->ambilDataDept('',$whi);
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditDepartemen($id_dep,$id){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data=$this->input->post();
            $where=array("id_departemen"=>$data['id']);
            unset($data['id']);
            $res=$this->Nata_hris_hr_model->upd_data("mst_departemen",$data,$where);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Departemen Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Departemen Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
             redirect("HR/ViewHRKlienDepartemen/".$id_dep);
            //redirect("HR/HRDepartemen");
 		}else{
			redirect("home/login");	
		}
    }
    public function ViewHRKlienDepartemen($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
        	$data['dataAkses'] = $this->menu->getAkses(60);
            $data['menuId']=array(51,60);
            $data['content'] = 'hr/view-hr-klien';
            $wh=array('a.id_master_perusahaan'=>$id);
            $data['dataperusahaan']=$this->Nata_hris_hr_model->dataPerusahaan($wh)->row();
            $data['datadepartemen']=$this->Nata_hris_hr_model->ambilDataDepartemen($wh);
            $data['datalokasi']=$this->Nata_hris_hr_model->ambilDataLokasi($wh);
            //$data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
            // $this->load->view('hr/view-hr-klien',$data);
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ViewHRKlienDepartemenDtl($idperusahaan,$id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data['content'] = 'hr/view-hr-klien-dtl';
            $data['id_perusahaan'] = $idperusahaan;
            $wh=array('a.id_departemen'=>$id);
            $data['datadepartemen']=$this->Nata_hris_hr_model->ambilDataDepartemen($wh)->row();
            $wh=array('ko.id_departemen'=>$id);
            $data['datakaryawan']=$this->Nata_hris_hr_model->dataPegawaiKontrak($wh,"","");
            $data['datakaryawanjp']=$this->Nata_hris_hr_model->dataPegawaiKontrakJenisProject($wh,"","");
            $wh2=array('id_departemen'=>$id,'id_master_perusahaan'=>$idperusahaan);
            $data['datakaryawanjp2']=$this->Nata_hris_hr_model->dataPegawaiKontrakJenisProject2($wh2,"","");
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function TambahHRSettingNilaiJP()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data['content'] = 'hr/tambah-hr-setting-nilai-jp';
            $data['datajp']=$this->Nata_hris_hr_model->dataJenisProjek();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function TambahHRSettingNilai($idperusahaan,$iddepartemen)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data['content'] = 'hr/tambah-hr-setting-nilai';
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesTambahHRSettingNilaiJP()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data = array(
                'id_departemen' => $this->input->post('id_departemen'),
                'id_master_perusahaan' => $this->input->post('id_master_perusahaan'),
                'value_koefisien' => $this->input->post('value_koefisien'),
                'status_koefisien' => $this->input->post('status_koefisien'),
                'value_tmk' => $this->input->post('value_tmk'),
                'status_tmk' => $this->input->post('status_tmk'),
                'value_jabatan' => $this->input->post('value_jabatan'),
                'status_jabatan' => $this->input->post('status_jabatan'),
                'id_master_jenis_project' => $this->input->post('id_master_jenis_project')
            );
            $res = $this->Nata_hris_hr_model->TambahHRSettingNilai($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil Ditambahkan");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data  Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);
            redirect("HR/ViewHRKlienDepartemenDtl/".$this->input->post('id_master_perusahaan').'/'.$this->input->post('id_departemen'));
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesTambahHRSettingNilai()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data = array(
                'id_departemen' => $this->input->post('id_departemen'),
                'id_master_perusahaan' => $this->input->post('id_master_perusahaan'),
                'value_koefisien' => $this->input->post('value_koefisien'),
                'status_koefisien' => $this->input->post('status_koefisien'),
                'value_tmk' => $this->input->post('value_tmk'),
                'status_tmk' => $this->input->post('status_tmk'),
                'value_jabatan' => $this->input->post('value_jabatan'),
                'status_jabatan' => $this->input->post('status_jabatan'),
                'id_master_jenis_project' => $this->input->post('id_master_jenis_project')
            );
            $res = $this->Nata_hris_hr_model->TambahHRSettingNilai($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil Ditambahkan");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data  Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);
            redirect("HR/ViewHRKlienDepartemenDtl/".$this->input->post('id_master_perusahaan').'/'.$this->input->post('id_departemen'));
        }else{
            redirect("home/login"); 
        }
    }
    public function EditHRSettingNilai($idperusahaan,$iddepartemen,$id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            $data['content'] = 'hr/Edit-hr-setting-nilai';
            $wh=array('id_setting_nilai'=>$id);
            $data['datasettingnilai']=$this->Nata_hris_hr_model->dataSettingNilai($wh)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    // public function ProsesEditHRSettingNilai(){
       
    //     if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
    //         $idmasterperusahaan=$this->input->post('id_master_perusahaan');
    //         $iddepartemen=$this->input->post('id_departemen');
    //         $data=$this->input->post();
    //         $where=array("id_setting_nilai"=>$data['id_setting_nilai']);
    //         unset($data['id_setting_nilai']);
    //         $res = $this->Nata_hris_hr_model->upd_data("trs_setting_nilai_jabatan",$data,$where);
    //         $result=array();
    //         if ($res > 0) {
    //             $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil Dirubah");
    //         } else {
    //            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data  Gagal Dirubah");
    //         }
    //         $this->session->set_flashdata($result);
    //       redirect("HR/ViewHRKlienDepartemenDtl/".$idmasterperusahaan.'/'.$iddepartemen);
    //     }else{
    //         redirect("home/login"); 
    //     }
    // }
    
    public function EditKlien($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,60);
            //$data['content'] = 'hr/edit-hr-klien';
            $wh=array('p.id_master_perusahaan'=>$id);
            $data['dataperusahaan']=$this->Nata_hris_hr_model->dataPerusahaanLokasi($wh)->row();
            $data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsiLokasi();
            $wh=array("k.id_kabupaten"=>$data['dataperusahaan']->id_kabupaten);
            $dataKabupaten= $this->Nata_hris_hr_model->dataKabupatenLokasi($wh)->row();
            $datajumKabupaten= $this->Nata_hris_hr_model->dataKabupatenLokasi($wh)->num_rows();
            $wh1="";
            if($datajumKabupaten>1){
                $wh1=array("k.id_provinsi"=>$dataKabupaten->id_provinsi);
            }
            $data['dataKabupaten']= $this->Nata_hris_hr_model->dataKabupatenLokasi($wh1);            
            $this->load->view('hr/edit-hr-klien',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditPerusahaan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          //   $data=$this->input->post();
          //   $where=array("id_master_perusahaan"=>$data['id_master_perusahaan']);
          //   unset($data['id_master_perusahaan']);
          //   $res = $this->Nata_hris_hr_model->upd_data("master_perusahaan",$data,$where);
          //   $result=array();
          //   if ($res > 0) {
          //       $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Perusahaan Berhasil Dirubah");
          //   } else {
          //      $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Perusahaan Gagal Dirubah");
          //   }
          //   $this->session->set_flashdata($result);
          // redirect("HR/HRDepartemen");
          $data=$this->input->post();
          $where=array("id_master_perusahaan"=>$data['id_master_perusahaan']);
          
          if ( $_FILES['logo']['name'] != '' ) {
            $filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['logo']['name']);
            $filename = str_replace('(', '', $filename);
            $filename = str_replace(')', '', $filename);
            

            $config['upload_path']          = 'assets/logo_perusahaan/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['file_name']        = $filename;
            $config['overwrite']    = TRUE;
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('logo')) {
                $fileData = $this->upload->data();
                $data['logo'] = $fileData['file_name'];
                
            }
          }
          unset($data['id']);
          $res = $this->Nata_hris_hr_model->upd_data("master_perusahaan",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data  Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRDepartemen");
        }else{
            redirect("home/login"); 
        }
    }
  //   public function ProsesEditPerusahaan(){
  //       if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
  //           $data=$this->input->post();
  //           $where=array("id_master_perusahaan"=>$data['id_master_perusahaan']);
  //           unset($data['id_master_perusahaan']);
  //           $res = $this->Nata_hris_hr_model->upd_data("master_perusahaan",$data,$where);
  //           $result=array();
  //           if ($res > 0) {
  //               $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Perusahaan Berhasil Dirubah");
  //           } else {
  //              $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Perusahaan Gagal Dirubah");
  //           }
  //           $this->session->set_flashdata($result);
  //         redirect("HR/HRDepartemen");
 	// 	}else{
		// 	redirect("home/login");	
		// }
  //   }

    public function ProsesTambahPegawai()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,60);
            $id_pelamar = $this->input->post('id_pelamar')!=""?$this->input->post('id_pelamar'):'0';
            $nama_lengkap = $this->input->post('nama_lengkap');
            $sumber = $this->input->post('sumber');
            $cv_karyawan="";
            $id_pelamar="0";
            $id_loker="0";
            $replace = str_replace(" ", "", $this->input->post('nik'));
            if($sumber=="1"){
                $id_pelamar=$this->input->post("id_pelamar");
                $id_loker=$this->input->post("id_loker");
                $wh=array("pl.id_pelamar"=>$this->input->post("id_pelamar"));
                $dataLamar = $this->Nata_hris_hr_model->dataPelamar($wh)->row();
                $nama_lengkap = $dataLamar->nama_lengkap;
                $cv_karyawan=$dataLamar->file_cv;
            }

            if(count($_POST['id_leave_kategori'])>0){
                $id_leave_kategori = $_POST['id_leave_kategori'];
                $jumlah_hari = $_POST['jumlah_hari'];
                for($i=0;$i<count($_POST['id_leave_kategori']);$i++){
                    
                    $data_dtl_cuti_pribadi= array(
                        'nik'=>$replace,
                        'id_leave_kategori'=>$id_leave_kategori[$i],
                        'jumlah_hari' => str_replace(".","",$jumlah_hari[$i])
                    );
                    $this->Nata_hris_hr_model->insert_data("trx_detail_cutipribadi_karyawan",$data_dtl_cuti_pribadi);
                }
            }

			$data = array(
	            'nik' => $replace,
                'nik_ktp' => $this->input->post('nik_ktp'),
                'no_npwp'=>$this->input->post('no_npwp'),
                'id_pelamar' => $id_pelamar,
                'id_loker' => $id_loker,
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'nama_lengkap' => $nama_lengkap,
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'id_agama' => $this->input->post('id_agama'),
                'id_sts_nikah' => $this->input->post('id_sts_nikah'),
                'golongan_darah' => $this->input->post('golongan_darah'),
                'alamat' => $this->input->post('alamat'),
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'nomor_telepon_kerabat' => $this->input->post('nomor_telepon_kerabat'),
                'nama_kerabat' => $this->input->post('nama_kerabat'),
                'hubungan_kerabat' => $this->input->post('hubungan_kerabat'),
                'email' => $this->input->post('email'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'alamat_ketika_urgent'=>$this->input->post('alamat_ketika_urgent'),
                'kode_pos' => $this->input->post('kode_pos'),
                //'saldo_klaim' => str_replace(".","",$this->input->post('saldo_klaim')),
                // 'saldo_cuti' =>  $jumtothari,
                'catatan' => $this->input->post('catatan'),
                'cv_karyawan' => $cv_karyawan
	        );
            $id_karyawan=$this->Nata_hris_hr_model->insert_data("trx_karyawan",$data);
            // $nopo=0;
            // if($this->input->post('id_po')!=""){
            //     $whpo=array("id_projek_order"=>$this->input->post('id_po'));
            //     $dtpo=$this->Nata_hris_hr_model->data_projek_order($whpo);
            //     if($dtpo->num_rows()>0){
            //         $datapo=$this->Nata_hris_hr_model->data_projek_order($whpo)->row();
            //         $nopo=$datapo->no_projek_order;
                    
            //     }
            // }
            $data_kontrak= array(
               // 'no_kontrak'=>$nopo,
                'status_karyawan'=>$this->input->post('status_karyawan'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'tanggal_keluar' => $this->input->post('tanggal_keluar'),
                'nik' => $replace,
                'id_master_perusahaan'=> $this->input->post('id_client'),
                'id_jenis_project' => $this->input->post('id_master_jenis_project'),
                'id_departemen' => $this->input->post('id_dept'),
                'status_karyawan' => $this->input->post('status_karyawan'),
                'bpjs_kes' => str_replace(".","",$this->input->post('bpjs_kes')),
                'bpjs_tk' => str_replace(".","",$this->input->post('bpjs_tk')),
                'pph' => str_replace(".","",$this->input->post('pph')),
                // 'lemburan' => str_replace(".","",$this->input->post('lemburan')),
                'nama_atasan' => str_replace(".","",$this->input->post('nama_atasan')),
                'gaji' =>str_replace(".","",$this->input->post('standar_gaji'))
            );
            $this->Nata_hris_hr_model->insert_data("trx_kontrak",$data_kontrak);
            
            $data_gaji= array(
                'nik'=>$replace,
                'standar_gaji'=>str_replace(".","",$this->input->post('standar_gaji')),
                'id_bank' => $this->input->post('id_bank'),
                'nomor_rek' => $this->input->post('nomor_rek'),
                'atas_nama_rek' => $this->input->post('atas_nama_rek')
            );
            $id_karyawan_gaji=$this->Nata_hris_hr_model->insert_data("trx_karyawan_gaji",$data_gaji);
            
            if(count($_POST['id_tunjangan'])>0){
                $id_tunjangan = $_POST['id_tunjangan'];
                $besar_tunjangan = $_POST['besar_tunjangan'];
                for($i=0;$i<count($_POST['id_tunjangan']);$i++){
                    
                    $data_tunjangan= array(
                        'id_karyawan_gaji'=>$id_karyawan_gaji,
                        'nik'=>$replace,
                        'id_jenis_tunjangan'=>$id_tunjangan[$i],
                        'nilai' => str_replace(".","",$besar_tunjangan[$i])
                    );
                    $this->Nata_hris_hr_model->insert_data("trx_karyawan_gaji_lainnya",$data_tunjangan);
                    
                }
            }
           

            $data_pendidikan= array(
                'nik'=>$replace,
                'id_pendidikan'=>$this->input->post('id_pendidikan'),
                'nama_sekolah' => $this->input->post('nama_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_masuk' => $this->input->post('tahun_masuk'),
                'tahun_lulus' => $this->input->post('tahun_lulus')
            );
            $id_karyawan_pendidikan=$this->Nata_hris_hr_model->insert_data("trx_karyawan_pendidikan",$data_pendidikan);
            $data_riwayatkerja= array(
                'nik'=>$replace,
                'tahun_mulai'=>$this->input->post('tahun_mulai'),
                'tahun_selesai'=>$this->input->post('tahun_selesai'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_jabatan' => $this->input->post('nama_jabatan')
            );
            $id_riwayatkerja=$this->Nata_hris_hr_model->insert_data("trx_karyawan_riwayat_kerja",$data_riwayatkerja);
            if($sumber=="2"){
                $datauser=array(
                    "nik"=>$replace,
                    "nik_ktp"=>$this->input->post("nik_ktp"),
                    "id_pelamar"=>$id_pelamar,
                    "username"=>$this->input->post("email"),
                    "password"=>"GGI",
                    "id_jenis_user"=>"1",
                    "tanggal"=>date("Y-m-d H:i:s"),
                    "status"=>"1"
                );
                $id_user=$this->Nata_hris_hr_model->insert_data("trx_user",$datauser);
            } else{
                $datauser=array(
                    "nik"=>$replace,
                    "id_jenis_user"=>"1"
                );
                $where=array(
                    "id_pelamar"=>$id_pelamar
                );
                $upduser=$this->Nata_hris_hr_model->upd_data("trx_user",$datauser,$where);
            }
            $datanpwp=array(
                'id_karyawan'=>$id_karyawan,
                'nik_ktp'=>$this->input->post('nik_ktp'),
                'kode_npwp'=>$this->input->post('no_npwp'),
                'tempat_pembuatan'=>$this->input->post('tempat_buat')
            );
            $this->Nata_hris_hr_model->insert_data("trx_npwp",$datanpwp);
            $kirimemail=$this->kirimEmailny('pegawai',$this->input->post("nik"),$this->input->post('email'),"");
            //if ($kirimemail == "success") {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pegawai Berhasil di Tambah");
            // }else{
            //     $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Pegawai Gagal di Tambah");
            // }
            
            $this->session->set_flashdata($result);
			redirect("HR/HRPegawai");
		}else{
			redirect("home/login");	
		}

	}
    public function ProsesEditPegawai(){
          echo "masuk";
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,60);

            $id_pelamar = $this->input->post('id_pelamar')!=""?$this->input->post('id_pelamar'):'0';
            $nama_lengkap = $this->input->post('nama_lengkap');
            $sumber = $this->input->post('sumber');
            $cv_karyawan="";
            $id_pelamar="0";
            $id_loker="0";
            if($sumber=="1"){
                $id_pelamar=$this->input->post("id_pelamar");
                $id_loker=$this->input->post("id_loker");
                $wh=array("pl.id_pelamar"=>$this->input->post("id_pelamar"));
                $dataLamar = $this->Nata_hris_hr_model->dataPelamar($wh)->row();
            }
            $nik_baru=$this->input->post('nik_baru');
            $nik_lama=$this->input->post('nik');
            $replacelama = str_replace(" ", "", $this->input->post('nik'));
            $replacebaru = str_replace(" ", "", $this->input->post('nik_baru'));
            $where = array("nik"=> $replacelama);
            
			$data = array(
	            'nik' => $replacebaru,
                'nik_ktp' => $this->input->post('nik_ktp'),
                'no_npwp'=>$this->input->post('no_npwp'),
                'id_pelamar' => $id_pelamar,
                'id_loker' => $id_loker,
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'id_agama' => $this->input->post('id_agama'),
                'id_sts_nikah' => $this->input->post('id_sts_nikah'),
                'golongan_darah' => $this->input->post('golongan_darah'),
                'alamat' => $this->input->post('alamat'),
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'nomor_telepon_kerabat' => $this->input->post('nomor_telepon_kerabat'),
                'nama_kerabat' => $this->input->post('nama_kerabat'),
                'hubungan_kerabat' => $this->input->post('hubungan_kerabat'),
                'email' => $this->input->post('email'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'alamat_ketika_urgent'=>$this->input->post('alamat_ketika_urgent'),
                'kode_pos' => $this->input->post('kode_pos'),
               // 'saldo_klaim' => str_replace(".","",$this->input->post('saldo_klaim')),
                'saldo_cuti' => $this->input->post('saldo_cuti'),
                'catatan' => $this->input->post('catatan'),
	        );

            $numrowkaryawan= $this->Nata_hris_hr_model->dataKaryawan($where)->num_rows();
            if($numrowkaryawan>0){
                $updkar=$this->Nata_hris_hr_model->upd_data("trx_karyawan",$data,$where);
            } else {
                $id_karyawan=$this->Nata_hris_hr_model->insert_data("trx_karyawan",$data);
            }
            
            
            if($nik_baru==$nik_lama){
                $wherea = array("a.nik"=> $replacelama);
            }else{
                $wherea = array("a.nik"=> $replacebaru);
            }
            
            $id_karyawan= $this->Nata_hris_hr_model->dataPegawaiDtl($wherea)->row()->id_karyawan;
            
            $data_kontrak= array(
                'status_karyawan'=>$this->input->post('status_karyawan'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'tanggal_keluar' => $this->input->post('tanggal_keluar'),
                'nik' => $replacebaru,
                'id_master_perusahaan'=> $this->input->post('id_client'),
                'id_jenis_project' => $this->input->post('id_master_jenis_project'),
                'bpjs_kes' => str_replace(".","",$this->input->post('bpjs_kes')),
                'bpjs_tk' => str_replace(".","",$this->input->post('bpjs_tk')),
                'pph' => str_replace(".","",$this->input->post('pph')),
                // 'lemburan' => str_replace(".","",$this->input->post('lemburan')),
                'nama_atasan' => str_replace(".","",$this->input->post('nama_atasan')),
                'id_departemen' => $this->input->post('id_dept'),
            );

            $wher = array("ko.nik"=> $replacelama);
            $kontraknumrow = $this->Nata_hris_hr_model->dataKontrakKaryawan($wher)->num_rows();

            if($kontraknumrow>0){
                $updkontrak=$this->Nata_hris_hr_model->upd_data("trx_kontrak",$data_kontrak,$where);

                $nikb=array('nik'=>$replacebaru);
                $nikl=array('nik'=>$replacelama);
                $this->Nata_hris_hr_model->upd_data("trx_kontrak",$nikb,$nikl);
            } else {
                $this->Nata_hris_hr_model->insert_data("trx_kontrak",$data_kontrak);
            }
            
            $data_gaji= array(
                'nik'=>$replacebaru,
                'standar_gaji'=>str_replace(".","",$this->input->post('standar_gaji')),
                'id_bank' => $this->input->post('id_bank'),
                'nomor_rek' => $this->input->post('nomor_rek'),
                'atas_nama_rek' => $this->input->post('atas_nama_rek')
            );

            $whereg = array("g.nik"=> $this->input->post('nik'));
            $gajinumrow = $this->Nata_hris_hr_model->dataGaji($whereg)->num_rows();

            if($gajinumrow>0){
                $updgaji=$this->Nata_hris_hr_model->upd_data("trx_karyawan_gaji",$data_gaji,$where);
                $nikb=array('nik'=>$replacebaru);
                $nikl=array('nik'=>$replacelama);
                $this->Nata_hris_hr_model->upd_data("trx_karyawan_gaji",$nikb,$nikl);
            } else {
                $id_karyawan_gaji=$this->Nata_hris_hr_model->insert_data("trx_karyawan_gaji",$data_gaji);
            }
            
            $data_pendidikan= array(
                'nik'=>$replacebaru,
                'id_pendidikan'=>$this->input->post('id_pendidikan'),
                'nama_sekolah' => $this->input->post('nama_sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_masuk' => $this->input->post('tahun_masuk'),
                'tahun_lulus' => $this->input->post('tahun_lulus')
            );
            $pendidikannumrow=$this->Nata_hris_hr_model->dataPendidikanKaryawan($where)->num_rows();
            if($pendidikannumrow>0){
                $updpendidikan=$this->Nata_hris_hr_model->upd_data("trx_karyawan_pendidikan",$data_pendidikan,$where);
                $nikb=array('nik'=>$replacebaru);
                $nikl=array('nik'=>$replacelama);
                $this->Nata_hris_hr_model->upd_data("trx_karyawan_pendidikan",$nikb,$nikl);
            } else {
                $id_karyawan_pendidikan=$this->Nata_hris_hr_model->insert_data("trx_karyawan_pendidikan",$data_pendidikan);
            }
            
            $data_riwayatkerja= array(
                'nik'=>$replacelama,
                'tahun_mulai'=>$this->input->post('tahun_mulai'),
                'tahun_selesai'=>$this->input->post('tahun_selesai'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_jabatan' => $this->input->post('nama_jabatan')
            );
            $riwayatkerjanumrow=$this->Nata_hris_hr_model->dataRiwayatKerja($where)->num_rows();
            if($riwayatkerjanumrow>0){
                $updriwayatkerja=$this->Nata_hris_hr_model->upd_data("trx_karyawan_riwayat_kerja",$data_riwayatkerja,$where);
                $nikb=array('nik'=>$replacebaru);
                $nikl=array('nik'=>$replacelama);
                $this->Nata_hris_hr_model->upd_data("trx_karyawan_riwayat_kerja",$nikb,$nikl);
            } else {
                $id_riwayatkerja=$this->Nata_hris_hr_model->insert_data("trx_karyawan_riwayat_kerja",$data_riwayatkerja);
            }
            
            if($sumber=="2"){
                $datauser=array(
                    "nik"=>$replacebaru,
                    "nik_ktp"=>$this->input->post("nik_ktp"),
                    "id_pelamar"=>$id_pelamar,
                    "id_jenis_user"=>"1",
                    "tanggal"=>date("Y-m-d H:i:s"),
                    "status"=>"1"
                );
                $usernumrow=$this->Nata_hris_hr_model->dataUser($where)->num_rows();
                if($usernumrow>0){
                    $upduser=$this->Nata_hris_hr_model->upd_data("trx_user",$datauser,$where);
                    $nikb=array('nik'=>$replacebaru);
                    $nikl=array('nik'=>$replacelama);
                    $this->Nata_hris_hr_model->upd_data("trx_user",$nikb,$nikl);
                } else {
                    $id_user=$this->Nata_hris_hr_model->insert_data("trx_user",$datauser);
                }
            } 
            
            $datanpwp=array(
                'id_karyawan'=>$id_karyawan,
                'nik_ktp'=>$this->input->post('nik_ktp'),
                'kode_npwp'=>$this->input->post('no_npwp'),
                'tempat_pembuatan'=>$this->input->post('tempat_buat')
            );
            $wherenpwp=array("id_karyawan"=>$id_karyawan);
            $npwpnumrow=$this->Nata_hris_hr_model->dataNPWP($wherenpwp)->num_rows();
            if($npwpnumrow>0){
                $updnpwp=$this->Nata_hris_hr_model->upd_data("trx_npwp",$datanpwp,$wherenpwp);
            } else {
                $this->Nata_hris_hr_model->insert_data("trx_npwp",$datanpwp);
            }

            $id_karyawan_gaji=$this->input->post("id_karyawan_gaji");
            if(isset($_POST['id_tunjangan'])){
                if(count($_POST['id_tunjangan'])>0){
                    $id_tunjangan = $_POST['id_tunjangan'];
                    $besar_tunjangan = $_POST['besar_tunjangan'];
                    for($i=0;$i<count($_POST['id_tunjangan']);$i++){
                        
                        $data_tunjangan= array(
                            'id_karyawan_gaji'=>$id_karyawan_gaji,
                            'nik'=>$replacebaru,
                            'id_jenis_tunjangan'=>$id_tunjangan[$i],
                            'nilai' => str_replace(".","",$besar_tunjangan[$i])
                        );
                        $this->Nata_hris_hr_model->insert_data("trx_karyawan_gaji_lainnya",$data_tunjangan);
                        $nikb=array('nik'=>$replacebaru);
                        $nikl=array('nik'=>$replacelama);
                        $this->Nata_hris_hr_model->upd_data("trx_karyawan_gaji_lainnya",$nikb,$nikl);
                    }
                }
            }
//            echo '<br/>hasil '.count($_POST['id_detail_cutipribadi_karyawanubah']);
             if(isset($_POST['id_detail_cutipribadi_karyawanubah']) && count($_POST['id_detail_cutipribadi_karyawanubah'])>0){
                 
                $id_detail_cutipribadi_karyawanubah = $_POST['id_detail_cutipribadi_karyawanubah'];
                $jumlah_hariubah = $_POST['jumlah_hariubah'];
                for($i=0;$i<count($_POST['id_detail_cutipribadi_karyawanubah']);$i++){
                    
                    $data_leave_kategoriubah= array(
                        'jumlah_hari' => str_replace(".","",$jumlah_hariubah[$i])
                    );
                    $wherelk=array(
                        'nik'=>$replacebaru,
                        'id_leave_kategori'=>$id_detail_cutipribadi_karyawanubah[$i]
                    );
                $updnpwp=$this->Nata_hris_hr_model->upd_data("trx_detail_cutipribadi_karyawan",$data_leave_kategoriubah,$wherelk);
                    $nikb=array('nik'=>$replacebaru);
                    $nikl=array('nik'=>$replacelama);
                $this->Nata_hris_hr_model->upd_data("trx_detail_cutipribadi_karyawan",$nikb,$nikl);
                    print_r($data_leave_kategoriubah);
                    print_r($wherelk);
                    
                }
                 if(isset($_POST['id_leave_kategori']) && count($_POST['id_leave_kategori'])>0){
                     $id_leave_kategori = $_POST['id_leave_kategori'];
                     
 //                 $id_leave_kategori = 13;
 //                 echo '<br/>masuk2'.$id_leave_kategori;
 //                 print_r($id_leave_kategori);
                      $jumlah_hari = $_POST['jumlah_hari'];
     //                 $jumlah_hari= 4;
     //                 echo '<br/>masuk2'.$jumlah_hari;
                         for($i=0;$i<count($_POST['id_leave_kategori']);$i++){

                             $data_dtl_cuti_pribadi= array(
                                 'nik'=>$replacelama,
                                 'id_leave_kategori'=>$id_leave_kategori[$i],
                                 'jumlah_hari' => str_replace(".","",$jumlah_hari[$i])
                             );
                             $this->Nata_hris_hr_model->insert_data("trx_detail_cutipribadi_karyawan",$data_dtl_cuti_pribadi);
     //                        print_r($data_dtl_cuti_pribadi);
                         }
                 }
                 
                 
            }else{
                $id_leave_kategori = $_POST['id_leave_kategori'];
                $jumlah_hari = $_POST['jumlah_hari'];
                    for($i=0;$i<count($_POST['id_leave_kategori']);$i++){
                        
                        $data_dtl_cuti_pribadi= array(
                            'nik'=>$replacelama,
                            'id_leave_kategori'=>$id_leave_kategori[$i],
                            'jumlah_hari' => str_replace(".","",$jumlah_hari[$i])
                        );
                        $this->Nata_hris_hr_model->insert_data("trx_detail_cutipribadi_karyawan",$data_dtl_cuti_pribadi);
//                        print_r($data_dtl_cuti_pribadi);
                    }

            }
            
            

            if(isset($_POST['id_tunjanganubah']) && count($_POST['id_tunjanganubah'])>0){
                $id_tunjangan = $_POST['id_tunjanganubah'];
                $besar_tunjangan = $_POST['besar_tunjanganubah'];
                for($i=0;$i<count($_POST['id_tunjanganubah']);$i++){
                    
                    $data_tunjangan= array(
                        'id_karyawan_gaji'=>$id_karyawan_gaji,
                        'nilai' => str_replace(".","",$besar_tunjangan[$i])
                    );
                    $wheret=array(
                        'nik'=>$replacebaru,
                        'id_jenis_tunjangan'=>$id_tunjangan[$i]
                    );
                    $updnpwp=$this->Nata_hris_hr_model->upd_data("trx_karyawan_gaji_lainnya",$data_tunjangan,$wheret);
                    $nikb=array('nik'=>$replacebaru);
                    $nikl=array('nik'=>$replacelama);
                    $this->Nata_hris_hr_model->upd_data("trx_karyawan_gaji_lainnya",$nikb,$nikl);
                }
            }

            $nikb=array('nik'=>$replacebaru);
            $nikl=array('nik'=>$replacelama);
            $emailb=array('username'=>$this->input->post('email'));
            $emaill=array('username'=>$this->input->post('email_lama'));
            $password=array('password'=>$this->input->post('password'));
            $passwordlama=$this->input->post('password');
            $emailuser= $this->Nata_hris_hr_model->dataUser($nikl)->num_rows();
            $pwduser= $this->Nata_hris_hr_model->dataUser($nikl)->num_rows();
            if($emailuser>0){
                $this->Nata_hris_hr_model->upd_data("trx_user",$emailb,$nikl);
            }
            if($passwordlama != ""){
                $this->Nata_hris_hr_model->upd_data("trx_user",$password,$nikl);
            }else{
                $password=array('password'=>"GGI");
                $this->Nata_hris_hr_model->upd_data("trx_user",$password,$nikl);
            }
//            print_r($updnpwp);
            $this->Nata_hris_hr_model->upd_data("trx_detail_cutipribadi_karyawan",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_user",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_absensi",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_absensi_leave",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_overtime",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_payroll_create",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_payroll_approve",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_payrol_potongan",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_create_history",$nikb,$nikl);
            $this->Nata_hris_hr_model->upd_data("trx_claim_remburse",$nikb,$nikl);
            $nikbf=array('created_by_nik'=>$replacebaru);
            $niklf=array('created_by_nik'=>$replacelama);
            $this->Nata_hris_hr_model->upd_data("trx_claim_detail_file",$nikbf,$niklf);
            $nikatasanb=array('nama_atasan'=>$replacebaru);
            $nikatasanl=array('nama_atasan'=>$replacelama);
            $this->Nata_hris_hr_model->upd_data("trx_kontrak",$nikatasanb,$nikatasanl);

            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pegawai Berhasil di Edit");
            $this->session->set_flashdata($result);
			redirect("HR/HRPegawai");
		}else{
			redirect("home/login");	
		}
        
    }

    public function HapusPegawai($nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $where=array("nik"=>$nik);
          $res = $this->My_model->del_data("trx_karyawan",$where);
          $res = $this->My_model->del_data("trx_kontrak",$where);
          $res = $this->My_model->del_data("trx_karyawan_gaji",$where);
          $res = $this->My_model->del_data("trx_user",$where);
          $res = $this->My_model->del_data("trx_karyawan_pendidikan",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pegawai Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Pegawai Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
            echo "Sukses";
            // redirect("HR/HRPegawai");
        }else{
            echo "Gagal";
            // redirect("home/login"); 
        }
    }

    public function hapusPegawaiTunjangan($nik,$id){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $where=array("id_karyawan_gaji_lainnya"=>$id);
            $res = $this->My_model->del_data("trx_karyawan_gaji_lainnya",$where);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Tunjangan Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Tunjangan Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          // redirect("HR/EditHRPegawai/".$nik);
          redirect("HR/HRPegawai");
 		}else{
			redirect("home/login");	
		}
    }
     public function HapusPegawaiCuti($nik,$id){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $where=array("id_detail_cutipribadi_karyawan"=>$id);
            $res = $this->My_model->del_data("trx_detail_cutipribadi_karyawan",$where);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Cuti Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Cuti Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          // redirect("HR/EditHRPegawai/".$nik);
          redirect("HR/HRPegawai");
        }else{
            redirect("home/login"); 
        }
    }
	public function TambahHRDivisi($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(51,60);
			$data['content'] = 'hr/tambah-hr-divisi';
			$wh=array('a.id_departemen'=>$id);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($wh)->row();
			$divisi=array('id_departemen'=>$data['datadepartemen']->id_departemen);
			$data['datadivisi'] = $this->Nata_hris_hr_model->dataDivisi($divisi);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesTambahDivisi()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,60);
			$data = array(
	            'id_departemen' => $this->input->post('id_departemen'),
	            'nama_divisi' => $this->input->post('nama_divisi')
	        );
	        $res = $this->Nata_hris_hr_model->TambahDivisi($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Divisi Berhasil Ditambahkan");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Divisi Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);
			redirect("HR/TambahHRDivisi/".$this->input->post('id_departemen'));
		}else{
			redirect("home/login");	
		}
	}
	public function ViewHRDivisi($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(51,60);
			$data['content'] = 'hr/view-hr-divisi';
			$wh=array('a.id_departemen'=>$id);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($wh)->row();
			$divisi=array('id_departemen'=>$data['datadepartemen']->id_departemen);
			$data['datadivisi'] = $this->Nata_hris_hr_model->dataDivisi($divisi);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}

    public function HRResign()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(149);
			$data['menuId']=array(51,149);
			$data['content'] = 'hr/hr-resign';
			$wh=array();
			if($this->input->post('nik')!=''){
				  $wh['a.nik']=$this->input->post('nik');
			}
			$wh1=array();
			if($this->input->post('nama_lengkap')!=''){
				  $wh1['a.nama_lengkap']=$this->input->post('nama_lengkap');
			}
			$wh2=array();
			if($this->input->post('id_departemen')!=''){
				  $wh2['a.id_departemen']=$this->input->post('id_departemen');
			}
			$wh3=array();
			if($this->input->post('status_karyawan')!=''){
				  $wh3['a.status_karyawan']=$this->input->post('status_karyawan');
			}
            $wh4=array();
            if($this->input->post('id_master_perusahaan')!=''){
                  $wh4['ko.id_master_perusahaan']=$this->input->post('id_master_perusahaan');
            }
            $data['dataResign']= $this->Nata_hris_hr_model->dataResign($wh,$wh1,$wh2,$wh3,$wh4);
            $data['datadepartemen']= $this->Nata_hris_hr_model->dataDepartemenKontrak();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_master_perusahaan')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
    }
    
    public function ViewHRResign($nik)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,149);
			$wh=array('a.nik'=>$nik);
			$data['dataresign'] = $this->Nata_hris_hr_model->dataResign($wh)->row();
			$dep=array('a.id_departemen'=>$data['dataresign']->id_departemen);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($dep)->row();
			//$jab=array('id_jabatan'=>$data['datakontrak']->id_jabatan);
			//$data['datajabatan'] = $this->Nata_hris_hr_model->dataJabatanKontrak($jab)->row();
			// $data['content'] = 'hr/view-hr-kontrak';
			$this->load->view('hr/view-hr-resign',$data);
		}else{
			redirect("home/login");	
		}
	}

	public function HRKontrak()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(119);
			$data['menuId']=array(51,119);
			$data['content'] = 'hr/hr-kontrak';
			$wh=array();
			if($this->input->post('nik')!=''){
				  $wh['a.nik']=$this->input->post('nik');
			}
			$wh1=array();
			if($this->input->post('nama_lengkap')!=''){
				  $wh1['a.nama_lengkap']=$this->input->post('nama_lengkap');
			}
			$wh2=array();
			if($this->input->post('id_departemen')!=''){
				  $wh2['a.id_departemen']=$this->input->post('id_departemen');
			}
			$wh3=array();
			if($this->input->post('status_karyawan')!=''){
				  $wh3['a.status_karyawan']=$this->input->post('status_karyawan');
			}
            $wh4=array();
            if($this->input->post('id_master_perusahaan')!=''){
                  $wh4['ko.id_master_perusahaan']=$this->input->post('id_master_perusahaan');
            }
            $data['dataKontrak']= $this->Nata_hris_hr_model->dataKontrak($wh,$wh1,$wh2,$wh3,$wh4);
            $data['datadepartemen']= $this->Nata_hris_hr_model->dataDepartemenKontrak();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_master_perusahaan')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function EditHRKontrak($nik)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,119);
			$wh=array('a.nik'=>$nik);
			$data['datakontrak'] = $this->Nata_hris_hr_model->dataKontrak($wh)->row();
			$dep=array('a.id_departemen'=>$data['datakontrak']->id_departemen);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($dep)->row();
			//$jab=array('id_jabatan'=>$data['datakontrak']->id_jabatan);
			//$data['datajabatan'] = $this->Nata_hris_hr_model->dataJabatanKontrak($jab)->row();
			//$data['content'] = 'hr/edit-hr-kontrak';
			$this->load->view('hr/edit-hr-kontrak',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesEditKontrak(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_kontrak"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("trx_kontrak",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kontrak Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kontrak Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRKontrak");
 		}else{
			redirect("home/login");	
		}
    }
    public function ViewHRKontrak($nik)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,119);
			$wh=array('a.nik'=>$nik);
			$data['datakontrak'] = $this->Nata_hris_hr_model->dataKontrak($wh)->row();
			$dep=array('a.id_departemen'=>$data['datakontrak']->id_departemen);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($dep)->row();
			//$jab=array('id_jabatan'=>$data['datakontrak']->id_jabatan);
			//$data['datajabatan'] = $this->Nata_hris_hr_model->dataJabatanKontrak($jab)->row();
			// $data['content'] = 'hr/view-hr-kontrak';
			$this->load->view('hr/view-hr-kontrak',$data);
		}else{
			redirect("home/login");	
		}
	}

    public function EditHRResign($nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(51,119);
            $wh=array('a.nik'=>$nik);
            $data['datakontrak'] = $this->Nata_hris_hr_model->dataResign($wh)->row();
            $dep=array('a.id_departemen'=>$data['datakontrak']->id_departemen);
            $data['datadepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak($dep)->row();
            //$jab=array('id_jabatan'=>$data['datakontrak']->id_jabatan);
            //$data['datajabatan'] = $this->Nata_hris_hr_model->dataJabatanKontrak($jab)->row();
            //$data['content'] = 'hr/edit-hr-kontrak';
            $this->load->view('hr/edit-hr-resign',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function ProsesEditResign(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $data=$this->input->post();
          $where=array("id_kontrak"=>$data['id']);
          unset($data['id']);
          $res = $this->Nata_hris_hr_model->upd_data("trx_kontrak",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Resign Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Resign Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRResign");
        }else{
            redirect("home/login"); 
        }
    }

	public function HRInformasiGaji()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,120);
			$data['content'] = 'hr/hr-informasi-gaji';
			$data['datadepartemen']= $this->Nata_hris_hr_model->dataDepartemenKontrak();
			$data['databank']= $this->Nata_hris_hr_model->data_bank_payroll();
			$wh1=array();
			 if($this->input->post('nik')!=""){
                $wh1['a.nik']=$this->input->post('nik');
            }
            $wh2=array();
			 if($this->input->post('nama_lengkap')!=""){
                $wh2['a.nama_lengkap']=$this->input->post('nama_lengkap');
            }
            $wh3=array();
			 if($this->input->post('id_departemen')!=""){
                $wh3['ko.id_departemen']=$this->input->post('id_departemen');
            }
            $wh4=array();
			 if($this->input->post('id_bank')!=""){
                $wh4['kg.id_bank']=$this->input->post('id_bank');
            }
            $wh5=array();
             if($this->input->post('id_master_perusahaan')!=""){
                $wh5['ko.id_master_perusahaan']=$this->input->post('id_master_perusahaan');
            }
            $data['dataInfoGaji']= $this->Nata_hris_hr_model->data_info_gaji($wh1,$wh2,$wh3,$wh4,$wh5);
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_master_perusahaan')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ViewInformasiGaji($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,120);
			//$data['content'] = 'hr/view-hr-informasi-gaji';
			$wh=array('a.nik'=>$id);
            $data['datainformasigaji']= $this->Nata_hris_hr_model->dataInformasiGaji($wh)->row();
            $data['datainformasigajitunjangan']= $this->Nata_hris_hr_model->dataInformasiGajiTunjangan( $data['datainformasigaji']->nik);
            $data['data_GajiLainnyaRow']= $this->Nata_hris_hr_model->dataInformasiGajiTunjangan( $data['datainformasigaji']->nik)->num_rows();
            $data['datainformasigajiNPWPRows']= $this->Nata_hris_hr_model->dataInformasiGajiTunjanganNPWP( $data['datainformasigaji']->nik_ktp)->num_rows();
            $data['datainformasigajiNPWP']= $this->Nata_hris_hr_model->dataInformasiGajiTunjanganNPWP( $data['datainformasigaji']->nik_ktp)->row();
			//$this->load->view('index',$data);
            $this->load->view('hr/view-hr-informasi-gaji',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function HRTunjangan($id="")
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(121);
			$data['menuId']=array(51,121);
			$data['content'] = 'hr/hr-tunjangan';
			$data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaanOnly();
            $wh="";
            if($this->input->post('id_client')!=""){
                $wh=array('a.id_master_perusahaan'=>$this->input->post('id_client'));
            }
            $data['dataDeptC']= $this->Nata_hris_hr_model->ambilDataDepartemen($wh);
            $data['dataJenisTunjangan']= $this->Nata_hris_hr_model->data_jenis_tunjangan();
            $data['datadepartemen']= $this->Nata_hris_hr_model->dataDepartemenKontrak();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HREditTunjangan($nik,$id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,121);
			// $data['content'] = 'hr/edit-hr-tunjangan';
			$wh=array('a.nik'=>$nik,'a.id_jenis_tunjangan'=>$id);
            $data['dataEditTunjangan']= $this->Nata_hris_hr_model->data_edit_tunjangan($wh)->row();
			$this->load->view('hr/edit-hr-tunjangan',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesEditTunjangan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_karyawan_gaji_lainnya"=>$data['id_karyawan_gaji_lainnya']);
          unset($data['id_karyawan_gaji_lainnya']);
		  $res = $this->Nata_hris_hr_model->upd_data("trx_karyawan_gaji_lainnya",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Tunjangan Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Tunjangan Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRTunjangan/".$this->input->post('id_jenis_tunjangan'));
 		}else{
			redirect("home/login");	
		}
    }
    public function ViewTunjangan($nik,$id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,121);
			// $data['content'] = 'hr/view-hr-tunjangan';
			$wh=array('a.nik'=>$nik,'a.id_jenis_tunjangan'=>$id);
            $data['dataEditTunjangan']= $this->Nata_hris_hr_model->data_edit_tunjangan($wh)->row();
			$this->load->view('hr/view-hr-tunjangan',$data);
		}else{
			redirect("home/login");	
		}
	}

	public function HRPelatihan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(122);
			$data['menuId']=array(51,122);
			$data['content'] = 'hr/hr-pelatihan';
			$wh1=array();
            if($this->input->post('nama_program')!=""){
                $wh1['a.nama_program']=$this->input->post('nama_program');
            }
            $wh2=array();
            if($this->input->post('lokasi')!=""){
                $wh2['a.lokasi']=$this->input->post('lokasi');
            }
			$data['datapelatihan'] = $this->Nata_hris_hr_model->dataPelatihan($wh1,$wh2);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function HRPelatihanDetail()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,122);
			$id=$this->input->post('id');
			$data['content'] = 'hr/hr-pelatihan-detail';
			$data['datapelatihandetail'] = $this->Nata_hris_hr_model->dataPelatihanDetail1($id)->row();
			$data['datapelatihandetailkaryawan'] = $this->Nata_hris_hr_model->dataPelatihanDetail($id);
            $wh=array("e.id_training_jadwal"=>$id);
            $data['dataPegawai']= $this->Nata_hris_hr_model->dataPegawaiChecked($wh);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRPelatihanDetailPeserta()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,122);
			$id=$this->input->post('id');
			$data['content'] = 'hr/hr-pelatihan-detail-peserta';
			$data['datapelatihandetailpeserta'] = $this->Nata_hris_hr_model->dataPelatihanDetailpeserta($id)->row();
			$data['datapelatihandetail'] = $this->Nata_hris_hr_model->dataPelatihanDetail($data['datapelatihandetailpeserta']->id_training_jadwal)->row();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ubahstslulus(){
			$id=$this->input->post('id');
			$sts=$this->input->post('sts');
			$alasan=$this->input->post('alasan');
			$tgl=date('Y-m-d');
			$this->Nata_hris_hr_model->ubahstslulus($id,$sts,$tgl,$alasan);
		}
	public function TambahHRPelatihan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,122);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->data_departemen();
            $data['dataPegawai']= $this->Nata_hris_hr_model->dataKontrak();
            $data['dataklien']=$this->Nata_hris_hr_model->dataPerusahaanLokasi();
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaan();
            $data['dataDeptC']= $this->Nata_hris_hr_model->dataDepartemen();
            $data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi();
			$data['content'] = 'hr/tambah-hr-pelatihan';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahPelatihan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,122);
			$data = array(
	            'nama_program' => $this->input->post('nama_program'),
	            'nama_pelatih' => $this->input->post('nama_pelatih'),
	            'lokasi' => $this->input->post('lokasi'),
	            'id_departemen' => $this->input->post('id_dept'),
                'id_master_perusahaan' => $this->input->post('id_client'),
	            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
	            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
	            'deskripsi' => $this->input->post('deskripsi'),
	            'status' =>1
	        );
	        $id_pelatihan=$this->Nata_hris_hr_model->TambahPelatihan($data);
            $pilkar = $_POST['pilih_karyawan'];
            for($i=0;$i<count($_POST['pilih_karyawan']);$i++){
                $datad=array(
                    "id_training_jadwal"=>$id_pelatihan,
                    "nik"=>$pilkar[$i]
                );
                $this->Nata_hris_hr_model->TambahDtlPelatihan($datad);
            }
            $result=array();
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pelatihan Berhasil Ditambahkan");
            $this->session->set_flashdata($result);
			redirect("HR/HRPelatihan");
		}else{
			redirect("home/login");	
		}
	}
	public function EditHRPelatihan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,122);
			$data['datadepartemen'] = $this->Nata_hris_hr_model->data_departemen();
			$data['datapelatihan'] = $this->Nata_hris_hr_model->ambildataPelatihan($id)->row();
            //$data['datapelatihandtl'] = $this->Nata_hris_hr_model->ambildataPelatihan($id)->row();
            $wh=array("e.id_training_jadwal"=>$id);
            $data['dataPegawai']= $this->Nata_hris_hr_model->dataPegawaiJumChecked("",$id);
            $data['dataClient']= $this->Nata_hris_hr_model->dataPerusahaan();
            $data['dataDeptC']= $this->Nata_hris_hr_model->dataDepartemen();
            $data['dataLokasiC']= $this->Nata_hris_hr_model->dataLokasi();
			$data['content'] = 'hr/edit-hr-pelatihan';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesEditPelatihan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $id_pelatihan=$data['id'];
          $where=array("id_training_jadwal"=>$data['id']);
          $datajd=array(
            "nama_program"=>$data['nama_program'],
            "nama_pelatih"=>$data['nama_pelatih'],
            'id_departemen' => $this->input->post('id_dept'),
            'id_master_perusahaan' => $this->input->post('id_client'),
            "tanggal_mulai"=>$data['tanggal_mulai'],
            "tanggal_selesai"=>$data['tanggal_selesai'],
            "lokasi"=>$data['lokasi'],
            "deskripsi"=>$data['deskripsi']
          );
		  $this->Nata_hris_hr_model->upd_data("trx_training_jadwal",$datajd,$where);  
            $pilkar = isset($_POST['pilih_karyawan'])?$_POST['pilih_karyawan']:array();
            $wh=array("e.id_training_jadwal"=>$id_pelatihan);
            $dataPegawai= $this->Nata_hris_hr_model->dataPegawaiChecked($wh);
            foreach($dataPegawai->result() as $dt){
                if(!in_array($dt->nik,$pilkar)){
                    $where=array("id_detail_training_jadwal"=>$dt->id_detail_training_jadwal);
                    $this->My_model->del_data("detail_training_jadwal",$where);
                } else if(in_array($dt->nik,$pilkar)){
                    $key = array_search($dt->nik,$pilkar);
                    unset($pilkar[$key]);
                }
            }
            $pilkar = array_values($pilkar);
            for($i=0;$i<count($pilkar);$i++){
                $datad=array(
                    "id_training_jadwal"=>$id_pelatihan,
                    "nik"=>$pilkar[$i]
                );
                $this->Nata_hris_hr_model->TambahDtlPelatihan($datad);
            } 
            $result=array();
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pelatihan Berhasil Dirubah");
            $this->session->set_flashdata($result);
		 // print_r($data);
          redirect("HR/HRPelatihan");
 		}else{
			redirect("home/login");	
		}
    }
    public function HapusPelatihan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_training_jadwal"=>$id);
		  $res = $this->My_model->del_data("trx_training_jadwal",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pelatihan Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Pelatihan Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRPelatihan");
 		}else{
			redirect("home/login");	
		}
	}


	public function HRKPI()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(135);
			$data['menuId']=array(51,135);
			$data['content'] = 'hr/hr-KPI';
			$data['datakpi']=$this->Nata_hris_hr_model->dataKPI();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
    public function HRPenilaianKinerja()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
        	$data['dataAkses'] = $this->menu->getAkses(141);
            $data['menuId']=array(51,141);
            $data['content'] = 'hr/hr-penilaian-kinerja';
            $data['dataReview']=$this->Nata_hris_hr_model->dataReview();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function TambahHRPenilaianKinerja()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,141);
			$data['content'] = 'hr/tambah-hr-penilaian-kinerja';
			$data['dataklien']=$this->Nata_hris_hr_model->dataPerusahaanLokasi();
            $data['dataKlien']=$this->Nata_hris_hr_model->dataPerusahaanLokasi2();
            $data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawannilai();
			$this->load->view('index',$data);
		} else {
			redirect("home/login");	
		}

	}
    public function HRNilaiKinerja($nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(51,141);
            $data['content'] = 'hr/hr-nilai-kinerja';
            $wh=array('nik'=>$nik);
            //$tanggal=date("Y-m");
            //$data['dataViewPenKerjaRow'] = $this->Nata_hris_employee_model->data_view_penkerja("",$tanggal)->num_rows();
            $data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan($wh)->row();
            $data['dataAspek'] = $this->Nata_hris_hr_model->data_aspek_penilaian();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesTambahPenilaianKinerja(){
        $id_aspek = explode(',',$_POST['id_aspek']);
        $ratingValue = explode(',', $_POST['ratingValue']);
        $num = 0;
        $nik = $this->input->post("nik");
        $periode = date('Y-m-d');

        
        $id_review = array();
        foreach ($id_aspek as $id) {
            $data = array();
            $data=array(
                "nik"=>$this->input->post("nik"),
                "tanggal"=>date("Y-m-d H:i:s"),
                "id_review_aspek"=>$id,
                "periode"=>date('Y-m-d')
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
                "nama_pic"=>$this->input->post("nama_pic"),
                "nik"=>$this->input->post("nik"),
                "score"=>$this->input->post("nilai"),
                "hasil"=>$this->input->post("rata"),
                "hasil_akhir"=>$this->input->post("akhir"),
                "keterangan"=>$this->input->post("keterangan"),
                "tanggal"=>date("Y-m-d H:i:s"),
                "periode"=>date('Y-m-d')
            );
            
        
        $res=$this->Nata_hris_employee_model->insert_review360($dataupdate);
        if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil Ditambahkan");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);

        redirect('HR/HRPenilaianKinerja');
    }
    public function HapusPenilaianKinerja($nik)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $where=array("nik"=>$nik);
            $res = $this->My_model->del_data("trx_review_score",$where);
            $res = $this->My_model->del_data("trx_review",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data KPI Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data KPI Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRPenilaianKinerja");
        }else{
            redirect("home/login"); 
        }
    }


	public function TambahHRKPI()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,135);
			$data['content'] = 'hr/tambah-hr-KPI';
			$data['datajabatan']=$this->Nata_hris_hr_model->dataProjekBlmAda();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahKPI()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,135);
			$data = array(
	            //'id_jabatan' => $this->input->post('id_jabatan'),
                'id_master_jenis_project'=>$this->input->post('id_jabatan'),
	            'aspek_performance' => $this->input->post('aspek_performance'),
	            'nilai_performance' => $this->input->post('nilai_performance')
	        );
	        $res = $this->Nata_hris_hr_model->TambahKPI($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data KPI Berhasil Ditambahkan");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data KPI Gagal Ditambahkan");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRKPI");
		}else{
			redirect("home/login");	
		}
	}
	public function HapusKPI($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_kpi"=>$id);
		  $res = $this->My_model->del_data("trx_kpi",$where);
          //
               // $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data KPI Berhasil Dihapus");
           // } else {
             //  $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data KPI Gagal Dihapus");
            //}
            $this->session->set_flashdata($result);
          redirect("HR/HRKPI");
 		}else{
			redirect("home/login");	
		}
	}
	public function EditKPI($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,135);
            $data['content'] = 'hr/edit-hr-kpi';
            $where=$id;
            $data['datakpi']=$this->Nata_hris_hr_model->getKPI($where)->row();
            $wh=array("id_master_jenis_project"=>$data['datakpi']->id_master_jenis_project);
            $data['datajabatan']=$this->Nata_hris_hr_model->dataProject($wh);
            
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditKPI(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_kpi"=>$data['id']);
          unset($data['id']);
          unset($data['files']);
		  $res = $this->Nata_hris_hr_model->upd_data("trx_kpi",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data KPI Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data KPI Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
		 // print_r($data);
          redirect("HR/HRKPI");
 		}else{
			redirect("home/login");	
		}
    }
    public function ViewKPI($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,135);
            $data['content'] = 'hr/view-hr-kpi';
            $where=$id;
            $data['datajabatan']=$this->Nata_hris_hr_model->dataJabatan();
            $data['datakpi']=$this->Nata_hris_hr_model->getKPI($where)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function HRTeguran()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,138);
			$data['content'] = 'hr/hr-teguran';
			$data['datateguran']=$this->Nata_hris_hr_model->dataTeguran();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function TambahHRTeguran()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,138);
			$data['content'] = 'hr/tambah-hr-teguran';
			$data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahTeguran()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,138);
			$data = array(
	            'nik' => $this->input->post('nik'),
	            'tanggal_create' => date("Y-m-d"),
	            'alasan' => $this->input->post('alasan'),
                'status_teguran'=>$this->input->post('status_teguran')
	        );
            //print_r($data);
	        $res = $this->Nata_hris_hr_model->TambahTeguran($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data SP Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data SP Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRTeguran");
		}else{
			redirect("home/login");	
		}
	}
    public function HapusTeguran($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_teguran"=>$id);
		  $res = $this->My_model->del_data("trx_teguran",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data SP Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data SP Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRTeguran");
 		}else{
			redirect("home/login");	
		}
	}
	public function EditTeguran($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,138);
            $data['content'] = 'hr/edit-hr-teguran';
            $where=array("id_teguran"=>$id);
            $data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
            $data['datateguran']=$this->Nata_hris_hr_model->dataTeguran($where)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditTeguran(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_teguran"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("trx_teguran",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data SP Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data SP Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRTeguran");
 		}else{
			redirect("home/login");	
		}
    }
    public function ViewTeguran($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(51,138);
            $data['content'] = 'hr/view-hr-teguran';
            $where=array("id_teguran"=>$id);
            $data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
            $data['datateguran']=$this->Nata_hris_hr_model->dataTeguran($where)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
	public function HRStrukturOrganisasi()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(61);
			$data['menuId']=array(52,61);
			$data['content'] = 'hr/hr-struktur-organisasi';
            $data['dataorganisasi'] = $this->Nata_hris_hr_model->data_organisasi();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
    public function TambahHROrganisasi()
    {
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(52,62);
            //$data['content'] = 'hr/tambah-hr-organisasi';
            $data['datakaryawan'] = $this->Nata_hris_hr_model->dataKaryawan();
            $data['dataorganisasi'] = $this->Nata_hris_hr_model->data_organisasi();
            $this->load->view('hr/tambah-hr-organisasi',$data);
        }else{
            redirect("home/login");
        }
    }
    public function ProsesTambahOrganisasi()
    {
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(52,62);
            $data = array(
                          'id_parent' => $this->input->post('id_parent'),
                          'jabatan' => $this->input->post('jabatan'),
                          'nama_karyawan' => $this->input->post('nama_karyawan')
                         
                          );
          
            $res = $this->Nata_hris_hr_model->TambahOrganisasi($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Organisasi Berhasil Ditambah");
            } else {
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Organisasi Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
            redirect("HR/HRStrukturOrganisasi");
        }else{
            redirect("home/login");
        }
        
    }
    public function HapusOrganisasi($id)
    {
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $where=array("id_struktur_organisasi"=>$id);
            $res = $this->My_model->del_data("trx_struktur_organisasi",$where);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Organisasi Berhasil Dihapus");
            } else {
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Organisasi Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          //  redirect("HR/HRStrukturOrganisasi");
        }else{
            redirect("home/login");
        }
    }
    public function EditOrganisasi($id)
    {
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(52,62);
            //$data['content'] = 'hr/edit-hr-organisasi';
            $data['dataorganisasidetail'] = $this->Nata_hris_hr_model->dataOrganisasiDetail($id)->row();
            $data['dataorganisasi'] = $this->Nata_hris_hr_model->data_organisasi();
            $this->load->view('hr/edit-hr-organisasi',$data);
        }else{
            redirect("home/login");
        }
    }
    public function ProsesEditOrganisasi(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data=$this->input->post();
            $where=array("id_struktur_organisasi"=>$data['id_struktur_organisasi']);
            
            $res = $this->Nata_hris_hr_model->upd_data("trx_struktur_organisasi",$data,$where);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Organisasi Berhasil Dirubah");
            } else {
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Organisasi Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
            redirect("HR/HRStrukturOrganisasi");
        }else{
            redirect("home/login");
        }
    }
    
	public function HRKebijakan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(62);
			$data['menuId']=array(52,62);
			$data['content'] = 'hr/hr-kebijakan';

			$wh1=array();
            if($this->input->post('id_policetype')!=""){
                $wh1['a.id_policetype']=$this->input->post('id_policetype');
            }

            $wh2=array();
            if($this->input->post('judul')!=""){
                $wh2['a.judul']=$this->input->post('judul');
            }
            $wh3=array();
            if($this->input->post('tanggal_mulai')!=""){
                $wh3['a.tanggal_mulai']=$this->input->post('tanggal_mulai');
            }
             $wh4=array();
            if($this->input->post('status')!=""){
                $wh3['a.status']=$this->input->post('status');
            }

			$data['datatipekebijakan'] = $this->Nata_hris_hr_model->data_tipe_kebijakan();
			$data['datadepartemen'] = $this->Nata_hris_hr_model->data_departemen();
			$data['datakebijakan'] = $this->Nata_hris_hr_model->data_kebijakan($wh1,$wh2,$wh3);
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function TambahHRKebijakan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(52,62);
			//$data['content'] = 'hr/tambah-hr-kebijakan';
			$data['datatipekebijakan'] = $this->Nata_hris_hr_model->data_tipe_kebijakan();
			$data['datadepartemen'] = $this->Nata_hris_hr_model->data_departemen();
			$this->load->view('hr/tambah-hr-kebijakan',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesTambahKebijakan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(52,62);
			$data = array(
	            'judul' => $this->input->post('judul'),
	            'nik' => $this->session->userdata('nik'),
	            'id_policetype' => $this->input->post('id_policetype'),
	           // 'id_departemen' => $this->input->post('id_departemen'),
	            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
	            // 'tanggal_selesai' => $this->input->post('tanggal_selesai'),
	            'tanggal_pembuatan' => date('Y-m-d'),
	            'deskripsi' => $this->input->post('deskripsi'),
	            'status' =>1
	        );
            if ( $_FILES['dokumen']['name'] != '' ) {
				$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['dokumen']['name']);
				$filename = str_replace('(', '', $filename);
				$filename = str_replace(')', '', $filename);
				$data['dokumen'] = $filename;

				$config['upload_path']          = 'assets/kebijakan/';
				$config['allowed_types']        = 'jpg|jpeg|png|pdf';
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
            // print_r($data);
	        $res = $this->Nata_hris_hr_model->TambahKebijakan($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kebijakan Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kebijakan Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRKebijakan");
		}else{
			redirect("home/login");	
		}

	}
	public function HapusKebijakan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_kebijakan"=>$id);
		  $res = $this->My_model->del_data("trx_kebijakan",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kebijakan Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kebijakan Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRKebijakan");
 		}else{
			redirect("home/login");	
		}
	}
	public function HRKebijakanDetail($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(62);
		 	$data['menuId']=array(52,62);
			//$data['content'] = 'hr/hr-kebijakan-detail';
			$data['datakebijakandetail'] = $this->Nata_hris_hr_model->dataKebijakanDetail($id)->row();
			$this->load->view('hr/hr-kebijakan-detail',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function HREditKebijakan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(52,62);
			//$data['content'] = 'hr/edit-hr-kebijakan';
			$data['datakebijakandetail'] = $this->Nata_hris_hr_model->dataKebijakanDetail($id)->row();
			$data['datatipekebijakan'] = $this->Nata_hris_hr_model->data_tipe_kebijakan();
			$data['datadepartemen'] = $this->Nata_hris_hr_model->data_departemen();
			$this->load->view('hr/edit-hr-kebijakan',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesEditKebijakan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_kebijakan"=>$data['id']);
          if ( $_FILES['dokumen']['name'] != '' ) {
			$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['dokumen']['name']);
			$filename = str_replace('(', '', $filename);
			$filename = str_replace(')', '', $filename);
			

			$config['upload_path']          = 'assets/kebijakan/';
			$config['allowed_types']        = 'jpg|jpeg|png|pdf';
			$config['file_name']        = $filename;
			$config['overwrite'] 	= TRUE;
			// $config['max_size']             = 100;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

            if ($this->upload->do_upload('dokumen')) {
                $fileData = $this->upload->data();
            	$data['dokumen'] = $fileData['file_name'];
                
        	}
          }
          unset($data['id']);
          // print_r($data);
		  $res = $this->Nata_hris_hr_model->upd_data("trx_kebijakan",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kebijakan Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kebijakan Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRKebijakan");
 		}else{
			redirect("home/login");	
		}
    }
	public function ubahstskebijakan(){
			$id=$this->input->post('id');
			$sts=$this->input->post('sts');
			$this->Nata_hris_hr_model->ubahstskebijakan($id,$sts);
		}


	public function HRPengumumanPerusahaan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(123);
			$data['menuId']=array(37,123);
			$data['content'] = 'hr/hr-pengumuman-perusahaan';
			$data['datapengumumanperusahaan'] = $this->Nata_hris_hr_model->datPengumumanPerusahaan();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function TambahHRPengumumanPerusahaan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,123);
			//$data['content'] = 'hr/tambah-hr-pengumuman-perusahaan';
			$this->load->view('hr/tambah-hr-pengumuman-perusahaan',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahPengumumanPerusahaan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,123);
			$data = array(
	            'judul' => $this->input->post('judul'),
	            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
	            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
	            'deskripsi' => $this->input->post('deskripsi')
	        );
			if ( $_FILES['lampiran']['name'] != '' ) {
				$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['lampiran']['name']);
				$filename = str_replace('(', '', $filename);
				$filename = str_replace(')', '', $filename);
				$data['lampiran'] = $filename;
                
				$config['upload_path']          = 'assets/pengumuman/';
				$config['allowed_types']        = 'jpg|jpeg|png|pdf';
				$config['file_name']        = $filename;
				$config['overwrite'] 	= TRUE;
				// $config['max_size']             = 100;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

	            if ($this->upload->do_upload('lampiran')) {
	            	
            	}
            }

	        $res = $this->Nata_hris_hr_model->TambahPengumumanPerusahaan($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pengumuman Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Pengumuman Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRPengumumanPerusahaan");
		}else{
			redirect("home/login");	
		}

	}
	public function HapusPengumumanPerusahaan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_pengumuman_perusahaan"=>$id);
		  $res = $this->My_model->del_data("trx_pengumuman_perusahaan",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pengumuman Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Pengumuman Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRPengumumanPerusahaan");
 		}else{
			redirect("home/login");	
		}
	}
	public function EditPengumumanPerusahaan($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(37,123);
           // $data['content'] = 'hr/edit-hr-pengumuman-perusahaan';
            $where=$id;
            $data['datapengumumanperusahaan']=$this->Nata_hris_hr_model->getPengumumanPerusahaan($where)->row();
            $this->load->view('hr/edit-hr-pengumuman-perusahaan',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditPengumumanPerusahaan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_pengumuman_perusahaan"=>$data['id']);
          unset($data['id']);

          if ( $_FILES['lampiran']['name'] != '' ) {
				$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['lampiran']['name']);
				$filename = str_replace('(', '', $filename);
				$filename = str_replace(')', '', $filename);
				$data['lampiran'] = $filename;
                
				$config['upload_path']          = 'assets/pengumuman/';
				$config['allowed_types']        = 'jpg|jpeg|png|pdf';
				$config['file_name']        = $filename;
				$config['overwrite'] 	= TRUE;
				// $config['max_size']             = 100;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

	            if ($this->upload->do_upload('lampiran')) {
	            	
            	}
            }
            
		  $res = $this->Nata_hris_hr_model->upd_data("trx_pengumuman_perusahaan",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pengumuman Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Pengumuman Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRPengumumanPerusahaan");
 		}else{
			redirect("home/login");	
		}
    }
    public function ViewPengumumanPerusahaan($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(37,123);
           // $data['content'] = 'hr/view-hr-pengumuman-perusahaan';
            $where=$id;
            $data['datapengumumanperusahaan']=$this->Nata_hris_hr_model->getPengumumanPerusahaan($where)->row();
            $this->load->view('hr/view-hr-pengumuman-perusahaan',$data);
        }else{
            redirect("home/login"); 
        }
    }


		public function cariBerita()
			{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,124);
			$judul=$this->input->post('cari');
			$wh=array('judul'=>$judul);
			$data['content'] = 'hr/hr-berita';
			$databerita= $this->Nata_hris_hr_model->dataBerita($wh);
			foreach ($databerita->result() as $dataBerita) { 
           echo ' 
                    <div class="row">
                        <div class="col-12 col-md-2 text-center">
                            <img src="'.base_url().'assets/img/berita/'.($dataBerita->image!=''?$dataBerita->image:'noimage.png' ).'" class="img-fluid" />
                        </div>
                        <div class="col-sm-8 col-md-8 m-t-10">
                            <h6>'.$dataBerita->judul.'</h6>
                            <p class="fz-14-isi">'.$dataBerita->location.','.strftime(" %d %B %Y",strtotime($dataBerita->tanggal)).'</p>
                            <p class="fz-14-isi">'.substr($dataBerita->deskripsi,0,175) .'...</p>
                            <span>
                                <a href="'.base_url().'HR/HRBeritaDetail/'.$dataBerita->id_berita .'" class="btn btn-aksi col-md-3 col-6"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Selengkapnya</a> 
                                 <a href="'.base_url().'HR/EditHRBerita/'.$dataBerita->id_berita .'" class="btn btn-aksi "><img src="'.base_url().'assets/img/Update.svg" class="padd-right-5">Edit</a>

                                <a href="javascript:;>"  class="btn btn-aksi hapus"  title="Hapus"><img src="'.base_url().'assets/img/Delete.svg" class="padd-right-5">Hapus</a> 

                                <label class="switch" >
                                    <input type="checkbox" onclick="ubah(\''.$dataBerita->id_berita.'\',\''.($dataBerita->status=='1'?'1':'0').'\')" '.($dataBerita->status=='1'?'checked':'').'>
                                    <span class="slider round"></span>
                                </label>
                        </div>
                        <div class="col-sm-2 col-md-2">
                           
                        </div>
                    </div>  <hr>';
         } 
			//$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRBerita()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(124);
			$data['menuId']=array(37,124);
			$data['content'] = 'hr/hr-berita';
			$data['databerita'] = $this->Nata_hris_hr_model->dataBerita();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function TambahHRBerita()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,124);
			//$data['content'] = 'hr/tambah-hr-berita';
			$this->load->view('hr/tambah-hr-berita',$data);
		}else{
			redirect("home/login");	
		}

	}
        
	public function ProsesTambahBerita()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,124);

			$data = array(
	            'judul' => $this->input->post('judul'),
	            'tanggal'=>date('Y-m-d'),
	            'location'=>'Bandung',
	            'deskripsi'=>$this->input->post('deskripsi')
	        );
			if ( $_FILES['image']['name'] != '' ) {
					$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['image']['name']);
					$filename = str_replace('(', '', $filename);
					$filename = str_replace(')', '', $filename);
					$data['image'] = $filename;

					// $result = $this->M_article->insert($data);

					
						$config['upload_path']          = 'assets/img/berita/';
						$config['allowed_types']        = 'jpeg|jpg|png';
						$config['file_name']        = $filename;
						$config['overwrite'] 	= TRUE;
						// $config['max_size']             = 100;
						// $config['max_width']            = 1024;
						// $config['max_height']           = 768;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

			            if ($this->upload->do_upload('image')) {
			            	
			            	}
				    }


			
	        $res = $this->Nata_hris_hr_model->TambahBerita($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berita Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Berita Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRBerita");
		}else{
			redirect("home/login");	
		}
	}
	public function EditHRBerita($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,124);
			//$data['content'] = 'hr/edit-hr-berita';
            $data['databerita']=$this->Nata_hris_hr_model->dataBeritaDetail($id)->row();
			$this->load->view('hr/edit-hr-berita',$data);
		}else{
			redirect("home/login");	
		}

	}
    public function ProsesEditBerita()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,124);

			$data = array(
	            'judul' => $this->input->post('judul'),
	            'tanggal'=>date('Y-m-d'),
	            'location'=>$this->input->post("location"),
	            'deskripsi'=>$this->input->post('deskripsi')
	        );
			if ( $_FILES['image']['name'] != '' ) {
					$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['image']['name']);
					$filename = str_replace('(', '', $filename);
					$filename = str_replace(')', '', $filename);
					$data['image'] = $filename;

					// $result = $this->M_article->insert($data);

					
						$config['upload_path']          = 'assets/img/berita/';
						$config['allowed_types']        = 'gif|jpg|png';
						$config['file_name']        = $filename;
						$config['overwrite'] 	= TRUE;
						// $config['max_size']             = 100;
						// $config['max_width']            = 1024;
						// $config['max_height']           = 768;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

			            if ($this->upload->do_upload('image')) {
			            	
			            	}
				    }


			$dt=array("id_berita"=>$this->input->post("id"));
	        $res = $this->Nata_hris_hr_model->EditBerita($dt,$data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berita Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Berita Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRBerita");
		}else{
			redirect("home/login");	
		}
	}
	public function HapusBerita($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_berita"=>$id);
		  $res = $this->My_model->del_data("trx_berita",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Berita Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Berita Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRBerita");
 		}else{
			redirect("home/login");	
		}
	}
	public function HRBeritaDetail($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,124);
			//$data['content'] = 'hr/hr-berita-detail';
			$data['databeritadetail']=$this->Nata_hris_hr_model->dataBeritaDetail($id)->row();
			$this->load->view('hr/hr-berita-detail',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ubahsts(){
			$id=$this->input->post('id');
			$sts=$this->input->post('sts');
			$this->Nata_hris_hr_model->ubahsts($id,$sts);
		}
	


	public function HRKuesioner()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(125);
			$data['menuId']=array(37,125);
			$data['content'] = 'hr/hr-kuesioner';
			$data['datakuesioner'] = $this->Nata_hris_hr_model->dataKuesioner();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function TambahHRKuesioner()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,125);
			// $data['content'] = 'hr/tambah-hr-kuesioner';
			$data['datadepartemen'] = $this->Nata_hris_hr_model->data_departemen();
			$this->load->view('hr/tambah-hr-kuesioner',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahKuesioner()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,125);
			
			$data = array(
	            'judul' => $this->input->post('judul'),
	            //'id_departemen' => $this->input->post('id_departemen'),
	            'tanggal' => date('Y-m-d'),
	            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
	            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
	            'deskripsi' => $this->input->post('deskripsi'),
                'link_google_doc' => $this->input->post('link_google_doc')
	        );
	        $id=$this->Nata_hris_hr_model->TambahKuesioner($data);

	        $jumpertanyaan=count($this->input->post('id_questioner_pertanyaan'));
			for ($i=0; $i < $jumpertanyaan; $i++) { 
				$dt = array(
		            'id_questioner' => $id,
		            'pertanyaan' => $_POST['id_questioner_pertanyaan'][$i]
		        );
		        $this->Nata_hris_hr_model->TambahKuesionerpertanyaan($dt);
			}
            $result=array();
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kuesioner Berhasil Ditambah");
            $this->session->set_flashdata($result);
			redirect("HR/HRKuesioner");
		}else{
			redirect("home/login");	
		}
	}
	public function EditHRKuesioner($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,125);
			// $data['content'] = 'hr/edit-hr-kuesioner';
			$data['datakuesionerdetail']=$this->Nata_hris_hr_model->dataKuesionerDetail($id)->row();
			$data['datakuesionerdetailpertanyaan']=$this->Nata_hris_hr_model->dataKuesionerDetailPertanyaan($id);
			$this->load->view('hr/edit-hr-kuesioner',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesEditKuesioner()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,125);
			$id_questioner=$this->input->post('id_questioner');
			$data = array(
	            'judul' => $this->input->post('judul'),
	            'tanggal' => date('Y-m-d'),
	            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
	            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
	            'deskripsi' => $this->input->post('deskripsi'),
                'link_google_doc' => $this->input->post('link_google_doc')
	        );
	        $this->Nata_hris_hr_model->EditKuesioner($data,$id_questioner);

	       $jumpertanyaan=count($this->input->post('id_questioner_pertanyaan'));
			for ($i=0; $i < $jumpertanyaan; $i++) { 
				$id=array(
					'id_questioner_pertanyaan'=>$_POST['id'][$i]
				);
				$dt = array(
		            //'id_questioner' => $id,
		            'pertanyaan' => $_POST['id_questioner_pertanyaan'][$i]
		        );
		        $this->Nata_hris_hr_model->EditKuesionerpertanyaan($dt,$id);
			}
			$jumpertanyaan=count($this->input->post('id_questioner_pertanyaan2'));
			for ($i=0; $i < $jumpertanyaan; $i++) { 
				$dt = array(
		            'id_questioner' => $id_questioner,
		            'pertanyaan' => $_POST['id_questioner_pertanyaan2'][$i]
		        );
		        $this->Nata_hris_hr_model->TambahKuesionerpertanyaan($dt);
			}
            $result=array();
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kuesioner Berhasil Dirubah");
            $this->session->set_flashdata($result);
			redirect("HR/HRKuesioner");
		}else{
			redirect("home/login");	
		}
	}
	public function HapusKuesioner($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_questioner"=>$id);
		  $res = $this->My_model->del_data("trx_questioner",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kuesioner Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kuesioner Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRKuesioner");
 		}else{
			redirect("home/login");	
		}
	}
	public function HapusKuesionerPertanyaan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $a=$this->uri->segment(4);
		  $where=array("id_questioner_pertanyaan"=>$id);
		  $res = $this->My_model->del_data("trx_questioner_pertanyaan",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Pertanyaan Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Pertanyaan Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          // redirect("HR/EditHRKuesioner/".$a);
          redirect("HR/HRKuesioner");
 		}else{
			redirect("home/login");	
		}
	}
	public function HRKuesionerDetail($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(37,125);
			// $data['content'] = 'hr/hr-kuesioner-detail';
			$data['datakuesionerdetail']=$this->Nata_hris_hr_model->dataKuesionerDetail($id)->row();
			$data['datakuesionerdetailpertanyaan']=$this->Nata_hris_hr_model->dataKuesionerDetailPertanyaan($id);
			$this->load->view('hr/hr-kuesioner-detail',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ubahstskuis(){
			$id=$this->input->post('id');
			$sts=$this->input->post('sts');
			$status=$sts=="1"?"Diaktifkan":"Dinonaktifkan";
			$res=$this->Nata_hris_hr_model->ubahstskuis($id,$sts);
			
		    $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kuesioner Berhasil ".$status);
			$this->session->set_flashdata($result);
		}


	public function HRLaporanGaji()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,127);
			$data['content'] = 'hr/hr-laporan-gaji';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRLaporanTurnover()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,128);
			$data['content'] = 'hr/hr-laporan-turnover';
            $data['dataPerusahaan'] = $this->Nata_hris_hr_model->dataPerusahaanLokasi();
            $data['dataDepartemen'] = $this->Nata_hris_hr_model->dataDepartemenKontrak();
            $data['dataProvinsiKantor'] = $this->Nata_hris_hr_model->dataProvinsiLokasi();
            $data['dataLokasiKantor'] = $this->Nata_hris_hr_model->dataKabupatenLokasi();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRLaporanBPJSKetenagakerjaan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,129);
			$data['content'] = 'hr/hr-laporan-BPJS-ketenagakerjaan';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRLaporanBPJSKesehatan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,130);
			$data['content'] = 'hr/hr-laporan-BPJS-kesehatan';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRLaporanCVPegawai()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,131);
			$data['content'] = 'hr/hr-laporan-CV-pegawai';
			$data['datakaryawan'] = $this->Nata_hris_hr_model->dataKontrak();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRLaporanPajakPph21()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,132);
			$data['content'] = 'hr/hr-laporan-pajak-pph21';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function LaporanSP()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(139);
			$data['menuId']=array(126,139);
			$data['content'] = 'hr/hr-laporan-sp';
			$data['datateguran']=$this->Nata_hris_hr_model->dataTeguran();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function TambahHRLaporanSP()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,139);
			$data['content'] = 'hr/tambah-hr-laporan-sp';
			$data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahLaporanSP()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(126,139);
			$data = array(
	            'nik' => $this->input->post('nik'),
	            'tanggal_create' => date("Y-m-d"),
	            'alasan' => $this->input->post('alasan'),
                'berlaku_mulai'=>$this->input->post('berlaku_mulai'),
                'berlaku_sampai'=>$this->input->post('berlaku_sampai'),
                'status_teguran'=>$this->input->post('status_teguran')
	        );
            //print_r($data);
	        $res = $this->Nata_hris_hr_model->TambahTeguran($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data SP Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data SP Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/LaporanSP");
		}else{
			redirect("home/login");	
		}
	}
    public function HapusLaporanSP($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_teguran"=>$id);
		  $res = $this->My_model->del_data("trx_teguran",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data SP Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data SP Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/LaporanSP");
 		}else{
			redirect("home/login");	
		}
	}
	public function EditLaporanSP($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(126,139);
            $data['content'] = 'hr/edit-hr-laporan-sp';
            $where=array("id_teguran"=>$id);
            $data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
            $data['datateguran']=$this->Nata_hris_hr_model->dataTeguran($where)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditLaporanSP(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_teguran"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("trx_teguran",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data SP Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data SP Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/LaporanSP");
 		}else{
			redirect("home/login");	
		}
    }
    public function ViewLaporanSP($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(126,139);
            $data['content'] = 'hr/view-hr-laporan-sp';
            $where=array("id_teguran"=>$id);
            $data['datakaryawan']=$this->Nata_hris_hr_model->dataKaryawan();
            $data['datateguran']=$this->Nata_hris_hr_model->dataTeguran($where)->row();
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }



	public function HRAkun()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,133);
			$data['content'] = 'hr/hr-akun';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function HRMasterData()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(134);
			$data['menuId']=array(53,134);
			$data['datalokasikantor']= $this->Nata_hris_hr_model->data_lokasi_kantor();
			$data['databankpayroll']= $this->Nata_hris_hr_model->data_bank_payroll();
            $data['datalembur']= $this->Nata_hris_hr_model->data_setting_lembur();
			$data['datajenistunjangan']= $this->Nata_hris_hr_model->data_jenis_tunjangan();
			$data['datatipekebijakan']= $this->Nata_hris_hr_model->data_tipe_kebijakan();
			$data['datajabatan']= $this->Nata_hris_hr_model->dataPekerjaan();
			$data['dataleavekategori']= $this->Nata_hris_hr_model->dataLeaveKategori();
			$data['dataUMK']= $this->Nata_hris_hr_model->dataUMK();
			$data['content'] = 'hr/hr-master-data';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
    public function HRSettingPerusahaan()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['dataAkses'] = $this->menu->getAkses(143);
            $data['menuId']=array(53,148);
            $wh=array('variable'=>'perusahaan');
            $data['dataSettingPerusahaan'] = $this->Nata_hris_hr_model->settingperusahaan($wh);
            $data['content'] = 'hr/hr-setting-perusahaan';
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function HRJenisUser()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
        	$data['dataAkses'] = $this->menu->getAkses(143);
            $data['menuId']=array(53,143);
            $where = array('u.id_jenis_user'=>'3');
            $data['dataJenisUser'] = $this->Nata_hris_hr_model->manageUser2();
            $data['dataUserHR'] = $this->Nata_hris_hr_model->dataUserHR($where);
            $data['content'] = 'hr/hr-jenis-user';
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function HapusHRUser($id){
        $iduser = array('id_user'=>$id);

        $res = $this->Nata_hris_hr_model->del_data('trx_user',$iduser);
        $result = array();
        if ($result > 0) {
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data HR Karyawan Berhasil Dihapus");
        }else{
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data HR Karyawan Gagal Dihapus");
        }
        $this->session->set_flashdata($result);
        redirect("HR/HRJenisUser/2");

    }

    public function HapusJabatanUser($id){
        $idjabatan = array('id_jabatan'=>$id);

        $res = $this->Nata_hris_hr_model->del_data('trx_jenis_user_detail',$idjabatan);
        $result = array();
        if ($result > 0) {
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jabatan Karyawan Berhasil Dihapus");
        }else{
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Jabatan Karyawan Gagal Dihapus");
        }
        $this->session->set_flashdata($result);
        redirect("HR/HRJenisUser/3");
    }



    public function TambahHRJenisUser()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,143);
            $data['dataKaryawanJabatan']= $this->Nata_hris_hr_model->dataJabatanManageUser();
            $data['dataJenisUser']= $this->Nata_hris_hr_model->dataJenisUser();
            $data['dataModul']= $this->Nata_hris_hr_model->dataModulParent();
            $data['content'] = 'hr/tambah-hr-jenis-user';
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function TambahHRStatusUser()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,143);
            
            $data['dataUser']= $this->Nata_hris_hr_model->dataUserKaryawan();
            // $data['content'] = 'hr/tambah-hr-status-user';
            $this->load->view('hr/tambah-hr-status-user',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function checkUsername(){
        $username = $this->input->post("username");
        
        $dataUser = $this->Nata_hris_hr_model->dataUsername($username);
        $result="";
        if($dataUser->num_rows()>0){
            $result="invalid";
        } else {
            $result="valid";
        }
        $callback = array('hasil'=>$result);
        echo json_encode($callback);
    }

    public function ProsesTambahHR(){

        $data = array('nik'=>$this->input->post('nik'),
                        'username'=>$this->input->post('username'),
                        'password'=>$this->input->post('password'),
                        'id_jenis_user'=>3,
                        'tanggal'=>date('Y-m-d H:i:s'),
                        'status'=>1);
        // print_r($data);
        $res = $this->Nata_hris_hr_model->TambahStatusUser($data);
        $result = array();
        if ($result > 0) {
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Status Karyawan Berhasil Ditambah");
        }else{
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Status Karyawan Gagal Ditambah");
        }
        $this->session->set_flashdata($result);
        redirect("HR/HRJenisUser");

    }

    public function EditHRUser($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,143);
            $where = array('id_user'=>$id);
            $data['dataUserRow']= $this->Nata_hris_hr_model->dataUserHR($where)->row();
            // $data['content'] = 'hr/edit-hr-user';
            $this->load->view('hr/edit-hr-user',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function ProsesUbahStatusKaryawan(){
    	if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,143);
			$where=array("id_user"=>$this->input->post('id_user'));
			$data = array('username'=>$this->input->post('username'),
                            'password'=>$this->input->post('password')
                        );
            // print_r($data);
            // print_r($where);
	       $res = $this->Nata_hris_hr_model->upd_data("trx_user",$data,$where);
           $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Status Karyawan Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Status Karyawan Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRJenisUser/2");
		}
        else{
			redirect("home/login");	
		}
    }

    public function ProsesTambahHRJenisUser(){
        $idmodul=isset($_POST['id_modul'])?$_POST['id_modul']:array();
        

        if(count($idmodul)>0){
            for($i=0;$i<count($idmodul);$i++){
                $akses=isset($_POST['akses'.$idmodul[$i]])?$_POST['akses'.$idmodul[$i]]:'';

                $data=array("id_jabatan"=>$this->input->post('id_jabatan'),
                    "id_jenis_user"=>3,
                    "id_modul"=> $idmodul[$i],
                    "akses"=> $akses,
                    "tanggal"=>date('Y-m-d H:i:s')
                );

                $res = $this->Nata_hris_hr_model->TambahManageJenisUser($data);
                $result=array();
                if ($res > 0) {
                    $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Manage User Berhasil Ditambah");
                } else {
                   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Manage User Gagal Ditambah");
                }
                $this->session->set_flashdata($result);
                
                // print_r($data);
            }
        }
        redirect("HR/HRJenisUser");
    }

    public function EditHRJenisUser($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,143);
            $idjabatan = array('a.id_jabatan'=>$id);
            $data['dataManageuser'] = $this->Nata_hris_hr_model->manageUser($idjabatan)->row();
            $data['dataModul']= $this->Nata_hris_hr_model->dataModulParent();
            $data['content'] = 'hr/edit-hr-jenis-user';
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function ProsesEditHRJenisUser(){
        $idmodul=isset($_POST['id_modul'])?$_POST['id_modul']:array();
        $idJabatan = array('id_jabatan'=>$this->input->post('id_jabatan'));

        $del = $this->Nata_hris_hr_model->del_data('trx_jenis_user_detail',$idJabatan);

        if(count($idmodul)>0){
            for($i=0;$i<count($idmodul);$i++){
                $akses=isset($_POST['akses'.$idmodul[$i]])?$_POST['akses'.$idmodul[$i]]:'';

                $data=array("id_jabatan"=>$this->input->post('id_jabatan'),
                    "id_jenis_user"=>3,
                    "id_modul"=> $idmodul[$i],
                    "akses"=> $akses,
                    // "approval"=>$idmodul[$i]==56?$this->input->post('approval'):'0',
                    "approval"=>0,
                    "tanggal"=>date('Y-m-d H:i:s')
                );

                $res = $this->Nata_hris_hr_model->TambahManageJenisUser($data);
                $result=array();
                if ($res > 0) {
                    $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Manage User Berhasil Dirubah");
                } else {
                   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Manage User Gagal Dirubah");
                }
                $this->session->set_flashdata($result);
                
                // print_r($data);
            }
        }
        redirect("HR/HRJenisUser");
    }

    public function ViewHRJenisUser($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,143);
            $where = array('a.id_jabatan'=>$id);
            $data['dataJenisUser'] = $this->Nata_hris_hr_model->viewmanageUserParent($where);
            $data['dataJenisUserRow'] = $this->Nata_hris_hr_model->viewmanageUserParent($where)->row();
            $data['content'] = 'hr/view-hr-jenis-user';
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function ViewHRUser($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,143);
            $where = array('u.id_user'=>$id);
            $data['dataHRUserRow'] = $this->Nata_hris_hr_model->dataUserHR($where)->row();
            // $data['content'] = 'hr/view-hr-user';
            $this->load->view('hr/view-hr-user',$data);
        }else{
            redirect("home/login"); 
        }
    }

	public function TambahHRUMK()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			$data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsi();
			$data['dataKabupaten'] = $this->Nata_hris_hr_model->dataKabupaten();
			$data['dataKabupatenUMK'] = $this->Nata_hris_hr_model->dataKabupatenUMK();
			$data['content'] = 'hr/tambah-hr-umk';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}

	public function ProsesTambahUMK()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);

			$data = array(
	            'gaji'=>$this->input->post('gaji'),
	            'id_provinsi'=>$this->input->post('id_provinsi'),
	            'id_kabupaten'=>$this->input->post('id_kabupaten')
	        );
	       $res = $this->Nata_hris_hr_model->TambahUMK($data);
           $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data UMK Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data UMK Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRMasterData/7");
		}else{
			redirect("home/login");	
		}
	}

	public function EditUMK($id)
	{   
	    if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
	        $data['menuId']=array(53,134);
	        $data['content'] = 'hr/edit-hr-umk';
	        $where=$id;
	        $data['dataumk']=$this->Nata_hris_hr_model->getUMK($where)->row();
	        $tmparray = array('id_provinsi'=>$data['dataumk']->id_provinsi);
	        $data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsi();
			$data['dataKabupaten'] = $this->Nata_hris_hr_model->dataKabupaten();
			$data['dataKabupatenUMK'] = $this->Nata_hris_hr_model->dataKabupatenUMK($tmparray,$data['dataumk']->id_kabupaten);
	        
	        $this->load->view('index',$data);
	    }else{
	        redirect("home/login"); 
	    }
	}

	public function ProsesEditUMK(){
	    if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
	      $where=array("id_umk"=>$data['id']);
	      unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("mst_umk",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data UMK Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data UMK Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
	      redirect("HR/HRMasterData/7");
			}else{
			redirect("home/login");	
		}
	}

	public function HapusUMK($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_umk"=>$id);
		  $res = $this->My_model->del_data("mst_umk",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data UMK Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data UMK Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
	      redirect("HR/HRMasterData/7");
			}else{
			redirect("home/login");	
		}
	}

	public function TambahHRLeaveKategory()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			//$data['content'] = 'hr/tambah-hr-leave-kategory';
			$this->load->view('hr/tambah-hr-leave-kategory',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesTambahLeaveKategory()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);

			$data = array(
	            'deskripsi'=>$this->input->post('deskripsi'),
                'status'=>$this->input->post('status'),
                'jumlah_hari'=>$this->input->post('jumlah_hari')
	        );
	       $res = $this->Nata_hris_hr_model->TambahLeaveKategory($data);
           $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kategori Leave Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kategori Leave Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRMasterData/6");
		}else{
			redirect("home/login");	
		}
	}
	public function EditLeaveKategory($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
            //$data['content'] = 'hr/edit-hr-leave-kategory';
            $where=$id;
            $data['dataleavekategori']=$this->Nata_hris_hr_model->getLeaveKategory($where)->row();
            $this->load->view('hr/edit-hr-leave-kategory',$data);
        }else{
            redirect("home/login"); 
        }
    }
     public function ProsesEditLeaveKategory(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_leave_kategori"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("mst_leave_kategori",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kategori Leave Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kategori Leave Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData/6");
 		}else{
			redirect("home/login");	
		}
    }
    
	public function HapusLeaveKategory($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_leave_kategori"=>$id);
		  $res=$this->My_model->del_data("mst_leave_kategori",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Kategori Leave Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Kategori Leave Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData/6");
 		}else{
			redirect("home/login");	
		}
	}

    public function TambahHRSettingLembur()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
            //$data['content'] = 'hr/tambah-hr-setting-lembur';
            $this->load->view('hr/tambah-hr-setting-lembur',$data);
        }else{
            redirect("home/login"); 
        }
    }

    public function ProsesTambahSettingLembur()
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);

            $data = array(
                'jenis_lembur'=>$this->input->post('jenis_lembur'),
                'value_lembur'=>$this->input->post('value_lembur')
            );
           $res = $this->Nata_hris_hr_model->TambahSettingLembur($data);
           $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Setting Lembur Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Setting Lembur Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
            redirect("HR/HRMasterData/8");
        }else{
            redirect("home/login"); 
        }
    }

    public function EditSettingLembur($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
            //$data['content'] = 'hr/edit-hr-setting-lembur';
            $where=$id;
            $data['datalembur']=$this->Nata_hris_hr_model->getSettingLembur($where)->row();
            $this->load->view('hr/edit-hr-setting-lembur',$data);
        }else{
            redirect("home/login"); 
        }
    }
     public function ProsesEditSettingLembur(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $data=$this->input->post();
          $where=array("id_lembur"=>$data['id']);
          unset($data['id']);
          $res = $this->Nata_hris_hr_model->upd_data("mst_lembur",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Setting Lembur Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Setting Lembur Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData/8");
        }else{
            redirect("home/login"); 
        }
    }

    public function HapusSettingLembur($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
          $where=array("id_lembur"=>$id);
          $res=$this->My_model->del_data("mst_lembur",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Setting Lembur Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Setting Lembur Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData/8");
        }else{
            redirect("home/login"); 
        }
    }

	public function TambahHRJabatan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			//$data['content'] = 'hr/tambah-hr-jabatan';
			$this->load->view('hr/tambah-hr-jabatan',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function ProsesTambahJabatan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);

			$data = array(
	            'jenis_project'=>$this->input->post('jenis_project')
	        );
	      
		if ( $_FILES['image']['name'] != '' ) {
					$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['image']['name']);
					$filename = str_replace('(', '', $filename);
					$filename = str_replace(')', '', $filename);
					$data['image'] = $filename;

					// $result = $this->M_article->insert($data);

					
						$config['upload_path']          = 'assets/img/recruitment/';
						$config['allowed_types']        = 'gif|jpg|png';
						$config['file_name']        = $filename;
						$config['overwrite'] 	= TRUE;
						// $config['max_size']             = 100;
						// $config['max_width']            = 1024;
						// $config['max_height']           = 768;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

			            if ($this->upload->do_upload('image')) {
			            	
			            	}
				    }

            $res = $this->Nata_hris_hr_model->TambahJenisProject($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jabatan Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Jabatan Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRMasterData/5");
		}else{
			redirect("home/login");	
		}
	}
	public function EditJabatan($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
           // $data['content'] = 'hr/edit-hr-jabatan';
            $where=$id;
            $data['datajabatan']=$this->Nata_hris_hr_model->getJenisProject($where)->row();
            $this->load->view('hr/edit-hr-jabatan',$data);
        }else{
            redirect("home/login"); 
        }
    }
     public function ProsesEditJabatan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_master_jenis_project"=>$data['id']);
          unset($data['id']);
          if ( $_FILES['image']['name'] != '' ) {
					$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['image']['name']);
					$filename = str_replace('(', '', $filename);
					$filename = str_replace(')', '', $filename);
					$data['image'] = $filename;

					// $result = $this->M_article->insert($data);

					
						$config['upload_path']          = 'assets/img/recruitment/';
						$config['allowed_types']        = 'gif|jpg|png';
						$config['file_name']        = $filename;
						$config['overwrite'] 	= TRUE;
						// $config['max_size']             = 100;
						// $config['max_width']            = 1024;
						// $config['max_height']           = 768;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

			            if ($this->upload->do_upload('image')) {
			            	
			            	}
				    }

		  $res = $this->Nata_hris_hr_model->upd_data("master_jenis_project",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jabatan Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Jabatan Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
    }
    
	public function HapusJabatan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_jabatan"=>$id);
		  $res = $this->My_model->del_data("mst_jabatan",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jabatan Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Jabatan Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
	}

	public function TambahHRLokasiKantor()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			$data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsi();
			$data['content'] = 'hr/tambah-hr-lokasi-kantor';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahLokasiKantor()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			$data = array(
	            'id_provinsi' => $this->input->post('id_provinsi'),
	            'id_kabupaten' => $this->input->post('id_kabupaten'),
                'id_master_perusahaan' => $this->input->post('id_master_perusahaan')
	        );
	        $res = $this->Nata_hris_hr_model->TambahLokasiKantor($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Lokasi Kantor Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Lokasi Kantor Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/viewHRKlienDepartemen/".$this->input->post('id_master_perusahaan'));
		}else{
			redirect("home/login");	
		}
	}
	

	public function HapusLokasiKantor($id,$idp)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_lokasi_kantor"=>$id);
		  $res = $this->My_model->del_data("mst_lokasi_kantor",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Lokasi Kantor Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Lokasi Kantor Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/viewHRKlienDepartemen/".$idp);
 		}else{
			redirect("home/login");	
		}
	}
	public function EditLokasiKantor($id,$idp)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
            $data['content'] = 'hr/edit-hr-lokasi-kantor';
            $where=$id;
            $data['datalokasikantor']=$this->Nata_hris_hr_model->getLokasiKantor($where)->row();
            $data['dataProvinsi']= $this->Nata_hris_hr_model->dataProvinsi();
			$data['dataKabupaten'] = $this->Nata_hris_hr_model->dataKabupaten();
            
            $this->load->view('index',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditLokasiKantor(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_lokasi_kantor"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("mst_lokasi_kantor",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Lokasi Kantor Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Lokasi Kantor Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/viewHRKlienDepartemen/".$data['id_master_perusahaan']);
 		}else{
			redirect("home/login");	
		}
    }

	public function TambahHRBankPayroll()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			//$data['content'] = 'hr/tambah-hr-bank-payroll';
			$this->load->view('hr/tambah-hr-bank-payroll',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahBankPayroll()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			$data = array(
	            'deskripsi' => $this->input->post('deskripsi'),
                'biaya' => $this->input->post('biaya')
	        );
	        $res = $this->Nata_hris_hr_model->TambahBankPayroll($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Bank Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Bank Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRMasterData/2");
		}else{
			redirect("home/login");	
		}

	}
	public function HapusBankPayroll($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_bank"=>$id);
		  $res = $this->My_model->del_data("mst_bank",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Bank Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Bank Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
	}
	public function EditBankPayroll($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
          //  $data['content'] = 'hr/edit-hr-bank-payroll';
            $where=$id;
            $data['databankpayroll']=$this->Nata_hris_hr_model->getBankPayroll($where)->row();
            $this->load->view('hr/edit-hr-bank-payroll',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditBankPayroll(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_bank"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("mst_bank",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Bank Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Bank Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
    }

	public function TambahHRJenisTunjangan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			//$data['content'] = 'hr/tambah-hr-jenis-tunjangan';
			$this->load->view('hr/tambah-hr-jenis-tunjangan',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahJenisTunjangan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			$data = array(
	            'jenis_tunjangan' => $this->input->post('jenis_tunjangan')
	        );
	        $res = $this->Nata_hris_hr_model->TambahJenisTunjangan($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jenis Tunjangan Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Jenis Tunjangan Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRMasterData/3");
		}else{
			redirect("home/login");	
		}

	}
	public function HapusJenisTunjangan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_jenis_tunjangan"=>$id);
		  $res = $this->My_model->del_data("mst_jenis_tunjangan",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jenis Tunjangan Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Jenis Tunjangan Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
	}
	public function EditJenisTunjangan($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
            //$data['content'] = 'hr/edit-hr-jenis-tunjangan';
            $where=$id;
            $data['datajenistunjangan']=$this->Nata_hris_hr_model->getJenisTunjangan($where)->row();
            $this->load->view('hr/edit-hr-jenis-tunjangan',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditJenisTunjangan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_jenis_tunjangan"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("mst_jenis_tunjangan",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Jenis Tunjangan Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Jenis Tunjangan Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
    }

	public function TambahHRTipeKebijakan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			//$data['content'] = 'hr/tambah-hr-tipe-kebijakan';
			$this->load->view('hr/tambah-hr-tipe-kebijakan',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function ProsesTambahTipeKebijakan()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(53,134);
			$data = array(
	            'deskripsi' => $this->input->post('deskripsi')
	        );
	        $res = $this->Nata_hris_hr_model->TambahTipeKebijakan($data);
            $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Tipe Kebijakan Berhasil Ditambah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Tipe Kebijakan Gagal Ditambah");
            }
            $this->session->set_flashdata($result);
			redirect("HR/HRMasterData/4");
		}else{
			redirect("home/login");	
		}

	}
	public function HapusTipeKebijakan($id)
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $where=array("id_policetype"=>$id);
		  $res = $this->My_model->del_data("mst_policetype",$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Tipe Kebijakan Berhasil Dihapus");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Tipe Kebijakan Gagal Dihapus");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
	}
	public function EditTipeKebijakan($id)
    {   
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
            $data['menuId']=array(53,134);
           // $data['content'] = 'hr/edit-hr-tipe-kebijakan';
            $where=$id;
            $data['datatipekebijakan']=$this->Nata_hris_hr_model->getTipeKebijakan($where)->row();
            $this->load->view('hr/edit-hr-tipe-kebijakan',$data);
        }else{
            redirect("home/login"); 
        }
    }
    public function ProsesEditTipeKebijakan(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
		  $data=$this->input->post();
          $where=array("id_policetype"=>$data['id']);
          unset($data['id']);
		  $res = $this->Nata_hris_hr_model->upd_data("mst_policetype",$data,$where);
          $result=array();
            if ($res > 0) {
                $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data Tipe Kebijakan Berhasil Dirubah");
            } else {
               $result=array("result"=>"error","title"=>"Gagal","msg"=>"Data Tipe Kebijakan Gagal Dirubah");
            }
            $this->session->set_flashdata($result);
          redirect("HR/HRMasterData");
 		}else{
			redirect("home/login");	
		}
    }


	public function onBoarding()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
		 	$data['menuId']=array(0,47);
			$data['content'] = 'hr/onBoarding';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function offBoarding()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(0,48);
			$data['content'] = 'hr/offBoarding';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function attendanceActivity()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(31,54);
			$data['content'] = 'hr/attendance-activity';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function leaveRequest()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(31,55);
			$data['content'] = 'hr/leave-request';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function payroll()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,56);
			$data['content'] = 'hr/payroll';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
	public function payrollHistory()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,57);
			$data['content'] = 'hr/payroll-history';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function claim()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(50,58);
			$data['content'] = 'hr/claim';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function employeeInformation()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,59);
			$data['content'] = 'hr/employee-information';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function departement()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(51,60);
			$data['content'] = 'hr/departement';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}

	public function organizationStructure()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(52,61);
			$data['content'] = 'hr/organization-structure';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function policies()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(52,62);
			$data['content'] = 'hr/policies';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function announcement()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(52,63);
			$data['content'] = 'hr/announcement';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}

	}
	public function settings()
	{	
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['menuId']=array(0,53);
			$data['content'] = 'hr/settings';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
	}
    public function checkNik(){
        $nik = $this->input->post("nik");
        $tmp = str_replace(" ", "", $nik);
        $wh=array("nik"=>$tmp);
        $dataKar = $this->Nata_hris_hr_model->dataKaryawan($wh);
        $result="";
        if($dataKar->num_rows()>0){
            $result="invalid";
        } else {
            $result="valid";
        }
        $callback = array('hasil'=>$result);
        echo json_encode($callback);
    }
    public function dokumenCuti(){
    	$path=$this->input->post('path');
    	$file=$this->input->post('dokumen');
        $this->load->helper('download');
        $fileContents = file_get_contents(base_url($path));
        force_download($file, $fileContents);
    }
    public function dokumenPayroll(){
        $path=$this->input->post('path');
        $file=$this->input->post('dokumen');
        $this->load->helper('download');
        $fileContents = file_get_contents(base_url($path));
        force_download($file, $fileContents);
    }
    
    public function dokumenReburse(){
    	$path=$this->input->post('path');
    	$file=$this->input->post('dokumen');
        $id = $this->input->post('id_claim_detail_file');
        $this->load->helper('download');
        $fileContents = file_get_contents(base_url($path));
        force_download($file, $fileContents,$id);
    }
    public function dokumenCV(){
    	$path=$this->input->post('path');
    	$file=$this->input->post('file_cv');
        $this->load->helper('download');
        $fileContents = file_get_contents(base_url($path));
        force_download($file, $fileContents);
    }
    public function dokumenKebijakan(){
    	$path=$this->input->post('path');
    	$file=$this->input->post('dokumen');
        $this->load->helper('download');
        $fileContents = file_get_contents(base_url($path));
        force_download($file, $fileContents);
    }

    public function inputCSV(){
        if ( isset($_POST['import'])) {

            $file = $_FILES['import_absensi']['tmp_name'];

			// Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['import_absensi']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				echo 'File tidak boleh kosong!';
			} else {
			 $filename="";
             $path="";
			     if ( $_FILES['import_absensi']['name'] != '' ) {
					$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['import_absensi']['name']);
					$filename = str_replace('(', '', $filename);
					$filename = str_replace(')', '', $filename);
					

					$path='assets/csv/';
						$config['upload_path']          = $path;
						$config['allowed_types']        = 'csv';
						$config['file_name']        = $filename;
						$config['overwrite'] 	= TRUE;
						// $config['max_size']             = 100;
						// $config['max_width']            = 1024;
						// $config['max_height']           = 768;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

			            if ($this->upload->do_upload('import_absensi')) {
			            	
			            	}
				    }
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["import_absensi"]["size"] > 0) {
                    $file=$path.$filename;
                   // echo $file;
					$i = 0;
					$handle = fopen($file, "r")  or die("Can not open the file");
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;
						
							// Data yang akan disimpan ke dalam databse
							$data = [
								'nik' => "".$row[0]."",
								'tanggal_mulai' => $row[1],
								'tanggal_selesai' => $row[2]
							];
                            //print_r($data);
							// Simpan data ke database.
							//$this->pelanggan->save($data);
                            $this->Nata_hris_hr_model->insert_data("trx_absensi",$data);

					}

					fclose($handle);
					//redirect('data');
					redirect('HR/HRAktifitasAbsensi');

				} else {
					echo 'Format file tidak valid!';
				}
			}
        }
    }
    
    public function MailServer(){
        if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			//$data['menuId']=array(52,62);
			$data['content'] = 'hr/hr-mail-server';
			$this->load->view('index',$data);
		}else{
			redirect("home/login");	
		}
    }

    public function inputdataCSVPegawai(){
   			

            $file = $_FILES['csv_pegawai']['tmp_name'];

			// // Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['csv_pegawai']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				echo 'File tidak boleh kosong!';
			} else {
			 $filename="";
             $path="";
			     if ( $_FILES['csv_pegawai']['name'] != '' ) {
					$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['csv_pegawai']['name']);
					$filename = str_replace('(', '', $filename);
					$filename = str_replace(')', '', $filename);
					

					$path='assets/csv/karyawan/';
						$config['upload_path']          = $path;
						$config['allowed_types']        = 'csv';
						$config['file_name']        = $filename;
						$config['overwrite'] 	= TRUE;
						// $config['max_size']             = 100;
						// $config['max_width']            = 1024;
						// $config['max_height']           = 768;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

			            if ($this->upload->do_upload('csv_pegawai')) {
			            	
			            	}else{
			            		echo "blm upload";
			            	}
				    }
				    
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["csv_pegawai"]["size"] > 0) {
                    $file=$path.$filename;
                    // $file='assets/csv/sample_data_pegawai.csv';
                  // echo $file;
					$i = 0;
					$handle = fopen($file, "r")  or die("Can not open the file");
					while (($row = fgetcsv($handle, 2048, ","))) {
						$i++;
						if ($i == 1) continue;
							
							// Data yang akan disimpan ke dalam databse
							$dataKaryawan = [

								'nik' => $row[0],
								'nik_ktp' => $row[1],
								'no_npwp' =>$row[2],
								'id_pelamar' =>"0",
								'id_loker'	=>"0",
								'id_jenis_projek' =>"0",
								'id_projek_order' =>"0",
								'korlap' =>"0",
								'nama_panggilan' =>$row[6],
								'nama_lengkap' =>$row[7],
								'tempat_lahir' =>$row[8],
								'tanggal_lahir' =>$row[9],
								'jenis_kelamin' =>$row[10],
								'id_agama' =>$row[11],
								'id_sts_nikah' =>$row[12],
								'golongan_darah' =>$row[13],
								'alamat' =>$row[14],
								'id_kecamatan' =>"0",
								'nomor_telepon' =>$row[15],
								'email' =>$row[16],
								'id_pendidikan' =>$row[17],
								'id_jabatan' =>"0",
								'id_master_perusahaan' =>"0",
								'id_departemen' =>"0",
								'id_divisi' =>"0",
								'tanggal_masuk' =>$row[21],
								'tanggal_keluar' =>"0000-00-00",
								'gambar_foto' =>"",
								'alamat_ketika_urgent' =>"",
								'kode_pos' =>"",
								'status_karyawan' =>"0",
								'saldo_klaim' =>"0",
								'saldo_cuti' =>"0",
								'catatan' =>"0",
								'cv_karyawan' =>"",
								'id_lokasi' =>"0"
							];

							$dataKontrak = [
								'no_kontrak'=>"NULL",
								'status_karyawan'=>$row[22],
								'tanggal_masuk'=>$row[21],
								'tanggal_keluar'=>"0000-00-00",
								'nik'=>$row[0],
								'id_jenis_project'=>$row[18],
								'nik_penerima' => "NULL",
								'id_departemen' =>$row[20],
								'id_master_perusahaan' =>$row[19],
								'id_lokasi_kantor'	=>"0",
								'id_projek_order' =>"0",
								'korlap' =>"0",
								'gaji' =>"0",
								'bpjs_kes' =>"0",
								'bpjs_tk' =>"0",
								'pph' =>"0"
							];

							$datauser = [
                							
                							'nik'=>$row[0],
											'nik_ktp'=>$row[1],
                							'id_pelamar'=>'0',
                							'username'=>$row[3],
                							'password'=>$row[4],
                							'id_jenis_user'=>'1',
                							'token'=>'0',
                                            'tanggal'=>date('Y-m-d H:i:s'),
                                            'status'=>'1',
                                            'cookie'=>'0',
                                            'id_company'=>'0',
                                            'reset_key'=>'0'
	                                    ];
	                        // echo "<pre>";
                         //    print_r($dataKaryawan);
                         //    echo "</pre>";
							
	                        // echo "<pre>";
                         //    print_r($datauser);
                         //    echo "</pre>";

                         //    echo "<pre>";
                         //    print_r($dataKontrak);
                         //    echo "</pre>";
                            
							// Simpan data ke database.

                            $this->Nata_hris_hr_model->insert_data("trx_karyawan",$dataKaryawan);
                            $this->Nata_hris_hr_model->insert_data("trx_kontrak",$dataKontrak);
                            $this->Nata_hris_hr_model->insert_data("trx_user",$datauser);

					}

					fclose($handle);
					//redirect('data');
					redirect('HR/HRPegawai');

				} else {
					echo 'Format file tidak valid!';
				}
			}
        }
	
}
