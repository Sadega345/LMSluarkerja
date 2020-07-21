
            
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="container">
                        <div class="row">
                            <input type="hidden" name="id" class="form-control" required value="<?php echo $datalembur->id_lembur ?>">
                            <div class="col-md-3 col-12  m-t-10">
                                <label class="float-right hidden-sm">Jenis Lembur  </label>
                                <label class="d-sm-none">Jenis Lembur </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="jenis_lembur" class="form-control" required value="<?php echo $datalembur->jenis_lembur ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Value Lembur</label>
                                <label class="d-sm-none">Value Lembur</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="value_lembur" class="form-control" required value="<?php echo $datalembur->value_lembur ?>" onkeypress="return hanyaAngka(event)">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>


         
                        
         