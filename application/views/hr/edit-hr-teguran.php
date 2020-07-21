
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / SP</h6>
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
                                 <h6 class="tittle-box">Edit SP</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesEditTeguran" method="post">
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo $datateguran->id_teguran ?>">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>Karyawan :</label>
                                </div>
                                <div class="col-md-4 col-7">
                                    <select name="nik" class="form-control  select2me" data-placeholder="Pilih Karyawan" tabindex="2" required>
                                            <option value="">--Pilih Karyawan--</option>
                                    <?php
                                        foreach($datakaryawan->result() as $dt){ ?>
                                            <option value="<?php echo $dt->nik;?>" <?php echo $dt->nik==$datateguran->nik?'selected':''; ?> > <?php echo $dt->nik;?> - <?php echo $dt->nama_lengkap;?></option>
                                    <?php
                                        }
                                    ?>  
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>Status Teguran </label>
                                </div>
                                <div class="col-md-4 col-7">
                                    <select name="status_teguran" class="form-control  select2me" data-placeholder="Pilih Status" tabindex="2" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="1" <?php echo $datateguran->status_teguran=='1'?'selected':''; ?>>SP1</option>
                                            <option value="2" <?php echo $datateguran->status_teguran=='2'?'selected':''; ?>>SP2</option>
                                            <option value="3" <?php echo $datateguran->status_teguran=='3'?'selected':''; ?>>SP3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>Alasan </label>
                                </div>
                                <div class="col-md-9 col-7">
                                    <textarea name="alasan" class="form-control"><?php echo $datateguran->alasan; ?></textarea>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 " >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <a href="<?php echo base_url()?>HR/HRTeguran" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>  
                    
                </div> 
            </div>


         
                        
         