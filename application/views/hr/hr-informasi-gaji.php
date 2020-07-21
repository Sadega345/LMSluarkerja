
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="fz-36 barlow-bold"> Directory / Informasi Gaji</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="body">
                        <div class="container">
                            <form action="<?php echo base_url()?>HR/HRInformasiGaji" method="post">
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
                                    <div class="col-md-4" align="left" >
                                        <select name="id_master_perusahaan" id="selclient" class="form-control fcheight selclient" >
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

                                   <div class="col-md-2 m-t-10">
                                        <label>Bank</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <select name="id_bank" class="form-control fcheight select2me" data-placeholder="Pilih Bank" tabindex="2" >
                                                <option value="">--Semua Bank--</option>
                                        <?php
                                            foreach($databank->result() as $dt){ ?>
                                                <option value="<?php echo $dt->id_bank;?>" <?php echo $this->input->post('id_bank')==$dt->id_bank?'selected':'';  ?>><?php echo $dt->deskripsi;?></option>
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
                                     <div class="col-md-4" align="left" >
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
            </div>
            <div class="row clearfix m-t-20">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="mb-4">
                                <h5 class="fz-aktivitasabsensi">Informasi Gaji</h5>
                            </div>

                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Nama Unit Bisnis</th>
                                            <th>Departemen</th>
                                            <th>Bank</th>
                                            <th>No Rekening</th>
                                            <th>Nominal Gaji</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($dataInfoGaji->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <td><?php echo $dt->nama_perusahaan; ?></td>
                                            <td><?php echo $dt->des_departemen; ?></td>
                                            <td><?php echo $dt->des_bank; ?></td>
                                            <td><?php echo $dt->nomor_rek; ?></td>
                                            <td>Rp. <?php echo number_format($dt->gaji,0,'.','.'); ?></td>
                                            <td>
                                                <a href="javascript:;" onclick="viewinfogaji('<?php echo $dt->nik ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">lihat</a>

                                                <!-- <a href="javascript:;" onclick="viewinfogaji('<?php echo $dt->nik ?>')" class="btn btn-aksi"><img src="https://Natadev.id/Penata/assets/img/View.svg" class="padd-right-5">lihat</a> -->

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

            <div class="modal fade bd-example-modal-lg" id="view" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg"  role="document">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <!-- <div class="col-lg-2">
                                        
                                    </div> -->
                                    <div class="col-lg-6 col-md-6">
                                        <label class="fz-18">Informasi Gaji</label>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6" align="right">
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="viewgaji">
                                    
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function viewinfogaji(a){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/ViewInformasiGaji/"+a,
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
         