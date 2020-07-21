
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="fz-36 barlow-bold"> Directory / Kontrak</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="body">
                        <div class="container">
                            <form action="<?php echo base_url() ?>HR/HRKontrak" method="post">
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

                                    <!-- <div class="col-md-2 m-t-20">
                                        <label>Status</label>        
                                    </div>
                                    <div class="col-md-4" align="left" >
                                        <select name="status_karyawan" class="form-control fcheight">
                                            <option value="">Lihat semua</option>
                                            <option value="1" <?php //echo $this->input->post('status_karyawan')=='1'?'selected':''; ?>>Permanen</option>
                                            <option value="2" <?php //echo $this->input->post('status_karyawan')=='2'?'selected':''; ?>>Freelance</option>
                                            <option value="3" <?php //echo $this->input->post('status_karyawan')=='3'?'selected':''; ?>>PKWT</option>
                                            <option value="4" <?php //echo $this->input->post('status_karyawan')=='4'?'selected':''; ?>>PKWTT</option>
                                            <option value="5"  <?php //echo $this->input->post('status_karyawan')=='5'?'selected':''; ?>>Resign</option>
                                        </select>
                                    </div> -->
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
                            <div class="row">
                                <div class="col-md-6 col-6">
                                   <h5 class="fz-aktivitasabsensi">Kontrak</h5>
                                </div> 
                                <div class="col-md-6 col-6" align="right">
                                </div>
                            </div>    
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Departemen</th>
                                            <!-- <th>Divisi</th>
                                            <th>jabatan</th> -->
                                            <th>Tanggal Berakhir</th>
                                            <th>Status pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($dataKontrak->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <td><?php echo $dt->des_departemen; ?></td>
                                            <!-- <td><?php //echo $dt->nama_divisi; ?></td>
                                            <td><?php //echo $dt->des_jabatan; ?></td> -->
                                            <td><?php echo $dt->tanggal_keluar=="0000-00-00"?'-':strftime(" %d %B %Y",strtotime($dt->tanggal_keluar)); ?></td>
                                            <td><?php if( $dt->status_karyawan=='1'){
                                                echo '<label class="Rectangle-permanent">'.$dt->status_pegawai.'</label>';
                                            } else if( $dt->status_karyawan=='2'){
                                                echo '<label class=" Rectangle-contract">'.$dt->status_pegawai.'</label>';
                                            } else if( $dt->status_karyawan=='3'){
                                                echo '<label class=" Rectangle-probation">'.$dt->status_pegawai.'</label>';
                                            } else if( $dt->status_karyawan=='4'){
                                                echo '<label class=" Rectangle-probation">'.$dt->status_pegawai.'</label>';
                                            } else if( $dt->status_karyawan=='5'){
                                                echo '<label class=" Rectangle-resign">'.$dt->status_pegawai.'</label>';
                                            } ?></td>

                                            <td>
                                                <!-- <a href="<?php //echo base_url()?>HR/ViewHRKontrak/<?php //echo $dt->nik ?>" class="btn btn-aksi"><img src="<?php  //echo base_url()?>assets/img/View.svg" class="padd-right-5">Lihat</a> -->

                                                <a href="javascript:;" onclick="viewinfokontrak('<?php echo $dt->nik ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">lihat</a>

                                                <?php if ($dataAkses == '1'){ ?>
                                                    <a href="javascript:;" onclick="formedit('<?php echo $dt->nik ?>')" class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</a>
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

            <!-- modal view -->
            <div class="modal fade bd-example-modal-lg" id="view" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg"  role="document">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="row m-t-20">
                                    <div class="col-md-10">
                                        <h5 class="hitampekat">Kontrak</h5>
                                        
                                    </div>
                                    <div class="col-md-2" >
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                
                                <div class="row m-t-20">
                                    <div class="col-md-12">
                                        <div id="viewkontrak">
                                        </div>
                                    </div>
                                </div>
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
                            <form action="<?php echo base_url()?>HR/ProsesEditKontrak" method="post">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Kontrak</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formedit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
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
                $(document).ready(function(){
                    $('#edit').modal({backdrop: 'static', keyboard: false});
                  });

                function formedit(a){
                            $.ajax({
                              url: "<?php echo base_url();?>HR/EditHRKontrak/"+a,
                              // data: {nik:a},
                              type: "post",
                              // dataType:'json',
                              success: function (response) {
                                 // alert('masuk');
                                  $('#edit').modal('show');
                                  $('#formedit').html(response);
                                  var drEvent = $('#dropify-event').dropify();
                                  $('.tglval').keydown(function (event){
                                    event.preventDefault();
                                  });
                                  setTimeout(function(){
                                    tgl();
                                  },1000);
                                  $('.summernote').summernote({
                                    height: 300,
                                    focus: true,
                                    onpaste: function() {
                                        alert('You have pasted something to the editor');
                                    }
                                });
                              },
                              error: function(jqXHR, textStatus, errorThrown) {
                                 console.log(textStatus, errorThrown);
                              }
                          });
                  }

                function viewinfokontrak(a){
                        $.ajax({
                            url: "<?php echo base_url();?>HR/ViewHRKontrak/"+a,
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');
                                $('#view').modal('show');
                                $('#viewkontrak').html(response);
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
            <script type="text/javascript">
              function tgl(){
                $('#datepicker3').datepicker({
                          showButtonPanel: true,
                          changeMonth: true,
                          changeYear: true,
                          dateFormat : 'dd/mm/yy',
                          beforeShow:function(a,b){
                            setTimeout(function(){
                              $('.ui-datepicker').css('z-index', 99999999999999);
                          }, 0);
                          }

                      }).on( "change", function() {
                          var datanya = $(this).data("id");
                      var date = $(this).datepicker("getDate");
                      //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                      $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                  //from.datepicker( "option", "maxDate", getDate( this ) );
                  });
                }
            </script>
         