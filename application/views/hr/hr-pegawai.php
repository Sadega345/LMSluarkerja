
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        
                        <p class="fz-36 barlow-bold">Directory / Pegawai</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <!-- <div class="card "> -->
                         <div class="body">
                            
                             <div class="container">
                                <form action="<?php echo base_url()?>HR/HRPegawai" method="post">
                                    <div class="row m-b-20">
                                        <div class="col-md-2 m-t-10">   
                                            <h6 class="fz-18">Search Filter</h6>   
                                        </div>
                                        <div class="col-md-10" align="right">
                                            <!-- <button type="submit" class="btn Rectangle-cari col-md-2"><i class="fa fa-search" style="color: #ffff;"></i> Cari</button> -->

                                            <button type="submit" class="btn Rectangle-cari col-md-2">
                                            
                                                <i class="fa fa-search padd-right-5 putih" ></i>
                                               Cari
                                              
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2 m-t-10">
                                            <label>NIK</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                           <input type="text" name="nik" class="form-control fcheight" value="<?php echo $this->input->post('nik') ?>">
                                        </div>

                                        <!-- Nama Karyawan -->
                                        <div class="col-md-2 m-t-10">
                                            <label>Nama Karyawan</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                           <input type="text" name="nama_lengkap" class="form-control fcheight" value="<?php echo $this->input->post('nama_lengkap') ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row rowclient m-t-10" id="rowclient">
                                        <div class="col-md-2 m-t-10">
                                            <label>Unit Bisnis</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                            <select name="id_master_perusahaan" id="selclient" class="form-control select2 selclient" >
                                                <option selected value=""> Pilih Semua Unit Bisnis </option>
                                                <?php
                                                foreach($dataClient->result() as $dtc){
                                                    ?>
                                                    <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php echo $this->input->post('id_master_perusahaan')==$dtc->id_master_perusahaan?'selected':'';  ?>> <?php echo $dtc->nama_perusahaan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-2 m-t-10">
                                            <label>Status</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                            <select name="status_karyawan" class="form-control fcheight">
                                                <option value="">Lihat semua</option>
                                                <option value="1" <?php echo $this->input->post('status_karyawan')=='1'?'selected':'' ?> >Permanent</option>
                                                <!-- <option value="2" <?php //echo $this->input->post('status_karyawan')=='2'?'selected':'' ?>>Freelance</option> -->
                                                <option value="3" <?php echo $this->input->post('status_karyawan')=='3'?'selected':'' ?>>Probation</option>
                                                <option value="4" <?php echo $this->input->post('status_karyawan')=='4'?'selected':'' ?>>PKWTT</option>
                                                <!-- <option value="5" <?php //echo $this->input->post('status_karyawan')=='5'?'selected':'' ?>>Resign</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row rowdept m-t-10" id="rowdept">
                                        <div class="col-md-2 m-t-10" >
                                            <label>Departemen </label>        
                                        </div>
                                         <div class="col-md-4" >
                                            <select name="id_departemen" id="seldept" class="form-control select2 seldept" >
                                                <option selected value=""> Pilih Semua Departemen </option>
                                                <?php
                                                foreach($dataDeptC->result() as $dtd){
                                                    ?>
                                                    <option value="<?php echo $dtd->id_departemen; ?>" <?php echo $this->input->post('id_departemen')==$dtd->id_departemen?'selected':'';  ?>> <?php echo $dtd->nama_departemen; ?></option>
                                                    <?php
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="row m-t-20">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-3 col-12">
                                   <h5 class="fz-aktivitasabsensi">Pegawai</h5>
                               </div> 
                               <?php if ($dataAkses == '1'){ ?>
                                   
                                <div class="col-md-6 col-6" align="right">
                                    <a href="<?php echo base_url() ?>HR/exportpegawai"  class="btn Rectangle-generate"><img src="<?php echo base_url() ?>assets/img/pegawai.svg" class="padd-right-5">Export Pegawai</a>
                                    <a href="javascript:;" onclick="view//pegawai()" class="btn Rectangle-generate"><img src="<?php echo base_url() ?>assets/img/pegawai.svg" class="padd-right-5">Import Pegawai</a>

                                </div>
                                <div class="col-md-3 col-3" align="right">

                                    <!-- <a href="<?php  //echo base_url()?>HR/TambahHRPegawai" class="btn Rectangle-diterima "><img src="<?php //echo base_url() ?>assets/img/plustambah1x.png">Tambah Pegawai</a> -->

                                    <a href="javascript:;" onclick="viewtambahpegawai()" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Tambah Pegawai</a>
                                </div>

                               <?php } ?>
                               
                            </div>
                            <div class="table-responsive">
                                <table id="tblpegawai" data-url="<?php echo base_url() ?>HR/ajaxTablePegawai" class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Unit Bisnis</th>
                                            <th>Departemen</th>
                                           <!--  <th>Divisi</th>
                                            <th>jabatan</th> -->
                                            <th>jabatan</th>
                                            <th>Status pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php /* foreach ($dataKontrak->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <td><?php echo $dt->nama_perusahaan; ?></td>
                                            <td><?php echo $dt->desDepartemen; ?></td>
                                            <td><?php echo $dt->jenis_project; ?></td>
                                            <!-- <td><?php //echo $dt->nama_divisi; ?></td>
                                            <td><?php //echo $dt->des_jabatan; ?></td> -->
                                            <td><?php if($dt->status_karyawan=='1'){
                                                echo'<label class="btn btn-green2">Permanen</label>';
                                            }else if($dt->status_karyawan=='2'){
                                                echo'<label class="btn btn-red2">Freelance</label>';
                                            }else if($dt->status_karyawan=='3'){
                                                echo'<label class="btn btn-orange2">Kontrak PKWT</label>';
                                            }else if($dt->status_karyawan=='4'){
                                                echo'<label class="btn btn-orange2">Kontrak PKWTT</label>';
                                            }else if($dt->status_karyawan=='5'){
                                                echo'<label class="btn btn-orange2">Resign</label>';
                                            }else if($dt->status_karyawan=='6'){
                                                echo'<label class="btn btn-orange2">Kontrak</label>';
                                            }; ?></td>

                                            <td>
                                                <a href="<?php echo base_url() ?>HR/ViewHRPegawai/<?php echo $dt->nik ?>" class="btn btn-green1">Lihat</a>
                                                <a href="<?php echo base_url() ?>HR/EditHRPegawai/<?php echo $dt->nik ?>" class="btn btn-yellow">Edit</a>
                                            </td>
                                        </tr>
                                    <?php } */ ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- View Pegawai -->
            <div class="modal fade bd-example-modal-lg" id="view" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">View Pegawai</label>
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10 mb-3">
                                <div class="col-md-12">
                                    <div id="viewpegawai">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-md-6">
                              <button type="submit" class="btn Rectangle-cari col-md-3">Simpan</button>
                              <button type="button" class="btn Rectangle-batal col-md-3" data-dismiss="modal" >Batal</button>
                            </div> -->
                        </div>
                      
                    </div>
                  </div>
                </div>
            </div>

            <!-- Modal Tambah Pegawai -->
            <div class="modal fade bd-example-modal-lg" id="viewtambah" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" id="simpan" enctype="multipart/form-data" action="<?php echo base_url() ?>HR/ProsesTambahPegawai">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Tambah Pegawai</label>
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formtambahpegawai">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                      <div id="rowtunjangantambah">
                            <div class="container">
                            <div class="row">
                                <div class="col-5"  align="right">
                                    <label>Jenis Tunjangan</label>
                                </div>
                                <div class="col-7">
                                    <select id="seltunjangan" class="form-control seltunjangan">
                                       <!--  <option value="" selected disabled>-- Pilih Jenis Tunjangan --</option>
                                        <?php
                                        // $dataJenisTunjangannya= $this->Nata_hris_hr_model->data_jenis_tunjangan();
                                        // foreach($dataJenisTunjangannya->result() as $dttun){
                                        //     echo '<option value="'.$dttun->id_jenis_tunjangan.'">'.$dttun->jenis_tunjangan.'</option>';
                                        // }
                                        ?> -->
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5"  align="right">
                                    <label>Besaran Tunjangan</label>
                                </div>
                                <div class="col-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input id="bestunjinp" min="1" class="form-control besarantunjangan text-right" type="text" />
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div id="isitunjangantambah">
                            <div class="row " >
                                <div class="col-md-3 col-12 m-t-10">
                                    <label id="txttunj">Tunjangan A</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="hidden" id="idtunj" name="id_tunjangan[]" />
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" id="bestunj" name="besar_tunjangan[]" class="form-control inptunj text-right fcheight" > &nbsp;<span><button type="button" id="remove" class="btn btn-danger removex">X</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="rowtunjangan2tambah">
                            <div class="container">
                                <div class="row">
                                    <div class="col-5"  align="right">
                                        <label>Jenis Cuti</label>
                                    </div>
                                    <div class="col-7">
                                        <select id="seltunjangan" class="form-control seltunjangan2">
                                            <!-- <option value="" selected disabled>-- Pilih Cuti --</option>
                                            <?php
                                            // $dtcutip=array('status'=>'0');
                                            // $datadtlcutipribadi= $this->Nata_hris_hr_model->dataLeaveKategori($dtcutip);
                                            // foreach($datadtlcutipribadi->result() as $cuti){
                                            //     echo '<option value="'.$cuti->id_leave_kategori.'">'.$cuti->deskripsi.'</option>';
                                            // }
                                            ?> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5"  align="right">
                                        <label>Jumlah Hari</label>
                                    </div>
                                    <div class="col-7">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="bestunjinp" min="0" class="form-control besarantunjangan text-right" type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="isitunjangan2tambah">
                            <div class="row " >
                                <div class="col-md-3 col-12 m-t-10">
                                    <label id="txttunj">Cuti B</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="hidden" id="idtunj" name="id_leave_kategori[]" />
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" id="bestunj" name="jumlah_hari[]" class="form-control inptunjcuti text-right fcheight" > &nbsp;<span><button type="button" id="remove" class="btn btn-danger removex2">X</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>

            

            <!-- Modal Edit Pegawai -->
            <div class="modal fade bd-example-modal-lg" id="viewedit" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" id="simpanedit" action="<?php echo base_url()?>HR/ProsesEditPegawai" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Edit Pegawai</label>
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formeditpegawai">
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                      </form>

                        <div id="rowtunjanganedit">
                            <div class="container">
                            <div class="row">
                                <div class="col-5"  align="right">
                                    <label>Jenis Tunjangan</label>
                                </div>
                                <div class="col-7">
                                    <select id="seltunjangan" class="form-control seltunjangan">
                                       <!--  <option value="" selected disabled>-- Pilih Jenis Tunjangan --</option>
                                        <?php
                                        // $dataJenisTunjangannya= $this->Nata_hris_hr_model->data_jenis_tunjangan();
                                        // foreach($dataJenisTunjangannya->result() as $dttun){
                                        //     echo '<option value="'.$dttun->id_jenis_tunjangan.'">'.$dttun->jenis_tunjangan.'</option>';
                                        // }
                                        ?> -->
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5"  align="right">
                                    <label>Besaran Tunjangan</label>
                                </div>
                                <div class="col-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input id="bestunjinp" min="1" class="form-control besarantunjangan text-right" type="text" />
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div id="rowtunjangan2edit">
                            <div class="container">
                                <div class="row">
                                    <div class="col-5"  align="right">
                                        <label>Jenis Cuti</label>
                                    </div>
                                    <div class="col-7">
                                        <select id="seltunjangan" class="form-control seltunjangan2">
                                          <!--   <option value="" selected disabled>-- Pilih Cuti --</option>
                                            <?php
                                            // $dtcutip=array('status'=>'0');
                                            // $datadtlcutipribadi= $this->Nata_hris_hr_model->dataLeaveKategori($dtcutip);
                                            // foreach($datadtlcutipribadi->result() as $cuti){
                                            //     echo '<option value="'.$cuti->id_leave_kategori.'">'.$cuti->deskripsi.'</option>';
                                            // }
                                            ?> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5"  align="right">
                                        <label>Jumlah Hari</label>
                                    </div>
                                    <div class="col-7">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="bestunjinp" min="0" class="form-control besarantunjangan text-right" type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="isitunjanganedit">
                            <div class="row " >
                                <div class="col-md-3 col-12 m-t-10">
                                    <label id="txttunj">Tunjangan A</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="hidden" id="idtunj" name="id_tunjangan[]" />
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" id="bestunj" name="besar_tunjangan[]" class="form-control inptunj text-right fcheight" > &nbsp;<span><button type="button" id="remove" class="btn btn-danger removex">X</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="isitunjangan2edit">
                            <div class="row " >
                                <div class="col-md-3 col-12 m-t-10">
                                    <label id="txttunj">Cuti B</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="hidden" id="idtunj" name="id_leave_kategori[]" />
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" id="bestunj" name="jumlah_hari[]" class="form-control inptunjcuti text-right fcheight" > &nbsp;<span><button type="button" id="remove" class="btn btn-danger removex2">X</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                  </div>
                </div>
            </div>

            <!-- Modal Import Pegawai -->
            <div class="modal fade bd-example-modal-lg" id="viewimport" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" action="<?php echo base_url()?>HR/inputdataCSVPegawai" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Tambah CSV Pegawai</label>
                                </div>
                                
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formimportpegawai">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-6 col-md-6">
	                              <button type="submit" class="btn Rectangle-cari">Simpan</button>
	                              <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
	                            </div>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
           <!--  <div id="isitunjangan">
                <div class="row " >
                    <div class="col-md-3 col-5 m-t-10"  align="right">
                        <label id="txttunj">Tunjangan A</label>
                    </div>
                    <div class="col-md-4 col-7">
                        <input type="hidden" id="idtunj" name="id_tunjangan[]" />
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" id="bestunj" name="besar_tunjangan[]" class="form-control inptunj text-right" > &nbsp;<span><button type="button" id="remove" class="btn btn-aksi btn_remove"><img src="<?php// echo base_url() ?>assets/img/Delete.svg"></button></span>
                        </div>
                    </div>
                </div>
            </div> -->

            <div id="rowtunjangan">
                <div class="container">
                <div class="row">
                    <div class="col-5"  align="right">
                        <label>Jenis Tunjangan</label>
                    </div>
                    <div class="col-7">
                        <select id="seltunjangan" class="form-control seltunjangan">
                            <option value="" selected disabled>-- Pilih Jenis Tunjangan --</option>
                            <?php
                            $dataJenisTunjangannya= $this->Nata_hris_hr_model->data_jenis_tunjangan();
                            foreach($dataJenisTunjangannya->result() as $dttun){
                                echo '<option value="'.$dttun->id_jenis_tunjangan.'">'.$dttun->jenis_tunjangan.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5"  align="right">
                        <label>Besaran Tunjangan</label>
                    </div>
                    <div class="col-7">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input id="bestunjinp" min="1" class="form-control besarantunjangan text-right" type="text" />
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div id="rowtunjangan2">
                <div class="container">
                    <div class="row">
                        <div class="col-5"  align="right">
                            <label>Jenis Cuti</label>
                        </div>
                        <div class="col-7">
                            <select id="seltunjangan" class="form-control seltunjangan2">
                                <option value="" selected disabled>-- Pilih Cuti --</option>
                                <?php
                                $dtcutip=array('status'=>'0');
                                $datadtlcutipribadi= $this->Nata_hris_hr_model->dataLeaveKategori($dtcutip);
                                foreach($datadtlcutipribadi->result() as $cuti){
                                    echo '<option value="'.$cuti->id_leave_kategori.'">'.$cuti->deskripsi.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5"  align="right">
                            <label>Jumlah Hari</label>
                        </div>
                        <div class="col-7">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input id="bestunjinp" min="0" class="form-control besarantunjangan text-right" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    // $('#viewpegawai').modal({backdrop: 'static', keyboard: false});
                    $('#rowtunjangan').hide();
                    $('#rowtunjangan2').hide();
                    $('#viewedit').modal({backdrop: 'static', keyboard: false});
                    $('#view').modal({backdrop: 'static', keyboard: false});
                    $('#viewimport').modal({backdrop: 'static', keyboard: false});
                    $('#viewtambah').modal({backdrop: 'static', keyboard: false});
                });

                function viewinfopegawai(a){
                    // alert('masuk');
                    $.ajax({
                        url: "<?php echo base_url();?>HR/ViewHRPegawai/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#view').modal('show');
                            $('#viewpegawai').html(response);
                            setTimeout(function(){
                                wizard('');

                            },1000);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }

                function viewimportpegawai(){
                    // alert('masuk');
                    $.ajax({
                        url: "<?php echo base_url();?>HR/tambahCsvKaryawan",
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#viewimport').modal('show');
                            $('#formimportpegawai').html(response);
                            setTimeout(function(){
                                
                            },1000);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }

                function viewtambahpegawai(){
                    // alert('masuk');
                    $.ajax({
                        url: "<?php echo base_url();?>HR/TambahHRPegawai",
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#viewtambah').modal('show');
                            $('#rowtunjangantambah').hide();
                            $('#rowtunjangan2tambah').hide();
                            $('#isitunjangan2tambah').hide();
                            $('#isitunjangantambah').hide();
                            $('#rowtunjangantambah #seltunjangan')
                                .find('option')
                                .remove()
                                .end()
                                // .append('<option value="">Pilih</option>')
                                .val('whatever')
                            ;
                            $('#rowtunjangan #seltunjangan').find('option').clone().appendTo('#rowtunjangantambah #seltunjangan');

                            $('#rowtunjangan2tambah #seltunjangan')
                                .find('option')
                                .remove()
                                .end()
                                // .append('<option value="">Pilih</option>')
                                .val('whatever')
                            ;
                            $('#rowtunjangan2 #seltunjangan').find('option').clone().appendTo('#rowtunjangan2tambah #seltunjangan');

                            $('#formtambahpegawai').html(response);
                            setTimeout(function(){
                                wizard('simpan');
                                awal('tambah');
                            },1000);
						
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }

                function editpegawai(a){
                    // alert('masuk');
                    $.ajax({
                        url: "<?php echo base_url();?>HR/EditHRPegawai/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#viewedit').modal('show');
                            $('#rowtunjanganedit').hide();
                            $('#rowtunjangan2edit').hide();
                            $('#isitunjangan2edit').hide();
                            $('#isitunjanganedit').hide();
                            $('#rowtunjanganedit #seltunjangan')
                                .find('option')
                                .remove()
                                .end()
                                .append('<option value="">Pilih</option>')
                                .val('whatever')
                            ;
                            $('#rowtunjangan #seltunjangan').find('option').clone().appendTo('#rowtunjanganedit #seltunjangan');

                            $('#rowtunjangan2edit #seltunjangan')
                                .find('option')
                                .remove()
                                .end()
                                .append('<option value="">Pilih</option>')
                                .val('whatever')
                            ;
                            $('#rowtunjangan2 #seltunjangan').find('option').clone().appendTo('#rowtunjangan2edit #seltunjangan');

                            $('#formeditpegawai').html(response);
                            setTimeout(function(){
                                wizard('simpanedit');
                                awal('edit');

                            },1000);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }

                function awal(aksi){


                    $(".select2").select2({dropdownParent: $('#wizard_horizontal')});

                	$("#email").inputmask('email');
		            $('#kodepos').mask('99999');
		            $('#thn_masuk_didik,#thn_lulus_didik,#thn_masuk_kerja,#thn_lulus_kerja').mask('9999');
		            $('#nomor_telepon').mask('999999999?999');
		            $('#ktppegawai').mask('9999999999999999');
		            $('#npwppegawai').mask('99.999.999.9-999.999');
		            $('.input-daterange input').each(function() {
		              	//  $(this).datepicker('clearDates');
		                // $(this).datepicker({
		                //     format:'yyyy-mm-dd'
		                // });
		                $(this).change(function(){
		                    var name=$(this).attr('name');
		                    var startdate=$('#startkontrak').datepicker("getDate");
		                    var enddate=$('#endkontrak').datepicker("getDate");
		                    // console.log(enddate);
		                    var stad=moment(startdate);
		                    var endd=moment(enddate);
		                    
		                    var diffalls = stad.diff(endd);
		                    var duration = moment.duration(diffalls);
		                    var years = Math.abs(duration.years()),
		                        months=Math.abs(duration.months()),
		                        days = Math.abs(duration.days()),
		                        hrs = Math.abs(duration.hours()),
		                      	mins = Math.abs(duration.minutes()),
		                      	secs = Math.abs(duration.seconds());
		                    var tahun = years>0?years+' tahun ':'';
		                    var bulan = months>0?months+' bulan ':'';
		                    var tanggal = days>0?days+' hari ':''; 
		                    var diffall=tahun+bulan+tanggal;
		                    $("#masa_kerja").val(diffall);
		                });
		            });
		            
		            $('.datepicker2').datepicker({
		            	beforeShow:function(a,b){
				            setTimeout(function(){
				              $('.ui-datepicker').css('z-index', 99999999999999);
				            }, 0);
				          },
			                showButtonPanel: true,
			                changeMonth: true,
			                changeYear: true,
			                dateFormat : 'dd/mm/yy'
			            }).on( "change", function() {
			                var datanya = $(this).data("id");
			            var date = $(this).datepicker("getDate");
			            //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
			            $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
			        //from.datepicker( "option", "maxDate", getDate( this ) );
			        });

		            $("#selclient2").change(function(){
		            	// alert(this.value);
		                pilihDept2(this.value);
		                // pilihLokasi(this.value);
		                // pilihpo(this.value);
		            });
		            $("#saldoklaim").keyup( function(e){
		    			$(this).val(addRibuan($(this).val()));
		    		}); 
		            $("#bpjs_kes").keyup( function(e){
		                $(this).val(addRibuan($(this).val()));
		            }); 
		            $("#bpjs_tk").keyup( function(e){
		                $(this).val(addRibuan($(this).val()));
		            }); 
		            $("#pph").keyup( function(e){
		                $(this).val(addRibuan($(this).val()));
		            }); 
                    $("#lemburan").keyup( function(e){
                        $(this).val(addRibuan($(this).val()));
                    }); 
		            $("#seldept2").change( function(e){
		    			$("#rowsumber2").show();
		                var sumber = $('#sumber2').val();
		                if(sumber!=0){
		                    $("#rowloker2").show();
		                }else{
		                    $("#rowjabatan2").show();
		                }
		    		});
		            
		            $("#departemen").change(function(){
		                //alert(this.value);
		                $("#divisi").hide();
		                $("#loading").show();
		                $("#divisi").removeClass("select2");
		                $.ajax({
		                  type: "POST",
		                  url: "<?php echo base_url(); ?>HR/ambilDivisi", 
		                  data: {departemen : this.value}, 
		                  dataType: "json",
		                  beforeSend: function(e) {
		                    if(e && e.overrideMimeType) {
		                      e.overrideMimeType("application/json;charset=UTF-8");
		                    }
		                  },
		                  success: function(response){
		                    $("#rowdivisi").show();
		                    $("#loading").hide(); 
		                    $("#divisi").html(response.data_divisi).show();
		                    $("#divisi").select2();
		                  },
		                  error: function (xhr, ajaxOptions, thrownError) { 
		                    alert(thrownError); 
		                  }
		                }); 
		            });
		            
		            formatAngka();
		            

		            $("#nik").keyup(function(){
		                $("#loadingnik").show();
		                 $.ajax({
		                  type: "POST",
		                  url: "<?php echo base_url(); ?>HR/checkNik", 
		                  data: {nik : this.value}, 
		                  dataType: "json",
		                  beforeSend: function(e) {
		                    if(e && e.overrideMimeType) {
		                      e.overrideMimeType("application/json;charset=UTF-8");
		                    }
		                  },
		                  success: function(response){
		                    $("#loadingnik").hide();
		                    if(response.hasil=="invalid"){
		                        alert("nik sudah terpakai");
		                        $("#nik").val("");
		                    } else {
		                        return true;
		                    } 
		                  },
		                  error: function (xhr, ajaxOptions, thrownError) { 
		                    alert(thrownError); 
		                  }
		                }); 
		            });

		            ready();
		            
		            if (aksi == 'edit') {
		            	$("#rowgaji").show();
		            	$('.id_tunjubah').each(function() {
		                  $(".seltunjangan option[value='"+$(this).val()+"']").remove();
			            });
                        $('.id_tunjubahcuti').each(function() {
                          $(".seltunjangan2 option[value='"+$(this).val()+"']").remove();
                        });
			            if ($('#sumber2').val()!=0) {
			            	$("#rowjabatan").hide();
			            }else{
			            	$("#rowloker2").hide();
			            }

			            if ($('#sumber2').val()!=0) {
			            	$("#rowjabatan").hide();
			            }else{
			            	$("#rowloker2").hide();
			            }
			            
		            }

		            if (aksi == 'tambah') {
		            }
		            
                }

                function ready(){
                	$("#selepegawai").hide();
				        var lastday = function(m,y){
				            return  new Date(y, m +1, 0).getDate();
				        }
				       	$("#loading").hide();
				        $("#loadingnik").hide();
				        $("#rowdivisi").hide();
				        $("#rowtunjangan").hide();
				        $("#isitunjangan").hide();
                         $("#rowtunjangan2").hide();
                        $("#isitunjangan2").hide();
                }

                function showTunjangan(aksi){
			        const swalWithBootstrapButtons = Swal.mixin({
			          customClass: {
			            confirmButton: 'btn btn-blue1',
			            cancelButton: 'btn btn-red1'
			          },
			          buttonsStyling: false,
			        });
			        $rowtunjangan=$('<div id="poptunj">'+$("#rowtunjangan"+aksi).html()+'</div>');
			        swalWithBootstrapButtons.fire({
			          title: 'Tambah Tunjangan',
			          html: $rowtunjangan,
			          //type: 'warning',
			          showCancelButton: true,
			          confirmButtonText: 'Tambah',
			          cancelButtonText: 'Batal',
			          /* reverseButtons: true, */
			          allowOutsideClick: false
			        }).then((result) => {
			          if (result.value) {
			            /* swalWithBootstrapButtons.fire(
			              'Deleted!',
			              'Your file has been deleted.',
			              'success'
			            ) */
			            //console.log("Add");
			            var txttunj=$("#poptunj").find("#seltunjangan option:selected").text();
			            var valtunj=$("#poptunj").find("#seltunjangan option:selected").val();
			            var besartunj=$("#poptunj").find("#bestunjinp").val();
			            var besartunjint = besartunj.split(".").join("");
			            $isi = $(
			                '<div id="removerow'+valtunj+'">'+$("#isitunjangan"+aksi).html()+'</div>');
			            
			            $isi.find("#txttunj").html(txttunj);
			            $isi.find("#idtunj").val(valtunj);
			            var totaltunj=addRibuan(besartunj);
			            $isi.find("#bestunj").val(totaltunj);
			            $isi.find("#remove").attr('data-id',valtunj);
			            $isi.find("#remove").attr('data-txt',txttunj);
			            //console.log(besartunj);
			            //console.log(totaltunj);
			            if(valtunj!="" && besartunjint!="" && besartunjint>0){
			                $(".seltunjangan option[value='"+valtunj+"']").remove();
			                var lentunj=$("#poptunj").find("#seltunjangan option").length;
			                $("#contenttunjangan").append($isi);
			                countGaji();
			                if(lentunj<=1){
			                    $("#btntamtunj").hide();
			                }
			            }
			               $(".removex").click(function(){
			                var  id=$(this).data('id');
			                var  txt=$(this).data('txt');
			                
			                $("#removerow"+id).remove();
			                countGaji();    
			                $(".seltunjangan").append('<option value="'+id+'">'+txt+'</option>');
			                });
			               $(".inptunj").keyup(function(){
			                this.value = formatRupiah(this.value);
			                // countGaji();    
			                });
			            
			            //$(".seltunjangan").select2("destroy");
			            //$("#isitunjangan").clone().insertAfter("div.contenttunjangan:last");
			          } else if (
			            // Read more about handling dismissals
			            result.dismiss === Swal.DismissReason.cancel
			          ) {
			            //$(".seltunjangan").select2("destroy");
			            /* swalWithBootstrapButtons.fire(
			              'Cancelled',
			              'Your imaginary file is safe :)',
			              'error'
			            ) */
			          }
			        });
			        // $(".seltunjangan").select2({
			        //     dropdownCssClass: "increasedzindexclass"
			        // });
			        //var rupiah = document.getElementById('bestunjinp');
			        /* $("#poptunj").find("#bestunjinp").keyup( function(e){
						$(this).val(addRibuan($(this).val()));
					}); */
					$(".besarantunjangan").keyup( function(e){
						$(this).val(addRibuan($(this).val()));
					}); 
			    }
                function showTunjangan2(aksi){
                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-blue1',
                        cancelButton: 'btn btn-red1'
                      },
                      buttonsStyling: false,
                    });
                    $rowtunjangan=$('<div id="poptunj">'+$("#rowtunjangan2"+aksi).html()+'</div>');
                    swalWithBootstrapButtons.fire({
                      title: 'Tambah Cuti',
                      html: $rowtunjangan,
                      //type: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Tambah',
                      cancelButtonText: 'Batal',
                      /* reverseButtons: true, */
                      allowOutsideClick: false
                    }).then((result) => {
                      if (result.value) {
                        /* swalWithBootstrapButtons.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        ) */
                        //console.log("Add");
                        var txttunj=$("#poptunj").find("#seltunjangan option:selected").text();
                        var valtunj=$("#poptunj").find("#seltunjangan option:selected").val();
                        var besartunj=$("#poptunj").find("#bestunjinp").val();
                        var besartunjint = besartunj.split(".").join("");
                        $isi = $(
                            '<div id="removerow2'+valtunj+'">'+$("#isitunjangan2"+aksi).html()+'</div>');
                        
                        $isi.find("#txttunj").html(txttunj);
                        $isi.find("#idtunj").val(valtunj);
                        var totaltunj=addRibuan(besartunj);
                        $isi.find("#bestunj").val(totaltunj);
                        $isi.find("#remove").attr('data-id',valtunj);
                        $isi.find("#remove").attr('data-txt',txttunj);
                        //console.log(besartunj);
                        //console.log(totaltunj);
                        if(valtunj!="" && besartunjint!="" && besartunjint>0){
                            $(".seltunjangan2 option[value='"+valtunj+"']").remove();
                            var lentunj=$("#poptunj").find("#seltunjangan option").length;
                            $("#contenttunjangan2").append($isi);
                           
                            if(lentunj<=1){
                                $("#btntamtunj2").hide();
                            }
                        }
                           $(".removex2").click(function(){
                            var  id=$(this).data('id');
                            var  txt=$(this).data('txt');
                            console.log(id);
                            console.log(txt);
                            $("#removerow2"+id).remove();
                              
                            $(".seltunjangan2").append('<option value="'+id+'">'+txt+'</option>');
                            });
                        //    $(".inptunj").keyup(function(){
                        //     this.value = formatRupiah(this.value);
                             
                        //     });
                        
                        //$(".seltunjangan").select2("destroy");
                        //$("#isitunjangan").clone().insertAfter("div.contenttunjangan:last");
                      } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        //$(".seltunjangan").select2("destroy");
                        /* swalWithBootstrapButtons.fire(
                          'Cancelled',
                          'Your imaginary file is safe :)',
                          'error'
                        ) */
                      }
                    });
                    // $(".seltunjangan").select2({
                    //     dropdownCssClass: "increasedzindexclass"
                    // });
                    //var rupiah = document.getElementById('bestunjinp');
                    /* $("#poptunj").find("#bestunjinp").keyup( function(e){
                        $(this).val(addRibuan($(this).val()));
                    }); */
                    // $(".besarantunjangan").keyup( function(e){
                    //     $(this).val(addRibuan($(this).val()));
                    // }); 
                }
                 function pilihPelamar(idloker){
                    if(idloker!=""){
                        $("#inppegawai").hide();
                        //$("#rowjabatan").hide();
                        $("#selepegawai").show();
                        $("#selpegawai").html("");
                        /* $("#alamat").attr("readonly",true);
                        $("#nomor_telepon").attr("readonly",true); */
                        $.ajax({
                              type: "POST",
                          url: "<?php echo base_url(); ?>HR/ambilPelamar", 
                          data: {id_loker : idloker}, 
                          dataType: "json",
                          beforeSend: function(e) {
                            if(e && e.overrideMimeType) {
                              e.overrideMimeType("application/json;charset=UTF-8");
                            }
                          },
                          success: function(response){ 
                            //$("#selpegawai").select2("destroy");
                            $("#selpegawai").html(response.data_pelamar).show();
                            //$("#selpegawai").select2();
                            $("#idjablok").html('<input type="hidden" id="id_jab_loker" name="id_jabatan" />');
                            $("#id_jab_loker").val(response.id_jab_loker);
                            $("#rowidjenpro").html('<input type="hidden" id="id_jab_loker" name="id_master_jenis_project" />');
                            $("#id_jab_loker").val(response.id_master_jenis_project);
                          },
                          error: function (xhr, ajaxOptions, thrownError) { 
                            alert(thrownError); 
                          }
                        }); 
                    } else {
                        $("#idjablok").html("");
                        $("#rowidjenpro").html("");
                        $("#inppegawai").show();
                        //$("#rowjabatan").show();
                        $("#selepegawai").hide();
                        /* $("#alamat").attr("readonly",false);
                        $("#nomor_telepon").attr("readonly",false); */
                    }
                }

                function pilihSumber(valuenya){
			        $("#idjablok").html("");
			        $("#rowidjenpro").html("");
			        if(valuenya==1){
			            $("#seljab").removeAttr('name');
			            $("#rowcv").hide();
			            $("#rowloker").show();
			            var idlok = $("#lokasi").val();
			            refreshLoker(idlok);
			            $("#rowjabatan2").hide();
			            $("#inppegawai").hide();
			            $("#selepegawai").show();
			            $("#email").inputmask('remove');
			            $("#email").attr('readonly',true);
			            $("#rowpass").hide();
			            //alert(idlok);
			            
			           // $("#sellok").val(null).trigger("change");
			        } else {
			            //$("#seljab").attr('name','id_jabatan');
			            $("#seljab2").attr('name','id_master_jenis_project');
			            $("#rowcv").show();
			            $("#rowloker2").hide();
			            $("#rowjabatan2").show();
			            var pers =$("#selclient2").val();
			            var dept =$("#seldept2").val();
			            seljab(pers,dept);
			            $("#inppegawai").show();
			            $("#selepegawai").hide();
			            $("#email").inputmask('email');
			            $("#email").attr('readonly',false);
			            $("#rowpass").show();
			            //$("#seljab").val(null).trigger("change");
			        }
			    }

			    function seljab(idperusahaan,iddepartemen){
			        $.ajax({
			              type: "POST",
			              url: "<?php echo base_url(); ?>HR/ambilJabatan", 
			              data: {idperusahaan : idperusahaan,iddepartemen :iddepartemen}, 
			              dataType: "json",
			              beforeSend: function(e) {
			                if(e && e.overrideMimeType) {
			                  e.overrideMimeType("application/json;charset=UTF-8");
			                }
			              },
			              success: function(response){ 
			                $("#rowjabatan2").show();
			                $("#seljab2").html(response.data_jp).show();
			              },
			              error: function (xhr, ajaxOptions, thrownError) { 
			                alert(thrownError); 
			              }
			            }); 
			    }

			    function refreshLoker(idlok){
			        if(idlok!=""){
			            $.ajax({
			              type: "POST",
			              url: "<?php echo base_url(); ?>HR/ambilLoker", 
			              data: {id_lokasi_kantor : idlok}, 
			              dataType: "json",
			              beforeSend: function(e) {
			                if(e && e.overrideMimeType) {
			                  e.overrideMimeType("application/json;charset=UTF-8");
			                }
			              },
			              success: function(response){ 
			                $("#rowloker2").show();
			                $("#sellok2").html(response.data_loker).show();
			              },
			              error: function (xhr, ajaxOptions, thrownError) { 
			                alert(thrownError); 
			              }
			            }); 
			        } else {
			            $("#rowloker2").hide();
			        }
			    }

                function pilihClient(idlokasi){
			        if(idlokasi!=""){
			            $("#rowdept2").hide();
			            $("#rowsumber2").hide();
			            $("#rowjabatan2").hide();
			            $("#rowloker2").hide();
			            $.ajax({
			                type: "POST",
			                url: "<?php echo base_url(); ?>HR/ambilClient", 
			                data: {id_lokasi : idlokasi}, 
			                dataType: "json",
			                beforeSend: function(e) {
			                    if(e && e.overrideMimeType) {
			                      e.overrideMimeType("application/json;charset=UTF-8");
			                    }
			                },
			                success: function(response){ 
			                    $("#rowclient2").show();
			                    $("#selclient2").html(response.data_client).show();
			                    $("#selclient2").select2();
			                },
			                error: function (xhr, ajaxOptions, thrownError) { 
			                    alert(thrownError); 
			                }
			            }); 
			        } else {
			            $("#rowclient2").hide();
			            $("#rowdept2").hide();
			        }
			    }

			    function pilihDept2(idclient){
			    	console.log(idclient);
			        if(idclient!=""){
			            $("#rowsumber2").hide();
			            $("#rowjabatan2").hide();
			            $("#rowloker2").hide();
			            $.ajax({
			                type: "POST",
			                url: "<?php echo base_url(); ?>HR/ambilDept", 
			                data: {id_client : idclient}, 
			                dataType: "json",
			                beforeSend: function(e) {
			                    if(e && e.overrideMimeType) {
			                      e.overrideMimeType("application/json;charset=UTF-8");
			                    }
			                },
			                success: function(response){ 
			                	console.log(response);
			                    $("#rowdept2").show();
			                    $("#seldept2").html(response.data_dept).show();
			                    // $("#seldept2").select2();
			                },
			                error: function (xhr, ajaxOptions, thrownError) { 
			                    alert(thrownError); 
			                }
			            }); 
			        } else {
			            $("#rowdept2").hide();
			        }
			    }

			    function formatAngka(){
			        var rupiah = document.getElementById('gapok');
					rupiah.addEventListener('keyup', function(e){
						this.value = formatRupiah(this.value);
					});
			        
					
			    }
                
			    function formatRupiah(angka){
			        var max_chars = 15;
			        if(angka.length > max_chars) {
			            return angka.substr(0, max_chars);
			        } else {
			    		
			            var rupiah = addRibuan(angka);
                        // console.log("rupiahnya : "+rupiah);
			            var number_string = angka.toString().replace(/[^,\d]/g, ''); 
                        // console.log("number_string : "+number_string);
			            var gapok=number_string;
			            // console.log("gapok "+gapok);
			            var total=parseInt(gapok);
                        // console.log("total "+total);
                        var totalribu=addRibuan(total);
                        $("#total_gaji").val(totalribu);
			            // console.log("totalnyapegawai"+totalribu);

			            // $('.inptunj').each(function(i, obj) {
			            //     var thisval=$(this).val();
			            //     var intval = thisval.split(".").join("");
			            //     if(intval==""){intval=0;}
			            //     //console.log("inptunj"+intval);
			            //     total=parseInt(total)+parseInt(intval);
			            // });
                        countGaji();
			            // var totalribu=addRibuan(total);
			            // $("#total_gaji").val(totalribu);
			            // console.log("totalnya"+totalribu);
			            if(total>0){
			                if(total!=""){
			                    $("#btntamtunj").show();
			                    $("#rowgaji").show();
			                } else {
			                    $("#btntamtunj").hide();
			                    $("#rowgaji").hide();
			                }
			            } else {
			                $("#btntamtunj").hide();
			                $("#rowgaji").hide();
			            }
			            return (rupiah ? rupiah : '');
			        }
				}

				function countGaji(){
			        var gapok=$("#gapok").val();
			        var number_string = gapok.toString().replace(/[^,\d]/g, ''); 
			        var gapok=number_string;
			        //console.log("gapok "+gapok);
			        var total=parseInt(gapok);
                    console.log("gapokcountgaji "+gapok);
                    console.log("totalcountgajiatas "+total);
                    // var totalribu=addRibuan(total);
			        // $("#total_gaji").val(totalribu);
                    // console.log("totalnya_count_gaji"+totalribu);
			        $('.inptunj').each(function(i, obj) {
			            var thisval=$(this).val();
			            var intval = thisval.split(".").join("");
			            if(intval==""){intval=0};
                        console.log('intvalnyacountgaji '+intval);
                        console.log('thisvalnyacountgaji '+thisval);
			            total=parseInt(total)+parseInt(intval);
                        console.log('totaleach '+total);
			        });
			        var totalribu=addRibuan(total);
			        $("#total_gaji").val(totalribu);
                    console.log("totalnya_count_gaji_bawah"+totalribu);
			    }

			    function seljab(idperusahaan,iddepartemen){
			        $.ajax({
			                type: "POST",
			              url: "<?php echo base_url(); ?>HR/ambilJabatan", 
			              data: {idperusahaan : idperusahaan,iddepartemen :iddepartemen}, 
			              dataType: "json",
			              beforeSend: function(e) {
			                if(e && e.overrideMimeType) {
			                  e.overrideMimeType("application/json;charset=UTF-8");
			                }
			              },
			              success: function(response){ 
			                $("#rowjabatan2").show();
			                $("#seljab2").html(response.data_jp).show();
			              },
			              error: function (xhr, ajaxOptions, thrownError) { 
			                alert(thrownError); 
			              }
			            }); 
			    }

                function wizard(action){
                    // alert('masuk');
                    $.getScript("<?php echo base_url()?>assets/vendor/jquery-validation/jquery.validate.js", function() {
					   // alert("Script loaded but not necessarily executed.");
					});
					var formhr =  $('#simpan');
					if (action == 'simpan') {
						var formhr =  $('#simpan');
					}else if(action == 'simpanedit'){
						var formhr =  $('#simpanedit');
					}
                    
				    formhr.validate({
				        ignore: '.select2-input, .select2-focusser',
				        highlight: function (element, errorClass, validClass) {
				            var elem = $(element);
				            if (elem.hasClass("select2-offscreen")) {
				                $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
				            } else {
				                elem.addClass(errorClass);
				            }
				        },
				    
				        unhighlight: function (element, errorClass, validClass) {
				            var elem = $(element);
				            if (elem.hasClass("select2-offscreen")) {
				                $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
				            } else {
				                elem.removeClass(errorClass);
				            }
				        }
				        
				        ,errorPlacement: function (error, element) {
				            var elem = $(element);
				           if (elem.hasClass("select2-hidden-accessible")) {
				               element = $("#select2-" + elem.attr("id") + "-container").parent(); 
				               error.insertAfter(element);
				           } else {
				               error.insertAfter(element);
				          }
				        }
				    }); 
				    window.Parsley
				    .addValidator('validateFullWidthCharacters', {
				        requirementType: 'string',
				        validateString: function (value, requirement) {
				            regex = /^([a-z0-9_\.-]+\@[\da-z\.-]+\.[a-z\.]{2,6})$/gm;
				            return regex.test(value);
				        },
				        messages: {
				            en: 'Please enter a valid email address.'
				        }
				    });
                    $('#wizard_horizontal').steps({
				        headerTag: 'h2',
				        bodyTag: 'section',
				        transitionEffect: 'slideLeft',
				        onInit: function (event, currentIndex) {
				            setButtonWavesEffect(event);
				        },
				        onStepChanging: function (event, currentIndex, newIndex) {
                            $(".select2").select2({dropdownParent: $('#wizard_horizontal')});
				            if (currentIndex > newIndex) { return true; }

				            if (currentIndex < newIndex) {
				                formhr.find('.body:eq(' + newIndex + ') label.error').remove();
				                formhr.find('.body:eq(' + newIndex + ') .error').removeClass('error');
				            }
				            formhr.validate().settings.ignore = ':disabled,:hidden';
				            //return formhr.valid();
				            return formhr.parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).validate();
				            //return $("#simpan").parsley().validate();
				        },
				        onStepChanged: function (event, currentIndex, priorIndex) {
				            //$(".select2").select2({ width: '100%' });
                            $(".select2").select2({dropdownParent: $('#wizard_horizontal')});
				            setButtonWavesEffect(event);
				        },
				        onFinishing: function (event, currentIndex) {
				            //alert("onFinishing");
				            if(formhr.parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).isValid()){
				                formhr.submit();
				            } else {
				                formhr.parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).validate();
				            }
				            //formhr.validate().settings.ignore = ':disabled';
				            //return formhr.valid();
				        },
				        onFinished: function (event, currentIndex) {
				            alert("onFinished");
				            if(formhr.parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).isValid()){
				                alert("valid");
				            }
				            swal("Good job!", "Submitted!", "success");
				        }
				    });
                }
            </script>

        <script type="text/javascript">
            $(document).ready(function(){
                <?php if($this->input->post('id_departemen')==""){ ?>
                    $(".rowdept").hide();    
                <?php } ?>
                
                $(".selclient").change(function(){
                    pilihDept(this.value);
                    $(".selclient").val(this.value);
                });
                 $(".seldept").change(function(){
                    $(".seldept").val(this.value);
                });
            });
            function pilihDept(idclient){
                if(idclient!=""){
                    $(".rowsumber").hide();
                    $(".rowjabatan").hide();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>HR/ambilDept", 
                        data: {id_client : idclient}, 
                        dataType: "json",
                        beforeSend: function(e) {
                            if(e && e.overrideMimeType) {
                              e.overrideMimeType("application/json;charset=UTF-8");
                            }
                        },
                        success: function(response){ 
                            $(".rowdept").show();
                            $(".seldept").html(response.data_dept).show();
                            $(".seldept").select2();
                        },
                        error: function (xhr, ajaxOptions, thrownError) { 
                            alert(thrownError); 
                        }
                    }); 
                } else {
                    $(".rowdept").hide();
                }
            }
        </script>

<script type="text/javascript">
    $(document).ready(function(){
      buatTable("tblpegawai");
    });
    function buatTable(id){
        var urlny = $("#"+id).data("url");
        $('#'+id).DataTable( {
                "processing": true,
                "serverSide": true,
                "responsive":true,
                "bDestroy":true,
                "ajax":{
                    url : urlny, // json datasource
                    type: "post",  // method  , by default get
                    data:{nik:'<?php echo $this->input->post('nik') ?>',nama_lengkap:'<?php echo $this->input->post('nama_lengkap')?>',id_departemen:'<?php echo $this->input->post('id_departemen') ?>',id_master_perusahaan:'<?php echo $this->input->post('id_master_perusahaan') ?>',status_karyawan:'<?php echo $this->input->post('status_karyawan') ?>'},
                    error: function(){  // error handling
                        $("."+id+"-error").html("");
                        $("#"+id).append('<tbody class="'+id+'-error"><tr><th>No data found in the server</th></tr></tbody>');
                        
                        
                    }
                },
                fnDrawCallback:function(oSettings){

                }
            } );
        //alert(urlny);
        /* $('#'+id).DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "../server_side/scripts/server_processing.php"
        } ); */
      }
</script>

<script type="text/javascript">
    
    function hapus(nik){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-blue1',
            cancelButton: 'btn btn-red1'
          },
          buttonsStyling: false,
        });
           
        swalWithBootstrapButtons.fire({
            title: "Apakah Anda yakin?",
            text: "Ingin menghapus data ini? ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            //closeOnConfirm: false,
            //closeOnCancel: false,
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
               $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url()?>HR/HapusPegawai/"+nik,
                   success: function(data) {
                        if (data == "Sukses") {
                            swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                        }else{
                            swalWithBootstrapButtons.fire("Error", "Hapus", "error");
                        }
                        // swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                        setTimeout(function(){
                            window.location.href="<?php echo base_url()?>HR/HRPegawai";
                        },2000);
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
            }
        });
    }
    
</script>