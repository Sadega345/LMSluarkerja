
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu">Klaim Reimbursement /Pengajuan Overtime</h6>
                         
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
                                   <h5 class="fz-aktivitasabsensi">Overtime</h5>
                               </div>
                               <div class="col-md-3 col-12">
                                    <a href="javascript:;" onclick="formtambahovertime()" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/plustambah1x.png" class="padd-right-5">Ajukan Overtime</a>
                               </div>

                            </div>
                            <div class="table-responsive">
                                
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                <!-- <table id="list-data-klaim"  class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%"> -->
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Keterangan</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataOvertime->result() as $overtime ) { ?>
                                            
                                        <tr>
                                            <td><?php echo $overtime->nama_lengkap ?></td>
                                            <td> <?php echo $overtime->keterangan ?></td>
                                            <td><?php echo strftime("%d %B %Y",strtotime($overtime->tanggal)); ?></td>
                                            <td>
                                                <?php 
                                                    if($overtime->status=='0'){
                                                        echo'<label class="btn Rectangle-probation">pengajuan</label>';
                                                    }if ($overtime->status=='1') {
                                                        echo'<label class="btn Rectangle-permanent">Diterima</label>';
                                                    }if ($overtime->status=='2') {
                                                        echo'<label class="btn Rectangle-resign">Ditolak</label>';
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    
                                                    echo '<a href="javascript:;" onclick="view(\''.$overtime->id_overtime.'\')">
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
        </div>

        <!-- Modal Tambah Klaim -->
        <div class="modal fade bd-example-modal-lg" id="tambah" >
            <div class="modal-dialog modal-lg" >
                <div class="modal-content" >
                    <div class="modal-body" >
                        <form method="post" action="<?php echo base_url() ?>Employee/prosesOvertime" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="row m-t-10">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="fz-18">Overtime</label>
                                    </div>
                                    
                                    <!-- <div class="col-lg-6 col-md-6" align="right">
                                      <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div> -->
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-12">
                                        <div id="formtambahovertime">
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

        <div class="modal fade bd-example-modal-lg" id="view" >
            <div class="modal-dialog modal-lg" >
              <div class="modal-content" >
                <div class="modal-body" >
                    <div id="viewovertime">
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

                function formtambahovertime(){
                    // alert('masuk');
                    $.getScript('<?php echo base_url() ?>assets/js/jquery.datetimepicker.full.js');
                    $.ajax({
                      url: "<?php echo base_url();?>Employee/tambahOvertime",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      
                      success: function (response) {

                         // alert('masuk');
                          $('#tambah').modal('show');
                          $('#formtambahovertime').html(response);
                          $('#dropify-event').dropify();
                          jQuery('#waktuawal').datetimepicker({
                            onShow:function(current_time,$input){
                                setTimeout(function(){
                                  $('.xdsoft_datetimepicker').css('z-index', 99999999999999);
                                }, 0);
                            }
                          });
                          jQuery('#waktuakhir').datetimepicker({
                            onShow:function(current_time,$input){
                                setTimeout(function(){
                                  $('.xdsoft_datetimepicker').css('z-index', 99999999999999);
                                }, 0);
                            }
                          });
                          // setTimeout(function(){
                          //   tgl()
                          // },1000);
                      },

                      error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus, errorThrown);
                    }
                  });
                }

                function view(a){
                  $.ajax({
                    url: "<?php echo base_url();?>Employee/viewOvertime/"+a,
                    // data: {nik:a},
                    type: "post",
                    // dataType:'json',
                    success: function (response) {
                       // alert('masuk');
                        $('#view').modal('show');
                        $('#viewovertime').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                  });
              }

              function viewOvertime(id){
                  $.post( "<?php echo base_url()?>Employee/viewOvertime", { id_overtime: id })
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

              function hapusOvertime(id){
                  $.ajax({
                    url: '<?php echo base_url();?>Employee/prosesHapusOvertime', //calling this function
                    data:{id_overtime:id},
                    type:'POST',
                    cache: false,

                success: function(data) {
                     alert("success");
                     location.reload();
                  }
                });
              }


            function effect_msg() {
                // $('.msg').hide();
                $('.msg').show(1000);
                setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
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

            
          
         