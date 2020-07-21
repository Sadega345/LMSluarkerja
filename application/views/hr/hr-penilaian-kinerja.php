
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Penilaian Kinerja</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                             <div class="row">
                                <div class="col-md-8 m-t-10 col-6">  
                                    <h6 class="tittle-box">Penilaian Kinerja</h6>    
                                </div>
                                <?php if ($dataAkses == '1'){ ?>
                                  <div class="col-md-4 col-6" align="right">
                                      <a href="<?php echo base_url()?>HR/TambahHRPenilaianKinerja" class="btn btn-blue col-md-6">Tambah Penilaian</a>
                                  </div>
                                <?php } ?>
                                 
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Tanggal Create</th>
                                            <th>Nama Penilai</th>
                                            <th>Nama Karyawan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataReview->result() as $dt) { ?>
                                            <tr>
                                                <td><?php echo $dt->tanggal; ?></td>
                                                <td><?php echo $dt->nama_pic; ?></td>
                                                <td><?php echo $dt->nama_lengkap; ?></td>
                                                <td>
                                                  <?php if ($dataAkses == '1'){ ?>
                                                    <a href="javascript:;"  class="btn btn-red1 hapus" onclick="hapus(<?php echo $dt->nik; ?>)"  title="Hapus">Hapus
                                                    </a>
                                                  <?php } ?>
                                                    
                                                </td>
                                                <!-- <td>
                                                    <a href="<?php //echo base_url()?>HR/ViewKPI/<?php// echo $dt->id_kpi ?>">
                                                        <button class="btn btn-green1">Lihat</button>
                                                    </a>
                                                    <a href="<?php //echo base_url()?>HR/HapusKPI/<?php //echo $dt->id_kpi ?>"  class="btn btn-red1" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus">Hapus
                                                    </a>
                                                    <a href="<?php// echo base_url()?>HR/EditKPI/<?php //echo $dt->id_kpi ?>">
                                                        <button class="btn btn-yellow">Edit</button>
                                                    </a> 
                                                </td> -->
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
                //  $(document).ready(function(){
                   //   $(".hapus").click(function(){
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
                                              url: "<?php echo base_url()?>HR/HapusPenilaianKinerja/"+id,
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
                                                          window.location.href="<?php echo base_url()?>HR/HRPenilaianKinerja";
                                                       
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
         