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
            <h6 class="tittle-box text-center m-t-30">Tambah Aturan Penggajian BPJS KESEHTAN</h6>
            <div class="body">
            	<form method="post" id="simpan" action="<?php echo base_url() ?>Outsource/ProsesTambahBPJSKES">
                		<input type="hidden" name="id_master_perusahaan" value="<?php echo $this->uri->segment(3) ?>">
                    <!-- <div class="row m-t-10">
                      <div class="col-md-3 col-12 ">
                          <label class="float-right hidden-sm">Prosentase (%)</label>
                          <label class="d-sm-none">Prosentase (%)  </label>
                      </div>
                      <div class="col-md-3 col-12">
                        <input type="text" class="form-control" required name="presentase" placeholder="Prosentase (%)" onkeypress="return hanyaAngka(event)">
                      </div>
                    </div> -->
                    <div class="row m-t-10">
                      <div class="col-md-3 col-12 ">
                          <label class="float-right hidden-sm">Nama Tujangan</label>
                          <label class="d-sm-none">Nama Tujangan  </label>
                      </div>
                      <div class="col-md-6 col-12">
                        <select name="id_jenis_tunjangan" class="form-control  select2" data-placeholder="Pilih Nama Tunjangan" tabindex="2" required>
                                <option value="">--Pilih Nama Tunjangan--</option>
                        <?php
                            foreach($datatunjangan->result() as $dt){ ?>
                                <option value="<?php echo $dt->id_jenis_tunjangan;?>"><?php echo $dt->jenis_tunjangan;?></option>
                        <?php
                            }
                        ?>  
                        </select>
                      </div>
                    </div>
                    <div class="row m-t-10">
                      <div class="col-md-3 col-12 ">
                      </div>
                      <div class="col-md-6 col-12">
                        <button type="submit" class="btn btn-blue col-md-3">Simpan</button>
                        <a href="<?php echo base_url() ?>Outsource/PO_EditPerusahaanDtl/<?php echo $this->uri->segment(3) ?>"><button type="button" class="btn btn-danger col-md-3">Kembali</button></a>
                      </div>
                    </div>
		            <!-- <div class="form-group m-t-10">
		            	<button type="submit" class="btn btn-blue col-md-3">Simpan</button>
		            	<a href="<?php //echo base_url() ?>Outsource/PO_EditPerusahaanDtl/<?php //echo $this->uri->segment(3) ?>"><button type="button" class="btn btn-danger col-md-3">Kembali</button></a>
		            </div> -->
	            </form>
	            	
            </div>
        </div>
    </div>
</div>
