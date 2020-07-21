
          
                        <div class="container">
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">judul Pengumuman</p>
                                </div>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="judul" class="form-control fcheight" required>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">Tanggal Mulai</p>
                                </div>
                                <div class="col-md-9 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control tglval fcheight" id="start" data-id="startdate" name="" data-date-format="yyyy-mm-dd" required  autocomplete="off" ">
                                        </div>
                                        
                                        <span class="input-group-addon text-center  m-t-20" style="width: 40px;">s/d</span>
                                        
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control tglval fcheight" id="end" data-id="enddate" name="" data-date-format="yyyy-mm-dd" required  autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="tanggal_mulai" id="startdate">
                                <input type="hidden" name="tanggal_selesai" id="enddate">
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">Isi Pengumuman</p>
                                </div>
                                <div class="col-md-9 col-12">
                                    <textarea class="form-control summernote" name="deskripsi" required></textarea>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">Dokumen</p>
                                </div>
                                <div class="col-md-5 col-12">
                                   <input type="file" name="lampiran" id="dropify-event" data-allowed-file-extensions="jpg jpeg png pdf">
                                </div>
                            </div>
                        </div>
           


         
                        
         