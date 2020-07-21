<!-- <div class="row">
    <div class="col-md-3 col-12 m-t-10" >
        <label class="float-right hidden-sm">Provinsi *</label>
        <label class="d-sm-none">Provinsi *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="id_provinsi" class="form-control select2" onchange="pilihKab(this.value,0);" id="selprov" required readonly="">
            <option value="" selected disabled>-- Pilih Provinsi --</option>
            <?php
            /*foreach($dataProvinsi->result() as $dtprov){
                ?>
                <option value="<?php echo $dtprov->id_provinsi; ?>"> <?php echo $dtprov->deskripsi; ?></option>
                <?php
            }*/
            ?>
        </select>
    </div>
</div> -->
<!-- <div class="row" id="rowkab">
    <div class="col-md-3 col-12 m-t-10">
        <label class="float-right hidden-sm">Kabupaten *</label>
        <label class="d-sm-none">Kabupaten *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="id_kabupaten" readonly="" class="form-control" id="selkab" onchange="pilihKec(this.value,0);" required>
        </select>
    </div>
</div> -->
<!-- <div class="row" id="rowkec">
    <div class="col-md-3 col-12 m-t-10">
        <label class="float-right hidden-sm">Kecamatan *</label>
        <label class="d-sm-none">Kecamatan *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="id_kecamatan" readonly="" class="form-control" id="selkec" required>
        </select>
    </div>
</div> -->
<div class="row">
    <div class="col-md-3 col-12 m-t-10"  >
        <label class="float-right hidden-sm">Alamat *</label>
        <label class="d-sm-none">Alamat *</label>
    </div>
    <div class="col-md-4 col-12">
        <input name="alamat" readonly="" type="text" id="alamat" class="form-control" onkeypress="return Alamat(event);" required>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10"  >
        <label class="float-right hidden-sm">Kode Pos *</label>
        <label class="d-sm-none">Kode Pos *</label>
    </div>
    <div class="col-md-4 col-12">
        <input name="kode_pos" readonly="" type="text" id="kodepos"  onkeypress="return hanyaAngka(event);"  class="form-control" required>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10"  >
        <label class="float-right hidden-sm">Alamat Ketika Urgent *</label>
        <label class="d-sm-none">Alamat Ketika Urgent *</label>
    </div>
    <div class="col-md-4 col-12">
        <input name="alamat_ketika_urgent" id="alamat_ketika_urgent" readonly="" type="text"  onkeypress="return Alamat(event);"  class="form-control" required>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-12 m-t-10"  >
        <label class="float-right hidden-sm">Nomor Telepon *</label>
        <label class="d-sm-none">Nomor Telepon *</label>
    </div>
    <div class="col-md-4 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-mobile-phone"></i></span>
            </div>
            <input name="nomor_telepon" readonly="" readonly="" type="text" id="nomor_telepon"  onkeypress="return hanyaAngka(event);"  class="form-control" required>
        </div>
    </div>
</div>
<h6 class="tittle-box">Data HR</h6>
<div class="row">
    <div class="col-md-3 col-12 m-t-10"  >
        <label class="float-right hidden-sm">Email *</label>
        <label class="d-sm-none">Email *</label>
    </div>
    <div class="col-md-4 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
            </div>
            <input name="email" id="email" type="text" class="form-control" data-parsley-trigger="change" data-parsley-type="email" data-parsley-validate-full-width-characters="true" required>
        </div>
    </div>
</div>
<div class="row" id="rowpass">
    <div class="col-md-3 col-12 m-t-10"  >
        <label class="float-right hidden-sm">Password *</label>
        <label class="d-sm-none">Password *</label>
    </div>
    <div class="col-md-4 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-key"></i></span>
            </div>
            <input name="password" id="password" type="password" class="form-control"  required>
        </div>
    </div>
</div>
