
  <div class="row ">
    <div class="col-md-6 ">
      <div class="row ">
        <div class="col-md-5 m-t-20 ">
            <p class="fz-14">Nama Perusahaan </p>       
        </div>
        <div class="col-md-7" align="left">
            <input type="hidden" class="form-control" required name="id_master_perusahaan"  value="<?php echo $dataperusahaan->id_master_perusahaan ?>">
          <input type="text" class="form-control fcheight"  name="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $dataperusahaan->nama_perusahaan ?>"> 
        </div>
      </div>
    </div>
    <div class="col-md-6 ">
      <div class="row ">
        <div class="col-md-5 m-t-20 ">
           <p class="fz-14">Alamat Perusahaan </p>      
        </div>
        <div class="col-md-7" align="left">
          <input type="text" class="form-control fcheight"  name="alamat" placeholder="alamat Perusahaan" value="<?php echo $dataperusahaan->alamat ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-6 ">
      <div class="row ">
        <div class="col-md-5 m-t-20 ">
            <p class="fz-14">Contact Person</p>      
        </div>
        <div class="col-md-7" align="left">
          <input type="text" class="form-control fcheight"  name="contact_person" placeholder="Contact Person" value="<?php echo $dataperusahaan->contact_person ?>">
        </div>
      </div>
    </div>
    <div class="col-md-6 ">
      <div class="row ">
        <div class="col-md-5 m-t-20 ">
            <p class="fz-14">No Telepon</p>      
        </div>
        <div class="col-md-7" align="left">
           <input type="text" class="form-control fcheight"  name="no_telp" placeholder="No Telepon" onkeypress="return hanyaAngka(event)" maxlength="15" value="<?php echo $dataperusahaan->no_telp ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-6 ">
      <div class="row ">
        <div class="col-md-5 m-t-20 ">
            <p class="fz-14">Logo</p>      
        </div>
        <div class="col-md-7" align="left">
           <input type="file" data-allowed-file-extensions="jpeg jpg png"  name="logo" id="dropify-event">
        </div>
      </div>
    </div>
    <div class="col-md-6 ">
      <div class="row ">
        <div class="col-md-5 m-t-20 ">
            <p class="fz-14">No Faximile</p>      
        </div>
        <div class="col-md-7" align="left">
           <input type="text" class="form-control fcheight"  name="no_faximile" placeholder="No Faximile" onkeypress="return hanyaAngka(event)" maxlength="25" value="<?php echo $dataperusahaan->no_faximile ?>">
        </div>
      </div>
    </div>
  </div>


