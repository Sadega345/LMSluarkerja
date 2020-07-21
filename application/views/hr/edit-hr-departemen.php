
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu"> Master / Klien & Departemen / Edit Departemen</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                <!--  <h6 class="tittle-box">Edit Departemen</h6> -->
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                        <div class="container">
                            <form method="post" action="<?php echo base_url()?>HR/ProsesEditDepartemen/<?php echo $this->uri->segment(4) ?>" >
                                <input type="hidden" name="id" class="form-control" required value="<?php echo $datadepartemen->id_departemen ?>">
                                <div class="row  m-t-10">
                                    <div class="col-md-3 col-12 m-t-20" >
                                        <label class="float-right hidden-sm">Nama Departemen </label>
                                        <label class="d-sm-none">Nama Departemen </label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <!-- <input type="text" name="deskripsi" class="form-control" required value="<?php //echo $datadepartemen->deskripsi ?>"> -->
                                        <select name="id_master"  class="form-control select2" required>
                                            <option selected disabled> Pilih Departemen </option>
                                            <?php
                                            foreach($datadept->result() as $dp){
                                                ?>
                                                <option value="<?php echo $dp->id_master_departemen; ?>" <?php echo $datadepartemen->id_master==$dp->id_master_departemen?'selected':''; ?>> <?php echo $dp->nama_departemen; ?></option>
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
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <!-- <a href="<?php //echo base_url()?>HR/HRDepartemen" class="btn btn-red1">Batal</a> -->
                                    <a href="<?php echo base_url()?>HR/ViewHRKlienDepartemen/<?php echo $this->uri->segment(4) ?>" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>


         
                        
         