
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>  Directorys / Pelatihan / Detail</h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                                <?php 
                                    if($datapelatihandetail->status_lulus=='0'){
                                        echo '  <label class="btn btn-orange2">Proses</label>';
                                    }else if($datapelatihandetail->status_lulus=='1'){
                                        echo '  <label class="btn btn-red2">Tidak Lulus</label>';
                                    }else if($datapelatihandetail->status_lulus=='2'){
                                        echo '  <label class="btn btn-green2">Lulus</label>';
                                    }
                                 ?>
                                
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                <h6 class="tittle-box">Detail Pelatihan</h6>
                            </div>
                            <div class="col-md-2 col-4">
                                <a href="<?php echo base_url()?>HR/HRPelatihan" class="btn btn-blue">Kembali</a>
                            </div>
                        </div>
                        <div class="container">
                            <h6 class="tittle-box">Informasi Pelatihan</h6>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Nama Program Pelatihan</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo $datapelatihandetail->nama_program; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Lokasi Pelatihan</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo $datapelatihandetail->lokasi; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Departemen</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo $datapelatihandetail->desdepartemen; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Tanggal Mulai</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo strftime(" %d %B %Y",strtotime($datapelatihandetail->tanggal_mulai)); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Tanggal Akhir</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo strftime(" %d %B %Y",strtotime($datapelatihandetail->tanggal_selesai)); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Keterangan</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo $datapelatihandetail->deskripsi; ?></p>
                                </div>
                            </div>

                            <h6 class="tittle-box">Informasi Peserta</h6>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Nama Peserta</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo $datapelatihandetail->nama_lengkap; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Jabatan</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo $datapelatihandetail->desjabatan; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Tanggal Mengambil</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo strftime(" %d %B %Y",strtotime($datapelatihandetail->tanggal_mengambil)); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Tanggal Keputusan</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <p><?php echo $datapelatihandetail->tanggal_keputusan==''?'-':(strftime(" %d %B %Y",strtotime($datapelatihandetail->tanggal_keputusan))); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <label>Alasan</label>
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <textarea class="form-control summernote" id="alasan" rows="5"><?php echo $datapelatihandetail->alasan; ?></textarea>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-5" align="right">
                                </div>
                                <div class="col-md-9 col-7" align="left">
                                    <?php 
                                        if($datapelatihandetail->status_lulus=='0'){
                                            echo '  <a href="javascript:;" onclick="ubah('.$datapelatihandetail->id_detail_training_jadwal.',2)" class="btn btn-green1" title=" Lulus">  Lulus</a>
                                                <a href="javascript:;" onclick="ubah('.$datapelatihandetail->id_detail_training_jadwal.',1)" class="btn btn-red1" title="Tidak Lulus"> Tidak Lulus</a>';
                                        }else if($datapelatihandetail->status_lulus=='1'){
                                            echo ' <a href="javascript:;" onclick="ubah('.$datapelatihandetail->id_detail_training_jadwal.',2)" class="btn btn-green1" title=" Lulus">  Lulus</a>';
                                        }else if($datapelatihandetail->status_lulus=='2'){
                                            echo '<a href="javascript:;" onclick="ubah('.$datapelatihandetail->id_detail_training_jadwal.',1)" class="btn btn-red1" title="Tidak Lulus"> Tidak Lulus</a> ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <br>
                           
                        </div>
                    </div> 
                </div>
            </div>
            <script type="text/javascript">
              function ubah(a,b){
                        var alasan=$('#alasan').val();
                      bootbox.confirm("Anda yakin merubah data ini!", function(result){  
                        if(result){

                        $.ajax({
                                  url: '<?=site_url();?>HR/ubahstslulus', //calling this function
                                  data:{id:a,sts:b,alasan:alasan},
                                  type:'POST',
                                  cache: false,

                              success: function(data) {
                                  // alert("success");
                                   location.reload();
                                }
                              });
                          }
                            console.log('This was logged in the callback: ' + result);
                        })
                      }
            </script>
           

            