
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12" >
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Detail Rembursement</h6>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="color-text-gray">Name </label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	: <label class="underline"><?php echo $dataViewRemburse->nama_lengkap ?></label>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="color-text-gray">Date </label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	: <label class="underline"><?php echo $dataViewRemburse->tanggal ?></label>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="color-text-gray">Jumlah </label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	: <label class="underline">Rp. <?php echo number_format($dataViewRemburse->total,0,'.','.') ?></label>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="color-text-gray">Type </label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	: <label class="underline"><?php echo $dataViewRemburse->desBenefit ?></label>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="color-text-gray">Deskripsi </label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	: <label class="underline"><?php echo $dataViewRemburse->deskripsi ?></label>
                                    </div>
                                </div>                 
                            </div>
                           <!--  <div class="row">
                               <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php 
                                       if($dataViewClaimRemburse->status==0){
                                            echo'<button type="button" class="btn btn-warning">Pengajuan</button>';
                                        }if ($dataViewClaimRemburse->status==1) {
                                            echo'<button type="button" class="btn btn-success">Diterima</button>';
                                        }if ($dataViewClaimRemburse->status==2) {
                                            echo'<button type="button" class="btn btn-danger">Ditolak</button>';
                                        }if ($dataViewClaimRemburse->status=3) {
                                            echo'<button type="button" class="btn btn-primary">Sudah Cair</button>';
                                        }  ?>
                                    </div>
                                </div>                 
                            </div> -->
                           
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a href="<?php echo base_url()?>Employee/benefitInformation" class="btn btn-blue">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
         