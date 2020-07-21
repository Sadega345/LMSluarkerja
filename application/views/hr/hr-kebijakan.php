
            <?php  
              $tanggal_mulai="";
                if($this->input->post('tanggal_mulai')==""){
                  echo "";
                }else{
                  $a=explode("-", $this->input->post('tanggal_mulai')); 
                  $tanggal_mulai=$a[2].'/'.$a[1].'/'.$a[0];  
                }
            ?> 
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Informasi Organisasi / Kebijakan</h6> -->
                        <p class="fz-36 barlow-bold"> Informasi Organisasi / Kebijakan</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                  <div class="container">
                      <form action="<?php echo base_url()?>HR/HRKebijakan" method="post">
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
                                  <label>Jenis Kebijakan</label>        
                              </div>
                              <div class="col-md-4" align="left">
                                  <select name="id_policetype" class="form-control  fcheight" data-placeholder="Pilih Kebijakan" tabindex="2" >
                                          <option value="">Pilih Semua Kebijakan</option>
                                  <?php
                                      foreach($datatipekebijakan->result() as $dt){ ?>
                                          <option value="<?php echo $dt->id_policetype;?>" <?php echo $dt->id_policetype==$this->input->post('id_policetype')?'selected':'' ;?> ><?php echo $dt->deskripsi;?></option>
                                  <?php
                                      }
                                  ?>  
                                  </select>
                              </div>
                              <div class="col-md-2 m-t-20">
                                  <label>Mulai Berlaku </label>   
                              </div>
                              <div class="col-md-4" align="left">
                                 <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                      <div class="input-group mb-3" style="display: contents;">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                          </div>
                                          <input type="text" name="" class="form-control datepicker2 fcheight" data-id="datepicker2" value="<?php echo $tanggal_mulai!=""?$tanggal_mulai:"" ?>" readonly>
                                      </div>

                                      <input type="hidden" name="tanggal_mulai" value="<?php echo $this->input->post('tanggal_mulai') ?>" id="datepicker2">

                                  </div>
                              </div>

                             
                          </div>
                          <div class="row  m-t-20">

                              <div class="col-md-2 m-t-20">
                                  <label>Nama Kebijakan</label>        
                              </div>
                              <div class="col-md-4" align="left">
                                 <input type="text" name="nama_lengkap" class="form-control fcheight" value="<?php echo $this->input->post('nama_lengkap') ?>">
                              </div>

                              

                              <div class="col-md-2 m-t-20">
                                  <label>Status </label>        
                              </div>
                               <div class="col-md-4" align="left">
                                  <select name="status" class="form-control fcheight">
                                      <option value="">Pilih Semua Status</option>
                                      <option value="1" <?php echo $this->input->post('status')=='1'?'selected':''; ?>>Aktif</option>
                                      <option value="0" <?php echo $this->input->post('status')=='0'?'selected':''; ?>>Tidak Aktif</option>
                                  </select>
                              </div>
                          </div>
                      </form>
                  </div>  
                </div>
            </div>
            <div class="row clearfix m-t-20">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                              <div class="col-md-6 col-6">
                                 <h5 class="fz-aktivitasabsensi">Kebijakan</h5>
                              </div> 
                              <div class="col-md-6 col-6" align="right">
                              </div>
                            </div> 
                            <div class="row mb-3">
                               <div class="col-md-9">
                               </div> 
                               <?php if ($dataAkses == '1'){ ?>
                                  <div class="col-md-3 col-12" align="right">
                                      <a href="javascript:; " onclick="formtambah()" class="btn Rectangle-diterima"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Kebijakan</a>
                                  </div>
                               <?php } ?>
                                
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Jenis Kebijakan</th>
                                            <th>Nama Kebijakan</th>
                                           <!--  <th>Departemen</th> -->
                                            <th>Mulai Berlaku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datakebijakan->result() as $dataKebijakan) { ?>
                                            <tr>
                                                <td><?php echo $dataKebijakan->deskripsi_policetype; ?></td>
                                                <td><?php echo $dataKebijakan->judul; ?></td>
                                                <!-- <td><?php// echo $dataKebijakan->deskripsi_departemen; ?></td> -->
                                                <td><?php echo strftime(" %d %B %Y",strtotime($dataKebijakan->tanggal_mulai)); ?></td>
                                                <td>
                                                    <a href="javascript:;" onclick="view('<?php echo $dataKebijakan->id_kebijakan ?>')" class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/View.svg" class="padd-right-5">Lihat</a>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                      <a href="javascript:;" onclick="formedit('<?php echo $dataKebijakan->id_kebijakan ?>')" class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</a>
                                                      <a href="javascript:;"  class="btn btn-aksi hapus" onclick="hapus(<?php echo $dataKebijakan->id_kebijakan; ?>)"  title="Hapus"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus</a>
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
                                                <label class="fz-18">Detail Kebijakan</label>
                                                
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
                            <form action="<?php echo base_url()?>HR/ProsesEditKebijakan" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Kebijakan</label>
                                                
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
                            <form action="<?php echo base_url()?>HR/ProsesTambahKebijakan" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Kebijakan</label>
                                                
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
                              url: "<?php echo base_url();?>HR/HRKebijakanDetail/"+a,
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
                              url: "<?php echo base_url();?>HR/HREditKebijakan/"+a,
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
                              },
                              error: function(jqXHR, textStatus, errorThrown) {
                                 console.log(textStatus, errorThrown);
                              }
                          });
                  }
                   function formtambah(){
                            $.ajax({
                              url: "<?php echo base_url();?>HR/TambahHRKebijakan",
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
                              },
                              error: function(jqXHR, textStatus, errorThrown) {
                                 console.log(textStatus, errorThrown);
                              }
                          });
                  }

                     // $(".hapus").click(function(){
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
                                              url: "<?php echo base_url()?>HR/HapusKebijakan/"+id,
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
                                                          window.location.href="<?php echo base_url()?>HR/HRKebijakan";
                                                       
                                                  },2000);
                                              }
                                          });
                                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                      }
                                  });
                                }
                          
                       // });
                   // });
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
