
<div class="row clearfix">
     <div class="col-lg-12 col-md-12">
            <div class="container">
            
                <div class="row">
                    <div class="col-md-3 col-12" >
                        <p class="float-left hidden-sm fz-14-judul m-t-20">NIK </p>
                        <p class="d-sm-none fz-14-judul">NIK </p>
                    </div>
                    <div class="col-md-4 col-12">
                        <select name="nik" class="form-control select2 fcheight" onchange="pilihNik(this.value);" id="selprov" required>
                            <option value="" selected disabled>-- Pilih NIK --</option>
                            <?php
                            foreach($datakaryawan->result() as $dtkaryawan){
                                ?>
                                <option value="<?php echo $dtkaryawan->nik; ?>"> <?php echo $dtkaryawan->nik."-".$dtkaryawan->nama_lengkap; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10" id="pegawai">
                    <div class="col-md-3 col-12" >
                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Pegawai </p>
                        <p class="d-sm-none fz-14-judul">Nama Pegawai </p>
                    </div>
                    <div class="col-md-4 col-12">
                        <input type="text" name="nama_pegawai" class="form-control fcheight" id="peg" required>
                    </div>
                </div>

                <div class="row m-t-10" id="departemen">
                    <div class="col-md-3 col-12" >
                        <p class="float-left hidden-sm fz-14-judul m-t-20">Departemen </p>
                        <p class="d-sm-none fz-14-judul">Departemen </p>      
                    </div>
                     <div class="col-md-4 col-12" align="left">
                        <input type="text" name="departemen" class="form-control fcheight" id="depart" required>
                    </div>
                </div>

                <div class="row m-t-10" id="perusahaan">
                    <div class="col-md-3 col-12" >
                        <p class="float-left hidden-sm fz-14-judul m-t-20">Perusahaan</p>
                        <p class="d-sm-none fz-14-judul">Perusahaan</p>    
                    </div>
                     <div class="col-md-4 col-12" align="left">
                        <input type="text" name="perusahaan" class="form-control fcheight" id="per" required>
                    </div>
                </div>

                <div class="row m-t-10">
                    <div class="col-md-3 col-12" >
                        <p class="float-left hidden-sm fz-14-judul m-t-20">Tanggal Kehadiran </p>
                        <p class="d-sm-none fz-14-judul">Tanggal Kehadiran </p>
                    </div>
                    <div class="col-md-8 col-12" >
                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                            <div class="input-group mb-3" style="display: contents;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" class="input-sm form-control tglval fcheight" id="startform" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" data-id="startdateform">
                            </div>
                            
                            <span class="input-group-addon text-center mb-3 m-t-20" style="width: 40px;">-</span>
                            
                            <div class="input-group mb-3" style="display: contents;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" class="input-sm form-control tglval fcheight" id="endform" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" data-id="enddateform">
                            </div>
                            <input type="hidden" name="tgl_kehadiran" id="startdateform">
                            <input type="hidden" name="tgl_keluar" id="enddateform">
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
                                 <input type="time" name="awal" step="1" class="form-control fcheight">
                            </div>
                            
                            <span class="input-group-addon text-center mb-3 m-t-20" style="width: 40px;">-</span>
                            
                            <div class="input-group mb-3" style="display: contents;">
                                <input type="time" name="akhir" step="1" class="form-control fcheight">
                            </div>
                        </div>
                    </div>
                </div>
                
        </div>
     
    </div> 
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#pegawai").hide();
        $("#departemen").hide();
        $("#perusahaan").hide();
    });
    function pilihNik(nik){
        if(nik!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilNamakaryawan", 
              data: {nik : nik}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#pegawai").show();
                $("#departemen").show();
                $("#perusahaan").show();
                
            	$('#peg').val(response.data_karyawan.nama_lengkap);
            	$('#peg').attr('readonly',true);

                $('#depart').val(response.data_karyawan.jenis_project);
            	$('#depart').attr('readonly',true);

            	$('#per').val(response.data_karyawan.nama_perusahaan);
            	$('#per').attr('readonly',true);


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
         
                        
         