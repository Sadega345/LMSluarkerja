            
 <div class="row clearfix">
    <div class="col-lg-6 col-md-6">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">NIK * </p>
                <p class="d-sm-none">NIK * </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="nik_baru" class="form-control fcheight" value="<?php echo $dataKaryawannya->nik; ?>" required>
            </div>
             <input type="hidden" name="nik" class="form-control fcheight" value="<?php echo $dataKaryawannya->nik; ?>" required>
        </div>

        <div class="row form-group" id="rowclient2">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Unit Bisnis * </p>
                <p class="d-sm-none">Unit Bisnis * </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_client" id="selclient2" class="form-control select2 fcheight" required>
                    <option selected > Pilih Unit Bisnis </option>
                    <?php
                    foreach($dataClient->result() as $dtc){
                        ?>
                      
                        <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php echo $dataKaryawannya->id_master_perusahaan==$dtc->id_master_perusahaan?'selected':''; ?>> <?php echo $dtc->nama_perusahaan; ?></option>
                            
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row form-group" id="rowdept2">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Departemen * </p>
                <p class="d-sm-none">Departemen * </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_dept" id="seldept2" class="form-control select2 fcheight" required>
                    <option selected disabled> Pilih Departemen </option>
                    <?php
                    foreach($dataDeptC->result() as $dtd){?>
                        <?php  
                            if($dtd->id_master_perusahaan==$dataKaryawannya->id_master_perusahaan){ ?>
                                <option value="<?php echo $dtd->id_departemen; ?>" <?php echo  $dtd->id_departemen== $dataKaryawannya->id_departemen?'selected':'' ?>> <?php echo $dtd->nama_departemen; ?></option>
                            <?php }  ?>
                       
                        <?php
                            } 
                        ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="row form-group" id="rowsumber2">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Sumber * </p>
                <p class="d-sm-none">Sumber * </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="sumber" class="form-control fcheight" value="<?php echo $dataKaryawannya->id_pelamar!=0?'Pelamar':'Karyawan' ?>" readonly />
                <input type="hidden" id="sumber2" value="<?php echo $dataKaryawannya->id_pelamar?>">
            </div>
        </div>

        <div class="row form-group" id="rowjabatan2">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Pekerjaan * </p>
                <p class="d-sm-none">Pekerjaan * </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_master_jenis_project" class="form-control select2 fcheight" id="seljab2">
                    <option selected disabled> Pilih Pekerjaan </option>
                    <?php
                        foreach($dataPekerjaan->result() as $dtj){
                            echo '<option value="'.$dtj->id_master_jenis_project.'" '.($dtj->id_master_jenis_project==$dataKaryawannya->id_jenis_project?'selected':'').'>'.$dtj->jenis_project.'</option>';
                        } 
                    ?>
                </select>
            </div>
        </div>

        <div class="row form-group" id="rowloker2">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Pilih Pekerjaan * </p>
                <p class="d-sm-none">Pilih Pekerjaan * </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_loker" class="form-control select2 fcheight" id="sellok2" onchange="pilihPelamar(this.value);">
                    <option selected disabled> Pilih Pekerjaan </option>
                    <?php
                        /*foreach($dataPekerjaanL->result() as $dtj){
                            echo '<option value="'.$dtj->id_loker.'" '.($dtj->id_loker==$dataKaryawannya->id_loker?'selected':'').'>'.$dtj->jenis_project.'</option>';
                        }*/
                    ?>
                </select>
                <div id="rowidjenpro2"></div>
            </div>
        </div>

    </div>

     <div class="col-lg-12 col-md-12">
        
        <div id="wizard_horizontal" class=" m-t-10">
            <h2>Informasi Pegawai</h2>
            <section>
                <?php $this->load->view("hr/edit-hr-pegawai-info"); ?>
            </section>
            
            <h2>Informasi Kontak</h2>
            <section>
                <?php $this->load->view("hr/edit-hr-pegawai-kontak"); ?>
            </section>
            
            <h2>Informasi Kontrak</h2>
            <section>
                <?php $this->load->view("hr/edit-hr-pegawai-kontrak"); ?>
            </section>
            
            <h2>Informasi Penggajian</h2>
            <section>
                <?php $this->load->view("hr/edit-hr-pegawai-gaji"); ?>
            </section>
        </div>
        
    </div> 
</div>

<!-- <div id="rowtunjangan">
    <div class="container">
        <div class="row">
            <div class="col-5"  align="right">
                <label>Jenis Tunjangan</label>
            </div>
            <div class="col-7">
                <select id="seltunjangan" class="form-control seltunjangan">
                    <option value="" selected disabled>-- Pilih Jenis Tunjangan --</option>
                    <?php
                    foreach($dataJenisTunjangannya->result() as $dttun){
                        echo '<option value="'.$dttun->id_jenis_tunjangan.'">'.$dttun->jenis_tunjangan.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-5"  align="right">
                <label>Besaran Tunjangan</label>
            </div>
            <div class="col-7">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input id="bestunjinp" min="1" class="form-control besarantunjangan text-right" type="text" />
                </div>
            </div>
        </div>
    </div>
</div> -->

