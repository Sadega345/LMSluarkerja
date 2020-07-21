
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Master Jenis User / Form Tambah</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Form Tambah</h6>
                            <form method="post" class="form-tambah">
                                <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Jenis User :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="deskripsi" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Status :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="status" class="form-control">
                                            <option value="0">Aktif</option>
                                            <option value="1">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary tombol-simpan">Simpan</button>
                                        <a href="<?php echo base_url()?>Admin/mstJenisUser"><button type="button" class="btn btn-danger">Batal</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("Admin/mst_Jenis_User/proses_MstJenisUser") ;?>