
           
            
                    <input type="hidden" name="id_karyawan_gaji_lainnya" value="<?php echo  $dataEditTunjangan->id_karyawan_gaji_lainnya; ?>">
                    <input type="hidden" name="id_jenis_tunjangan" value="<?php echo  $dataEditTunjangan->id_jenis_tunjangan; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="Rectangle-35">
                                <div class="container padd-top-20" >
                                    <div class="row">
                                        <div class="col-md-3" >
                                            <p class="fz-14 putih">NIK</p>
                                        </div>
                                        <div class="col-md-3 ">
                                           <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->nik; ?></p>
                                        </div>
                                        <div class="col-md-3" >
                                            <p class="fz-14 putih">Departemen</p>
                                        </div>
                                        <div class="col-md-3 ">
                                           <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->des_departemen; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="fz-14 putih">Nama Pegawai</p>
                                        </div>
                                        <div class="col-md-3">
                                           <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->nama_lengkap; ?></p>
                                        </div>
                                        <div class="col-md-3" >
                                            <p class="fz-14 putih">Jabatan</p>
                                        </div>
                                        <div class="col-md-3 ">
                                           <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->des_jabatan; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-lg-3 m-t-20 ">
                            <p class="fz-14-judul">Besaran Tunjangan</p>
                        </div>
                        <div class="col-lg-6" >
                            <p class="fz-14-isi"><input type="text" class="form-control fcheight" name="nilai" value="<?php echo  $dataEditTunjangan->nilai; ?>">  </p>
                        </div>
                    </div>
                       
                           


         
                        
         