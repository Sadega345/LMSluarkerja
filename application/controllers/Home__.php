<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
        $model=array("M_home","My_model");
		$this->load->model($model);
        $helper=array("form","url","cookie","string");
        $this->load->helper($helper);
        $lib=array("session","form_validation");
        $this->load->library($lib);
	}

	public function index()
	{	
		if($this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){
 				redirect("HR");
 			}else{
 				redirect("home/login");	
 			}
		}else{
			redirect('home/login');
		}
		
	}
	public function loker()
	{	
		if($this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){
 				redirect("HR");
 			}else{
 				redirect("home/login");	
 			}
		}else{
			redirect('home/halamanloker');
		}
		
	}

	public function halamanloker(){
		if($this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			redirect('Home');
		}else{
			$data = 'employee/halamanloker';
			$wh=array('a.id_master_jenis_project >'=>'0');
			$dt['dataloker']=$this->My_model->dataLoker($wh);
			$this->load->view($data,$dt);
		}

	}
	public function halamanlamaran(){

			$data = 'employee/halamanlamaran';
			$id_loker=array('id_loker'=>$_POST['id_loker']);
			$dt['dataloker']=$this->My_model->dt_loker($id_loker)->row();
			$this->load->view($data,$dt);

	}
	public function tambahpelamar(){
        $whnik=array("b.email"=>$this->input->post('email'));
        $datakar=$this->My_model->dataPelamar($whnik);
        if($datakar->num_rows()>0){
            $result=array("result"=>"success","title"=>"Sukses","msg"=>"Alamat Email ".$this->input->post('email')." telah digunakan, input email yg lain.");
            $this->session->set_flashdata($result);
            redirect("home/halamanloker");
        } else {
    		$data = array(
    			//'id_loker' => $this->input->post('id_loker'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_panggilan' => $this->input->post('nama_lengkap'),
    			'nomor_telepon' => $this->input->post('telp'),
    			'email' => $this->input->post('email'),
    			'alamat' => $this->input->post('alamat'),
    			'tanggal' => $this->input->post('tanggal')
            );
            //print_r($_FILES);
    		if ( $_FILES['file_cv']['name'] != '' ) {
    			$filename = bin2hex(random_bytes(10)).str_replace(' ', '_', $_FILES['file_cv']['name']);
    			$filename = str_replace('(', '', $filename);
    			$filename = str_replace(')', '', $filename);
    			$data['file_cv'] = $filename;
    			// $result = $this->M_article->insert($data);
    			$config['upload_path']          = 'assets/cv';
    			$config['allowed_types']        = 'jpg|png|pdf|doc|docx|jpeg';
    			$config['file_name']        = $filename;
    			$config['overwrite'] 	= TRUE;
    			// $config['max_size']             = 100;
    			// $config['max_width']            = 1024;
    			// $config['max_height']           = 768;
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
                if ($this->upload->do_upload('file_cv')) {
               	    //echo "suskes";
            	} else {
                    //echo "ngga suskes".$this->upload->display_errors(). 'File Type: ' . $this->upload->file_type;;
            	}
            }
            $id_pelamar=$this->My_model->tambahpelamar($data);
            $datadtl = array(
    			'id_loker' => $this->input->post('id_loker'),
    			'id_pelamar' => $id_pelamar
    
            );
            $this->My_model->insert($datadtl);
            $ambilidpelamar=$this->My_model->ambilidpelamar($data);
            $nik=date('Ym').rand(0,100);
            $pass=explode("@",$this->input->post('email'));
            $data2 = array(
            	'nik'=>$nik,
            	'id_pelamar'=>$ambilidpelamar->id_pelamar,
                'username' => $this->input->post('email'),
    			'password' => $pass[0],
    			'id_jenis_user' => '5',
    			'tanggal' =>  $this->input->post('tanggal'),
    			'status' =>'1'
            );
            $this->My_model->tambahuserpelamar($data2);
            $ambiliduser= $this->My_model->ambiliduser($data2);
            $data_session = array(
    			'username' => $this->input->post('email'),
    			'nik' => $nik,
    			'nikktp' => '',
    			'id_pelamar' => $ambilidpelamar->id_pelamar,
    			'user_type'=> 5,
    			'employee_login_id'=>$ambiliduser->id_user,
    			'status' => "login"
            );
            if($data_session['user_type']!=5){
                $this->session->set_userdata($data_session);
            }
    		if($data_session['user_type']==1){
    			redirect("Employee");
    		}else if($data_session['user_type']==2){
    			redirect("HR");
            }else if($data_session['user_type']==5){
                //$msg=$this->load->view("email_msg",$data2,true);
                //$kirimemail=$this->kirimEmail($this->input->post('email'),$msg);
                $kirimemail=$this->kirimEmailny("baru",$nik,$this->input->post('email'),"");
                $result=array();
                if ($kirimemail=="success") {
    	       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Terima Kasih ".$this->input->post('email')."<br/>Daftar Berhasil, check email untuk mengetahui user/pass Anda");
    	       	}else{
    	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Daftar Gagal");
    	       	}
    			// print_r($data);
                $this->session->set_flashdata($result);
    			//redirect("Aplicant");
                redirect("home/login");
    		}else{
    			redirect("home/login");	
    		}
        }   
	}
    public function Reset(){
        $now=strtotime(date("Y-m-d H:i:s"));
        $result=array();
        print_r($this->input->post());
        $data=array("reset_key"=>$now);
        $id=array("username"=>$this->input->post("email"));
        $select=$this->My_model->ambiluser($id);
        if($select->num_rows()>0){
            $select=$this->My_model->ambiluser($id);
            $time =$select->row()->reset_key;
            $datediff = time() - $time;
            if($datediff>86400 || $time==""){
                $data=array("reset_key"=>$now);
                $upd=$this->My_model->upd_data("trx_user",$data,$id);
                $select=$this->My_model->ambiluser($id);
                $time =$select->row()->reset_key;
                $kirimemail=$this->kirimEmailny("reset",$select->row()->nik,$this->input->post('email'),$time);
                $result=array();
                if ($kirimemail=="success") {
    	       	   $result=array("result"=>"success","title"=>"Sukses","msg"=>"Terima Kasih ".$this->input->post('email')."<br/>Check Email untuk melakukan reset password");
    	       	}else{
    	       	   $result=array("result"=>"error","title"=>"Gagal","msg"=>"Daftar Gagal");
    	       	}
    			// print_r($data);
                $this->session->set_flashdata($result);
    			//redirect("Aplicant");
                redirect("home/login");
                
            } else {
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Email ".$this->input->post('email')." sudah melakukan reset password, check email.");
                $this->session->set_flashdata($result);
                redirect("Home/forgotPassword");
            }
            /* if(!isset($_SERVER['REQUEST_TIME'])){
                $_SERVER['REQUEST_TIME']=$time;
            } 
            $exp=$this->checkExpPass($time);
            if($exp=="expire"){
                echo "expire";
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Email ".$this->input->post('email')." belum terdaftar, silahkan melamar terlebih dahulu.");
                $this->session->set_flashdata($result);
                redirect("Home");
            } else {
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Email ".$this->input->post('email')." belum terdaftar, silahkan melamar terlebih dahulu.");
                $this->session->set_flashdata($result);
                redirect("Home");
                echo "alive";
            } */
            
        } else { 
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Email ".$this->input->post('email')." belum terdaftar, silahkan melamar terlebih dahulu.");
            $this->session->set_flashdata($result);
            redirect("Home/forgotPassword");
        }
    }

    public function ResetPass($key=""){
        $var=explode("x",$key);
        $datediff = time() - $var[0];
        if($datediff>86400 || count($var)==0 || $key=="" || !isset($var[0]) || !isset($var[1])){
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Link Expire, silahkan ulangi.");
            $this->session->set_flashdata($result);
            redirect("Home/forgotPassword");
        } else {
            $id=array("nik"=>$var[1],"reset_key"=>$var[0]);
            $sel=$this->My_model->ambiluser($id);
            if($sel->num_rows()>0){
                $data['datakar']=$sel->row();
                $data['key']=$key;
                $this->load->view('reset-password',$data);
            } else {
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Link tidak berlaku, silahkan ulangi.");
                $this->session->set_flashdata($result);
                redirect("Home/forgotPassword");
            }
        }
    }
    public function prosesReset(){
        $key=$this->input->post("key");
        $var=explode("x",$key);
        $datediff = time() - $var[0];
        if($datediff>86400 || count($var)==0 || $key=="" || !isset($var[0]) || !isset($var[1])){
            $result=array("result"=>"error","title"=>"Gagal","msg"=>"Link Expire, silahkan ulangi.");
            $this->session->set_flashdata($result);
            redirect("Home/forgotPassword");
        } else {
            $id=array("nik"=>$var[1],"reset_key"=>$var[0]);
            $sel=$this->My_model->ambiluser($id);
            if($sel->num_rows()>0){
                $pass=$this->input->post("pass");
                $passc=$this->input->post("passconf");
                if($pass==$passc){
                    $id=array(
                        "nik"=>$this->input->post("nik")
                        ,"username"=>$this->input->post("email")
                        ,"reset_key"=>$var[0]
                    );
                    $data=array(
                        "password"=>$this->input->post("pass"),
                        "reset_key"=>""
                    );
                    $upd=$this->My_model->upd_data("trx_user",$data,$id);
                    if($upd>0){
                        $result=array("result"=>"success","title"=>"Sukses","msg"=>"Password Berhasil direset, silahkan login dengan password baru.");
                        $this->session->set_flashdata($result);
                        redirect("Home/login");
                    } else {
                        $result=array("result"=>"error","title"=>"Gagal","msg"=>"Gagal Reset Password");
                        $this->session->set_flashdata($result);
                        redirect("Home/ResetPass/".$key);
                    }
                } else {
                    $result=array("result"=>"error","title"=>"Gagal","msg"=>"Password Konfirmasi tidak sama");
                    $this->session->set_flashdata($result);
                    redirect("Home/ResetPass/".$key);
                }
            } else {
                $result=array("result"=>"error","title"=>"Gagal","msg"=>"Link tidak berlaku, silahkan ulangi.");
                $this->session->set_flashdata($result);
                redirect("Home/forgotPassword");
            }
        }
    }
    public function checkExpPass($time){
        $now=time();
        /**
        * for a 1 day timeout, specified in seconds
        */ 
        $timeout_duration = 86400;

        /**
        * Here we look for the user's LAST_ACTIVITY timestamp. If
        * it's set and indicates our $timeout_duration has passed,
        * blow away any previous $_SESSION data and start a new one.
        */ 
        if (isset($_SESSION['LAST_ACTIVITY']) && 
           ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
            session_unset($_SERVER['REQUEST_TIME']);
            //session_unset($_SERVER['LAST_ACTIVITY']);
            //session_destroy();
            //session_start();
            return "expire";
        } else {
            return "alive";
        }

        /**
        * Finally, update LAST_ACTIVITY so that our timeout
        * is based on it and not the user's login time.
        */
        $_SESSION['LAST_ACTIVITY'] = $now;
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
            if($datakar->num_rows()>0){
                $data['datakar'] = $datakar->row();
                $data['datajadwal'] = $this->My_model->dataJadwalLokerPelamar($data['datakar']->idlokerdl);
            } else {
                $whnik=array("a.nik"=>$nik);
                $datakar=$this->My_model->dataPelamar($whnik);
                $data['datakar'] = $datakar->row();
            }
            $data['mailtitle'] = $title;
            $data['resetkey'] = $resetkey;
            $data['mailformat'] = $format;
			return $this->load->view('hr/hr-mail-format',$data,TRUE);
		/* }else{
			redirect("home/login");	
		} */
    }
    public function kirimEmailny($format,$nik,$mailTo,$reset){
        /*
        baru,diterima,ditolak,reset,pegawai
        */
        $mailformat = $this->MailFormatView($format,$nik,$reset);
        $mail= $this->My_model->kirimEmailnya($mailTo,$mailformat);
        if($mail=="success"){
            return "success";
        } else {
            return "fail";
        }
    }
    public function kirimEmail($email,$msg){
        $config = array(
               'protocol'  => 'mail',
               'smtp_host' => 'ssl://smtp.googlemail.com',
               'smtp_user' => 'katateguh345@gmail.com', 
               'smtp_pass' => 'Teguh17071198',
               'smtp_port' => 587,
               'smtp_crypto' => 'SSL',
               'smtp_keepalive' => TRUE,
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
               'priority'  => 1
            );
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $a =$email;
            $pesan = $msg;
            $this->email->from('katateguh345@gmail.com', 'Nata HR');
            $this->email->to($a);
            $this->email->subject('Nata HR '.$email);
            $this->email->message($msg);
            $hasil="";
            if ($this->email->send()) {
                $hasil="success";
            } else{
                $hasil="gagal";
            }
            return $hasil;
            //$this->email->print_debugger();
    }

	public function login(){
		 // ambil cookie
        $cookie = get_cookie('hriscode');

		if($this->session->userdata('username')!='' && $this->session->userdata('status')=='login'){
			if($this->session->userdata('user_type')==1){
 				redirect("Employee");
 			}else if($this->session->userdata('user_type')==3){
 				redirect("HR");
 			}else if($this->session->userdata('user_type')==4){
 				redirect("Admin");
 			}else if($this->session->userdata('user_type')==5){
 				redirect("Aplicant");
 			}else if($this->session->userdata('user_type')==6){
 				redirect("Outsource");
 			}else{
                $data = array(
                    'user_name' => '',
                    'password' => '',
                    'remember' => ''
                );
 				$this->load->view('login',$data);
 			}
 		 } else if($cookie <> '') {
            // cek cookie
            $row = $this->My_model->get_by_cookie($cookie)->row();
            if ($row) {
                $data = array(
                    'user_name' => $row->username,
					'password' => $row->password,
					'remember' => 'checked',
                );
                $this->load->view('login', $data);    

            } else {
                $data = array(
                    'user_name' => set_value('user_name'),
					'password' => set_value('password'),
					'remember' => set_value('remember'),
                );
                $this->load->view('login', $data);    
            }
    	}else{
    		$data = array(
                    'user_name' => set_value('user_name'),
					'password' => set_value('password'),
					'remember' => set_value('remember'),
                );
			$this->load->view('login',$data);
		}
	}
	public function prosesLogin() {
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		$remember = $this->input->post('remember');

		$where = array(
			'u.username' => $user_name,
			'u.password' =>$password,
			'u.status' =>1

			);
		$cek = $this->My_model->cek_login($where)->num_rows();
		$dt = $this->My_model->cek_login($where)->row();
		if($cek > 0){
			 if ($remember) {
                $key = random_string('alnum', 64);
                set_cookie('hriscode', $key, 3600*24*30); // set expired 30 hari kedepan
                
                // simpan key di database
                $update_key = array(
                    'cookie' => $key
                );
                $this->My_model->update($update_key, $dt->id_user);
            }else{
            	delete_cookie("hriscode");
            }
            $tmp = array();
            $where = array('a.id_jabatan'=>$dt->id_jenis_project);
            $explodejenis = explode(',', $dt->id_jenis_user);
            if ($this->input->post('jenis') != '') {
                $explodejenis = array($this->input->post('jenis'));
            }
            if (in_array('1', $explodejenis)) {
                $where = array('a.id_jenis_user',1);
            }elseif (in_array('6', $explodejenis)) {
                $where = array('a.id_jenis_user',6);
            }
            elseif(in_array('3', $explodejenis)){
                $where['a.id_jenis_user'] = 3;
            }

            $dataModul = $this->My_model->viewmanageUserParent($where);
            foreach ($dataModul->result() as $modul) {
                $tmp[] = $modul->id_modul.':'.$modul->akses;
            }
            $tmpuser = explode(',', $dt->id_jenis_user);

			$data_session = array(
				'username' => $user_name,
				'nik' => $dt->nik,
				'nikktp' => $dt->nik_ktp,
				'id_pelamar' => $dt->id_pelamar,
                'jenis_user'=>$dt->id_jenis_user,
				'user_type'=> $explodejenis[0],
                'id_jabatan' =>$dt->id_jenis_project,
                'nama_lengkap'=>$dt->nama_lengkap,
				'employee_login_id'=>$dt->id_user,
                'akses'=>implode(',', $tmp),
				'status' => "login"
				);
            if($dt->email!=""){
                if (count($explodejenis) > 1) {
                     $result=array("result"=>"success","title"=>"Pilih","user_type"=>$dt->id_jenis_user,"msgjenisuser"=>"Pilih Jenis User",
                    "username"=>$user_name,
                    "password"=>$password
                );
                        $this->session->set_flashdata($result);
                         redirect("home/login"); 
                }else{
                    // print_r($data_session);
                    $this->session->set_userdata($data_session);
                    if($data_session['user_type']==1){
                        redirect("Employee");
                    }else if($data_session['user_type']==2){
                        redirect("HR");
                    }else if($data_session['user_type']==5){
                        redirect("Aplicant/recruitment");
                    }else if($data_session['user_type']==6){
                        redirect("Outsource");
                    }else{
                       redirect("home/login"); 
                    } 
                }
            }
            else{
                 $result=array("result"=>"error","title"=>"Gagal","nik"=>$dt->nik,"msge"=>"Gagal Masukan Email Anda");
                        $this->session->set_flashdata($result);
                         redirect("home/login"); 
            }
			
		}else{
			redirect("home/login");
		}
    }
    function prosesLogout(){
		unset($_SESSION['username'],$_SESSION['user_type'],$_SESSION['employee_login_id'],$_SESSION['status'],$_SESSION['nik'],$_SESSION['nikktp']);
		
		redirect('home');
	}
	public function register(){
		$this->load->view('register');
	}
	public function forgotPassword(){
		$this->load->view('forgot-password');
	}

	
    public function RnD(){
        $data['content'] = 'form_rnd';
        $this->load->view('index',$data);
    }
    
    public function sendEmail(){
        $object = new stdClass();
        $object->from = 'bode.psu@gmail.com';
        $object->from_txt = 'bode';
        $object->to = $this->input->post("email");
        $object->subject = $this->input->post("subject");
        $object->msg = $this->input->post("message");
        $email=$this->my_model->sendEmail($object);
        if($email){
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        }else{
            $this->session->set_flashdata("email_sent","You have encountered an error");
        }
        redirect("Home");
    }

	public function tambah()
	{
		$this->load->view('form_tambah');
	}

	public function proses_tambah(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'no_hp' => $this->input->post('hp'),
			'alamat' => $this->input->post('alamat')
		);

		$this->M_home->insert($data);

		redirect('Home');
	}

	public function edit($id){
		$id = $this->uri->segment(3);

		$data = array(

            'title'     => 'Edit Data Siswa',
            'siswa' => $this->M_home->edit($id)

        );

        $this->load->view('form_edit', $data);
	}

	public function proses_update(){
		$id['id'] = $this->input->post("id");
        $data = array(

            'nama' => $this->input->post('nama'),
			'no_hp' => $this->input->post('hp'),
			'alamat' => $this->input->post('alamat')

        );

        $this->M_home->update($data,$id);
        redirect('Home');
	}
    public function updateemail(){
        $nik = $this->input->post("nik");
        $data = array(

            'email' => $this->input->post('email')
        );

        $this->My_model->updateemail($data,$nik);
        redirect('Home');
    }

	public function delete($id){
		$id['id'] = $this->uri->segment(3);

		$this->M_home->delete($id);
		
		redirect('Home');
	}

}
