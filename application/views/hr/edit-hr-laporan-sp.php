
             <?php  
                $a=explode("-", $datateguran->berlaku_mulai); 
                $b=explode("-", $datateguran->berlaku_sampai); 
                $berlaku_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                $berlaku_sampai=$b[2].'/'.$b[1].'/'.$b[0]; 
            ?>
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pelaporan / Laporan SP</h6>
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
                        <form action="<?php echo base_url()?>HR/ProsesEditLaporanSP" method="post">
                            <input type="hidden" name="id" value="<?php echo $datateguran->id_teguran ?>">
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Karyawan  </label>
                                    <label class="d-sm-none">Karyawan</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <select name="nik" class="form-control  select2" data-placeholder="Pilih Karyawan" tabindex="2" required>
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
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Status Teguran  </label>
                                    <label class="d-sm-none">Status Teguran</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <select name="status_teguran" class="form-control  select2" data-placeholder="Pilih Status" tabindex="2" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="1" <?php echo $datateguran->status_teguran=='1'?'selected':''; ?>>SP1</option>
                                            <option value="2" <?php echo $datateguran->status_teguran=='2'?'selected':''; ?>>SP2</option>
                                            <option value="3" <?php echo $datateguran->status_teguran=='3'?'selected':''; ?>>SP3</option>
                                    </select>
                                </div>
                            </div>
                           <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm"> Masa Berlaku </label>
                                    <label class="d-sm-none">Masa Berlaku</label>
                                </div>
                                <div class="col-md-9 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control" id="start" name="" data-date-format="yyyy-mm-dd" required readonly value="<?php echo  $berlaku_mulai ?>" data-id="startdate">
                                        </div>
                                        
                                        <span class="input-group-addon text-center mb-3" style="width: 40px;">s/d</span>
                                        
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control" id="end" name="" data-date-format="dd/mm/yy" required readonly value="<?php echo $berlaku_sampai?>" data-id="enddate">

                                            <input type="hidden" name="berlaku_mulai" id="startdate" value="<?php echo $datateguran->berlaku_mulai ?>">
                                            <input type="hidden" name="berlaku_sampai" id="enddate" value="<?php echo $datateguran->berlaku_sampai?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Alasan  </label>
                                    <label class="d-sm-none">Alasan</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <textarea name="alasan" class="form-control"><?php echo $datateguran->alasan; ?></textarea>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-3 " >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <a href="<?php echo base_url()?>HR/LaporanSP" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>  
                    
                </div> 
            </div>


         
                        
         