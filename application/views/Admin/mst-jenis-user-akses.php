
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Master Jenis User Akses</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Master Jenis User Akses</h6>
                            <div class="row">
                                <div class="col-lg-2">
                                     <button type="button" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Id Jenis User</th>
                                            <th>Id Modul</th>
                                            <th>Akses</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach ($dt_mstJenisUserAkses->result() as $mstJenisUserAkses) { ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $mstJenisUserAkses->id_jenis_user; ?></td>
                                                <td><?php echo $mstJenisUserAkses->id_modul; ?></td>
                                                <td><?php echo $mstJenisUserAkses->akses; ?></td>
                                                <td><button type="button" class="btn btn-primary">Ubah</button><span><button type="button" class="btn btn-danger">Hapus</button></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         