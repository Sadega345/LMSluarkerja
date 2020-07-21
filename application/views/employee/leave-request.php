
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu"> Absensi / Cuti</h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="Rectangle-35">
                                <div class="container padd-top-20">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p class="fz-14 putih">Sisa Cuti</p>
                                        </div>
                                        <div class="col-md-3">
                                               <?php foreach ($datadtlcuti->result() as $dt) { ?>
                                                   <p class="fz-14 abuputih"><?php echo $dt->deskripsi ?> : <?php echo $dt->jumlah_hari ?> Hari</p>
                                                <?php } ?>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-3">
                                             <!-- <a href="<?php  //echo base_url()?>Employee/ajukanCuti" class="btn Rectangle-diterima"><img src="<?php //echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Cuti </a> -->

                                             <!-- <a href="javascript:;" onclick="formtambahcuti('0')" class="btn Rectangle-diterima"><img src="<?php //echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Cuti</a> -->
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cuti Pribadi-->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    
                    <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Cuti Pribadi</h5>
                               </div>
                               <div class="col-md-3 col-12">
                                   <a href="javascript:;" onclick="formtambahcuti('0')" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Cuti</a>
                               </div>
                               
                            </div>
                            <div class="table-responsive">
                                
                                <table class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Kategori Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Durasi </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataLeaveRequest->result() as $cuti){ ?>
                                            <?php  
                                                
                                                $awal = $cuti->tanggal;
                                                $akhir = $cuti->sampe_tanggal;
                                                $then = strtotime($awal);
                                                $now = strtotime($akhir);
                                                // for 2 hari
                                                $lewat = array("Saturday","Sunday");
                                                $days = 0;
                                                $tmp=0;
                                                for ( $i = $then; $i <= $now; $i = $i + 86400 ) {
                                                    $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
                                                    $tanggal = strftime("%A",strtotime($thisDate));
                                                    if (!in_array($tanggal,$lewat)) {
                                                        $days++;
                                                    }
                                                }
                                                if($days == 0){
                                                    $tmp=0;
                                                }else{
                                                    $tmp = $days;
                                                    
                                                }
                                                
                                            ?>
                                        
                                        <tr>
                                            <td><?php echo $cuti->desLeave ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($cuti->tanggal)); ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($cuti->sampe_tanggal)) ?></td>
                                            <td><?php echo $tmp ?> hari</td>
                                            <td>
                                             <?php 
                                                if($cuti->status=='0'){
                                                    echo'<label class="btn Rectangle-probation">pengajuan</label>';
                                                }if ($cuti->status=='1') {
                                                    echo'<label class="btn Rectangle-permanent">Diterima</label>';
                                                }if ($cuti->status=='2') {
                                                    echo'<label class="btn Rectangle-resign">Ditolak</label>';
                                                }
                                            ?>   
                                            </td>
                                            <td>
                                                <?php 
                                                    
                                                    echo '<a href="javascript:;" onclick="view(\''.$cuti->id_absensi_leave.'\')">
                                                    <button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button>
                                                    </a>';
                                                    
                                                ?>
                                                    
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

            <!-- Cuti Khusus -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    
                    <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Cuti Khusus</h5>
                               </div>
                               <div class="col-md-3 col-12">
                                   <a href="javascript:;" onclick="formtambahcuti('1')" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Cuti</a>
                               </div>
                               
                            </div>
                            <div class="table-responsive">
                                
                                <table class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Kategori Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Durasi </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataLeaveRequestKhusus->result() as $cuti){ ?>
                                            <?php  
                                                
                                                $awal = $cuti->tanggal;
                                                $akhir = $cuti->sampe_tanggal;
                                                $then = strtotime($awal);
                                                $now = strtotime($akhir);
                                                // for 2 hari
                                                $lewat = array("Saturday","Sunday");
                                                $days = 0;
                                                $tmp=0;
                                                for ( $i = $then; $i <= $now; $i = $i + 86400 ) {
                                                    $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
                                                    $tanggal = strftime("%A",strtotime($thisDate));
                                                    if (!in_array($tanggal,$lewat)) {
                                                        $days++;
                                                    }
                                                }
                                                if($days == 0){
                                                    $tmp=0;
                                                }else{
                                                    $tmp = $days;
                                                    
                                                }
                                                
                                            ?>
                                        
                                        <tr>
                                            <td><?php echo $cuti->desLeave ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($cuti->tanggal)); ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($cuti->sampe_tanggal)) ?></td>
                                            <td><?php echo $tmp ?> hari</td>
                                            <td>
                                             <?php 
                                                if($cuti->status=='0'){
                                                    echo'<label class="btn Rectangle-probation">pengajuan</label>';
                                                }if ($cuti->status=='1') {
                                                    echo'<label class="btn Rectangle-permanent">Diterima</label>';
                                                }if ($cuti->status=='2') {
                                                    echo'<label class="btn Rectangle-resign">Ditolak</label>';
                                                }
                                            ?>   
                                            </td>
                                            <td>
                                                <?php 
                                                    
                                                    echo '<a href="javascript:;" onclick="view(\''.$cuti->id_absensi_leave.'\')">
                                                    <button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button>
                                                    </a>';
                                                    
                                                ?>
                                                    
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

            <!-- Cuti Sakit -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    
                    <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Izin</h5>
                               </div>
                               <div class="col-md-3 col-12">
                                   <a href="javascript:;" onclick="formtambahcuti('2')" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Izin</a>
                               </div>
                               

                            </div>
                            <div class="table-responsive">
                                
                                <table class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Kategori Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Durasi </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataLeaveRequestSakit->result() as $cuti){ ?>
                                            <?php  
                                                
                                                $awal = $cuti->tanggal;
                                                $akhir = $cuti->sampe_tanggal;
                                                $then = strtotime($awal);
                                                $now = strtotime($akhir);
                                                // for 2 hari
                                                $lewat = array("Saturday","Sunday");
                                                $days = 0;
                                                $tmp=0;
                                                for ( $i = $then; $i <= $now; $i = $i + 86400 ) {
                                                    $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
                                                    $tanggal = strftime("%A",strtotime($thisDate));
                                                    if (!in_array($tanggal,$lewat)) {
                                                        $days++;
                                                    }
                                                }
                                                if($days == 0){
                                                    $tmp=0;
                                                }else{
                                                    $tmp = $days;
                                                    
                                                }
                                                
                                            ?>
                                        
                                        <tr>
                                            <td><?php echo $cuti->desLeave ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($cuti->tanggal)); ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($cuti->sampe_tanggal)) ?></td>
                                            <td><?php echo $tmp ?> hari</td>
                                            <td>
                                             <?php 
                                                if($cuti->status=='0'){
                                                    echo'<label class="btn Rectangle-probation">pengajuan</label>';
                                                }if ($cuti->status=='1') {
                                                    echo'<label class="btn Rectangle-permanent">Diterima</label>';
                                                }if ($cuti->status=='2') {
                                                    echo'<label class="btn Rectangle-resign">Ditolak</label>';
                                                }
                                            ?>   
                                            </td>
                                            <td>
                                                <?php 
                                                    
                                                    echo '<a href="javascript:;" onclick="view(\''.$cuti->id_absensi_leave.'\')">
                                                    <button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button>
                                                    </a>';
                                                    
                                                ?>
                                                    
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
            

            <!-- Permohonan Cuti -->
            <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    
                    <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Daftar Permintaan Approval Cuti</h5>
                               </div>
                               

                            </div>
                            <div class="table-responsive">
                                
                                <table class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Kategori Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Durasi </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //foreach ($dataPermohonanCuti->result() as $permohonan){ ?>
                                            <?php  
                                                //Convert it into a timestamp.
                                                //$then = strtotime($permohonan->tanggal);
                                                 
                                                //Get the current timestamp.
                                                //$now = strtotime($permohonan->sampe_tanggal);
                                                 
                                                //Calculate the difference.
                                                //$difference = $now - $then;
                                                 
                                                //Convert seconds into days.
                                                //$days = floor($difference / (60*60*24) );
                                                //$tmpdur = $days+1; 
                                            ?>
                                        
                                        <tr>
                                            <td><?php //echo $permohonan->nama_lengkap ?></td>
                                            <td><?php //echo $permohonan->desLeave ?></td>
                                            <td><?php //echo strftime(" %d %B %Y",strtotime($permohonan->tanggal)) ?></td>
                                            <td><?php //echo strftime(" %d %B %Y",strtotime($permohonan->sampe_tanggal)) ?></td>
                                            <td><?php //echo $tmpdur; ?> hari</td>
                                            <td>
                                                <?php 
                                                    /*if($permohonan->status==0){
                                                        echo '<label class="btn Rectangle-menunggu">Menunggu</label>';
                                                    }else if($permohonan->status==1){
                                                        echo '<label class="btn Rectangle-diterima">Diterima</label>';
                                                    }else if($permohonan->status==2){
                                                        echo '<label class="btn Rectangle-ditolak">Ditolak</label>';
                                                    }*/
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-aksi" onclick="viewpermohonan('<?php //echo $permohonan->id_absensi_leave ?>')"><img src="<?php   //echo base_url() ?>assets/img/View.svg" class="padd-right-5"> Lihat</a>
                                            </td>

                                        </tr>
                                        <?php //} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Modal Tambah Cuti -->
            <div class="modal fade bd-example-modal-lg" id="tambah" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" action="<?php echo base_url() ?>Employee/prosesAjukanCuti" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Pengajuan Absensi</label>
                                </div>
                                
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formtambahcuti">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                <?php //if ($dataCutiPribadi->num_rows() > 0){ ?>
                                  <button type="submit" class="btn Rectangle-cari" id="save">Simpan</button>
                                <?php //} ?>
                                   <button type="button" class="btn Rectangle-batal" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                            
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>

            <!-- modal View --> 
            <div class="modal fade bd-example-modal-lg" id="viewapprovalcuti" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                        <div id="approvalcuti">
                        </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" id="view" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                        <div id="viewcuti">
                        </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" id="cuti" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                        <div id="viewpermohonancuti">
                        </div>
                    </div>
                  </div>
                </div>
            </div>

<script type="text/javascript">

    function sts(id_leave_kategori){
         $.ajax({
            type: "POST",
          url: "<?php echo base_url(); ?>employee/ambilsts", 
          data: {id_sts : id_leave_kategori}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
          	// destroyDatePicker();
          	var rs3 = response.id_leave_kategori;
          	var rs4 = response.status;
          	console.log(rs3);
          	if (rs3 == 0 && rs4 == 0) {
          		// destroyDatePicker();
          		alert("Maaf anda belum memiliki cuti tersebut");
          		$("#save").attr("disabled",true);
          	}else{
          		$("#save").attr("disabled",false);
          		if(response.status=='0'){
                    destroyDatePicker();
               // alert("aaa"+response);
               // alert(response.jumlah_hari);
                var dateFormat = "mm/dd/yy",
                  from = $( "#start2" )
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
                      numberOfMonths: 2,
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
                    // alert(response.jumlah_hari);
                  to = $( "#end2" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2,
                    dateFormat : 'dd/mm/yy',
                    beforeShow:function(a,b){
                        var minDate = $("#start2").datepicker("getDate");
                        //maxDate.setDate(maxDate.getDate())
                        //console.log(minDate);
                        setTimeout(function(){
				            $('.ui-datepicker').css('z-index', 99999999999999);
				        }, 0);
                        to.datepicker('option','minDate',minDate);
                        <?php
                        // if(isset($menuId) && isset($menuId[2]) && $menuId[0]=="118" && $menuId[1]=="40" && $menuId[2]=="1"){
                        //      $TotCuti=0; 
                        //      $sisa=0;
                        //     foreach ($dataLeaves->result() as $leave ) { 
                        //         if ($leave->status == 1) {
                        //             $TotCuti=$TotCuti+$leave->lama_cuti;
                        //         }
                        //         $sisa = $leave->saldo_cuti-$TotCuti-1;
                        //     }
                            
                        ?>
                        var rs2 = response.jumlah_hari;
                        

                        console.log('id_leave_kategori '+rs3);
                        var maxDate = $("#start2").datepicker("getDate");
                        console.log(rs2);
                        // maxDate.setDate(maxDate.getDate()+<?php //echo $sisa; ?>);
                        maxDate.setDate(maxDate.getDate()+(rs2-1));
                        to.datepicker('option','maxDate',maxDate);
                        <?php
                        //}
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

            }else if(response.status=='1'){
               // alert(response);
                destroyDatePicker();
                 var dateFormat = "mm/dd/yy";
                  $( "#start2" )
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
                      numberOfMonths: 1,
                      dateFormat : 'dd/mm/yy',
                      beforeShow:function(a,b){
				            setTimeout(function(){
				              $('.ui-datepicker').css('z-index', 99999999999999);
				            }, 0);
				          }
                    })
                    .on( "change", function() {
                      $( "#end2" ).datepicker( "option", "minDate", getDate( this ) );
                      var datanya = $(this).data("id");
                      var date = $(this).datepicker("getDate");
                        //console.log("start->"+$.datepicker.formatDate("yy-mm-dd", date));
                        $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                    });
                    // alert(response.jumlah_hari);
                    var rs = response.jumlah_hari;
                  $( "#end2" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat : 'dd/mm/yy',
                    beforeShow:function(a,b){
                        var minDate = $("#start2").datepicker("getDate");
                        //maxDate.setDate(maxDate.getDate())
                        //console.log(minDate);
                        setTimeout(function(){
				            $('.ui-datepicker').css('z-index', 99999999999999);
				        }, 0);
                           
                        $( "#end2" ).datepicker('option','minDate',minDate);
                       var maxDate = $("#start2").datepicker("getDate");
                        maxDate.setDate(maxDate.getDate()+(rs-1));
                        console.log(maxDate)
                        $( "#end2" ).datepicker('option','maxDate',maxDate);
                    }
                  })
                  .on( "change", function() {
                    var datanya = $(this).data("id");
                    var date = $(this).datepicker("getDate");
                        //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                        $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                    //from.datepicker( "option", "maxDate", getDate( this ) );
                  });
            	}
            	else{
               // alert(response);
                 destroyDatePicker();
                 var dateFormat = "mm/dd/yy";
                  $( "#start2" )
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
                      numberOfMonths: 1,
                      dateFormat : 'dd/mm/yy',
                      beforeShow:function(a,b){
				            setTimeout(function(){
				              $('.ui-datepicker').css('z-index', 99999999999999);
				            }, 0);
				          }
                    })
                    .on( "change", function() {
                      $( "#end2" ).datepicker( "option", "minDate", getDate( this ) );
                      var datanya = $(this).data("id");
                      var date = $(this).datepicker("getDate");
                        //console.log("start->"+$.datepicker.formatDate("yy-mm-dd", date));
                        $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                    });
                    // alert(response.jumlah_hari);
                    var rs = response.jumlah_hari;
                  $( "#end2" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat : 'dd/mm/yy',
                    beforeShow:function(a,b){
                        var minDate = $("#start2").datepicker("getDate");
                        //maxDate.setDate(maxDate.getDate())
                        //console.log(minDate);
                        setTimeout(function(){
				            $('.ui-datepicker').css('z-index', 99999999999999);
				        }, 0);
                           
                        $( "#end2" ).datepicker('option','minDate',minDate);
                       // var maxDate = $("#start2").datepicker("getDate");
                       //  maxDate.setDate(maxDate.getDate());
                        // console.log(maxDate)
                        // $( "#end2" ).datepicker('option','maxDate',maxDate);
                    }
                  })
                  .on( "change", function() {
                    var datanya = $(this).data("id");
                    var date = $(this).datepicker("getDate");
                        //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                        $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                    //from.datepicker( "option", "maxDate", getDate( this ) );
                  });
            	}
          	}
            
           
            
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(thrownError); 
          }
        }); 
    }
    function destroyDatePicker(){
	    $("#start2").datepicker("destroy");
	    $("#start2").removeClass("hasDatepicker");

	    $("#end2").datepicker("destroy");
	    $("#end2").removeClass("hasDatepicker");
	}
</script>
<script type="text/javascript">
  	function ubah(a,b,c){
        var alasan=$('#alasan').val();
        $.ajax({
          url: '<?=site_url();?>Employee/ubahstscuti', //calling this function
          data:{id:a,sts:b,alasan:alasan,nik:c},
          type:'POST',
          //cache: false,

      success: function(data) {
            alert("success");
           location.reload();
        },
        error: function(data) {
            alert("error");
        }
      });
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#view').modal({backdrop: 'static', keyboard: false});
        $('#cuti').modal({backdrop: 'static', keyboard: false});
        $('#tambah').modal({backdrop: 'static', keyboard: false});
    });

    function formtambahcuti(sts){
          $.ajax({
            url: "<?php echo base_url();?>Employee/ajukanCuti/"+sts,
            // data: {nik:a},
            type: "post",
            // dataType:'json',
            success: function (response) {
               // where('masuk');
                $('#tambah').modal('show');
                $('#formtambahcuti').html(response);
                setTimeout(function(){
                    $('#dropify-event').dropify();
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

    function view(a){
          $.ajax({
            url: "<?php echo base_url();?>Employee/viewleaveRequest/"+a,
            // data: {nik:a},
            type: "post",
            // dataType:'json',
            success: function (response) {
               // alert('masuk');
                $('#view').modal('show');
                $('#viewcuti').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }

    function viewpermohonan(a){
        // alert('masuk');
          $.ajax({
            url: "<?php echo base_url();?>Employee/viewpermohonanapprovalleaveRequest/"+a,
            // data: {nik:a},
            type: "post",
            // dataType:'json',
            success: function (response) {
               // alert('masuk');
                $('#cuti').modal('show');
                $('#viewpermohonancuti').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }

</script>