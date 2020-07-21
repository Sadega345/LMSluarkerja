            <?php  
                $a=explode("-", $datapengumumanperusahaan->tanggal_mulai); 
                $b=explode("-", $datapengumumanperusahaan->tanggal_selesai); 
                $tgl_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                $tgl_selesai=$b[2].'/'.$b[1].'/'.$b[0]; 
            ?>
            <input type="hidden" name="id" value="<?php echo $datapengumumanperusahaan->id_pengumuman_perusahaan ?>">
            <div class="row m-t-10">
                <div class="col-md-3 m-t-20 " >
                    <p class="fz-14-judul">Judul Pengumuman</p>
                </div>
                <div class="col-md-9 ">
                    <input type="text" name="judul" class="form-control fcheight" value="<?php echo $datapengumumanperusahaan->judul ?>" required>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-3 m-t-20 " >
                    <p class="fz-14-judul">Tanggal Mulai</p>
                </div>
                <div class="col-md-9 col-12" >
                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        <div class="input-group mb-3" style="display: contents;">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                            </div>
                            <input type="text" class="input-sm form-control tglval fcheight" id="start" name="" data-id="startdate" data-date-format="yyyy-mm-dd" required autocomplete="off" value="<?php echo $tgl_mulai ?>">
                        </div>
                        
                        <span class="input-group-addon text-center m-t-20" style="width: 40px;">-</span>
                        
                        <div class="input-group mb-3" style="display: contents;">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                            </div>
                            <input type="text" class="input-sm form-control tglval fcheight" id="end" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" data-id="enddate" value="<?php echo $tgl_selesai?>">
                        </div>
                    </div>
                    <input type="hidden" name="tanggal_mulai" id="startdate" value="<?php echo $datapengumumanperusahaan->tanggal_mulai ?>">
                    <input type="hidden" name="tanggal_selesai" id="enddate" value="<?php echo $datapengumumanperusahaan->tanggal_selesai ?>">
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-3 m-t-20 " >
                    <p class="fz-14-judul">Isi Pengumuman</p>
                </div>
                <div class="col-md-9 ">
                    <textarea class="form-control summernote" name="deskripsi" required><?php echo $datapengumumanperusahaan->deskripsi; ?></textarea>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-3 m-t-20 " >
                    <p class="fz-14-judul">Dokumen</p>
                </div>
                <div class="col-md-5 ">
                    <input type="file" name="lampiran" id="dropify-event" data-allowed-file-extensions="jpg jpeg png pdf">
                </div>
            </div>