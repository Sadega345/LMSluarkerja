
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu"> Master / Klien & Departemen</h6>
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
                                 <!-- <h6 class="tittle-box">Tambah Departemen</h6> -->
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesTambahDepartemen/<?php echo $this->uri->segment(3) ?>" method="post">
                            <input type="hidden" name="id_master_perusahaan" value="<?php echo $this->uri->segment(3) ?>">
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12 m-t-20" >
                                    <label class="float-right hidden-sm">Nama Departemen </label>
                                    <label class="d-sm-none">Nama Departemen </label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <!-- <input type="text" name="deskripsi" class="form-control"> -->
                                    
                                    <select name="id_master"  class="form-control select2" required>
                                        <option selected disabled> Pilih Departemen </option>
                                        <?php
                                        foreach($datadept->result() as $dp){
                                            ?>
                                            <option value="<?php echo $dp->id_master_departemen; ?>"> <?php echo $dp->nama_departemen; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3" >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button class="btn btn-blue1" type="submit">Tambah</button>
                                    <!-- <a href="<?php //echo base_url()?>HR/ViewHRKlienDepartemen/<?php //echo $this->uri->segment(3) ?>" class="btn btn-red1">Batal</a> -->
                                    <a href="<?php echo base_url()?>HR/HRDepartemen" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div> 
            </div> 
        </div>

           <!--  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Departemen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php //foreach ($datadepartemen->result() as $dt) { ?> 
                                        <tr>
                                            
                                            <td><?php //echo $dt->deskripsi; ?></td>
                                            <td>
                                                 <a href="<?php //echo base_url()?>HR/HapusDepartemen/<?php //echo $dt->id_departemen?>/<?php// echo $this->uri->segment(3); ?>"  class="btn btn-red1" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus">Hapus
                                                                    </a>
                                                 <a href="<?php // echo base_url()?>HR/EditDepartemen/<?php echo $dt->id_departemen; ?>/<?php //echo $this->uri->segment(3); ?>" class="btn btn-yellow">Edit Departemen</a>
                                            </td>
                                        </tr>
                                   <?php// } ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


         
                        
         