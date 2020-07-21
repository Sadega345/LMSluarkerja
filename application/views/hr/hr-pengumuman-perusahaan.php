
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <p class="fz-36 barlow-bold"> Pengumuman / Pengumuman Unit Bisnis</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                              <div class="col-md-9 col-6">
                                <h5 class="fz-aktivitasabsensi">Pengumuman Unit Bisnis</h5>
                              </div> 
                            </div>
                            <div class="row mb-3">
                               <div class="col-md-9">
                                   
                               </div> 
                               <?php if ($dataAkses == '1'){ ?>
                                  <div class="col-md-3 col-12" align="right">
                                      <a href="javascript:;" onclick="formtambah()" class="btn Rectangle-diterima "><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Pengumuman</a>
                                  </div>
                               <?php } ?>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Judul</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datapengumumanperusahaan->result() as $dataPengumumanPerusahaan ) { ?>
                                           <tr>
                                                <td><?php echo $dataPengumumanPerusahaan->judul; ?></td>
                                                <td> <?php echo strftime(" %d %B %Y",strtotime($dataPengumumanPerusahaan->tanggal_mulai)); ?></td>

                                                <td> <?php echo strftime(" %d %B %Y",strtotime($dataPengumumanPerusahaan->tanggal_selesai)); ?></td>
                                                <td>
                                                    <a href="javascript:;" onclick="view('<?php echo $dataPengumumanPerusahaan->id_pengumuman_perusahaan ?>')">
                                                        <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/View.svg" class="padd-right-5">Lihat</button>
                                                    </a> 
                                                    <?php if ($dataAkses == '1'){ ?>
                                                      <a href="javascript:;" onclick="formedit(<?php echo $dataPengumumanPerusahaan->id_pengumuman_perusahaan ?>)">
                                                          <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                                      </a>
                                                      <a href="javascript:;"  class="btn btn-aksi hapus" onclick="hapus(<?php echo $dataPengumumanPerusahaan->id_pengumuman_perusahaan ?>)" title="Hapus"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
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
            <!-- view modal -->
            <div class="modal fade bd-example-modal-lg" id="view">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Detail Pengumuman</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formview">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit modal -->
            <div class="modal fade bd-example-modal-lg" id="edit">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form action="<?php echo base_url()?>HR/ProsesEditPengumumanPerusahaan" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Pengumuman</label>
                                                
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
             <!-- tambah modal -->
            <div class="modal fade bd-example-modal-lg" id="tambah">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                             <form action="<?php echo base_url()?>HR/ProsesTambahPengumumanPerusahaan" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Pengumuman</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambah">
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
                  $(document).ready(function(){
                    $('#edit').modal({backdrop: 'static', keyboard: false});
                    $('#tambah').modal({backdrop: 'static', keyboard: false});
                  });

                    function view(a){
                            $.ajax({
                              url: "<?php echo base_url();?>HR/ViewPengumumanPerusahaan/"+a,
                              // data: {nik:a},
                              type: "post",
                              // dataType:'json',
                              success: function (response) {
                                 // alert('masuk');
                                  $('#view').modal('show');
                                  $('#formview').html(response);
                              },
                              error: function(jqXHR, textStatus, errorThrown) {
                                 console.log(textStatus, errorThrown);
                              }
                          });
                  }
                  function formedit(a){
                            $.ajax({
                              url: "<?php echo base_url();?>HR/EditPengumumanPerusahaan/"+a,
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
                   function formtambah(){
                            $.ajax({
                              url: "<?php echo base_url();?>HR/TambahHRPengumumanPerusahaan",
                              // data: {nik:a},
                              type: "post",
                              // dataType:'json',
                              success: function (response) {
                                 // alert('masuk');
                                  $('#tambah').modal('show');
                                  $('#formtambah').html(response);
                                  
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
                                              url: "<?php echo base_url()?>HR/HapusPengumumanPerusahaan/"+id,
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
                                                          window.location.href="<?php echo base_url()?>HR/HRPengumumanPerusahaan";
                                                       
                                                  },2000);
                                              }
                                          });
                                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                      }
                                  });
                                }

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
                                    }),
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
                                }
            </script>
         