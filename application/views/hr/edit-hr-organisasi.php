
            
             
                    <div class="container">
                        <div class="row m-t-10">
                             <input type="hidden" name="id_struktur_organisasi" class="form-control" value="<?php echo $dataorganisasidetail->id_struktur_organisasi ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3 m-t-20">
                                <p class="fz-14-judul">Parent</p>
                            </div>
                            <div class="col-md-5">
                                <select name="id_parent" class="form-control fcheight" required>
                                <option value="0">- Jabatan Utama -</option>
                                <?php foreach ($dataorganisasi->result() as $dt) {
                                    $select = "";
                                    if($dataorganisasidetail->id_parent == $dt->id_struktur_organisasi){
                                        $select = "selected";
                                    }
                                    ?>
                                <option value="<?php echo $dt->id_struktur_organisasi; ?>" <?php echo $select?>><?php echo $dt->jabatan ;?></option>
                                <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3 m-t-20">
                                <p class="fz-14-judul">Jabatan</p>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="jabatan" class="form-control fcheight" required value="<?php echo $dataorganisasidetail->jabatan ?>">
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3 m-t-20">
                                <p class="fz-14-judul">Nama Pegawai</p>
                            </div>
                            <div class="col-md-5">
                               <input type="text" name="nama_karyawan" class="form-control fcheight" required value="<?php echo $dataorganisasidetail->nama_karyawan ?>">
                            </div>
                        </div>
                    </div>



         
                        
         
