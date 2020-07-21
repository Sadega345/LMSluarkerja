
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory  / Perusahaan & Departemen</h6> -->
                        <p class="fz-36 barlow-bold"> Directory  / Unit Bisnis & Departemen</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                              <div class="col-md-6 col-6">
                                <h5 class="fz-aktivitasabsensi">Unit Bisnis & Departemen</h5>
                              </div> 
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-9 ">
                              </div> 
                               <?php if ($dataAkses == '1'){ ?>
                                  <div class="col-md-3 col-12" align="right">
                                      <a href="javascript:;" class="btn Rectangle-diterima " onclick="formtambahklien()"><img src="<?php echo base_url() ?>assets/img/Plus.svg" class="padd-right-5">Tambah Klien</a>
                                  </div>
                               <?php } ?> 
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Unit Bisnis</th>
                                            <th>Jumlah Departemen</th>
                                            <th>Jumlah Pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($datakliendepartemen->result() as $dataDepartemen) { ?>
                                        <tr>
                                            <td><?php echo $dataDepartemen->nama_perusahaan; ?></td>
                                            <td><?php echo $dataDepartemen->jumdepartemen; ?></td>
                                            <td><?php echo $dataDepartemen->jumkaryawan; ?></td>
                                            <td>
                                              <a href="<?php echo base_url();?>HR/ViewHRKlienDepartemen/<?php echo $dataDepartemen->id_master_perusahaan; ?>"  class="btn btn-aksi"> <img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">Lihat</a>
                                              <?php if ($dataAkses == '1'){ ?>
                                                <a href="javascript:;" onclick="formeditklien('<?php echo $dataDepartemen->id_master_perusahaan; ?>')"  class="btn btn-aksi"> <img src="<?php echo base_url() ?>assets/img/Update.svg" class="padd-right-5">Edit</a>
                                              <?php } ?>
                                              
                                                <?php 
                                                    if ($dataDepartemen->jumdepartemen=='' && $dataDepartemen->jumkaryawan=='') { ?>
                                                        <?php if ($dataAkses == '1'){ ?>
                                                          <a href="javascript:;"  class="btn btn-aksi" onClick='hapus(<?php echo $dataDepartemen->id_master_perusahaan; ?>)' title="Hapus"><img src="<?php echo base_url() ?>assets/img/Close.svg" class="padd-right-5">Hapus
                                                                    </a>
                                                        <?php }  ?>
                                                    <?php }  ?>
                                                <!-- <a href="<?php  //echo base_url()?>HR/TambahHRDepartemen/<?php //echo $dataDepartemen->id_master_perusahaan; ?>" class="btn btn-blue1">Tambah Departemen</a> -->
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
            <div class="modal fade bd-example-modal-lg" id="edit" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post"  action="<?php echo base_url() ?>HR/ProsesEditPerusahaan" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Edit Unit Bisnis</label>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                  <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formeditklien">
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
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="view" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                      <form method="post" id="simpan" action="<?php echo base_url() ?>HR/ProsesTambahKlien" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Tambah Unit Bisnis</label>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                  <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <div id="formtambahklien">
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
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="klien" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                        <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">View Unit Bisnis & Departement</label>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                  <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10 mb-3">
                                <div class="col-md-12">
                                    <div id="viewklien">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>

            <script type="text/javascript">
              $(document).ready(function(){
                $('#edit').modal({backdrop: 'static', keyboard: false});
                 $('#view').modal({backdrop: 'static', keyboard: false});
                 $('#klien').modal({backdrop: 'static', keyboard: false});
              });
              function formeditklien(a){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/EditKlien/"+a,
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');
                                $('#edit').modal('show');
                                $('#formeditklien').html(response);
                                 var drEvent = $('#dropify-event').dropify();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus, errorThrown);
                            }
                        });
                    }
                function formtambahklien(){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/TambahHRKlien",
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');
                                $('#view').modal('show');
                                $('#formtambahklien').html(response);
                                 var drEvent = $('#dropify-event').dropify();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus, errorThrown);
                            }
                        });
                    }
                function viewklien(a){
                      $.ajax({
                        url: "<?php echo base_url();?>HR/ViewHRKlienDepartemen/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#klien').modal('show');
                            $('#viewklien').html(response);
                            $('.master').DataTable({
                                "responsive":true
                            });
                             //var drEvent = $('#dropify-event').dropify();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });

                   
                }
            </script>
            <script type="text/javascript">
              // $(document).ready(function(){
              //     hapus();
              //     $('.js-basic-example').DataTable({
              //         responsive: true,
                      
              //         fnDrawCallback:function(oSettings){
              //            hapus();
              //         }
              //     });
              // });

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
                                        url: "<?php echo base_url()?>HR/HapusKlien/"+id,
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
                                                    window.location.href="<?php echo base_url()?>HR/HRDepartemen";
                                                 
                                            },2000);
                                        }
                                    });
                                } else if (result.dismiss === Swal.DismissReason.cancel) {
                                    swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                }
                              });
                    }
                  //});
          </script>
         