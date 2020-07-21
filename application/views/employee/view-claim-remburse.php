
          
                          <form method="post"  id="hapus" action="<?php echo base_url()?>Employee/prosesHapusClaim">
                            <input type="hidden" name="id_claim" value="<?php echo $dataViewClaimRemburse->id_claim_remburse ?>"> 
                            <div class="row m-t-10">
                                <div class="col-lg-3 col-md-3">
                                    <label class="fz-18">Detail Klaim</label>
                                </div>
                                <div class="col-md-3 col-3">
                                  <?php 
                                        if($dataViewClaimRemburse->status=='0'){
                                            echo'<button type="button" class="Rectangle-probation">pengajuan</button>';
                                        }if ($dataViewClaimRemburse->status=='1') {
                                            echo'<button type="button" class="Rectangle-permanent">Diterima</button>';
                                        }if ($dataViewClaimRemburse->status=='2') {
                                            echo'<button type="button" class="Rectangle-resign">Ditolak</button>';
                                        }
                                        if ($dataViewClaimRemburse->status=='3') {
                                            echo'<button type="button" class="Rectangle-permanent">Sudah Cair</button>';
                                        } 
                                    ?>
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
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
                                  <p class="fz-14-isi"><?php echo $dataViewClaimRemburse->nama_lengkap; ?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Tanggal Dikeluarkan </p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"><?php echo strftime("%d %B %Y",strtotime($dataViewClaimRemburse->created_by_date)); ?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Jumlah</p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"> Rp. <?php echo number_format($dataViewClaimRemburse->total,0,'.','.') ?></p>
                              </div>             
                            </div>
                            <div class="row">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Keterangan Klaim</p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"><?php echo $dataViewClaimRemburse->deskripsi ?></p>
                              </div>               
                            </div>

                            <div class="row">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Alasan</p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"><?php echo $dataViewClaimRemburse->alasan ?></p>
                              </div>             
                            </div>
                           
                            <div class="row">
                                <div class="col-lg-2">
                                </div>
                                    <?php if ($dataViewClaimRemburse->status == '0'){ ?>
                                        <button class="btn btn-cancel col-lg-2 batal" type="button" title="Hapus">Batalkan</button>
                                    <?php } ?>
                            </div>
                          </form>
                            <div class="row m-t-10">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Attachment</p>
                              </div>
                              <div class="col-md-7" align="left" >
                                  <p class="fz-14-isi">
                                    <?php foreach ($dataViewClaimRemburses->result() as $remburse){ ?>
                                    <form action="<?php echo base_url() ?>Employee/dowloadFileKlaim" method="post">
                                        <div class="row m-t-10">
                                          
                                            <input type="hidden" name="path" value="assets/foto/claimremburse/<?php echo $remburse->file_bukti_transaksi  ?>">

                                            <input type="hidden" name="id_claim_detail_file" value="<?php echo $remburse->id_claim_detail_file ?>">
                                            
                                            <input type="hidden" name="claim" value="<?php echo $remburse->file_bukti_transaksi  ?>">
                                                <div class="col-lg-2">
                                                </div>
                                                
                                                <button class="btn btn-blue col-lg-2" type="submit" title="Download">
                                                    <img src="<?php echo base_url()?>assets/foto/claimremburse/<?php echo $remburse->file_bukti_transaksi ?>" class="img-fluid">
                                                </button>
                                                

                                        </div>
                                    </form> 
                                    <?php } ?></p>
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
                                  text: "Anda yakin ingin Batalkan Klaim? ",
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