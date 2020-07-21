
            
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                     <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Departemen & Divisi</h6>
                </div>
            </div>
        </div>
            
         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                           <h6 class="tittle-box text-center">Departemen & Divisi</h6>
                           <div class="row">
                                <div class="col-md-3 " align="right">
                                    <label>Nama Departemen </label>        
                                </div>
                                <div class="col-md-4" align="left">
                                   <p><?php echo $datadepartemen->deskripsi; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 " align="right">
                                    <label>Nama Divisi </label>        
                                </div>
                                <div class="col-md-4" align="left">
                                    <?php foreach ($datadivisi->result() as $dt) { ?>
                                       - <?php echo $dt->nama_divisi; ?><br>
                                    <?php } ?>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 " align="right"> 
                                </div>
                                <div class="col-md-4" align="left">
                                    <a href="<?php echo base_url() ?>HR/HRDepartemen" class="btn btn-blue1 col-md-4">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


         
                        
         