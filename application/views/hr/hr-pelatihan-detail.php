
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>  Directory / Pelatihan / Detail</h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                                <?php if($datapelatihandetail->status=='1'){
                                    echo '<label class="btn btn-green2">Open</label>';
                                }else{
                                    echo '<label class="btn btn-red1">Close</label>';
                                } ?>
                                
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                <h6 class="tittle-box">Detail Pelatihan</h6>
                            </div>
                            <div class="col-md-2 col-4">
                                <a href="<?php echo base_url()?>HR/HRPelatihan" class="btn btn-blue">Kembali</a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 col-5" align="right">
                                <label>Nama Program Pelatihan</label>
                            </div>
                            <div class="col-md-9 col-7" align="left">
                                <p><?php echo $datapelatihandetail->nama_program; ?></p>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-3 col-5" align="right">
                                <label>Nama Pelatih</label>
                            </div>
                            <div class="col-md-9 col-7" align="left">
                                <p><?php echo $datapelatihandetail->nama_pelatih; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-5" align="right">
                                <label>Lokasi Pelatihan</label>
                            </div>
                            <div class="col-md-9 col-7" align="left">
                                <p><?php echo $datapelatihandetail->lokasi; ?></p>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-3 col-5" align="right">
                                <label>Departemen</label>
                            </div>
                            <div class="col-md-9 col-7" align="left">
                                <p><?php// echo $datapelatihandetail->desdepartemen; ?></p>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-3 col-5" align="right">
                                <label>Tanggal Mulai</label>
                            </div>
                            <div class="col-md-9 col-7" align="left">
                                <p><?php echo strftime(" %d %B %Y",strtotime($datapelatihandetail->tanggal_mulai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-5" align="right">
                                <label>Tanggal Akhir</label>
                            </div>
                            <div class="col-md-9 col-7" align="left">
                                <p><?php echo strftime(" %d %B %Y",strtotime($datapelatihandetail->tanggal_selesai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-5" align="right">
                                <label>Keterangan</label>
                            </div>
                            <div class="col-md-9 col-7" align="left">
                                <p><?php echo $datapelatihandetail->deskripsi; ?></p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box text-center">Daftar Peserta</h6>    
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Peserta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($dataPegawai->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            