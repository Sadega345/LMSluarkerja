<div class="row form-group">
    <div class="col-md-3 col-12">
        <label for="ktppegawai" class="float-right hidden-sm">NIK *</label>
        <label for="ktppegawai" class="d-sm-none">NIK *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="niklama" readonly="" id="selnik" class="form-control select2"  required>
            <option value="" selected disabled>-- Pilih NIK --</option>
            <?php
            foreach($dataUser->result() as $user){
                ?>
                <option value="<?php echo $user->nik; ?>"> <?php echo $user->nik.'-'.$user->nama_lengkap ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label for="ktppegawai" class="float-right hidden-sm">No. KTP *</label>
        <label for="ktppegawai" class="d-sm-none">No. KTP *</label>
    </div>
    <div class="col-md-4 col-12">
        <input name="nik_ktp" readonly="" type="text" class="form-control" id="ktppegawai" onkeypress="return hanyaAngka(event);" maxlength="16"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">NO. NPWP *</label>
        <label class="d-sm-none">No. NPWP *</label>
    </div>
    <div class="col-md-4 col-12">
    <?php /* 86.229.167.1-521.000 */ ?>
        <input name="no_npwp" readonly="" type="text" class="form-control" id="npwppegawai"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Tempat Pembuatan NPWP *</label>
        <label class="d-sm-none">Tempat Pembuatan NPWP *</label>
    </div>
    <div class="col-md-4 col-12">
        <input name="tempat_buat" readonly="" type="text" class="form-control" id="tempatnpwp" onkeypress="return hanyaHuruf(event);"  />
    </div>
</div>

<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Nama Lengkap Pegawai *</label>
        <label class="d-sm-none">Nama Lengkap Pegawai *</label>
    </div>
    <div class="col-md-4 col-12">
        <input name="nama_lengkap" readonly="" type="text" class="form-control" id="inppegawai" onkeypress="return hanyaHuruf(event);" />
        <div id="selepegawai">
        <select name="id_pelamar" readonly="" onchange="pelamarDtl(this.value);" class="form-control" id="selpegawai"  >
        </select>
        </div>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Nama Panggilan Pegawai *</label>
        <label class="d-sm-none">Nama Panggilan Pegawai *</label>
    </div>
    <div class="col-md-4 col-12">
        <input name="nama_panggilan" readonly="" type="text" class="form-control" id="inppegawai2" onkeypress="return hanyaHuruf(event);"  />
    </div>
</div>
<div class="row form-group" id="rowjabatan">
    <div class="col-md-3 col-12" >
        <label class="float-right hidden-sm">Tempat, Tanggal Lahir *</label>
        <label class="d-sm-none">Tempat, Tanggal Lahir *</label>
    </div>
    <div class="col-md-2 col-6">
        <input type="text" readonly="" class="form-control" name="tempat_lahir" id="tempat_lahir" onkeypress="return hanyaHuruf(event);"  />
    </div>
    <div class="col-md-3 col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
            <input type="text" readonly="" class="form-control datepicker2" id="tanggal_lahir" data-provide="datepicker" data-date-format="yyyy-mm-dd" name=""  readonly data-id="datepicker2"/>
            <input type="hidden" name="tanggal_lahir" id="datepicker2">
        </div>
    </div>
</div>
<div class="row form-group" id="rowjabatan">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Jenis Kelamin *</label>
        <label class="d-sm-none">Jenis Kelamin *</label>
    </div>
    <div class="col-md-4 col-12">
        <label class="fancy-radio">
            <input type="radio" name="jenis_kelamin" value="L" class="required"  checked data-parsley-errors-container="#error-radio" data-required="true" data-parsley-multiple="gender">
            <span><i></i>Laki-laki</span>
        </label>
        <label class="fancy-radio">
            <input type="radio" name="jenis_kelamin" value="P" class="required"  data-parsley-errors-container="#error-radio"  data-parsley-multiple="gender" >
            <span><i></i>Perempuan</span>
        </label>
        <p id="error-radio"></p>
        
        
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Agama *</label>
        <label class="d-sm-none">Agama *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="id_agama" readonly="" class="form-control select2" id="selagama" >
            <option selected disabled>-- Pilih Agama --</option>
            <?php
            foreach($dataAgama->result() as $dtagm){
                ?>
                <option value="<?php echo $dtagm->id_agama; ?>"> <?php echo $dtagm->deskripsi; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Status Nikah *</label>
        <label class="d-sm-none">Status Nikah *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="id_sts_nikah" readonly="" class="form-control select2" id="selstsnikah" >
            <option selected disabled>-- Pilih Status --</option>
            <?php
            foreach($dataStsNikah->result() as $dtsn){
                ?>
                <option value="<?php echo $dtsn->id_sts_nikah; ?>"> <?php echo $dtsn->deskripsi; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Golongan</label>
        <label class="d-sm-none">Golongan</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="golongan_darah" readonly="" class="form-control select2" id="selgoldar">
            <option value="">-- Pilih Golongan Darah --</option>
            <?php
            $datagoldar=array(
                "O","O+","O-"
                ,"A","A+","A-"
                ,"B","B+","B-"
                ,"AB","AB+","AB-"
            );
            foreach($datagoldar as $dtgd){
                ?>
                <option value="<?php echo $dtgd; ?>"> <?php echo $dtgd; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
<h6 class="tittle-box">Pendidikan Terakhir</h6>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Pendidikan Terakhir *</label>
        <label class="d-sm-none">Pendidikan Terakhir *</label>
    </div>
    <div class="col-md-4 col-12">
        <select name="id_pendidikan" readonly="" class="form-control select2" id="selpendidikan" >
            <option selected disabled>-- Pilih Pendidikan --</option>
            <?php
            foreach($dataPendidikan->result() as $dtdidik){
                ?>
                <option value="<?php echo $dtdidik->id_pendidikan; ?>"> <?php echo $dtdidik->deskripsi; ?></option>
                <?php
            } 
            ?>
        </select>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Nama Institusi *</label>
        <label class="d-sm-none">Nama Institusi *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="nama_sekolah" class="form-control" onkeypress="return Alamat(event);"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Jurusan *</label>
        <label class="d-sm-none">Jurusan *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="jurusan" class="form-control" onkeypress="return Alamat(event);"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Tahun Masuk *</label>
        <label class="d-sm-none">Tahun Masuk *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="tahun_masuk" class="form-control" id="thn_masuk_didik"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Tahun Lulus *</label>
        <label class="d-sm-none">Tahun Lulus *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="tahun_lulus" class="form-control" id="thn_lulus_didik"  />
    </div>
</div>
<h6 class="tittle-box">Pengalaman Terakhir</h6>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Nama Instansi *</label>
        <label class="d-sm-none">Nama Instansi *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="nama_perusahaan" class="form-control" onkeypress="return Alamat(event);"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Jabatan *</label>
        <label class="d-sm-none">Jabatan *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="nama_jabatan" class="form-control" onkeypress="return Alamat(event);"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Tahun Masuk *</label>
        <label class="d-sm-none">Tahun Masuk *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="tahun_mulai" class="form-control" id="thn_masuk_kerja"  />
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3 col-12">
        <label class="float-right hidden-sm">Tahun Selesai *</label>
        <label class="d-sm-none">Tahun Selesai *</label>
    </div>
    <div class="col-md-4 col-12">
        <input type="text" readonly="" name="tahun_selesai" class="form-control" id="thn_lulus_kerja"  />
    </div>
</div>
<script type="text/javascript">
    $('#selnik').change(function() {
        var nik = $('#selnik').val();
        // alert(nik);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>HR/ambilKaryawanHR", 
        data: {nik : nik}, 
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function(response){ 
            $("#rowcv").hide();
            $("#ktppegawai").val(response.data_karyawan.nik_ktp);
            $("#npwppegawai").val(response.data_karyawan.no_npwp);
            $("#inppegawai").val(response.data_karyawan.nama_lengkap);
            $("#inppegawai2").val(response.data_karyawan.nama_panggilan);
            $("#email").val(response.data_karyawan.email);
            $("#kodepos").val(response.data_karyawan.kode_pos);
            $("#alamat").val(response.data_karyawan.alamat);
            $("#alamat_ketika_urgent").val(response.data_karyawan.alamat_ketika_urgent);
            $("#nomor_telepon").val(response.data_karyawan.nomor_telepon);
            $("#tempat_lahir").val(response.data_karyawan.tempat_lahir);
            $("#tanggal_lahir").val(response.data_karyawan.tanggal_lahir);
            var $radios = $('input:radio[name=jenis_kelamin]');
            $radios.filter('[value='+response.data_karyawan.jenis_kelamin+']').prop('checked', true);
            $('#selagama option[value='+response.data_karyawan.id_agama+']').attr('selected','selected');
            $('#selstsnikah option[value='+response.data_karyawan.id_sts_nikah+']').attr('selected','selected');
            $('#selgoldar option[value='+response.data_karyawan.golongan_darah+']').attr('selected','selected');
            $('#selpendidikan option[value='+response.data_karyawan.id_pendidikan+']').attr('selected','selected');
            $('#selprov option[value='+response.data_karyawan.id_provinsi+']').attr('selected','selected');
            $("#selagama").select2("destroy").select2();
            $("#selstsnikah").select2("destroy").select2();
            $("#selgoldar").select2("destroy").select2();
            $("#selpendidikan").select2("destroy").select2();
            $("#selprov").select2("destroy").select2();
            if(response.data_karyawan.id_kabupaten!=""){
                pilihKab(response.data_karyawan.id_provinsi,response.data_karyawan.id_kabupaten);
            }
            if(response.data_pelamar.id_kecamatan!=""){
                pilihKec(response.data_karyawan.id_kabupaten,response.data_karyawan.id_kecamatan);
            }
        },
            error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
            }
        }); 
    });
</script>