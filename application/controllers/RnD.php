<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RnD extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper('url','download');
        $lib=array("phpmailer_library","session");
        $this->load->library($lib);
        $this->load->model('my_model');
        $this->load->model('Nata_hris_hr_model');
    }
    
    public function index(){
        $data['content'] = 'form_rnd';
        $data['datakaryawan']=$this->my_model->getUserKaryawan();
        $this->load->view('index',$data);
    }
    
    public function pdf(){
        //$this->load->helper('pdf_helper');
        $pdf_name="report_".date("Y-m-d_H_i_s").".pdf";
        $data=array(
            "title"=>"Report Employee",
            "header_string"=>"by Admin - Nata Software House\nnata.id",
            "header_logo"=>"nata-logo.png"
        );
        $dt=array();
        $content=$this->load->view('reportpdf',$dt,true);
        $data['content']=$content;
        $pdf=$this->my_model->crtPdf($data);
        $pdf->Output($pdf_name, 'I');
    }
    public function excel(){
        $excel_name="report_".date("Y-m-d_H_i_s").".xls";
        $this->my_model->crtExcel($excel_name);
        $dthead=array("No.","Judul","Penulis","ISBN");
        $dtfield=array(
            "@row_number:=@row_number+1 AS row_number","judul","penulis","isbn"
        );
        $data = array( 
            'title' => 'Report Employee',
            'head_data'=>$dthead,
            'body_data'=>$dtfield,
            'data' => $this->my_model->getcData($dtfield,"tbl_buku,(SELECT @row_number:=0) AS t")
        );
        $this->load->view('reportexcel',$data);
        
    }
    
    public function uploadFiles(){
        $data = array();
        $inpName="filenya";
        $uploadPath = 'assets/img/';
        $allowedType='jpg|jpeg|png|gif';
        
        // If file upload form submitted
        if(!empty($_FILES[$inpName]['name'])){
            
            $uploadData=array();
            $dt=array(
                "inpName"=>$inpName,
                "uploadPath"=>$uploadPath,
                "allowedType"=>$allowedType
            );
            $uploadData=$this->my_model->uploadFile($dt);
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->my_model->add_data_b("files",$uploadData);
                
                // Upload status message
                $statusMsg = $insert>0?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata(array("result"=>$insert>0?"success":"fail",'msg_up'=>$statusMsg));
            } else {
                $this->session->set_flashdata(array("result"=>"fail",'msg_up'=>'Gagal Upload..'));
            }
        } else {
            $this->session->set_flashdata(array("result"=>"fail",'msg_up'=>'Gagal Upload.'));
        }
        redirect("Home/tester");
    }
    
    public function kirimEmailnya(){
        $format=$this->input->post("format");
        $nik=$this->input->post("nik");
        $mailformat = $this->MailFormatView($format,$nik,"123");
        $mailTo=$_POST['email'];
        $msg=$_POST['pesan'];
        //$data=array("email"=>$mailTo,"pesan"=>$msg);
        //$data=array("email"=>$mailTo,"pesan"=>$mailformat);
        //$this->my_model->kirimEmail($mailTo,$mailformat);
        echo $this->my_model->kirimEmailnya($mailTo,$mailformat);
        /*
        $result=array();
        if($mail=="success"){
            $result=array("result"=>"success",'title'=>"Sukses",'msg'=>'Email terkirim');
        } else {
            $result=array("result"=>"error",'title'=>"Gagal",'msg'=>'Email gagal terkirim');
        }
		$this->session->set_flashdata($result); */
        
        echo $mailformat;
        //redirect("RnD");
    }
    
    public function kirimEmail(){
        $config = array(
           'protocol'  => 'mail',
           'smtp_host' => 'ssl://smtp.googlemail.com',
           'smtp_user' => 'katateguh345@gmail.com', 
           'smtp_pass' => 'Teguh17071198', 
           'smtp_port' => 587,
           'smtp_keepalive' => TRUE,
           'smtp_crypto' => 'SSL',
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
        $this->email->from('katateguh345@gmail.com', 'Nata HR'); 
        $this->email->to($a); 
        $this->email->subject('Nata HR '.$_POST['email']);
        $this->email->message($_POST['pesan']);
        if ($this->email->send()) {
            echo "Sukses Kirim";
                        
        } else{
            echo "Gagal Kirim";
        }
        $this->email->print_debugger();
    }
    
    public function sendEmail(){
        if(isset($_POST['email'])){
            $mailTo=$_POST['email'];
            $msg=$_POST['pesan'];
            $data=array("email"=>$mailTo,"pesan"=>$msg);
            $mail=$this->my_model->sendEmail($data);
    		if($mail->Send()){
                $dt=array(
                    "mail_from"=>$mail->mailFrom,
                    "mail_to"=>$mailTo,
                    "mail_subject"=>$mail->mailSubject,
                    "mail_msg"=>$msg,
                    "date_create"=>$mail->mailDate
                );
                $ins=$this->my_model->add_data("mail_log",$dt);
                $arr="";
                if($ins>0){
                    $arr=" & Sukses Insert";
                } else {
                    $arr=" & Gagal Insert";
                }
    			$this->session->set_flashdata(array("result"=>"success",'msg'=>'Sukses Terkirim'.$arr));
    		} 
    		else{
    			$this->session->set_flashdata(array("result"=>"fail",'msg'=>'Tidak terkirim'));
    		} 
        } else {
            $this->session->set_flashdata(array("result"=>"fail",'msg'=>'Tidak terkirim'));
        }
        redirect("Home/RnD");
    }
    
    public function checkNik(){
        $nik = $this->input->post("nik");
        $wh=array("nik"=>$nik);
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
    public function lakukan_download(){
        $this->load->helper('download');
        $filename='f249745f5f128f608228cvt-itb.png';
        $fileContents = file_get_contents(base_url('assets/cv/'. $filename)); 
        $file='test.png';
        force_download($file, $fileContents);
	}
    public function MailServer(){
        //if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			//$data['menuId']=array(52,62);
			$data['content'] = 'hr/hr-mail-server';
            $wh=array("mail_company"=>"semanggi3");
            $data['mailserver'] = $this->my_model->mailserver($wh)->row();
			$this->load->view('index',$data);
		/* }else{
			redirect("home/login");	
		} */
    }
    public function MailFormat(){
        //if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			//$data['menuId']=array(52,62);
            $wh=array("mail_company"=>"semanggi3");
            $data['mailserver'] = $this->my_model->mailserver($wh)->row();
            $format=$this->input->post("format");
            $title="Title";
            $resetkey="";
            if($format=="baru" || $format=="diterima" || $format=="ditolak"){
                $title="Thank You";
            } else if($format=="reset"){
                $resetkey="12345";
                $title="Forgot Your Password";
            } else if($format=="pegawai"){
                $title="Welcome";
            }
            $nik=$this->input->post("nik");
            $whnik=array("c.nik"=>$nik);
            $data['datakar'] = $this->my_model->getUserKaryawan($whnik)->row();
            $data['datajadwal'] = $this->my_model->dataJadwalLokerPelamar($data['datakar']->idlokerdl);
            $data['mailtitle'] = $title;
            $data['resetkey'] = $resetkey;
            $data['mailformat'] = $this->input->post("format");
			$this->load->view('hr/hr-mail-format',$data);
		/* }else{
			redirect("home/login");	
		} */
    }
    public function MailFormatView($format="",$nik="",$resetkey=""){
        //if($this->session->userdata('user_type')==3 && $this->session->userdata('username')!='' &&$this->session->userdata('status')=='login'){
			//$data['menuId']=array(52,62);
            $wh=array("mail_company"=>"semanggi3");
            $data['mailserver'] = $this->my_model->mailserver($wh)->row();
            $title="Title";
            if($format=="baru" || $format=="diterima" || $format=="ditolak"){
                $title="Thank You";
            } else if($format=="reset"){
                $title="Forgot Your Password";
            } else if($format=="pegawai"){
                $title="Welcome";
            }
            $whnik=array("c.nik"=>$nik);
            $data['datakar'] = $this->my_model->getUserKaryawan($whnik)->row();
            $data['datajadwal'] = $this->my_model->dataJadwalLokerPelamar($data['datakar']->idlokerdl);
            $data['mailtitle'] = $title;
            $data['resetkey'] = $resetkey;
            $data['mailformat'] = $this->input->post("format");
			return $this->load->view('hr/hr-mail-format',$data,TRUE);
		/* }else{
			redirect("home/login");	
		} */
    }
    public function changeMailServer(){
        $data=$this->input->post();
        $id=array("id_mail"=>$data['id_mail']);
        unset($data['id_mail']);
        unset($data['files']);
        $ins=$this->my_model->upd_data("mail_server",$data,$id);
        $result=array();
        if($ins>0){
            $result=array("result"=>"success",'title'=>"Sukses",'msg'=>'Data Mail Server sudah terupdate');
        } else {
            $result=array("result"=>"error",'title'=>"Gagal",'msg'=>'Data Mail Server gagal terupdate');
        }
		$this->session->set_flashdata($result);
        redirect("RnD/MailServer");
    }
}
