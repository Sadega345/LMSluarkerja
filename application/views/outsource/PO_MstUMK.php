<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / UMK</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">Master UMK</h6>
               
                <div class="table-responsive">
                    <div  align="right">
                         <a href="<?php echo base_url()?>Outsource/PO_TambahUMK"><button class="btn btn-blue col-md-3">Tambah Data <i class="fa fa-plus"></i></button></a>
                    </div>
                    <br>
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                      
                         <thead class="thead-dark">
                            <tr>
                                <th>ID </th>
                                <th>Gaji</th>
                                <th>Provinsi</th>
                                <th>Kota/Kabupaten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach ($dataUMK->result() as $dt) { ?>
                            
                            <tr>
                                <td><?php echo $dt->id_umk; ?></td>
                                <td>Rp <?php echo number_format($dt->gaji,0,'.','.'); ?></td>
                                <td><?php echo $dt->desProvinsi; ?></td>
                                <td><?php echo $dt->desKabupaten; ?></td>
                                <td>
                                    <a href="javascript:;"  class="btn btn-red1 hapus" onclick="hapus(<?php echo $dt->id_umk; ?>)" title="Hapus">Hapus
                                    </a>
                                    <a href="<?php echo base_url()?>Outsource/EditUMK/<?php echo $dt->id_umk ?>">
                                        <button class="btn btn-yellow">Edit</button>
                                    </a> 
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
  // $(document).ready(function(){
  //     hapus();
  //     $('.js-basic-example').DataTable({
  //         responsive: true,
          
  //         fnDrawCallback:function(oSettings){
  //            hapus();
  //         }
  //     });
  // });
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
                              url: "<?php echo base_url()?>Outsource/HapusUMK/"+id,
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
                                          window.location.href="<?php echo base_url()?>Outsource/masterUMK";
                                       
                                  },2000);
                              }
                          });
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                      }
                  });
          }
       // });
</script>