
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
                           <form method="post" enctype="multipart/form-data" action="prosesHRUploadCSV">
                            <div class="row">
                                <div class="col-md-3 ">
                                </div>
                                <div class="col-md-6 m-t-10" align="center">
                                    <h6 class="tittle-box">Pilih Opsi Pembuatan Payroll Ulpoad CSV</h6>
                                </div>
                                <div class="col-md-3 ">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3 " align="right">
<!--                                     <label>File CSV</label> -->
                               <?php //echo $cekbank;?>
                                </div>
                                <div class="col-md-6 m-t-10" align="center">
                                   <select name="id_bank" class="form-control">
										<option readonly>Pilih Bank</option>
										<?php foreach($databank->result() as $row){?>
										<option value="<?php echo $row->id_bank?>"><?php echo $row->deskripsi?></option>
										<?php }?>
										
									</select>
                                </div>
                                <div class="col-md-3 ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 " align="right">
                                    <!-- <label>File CSV</label> -->
                                </div>
                                <div class="col-md-6 m-t-10" align="center">
                                   <input type="file" name="filecsv" name="upload csv"  class="form-control">
                                </div>
                                <div class="col-md-3 ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 ">
                                </div>
                                <div class="col-md-6 m-t-10" align="center">
                                  	<input type="submit" value="Upload data Payroll" class="btn btn-darkblue col-md-4 col-6">
                                </div>
                                <div class="col-md-3 ">
                                </div>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         