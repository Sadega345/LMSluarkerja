            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Informasi Kepegawaian / KPI </h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h6 class="tittle-box" align="center">Key Performance Indicators</h6>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-12" align="left">

                                    <div class="row">
                                        <div class="col-md-1 col-6">
                                            <label>Jabatan</label>
                                        </div>
                                        <div class="col-md-11 col-6">
                                            <?php if ($dataKPIrows > 0){ ?>
                                                <?php echo $dataKPI->deskripsi; ?>
                                            <?php }else{ ?>
                                                <?php echo "-" ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                   
                                    <label class="tittle-box m-t-10">Aspek Performance</label>
                                    <div class="row">
                                        <div class="col-md-11 col-12" >
                                           <?php if ($dataKPIrows > 0){ ?>
                                                <?php echo $dataKPI->aspek_performance; ?>
                                            <?php }else{ ?>
                                                <?php echo "-" ?>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>

                                    <label class="tittle-box">Nilai Performance</label>
                                    <div class="row">
                                        <div class="col-md-11 col-12" >
                                            <?php if ($dataKPIrows > 0){ ?>
                                                <?php echo $dataKPI->nilai_performance; ?>
                                            <?php }else{ ?>
                                                <?php echo "-" ?>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>