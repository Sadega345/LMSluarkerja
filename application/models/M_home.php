<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {
	public function select_all() {
		$sql = 'SELECT * FROM tbl_siswa';

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$query = $this->db->insert("tbl_siswa", $data);

        if($query){
            return true;
        }else{
            return false;
        }
	}

	public function edit($id)
    {

        $query = $this->db->where("id", $id)->get("tbl_siswa");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

	public function update($data,$id) {
		
		$query = $this->db->update("tbl_siswa", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }
	}

	public function delete($id) {
		
		$sql = "DELETE FROM tbl_siswa WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function tambahpelamar($data){
          $this->db->insert('trx_pelamar',$data);
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
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */