
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Kauangan / Payroll Creator</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                                <!-- <div class="col-md-3 col-3 ">
                                    <a href="HRUploadDataPayroll" class="btn btn-darkblue">Approval</a>
                                </div> -->
                                <div class="col-md-12 m-t-10 col-12 text-center" >
                                    <h6 class="tittle-box">Payroll Creator</h6>
                                </div>
                                <div class="col-md-3 col-3 ">
                                </div>
                            </div>
                            <div class="row m-t-10">
                                    <div class="col-md-2 m-t-10">
                                        <label>Bank Payroll </label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <select name="bank" class="form-control">
                                            <option readonly>Pilih Bank</option>
                                            <?php foreach($databank->result() as $row){?>
											<option value="<?php echo $row->id_bank?>"><?php echo $row->deskripsi?></option>
											<?php }?>
                                        </select>
                                    </div>
                                     <div class="col-md-2 m-t-10">
                                        <label>Payroll Bulan </label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <select name="bank" class="form-control">
                                            <option readonly>Juni 2019</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="body">
                            <h6 class="tittle-box">Search Filter</h6>
                        </div>

                    </div>
                </div>
            </div>
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                               <div class="col-md-6 col-6">
                                   <h6 class="tittle-box">Gaji Pegawai</h6>
                               </div> 
                               <div class="col-md-6 col-6" align="right">
                                    <!-- <a href="<?php //echo base_url()?>HR/HRKalkulasiPayroll" class="btn btn-blue col-md-6">Kalkulasi</a> -->
                                    <a href="<?php echo base_url() ?>HR/prosesApprovePayroll" class="btn btn-blue col-md-6">Approval</a>
                               </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
<!--                                            <th>Rekening</th>-->
                                            <th>Perusahaan</th>
                                            <th>Departemen</th>
                                            <th>Jabatan</th>
                                            <th>Bank</th>
                                            <th>Nominal</th>
<!--                                            <th>Keterangan</th>-->
                                          	<th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($datapayroll->result() as $row){?>
										
                                        <tr>                                       
                                            <td><?php echo $row->nik?></td>
                                            <td><?php echo $row->nama?></td>
                                            <td><?php echo $row->perusahaan?></td>
                                            <td><?php echo $row->departemen?></td>
                                            <td><?php echo $row->jabatan?></td>
                                            <td><?php echo $row->bank?></td>
<!--                                            <td><?php //echo $row->rekening?></td>-->
                                            <td>Rp. <?php echo number_format($row->nominal,0,'.','.')?></td>
<!--                                            <td><?php //echo $row->keterangan?></td>-->
                                            <td><?php echo strftime(" %d %B %Y",strtotime($row->tanggal));?></td>
                                            <td>
                                                <a href="<?php echo base_url()?>HR/ViewHRPayrollHistory/<?php echo $row->nik?>" class="btn btn-green1">Lihat</a>
                                                <!-- <a href="<?php //echo base_url()?>HR/ViewHRPayrollHistory/<?php //echo $row->nik?>" class="btn btn-yellow">Edit</a> -->
                                            </td>
                                        </tr>   
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         