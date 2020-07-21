	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/
class SamplePdf extends CI_Controller {

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
		$data = array();
		$nik = '0204151';
		$nikktp = '3205171707980008';
		// $nik = $this->session->userdata('nik');
		// $nikktp = $this->session->userdata('nikktp');
		$nik2 = array('nik'=>$nik);
		$nikktp2 = array('nik_ktp'=>$nikktp);
		$id_payroll=1;
		$id_setting = 9;
		
		$id_settingarray = array('id_setting'=>$id_setting);
		$data['nikktp'] = $nikktp;
		$bulan = "a.tanggal_mulai like '".date('Y-m')."%'";
		$data['dataAbsensiEmployee'] = $this->Nata_hris_employee_model->data_absensi_employee($nik,'1',$bulan);
		$data['dataTunjangan'] = $this->Nata_hris_employee_model->data_informasi_tunjangan($nik);
		$data['dataMasterTunjangan'] = $this->Nata_hris_employee_model->data_tunjangan($nik);
		$data['dataTunjanganRow'] = $this->Nata_hris_employee_model->data_informasi_tunjangan($nik)->row();
		$data['dataJabatan'] = $this->Nata_hris_employee_model->data_karyawan_projek($nik2)->row();
		$data['dataBPJS'] = $this->Nata_hris_employee_model->data_bpjs($nikktp2)->num_rows();
		$data['dataBPJSRes'] = $this->Nata_hris_employee_model->data_bpjs($nikktp2);
		$data['dataBPJSRow'] = $this->Nata_hris_employee_model->data_bpjs($nikktp2)->row();
		$data['dataKlien'] = $this->Nata_hris_employee_model->data_karyawan_klien($nik2)->row();
		$data['dataViewPayslip'] = $this->Nata_hris_employee_model->data_view_payslip($nik);
		$data['dataSettingRow'] = $this->Nata_hris_employee_model->data_setting($id_settingarray)->row();
		$this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Gaji".date("Ymd").".pdf";
        $this->pdf->load_view('samplegaji', $data);

		// $viewfile = $this->load->view('samplegaji', $data, TRUE);
		// echo $viewfile;
        // pdf_create($viewfile, 'Gaji'.date("YmdHis"),false,"legal","portrait");
	}

	public function gaji(){
		$nik = '1609204071';
		$nik2 = array('nik'=>$nik);
		$tanggal = array('tanggal'=>date('Y-m-d'));
		$tahun = array('bulan'=>date('Y'));
		$bulan = array('tahun'=>date('mm'));
		$tmp = 0;

		$nikTunj = array('ko.nik'=>$nik);
		
		$dataGaji = $this->Nata_hris_hr_model->gaji($nik2)->row();
		$dataBPJS = $this->Nata_hris_hr_model->dtlbpjsKes($nikTunj);
		$dataBPJS = $this->Nata_hris_hr_model->dtlbpjsTk($nikTunj);
		
		$Jabatan = array('ko.id_master_perusahaan'=>$dataGaji->id_master_perusahaan,
						'ko.id_departemen'=>$dataGaji->id_departemen,
						'ko.id_jenis_project'=>$dataGaji->id_jenis_project);

		$data = array('nik'=>$dataGaji->nik,
						'gaji'=>$dataGaji->gaji,
						'tanggal'=>date('Y-m-d'));

		$dataTunjangan = $this->Nata_hris_hr_model->settingNilai($Jabatan)->num_rows();
		$dataTunjanganRow = $this->Nata_hris_hr_model->settingNilai()->row();

		if ($dataTunjangan > 0 ) {
			if ($dataTunjanganRow->status_koefisien == '1') {
				$tmp = $dataGaji->gaji+$dataTunjanganRow->value_koefisien;
			}elseif ($dataTunjanganRow->status_koefisien == '2') {
				$tmp = ($dataTunjanganRow->value_koefisien/100)*$dataGaji->gaji;
			}
		}

		$wheregaji = $this->Nata_hris_hr_model->cekkaryawanpayroll($nik2)->num_rows();

		$where = $this->Nata_hris_hr_model->gajiTmp($nik2,$tanggal)->num_rows();

		if ($wheregaji > 0) {
			if ($where <= 0) {
				$insertGaji = $this->Nata_hris_hr_model->tmpGaji($data);
				echo "Data berhasil ditambah";	
			}
			else{
				echo "Data sudah ada";
			}
		}else{
			echo "Data karyawan tidak ada";
		}
		
	}

	public function SistemGajipo($idclient=""){
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(56);
			$data['menuId']=array(50,56);

		$dataAmbilIdPerusahaan= $this->Nata_hris_hr_model->ambilidperusahaan()->row();
		$idclient=$idclient!=""?$idclient:$dataAmbilIdPerusahaan->id_master_perusahaan;
		//$idclient=133;
		$idp=array('id_master_perusahaan'=>$idclient);
		$dataAmbilPerusahaan= $this->Nata_hris_hr_model->ambilperusahaan($idp);
		

		$dataKaryawanKontrakRows = $this->Nata_hris_hr_model->dataPegawaiKontrakNIK()->num_rows();
		// echo $dataKaryawanKontrakRows;
		//$idperusahaan=array('ko.id_master_perusahaan'=>$this->input->post('id_master_perusahaan'));
		$dataKaryawanKontraks = $this->Nata_hris_hr_model->dataPegawaiKontrakNIK()->result();
		// print_r($dataKaryawanKontraks);
		$dataKaryawanKontrak = $this->Nata_hris_hr_model->dataPegawaiKontrakNIK();

		$nik = '1609204071';
		$nikbaru = '1609304045';
		$nik2 = array('nik'=>$nik);
		$tanggal = array('tanggal'=>date('Y-m-d'));
		$tahun = array('tahun'=>date('Y'));
		$bulan = array('bulan'=>date('m'));
		$tmp = 0;
		$tmptmk = 0;
		$tmpjabatan = 0;
		$tmpLainnya = 0;
		$tmpbpjskes = 0;
		$tmpbpjstk = 0;
		$tmprekening = 0;
		$tmpGaji = 0;
		$hasil = 0;
		$tmpTunjangan = 0;
		$nikRekening = array('g.nik'=>$dataKaryawanKontraks);
		//ambil perusahaan
		$jumkar=0;
		foreach ($dataAmbilPerusahaan->result() as $dtperusahaan) {

			$idperusahaan=array('ko.id_master_perusahaan'=>$dtperusahaan->id_master_perusahaan);
			$dataKaryawanKontraks = $this->Nata_hris_hr_model->dataPegawaiKontrakNIK($idperusahaan);
			$jumkar=$dataKaryawanKontraks->num_rows();
			if($dataKaryawanKontraks->num_rows() >0 ){
				foreach ($dataKaryawanKontraks->result() as $kontrak) {

					$tmpArray = array('j.id_master_perusahaan'=>$kontrak->id_master_perusahaan,
										'j.id_departemen'=>$kontrak->id_departemen,
										'j.id_master_jenis_project'=>$kontrak->id_jenis_project
									);

					$NikLainnya = array('l.nik'=>$kontrak->nik);

					// Data BPJS Kes Dan Tk
					$tmpArrayIdPo = array('id_projek_order'=>$kontrak->id_projek_order);
					// Bpjs
					$BPJSRows = $this->Nata_hris_hr_model->dataBpjsPerusahaan($tmpArrayIdPo)->num_rows();
					$BPJS = $this->Nata_hris_hr_model->dataBpjsPerusahaan($tmpArrayIdPo)->row();
					$BPJSResult = $this->Nata_hris_hr_model->dataBpjsPerusahaan($tmpArrayIdPo)->result();

					// Pph
					$PPHRows = $this->Nata_hris_hr_model->dataPphPerusahaan($tmpArrayIdPo)->num_rows();
					$PPH = $this->Nata_hris_hr_model->dataPphPerusahaan($tmpArrayIdPo)->row();
					$PPHResult = $this->Nata_hris_hr_model->dataPphPerusahaan($tmpArrayIdPo)->result();

					$idKlien = array('kes.id_klien'=>$kontrak->id_master_perusahaan);
					$idKlienTk = array('tk.id_klien'=>$kontrak->id_master_perusahaan);
					$idKlienPph = array('p.id_klien'=>$kontrak->id_master_perusahaan);
					
					// Bpjs Kes
					$dataBpjsJenisRows = $this->Nata_hris_hr_model->dtlbpjsKes($idKlien)->num_rows();
					$dataBpjsJenis = $this->Nata_hris_hr_model->dtlbpjsKes($idKlien);
					$dataBpjsJenisRow = $this->Nata_hris_hr_model->dtlbpjsKes($idKlien)->row();
					
					// Bpjs Tk
					$dataBpjsJenisTkRows = $this->Nata_hris_hr_model->dtlbpjsTk($idKlienTk)->num_rows();
					$dataBpjsJenisTkResult = $this->Nata_hris_hr_model->dtlbpjsTk($idKlienTk)->result();
					$dataBpjsJenisTkRow = $this->Nata_hris_hr_model->dtlbpjsTk($idKlienTk)->row();

					// PPH
					$dataPPHRows = $this->Nata_hris_hr_model->dtlPph($idKlienPph)->num_rows();
					$dataPPHResult = $this->Nata_hris_hr_model->dtlPph($idKlienPph)->result();
					$dataPPHRow = $this->Nata_hris_hr_model->dtlPph($idKlienPph)->row();

					// Untuk Tunjangan Koefisien,TMK,Jabatan
					$TunjanganResult = $this->Nata_hris_hr_model->settingNilai($tmpArray)->num_rows();
					$TunjanganRow = $this->Nata_hris_hr_model->settingNilai($tmpArray)->row();

					// Untuk Gaji Lainnya
					$GajiLainnyaResult = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->result();
					$GajiLainnyaRows = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->num_rows();
					$GajiLainnyaRow = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->row();
					$GajiLainnyaRY = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->result_array();
					$tampjt=array();
					foreach ($GajiLainnyaResult as $dt ) {
						$tampjt[]=$dt->id_jenis_tunjangan;
					}

					//print_r($GajiLainnyaRY);
					// Gaji pokok
					// echo 'Nik : '.$kontrak->nik;
					// echo "<pre>";
					// print_r('Gaji : '.$kontrak->gaji);
					// echo "</pre>";

					// echo "<pre>";
					// print_r('Jumlah Bpjs : '.$dataBpjsJenisRows);
					// echo "</pre>";

					// Tunjangan koefisien
					$tmp = 0;
					$tmptmk = 0;
					$tmpjabatan = 0;
					$tmp1 = 0;
					$tmptmk1 = 0;
					$tmpjabatan1 = 0;
					$tmpLainnya = 0;
					$tmpTunjanganKes = 0;
					$tmpTunjanganTk = 0;
					$tmpTunjanganPph = 0;

					if ($TunjanganResult > 0) {
						if ($TunjanganRow->status_koefisien == '1' ) {
							if ($TunjanganRow->value_koefisien == 0) {
								$tmp = 0;
								$tmp1=0;	
							}else{
								$tmp = $TunjanganRow->value_koefisien;
								$tmp1=$TunjanganRow->value_koefisien;	
							}
						}else{
							$tmp = ($TunjanganRow->value_koefisien/100)*$kontrak->gaji;
							$tmp1=$TunjanganRow->value_koefisien;
						}

						if ($TunjanganRow->status_tmk == '1' ) {
							if ($TunjanganRow->value_tmk == 0) {
								$tmptmk = 0;
								$tmptmk1 = 0;	
							}else{
								$tmptmk = $TunjanganRow->value_tmk;
								$tmptmk1 = $TunjanganRow->value_tmk;
							}
						}else{
							$tmptmk = ($TunjanganRow->value_tmk/100)*$kontrak->gaji;
							$tmptmk1 = $TunjanganRow->value_tmk;
						}

						if ($TunjanganRow->status_jabatan == '1' ) {
							if ($TunjanganRow->value_jabatan == 0) {
								$tmpjabatan = 0;
								$tmpjabatan1 = 0;	
							}else{
								$tmpjabatan = $TunjanganRow->value_jabatan;	
								$tmpjabatan1 = $TunjanganRow->value_jabatan;
							}
						}else{
							$tmpjabatan = ($TunjanganRow->value_jabatan/100)*$kontrak->gaji;
							$tmpjabatan1 = $TunjanganRow->value_jabatan;
						}



						// if ($TunjanganRow->status_koefisien == '1' ||  $TunjanganRow->status_tmk == '1' || $TunjanganRow->status_jabatan == '1') {
						// 	if ($TunjanganRow->value_koefisien == 0) {
						// 		$tmp = 0;
						// 		$tmp1=0;	
						// 	}else{
						// 		$tmp = $kontrak->gaji+$TunjanganRow->value_koefisien;
						// 		$tmp1=$TunjanganRow->value_koefisien;	
						// 	}
						// 	if ($TunjanganRow->value_tmk == 0) {
						// 		$tmptmk = 0;
						// 		$tmptmk1 = 0;	
						// 	}else{
						// 		$tmptmk = $kontrak->gaji+$TunjanganRow->value_tmk;
						// 		$tmptmk1 = $TunjanganRow->value_tmk;
						// 	}
						// 	if ($TunjanganRow->value_jabatan == 0) {
						// 		$tmpjabatan = 0;
						// 		$tmpjabatan1 = 0;	
						// 	}else{
						// 		$tmpjabatan = $kontrak->gaji+$TunjanganRow->value_jabatan;	
						// 		$tmpjabatan1 = $TunjanganRow->value_jabatan;	
						// 	}
							
						// }elseif ($TunjanganRow->status_koefisien == '2' || $TunjanganRow->status_tmk =='2' || $TunjanganRow->status_jabatan == '2') {

						// 	$tmp = ($TunjanganRow->value_koefisien/100)*$kontrak->gaji;
						// 	$tmp1=$TunjanganRow->value_koefisien;

						// 	$tmptmk = ($TunjanganRow->value_tmk/100)*$kontrak->gaji;
						// 	$tmptmk1 = $TunjanganRow->value_tmk;

						// 	$tmpjabatan = ($TunjanganRow->value_jabatan/100)*$kontrak->gaji;
						// 	$tmpjabatan1 = $TunjanganRow->value_jabatan;
						// }
						// echo "<pre>";
						// print_r('Tunj.Koefisien : '.$tmp.' Tunj.TMK : '.$tmptmk.'Tunj.Jabatan : '.$tmpjabatan);
						// echo "</pre>";
					}else{
						
						// echo "<br>";
					}

					// Tunjangan Lainnya
					if ($GajiLainnyaRows > 0) {
						foreach ($GajiLainnyaResult as $lainnya) {
							// echo $lainnya->nilai;
							$tmpLainnya +=  $lainnya->nilai;
						}
						// echo "<pre>";
						// print_r('Tunj.Lainnya : '.$tmpLainnya);
						// echo "</pre>";
						// echo $tmpLainnya;
					}else{
						$tmpLainnya =  0;
						// echo "<br>";
					}

					$BpjsKes = 0;
					$tmpPersentase = 0;
					$persentaseKes = 0;

					$BpjsTk = 0;
					$tmpPersentaseTk = 0;
					$persentaseTk = 0;

					$Pph = 0;
					$tmpPersentasePph = 0;
					$persentasePph = 0;

					// Proses BPJS Kes
					if ($dataBpjsJenisRows > 0) {
						$explodeKes = explode(',', $dataBpjsJenisRow->pengali);

						if ($dataBpjsJenisRow->id_jenis_tunjangan > 0) {

							$explodeTunjanganKes = explode(',', $dataBpjsJenisRow->id_jenis_tunjangan);
							$NikLainnya = array('l.nik'=>$kontrak->nik);
							$tunjanganLainnya = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->result();
							foreach ($tunjanganLainnya as $lainnya) {
								if (in_array($lainnya->id_jenis_tunjangan, $explodeTunjanganKes) ) {
									$tmpTunjanganKes = $tmpTunjanganKes+$lainnya->nilai;
								}
								// echo $lainnya->id_jenis_tunjangan.''.$lainnya->nilai;
							}
							
						}

						if (in_array(1, $explodeKes)) {
							$BpjsKes = $BpjsKes+$kontrak->gaji;
						}if (in_array(2, $explodeKes)) {
							$BpjsKes = $BpjsKes+$tmp;
						}if (in_array(3, $explodeKes)) {
							$BpjsKes = $BpjsKes+$tmptmk;
						}if (in_array(4, $explodeKes)) {
							$BpjsKes = $BpjsKes+$tmpjabatan;
						}

						if ($BPJSRows > 0) {
							$persentaseKes = $BPJS->potongan_bpjs_kesehatan;
							$tmpPersentase = (($tmpTunjanganKes+$BpjsKes)*$persentaseKes)/100;
							// print_r($tmpPersentase);
							// echo "<hr>";
						}


						// echo "<pre>";
						// print_r('Persentase : '.$tmpPersentase);
						// echo "</pre>";
					}

					// Proses BPJS TK
					if ($dataBpjsJenisTkRows > 0) {
						$explodeTk = explode(',', $dataBpjsJenisTkRow->pengali);

						if ($dataBpjsJenisTkRow->id_jenis_tunjangan > 0) {

							$explodeTunjangan = explode(',', $dataBpjsJenisTkRow->id_jenis_tunjangan);
							$NikLainnya = array('l.nik'=>$kontrak->nik);
							$tunjanganLainnya = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->result();
							foreach ($tunjanganLainnya as $lainnya) {
								if (in_array($lainnya->id_jenis_tunjangan, $explodeTunjangan) ) {
									$tmpTunjanganTk = $tmpTunjanganTk+$lainnya->nilai;
								}
							}
							// echo $tunjanganLainnya;
						}

						if (in_array(1, $explodeTk)) {
							$BpjsTk = $BpjsTk+$kontrak->gaji;
						}if (in_array(2, $explodeTk)) {
							$BpjsTk = $BpjsTk+$tmp;
						}if (in_array(3, $explodeTk)) {
							$BpjsTk = $BpjsTk+$tmptmk;
						}if (in_array(4, $explodeTk)) {
							$BpjsTk = $BpjsTk+$tmpjabatan;
						}

						if ($BPJSRows > 0) {
							$persentaseTk = $BPJS->potongan_bpjs_tenaga_kerja;
							$tmpPersentaseTk = (($BpjsTk+$tmpTunjanganTk)*$persentaseTk)/100;
						}

						// echo "<pre>";
						// print_r('Persentase : '.$tmpPersentaseTk);
						// echo "</pre>";
					}

					// Proses PPH
					if ($dataPPHRows > 0) {
						// echo $dataPPHRows;
						$explodePph = explode(',', $dataPPHRow->pengali);

						if ($dataPPHRow->id_jenis_tunjangan > 0) {

							$explodeTunjanganPph = explode(',', $dataPPHRow->id_jenis_tunjangan);
							$NikLainnya = array('l.nik'=>$kontrak->nik);
							$tunjanganLainnya = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->result();
							foreach ($tunjanganLainnya as $lainnya) {
								if (in_array($lainnya->id_jenis_tunjangan, $explodeTunjanganPph) ) {
									$tmpTunjanganPph = $tmpTunjanganPph+$lainnya->nilai;
								}
							}
							// echo $tunjanganLainnya;
						}

						if (in_array(1, $explodePph)) {
							$Pph = $Pph+$kontrak->gaji;
						}if (in_array(2, $explodePph)) {
							$Pph = $Pph+$tmp;
						}if (in_array(3, $explodePph)) {
							$Pph = $Pph+$tmptmk;
						}if (in_array(4, $explodePph)) {
							$Pph = $Pph+$tmpjabatan;
						}

						if ($PPHRows > 0) {
							$persentasePph = $PPH->pph;
							$tmpPersentasePph = (($Pph+$tmpTunjanganPph)*$persentasePph)/100;
						}

						// echo "<pre>";
						// print_r('Persentase : '.$tmpPersentasePph);
						// echo "</pre>";

					}

					

					// Jumlah
					$hasil = $kontrak->gaji+$tmp+$tmptmk+$tmpjabatan+$tmpLainnya;

					// echo "<pre>";
					// print_r('Jumlah : '.$hasil);
					// echo "</pre>";				
					// echo "<hr>";

					// Hasil Akhir Data Buat di table Creator

					// $data = array('bulan'=>$bulan,
					// 		'tahun'=>$tahun,
					// 		'tanggal'=>$tanggal,
					// 		'nik'=>$kontrak->nik,
					// 		'nama'=>$kontrak->nama_lengkap,
					// 		'rekening'=>$kontrak->nomor_rek,
					// 		'nominal'=>$kontrak->gaji,
					// 		'disetorkan'=>$kontrak->gaji,
					// 		'biaya'=>$kontrak->biaya,
					// 		'koefisien'=>$tmp,
					// 		'tmk'=>$tmptmk,
					// 		'jabatan'=>$tmpjabatan,
					// 		'lainnya'=>$tmpLainnya,
					// 		'jumlah'=>($tmp+$tmptmk+$tmpLainnya+$tmpjabatan+$kontrak->gaji)-($tmpPersentase+$tmpPersentaseTk)-$kontrak->biaya,
					// 		'potongan_bpjs_tenaga_kerja'=>$persentaseTk,
					// 		'potongan_bpjs_tenaga_kesehatan'=>$persentaseKes,
					// 		'hasilkes'=>$tmpPersentase,
					// 		'hasiltk'=>$tmpPersentaseTk,
					// 		'status'=>'Generate Sistem'
					// 	);
					

					$where = array('bulan'=>date('m'),
									'tahun'=>date('Y'),
									'nik'=>$kontrak->nik);

					$dataCretor = $this->Nata_hris_hr_model->cekCreator($where)->num_rows();
					$dataCretorHistory = $this->Nata_hris_hr_model->cekCreatorHistory($where)->num_rows();

					if ($dataCretorHistory > 0) {
						$dataHistory = array(
							'gaji'=>$kontrak->gaji,
							'persentase_tunj_koefisien'=>$tmp1,
							'persentase_tunj_tmk'=>$tmptmk1,
							'persentase_tunj_jabatan'=>$tmpjabatan1,
							'nilai_tunj_koefisien'=>$tmp,
							'nilai_tunj_tmk'=>$tmptmk,
							'nilai_tunj_jabatan'=>$tmpjabatan,
							'tunj_lainnya'=>implode(',',$tampjt),
							'persentase_bpjs_kes'=>$persentaseKes,
							'persentase_bpjs_tk'=>$persentaseTk,
							'persentase_pph'=>$persentasePph,
							'nilai_bpjs_kes'=>$tmpPersentase,
							'nilai_bpjs_tk'=>$tmpPersentaseTk,
							'nilai_pph'=>$tmpPersentasePph,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'biaya'=>($kontrak->biaya!=""?$kontrak->biaya:0),
							'jumlah_tunjangan_lainnya'=>$tmpLainnya,
							'jumlah_disetorkan'=>($tmp+$tmptmk+$tmpLainnya+$tmpjabatan+$kontrak->gaji)-($tmpPersentase+$tmpPersentaseTk+$tmpPersentasePph)
							// 'jumlah_disetorkan'=>($kontrak->gaji!=""?($tmp+$tmptmk+$tmpLainnya+$tmpjabatan+$kontrak->gaji)-($tmpPersentase+$tmpPersentaseTk+$tmpPersentasePph)-$kontrak->biaya:0)
						);
						 $result = $this->Nata_hris_hr_model->updateCreatorHistory($dataHistory,$kontrak->nik);
					}else{
						$dataInsertHistory = array(
							//'nama'=>$kontrak->nama_lengkap,
							'nik'=>$kontrak->nik,
							'gaji'=>$kontrak->gaji,
							'bulan'=>date('m'),
							'tahun'=>date('Y'),
							'persentase_tunj_koefisien'=>$tmp1,
							'persentase_tunj_tmk'=>$tmptmk1,
							'persentase_tunj_jabatan'=>$tmpjabatan1,
							'nilai_tunj_koefisien'=>$tmp,
							'nilai_tunj_tmk'=>$tmptmk,
							'nilai_tunj_jabatan'=>$tmpjabatan,
							'tunj_lainnya'=>implode(',',$tampjt),
							'persentase_bpjs_kes'=>$persentaseKes,
							'persentase_bpjs_tk'=>$persentaseTk,
							'persentase_pph'=>$persentasePph,
							'nilai_bpjs_kes'=>$tmpPersentase,
							'nilai_bpjs_tk'=>$tmpPersentaseTk,
							'nilai_pph'=>$tmpPersentasePph,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'biaya'=>($kontrak->biaya!=""?$kontrak->biaya:0),
							'jumlah_tunjangan_lainnya'=>$tmpLainnya,
							'jumlah_disetorkan'=>($tmp+$tmptmk+$tmpLainnya+$tmpjabatan+$kontrak->gaji)-($tmpPersentase+$tmpPersentaseTk+$tmpPersentasePph)
						);
						 $result = $this->Nata_hris_hr_model->insertCreatorHistory($dataInsertHistory);
					}
					// echo "<pre>";
					// print_r($dataInsertHistory);
					// echo "</pre>";
					if ($dataCretor > 0) {
						$data = array(
							'tanggal'=>date('Y-m-d'),
							'nama'=>$kontrak->nama_lengkap,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'rekening'=>$kontrak->nomor_rek,
							'nominal'=>$kontrak->gaji,
							'disetorkan'=>($tmp+$tmptmk+$tmpLainnya+$tmpjabatan+$kontrak->gaji)-($tmpPersentase+$tmpPersentaseTk+$tmpPersentasePph),
							'biaya'=>$kontrak->biaya
						);
						 $result = $this->Nata_hris_hr_model->updateCreator($data,$kontrak->nik);
					}else{
						$dataInsert = array(
							'bulan'=>date('m'),
							'tahun'=>date('Y'),
							'tanggal'=>date('Y-m-d'),
							'nik'=>$kontrak->nik,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'nama'=>$kontrak->nama_lengkap,
							'rekening'=>$kontrak->nomor_rek,
							'nominal'=>$kontrak->gaji,
							'disetorkan'=>($tmp1+$tmptmk1+$tmpLainnya+$tmpjabatan1+$kontrak->gaji)-($tmpPersentase+$tmpPersentaseTk+$tmpPersentasePph),
							'biaya'=>$kontrak->biaya,
							'status'=>'Generate Sistem'

							// 'persentase_tunj_koefisien'=>$TunjanganRow->value_koefisien,
							// 'persentase_tunj_tmk'=>$TunjanganRow->value_tmk,

							// 'nilai_tunj_koefisien'=>$tmp,
							// 'nilai_tunj_tmk'=>$tmptmk,
							// 'nilai_tunj_jabatan'=>$tmpjabatan,
							// 'tunj_lainnya'=>implode(',',$tampjt),
							// 'persentase_bpjs_kes'=>$persentaseKes,
							// 'persentase_bpjs_tk'=>$persentaseTk,
							// 'persentase_PPH'=>$persentasePph,
							// 'nilai_bpjs_kes'=>$tmpPersentase,
							// 'nilai_bpjs_tk'=>$tmpPersentaseTk,
							// 'nilai_PPH'=>$tmpPersentasePph,
							// 'lainnya'=>$tmpLainnya,

						);
						 $result = $this->Nata_hris_hr_model->insertCreator($dataInsert);

						// echo "<pre>";
						// print_r($dataInsert);
						// echo "</pre>";				
						// echo "<hr>";
					}
				}
				//delay execution
				//sleep(5);
			}
			
		}

		$dataAmbilidp2= $this->Nata_hris_hr_model->ambilperusahaan();
		$id2=0;
		foreach ($dataAmbilidp2->result() as $dtidp2) {
			if($dtidp2->id_master_perusahaan>$idclient){
				$id2=$dtidp2->id_master_perusahaan;
				break;
			}
		}
		if($id2>0){
			//echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.base_url().'SamplePdf/SistemGaji/'.$id2.'">';
			// $data['id2']=$id2;
			// $this->load->view('hr/loading',$data);
			$tampidp=array('id2'=>$id2,'jumkar'=>$jumkar);
			echo json_encode($tampidp);

		}else{
			$result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil ");
            $this->session->set_flashdata($result);
            $tampidp=array('id2'=>$id2,'jumkar'=>$jumkar);
			echo json_encode($tampidp);

			//redirect("HR/HRPayrollCreator/3");
		}

		// Insert Payroll Creator
			
			//if ($result > 0) {
                    // $result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil ");
                    // $this->session->set_flashdata($result);
                    //     redirect("HR/HRPayrollCreator/3");
                // }else{
                //    $res=array("result"=>"warning","title"=>"Warning","msg"=>"Data ada gagal");
                //    $this->session->set_flashdata($res);
                //         redirect("HR/HRPayrollCreator");
                // }

		}else{
			redirect("home/login");	
		}

	}
	public function SistemGaji($idclient=""){
		if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			$data['dataAkses'] = $this->menu->getAkses(56);
			$data['menuId']=array(50,56);

		$dataAmbilIdPerusahaan= $this->Nata_hris_hr_model->ambilidperusahaan()->row();
		$idclient=$idclient!=""?$idclient:$dataAmbilIdPerusahaan->id_master_perusahaan;
		$dataAmbilPerusahaan= $this->Nata_hris_hr_model->ambilperusahaan();
		

		
		$tanggal = array('tanggal'=>date('Y-m-d'));
		$tahun = array('tahun'=>date('Y'));
		$bulan = array('bulan'=>date('m'));
		$tmp = 0;
		$tmptmk = 0;
		$tmpjabatan = 0;
		$tmpLainnya = 0;
		$tmpbpjskes = 0;
		$tmpbpjstk = 0;
		$tmprekening = 0;
		$tmpGaji = 0;
		$hasil = 0;
		$tmpTunjangan = 0;
		$jumkar=0;

		foreach ($dataAmbilPerusahaan->result() as $dtperusahaan) {

			$idperusahaan=array('ko.id_master_perusahaan'=>$dtperusahaan->id_master_perusahaan);
			$dataKaryawanKontraks = $this->Nata_hris_hr_model->dataPegawaiKontrakNIK($idperusahaan);
			$jumkar=$dataKaryawanKontraks->num_rows();

			if($dataKaryawanKontraks->num_rows() >0 ){
				foreach ($dataKaryawanKontraks->result() as $kontrak) {


					$where = array('bulan'=>date('m'),
									'tahun'=>date('Y'),
									'nik'=>$kontrak->nik);

					$dataCretor = $this->Nata_hris_hr_model->cekCreator($where)->num_rows();
					$dataCretorHistory = $this->Nata_hris_hr_model->cekCreatorHistory($where)->num_rows();

					if ($dataCretorHistory > 0) {
						$dataHistory = array(
							'gaji'=>$kontrak->gaji,
							'nilai_bpjs_kes'=>$kontrak->bpjs_kes,
							'nilai_bpjs_tk'=>$kontrak->bpjs_tk,
							'nilai_pph'=>$kontrak->pph,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'biaya'=>($kontrak->biaya!=""?$kontrak->biaya:0),
							'jumlah_disetorkan'=>$kontrak->gaji-($kontrak->bpjs_kes+$kontrak->bpjs_tk+$kontrak->pph),
						);
						 $result = $this->Nata_hris_hr_model->updateCreatorHistory($dataHistory,$kontrak->nik);
					}else{
						$dataInsertHistory = array(
							'nik'=>$kontrak->nik,
							'gaji'=>$kontrak->gaji,
							'bulan'=>date('m'),
							'tahun'=>date('Y'),
							'nilai_bpjs_kes'=>$kontrak->bpjs_kes,
							'nilai_bpjs_tk'=>$kontrak->bpjs_tk,
							'nilai_pph'=>$kontrak->pph,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'biaya'=>($kontrak->biaya!=""?$kontrak->biaya:0),
							'jumlah_disetorkan'=>$kontrak->gaji-($kontrak->bpjs_kes+$kontrak->bpjs_tk+$kontrak->pph),
						);
						 $result = $this->Nata_hris_hr_model->insertCreatorHistory($dataInsertHistory);
					}

					
					if ($dataCretor > 0) {
						$data = array(
							'tanggal'=>date('Y-m-d'),
							'nama'=>$kontrak->nama_lengkap,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'rekening'=>$kontrak->nomor_rek,
							'nominal'=>$kontrak->gaji,
							'disetorkan'=>$kontrak->gaji-($kontrak->bpjs_kes+$kontrak->bpjs_tk+$kontrak->pph),
							'biaya'=>$kontrak->biaya
						);
						 $result = $this->Nata_hris_hr_model->updateCreator($data,$kontrak->nik);
					}else{
						$dataInsert = array(
							'bulan'=>date('m'),
							'tahun'=>date('Y'),
							'tanggal'=>date('Y-m-d'),
							'nik'=>$kontrak->nik,
							'id_bank'=>($kontrak->id_bank!=""?$kontrak->id_bank:0),
							'nama'=>$kontrak->nama_lengkap,
							'rekening'=>$kontrak->nomor_rek,
							'nominal'=>$kontrak->gaji,
							'disetorkan'=>$kontrak->gaji-($kontrak->bpjs_kes+$kontrak->bpjs_tk+$kontrak->pph),
							'biaya'=>$kontrak->biaya,
							'status'=>'Generate Sistem'

						);
						 $result = $this->Nata_hris_hr_model->insertCreator($dataInsert);

						// echo "<pre>";
						// print_r($dataInsert);
						// echo "</pre>";				
						// echo "<hr>";
					}
				}

			}
			
		}

		$dataAmbilidp2= $this->Nata_hris_hr_model->ambilperusahaan();
		$id2=0;
		foreach ($dataAmbilidp2->result() as $dtidp2) {
			if($dtidp2->id_master_perusahaan>$idclient){
				$id2=$dtidp2->id_master_perusahaan;
				break;
			}
		}
		if($id2>0){
			$tampidp=array('id2'=>$id2,'jumkar'=>$jumkar);
			echo json_encode($tampidp);

		}else{
			$result=array("result"=>"success","title"=>"Sukses","msg"=>"Data  Berhasil ");
            $this->session->set_flashdata($result);
            $tampidp=array('id2'=>$id2,'jumkar'=>$jumkar);
			echo json_encode($tampidp);
		}

		}else{
			redirect("home/login");	
		}

	}
	
}
