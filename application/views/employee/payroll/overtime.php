
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Payroll / Overtime</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <div class="header">
                                <h6 class="tittle-box">Overtime</h6>
                                <ul class="header-dropdown">
                                    <li><a href="<?php echo base_url()?>Employee/tambahOvertime"class="btn btn-blue"> Ajukan Lembur</a></li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Tujuan Lembur (Task)</th>
                                            <th>Lama Jam Lembur</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach ($dataOvertime as $dataOvertime) { ?>
                                                
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $dataOvertime->nama_lengkap?></td>
                                            <td><?php echo $dataOvertime->tanggal?></td>
                                            <td><?php echo $dataOvertime->title?></td>
                                            <td><?php echo $dataOvertime->keterangan?></td>
                                            <td><?php echo $dataOvertime->jumlah_jam_lembur?> Jam</td>
                                            <td>Rp. <?php echo number_format($dataOvertime->lembur,0,'.','.')?></td>
                                            <td> <?php 
                                                    if($dataOvertime->status==0){
                                                        echo'Pending';
                                                    }if ($dataOvertime->status==1) {
                                                        echo'Approve';
                                                    }if ($dataOvertime->status==2) {
                                                        echo'Ditolak';
                                                    }?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($dataOvertime->status==0){
                                                        echo'<a href="javascript:;" onclick="hapusOvertime('.$dataOvertime->id_karyawan_lembur.')" class="btn btn-danger">Delete</a>';
                                                    }else{
                                                        echo '<a href="javascript:;" onclick=""><i class="icon-eye"></i></a>';
                                                    } 
                                                ?>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("employee/payroll/proses_overtime") ;?>
         