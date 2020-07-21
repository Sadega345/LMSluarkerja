
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Absensi Pegawai / Permohonan Cuti</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-12" >
                                 <h6 class="tittle-box">Pengajuan Cuti</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                        <div class="container">
                            <form action="<?php echo base_url()?>HR/ProsesTambahCuti" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3 col-12" >
                                        <label class="float-right hidden-sm">Nama Pegawai </label>
                                        <label class="d-sm-none">Nama Pegawai </label>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <select name="nik" class="form-control select2" data-placeholder="Pilih Karyawan" tabindex="2" required>
                                                <option value="">--Pilih Karyawan--</option>
                                        <?php
                                            foreach($datakaryawan->result() as $dt){ ?>
                                                <option value="<?php echo $dt->nik;?>"><?php echo $dt->nik;?> - <?php echo $dt->nama_lengkap;?></option>
                                        <?php
                                            }
                                        ?>  
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12" >
                                        <label class="float-right hidden-sm">Jenis Cuti </label>
                                        <label class="d-sm-none">Jenis Cuti</label>   
                                    </div>
                                     <div class="col-md-4 col-12" align="left">
                                        <select name="id_leave_kategori" class="form-control select2" data-placeholder="Pilih Cuti" tabindex="2" required>
                                                <option value="">--Pilih Cuti--</option>
                                        <?php
                                            foreach($datakategoricuti->result() as $dt){ ?>
                                                <option value="<?php echo $dt->id_leave_kategori;?>"><?php echo $dt->deskripsi;?></option>
                                        <?php
                                            }
                                        ?>  
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12" >
                                        <label class="float-right hidden-sm">Tanggal Pengajuan</label>
                                        <label class="d-sm-none">Tanggal Pengajuan</label>
                                    </div>
                                    <div class="col-md-9 col-12" >
                                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control tglval" id="start" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" data-id="startdate">
                                            </div>
                                            
                                            <span class="input-group-addon text-center mb-3" style="width: 40px;">s/d</span>
                                            
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control tglval" id="end" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" data-id="enddate" >
                                            </div>
                                            <input type="hidden" name="tanggal" id="startdate">
                                            <input type="hidden" name="sampe_tanggal" id="enddate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12" >
                                        <label class="float-right hidden-sm">Dokumen (file jpg| jpeg| png| pdf) </label>
                                        <label class="d-sm-none">Dokumen </label>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <input type="file" name="dokumen" class="form-control" data-allowed-file-extensions="jpg jpeg png pdf" id="dropify-event">
                                    </div>
                                    <div class="col-md-4 col-12" >
                                      File ( jpg| jpeg| png| pdf) 
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12" >
                                        <label class="float-right hidden-sm">Keterangan Cuti </label>
                                        <label class="d-sm-none">Keterangan Cuti</label>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <textarea name="keterangan" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row m-t-10">
                                    <div class="col-md-3" >
                                    </div>
                                    <div class="col-md-12 col-12" align="center">
                                        <button type="submit" class="btn btn-blue1">Tambah</button>
                                        <a href="<?php echo base_url()?>HR/HRPermohonanCuti" class="btn btn-red1">Batal</a>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            

         
                        
         