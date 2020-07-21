
          
                          <!-- <form method="post"  id="hapus" action="<?php //echo base_url()?>Employee/prosesHapusOvertime"> -->
                            <!-- <input type="hidden" name="id_overtime" value="<?php //echo $dataOvertimeRow->id_overtime ?>">  -->
                            <div class="row m-t-10">
                              <div class="col-9 col-md-6">
                                  <label class="fz-18 padd-right-5">Detail Overtime</label>
                                      <?php 
                                          if($dataOvertimeRow->status=='0'){
                                              echo '<label class="Rectangle-probation">Pegajuan</label>';
                                          }else if($dataOvertimeRow->status=='1'){
                                              echo '<label class="Rectangle-permanent">Diterima</label>';
                                          }else if($dataOvertimeRow->status=='2'){
                                              echo '<label class="Rectangle-resign">Ditolak</label>';
                                          }
                                      ?>
                              </div>
                              <div class="col-3 col-md-6" align="right">
                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                              </div>
                          </div>


                            <div class="row m-t-10">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Nama Pegawai </p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"><?php echo $dataOvertimeRow->nama_lengkap; ?></p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Tanggal Lembur </p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"><?php echo strftime("%d %B %Y",strtotime($dataOvertimeRow->tanggal)); ?></p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Keterangan Lembur</p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"><?php echo $dataOvertimeRow->keterangan ?></p>
                              </div>               
                            </div>
                           
                            <!-- <div class="row">
                                <div class="col-lg-2">
                                </div>
                                    <?php //if ($dataOvertimeRow->status == '0'){ ?>
                                        <button class="btn btn-cancel col-lg-2 batal" type="button" title="Hapus">Batalkan</button>
                                    <?php //} ?>
                            </div> -->
                          <!-- </form> -->

                            <div class="row m-t-10">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Attachment</p>
                              </div>
                              <div class="col-md-7" align="left" >
                                  <p class="fz-14-isi">
                                    <?php foreach ($dataViewOvertime->result() as $overtime){ ?>
                                    <form action="<?php echo base_url() ?>Employee/dowloadFileOvertime" method="post">
                                        <div class="row m-t-10">
                                          
                                          <input type="hidden" name="path" value="assets/img/overtime/<?php echo $overtime->dokumen  ?>">

                                          <input type="hidden" name="id_overtime_detail_file" value="<?php echo $overtime->id_overtime ?>">
                                            
                                          <input type="hidden" name="overtime" value="<?php echo $overtime->dokumen  ?>">
                                            <div class="col-lg-2">
                                            </div>
                                                
                                            <button class="btn btn-blue col-lg-2" type="submit" title="Download">
                                                <img src="<?php echo base_url()?>assets/img/overtime/<?php echo $overtime->dokumen ?>" class="img-fluid">
                                            </button>
                                        </div>
                                    </form> 
                                    <?php } ?>
                                  </p>
                              </div>                 
                            </div>

            <script type="text/javascript">
              $(document).ready(function(){
                  $(".batal").click(function(){
                      const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                          confirmButton: 'btn btn-blue1',
                          cancelButton: 'btn btn-red1'
                        },
                        buttonsStyling: false,
                      });
                         
                              swalWithBootstrapButtons.fire({
                                  title: "Apakah Anda yakin?",
                                  text: "Anda yakin ingin Batalkan Lembur? ",
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
                                    $('#hapus').submit();
                                  } else if (result.dismiss === Swal.DismissReason.cancel) {
                                      swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                  }
                              });
                      
                  });
              });
          </script>