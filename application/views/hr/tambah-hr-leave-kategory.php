
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Nama Cuti</label>
                                <label class="d-sm-none">Nama Cuti</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="deskripsi" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Kategori Cuti</label>
                                <label class="d-sm-none">Kategori Cuti</label>
                            </div>
                            <div class="col-lg-6">
                                <select onchange="getval(this);" class="form-control" name="status" required>
                                	<option value="">Pilih Kategori</option>
                                    <option value="0">Pribadi</option>
                                    <option value="1">Khusus</option>
                                    <option value="2">Izin</option>
                                </select>
                            </div>
                        </div>
                        <div id="test">
	                        <div class="row">
	                            <div class="col-md-3 col-12 m-t-10">
	                                <label class="float-right hidden-sm">Jumlah Cuti</label>
	                                <label class="d-sm-none">Jumlah Cuti</label>
	                            </div>
	                            <div class="col-md-3">
	                                 <input type="text" onkeypress="return hanyaAngka(event)" name="jumlah_hari" class="form-control" value="0" required> 
	                            </div>
	                            <div class="col-md-2">
	                                Hari
	                            </div>
	                        </div>
	                    </div>
                    </div>
                </div> 
            </div>


         
                        
         