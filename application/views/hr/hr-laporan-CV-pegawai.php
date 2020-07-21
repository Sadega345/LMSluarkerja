
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pelaporan / Laporan CV Pegawai</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Search Filter</h6>
                             <div class="container">
                                <div class="row">
                                    <div class="col-md-3 m-t-10">
                                        <label>NIK</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                       <input type="text" name="id" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 m-t-10">
                                        <label>Nama Pegawai</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                       <input type="text" name="nama_pegawai" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 m-t-10">
                                        <label>Departemen</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <select name="departemen" class="form-control">
                                            <option readonly>Semua Departemen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 m-t-10">
                                        <label>Jabatan</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <select name="jabatan" class="form-control">
                                            <option readonly>Semua jabatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 m-t-10">
                                        <label>Status</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <select name="status" class="form-control">
                                            <option readonly>Semua Status</option>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="row">
                                    <div class="col-md-2 m-t-10">      
                                    </div>
                                     <div class="col-md-4" align="right">
                                        <a href="#" class="btn btn-blue col-md-6">Cari</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                               <div class="col-md-6 col-6">
                                   <h6 class="tittle-box">Laporan CV Pegawai</h6>
                               </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Departemen</th>
                                            <th>Lokasi Kantor</th>
                                            <th>Jabatan</th>
                                            <th>Status Pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($datakaryawan->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <td><?php echo $dt->des_departemen; ?></td>
                                            <td><?php echo $dt->nama_lokasi; ?></td>
                                            <td><?php echo $dt->des_jabatan; ?></td>
                                            <td>
                                                <?php
                                                    if($dt->status_karyawan=='1'){
                                                        echo '<label class="btn btn-green2">Permanen</label>';
                                                    }else if($dt->status_karyawan=='2'){
                                                        echo '<label class="btn btn-green2">Freelance</label>';
                                                    }else if($dt->status_karyawan=='3'){
                                                        echo '<label class="btn btn-green2">PKWT</label>';
                                                    }else if($dt->status_karyawan=='4'){
                                                        echo '<label class="btn btn-green2">PKWTT</label>';
                                                    }  else if($dt->status_karyawan=='5'){
                                                        echo '<label class="btn btn-green2">Resign</label>';
                                                    }  
                                                ?>
                                            </td>
                                            <td><a class="btn btn-green1" href="<?php echo base_url()?>assets/cv/<?php echo $dt->cv_karyawan!=''?$dt->cv_karyawan:'nodocument.png' ?>">Lihat CV</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         