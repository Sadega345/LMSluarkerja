<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Jenis Projek</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <h6 class="tittle-box text-center m-t-30">Edit Jenis Projek</h6>
            <div class="body">
            	<form method="post" id="simpan" action="<?php echo base_url() ?>Outsource/EditPOJenisProjek">
            		<div class="form-group">
		              <label>Jenis Projek  :</label>
                      <input type="hidden" class="form-control" required name="id" value="<?php echo $dataJenisProjek->id_master_jenis_project ?>">
		              <input type="text" class="form-control" required name="jenis_project" placeholder="Jenis Projek" value="<?php echo $dataJenisProjek->jenis_project ?>">
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="btn btn-blue col-md-3">Simpan</button>
		            	<a href="<?php echo base_url() ?>Outsource/masterJenisProjek"><button type="button" class="btn btn-danger col-md-3">Kembali</button></a>
		            </div>
	            </form>
	            	
            </div>
        </div>
    </div>
</div>
