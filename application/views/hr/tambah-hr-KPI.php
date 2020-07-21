
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / KPI</h6>
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
                                 <h6 class="tittle-box">Tambah KPI</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesTambahKPI" method="post">
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Jabatan </label>
                                    <label class="d-sm-none">Jabatan </label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <select name="id_jabatan" class="form-control  select2me" data-placeholder="Pilih Kebijakan" tabindex="2" required>
                                            <option value="">--Pilih Jabatan--</option>
                                    <?php
                                        foreach($datajabatan->result() as $dt){ ?>
                                            <option value="<?php echo $dt->id_master_jenis_project;?>"><?php echo $dt->jenis_project;?></option>
                                    <?php
                                        }
                                    ?>  
                                    </select>
                                </div>
                            </div>
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Aspek Performance </label>
                                    <label class="d-sm-none">Aspek Performance</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <textarea name="aspek_performance" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Nilai Performance </label>
                                    <label class="d-sm-none">Nilai Performance</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <textarea name="nilai_performance" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-3 " >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button type="submit" class="btn btn-blue1">Tambah</button>
                                    <a href="<?php echo base_url()?>HR/HRKPI" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>  
                    
                </div> 
            </div>


         
                        
         