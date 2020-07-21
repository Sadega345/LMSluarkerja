            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Informasi Kepegawaian / SP </h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">SP</h6>
                <div class="table-responsive">
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tanggal Peneguran</th>
                                <th>Masa Berlaku</th>
                                <th>Status Peneguran</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dataTeguran->result() as $dt ) { ?>
                            <tr>
                                <td><?php echo strftime("%A, %d %B %Y",strtotime($dt->tanggal_create)); ?></td>
                                <td><?php echo strftime(" %d %B %Y",strtotime($dt->berlaku_mulai)); ?> &nbsp;s/d <?php echo strftime("%d %B %Y",strtotime($dt->berlaku_sampai)); ?></td>
                                <td>
                                    <?php 
                                        if($dt->status_teguran=='1'){
                                            echo "SP1";
                                        }else if($dt->status_teguran=='2'){
                                            echo "SP2";
                                        }else if($dt->status_teguran=='3'){
                                            echo "SP3";
                                        } 
                                    ?>
                                </td>
                                <td><?php echo $dt->alasan; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>