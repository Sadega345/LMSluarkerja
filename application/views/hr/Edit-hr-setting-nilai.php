
            
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
                        <form method="post" action="<?php echo base_url()?>Outsource/ProsesEditHRSettingNilai" enctype="multipart/form-data">
                            <input type="hidden" name="id_setting_nilai" value="<?php echo $datasettingnilai->id_setting_nilai; ?>">
                            <input type="hidden" name="id_master_perusahaan" value="<?php echo $datasettingnilai->id_master_perusahaan; ?>">
                            <input type="hidden" name="id_departemen" value="<?php echo $datasettingnilai->id_departemen; ?>">
                            <div class="row">
                                <div class="col-md-3 col-12 m-t-10">
                                    <label class="float-right hidden-sm">Tunjangan Koefisien </label>
                                    <label class="d-sm-none">Tunjangan Koefisien </label>
                                </div>
                                <div class="col-md-2">
                                    <select name="status_koefisien" class="form-control" required>
                                        <option >Pilih Status </option>
                                        <option value="1" <?php echo $datasettingnilai->status_koefisien=='1'?'selected':''; ?>>Nominal(Rp)</option>
                                        <option value="2" <?php echo $datasettingnilai->status_koefisien=='2'?'selected':''; ?>>Presentase(%)</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="value_koefisien" class="form-control" value="<?php echo $datasettingnilai->value_koefisien ?>" required>
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
                                        <option value="1" <?php echo $datasettingnilai->status_tmk=='1'?'selected':''; ?>>Nominal(Rp)</option>
                                        <option value="2" <?php echo $datasettingnilai->status_tmk=='2'?'selected':''; ?>>Presentase(%)</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="value_tmk" class="form-control" value="<?php echo $datasettingnilai->value_tmk ?>" required>
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
                                        <option value="1" <?php echo $datasettingnilai->status_jabatan=='1'?'selected':''; ?>>Nominal(Rp)</option>
                                        <option value="2" <?php echo $datasettingnilai->status_jabatan=='2'?'selected':''; ?>>Presentase(%)</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="value_jabatan" class="form-control" value="<?php echo $datasettingnilai->value_jabatan ?>" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3 m-t-10" >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <a href="<?php echo base_url()?>Outsource/ViewHRKlienDepartemenDtl/<?php  echo $datasettingnilai->id_master_perusahaan ?>/<?php echo $datasettingnilai->id_departemen ?>" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
                    
                </div> 
            </div>
           
         