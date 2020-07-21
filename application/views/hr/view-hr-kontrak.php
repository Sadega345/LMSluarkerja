
            
            <!-- <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Kontrak</h6>
                    </div>
                </div>
            </div> -->
            
             <div class="row clearfix ">
                 <div class="col-lg-12 col-md-12">
                    <!-- <div class="card"> -->
                        <!-- <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                 <h6 class="tittle-box">Kontrak</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div> -->
                    <!-- <div class="container"> -->
                            <div class="row">
                                <input type="hidden" name="nik" value="<?php echo  $datakontrak->nik; ?>">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6" >
                                            <p class="fz-14-judul">NIK</p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                           <p class="fz-14-isi"><?php echo  $datakontrak->nik; ?></p>
                                        </div>
                                    </div>
                                    
                                </div>

                                <!-- Jabatan -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6" >
                                            <p class="fz-14-judul">Jabatan </p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-isi"><?php echo  $datakontrak->jenis_project; ?></p>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-judul">Nama Pegawai</p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                           <p class="fz-14-isi"><?php echo  $datakontrak->nama_lengkap; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status pegawai -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-judul">Status Pegawai</p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-isi">
                                            <?php 
                                                echo $datakontrak->status_pegawai;
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-judul">Departemen</p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-isi"><?php echo  $datakontrak->des_departemen; ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Tanggal Berakhir -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-judul">Tanggal Berakhir</p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <p class="fz-14-isi"><?php echo $datakontrak->tanggal_keluar=="0000-00-00"?'-':strftime(" %d %B %Y",strtotime($datakontrak->tanggal_keluar)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <!-- </div> -->
                <!-- </div> -->
                    
                </div> 
            </div>


         
                        
         