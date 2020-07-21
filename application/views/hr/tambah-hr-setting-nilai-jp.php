
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Klien & Departemen</h6>
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
                                 <h6 class="tittle-box">Setting Nilai</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form method="post" action="<?php echo base_url()?>Outsource/ProsesTambahHRSettingNilaiJP" enctype="multipart/form-data">
                           
                            <input type="hidden" name="id_master_perusahaan" value="<?php  echo $this->uri->segment(3) ?>">
                            <input type="hidden" name="id_departemen" value="<?php  echo $this->uri->segment(4) ?>">
                            <div class="row">
                                <div class="col-md-3 col-12 m-t-10">
                                    <label class="float-right hidden-sm">Jenis Projek </label>
                                    <label class="d-sm-none">Jenis Projek </label>
                                </div>
                                <div class="col-md-3">
                                    <select name="id_master_jenis_project" class="form-control select2" required>
                                        <option selected disabled> Pilih Jenis Projek </option>
                                        <?php
                                        foreach($datajp->result() as $dt){
                                            ?>
                                            <option value="<?php echo $dt->id_master_jenis_project; ?>"> <?php echo $dt->jenis_project; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-12 m-t-10">
                                    <label class="float-right hidden-sm">Tunjangan Koefisien </label>
                                    <label class="d-sm-none">Tunjangan Koefisien </label>
                                </div>
                                <div class="col-md-2">
                                    <select name="status_koefisien" class="form-control" required>
                                        <option >Pilih Status </option>
                                        <option value="1" >Nominal(Rp)</option>
                                        <option value="2" >Presentase(%)</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="value_koefisien" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-12 m-t-10">
                                    <label class="float-right hidden-sm">Tunjangan TMK </label>
                                    <label class="d-sm-none">Tunjangan TMK </label>
                                </div>
                                <div class="col-md-2">
                                    <select name="status_tmk" required class="form-control">
                                        <option >Pilih Status </option>
                                        <option value="1">Nominal(Rp)</option>
                                        <option value="2" >Presentase(%)</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="value_tmk" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-12 m-t-10">
                                    <label class="float-right hidden-sm">Tunjangan Jabatan </label>
                                    <label class="d-sm-none">Tunjangan Jabatan </label>
                                </div>
                                <div class="col-md-2">
                                    <select name="status_jabatan" class="form-control" required>
                                        <option >Pilih Status </option>
                                        <option value="1">Nominal(Rp)</option>
                                        <option value="2" >Presentase(%)</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="value_jabatan" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3 m-t-10" >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <a href="<?php echo base_url()?>Outsource/ViewHRKlienDepartemenDtl/<?php  echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
                    
                </div> 
            </div>
           
         