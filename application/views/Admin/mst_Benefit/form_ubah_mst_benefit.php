
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Master Benefit / Form Ubah</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Form Ubah</h6>
                            <form method="post" class="form-ubah">
                                <input type="hidden" name="id_benefit"  value="<?php echo $dataMstBenefit->id_benefit; ?>">
                                <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Jenis</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="jenis" class="form-control">
                                            <option value="Remburse" <?php echo $dataMstBenefit->jenis=='Remburse'?'selected':''; ?> >Remburse</option>
                                            <option value="Asuransi" <?php echo $dataMstBenefit->jenis=='Asuransi'?'selected':''; ?>>Asuransi</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Deskripsi</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="deskripsi" class="form-control" required="" value="<?php echo $dataMstBenefit->deskripsi; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary tombol-ubah">Simpan</button>
                                        <a href="<?php echo base_url()?>Admin/mstBenefit"><button type="button" class="btn btn-danger">Batal</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("Admin/mst_Benefit/proses_MstBenefit") ;?>