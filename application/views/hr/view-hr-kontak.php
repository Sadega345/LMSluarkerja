<div class="row m-t-10">
    <div class="col-md-3 col-12 " >
        <label class="float-right hidden-sm">Provinsi </label>
        <label class="d-sm-none">Provinsi </label>
    </div>
    <div class="col-md-4 col-12">
       <?php echo $dataKaryawannya->nama_provinsi; ?>
    </div>
</div>
<div class="row m-t-10" id="rowkab">
    <div class="col-md-3 col-12 ">
        <label class="float-right hidden-sm">Kabupaten </label>
        <label class="d-sm-none">Kabupaten </label>
    </div>
    <div class="col-md-4 col-12">
        <?php echo $dataKaryawannya->nama_kabupaten; ?>
    </div>
</div>
<div class="row m-t-10" id="rowkec">
    <div class="col-md-3 col-12 ">
        <label class="float-right hidden-sm">Kecamatan </label>
        <label class="d-sm-none">Kecamatan </label>
    </div>
    <div class="col-md-4 col-12">
       <?php echo $dataKaryawannya->nama_kecamatan; ?>
    </div>
</div>
<div class="row m-t-10">
    <div class="col-md-3 col-12 "  >
        <label class="float-right hidden-sm">Alamat </label>
        <label class="d-sm-none">Alamat</label>
    </div>
    <div class="col-md-4 col-12">
        <?php echo $dataKaryawannya->alamat; ?>
    </div>
</div>
<div class="row m-t-10">
    <div class="col-md-3 col-12 "  >
        <label class="float-right hidden-sm">Kode Pos </label>
        <label class="d-sm-none">Kode Pos </label>
    </div>
    <div class="col-md-4 col-12">
        <?php echo $dataKaryawannya->kode_pos; ?>
    </div>
</div>
<div class="row m-t-10">
    <div class="col-md-3 col-12 "  >
        <label class="float-right hidden-sm">Alamat Ketika Urgent </label>
        <label class="d-sm-none">Alamat Ketika Urgent </label>
    </div>
    <div class="col-md-4 col-12">
       <?php echo $dataKaryawannya->alamat_ketika_urgent; ?>
    </div>
</div>
<div class="row m-t-10">
    <div class="col-md-3 col-12 "  >
        <label class="float-right hidden-sm">Nomor Telepon </label>
        <label class="d-sm-none">Nomor Telepon </label>
    </div>
    <div class="col-md-4 col-12">
        <div class="input-group mb-3">
           <?php echo $dataKaryawannya->nomor_telepon; ?>
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
