
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / KPI</h6>
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
                                 <h6 class="tittle-box">Detail Key Performance Index</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesEditKPI" method="post">
                            <div class="row">
                                <div class="col-md-3 col-5 "  align="right">
                                    <label>Jabatan </label>
                                    <input type="hidden" name="id" value="<?php echo $datakpi->id_kpi ?>">
                                </div>
                                <div class="col-md-9 col-7">
                                    <p><?php echo $datakpi->desjabatan; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>Aspek Performance </label>
                                </div>
                                <div class="col-md-9 col-7">
                                    <p><?php echo $datakpi->aspek_performance; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>Nilai Performance </label>
                                </div>
                                <div class="col-md-9 col-7">
                                    <p><?php echo $datakpi->nilai_performance; ?></p>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 " >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <a href="<?php echo base_url()?>HR/HRKPI" class="btn btn-blue1">Kembali</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>  
                    
                </div> 
            </div>


         
                        
         