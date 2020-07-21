<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Perusahaan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <h6 class="tittle-box text-center m-t-30">Tambah Perusahaan</h6>
            <div class="body">
            	<form method="post" id="simpan" action="<?php echo base_url() ?>Outsource/TambahPOPerusahaan">
            		<div class="form-group">
		              <label>Nama Perusahaan  :</label>
		              <input type="text" class="form-control" required name="nama_perusahaan" placeholder="Nama Perusahaan">
		            </div>
                    <div class="form-group">
                      <label>Alamat Perusahaan  :</label>
                      <textarea class="form-control" cols="20" rows="5" required name="alamat" placeholder="Alamat Perusahaan"></textarea>
                    </div>
                    <!-- <div class="form-group">
                      <label>Kota  :</label>
                      <input type="text" class="form-control" required name="kota" placeholder="Kota">
                    </div> -->
                    <div class="form-group">
                      <label>Contact Person  :</label>
                      <input type="text" class="form-control" required name="contact_person" placeholder="Contact Person">
                    </div>
                    <div class="form-group">
                      <label>No Telepon  :</label>
                      <input type="text" class="form-control" required name="no_telp" placeholder="No Telepon" onkeypress="return hanyaAngka(event)" maxlength="15">
                    </div>
                    <div class="form-group">
                      <label>No Faximile  :</label>
                      <input type="text" class="form-control" required name="no_faximile" placeholder="No Faximile" onkeypress="return hanyaAngka(event)" maxlength="25">
                    </div>
		            <div class="form-group">
		            	<button type="submit" class="btn btn-blue col-md-3">Simpan</button>
		            	<a href="<?php echo base_url() ?>Outsource/masterPerusahaan"><button type="button" class="btn btn-danger col-md-3">Kembali</button></a>
		            </div>
	            </form>
	            	
            </div>
        </div>
    </div>
</div>
