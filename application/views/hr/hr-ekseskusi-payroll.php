
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
                                <div class="col-md-3 col-3 ">
                                    <a href="HRUploadDataPayroll" class="btn btn-darkblue">Draft</a>
                                </div>
                                <div class="col-md-6 m-t-10 col-6" align="center">
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
                                    <a href="#" class="btn btn-blue col-md-6">Download CSV</a>
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
                                            <td><?php echo $row->nik_karyawan?></td>
                                            <td><?php echo $row->nama_lengkap?></td>
                                            <td><?php echo $row->perusahaan?></td>
                                            <td><?php echo $row->bank?></td>
<!--                                            <td><?php echo $row->rekening?></td>-->
                                            <td><?php echo number_format($row->nominal)?></td>
<!--                                            <td><?php echo $row->keterangan?></td>-->
                                            <td><?php echo $row->tanggal?></td>
                                            <td>
                                                <a href="<?php echo base_url()?>HR/ViewHRPayrollHistory/<?php echo $row->nik_karyawan?>" class="btn btn-green1">Lihat</a>
<!--                                                 <a href="#" class="btn btn-yellow">Edit</a>-->
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
         