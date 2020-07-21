<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
     public function __construct()
	{
	   $this->load->database();
       $lib=array("phpmailer_library");
       $this->load->library($lib);
       $this->load->helper('pdf_helper');
	}

    function dt_mstAgama() {
        $this->db->select('*');
        $this->db->from('mst_agama');
        return  $this->db->get();
    }
    function add_mst_agama($data) {
         $this->db->insert('mst_agama',$data);
    }
    
    function data_mst_agama($id) {
        $this->db->select('*');
        $this->db->from('mst_agama');
        $this->db->where('id_agama',$id);
        return  $this->db->get()->row();
    }
    function ubah_agama($data,$id) {
         $this->db->where('id_agama',$id);
         $this->db->update('mst_agama',$data);
    }
    public function hapusAgama($id){   
      $this->db->where('id_agama',$id);
       $this->db->delete('mst_agama');
    }

    function dt_mstStatusNikah() {
        $this->db->select('*');
        $this->db->from('mst_sts_nikah');
        return  $this->db->get();
    }
    function add_mst_status_nikah($data) {
         $this->db->insert('mst_sts_nikah',$data);
    }
    function data_mst_status_nikah($id) {
        $this->db->select('*');
        $this->db->from('mst_sts_nikah');
        $this->db->where('id_sts_nikah',$id);
        return  $this->db->get()->row();
    }
    function ubah_status_nikah($data,$id) {
         $this->db->where('id_sts_nikah',$id);
         $this->db->update('mst_sts_nikah',$data);
    }
    public function hapusStatusNikah($id){   
      $this->db->where('id_sts_nikah',$id);
       $this->db->delete('mst_sts_nikah');
    }
    function dt_mstProvinsi() {
        $this->db->select('*');
        $this->db->from('mst_provinsi');
        return  $this->db->get();
    }
    function dt_mstKabupaten() {
        $this->db->select('a.*,b.deskripsi as deskripsiProv');
        $this->db->from('mst_kabupaten a');
        $this->db->join('mst_provinsi b','b.id_provinsi=a.id_provinsi','left');
        return  $this->db->get();
    }
    function dt_mstKecamatan() {
        $this->db->select('a.*,b.deskripsi as deskripsiKab');
        $this->db->from('mst_kecamatan a');
        $this->db->join('mst_kabupaten b','b.id_kabupaten=a.id_kabupaten','left');
        return  $this->db->get();
    }
    function dt_mstJabatan() {
        $this->db->select('*');
        $this->db->from('mst_jabatan');
        return  $this->db->get();
    }
    function add_mst_jabatan($data) {
         $this->db->insert('mst_jabatan',$data);
    }
    function data_mst_jabatan($id) {
        $this->db->select('*');
        $this->db->from('mst_jabatan');
        $this->db->where('id_jabatan',$id);
        return  $this->db->get()->row();
    }
    function ubah_jabatan($data,$id) {
         $this->db->where('id_jabatan',$id);
         $this->db->update('mst_jabatan',$data);
    }
    public function hapusJabatan($id){   
      $this->db->where('id_jabatan',$id);
       $this->db->delete('mst_jabatan');
    }
    function dt_mstDepartement() {
        $this->db->select('*');
        $this->db->from('mst_departemen');
        return  $this->db->get();
    }
    function add_mst_departement($data) {
         $this->db->insert('mst_departemen',$data);
    }
    function data_mst_departement($id) {
        $this->db->select('*');
        $this->db->from('mst_departemen');
        $this->db->where('id_departemen',$id);
        return  $this->db->get()->row();
    }
    function ubah_departement($data,$id) {
         $this->db->where('id_departemen',$id);
         $this->db->update('mst_departemen',$data);
    }
    public function hapusDepartement($id){   
      $this->db->where('id_departemen',$id);
       $this->db->delete('mst_departemen');
    }
    function dt_mstStatusKerja() {
        $this->db->select('*');
        $this->db->from('mst_sts_kerja');
        return  $this->db->get();
    }
    function add_mst_status_kerja($data) {
         $this->db->insert('mst_sts_kerja',$data);
    }
    function data_mst_status_kerja($id) {
        $this->db->select('*');
        $this->db->from('mst_sts_kerja');
        $this->db->where('id_sts_kerja',$id);
        return  $this->db->get()->row();
    }
    function ubah_status_kerja($data,$id) {
         $this->db->where('id_sts_kerja',$id);
         $this->db->update('mst_sts_kerja',$data);
    }
    public function hapusStatusKerja($id){   
      $this->db->where('id_sts_kerja',$id);
       $this->db->delete('mst_sts_kerja');
    }
    function dt_mstSuku() {
        $this->db->select('*');
        $this->db->from('mst_suku');
        return  $this->db->get();
    }
    function add_mst_suku($data) {
         $this->db->insert('mst_suku',$data);
    }
    function data_mst_suku($id) {
        $this->db->select('*');
        $this->db->from('mst_suku');
        $this->db->where('id_suku',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_suku($data,$id) {
         $this->db->where('id_suku',$id);
         $this->db->update('mst_suku',$data);
    }
    public function hapusSuku($id){   
      $this->db->where('id_suku',$id);
       $this->db->delete('mst_suku');
    }
    function dt_mstPendidikan() {
        $this->db->select('*');
        $this->db->from('mst_pendidikan');
        return  $this->db->get();
    }
    function add_mst_pendidikan($data) {
         $this->db->insert('mst_pendidikan',$data);
    }
    function data_mst_pendidikan($id) {
        $this->db->select('*');
        $this->db->from('mst_pendidikan');
        $this->db->where('id_pendidikan',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_pendidikan($data,$id) {
         $this->db->where('id_pendidikan',$id);
         $this->db->update('mst_pendidikan',$data);
    }
    public function hapusPendidikan($id){   
      $this->db->where('id_pendidikan',$id);
       $this->db->delete('mst_pendidikan');
    }
    function dt_mstBank() {
        $this->db->select('*');
        $this->db->from('mst_bank');
        return  $this->db->get();
    }
    function add_mst_bank($data) {
         $this->db->insert('mst_bank',$data);
    }
    function data_mst_bank($id) {
        $this->db->select('*');
        $this->db->from('mst_bank');
        $this->db->where('id_bank',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_bank($data,$id) {
         $this->db->where('id_bank',$id);
         $this->db->update('mst_bank',$data);
    }
    public function hapusBank($id){   
      $this->db->where('id_bank',$id);
       $this->db->delete('mst_bank');
    }
    function dt_mstLeaveKategori() {
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        return  $this->db->get();
    }
    function add_mst_leave_kategori($data) {
         $this->db->insert('mst_leave_kategori',$data);
    }
    function data_mst_leave_kategori($id) {
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        $this->db->where('id_leave_kategori',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_leave_kategori($data,$id) {
         $this->db->where('id_leave_kategori',$id);
         $this->db->update('mst_leave_kategori',$data);
    }
    public function hapusLeaveKategori($id){   
      $this->db->where('id_leave_kategori',$id);
       $this->db->delete('mst_leave_kategori');
    }
    function dt_mstBenefit() {
        $this->db->select('*');
        $this->db->from('mst_benefit');
        return  $this->db->get();
    }
    function add_mst_benefit($data) {
         $this->db->insert('mst_benefit',$data);
    }
     function data_mst_benefit($id) {
        $this->db->select('*');
        $this->db->from('mst_benefit');
        $this->db->where('id_benefit',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_benefit($data,$id) {
         $this->db->where('id_benefit',$id);
         $this->db->update('mst_benefit',$data);
    }
    public function hapusBenefit($id){   
      $this->db->where('id_benefit',$id);
       $this->db->delete('mst_benefit');
    }
    public function select_url($url) {
      $sql = "SELECT link FROM mst_modul WHERE link='".$url."' ";
      $data = $this->db->query($sql);

      return $data;
    }
    function dt_mstModul($where='') {
        $this->db->select('*');
        $this->db->from('mst_modul');
        if ($where != '') {
          $this->db->where($where);
        }
        return  $this->db->get();
    }
    function add_mst_modul($data) {
         $this->db->insert('mst_modul',$data);
    }
    function data_mst_modul($id) {
        $this->db->select('*');
        $this->db->from('mst_modul');
        $this->db->where('id_modul',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_modul($data,$id) {
         $this->db->where('id_modul',$id);
         $this->db->update('mst_modul',$data);
    }
    public function hapusModul($id){   
      $this->db->where('id_modul',$id);
       $this->db->delete('mst_modul');
    }
    function dt_mstJenisUser() {
        $this->db->select('*');
        $this->db->from('mst_jenis_user');
        return  $this->db->get();
    }
     function add_mst_jenis_user($data) {
         $this->db->insert('mst_jenis_user',$data);
    }
     function data_mst_jenis_user($id) {
        $this->db->select('*');
        $this->db->from('mst_jenis_user');
        $this->db->where('id_jenis_user',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_jenis_user($data,$id) {
         $this->db->where('id_jenis_user',$id);
         $this->db->update('mst_jenis_user',$data);
    }
    public function hapusMstJenisUser($id){   
      $this->db->where('id_jenis_user',$id);
       $this->db->delete('mst_jenis_user');
    }
    function dt_mstJenisUserAkses() {
        $this->db->select('*');
        $this->db->from('mst_jenis_user_akses');
        return  $this->db->get();
    }
    function dt_mstReviewAspek() {
        $this->db->select('*');
        $this->db->from('mst_review_aspek');
        return  $this->db->get();
    }
     function add_mst_review_aspek($data) {
         $this->db->insert('mst_review_aspek',$data);
    }
     function data_mst_review_aspek($id) {
        $this->db->select('*');
        $this->db->from('mst_review_aspek');
        $this->db->where('id_review_aspek',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_review_aspek($data,$id) {
         $this->db->where('id_review_aspek',$id);
         $this->db->update('mst_review_aspek',$data);
    }
    public function hapusReviewAspek($id){   
      $this->db->where('id_review_aspek',$id);
       $this->db->delete('mst_review_aspek');
    }

    function dt_mstCompany() {
        $this->db->select('*');
        $this->db->from('mst_company');
        return  $this->db->get();
    }
     function add_mst_company($data) {
         $this->db->insert('mst_company',$data);
    }
     function data_mst_company($id) {
        $this->db->select('*');
        $this->db->from('mst_company');
        $this->db->where('id_company',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_company($data,$id) {
         $this->db->where('id_company',$id);
         $this->db->update('mst_company',$data);
    }
    public function hapusMstCompany($id){   
      $this->db->where('id_company',$id);
       $this->db->delete('mst_company');
    }
    function dt_mstStation() {
        $this->db->select('*');
        $this->db->from('mst_station');
        return  $this->db->get();
    }
     function add_mst_station($data) {
         $this->db->insert('mst_station',$data);
    }
     function data_mst_station($id) {
        $this->db->select('*');
        $this->db->from('mst_station');
        $this->db->where('id_station',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_station($data,$id) {
         $this->db->where('id_station',$id);
         $this->db->update('mst_station',$data);
    }
    public function hapusMstStation($id){   
      $this->db->where('id_station',$id);
       $this->db->delete('mst_station');
    }
     function dt_mstPolice() {
        $this->db->select('*');
        $this->db->from('mst_policetype');
        return  $this->db->get();
    }
     function add_mst_police($data) {
         $this->db->insert('mst_policetype',$data);
    }
     function data_mst_police($id) {
        $this->db->select('*');
        $this->db->from('mst_policetype');
        $this->db->where('id_policetype',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_police($data,$id) {
         $this->db->where('id_policetype',$id);
         $this->db->update('mst_policetype',$data);
    }
    public function hapusMstPolice($id){   
      $this->db->where('id_policetype',$id);
       $this->db->delete('mst_policetype');
    }
     function dt_mstSetting() {
        $this->db->select('*');
        $this->db->from('mst_setting');
        return  $this->db->get();
    }
     function add_mst_setting($data) {
         $this->db->insert('mst_setting',$data);
    }
     function data_mst_setting($id) {
        $this->db->select('*');
        $this->db->from('mst_setting');
        $this->db->where('id_setting',$id);
        return  $this->db->get()->row();
    }
    function ubah_mst_setting($data,$id) {
         $this->db->where('id_setting',$id);
         $this->db->update('mst_setting',$data);
    }
    public function hapusMstSetting($id){   
      $this->db->where('id_setting',$id);
       $this->db->delete('mst_setting');
    }







    function cek_login($table,$where){      
        return $this->db->get_where($table,$where);
    }   
      public function update($data, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('trx_user', $data);
    }
    public function get_by_cookie($cookie)
    {
        $this->db->where('cookie', $cookie);
        return $this->db->get('trx_user');
    }

	public function index()
	{
	   
	}
    public function getcData($select=array(),$table,$join="",$whs="",$wh=array()){
        $sql="select ".implode(",",array_filter($select))." from ".$table." ".$join." ".implode(" and ",$wh);
        $query = $this->db->query($sql);  // Produces: SELECT * FROM mytable
        return $query;
    }
    public function getData($table,$wh=array()){
        $query = $this->db->get_where($table,$wh);  // Produces: SELECT * FROM mytable
        return $query;
    }
    public function add_data($table,$data){
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
    public function add_data_b($table,$data){
        $this->db->insert_batch($table, $data);
        return $this->db->affected_rows();
    }
    public function upd_data($table,$data,$id){
        $this->db->update($table, $data,$id);
        return $this->db->affected_rows();
    }
    public function del_data($table,$id){
        $this->db->delete($table,$id);
        return $this->db->affected_rows();
    }
    public function sendEmail($data){
        $date=date("Y-m-d H:i:s");
        $user="info@nata.id";
        $subject="Pemberitahuan Email dari HR Nata Website ".$date;
        $mail = $this->phpmailer_library->load();
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "mail.nata.id"; //hostname masing-masing provider email
		$mail->SMTPDebug = 0;
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = $user; //user email
		$mail->Password = "nata234!!"; //password email
		$mail->SetFrom($user,"Info Nata"); //set email pengirim
		$mail->Subject = $subject; //subyek email
		$mail->AddAddress($data['email'],"Client HR Nata"); //tujuan email
		$mail->MsgHTML($data['pesan']);
        
        $mail->mailFrom=$user;
        $mail->mailSubject=$subject;
        $mail->mailDate=$date;
        
		return $mail;
    }
    public function crtPdf($data){
        tcpdf();
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //$obj_pdf->SetCreator(PDF_CREATOR);
        $title = $data['title'];
        $headerstring=$data['header_string'];
        $headerlogo=$data['header_logo'];
        $obj_pdf->SetTitle($title);
        //$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
        $obj_pdf->SetHeaderData($headerlogo, PDF_HEADER_LOGO_WIDTH, $title, $headerstring);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 9);
        $obj_pdf->setFontSubsetting(false);
        $obj_pdf->AddPage();
        //ob_start();
        //    // we can have any view part here like HTML, PHP etc
        //    $content = ob_get_contents();
        //ob_end_clean();
        $content=$data['content'];
        $obj_pdf->writeHTML($content, true, false, true, false, '');
        //$obj_pdf->Output('output.pdf', 'I');
        return $obj_pdf;
        //print_r($obj_pdf->getHeaderData());
        //echo PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING;

    }
    public function crtExcel($filename){
         header("Content-type: application/vnd-ms-excel"); 
         header("Content-Disposition: attachment; filename=".$filename);
         header("Pragma: no-cache");
         header("Expires: 0");
    }
    public function uploadFile($dt){
        $uploadData=array();
        $filesCount = count($_FILES[$dt['inpName']]['name']);
        // File upload configuration
        $err="";
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['file']['name']     = date("YmdHis").$_FILES[$dt['inpName']]['name'][$i];
            $_FILES['file']['type']     = $_FILES[$dt['inpName']]['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES[$dt['inpName']]['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES[$dt['inpName']]['error'][$i];
            $_FILES['file']['size']     = $_FILES[$dt['inpName']]['size'][$i];
            
            $config['upload_path'] = $dt['uploadPath'];
            $config['allowed_types'] = $dt['allowedType'];
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $fileData = $this->upload->data();
                $uploadData[$i]['file_name'] = $fileData['file_name'];
                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
            }
        }
        return $uploadData;
    }
}
