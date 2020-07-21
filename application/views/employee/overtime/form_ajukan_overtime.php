            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="container ">
                        <!-- Nama Pegawai -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Pegawai </p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Nama Pegawai </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="input" name="nama" class="form-control fcheight" required="" value="<?php echo $dataKaryawanRow->nama_lengkap; ?>" disabled="">
                                    </div>
                                </div>
                                <!-- Penanggung Jawab -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Penanggung Jawab </p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Penanggung Jawab </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="text"  class="form-control fcheight" required value="<?php echo $dataAtasan->nama_panggilan ?>" disabled="">
                                        <input type="hidden" name="nik_atasan" class="form-control fcheight" required value="<?php echo $dataAtasan->nama_atasan ?>" >
                                    </div>
                                </div>
                            
                            <!-- Penanggung Jawab -->
                            <?php //echo "jumlah".$ambildataKaryawan->num_rows(); ?>
                           <!--  <div class="row m-t-10">
                                <div class="col-md-3">
                                    <p class="float-left hidden-sm fz-14-judul m-t-20">Penanggung Jawab* </p> 
                                    <p class="d-sm-none fz-14-judul">Penanggung Jawab* </p>    
                                </div>
                                <div class="col-md-6 col-12" align="left">
                                   <select name="nik_atasan"  class="form-control select2 fcheight"  required>
                                        <option value="">--Pilih--</option>
                                        <?php
                                          // foreach($ambildataKaryawan->result() as $atasan){ 
                                        ?>
                                                <option value="<?php //echo $atasan->nik;?>"><?php //echo $atasan->nik.'-'.$atasan->nama_lengkap?></option>
                                        <?php
                                          // }
                                        ?>  
                                    </select> -->
                                    <!-- <input type="text" name="nama_atasan" class="form-control fcheight" required value="<?php// echo $dataAtasan->nama_panggilan ?>" disabled="">
                                    <input type="hidden" name="nik_atasannya" class="form-control fcheight" required value="<?php //echo $dataAtasan->nama_atasan ?>" > -->
                              <!--   </div>
                            </div> -->
                            <br>
                                <!-- Departemen -->
                                <!-- <div class="row m-t-10" id="departemen">
                                    <div class="col-md-3 col-12" >
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Departemen </p>
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Departemen </p>      
                                    </div>
                                     <div class="col-md-6 col-12" align="left">
                                        <input type="text" name="departemen" class="form-control fcheight" id="depart" required>
                                    </div>
                                </div> -->

                                

                                <!-- Tanggal -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Tanggal Lembur</p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Tanggal Lembur</p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="date" name="tanggal" class="form-control fcheight" required="">
                                    </div>
                                </div>

                                <!-- Departemen -->
                                <!-- <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Departemen</p>  
                                        <p class="d-sm-none fz-14-judul">Departemen </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="input" name="nama" class="form-control fcheight" required="" value="<?php //echo $dataLeave->desDepartemen; ?>" disabled="">
                                    </div>
                                </div> -->

                                <!-- Jam Mulai -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Jam Mulai </p> 
                                        <p class="d-sm-none fz-14-judul">Jam Mulai </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <div class=" input-group" >
                                            <div class="input-group mb-3" style="display: contents;">
                                                 <input type="text" id="waktuawal" name="awal" class="form-control fcheight" autocomplete="off">
                                            </div>
                                            
                                            <span class="input-group-addon text-center mb-3 m-t-20" style="width: 40px;">-</span>
                                            
                                            <div class="input-group mb-3" style="display: contents;">
                                                <input type="text" id="waktuakhir" name="akhir" class="form-control fcheight" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">attachment file </p>    
                                        <p class="d-sm-none fz-14-judul">attachment file </p>       
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                      <input type="file" name="dokumen" class="form-control fcheight" id="dropify-event" data-allowed-file-extensions="jpeg jpg png pdf">
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Keterangan Lembur  </p>    
                                        <p class="d-sm-none fz-14-judul">Keterangan Lembur  </p>      
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <textarea cols="78" rows="3" name="keterangan" class="form-control"></textarea>
                                    </div>
                                </div> 
                                <input type="hidden" name="nik" class="form-control" value="<?php echo $this->session->userdata('nik'); ?>">
                                
                </div>
            </div>

            <script type="text/javascript">
              $(document).ready(function(){
                  // $("#pegawai").hide();
                  $("#departemen").hide();
                  // $("#perusahaan").hide();
              });
              function pilihNik(nik){
                  if(nik!=""){
                      $.ajax({
                            type: "POST",
                        url: "<?php echo base_url(); ?>Employee/ambilNamakaryawan", 
                        data: {nik : nik}, 
                        dataType: "json",
                        beforeSend: function(e) {
                          if(e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                          }
                        },
                        success: function(response){ 
                          // $("#pegawai").show();
                          $("#departemen").show();
                          // $("#perusahaan").show();
                          
                        // $('#peg').val(response.data_karyawan.nama_lengkap);
                        // $('#peg').attr('readonly',true);

                        $('#depart').val(response.data_karyawan.jenis_project);
                        $('#depart').attr('readonly',true);

                        // $('#per').val(response.data_karyawan.nama_perusahaan);
                        // $('#per').attr('readonly',true);


                        },
                        error: function (xhr, ajaxOptions, thrownError) { 
                          alert(thrownError); 
                        }
                      }); 
                  } else {
                      $("#pegawai").hide();
                  }
              }   
          </script>