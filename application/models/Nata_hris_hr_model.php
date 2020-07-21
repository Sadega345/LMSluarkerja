<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nata_hris_hr_model extends CI_Model {

	
    public function __construct()
	{
	   $this->load->database();
       $lib=array("phpmailer_library");
       $this->load->library($lib);
       $this->load->helper('pdf_helper');
	}
	 public function dataTenagaKerja($wh=""){
        $this->db->select('a.nama_lengkap,b.deskripsi as desDepartemen,a.tanggal_keluar');
        $this->db->from('trx_karyawan a');
        $this->db->join('mst_departemen b','a.id_departemen=b.id_departemen','left');
        $this->db->where('month(a.tanggal_keluar)>=month(now()) AND month (a.tanggal_keluar)<=month(now()+interval 1 month) AND (a.status_karyawan = "3" OR a.status_karyawan="4")');
        return $this->db->get();
    }
    public function countover($wh='',$wh2=array()){
        $this->db->select('COALESCE(count(a.nik),0)as jum_karyawan');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak b','a.nik=b.nik','left');
        $this->db->where('b.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) ');
        // $this->db->where("b.status_karyawan='5' ",NULL,FALSE);
        $this->db->where("b.tanggal_keluar like '".$wh."%'",NULL,FALSE);
        if(count($wh2)>0){
            $this->db->where($wh2);
        }
        // $this->db->group_by('nik');
        return $this->db->get();
    }
    public function dataTunjangan($wh=""){
        $this->db->select('a.*,b.jenis_tunjangan');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('mst_jenis_tunjangan b','a.id_jenis_tunjangan=b.id_jenis_tunjangan','left');

         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function data_task($wh=""){
        $this->db->select('a.*,b.nama_lengkap');
        $this->db->from('trx_detail_task a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');

         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function TambahTask($data){
        $this->db->insert('trx_detail_task',$data);
        return $this->db->affected_rows();
    }
    function EditTask($data,$id){
      $this->db->where('id_detail_task',$id);
      $this->db->update('trx_detail_task',$data);
    }
    public function dataPegawaiKontrak($wh="",$requestData="",$columns="",$wr="",$wl="",$wi=""){
        $this->db->select('a.*,ko.nama_atasan,ko.bpjs_kes,ko.bpjs_tk,ko.pph,ko.lemburan,ko.status_karyawan as stskar,ko.tanggal_masuk as tglmasuk,ko.tanggal_keluar as tglkeluar,ko.id_jenis_project,ko.status_karyawan,ko.id_kontrak,ko.gaji,ko.korlap,b.id_master_perusahaan,b.nama_perusahaan,ko.id_lokasi_kantor,d.deskripsi as desKabupaten,md.nama_departemen as desDepartemen,e.id_departemen,f.jenis_project,g.kode_npwp,g.tempat_pembuatan,h.deskripsi as desAgama,i.deskripsi as desStsNikah,j.deskripsi as desPendidikan,k.nama_sekolah,k.jurusan,k.tahun_masuk,k.tahun_lulus,l.nama_perusahaan as nama_instansi,l.nama_jabatan,l.tahun_mulai,l.tahun_selesai,m.deskripsi as nama_kecamatan,n.id_kabupaten,n.deskripsi as nama_kabupaten,o.id_provinsi,o.deskripsi as nama_provinsi,q.id_karyawan_gaji,q.standar_gaji,q.nomor_rek,q.atas_nama_rek,r.id_bank,r.deskripsi as nama_bank,um.gaji as gaji_umk,c.id_kabupaten as kabperusahaan,c.id_provinsi as provperusahaan,sp.status_pegawai,u.password');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_status_pegawai sp','ko.status_karyawan=sp.id_status_pegawai','left');
        $this->db->join('master_perusahaan b','b.id_master_perusahaan=ko.id_master_perusahaan','left');
        $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=ko.id_lokasi_kantor','left');
        $this->db->join('mst_kabupaten d','d.id_kabupaten=c.id_kabupaten','left');
        $this->db->join('mst_umk um','um.id_kabupaten=c.id_kabupaten','left');
        $this->db->join('mst_departemen e','e.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','e.id_master=md.id_master_departemen','left');
        $this->db->join('master_jenis_project f','f.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->join('trx_npwp g','a.id_karyawan=g.id_karyawan','left');
        $this->db->join('mst_agama h','a.id_agama=h.id_agama','left');
        $this->db->join('mst_sts_nikah i','a.id_sts_nikah=i.id_sts_nikah','left');
        $this->db->join('mst_pendidikan j','a.id_pendidikan=j.id_pendidikan','left');
        $this->db->join('trx_karyawan_pendidikan k','a.nik=k.nik','left');
        $this->db->join('trx_karyawan_riwayat_kerja l','a.nik=l.nik','left');
        $this->db->join('mst_kecamatan m','a.id_kecamatan=m.id_kecamatan','left');
        $this->db->join('mst_kabupaten n','n.id_kabupaten=m.id_kabupaten','left');
        $this->db->join('mst_provinsi o','o.id_provinsi=n.id_provinsi','left');
        $this->db->join('trx_karyawan_gaji q','a.nik=q.nik','left');
        $this->db->join('mst_bank r','q.id_bank=r.id_bank','left');
        $this->db->join('trx_user u','a.nik=u.nik','left');
        $this->db->where('ko.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) and ko.id_master_perusahaan!=""',null,false);
        //$this->db->where('ko.sta',null,false);
        if($wh!=""){
            if($wh!="-"){
                $this->db->where($wh);
            }
        }
        if($columns!="" && isset($requestData['search']['value'])){
            $search = array();
            $count=0;
            foreach ($columns as $kolom) {
                if($requestData['search']['value']!=""){
                    $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
                    $count++;
                }
            }
            if($count>0){
                $this->db->where("(".implode(" OR ", $search).")",null,false);
            }
        }
        if($requestData!=""){
            if($wh!="-"){
                $this->db->limit($requestData['length'],$requestData['start']);
            }
        }
         if($wr!=""){
                $this->db->where($wr);
        }
        if($wl!=""){
                $this->db->like($wl);
        }
         if($wi!=""){
            foreach ($wi as $dt) {
                $this->db->where_in($dt['field'],$dt['data']);
            }
                
        }
        $sts = array('1','3','4');
        $this->db->where_in('ko.status_karyawan',$sts);
        return $this->db->get();
    }
    // public function dataPegawaiKontrakpo($wh="",$requestData="",$columns="",$wr="",$wl="",$wi=""){
    //     $this->db->select('z.*,o.*');
    //     $this->db->from('master_projek_order p');
    //     $this->db->join('master_p_o_sdm o','o.id_projek_order=p.id_projek_order','left');
    //     $this->db->join('master_p_o_marketing z','z.id_projek_order=p.id_projek_order','left');
    //     //$this->db->where('ko.sta',null,false);
    //     if($wh!=""){
    //         if($wh!="-"){
    //             $this->db->where($wh);
    //         }
    //     }
    //     if($columns!="" && isset($requestData['search']['value'])){
    //         $search = array();
    //         $count=0;
    //         foreach ($columns as $kolom) {
    //             if($requestData['search']['value']!=""){
    //                 $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
    //                 $count++;
    //             }
    //         }
    //         if($count>0){
    //             $this->db->where("(".implode(" OR ", $search).")",null,false);
    //         }
    //     }
    //     if($requestData!=""){
    //         if($wh!="-"){
    //             $this->db->limit($requestData['length'],$requestData['start']);
    //         }
    //     }
    //      if($wr!=""){
    //             $this->db->where($wr);
    //     }
    //     if($wl!=""){
    //             $this->db->like($wl);
    //     }
    //      if($wi!=""){
    //         foreach ($wi as $dt) {
    //             $this->db->where_in($dt['field'],$dt['data']);
    //         }
                
    //     }
    //     return $this->db->get();
    // }
    public function dataPegawaiumklok($wh=""){
        $this->db->select('c.*,um.gaji');
        $this->db->from('mst_umk um');
        $this->db->join('mst_lokasi_kantor c','c.id_kabupaten=um.id_kabupaten and c.id_provinsi=um.id_provinsi','left');
        if($wh!=""){
                $this->db->where($wh);
        }
        
        return $this->db->get();
    }

    public function dataPegawaiKontrakNIK($wh="",$requestData="",$columns="",$wr="",$wl=""){
        $this->db->select('a.nik,q.nomor_rek,q.id_bank,a.nama_lengkap,ko.bpjs_kes,ko.bpjs_tk,ko.pph,ko.gaji,ko.id_master_perusahaan,ko.id_departemen,ko.id_jenis_project,r.biaya');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('master_perusahaan b','b.id_master_perusahaan=ko.id_master_perusahaan','left');
       // $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=ko.id_lokasi_kantor','left');
       // $this->db->join('mst_kabupaten d','d.id_kabupaten=c.id_kabupaten','left');
        $this->db->join('mst_departemen e','e.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','e.id_master=md.id_master_departemen','left');
        $this->db->join('master_jenis_project f','f.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->join('trx_npwp g','a.nik_ktp=g.nik_ktp','left');
        $this->db->join('mst_agama h','a.id_agama=h.id_agama','left');
        $this->db->join('mst_sts_nikah i','a.id_sts_nikah=i.id_sts_nikah','left');
        $this->db->join('mst_pendidikan j','a.id_pendidikan=j.id_pendidikan','left');
        $this->db->join('trx_karyawan_pendidikan k','a.nik=k.nik','left');
        $this->db->join('trx_karyawan_riwayat_kerja l','a.nik=l.nik','left');
        $this->db->join('mst_kecamatan m','a.id_kecamatan=m.id_kecamatan','left');
        $this->db->join('mst_kabupaten n','n.id_kabupaten=m.id_kabupaten','left');
        $this->db->join('mst_provinsi o','o.id_provinsi=n.id_provinsi','left');
        //$this->db->join('master_projek_order p','p.id_projek_order=ko.id_projek_order','left');
        $this->db->join('trx_karyawan_gaji q','a.nik=q.nik','left');
        $this->db->join('mst_bank r','q.id_bank=r.id_bank','left');
        //$this->db->where('ko.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik)',null,false);
       // $this->db->where('ko.id_master_perusahaan > 0');
        if($wh!=""){

                $this->db->where($wh);
            
        }
        if($columns!="" && isset($requestData['search']['value'])){
            $search = array();
            $count=0;
            foreach ($columns as $kolom) {
                if($requestData['search']['value']!=""){
                    $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
                    $count++;
                }
            }
            if($count>0){
                $this->db->where("(".implode(" OR ", $search).")",null,false);
            }
        }
        if($requestData!=""){
            if($wh!="-"){
                $this->db->limit($requestData['length'],$requestData['start']);
            }
        }
         if($wr!=""){
                $this->db->where($wr);
        }
        if($wl!=""){
                $this->db->like($wl);
        }
        return $this->db->get();
    }

    public function dataPegawaiKontrakJenisProject($wh="",$requestData="",$columns="",$wr="",$wl=""){
        $this->db->select('ko.*,f.jenis_project');
        $this->db->from('trx_kontrak ko');
        $this->db->join('master_jenis_project f','f.id_master_jenis_project=ko.id_jenis_project','left');
        
         $this->db->where('(ko.id_jenis_project not in(select id_master_jenis_project from trs_setting_nilai_jabatan) or ko.id_departemen not in(select id_departemen from trs_setting_nilai_jabatan)) ',null,false);
        if($wh!=""){
            if($wh!="-"){
                $this->db->where($wh);
            }
        }
        if($columns!="" && isset($requestData['search']['value'])){
            $search = array();
            $count=0;
            foreach ($columns as $kolom) {
                if($requestData['search']['value']!=""){
                    $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
                    $count++;
                }
            }
            if($count>0){
                $this->db->where("(".implode(" OR ", $search).")",null,false);
            }
        }
        if($requestData!=""){
            if($wh!="-"){
                $this->db->limit($requestData['length'],$requestData['start']);
            }
        }
         if($wr!=""){
                $this->db->where($wr);
        }
        if($wl!=""){
                $this->db->like($wl);
        }
       // $this->db->group_by('ko.id_jenis_project');
        return $this->db->get();
    }
    public function dataPegawaiKontrakJenisProject2($wh="",$requestData="",$columns="",$wr="",$wl=""){
        $this->db->select('s.*,f.jenis_project');
        $this->db->from('trs_setting_nilai_jabatan s');
        $this->db->join('master_jenis_project f','f.id_master_jenis_project=s.id_master_jenis_project','left');
        // $this->db->group_by('f.id_master_jenis_project');
        // $this->db->where('ko.id_jenis_project not in(select id_master_jenis_project from trs_setting_nilai_jabatan) and ko.id_departemen not in(select id_departemen from trs_setting_nilai_jabatan) ',null,false);
        if($wh!=""){
            if($wh!="-"){
                $this->db->where($wh);
            }
        }
        if($columns!="" && isset($requestData['search']['value'])){
            $search = array();
            $count=0;
            foreach ($columns as $kolom) {
                if($requestData['search']['value']!=""){
                    $search[] = $kolom." LIKE '%".$requestData['search']['value']."%' ";
                    $count++;
                }
            }
            if($count>0){
                $this->db->where("(".implode(" OR ", $search).")",null,false);
            }
        }
        if($requestData!=""){
            if($wh!="-"){
                $this->db->limit($requestData['length'],$requestData['start']);
            }
        }
         if($wr!=""){
                $this->db->where($wr);
        }
        if($wl!=""){
                $this->db->like($wl);
        }
        return $this->db->get();
    }
    public function dataSettingNilai($wh=''){
        $this->db->select('*');
        $this->db->from('trs_setting_nilai_jabatan');
        if ($wh!='') {
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function data_overtime_lembur($where="",$wh1=""){
        $this->db->select('a.*,k.nama_lengkap,md.nama_departemen as desDepartemen,b.nama_perusahaan,f.jenis_project,ko.lemburan');
        $this->db->from('trx_overtime a');
        $this->db->join('trx_karyawan k','a.nik=k.nik','left');
        $this->db->join('trx_kontrak ko','a.nik=ko.nik','left');
         $this->db->join('master_perusahaan b','b.id_master_perusahaan=ko.id_master_perusahaan','left');
        $this->db->join('mst_departemen e','e.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=e.id_master','left');
        $this->db->join('master_jenis_project f','ko.id_jenis_project=f.id_master_jenis_project','left');
        if ($where != "") {
            $this->db->where($where);
        }
        if ($wh1 !="") {
            $this->db->like($wh1);   
        }
        
        return  $this->db->get();    
    }
    public function ubahstsovertime($id,$sts,$alasan){
      $this->db->where('id_overtime',$id);
      $this->db->update('trx_overtime',array('status'=>$sts,'alasan'=>$alasan));
      return $this->db->affected_rows();
    }
    // public function TambahHRSettingNilai($data){
    //     $this->db->insert('trs_setting_nilai_jabatan',$data);
    //     return $this->db->affected_rows();
    // }
    public function dataPegawaiDtl($wh=""){
        $this->db->select('a.*,ko.bpjs_kes,ko.bpjs_tk,ko.pph,ko.lemburan,ko.status_karyawan as stskar,ko.tanggal_masuk as tglmasuk,ko.tanggal_keluar as tglkeluar,ko.nama_atasan,b.id_master_perusahaan,b.nama_perusahaan,b.id_lokasi_kantor,d.deskripsi as desKabupaten,md.nama_departemen as desDepartemen,e.id_departemen,f.jenis_project,g.kode_npwp,g.tempat_pembuatan,h.deskripsi as desAgama,i.deskripsi as desStsNikah,j.deskripsi as desPendidikan,k.nama_sekolah,k.jurusan,k.tahun_masuk,k.tahun_lulus,l.nama_perusahaan as nama_instansi,l.nama_jabatan,l.tahun_mulai,l.tahun_selesai,m.deskripsi as nama_kecamatan,n.id_kabupaten,n.deskripsi as nama_kabupaten,o.id_provinsi,o.deskripsi as nama_provinsi,q.id_karyawan_gaji,q.standar_gaji,q.nomor_rek,q.atas_nama_rek,r.id_bank,r.deskripsi as nama_bank');
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
        $this->db->join('trx_karyawan_pendidikan k','a.nik=k.nik','left');
        $this->db->join('trx_karyawan_riwayat_kerja l','a.nik=l.nik','left');
        $this->db->join('mst_kecamatan m','a.id_kecamatan=m.id_kecamatan','left');
        $this->db->join('mst_kabupaten n','n.id_kabupaten=m.id_kabupaten','left');
        $this->db->join('mst_provinsi o','o.id_provinsi=n.id_provinsi','left');
        //$this->db->join('master_projek_order p','ko.id_projek_order=p.id_projek_order','left');
        $this->db->join('trx_karyawan_gaji q','a.nik=q.nik','left');
        $this->db->join('mst_bank r','q.id_bank=r.id_bank','left');

         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
     public function dataNamaAtasan($wh=""){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataNamapendidikan($wh=""){
        $this->db->select('*');
        $this->db->from('mst_pendidikan');
         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    function upddata($data,$id){
      $this->db->where('nik',$id);
      $this->db->update('trx_payroll_create',$data);
       return $this->db->affected_rows();
    }
    public function dataPotongan($wh=''){
        $this->db->select('*');
        $this->db->from('trx_payrol_potongan');
        if ($wh!='') {
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function TambahPotongan($data){
        $this->db->insert('trx_payrol_potongan',$data);
        return $this->db->affected_rows();
    }
    function EditPotongan($data,$id){
      $this->db->where('id_payrol_potongan',$id);
      $this->db->update('trx_payrol_potongan',$data);
       return $this->db->affected_rows();
    }

    public function dataPegawaiDtlPayroll($wh=""){
        $this->db->select('a.*,ko.status_karyawan as stskar,ko.tanggal_masuk as tglmasuk,ko.tanggal_keluar as tglkeluar,b.id_master_perusahaan,b.nama_perusahaan,b.id_lokasi_kantor,d.deskripsi as desKabupaten,e.deskripsi as desDepartemen,e.id_departemen,f.jenis_project,g.kode_npwp,g.tempat_pembuatan,h.deskripsi as desAgama,i.deskripsi as desStsNikah,j.deskripsi as desPendidikan,k.nama_sekolah,k.jurusan,k.tahun_masuk,k.tahun_lulus,l.nama_perusahaan as nama_instansi,l.nama_jabatan,l.tahun_mulai,l.tahun_selesai,m.deskripsi as nama_kecamatan,n.id_kabupaten,n.deskripsi as nama_kabupaten,o.id_provinsi,o.deskripsi as nama_provinsi,q.id_karyawan_gaji,q.standar_gaji,q.nomor_rek,q.atas_nama_rek,r.id_bank,r.deskripsi as nama_bank,tpc.keterangan,tpc.biaya,tpc.disetorkan,tpc.tanggal,tpc.id,tpc.nominal,tb.nilai,tb.tipe_bpjs');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('master_perusahaan b','b.id_master_perusahaan=ko.id_master_perusahaan','left');
        $this->db->join('mst_lokasi_kantor c','c.id_lokasi_kantor=ko.id_lokasi_kantor','left');
        $this->db->join('mst_kabupaten d','d.id_kabupaten=c.id_kabupaten','left');
        $this->db->join('mst_departemen e','e.id_departemen=ko.id_departemen','left');
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
       // $this->db->join('master_projek_order p','ko.id_projek_order=p.id_projek_order','left');
        $this->db->join('trx_karyawan_gaji q','ko.nik=q.nik','left');
        $this->db->join('mst_bank r','q.id_bank=r.id_bank','left');
        $this->db->join('trx_payroll_create tpc','ko.nik=tpc.nik','left');
        $this->db->join('trx_bpjs tb','a.nik_ktp=tb.nik_ktp','left');
         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPegawaiDtlPayrollHistory($wh=""){
        $this->db->select('a.*,ko.status_karyawan as stskar,ko.lemburan,ko.tanggal_masuk as tglmasuk,ko.tanggal_keluar as tglkeluar,ko.gaji,b.id_master_perusahaan,b.nama_perusahaan,b.id_lokasi_kantor,d.deskripsi as desKabupaten,md.nama_departemen as desDepartemen,e.id_departemen,f.jenis_project,g.kode_npwp,g.tempat_pembuatan,h.deskripsi as desAgama,i.deskripsi as desStsNikah,j.deskripsi as desPendidikan,k.nama_sekolah,k.jurusan,k.tahun_masuk,k.tahun_lulus,l.nama_perusahaan as nama_instansi,l.nama_jabatan,l.tahun_mulai,l.tahun_selesai,m.deskripsi as nama_kecamatan,n.id_kabupaten,n.deskripsi as nama_kabupaten,o.id_provinsi,o.deskripsi as nama_provinsi,q.id_karyawan_gaji,q.standar_gaji,q.nomor_rek,q.atas_nama_rek,r.id_bank,r.deskripsi as nama_bank,tpc.keterangan,tpc.biaya,tpc.disetorkan,tpc.tanggal,tpc.id,tpc.nominal,tb.nilai,tb.tipe_bpjs,ch.nilai_bpjs_kes,ch.nilai_pph,ch.nilai_bpjs_tk,ch.nilai_tunj_koefisien,ch.bulan,ch.tahun,ch.nilai_tunj_tmk,ch.nilai_tunj_jabatan,ch.tunj_lainnya');
        $this->db->from('trx_create_history ch');
        $this->db->join('trx_karyawan a','a.nik=ch.nik','left');
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
       // $this->db->join('master_projek_order p','ko.id_projek_order=p.id_projek_order','left');
        $this->db->join('trx_karyawan_gaji q','ko.nik=q.nik','left');
        $this->db->join('mst_bank r','q.id_bank=r.id_bank','left');
        $this->db->join('trx_payroll_create tpc','ko.nik=tpc.nik','left');
        $this->db->join('trx_bpjs tb','a.nik_ktp=tb.nik_ktp','left');
         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
     public function ambildataapp5($wh=""){
        $this->db->select('pc.*,COALESCE(pa.jumapprove,0) as jumapprove');
        $this->db->from('trx_payroll_create pc');
        $this->db->join('trx_kontrak ko','pc.nik=ko.nik','left');
        $this->db->join('(select nik,bulan,tahun,count(*) as jumapprove from trx_payroll_approve group by nik,bulan,tahun) pa','pa.nik=pc.nik and pa.bulan=pc.bulan and pa.tahun=pc.tahun','left');
        $this->db->where('ko.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) ');
        if ($wh!="") {
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function updatepayapprove($data, $where){
      $this->db->where('nik',$where);
      $this->db->update('trx_payroll_approve',$data);
      return $this->db->affected_rows();
    }
    public function insertpayapprove($data){
        $this->db->insert('trx_payroll_approve',$data);
        return $this->db->affected_rows();
    }
    public function delPayrollCreate($where){   
      $this->db->where('nik',$where);
       $this->db->delete('trx_payroll_create');
    }

    public function dataPegawaiDtlPayrollApprove($wh=""){
        $this->db->select('a.*,ko.status_karyawan as stskar,ko.tanggal_masuk as tglmasuk,ko.tanggal_keluar as tglkeluar,b.id_master_perusahaan,b.nama_perusahaan,b.id_lokasi_kantor,d.deskripsi as desKabupaten,md.nama_departemen as desDepartemen,e.id_departemen,f.jenis_project,g.kode_npwp,g.tempat_pembuatan,h.deskripsi as desAgama,i.deskripsi as desStsNikah,j.deskripsi as desPendidikan,k.nama_sekolah,k.jurusan,k.tahun_masuk,k.tahun_lulus,l.nama_perusahaan as nama_instansi,l.nama_jabatan,l.tahun_mulai,l.tahun_selesai,m.deskripsi as nama_kecamatan,n.id_kabupaten,n.deskripsi as nama_kabupaten,o.id_provinsi,o.deskripsi as nama_provinsi,q.id_karyawan_gaji,q.standar_gaji,q.nomor_rek,q.atas_nama_rek,r.id_bank,r.deskripsi as nama_bank,tpa.keterangan,tpa.biaya,tpa.disetorkan,tpa.bulan,tpa.tahun,tb.nilai,tb.tipe_bpjs,ko.lemburan,ko.pph,ko.bpjs_tk,ko.bpjs_kes');
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
        //$this->db->join('master_projek_order p','ko.id_projek_order=p.id_projek_order','left');
        $this->db->join('trx_karyawan_gaji q','ko.nik=q.nik','left');
        $this->db->join('mst_bank r','q.id_bank=r.id_bank','left');
        $this->db->join('trx_payroll_approve tpa','ko.nik=tpa.nik','left');
        $this->db->join('trx_bpjs tb','a.nik_ktp=tb.nik_ktp','left');
         if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

    public function dataAlarmKontrak(){
        $this->db->select('a.nama_lengkap,b.deskripsi as desDepartemen,a.tanggal_keluar');
        $this->db->from('trx_karyawan a');
        $this->db->join('mst_departemen b','a.id_departemen=b.id_departemen','left');
        $this->db->where('month(a.tanggal_keluar)>=month(now()) AND month (a.tanggal_keluar)<=month(now()+interval 1 month) AND (a.status_karyawan = "3" OR a.status_karyawan="4")');
       

        return $this->db->get();
    }
    public function dataAlarmKontrakAll(){
      $date=date('Y-m-t');
        $date2=date("Y-m", strtotime("-2 month", strtotime(date('Y-m-d')))).'-01';
        $this->db->select('a.nama_lengkap,ko.tanggal_keluar,sp.status_pegawai');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_status_pegawai sp','sp.id_status_pegawai=ko.status_karyawan','left');
        $this->db->where('(ko.tanggal_keluar >= "'.$date2.'" AND ko.tanggal_keluar <= "'.$date.'") and ko.tanggal_keluar!="0000-00-00"');
        $this->db->order_by('ko.tanggal_keluar','desc');
        //$this->db->limit('7');
        return $this->db->get();
    }
    public function dataAlarmHabisKontrak(){
        $date=date('Y-m-t');
        $date2=date("Y-m", strtotime("-2 month", strtotime(date('Y-m-d')))).'-01';
        $this->db->select('a.nik,a.nama_lengkap,a.nama_panggilan,ko.tanggal_keluar,sp.status_pegawai');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_status_pegawai sp','sp.id_status_pegawai=ko.status_karyawan','left');
        $sts = array('2','3','4');
        $this->db->where_in('ko.status_karyawan',$sts);
      //   $this->db->where('ko.status_karyawan="2"');
      //   $this->db->where('(ko.tanggal_keluar >= "'.$date2.'" AND ko.tanggal_keluar <= "'.$date.'")');
        $this->db->order_by('ko.tanggal_keluar','desc');
        //$this->db->limit('7');
        return $this->db->get();
    }
    public function dataUltah($where=""){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
        if ($where!='') {
            $this->db->where($where);
        }
        //$this->db->limit('7');
        return $this->db->get();
    }
    public function dataAlarmKontrakPKWT(){
    	$date=date('Y-m');
    	$date2=date("Y-m", strtotime("-2 month", strtotime(date('Y-m-d'))));
        $this->db->select('a.nama_lengkap,b.deskripsi as desDepartemen,ko.tanggal_keluar,kab.deskripsi as desKabupaten');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_lokasi_kantor lk','lk.id_lokasi_kantor=ko.id_lokasi_kantor','left');
         $this->db->join('mst_kabupaten kab','kab.id_kabupaten=lk.id_kabupaten','left');
        $this->db->join('mst_departemen b','ko.id_departemen=b.id_departemen','left');
        $this->db->where('(ko.tanggal_keluar like "'.$date.'%" OR ko.tanggal_keluar like "'.$date2.'%") AND (ko.status_karyawan = "3")');
        $this->db->order_by('ko.tanggal_keluar','desc');
        //$this->db->limit('7');
        return $this->db->get();
    }
    public function dataAlarmKontrakPKWTT(){
    	$date=date('Y-m');
    	$date2=date("Y-m", strtotime("-2 month", strtotime(date('Y-m-d'))));
        $this->db->select('a.nama_lengkap,b.deskripsi as desDepartemen,ko.tanggal_keluar,kab.deskripsi as desKabupaten');
        $this->db->from('trx_karyawan a');
         $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
         $this->db->join('mst_lokasi_kantor lk','lk.id_lokasi_kantor=ko.id_lokasi_kantor','left');
         $this->db->join('mst_kabupaten kab','kab.id_kabupaten=lk.id_kabupaten','left');
        $this->db->join('mst_departemen b','ko.id_departemen=b.id_departemen','left');
        $this->db->where('(a.tanggal_keluar like "'.$date.'%" OR a.tanggal_keluar like "'.$date2.'%") AND (a.status_karyawan = "4")');
        $this->db->order_by('a.tanggal_keluar','desc');
       //  $this->db->limit('7');
        return $this->db->get();
    }
    public function dataAktifitasAbsensiKontrak($wh1="",$wh2="",$wh3="",$wh4="",$wh5=""){
        $this->db->select('a.*,b.nama_lengkap,c.nama_perusahaan,md.nama_departemen as deDepartemen,e.jenis_project');
        $this->db->from('trx_absensi a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('trx_kontrak ko','ko.nik=b.nik','left');
        $this->db->join('master_perusahaan c ','c.id_master_perusahaan=ko.id_master_perusahaan','left');
        $this->db->join('mst_departemen d ','d.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md ','md.id_master_departemen=d.id_master','left');
        $this->db->join('master_jenis_project e ','e.id_master_jenis_project=ko.id_jenis_project','left');
        if($wh1!=""){
            $this->db->where($wh1);
        }
        if($wh2!=""){
            $this->db->where($wh2,null,false);
        }
        if($wh3!=""){
            $this->db->like($wh3);
        }
        if($wh4!=""){
        $this->db->where($wh4);
        }
        if($wh5!=""){
            $this->db->where($wh5);
        }
        return $this->db->get();
    }
    public function dataAktifitasAbsensi($wh1="",$wh2="",$wh3="",$wh4="",$wh5=""){
        $this->db->select('a.*,b.nama_lengkap,c.nama_perusahaan,d.deskripsi as deDepartemen,e.jenis_project');
        $this->db->from('trx_absensi a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('master_perusahaan c ','c.id_master_perusahaan=b.id_master_perusahaan','left');
        $this->db->join('mst_departemen d ','b.id_departemen=d.id_departemen','left');
        $this->db->join('master_jenis_project e ','b.id_jenis_projek=e.id_master_jenis_project','left');
        if($wh1!=""){
            $this->db->where($wh1);
        }
        if($wh2!=""){
            $this->db->where($wh2,null,false);
        }
        if($wh3!=""){
            $this->db->like($wh3);
        }
        if($wh4!=""){
        $this->db->where($wh4);
        }
        if($wh5!=""){
            $this->db->where($wh5);
        }
        return $this->db->get();
    }
    public function data_absensi_employee($sts='',$jam=''){
        $this->db->select('a.nik,count(a.nik) as jum_absen');
        $this->db->from('trx_absensi a');
        $this->db->join('trx_karyawan b','b.nik=a.nik','left');
        $this->db->where('month(a.tanggal_mulai)=(month(now())-1)'); 
        if ($sts!='') {
            $this->db->where('a.status',$sts); 
        }if ($jam != '') {
            $this->db->where($jam,NULL,FALSE); 
        }
        $this->db->group_by('a.nik');
        return $this->db->get();
    }
    public function data_leave_request($sts=''){
        $this->db->select('a.nik,count(a.nik) as jum_cuti');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('mst_leave_kategori c','c.id_leave_kategori=a.id_leave_kategori','left');
        $this->db->where('month(a.tanggal)=month(now())');
        if ($sts!='') {
            $this->db->where('a.status',$sts);
        }
        $this->db->group_by('a.nik');
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

    public function datadtlcutipribadi($wh=""){
        $this->db->select('a.*,b.deskripsi');
        $this->db->from('trx_detail_cutipribadi_karyawan a');
        $this->db->join('mst_leave_kategori b','a.id_leave_kategori=b.id_leave_kategori','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

    public function dataPermohonanCutiKontrak($wh="",$wh1="",$wh2=array(),$wh3=array(),$wh4="",$wh5="",$wh6=""){
        $this->db->select('a.*,b.nama_lengkap,md.nama_departemen as desDepartemen,d.deskripsi as desCutiKategori,a.tanggal,ko.nama_atasan');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('trx_kontrak ko','ko.nik=b.nik','left');
        $this->db->join('mst_departemen c','c.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','c.id_master=md.id_master_departemen','left');
        $this->db->join('mst_leave_kategori d','a.id_leave_kategori=d.id_leave_kategori','left');
        if($wh!=""){
            $this->db->like($wh);
        }
        if($wh1!=""){
            $this->db->where($wh1);
        }
        if(count($wh2)>0 && count($wh3)>0 ){
              $this->db->where("a.tanggal >= '".$wh2['a.tanggal']."' AND a.sampe_tanggal <= '".$wh3['a.sampe_tanggal']."'",null,false);
        }
        if($wh4!=""){
            $this->db->where($wh4);
        }
        if($wh5!=""){
            $this->db->where($wh5);
        }
        if($wh6!=""){
            $this->db->where($wh6);
        }
        return $this->db->get();
    }

    public function dataPermohonanCutiKontrakHR($wh=""){
        $this->db->select('a.*,b.nama_lengkap,md.nama_departemen as desDepartemen,d.deskripsi as desCutiKategori,a.tanggal,ko.nama_atasan');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        $this->db->join('trx_kontrak ko','ko.nik=b.nik','left');
        $this->db->join('mst_departemen c','c.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','c.id_master=md.id_master_departemen','left');
        $this->db->join('mst_leave_kategori d','a.id_leave_kategori=d.id_leave_kategori','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

    public function dataPermohonanCuti($wh="",$wh1="",$wh2=array(),$wh3=array(),$wh4="",$wh5=""){
        $this->db->select('a.*,b.nama_lengkap,c.deskripsi as desDepartemen,d.deskripsi as desCutiKategori,a.tanggal');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
         $this->db->join('trx_kontrak ko','ko.nik=b.nik','left');
        $this->db->join('mst_departemen c','c.id_departemen=ko.id_departemen','left');
        $this->db->join('mst_leave_kategori d','a.id_leave_kategori=d.id_leave_kategori','left');
        if($wh!=""){
            $this->db->like($wh);
        }
        if($wh1!=""){
            $this->db->where($wh1);
        }
        if(count($wh2)>0 && count($wh3)>0 ){
              $this->db->where("a.tanggal >= '".$wh2['a.tanggal']."' AND a.sampe_tanggal <= '".$wh3['a.sampe_tanggal']."'",null,false);
        }
        if($wh4!=""){
            $this->db->where($wh4);
        }
        if($wh5!=""){
            $this->db->where($wh5);
        }
        return $this->db->get();
    }
    public function dataPermohonanCutidashboard($wh="",$wh2=""){
        $this->db->select('a.*,b.nama_lengkap,md.nama_departemen as desDepartemen,d.deskripsi as desCutiKategori,a.tanggal');
        $this->db->from('trx_absensi_leave a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
         $this->db->join('trx_kontrak ko','ko.nik=b.nik','left');
        $this->db->join('mst_departemen c','c.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=c.id_master','left');
        $this->db->join('mst_leave_kategori d','a.id_leave_kategori=d.id_leave_kategori','left');
        
        if($wh!=""){
            $this->db->where($wh);
        }
        if($wh2!=""){
            $this->db->where($wh2);
        }
        return $this->db->get();
    }
     function ubahstscuti($id,$sts,$alasan){
      $this->db->where('id_absensi_leave',$id);
      $this->db->update('trx_absensi_leave',array('status'=>$sts,'alasan'=>$alasan));
      return $this->db->affected_rows();
    }
    function updatagaji($dt,$wh){
      $this->db->where($wh);
      $this->db->update('trx_payroll_create',$dt);
      return $this->db->affected_rows();
    }
    public function dataPekerjaan($wh=""){
        $this->db->select('*');
        $this->db->from('master_jenis_project');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPekerjaanL($wh="",$wh2=""){
        $this->db->select('l.*,j.jenis_project');
        $this->db->from('trx_loker l');
        $this->db->join('master_jenis_project j','j.id_master_jenis_project=l.id_master_jenis_project','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($wh2!=""){
            $this->db->where($wh2,null,false);
        }
        return $this->db->get();
    }
     public function dataJenisProjek($wh=""){
        $this->db->select('*');
        $this->db->from('master_jenis_project');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    
     public function dataJabatan(){
        $this->db->select('*');
        $this->db->from('mst_jabatan');
        return $this->db->get();
    }
    public function dataProject($wh=""){
        $this->db->select('*');
        $this->db->from('master_jenis_project');
        $this->db->where('id_master_jenis_project NOT IN (select id_master_jenis_project from trx_kpi)',NULL,False);
        if($wh!=""){
            $this->db->or_where($wh);
        }
        return $this->db->get();
    }
    public function dataLeaveKategori($wh=""){
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        if($wh!=""){
        	$this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataLemburOvertime($wh=""){
        $this->db->select('*');
        $this->db->from('trx_overtime');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataUMK(){
        $this->db->select('u.*,p.deskripsi as provinsi,k.deskripsi as kabupaten');
        $this->db->from('mst_umk u');
        $this->db->join('mst_kabupaten k','u.id_kabupaten=k.id_kabupaten','left');
        $this->db->join('mst_provinsi p','u.id_provinsi=p.id_provinsi','left');
        return $this->db->get();
    }
    public function dataProjekBlmAda(){
        $this->db->select('*');
        $this->db->from('master_jenis_project');
        $this->db->where('id_master_jenis_project NOT IN (select id_master_jenis_project from trx_kpi)',NULL,False);
        return $this->db->get();
    }
    public function dataJabatanBlmAda(){
        $this->db->select('*');
        $this->db->from('mst_jabatan');
        $this->db->where('id_jabatan NOT IN (select id_jabatan from trx_kpi)',NULL,False);
        return $this->db->get();
    }
    public function dataProvinsi($wh=""){
        $this->db->select('*');
        $this->db->from('mst_provinsi');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataProvinsiLokasi($wh=""){
        $this->db->select('p.*');
        $this->db->from('mst_provinsi p');
        $this->db->join('(select id_provinsi from mst_lokasi_kantor group by id_provinsi) l','l.id_provinsi=p.id_provinsi');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKabupatenUMK($where="",$id_kabupaten=""){
        $this->db->select('*');
        $this->db->from('mst_kabupaten');
        $kab="";
        if ($id_kabupaten!="") {
            $kab = "where id_kabupaten != '".$id_kabupaten."'";
        }
        $this->db->where('id_kabupaten not in (select id_kabupaten from mst_umk '.$kab.')');
        
        if($where!=""){
            $this->db->where($where);
        }     
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
    public function dataInformasiGajiTunjangan($nik){
        $this->db->select('a.*,b.jenis_tunjangan');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('mst_jenis_tunjangan b','a.id_jenis_tunjangan=b.id_jenis_tunjangan','left');
        $this->db->where('a.nik',$nik);
        return $this->db->get();
    }
    public function dataInformasiGajiTunjanganNPWP($nik_ktp){
        $this->db->select('*');
        $this->db->from('trx_npwp');
        $this->db->where('nik_ktp',$nik_ktp);
        return $this->db->get();
    }
    public function dataNPWP($wh){
        $this->db->select('*');
        $this->db->from('trx_npwp');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataUserKaryawan(){
        $this->db->select('u.*,a.nama_lengkap');
        $this->db->from('trx_user u');
        $this->db->join('trx_karyawan a','u.nik=a.nik','LEFT');
        $this->db->where('u.nik NOT IN (select nik FROM trx_user where id_jenis_user="3" group by nik) ');
        return $this->db->get();
    }
    public function settingperusahaan($where=""){
        $this->db->select('*');
        $this->db->from('mst_setting');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    public function dataUserHR($where=""){
        $this->db->select('u.*,a.nama_lengkap,ko.*,jp.jenis_project as jabatan');
        $this->db->from('trx_user u');
        $this->db->join('trx_kontrak ko','ko.nik=u.nik','left');
        $this->db->join('master_jenis_project jp','jp.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->join('trx_karyawan a','a.nik=ko.nik','LEFT');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    public function dataUsername($wh=""){
        $this->db->select('username');
        $this->db->from('trx_user');
        if($wh!=""){
            $this->db->where('username',$wh);
        }
        return $this->db->get();
    }
    public function dataUser($wh){
        $this->db->select('*');
        $this->db->from('trx_user');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataRiwayatKerja($wh){
        $this->db->select('*');
        $this->db->from('trx_karyawan_riwayat_kerja');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    } 
    public function dataKaryawan($wh=""){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataambilatasan($wh=""){
        $this->db->select('a.*,ko.id_master_perusahaan');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','a.nik=ko.nik','left');
         $this->db->where('ko.id_master_perusahaan > 0');
        return $this->db->get();
    }
    public function dataKaryawannilai($wh=""){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
        $this->db->where('nik not in (select nik from trx_review_score )',null,false);
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKaryawannilai2($wh=""){
        $this->db->select('a.nik,a.nama_lengkap,b.id_master_perusahaan');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak b','a.nik=b.nik','left');
        $this->db->where('a.nik not in (select nik from trx_review_score )',null,false);
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKaryawanpelatihan($wh=""){
        $this->db->select('a.*,b.id_jenis_project');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak b','a.nik=b.nik','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function data_aspek_penilaian(){
        $sql = "SELECT * FROM mst_review_aspek";
        $data = $this->db->query($sql);
        return $data;
    }
    public function dataKabupaten($wh=""){
        $this->db->select('*');
        $this->db->from('mst_kabupaten');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPerusahaanLokasi($wh=""){
        $this->db->select('p.*,k.deskripsi as desKabupaten,pro.deskripsi as desProvinsi,k.id_kabupaten,pro.id_provinsi');
        $this->db->from('master_perusahaan p');
        $this->db->join('mst_lokasi_kantor l','l.id_lokasi_kantor=p.id_lokasi_kantor','left');
        $this->db->join('mst_kabupaten k','k.id_kabupaten=l.id_kabupaten','left');
        $this->db->join('mst_provinsi pro','pro.id_provinsi=k.id_provinsi','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPerusahaanLokasi2($wh=""){
        $this->db->select('p.*');
        $this->db->from('master_perusahaan p');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKabupatenLokasi($wh=""){
        $this->db->select('k.*,l.id_lokasi_kantor,p.deskripsi as desProvinsi');
        $this->db->from('mst_kabupaten k');
        $this->db->join('mst_lokasi_kantor l','l.id_kabupaten=k.id_kabupaten','left');
        $this->db->join('mst_provinsi p','p.id_provinsi=k.id_provinsi','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    
    public function dataKecamatan($wh=""){
        $this->db->select('*');
        $this->db->from('mst_kecamatan');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPendidikan($wh=""){
        $this->db->select('*');
        $this->db->from('mst_pendidikan');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPendidikanKaryawan($wh=""){
        $this->db->select('*');
        $this->db->from('trx_karyawan_pendidikan');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataGaji($wh=""){
        $this->db->select('g.*');
        $this->db->from('trx_karyawan_gaji g');
        $this->db->join('trx_kontrak ko','ko.nik=g.nik','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKontrakKaryawan($wh=""){
        $this->db->select('ko.*,k.nama_lengkap');
        $this->db->from('trx_kontrak ko');
        $this->db->join('trx_karyawan k','k.nik=ko.nik','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPelamar($wh="",$wh2=""){
        $this->db->select('pl.*,b.*,l.id_jabatan as id_jabatan_loker');
        $this->db->from('trx_detail_pelamar_loker pl ');
        $this->db->join('trx_loker l ','l.id_loker=pl.id_loker','left');
        $this->db->join('trx_pelamar b','b.id_pelamar=pl.id_pelamar','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($wh2!=""){
            $this->db->where($wh2);
        }
        return $this->db->get();
    }
    public function dataPelamar2($wh=""){
        $this->db->select('pl.*,b.*,l.id_jabatan as id_jabatan_loker,l.id_master_jenis_project');
        $this->db->from('trx_detail_pelamar_loker pl ');
        $this->db->join('trx_loker l ','l.id_loker=pl.id_loker','left');
        $this->db->join('trx_pelamar b','b.id_pelamar=pl.id_pelamar','left');
        $this->db->where('pl.id_pelamar NOT IN (SELECT id_pelamar FROM trx_karyawan)', NULL, FALSE);
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataStsNikah($wh=""){
        $this->db->select('*');
        $this->db->from('mst_sts_nikah');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataAgama($wh=""){
        $this->db->select('*');
        $this->db->from('mst_agama');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    
    public function dataKlaimReimbursementFile($wh="",$wh1="",$wh2="",$wh3=""){
        $this->db->select('a.*');
        $this->db->from('trx_claim_detail_file a');
        if($wh!=""){
            $this->db->where($wh);
         }
        if($wh1!=""){
            $this->db->like($wh1);
        }
        if($wh2!=""){
            $this->db->like($wh2);
        }
        if($wh3!=""){
            $this->db->where($wh3);
        }
        return $this->db->get();
    }
    public function dataKlaimReimbursement($wh="",$wh1="",$wh2="",$wh3="",$wh4=""){
        $this->db->select('cr.*,b.jenis,c.nama_lengkap,c.id_departemen,md.nama_departemen as desDepartemen');
        //$this->db->from('trx_claim_detail_file a');
        $this->db->from('trx_claim_remburse cr');//,'a.id_claim_remburse=cr.id_claim_remburse','left');
        $this->db->join('mst_benefit b','b.id_benefit=cr.id_benefit','left');
        $this->db->join('trx_karyawan c','c.nik=cr.nik','left');
        $this->db->join('trx_kontrak ko','ko.nik=c.nik','left');
        $this->db->join('mst_departemen d','d.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','d.id_master=md.id_master_departemen','left');
        if($wh!=""){
            $this->db->where($wh);
         }
        if($wh1!=""){
            $this->db->like($wh1);
        }
        if($wh2!=""){
            $this->db->like($wh2);
        }
        if($wh3!=""){
            $this->db->where($wh3);
        }
        return $this->db->get();
    }
    public function dataLoker($wh="",$wh2=""){
        $this->db->select('a.*,d.jumPelamar,b.deskripsi as desJabatan,c.nama_divisi,f.deskripsi as desDepartemen,g.jenis_project');
        $this->db->from('trx_loker a');
        //$this->db->join('mst_lokasi_kantor e','a.id_lokasi=e.id_lokasi_kantor','inner');
      //  $this->db->join('mst_kabupaten h','e.id_kabupaten=h.id_kabupaten','left');
        $this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
        $this->db->join('mst_divisi c','a.id_divisi=c.id_divisi','left');
        $this->db->join('mst_departemen f','f.id_departemen=c.id_departemen','left');
        $this->db->join('master_jenis_project g','a.id_master_jenis_project=g.id_master_jenis_project','left');
        $this->db->join('(select id_loker,count(id_loker) as jumPelamar from trx_detail_pelamar_loker group by id_loker) d','d.id_loker=a.id_loker','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($wh!=""){
            $this->db->where($wh2);
        }
        return $this->db->get();
    }
      public function dataLoker2(){
        $this->db->select('a.id_loker,mp.nama_perusahaan,d.jumPelamar,h.deskripsi as desKabupaten,g.jenis_project');
        $this->db->from('trx_loker a');
        $this->db->join('mst_lokasi_kantor e','a.id_lokasi=e.id_lokasi_kantor','inner');
        $this->db->join('mst_kabupaten h','e.id_kabupaten=h.id_kabupaten','left');
        $this->db->join('master_perusahaan mp','a.id_master_perusahaan=mp.id_master_perusahaan','left');
        $this->db->join('master_jenis_project g','a.id_master_jenis_project=g.id_master_jenis_project','left');
        $this->db->join('(select id_loker,count(id_loker) as jumPelamar from trx_detail_pelamar_loker group by id_loker) d','d.id_loker=a.id_loker','left');
//        $this->db->group_by('a.id_loker');

        return $this->db->get();
    }
     public function dataLokerUbah($wh=""){
        $this->db->select('a.*,d.jumPelamar,f.tanggal,f.jenis,b.deskripsi as desJabatan,f.id_loker_jadwal,c.nama_divisi,g.deskripsi as desDepartemen,h.image as imageJabatan,h.jenis_project');
        $this->db->from('trx_loker a');
        // $this->db->join('mst_lokasi_kantor e','a.id_lokasi=e.id_lokasi_kantor','inner');
        //   $this->db->join('mst_kabupaten i','e.id_kabupaten=i.id_kabupaten','left');
        $this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
        $this->db->join('mst_divisi c','a.id_divisi=c.id_divisi','left');
        $this->db->join('mst_departemen g','g.id_departemen=c.id_departemen','left');
        $this->db->join('trx_loker_jadwal f','a.id_loker=f.id_loker','left');
        $this->db->join('master_jenis_project h','a.id_master_jenis_project=h.id_master_jenis_project','left');
        $this->db->join('(select id_loker,count(id_loker) as jumPelamar from trx_detail_pelamar_loker group by id_loker) d','d.id_loker=a.id_loker','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataAmbilJadwal($wh=""){
        $this->db->select('a.*');
        $this->db->from('trx_loker_jadwal a');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    function EditRecruitment($data,$id){
      $this->db->where('id_loker',$id);
      $this->db->update('trx_loker',$data);
    }
    function EditRecruitmentDtl($data,$id){
      $this->db->where('id_loker_jadwal',$id);
      $this->db->update('trx_loker_jadwal',$data);
    }

    // public function dataLoker($wh=""){
    //     $this->db->select('a.*,d.jumPelamar,e.nama_lokasi,b.deskripsi as desJabatan,c.nama_divisi,f.deskripsi as desDepartemen');
    //     $this->db->from('trx_loker a');
    //     $this->db->join('mst_lokasi_kantor e','a.id_lokasi=e.id_lokasi_kantor','inner');
    //     $this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
    //     $this->db->join('mst_divisi c','a.id_divisi=c.id_divisi','left');
    //     $this->db->join('mst_departemen f','f.id_departemen=c.id_departemen','left');
    //     $this->db->join('(select id_loker,count(id_loker) as jumPelamar from trx_detail_pelamar_loker group by id_loker) d','d.id_loker=a.id_loker','left');
    //     if($wh!=""){
    //         $this->db->where($wh);
    //     }
    //     return $this->db->get();
    // }

    // public function dataLokerUbah($wh=""){
    //     $this->db->select('a.*,d.jumPelamar,e.nama_lokasi,f.tanggal,f.jenis,b.deskripsi as desJabatan,c.nama_divisi,g.deskripsi as desDepartemen,b.image as imageJabatan');
    //     $this->db->from('trx_loker a');
    //     $this->db->join('mst_lokasi_kantor e','a.id_lokasi=e.id_lokasi_kantor','inner');
    //     $this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
    //     $this->db->join('mst_divisi c','a.id_divisi=c.id_divisi','left');
    //     $this->db->join('mst_departemen g','g.id_departemen=c.id_departemen','left');
    //     $this->db->join('trx_loker_jadwal f','a.id_loker=f.id_loker','left');
    //     $this->db->join('(select id_loker,count(id_loker) as jumPelamar from trx_detail_pelamar_loker group by id_loker) d','d.id_loker=a.id_loker','left');
    //     if($wh!=""){
    //         $this->db->where($wh);
    //     }
    //     return $this->db->get();
    // }

	public function data_kebijakan($wh1="",$wh2="",$wh3=""){
        $this->db->select('a.*,b.deskripsi as deskripsi_policetype,c.deskripsi as deskripsi_departemen');
        $this->db->from('trx_kebijakan a');
        $this->db->join('mst_policetype b','a.id_policetype=b.id_policetype','left');
        $this->db->join('mst_departemen c','a.id_departemen=c.id_departemen','left');
        if($wh1!=""){
            $this->db->where($wh1);
        }
        if($wh2!=""){
            $this->db->like($wh2);
        }
        if($wh3!=""){
            $this->db->where($wh3);
        }
        return $this->db->get();
    }
    public function dataKebijakanDetail($id){
        $this->db->select('a.*,b.deskripsi as deskripsi_policetype,c.deskripsi as deskripsi_departemen');
        $this->db->from('trx_kebijakan a');
        $this->db->join('mst_policetype b','a.id_policetype=b.id_policetype','left');
        $this->db->join('mst_departemen c','a.id_departemen=c.id_departemen','left');
        $this->db->where('a.id_kebijakan',$id);
        return $this->db->get();
    }
	public function TambahKebijakan($data){
        $this->db->insert('trx_kebijakan',$data);
        return $this->db->affected_rows();
    }
    function ubahstskebijakan($id,$sts){
      $this->db->where('id_kebijakan',$id);
      $this->db->update('trx_kebijakan',array('status'=>$sts));
    }

    public function dataPelatihan($wh1="",$wh2=""){
        $this->db->select('a.*,b.jumpeserta,mp.nama_perusahaan,md.nama_departemen as desDepartemen');
        $this->db->from('trx_training_jadwal a');
        $this->db->join('master_perusahaan mp','a.id_master_perusahaan=mp.id_master_perusahaan','left');
        $this->db->join('mst_departemen jp','a.id_departemen=jp.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=jp.id_master','left');
        $this->db->join('(select id_training_jadwal,count(id_training_jadwal) as jumpeserta from detail_training_jadwal group by id_training_jadwal) b','a.id_training_jadwal=b.id_training_jadwal','left');
         if($wh1!=""){
            $this->db->like($wh1);
        }
        if($wh2!=""){
            $this->db->like($wh2);
        }
        // $this->db->join('mst_departemen c','a.id_departemen=c.id_departemen','left');
        return $this->db->get();
    }
    public function ambildataPelatihan($id){
        $this->db->select('a.*');
        $this->db->from('trx_training_jadwal a');
        //$this->db->join('(select id_training_jadwal,count(id_training_jadwal) as jumpeserta from detail_training_jadwal group by id_training_jadwal) b','a.id_training_jadwal=b.id_training_jadwal','left');
         $this->db->where('a.id_training_jadwal',$id);

        // $this->db->join('mst_departemen c','a.id_departemen=c.id_departemen','left');
        return $this->db->get();
    }
    public function dataPelatihanDetail1($id){
        $this->db->select('a.*,c.nama_lengkap,b.alasan,b.nik,b.id_detail_training_jadwal,b.tanggal_mengambil,b.tanggal_keputusan,b.status_lulus,d.deskripsi as desjabatan,e.deskripsi as desdepartemen');
        $this->db->from('trx_training_jadwal a');
        $this->db->join('detail_training_jadwal b','a.id_training_jadwal=b.id_training_jadwal','left');
        $this->db->join('trx_karyawan c','c.nik=b.nik','left');
        $this->db->join('mst_jabatan d','c.id_jabatan=d.id_jabatan','left');
        $this->db->join('mst_departemen e','a.id_departemen=e.id_departemen','left');
        $this->db->where('a.id_training_jadwal',$id);
        return $this->db->get();
    }
    public function dataPelatihanDetail($id){
        $this->db->select('a.*,c.nama_lengkap,b.alasan,b.nik,b.id_detail_training_jadwal,b.tanggal_mengambil,b.tanggal_keputusan,b.status_lulus,d.deskripsi as desjabatan,e.deskripsi as desdepartemen');
        $this->db->from('detail_training_jadwal b ');
        $this->db->join('trx_training_jadwal a','a.id_training_jadwal=b.id_training_jadwal ','left');
        $this->db->join('trx_karyawan c','c.nik=b.nik','left');
        $this->db->join('mst_jabatan d','c.id_jabatan=d.id_jabatan','left');
        $this->db->join('mst_departemen e','a.id_departemen=e.id_departemen','left');
        $this->db->where('b.id_training_jadwal',$id);
        $this->db->where('b.status','1');

        return $this->db->get();
    }
    function ubahstslulus($id,$sts,$tgl,$alasan){
      $this->db->where('id_detail_training_jadwal',$id);
      $this->db->update('detail_training_jadwal',array('status_lulus'=>$sts,'tanggal_keputusan'=>$tgl,'alasan'=>$alasan));
    }

    public function dataPelatihanDetailpeserta($id){
        $this->db->select('*');
        $this->db->from('detail_training_jadwal ');
        $this->db->where('id_detail_training_jadwal',$id);
        return $this->db->get();
    }
    
    public function TambahPelatihan($data){
        $this->db->insert('trx_training_jadwal',$data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }
    public function TambahDtlPelatihan($data){
        $this->db->insert('detail_training_jadwal',$data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }

    public function TambahKPI($data){
        $this->db->insert('trx_kpi',$data);
        return $this->db->affected_rows();        
    }
    public function TambahTeguran($data){
        $this->db->insert('trx_teguran',$data);
        return $this->db->affected_rows();
    }
    public function dataTeguran($wh=""){
        $this->db->select('a.*,b.nama_lengkap');
        $this->db->from('trx_teguran a');
        $this->db->join('trx_karyawan b','a.nik=b.nik','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }

     public function dataKPI(){
        $this->db->select('a.*,b.jenis_project as deskripsi_jabatan');
        $this->db->from('trx_kpi a');
        //$this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
        $this->db->join('master_jenis_project b','a.id_master_jenis_project=b.id_master_jenis_project','left');
        return $this->db->get();
    }
    public function getKPI($id){
        $this->db->select('a.*,b.jenis_project as desjabatan');
        $this->db->from('trx_kpi a');
         //$this->db->join('mst_jabatan b','a.id_jabatan=b.id_jabatan','left');
         $this->db->join('master_jenis_project b','a.id_master_jenis_project=b.id_master_jenis_project','left');
        $this->db->where('a.id_kpi',$id);
        return $this->db->get();
    }

    public function dataKuesioner(){
        $this->db->select('a.*,b.deskripsi as deskripsi_departemen');
        $this->db->from('trx_questioner a');
        $this->db->join('mst_departemen b','a.id_departemen=b.id_departemen','left');
        $this->db->order_by('a.tanggal_mulai', 'DESC');
        return $this->db->get();
    }
    public function dataLokasi($wh=""){
        $this->db->select('a.*,c.deskripsi as desKabupaten');
        $this->db->from('mst_lokasi_kantor a');
        $this->db->join('mst_provinsi b','a.id_provinsi=b.id_provinsi','left');
        $this->db->join('mst_kabupaten c','a.id_kabupaten=c.id_kabupaten','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKuesionerDetail($id){
        $this->db->select('a.*,b.deskripsi as deskripsi_departemen');
        $this->db->from('trx_questioner a');
        $this->db->join('mst_departemen b','a.id_departemen=b.id_departemen','left');
        $this->db->where('id_questioner',$id);
        return $this->db->get();
    }
    public function dataKuesionerDetailPertanyaan($id){
        $this->db->select('*');
        $this->db->from('trx_questioner_pertanyaan');
        $this->db->where('id_questioner',$id);
        return $this->db->get();
    }
    public function TambahKuesioner($data){
        $this->db->insert('trx_questioner',$data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }
    function EditKuesioner($data,$id){
      $this->db->where('id_questioner',$id);
      $this->db->update('trx_questioner',$data);
    }
    function EditAbsensi($data,$id){
      $this->db->where('id_absensi',$id);
      $this->db->update('trx_absensi',$data);
      return $this->db->affected_rows();
    }
    function EditKuesionerpertanyaan($data,$id){
      $this->db->where($id);
      $this->db->update('trx_questioner_pertanyaan',$data);
    }
    function ubahstskuis($id,$sts){
      $this->db->where('id_questioner',$id);
      $this->db->update('trx_questioner',array('status'=>$sts));
    }
    public function insert_data($table,$data){
        $this->db->insert($table,$data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }
    public function TambahRecruitment($data){
        $this->db->insert('trx_loker',$data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }
    public function TambahRecruitmentDtl($data){
        $this->db->insert('trx_loker_jadwal',$data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }
    function ubahstsloker($id_loker,$sts){
        $this->db->where('id_loker',$id_loker);
        $this->db->update('trx_loker',array('status'=>$sts));
        return $this->db->affected_rows();
    }
    function ubahstslamar($id,$id_loker,$sts){
        $this->db->where('id_pelamar',$id);
        $this->db->where('id_loker',$id_loker);
        $this->db->update('trx_detail_pelamar_loker',array('status_lamar'=>$sts));
        return $this->db->affected_rows();
    }
    function ubahstsklaim($id,$sts,$alasan){
      $this->db->where('id_claim_remburse',$id);
      $this->db->update('trx_claim_remburse',array('status'=>$sts,'alasan'=>$alasan));
    }

    public function TambahKuesionerpertanyaan($data){
        $this->db->insert('trx_questioner_pertanyaan',$data);
    }
    public function dataReview($wh=""){
        $this->db->select('r.*,k.nama_lengkap');
        $this->db->from('trx_review_score r');
        $this->db->join('trx_karyawan k','k.nik=r.nik','left');
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
       // $this->db->join('master_p_o_marketing c','ko.id_projek_order=c.id_projek_order','left');
        $this->db->join('master_perusahaan d','ko.id_master_perusahaan=d.id_master_perusahaan','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKaryawanAbsensi($wh=""){
        $this->db->select('a.*,b.jenis_project,d.nama_perusahaan');
        $this->db->from('trx_karyawan a');
        $this->db->join('master_jenis_project b','a.id_jenis_projek=b.id_master_jenis_project','left');
        //$this->db->join('master_p_o_marketing c','a.id_projek_order=c.id_projek_order','left');
        $this->db->join('master_perusahaan d','c.id_master_perusahaan=d.id_master_perusahaan','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataKategoriCuti($wh=""){
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function TambahCuti($data){
        $this->db->insert('trx_absensi_leave',$data);
        return $this->db->affected_rows();
    }
    public function dataKontrak($wh="",$wh1="",$wh2="",$wh3="",$wh4=""){
        $this->db->select('a.nik,a.nama_lengkap,ko.status_karyawan,ko.tanggal_keluar,b.id_departemen,md.nama_departemen as des_departemen,d.jenis_project,ko.id_kontrak,sp.status_pegawai');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_departemen b','b.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=b.id_master','left');
        $this->db->join('mst_status_pegawai sp','sp.id_status_pegawai=ko.status_karyawan','left');
        $this->db->join('master_jenis_project d','d.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->where('ko.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) and ko.id_master_perusahaan!=""',null,false);
        if($wh!=""){
            $this->db->where($wh);
        }
         if($wh1!=""){
            $this->db->like($wh1);
        }
         if($wh2!=""){
            $this->db->where($wh2);
        }
         if($wh3!=""){
            $this->db->where($wh3);
        }
        if($wh4!=""){
            $this->db->where($wh4);
        }
        $this->db->where('ko.status_karyawan="2"');
        return $this->db->get();
    }
    public function dataResign($wh="",$wh1="",$wh2="",$wh3="",$wh4=""){
        $this->db->select('a.nik,a.nama_lengkap,ko.status_karyawan,ko.tanggal_keluar,b.id_departemen,md.nama_departemen as des_departemen,d.jenis_project,ko.id_kontrak,sp.status_pegawai');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_departemen b','b.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=b.id_master','left');
        $this->db->join('mst_status_pegawai sp','sp.id_status_pegawai=ko.status_karyawan','left');
        $this->db->join('master_jenis_project d','d.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->where('ko.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) and ko.id_master_perusahaan!=""',null,false);
        if($wh!=""){
            $this->db->where($wh);
        }
         if($wh1!=""){
            $this->db->like($wh1);
        }
         if($wh2!=""){
            $this->db->where($wh2);
        }
         if($wh3!=""){
            $this->db->where($wh3);
        }
        if($wh4!=""){
            $this->db->where($wh4);
        }
        $this->db->where('ko.status_karyawan="5"');
        return $this->db->get();
    }
    public function dataPegawai($wh="",$wh1="",$wh2="",$wh3=""){
        $this->db->select('a.*,b.deskripsi as des_departemen,c.nama_divisi,d.deskripsi as des_jabatan,jp.jenis_project,mp.nama_perusahaan');
        $this->db->from('trx_karyawan a');
        $this->db->join('mst_departemen b','a.id_departemen=b.id_departemen','left');
        $this->db->join('mst_divisi c','c.id_divisi=a.id_divisi','left');
        $this->db->join('mst_jabatan d','d.id_jabatan=a.id_jabatan','left');
        $this->db->join('mst_lokasi_kantor e','a.id_lokasi=e.id_lokasi_kantor','left');
        $this->db->join('master_jenis_project jp','a.id_jenis_projek=jp.id_master_jenis_project','left');
        $this->db->join('master_perusahaan mp','a.id_master_perusahaan=mp.id_master_perusahaan','left');
        if($wh!=""){
            $this->db->where($wh);
        }
         if($wh1!=""){
            $this->db->where($wh1);
        }
         if($wh2!=""){
            $this->db->like($wh2);
        }
         if($wh3!=""){
            $this->db->like($wh3);
        }
        return $this->db->get();
    }

    public function dataPegawaiChecked($wh=""){
        $this->db->select("a.*,d.id_detail_training_jadwal,COALESCE(dtj.jumny, '0') as jum") ;
        $this->db->from('trx_karyawan a');
        $this->db->join("(select b.nik, COALESCE(count(b.nik),'0') as jumny from detail_training_jadwal b left join trx_training_jadwal c on c.id_training_jadwal=b.id_training_jadwal group by b.nik) dtj",'dtj.nik=a.nik','left');
        $this->db->join('detail_training_jadwal d','d.nik=a.nik','left');
        $this->db->join('trx_training_jadwal e','e.id_training_jadwal=d.id_training_jadwal','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataPegawaiJumChecked($wh="",$id=""){
        $this->db->select("a.*,COALESCE(dtj.jumny, '0') as jum");
        $this->db->from('trx_karyawan a');
        $idw="";
        if($id!=""){
            $idw=" where id_training_jadwal='".$id."' "; 
        }
        $this->db->join("(select b.nik, count(b.nik) as jumny from detail_training_jadwal b ".$idw." group by b.nik) dtj",'dtj.nik=a.nik','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataDepartemenKontrak($wh=""){
        $this->db->select('a.*');
        $this->db->from('mst_departemen a');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function dataJabatanKontrak($wh=""){
        $this->db->select('*');
        $this->db->from('mst_jabatan');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function ambilDataDept($wh="",$whi=""){
        $this->db->select('*');
        $this->db->from('master_departemen');
        if($wh!=""){
            $this->db->where($wh);
        }
        if($whi!=""){
             $this->db->where_not_in('id_master_departemen');
        }
        return $this->db->get();
    }
    public function dataDivisi($wh=""){
        $this->db->select('*');
        $this->db->from('mst_divisi');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function ambilDataDepartemen($wh=""){
        $this->db->select('a.*,d.jumkaryawan,x.nama_departemen');
        $this->db->from('mst_departemen a');
        $this->db->join('(select id_departemen,count(id_departemen) as jumkaryawan from trx_kontrak group by id_departemen) d','d.id_departemen=a.id_departemen','left');
        $this->db->join('master_departemen x','x.id_master_departemen=a.id_master','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function ambilDataLokasi($wh=""){
        $this->db->select('a.*,d.deskripsi as deskab,e.deskripsi as desprov');
        $this->db->from('mst_lokasi_kantor a');
        $this->db->join('mst_kabupaten d','d.id_kabupaten=a.id_kabupaten','left');
        $this->db->join('mst_provinsi e','e.id_provinsi=a.id_provinsi','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    public function manageUser($where=""){
        $this->db->select('a.*,jumlah.jum_jabatan,b.nama_modul,c.jenis_project as jabatan');
        $this->db->from('trx_jenis_user_detail a');
        $this->db->join('mst_modul b','a.id_modul=b.id_modul','left');
        $this->db->join('master_jenis_project c','a.id_jabatan=c.id_master_jenis_project','left');
        $this->db->join('(select id_jabatan,count(id_modul)as jum_jabatan from trx_jenis_user_detail group by id_jabatan)as jumlah','a.id_jabatan=jumlah.id_jabatan','left');
        $this->db->where('id_jenis_user',3);
        if ($where!="") {
            $this->db->where($where);
        }
//        $this->db->group_by('a.id_jabatan'); 

        return $this->db->get();
    }
    public function manageUser2($where=""){
        $this->db->select(' b.jenis_project ,a.id_jabatan,a.id_jenis_user,count(a.id_modul)as jum_jabatan ');
        $this->db->from('trx_jenis_user_detail a');
        $this->db->join('master_jenis_project b','a.id_jabatan=b.id_master_jenis_project','left');
        $this->db->where('a.id_jenis_user',3);
        if ($where!="") {
            $this->db->where($where);
        }
        $this->db->group_by('a.id_jabatan'); 

        return $this->db->get();
    }

    public function dataJenisUser(){
        $this->db->select('*');
        $this->db->from('mst_jenis_user');
        $this->db->where('id_jenis_user',3);
        return $this->db->get();
    }
    public function dataJabatanManageUser(){
        $this->db->select('*');
        $this->db->from('master_jenis_project');
      //  $this->db->where_in('id_master_jenis_project',array(128,129,20,29,130,131,132,133,134,135,136,3,64,137));
        $this->db->where('id_master_jenis_project NOT IN (select id_jabatan from trx_jenis_user_detail group by id_jabatan)');
        return $this->db->get();
    }

    public function dataModulParent($where=""){
        $this->db->select('*');
        $this->db->from('mst_modul');
        $this->db->where('(status!="1" AND parent=0) AND (link like "%#%" OR link like "%HR%")  ');
        if ($where!="") {
            $this->db->where($where);
        }
        $this->db->order_by('sort','ASC');
        return $this->db->get();
    }
    public function dataModulAnak($where=""){
        $this->db->select('*');
        $this->db->from('mst_modul');
        $this->db->where('(status!="1" AND parent > 0) AND link like "%HR%" ');
        if ($where!="") {
            $this->db->where($where);
        }
        $this->db->order_by('sort','ASC');
        return $this->db->get();
    }

    public function dataViewModulAnak($where=""){
        $this->db->select('u.*,a.akses,a.approval');
        $this->db->from('mst_modul u');
        $this->db->join('trx_jenis_user_detail a','a.id_modul=u.id_modul','left');
        $this->db->where('(status!="1" AND parent > 0) AND link like "%HR%" ');
        if ($where!="") {
            $this->db->where($where);
        }
        $this->db->order_by('sort','ASC');
        return $this->db->get();
    }

    public function viewmanageUserParent($where=""){
        $this->db->select('a.*,b.nama_modul,b.link,b.parent,c.jenis_project as jabatan');
        $this->db->from('trx_jenis_user_detail a');
        $this->db->join('mst_modul b','a.id_modul=b.id_modul','left');
        $this->db->join('master_jenis_project c','a.id_jabatan=c.id_master_jenis_project','left');
        if ($where!="") {
            $this->db->where($where);
        }
        $this->db->where('(status!="1" AND parent=0) AND (link like "%#%" OR link like "%HR%") ');
        return $this->db->get();
    }

     public function dataPerusahaanClient($wh=""){
        $this->db->select('a.*,d.deskripsi as desKabupaten,e.id_provinsi,g.jumlokasi');
        $this->db->from('master_perusahaan a');
        $this->db->join('(select id_master_perusahaan,count(id_master_perusahaan) as jumlokasi from mst_lokasi_kantor group by id_master_perusahaan) g','g.id_master_perusahaan=a.id_master_perusahaan','left');
        $this->db->join('mst_lokasi_kantor f','a.id_master_perusahaan=f.id_master_perusahaan','left');
        $this->db->join('mst_kabupaten d','d.id_kabupaten=f.id_kabupaten','left');
        $this->db->join('mst_provinsi e','e.id_provinsi=f.id_provinsi','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        $this->db->where("g.jumlokasi>0",null,false);
        return $this->db->get();
    }
    public function dataPerusahaanOnly($wh=""){
        $this->db->select('a.*');
        $this->db->from('master_perusahaan a');
       // $this->db->join('(select id_master_perusahaan,count(id_master_perusahaan) as jumlokasi from mst_lokasi_kantor group by id_master_perusahaan) g','g.id_master_perusahaan=a.id_master_perusahaan','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        // $this->db->where("g.jumlokasi>0",null,false);
        // $this->db->order_by("a.nama_perusahaan","asc");
        return $this->db->get();
    }
    public function dataPerusahaan($wh=""){
        // $this->db->select('a.*,d.deskripsi as desKabupaten,e.id_provinsi');
        $this->db->select('a.*');
        $this->db->from('master_perusahaan a');
        // $this->db->join('mst_lokasi_kantor f','a.id_lokasi_kantor=f.id_lokasi_kantor','left');
        // $this->db->join('mst_kabupaten d','d.id_kabupaten=f.id_kabupaten','left');
        // $this->db->join('mst_provinsi e','e.id_provinsi=f.id_provinsi','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }


    public function dataCompany(){
        $this->db->select('*');
        $this->db->from('mst_company');
        return $this->db->get();
    }
    public function dataDepartemen(){
        $this->db->select('a.*,b.nama_lengkap,c.jumdivisi,d.jumkaryawan,md.nama_departemen');
        $this->db->from('mst_departemen a');
        $this->db->join('master_departemen md','a.id_master=md.id_master_departemen','left');
        $this->db->join('trx_kontrak ko','ko.id_departemen=a.id_departemen','left');
        $this->db->join('trx_karyawan b','b.nik=ko.nik','left');
        $this->db->join('(select id_departemen,count(id_departemen) as jumdivisi from mst_divisi group by id_departemen) c','a.id_departemen=c.id_departemen','left');
         $this->db->join('(select id_departemen,count(id_departemen) as jumkaryawan from trx_karyawan group by id_departemen) d','d.id_departemen=a.id_departemen','left');
        return $this->db->get();
    }
    public function dataKlienDepartemen(){
        $this->db->select('e.id_master_perusahaan,e.id_lokasi_kantor,d.jumkaryawan,e.nama_perusahaan,c.jumdepartemen,f.jumlokasi');
        $this->db->from('master_perusahaan e');
        $this->db->join('(select id_master_perusahaan,count(id_master_perusahaan) as jumlokasi from mst_lokasi_kantor group by id_master_perusahaan) f','f.id_master_perusahaan=e.id_master_perusahaan','left');
        $this->db->join('(select id_master_perusahaan,count(id_master_perusahaan) as jumdepartemen from mst_departemen group by id_master_perusahaan) c','e.id_master_perusahaan=c.id_master_perusahaan','left');
        $this->db->join('(select id_master_perusahaan,count(id_master_perusahaan) as jumkaryawan from trx_kontrak group by id_master_perusahaan) d','d.id_master_perusahaan=e.id_master_perusahaan','left');
        //$this->db->where('f.jumlokasi > 0');
        return $this->db->get();
    }
    public function TambahManageJenisUser($data){
        $this->db->insert('trx_jenis_user_detail',$data);
        return $this->db->affected_rows();
    }
    public function TambahLeaveKategory($data){
        $this->db->insert('mst_leave_kategori',$data);
        return $this->db->affected_rows();
    }
    public function TambahSettingLembur($data){
        $this->db->insert('mst_lembur',$data);
        return $this->db->affected_rows();
    }
    public function TambahUMK($data){
        $this->db->insert('mst_umk',$data);
        return $this->db->affected_rows();
    }
    public function TambahAktifasiAbsensi($data){
        $this->db->insert('trx_absensi',$data);
        return $this->db->insert_id();
    }
    public function TambahJabatan($data){
        $this->db->insert('mst_jabatan',$data);
        return $this->db->affected_rows();
    }
    public function TambahJenisProject($data){
        $this->db->insert('master_jenis_project',$data);
        return $this->db->affected_rows();
    }
    public function TambahDepartemen($data){
        $this->db->insert('mst_departemen',$data);
        return $this->db->affected_rows();
    }
    public function TambahDivisi($data){
        $this->db->insert('mst_divisi',$data);
        return $this->db->affected_rows();
    }

    public function data_lokasi_kantor(){
        $this->db->select('a.*,p.deskripsi as provinsi,k.deskripsi as kabupaten');
        $this->db->from('mst_lokasi_kantor a');
        $this->db->join('mst_kabupaten k','a.id_kabupaten=k.id_kabupaten','left');
        $this->db->join('mst_provinsi p','a.id_provinsi=p.id_provinsi','left');
        return $this->db->get();
    }

    public function TambahLokasiKantor($data){
        $this->db->insert('mst_lokasi_kantor',$data);
        return $this->db->affected_rows();
    }
    public function getLokasiKantor($id){
        $this->db->select('*');
        $this->db->from('mst_lokasi_kantor ');
        $this->db->where('id_lokasi_kantor ',$id);
        return $this->db->get();
    }

    public function data_bank_payroll(){
        $this->db->select('*');
        $this->db->from('mst_bank');
        return $this->db->get();
    }
    public function data_setting_lembur(){
        $this->db->select('*');
        $this->db->from('mst_lembur');
        return $this->db->get();
    }
    public function TambahBankPayroll($data){
        $this->db->insert('mst_bank',$data);
        return $this->db->affected_rows();
    }
    public function getBankPayroll($id){
        $this->db->select('*');
        $this->db->from('mst_bank ');
        $this->db->where('id_bank ',$id);
        return $this->db->get();
    }

    public function data_jenis_tunjangan(){
        $this->db->select('*');
        $this->db->from('mst_jenis_tunjangan');
        return $this->db->get();
    }
    public function data_jenis_tunjangan_karyawan($wh=""){
        $this->db->select('a.*,b.jenis_tunjangan');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('mst_jenis_tunjangan b','b.id_jenis_tunjangan=a.id_jenis_tunjangan','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    // public function data_projek_order($wh=""){
    //     $this->db->select('*');
    //     $this->db->from('master_projek_order');
    //     if($wh!=""){
    //         $this->db->where($wh);
    //     }
    //     return $this->db->get();
    // }
    //  public function data_po_marketing($wh=""){
    //     $this->db->select('a.*,b.id_master_perusahaan');
    //     $this->db->from('master_projek_order a');
    //     $this->db->join('master_p_o_marketing b','a.id_projek_order=b.id_projek_order','left');
    //     if($wh!=""){
    //         $this->db->where($wh);
    //     }
    //     return $this->db->get();
    // }
    // public function data_info_gaji($wh="",$wh1="",$wh2="",$wh3="",$wh4=""){
    //     $this->db->select('a.*,b.nama_lengkap,e.deskripsi as des_departemen,c.deskripsi as des_bank,ko.id_master_perusahaan');
    //     $this->db->from('trx_karyawan_gaji a');
    //     $this->db->join('trx_kontrak ko','a.nik=ko.nik','left');
    //     $this->db->join('trx_karyawan b','b.nik=a.nik','left');
    //     $this->db->join('mst_bank c','c.id_bank=a.id_bank','left');
    //     $this->db->join('mst_departemen e','e.id_departemen=ko.id_departemen','left');
    //     $this->db->where('ko.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik)',null,false);
    //     if($wh!=""){
    //         $this->db->where($wh);
    //     }
    //      if($wh1!=""){
    //         $this->db->like($wh1);
    //     }
    //      if($wh2!=""){
    //         $this->db->where($wh2);
    //     }
    //      if($wh3!=""){
    //         $this->db->where($wh3);
    //     }
    //     if($wh4!=""){
    //         $this->db->where($wh4);
    //     }
    //     return $this->db->get();
    // }
    public function data_info_gaji($wh="",$wh1="",$wh2="",$wh3="",$wh4=""){
        $this->db->select('a.*,md.nama_departemen as des_departemen,c.deskripsi as des_bank,ko.id_master_perusahaan,kg.nomor_rek,ko.gaji,mp.nama_perusahaan');
        $this->db->from('trx_karyawan a');
        $this->db->join('trx_kontrak ko','a.nik=ko.nik','left');
        $this->db->join('trx_karyawan_gaji kg','kg.nik=a.nik','left');
        $this->db->join('mst_bank c','c.id_bank=kg.id_bank','left');
        $this->db->join('master_perusahaan mp','mp.id_master_perusahaan=ko.id_master_perusahaan','left');
        $this->db->join('mst_departemen e','e.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=e.id_master','left');
        $this->db->where('ko.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik)',null,false);
        $this->db->where('ko.id_master_perusahaan!=',0);
        if($wh!=""){
            $this->db->where($wh);
        }
         if($wh1!=""){
            $this->db->like($wh1);
        }
         if($wh2!=""){
            $this->db->where($wh2);
        }
         if($wh3!=""){
            $this->db->where($wh3);
        }
        if($wh4!=""){
            $this->db->where($wh4);
        }
        return $this->db->get();
    }
    public function ambilperusahaan($wh=""){
        $this->db->select('*');
        $this->db->from('master_perusahaan');
        if($wh!=""){
            $this->db->where($wh);
        }
        $this->db->order_by('id_master_perusahaan','asc');
        return $this->db->get();
    }
    public function ambilidperusahaan(){
        $this->db->select('id_master_perusahaan');
        $this->db->from('master_perusahaan');
        $this->db->order_by('id_master_perusahaan','asc');
        $this->db->limit(1);
        return $this->db->get();
    }
    public function ambildtjt($wh="",$wh1="",$wh2="",$wh3=""){
        $this->db->select('a.*,b.nama_lengkap,md.nama_departemen as deskripsi');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('trx_karyawan b','b.nik=a.nik','left');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_departemen c','c.id_departemen=ko.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=c.id_master','left');
        if($wh!=""){
            $this->db->where('a.id_jenis_tunjangan',$wh);
        }
        if($wh1!=""){
            $this->db->where($wh1);
        }
        if($wh2!=""){
            $this->db->like($wh2);
        }
        if($wh3!=""){
            $this->db->like($wh3);
        }
        return $this->db->get();
    }
     public function data_edit_tunjangan($wh=''){
        $this->db->select('a.*,b.nama_lengkap,md.nama_departemen as des_departemen,d.jenis_project as des_jabatan');
        $this->db->from('trx_karyawan_gaji_lainnya a');
        $this->db->join('trx_karyawan b','b.nik=a.nik','left');
        $this->db->join('trx_kontrak ko','ko.nik=a.nik','left');
        $this->db->join('mst_departemen c','c.id_departemen=ko.id_departemen','left');
        $this->db->join('master_jenis_project d','d.id_master_jenis_project=ko.id_jenis_project','left');
        $this->db->join('master_departemen md','md.id_master_departemen=c.id_master','left');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
    function ubahnilaitunjangan($id){
      $this->db->where('id_pelamar',$id);
      $this->db->update('trx_pelamar',array('status_lamar'=>$sts));
    }
    function Updatepersonil($data,$id){
      $this->db->where('id_kontrak',$id);
      $this->db->update('trx_kontrak',$data);
      return $this->db->affected_rows();
    }
    function Updatepersonilbatch($data){
      $this->db->update_batch('trx_kontrak',$data,'id_kontrak');
      return $this->db->affected_rows();
    }
    function Updategaji($data,$id){
      $this->db->where('id_kontrak',$id);
      $this->db->update('trx_kontrak',$data);
    }
    function Updatekorlap($data,$id){
      $this->db->where('id_kontrak',$id);
      $this->db->update('trx_kontrak',$data);
    }

    public function TambahJenisTunjangan($data){
        $this->db->insert('mst_jenis_tunjangan',$data);
        return $this->db->affected_rows();
    }
    public function getDepartemen($id){
        $this->db->select('*');
        $this->db->from('mst_departemen');
        $this->db->where('id_departemen',$id);
        return $this->db->get();
    }
    public function getDept($id){
        $this->db->select('a.*,d.nama_departemen');
        $this->db->from('mst_departemen a');
        $this->db->join('master_departemen d','a.id_master=d.id_master_departemen','left');
        $this->db->where('a.id_departemen',$id);
        return $this->db->get();
    }
    public function getLeaveKategory($id){
        $this->db->select('*');
        $this->db->from('mst_leave_kategori');
        $this->db->where('id_leave_kategori',$id);
        return $this->db->get();
    }
    public function getSettingLembur($id){
        $this->db->select('*');
        $this->db->from('mst_lembur');
        $this->db->where('id_lembur',$id);
        return $this->db->get();
    }
    public function getUMK($id){
        $this->db->select('*');
        $this->db->from('mst_umk');
        $this->db->where('id_umk',$id);
        return $this->db->get();
    }
    public function getJabatan($id){
        $this->db->select('*');
        $this->db->from('mst_jabatan');
        $this->db->where('id_jabatan',$id);
        return $this->db->get();
    }
    public function getJenisProject($id){
        $this->db->select('*');
        $this->db->from('master_jenis_project');
        $this->db->where('id_master_jenis_project',$id);
        return $this->db->get();
    }
    public function getJenisTunjangan($id){
        $this->db->select('*');
        $this->db->from('mst_jenis_tunjangan');
        $this->db->where('id_jenis_tunjangan',$id);
        return $this->db->get();
    }

    public function data_tipe_kebijakan(){
        $this->db->select('*');
        $this->db->from('mst_policetype');
        return $this->db->get();
    }
    public function TambahTipeKebijakan($data){
        $this->db->insert('mst_policetype',$data);
        return $this->db->affected_rows();
    }
    public function getTipeKebijakan($id){
        $this->db->select('*');
        $this->db->from('mst_policetype');
        $this->db->where('id_policetype',$id);
        return $this->db->get();
    }
    public function TambahStatusUser($data){
        $this->db->insert('trx_user',$data);
        return $this->db->affected_rows();
    }
    public function del_data($table,$id){
        $this->db->delete($table,$id);
        return $this->db->affected_rows();
    }
    public function upd_data($table,$data,$id){
        $this->db->update($table, $data,$id);
        return $this->db->affected_rows();
    }

    public function datPengumumanPerusahaan(){
        $this->db->select('*');
        $this->db->from('trx_pengumuman_perusahaan ');
        return $this->db->get();
    }
    public function TambahPengumumanPerusahaan($data){
        $this->db->insert('trx_pengumuman_perusahaan',$data);
        return $this->db->affected_rows();
    }
     public function getPengumumanPerusahaan($id){
        $this->db->select('*');
        $this->db->from('trx_pengumuman_perusahaan ');
        $this->db->where('id_pengumuman_perusahaan',$id);
        return $this->db->get();
    }

    public function dataBerita($wh="",$wh1=""){
        $this->db->select('*');
        $this->db->from('trx_berita');
        if($wh!=""){
            $this->db->like($wh);
        }
        if($wh1!=""){
            $this->db->where($wh1);
        }
        return $this->db->get();
    }
    public function dataBeritaDetail($id){
        $this->db->select('*');
        $this->db->from('trx_berita');
        $this->db->where('id_berita',$id);
        return $this->db->get();
    }
    public function TambahBerita($data){
        $this->db->insert('trx_berita',$data);
        return $this->db->affected_rows();
    }
    public function EditBerita($data,$dt){
        $this->db->where($data);
        $this->db->update('trx_berita',$dt);
        return $this->db->affected_rows();
    }
    function ubahsts($id,$sts){
      $this->db->where('id_berita',$id);
      $this->db->update('trx_berita',array('status'=>$sts));
    }


     public function data_departemen(){
        $this->db->select('*');
        $this->db->from('mst_departemen');
        return $this->db->get();
    }
     
	
	
	//modul payrol
    public function cekPayrollCSV($where,$like){
        $this->db->select('*');
        $this->db->from('trx_payroll_create');
        $this->db->where($where);
        $this->db->like($like);
        return $this->db->get();
    }

    public function cekkaryawanpayroll($where){
        $this->db->select('*');
        $this->db->from('trx_karyawan');
        $this->db->where($where);
        return $this->db->get();
    }

	public function TambahPayrolCSV($data){
        $this->db->insert('trx_payroll_create',$data);
        return $this->db->affected_rows();
    }
	
    public function TambahApprovePayrol($data = array()){
        $insert = $this->db->insert_batch('trx_payroll_approve',$data);
        return $insert?true:false;
    }

    public function payrollCreate($where=""){
        $this->db->select('id,id_bank,bulan,tahun,tanggal,no,nik,nama,rekening,nominal,keterangan,rekening_perusahaan,plus,cd,biaya,disetorkan');
        $this->db->from('trx_payroll_create');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    public function delPayrollApprove($table){
        $this->db->empty_table($table);
        return $this->db->affected_rows();
    }
    public function payrollApprove($where=""){
        $this->db->select('a.*,b.deskripsi as bank,p.nama_perusahaan,d.deskripsi as desDepartemen,j.jenis_project as desJabatan');
        $this->db->from('trx_payroll_approve a');
        $this->db->join('mst_bank b','a.id_bank=b.id_bank','left');
        $this->db->join('trx_karyawan k','a.nik=k.nik','left');
        $this->db->join('trx_kontrak ko','k.nik=ko.nik','left');
        $this->db->join('master_perusahaan p','p.id_master_perusahaan=ko.id_master_perusahaan','left');
        $this->db->join('mst_departemen d','d.id_departemen=ko.id_departemen','left');
        $this->db->join('master_jenis_project j','j.id_master_jenis_project=ko.id_jenis_project','left');
        if ($where != "") {
            $this->db->where($where);
        }
        return $this->db->get();
    }
	
	public function dataPayrolCSV($where="",$wh1=""){
        $this->db->select('pc.*,ky.nama_lengkap,p.nama_perusahaan,md.nama_departemen,jp.jenis_project,b.deskripsi as nama_bank');
        $this->db->from('trx_payroll_create pc');
        $this->db->join('trx_karyawan ky','pc.nik=ky.nik','left');
		$this->db->join('trx_kontrak ko','pc.nik=ko.nik','left');
        $this->db->join('master_perusahaan p','ko.id_master_perusahaan=p.id_master_perusahaan','left');
	    $this->db->join('mst_departemen d','ko.id_departemen=d.id_departemen','left');
        $this->db->join('master_departemen md','md.id_master_departemen=d.id_master','left');
        $this->db->join('master_jenis_project jp','ko.id_jenis_project=jp.id_master_jenis_project','left');
        $this->db->join('mst_bank b','pc.id_bank=b.id_bank','left');
		
		// $this->db->join('trx_karyawan_gaji kg','pc.nik=kg.nik','left');
        
  //       
        if ($where!="") {
            $this->db->where($where);
        }if ($wh1!="") {
            $this->db->like($wh1);
        }
        
        return $this->db->get();
    }

    public function dataPayrolApprove($wh="",$where=""){
        $this->db->select('pa.*,d.deskripsi as departemen,p.nama_perusahaan as perusahaan,b.deskripsi as bank,jp.jenis_project as jabatan');
        $this->db->from('trx_payroll_approve pa');
        $this->db->join('trx_kontrak k','pa.nik=k.nik','left');
        $this->db->join('mst_departemen d','k.id_departemen=d.id_departemen','left');
        $this->db->join('master_perusahaan p','k.id_master_perusahaan=p.id_master_perusahaan','left');
        $this->db->join('trx_karyawan_gaji kg','pa.nik=kg.nik','left');
        $this->db->join('mst_bank b','pa.id_bank=b.id_bank','left');
        $this->db->join('master_jenis_project jp','k.id_jenis_project=jp.id_master_jenis_project','left');
        $this->db->where('(month(pa.tanggal)=(month(now())) OR month(pa.tanggal)=(month(now()-1)))');
        if ($where!="") {
            $this->db->where($where);
        }
        if ($wh!="") {            
            $this->db->like($wh);
        }

        return $this->db->get();
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

	 function ubahStatusPayrollCreate($sts, $where){
      $this->db->where($where);
		 
      $this->db->update('trx_payroll_create',array('status'=>$sts));
      return $this->db->affected_rows();
    }
	
	
	
    public function mailserver($wh=""){
        $this->db->select('*');
        $this->db->from('mail_server');
        if($wh!=""){
            $this->db->where($wh);
        }
        return $this->db->get();
    }
	
	
	//Grafik
	public function data_grafik_aktif($tahun){
		
		
		$query = "";
		for($idx =1; $idx < 13; $idx++){
			if($idx > 1){ $query.=" UNION ALL ";}
			// $query .= "SELECT count(*) as jumlah FROM `trx_karyawan` WHERE MONTH(tanggal_masuk)='".$idx."' and YEAR(tanggal_masuk)='".$tahun."'";

            $query .= "SELECT COALESCE(count(*),0)as jumlah FROM trx_karyawan a LEFT JOIN trx_kontrak b ON a.nik=b.nik WHERE b.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) AND MONTH(b.tanggal_masuk)='".$idx."' and YEAR(b.tanggal_masuk)='".$tahun."' ";
		}
		$result = $this->db->query($query);

		return $result->result_array();
		
//		$data = array( 3, 2,1, 0, 0,0,0,0,0,0,0, 0);
//		return $data;
	}
	
	public function data_grafik_turnover($tahun){
		$query = "";
		for($idx =1; $idx < 13; $idx++){
			if($idx > 1){ $query.=" UNION ALL ";}
			// $query .= "SELECT count(*) as jumlah FROM `trx_karyawan` WHERE MONTH(tanggal_keluar)='".$idx."' and YEAR(tanggal_keluar)='".$tahun."' ";

            $query .= "SELECT COALESCE(count(*),0)as jumlah FROM trx_karyawan a LEFT JOIN trx_kontrak b ON a.nik=b.nik WHERE b.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) AND MONTH(b.tanggal_keluar)='".$idx."' and YEAR(b.tanggal_keluar)='".$tahun."' ";
		}
		$result = $this->db->query($query);

		return $result->result_array();
	}
	
	public function data_grafik_pie($tahun){
		$query = "";

		// $query .= "SELECT count(*) as jumlah FROM `trx_karyawan` WHERE  YEAR(tanggal_masuk)='".$tahun."' ";
		
		// $query .= "SELECT count(*) as jumlah FROM `trx_karyawan` WHERE  YEAR(tanggal_keluar)='".$tahun."' ";

		$query = "SELECT COALESCE(count(*),0)as jumlah FROM trx_karyawan a LEFT JOIN trx_kontrak b ON a.nik=b.nik WHERE b.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) AND YEAR(b.tanggal_masuk)='".$tahun."' and YEAR(b.tanggal_masuk)='".$tahun."' ";

        $query.=" UNION ";

        $query .= "SELECT COALESCE(count(*),0)as jumlah FROM trx_karyawan a LEFT JOIN trx_kontrak b ON a.nik=b.nik WHERE b.id_kontrak in(select max(id_kontrak) from trx_kontrak group by nik) AND YEAR(b.tanggal_keluar)='".$tahun."' and YEAR(b.tanggal_keluar)='".$tahun."' ";

		$result = $this->db->query($query);

		return $result->result_array();
	}
    
   //struktur organisasi
    public function data_organisasi(){
        $this->db->select('a.*,b.nama_karyawan as nama');
        $this->db->from('trx_struktur_organisasi a');
        $this->db->join('trx_struktur_organisasi b','a.id_parent=b.id_struktur_organisasi','left');
        return $this->db->get();
    }
    public function TambahOrganisasi($data){
        $this->db->insert('trx_struktur_organisasi',$data);
        return $this->db->affected_rows();
    }
    public function dataOrganisasiDetail($id){
        $this->db->select('*');
        $this->db->from('trx_struktur_organisasi');
        $this->db->where('id_struktur_organisasi',$id);
        return $this->db->get();
    }

    // Gaji
    
    public function cekCreator($where=""){
        $this->db->select('*');
        $this->db->from('trx_payroll_create');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function cekCreatorHistory($where=""){
        $this->db->select('*');
        $this->db->from('trx_create_history');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function insertCreator($data){
        $this->db->insert('trx_payroll_create',$data);
        return $this->db->affected_rows();
    }

    public function insertCreatorHistory($data){
        $this->db->insert('trx_create_history',$data);
        return $this->db->affected_rows();
    }

    public function updateCreator($data,$id){
      $this->db->where('nik',$id);
      $this->db->update('trx_payroll_create',$data);
    }
    public function updateCreatorHistory($data,$id){
      $this->db->where('nik',$id);
      $this->db->update('trx_create_history',$data);
    }

    // public function gajiTmp($where="",$like){
    //     $this->db->select('*');
    //     $this->db->from('trx_gaji_tmp');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     $this->db->like($like);
    //     return $this->db->get();
    // }

    // public function settingNilai($where=""){
    //     $this->db->select('j.*');
    //     $this->db->from('trs_setting_nilai_jabatan j');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     return $this->db->get();
    // }

    // public function dtlbpjsKes($where=""){
    //     $this->db->select('kes.*');
    //     $this->db->from('trx_dtl_klien_bpjs_kes kes');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     return $this->db->get();
    // }

    // public function dtlbpjsTk($where=""){
    //     $this->db->select('tk.*');
    //     $this->db->from('trx_dtl_klien_bpjs_tk tk');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     return $this->db->get();
    // }

    // public function dtlPph($where=""){
    //     $this->db->select('p.*');
    //     $this->db->from('trx_dtl_klien_pph p');
    //     if ($where!="") {
    //         $this->db->where($where);
    //     }
    //     return $this->db->get();
    // }

    public function gajiLainnya($where=""){
        $this->db->select('l.nilai,l.id_jenis_tunjangan,t.jenis_tunjangan');
        $this->db->from('trx_karyawan_gaji_lainnya l');
        $this->db->join('mst_jenis_tunjangan t','t.id_jenis_tunjangan=l.id_jenis_tunjangan','left');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function dataBpjsPerusahaan($where=""){
        $this->db->select('*');
        $this->db->from('master_p_o_sdm');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function dataPphPerusahaan($where=""){
        $this->db->select('*');
        $this->db->from('master_p_o_marketing');
        if ($where!="") {
            $this->db->where($where);
        }
        return $this->db->get();
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
