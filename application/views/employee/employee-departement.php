            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Informasi Kepegawaian / Departement</h6>
                    </div>
                </div>
            </div>

          <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <h6 class="tittle-box text-center">Departement</h6>
                        <div class="row clearfix">
                            
                            <div class="col-lg-7" align="left">
                                <div class="row">
                                    <div class="col-md-4 col-6" align="right">
                                       <label>Nama Departemen</label>
                                    </div>
                                    <div class="col-md-8 col-6" align="left">
                                        <?php echo $dataKaryawan->deskripsi; ?> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-6" align="right">
                                        <label>Kepala Departemen</label>
                                    </div>
                                    <div class="col-md-8 col-6" align="left">
                                        <?php echo $ambildatanamaKepala->nama_lengkap; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-6" align="right">
                                        <label>Total Pegawai</label>
                                    </div>
                                    <div class="col-md-8 col-6" align="left">
                                        <?php echo $jumdataKaryawan; ?> Orang 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <?php foreach ($dataKaryawanProject->result() as $dataKaryawan ) { ?>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12" align="center">
                                    <img src="<?php echo base_url() ?>assets/img/karyawan/<?php echo $dataKaryawan->gambar_foto!=''?$dataKaryawan->gambar_foto:'not.png' ?>" alt="" style="border-radius: 100%;height: 150px;width: 150px;">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-12" align="center">
                                    <a href="javascript:void(0);" onclick="viewprof('<?php echo $dataKaryawan->nik ?>')" ><label><?php echo $dataKaryawan->nama_lengkap ?></label></a>
                                </div>
                                <!-- data-toggle="modal" data-target="#view" -->
                            </div>
                            <div class="row">
                                <div class="col-lg-12" align="center">
                                    <p><?php echo $dataKaryawan->jenis_project ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="modal fade" id="view" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                        
                                <div class="col-lg-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="row">
                                                    <div class="col-lg-12" align="center">
                                                        <img src="<?php echo base_url() ?>assets/images/nata-logo.png" alt="" width="100px">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12" align="center">
                                                        <img id="img" src="http://157.230.250.25/assets/foto/not.png" alt="" style="border-radius: 100%;height: 130px;width: 130px;">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12" align="center">
                                                        <h6 class="tittle-box" id="nama"></h6>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>NIK</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="id"></span>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="jabatan"></span>
                                                    </div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>Status Karyawan</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="status"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>Departement</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="departemen"></span> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>Perusahaan </label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="perusahaan"></span> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>Tanggal Bergabung</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="tgl"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>Melapor ke</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="lapor"></span> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>No Handphone</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="hp"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" align="right">
                                                        <label>Email Kantor</label>
                                                    </div>
                                                    <div class="col-7" align="left">
                                                        <label>:</label>
                                                        <span id="email"></span> 
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-4" align="center">
                                                    </div>
                                                    <div class="col-4" align="center">
                                                        <button type="button" class="btn btn-blue" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                    <div class="col-4" align="center">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                     <!--    <div class="modal-footer">
                            <div class="row">
                                <div class="col-12" >
                                    <button type="button" class="btn-blue" data-dismiss="modal">CLOSE</button>
                                </div>
                            </div>
                        </div> -->

                </div>
            </div>

           <!--  <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Departement List</h6>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Departement Name</th>
                                            <th>Departement Head</th>
                                            <th>Total Employee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Web Development</td>
                                            <td>John Teguh</td>
                                            <td>305</td>
                                            <td><a href="<?php echo base_url()?>Employee/departementDetail"><i class="icon-eye"></i></a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <script type="text/javascript">
                function viewprof(nik){
                      $.ajax({
                        url: "<?php echo base_url();?>Employee/viewprof",
                        type: "post",
                        data: {nik:nik} ,
                        dataType:'json',
                        success: function (response) {
                           // alert(response.nama_lengkap);
                            $('#view').modal('show');  
                            $('#nama').html(response.datakaryawan.nama_lengkap); 
                            $('#id').html(response.datakaryawan.nik); 
                            $('#jabatan').html(response.datakaryawan.desJabatan);
                            $('#departemen').html(response.datakaryawan.deskripsi);
                            $('#perusahaan').html(response.datakaryawan.perusahaan);
                            $('#tgl').html(response.datakaryawan.tanggal_masuk);
                            $('#hp').html(response.datakaryawan.nomor_telepon); 
                            $('#lapor').html(response.datanamaKepala.nama_lengkap);
                             $('#status').html(response.datakaryawan.status_karyawan);
                            if(response.datakaryawan.gambar_foto!=''){
                                 $('#img').attr('src','<?php echo base_url() ?>assets/foto/'+response.datakaryawan.gambar_foto); 
                             }else{
                                  $('#img').attr('src','<?php echo base_url() ?>assets/foto/not.png'); 
                             }
                            $('#email').html(response.datakaryawan.email); 

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }


                    });

                   
                }
            </script>