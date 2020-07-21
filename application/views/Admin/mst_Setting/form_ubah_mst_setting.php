
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Master Setting / Form Ubah</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Form Ubah</h6>
                            <form method="post" class="form-ubah">
                                <input type="hidden" name="id_setting"  value="<?php echo $dataMstSetting->id_setting; ?>">
                                <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Variable :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="variable" class="form-control" required="" value="<?php echo $dataMstSetting->variable; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Value :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="value" class="form-control" required="" value="<?php echo $dataMstSetting->value; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary tombol-ubah">Simpan</button>
                                        <a href="<?php echo base_url()?>Admin/mstSetting"><button type="button" class="btn btn-danger">Batal</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("Admin/mst_Setting/proses_MstSetting") ;?>