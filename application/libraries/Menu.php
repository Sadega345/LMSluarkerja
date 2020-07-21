<?php
class Menu {

    public function dynamicMenu() {

        $CI = & get_instance();

        $employee_login_id = $CI->session->userdata('employee_login_id');

        $user_type = $CI->session->userdata('user_type');
        $id_jabatan = $CI->session->userdata('id_jabatan');
        $nik = $CI->session->userdata('nik');
       $where = isset($user_type)?' and a.id_jenis_user='.$user_type:"";
       $where2 = isset($id_jabatan)?' and a.id_jabatan='.$id_jabatan:"";
       $where3 = isset($nik)?' a.nik='.$nik:"";

       if ($user_type == 1 || $user_type == 6 || $user_type == 5) {
           $where2 = "";
       }

            $user_menu = $CI->db->query("SELECT a.*,b.parent,b.nama_modul,b.link,b.icon
                                        FROM trx_jenis_user_detail a
                                        left join mst_modul b on b.id_modul=a.id_modul 
                                        WHERE  b.status=0 ".$where." ".$where2."
                                        ORDER BY b.sort;");

            
        // Create a multidimensional array to conatin a list of items and parents
        $menu = array(
            'items' => array(),
            'parents' => array()
        );

        // Builds the array lists with data from the menu table
        foreach ($user_menu->result_array() as $items) {
          
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $menu['items'][$items['id_modul']] = $items;

            // Creates entry into parents array. Parents array contains a list of all items with children
            $menu['parents'][$items['parent']][] = $items['id_modul'];
        }

        return $output = $this->buildMenu(0, $menu, 0);
    }

    public function buildMenu($parent, $menu, $anak) {
        $CI = & get_instance();
        $nik = $CI->session->userdata('nik');
        $where3 = isset($nik)?' a.nik_atasan='.$nik:"";
        $html = "";

        if (isset($menu['parents'][$parent])) {
            $html .= "<ul ".($anak==0?"class='main-menu metismenu'":"").">\n";
            foreach ($menu['parents'][$parent] as $itemId) {
                $result = $this->active_menu_id($menu['items'][$itemId]['id_modul']);

                if ($result) {
                    $active = 'active';
                    $opened = 'opened';
                } else {
                    $active = '';
                    $opened = '';
                }

                if (!isset($menu['parents'][$itemId]) && $menu['items'][$itemId]['akses'] > 0) { //if condition is false
                  
                        $html .= "<li class='" . $opened.' '.$active . "' >\n  <a href='" . base_url() . $menu['items'][$itemId]['link'] . "'> <i class='" . $menu['items'][$itemId]['icon'] . "'></i><span class='fz-14' style='color:#073b6d'>" . $menu['items'][$itemId]['nama_modul'] . "</span></a>\n</li> \n";
                        if ($itemId==46) {

                            $karyawan = $CI->db->query("SELECT * FROM trx_overtime WHERE nik_atasan='".$nik."'");
                            if ($karyawan->num_rows() > 0) {
                                $result = $this->active_menu_id(146);
                                
                                if ($result) {
                                    $active = 'active';
                                    $opened = 'opened';
                                } else {
                                    $active = '';
                                    $opened = '';
                                }
                                $html .= "<li class='" . $opened.' '.$active . "' >\n  <a href='" . base_url() . "Employee/PermohonanOvertime'> <i class=''></i><span class='fz-14'>Report Overtime</span></a>\n</li> \n";
                            }

                            
                        }
                        // $html .="<li>".$nik."</li>";
                }

                if (isset($menu['parents'][$itemId]) && $menu['items'][$itemId]['akses'] > 0) { //if condition is true
                        $html .= "<li class='" . $opened.' '.$active . "'>\n  <a  class='has-arrow' href='" . base_url() . $menu['items'][$itemId]['link'] . "'> <i class='" . $menu['items'][$itemId]['icon'] . "'></i><span class='fz-14' style='color:#073b6d'>" . $menu['items'][$itemId]['nama_modul'] . "</span></a>\n";
                    $html .= self::buildMenu($itemId, $menu, 1);
                    $html .= "</li> \n";
                    
                }
            }

            $html .= "</ul> \n";
        }
        return $html;
    }

    public function active_menu_id($id) {
        $CI = & get_instance();
        $activeId = $CI->session->userdata('menu_active_id');

        if (!empty($activeId)) {
            foreach ($activeId as $v_activeId) {
                if ($id == $v_activeId) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }


     public function dynamicOrg() {

        $CI = & get_instance();

        // $employee_login_id = $CI->session->userdata('employee_login_id');

        // $user_type = $CI->session->userdata('user_type');
       
            // $user_menu = $CI->db->query("SELECT a.*,b.deskripsi as desJabatan,c.deskripsi as desDepartemen,d.nama_lengkap,d.gambar_foto,d.nik
            //                             FROM trx_organisasi a
            //                             left join mst_jabatan b on b.id_jabatan=a.id_jabatan 
            //                             left join mst_departemen c on c.id_departemen=a.id_departemen 
            //                             left join trx_karyawan d on d.id_departemen=c.id_departemen and d.id_jabatan=b.id_jabatan ORDER BY a.id_organisasi ASC;");
         $user_menu = $CI->db->query("SELECT * FROM trx_struktur_organisasi");
        // Create a multidimensional array to conatin a list of items and parents
        $menu = array(
            'items' => array(),
            'parents' => array()
        );

        // Builds the array lists with data from the menu table
        foreach ($user_menu->result_array() as $items) {
          
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $menu['items'][$items['id_struktur_organisasi']] = $items;
            //$menu['items'][$items['id_organisasi']]['nama_lengkap']=$items['nama_lengkap'];
            // Creates entry into parents array. Parents array contains a list of all items with children
            $menu['parents'][$items['id_parent']][] = $items['id_struktur_organisasi'];
        }
        // print_r($menu);
        return $output = $this->buildStrukturOrg(0, $menu, 0);

    }

    public function buildStrukturOrg($parent, $menu, $anak) {
        $tamp=array();
        $CI = & get_instance();

        $html = "";
        
        // print_r($menu['parents'][$parent]);
        if (isset($menu['parents'][$parent])) {
            foreach ($menu['parents'][$parent] as $itemId) {
                // echo $itemId;
                $parentsx = explode('|', $itemId);
                if (!isset($menu['parents'][$parentsx[0]])) { //if condition is false
                    if($anak==0){
                        $tamp=array(
                        'name'=> $menu['items'][$itemId]['nama_karyawan'],
                        'title'=> $menu['items'][$itemId]['jabatan'],
                       // 'office'=> base_url().'assets/img/karyawan/not.png'
                      //  'office'=> base_url().'assets/img/karyawan/'.($menu['items'][$itemId]['gambar_foto']!=""?$menu['items'][$itemId]['gambar_foto']:"not.png")
                        );    
                        // print_r($tamp);
                    }else{
                        $tamp[]=array(
                        'name'=> $menu['items'][$itemId]['nama_karyawan'],
                        'title'=> $menu['items'][$itemId]['jabatan'],
                       // 'office'=> base_url().'assets/img/karyawan/not.png'
                        );
                    }
                 }

                if (isset($menu['parents'][$parentsx[0]])) { //if condition is true
                    if($anak==0){
                        $tamp=array(
                            'name'=> $menu['items'][$itemId]['nama_karyawan'],
                            'title'=> $menu['items'][$itemId]['jabatan'],
                           // 'office'=> base_url().'assets/img/karyawan/'.($menu['items'][$itemId]['gambar_foto']!=""?$menu['items'][$itemId]['gambar_foto']:"not.png"),
                            //'office'=> base_url().'assets/img/karyawan/not.png',
                            'children'=>self::buildStrukturOrg($parentsx[0], $menu, 1)
                            
                        );
                        // print_r($tamp);
                    }else{
                        $tamp[]=array(
                            'name'=> $menu['items'][$itemId]['nama_karyawan'],
                            'title'=> $menu['items'][$itemId]['jabatan'],
                            //'office'=> base_url().'assets/img/karyawan/'.($menu['items'][$itemId]['gambar_foto']!=""?$menu['items'][$itemId]['gambar_foto']:"not.png"),
                            //'office'=> base_url().'assets/img/karyawan/not.png',
                            'children'=>self::buildStrukturOrg($parentsx[0], $menu, 1)
                            
                        );
                    }
                }
            }

        }
        // print_r($tamp);
        return $tamp;

    }

    public function getAkses($id_modul){
        $CI = & get_instance();
        $aksesTmp = 0;
        $dataAkses = explode(',', $CI->session->userdata('akses'));
        foreach ($dataAkses as $akses) {
            $modul = explode(':', $akses);
            if ($id_modul==$modul[0]) {
                $aksesTmp=$modul[1];
            }
        }
        return $aksesTmp;
    }

}
