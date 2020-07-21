<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Perusahaan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">Master Perusahaan</h6>
                <div class="" align="right">
                	 <a href="<?php echo base_url() ?>Outsource/TambahMstPerusahaan"><button class="btn btn-blue col-12 col-md-3">Tambah Perusahaan <i class="fa fa-plus"></i> </button></a>
                </div>
               <br>
                <div class="table-responsive">
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                         <thead class="thead-dark">
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                               <!--  <th>Kota</th> -->
                                <th>Contact Person</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($dataPerusahaan->result() as $perusahaan) { ?>
                            <tr>
                                <td><?php echo $perusahaan->nama_perusahaan; ?></td>
                                <td><?php echo $perusahaan->alamat; ?></td>
                               <!--  <td><?php //echo $perusahaan->kota; ?></td> -->
                                <td><?php echo $perusahaan->contact_person;  ?></td>
                                <td>
                                    <a href="<?php  echo base_url() ?>Outsource/PO_EditPerusahaanDtl/<?php echo $perusahaan->id_master_perusahaan;  ?>">
                                        <button class="btn btn-green1">Detail</button>
                                    </a>
                                    <a href="<?php  echo base_url() ?>Outsource/PO_EditPerusahaan/<?php echo $perusahaan->id_master_perusahaan;  ?>">
                                        <button class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href="javascript:;"  class="btn btn-danger " onclick="hapus(<?php echo $perusahaan->id_master_perusahaan; ?>)" title="Hapus">Hapus
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
                              url: "<?php echo base_url()?>Outsource/HapusPOPerusahaan/"+id,
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
                                          window.location.href="<?php echo base_url()?>Outsource/masterPerusahaan";
                                       
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