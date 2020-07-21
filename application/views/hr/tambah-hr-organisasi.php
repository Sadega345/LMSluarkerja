
            
            
            
             
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3 m-t-20">
                                <p class="fz-14-judul">Parent</p>
                            </div>
                            <div class="col-md-5">
                                <select name="id_parent" class="form-control fcheight" required>
                                    <option value="0">- Jabatan Utama -</option>
                                    <?php foreach ($dataorganisasi->result() as $dt) { ?>
                                        <option value="<?php echo $dt->id_struktur_organisasi; ?>"><?php echo $dt->jabatan ;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3 col-12 m-t-20">
                                <p class="fz-14-judul">Jabatan</p>
                                </div>
                            <div class="col-md-5">
                                <input type="text" name="jabatan" class="form-control fcheight" required>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3 col-12 m-t-20">
                                <p class="fz-14-judul">Nama Pegawai</p>
                                </div>
                            <div class="col-md-5">
                                <input type="text" name="nama_karyawan" class="form-control fcheight" required>
                            </div>
                        </div>
                    </div>

         
                        
         
