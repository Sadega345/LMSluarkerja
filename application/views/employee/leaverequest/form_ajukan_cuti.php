            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="container ">
                         
                            <?php 
                                $TotCuti=0; 
                                foreach ($dataLeaves->result() as $leave ) { 
                                    
                                    if ($leave->status == 1) {
                                        $TotCuti=$TotCuti+$leave->lama_cuti+1;
                                    }
                                ?>
                            <?php } ?>
                           <!--  <div class="row">
                                <div class="col-md-3 col-12">
                                    <p class="float-left hidden-sm fz-14-judul m-t-20" >Sisa Cuti : </p>    
                                    <p class="d-sm-none fz-14-judul fz-14-judul">Sisa Cuti : </p> 
                                </div>
                                <div class="col-md-6 col-12">
                                    <span>
                                        <?php 
                                          //  $sisa = $dataSumCutiPribadi->row()->total;
                                         ?>
                                        <p class="float-left hidden-sm fz-14-judul m-t-20" ><?php //echo $sisa ?> Hari</p>    
                                        <p class="d-sm-none fz-14-judul fz-14-judul"><?php //echo $sisa ?> Hari </p>
                                    </span>
                                </div>
                            </div> -->
                            <br>
                                <!-- Penanggung Jawab -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Penanggung Jawab </p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Penanggung Jawab </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="text" name="nama_atasan" class="form-control fcheight" required value="<?php echo $dataAtasan->nama_panggilan ?>" disabled="">
                                        <input type="hidden" name="nik_atasannya" class="form-control fcheight" required value="<?php echo $dataAtasan->nama_atasan ?>" >
                                    </div>
                                </div>
                                <!-- Nama Pegawai -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Pegawai </p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Nama Pegawai </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="input" name="nama" class="form-control fcheight" required="" value="<?php echo $dataLeave->nama_lengkap; ?>" disabled="">
                                    </div>
                                </div>

                                <!-- Jabatan -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Jabatan</p>  
                                        <p class="d-sm-none fz-14-judul">Jabatan </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="input" name="nama" class="form-control fcheight" required="" value="<?php echo $dataLeave->jenis_project; ?>" disabled="">
                                    </div>
                                </div>

                                <!-- Departemen -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Departemen</p>  
                                        <p class="d-sm-none fz-14-judul">Departemen </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="input" name="nama" class="form-control fcheight" required="" value="<?php echo $dataLeave->desDepartemen; ?>" disabled="">
                                    </div>
                                </div>

                                <!-- Type Cuti -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Leave Kategory </p> 
                                        <p class="d-sm-none fz-14-judul">Leave Kategory  </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                         <select name="id_leave_kategori"  class="form-control  select2 fcheight"  tabindex="2" required onchange="sts(this.value)">
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    foreach($dataCuti->result() as $dt){ ?>
                                                        
                                                        <option value="<?php echo $dt->id_leave_kategori;?>"><?php echo $dt->deskripsi?> </option>

                                                <?php
                                                    }
                                                ?>  
                                            </select>
                                    </div>
                                </div>

                                <!-- Tanggal Mulai -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Tanggal Mulai </p>    
                                        <p class="d-sm-none fz-14-judul">Tanggal Mulai </p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control tglval fcheight" data-id="startdate" id="start2" data-date-format="dd-mm-yyyy" required autocomplete="off">
                                                <input type="hidden" name="leave_from" id="startdate">
                                            </div>
                                            
                                            <span class="input-group-addon text-center mb-3 m-t-20" style="width: 40px;">-</span>
                                            
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control tglval fcheight" data-id="enddate" id="end2"  data-date-format="dd-mm-yyyy" required autocomplete="off">
                                                <input type="hidden" name="leave_to" id="enddate">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Selama Cuti -->
                                <div class="row m-t-10">
                                    
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Selama Cuti dapat menghubungi  </p>    
                                        <p class="d-sm-none fz-14-judul">Selama Cuti dapat menghubungi  </p>      
                                    </div>
                                    <div class="col-md-6 col-12"  align="left">
                                      <input type="text" name="contact_person" class="form-control fcheight" required="">
                                    </div>
                                </div> 

                                <!-- Telepon -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Telepon  </p>    
                                        <p class="d-sm-none fz-14-judul">Telepon </p>      
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                      <input type="text" name="contact" class="form-control fcheight" required="">
                                    </div>
                                </div> 

                                <!-- Serah Terima -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Serah terima tugas kerja kepada </p>    
                                        <p class="d-sm-none fz-14-judul">Serah terima tugas kerja kepada </p>      
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                      <input type="text" name="serah_tugas_kepada" class="form-control fcheight" required="">
                                    </div>
                                </div> 

                                <!-- Bagian -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Alasan  </p>    
                                        <p class="d-sm-none fz-14-judul">Alasan </p>      
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                      <input type="text" name="keterangan" class="form-control fcheight" required="">
                                    </div>
                                </div>
                                    <!-- <div class="col-lg-6">
                                        <input type="date" name="leave_from" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-lg-2" >
                                        <label class="float-left hidden-sm fz-14-judul m-t-20">Tanggal Akhir </label>    
                                        <label class="d-sm-none fz-14-judul">Tanggal Akhir </label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="date" name="leave_to" class="form-control" required="">
                                    </div> -->
                               <!--  <div class="row m-t-10">
                                    <div class="col-lg-2">
                                        <label class="float-left hidden-sm fz-14-judul m-t-20">Dokumen </label>    
                                        <label class="d-sm-none fz-14-judul">Dokumen </label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" name="dokumen" class="form-control">
                                    </div>
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-lg-2">
                                        <label class="float-left hidden-sm fz-14-judul m-t-20">Keterangan Cuti  </label>    
                                        <label class="d-sm-none fz-14-judul">Keterangan Cuti  </label>      
                                    </div>
                                    <div class="col-lg-6">
                                    	<textarea cols="78" rows="3" name="reason" class="form-control"></textarea>
                                    </div>
                                </div> -->
                                <div class="row m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">attachment file </p>    
                                        <p class="d-sm-none fz-14-judul">attachment file </p>       
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                      <input type="file" name="dokumen" class="form-control fcheight " id="dropify-event" data-allowed-file-extensions="jpeg jpg png pdf">
                                      
                                    </div>
                                </div> 
                                <input type="hidden" name="nik" class="form-control" value="<?php echo $this->session->userdata('nik'); ?>">
                                <input type="hidden" name="status" class="form-control" value="0">
                                
                </div>
            </div>
        
        
        <!-- <script type="text/javascript">
            $( function() {
            var dateFormat = "dd-mm-yy",
              from = $( "#start" )
                .datepicker({
                  minDate: new Date(),
                  changeMonth: true,
                  numberOfMonths: 3,
                  dateFormat: "dd/mm/yy"
                })
                .on( "change", function() {                    
                  to.datepicker( "option", "minDate", getDate( this ) );
                }),

              to = $( "#end" ).datepicker({
                defaultDate: new Date(),
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: "dd/mm/yy",
                beforeShow: function(a,b){
                    var maxDate = $('#start').datepicker("getDate");
                    var minDate = $('#end').datepicker("getDate");
                    maxDate.setDate(maxDate.getDate()+<?php //echo $sisa ?>);
                    console.log(minDate);
                    to.datepicker( "option", "maxDate", maxDate );
                    to.datepicker( "option", "minDate", minDate );
                }

                
              })
              .on( "change", function() {

                // var datestart = $('#start').datepicker("getDate");
                // datestart.setDate(datestart.getDate()+2);
                // from.datepicker( "option", "maxDate", getDate(this) );
              });
         
            function getDate( element ) {
              var date;
              try {
                date = $.datepicker.parseDate( dateFormat, element.value );
              } catch( error ) {
                date = null;
              }
         
              return date;
            }
          } );
            
        </script> -->
            <!-- <?php //$this->load->view("employee/leaverequest/proses_ajukan_cuti") ;?> -->