
            
                            
                            
                            <div class="row m-t-10">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3 col-5" >
                                    <p class="fz-14-judul">NIK </p>    
                                </div>  
                                <div class="col-md-3 col-7">
                                    <p class="fz-14-isi"><?php echo $dataHRUserRow->nik ?></p>
                                </div>                 
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3 col-5" >
                                    <p class="fz-14-judul">Nama Lengkap </p>
                                </div>  
                                <div class="col-md-3 col-7">
                                    <p class="fz-14-isi"><?php echo $dataHRUserRow->nama_lengkap ?></p>
                                </div>                 
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3 col-5" >
                                    <p class="fz-14-judul">Jabatan </p>
                                </div>  
                                <div class="col-md-3 col-7">
                                    <p class="fz-14-isi"><?php echo $dataHRUserRow->jabatan; ?></p>
                                </div>                 
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3 col-5" >
                                    <p class="fz-14-judul">Username </p>
                                </div>  
                                <div class="col-md-3 col-7">
                                    <p class="fz-14-isi"><?php echo $dataHRUserRow->username; ?></p>
                                </div>                 
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3 col-5" >
                                    <p class="fz-14-judul">Jenis User </p>
                                </div>  
                                <?php if ($dataHRUserRow->id_jenis_user == '3'){ ?>
                                    <div class="col-md-3 col-7">
                                        <p class="fz-14-isi">HR</p>
                                    </div> 
                                <?php }else{ ?>
                                    <div class="col-md-3 col-7">
                                        <p class="fz-14-isi">Project Order</p>
                                    </div>        
                                <?php } ?>
                            </div>   