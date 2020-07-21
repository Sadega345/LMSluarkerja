                        <div class="container">
                            <input type="hidden" name="id" value="<?php echo $databerita->id_berita ?>">
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">Judul Berita</p>
                                </div>
                                <div class="col-md-5 col-12">
                                    <input type="text" name="judul" class="form-control fcheight" value="<?php echo $databerita->judul ?>" required>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">Cover Berita</p>
                                </div>
                                <div class="col-md-5 col-12">
                                    <input type="file" name="image" class="form-control" id="dropify-event" data-allowed-file-extensions="jpeg jpg png">
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">Lokasi</p>
                                </div>
                                <div class="col-md-5 col-12">
                                    <input type="text" name="location" class="form-control fcheight" value="<?php echo $databerita->location ?>" required>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <p class="fz-14-judul">Isi Berita</p>
                                </div>
                                <div class="col-md-9 col-12">
                                    <textarea class="form-control summernote" name="deskripsi" required><?php echo $databerita->deskripsi ?></textarea>
                                </div>
                            </div>
                        </div>


         
                        
         