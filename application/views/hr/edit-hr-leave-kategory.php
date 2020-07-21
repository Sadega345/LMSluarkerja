
            
            
            
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="container">
                        
                        <div class="row">
                            <input type="hidden" name="id" class="form-control" required value="<?php echo $dataleavekategori->id_leave_kategori ?>">
                            <div class="col-md-3 col-12  m-t-10">
                                <label class="float-right hidden-sm">Nama Cuti  </label>
                                <label class="d-sm-none">Nama Cuti </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="deskripsi" class="form-control" required value="<?php echo $dataleavekategori->deskripsi ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Kategori Cuti</label>
                                <label class="d-sm-none">Kategori Cuti</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" id="a" name="status">
                                    <option value="0" <?php echo $dataleavekategori->status=='0'?'selected':'' ?>>Pribadi</option>
                                    <option value="1" <?php echo $dataleavekategori->status=='1'?'selected':'' ?>>Khusus</option>
                                     <option value="2" <?php echo $dataleavekategori->status=='2'?'selected':'' ?>>Izin</option>

                                </select>
                            </div>
                        </div>
                        <div id="test">
                            <div class="row">
                               <div class="col-md-3 col-12  m-t-10">
                                    <label class="float-right hidden-sm">Jumlah Cuti  </label>
                                    <label class="d-sm-none">Jumlah Cuti </label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="jumlah_hari" class="form-control" required value="<?php echo $dataleavekategori->jumlah_hari ?>">
                                </div>
                                <div class="col-md-2">
                                    Hari
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>


         
                        
         