
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Departemen & Divisi / Edit Divisi</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                 <h6 class="tittle-box">Edit Divisi</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form method="post" action="<?php echo base_url()?>HR/ProsesEditDivisi/<?php echo $this->uri->segment(4) ?>" >
                        <div class="row">
                            <input type="hidden" name="id" class="form-control" required value="<?php echo $datadivisi->id_divisi ?>">
                            <div class="col-md-3 col-5 m-t-10"  align="right">
                                <label>Nama Divisi </label>
                            </div>
                            <div class="col-md-4 col-7">
                                <input type="text" name="nama_divisi" class="form-control" required value="<?php echo $datadivisi->nama_divisi ?>">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3" >
                            </div>
                            <div class="col-md-9 col-6" >
                                <button type="submit" class="btn btn-blue1">Simpan</button>
                                <a href="<?php echo base_url()?>HR/HRDepartemen" class="btn btn-red1">Batal</a>
                            </div>
                        </div>
                        <br>
                        </form>
                    </div>
                </div>
                    
                </div> 
            </div>


         
                        
         