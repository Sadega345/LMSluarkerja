<div class="row">
    <div class="col-md-6 col-12">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="hidden-sm fz-14 hitam">No. KTP </p>
                <p for="ktppegawai" class="d-sm-none fz-14 hitam">No. KTP </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nik_ktp; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">NO. NPWP </p>
                <p class="d-sm-none fz-14 hitam">No. NPWP </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->no_npwp; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm">Nama Lengkap</p>
                <p class="d-sm-none">Nama Lengkap</p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nama_lengkap; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Nama Panggilan</p>
                <p class="d-sm-none">Nama Panggilan</p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nama_panggilan; ?></p>
            </div>
        </div>

        <div class="row form-group" id="rowjabatan">
            <div class="col-md-6 col-12" >
                <p class=" hidden-sm">Tempat, Tanggal Lahir </p>
                <p class="d-sm-none">Tempat, Tanggal Lahir </p>
            </div>
            <div class="col-md-6 col-6">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->tempat_lahir; ?>,<?php echo strftime(" %d %B %Y",strtotime($dataKaryawannya->tanggal_lahir)); ?></p>
            </div>
        </div>

    </div>

    <div class="col-md-6 col-12">
        <div class="row form-group" id="rowjabatan">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Jenis Kelamin </p>
                <p class="d-sm-none">Jenis Kelamin </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->jenis_kelamin=='L'?'Laki-laki':'Perempuan'; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Agama </p>
                <p class="d-sm-none">Agama </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->desAgama; ?></p>
            </div>  
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Status Nikah </p>
                <p class="d-sm-none">Status Nikah </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->desStsNikah; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Golongan</p>
                <p class="d-sm-none">Golongan</p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->golongan_darah; ?></p>
            </div>
        </div>    

    </div>
</div>
<div class="row">
    <div class="col-md-6 col-12">
        <label class="fz-18">Pendidikan Terakhir</label>
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Pendidikan Terakhir </p>
                <p class="d-sm-none">Pendidikan Terakhir </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->desPendidikan; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Nama Institusi </p>
                <p class="d-sm-none">Nama Institusi </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nama_sekolah; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Jurusan </p>
                <p class="d-sm-none">Jurusan </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->jurusan; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Masuk </p>
                <p class="d-sm-none">Tahun Masuk </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->tahun_masuk; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Lulus </p>
                <p class="d-sm-none">Tahun Lulus </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->tahun_lulus; ?></p>
            </div>
        </div>

    </div>

    <div class="col-md-6 col-12">
        <label class="fz-18">Pengalaman Terakhir</label>
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Nama Instansi </p>
                <p class="d-sm-none">Nama Instansi </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nama_instansi; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Jabatan </p>
                <p class="d-sm-none">Jabatan </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nama_jabatan; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Masuk </p>
                <p class="d-sm-none">Tahun Masuk </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->tahun_mulai; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Selesai </p>
                <p class="d-sm-none">Tahun Selesai </p>
            </div>
            <div class="col-md-6 col-12">
                <p for="ktppegawai" class="fz-14 hitamsemu"><?php echo $dataKaryawannya->tahun_selesai; ?></p>
            </div>
        </div>

    </div>
</div>
