<div class="row">
    <div class="col-md-6 col-12">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">No. KTP </p>
                <p  class="d-sm-none fz-14 hitam">No. KTP </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="nik_ktp" type="text" class="form-control fcheight" id="ktppegawai" onkeypress="return hanyaAngka(event);" maxlength="16"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">NO. NPWP </p>
                <p  class="d-sm-none fz-14 hitam">NO. NPWP </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="no_npwp" type="text" class="form-control fcheight" id="npwppegawai"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Tempat Pembuatan NPWP </p>
                <p  class="d-sm-none fz-14 hitam">Tempat Pembuatan NPWP </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="tempat_buat" type="text" class="form-control fcheight" id="tempatnpwp" onkeypress="return hanyaHuruf(event);"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Nama Lengkap Pegawai </p>
                <p  class="d-sm-none fz-14 hitam">Nama Lengkap Pegawai </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="nama_lengkap" type="text" class="form-control fcheight" id="inppegawai" onkeypress="return hanyaHuruf(event);" />
                <div id="selepegawai">
                <select name="id_pelamar" onchange="pelamarDtl(this.value);" class="form-control" id="selpegawai"  >
                </select>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Nama Panggilan Pegawai </p>
                <p  class="d-sm-none fz-14 hitam">Nama Panggilan Pegawai </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="nama_panggilan" type="text" class="form-control fcheight" id="inppegawai2" onkeypress="return hanyaHuruf(event);"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Agama </p>
                <p  class="d-sm-none fz-14 hitam">Agama </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_agama" class="form-control select2 fcheight" id="selagama" >
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

    </div>

    <div class="col-md-6 col-12" id="rowjabatan2">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Tempat, Tanggal Lahir </p>
                <p  class="d-sm-none fz-14 hitam">Tempat, Tanggal Lahir </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" class="form-control fcheight" name="tempat_lahir" id="tempat_lahir" onkeypress="return hanyaHuruf(event);"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                
            </div>

            <div class="col-md-6 col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control datepicker2 fcheight" id="tanggal_lahir" data-provide="datepicker" data-date-format="yyyy-mm-dd" name=""  readonly data-id="datepicker2"/>
                    <input type="hidden" name="tanggal_lahir" id="datepicker2">
                </div>
            </div>
        </div>

        <div class="row form-group" id="rowjabatan2">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Jenis Kelamin </p>
                <p  class="d-sm-none fz-14 hitam">Jenis Kelamin </p>
            </div>
            <div class="col-md-6 col-12">
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
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Status Nikah </p>
                <p  class="d-sm-none fz-14 hitam">Status Nikah </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_sts_nikah" class="form-control select2 fcheight" id="selstsnikah" >
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
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Golongan Darah </p>
                <p  class="d-sm-none fz-14 hitam">Golongan Darah </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="golongan_darah" class="form-control select2 fcheight" id="selgoldar">
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
    </div>

    <div class="col-md-6 col-12">
        <label class="fz-18">Pendidikan Terakhir</label>
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Pendidikan Terakhir </p>
                <p class="d-sm-none">Pendidikan Terakhir </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_pendidikan" class="form-control select2 fcheight" id="selpendidikan" >
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
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Nama Institusi </p>
                <p class="d-sm-none">Nama Institusi </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="nama_sekolah" class="form-control fcheight" onkeypress="return Alamat(event);"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Jurusan  </p>
                <p class="d-sm-none">Jurusan  </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="jurusan" class="form-control fcheight" onkeypress="return Alamat(event);"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Masuk </p>
                <p class="d-sm-none">Tahun Masuk  </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="tahun_masuk" class="form-control fcheight" id="thn_masuk_didik"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Lulus  </p>
                <p class="d-sm-none">Tahun Lulus  </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="tahun_lulus" class="form-control fcheight" id="thn_lulus_didik"  />
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
                <input type="text" name="nama_perusahaan" class="form-control fcheight" onkeypress="return Alamat(event);"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Jabatan </p>
                <p class="d-sm-none">Jabatan </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="nama_jabatan" class="form-control fcheight" onkeypress="return Alamat(event);"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Masuk </p>
                <p class="d-sm-none">Tahun Masuk </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="tahun_mulai" class="form-control fcheight" id="thn_masuk_kerja"  />
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class=" hidden-sm">Tahun Selesai </p>
                <p class="d-sm-none">Tahun Selesai </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" name="tahun_selesai" class="form-control fcheight" id="thn_lulus_kerja"  />
            </div>
        </div>

        
    </div>

</div>
<!-- End New -->

