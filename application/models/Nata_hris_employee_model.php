<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nata_hris_employee_model extends CI_Model {

	
    public function __construct()
	{
	   $this->load->database();
       $lib=array("phpmailer_library");
       $this->load->library($lib);
       $this->load->helper('pdf_helper');
	}
    public function dataSts($id){
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        if ($id!="") {
            $this->db->where($id);
        }
       
        return $this->db->get();
    }
    public function data_pengumuman($limit=""){
        $this->db->select('*');
        $this->db->from('trx_pengumuman_perusahaan');
        $this->db->where('Month(tanggal_mulai)=Month(current_date())',null,false);
        $this->db->or_where('Month(tanggal_selesai)=Month(current_date())',null,false);
        if ($limit!="") {
        	$this->db->limit($limit);
        }
        $this->db->order_by('tanggal_mulai','DESC');
        return $this->db->get();
    }
    public function data_pengumumanhariini(){
        $this->db->select('*');
        $this->db->from('trx_pengumuman_perusahaan');
        $this->db->where('tanggal_mulai=date(now()) or tanggal_selesai=date(now())',null,false);
        $this->db->LIMIT(1);
        $this->db->order_by('tanggal_mulai','DESC');
        return $this->db->get();
    }
    public function del_data($table,$id){
        $this->db->delete($table,$id);
        return $this->db->affected_rows();
    }
    public function data_absensi($nik){
        $this->db->select("a.*,b.nama_lengkap,CONCAT(
                            MOD(HOUR(TIMEDIFF(NOW(), a.tanggal_mulai)), 24), ':',
                            MINUTE(TIMEDIFF(NOW(), a.tanggal_mulai)), ':',
                            SECOND(TIMEDIFF(NOW(), a.tanggal_mulai))
                            ) as jam,timediff(a.lunch,a.tanggal_mulai) as jamlunch,
            sec_to_time(time_to_sec(timediff(a.lunch,a.tanggal_mulai))+time_to_sec(timediff(now(),a.start_lunch))) as setelah_lunch,
            timediff(a.break,a.tanggal_mulai) as jambreak,
            sec_to_time(time_to_sec(timediff(a.break,a.tanggal_mulai))+time_to_sec(timediff(now(),a.start_break))) as setelah_break,
            timediff(a.extra_break,a.tanggal_mulai) as jamextra,
            sec_to_time(time_to_sec(timediff(a.extra_break,a.tanggal_mulai))+time_to_sec(timediff(now(),a.start_extra_break))) as setelah_extra_break");
        $this->db->from('trx_absensi a');
        $this->db->join('trx_karyawan b','b.nik=a.nik','left');
        
        $st="a.nik='$nik' AND DATE(a.tanggal_mulai)='".date('Y-m-d')."'";
        $this->db->where($st, NULL, FALSE); 
        $this->db->order_by('a.tanggal_mulai','DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    public function dataPelatihan(){
        // $this->db->select('a.*,b.deskripsi as deskripsi_departemen,c.tanggal_keputusan,c.status_lulus,c.tanggal_mengambil,c.alasan,c.status as status_ambil,c.nik,c.id_detail_training_jadwal');
        $this->db->select('a.*');
        $this->db->from('trx_training_jadwal a ');
        //$this->db->join('mst_departemen b ','a.id_departemen=b.id_departemen','left');
      //  $this->db->join('detail_training_jadwal c ','a.id_training_jadwal=c.id_training_jadwal','left');
       // $this->db->where('a.id_departemen',$id_departemen); 
        return $this->db->get();
    }

    public function ambildataPelatihanAJax($columns='',$requestData='',$monthyear=''){
        $sql = "SELECT * FROM trx_training_jadwal ";

        
        if ($columns != '') {
            $search = array();
            foreach ($columns as $kolom) {
                $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
            }
            // $sql.= " ORDER BY id_dr_laurier DESC ";
            $sql.= " WHERE (".implode(" OR ", $search).")";
            if ($monthyear!='') {
                $sql.="  AND tanggal_mulai like '".$monthyear."%'";
            }
            // $sql.=" WHERE employee_name LIKE '".$requestData['search']['value']."%' ";    
            // $requestData['search']['value'] 
            // $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."
            // //contains search parameter
            // $sql.=" OR employee_salary LIKE '".$requestData['search']['value']."%' ";
            // $sql.=" OR employee_age LIKE '".$requestData['search']['value']."%' ";
            
            $sql.=" ORDER BY tanggal_mulai DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        }
        
        // $this->db->order_by('a.tanggal_mulai','DESC');
        // return $this->db->get();

        $data = $this->db->query($sql);
        
        return $data;
    }
    public function ambildataPelatihan(){
        $this->db->select('*');
        $this->db->from('trx_training_jadwal');
       // $this->db->where('id_departemen',$id_departemen); 
        return $this->db->get();
    }
    public function dataJenjangPelatihan($id,$nik=''){
        $this->db->select('a.*,c.id_detail_training_jadwal,c.tanggal_keputusan,c.status_lulus,c.tanggal_mengambil,c.alasan,c.status as status_ambil,d.nama_lengkap,d.nik');
        $this->db->from('trx_training_jadwal a');
        $this->db->join('detail_training_jadwal c ','a.id_training_jadwal=c.id_training_jadwal','left');
        $this->db->join('trx_karyawan d','d.nik=c.nik','left');
        $this->db->where('a.id_training_jadwal',$id); 
        if ($nik != '') {
            $this->db->where('c.nik',$nik); 
        }
        return $this->db->get();
    }
     public function dataJenjangPelatihan2($id,$nik=''){
        $this->db->select('a.*,c.id_detail_training_jadwal,c.tanggal_keputusan,c.status_lulus,c.tanggal_mengambil,c.alasan,c.status as status_ambil');
        $this->db->from('trx_training_jadwal a');
        $this->db->join('detail_training_jadwal c ','a.id_training_jadwal=c.id_training_jadwal','left');
        $this->db->where('c.id_training_jadwal',$id); 
        if ($nik != '') {
            $this->db->where('c.nik',$nik); 
        }
        return $this->db->get();
    }
    public function tambah_pelatihan($data){
        $this->db->insert('detail_training_jadwal',$data);
    }
    public function data_user($wh=""){
        $this->db->select('*');
        $this->db->from('trx_user');
        if($wh!=""){
            $this->db->where($wh);
        } 
        return $this->db->get();
    }
    public function data_employee($nik){
        $this->db->select('k.*,kab.id_kabupaten,prov.id_provinsi');
        $this->db->from('trx_karyawan k');
        $this->db->join('master_jenis_project jp ','jp.id_master_jenis_project=k.id_jenis_projek','left');
        $this->db->join('mst_kecamatan kec ','kec.id_kecamatan=k.id_kecamatan','left');
        $this->db->join('mst_kabupaten kab ','kab.id_kabupaten=kec.id_kabupaten','left');
        $this->db->join('mst_provinsi prov ','prov.id_provinsi=kab.id_provinsi','left');
        $this->db->where('k.nik',$nik); 
        return $this->db->get();
    }

    public function data_nikah(){
        $this->db->select('*');
        $this->db->from('mst_sts_nikah');
        return $this->db->get();
    }

    public function data_kabupaten(){
        $this->db->select('id_kabupaten,deskripsi as kabupaten');
        $this->db->from('mst_kabupaten');
        return $this->db->get();
    }

    public function data_provinsi(){
        $this->db->select('id_provinsi,deskripsi as provinsi');
        $this->db->from('mst_provinsi');
        return $this->db->get();
    }

    public function data_kecamatan(){
        $this->db->select('*');
        $this->db->from('mst_kecamatan');
        return $this->db->get();
    }

    public function data_gaji($nik){
        $this->db->select('*');
        $this->db->from('trx_karyawan_gaji');
        $this->db->where('nik',$nik);
        return $this->db->get();
    }

    public function data_keluarga($nik_ktp){
        $this->db->select('*');
        $this->db->from('trx_karyawan_keluarga');
        $this->db->where('nik_ktp',$nik_ktp);
        return $this->db->get();
    }

    public function data_agama(){
        $this->db->select('*');
        $this->db->from('mst_agama');
        return $this->db->get();
    }

    public function data_pendidikan(){
        $this->db->select('*');
        $this->db->from('mst_pendidikan');
        return $this->db->get();
    }

    public function kpi($id){   
        $this->db->select('kpi.*,j.jenis_project as deskripsi');
        $this->db->from('trx_kpi kpi');
         $this->db->join('master_jenis_project j','kpi.id_master_jenis_project=j.id_master_jenis_project','left');
       // $this->db->join('mst_jabatan j','kpi.id_jabatan=j.id_jabatan','left');
        $this->db->where('kpi.id_master_jenis_project',$id); 
        return $this->db->get();
    }
    public function data_teguran($wh=''){
        $this->db->select('*');
        $this->db->from('trx_teguran');
        if ($wh != '') {
            $this->db->where($wh); 
        }
        return $this->db->get();
    }

    public function data_rekening_karyawan($nik){
        $this->db->select('kg.*,b.deskripsi as bank');
        $this->db->from('trx_karyawan_gaji kg');
        $this->db->join('trx_karyawan tk','tk.nik=kg.nik','left');
        $this->db->join('mst_bank b','kg.id_bank=b.id_bank','left');
        $this->db->where('kg.nik',$nik); 
        return $this->db->get();
    }

    public function data_informasi_tunjangan($nik){
        $this->db->select('a.*,b.nama_lengkap,c.jenis_tunjangan');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_jenis_tunjangan c','a.id_jenis_tunjangan=c.id_jenis_tunjangan','left');
        $this->db->where('a.nik',$nik);
        return $this->db->get();
    }

    public function data_tunjangan($nik){
        $this->db->select('a.*,c.nilai');
        $this->db->from('mst_jenis_tunjangan a');
        $this->db->join('(select id_jenis_tunjangan,sum(nilai)as nilai from trx_karyawan_gaji_lainnya where nik="'.$nik.'" group by id_jenis_tunjangan) c ','a.id_jenis_tunjangan=c.id_jenis_tunjangan','left');
        return $this->db->get();
    }

    public function data_tunjangan_muncul($nik){
        $this->db->select('a.*,b.jenis_tunjangan');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('mst_jenis_tunjangan b','a.id_jenis_tunjangan=b.id_jenis_tunjangan','left');
        $this->db->where('a.nik',$nik);
        return $this->db->get();
    }

    public function data_karyawan_projek($nik=""){
        $this->db->select('a.*,b.jenis_project,md.nama_departemen as desDepartemen');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('master_jenis_project b','b.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->join('mst_departemen c','c.id_departemen=ko.id_departemen','left');
         $this->db->join('master_departemen md','md.id_master_departemen=c.id_master','left');
        if ($nik != '') {
            $this->db->where($nik); 
        }
        return  $this->db->get();    
    }

    public function data_karyawan_kontrak($nik){
        $this->db->select('a.*,b.jenis_project,c.nama_perusahaan as klien,md.nama_departemen as departemen');
        $this->db->from('trx_karyawan tk');
        $this->db->join(' trx_kontrak a','a.nik=tk.nik','left');
        $this->db->join('master_jenis_project b','b.id_master_jenis_project=a.id_jenis_project','left');
        $this->db->join('master_perusahaan c','c.id_master_perusahaan=a.id_master_perusahaan','left');
        $this->db->join('mst_departemen d','d.id_departemen=a.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=d.id_master','left');
        $this->db->where('a.nik',$nik);
        $this->db->where('a.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik)',NULL,FALSE);
        return  $this->db->get();    
    }

    public function data_karyawan_klien($nik=""){
        $this->db->select('a.*,c.nama_perusahaan,c.kota,e.deskripsi as lokasi,f.deskripsi as kota');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('master_perusahaan c','ko.id_master_perusahaan=c.id_master_perusahaan','left');
        $this->db->join('mst_lokasi_kantor d','ko.id_lokasi_kantor=d.id_lokasi_kantor','left');
        $this->db->join('mst_provinsi e','d.id_provinsi=e.id_provinsi','left');
        $this->db->join('mst_kabupaten f','d.id_kabupaten=f.id_kabupaten','left');
        if ($nik != '') {
            $this->db->where($nik); 
        }
        return  $this->db->get();    
    }

    public function data_tanggungan_karyawan($nikktp){
        $sql = "SELECT kk.* FROM trx_karyawan_keluarga kk LEFT JOIN trx_karyawan tk ON kk.nik_ktp=tk.nik_ktp WHERE kk.nik_ktp='".$nikktp."'";
        $data =  $this->db->query($sql);
        return $data;
    }

    public function data_pendidikan_karyawan($nik){
        $sql = "SELECT tkp.* FROM trx_karyawan_pendidikan tkp LEFT JOIN trx_karyawan tk ON tkp.nik=tk.nik WHERE tkp.nik='".$nik."'";
        $data =  $this->db->query($sql);
        return $data;
    }

    public function data_pengalaman_karyawan($nik){
        $sql = "SELECT trk.* FROM trx_karyawan_riwayat_kerja trk LEFT JOIN trx_karyawan tk ON trk.nik=tk.nik WHERE trk.nik='".$nik."'";
        $data =  $this->db->query($sql);
        return $data;
    }

    public function data_review($nik=''){
        $sql = "SELECT tk.nama_lengkap,tk.tanggal_masuk,tk.tanggal_keluar,tk.nik,d.deskripsi AS departemen,j.deskripsi as jabatan FROM trx_karyawan tk LEFT JOIN mst_departemen d ON tk.id_departemen=d.id_departemen LEFT JOIN mst_jabatan j ON tk.id_jabatan=j.id_jabatan ";
        if ($nik != '') {
            $sql.= " WHERE tk.nik in(".$nik.")";
        }
        $data =  $this->db->query($sql);
        // echo $sql;
        return $data;
    }

    public function karyawan_bawahan($nik){
        $this->db->select('tk.*,tor.*');
        $this->db->from('trx_organisasi tor');
        $this->db->join('trx_karyawan tk','tk.id_jabatan=tor.id_jabatan','left');
        $this->db->where('tk.nik',$nik);
        return  $this->db->get()->row();   
    }

    public function bawahan($id_organisasi){
        $this->db->select('tk.nik,tk.nama_lengkap');
        $this->db->from('trx_karyawan tk');
        $this->db->join('trx_organisasi tor','tk.id_jabatan=tor.id_jabatan','left');
        $this->db->where('tor.parent_id_jabatan',$id_organisasi);
        return  $this->db->get();   
    }

    public function data_pengumuman_perusahaan($wh=''){
        $sql = "SELECT * FROM trx_pengumuman_perusahaan ";
        if ($wh!='') {
            $sql.= 'WHERE id_pengumuman_perusahaan="'.$wh.'"';
        }
        $data =  $this->db->query($sql);
        
        return $data;
    }

    public function data_berita($wh="",$limit=""){
        $this->db->select('*');
        $this->db->from('trx_berita');
        if($wh!=""){
            $this->db->where($wh);
        }if ($limit!="") {
            $this->db->limit($limit);
        }
        $this->db->order_by('tanggal','DESC');
        return $this->db->get();
    }
    
    public function data_bpjs($wh=""){
        $this->db->select('*');
        $this->db->from('trx_bpjs');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

    // public function data_bpjs_kes($where=""){
    //     $this->db->select('ko.*,kes.*');
    //     $this->db->from('trx_kontrak ko');
    //     $this->db->join('trx_dtl_klien_bpjs_kes kes','kes.id_klien=ko.id_master_perusahaan');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     return $this->db->get();
    // }

    // public function data_bpjs_tk($where=""){
    //     $this->db->select('ko.*,tk.*');
    //     $this->db->from('trx_kontrak ko');
    //     $this->db->join('trx_dtl_klien_bpjs_tk  tk','tk.id_klien=ko.id_master_perusahaan');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     return $this->db->get();
    // }

    // public function data_pph($where=""){
    //     $this->db->select('ko.*,pph.*');
    //     $this->db->from('trx_kontrak ko');
    //     $this->db->join('trx_dtl_klien_pph pph','pph.id_klien=ko.id_master_perusahaan');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     return $this->db->get();
    // }
    
    public function dataViewBerita($id){
        $this->db->select('*');
        $this->db->from('trx_berita ');
        $this->db->where('id_berita',$id);
            return  $this->db->get();  
    }
     public function dataViewBerita2($id){
        $this->db->select('*');
        $this->db->from('trx_berita ');
        $this->db->where('status="1" and id_berita !=',$id);
            return  $this->db->get();  
    }
    public function data_kuesioner($id="",$nik="",$wh=""){
        $this->db->select('tq.*,tqp.jum_pertanyaan,tqp.jum_jawaban');
        $this->db->from('trx_questioner tq');
        $this->db->join('(select id_questioner ,count(id_questioner) as jum_pertanyaan, count(tql.id_questioner_pertanyaan) as jum_jawaban from trx_questioner_pertanyaan tqp left join trx_questioner_log tql on tqp.id_questioner_pertanyaan=tql.id_questioner_pertanyaan AND tql.nik="'.$nik.'" group by id_questioner)  tqp','tq.id_questioner=tqp.id_questioner','left');
        //$this->db->join('mst_departemen d','tq.id_departemen=d.id_departemen','left');
        if($id!=""){
            $this->db->where('tq.id_questioner',$id);
        }
        if($wh!=""){
            $this->db->where($wh);
        }
        $this->db->order_by('tq.tanggal_mulai','DESC');
        $this->db->where('date(tq.tanggal_selesai)>date(now())',NULL,FALSE);
        // $this->db->where('tq.status','1');
        return  $this->db->get();  
    }

    public function data_kuesioner_table($id="",$wh="",$limit=""){
        $this->db->select('*');
        $this->db->from('trx_questioner');
        if($id!=""){
            $this->db->where('id_departemen',$id);
        }
        if($wh!=""){
            $this->db->where($wh);
        }
        if ($limit!="") {
            $this->db->limit($limit);
        }
        $this->db->where('date(tanggal_selesai)>date(now())',NULL,FALSE);
        $this->db->where('status','1');
        // $this->db->where('hasil_isi',0);
        $this->db->order_by('tanggal_mulai','DESC');
        $this->db->order_by('status','DESC');
        return  $this->db->get();
    }
    public function dataKuesioner($id){
        $this->db->select('a.*,b.deskripsi as deskripsi_departemen');
        $this->db->from('trx_questioner a');
        $this->db->join('mst_departemen b','a.id_departemen=b.id_departemen','left');
        $this->db->where('a.id_questioner',$id);
            return  $this->db->get();  
    }
    public function dataPertanyaanKuesioner($id){
        $this->db->select('*');
        $this->db->from('trx_questioner_pertanyaan ');
        $this->db->where('id_questioner',$id);
            return  $this->db->get();  
    }

    public function dataPertanyaanKuesionerLog($id){
        $this->db->select('tql.*,tqp.pertanyaan');
        $this->db->from('trx_questioner_log tql');
        $this->db->join('trx_questioner_pertanyaan tqp','tql.id_questioner_pertanyaan=tqp.id_questioner_pertanyaan','left');
        $this->db->join('trx_questioner tq','tqp.id_questioner=tq.id_questioner','left');
        $this->db->where('tq.id_questioner ',$id);
            return  $this->db->get();  
    }

    public function data_absensi_employee($nik,$sts='',$jam=''){
        $this->db->select('a.*,date(a.tanggal_mulai) as date,time(a.tanggal_mulai) as time_mulai,time(a.tanggal_selesai) as time_selesai,b.nama_lengkap');
        $this->db->from('trx_absensi a');
        $this->db->join('trx_karyawan b','b.nik=a.nik','left');
        $this->db->where('a.nik',$nik); 
        if ($sts!='') {
            $this->db->where('a.status',$sts); 
        }if ($jam != '') {
            $this->db->where($jam,NULL,FALSE); 
        }
        $this->db->order_by('a.tanggal_mulai','DESC');
        return $this->db->get();
    }

    public function data_absensi_employee_ajax($nik,$columns='',$requestData='',$sts='',$jam='',$monthyear=''){
        $sql = "SELECT a.*,date(a.tanggal_mulai) as date,time(a.tanggal_mulai) as time_mulai,time(a.tanggal_selesai) as time_selesai,b.nama_lengkap FROM trx_absensi a LEFT JOIN trx_karyawan b ON b.nik=a.nik WHERE a.nik='".$nik."' ";

        if ($sts!='') {
            $sql.= "AND a.status='".$sts."'";         
        }if ($jam != '') {
            $sql.= "AND a.jam='".$jam."'";
        }if ($monthyear!='') {
            $sql.="AND a.tanggal_mulai like '".$monthyear."%'";
        }
        if ($columns != '') {
            $search = array();
            foreach ($columns as $kolom) {
                $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
            }
            // $sql.= " ORDER BY id_dr_laurier DESC ";
            $sql.= " AND (".implode(" OR ", $search).")";
            
            // $sql.=" WHERE employee_name LIKE '".$requestData['search']['value']."%' ";    
            // $requestData['search']['value'] 
            // $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."
            // //contains search parameter
            // $sql.=" OR employee_salary LIKE '".$requestData['search']['value']."%' ";
            // $sql.=" OR employee_age LIKE '".$requestData['search']['value']."%' ";
            
            $sql.=" ORDER BY tanggal_mulai DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        }
        
        // $this->db->order_by('a.tanggal_mulai','DESC');
        // return $this->db->get();

        $data = $this->db->query($sql);
        
        return $data;
    }

    public function dataLeaverequest($id){
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desLeave,datediff(a.sampe_tanggal,a.tanggal)as "lama_cuti"');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_leave_kategori c','c.id_leave_kategori=a.id_leave_kategori','left');
        $this->db->where('a.id_absensi_leave',$id);
        return $this->db->get();
    }
    public function data_leave_requestAjax($nik,$columns='',$requestData='',$sts='',$monthyear=''){
        $sql = "SELECT a.*,b.nama_lengkap,c.deskripsi as desLeave,datediff(a.sampe_tanggal,a.tanggal) as lama_cuti FROM trx_absensi_leave a LEFT JOIN trx_karyawan b ON b.nik=a.nik LEFT JOIN mst_leave_kategori c ON c.id_leave_kategori=a.id_leave_kategori WHERE a.nik='".$nik."' ";

        if ($sts!='') {
            $sql.= "AND a.status='".$sts."'";
        }if ($monthyear!='') {
            $sql.="AND a.tanggal like '".$monthyear."%'";
        }
        if ($columns != '') {
            $search = array();
            foreach ($columns as $kolom) {
                $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
            }
            // $sql.= " ORDER BY id_dr_laurier DESC ";
            $sql.= " AND (".implode(" OR ", $search).")";
            
            // $sql.=" WHERE employee_name LIKE '".$requestData['search']['value']."%' ";    
            // $requestData['search']['value'] 
            // $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."
            // //contains search parameter
            // $sql.=" OR employee_salary LIKE '".$requestData['search']['value']."%' ";
            // $sql.=" OR employee_age LIKE '".$requestData['search']['value']."%' ";
            
            $sql.=" ORDER BY tanggal DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        }
        
        // $this->db->order_by('a.tanggal_mulai','DESC');
        // return $this->db->get();

        $data = $this->db->query($sql);
        
        return $data;
    }
    public function data_leave_request($nik='',$sts='',$stscuti=''){
        $this->db->select('a.*,b.nama_lengkap,b.saldo_cuti,c.deskripsi as desLeave,datediff(a.sampe_tanggal,a.tanggal)as lama_cuti,c.status as statuscuti');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_leave_kategori c','c.id_leave_kategori=a.id_leave_kategori','left');
        if ($nik!='') {
            $this->db->where('b.nik',$nik);
        }
        if ($sts!='') {
            $this->db->where('a.status',$sts);
        }
        if ($stscuti!='') {
            $this->db->where('c.status',$stscuti);
        }
        return $this->db->get();
    }
    public function data_leave_request2($nik=''){
        $this->db->select('a.*,b.nama_lengkap,b.saldo_cuti,c.deskripsi as desLeave,datediff(a.sampe_tanggal,a.tanggal)as lama_cuti');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_leave_kategori c','c.id_leave_kategori=a.id_leave_kategori','left');
        if ($nik!='') {
            $this->db->where($nik);
        }
        return $this->db->get();
    }
    public function data_permohonancuti($where=''){
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desLeave,datediff(a.sampe_tanggal,a.tanggal)as lama_cuti');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_leave_kategori c','c.id_leave_kategori=a.id_leave_kategori','left');
        if ($where!='') {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    public function data_leave($wh=''){
        $this->db->select('a.*');
        $this->db->from('trx_absensi_leave a');
        if ($wh!='') {
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function data_cuti_leave($nik){
        $this->db->select('tkc.*');
        $this->db->from('trx_karyawan_cuti tkc');
        $this->db->join('trx_karyawan tk','tkc.nik=tk.nik','left');
        $this->db->where('tkc.nik',$nik);
        $this->db->where('tkc.status','1');
        return $this->db->get();
    }
    public function data_cuti($wh=''){
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        if ($wh !='') {
            $this->db->where($wh);
        }
        return  $this->db->get(); 
    }
    public function data_cutipribadi($wh=''){
        $this->db->select('a.*');
        $this->db->from('trx_detail_cutipribadi_karyawan a');
        if ($wh !='') {
            $this->db->where($wh);
        }
        return  $this->db->get(); 
    }
    public function data_sumcutipribadi($wh=''){
        $this->db->select('sum(a.jumlah_hari)as total');
        $this->db->from('trx_detail_cutipribadi_karyawan a');
        if ($wh !='') {
            $this->db->where($wh);
        }
        return  $this->db->get(); 
    }
    public function data_cuti_row($id_leave_kategori){
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        $this->db->where('id_leave_kategori',$id_leave_kategori);
        return  $this->db->get();    
    }
    public function tambah_ajuakan_cuti($data){
        $this->db->insert('trx_absensi_leave',$data);
        return $this->db->affected_rows();
    }
    public function update_cutipribadi($data,$dt){
        $this->db->where($data);
        $this->db->update('trx_detail_cutipribadi_karyawan',$dt);
        return $this->db->affected_rows();
    }
    public function tambah_overtime($data){
        $this->db->insert('trx_overtime',$data);
        return $this->db->affected_rows();
    }
    public function insert_absensi($data){
        $this->db->insert('trx_absensi',$data);
    }
    public function insert_review($data){
        $this->db->insert('trx_review',$data);
        return $this->db->insert_id();
    }
    public function insert_questioner($data){
        $this->db->insert('trx_questioner_log',$data);
        return $this->db->insert_id();

    }
    public function insert_review360($data){
        $this->db->insert('trx_review_score',$data);
        return $this->db->affected_rows();
    }
    public function hapusReviewScore($nik,$periode){   
        $this->db->where('nik',$nik);
        $this->db->where('periode',$periode);
        $this->db->delete('trx_review_score');
    }
    public function hapusReview($nik,$periode){   
        $this->db->where('nik',$nik);
        $this->db->where('periode',$periode);
        $this->db->delete('trx_review');
    }
    public function update_absensi($data,$dt){
        $this->db->where($data);
        $this->db->update('trx_absensi',$dt);
    }
    public function update_questioner($id,$status){
        $this->db->where($id);
        $this->db->update('trx_questioner',$status);
        return $this->db->affected_rows();
    }
    public function update_pelatihan($id,$status){
        $this->db->where($id);
        $this->db->update('detail_training_jadwal',$status);
    }
	public function ubah_profil($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('trx_karyawan', $data);
    }
    public function ubahfotoprofil($data,$where){   
      $this->db->where('nik',$where);
      $this->db->update('trx_karyawan',$data);
    }
    public function ubah_profil_rek($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('trx_karyawan_gaji', $data);
        return $this->db->affected_rows();
    }
    public function insert_profil_rek($data){
        $this->db->insert('trx_karyawan_gaji',$data);
        return $this->db->affected_rows();
    }
    public function ubah_profil_pend($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('trx_karyawan_pendidikan', $data);
    }
    public function insert_profil_pend($data)
    {
        $this->db->insert('trx_karyawan_pendidikan',$data);
    }
    public function ubah_profil_pengalaman($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('trx_karyawan_riwayat_kerja', $data);
    }
    public function insert_profil_pengalaman($data)
    {
        $this->db->insert('trx_karyawan_riwayat_kerja',$data);
    }
    public function insert_profil_keluarga($data)
    {
        $this->db->insert('trx_karyawan_keluarga',$data);

    }
    public function ubah_profil_keluarga($data, $where)
    {
        $this->db->where($where);
        $this->db->update('trx_karyawan_keluarga', $data);
    }
    public function ubah_password($data, $where)
    {
        $this->db->where($where);
        $this->db->update('trx_user', $data);
    }
     public function data_policies(){
        $this->db->select('a.*,b.deskripsi as desPolicetype,e.deskripsi as desDepartemen');
        $this->db->from('trx_kebijakan a');
        $this->db->join('mst_policetype b','b.id_policetype=a.id_policetype','left');
       // $this->db->join('mst_company c','a.id_company=c.id_company','left');
        // $this->db->join('mst_station d','a.id_station=d.id_station','left');
        $this->db->join('mst_departemen e','a.id_departemen=e.id_departemen','left');
        return  $this->db->get();    
    }
    // public function data_policies(){
    //     $this->db->select('a.*,b.deskripsi as desPolicetype,c.deskripsi as desCompany,d.deskripsi as desStation,e.deskripsi as desDepartemen');
    //     $this->db->from('trx_kebijakan a');
    //     $this->db->join('mst_policetype b','b.id_policetype=a.id_policetype','left');
    //    // $this->db->join('mst_company c','a.id_company=c.id_company','left');
    //     $this->db->join('mst_station d','a.id_station=d.id_station','left');
    //     $this->db->join('mst_departemen e','a.id_departemen=e.id_departemen','left');
    //     return  $this->db->get();    
    // }
    public function data_view_policies($id_kebijakan){
        $this->db->select('a.*,b.deskripsi as desPolicetype,e.deskripsi as desDepartemen,tk.nama_lengkap as nama_pembuat');
        $this->db->from('trx_kebijakan a');
        $this->db->join('mst_policetype b','b.id_policetype=a.id_policetype','left');
        $this->db->join('trx_karyawan tk','tk.nik=a.nik','left');
       // $this->db->join('mst_company c','a.id_company=c.id_company','left');
        //$this->db->join('mst_station d','a.id_station=d.id_station','left');
        $this->db->join('mst_departemen e','a.id_departemen=e.id_departemen','left');
        $this->db->where('a.id_kebijakan',$id_kebijakan);
        return  $this->db->get()->row();    
    }
    public function data_penkerja($nik="",$tgl=''){
        $this->db->select('a.*');
        $this->db->from('trx_review_score a');
        $this->db->join('trx_karyawan tk','tk.nik=a.nik','left');
        $this->db->join('mst_jabatan j','j.id_jabatan=tk.id_jabatan','left');
        if($nik!=""){
            $this->db->where_in('a.nik',$nik);
        }if ($tgl!='') {
            $this->db->where("a.periode",$tgl);
        }
        return  $this->db->get();    
    }
    public function data_karyawan($wh=""){
        $this->db->select('a.*,b.jenis_project');
        $this->db->from('trx_karyawan a');
        $this->db->join('master_jenis_project b','a.id_jenis_projek=b.id_master_jenis_project','left');
        if($wh!=""){
            $this->db->where_in($wh);
        }
        return  $this->db->get();    
    }

    public function dataKaryawan($wh=""){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function ambildataKaryawan(){
        $this->db->select('k.*,ko.id_master_perusahaan');
        $this->db->from('trx_karyawan k');
        $this->db->join('trx_kontrak ko','k.nik=ko.nik');
        $this->db->where('ko.id_master_perusahaan  > 0');
        return $this->db->get();
    }

    public function data_view_penhasilkerja($id_kebijakan){
        $this->db->select('a.*,ra.judul');
        $this->db->from('trx_review a');
        $this->db->join('mst_review_aspek ra','ra.id_review_aspek=a.id_review_aspek','left');
        $this->db->where('a.id_review',$id_kebijakan);
        return  $this->db->get()->row();    
    }
    public function data_view_penkerja($id_kebijakan,$nik=""){
        $this->db->select('a.*,jp.jenis_project,tk.nama_lengkap,j.deskripsi,d.deskripsi as departemen,tk.tanggal_masuk as tanggal_bergabung');
        $this->db->from('trx_review_score a');
        $this->db->join('trx_karyawan tk','tk.nik=a.nik','left');
        $this->db->join('mst_departemen d','tk.id_departemen=d.id_departemen','left');
        $this->db->join('mst_jabatan j','j.id_jabatan=tk.id_jabatan','left');
        $this->db->join('master_jenis_project jp','tk.id_jenis_projek=jp.id_master_jenis_project','left');
        $this->db->where('a.id_review_score',$id_kebijakan);
        if ($nik!='') {
            $this->db->where("tk.nik",$nik);
        }
        return  $this->db->get();    
    }
    public function data_aspek_penilaian(){
        $sql = "SELECT * FROM mst_review_aspek";
        $data = $this->db->query($sql);
        return $data;
    }
    public function data_payslip($nik=""){
        $this->db->select('a.*,tk.nama_lengkap,p.jenis_project as jabatan,pr.nama_perusahaan,ms.nama_departemen,b.deskripsi as bank,g.nomor_rek,np.kode_npwp,ko.lemburan');
        $this->db->from('trx_create_history a');
        $this->db->join('trx_karyawan tk','tk.nik=a.nik','left');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('master_jenis_project p','p.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->join('master_perusahaan pr','ko.id_master_perusahaan=pr.id_master_perusahaan','left');
        $this->db->join('mst_departemen md','ko.id_departemen=md.id_departemen','left');
        $this->db->join('master_departemen ms','ms.id_master_departemen=md.id_master','left');
        $this->db->join('trx_karyawan_gaji g','g.nik=a.nik','left');
        $this->db->join('mst_bank b','a.id_bank=b.id_bank','left');
        $this->db->join('trx_npwp np','tk.nik_ktp=np.nik_ktp','left');
        // $this->db->select('a.*,tk.nama_lengkap,p.jenis_project as jabatan,g.nomor_rek,g.atas_nama_rek,b.deskripsi');
        // $this->db->from('trx_create_history a');
        // $this->db->join('trx_karyawan tk','tk.nik=a.nik','left');
        // $this->db->join('master_jenis_project p','p.id_master_jenis_project=a.id_jenis_project','left');
        // $this->db->join('trx_karyawan_gaji g','g.nik=a.nik','left');
        // $this->db->join('mst_bank b','g.id_bank=b.id_bank','left');
        $this->db->where('a.bulan >= (month(now())-3)');
        if ($nik !='') {
            $this->db->where($nik);    
        }
        

        return  $this->db->get();    
    }
    public function dataPayrolApproveHistory($wh=""){
         $this->db->select('pa.*,d.deskripsi as departemen,p.nama_perusahaan as perusahaan,b.deskripsi as bank,jp.jenis_project as jabatan');
        $this->db->from('trx_payroll_approve pa');
        $this->db->join('trx_kontrak k','pa.nik=k.nik','left');
        $this->db->join('mst_departemen d','k.id_departemen=d.id_departemen','left');
        $this->db->join('master_perusahaan p','k.id_master_perusahaan=p.id_master_perusahaan','left');
        $this->db->join('trx_karyawan_gaji kg','pa.nik=kg.nik','left');
        $this->db->join('mst_bank b','pa.id_bank=b.id_bank','left');
        $this->db->join('master_jenis_project jp','k.id_jenis_project=jp.id_master_jenis_project','left');
        if ($wh!="") {
            $this->db->like($wh);
        }
        return $this->db->get();
    }
    public function data_atasan($nik=""){
        $this->db->select('a.*,b.nama_panggilan');
        $this->db->from('trx_kontrak a');
        $this->db->join('trx_karyawan b','a.nama_atasan=b.nik','left');
        if ($nik != "") {
            $this->db->where($nik);
        }
        return $this->db->get();
    }
    public function dataInformasiGajiTunjangan($nik){
        $this->db->select('a.*,b.jenis_tunjangan');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('mst_jenis_tunjangan b','a.id_jenis_tunjangan=b.id_jenis_tunjangan','left');
        $this->db->where('a.nik',$nik);
        return $this->db->get();
    }
    public function dataInformasiGaji($wh=""){
        $this->db->select('a.*,b.deskripsi as nama_bank,md.nama_departemen as desDepartemen,jp.jenis_project,ko.gaji,ko.bpjs_kes,ko.bpjs_tk,ko.pph,ko.lemburan,c.nomor_rek,c.atas_nama_rek');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_karyawan_gaji c','a.nik=c.nik','left');
        $this->db->join('mst_bank b','c.id_bank=b.id_bank','left');
        $this->db->join('trx_kontrak ko','a.nik=ko.nik','left');
        $this->db->join('mst_departemen e','ko.id_departemen=e.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=e.id_master','left');
        $this->db->join('master_jenis_project jp','ko.id_jenis_project=jp.id_master_jenis_project','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPegawaiDtlPayrollApprove($wh=""){
        $this->db->select('a.*,ko.status_karyawan as stskar,ko.tanggal_masuk as tglmasuk,ko.tanggal_keluar as tglkeluar,b.id_master_perusahaan,b.nama_perusahaan,b.id_lokasi_kantor,d.deskripsi as desKabupaten,md.nama_departemen as desDepartemen,e.id_departemen,f.jenis_project,g.kode_npwp,g.tempat_pembuatan,h.deskripsi as desAgama,i.deskripsi as desStsNikah,j.deskripsi as desPendidikan,k.nama_sekolah,k.jurusan,k.tahun_masuk,k.tahun_lulus,l.nama_perusahaan as nama_instansi,l.nama_jabatan,l.tahun_mulai,l.tahun_selesai,m.deskripsi as nama_kecamatan,n.id_kabupaten,n.deskripsi as nama_kabupaten,o.id_provinsi,o.deskripsi as nama_provinsi,p.no_projek_order,q.id_karyawan_gaji,q.standar_gaji,q.nomor_rek,q.atas_nama_rek,r.id_bank,r.deskripsi as nama_bank,tpa.keterangan,tpa.biaya,tpa.disetorkan,tpa.bulan,tpa.tahun,tb.nilai,tb.tipe_bpjs,ko.lemburan,ko.pph,ko.bpjs_tk,ko.bpjs_kes');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('master_perusahaan b','b.id_master_perusahaan=ko.id_master_perusahaan','left');
        $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=ko.id_lokasi_kantor','left');
        $this->db->join('mst_kabupaten d','d.id_kabupaten=c.id_kabupaten','left');
        $this->db->join('mst_departemen e','e.id_departemen=ko.id_departemen','left');
          $this->db->join('master_departemen md','md.id_master_departemen=e.id_master','left');
        $this->db->join('master_jenis_project f','ko.id_jenis_project=f.id_master_jenis_project','left');
        $this->db->join('trx_npwp g','a.nik_ktp=g.nik_ktp','left');
        $this->db->join('mst_agama h','a.id_agama=h.id_agama','left');
        $this->db->join('mst_sts_nikah i','a.id_sts_nikah=i.id_sts_nikah','left');
        $this->db->join('mst_pendidikan j','a.id_pendidikan=j.id_pendidikan','left');
        $this->db->join('trx_karyawan_pendidikan k','ko.nik=k.nik','left');
        $this->db->join('trx_karyawan_riwayat_kerja l','ko.nik=l.nik','left');
        $this->db->join('mst_kecamatan m','a.id_kecamatan=m.id_kecamatan','left');
        $this->db->join('mst_kabupaten n','n.id_kabupaten=m.id_kabupaten','left');
        $this->db->join('mst_provinsi o','o.id_provinsi=n.id_provinsi','left');
        $this->db->join('master_projek_order p','ko.id_projek_order=p.id_projek_order','left');
        $this->db->join('trx_karyawan_gaji q','ko.nik=q.nik','left');
        $this->db->join('mst_bank r','q.id_bank=r.id_bank','left');
        $this->db->join('trx_payroll_approve tpa','ko.nik=tpa.nik','left');
        $this->db->join('trx_bpjs tb','a.nik_ktp=tb.nik_ktp','left');
         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

    public function data_view_payslip($nik=""){
        $this->db->select('a.*,tk.nama_lengkap,c.deskripsi,d.jenis_project,e.nomor_rek');
        $this->db->from('trx_payroll a');
        $this->db->join('trx_kontrak b','a.nik=b.nik','left');
        $this->db->join('trx_karyawan tk','tk.nik=b.nik','left');
        $this->db->join('mst_departemen c','c.id_departemen=b.id_departemen','left');
        $this->db->join('master_jenis_project d','d.id_master_jenis_project=b.id_jenis_project','left');
        $this->db->join('trx_karyawan_gaji e','a.nik=e.nik','left');
        if ($nik !='') {
            $this->db->where($nik);    
        }
        
        return  $this->db->get()->row();    
    }
     public function data_payslip_potongan($nik=""){
        $this->db->select('a.*');
        $this->db->from('trx_payrol_potongan a');
        if ($nik !='') {
            $this->db->where($nik);    
        }
        
        return  $this->db->get();    
    }
    public function data_view_npwp($nik_ktp){
        $this->db->select('a.kode_npwp');
        $this->db->from('trx_npwp a');
        $this->db->where('a.nik_ktp',$nik_ktp);
        return  $this->db->get();
    }
    public function data_perusahaan($nik){
        $this->db->select('a.*,b.logo');
        $this->db->from('trx_kontrak a');
        $this->db->join('master_perusahaan b','a.id_master_perusahaan=b.id_master_perusahaan','left');
        $this->db->where('a.nik',$nik);
        return  $this->db->get();
    }
    public function data_rembursement($nik){
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desBenefit,"remburse" as jenis_claim,a.id_claim_remburse as id_claim');
        $this->db->from('trx_claim_remburse a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        $this->db->where('a.nik',$nik);
        
        return  $this->db->get()->row();    
    }
    public function data_asuransi($nik){
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desBenefit ,"asuransi" as jenis_claim,a.id_claim_asuransi as id_claim');
        $this->db->from('trx_claim_asuransi a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        $this->db->where('a.nik',$nik);
        
        return  $this->db->get()->row();    
    }
    public function data_claim_remburseAjax($nik,$columns='',$requestData='',$monthyear=''){
        // $sql = "SELECT a.*,b.nama_lengkap,c.deskripsi as desBenefit,\"remburse\" as jenis_claim,a.id_claim_remburse as id_claim FROM trx_claim_remburse a LEFT JOIN trx_karyawan b ON a.nik=b.nik LEFT JOIN mst_benefit c ON c.id_benefit=a.id_benefit WHERE a.nik= '".$nik."' ";
        $sql = "SELECT a.*,b.nama_lengkap,a.id_claim_remburse as id_claim FROM trx_claim_remburse a LEFT JOIN trx_karyawan b ON a.nik=b.nik WHERE a.nik= '".$nik."'";

        if ($monthyear!='') {
            $sql.="AND a.tanggal like '".$monthyear."%'";
        }
        if ($columns != '') {
            $search = array();
            foreach ($columns as $kolom) {
                $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
            }
            // $sql.= " ORDER BY id_dr_laurier DESC ";
            $sql.= " AND (".implode(" OR ", $search).")";
            
            // $sql.=" WHERE employee_name LIKE '".$requestData['search']['value']."%' ";    
            // $requestData['search']['value'] 
            // $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."
            // //contains search parameter
            // $sql.=" OR employee_salary LIKE '".$requestData['search']['value']."%' ";
            // $sql.=" OR employee_age LIKE '".$requestData['search']['value']."%' ";
            
            $sql.=" ORDER BY tanggal DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        }
        
        // $this->db->order_by('a.tanggal_mulai','DESC');
        // return $this->db->get();

        $data = $this->db->query($sql);
        
        return $data;
    }
    public function total_remburse($nik){
        $this->db->select('SUM(total)as total_remburse');
        $this->db->from('trx_claim_remburse');
        $this->db->where('nik',$nik);
        $this->db->group_by('nik');
        return  $this->db->get();    
    }
    public function data_claim_remburse($nik=""){
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desBenefit,"remburse" as jenis_claim,a.id_claim_remburse as id_claim');
        $this->db->from('trx_claim_remburse a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        if ($nik != "") {
            $this->db->where($nik);
        }
        // $this->db->where('a.nik',$nik);
        // $query1=$this->db->get_compiled_select();

        // $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desBenefit ,"asuransi" as jenis_claim,a.id_claim_asuransi as id_claim');
        // $this->db->from('trx_claim_asuransi a');
        // $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        // $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        // $this->db->where('a.nik',$nik);
        // $query2=$this->db->get_compiled_select();

        // $query=$this->db->query($query1." UNION ".$query2);

        return  $this->db->get()->result();    
    }

    public function dataKlaimReimbursementFile($wh=""){
        $this->db->select('a.*');
        $this->db->from('trx_claim_detail_file a');
        if($wh!=""){
            $this->db->where($wh);
        }
        
        return $this->db->get();
    }
    
    public function dataKaryawanAbsensiKontrak($wh=""){
        $this->db->select('a.*,b.jenis_project,d.nama_perusahaan');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('master_jenis_project b','ko.id_jenis_project=b.id_master_jenis_project','left');
        $this->db->join('master_p_o_marketing c','ko.id_projek_order=c.id_projek_order','left');
        $this->db->join('master_perusahaan d','ko.id_master_perusahaan=d.id_master_perusahaan','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function data_overtime_lembur($where=""){
        $this->db->select('a.*,b.nama_lengkap');
        $this->db->from('trx_overtime a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        if ($where != "") {
            $this->db->where($where);
        }
        return  $this->db->get();    
    }

    public function dataLemburOvertime($wh=""){
        $this->db->select('*');
        $this->db->from('trx_overtime');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

    public function data_permohonan_overtime($where=""){
        $this->db->select('a.*,b.nama_lengkap');
        $this->db->from('trx_overtime a');
        $this->db->join('trx_karyawan b','a.nik_atasan=b.nik','left');
        if ($where != "") {
            $this->db->where($where);
        }
        return  $this->db->get();    
    }

    public function datadtlcutipribadi($wh=""){
        $this->db->select('a.*,b.deskripsi');
        $this->db->from('trx_detail_cutipribadi_karyawan a');
        $this->db->join('mst_leave_kategori b','a.id_leave_kategori=b.id_leave_kategori','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

    public function ubahstsovertime($id,$sts,$alasan){
      $this->db->where('id_overtime',$id);
      $this->db->update('trx_overtime',array('status'=>$sts,'alasan'=>$alasan));
      return $this->db->affected_rows();
    }
    public function ubahstscuti($id,$sts,$alasan){
      $this->db->where('id_absensi_leave',$id);
      $this->db->update('trx_absensi_leave',array('status'=>$sts,'alasan'=>$alasan));
      return $this->db->affected_rows();
    }
    public function upd_data($table,$data,$id){
        $this->db->update($table, $data,$id);
        return $this->db->affected_rows();
    }
    public function data_claim_remburse_row($nik=""){
        $this->db->select('a.*,b.nama_lengkap,e.logo,c.deskripsi as desBenefit,"remburse" as jenis_claim,a.id_claim_remburse as id_claim');
        $this->db->from('trx_claim_remburse a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        $this->db->join('trx_kontrak d','b.nik=d.nik','left');
        $this->db->join('master_perusahaan e','d.id_master_perusahaan=e.id_master_perusahaan','left');
        if ($nik != "") {
            $this->db->where($nik);
        }
        // $this->db->where('a.nik',$nik);
        // $query1=$this->db->get_compiled_select();

        // $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desBenefit ,"asuransi" as jenis_claim,a.id_claim_asuransi as id_claim');
        // $this->db->from('trx_claim_asuransi a');
        // $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        // $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        // $this->db->where('a.nik',$nik);
        // $query2=$this->db->get_compiled_select();

        // $query=$this->db->query($query1." UNION ".$query2);

        return  $this->db->get()->row();
    }
    public function data_total_claim($nik){
        
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desBenefit ,"asuransi" as jenis_claim,a.id_claim_asuransi as id_claim');
        $this->db->from('trx_claim_asuransi a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        $this->db->where('a.nik',$nik);
        $query2=$this->db->get_compiled_select();

        $query=$this->db->query("select nama_lengkap,max(tanggal) as tanggal_setuju, sum(total)as total_terpakai  from (".$query2.") hasil group by nama_lengkap");

        return  $query->row();    
    }
    
    public function data_view_claim_remburse($id_claim){
        $this->db->select('a.*,c.nama_lengkap,b.file_bukti_transaksi,b.id_claim_detail_file,b.created_by_date');
        $this->db->from('trx_claim_remburse a');
        $this->db->join('trx_claim_detail_file b','a.id_claim_remburse=b.id_claim_remburse','left');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('trx_karyawan c','ko.nik=c.nik','left');
        $this->db->where('a.id_claim_remburse',$id_claim);
        return  $this->db->get();
    }

    public function data_view_claim_asuransi($id_claim){
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desBenefit');
        $this->db->from('trx_claim_asuransi a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_benefit c','c.id_benefit=a.id_benefit','left');
        $this->db->where('a.id_claim_asuransi',$id_claim);
        return  $this->db->get()->row();    
    }
    public function data_benefit(){
        $this->db->select('*');
        $this->db->from('mst_benefit');
        return  $this->db->get();    
    }
    public function data_bank(){
        $this->db->select('*');
        $this->db->from('mst_bank');
        return  $this->db->get();    
    }
    public function data_setting_claim($variable){
        $this->db->select('*');
        $this->db->from('mst_setting');
        $this->db->where('variable',$variable);
        return  $this->db->get()->row();
    }
    public function data_setting($wh=""){
        $this->db->select('*');
        $this->db->from('mst_setting');
        if($wh!=""){
            $this->db->where($wh);
        }
        return  $this->db->get();
    }
    public function data_task($wh=""){
        $this->db->select('d.*,k.nama_lengkap');
        $this->db->from('trx_detail_task d');
        $this->db->join('trx_karyawan k','k.nik=d.nik','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return  $this->db->get();
    }
    public function data_dtl_cuti($wh=""){
        $this->db->select('d.*,lk.deskripsi');
        $this->db->from('trx_detail_cutipribadi_karyawan d');
        $this->db->join('mst_leave_kategori lk','d.id_leave_kategori=lk.id_leave_kategori','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return  $this->db->get();
    }
    
    public function data_benefit_row($id_benefit){
        $this->db->select('*');
        $this->db->from('mst_benefit');
        $this->db->where('id_benefit',$id_benefit);
        return  $this->db->get();    
    }
    function tambah_claim_remburse($data) {
        $this->db->insert('trx_claim_remburse',$data);
        return $this->db->insert_id();
    }
    function tambah_claim_remburse_detail($data = array()){
        $insert = $this->db->insert_batch('trx_claim_detail_file',$data);
        return $insert?true:false;
    }
    function tambah_claim_asuransi($data) {
         $this->db->insert('trx_claim_asuransi',$data);
    }
    public function hapusClaimRemburse($id_claim){   
      $this->db->where('id_claim_remburse',$id_claim);
       $this->db->delete('trx_claim_remburse');
       return $this->db->affected_rows();
    }
     public function hapusClaimRembursefile($id_claim){   
      $this->db->where('id_claim_remburse',$id_claim);
       $this->db->delete('trx_claim_detail_file');
       return $this->db->affected_rows();
    }
    public function hapusTanggungan($id_tanggungan){   
        $this->db->where('id_keluarga_pasangan',$id_tanggungan);
        $this->db->delete('trx_karyawan_keluarga');
    }
    public function hapusClaimAsuransi($id_claim){   
      $this->db->where('id_claim_asuransi',$id_claim);
       $this->db->delete('trx_claim_asuransi');
    }
    // public function data_overtime($nik){
    //     $this->db->select('a.*,b.nama_lengkap,c.lembur');
    //     $this->db->from('trx_karyawan_lembur a');
    //     $this->db->join('trx_karyawan b','b.nik=a.nik','left');
    //     $this->db->join('trx_payroll c','c.nik=a.nik and c.tanggal=a.tanggal','left');
    //     $this->db->where('a.nik',$nik);
    //     return  $this->db->get();    
    // }
    // function tambah_overtime($data) {
    //      $this->db->insert('trx_karyawan_lembur',$data);
    // }
    // public function hapusOvertime($id_karyawan_lembur){   
    //   $this->db->where('id_karyawan_lembur',$id_karyawan_lembur);
    //    $this->db->delete('trx_karyawan_lembur');
    // }
}
