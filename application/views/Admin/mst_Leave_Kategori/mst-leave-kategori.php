
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Master Leave Kategori</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Master Leave Kategori</h6>
                            <div class="row">
                                <div class="col-lg-2">
                                      <a href="<?php echo base_url()?>Admin/tambahMstLeaveKategori"> <button type="button" class="btn btn-primary">Tambah</button></a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach ($dt_mstLeaveKategori->result() as $mstLeaveKategori) { ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $mstLeaveKategori->deskripsi; ?></td>
                                                <td><a href="<?php echo base_url()?>Admin/ubahMstLeaveKategori/<?php echo $mstLeaveKategori->id_leave_kategori;?>"><button type="button" class="btn btn-primary">Ubah</button></a>
                                                    <span><a href="javascript:;" onclick="hapusLeaveKategori('<?php echo $mstLeaveKategori->id_leave_kategori; ?>')" class="btn btn-danger" title="Hapus"> Hapus</a></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("Admin/mst_Leave_Kategori/proses_MstLeaveKategori") ;?>
         