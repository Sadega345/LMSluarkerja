                    <div class="row m-t-20">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5" >
                                    <p class="fz-14-judul">Judul Pengumuman</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="fz-14-isi"><?php echo $datapengumumanperusahaan->judul ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" >
                                    <p class="fz-14-judul">Tanggal Mulai</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="fz-14-isi"><?php echo $datapengumumanperusahaan->tanggal_mulai ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" >
                                    <p class="fz-14-judul">Tanggal Berakhir</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="fz-14-isi"><?php echo $datapengumumanperusahaan->tanggal_selesai ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" >
                                    <p class="fz-14-judul">Isi Pengumuman</p>
                                </div>
                                <div class="col-md-7">
                                    <p class="fz-14-isi"><?php echo $datapengumumanperusahaan->deskripsi ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <p class="fz-14-judul">Lampiran</p>
                            <div class="row">
                                <?php if($datapengumumanperusahaan->lampiran!=''){?>
                                    <div class="col-md-2">
                                        <img src="<?php echo base_url()?>assets/img/File.svg">      
                                    </div>
                                    <div class="col-md-9">
                                        <form action="<?php echo base_url()?>HR/dokumenCuti" method="post">
                                            <input type="hidden" name="path" value="<?php echo base_url()?>assets/pengumuman/<?php echo $datapengumumanperusahaan->lampiran ?>">
                                            <input type="hidden" name="dokumen" value="<?php echo $datapengumumanperusahaan->lampiran ?>">
                                            <input type="submit" class="btn Rectangle-generate" name="download" value="Download File" >
                                        </form>
                                    </div>
                                <?php } else{ ?>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                        -
                                    </div>
                                    
                                <?php  } ?>

                            </div>
                        </div>
                    </div>
         
                        
         