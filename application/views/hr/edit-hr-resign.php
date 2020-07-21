
                        <div class="container">
                            <div class="row">
                                <input type="hidden" name="nik" value="<?php echo  $datakontrak->nik; ?>">
                                <input type="hidden" name="id" value="<?php echo  $datakontrak->id_kontrak; ?>">
                                <div class="col-md-3 col-5"  >
                                    <P class="fz-14-judul">NIK</P>
                                </div>
                                <div class="col-md-4 col-7">
                                   <p class="fz-14-isi"><?php echo  $datakontrak->nik; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5"   >
                                    <P class="fz-14-judul">Nama Pegawai</P>
                                </div>
                                <div class="col-md-4 col-7">
                                   <p class="fz-14-isi"><?php echo  $datakontrak->nama_lengkap; ?></p>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-3 col-5 "  >
                                    <P class="fz-14-judul">Departemen</P>
                                </div>
                                <div class="col-md-4 col-7">
                                    <p class="fz-14-isi"><?php echo  $datakontrak->des_departemen; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5"  >
                                    <P class="fz-14-judul">Jabatan </P>
                                </div>
                                <div class="col-md-4 col-7">
                                    <p class="fz-14-isi"><?php echo  $datakontrak->jenis_project; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 m-t-20"  >
                                    <P class="fz-14-judul">Status Pegawai</P>
                                </div>
                                <div class="col-md-4 col-7">
                                    <select name="status_karyawan" class="form-control select2 fcheight">
                                        <option value="1" <?php echo $datakontrak->status_karyawan=='1'?"selected":""; ?>>Permanent</option>
                                        <option value="2" <?php echo $datakontrak->status_karyawan=='2'?"selected":""; ?>>Contract</option>
                                        <option value="3" <?php echo $datakontrak->status_karyawan=='3'?"selected":""; ?> >Probation</option>
                                        <option value="4" <?php echo $datakontrak->status_karyawan=='4'?"selected":""; ?> >PKWTT</option>
                                        <option value="5" <?php echo $datakontrak->status_karyawan=='5'?"selected":""; ?>>Resign</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-5 m-t-20"  >
                                    <P class="fz-14-judul">Tanggal Berakhir</P>
                                </div>
                                <div class="col-md-4 col-7">
                                    <input type="text" class="form-control  fcheight tglval" id="datepicker3"  data-id="datepicker" required value=" <?php echo  $datakontrak->tanggal_keluar=='0000-00-00'?'':$datakontrak->tanggal_keluar; ?>" autocomplete="off" >  
                                    <input type="hidden" id="datepicker" name="tanggal_keluar" value="<?php echo $datakontrak->tanggal_keluar; ?>">  
                                </div>
                            </div>

                    </div>

         
                        
         