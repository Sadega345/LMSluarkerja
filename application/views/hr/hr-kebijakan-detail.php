                        <div class="row">
                            <div class="col-md-12">
                                 <div class="Rectangle-35">
                                    <div class="container padd-top-20" >
                                        <div class="row">
                                            <div class="col-md-3" >
                                                <p class="fz-14 putih">Jenis Kebijakan</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="fz-14 abuputih"><?php echo $datakebijakandetail->deskripsi_policetype; ?></p>
                                            </div>
                                            <div class="col-md-3" >
                                                <p class="fz-14 putih">Mulai Berlaku</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="fz-14 abuputih"><?php echo strftime(" %d %B %Y",strtotime($datakebijakandetail->tanggal_mulai)); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" >
                                                <p class="fz-14 putih">Nama Kebijakan</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="fz-14 abuputih"><?php echo $datakebijakandetail->judul; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-lg-6 col-md-6">
                                <label class="fz-18">Deskripsi</label>
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <p class="fz-14-judul">Deskripsi Kebijakan</p>
                                    </div>
                                     <div class="col-md-7 ">
                                        <p class="fz-14-isi"><?php echo $datakebijakandetail->deskripsi; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-lg-6 col-md-6">
                                <label class="fz-18">Dokumen</label>
                                <div class="row">
                                    <div class="row">
                                        <?php if($datakebijakandetail->dokumen!=''){?>
                                            <div class="col-md-3">
                                                <img src="<?php echo base_url()?>assets/img/File.svg">      
                                            </div>
                                            <div class="col-md-9">
                                                <form action="<?php echo base_url()?>HR/dokumenKebijakan" method="post">
                                                    <input type="hidden" name="path" value="<?php echo base_url()?>assets/kebijakan/<?php echo $datakebijakandetail->dokumen ?>">
                                                    <input type="hidden" name="dokumen" value="<?php echo $datakebijakandetail->dokumen ?>">
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
                            <div class="col-lg-6 col-md-6">
                                <label class="fz-18">Informasi Tambahan</label>
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <p class="fz-14-judul">Ditambahkan Oleh</p>
                                    </div>
                                     <div class="col-md-7 ">
                                        <p class="fz-14-isi">Admin</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <p class="fz-14-judul">Tanggal</p>
                                    </div>
                                     <div class="col-md-7 ">
                                        <p class="fz-14-isi"><?php echo strftime(" %d %B %Y",strtotime($datakebijakandetail->tanggal_pembuatan)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
