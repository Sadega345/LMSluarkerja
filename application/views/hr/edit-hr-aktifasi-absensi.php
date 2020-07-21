
            
            
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    
                        
                    <div class="container">
                        <input type="hidden" name="id" class="form-control" required value="<?php echo $dataKaryawanRow->id_absensi ?>">
                        <div class="row m-t-10">
                            <div class="col-md-3 col-12" >
                                <p class="float-left hidden-sm fz-14-judul m-t-20">NIK </p>
                                <p class="d-sm-none fz-14-judul">NIK </p>
                            </div>
                            <div class="col-md-4 col-12">
                                <input type="text" name="nik" readonly="" class="form-control fcheight" value="<?php echo $dataKaryawanRow->nik ?>">
                            </div>
                        </div>
                        
                        <div class="row m-t-10" id="pegawai">
                            <div class="col-md-3 col-12" >
                                    <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Pegawai </p>
                                    <p class="d-sm-none fz-14-judul">Nama  Pegawai</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <input type="text" name="nama_pegawai" class="form-control fcheight" readonly="" value="<?php echo $dataKaryawanRow->nama_lengkap ?>">
                                <!-- <select name="id_kabupaten" class="form-control" id="selkab" required>
                                </select> -->
                            </div>
                        </div>
                        <div class="row m-t-10" id="perusahaan">
                            <div class="col-md-3 col-12" >
                                    <p class="float-left hidden-sm fz-14-judul m-t-20">Unit Bisnis </p>
                                    <p class="d-sm-none fz-14-judul">Unit Bisnis</p>      
                            </div>
                             <div class="col-md-4 col-12" align="left">
                                <input type="text" name="perusahaan" class="form-control fcheight" id="per" value="<?php echo $dataKaryawanRow->nama_perusahaan ?>" readonly="" required>
                            </div>
                        </div>

                        <div class="row m-t-10" id="departemen">
                            <div class="col-md-3 col-12" >
                                    <p class="float-left hidden-sm fz-14-judul m-t-20">Departemen </p>
                                    <p class="d-sm-none fz-14-judul">Departemen </p>       
                            </div>
                             <div class="col-md-4 col-12" align="left">
                                <input type="text" name="departemen" class="form-control fcheight" id="depart" value="<?php echo $dataKaryawanRow->jenis_project ?>" readonly=""  required>
                            </div>
                        </div>

                       
                        <?php 
                            $where=array('id_absensi'=>$dataKaryawanRow->id_absensi);
                            $dataKaryawanRow=$this->Nata_hris_hr_model->dataAktifitasAbsensi($where)->row();
                            $dataTanggalMulai = explode(" ",$dataKaryawanRow->tanggal_mulai);
                            $dataTanggalSelesai = explode(" ",$dataKaryawanRow->tanggal_selesai);
                         ?>
                        <div class="row m-t-10">
                            <div class="col-md-3 col-12" >
                                <p class="float-left hidden-sm fz-14-judul m-t-20">Tanggal Kehadiran </p>
                                <p class="d-sm-none fz-14-judul">Tanggal Kehadiran </p>
                            </div>
                            <div class="col-md-8 col-12" >
                                <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <div class="input-group mb-3" style="display: contents;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" class="input-sm form-control tglval fcheight" id="startedit" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" data-id="startdateedit"> 
                                    </div>
                                    
                                    <span class="input-group-addon text-center mb-3 m-t-20" style="width: 40px;">-</span>
                                    
                                    <div class="input-group mb-3" style="display: contents;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" class="input-sm form-control tglval fcheight" id="endedit" data-id="enddateedit" name="" data-date-format="yyyy-mm-dd" required autocomplete="off">
                                    </div>
                                    <input type="hidden" name="tgl_kehadiran" id="startdateedit" value="<?php echo $dataTanggalMulai[0]  ?>">
                                    <input type="hidden" name="tgl_keluar" id="enddateedit" value="<?php echo $dataTanggalSelesai[0]  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-3 col-12" >
                                <p class="float-left hidden-sm fz-14-judul m-t-20">Waktu Kehadiran </p>
                                <p class="d-sm-none fz-14-judul">Waktu Kehadiran </p>
                            </div>
                            <div class="col-md-8 col-12" >
                                <div class=" input-group" >
                                    <div class="input-group mb-3" style="display: contents;">
                                         <input type="time" name="awal" step="1" class="form-control" value="<?php echo $dataKaryawanRow->tanggal_mulai!=Null?$dataTanggalMulai[1]:""?>">
                                    </div>
                                    
                                    <span class="input-group-addon text-center mb-3 m-t-20" style="width: 40px;">-</span>
                                    
                                    <div class="input-group mb-3" style="display: contents;">
                                        <input type="time" name="akhir" step="1" class="form-control" value="<?php echo $dataKaryawanRow->tanggal_selesai!=Null?$dataTanggalSelesai[1]:""?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                
                    
                </div> 
            </div>
            
            

                        
         