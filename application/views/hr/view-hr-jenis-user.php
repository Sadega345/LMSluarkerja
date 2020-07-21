
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu">Pengaturan / Jenis User</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class="body">
                            <div class=" row p-15 ">
                                <div class="col-md-2 col-3">
                                </div>
                                <div class="col-md-6 text-center col-5" >
                                     <h6 class="tittle-box">Jenis User <?php echo $dataJenisUserRow->jabatan ?></h6>
                                </div>
                                <div class="col-md-4 col-4" align="right">
                                    <a href="<?php echo base_url()?>HR/HRJenisUser" class="btn btn-blue1 col-md-6">Kembali</a>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table  class="table table-hover  dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            
                                            <th>Nama Modul</th>
                                            <th>Link</th>
                                            <th>Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataJenisUser->result() as $modul){ 

                                            $where = array('u.parent'=>$modul->id_modul,
                                                            'a.id_jabatan'=>$modul->id_jabatan);

                                            $dataAnak = $this->Nata_hris_hr_model->dataViewModulAnak($where);
                                            if ($dataAnak->num_rows() > 0 || $modul->link == "HR") { ?>
                                                
                                        <tr>
                                               
                                                
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
                                                        <?php 
                                                            if ($modul->akses == '1'){ 
                                                                echo "Edit";
                                                            } elseif ($modul->akses == '2') {
                                                                echo "View";
                                                            } elseif ($modul->akses == '0') {
                                                                echo "Tidak bisa akses";
                                                            }
                                                        ?>
                                                        
                                                    </label>
                                                </td>
                                                
                                            </tr>                                            
                                            
                                            <?php 
                                                }
                                             ?>
                                            <?php foreach ($dataAnak->result() as $anak){ ?>
                                                <tr>
                                                    
                                                    
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
                                                            <?php 
                                                                if ($anak->akses == '1'){ 
                                                                    echo "Edit";
                                                                } elseif ($anak->akses == '2') {
                                                                    echo "View";
                                                                } elseif ($anak->akses == '0') {
                                                                    echo "Tidak bisa akses";
                                                                }
                                                            ?>
                                                            
                                                        </label>
                                                    </td>
                                                    
                                                </tr>
                                            <?php } ?>
                                        <?php } ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>


         
                        
         