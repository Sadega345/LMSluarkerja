            <?php  
              $tanggal_mulai="";
              $tanggal_selesai="";
                if($this->input->post('tanggal_mulai')=="" || $this->input->post('tanggal_selesai')=="" ){
                  echo "";
                }else{
                  $a=explode("-", $this->input->post('tanggal_mulai')); 
                  $tanggal_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                    $b=explode("-", $this->input->post('tanggal_selesai')); 
                  $tanggal_selesai=$b[2].'/'.$b[1].'/'.$b[0];  
                }
            ?> 
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h4 class="fz-36 barlow-bold">Absensi Pegawai / Aktifitas Absensi</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    <div class="msg" style="display:none;">
                    
                    </div>
                    <!-- <div class="card "> -->
                        <div class="body">
                            
                             <div class="container">
                                <form action="<?php echo base_url() ?>HR/HRAktifitasAbsensi" method="post">

                                <div class="row m-b-20">
                                    <div class="col-md-2 m-t-10">   
                                        <h5 class="fz-aktivitasabsensi">Search Filter</h5>
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
                                    <div class="col-md-2 m-t-20">
                                        <label>Nama Karyawan</label>        
                                    </div>
                                    <div class="col-md-4" align="left">
                                       <input type="text" name="nama_lengkap" class="form-control fcheight" value="<?php echo $this->input->post('nama_lengkap')?>">
                                    </div>

                                    <!-- Tanggal  -->
                                    <div class="col-md-2 m-t-20">
                                        <label>Tanggal Mulai</label>        
                                    </div>
                                    <div class="col-md-4" align="left" >
                                       <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control fcheight" id="start" name="" data-date-format="yyyy-mm-dd" required readonly data-id="startdate" value="<?php echo $tanggal_mulai?>">
                                            </div>

                                            <input type="hidden" name="tanggal_mulai" id="startdate"  value="<?php echo $this->input->post('tanggal_mulai') ?>">
                                            <input type="hidden" name="tanggal_selesai" id="enddate" value="<?php echo $this->input->post('tanggal_mulai') ?>">

                                        </div>
                                    </div>
                                </div>
                             
                                <div class="row rowclient m-t-20" id="rowclient">
                                    <div class="col-md-2 m-t-20">
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

                                    <!-- Tanggal Cuti -->
                                    <div class="col-md-2 m-t-20">
                                        <label>Sampai Dengan</label>        
                                    </div>
                                    <div class="col-md-4" align="left" >
                                       <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">

                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control fcheight" id="end" name="" data-date-format="yyyy-mm-dd" required readonly data-id="enddate" value="<?php echo $tanggal_selesai ?>">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="row rowdept m-t-20" id="rowdept">
                                    <div class="col-md-2 m-t-20" >
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
                            </div>
                            </form>
                        </div>
                    <!-- </div> -->
                </div>
                
            </div>
            <div class="row clearfix m-t-20">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row ">
                                <div class="col-md-3 col-12">
                                   <h5 class="fz-aktivitasabsensi">Aktifitas Absensi</h5>
                                </div> 
                                <div class="col-md-9 col-12 ">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 col-12">
                                </div> 
                                <div class="col-md-9 col-12 " align="right">
                                    <?php if ($dataAkses == '1'){ ?>
                                        <!-- <a class="btn btn-blue col-md-3 mb-1" href="<?php //echo base_url() ?>assets/sampleAbsensi/sampleimportabsensi.csv">
                                        Download Template
                                        </a>
                                        <button type="button" class="btn btn-blue col-md-3 mb-1" data-toggle="modal" data-target="#myModal">Import csv</button> -->
                                        <button type="button" class="btn Rectangle-generate" data-toggle="modal" data-target="#export"><img src="<?php echo base_url() ?>assets/img/pegawai.svg" class="padd-right-5">Export Absensi</button>

                                        

                                        <a href="javascript:;" class="btn Rectangle-diterima col-md-3 mb-1" onclick="formtambahabsensi()"><img src="<?php echo base_url() ?>assets/img/Plus.svg" class="padd-right-5">Tambah</a>
                                    <?php } ?>
                                </div>

                                <!-- <br>
                                <br>
                                <form action="<?php //echo base_url()?>HR/inputCSV" method="post" enctype="multipart/form-data"> 
                                    <input type="file" name="import_absensi" accept="text/csv">
                                    <br>
                                    <br>
                                    <input type="submit" name="import">Import Data
                                </form> -->
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Karyawan</th>
                                            <th>Unit Bisnis</th>
                                            <th>Departemen</th>
                                            <th>Tanggal</th>
                                            <th>Sign In</th>
                                            <th>Sign Out</th>
                                            <th>Durasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <?php foreach ($dataaktifitasabsensi->result() as $dt) { ?>
                                            <tr>
                                                <td><?php echo  $dt->nama_lengkap; ?></td>
                                                <td><?php echo  $dt->nama_perusahaan; ?></td>
                                                 <td><?php echo  $dt->deDepartemen; ?></td>
                                                <td><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal_mulai)); ?></td>
                                                <td><?php  if($dt->tanggal_mulai!=''){
                                                            $masuk=explode(' ', $dt->tanggal_mulai);
                                                            echo $masuk[1];
                                                        }else{
                                                            echo '-';
                                                        } ?>
                                                </td>
                                                <td><?php  if($dt->tanggal_selesai!=''){
                                                            $keluar=explode(' ', $dt->tanggal_selesai);
                                                            echo $keluar[1];
                                                        }else{
                                                            echo '-';
                                                        } ?>
                                                </td>
                                                <td><?php  if($dt->tanggal_selesai!=''){
                                                            $date1 = strtotime($dt->tanggal_mulai);
                                                            $date2 = strtotime($dt->tanggal_selesai);
                                                            $interval = $date2 - $date1;
                                                            $seconds = $interval % 60;
                                                            $minutes = floor(($interval % 3600) / 60);
                                                            $hours = floor($interval / 3600);
                                                            echo $hours." Jam";
                                                        }else{
                                                           echo '-';
                                                        } ?>
                                                </td>
                                                <td>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <!-- <a href="<?php //echo base_url()?>HR/EditAktifitasAbsensi/<?php echo $dt->id_absensi ?>" class="btn btn-aksi">
                                                            <img src="<?php //echo base_url() ?>assets/img/Update.svg" class="padd-right-5">Edit
                                                        </a> -->

                                                        <a href="javascript:;" class="btn btn-aksi" onclick="formeditabsensi(<?php echo $dt->id_absensi ?>)"><img src="<?php echo base_url() ?>assets/img/Update.svg" class="padd-right-5">Edit</a>

                                                        <a href="javascript:;" onclick="hapus(<?php echo $dt->id_absensi ?>)" class="btn btn-aksi" title="Hapus"><i class="fa fa-trash merah padd-right-5"></i>Hapus
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

            
            <!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog modal-sm">
			      <div class="modal-content">
			        <div class="m-t-10">
			        	<h4 class="text-center">Import Absensi</h4>
			        </div>
			        <form action="<?php echo base_url()?>HR/inputCSV" method="post" enctype="multipart/form-data">
			        <div class="modal-body">
                        <input type="file" name="import_absensi" accept="text/csv">
			        </div>
			        <div class="modal-footer">
			           <input type="submit" name="import" class="btn btn-blue" placeholder="Import Data"> 
                       <span><button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button></span>
			        </div>
			    	</form>
			      </div>
			    </div>
			  </div>
			</div>

            <!-- Modal Tambah Absensi -->
            <div class="modal fade bd-example-modal-lg" id="view" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" action="<?php echo base_url() ?>HR/ProsesTambahAktifitasAbsensi" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Pengajuan Absensi</label>
                                </div>
                                
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formtambahabsensi">
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
             <!-- Modal export Absensi -->
            <div class="modal fade bd-example-modal-lg" id="export" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" action="<?php echo base_url() ?>HR/exportabsensi" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Pilih Bulan</label>
                                </div>
                                
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <select class="form-control fcheight" name="bulan">
                                                <option value="">Pilih Semua Bulan</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktover</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                           </select>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                  <button type="submit" class="btn Rectangle-cari">Export</button>
                                  <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                </div>
                            </div>
                            
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Modal Edit Akttifasi Absensi -->
            <div class="modal fade bd-example-modal-lg" id="viewedit" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" action="<?php echo base_url()?>HR/ProsesEditAktifitasAbsen" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Pengajuan Absensi</label>
                                </div>
                                
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formeditabsensi">
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
                    $('#view').modal({backdrop: 'static', keyboard: false});
                    $('#viewedit').modal({backdrop: 'static', keyboard: false});
                   // $('#export').modal({backdrop: 'static', keyboard: false});
                });

                function formtambahabsensi(){
                      $.ajax({
                        url: "<?php echo base_url();?>HR/TambahHRAktifitasAbsensi",
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#view').modal('show');
                            $('#formtambahabsensi').html(response);
                            setTimeout(function(){
                                var dateFormat = "mm/dd/yy",
                              from = $( "#startform" )
                                .datepicker({
                                  defaultDate: new Date(),
                                    <?php
                                    if(isset($menuId) && isset($menuId[2]) && $menuId[0]=="118" && $menuId[1]=="40" && $menuId[2]=="1"){
                                    ?>
                                    minDate:new Date(),
                                    <?php
                                    }
                                    ?>
                                  changeMonth: true,
                                  changeYear: true,
                                  numberOfMonths: 1,
                                  dateFormat : 'dd/mm/yy',
                                   beforeShow:function(a,b){
                                    setTimeout(function(){
                                      $('.ui-datepicker').css('z-index', 99999999999999);
                                    }, 0);
                                  }
                                })
                                .on( "change", function() {
                                  to.datepicker( "option", "minDate", getDate( this ) );
                                  var datanya = $(this).data("id");
                                  var date = $(this).datepicker("getDate");
                                    //console.log("start->"+$.datepicker.formatDate("yy-mm-dd", date));
                                    $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                                }),
                              to = $( "#endform" ).datepicker({
                                defaultDate: "+1w",
                                changeYear: true,
                                changeMonth: true,
                                numberOfMonths: 1,
                                dateFormat : 'dd/mm/yy',
                                beforeShow:function(a,b){
                                  setTimeout(function(){
                                    $('.ui-datepicker').css('z-index', 99999999999999);
                                }, 0);
                                    var minDate = $("#startform").datepicker("getDate");
                                    //maxDate.setDate(maxDate.getDate())
                                    //console.log(minDate);
                                    to.datepicker('option','minDate',minDate);
                                    <?php
                                    if(isset($menuId) && isset($menuId[2]) && $menuId[0]=="118" && $menuId[1]=="40" && $menuId[2]=="1"){
                                         $TotCuti=0; 
                                        foreach ($dataLeaves->result() as $leave ) { 
                                            if ($leave->status == 1) {
                                                $TotCuti=$TotCuti+$leave->lama_cuti;
                                            }
                                        } 
                                        $sisa = $dataLeave->saldo_cuti-$TotCuti;
                                    ?>
                                    var maxDate = $("#startform").datepicker("getDate");
                                    maxDate.setDate(maxDate.getDate()+<?php echo $sisa; ?>);
                                    to.datepicker('option','maxDate',maxDate);
                                    <?php
                                    }
                                    ?>
                                }
                              })
                              .on( "change", function() {
                                var datanya = $(this).data("id");
                                var date = $(this).datepicker("getDate");
                                    //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                                    $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                                //from.datepicker( "option", "maxDate", getDate( this ) );
                              });
                            }, 1000);
                            
                        },

                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }

                function formeditabsensi(a){
                      $.ajax({
                        url: "<?php echo base_url();?>HR/EditAktifitasAbsensi/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#viewedit').modal('show');
                            $('#formeditabsensi').html(response);
                            setTimeout(function(){

                                var dateFormat = "mm/dd/yy",
                              from = $( "#startedit" )
                                .datepicker({
                                  defaultDate: new Date(),
                                    <?php
                                    if(isset($menuId) && isset($menuId[2]) && $menuId[0]=="118" && $menuId[1]=="40" && $menuId[2]=="1"){
                                    ?>
                                    minDate:new Date(),
                                    <?php
                                    }
                                    ?>
                                  changeMonth: true,
                                  changeYear: true,
                                  numberOfMonths: 1,
                                  dateFormat : 'dd/mm/yy',
                                   beforeShow:function(a,b){
                                    setTimeout(function(){
                                      $('.ui-datepicker').css('z-index', 99999999999999);
                                    }, 0);
                                  }
                                })
                                .on( "change", function() {
                                  to.datepicker( "option", "minDate", getDate( this ) );
                                  var datanya = $(this).data("id");
                                  var date = $(this).datepicker("getDate");
                                    //console.log("start->"+$.datepicker.formatDate("yy-mm-dd", date));
                                    $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                                }),
                              to = $( "#endedit" ).datepicker({
                                defaultDate: "+1w",
                                changeYear: true,
                                changeMonth: true,
                                numberOfMonths: 1,
                                dateFormat : 'dd/mm/yy',
                                beforeShow:function(a,b){
                                  setTimeout(function(){
                                    $('.ui-datepicker').css('z-index', 99999999999999);
                                }, 0);
                                    var minDate = $("#startedit").datepicker("getDate");
                                    //maxDate.setDate(maxDate.getDate())
                                    //console.log(minDate);
                                    to.datepicker('option','minDate',minDate);
                                    <?php
                                    if(isset($menuId) && isset($menuId[2]) && $menuId[0]=="118" && $menuId[1]=="40" && $menuId[2]=="1"){
                                         $TotCuti=0; 
                                        foreach ($dataLeaves->result() as $leave ) { 
                                            if ($leave->status == 1) {
                                                $TotCuti=$TotCuti+$leave->lama_cuti;
                                            }
                                        } 
                                        $sisa = $dataLeave->saldo_cuti-$TotCuti;
                                    ?>
                                    var maxDate = $("#startedit").datepicker("getDate");
                                    maxDate.setDate(maxDate.getDate()+<?php echo $sisa; ?>);
                                    to.datepicker('option','maxDate',maxDate);
                                    <?php
                                    }
                                    ?>
                                }
                              })
                              .on( "change", function() {
                                var datanya = $(this).data("id");
                                var date = $(this).datepicker("getDate");
                                    //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                                    $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                                //from.datepicker( "option", "maxDate", getDate( this ) );
                              });
                                $('#startedit').datepicker('setDate', new Date($('#startdateedit').val()));
                                $('#endedit').datepicker('setDate', new Date($('#enddateedit').val()));
                            }, 1000);
                            
                        },

                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }


                function getDate( element ) {
                  var date;
                  try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                  } catch( error ) {
                    date = null;
                  }
             
                  return date;
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
                 });
                      //$(".hapus").click(function(){
                        function hapus(id){
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
                                              url: "<?php echo base_url()?>HR/HapusAktifitasAbsensi/"+id,
                                             success: function(data) {
                                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                                  var curdate = new Date();
                                                  var format = formatDate(curdate);
                                                  var status = 'signout';
                                                  var exp = new Date();
                                                  //clearTimeout(t);
                                                  seconds = 0; minutes = 0; hours = 0;
                                                  setCookie('time', "00:00:00", exp);
                                                  setCookie('absen', "00:00:00", exp);
                                                  //update();
                                                  //waktu = window.setInterval(update, 1000);
                                                  deleteCookie('lunch');
                                                  deleteCookie('break');
                                                  deleteCookie('extra');
                                                  deleteCookie('time');
                                                  deleteCookie('absen');
                                                  setTimeout(function(){
                                                          window.location.href="<?php echo base_url()?>HR/HRAktifitasAbsensi";
                                                       
                                                  },2000);
                                              }
                                          });
                                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                      }
                                  });
                                }
                        //});
                   // });
            </script>