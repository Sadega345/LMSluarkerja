
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / KPI</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                             <div class="row">
                                <div class="col-md-8 m-t-10 col-7">  
                                    <h6 class="tittle-box">Key Performance Index</h6>    
                                </div>
                                <?php if ($dataAkses == '1'){ ?>
                                    <div class="col-md-4 col-5" align="right">
                                        <a href="<?php echo base_url()?>HR/TambahHRKPI" class="btn btn-blue col-md-6">Tambah KPI</a>
                                    </div>
                                <?php } ?>
                                
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Jabatan</th>
                                            <!-- <th>Aspek Performance</th>
                                            <th>Nilai Performance</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datakpi->result() as $dt) { ?>
                                            <tr>
                                                <td><?php echo $dt->deskripsi_jabatan; ?></td>
                                               <!--  <td><?php// echo $dt->aspek_performance; ?></td>
                                                <td><?php //echo $dt->nilai_performance; ?></td> -->
                                                <td>
                                                    <a href="<?php echo base_url()?>HR/ViewKPI/<?php echo $dt->id_kpi ?>">
                                                        <button class="btn btn-green1">Lihat</button>
                                                    </a>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <a href="javascript:;"  class="btn btn-red1" onClick='hapus(<?php echo $dt->id_kpi ?>)' title="Hapus">Hapus
                                                        </a>
                                                        <a href="<?php echo base_url()?>HR/EditKPI/<?php echo $dt->id_kpi ?>">
                                                            <button class="btn btn-yellow">Edit</button>
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
                                              url: "<?php echo base_url()?>HR/HapusKPI/"+id,
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
                                                          window.location.href="<?php echo base_url()?>HR/HapusKPI";
                                                       
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
         