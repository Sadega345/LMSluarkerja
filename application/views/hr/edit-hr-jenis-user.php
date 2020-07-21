
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu">Pengaturan / Edit Jenis User</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-12" >
                                 <h6 class="tittle-box">Edit Jenis User <?php echo $dataManageuser->jabatan ?></h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form method="post" action="<?php echo base_url()?>HR/ProsesEditHRJenisUser" enctype="multipart/form-data">
                        <input type="hidden" name="id_jabatan" value="<?php echo $dataManageuser->id_jabatan ?>">
                        
                        
                        <div class="row">
                            <div class="table-responsive">
                                <table  class="table table-hover  dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Check</th>
                                            <th>Nama Modul</th>
                                            <th>Link</th>
                                            <th>Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        foreach ($dataModul->result() as $modul){ 
                                            $wheremodul = array('a.id_modul'=>$modul->id_modul,
                                                            'a.id_jabatan'=>$dataManageuser->id_jabatan);

                                            $ceked = $this->Nata_hris_hr_model->viewmanageUserParent($wheremodul);
                                            $where = array('parent'=>$modul->id_modul);
                                            $dataAnak = $this->Nata_hris_hr_model->dataModulAnak($where);
                                            if ($dataAnak->num_rows() > 0 || $modul->link == "HR") { ?>
                                                
                                            <tr>
                                                <td>
                                                    <label class="fancy-checkbox">
                                                        <input type="checkbox" name="id_modul[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="<?php echo $modul->id_modul ?>" <?php echo $ceked->num_rows() > 0?'checked':'' ?>>
                                                        <span> &nbsp;</span>
                                                    </label>
                                                </td>
                                                
                                                <td>
                                                    <?php if ($modul->parent == 0){ ?>
                                                        <?php echo '<b>'.$modul->nama_modul.'</b>'; ?>    
                                                    <?php }else{ ?>
                                                        <?php echo $modul->nama_modul ?>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $modul->link ?></td>
                                                <td>
                                                    <label class="fancy-radio">
                                                        
                                                        <input type="radio" name="akses<?php echo $modul->id_modul?>" value="0" <?php echo $ceked->num_rows() > 0 && $ceked->row()->akses == '0'?'checked':'' ?>  data-parsley-errors-container="#error-radio" >
                                                        <span><i></i>Tidak Bisa Akses</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input type="radio" name="akses<?php echo $modul->id_modul?>" value="1" <?php echo $ceked->num_rows() > 0 && $ceked->row()->akses == '1'?'checked':'' ?> data-parsley-errors-container="#error-radio" >
                                                        <span><i></i>Crud</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input type="radio" name="akses<?php echo $modul->id_modul?>" value="2" <?php echo $ceked->num_rows() > 0 && $ceked->row()->akses == '2'?'checked':'' ?> data-parsley-errors-container="#error-radio" >
                                                        <span><i></i>View</span>
                                                    </label>
                                                </td>
                                                
                                            </tr>                                            
                                            
                                            <?php 
                                                }
                                             ?>
                                            <?php 
                                            foreach ($dataAnak->result() as $anak){ 
                                                $wheremodul = array('a.id_modul'=>$anak->id_modul,
                                                            'a.id_jabatan'=>$dataManageuser->id_jabatan);

                                            $cekedanak = $this->Nata_hris_hr_model->dataViewModulAnak($wheremodul);
                                            ?>
                                                <tr>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input type="checkbox" name="id_modul[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="<?php echo $anak->id_modul ?>" <?php echo $cekedanak->num_rows() > 0?'checked':'' ?>>
                                                            <span> &nbsp;</span>
                                                        </label>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php if ($anak->parent == 0){ ?>
                                                            <?php echo '<b>'.$anak->nama_modul.'</b>'; ?>    
                                                        <?php }else{ ?>
                                                            <?php echo $anak->nama_modul ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $anak->link ?></td>
                                                    <td>
                                                        <label class="fancy-radio">
                                                            <input type="radio" name="akses<?php echo $anak->id_modul?>" value="0" <?php echo $cekedanak->num_rows() > 0 && $cekedanak->row()->akses == '0'?'checked':'' ?>  data-parsley-errors-container="#error-radio" >
                                                            <span><i></i>Tidak Bisa Akses</span>
                                                        </label>
                                                        <label class="fancy-radio">
                                                            <input type="radio" name="akses<?php echo $anak->id_modul?>" value="1" <?php echo $cekedanak->num_rows() > 0 && $cekedanak->row()->akses == '1'?'checked':'' ?>  data-parsley-errors-container="#error-radio" >
                                                            <span><i></i>Crud</span>
                                                        </label>
                                                        <label class="fancy-radio">
                                                            <input type="radio" name="akses<?php echo $anak->id_modul?>" value="2" <?php echo $cekedanak->num_rows() > 0 && $cekedanak->row()->akses == '2'?'checked':'' ?>  data-parsley-errors-container="#error-radio" >
                                                            <span><i></i>View</span>
                                                        </label>
                                                        <!-- <?php //if($anak->nama_modul=="Payroll Creator"){ ?>
                                                            <label class="fancy-radio">
                                                               <select name="approval" class="form-control">
                                                                   <option value="0" >pilih</option>
                                                                   <option value="1" <?php //echo $cekedanak->row()->approval==1?'selected':'' ?>>Approval 1</option>
                                                                   <option value="2" <?php //echo $cekedanak->row()->approval==2?'selected':'' ?>>Approval 2</option>
                                                                   
                                                               </select>
                                                            </label>
                                                        <?php //} ?> -->
                                                    </td>
                                                    
                                                </tr>
                                            <?php } ?>
                                        <?php } ?> 
                                    </tbody>
                                </table>
                            </div>

                            
                        </div>
                        <div class="row m-t-10">
                            <div class="col-3"></div>
                            <div class="col-md-12 col-6" align="center">
                                <input type="submit" class="btn btn-blue1" value="Simpan">
                                <a href="<?php echo base_url()?>HR/HRJenisUser" class="btn btn-red1">Batal</a>
                            </div>
                        </div>
                        <br>
                        </form>

                    </div>
                </div>
                    
                </div> 
            </div>

                        
         