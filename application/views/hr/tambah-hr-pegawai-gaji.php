<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">Gaji Pokok</p>
        <p class="d-sm-none">Gaji Pokok</p>
    </div>
    <div class="col-md-5 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" name="standar_gaji" id="gapok" class="form-control text-right fcheight" maxlength="100" >
        </div>
    </div>
    <div class="col-4" align="right">
        <a href="javascript:;" onclick="showTunjangan('tambah');" id="btntamtunj" class="btn Rectangle-cari">Tambah Tunjangan</a>
    </div>
</div>
<div id="contenttunjangan"></div>
<div class="row" id="rowgaji">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm"> Total Gaji</p>
        <p class="d-sm-none"> Total Gaji</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" id="total_gaji" class="form-control text-right fcheight"  readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">Bank </p>
        <p class="d-sm-none">Bank </p>
    </div>
    <div class="col-md-6 col-12">
        <select name="id_bank" class="form-control select2 fcheight" >
            <option selected disabled>-- Pilih Bank --</option>
            <?php
            foreach($databankpegawai->result() as $dtbank){
                echo '<option value="'.$dtbank->id_bank.'">'.$dtbank->deskripsi.'</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">No. Rekening </p>
        <p class="d-sm-none">No. Rekening </p>
    </div>
    <div class="col-md-6 col-12">
        <input name="nomor_rek" type="number" id="nomor_rek" class="form-control fcheight" >
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">Atas Nama </p>
        <p class="d-sm-none">Atas Nama </p>
    </div>
    <div class="col-md-6 col-12">
        <input type="text" name="atas_nama_rek" id="atas_nama" class="form-control fcheight" onkeypress="return hanyaHuruf(event);"  >
    </div>
</div>
<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14"> Nama Atasan </p>
        <p class="d-sm-none fz-14"> Nama Atasan </p>
    </div>
    <div class="col-md-6 col-12">
       <select name="nama_atasan" class="form-control select2 fcheight" >
            <option value="" selected disabled>-- Pilih Atasan --</option>
            <?php
            $ambilatasan = $this->Nata_hris_hr_model->dataambilatasan();
            foreach($ambilatasan->result() as $dt){
                ?>
                <option  value="<?php echo $dt->nik; ?>"> <?php echo $dt->nik."-".$dt->nama_lengkap; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>

<div class="row m-t-10">
    <div class="col-12">
        <label class="fz-18">Informasi Ketentuan</label>
    </div>
</div>

<!-- <div class="row">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Saldo Klaim</label>
    </div>
    <div class="col-md-4 col-7">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="saldo_klaim" type="text" class="form-control" id="saldoklaim" required>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">BPJS Kesehatan</p>
        <p class="d-sm-none">BPJS Kesehatan</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="bpjs_kes" type="text" class="form-control fcheight" id="bpjs_kes" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">BPJS Ketenagakerjaan</p>
        <p class="d-sm-none">BPJS Ketenagakerjaan</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="bpjs_tk" type="text" class="form-control fcheight" id="bpjs_tk" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">PPH</p>
        <p class="d-sm-none">PPH</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="pph" type="text" class="form-control fcheight" id="pph">
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">Lemburan</p>
        <p class="d-sm-none">Lemburan</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="lemburan" type="text" class="form-control fcheight" id="lemburan">
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6" align="right">
            <a href="javascript:;" onclick="showTunjangan2('tambah');" id="btntamtunj2" class="btn Rectangle-cari">Tambah Cuti Pribadi</a>
    </div>
</div>
<div id="contenttunjangan2"></div>
<!-- <div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">Total Jumlah Cuti</p>
        <p class="d-sm-none">Total Jumlah Cuti</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <input name="saldo_cuti" type="number" min="1" class="form-control fcheight" >
            <div class="input-group-prepend">
                <span class="input-group-text">Hari</span>
            </div>
        </div>
        
    </div>
</div> -->
<!-- <div class="row" id="rowcv">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Upload CV</label>
    </div>
    <div class="col-md-4 col-7">
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" name="cv_karyawan" class="custom-file-input" id="inputGroupFile02" required>
                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
            </div>
        </div>        
    </div>
</div> -->
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm">Catatan</p>
        <p class="d-sm-none">Catatan</p>
    </div>
    <div class="col-md-6 col-12">
        <textarea name="catatan" class="form-control fcheight"></textarea>
    </div>
</div>