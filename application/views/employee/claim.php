
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu">Tunjangan / Klaim</h6>
                    </div>
                </div>
            </div>
            
            <div class="view">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    <div class="msg" style="display:none;">
                    
                    </div>
                     <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Klaim</h5>
                               </div>
                               <div class="col-md-3 col-12">
                                    <!-- <a href="<?php //echo base_url()?>Employee/tambahClaim"class="btn Rectangle-diterima"> <img src="<?php //echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Klaim</a> -->

                                    <a href="javascript:;" onclick="formtambahclaim()" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Claim</a>
                               </div>

                            </div>
                            <div class="table-responsive">
                                <!-- <table  class="table table-hover js-basic-claim dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%"> -->
                                <!-- <table id="list-data-klaim"  class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%"> -->
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Tanggal Dikeluarkan</th>
                                            <th>Jumlah</th>
                                            <th>Deskripsi Klaim</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php  foreach ($dataClaimRemburse as $dt) { ?>
                                        <tr>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal)); ?></td>
                                            <td>Rp. <?php echo number_format($dt->total,0,'.','.'); ?></td>
                                            <td><?php echo $dt->deskripsi; ?> </td>
                                            <td>
                                              <?php    
                                                if($dt->status=='0'){
                                                  echo ' <button class="btn Rectangle-menunggu" style="cursor: default">Menunggu</button>';
                                                }else if($dt->status=='1'){
                                                  echo ' <button class="btn Rectangle-diterima" style="cursor: default">Disetujui</button>';
                                                }else if($dt->status=='2'){
                                                  echo ' <button class="btn Rectangle-ditolak" style="cursor: default">Ditolak</button>';
                                                }else if($dt->status=='3'){
                                                    echo ' <button class="btn btn-blue2" style="cursor: default">Cair</button>';
                                                }
                                              ?>
                                               
                                            </td>
                                            <td>
                                                <a href="javascript:;" onclick="view('<?php echo $dt->id_claim_remburse ?>')" class="btn btn-aksi"><img src="<?php echo base_url()?>assets/img/View.svg" class="padd-right-5">Lihat <?php //echo $dt->id_claim_remburse ?></a>
                                                <?php if($dt->status=='1' || $dt->status=='2'){ ?>
                                                    <a href="<?php echo base_url()?>Employee/cetakClaimReimbursement/<?php echo $dt->id_claim_remburse ?>" target="_blank" class="btn btn Rectangle-generate">Cetak</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php   } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Klaim -->
        <div class="modal fade bd-example-modal-lg" id="tambah" >
            <div class="modal-dialog modal-lg" >
              <div class="modal-content" >
                <div class="modal-body" >
                  
                    <div class="col-lg-12">
                        <div class="row m-t-10">
                            <div class="col-lg-6 col-md-6">
                                <label class="fz-18">Claim</label>
                            </div>
                            
                            <div class="col-lg-6 col-md-6" align="right">
                              <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-12">
                                <div id="formtambahclaim">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row m-t-10">
                            <div class="col-lg-6 col-md-6">
                              <button type="submit" class="btn Rectangle-cari">Simpan</button>
                              <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                            </div>
                        </div> -->
                        
                    </div>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="view" >
            <div class="modal-dialog modal-lg" >
              <div class="modal-content" >
                <div class="modal-body" >
                    <div id="viewclaim">
                    </div>
                </div>
              </div>
            </div>
        </div>

            
            <script type="text/javascript">

                 $(document).ready(function(){
                    $('#view').modal({backdrop: 'static', keyboard: false});
                    $('#tambah').modal({backdrop: 'static', keyboard: false});
                })

                function formtambahclaim(){
                    $.ajax({
                      url: "<?php echo base_url();?>Employee/tambahClaim",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#tambah').modal('show');
                          $('#formtambahclaim').html(response);
                          setTimeout(function(){
                            tgl()
                            $('#dropify-event').dropify();
                          },1000);
                      },

                      error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                    }
                  });
                }

                function view(a){
                  $.ajax({
                    url: "<?php echo base_url();?>Employee/viewClaimRemburse/"+a,
                    // data: {nik:a},
                    type: "post",
                    // dataType:'json',
                    success: function (response) {
                       // alert('masuk');
                        $('#view').modal('show');
                        $('#viewclaim').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                  });
              }

              function viewClaimRemburse(id){
                  $.post( "<?php echo base_url()?>Employee/viewClaimRemburse", { id_claim: id })
                    .done(function( data ) {
                      $( ".view").html(data);
                    });
              }

              function konfirmasi(){
                  var konf = confirm("Anda yakin ingin membatalkan data ini? ");
                  if (konf == true) {
                      $('#hapus').submit();
                  }
               }

              function hapusClaim(id){
                  $.ajax({
                    url: '<?php echo base_url();?>Employee/prosesHapusClaim', //calling this function
                    data:{id_claim:id},
                    type:'POST',
                    cache: false,

                success: function(data) {
                     alert("success");
                     location.reload();
                  }
                });
              }

            //   window.onload = function(){
            //   <?php
            //       if ($this->session->flashdata('msg') != '') {
            //           echo "effect_msg();";?>
                  
            //       new_alert("Sukses","<?php echo $this->session->flashdata('msg'); ?>", "success");
            //           <?php
            //           //echo "alert('".$this->session->flashdata('msg')."')";

            //       }
            //       if ($this->session->flashdata('msgsort') != '') {
            //           echo "effect_msg_sort();";
            //       }     
            //   ?>  
            // }

            function effect_msg() {
                // $('.msg').hide();
                $('.msg').show(1000);
                setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
            }
            
            </script>

            <script type="text/javascript">
              function tgl(){
                var dateFormat = "mm/dd/yy",
                from = $( "#start" )
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
                  })
                  to = $( "#end" ).datepicker({
                      defaultDate: "+1w",
                      changeYear: true,
                      changeMonth: true,
                      numberOfMonths: 1,
                      dateFormat : 'dd/mm/yy',
                      beforeShow:function(a,b){
                        setTimeout(function(){
                          $('.ui-datepicker').css('z-index', 99999999999999);
                      }, 0);
                          var minDate = $("#start").datepicker("getDate");
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
                          var maxDate = $("#start").datepicker("getDate");
                          maxDate.setDate(maxDate.getDate());
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
                }
            </script>
<script type="text/javascript">
    $(document).ready(function(){
        klaim(0);
    })
</script>            
         