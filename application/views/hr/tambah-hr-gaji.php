<div class="row">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Gaji Pokok</label>
    </div>
    <div class="col-md-4 col-7">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" readonly="" name="standar_gaji" id="gapok" class="form-control text-right" maxlength="100" required>
        </div>
    </div>
    <div class="col-4" align="right">
        <a href="javascript:;" onclick="showTunjangan();" id="btntamtunj" class="btn btn-blue1">Tambah Tunjangan</a>
    </div>
</div>
<div id="contenttunjangan"></div>
<div class="row" id="rowgaji">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Total Gaji</label>
    </div>
    <div class="col-md-4 col-7">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" readonly="" id="total_gaji" class="form-control text-right" required readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Bank</label>
    </div>
    <div class="col-md-4 col-7">
        <select name="id_bank" readonly="" class="form-control select2" required>
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
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>No. Rekening</label>
    </div>
    <div class="col-md-4 col-7">
        <input name="nomor_rek" readonly="" type="number" id="nomor_rek" class="form-control" required>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Atas Nama</label>
    </div>
    <div class="col-md-4 col-7">
        <input type="text" readonly="" name="atas_nama_rek" id="atas_nama" class="form-control" onkeypress="return hanyaHuruf(event);" required >
    </div>
</div>

<div class="row">
    <div class="col-1">&nbsp;</div>
    <div class="col-11">
        <h6 class="tittle-box">Informasi Ketentuan</h6>
    </div>
</div>
<!--
<div class="row">
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
</div>
-->
<div class="row">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Jatah Cuti</label>
    </div>
    <div class="col-md-4 col-7">
        <div class="input-group mb-3">
            <input name="saldo_cuti" readonly="" type="number" min="1" class="form-control" required>
            <div class="input-group-prepend">
                <span class="input-group-text">Hari</span>
            </div>
        </div>
        
    </div>
</div>
<div class="row" id="rowcv">
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
</div>
<div class="row">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Catatan</label>
    </div>
    <div class="col-md-4 col-7">
        <textarea name="catatan" readonly="" class="form-control"></textarea>
    </div>
</div>