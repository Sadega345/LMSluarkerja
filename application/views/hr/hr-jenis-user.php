            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pengaturan / Jenis User </h6> -->
                        <h4 class="tittle-menu">Pengaturan / Jenis User</h4>
                    </div>
                </div>
            </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 view" >
             <div class="card ">
                 <div class="body">
                 	<ul class="nav nav-tabs-new2">

                        <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" data-toggle="tab" href="#status">Tambah HR</a></li>
                        <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" data-toggle="tab" href="#jenis">Jenis User</a></li>
                    </ul>
                    <div class="tab-content">
                    	<div class="tab-pane <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" id="status">
                    		<div class="row m-t-10">
                    			<div class="col-md-9">
								          </div>
                    		<?php if ($dataAkses == '1'){ ?>
                                <div class="col-md-3 m-b-10 " align="right">
                                    <a href="javascript:;" onclick="formtambahhr()" class="btn Rectangle-diterima "><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah HR</a>
                                </div>
                            <?php } ?>
							          </div>
                            <div class="table-responsive">
		                        <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
		                            <thead class="thead-dark">
		                                <tr>
		                                    <th>Nik</th>
		                                    <th>Nama</th>
		                                    <th>Jabatan</th>
		                                    <th>Jenis User</th>
		                                    <th>Aksi</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            <?php foreach ($dataUserHR->result() as $hr ) { ?>
		                                <tr>
		                                    <td><?php echo $hr->nik; ?></td>
		                                    <td><?php echo $hr->nama_lengkap?></td>
		                                    <td><?php echo $hr->jabatan?></td>
		                                    <?php if ($hr->id_jenis_user == '1'){ ?>
		                                    	<td>Employee</td>
		                                    <?php }elseif ($hr->id_jenis_user == '3') {
		                                    	echo "<td>HR</td>";
		                                    } elseif ($hr->id_jenis_user == '6') {
		                                    	echo "<td>Project Order</td>";
		                                    }
		                                    ?>
		                                    <td>
		                                        <a href="javascript:;" onclick="formviewhr('<?php echo $hr->id_user; ?>')" class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/View.svg" class="padd-right-5">Lihat</a>
		                                        <?php if ($dataAkses == '1'){ ?>
		                                            <a href="javascript:;" onclick="formedithr('<?php echo $hr->id_user; ?>')" class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</a>

		                                            <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus"  onclick="hapus('hapusda',<?php echo $hr->id_user ?>)" id="hapusda<?php echo $hr->id_user ?>" data-type="status" data-id="<?php echo $hr->id_user; ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
		                                            </a>
		                                        <?php } ?>
		                                        
		                                    </td>
		                                </tr>
		                            <?php } ?>
		                            </tbody>
		                        </table>
		                    </div>
                    	</div>

                    	
                    	<div class="tab-pane <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" id="jenis">
                    		<div class="row m-t-10">
                    			<div class="col-md-9">
								          </div>
                    		<?php if ($dataAkses == '1'){ ?>
                                <div class="col-md-3 m-b-10" align="right">
                                    <a href="<?php echo base_url()?>HR/TambahHRJenisUser" class="btn Rectangle-diterima "><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Jenis User</a>
                                </div>
                            <?php } ?>
							         </div>	

                        	<div class="table-responsive">
		                        <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
		                            <thead class="thead-dark">
		                                <tr>
		                                    <th>Jabatan</th>
		                                    <th>Menu Akses</th>
		                                    <th>Aksi</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            <?php foreach ($dataJenisUser->result() as $jenis ) { ?>
		                                <tr>
		                                    <td><?php echo $jenis->jenis_project; ?></td>
		                                    <td><?php echo $jenis->jum_jabatan?></td>
		                                    <td>
		                                        <a href="<?php  echo base_url()?>HR/ViewHRJenisUser/<?php echo $jenis->id_jabatan; ?>" class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/View.svg" class="padd-right-5">Lihat</a>
		                                        <?php if ($dataAkses == '1'){ ?>
		                                            <a href="<?php  echo base_url()?>HR/EditHRJenisUser/<?php echo $jenis->id_jabatan; ?>" class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</a>

		                                            <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="jenis" onclick="hapus('hapusda2',<?php echo $jenis->id_jabatan ?>)" id="hapusda2<?php echo $jenis->id_jabatan?>" data-id="<?php echo $jenis->id_jabatan; ?>"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
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
        </div>
    </div>
    <!-- view modal jenis HR-->
    <div class="modal fade bd-example-modal-lg" id="viewhr">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" >
                <div class="modal-body" >
                        <div class="col-lg-12">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="fz-18">Detail HR User</label>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6" align="right">
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="formviewhr">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- edit modal jenis HR-->
    <div class="modal fade bd-example-modal-lg" id="edithr">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" >
                <div class="modal-body" >
                       <form method="post" action="<?php echo base_url()?>HR/ProsesUbahStatusKaryawan" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="fz-18">Edit HR User</label>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6" align="right">
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="formedithr">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- tambah modal jenis HR -->
    <div class="modal fade bd-example-modal-lg" id="tambahhr">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" >
                <div class="modal-body" >
                      <form method="post" action="<?php echo base_url()?>HR/ProsesTambahHR" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="fz-18">Tambah HR User</label>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6" align="right">
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="formtambahhr">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	$(document).ready(function(){
          $('#edithr').modal({backdrop: 'static', keyboard: false});
          $('#tambahhr').modal({backdrop: 'static', keyboard: false});
          $('#viewhr').modal({backdrop: 'static', keyboard: false});
           // hapus();
        });

      function formviewhr(a){
            $.ajax({
              url: "<?php echo base_url();?>HR/ViewHRUser/"+a,
              // data: {nik:a},
              type: "post",
              // dataType:'json',
              success: function (response) {
                 // alert('masuk');
                  $('#viewhr').modal('show');
                  $('#formviewhr').html(response);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }
          });
      }

       function formedithr(a){
            $.ajax({
              url: "<?php echo base_url();?>HR/EditHRUser/"+a,
              // data: {nik:a},
              type: "post",
              // dataType:'json',
              success: function (response) {
                 // alert('masuk');
                  $('#edithr').modal('show');
                  $('#formedithr').html(response);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }
          });
      }

        function formtambahhr(){
          $.ajax({
            url: "<?php echo base_url();?>HR/TambahHRStatusUser",
            // data: {nik:a},
            type: "post",
            // dataType:'json',
            success: function (response) {
               // alert('masuk');
                $('#tambahhr').modal('show');
                $('#formtambahhr').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
      }

    	function hapus(iddiv,id){
          	//$(".hapus").click(function(){
              const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-blue1',
                  cancelButton: 'btn btn-red1'
                },
                buttonsStyling: false,
              });
                    var type=$('#'+iddiv+id).data('type');
                    var id=$('#'+iddiv+id).data('id');

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
                            var no="";
                            if(type=='status'){
                                url='<?php echo base_url()?>HR/HapusHRUser/'+id;
                                no='2';
                            }if(type=='jenis'){
                                url='<?php echo base_url()?>HR/HapusJabatanUser/'+id;
                                no='3';
                            }
                             $.ajax({
                                  type: 'POST',
                                  url:url,
                                 success: function(data) {
                                      swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                      setTimeout(function(){
                                              window.location.href="<?php echo base_url()?>HR/HRJenisUser/"+no;
                                           
                                      },2000);
                                  }
                              });
                          } else if (result.dismiss === Swal.DismissReason.cancel) {
                              swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                          }
                      });
              
           // });

  };
    </script>