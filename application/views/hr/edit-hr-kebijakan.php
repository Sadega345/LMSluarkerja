             <?php  
                $a=explode("-", $datakebijakandetail->tanggal_mulai); 
                //$b=explode("-", $datakebijakandetail->tanggal_selesai); 
                $tgl_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                //$tgl_selesai=$b[2].'/'.$b[1].'/'.$b[0]; 
            ?>
            <div class="container">
                
                    <div class="row m-t-10">
                        <div class="col-md-2">
                        </div>
                         <input type="hidden" name="id" class="form-control" value="<?php echo $datakebijakandetail->id_kebijakan ?>">
                        <div class="col-md-3 m-t-20" >
                            <p class="fz-14-judul">Judul Kebijakan</p>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="judul" class="form-control fcheight" value="<?php echo $datakebijakandetail->judul ?>" required>
                        </div>
                    </div>
                     <div class="row m-t-10">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3  m-t-20" >
                            <p class="fz-14-judul">Tipe Kebijakan</p>       
                        </div>
                         <div class="col-md-5" >
                            <select name="id_policetype" class="form-control  select2me fcheight" data-placeholder="Pilih Kebijakan" tabindex="2" required>
                                    <option value="">--Pilih Kebijakan--</option>
                            <?php
                                foreach($datatipekebijakan->result() as $dt){ ?>
                                    <option value="<?php echo $dt->id_policetype;?>" <?php echo $datakebijakandetail->id_policetype == $dt->id_policetype?'selected':''; ?>><?php echo $dt->deskripsi;?></option>
                            <?php
                                }
                            ?>  
                            </select>
                        </div>
                    </div>
                    
                     <div class="row m-t-10">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3  m-t-20" >
                            <p class="fz-14-judul">Berlaku</p>
                        </div>
                        <div class="col-md-5" >
                            <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <div class="input-group mb-3" style="display: contents;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <input type="text" class="input-sm form-control tglval fcheight" id="datepicker3" name="" data-id="startdate" data-date-format="yyyy-mm-dd" required autocomplete="off" value="<?php echo $tgl_mulai ?>" >
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="tanggal_mulai" id="startdate" value="<?php echo $datakebijakandetail->tanggal_mulai ?>">
                   
                    <div class="row m-t-10">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3  m-t-20" >
                            <p class="fz-14-judul">Deskripsi</p>
                        </div>
                        <div class="col-md-5">
                            <textarea class="form-control fcheight" name="deskripsi" required><?php echo $datakebijakandetail->deskripsi ?></textarea>
                        </div>
                    </div>
                    <div class="row  m-t-10">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3 m-t-20" >
                             <p class="fz-14-judul">Dokumen</p>
                        </div>
                        <div class="col-md-5 col-12">
                           <input type="file" name="dokumen" class="form-control"  id="dropify-event" data-max-file-size="2M" data-allowed-file-extensions="jpg jpeg png pdf">
                        </div>
            </div>

         
                        
         