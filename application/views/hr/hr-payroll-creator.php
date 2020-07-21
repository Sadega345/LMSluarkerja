

            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <p class="fz-36 barlow-bold">Keuangan / Payroll Creator</p>
                    </div>
                </div>
            </div>
            
            <div class="row p-10">
            <div class="card">
            <div class="body">
            <div class="col-lg-12  wizard">
            
                

                <ul class="nav nav-tabs-new2" role="tablist">
                    
                    <li class="nav-item col-md-2 col-12 <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" >

                        <a class="nav-link <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" data-toggle="tab" href="#upload">
                            <img src="<?php echo base_url() ?>/assets/img/uploadabu.svg" class="padd-right-5">
                            Upload
                        </a>
                        
                    </li>

                    <li class="nav-item col-md-2 col-12 <?php echo  $this->uri->segment(3)==3  ?'active':'' ?>">

                        <a class="nav-link <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" data-toggle="tab" href="#draft">
                            <img src="<?php echo base_url() ?>/assets/img/draft.svg" class="padd-right-5">Draft
                        </a>
                    </li>

                    <li class="nav-item col-md-2 col-12 <?php echo  $this->uri->segment(3)==4  ?'active':'' ?>">

                        <a class="nav-link <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" data-toggle="tab" href="#approve">
                            <img src="<?php echo base_url() ?>/assets/img/approve.svg" class="padd-right-5">Approve
                        </a>
                    </li>
                </ul>
                
                
                <div class="tab-content">
                   
                    <div role="tabpanel" class="tab-pane <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" id="upload">

                        <div class="row clearfix ">
                        	
                            <div class="col-lg-12 col-md-12">
                                 
                                        <div class="row ">
                                            <?php if ($dataAkses == '1'){ ?>
                                                <div class="col-md-1 " >
                                                </div>
                                                <div class="col-md-2 col-6" ><!-- <?php// echo base_url() ?>SamplePdf/SistemGaji -->
                                                    <a href="javascript:;" class="btn Rectangle-generate" onclick="generate('')">
                                                        <img src="<?php echo base_url() ?>assets/img/generate.svg" class="padd-right-5">Generate</a>
                                                </div>
                                                <div class="col-md-3 col-8" >
                                                    <a href="<?php echo base_url() ?>assets/sampleTemplate/format-csv-upload2.csv" class="btn Rectangle-generate"><img src="<?php echo base_url() ?>assets/img/download.svg" class="padd-right-5">Download Template</a>
                                                </div>
                                                <div class="col-md-3" >
                                                </div>
                                            <?php } ?>
                                            
                                        </div>
                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>HR/prosesHRUploadCSV">
                                            <div class="row m-t-10">
                                                <div class="col-md-1 ">
                                                </div>
                                                <div class="col-md-6 " >
                                                    <p class="abu">Pilih Opsi Pembuatan Payroll Ulpoad CSV</p>
                                                </div>
                                                <div class="col-md-3 ">
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-1 " align="right">
                                                </div>
                                                <div class="col-md-4 m-t-10" >
                                                   <select name="id_bank" class="form-control fcheight">
                                                        <option readonly>Pilih Bank</option>
                                                        <?php foreach($databank->result() as $row){?>
                                                        <option value="<?php echo $row->id_bank?>"><?php echo $row->deskripsi?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 m-t-10" align="center">
                                                   <input type="file" name="filecsv" name="upload csv"  class="form-control fcheight">
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-1 " align="right">
                                                </div>
                                                <div class="col-md-6 m-t-10" align="center">
                                                   <input type="file" name="filecsv" name="upload csv"  class="form-control">
                                                </div>
                                                <div class="col-md-3 ">
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-1 ">
                                                </div>
                                                <?php if ($dataAkses == '1'){ ?>
                                                    <div class="col-md-6 m-t-10" >
                                                        <input type="submit" value="Upload data Payroll" class="btn Rectangle-cari">
                                                    </div>
                                                <?php } ?>
                                                
                                                <div class="col-md-3 ">
                                                </div>
                                            </div>
                                            
                                            </form>

                            </div>
                        	
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" id="draft">
                        
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 ">
                                
                                        <form action="<?php echo base_url()?>HR/HRPayrollCreator/3" method="post">
                                        <div class="row ">
                                            <div class="col-md-2 m-t-10">   
                                                <label class="fz-18">Search Filter</label>   
                                            </div>
                                            <div class="col-md-10" align="right">

                                                <button type="submit" class="btn Rectangle-cari col-md-2">
                                                
                                                    <i class="fa fa-search padd-right-5 putih" ></i>
                                                   Cari
                                                  
                                                </button>
                                            </div>
                                        </div>
                                        <!-- ID Dan Bank-->
                                        <div class="row m-t-10">
                                            <div class="col-md-2 m-t-10">
                                                <label>NIK </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <input type="text" name="nik" class="form-control fcheight">
                                            </div>
                                            <div class="col-md-2 m-t-10">
                                                <label>Bank Payroll </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="bank" class="form-control fcheight">
                                                    <option readonly value="">Pilih Bank</option>
                                                    <?php foreach($databank->result() as $row){?>
                                                    <option value="<?php echo $row->id_bank ?>"
                                                    	<?php if ($row->id_bank == $this->input->post('bank')){ ?>
                                                    		<?php echo "selected='selected'"; ?>
                                                    	<?php } ?>>
                                                    	<?php echo $row->deskripsi; ?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Nama Dan Payroll Bulan-->
                                        <div class="row m-t-10">
                                            <div class="col-md-2 m-t-10">
                                                <label>Nama Karyawan </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <input type="text" name="nama_karyawan" class="form-control fcheight">
                                            </div>
                                            <div class="col-md-2 m-t-10">
                                                <label>Payroll Bulan </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="bulan" class="form-control fcheight">
                                                    <option readonly value="">Pilih Bulan Dan Tahun</option>
                                                    <?php 
                                                    $bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                                    for($i=2000; $i<= date('Y');$i++){
                                                        $angka = 1;

                                                        foreach ($bulan as $bul){ 
                                                        $bulat = sprintf('%02d', $angka);
                                                            echo "<option value='".$i.'-'.$bulat."' ".($i.'-'.$bulat==date('Y-m')?'selected':'').">".$bul.'-'.$i."</option>";
                                                            $angka++;
                                                        } 
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Client -->
                                        <div class="row m-t-10" id="rowclient">
                                            <div class="col-md-2 m-t-10">
                                                <label>Unit Bisnis </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="id_client" id="selclient" class="form-control fcheight">
                                                    <option readonly value="">Pilih Unit Bisnis</option>
                                                    <?php
                                                        foreach($dataClient->result() as $dtc){
                                                            ?>
                                                            <option value="<?php echo $dtc->id_master_perusahaan; ?>"> <?php echo $dtc->nama_perusahaan; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Departemen -->
                                        <div class="row m-t-10" id="rowdept">
                                            <div class="col-md-2 m-t-10">
                                                <label>Departemen </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="id_dept" id="seldept" class="form-control fcheight">
                                                    <option readonly value="">Pilih Departemen</option>
                                                    <?php
                                                        foreach($dataClient->result() as $dtc){
                                                            ?>
                                                            <option value="<?php echo $dtc->id_master_perusahaan; ?>"> <?php echo $dtc->nama_perusahaan; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        
                                    </form>
                                    
                            </div>
                        </div>

                        <div class="row clearfix m-t-10">
                            <div class="col-lg-12 col-md-12 view" >
                                 
                                        <div class="row">
                                           
                                           <?php if ($dataAkses == '1'){ ?>
                                                <div class="col-md-12 col-12" align="right">
                                                    <a href="<?php echo base_url() ?>HR/prosesApprovePayroll" class="btn Rectangle-cari padd-top-10 col-md-2">Approval</a>
                                                </div>
                                           <?php } ?>
                                           
                                        </div>
                                        <div class="table-responsive m-t-10" align="left">
                                            <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%;">
                                              
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>NIK</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Unit Bisnis</th>
                                                        <th>Departemen</th>
                                                        <th>Jabatan</th>
                                                        <th>Bank</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php foreach($dataUploadCsv->result() as $row){
                                                    
                                                    ?>
                                                    
                                                    <tr>                                       
                                                        <td class="ukuran-font"><?php echo $row->nik?></td>
                                                        <td class="ukuran-font"><?php echo $row->nama_lengkap?></td>
                                                        <td class="ukuran-font"><?php echo $row->nama_perusahaan?></td>
                                                        <td class="ukuran-font"><?php echo $row->nama_departemen?></td>
                                                        <td class="ukuran-font"><?php echo $row->jenis_project?></td>
                                                        <td class="ukuran-font"><?php echo $row->nama_bank?></td> 
                                                        <td class="ukuran-font">Rp. <?php echo number_format($row->disetorkan,0,'.','.')?></td>
                                                        <td class="ukuran-font"><?php echo strftime(" %d %B %Y",strtotime($row->tanggal));?></td>
                                                        <td>
                                                            

                                                            <a href="javascript:;" onclick="viewinfogaji('<?php echo $row->nik ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">lihat</a>

                                                            <?php if ($dataAkses == '1'){ ?>

                                                                <a href="javascript:;" class="btn btn-aksi" onclick="formeditgaji('<?php echo $row->nik ?>')"><img src="<?php echo base_url() ?>assets/img/Update.svg" class="padd-right-5">Edit</a>

                                                                <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="payroll" data-nik="<?php echo $row->nik; ?>"><i class="fa fa-trash merah padd-right-5"></i>Hapus
                                                                </a>

                                                            <?php } ?>
                                                            
                                                        </td>
                                                    </tr>   
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" id="approve">
                        
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 ">
                                        
                                        <form action="<?php echo base_url()?>HR/HRPayrollCreator/4" method="post">
                                            <div class="row">
                                                <div class="col-md-2 m-t-10">   
                                                    <label class="fz-18">Search Filter</label>
                                                </div>
                                                <div class="col-md-10" align="right">
                                                    <button type="submit" class="btn Rectangle-cari col-md-2">
                                                    
                                                        <i class="fa fa-search padd-right-5 putih" ></i>
                                                       Cari
                                                      
                                                    </button>
                                                </div>
                                            </div>

                                        <!-- ID Dan Bank-->
                                        <div class="row m-t-10">
                                            <div class="col-md-2 m-t-10">
                                                <label class="fz-14-judul">NIK </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <input type="text" name="nik_approve" class="form-control fcheight" value="<?php echo $this->input->post('nik_approve') ?>">
                                            </div>
                                            <div class="col-md-2 m-t-10">
                                                <label class="fz-14-judul">Bank Payroll </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="bank_approve" class="form-control fcheight">
                                                    <option readonly value="">Pilih Bank</option>
                                                    <?php foreach($databank->result() as $row){?>
                                                    <option value="<?php echo $row->id_bank ?>"
                                                    	<?php if ($row->id_bank == $this->input->post('bank_approve')){ ?>
                                                    		<?php echo "selected='selected'"; ?>
                                                    	<?php } ?>>
                                                    	<?php echo $row->deskripsi; ?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Nama Dan Payroll Bulan-->
                                        <div class="row m-t-10">
                                            <div class="col-md-2 m-t-10">
                                                <label class="fz-14-judul">Nama Karyawan </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <input type="text" name="nama_karyawan_approve" class="form-control fcheight" value="<?php echo $this->input->post('nama_karyawan_approve') ?>">
                                            </div>
                                            <!-- <div class="col-md-2 m-t-10">
                                                <label>Payroll Bulan </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="tanggal_approve" class="form-control">
                                                    <option readonly value="">Pilih Bulan Dan Tahun ?></option>
                                                    <?php 
                                                    //$bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                                    //for($i=2000; $i<= date('Y');$i++){
                                                        //$angka = 1;

                                                        //foreach ($bulan as $bul){ 
                                                        //$bulat = sprintf('%02d', $angka);
                                                            //echo "<option value='".$i.'-'.$bulat."' ".($i.'-'.$bulat==date('Y-m')?'selected':'').">".$bul.'-'.$i."</option>";
                                                            //$angka++;
                                                        //} 
                                                    //}
                                                    ?>
                                                </select>
                                            </div> -->
                                        </div>

                                        <!-- Client -->
                                        <div class="row m-t-10" id="rowclient2">
                                            <div class="col-md-2 m-t-10">
                                                <label class="fz-14-judul">Unit Bisnis </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="id_client_approve" id="selclient2" class="form-control fcheight">
                                                    <option readonly value="">Pilih Unit Bisnis</option>
                                                    <?php
                                                        foreach($dataClient->result() as $dtc){
                                                            ?>
                                                            <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php if ($dtc->id_master_perusahaan == $this->input->post('id_client_approve')){ ?>
                                                                <?php echo "selected='selected'"; ?>
                                                            <?php } ?>> 
                                                                <?php echo $dtc->nama_perusahaan; ?>
                                                                
                                                            </option>
                                                    <?php
                                                        }
                                                    ?>

                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Departemen -->
                                        <div class="row m-t-10" id="rowdept2">
                                            <div class="col-md-2 m-t-10">
                                                <label class="fz-14-judul">Departemen </label>        
                                            </div>
                                            <div class="col-md-4" align="left">
                                                <select name="id_dept_approve" id="seldept2" class="form-control fcheight">
                                                    <option readonly value="">Pilih Departemen</option>
                                                    <?php
                                                        foreach($dataClient->result() as $dtc){
                                                            ?>
                                                            <option value="<?php echo $dtc->id_master_perusahaan; ?>"> 
                                                                <?php echo $dtc->nama_perusahaan; ?>
                                                                    
                                                                </option>
                                                            <?php
                                                        }
                                                    ?>
                                                    <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php if ($dtc->id_master_perusahaan == $this->input->post('id_client_approve')){ ?>
                                                                <?php echo "selected='selected'"; ?>
                                                            <?php } ?>> 
                                                                <?php echo $dtc->nama_perusahaan; ?>
                                                                
                                                            </option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Lokasi Kantor -->
                                        <!-- <div class="row m-t-10" id="rowlokasi2">
                                            <div class="col-md-2 m-t-10">
                                                <label>Lokasi </label>        
                                            </div>
                                             <div class="col-md-4" align="left">
                                                <select name="id_lokasi_approve" id="lokasi2" class="form-control">
                                                    <option selected disabled value=""> Pilih Lokasi </option>
                                                    <?php
                                                        //foreach($dataLokasiC->result() as $dtl){
                                                            ?>
                                                            <option value="<?php //echo $dtl->id_lokasi_kantor; ?>"> <?php //echo $dtl->desKabupaten; ?></option>
                                                            <?php
                                                        //}
                                                    ?>
                                                </select>
                                            </div>
                                        </div> -->
                                        </form>
                            </div>
                        </div>


                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 view" >
                                        <div class="row">
                                           
                                           <?php 
                                           	$bank = $this->input->post('bank_approve')==''?'':$this->input->post('bank_approve');

                                            ?>
                                            <?php if ($dataAkses == '1'){ ?>
                                                <div class="col-md-12 col-12 mb-2" align="right">
                                                    <!-- <a href="<?php //echo base_url()?>HR/spreadsheet/<?php //echo $bank ?>" class="btn btn-blue col-md-2">Export To CSV </a> -->

                                                    <a href="<?php echo base_url()?>HR/spreadsheet/<?php echo $bank ?>" class="btn Rectangle-diterima col-md-2">
                                                        <img src="<?php echo base_url() ?>assets/img/export.svg" class="padd-right-5">&nbsp;
                                                    Export To CSV
                                                    </a>
                                                </div>
                                            <?php } ?>
                                            
                                        </div>
                                        <div class="table-responsive" align="left">
                                            <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">

                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>NIK</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Unit Bisnis</th>
                                                        <th>Departemen</th>
                                                        <th>Jabatan</th>
                                                        <th>Bank</th>
                                                        <th>Nominal</th>
                                                        <th>Tanggal</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php foreach($dataApprove->result() as $row){?>
                                                    
                                                    <tr>                                       
                                                        <td><?php echo $row->nik?></td>
                                                        <td><?php echo $row->nama?></td>
                                                        <td><?php echo $row->perusahaan?></td>
                                                        <td><?php echo $row->departemen?></td>
                                                        <td><?php echo $row->jabatan?></td>
                                                        <td><?php echo $row->bank?></td>
                                                        <td>Rp. <?php echo number_format($row->nominal,0,'.','.')?></td>
                                                        <td><?php echo strftime(" %d %B %Y",strtotime($row->tanggal));?></td>
                                                        <td>

                                                            <a href="javascript:;" onclick="viewinfogaji('<?php echo $row->nik ?>')" class="btn btn-aksi"><img src="https://Natadev.id/Penata/assets/img/View.svg" class="padd-right-5">lihat</a>

                                                        </td>
                                                    </tr>   
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                 
        </div>
        </div>
        </div>
        </div>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="view">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <div class="col-lg-12">
                                <div class="row m-t-10">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="fz-18">Detail Gaji Pegawai</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6" align="right">
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-12">
                                        <div id="viewgaji">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Payroll Creator -->
            <div class="modal fade bd-example-modal-lg" id="viewedit" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" action="<?php echo base_url()?>HR/ProsesEditHRPayrollCreator" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Detail Gaji Pegawai</label>
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formeditgaji">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
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

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#viewedit').modal({backdrop: 'static', keyboard: false});
                    $('#view').modal({backdrop: 'static', keyboard: false});
                });

                function viewinfogaji(a){
                      $.ajax({
                        url: "<?php echo base_url();?>HR/ViewHRPayrollCreatorApprove/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#view').modal('show');
                            $('#viewgaji').html(response);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }

                function formeditgaji(a){
                      $.ajax({
                        url: "<?php echo base_url();?>HR/EditHRPayrollCreator/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#viewedit').modal('show');
                            $('#formeditgaji').html(response);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }
            </script>

         <script type="text/javascript">
                
                $(function(){
                    hapus();
                    $('.master').DataTable({
                        responsive: true,
                        
                        fnDrawCallback:function(oSettings){
                           hapus();
                        }
                    });
                });

                function hapus(){
                      $(".hapus").click(function(){
                          const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                              confirmButton: 'btn btn-blue1',
                              cancelButton: 'btn btn-red1'
                            },
                            buttonsStyling: false,
                          });
                                var type=$(this).data('type');
                                var nik=$(this).data('nik');
                                console.log(nik+type);
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
                                        if(type=='payroll'){
                                            url='<?php echo base_url()?>HR/hapusPayrollCreator/'+nik;
                                            no='3';
                                        }
                                         $.ajax({
                                              type: 'POST',
                                              url:url,
                                             success: function(data) {
                                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                                  setTimeout(function(){
                                                          window.location.href="<?php echo base_url()?>HR/HRPayrollCreator/"+no;
                                                       
                                                  },2000);
                                              }
                                          });
                                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                      }
                                  });
                          
                        });
  
              };
            </script>

            <script type="text/javascript">
                function generate(id){
                   
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>SamplePdf/SistemGaji/"+id, 
                                //data: {id_client : idclient}, 
                                dataType: "json",
                                beforeSend: function(e) {
                                    if(e && e.overrideMimeType) {
                                      e.overrideMimeType("application/json;charset=UTF-8");
                                    }
                                },
                                success: function(response){ 
                                //
                                if(id.toString().length==0){
                                    new_alert("Loading ...","","warning");
                                    $('.swal2-confirm').hide();
                                }
                                //}
                                  if(response.id2>0){
                                    generate(response.id2);

                                  }else{
                                    window.location='<?php echo base_url() ?>HR/HRPayrollCreator/3';
                                  }
                                },
                                error: function (xhr, ajaxOptions, thrownError) { 
                                    alert(thrownError); 
                                }
                            }); 
                        }
                $(document).ready(function(){
                    $("#selclient").change(function(){
                        pilihDept(this.value);
                        pilihLokasi(this.value);
                    });
                    $("#rowlokasi").hide();
                    $("#rowdept").hide();

                    function pilihClient(idlokasi){
                        if(idlokasi!=""){
                            $("#rowdept").show();
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
                                    $("#rowclient").show();
                                    $("#selclient").html(response.data_client).show();
                                    $("#selclient").select2();
                                },
                                error: function (xhr, ajaxOptions, thrownError) { 
                                    alert(thrownError); 
                                }
                            }); 
                        } else {
                            $("#rowclient").hide();
                            $("#rowdept").hide();
                        }
                    }
                    function pilihDept(idclient){
                        if(idclient!=""){
                            $("#rowlokasi").show();
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
                                    $("#rowdept").show();
                                    $("#seldept").html(response.data_dept).show();
                                    $("#seldept").select2();
                                },
                                error: function (xhr, ajaxOptions, thrownError) { 
                                    alert(thrownError); 
                                }
                            }); 
                        } else {
                            $("#rowdept").hide();
                        }
                    }
                    function pilihLokasi(idclient){
                        if(idclient!=""){
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>HR/ambilLokasi", 
                                data: {id_client : idclient}, 
                                dataType: "json",
                                beforeSend: function(e) {
                                    if(e && e.overrideMimeType) {
                                      e.overrideMimeType("application/json;charset=UTF-8");
                                    }
                                },
                                success: function(response){ 
                                    $("#rowlokasi").show();
                                    $("#lokasi").html(response.data_lokasi).show();
                                    $("#lokasi").select2();
                                },
                                error: function (xhr, ajaxOptions, thrownError) { 
                                    alert(thrownError); 
                                }
                            }); 
                        } else {
                            $("#rowlokasi").hide();
                        }
                    }
                });
            </script>

            <script type="text/javascript">

                $(document).ready(function(){
                    $("#selclient2").change(function(){
                        pilihDept(this.value);
                        // pilihLokasi(this.value);
                    });
                    // $("#rowlokasi2").hide();
                    $("#rowdept2").hide();
                    function pilihClient(idlokasi){
                        if(idlokasi!=""){
                            $("#rowdept2").show();
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
                    function pilihDept(idclient){
                        if(idclient!=""){
                            // $("#rowlokasi2").show();
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
                                    $("#rowdept2").show();
                                    $("#seldept2").html(response.data_dept).show();
                                    $("#seldept2").select2();
                                },
                                error: function (xhr, ajaxOptions, thrownError) { 
                                    alert(thrownError); 
                                }
                            }); 
                        } else {
                            $("#rowdept2").hide();
                        }
                    }
                    // function pilihLokasi(idclient){
                    //     if(idclient!=""){
                    //         $.ajax({
                    //             type: "POST",
                    //             url: "<?php //echo base_url(); ?>HR/ambilLokasi", 
                    //             data: {id_client : idclient}, 
                    //             dataType: "json",
                    //             beforeSend: function(e) {
                    //                 if(e && e.overrideMimeType) {
                    //                   e.overrideMimeType("application/json;charset=UTF-8");
                    //                 }
                    //             },
                    //             success: function(response){ 
                    //                 $("#rowlokasi2").show();
                    //                 $("#lokasi2").html(response.data_lokasi).show();
                    //                 $("#lokasi2").select2();
                    //             },
                    //             error: function (xhr, ajaxOptions, thrownError) { 
                    //                 alert(thrownError); 
                    //             }
                    //         }); 
                    //     } else {
                    //         $("#rowlokasi2").hide();
                    //     }
                    // }
                });
            </script>

            <script type="text/javascript">
            	$(document).ready(function () {
			    //Initialize tooltips
			    $('.nav-tabs > li a[title]').tooltip();
			    
			    //Wizard
			    $('.nav-item').on('show.bs.tab', function (e) {

			        var $target = $(e.target);
			        $('.nav-item').removeClass('active');
			    	$(this).addClass('active');
			    	console.log($target.parent().html());
			        if ($target.parent().hasClass('disabled')) {
			            return false;
			        }
			    });

			    $(".next-step").click(function (e) {

			        var $active = $('.wizard .nav-tabs li.active');
			        $active.next().removeClass('disabled');
			        nextTab($active);

			    });
			    $(".prev-step").click(function (e) {

			        var $active = $('.wizard .nav-tabs li.active');
			        prevTab($active);

			    });
			});

			function nextTab(elem) {
			    $(elem).next().find('a[data-toggle="tab"]').click();
			}
			function prevTab(elem) {
			    $(elem).prev().find('a[data-toggle="tab"]').click();
			}
            </script>