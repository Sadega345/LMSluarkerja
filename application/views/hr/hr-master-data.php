
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pengaturan / Master Data</h6> -->
                        <h4 class="tittle-menu">Pengaturan / Master Data</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <!-- <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body"> -->
                            <div class="col-lg-12 col-md-12 view">
                                <div class="card">
                                    <div class="body">
                                        <ul class="nav nav-tabs-new2">

                                            <!-- <li class="nav-item col-md-3 col-12"><a class="nav-link <?php //echo  $this->uri->segment(3)==1 || ($this->uri->segment(3)=="") ?'show active':'' ?> " data-toggle="tab" href="#lokasi">Lokasi Kantor</a></li> -->
                                            <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" data-toggle="tab" href="#bank">Bank Payroll</a></li>
                                            <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" data-toggle="tab" href="#tunjangan">Jenis Tunjangan</a></li>
                                            <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" data-toggle="tab" href="#kebijakan">Tipe Kebijakan</a></li>
                                            <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==5 ?'show active':'' ?>" data-toggle="tab" href="#jabatan">Jabatan</a></li>
                                            <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==6 ?'show active':'' ?>" data-toggle="tab" href="#leaveKategori">Leave Kategory</a></li>

                                           <!--  <li class="nav-item"><a class="nav-link <?php //echo  $this->uri->segment(3)==7 ?'show active':'' ?>" data-toggle="tab" href="#umk">UMK</a></li> -->
                                           <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==8 ?'show active':'' ?>" data-toggle="tab" href="#lembur">Setting Lembur</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- <div class="tab-pane <?php //echo  $this->uri->segment(3)==1 || ($this->uri->segment(3)=="")?'show active':'' ?>" id="lokasi">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-6 " align="right">
                                                        <a href="<?php //echo base_url()?>HR/TambahHRLokasiKantor" class="btn btn-darkblue col-md-6" >Tambah Lokasi Kantor</a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Provinsi</th>
                                                                <th>Kota/Kabupaten</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php //foreach ($datalokasikantor->result() as $dataLokasiKantor) { ?>
                                                            <tr>
                                                                <td><?php //echo $dataLokasiKantor->id_lokasi_kantor; ?></td>
                                                                <td><?php //echo $dataLokasiKantor->provinsi; ?></td>
                                                                <td><?php //echo $dataLokasiKantor->kabupaten; ?></td>
                                                                <td>
                                                                    <a href="javascript:;"  class="btn btn-red1 hapus" title="Hapus" data-type="lokasi" data-id="<?php //echo $dataLokasiKantor->id_lokasi_kantor; ?>">Hapus
                                                                    </a>
                                                                    <a href="<?php //echo base_url()?>HR/EditLokasiKantor/<?php //echo $dataLokasiKantor->id_lokasi_kantor ?>">
                                                                        <button class="btn btn-yellow">Edit</button>
                                                                    </a> 
                                                                </td>
                                                            </tr>
                                                        <?php //} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> -->
                                            <div class="tab-pane <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" id="bank">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <div class="col-md-6 " align="right">
                                                            <a href="javascript:;" onclick="formtambahbankpayroll()" class="btn Rectangle-diterima col-6"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Bank Payroll</a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Bank Payroll</th>
                                                                <th>Biaya</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php foreach ($databankpayroll->result() as $dataBankPayroll) { ?>
                                                            <tr>
                                                                <td><?php echo $dataBankPayroll->id_bank; ?></td>
                                                                <td><?php echo $dataBankPayroll->deskripsi; ?></td>
                                                                 <td>Rp. <?php echo number_format($dataBankPayroll->biaya,0,'.','.') ?></td>
                                                                <td>
                                                                    <?php if ($dataAkses == '1'){ ?>
                                                                        <a href="javascript:;"  class="btn btn-aksi hapus" onclick="hapus('hapusbank',<?php echo $dataBankPayroll->id_bank; ?>)" id="hapusbank<?php echo $dataBankPayroll->id_bank; ?>" title="Hapus" data-type="bank" data-id="<?php echo $dataBankPayroll->id_bank; ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
                                                                        </a>
                                                                       
                                                                        <a href="javascript:;" onclick="formeditbankpayroll('<?php echo $dataBankPayroll->id_bank ?>')">
                                                                            <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                                                        </a> 
                                                                    <?php } ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                          <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" id="tunjangan">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <div class="col-md-6 " align="right">
                                                            <a href="javascript:;" onclick="formtambahjenistunjangan()" class="btn Rectangle-diterima col-6"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Jenis Tunjangan</a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Jenis Tunjangan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           <?php foreach ($datajenistunjangan->result() as $dataJenisTunjangan) { ?>
                                                            <tr>
                                                                <td><?php echo $dataJenisTunjangan->id_jenis_tunjangan; ?></td>
                                                                <td><?php echo $dataJenisTunjangan->jenis_tunjangan; ?></td>
                                                                <td>
                                                                    <?php if ($dataAkses == '1'){ ?>
                                                                       <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="jenis_tunjangan" onclick="hapus('hapusjt',<?php echo $dataJenisTunjangan->id_jenis_tunjangan; ?>)" id="hapusjt<?php echo $dataJenisTunjangan->id_jenis_tunjangan; ?>" data-id="<?php echo $dataJenisTunjangan->id_jenis_tunjangan; ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
                                                                        </a>
                                                                        <a href="javascript:;" onclick="formeditjenistunjangan('<?php echo $dataJenisTunjangan->id_jenis_tunjangan ?>')">
                                                                            <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                                                        </a>  
                                                                    <?php } ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" id="kebijakan">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <div class="col-md-6 " align="right">
                                                            <a href="javascript:;" onclick="formtambahtipekebijakan()" class="btn Rectangle-diterima col-6"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Tipe Kebijakan</a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Tipe Kebijakan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($datatipekebijakan->result() as $dataTipeKebijakan) { ?>
                                                            <tr>
                                                                <td><?php echo $dataTipeKebijakan->id_policetype; ?></td>
                                                                <td><?php echo $dataTipeKebijakan->deskripsi; ?></td>
                                                                <td>
                                                                    <?php if ($dataAkses == '1'){ ?>
                                                                        <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="kebijakan" onclick="hapus('hapustk',<?php echo $dataTipeKebijakan->id_policetype; ?>)" id="hapustk<?php echo $dataTipeKebijakan->id_policetype; ?>" data-id="<?php echo $dataTipeKebijakan->id_policetype; ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
                                                                        </a>
                                                                        <a href="javascript:;" onclick="formedittipekebijakan('<?php echo $dataTipeKebijakan->id_policetype ?>')">
                                                                            <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                                                        </a> 
                                                                    <?php } ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane <?php echo  $this->uri->segment(3)==5 ?'show active':'' ?>" id="jabatan">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <div class="col-md-6 " align="right">
                                                            <a href="javascript:;" onclick="formtambahjabatan()" class="btn Rectangle-diterima col-6"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Jabatan</a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Jabatan</th>
                                                                <th>Image</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($datajabatan->result() as $dataJabatan) { ?>
                                                            <tr>
                                                                <td><?php echo $dataJabatan->id_master_jenis_project; ?></td>
                                                                <td><?php echo $dataJabatan->jenis_project; ?></td>
                                                                <td><img src="<?php echo base_url() ?>assets/img/recruitment/<?php echo $dataJabatan->image!=""? $dataJabatan->image:'user.png' ?>" height="50px" width="50px"></td>
                                                                <td>
                                                                    <?php if ($dataAkses == '1'){ ?>
                                                                        <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="jabatan" onclick="hapus('hapusjb',<?php echo $dataJabatan->id_master_jenis_project; ?>)" id="hapusjb<?php echo $dataJabatan->id_master_jenis_project; ?>" data-id="<?php echo $dataJabatan->id_master_jenis_project; ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
                                                                        </a>
                                                                        <a href="javascript:;" onclick="formeditjabatan('<?php echo $dataJabatan->id_master_jenis_project ?>')">
                                                                            <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                                                        </a> 
                                                                    <?php } ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane <?php echo  $this->uri->segment(3)==6 ?'show active':'' ?>" id="leaveKategori">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>

                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <div class="col-md-6 " align="right">
                                                            <a href="javascript:;" onclick="formtambahLeaveKategory()" class="btn Rectangle-diterima col-6"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Leave Kategory</a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Nama Cuti</th>
                                                                <th>Kategori Cuti</th>
                                                                <th>Jumlah Hari</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($dataleavekategori->result() as $dt) { ?>
                                                            <tr>
                                                                <td><?php echo $dt->id_leave_kategori; ?></td>
                                                                <td><?php echo $dt->deskripsi; ?></td>
                                                                <td><?php  if($dt->status=='0'){
                                                                	echo "Pribadi";
                                                                }  if($dt->status=='1'){
                                                                	echo "Khusus";
                                                                }else if($dt->status=='2'){
                                                                	echo "Izin";
                                                                } ?></td>
                                                                <td><?php echo $dt->status=='1'?$dt->jumlah_hari.'Hari':'-'; ?></td>
                                                                <td>
                                                                    <?php if ($dataAkses == '1'){ ?>
                                                                        <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="cuti" onclick="hapus('hapuslk',<?php echo $dt->id_leave_kategori; ?>)" id="hapuslk<?php echo $dt->id_leave_kategori; ?>" data-id="<?php echo $dt->id_leave_kategori ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
                                                                        </a>
                                                                        <a href="javascript:;" onclick="formeditLeaveKategory('<?php echo $dt->id_leave_kategori ?>')">
                                                                            <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                                                        </a> 
                                                                    <?php } ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane <?php echo  $this->uri->segment(3)==7 ?'show active':'' ?>" id="umk">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <div class="col-md-6 " align="right">
                                                            <a href="<?php echo base_url()?>HR/TambahHRUmk" class="btn Rectangle-diterima "><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah UMK</a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Gaji</th>
                                                                <th>Provinsi</th>
                                                                <th>Kota/Kabupaten</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($dataUMK->result() as $dt) { ?>
                                                            <tr>
                                                                <td><?php echo $dt->id_umk; ?></td>
                                                                <td><?php echo $dt->gaji; ?></td>
                                                                <td><?php echo $dt->provinsi; ?></td>
                                                                <td><?php echo $dt->kabupaten; ?></td>
                                                                <td>
                                                                    <?php if ($dataAkses == '1'){ ?>
                                                                        <a href="<?php echo base_url()?>HR/HapusUMK/<?php echo $dt->id_umk?>"  class="btn btn-red1" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus">Hapus
                                                                        </a>
                                                                        <a href="<?php echo base_url()?>HR/EditUMK/<?php echo $dt->id_umk ?>">
                                                                            <button class="btn btn-yellow">Edit</button>
                                                                        </a> 
                                                                    <?php } ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane <?php echo  $this->uri->segment(3)==8 ?'show active':'' ?>" id="lembur">
                                                <div class="row m-t-10">
                                                    <div class="col-md-6">
                                                    </div>

                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <div class="col-md-6 " align="right">
                                                            <a href="javascript:;" onclick="formtambahSettingLembur()" class="btn Rectangle-diterima col-6"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Setting Lembur</a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                <div class="table-responsive m-t-10">
                                                    <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                      
                                                         <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID </th>
                                                                <th>Jenis Lembur</th>
                                                                <th>Value Lembur</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($datalembur->result() as $dt) { ?>
                                                            <tr>
                                                                <td><?php echo $dt->id_lembur; ?></td>
                                                                <td><?php echo $dt->jenis_lembur; ?></td>
                                                                <td>Rp. <?php echo number_format($dt->value_lembur,0,'.','.'); ?></td>
                                                                <td>
                                                                    <?php if ($dataAkses == '1'){ ?>
                                                                        <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="lembur" onclick="hapus('hapusl',<?php echo $dt->id_lembur; ?>)" id="hapusl<?php echo $dt->id_lembur; ?>" data-id="<?php echo $dt->id_lembur ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
                                                                        </a>
                                                                        <a href="javascript:;" onclick="formeditSettingLembur('<?php echo $dt->id_lembur ?>')">
                                                                            <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                                                        </a> 
                                                                    <?php } ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                       <!--  </div>
                    </div>
                </div> -->
            </div>

            <!-- tambah bankpayroll modal -->
            <div class="modal fade bd-example-modal-lg" id="tambahbankpayroll">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form method="post" action="<?php echo base_url()?>HR/ProsesTambahBankPayroll">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Bank Payroll</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambahbankpayroll">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit bankpayroll modal -->
            <div class="modal fade bd-example-modal-lg" id="editbankpayroll">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form method="post" action="<?php echo base_url()?>HR/ProsesEditBankPayroll">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Bank Payroll</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formeditbankpayroll">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tambah jenis tunjangan modal -->
            <div class="modal fade bd-example-modal-lg" id="tambahjenistunjangan">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                              <form method="post" action="<?php echo base_url()?>HR/ProsesTambahJenisTunjangan">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Jenis Tunjangan</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambahjenistunjangan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit jenis tunjangan modal -->
            <div class="modal fade bd-example-modal-lg" id="editjenistunjangan">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form method="post" action="<?php echo base_url()?>HR/ProsesEditJenisTunjangan">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Jenis Tunjangan</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formeditjenistunjangan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tambah tipe kebijakan modal -->
            <div class="modal fade bd-example-modal-lg" id="tambahtipekebijakan">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                              <form method="post" action="<?php echo base_url()?>HR/ProsesTambahTipeKebijakan">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Tipe Kebijakan</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambahtipekebijakan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit tipe kebijakan modal -->
            <div class="modal fade bd-example-modal-lg" id="edittipekebijakan">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form method="post" action="<?php echo base_url()?>HR/ProsesEditTipeKebijakan">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Tipe Kebiajakan</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formedittipekebijakan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tambah jabatan modal -->
            <div class="modal fade bd-example-modal-lg" id="tambahjabatan">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form method="post" action="<?php echo base_url()?>HR/ProsesTambahJabatan" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah jabatan</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambahjabatan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit jabatan modal -->
            <div class="modal fade bd-example-modal-lg" id="editjabatan">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form method="post" action="<?php echo base_url()?>HR/ProsesEditJabatan" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit jabatan</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formeditjabatan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tambah LeaveKategory modal -->
            <div class="modal fade bd-example-modal-lg" id="tambahLeaveKategory">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form method="post" action="<?php echo base_url()?>HR/ProsesTambahLeaveKategory" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah LeaveKategory</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambahLeaveKategory">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit LeaveKategory modal -->
            <div class="modal fade bd-example-modal-lg" id="editLeaveKategory">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form method="post" action="<?php echo base_url()?>HR/ProsesEditLeaveKategory" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit LeaveKategory</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formeditLeaveKategory">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

             <!-- tambah setting lembur modal -->
            <div class="modal fade bd-example-modal-lg" id="tambahSettingLembur">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form method="post" action="<?php echo base_url()?>HR/ProsesTambahSettingLembur">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Setting Lembur</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambahSettingLembur">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit setting lembur modal -->
            <div class="modal fade bd-example-modal-lg" id="editSettingLembur">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form method="post" action="<?php echo base_url()?>HR/ProsesEditSettingLembur">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Setting Lembur</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formeditSettingLembur">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
              function getval(sel)
                {
                   if((sel.value)=='0' || (sel.value)=='2'){
                    $("#test").hide();
                   } else{
                    $("#test").show();
                   }
                }
            </script>

            <script type="text/javascript">
                
                $(document).ready(function(){
                    $('#tambahbankpayroll').modal({backdrop: 'static', keyboard: false});
                    $('#editbankpayroll').modal({backdrop: 'static', keyboard: false});
                    $('#tambahjenistunjangan').modal({backdrop: 'static', keyboard: false});
                    $('#editjenistunjangan').modal({backdrop: 'static', keyboard: false});
                    $('#tambahtipekebijakan').modal({backdrop: 'static', keyboard: false});
                    $('#edittipekebijakan').modal({backdrop: 'static', keyboard: false});
                    $('#tambahjabatan').modal({backdrop: 'static', keyboard: false});
                    $('#editjabatan').modal({backdrop: 'static', keyboard: false});
                    $('#tambahLeaveKategory').modal({backdrop: 'static', keyboard: false});
                    $('#editLeaveKategory').modal({backdrop: 'static', keyboard: false});
                    $('#tambahSettingLembur').modal({backdrop: 'static', keyboard: false});
                    $('#editSettingLembur').modal({backdrop: 'static', keyboard: false});
                    //hapus();
                    $('.master').DataTable({
                        responsive: true,
                        
                        fnDrawCallback:function(oSettings){
                           //hapus();
                        }

                    });
                });

                function formtambahbankpayroll(){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/TambahHRBankPayroll",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#tambahbankpayroll').modal('show');
                          $('#formtambahbankpayroll').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formeditbankpayroll(a){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/EditBankPayroll/"+a,
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#editbankpayroll').modal('show');
                          $('#formeditbankpayroll').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formtambahjenistunjangan(){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/TambahHRJenisTunjangan",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#tambahjenistunjangan').modal('show');
                          $('#formtambahjenistunjangan').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formeditjenistunjangan(a){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/EditJenisTunjangan/"+a,
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#editjenistunjangan').modal('show');
                          $('#formeditjenistunjangan').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formtambahtipekebijakan(){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/TambahHRTipeKebijakan",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#tambahtipekebijakan').modal('show');
                          $('#formtambahtipekebijakan').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formedittipekebijakan(a){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/EditTipeKebijakan/"+a,
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#edittipekebijakan').modal('show');
                          $('#formedittipekebijakan').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formtambahjabatan(){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/TambahHRJabatan",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#tambahjabatan').modal('show');
                          $('#formtambahjabatan').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formeditjabatan(a){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/EditJabatan/"+a,
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#editjabatan').modal('show');
                          $('#formeditjabatan').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formtambahLeaveKategory(){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/TambahHRLeaveKategory",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#tambahLeaveKategory').modal('show');
                          $('#formtambahLeaveKategory').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formeditLeaveKategory(a){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/EditLeaveKategory/"+a,
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');

                          $('#editLeaveKategory').modal('show');
                          $('#formeditLeaveKategory').html(response);
                          var e = document.getElementById("a");
						  var strUser = e.options[e.selectedIndex].value;
                           if((strUser)=='0' || (strUser)=='2'){
		                    $("#test").hide();
		                   } else{
		                    $("#test").show();
		                   }

                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formtambahSettingLembur(){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/TambahHRSettingLembur",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#tambahSettingLembur').modal('show');
                          $('#formtambahSettingLembur').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
                function formeditSettingLembur(a){
                    $.ajax({
                      url: "<?php echo base_url();?>HR/EditSettingLembur/"+a,
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#editSettingLembur').modal('show');
                          $('#formeditSettingLembur').html(response);
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }


                function hapus(iddiv,id){
                     // $(".hapus").click(function(){
                          const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                              confirmButton: 'btn btn-blue1',
                              cancelButton: 'btn btn-red1'
                            },
                            buttonsStyling: false,
                          });
                                var type=$('#'+iddiv+id).data('type');
                                var id=$('#'+iddiv+id).data('id');

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
                                        var url='';
                                        var no="";
                                        if(type=='lokasi'){
                                            url='<?php echo base_url()?>HR/HapusLokasiKantor/'+id;
                                            no='1';
                                        }if(type=='bank'){
                                            url='<?php echo base_url()?>HR/HapusBankPayroll/'+id;
                                            no='2';
                                        }if(type=='jenis_tunjangan'){
                                            url='<?php echo base_url()?>HR/HapusJenisTunjangan/'+id;
                                            no='3';
                                        }if(type=='kebijakan'){
                                            url='<?php echo base_url()?>HR/HapusTipeKebijakan/'+id;
                                            no='4';
                                        }if(type=='jabatan'){
                                            url='<?php echo base_url()?>HR/HapusJabatan/'+id;
                                            no='5';
                                        }if(type=='cuti'){
                                            url='<?php echo base_url()?>HR/HapusLeaveKategory/'+id;
                                            no='6';
                                        }if(type=='lembur'){
                                            url='<?php echo base_url()?>HR/HapusSettingLembur/'+id;
                                            no='8';
                                        }
                                         $.ajax({
                                              type: 'POST',
                                              url:url,
                                             success: function(data) {
                                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                                  setTimeout(function(){
                                                          window.location.href="<?php echo base_url()?>HR/HRMasterData/"+no;
                                                       
                                                  },2000);
                                              }
                                          });
                                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                      }
                                  });
                          
                      //  });
  
              };
            </script>
         
