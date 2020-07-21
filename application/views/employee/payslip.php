
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu"> Gaji / Slip Gaji</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view">
                     <div class="card ">
                         <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Slip Gaji</h5>
                               </div>
                           </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Slip ID</th>
                                            <th>Nama</th>
                                            <th>Klien</th>
                                            <th>Departemen</th>
                                            <th>Jabatan</th>
                                            <!-- <th>Tanggal</th> -->
                                            <th>Gaji</th>
                                            <th>Bulan </th>
                                            <!-- <th>Status</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no=1; 
                                    		foreach ($dataPayslip as $dataPayslip) { ?>
	                                        <tr>
	                                            <td><?php echo $no++; ?></td>
	                                            <td><?php echo $dataPayslip->nama." ".$dataPayslip->bulan; ?></td>
                                                <td><?php echo $dataPayslip->perusahaan; ?></td>
                                                <td><?php echo $dataPayslip->departemen; ?></td>
	                                            <td><?php echo $dataPayslip->jabatan==''?'-':$dataPayslip->jabatan; ?></td>
	                                            <!-- <td><?php //echo strftime(" %d %B %Y",strtotime($dataPayslip->tanggal)); ?></td> -->
	                                            <td>Rp. <?php echo number_format($dataPayslip->disetorkan,3,',','.'); ?></td>
	                                            <!-- <td><?php 
	                                            	/*if($dataPayslip->status==0){
	                                            		echo'<label class="btn btn-orange2">Pending</label>';
	                                            	}if ($dataPayslip->status==1) {
	                                            		echo'<label class="btn btn-green2">Success</label>';
	                                            	}if ($dataPayslip->status==2) {
	                                            		echo'<label class="btn btn-red2">Decline</label>';
	                                            	}*/ ?>
	                                            </td> -->
                                                <td>
                                                    <?php
                                                        if($dataPayslip->bulan==1){
                                                            echo "Januari";
                                                        }if($dataPayslip->bulan==2){
                                                            echo "Februari";
                                                        }if($dataPayslip->bulan==3){
                                                            echo "Maret";
                                                        }if($dataPayslip->bulan==4){
                                                            echo "April";
                                                        }if($dataPayslip->bulan==5){
                                                            echo "Mei";
                                                        }if($dataPayslip->bulan==6){
                                                            echo "Juni";
                                                        }if($dataPayslip->bulan==7){
                                                            echo "Juli";
                                                        }if($dataPayslip->bulan==8){
                                                            echo "Agustus";
                                                        }if($dataPayslip->bulan==9){
                                                            echo "September";
                                                        }if($dataPayslip->bulan==10){
                                                            echo "Oktober";
                                                        }if($dataPayslip->bulan==11){
                                                            echo "November";
                                                        }if($dataPayslip->bulan==12){
                                                            echo "Desember";
                                                        }
                                                        ?>&nbsp;<?php echo $dataPayslip->tahun; ?>
                                                </td>
	                                            <td><a href="javascript:;" onclick="viewPayslip('<?php echo $dataPayslip->nik; ?>','<?php echo $dataPayslip->bulan; ?>','<?php echo $dataPayslip->tahun; ?>')"  class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">Lihat</td>
	                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function viewPayslip(nik,bulan,tahun){
                    $.post( "<?php echo base_url()?>Employee/viewPayslip", { nik: nik,bulan: bulan,tahun: tahun })
                      .done(function( data ) {
                        $( ".view").html(data);
                      });
                }
                
            </script>
         