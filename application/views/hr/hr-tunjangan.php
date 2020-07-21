
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Tunjangan</h6> -->
                         <p class="fz-36 barlow-bold"> Directory / Tunjangan</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                    <div class="col-lg-12 col-md-12">
                        <div class="">
                            <div class="body">
                                <ul class="nav nav-tabs-new2">
                                    <?php
                                         $numb=0; 
                                        foreach ($dataJenisTunjangan->result() as $dt) { ?>
                                        <li class="nav-item"><a class="nav-link <?php echo  $this->uri->segment(3)==$dt->id_jenis_tunjangan || ($this->uri->segment(3)=="" && $numb==0) ?'show active':'' ?> " data-toggle="tab" href="#tunj<?php echo $dt->id_jenis_tunjangan; ?>"><?php echo $dt->jenis_tunjangan; ?></a></li>
                                    <?php $numb++; } ?>
                                </ul>
                                <div class="tab-content">
                                    <?php 
                                    $numb=0;
                                    foreach ($dataJenisTunjangan->result() as $dtjt) {
                                        $wh=array();
                                        if($this->input->post('id_departemen')!=""){
                                            $wh['b.id_departemen']=$this->input->post('id_departemen');
                                        }
                                        $wh1=array();
                                        if($this->input->post('nama_lengkap')!=""){
                                            $wh1['b.nama_lengkap']=$this->input->post('nama_lengkap');
                                        }
                                        $wh2=array();
                                        if($this->input->post('nik')!=""){
                                            $wh2['b.nik']=$this->input->post('nik');
                                        }
                                        $tamp=$this->Nata_hris_hr_model->ambildtjt($dtjt->id_jenis_tunjangan,$wh,$wh1,$wh2); 

                                        ?>
                                        <div class="tab-pane <?php echo  $this->uri->segment(3)==$dtjt->id_jenis_tunjangan || ($this->uri->segment(3)=="" && $numb==0)?'show active':'' ?> " id="tunj<?php echo $dtjt->id_jenis_tunjangan; ?>">
                                            <div class="col-lg-12 col-md-12 m-t-10">
                                                <div class="body">
                                                    <div class="container">
                                                        <form action="<?php echo base_url()?>HR/HRTunjangan/<?php echo $dtjt->id_jenis_tunjangan; ?>" method="post">
                                                            <input type="hidden" name="numb" value="<?php echo $dtjt->id_jenis_tunjangan; ?>">

                                                            <div class="row m-b-20">
                                                                <div class="col-md-2 m-t-10">   
                                                                    <h5 class="fz-aktivitasabsensi">Search Filter</h5>
                                                                </div>
                                                                <div class="col-md-10" align="right">
                                                                    <button type="submit" class="btn Rectangle-cari col-md-2">
                                                                    
                                                                        <i class="fa fa-search padd-right-5 putih" ></i>
                                                                       Cari
                                                                      
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-2 m-t-20">
                                                                    <label>NIK</label>        
                                                                </div>
                                                                <div class="col-md-4" align="left">
                                                                   <input type="text" name="nik" class="form-control fcheight" value="<?php echo $this->input->post('nik') ?>">
                                                                </div>

                                                                <div class="col-md-2 m-t-20">
                                                                    <label>Nama Pegawai</label>        
                                                                </div>
                                                                <div class="col-md-4" align="left">
                                                                   <input type="text" name="nama_lengkap" class="form-control fcheight" value="<?php echo $this->input->post('nama_lengkap') ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row  m-t-20">
                                                                <div class="col-md-2 m-t-20">
                                                                    <label>Unit Bisnis</label>        
                                                                </div>
                                                                 <div class="col-md-4" align="left">
                                                                    <select name="id_client" id="selclient" class="form-control fcheight  selclient" >
                                                                        <option selected value=""> Pilihs Semua Unit Bisnis </option>
                                                                        <?php
                                                                        foreach($dataClient->result() as $dtc){
                                                                            ?>
                                                                            <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php echo $this->input->post('id_client')==$dtc->id_master_perusahaan?'selected':'';  ?>> <?php echo $dtc->nama_perusahaan; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row rowdept m-t-20" id="rowdept">
                                                               <div class="col-md-2 m-t-20" >
                                                                    <label>Departemen </label>        
                                                                </div>
                                                                 <div class="col-md-4" >
                                                                    <select name="id_departemen" id="seldept" class="form-control fcheight seldept" >
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
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 m-t-10">
                                                <div class="card ">
                                                    <div class="body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-6">
                                                               <h5 class="fz-aktivitasabsensi">Tunjangan</h5>
                                                            </div> 
                                                            <div class="col-md-6 col-6" align="right">
                                                                
                                                            </div>
                                                           
                                                        </div>
                                                        <div class="table-responsive m-t-10">
                                                            <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                                              
                                                                 <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>NIK</th>
                                                                        <th>Nama Pegawai</th>
                                                                        <th>Departemen</th>
                                                                        <th>Besaran Tunjangan</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <?php foreach ($tamp->result() as $dtt) { ?>
                                                                    <tr>
                                                                        <td><?php echo $dtt->nik; ?></td>
                                                                        <td><?php echo $dtt->nama_lengkap; ?></td>
                                                                        <td><?php echo $dtt->deskripsi; ?></td>
                                                                        <td>Rp. <?php echo number_format($dtt->nilai,0,'.','.'); ?></td>
                                                                        <td>
                                                                            <a href="javascript:;" onclick="viewtunjangan('<?php echo $dtt->nik ?>','<?php echo $dtt->id_jenis_tunjangan ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">lihat</a>
                                                                            <?php if ($dataAkses == '1'){ ?>
                                                                                <a href="javascript:;" onclick="edittunjangan('<?php echo $dtt->nik ?>','<?php echo $dtt->id_jenis_tunjangan ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/Update.svg" class="padd-right-5">Edit</a>
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
                                    <?php $numb++; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- view modal -->
            <div class="modal fade bd-example-modal-lg" id="view" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg"  role="document">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <!-- <div class="col-lg-2">
                                        
                                    </div> -->
                                    <div class="col-lg-6 col-md-6">
                                        <label class="fz-18">Detail Tunjangan</label>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6" align="right">
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="viewtunjangan">
                                    
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit modal -->
            <div class="modal fade bd-example-modal-lg" id="edit">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form action="<?php echo base_url()?>HR/ProsesEditTunjangan" method="post">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Tunjangan</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="edittunjangan">
                                            
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                    <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#edit').modal({backdrop: 'static', keyboard: false});
                });
                function edittunjangan(a,b){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/HREditTunjangan/"+a+"/"+b,
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');
                                $('#edit').modal('show');
                                $('#edittunjangan').html(response);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus, errorThrown);
                            }
                        });
                }

                function viewtunjangan(a,b){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/ViewTunjangan/"+a+"/"+b,
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');
                                $('#view').modal('show');
                                $('#viewtunjangan').html(response);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus, errorThrown);
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
        