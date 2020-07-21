            <style type="text/css">
                .switch {
                  position: relative;
                  display: inline-block;
                  width: 60px;
                  height: 34px;
                  /*right: -500px;*/
                  /*top: -5px;*/
                }

                .switch input { 
                  opacity: 0;
                  width: 0;
                  height: 0;
                }

                .slider {
                  position: absolute;
                  cursor: pointer;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-color: #ccc;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                .slider:before {
                  position: absolute;
                  content: "";
                  height: 26px;
                  width: 26px;
                  left: 4px;
                  bottom: 4px;
                  background-color: white;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                input:checked + .slider {
                  background-color: #28a745;
                }

                input:focus + .slider {
                  box-shadow: 0 0 1px #2196F3;
                }

                input:checked + .slider:before {
                  -webkit-transform: translateX(26px);
                  -ms-transform: translateX(26px);
                  transform: translateX(26px);
                }

                /* Rounded sliders */
                .slider.round {
                  border-radius: 34px;
                }

                .slider.round:before {
                  border-radius: 50%;
                }   
            </style>
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                       
                        <p class="fz-36 barlow-bold"> Pengumuman / Kuisioner</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                  <div class="card ">
                      <div class="body">
                          <div class="row">
                            <div class="col-md-9 col-6">
                              <h5 class="fz-aktivitasabsensi">Kuesioner</h5>
                            </div> 
                          </div>
                          <div class="row mb-3">
                             <div class="col-md-9">
                             </div> 
                             <?php if ($dataAkses == '1'){ ?>
                                <div class="col-md-3 col-12" align="right">
                                    <!-- <a href="<?php  echo base_url()?>HR/TambahHRKuesioner" class="btn Rectangle-diterima"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Kuesioner</a> -->

                                    <a href="javascript:;" onclick="tambahkuesioner()" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/Plus.svg" class="padd-right-5">Tambah Kuesioner</a>

                                </div>
                             <?php } ?>
                             
                          </div>
                          <div class="table-responsive">
                              <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                
                                   <thead class="thead-dark">
                                      <tr>
                                          <th>Judul Kuesioner</th>
                                          <!-- <th>Departemen</th> -->
                                          <th>Tanggal Mulai</th>
                                          <th>Tanggal Berakhir</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($datakuesioner->result() as $dataKuesioner) { ?>
                                          <tr>
                                              <td><?php echo $dataKuesioner->judul; ?></td>
                                             <!--  <td><?php// echo $dataKuesioner->deskripsi_departemen; ?></td> -->
                                              <td><?php echo strftime(" %d %B %Y",strtotime($dataKuesioner->tanggal_mulai)); ?></td>
                                              <td><?php echo strftime(" %d %B %Y",strtotime($dataKuesioner->tanggal_selesai)); ?></td>
                                              <td>
                                                <label class="switch " >
                                                  <?php if ($dataAkses == '1'){ ?>
                                                    <input type="checkbox" onclick="ubah('<?php echo $dataKuesioner->id_questioner ?>','<?php echo $dataKuesioner->status=='1'?'0':'1'?>')" <?php echo $dataKuesioner->status=='1'?'checked':''; ?>>
                                                    <span class="slider round"></span>
                                                  <?php } ?>
                                                </label>
                                              </td>
                                              <td>

                                                  <a href="javascript:;" onclick="viewkuesioner('<?php echo $dataKuesioner->id_questioner ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">lihat</a>

                                                  <?php if ($dataAkses == '1'){ ?>
                                                  <!-- <a href="<?php echo base_url()?>HR/EditHRKuesioner/<?php echo $dataKuesioner->id_questioner?>"  class="btn btn-aksi" ><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</a> -->

                                                  <a href="javascript:;" onclick="editkuesioner('<?php echo $dataKuesioner->id_questioner ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/Update.svg" class="padd-right-5">Edit</a>

                                                  <a href="javascript:;" onclick="hapus(<?php echo $dataKuesioner->id_questioner; ?>)"  class="btn btn-aksi " title="Hapus" ><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus</a>
                                                  
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

            <!-- view kuesioner -->
            <div class="modal fade bd-example-modal-lg" id="view">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                          <div class="col-lg-12">
                              <div class="body">
                                  <div class="row">
                                      <div class="col-lg-6 col-md-6">
                                          <label class="fz-18">Detail Kuesioner</label>
                                      </div>
                                      <div class="col-lg-6 col-md-6" align="right">
                                          <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div id="viewkuesioner">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tambah Kuesioner -->
            <div class="modal fade bd-example-modal-lg" id="viewtambah">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form action="<?php echo base_url()?>HR/ProsesTambahKuesioner" method="post">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Kuesioner</label>
                                                
                                            </div>
                                            
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambah">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container row m-t-10">
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

            <!-- Tambah Kuesioner -->
            <div class="modal fade bd-example-modal-lg" id="viewedit">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form action="<?php echo base_url()?>HR/ProsesEditKuesioner" method="post">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Kuesioner</label>
                                                
                                            </div>
                                            
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formedit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container row m-t-10">
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
                $('#view').modal({backdrop: 'static', keyboard: false});
                $('#viewtambah').modal({backdrop: 'static', keyboard: false});
              });

              function viewkuesioner(a){
                $.ajax({
                  url: "<?php echo base_url();?>HR/HRKuesionerDetail/"+a,
                  // data: {nik:a},
                  type: "post",
                  // dataType:'json',
                  success: function (response) {
                     // alert('masuk');
                      $('#view').modal('show');
                      $('#viewkuesioner').html(response);
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
                });
              }
              
              function tambahkuesioner(){
                $.ajax({
                  url: "<?php echo base_url();?>HR/TambahHRKuesioner",
                  // data: {nik:a},
                  type: "post",
                  // dataType:'json',
                  success: function (response) {
                     // alert('masuk');
                      $('#viewtambah').modal('show');
                      $('#formtambah').html(response);
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

              function editkuesioner(a){
                $.ajax({
                  url: "<?php echo base_url();?>HR/EditHRKuesioner/"+a,
                  // data: {nik:a},
                  type: "post",
                  // dataType:'json',
                  success: function (response) {
                     // alert('masuk');
                      $('#viewedit').modal('show');
                      $('#formedit').html(response);
                      $('.tglvaledit').keydown(function (event){
                        event.preventDefault();
                      });
                      setTimeout(function(){
                        tgledit();
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

              function tgl(){
                  var dateFormat = "mm/dd/yy",
                  from = $( "#startform" )
                    .datepicker({
                      defaultDate: new Date(),
                      
                      minDate:new Date(),
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
                          
                          // var maxDate = $("#startform").datepicker("getDate");
                          // maxDate.setDate(maxDate.getDate());
                          // to.datepicker('option','maxDate',maxDate);
                          
                      }
                    })
                    .on( "change", function() {
                      var datanya = $(this).data("id");
                      var date = $(this).datepicker("getDate");
                          //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                          $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                      from.datepicker( "option", "maxDate", getDate( this ) );
                    });
              }

              function tgledit(){
                  var dateFormat = "mm/dd/yy",
                  from = $( "#startformedit" )
                    .datepicker({
                      defaultDate: new Date(),
                      
                      minDate:new Date(),
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
                    to = $( "#endformedit" ).datepicker({
                      defaultDate: "+1w",
                      changeYear: true,
                      changeMonth: true,
                      numberOfMonths: 1,
                      dateFormat : 'dd/mm/yy',
                      beforeShow:function(a,b){
                        setTimeout(function(){
                          $('.ui-datepicker').css('z-index', 99999999999999);
                      }, 0);
                          var minDate = $("#startformedit").datepicker("getDate");
                          //maxDate.setDate(maxDate.getDate())
                          //console.log(minDate);
                          to.datepicker('option','minDate',minDate);
                          
                          // var maxDate = $("#startform").datepicker("getDate");
                          // maxDate.setDate(maxDate.getDate());
                          // to.datepicker('option','maxDate',maxDate);
                          
                      }
                    })
                    .on( "change", function() {
                      var datanya = $(this).data("id");
                      var date = $(this).datepicker("getDate");
                          //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                          $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                      from.datepicker( "option", "maxDate", getDate( this ) );
                    });

                    $('#startformedit').datepicker('setDate', new Date($('#startdateedit').val()));
                    $('#endformedit').datepicker('setDate', new Date($('#enddateedit').val()));
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
                                              url: "<?php echo base_url()?>HR/HapusKuesioner/"+id,
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
                                                          window.location.href="<?php echo base_url()?>HR/HRKuesioner";
                                                       
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
            <script type="text/javascript">
              function ubah(a,b){
                        $.ajax({
                          url: '<?=site_url();?>HR/ubahstskuis', //calling this function
                          data:{id:a,sts:b},
                          type:'POST',
                          cache: false,

                      success: function(data) {
                           // alert("success");
                           location.reload();
                        }
                      });
                      }
            </script>
         