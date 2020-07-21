
             <?php  
                $a=explode("-", $datapelatihan->tanggal_mulai); 
                $b=explode("-", $datapelatihan->tanggal_selesai); 
                $tgl_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                $tgl_selesai=$b[2].'/'.$b[1].'/'.$b[0]; 
            ?>
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Pelatihan</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                 <h6 class="tittle-box">Edit Pelatihan</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesEditPelatihan" method="post">
                                <input type="hidden" name="id" value="<?php echo $datapelatihan->id_training_jadwal ?>">
                            <div class="row  m-t-10 mb-3">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Nama Program Pelatihan </label>
                                    <label class="d-sm-none">Nama Program Pelatihan</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="text" name="nama_program" class="form-control" value="<?php echo $datapelatihan->nama_program ?>">
                                </div>
                            </div>
                            <div class="row  m-t-10 ">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Perusahaan </label>
                                    <label class="d-sm-none">Perusahaan</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <select name="id_client" id="selclient" class="form-control select2" required>
                                        <option selected > Pilih Perusahaan </option>
                                        <?php
                                        foreach($dataClient->result() as $dtc){
                                            ?>    
                                                
                                                         <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php echo $datapelatihan->id_master_perusahaan==$dtc->id_master_perusahaan?'selected':''; ?>> <?php echo $dtc->nama_perusahaan; ?></option>
                                                
                                           
                                           
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row  m-t-10 ">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Departemen </label>
                                    <label class="d-sm-none">Departemen</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <select name="id_dept" id="seldept" class="form-control select2" required  onchange="pilihkaryawan(this.value)">
                                        <option selected disabled> Pilih Departemen </option>
                                        <?php
                                        foreach($dataDeptC->result() as $dtd){?>
                                            <?php  
                                                if($dtd->id_master_perusahaan==$datapelatihan->id_master_perusahaan){ ?>
                                                     <option value="<?php echo $dtd->id_departemen; ?>" <?php echo  $dtd->id_departemen== $datapelatihan->id_departemen?'selected':'' ?>> <?php echo $dtd->nama_departemen; ?></option>
                                                <?php }  ?>
                                           
                                            <?php
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row  m-t-10 mb-3">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Trainer </label>
                                    <label class="d-sm-none">Trainer</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="text" name="nama_pelatih" class="form-control" value="<?php echo $datapelatihan->nama_pelatih ?>">
                                </div>
                            </div>
                            <div class="row  m-t-10 mb-3">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Lokasi Pelatihan </label>
                                    <label class="d-sm-none">Lokasi Pelatihan</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="text" name="lokasi" class="form-control" value="<?php echo $datapelatihan->lokasi ?>">
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-5 " >
                                    <label class="float-right hidden-sm">Waktu </label>
                                    <label class="d-sm-none">Waktu </label>
                                </div>
                                <div class="col-md-9 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control" id="start" name="" data-id="startdate" data-date-format="yyyy-mm-dd" required readonly value="<?php echo $tgl_mulai ?>">
                                        </div>
                                        
                                        <span class="input-group-addon text-center mb-3" style="width: 40px;">s/d</span>
                                        
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control" id="end" name="" data-date-format="yyyy-mm-dd" required readonly data-id="enddate" value="<?php echo $tgl_selesai?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="tanggal_mulai" id="startdate" value="<?php echo $datapelatihan->tanggal_mulai ?>">
                                    <input type="hidden" name="tanggal_selesai" id="enddate" value="<?php echo $datapelatihan->tanggal_selesai ?>">
                                </div>
                            </div>
                            <div class="row  m-t-10 mb-3">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Keterangan </label>
                                    <label class="d-sm-none">Keterangan </label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <textarea class="form-control" name="deskripsi"><?php echo $datapelatihan->deskripsi ?></textarea>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Peserta</th>
                                            <!-- <th>Departemen</th>
                                            <th>Divisi</th>
                                            <th>jabatan</th>
                                            <th>Status pegawai</th> -->
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody id="karyawan">
                                    <?php foreach ($dataPegawai->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nik ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <!-- <td><?php //echo $dt->des_departemen; ?></td>
                                            <td><?php //echo $dt->nama_divisi; ?></td>
                                            <td><?php //echo $dt->des_jabatan; ?></td>
                                            <td><?php //if($dt->status_karyawan=='1'){
                                            //     echo'<label class="btn btn-green2">Permanen</label>';
                                            // }else if($dt->status_karyawan=='2'){
                                            //     echo'<label class="btn btn-red2">Freelance</label>';
                                            // }else if($dt->status_karyawan=='3'){
                                            //     echo'<label class="btn btn-orange2">Kontrak PKWT</label>';
                                            // }else if($dt->status_karyawan=='4'){
                                            //     echo'<label class="btn btn-orange2">Kontrak PKWTT</label>';
                                            // }else if($dt->status_karyawan=='5'){
                                            //     echo'<label class="btn btn-red2">Resign</label>';
                                            // }; ?></td> -->

                                            <td>
                                                <label class="fancy-checkbox cbkar" data-jk="L">
                                                    <input type="checkbox" name="pilih_karyawan[]" value="<?php echo $dt->nik; ?>" class="cbkaryawan" data-jk="L" <?php echo $dt->jum>'0'?'checked':''?>>
                                                    <span></span>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-3 " >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <a href="<?php echo base_url()?>HR/HRPelatihan" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <script type="text/javascript">
            function pilihkaryawan(idjenisprojek){
                if(idjenisprojek!=""){
                    $.ajax({
                          type: "POST",
                      url: "<?php echo base_url(); ?>HR/ambilKaryawanpelatihan", 
                      data: {id_jenis_projek : idjenisprojek}, 
                      dataType: "json",
                      beforeSend: function(e) {
                        if(e && e.overrideMimeType) {
                          e.overrideMimeType("application/json;charset=UTF-8");
                        }
                      },
                      success: function(response){ 
                        
                        $('.js-basic-example').DataTable().destroy();
                        $("#karyawan").html(response.data_karyawan);
                        $('.js-basic-example').DataTable({ responsive: true });
                        
                      },
                      error: function (xhr, ajaxOptions, thrownError) { 
                        alert(thrownError); 
                      }
                    }); 
                } else {
                   
                }
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#lokasi").change(function(){
                    pilihClient(this.value);
                });
                $("#selclient").change(function(){
                    pilihDept(this.value);
                });
            });
            function pilihClient(idlokasi){
                if(idlokasi!=""){
                    $("#rowdept").hide();
                    $("#rowsumber").hide();
                    $("#rowjabatan").hide();
                    $("#rowloker").hide();
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
                    $("#rowsumber").hide();
                    $("#rowjabatan").hide();
                    $("#rowloker").hide();
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
        </script>


         
                        
         