<div class="row">
    <div class="col-md-6 col-12">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Provinsi </p>
                <p  class="d-sm-none fz-14 hitam">Provinsi </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_provinsi" class="form-control select2 fcheight" onchange="pilihKab(this.value,0);" id="selprov" >
                    <option value="" selected disabled>-- Pilih Provinsi --</option>
                    <?php
                    foreach($dataProvinsi->result() as $dtprov){
                        ?>
                        <option value="<?php echo $dtprov->id_provinsi; ?>"> <?php echo $dtprov->deskripsi; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row form-group" id="rowkab">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Kabupaten </p>
                <p  class="d-sm-none fz-14 hitam">Kabupaten </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_kabupaten" class="form-control select2 fcheight" id="selkab" onchange="pilihKec(this.value,0);" >
                </select>
            </div>
        </div>

        <div class="row form-group" id="rowkec">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Kecamatan </p>
                <p  class="d-sm-none fz-14 hitam">Kecamatan </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="id_kecamatan" class="form-control select2 fcheight" id="selkec" >
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Alamat </p>
                <p  class="d-sm-none fz-14 hitam">Alamat </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="alamat" type="text" id="alamat" class="form-control fcheight" onkeypress="return Alamat(event);" >
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Kode Pos </p>
                <p  class="d-sm-none fz-14 hitam">Kode Pos </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="kode_pos" type="text" id="kodepos"  onkeypress="return hanyaAngka(event);"  class="form-control fcheight" >
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Nomor Telepon </p>
                <p  class="d-sm-none fz-14 hitam">Nomor Telepon </p>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-mobile-phone"></i></span>
                    </div>
                    <input name="nomor_telepon" type="text" id="nomor_telepon"  onkeypress="return hanyaAngka(event);"  class="form-control fcheight" >
                </div>
                
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Nama Kerabat </p>
                <p  class="d-sm-none fz-14 hitam">Nama Kerabat </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="nama_kerabat" type="text" class="form-control fcheight" >
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Hubungan Kerabat </p>
                <p  class="d-sm-none fz-14 hitam">Hubungan Kerabat </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="hubungan_kerabat" type="text" class="form-control fcheight" >
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Nomor Telepon Kerabat</p>
                <p  class="d-sm-none fz-14 hitam">Nomor Telepon Kerabat</p>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-mobile-phone"></i></span>
                    </div>
                    <input name="nomor_telepon_kerabat" type="text" id="nomor_teleponrabat"  onkeypress="return hanyaAngka(event);"  class="form-control fcheight" >
                </div>
                
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Alamat Kerabat yang bisa di hub </p>
                <p  class="d-sm-none fz-14 hitam">Alamat Kerabat yang bisa di hub </p>
            </div>
            <div class="col-md-6 col-12">
                <input name="alamat_ketika_urgent" type="text"  onkeypress="return Alamat(event);"  class="form-control fcheight" >
            </div>
        </div>

    </div>

    <div class="col-md-6 col-12">
        <label class="fz-18">Data User</label>
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Email *</p>
                <p  class="d-sm-none fz-14 hitam">Email *</p>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <input name="email" id="email" type="text" class="form-control fcheight" data-parsley-trigger="change" data-parsley-type="email" data-parsley-validate-full-width-characters="true" required>
                </div>
                
            </div>
        </div>

       <!--  <div class="row form-group" id="rowpass">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Password *</p>
                <p  class="d-sm-none fz-14 hitam">Password *</p>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input name="password" id="password" type="password" class="form-control fcheight"  required="">
                </div>
            </div>
        </div> -->

    </div>
</div>
<!-- End New -->

