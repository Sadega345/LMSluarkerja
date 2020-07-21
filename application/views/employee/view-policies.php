
            
           
                            <div class="row m-t-10">
                                <div class="col-md-3 col-5" align="right">
                                    <p class="fz-14-judul">Judul Kebijakan </p> 
                                </div>  
                                <div class="col-md-3 col-7" align="left">
                                    <p class="fz-14-judul"><?php echo $dataViewPolicies->judul ?></p>
                                </div>                 
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                    <p class="fz-14-judul">Jenis Kebijakan</p>
                                </div>  
                                <div class="col-md-3 col-7" align="left">
                                    <p class="fz-14-isi"><?php echo $dataViewPolicies->desPolicetype ?></p>
                                </div>                 
                            </div>

                            <label class="fz-14">Kebijakan Berlaku</label>
                            <div class="row">
                                <div class="col-md-3 col-5" align="right">
                                   <p class="fz-14-judul">Berlaku </p>
                                </div>  
                                <div class="col-md-3 col-7" align="left">
                                    <p class="fz-14-isi"><?php echo strftime(" %d %B %Y",strtotime($dataViewPolicies->tanggal_mulai)); ?></p>
                                </div>                 
                            </div>

                            <label class="fz-14">Deskripsi</label>
                            <div class="row">
                                <div class="col-md-1">
                                    
                                </div>
                                <div class="col-md-6">
                                    <p class="fz-14-isi"><?php echo $dataViewPolicies->deskripsi ?></p>
                                </div>                 
                            </div>

                            <label class="fz-14">Dokumen</label>
                            <div class="row">
                                <div class="col-md-1 col-5" align="right">
                                </div>
                                <div class="col-md-3 col-7" align="left">
                                    <?php  
                                        if($dataViewPolicies->dokumen==''){
                                            echo '-';
                                        }else{
                                            echo ' <form action="'.base_url().'HR/dokumenKebijakan" method="post">
                                        <input type="hidden" name="path" value="assets/kebijakan/'.$dataViewPolicies->dokumen.'">
                                        <input type="hidden" name="dokumen" value="'.$dataViewPolicies->dokumen.'">
                                        <input type="submit" class="btn btn-blue " name="download" value="Download">
                                    </form>';
                                        }
                                    ?>
                                    
                                </div>
                            </div>

                            <label class="fz-14">Informasi Tambahan</label>
                            <div class="row">
                               <div class="col-md-3 col-5" align="right">
                                    <p class="fz-14-judul">Ditambahkan Oleh </p> 
                                </div>  
                                <div class="col-md-3 col-7" align="left">
                                    <p class="fz-14-isi"><?php echo $dataViewPolicies->nama_pembuat ?></p>
                                </div>                 
                            </div>

                            <div class="row">
                               <div class="col-md-3 col-5" align="right">
                                    <p class="fz-14-judul">Tanggal </p>   
                                </div>  
                                <div class="col-md-3 col-7" align="left">
                                    <p class="fz-14-isi"><?php echo strftime(" %d %B %Y",strtotime($dataViewPolicies->tanggal_pembuatan)); ?></p>
                                </div>                 
                            </div>