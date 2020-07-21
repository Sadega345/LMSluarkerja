
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Pelatihan</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Search Filter</h6>
                            <div class="container">
                                <form action="<?php echo base_url()?>HR/HRPelatihan" method="post">
                                    <div class="row">
                                        <div class="col-md-3 m-t-10">
                                            <label>Nama program Pelatihan</label>        
                                        </div>
                                         <div class="col-md-4" align="left">
                                            <input type="text" class="form-control" name="nama_program" value="<?php echo $this->input->post('nama_program') ?>">
                                        </div>
                                    </div>
                                   <div class="row">
                                        <div class="col-md-3 m-t-10">
                                            <label>Pilih Lokasi</label>        
                                        </div>
                                         <div class="col-md-4" align="left">
                                            <input type="text" class="form-control" name="lokasi" value="<?php echo $this->input->post('lokasi') ?>">
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-2 m-t-10">      
                                        </div>
                                         <div class="col-md-4" align="right">
                                            <button type="submit" class="btn btn-blue col-md-6">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                             <div class="row">
                                <div class="col-md-8 m-t-10 col-6">  
                                    <h6 class="tittle-box">Jadwal Pelatihan</h6>    
                                </div>
                                <?php if ($dataAkses == '1'){ ?>
                                    <div class="col-md-4 col-6" align="right">
                                        <a href="<?php echo base_url()?>HR/TambahHRPelatihan" class="btn btn-blue col-md-6">Tambah Pelatihan</a>
                                    </div> 
                                <?php } ?>
                                
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Nama </th>
                                            <th>Perusahaan</th>
                                            <th>Departemen</th>
                                            <th>Trainer</th>
                                            <th>Jadwal Pelatihan</th>
                                            <th>Peserta</th>
                                            <!-- <th>Status</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($datapelatihan->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nama_program; ?></td>
                                            <td><?php echo $dt->nama_perusahaan; ?></td>
                                            <td><?php echo $dt->desDepartemen; ?></td>
                                            <td><?php echo $dt->nama_pelatih; ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($dt->tanggal_selesai)); ?> </td>
                                             <td><?php echo $dt->jumpeserta==''?'0':$dt->jumpeserta; ?></td> 
                                           <!--  <td>
                                                <?php// if($dt->status=='1'){
                                                 //   echo '<label class="btn btn-green2">Open</label>';
                                                //}else{
                                                  //  echo '<label class="btn btn-red2">Close</label>';
                                                //}; ?>
                                            </td> -->
                                            <td>
                                                <form action="<?php echo Base_url()?>HR/HRPelatihanDetail" method="post" >
                                                    <input type="hidden" name="id" value="<?php echo  $dt->id_training_jadwal?>">
                                                    <button type="submit" class="btn btn-green1">Lihat</button>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        
                                                    <a href="<?php echo base_url()?>HR/EditHRPelatihan/<?php echo $dt->id_training_jadwal ?>" class="btn btn-yellow">Edit</a>
                                                    <?php if($dt->jumpeserta=='') { ?>
                                                          <a href="javascript:;"  class="btn btn-red1" onClick='hapus(<?php echo $dt->id_training_jadwal ?>)' title="Hapus">Hapus
                                                                    </a>
                                                    <?php }} ?>
                                                
                                                </form>

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
                                              url: "<?php echo base_url()?>HR/HapusPelatihan/"+id,
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
                                                          window.location.href="<?php echo base_url()?>HR/HRPelatihan";
                                                       
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
         