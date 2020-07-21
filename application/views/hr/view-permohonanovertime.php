
          
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

                            <div class="row">
                              <div class="col-md-2" >
                              </div>
                              <div class="col-md-3" >
                                  <p class="fz-14-judul">Total Lembur</p>
                              </div>
                              <div class="col-md-7" >
                                  <p class="fz-14-isi"><?php echo $dataOvertimeRow->total_menit ?> Menit</p>
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

                            <?php if($dataOvertimeRow->status=='0'){  ?>
                              <div class="row m-t-20">
                                <div class="col-lg-12 col-md-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="container">
                                        <label class="fz-18">Alasan</label>
                                            <div class="row">
                                                <div class="col-md-2 ">
                                                    <p class="fz-14-judul">Alasan</p>
                                                </div>
                                                <div class="col-md-6 ">
                                                  <textarea  class="form-control" rows="4" id="alasan"><?php echo $dataOvertimeRow->alasan; ?></textarea>
                                                </div>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row m-t-20">
                                <div class="col-lg-12 col-md-12">
                                  <div class="row">
                                    <div class="col-md-6 col-9" align="right">
                                        <a href="javascript:;" onclick="ubah('<?php echo $dataOvertimeRow->id_overtime?>','1')" class="btn Rectangle-simpan">Terima</a>
                                        <a href="javascript:;" onclick="ubah('<?php echo $dataOvertimeRow->id_overtime?>','2')" class="btn Rectangle-tutup">Tolak</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }elseif($dataOvertimeRow->status=='1'){ ?>
                                <div class="row m-t-20">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="container">
                                          <label class="fz-18">Alasan</label>
                                              <div class="row">
                                                  <div class="col-md-2 ">
                                                      <p class="fz-14-judul">Alasan</p>
                                                  </div>
                                                  <div class="col-md-6 ">
                                                    <textarea  class="form-control" rows="4" id="alasan"><?php echo $dataOvertimeRow->alasan; ?></textarea>
                                                  </div>
                                              </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row m-t-20">
                                  <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                      <div class="col-md-4 col-9" align="right">
                                          
                                          <a href="javascript:;" onclick="ubah('<?php echo $dataOvertimeRow->id_overtime?>','2')" class="btn Rectangle-tutup">Batalkan</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php } ?>

<script type="text/javascript">
  function ubah(a,b){
      var alasan=$('#alasan').val();
      $.ajax({
        url: '<?=site_url();?>HR/ubahstsovertime', //calling this function
        data:{id:a,sts:b,alasan:alasan},
        type:'POST',
        cache: false,

    success: function(data) {
         alert("success");
         location.reload();
      }
    });
  }
</script>            
