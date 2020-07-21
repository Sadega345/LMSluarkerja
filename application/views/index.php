<!doctype html>
<html lang="en">
    <!--- HEAD -->
    <?php $this->load->view('template/head'); ?>
    <!--- CLOSE HEAD -->
    <?php
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
    ?>
        <body class="theme-blue" style="overflow-x: hidden;">
            <div id="wrapper">
                <!--- HEADER -->
                <?php $this->load->view('template/header'); ?>
                <!--- CLOSE HEADER -->
                <!--- SIDE MENU -->
                <?php
                if($this->session->userdata('user_type')==5){
                    $data=array();
                     $nik=$this->session->userdata('nik');
                      $data['data_karyawanNumRows'] =$this->My_model->data_karyawanNumRows($nik);
                      $data['data_pelamarNumRows'] =$this->My_model->data_pelamarNumRows($nik);
                      $data['datapelamar'] =$this->My_model->data_pelamar($nik);
                }else{
                     $data=array();
                    $nik=$this->session->userdata('nik');
                    $nikktp=$this->session->userdata('nikktp');
                    $nikprojek=array('nik'=>$this->session->userdata('nik'));
                    $nikprojekko=array('ko.nik'=>$this->session->userdata('nik'));
                    if($nik!=""){
                        $data['dataKaryawanProjek']=$this->My_model->data_karyawan_projek($nikprojekko)->row();
                        $data['dataKaryawan'] =$this->My_model->data_karyawan($nik);
                        $data['ambildepartemen'] =$this->My_model->ambildepartemen($nik);
                        $data['dataKaryawandept'] =$this->My_model->data_karyawan_dept($data['ambildepartemen']->id_departemen);
                        $data['ambildataKepala'] =$this->My_model->ambil_data_kepala($data['ambildepartemen']->id_jabatan);
                        $data['ambildatanamaKepala'] =$this->My_model->ambil_data_nama_kepala($data['ambildataKepala']->parent_id_jabatan);
                        $data['jumdataKaryawan'] =$this->My_model->jum_data_karyawan($data['ambildepartemen']->id_departemen);
                        $data['data_karyawanNumRows'] =$this->My_model->data_karyawanNumRows($nik);
                        // $data['data_GajiLainnya'] =$this->My_model->data_gajiLainnya($nik);
                        // $data['data_GajiLainnyaRow'] =$this->My_model->data_gajiLainnya($nik)->num_rows();
                        $data['data_NPWP'] =$this->My_model->data_NPWP($nikktp)->row();
                        $data['data_BPJS'] =$this->My_model->data_BPJS($nikktp)->row();
                        $data['data_NPWPRow'] =$this->My_model->data_NPWP($nikktp)->num_rows();
                        $data['data_BPJSRow'] =$this->My_model->data_BPJS($nikktp)->num_rows();
                        $data['dataBank'] =$this->My_model->data_bank();
                    }
                }
                $menuId=isset($menuId)?$menuId:"";
                    $this->session->set_userdata('menu_active_id',$menuId);
                    //$this->load->view('template/menu-sidebar-employee',$data); ?>
                    <div class="d-block d-md-none d-sm-block">
                        <?php $this->load->view('template/menu-sidebar-employee',$data); ?>
                    </div>
                <!--- CLOSE SIDE MENU -->
                <!--- CONTENT -->
                
                
                <?php $this->load->view('template/footer') ?>
                
                <div id="main-content" style="width: 100%">
                     <div class="row">
                        <div class="col-md-3 d-none d-sm-block" >
                            <?php $this->load->view('template/menu-sidebar-employee',$data); ?>
                        </div>
                        <div class="col-md-9">
                            <div class="container-fluid">
                                <?php $this->load->view($content,$data); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="background-image: url('<?php echo base_url()?>assets/img/bg2.png');background-repeat: no-repeat;background-size: cover">
                    <div class="container" style="padding-top: 10px;padding-bottom: 50px">
                        <div class="row" style="padding-left: 50px">
                            <div class="col-md-4">
                                <p style="font-size: 18px;color: #073b6d;padding-top: 20px">LMS - Kampus NATA</p>
                                <p style="font-size: 18px;color: #073b6d">Contact Center</p>
                                <div class="container">
                                    <div class="row">
                                        <span style="font-size: 14px;color: #ffffff"><i class="fa fa-envelope-o" style="color: #ffffff"></i> Support@lms.com</span>
                                    </div>
                                    <div class="row">
                                        <span style="font-size: 18px;color: #ffffff;padding-top: 10px"><i class="fa fa-phone" style="color: #ffffff"> </i> 021-2003001 </span> 
                                    </div>
                                    <div class="row">
                                        <i class="fa fa-tablet" style="font-size: 18px;color: #ffffff;padding-top: 10px"> +62811-12315135</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-3" >
                                <p style="font-size: 18px;color: #073b6d;padding-top: 20px">Social Media</p>
                                <div class="container" >
                                    <div class="row">
                                        <div class="col-md-2 col-2">
                                            <i class="fa fa-facebook fa-2x" style="color: #ffffff"></i>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <i class="fa fa-instagram fa-2x" style="color: #ffffff"></i>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <i class="fa fa-twitter fa-2x" style="color: #ffffff"></i>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <i class="fa fa-youtube fa-2x" style="color: #ffffff"></i>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-size: 18px;color: #073b6d;padding-top: 30px">Powered By</p>
                                <img src="<?php echo base_url()?>assets/img/lsbaru.png" alt="Lucid Logo" class="img-responsive logo" height="50px" style="margin-top: -15px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" align="center">
                        <p style="font-size: 18px;color: #b8c1c9;padding-top: 20px">© 2019,LuarKerja Indonesia, All Rights Reserved</p>
                    </div>
                </div>

            </div>
        
        </body>
</html>
