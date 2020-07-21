
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu"> Directory / Perusahaan & Departemen </h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                              <div class="col-md-9 col-8" >
                               <!--  <h6 class="tittle-box">Nama Karyawan Departemen <?php //echo $datadepartemen->deskripsi; ?></h6> -->
                              </div>
                              <div class="col-md-3 col-4">
                               <!--  <a href="<?php// echo base_url() ?>HR/ViewHRKlienDepartemen/<?php //echo $id_perusahaan  ?>" class="btn btn-blue">Kembali</a> -->
                                <a href="<?php echo base_url() ?>HR/HRDepartemen" class="btn btn-blue">Kembali</a>
                              </div>
                            </div>
                            <div class="table-responsive m-t-20">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($datakaryawan->result() as $dt) { ?> 
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <td><?php echo $dt->jenis_project; ?></td>
                                        </tr>
                                   <?php } ?> 
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>


         
                        
         