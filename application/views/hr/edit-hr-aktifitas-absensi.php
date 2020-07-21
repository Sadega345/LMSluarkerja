
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Absensi Pegawai / Aktifitas Absensi</h6>
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
                                 <h6 class="tittle-box">Edit Pengajuan Absensi</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form method="post" action="<?php echo base_url()?>HR/ProsesEditAktifitasAbsen" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" required value="<?php echo $dataumk->id_absensi ?>">
                        <div class="row m-t-10">
                            <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">NIK </label>
                                    <label class="d-sm-none">NIK </label>
                            </div>
                            <div class="col-md-4 col-7">
                                <select name="nik" class="form-control select2" onchange="pilihNik(this.value,0);" id="selprov" required>
                                  <?php
                                  foreach ($dataKaryawan->result() as $karyawan) {
                                    ?>
                                    <option value="<?php echo $karyawan->nik; ?>" <?php if($karyawan->nik == $dataumk->nik){echo "selected='selected'";} ?>><?php echo $karyawan->nik."-".$karyawan->nama_lengkap; ?></option>
                                    <?php
                                  }
                                  ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row m-t-10" id="pegawai">
                            <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Nama Pegawai </label>
                                    <label class="d-sm-none">Nama  Pegawai</label>
                            </div>
                            <div class="col-md-4 col-7">
                                <input type="text" name="nama_pegawai" value="<?php echo $dataKaryawanRow->nama_lengkap ?>">
                                <!-- <select name="id_kabupaten" class="form-control" id="selkab" required>
                                </select> -->
                            </div>
                        </div>

                        <div class="row m-t-10" id="departemen">
                            <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Departemen </label>
                                    <label class="d-sm-none">Departemen </label>       
                            </div>
                             <div class="col-md-4" align="left">
                                <input type="text" name="departemen" class="form-control" id="depart" value="<?php echo $dataKaryawanRow->jenis_project ?>" required>
                            </div>
                        </div>

                        <div class="row" id="perusahaan">
                            <div class="col-md-3 m-t-10" align="right">
                                <label>Perusahaan :</label>        
                            </div>
                             <div class="col-md-4" align="left">
                                <input type="text" name="perusahaan" class="form-control" id="per" value="<?php echo $dataKaryawanRow->nama_perusahaan ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-5 m-t-10"  align="right">
                                <label>Tanggal kehadiran :</label>
                            </div>
                            <div class="col-md-4 col-7">
                                <input type="date" name="tgl_kehadiran" value="<?php echo $dataKaryawanRow->tanggal_mulai ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-5 m-t-10"  align="right">
                                <label>Waktu Masuk :</label>
                            </div>
                            <div class="col-md-4 col-7">
                                <input type="time" name="awal" step="1" value="<?php echo $dataKaryawanRow->tanggal_mulai ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-5 m-t-10"  align="right">
                                <label>Tanggal Keluar :</label>
                            </div>
                            <div class="col-md-4 col-7">
                                <input type="date" name="tgl_keluar" value="<?php echo $dataKaryawanRow->tanggal_selesai ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-5 m-t-10"  align="right">
                                <label>Waktu Keluar :</label>
                            </div>
                            <div class="col-md-4 col-7">
                                <input type="time" name="akhir" step="1" value="<?php echo $dataKaryawanRow->tanggal_selesai ?>" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3" >
                            </div>
                            <div class="col-md-9 col-6" >
                                <button type="submit" class="btn btn-blue1">Simpan</button>
                                <a href="<?php echo base_url()?>HR/HRAktifitasAbsensi" class="btn btn-red1">Batal</a>
                            </div>
                        </div>
                        <br>
                        </form>
                    </div>
                </div>
                    
                </div> 
            </div>

<script type="text/javascript">
    // $(document).ready(function(){
    //     $("#rowkab").hide();
    // });
    function pilihNik(nik,tmp){
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

                if(tmp!=0){
                    $('#peg').val(response.data_karyawan.nama_lengkap);
                    $('#peg').attr('readonly',true);

                    $('#depart').val(response.data_karyawan.jenis_project);
                    $('#depart').attr('readonly',true);

                    $('#per').val(response.data_karyawan.nama_perusahaan);
                    $('#per').attr('readonly',true);
                } else {
                    $("#pegawai").hide();
                    $("#departemen").hide();
                    $("#perusahaan").hide();
                }
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#pegawai").hide();
            $("#departemen").hide();
            $("#perusahaan").hide();
        }
    }
</script>     
                        
         