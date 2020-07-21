
 <div class="row clearfix">
    <div class="col-lg-6 col-md-6">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">NIK * </p>
                <p class="d-sm-none">NIK * </p>
            </div>
            <div class="col-md-6 col-12">
                <?php
                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $random=substr(str_shuffle($permitted_chars), 0, 5);
                ?>
                <input type="text" name="nik" id="nik" class="form-control fcheight" value="<?php echo "S3O".date("Ym").$random;; ?>" />
                <div id="loadingnik">
                  <img src="<?php echo base_url() ?>assets/images/loading.gif" width="18"> <small>Loading...</small>
                </div>
            </div>
            <div class="hasilnik"></div>
        </div>

        <div class="row form-group" id="rowclient2">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Perusahaan * </p>
                <p class="d-sm-none">Perusahaan * </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_client" id="selclient2" class="form-control select2 fcheight" required>
                    <option selected disabled> Pilih Perusahaan </option>
                    <?php
                    foreach($dataClient->result() as $dtc){
                        ?>
                        <option value="<?php echo $dtc->id_master_perusahaan; ?>"> <?php echo $dtc->nama_perusahaan; ?></option>
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
                    foreach($dataDeptC->result() as $dtd){
                        ?>
                        <option value="<?php echo $dtd->id_departemen; ?>"> <?php echo $dtd->deskripsi; ?></option>
                        <?php
                    } 
                    ?>
                </select>
            </div>
        </div>

    </div>

    <div class="col-lg-6 col-md-6" id="rowsumber2">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Sumber * </p>
                <p class="d-sm-none">Sumber * </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="sumber" class="form-control select2 fcheight" onchange="pilihSumber(this.value);" required>
                        <option selected disabled>-- Pilih Sumber --</option>
                        <option value="1">Pelamar</option>
                        <option value="2">Karyawan</option>
                    </select>
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
                        echo '<option value="'.$dtj->id_master_jenis_project.'">'.$dtj->jenis_project.'</option>';
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
                    foreach($dataPekerjaanL->result() as $dtj){
                        echo '<option value="'.$dtj->id_loker.'">'.$dtj->jenis_project.'</option>';
                    } 
                    ?>
                </select>
                <div id="rowidjenpro"></div>
            </div>
        </div>

    </div>
    <!-- End Of New -->

    <div class="col-lg-12 col-md-12">        
        <div id="wizard_horizontal">
            <h2>Informasi Pegawai</h2>
            <section>
                <?php $this->load->view("hr/tambah-hr-pegawai-info"); ?>
            </section>
            
            <h2>Informasi Kontak</h2>
            <section>
                <?php $this->load->view("hr/tambah-hr-pegawai-kontak"); ?>
            </section>
            
            <h2>Informasi Kontrak</h2>
            <section>
                <?php $this->load->view("hr/tambah-hr-pegawai-kontrak"); ?>
            </section>
            
            <h2>Informasi Penggajian</h2>
            <section>
                <?php $this->load->view("hr/tambah-hr-pegawai-gaji"); ?>
            </section>
        </div>
    </div> 

</div>



