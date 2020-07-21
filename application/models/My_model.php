<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

	
     public function __construct()
	{
	   $this->load->database();
       $lib=array("phpmailer_library");
       $this->load->library($lib);
       $this->load->helper('pdf_helper');
	}
     public function dataJabatan(){
        $this->db->select('*');
        $this->db->from('mst_jabatan');
        return  $this->db->get();    
    }
    public function data_karyawan_projek($nik=""){
        $this->db->select('a.*,b.jenis_project');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','a.nik=ko.nik','left');
        $this->db->join('master_jenis_project b','b.id_master_jenis_project=ko.id_jenis_project','left');
        if ($nik != '') {
            $this->db->where($nik); 
        }
        return  $this->db->get();    
    }
    public function dataLoker($wh="",$wh1="",$wh2=""){
        $this->db->select('a.*,b.deskripsi as desJabatan,h.image as imageJabatan,h.jenis_project,d.deskripsi as desKabupaten');
        $this->db->from('trx_loker a');
        $this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
        $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=a.id_lokasi','left');
        $this->db->join('mst_kabupaten d','c.id_kabupaten=d.id_kabupaten','left');
        $this->db->join('master_jenis_project h','a.id_master_jenis_project=h.id_master_jenis_project','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($wh1!=""){
            $this->db->where($wh1);
        }
        if($wh2!=""){
            $this->db->where($wh2);
        }
        return  $this->db->get();    
    }
    public function data_loker($id=''){
        $this->db->select('a.*,b.deskripsi as desJabatan,h.image as imageJabatan,h.jenis_project,d.deskripsi as desKabupaten');
        $this->db->from('trx_loker a');
         $this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
        //$this->db->join('trx_loker_jadwal b','a.id_loker=b.id_loker','left');
        $this->db->join('master_jenis_project h','a.id_master_jenis_project=h.id_master_jenis_project','left');
        $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=a.id_lokasi','left');
        $this->db->join('mst_kabupaten d','c.id_kabupaten=d.id_kabupaten','left');
        if($id!=""){
            $this->db->where($id);
        }
        return  $this->db->get();    
    }
    //  public function dataLokerPelamar($id){
    //     $this->db->select('b.*,c.nama_lokasi,a.status_lamar,a.id_pelamar,d.deskripsi as desJabatan,d.image as imageJabatan');
    //     $this->db->from('trx_pelamar a');
    //     $this->db->join('trx_loker b','a.id_loker=b.id_loker','left');
    //      $this->db->join('mst_jabatan d','b.id_jabatan=d.id_jabatan','left');
    //     $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=b.id_lokasi','left');
    //     $this->db->where('a.id_pelamar',$id);
    //     return  $this->db->get();     
    // }
    public function dataLokerPelamar($id,$id_loker="",$wh=""){
        $this->db->select('e.*,d.deskripsi as desJabatan,h.image as imageJabatan,h.jenis_project,b.tanggal_mulai,b.tanggal_selesai,f.deskripsi as desKabupaten');
        $this->db->from('trx_detail_pelamar_loker e');
        $this->db->join('trx_pelamar a','e.id_pelamar=a.id_pelamar','left');
        $this->db->join('trx_loker b','e.id_loker=b.id_loker','left');
        $this->db->join('mst_jabatan d','b.id_jabatan=d.id_jabatan','left');
        $this->db->join('master_jenis_project h','b.id_master_jenis_project=h.id_master_jenis_project','left');
        $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=b.id_lokasi','left');
        $this->db->join('mst_kabupaten f','f.id_kabupaten=c.id_kabupaten','left');
        $this->db->where('a.id_pelamar',$id);
        if($id_loker!=''){
             $this->db->where('e.id_loker',$id_loker);
        }
        if($wh!=""){
             $this->db->where($wh);
        }
        return  $this->db->get();     
    }
     public function dataJadwalLokerPelamar($id=""){
        $this->db->select('*');
        $this->db->from('trx_loker_jadwal');
        if($id!=""){
            $this->db->where('id_loker',$id);
        }
        return  $this->db->get();      
    }
    public function dataTrxUserPelamar($id){
        $this->db->select('a.*,b.email');
        $this->db->from('trx_user a');
        $this->db->join('trx_pelamar b','a.id_pelamar=b.id_pelamar','left');
        $this->db->where('a.id_pelamar',$id);
        return  $this->db->get();      
    }
    public function dataPelamar($wh){
        $this->db->select('a.*,b.email,b.nama_lengkap');
        $this->db->from('trx_user a');
        $this->db->join('trx_pelamar b','a.id_pelamar=b.id_pelamar','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return  $this->db->get();      
    }
    public function dt_loker($id=''){
         $this->db->select('a.*,b.deskripsi as desJabatan,h.image as imageJabatan,h.jenis_project,d.deskripsi as desKabupaten');
        $this->db->from('trx_loker a');
         $this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
        //$this->db->join('trx_loker_jadwal b','a.id_loker=b.id_loker','left');
          $this->db->join('master_jenis_project h','a.id_master_jenis_project=h.id_master_jenis_project','left');
        $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=a.id_lokasi','left');
         $this->db->join('mst_kabupaten d','d.id_kabupaten=c.id_kabupaten','left');
       // $this->db->where('id_loker',$id);

        if($id!=""){
            $this->db->where($id);
        }
        return  $this->db->get();    
    }
    //   public function getSts($idpo){
    //     $this->db->select('a.*,b.kontrak_kerja_personel');
    //     $this->db->from('master_projek_order a');
    //     $this->db->join('master_p_o_sdm b','a.id_projek_order=b.id_projek_order','left');
    //     if ($idpo != "") {
    //         $this->db->where($idpo);
    //     }
    //     return  $this->db->get();
    // }
    // public function getPo($sts){
    //     $this->db->select('*');
    //     $this->db->from('master_projek_order');
    //     if ($sts != "") {
    //         $this->db->where($sts);
    //     }
    //     return  $this->db->get();
    // }
    //  public function getProjectOrderRevisi($sts=""){
    //     $this->db->select('*');
    //     $this->db->from('master_projek_order ');
    //     if ($sts != "") {
    //         $this->db->where($sts);
    //     }
    //      $this->db->where('id_projek_order in (select max(id_projek_order) from master_projek_order group by id_projek_order_revisi)');
    //     return  $this->db->get();
    //  }
    //  public function getProjectOrder($sts="",$id="",$like="",$whin=""){
    //     $this->db->select('a.*,m.idporev,max.idpo,a.id_projek_order as id_po,b.*,c.nama_perusahaan,c.alamat,c.kota,c.no_telp,c.no_faximile,d.data_penagihan,d.cara_penagihan,d.contact_person as cp_keuangan,d.no_telepon as nt_keuangan,d.tanggal_penagihan,d.jatuh_tempo,d.lembur as lembur_keuangan,d.lembur_manajemen,d.pemberian_lembur_tiap_tanggal,d.penggajian_tiap_tanggal,d.thr_ditagihkan,d.thr_ditagihkan_manajemen,e.contact_person as cp_sdm,e.no_telepon as nt_sdm,e.personil_laki,e.personil_perempuan,e. personil_korlap,e.personil_anggota,e.jumlah_lokasi,e.jumlah_penggajian,e.tunjangan,e.fasilitas_bpjs_tenaga_kerja,e.fasilitas_bpjs_kesehatan,e.fasilitas_bpjs_pensiun,e.potongan_bpjs_tenaga_kerja,e.potongan_bpjs_kesehatan,e.potongan_bpjs_pensiun,e.thr,e.thr_ditagihkan as thr_ditagihkan_sdm,e.fasilitas_seragam_stel,e.fasilitas_seragam_pcs,e.fasilitas_seragam_spesifikasi,e.fasilitas_lain,e.lembur as lembur_sdm,e.lembur_sesuai,e.kontrak_kerja_personel,f.contact_person as cp_pengadaan,f.no_telepon as nt_pengadaan,f.jumlah_peralatan_security,f.jumlah_chemical_equipment,f.terlampir,f.permintaan_khusus,kr.nama_lengkap,md.nama_departemen');
    //     $this->db->from('master_projek_order a');
    //     $this->db->join("(select id_projek_order_revisi as id_rev,max(id_projek_order) as idporev from master_projek_order where id_projek_order_revisi!=0 and status_revisi='2' group by id_projek_order_revisi) m",'m.id_rev=a.id_projek_order','left');
    //     //$this->db->join('(select * from master_projek_order) rev','rev.id_projek_order=m.id_rev','left');
    //     $this->db->join('(select max(id_projek_order) as idpo from master_projek_order where id_projek_order_revisi!=0 group by id_projek_order_revisi) max','max.idpo=a.id_projek_order','left');
    //     //$this->db->join('(select id_projek_order,max(id_projek_order) as idpo from master_projek_order where id_projek_order_revisi!=0 group by id_projek_order) n','n.idpo=a.id_projek_order','left');
    //     $this->db->join('master_p_o_marketing b','a.id_projek_order=b.id_projek_order','left');
    //     // $this->db->join('trx_kontrak ko','a.id_projek_order=b.id_projek_order','left');
    //     $this->db->join('master_perusahaan c','c.id_master_perusahaan=b.id_master_perusahaan','left');
    //     $this->db->join('master_p_o_keuangan d','a.id_projek_order=d.id_projek_order','left');
    //     $this->db->join('master_p_o_sdm e','a.id_projek_order=e.id_projek_order','left');
    //     $this->db->join('master_p_o_pengadaan f','a.id_projek_order=f.id_projek_order','left');
    //     $this->db->join('trx_karyawan kr','a.nama_pemeriksa=kr.nik','left');
    //     $this->db->join('master_departemen md','b.jenis_projek=md.id_master_departemen','left');
    //     if($id!=""){
    //         $this->db->where('a.id_projek_order',$id);
    //     }if ($sts != "") {
    //         $this->db->where($sts);
    //     }if ($like != "") {
    //         $this->db->like($like);
    //     }
    //     if ($whin != "") {
    //         $this->db->where_in("a.status",$whin);
    //     }
    //     return  $this->db->get();
    // }
    // public function ambilPOPerpanjangan(){
    //     $this->db->select('a.id_projek_order,a.no_projek_order,a.status,b.jumP');
    //     $this->db->from('master_projek_order a');
    //     $this->db->join('(SELECT no_projek_order,COUNT(no_projek_order)as jumP from master_projek_order where status=2 group BY no_projek_order) b','a.no_projek_order=b.no_projek_order','left');
    //     $this->db->where('(a.id_projek_order in (SELECT MAX(id_projek_order) from master_projek_order GROUP BY no_projek_order) and a.status=2)');
    //     return  $this->db->get()->row();    
    // }
    //  public function ambilPORevisi(){
    //     $this->db->select('a.id_projek_order,a.no_projek_order,a.status,b.jumP');
    //     $this->db->from('master_projek_order a');
    //     $this->db->join('(SELECT no_projek_order,COUNT(no_projek_order)as jumP from master_projek_order where status=3 group BY no_projek_order) b','a.no_projek_order=b.no_projek_order','left');
    //     $this->db->where('(a.id_projek_order in (SELECT MAX(id_projek_order) from master_projek_order GROUP BY no_projek_order) and a.status=3)');
    //     return  $this->db->get()->row();    
    // }
    // public function TambahDokumen($data, $id)
    // {
    //     $this->db->where('id_projek_order', $id);
    //     $this->db->update('master_projek_order', $data);
    // }
    public function ambildepartemen($nik){
        $this->db->select('tk.*,ko.id_departemen');
        $this->db->from('trx_karyawan tk');
        $this->db->join('trx_kontrak ko','ko.nik=tk.nik','left');
        $this->db->where('tk.nik',$nik);
        return  $this->db->get()->row();    
    }
    // public function getPenagihan($wh=""){
    //     $this->db->select('*');
    //     $this->db->from('master_penagihan');
    //     if($wh!=""){
    //         $this->db->where($wh);
    //     }
    //     return  $this->db->get();    
    // }
    public function getDepartemen($wh=""){
        $this->db->select('a.*,b.nama_departemen');
        $this->db->from('mst_departemen a');
        $this->db->join('master_departemen b','a.id_master=b.id_master_departemen','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return  $this->db->get();    
    }
    public function getJenisProjekKontrak($wh="",$whi="",$whpil=""){
        $this->db->select('a.*,ko.jumkar,md.nama_departemen');
        //$this->db->from('master_jenis_project a');
        $this->db->from('mst_departemen a');
        $this->db->join('master_departemen md','md.id_master_departemen=a.id_master','left');
        $idlok="";
        if($whpil!=""){
            $idlok=" and id_lokasi_kantor in (".implode(",",$whpil).")";
        }
        $this->db->join('(
        select id_departemen,count(id_departemen) as jumkar from trx_kontrak 
        where 
        tanggal_masuk in (select max(tanggal_masuk) from trx_kontrak group by nik) 
        '.$idlok.'
        group by id_departemen
        ) ko','ko.id_departemen=a.id_departemen','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($whi!=""){
            $this->db->where_in('a.id_departemen',$whi);
        }
        if($whpil!=""){
            //$this->db->where_in('ko.id_lokasi_kantor',$whpil);
        }
        return  $this->db->get();    
    }
    public function getJenisProjek($wh="",$whi=""){
        $this->db->select('*');
        $this->db->from('master_jenis_project');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($whi!=""){
            $this->db->where_in('id_master_jenis_project',$whi);
        }
        return  $this->db->get();    
    }
    public function getJenisProjekbaru($wh="",$whi=""){
        $this->db->select('*');
        $this->db->from('master_departemen');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($whi!=""){
            $this->db->where_in('id_master_jenis_project',$whi);
        }
        return  $this->db->get();    
    }
     public function getJenisProjekbarudtl($wh=""){
        $this->db->select('a.*,b.nama_departemen,b.id_master_departemen');
        $this->db->from('mst_departemen a');
        $this->db->join('master_departemen b','a.id_master=b.id_master_departemen','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return  $this->db->get();    
    }
    
    public function getPerusahaan($id=""){
        $this->db->select('*');
        $this->db->from('master_perusahaan');
        if($id!=""){
            $this->db->where($id);
        }
        return  $this->db->get();    
    }
    public function getTunjangan($id=""){
        $this->db->select('*');
        $this->db->from('mst_jenis_tunjangan');
        if($id!=""){
            $this->db->where($id);
        }
        return  $this->db->get();    
    }
    // public function TambahAturanBPJSTK($data){
    //       $this->db->insert('trx_dtl_klien_bpjs_tk',$data);
    // }
    // public function UpadateAturanBPJSTK($data, $id)
    // {
    //     $this->db->where('id_klien', $id);
    //     $this->db->update('trx_dtl_klien_bpjs_tk', $data);
    // }
    // public function TambahAturanBPJSKES($data){
    //       $this->db->insert('trx_dtl_klien_bpjs_kes',$data);
    // }
    // public function UpadateAturanBPJSKES($data, $id)
    // {
    //     $this->db->where('id_klien', $id);
    //     $this->db->update('trx_dtl_klien_bpjs_kes', $data);
    // }
    // public function TambahAturanPPH($data){
    //       $this->db->insert('trx_dtl_klien_pph',$data);
    // }
    //  public function UpadateAturanPPH($data, $id)
    // {
    //     $this->db->where('id_klien', $id);
    //     $this->db->update('trx_dtl_klien_pph', $data);
    // }
    // public function getPerusahaanbpjstk($id=""){
    //     $this->db->select('a.*,t.jenis_tunjangan');
    //     $this->db->from('trx_dtl_klien_bpjs_tk a');
    //     $this->db->join('mst_jenis_tunjangan t','a.id_jenis_tunjangan=t.id_jenis_tunjangan','left');
    //     if($id!=""){
    //         $this->db->where($id);
    //     }
    //     return  $this->db->get();    
    // }
    // public function getPerusahaanbpjskes($id=""){
    //     $this->db->select('a.*,t.jenis_tunjangan');
    //     $this->db->from('trx_dtl_klien_bpjs_kes a');
    //     $this->db->join('mst_jenis_tunjangan t','a.id_jenis_tunjangan=t.id_jenis_tunjangan','left');
    //     if($id!=""){
    //         $this->db->where($id);
    //     }
    //     return  $this->db->get();    
    // }
    //  public function getPerusahaanpph($id=""){
    //     $this->db->select('a.*,t.jenis_tunjangan');
    //     $this->db->from('trx_dtl_klien_pph a');
    //     $this->db->join('mst_jenis_tunjangan t','a.id_jenis_tunjangan=t.id_jenis_tunjangan','left');
    //     if($id!=""){
    //         $this->db->where($id);
    //     }
    //     return  $this->db->get();    
    // }
    public function ambil_data_kepala($idjab){
        $this->db->select('a.id_jabatan,b.parent_id_jabatan');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_organisasi b','b.id_jabatan=a.id_jabatan','left');
        $this->db->where('a.id_jabatan',$idjab);
        return  $this->db->get()->row();    
    }
    public function ambil_data_nama_kepala($idparent){
        $this->db->select('b.nama_lengkap');
        $this->db->from('trx_organisasi a');
        $this->db->join('trx_karyawan b','b.id_jabatan=a.id_jabatan','left');
        $this->db->where('a.id_organisasi',$idparent);
        return  $this->db->get()->row();    
    }
    public function jum_data_karyawan($iddept){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
        $this->db->where('id_departemen',$iddept);
        return  $this->db->get()->num_rows();    
    }
    public function data_karyawan_dept($iddept){
        $this->db->select('a.*,b.deskripsi');
        $this->db->from('trx_karyawan a');
        $this->db->join('mst_jabatan b','b.id_jabatan=a.id_jabatan','left');
        $this->db->where('a.id_departemen',$iddept);
        return  $this->db->get();    
    }
    public function getKaryawan($wh="",$whin=""){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($whin!=""){
            $this->db->where_in('status_karyawan',$whin);
        }
        return  $this->db->get();  
    }
    public function getKaryawanKontrak($wh="",$whin="",$pil="",$whlok="",$jenpro=""){
        $this->db->select('k.nik,k.nama_lengkap,k.email,k.jenis_kelamin,k.nomor_telepon,ko.status_karyawan,ko.id_kontrak,ko.id_projek_order,ko.id_master_perusahaan,ko.id_departemen,ko.id_lokasi_kantor,ko.korlap,ko.id_jenis_project,ko.gaji,mdp.nama_departemen as jenis_project,jp.jenis_project as jabatan');
        $this->db->from('trx_karyawan k');
        $this->db->join('trx_kontrak ko','ko.nik=k.nik','left');
        $this->db->join('master_jenis_project jp','jp.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->join('mst_departemen dp','dp.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen mdp','mdp.   id_master_departemen=dp.id_master','left');
        $this->db->join('master_perusahaan p','p.id_master_perusahaan=ko.id_master_perusahaan','left');
        if($pil!=""){
            //$this->db->join('mst_lokasi_kantor l','l.id_master_perusahaan=ko.id_master_perusahaan','left');
            $this->db->where($pil);
        }
        if($whlok!=""){
            //$this->db->join('mst_lokasi_kantor l','l.id_master_perusahaan=ko.id_master_perusahaan','left');
            $this->db->where_in('ko.id_lokasi_kantor',$whlok);
        }
        if($wh!=""){
            $this->db->where($wh);
        }
        if($whin!=""){
            $this->db->where_in('ko.status_karyawan',$whin);
        }
        if($jenpro!=""){
            // $this->db->where_in('ko.id_jenis_project',$jenpro);
              $this->db->where_in('ko.id_departemen',$jenpro);
        }
        //$this->db->where('ko.tanggal_masuk in (select max(tanggal_masuk) from trx_kontrak group by nik)',null,false);
        $this->db->where('ko.tanggal_masuk in (select max(tanggal_masuk) from trx_kontrak group by nik)',null,false);
        $this->db->order_by("ko.id_projek_order","desc");
        return  $this->db->get();  
    }
    public function getUserKaryawan($wh="",$whin=""){
        $this->db->select('c.*,p.*,kab.deskripsi as kabupatennya,c.nik as nik_user,c.id_pelamar as idpelamaruser,dl.id_pelamar as id_pelamardl,dl.id_loker as idlokerdl,l.id_master_jenis_project,j.jenis_project,c.username,c.password');
        //$this->db->from('trx_karyawan k');
        $this->db->from('trx_user c');
        $this->db->join('trx_pelamar p','p.id_pelamar=c.id_pelamar','left');
        $this->db->join("trx_detail_pelamar_loker dl","dl.id_pelamar=c.id_pelamar",'left');
        $this->db->join('trx_loker l','l.id_loker=dl.id_loker','left');
        $this->db->join('master_jenis_project j','j.id_master_jenis_project=l.id_master_jenis_project','left');
        $this->db->join('mst_lokasi_kantor lk','lk.id_lokasi_kantor=l.id_lokasi','left');
        $this->db->join('mst_kabupaten kab','kab.id_kabupaten=lk.id_kabupaten','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($whin!=""){
            $this->db->where_in('status_karyawan',$whin);
        }
        $this->db->where("c.id_pelamar!=0",null,false);
        return  $this->db->get();  
    }
    public function data_karyawan($nik){
        $this->db->select('a.*,b.deskripsi as desJabatan,b.keterangan,c.password,d.nomor_rek,d.standar_gaji,d.atas_nama_rek,e.deskripsi as desBank,e.id_bank,e.jumlah_digit,f.deskripsi,g.nama_company as perusahaan,k.tanggal_masuk,k.tanggal_keluar,ka.nama_lengkap as Nama_penerima');
        $this->db->from('trx_karyawan a');
        $this->db->join('mst_jabatan b','b.id_jabatan=a.id_jabatan','left');
        $this->db->join('trx_user c','a.nik=c.nik','left');
        $this->db->join('mst_divisi div','div.id_divisi=a.id_divisi','left');
        $this->db->join('mst_departemen f','div.id_departemen=f.id_departemen','left');
        $this->db->join('mst_company g','f.id_company=g.id_company','left');
        $this->db->join('trx_kontrak k','k.nik=a.nik ','left');
        $this->db->join('trx_karyawan ka','ka.nik=k.nik_penerima','left');
        $this->db->join('trx_karyawan_gaji d','a.nik=d.nik','left');
        $this->db->join('mst_bank e','d.id_bank=e.id_bank','left');
        $this->db->where('a.nik',$nik);
        return  $this->db->get()->row();    
    }
    public function data_karyawanNumRows($nik){
        $this->db->select('a.*,b.deskripsi as desJabatan,c.password,d.nomor_rek,d.atas_nama_rek,e.deskripsi as desBank,e.id_bank');
        $this->db->from('trx_karyawan a');
        $this->db->join('mst_jabatan b','b.id_jabatan=a.id_jabatan','left');
        $this->db->join('trx_user c','a.nik=c.nik','left');
        $this->db->join('trx_karyawan_gaji d','a.nik=d.nik','left');
        $this->db->join('mst_bank e','d.id_bank=e.id_bank','left');
        $this->db->where('a.nik',$nik);
        return  $this->db->get()->num_rows();    
    }
    public function data_pelamarNumRows($nik){
        $this->db->select('*');
        $this->db->from('trx_user a');
        $this->db->join('trx_pelamar b','b.id_pelamar=a.id_pelamar','left');
        $this->db->where('a.nik',$nik);
        return  $this->db->get()->num_rows();    
    }
    public function data_pelamar($nik){
        $this->db->select('a.*,b.*');
        $this->db->from('trx_user a');
        $this->db->join('trx_pelamar b','b.id_pelamar=a.id_pelamar','left');
        $this->db->where('a.nik',$nik);
        return  $this->db->get()->row();    
    }
    public function data_bank(){
        $this->db->select('*');
        $this->db->from('mst_bank');
        return  $this->db->get()->result();    
    }

    public function data_gajiLainnya($nik){
        $sql = "SELECT gl.peruntukan,gl.nilai ,jt.jenis_tunjangan FROM trx_karyawan tk LEFT JOIN trx_karyawan_gaji_lainnya gl ON tk.nik=gl.nik LEFT JOIN mst_jenis_tunjangan jt ON gl.id_jenis_tunjangan=jt.id_jenis_tunjangan WHERE tk.nik='".$nik."'";  

        $data = $this->db->query($sql);
        
        return $data;
    }

    public function data_NPWP($nikktp){
        $sql = "SELECT tn.* FROM trx_npwp tn LEFT JOIN trx_karyawan tk ON tn.nik_ktp=tk.nik_ktp WHERE tn.nik_ktp='".$nikktp."'";  

        $data = $this->db->query($sql);
        
        return $data;
    }

    public function data_BPJS($nikktp){
        $sql = "SELECT tb.* FROM trx_bpjs tb LEFT JOIN trx_karyawan tk ON tb.nik_ktp=tk.nik_ktp WHERE tb.nik_ktp='".$nikktp."'";  

        $data = $this->db->query($sql);
        
        return $data;
    }
    
    function cek_login($where){      
        $this->db->select('u.*,ko.id_jenis_project,k.email,k.nama_lengkap,ko.status_karyawan');
        $this->db->from('trx_user u');
        $this->db->join('trx_kontrak ko','ko.nik=u.nik','left');
        $this->db->join('trx_karyawan k','ko.nik=k.nik','left');
        $this->db->where('ko.tanggal_masuk in (select max(tanggal_masuk) from trx_kontrak group by nik)');
        $this->db->where($where);
        return $this->db->get();
    }

    function cek_loginapplicant($where){
        $this->db->select('u.*,p.nama_lengkap');
        $this->db->from('trx_user u');
        $this->db->join('trx_pelamar p','u.id_pelamar=p.id_pelamar','left');
        $this->db->where($where);
        return $this->db->get();
    }

      public function update($data, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('trx_user', $data);
    }
     public function updatepassword($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('trx_user', $data);
    }
    public function updateemail($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('trx_karyawan', $data);
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
    public function add_data_id($table,$data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
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
    
    public function kirimEmail($email,$message){
        $wh=array("mail_company"=>"semanggi3");
        $mailserver = $this->mailserver($wh)->row();
        $config = array(
           'protocol'  => $mailserver->protocol,//'mail',
           'smtp_host' => $mailserver->smtp_host,//'ssl://smtp.googlemail.com',
           'smtp_user' => $mailserver->smtp_user,//'katateguh345@gmail.com', 
           'smtp_pass' => $mailserver->smtp_pass,//'Teguh17071198', 
           'smtp_port' => $mailserver->smtp_port,//587,
           'smtp_crypto' => $mailserver->smtp_crypto,//'SSL',
           //'smtp_keepalive' => TRUE,
           //'wordwrap'  => TRUE,
           //'wrapchars' => 80,
           'mailtype'  => 'html',
           'charset'   => 'utf-8',
           //'validate'  => TRUE,
           'crlf'      => "\r\n",
           'newline'   => "\r\n",
           'priority'  => 1
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $a = $email;
        $pesan = $message;
        $this->email->from($mailserver->smtp_user, $mailserver->mail_name); 
        $this->email->to($a); 
        $this->email->subject($mailserver->mail_name);
        $this->email->message($message);
        $result="";
        if ($this->email->send()) {
            $result='success';
        } else{
            $result='fail';
        }
        echo $this->email->print_debugger();
        //return $result;
    }
    
    public function kirimEmailnya($email,$message){
        $wh=array("mail_company"=>"semanggi3");
        $mailserver = $this->mailserver($wh)->row();
        $mail = $this->phpmailer_library->load(true);
        try {
            $mail->CharSet = "UTF-8";
    		$mail->IsSMTP();
    		$mail->SMTPSecure = $mailserver->smtp_crypto;//'ssl';
    		$mail->Host = $mailserver->smtp_host;//"mail.nata.id"; //hostname masing-masing provider email
    		// $mail->SMTPDebug = 0;
    		$mail->Port = $mailserver->smtp_port;//465;
    		$mail->SMTPAuth = true;
    		$mail->Username = $mailserver->smtp_user;//"info@nata.id"; //user email
    		$mail->Password = $mailserver->smtp_pass;//"nata234!!"; //password email
    		$mail->SetFrom($mailserver->smtp_user,"Penata"); //set email pengirim
    		$mail->AddAddress($email,"User"); //tujuan email
            $mail->isHTML(true);
            $mail->Subject = "Pemberitahuan Email dari Website"; //subyek email
            $mail->Body=html_entity_decode($message);
            $mail->ContentType = 'text/html';
            //$mail->MsgHTML($message);
    		if($mail->Send()){
    			// echo "Message has been sent";
    
    			return 'success';
    		} 
    		else{
    			// echo "Failed to sending message";
    			return 'fail';
    		} 
        } catch (Exception $e) {
            //echo 'Message could not be sent.';
            return 'Mailer Error: ' . $mail->ErrorInfo;
        }
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
    public function insert($data){
          $this->db->insert('trx_detail_pelamar_loker',$data);
    }
    public function tambahpelamar($data){
        $this->db->insert('trx_pelamar',$data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    public function ambilidpelamar($data)
    {
        $this->db->select('id_pelamar');
        $this->db->from('trx_pelamar');
        $this->db->where($data);
         return $this->db->get()->row();
    } 
    public function tambahuserpelamar($data){
          $this->db->insert('trx_user',$data);
    }
     public function ambiliduser($data)
    {
        $this->db->select('id_user');
        $this->db->from('trx_user');
        $this->db->where($data);
         return $this->db->get()->row();
    }
    public function ambiluser($data)
    {
        $this->db->select('*');
        $this->db->from('trx_user');
        $this->db->where($data);
         return $this->db->get();
    } 
     public function tambahuserpelamardatakaryawan($data){
          $this->db->insert('trx_karyawan',$data);
    }
    public function mailserver($wh=""){
        $this->db->select('*');
        $this->db->from('mail_server');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function viewmanageUserParent($id=""){
        $this->db->select('a.*,b.nama_modul,b.link,b.parent,c.jenis_project as jabatan');
        $this->db->from('trx_jenis_user_detail a');
        $this->db->join('mst_modul b','b.id_modul=a.id_modul','left');
        $this->db->join('master_jenis_project c','c.id_master_jenis_project=a.id_jabatan','left');
        if ($id!="") {
            $this->db->where($id);
        }
        
        $this->db->where('b.status!=1',NULL,FALSE);
        return $this->db->get();
    }
}
