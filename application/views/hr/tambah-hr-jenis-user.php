
            
            <div class="block-header">
                <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
          <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pengumuman / Berita</h6> -->
          <p class="fz-36"> Pengaturan / Tambah Jenis User</p>
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
                                 <h6 class="tittle-box">Tambah Jenis User</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form method="post" action="<?php echo base_url()?>HR/ProsesTambahHRJenisUser" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Jabatan </label>
                                <label class="d-sm-none">Jabatan</label>
                            </div>
                            <div class="col-lg-6">
                                <select name="id_jabatan" class="form-control select2"  required>
                                    <option value="" selected disabled>-- Pilih Jabatan --</option>
                                    <?php
                                    foreach($dataKaryawanJabatan->result() as $jabatan){
                                        ?>
                                        <option value="<?php echo $jabatan->id_master_jenis_project; ?>"> <?php echo $jabatan->jenis_project ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
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
                                        <?php foreach ($dataModul->result() as $modul){ 

                                            $where = array('parent'=>$modul->id_modul);
                                            $dataAnak = $this->Nata_hris_hr_model->dataModulAnak($where);
                                            if ($dataAnak->num_rows() > 0 || $modul->link == "HR") { ?>
                                                
                                            <tr>
                                                <td>
                                                    <label class="fancy-checkbox">
                                                        <input type="checkbox" name="id_modul[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="<?php echo $modul->id_modul ?>">
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
                                                        <input type="radio" name="akses<?php echo $modul->id_modul?>" value="0"  data-parsley-errors-container="#error-radio" >
                                                        <span><i></i>Tidak Bisa Akses</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input type="radio" name="akses<?php echo $modul->id_modul?>" value="1"  data-parsley-errors-container="#error-radio" >
                                                        <span><i></i>Crud</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input type="radio" name="akses<?php echo $modul->id_modul?>" value="2"  data-parsley-errors-container="#error-radio" >
                                                        <span><i></i>View</span>
                                                    </label>
                                                </td>
                                                
                                            </tr>                                            
                                            
                                            <?php 
                                                }
                                             ?>
                                            <?php foreach ($dataAnak->result() as $anak){ ?>
                                                <tr>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input type="checkbox" name="id_modul[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="<?php echo $anak->id_modul ?>">
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
                                                            <input type="radio" name="akses<?php echo $anak->id_modul?>" value="0"  data-parsley-errors-container="#error-radio" >
                                                            <span><i></i>Tidak Bisa Akses</span>
                                                        </label>
                                                        <label class="fancy-radio">
                                                            <input type="radio" name="akses<?php echo $anak->id_modul?>" value="1"  data-parsley-errors-container="#error-radio" >
                                                            <span><i></i>Crud</span>
                                                        </label>
                                                        <label class="fancy-radio">
                                                            <input type="radio" name="akses<?php echo $anak->id_modul?>" value="2"  data-parsley-errors-container="#error-radio" >
                                                            <span><i></i>View</span>
                                                        </label>
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

         
                        
         