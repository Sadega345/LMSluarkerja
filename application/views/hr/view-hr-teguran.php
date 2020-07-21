
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / SP</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                 <h6 class="tittle-box">View SP</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-5 "  align="right">
                                    <label>NIK</label>
                                </div>
                                <div class="col-md-4 col-7">
                                   <p> <?php echo $datateguran->nik  ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 "  align="right">
                                    <label>Nama Pegawai</label>
                                </div>
                                <div class="col-md-4 col-7">
                                   <p> <?php echo $datateguran->nama_lengkap  ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 "  align="right">
                                    <label>Status Teguran </label>
                                </div>
                                <div class="col-md-4 col-7">
                                    <p>
                                        <?php 
                                            if($datateguran->status_teguran=='1'){
                                                echo "SP1";
                                            }else if($datateguran->status_teguran=='2'){
                                                echo "SP2";
                                            }else if($datateguran->status_teguran=='3'){
                                                echo "SP3";   
                                            }
                                        ?>    
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 "  align="right">
                                    <label>Alasan </label>
                                </div>
                                <div class="col-md-9 col-7">
                                    <p><?php echo $datateguran->alasan; ?></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3 " >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <a href="<?php echo base_url()?>HR/HRTeguran" class="btn btn-blue1">Kembali</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>  
                    
                </div> 
            </div>


         
                        
         