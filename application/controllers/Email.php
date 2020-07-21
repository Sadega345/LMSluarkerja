<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('phpmailer_library');
        //$this->load->library("Recaptcha");
        $this->load->library("session");
        $this->load->library('email');
    }
    
    public function inputEmail(){
        $this->load->view('form_email');
    }

    public function kirim(){
        // $out = array();
        // $data = array();
        // $settingmenu = $this->M_settingmenu->select_all()->row();
        
        // $data   = $this->input->post();
        $config = array(
               'protocol'  => 'mail', // mail, sendmail, or smtp	
               'smtp_host' => 'ssl://smtp.googlemail.com',
               // 'mailpath'  => '/usr/sbin/sendmail',
               'smtp_user' => 'katateguh345@gmail.com', //Ganti dengan email gmail Anda
               'smtp_pass' => 'Teguh17071198', // Ganti Password gmail Anda
               'smtp_port' => 587,
               'smtp_crypto' => 'SSL', // tls or ssl
               
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
            $a = $this->input->post('email');
            $pesan = $this->input->post('pesan');
            // $nama = $this->input->post('nama');
            $this->email->from('katateguh345@gmail.com', 'Nata HR'); // Email dan nama anda/pengirim

            $this->email->to($a); // Ganti dengan email tujuan Anda
            
            
            // Subject email
            $this->email->subject('Nata HR '.$_POST['email']);

            // Isi email
            // $baseurl = base_url();
            // $year = date('Y');
            // $isian = array('Nama'=>$a,
            //              'Email'=>$a,
            //              'Pertanyaan'=>$pertanyaan,
            //              'Jawaban'=>$jawaban
            //          );
            // $message = $this->load->view('pesandrlaurier',$isian,TRUE); 

            // $this->email->message('Nama : '.$nama.'<br/>'.'Email : '.$a.'<br/><br/>'.'Pertanyaan : '.$pertanyaan.'Jawaban : '.'<br>'.$_POST['jawaban'].'<br/><br/>Salam,<br/>dr.Laurier');
            // $this->email->set_mailtype('html');
            // $result = $this->M_drlaurier->update($data);
            $this->email->message($_POST['pesan']);
            if ($this->email->send()) {
                echo "Sukses Kirim";
            } else{
                echo "Gagal Kirim";
            }
            $this->email->print_debugger();
    }

    public function sendEmail(){
        // echo "masuk function";
        if(isset($_POST['masuk'])){
            $mail = $this->phpmailer_library->load();
    		$mail->IsSMTP();
    		$mail->SMTPSecure = 'tls';
    		$mail->Host = "smtp.gmail.com"; //hostname masing-masing provider email
    		$mail->SMTPDebug = 0;
    		$mail->Port = 587;
    		$mail->SMTPAuth = true;
    		$mail->Username = "katateguh345@gmail.com"; //user email
    		$mail->Password = "Teguh17071198"; //password email
    		$mail->SetFrom("katateguh345@gmail.com","Info Nata"); //set email pengirim
    		$mail->Subject = "Pemberitahuan Email dari HR Nata Website "; //subyek email
    		$mail->AddAddress($_POST['email'],"Client HR Nata"); //tujuan email
    		$mail->MsgHTML($_POST['pesan']);
    		if($mail->Send()){
    			echo "Message has been sent";
    			$this->session->set_flashdata(array("result"=>"success",'msg'=>'Sukses Terkirim'));
    		} 
    		else{
    			echo "Failed to sending message";
    			$this->session->set_flashdata(array("result"=>"fail",'msg'=>'Tidak terkirim'));
    		} 
        } else {
            $this->session->set_flashdata(array("result"=>"fail",'msg'=>'Tidak terkirim'));
        }
        // echo $this->session->set_flashdata('msg');
        // redirect("Home/tester");
    }

	public function send(){
			$secret_key = "6LddYZEUAAAAADgtRHXYS6zOfAs_lALa2S8VsNuv";
			$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
			$response = json_decode($verify);
			// echo $secret_key;
			if ($response->success) {
				$mail = $this->phpmailer_library->load();
				$mail->IsSMTP();
				$mail->SMTPSecure = 'ssl';
				$mail->Host = "mail.nata.id"; //hostname masing-masing provider email
				$mail->SMTPDebug = 0;
				$mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->Username = "info@nata.id"; //user email
				$mail->Password = "nata234!!"; //password email
				$mail->SetFrom("info@nata.id","Nama pengirim yang muncul"); //set email pengirim
				$mail->Subject = "Pemberitahuan Email dari Website"; //subyek email
				$mail->AddAddress($_POST['email'],"Nama penerima yang muncul"); //tujuan email
				$mail->MsgHTML($_POST['pesan']);
				if($mail->Send()){
					// echo "Message has been sent";

					$this->session->set_flashdata('sukses','Sukses Terkirim');
				} 
				else{
					// echo "Failed to sending message";
					$this->session->set_flashdata('notsukses','Tidak terkirim');
				} 
			} redirect("Home/contact");
			
	}

	
}
