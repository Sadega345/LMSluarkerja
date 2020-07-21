
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Master Review Aspek / Form Ubah</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Form Ubah</h6>
                            <form method="post" class="form-ubah">
                                <input type="hidden" name="id_review_aspek"  value="<?php echo $dataMstReviewAspek->id_review_aspek; ?>">
                                <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Judul :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="judul" class="form-control" required="" value="<?php echo $dataMstReviewAspek->judul; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2" align="right">
                                        <label>Deskripsi :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="deskripsi" class="form-control" required="" value="<?php echo $dataMstReviewAspek->deskripsi; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary tombol-ubah">Simpan</button>
                                        <a href="<?php echo base_url()?>Admin/mstReviewAspek"><button type="button" class="btn btn-danger">Batal</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("Admin/mst_Review_Aspek/proses_MstReviewAspek") ;?>