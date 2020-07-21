<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <label class="float-right hidden-sm">Status *</label>
        <label class="d-sm-none">Status *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="status_karyawan" readonly="" class="form-control select2" required>
            <option selected disabled>-- Pilih Status --</option>
            <option value="1">Tetap</option>
            <option value="2">Freelance</option>
            <option value="3">Kontrak PKWT</option>
            <option value="4">Kontrak PKWTT</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <label class="float-right hidden-sm">No. Kontrak *</label>
        <label class="d-sm-none">No. Kontrak *</label>
    </div>
    <div class="col-md-4 col-12">
        <!-- <input type="text" name="no_kontrak" class="form-control" onkeypress="return Alamat(event);" required /> -->
        <select name="id_po" readonly="" class="form-control select2">
            <option>Pilih Kontrak</option>
            <?php
            foreach($dataPOnya->result() as $dtpo){
                echo '<option value="'.$dtpo->id_projek_order.'">'.$dtpo->no_projek_order.' - '.$dtpo->no_surat_kontrak.' ('.$dtpo->paket.')</option>';
            } 
            ?>
        </select> 
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <label class="float-right hidden-sm">Tanggal Kontrak *</label>
        <label class="d-sm-none">Tanggal Kontrak *</label>
    </div>
    <div class="col-md-4 col-12">
        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                </div>
                <input type="text" readonly="" class="input-sm form-control" id="start"  data-id="startdate" name="" data-date-format="yyyy-mm-dd" required readonly>
            </div>
            
            <span class="input-group-addon text-center" style="width: 40px;">s/d</span>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                </div>
                <input type="text" readonly="" class="input-sm form-control" id="end"  data-id="enddate" name="" data-date-format="yyyy-mm-dd" required readonly>
            </div>
            <input type="hidden" name="tanggal_masuk" id="startdate">
            <input type="hidden" name="tanggal_keluar" id="enddate">
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <label class="float-right hidden-sm">Masa Kerja</label>
        <label class="d-sm-none">Masa Kerja</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" class="form-control" id="masa_kerja" required readonly>
    </div>
</div>
<!--
<div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <label class="float-right hidden-sm">Penerima *</label>
        <label class="d-sm-none">Penerima *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="nik_penerima" class="form-control select2" required>
            <option selected disabled>Pilih Penerima</option>
            <?php
            /* foreach($dataKaryawannya->result() as $dtkar){
                echo '<option value="'.$dtkar->nik.'">'.$dtkar->nik.' '.$dtkar->nama_lengkap.'</option>';
            } */
            ?>
        </select>
    </div>
</div>
-->