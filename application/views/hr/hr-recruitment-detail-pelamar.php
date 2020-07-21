
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu">On Board / Recruitment / Detail</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-4">
                            	
                                <?php 
                                                    if($datapelamar->status_lamar=='0'){
                                                        echo ' <label class="btn btn-orange2">Proses</label>';
                                                    }else if($datapelamar->status_lamar=='1'){
                                                         echo ' <label class="btn btn-red2">Ditolak</label>';
                                                    }else if($datapelamar->status_lamar=='2'){
                                                         echo ' <label class="btn btn-green2 ">Diterima</label>';
                                                    }
                                                 ?>
                            </div>
                            <div class="col-md-8 text-center col-4" >
                                 <h6 class="tittle-box">Detail Pelamar</h6>
                            </div>
                            <div class="col-md-2 col-4">
                                <a href="<?php echo base_url()?>HR/HRRecruitment" class="btn btn-blue">Kembali</a>
                            </div>
                        </div>
                        <div class="container">
                        <div class="row">
                            <div class="col-md-3"  >
                                <b class="tittle-box">Informansi Lowongan</b>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-2 col-5"  align="right">
                                <label>Nama Posisi</label>
                            </div>
                            <div class="col-md-3 col-7">
                                <p><?php echo $dataloker->jenis_project; ?></p>
                            </div>
                        </div>	
                        <div class="row">
                            <div class="col-md-2 col-5"  align="right">
                                <label>Waktu</label>
                            </div>
                            <div class="col-md-6 col-7">
                                <p><?php echo strftime(" %d %B",strtotime($dataloker->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($dataloker->tanggal_selesai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"  >
                                <b class="tittle-box">Informansi Pelamar</b>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-2 col-5"  align="right">
                                <label>Nama Pelamar </label>
                            </div>
                            <div class="col-md-3 col-7">
                                <p><?php echo $datapelamar->nama_lengkap; ?></p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-2 col-5"  align="right">
                                <label>Email </label>
                            </div>
                            <div class="col-md-3 col-7">
                                <p><?php echo $datapelamar->email; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-5"  align="right">
                                <label>No. Handphone :</label>
                            </div>
                            <div class="col-md-6 col-7">
                                <p><?php echo $datapelamar->nomor_telepon; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-5"  align="right">
                                <label>Tanggal Melamar </label>
                            </div>
                            <div class="col-md-6 col-7">
                                <p><?php echo strftime(" %d %B %Y",strtotime($datapelamar->tanggal)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-5"  align="right">
                                <label>Alamat </label>
                            </div>
                            <div class="col-md-6 col-7">
                                <p><?php echo $datapelamar->alamat; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-5"  align="right">
                                <label>CV </label>
                            </div>
                            <div class="col-md-6 col-7">
                                 <?php if($datapelamar->file_cv==''){
                                    echo "-";
                                }else{
                                    echo ' <form action="'.base_url().'HR/dokumenCV" method="post" enctype= "multipart/form-data">
                                    <input type="hidden" name="path" value="assets/cv/'.$datapelamar->file_cv.'">
                                    <input type="hidden" name="file_cv" value="'.$datapelamar->file_cv.'">
                                    <input type="submit" class="btn btn-blue col-6" name="download" value="Download">
                                </form>';
                                } ?>
                                
                                <!-- <p><?php //echo $datapelamar->file_cv; ?></p> -->
                            </div>
                        </div>
                        <?php 
                            	 	$start_date = new DateTime($dataloker->tanggal_selesai);
                                    $end_date = new DateTime(date('Y-m-d'));
                                    $interval = $start_date->diff($end_date);
                            	if($interval->format('%r%a') > 0 && $dataloker->status=='0' ) { ?>
                            				<div class="row m-t-10">
					                            <div class="col-md-1" >
					                            </div>
					                            <div class="col-md-12 col-12" align="center">
					                                <label class="btn btn-red2 col-md-3">Expired</label>
					                            </div>
					                        </div>
                                      <?php }elseif($interval->format('%r%a') > 0 && $dataloker->status=='1'){ ?>
                                        	<div class="row m-t-10">
					                            <div class="col-md-1" >
					                            </div>
					                            <div class="col-md-12 col-12" align="center">
					                                <label class="btn btn-red2 col-md-3">Expired</label>
					                            </div>
					                        </div>
                                      <?php }elseif($interval->format('%r%a') <= 0 && $dataloker->status=='0'){ ?>
                                        	<div class="row m-t-10">
					                            <div class="col-md-1" >
					                            </div>
					                            <div class="col-md-12 col-12" align="center">
					                                <a href="javascript:;" onclick="ubah('<?php echo $datapelamar->id_pelamar ?>','<?php echo $datapelamar->id_loker ?>','2')" class="btn btn-green1" title="Terima"> Terima</a>
					                                 <a href="javascript:;" onclick="ubah('<?php echo $datapelamar->id_pelamar ?>','<?php echo $datapelamar->id_loker ?>','1')" class="btn btn-red1" title="Tolak"> Tolak</a>
					                            </div>
					                        </div>
                                      <?php }elseif($interval->format('%r%a') <= 0 && $dataloker->status=='1'){
                                          echo'<label class="btn btn-red2 col-md-3>Close</label>';
                                      }
                                ?>
                        
                        <br>
                    </div>
                </div>    
            </div> 
        </div>
        <script type="text/javascript">
            function ubah(a,b,c){
                  const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                              confirmButton: 'btn btn-blue1',
                              cancelButton: 'btn btn-red1'
                            },
                            buttonsStyling: false,
                          });
                swalWithBootstrapButtons.fire({
                  title: "Apakah Anda yakin?",
                  text: "Ingin merubah data ini? ",
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
                  url: '<?=site_url();?>HR/ubahstslamar', //calling this function
                  data:{id:a,id_loker:b,sts:c},
                  type:'POST',
                  cache: false,

              success: function(data) {
                  // alert("success");
                   location.reload();
                }
              });
                 } else if (result.dismiss === Swal.DismissReason.cancel) {
                      swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                  }
              });
            }
            
            </script>


         