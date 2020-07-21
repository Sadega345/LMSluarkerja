
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / SP</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                             <div class="row">
                                <div class="col-md-8 m-t-10 col-6">  
                                    <h6 class="tittle-box">SP</h6>    
                                </div>
                                 <div class="col-md-4 col-6" align="right">
                                    <a href="<?php echo base_url()?>HR/TambahHRTeguran" class="btn btn-blue col-md-6">Tambah SP</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Tanggal Teguran</th>
                                            <th>Status Teguran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datateguran->result() as $dt) { ?>
                                            <tr>
                                                <td><?php echo $dt->nik; ?></td>
                                                <td><?php echo $dt->nama_lengkap; ?></td>
                                                <td><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal_create)); ?></td>
                                                <td>
                                                    <?php 
                                                        if($dt->status_teguran=='1'){
                                                            echo "SP1";
                                                        }else if($dt->status_teguran=='2'){
                                                            echo "SP2";
                                                        }else if($dt->status_teguran=='3'){
                                                            echo "SP3";   
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url()?>HR/ViewTeguran/<?php echo $dt->id_teguran ?>">
                                                        <button class="btn btn-green1">Lihat</button>
                                                    </a>
                                                    <a href="<?php echo base_url()?>HR/HapusTeguran/<?php echo $dt->id_teguran ?>"  class="btn btn-red1" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus">Hapus
                                                    </a>
                                                    <a href="<?php echo base_url()?>HR/EditTeguran/<?php echo $dt->id_teguran ?>">
                                                        <button class="btn btn-yellow">Edit</button>
                                                    </a> 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         