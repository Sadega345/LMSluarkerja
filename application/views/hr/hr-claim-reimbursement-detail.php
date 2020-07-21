                    <div class="col-lg-12">
                            <div class="row m-t-10">
                                <div class="col-lg-3 col-md-3">
                                    <label class="fz-18">Detail Klaim</label>
                                </div>
                                <div class="col-md-3 col-3">
                                    <?php     
                                        if($dataKlaim->status=='0'){
                                            echo ' <label class="Rectangle-probation">Menunggu</label>';
                                        }else if($dataKlaim->status=='1'){
                                            echo ' <label class="Rectangle-permanent">Disetujui</label>';
                                        }else if($dataKlaim->status=='2'){
                                            echo ' <label  class="Rectangle-resign">Ditolak</label>';
                                        }else if($dataKlaim->status=='3'){
                                                echo ' <a href="#" class=" btn-blue2">Cair</a>';
                                        }
                                    ?>
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                  <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <div class="row m-t-10 mb-3">
                                <div class="col-md-6">
                                    <div class="row m-t-5">
                                        <div class="col-md-6" >
                                            <p class="fz-14-judul">Nama Pegawai </p>
                                        </div>
                                        <div class="col-md-6" >
                                            <p class="fz-14-isi"><?php echo $dataKlaim->nama_lengkap; ?></p>
                                        </div>
                                    </div>
                                    <div class="row m-t-5">
                                        <div class="col-md-6" >
                                            <p class="fz-14-judul">Tanggal Dikeluarkan </p>
                                        </div>
                                        <div class="col-md-6" >
                                            <p class="fz-14-isi"><?php echo strftime(" %d %B %Y",strtotime($dataKlaim->tanggal)); ?></p>
                                        </div>
                                    </div>
                                    <div class="row m-t-5">
                                        <div class="col-md-6" >
                                            <p class="fz-14-judul">Jumlah </p>
                                        </div>
                                        <div class="col-md-6" align="left">
                                            <p class="fz-14-isi">Rp. <?php echo number_format($dataKlaim->total,0,'.','.'); ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="row m-t-5">
                                        <div class="col-md-6">
                                            <p class="fz-14-judul">Keterangan Klaim </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fz-14-isi"><?php echo $dataKlaim->deskripsi; ?></p>
                                        </div>
                                    </div>
                                     <div class="row m-t-5">
                                        <div class="col-md-6">
                                            <p class="fz-14-judul">Alasan </p>
                                        </div>
                                        <div class="col-md-6">
                                            <?php     
                                                if($dataKlaim->status=='0'){
                                                    echo '<textarea class="form-control" name="alasan" id="alasan">'.$dataKlaim->alasan.'</textarea>';
                                                }else{
                                                    echo '<p class="fz-14-isi">'.$dataKlaim->alasan.'</p>';
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>

                                    <div class="row m-t-10">
                                        <div class="col-md-12" align="center">
                                            <?php     
                                                if($dataKlaim->status=='0'){
                                                    if ($dataAkses == '1') {
                                                        echo ' <a href="javascript:;" onclick="ubah('.$dataKlaim->id_claim_remburse.',1)" class="btn Rectangle-simpan" title="Setuju"> Setuju</a>
                                                            <a href="javascript:;" onclick="ubah('.$dataKlaim->id_claim_remburse.',2)" class="btn Rectangle-tutup" title="Ditolak"> Ditolak</a>';
                                                    }
                                                     
                                                }else{

                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="row m-t-5">
                                        <div class="col-md-3 col-3" >
                                            <p class="fz-14-judul">Dokumen </p>
                                        </div>
                                        <div class="col-md-9 col-9">
                                            <?php 
                                                if($dataKlaimFile->num_rows()>0){
                                                    foreach ($dataKlaimFile->result() as $klaim){
                                                        echo ' <form action="'.base_url().'HR/dokumenReburse" method="post">
                                                        <input type="hidden" name="path" value="assets/foto/claimremburse/'.$klaim->file_bukti_transaksi.'">
                                                        <input type="hidden" name="dokumen" value="'.$klaim->file_bukti_transaksi.'">
                                                        <input type="hidden" name="id_claim_detail_file" value="<?php echo $klaim->id_claim_detail_file ?>">
                                                        <button class="btn btn-blue col-lg-9" type="submit" title="Download">
                                                            <img src="'.base_url().'assets/foto/claimremburse/'.$klaim->file_bukti_transaksi.'" class="img-fluid" height="100px">
                                                        </button>
                                                        
                                                    </form>';   
                                                    }
                                                }else{
                                                    echo "-";
                                                }
                                                
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>         
            <script type="text/javascript">
              function ubah(a,b){
                        var alasan=$('#alasan').val();
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
                                      url: '<?=site_url();?>HR/ubahstsklaim', //calling this function
                                      data:{id:a,sts:b,alasan:alasan},
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

            