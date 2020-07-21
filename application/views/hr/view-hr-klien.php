<div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory  / Perusahaan & Departemen</h6> -->
                        <p class="fz-36 barlow-bold"> View Perusahaan & Departement </p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 view" >
                <div class="card ">
                  <div class="body">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                      </div>
                      <div class="col-lg-6 col-md-6" align="right">
                        <a href="<?php echo base_url() ?>HR/HRDepartemen" class="btn btn-blue col-3">Kembali</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" >
                        <div class="row ">
                          <div class="col-md-6 col-6" >
                            <p class="fz-14-judul">Nama Perusahaan </p>
                          </div>
                          <div class="col-md-6 col-6">
                            <p class="fz-14-isi"><?php echo $dataperusahaan->nama_perusahaan ?></p>
                          </div>
                        </div>
                        <div class="row ">
                          <div class="col-md-6 col-6" >
                              <p class="fz-14-judul">Alamat Perusahaan </p>
                          </div>
                          <div class="col-md-6 col-6">
                            <p class="fz-14-isi"><?php echo $dataperusahaan->alamat ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 col-6 " >
                             <p class="fz-14-judul">Contact Person </p>
                          </div>
                          <div class="col-md-6 col-6 ">
                            <p class="fz-14-isi"><?php echo $dataperusahaan->contact_person ?></p>
                          </div>
                        </div>
                        <div class="row ">
                          <div class="col-md-6 col-6" >
                             <p class="fz-14-judul">No Telp </p>
                          </div>
                          <div class="col-md-6 col-6">
                            <p class="fz-14-isi"><?php echo $dataperusahaan->no_telp ?></p>
                          </div>
                        </div>
                        <div class="row ">
                          <div class="col-md-6 col-6" >
                              <p class="fz-14-judul">No Faximile </p>
                          </div>
                          <div class="col-md-6 col-6">
                            <p class="fz-14-isi"><?php echo $dataperusahaan->no_faximile ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6" >
                        <div class="row ">
                          <div class="col-md-6" >
                              <p class="fz-14-judul">Logo </p>
                          </div>
                          <div class="col-3">
                          </div>
                        </div>
                        <div class="row ">
                          <div class="col-md-6" >
                            <img class="img-responsive" height="100px" alt="school-logo" src="<?php echo base_url() ?>assets/logo_perusahaan/<?php echo $dataperusahaan->logo!=''?$dataperusahaan->logo:'not.png' ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row m-t-10">
                          <div class="col-md-9">
                          </div>
                          <?php if ($dataAkses == '1'){ ?>
                            <div class="col-md-3" align="right">
                               <a href="<?php  echo base_url()?>HR/TambahHRDepartemen/<?php echo $dataperusahaan->id_master_perusahaan; ?>" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/Plus.svg" class="padd-right-5">Tambah Departemen</a>
                            </div>
                          <?php } ?>
                          
                      </div>
                      <div class="table-responsive m-t-10">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                            
                              <thead class="thead-dark">
                                  <tr>
                                      <th>Nama Departemen</th>
                                      <th>Jumlah Karyawan</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($datadepartemen->result() as $dt) { ?> 
                                  <tr>
                                      <td><?php echo $dt->nama_departemen; ?></td>
                                      <td><?php echo $dt->jumkaryawan; ?></td>
                                      <td><a href="<?php  echo base_url()?>HR/ViewHRKlienDepartemenDtl/<?php echo $this->uri->segment(3); ?>/<?php echo $dt->id_departemen; ?>" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">View</a>
                                        <?php 
                                        if ($dt->jumkaryawan=='') { ?>
                                            <?php //if ($dataAkses == '1'){ ?>
                                              
                                            
                                              
                                              <a href="javascript:;"  class="btn btn-aksi " title="Hapus" data-type="departemen" onclick="hapus('dep',<?php echo $dt->id_departemen?>,<?php echo $this->uri->segment(3); ?>)" id="dep<?php echo $dt->id_departemen?>" data-id="<?php echo $dt->id_departemen?>"data-perusahaan="<?php echo $this->uri->segment(3); ?>"><img src="<?php echo base_url() ?>assets/img/Close.svg" class="padd-right-5">Hapus
                                          </a>
                                        <?php }// } ?>
                                          <?php //if ($dataAkses == '1'){ ?>
                                            <a href="<?php  echo base_url()?>HR/EditDepartemen/<?php echo $dt->id_departemen; ?>/<?php echo $this->uri->segment(3); ?>" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/Update.svg" class="padd-right-5">Edit Departemen</a>
                                          <?php //} ?>
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
      //hapus();
      // $('.master').DataTable({
      //     responsive: true,
          
      //     fnDrawCallback:function(oSettings){
      //      //  hapus();
      //     }
      // });
  });
  function hapus(iddiv,id,idp){
     // $(".hapus").click(function(){
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-blue1',
              cancelButton: 'btn btn-red1'
            },
            buttonsStyling: false,
          });
                var type=$('#'+iddiv+id).data('type');
                var id=$('#'+iddiv+id).data('id');
                var perusahaan=idp;

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
                        var url='';
                       // var no="";
                        if(type=='lokasi'){
                            url='<?php echo base_url()?>HR/HapusLokasiKantor/'+id;
                        }
                        if(type=='departemen'){
                            url='<?php echo base_url()?>HR/HapusDepartemen/'+id;
                          }
                         $.ajax({
                              type: 'POST',
                              url:url,
                             success: function(data) {
                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                  setTimeout(function(){
                                          // window.location.href="<?php //echo base_url()?>HR/viewHRKlienDepartemen/"+perusahaan;
                                          window.location.href="<?php echo base_url()?>HR/HRDepartemen";
                                       
                                  },2000);
                              }
                          });
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                      }
                  });
          
      //  });

};
</script>


