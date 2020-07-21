
            
            
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="container">
                        
                        <div class="row">
                             <input type="hidden" name="id" class="form-control" value="<?php echo $databankpayroll->id_bank ?>">
                            <div class="col-md-3 col-12  m-t-10">
                                <label class="float-right hidden-sm">Bank : </label>
                                <label class="d-sm-none">Bank : </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="deskripsi" class="form-control"  value="<?php echo $databankpayroll->deskripsi ?>">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-3 col-12  m-t-10">
                                <label class="float-right hidden-sm">Biaya : </label>
                                <label class="d-sm-none">Biaya : </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="biaya" class="form-control"  value="<?php echo $databankpayroll->biaya ?>" onkeypress="return hanyaAngka(event)">
                            </div>
                        </div>
                        
                        
                    </div>
                </div> 
            </div>


         
                        
         