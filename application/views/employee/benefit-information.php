
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Tunjangan / Informasi Tunjangan</h6>
                    </div>
                </div>
            </div>
            <div class="view">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box text-center">Informasi Tunjangan <?php echo $dataKaryawanRow->nama_lengkap; ?></h6>
                            <div class="row">
                                <div class="col-lg-2" >
                                    <label>Total tunjangan </label>    
                                </div>
                                <div class="col-lg-6" align="left">
                                    <?php $Total=0;
                                        foreach ($dataKaryawanGaji->result() as $dtTOT) { 
                                            $Total=$Total+$dtTOT->nilai;?>
                                    <?php } ?>
                                    : Rp. <?php echo number_format($Total,0,'.','.'); ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nama Tunjangan</th>
                                            <th>Besar Tunjangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataKaryawanGaji->result() as $dt) { ?>
                                            <tr>
                                                <td><?php echo $dt->nama_lengkap; ?></td>
                                                <td><?php echo $dt->jenis_tunjangan; ?></td>
                                                <td>Rp. <?php echo number_format($dt->nilai,0,'.','.'); ?></td>
                                            </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>