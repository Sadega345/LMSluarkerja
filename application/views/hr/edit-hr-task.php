             <?php  
                $a=explode("-", $datatask->tanggal_mulai); 
                $b=explode("-", $datatask->tanggal_selesai); 
                $tgl_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                $tgl_selesai=$b[2].'/'.$b[1].'/'.$b[0]; 
            ?>
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard / Edit Task</h6>
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
                                 <h6 class="tittle-box">Edit Task</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesEditTask" method="post">
                            <div class="row">
                                <input type="hidden" name="id_detail_task" value="<?php echo $datatask->id_detail_task ?>">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>NIK </label>
                                </div>
                                <div class="col-md-6 col-7">
                                     <select name="nik" class="form-control  select2" data-placeholder="Pilih NIK" tabindex="2" required>
                                            <option value="">--Pilih NIK - Nama --</option>
                                    <?php
                                        foreach($datakaryawan->result() as $dt){ ?>
                                            <option value="<?php echo $dt->nik;?>" <?php echo  $dt->nik==$datatask->nik?'selected':''; ?>><?php echo $dt->nik;?> - <?php echo $dt->nama_lengkap;?></option>
                                    <?php
                                        }
                                    ?>  
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>Task </label>
                                </div>
                                <div class="col-md-9 col-7">
                                    <textarea name="task" class="form-control" required=""><?php echo $datatask->task; ?></textarea>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Tanggal Mulai</label>
                                    <label class="d-sm-none">Tanggal Mulai</label>
                                </div>
                                <div class="col-md-9 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control" id="start" name="" data-id="startdate" data-date-format="yyyy-mm-dd" required readonly value="<?php echo $tgl_mulai ?>">
                                        </div>
                                        
                                        <span class="input-group-addon text-center mb-3" style="width: 40px;">s/d</span>
                                        
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control" id="end" name="" data-id="enddate" data-date-format="yyyy-mm-dd" required readonly value="<?php echo $tgl_selesai ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="tanggal_mulai" id="startdate" value="<?php echo $datatask->tanggal_mulai ?>">
                            <input type="hidden" name="tanggal_selesai" id="enddate" value="<?php echo $datatask->tanggal_selesai?>">
                          
                            <div class="row m-t-10">
                                <div class="col-md-3 " >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <a href="<?php echo base_url()?>HR" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>  
                    
                </div> 
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#start').datepicker('setDate', new Date('<?php echo $datatask->tanggal_mulai ?>'));
                    $('#end').datepicker('setDate', new Date('<?php echo $datatask->tanggal_selesai ?>'));
                });
            </script>


         
                        
         