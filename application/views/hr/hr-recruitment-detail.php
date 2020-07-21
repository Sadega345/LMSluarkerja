            <div class="col-lg-12">
                <div class="row m-t-10">
                    <div class="col-9 col-md-6">
                        <label class="fz-18 padd-right-5">Detail Recruitment</label>
                    
                        <?php 
                            if($dataloker->status=='0'){
                                echo '<label class="Rectangle-permanent">Open</label>';
                            }else{
                                echo '<label class="Rectangle-resign">Close</label>';
                            } 
                        ?>
                    </div>
                    <div class="col-3 col-md-6" align="right">
                      <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <div class="Rectangle-35">
                            <div class="container padd-top-20" >
                                <div class="row">
                                    <div class="col-md-3" >
                                        <p class="fz-14 putih">Nama Posisi</p>
                                    </div>
                                    <div class="col-md-3 ">
                                       <p class="fz-14 abuputih"><?php echo $dataloker->jenis_project; ?></p>
                                    </div>
                                    <div class="col-md-2" >
                                        <p class="fz-14 putih">Waktu</p>
                                    </div>
                                    <div class="col-md-4 ">
                                       <p class="fz-14 abuputih"><?php echo strftime(" %d %B",strtotime($dataloker->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($dataloker->tanggal_selesai)); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="fz-14 putih">Pelamar</p>
                                    </div>
                                    <div class="col-md-3">
                                       <p class="fz-14 abuputih"><?php echo $dataloker->jumPelamar!=''?$dataloker->jumPelamar:'0'; ?> Orang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-lg-6 col-md-6">
                        <label class="fz-18 padd-right-5">Jadwal Test & Interview</label>
                    </div>
                    <div class="col-lg-6 col-md-6">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <p class="fz-14-judul ">Tanggal</p>
                                </div>
                                <div class="col-md-6 col-6">
                                    <p class="fz-14-judul ">Jenis Test dan Interview</p>
                                </div>
                            </div>
                            <?php foreach ($ambildatajadwal->result() as $dt) { ?>
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <p class="fz-14-isi "><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal)); ?></p>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <p class="fz-14-isi "><?php echo $dt->jenis; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-lg-6 col-md-6">
                        <label class="fz-18 ">Requirement</label>
                        <?php echo $dataloker->requirement; ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="fz-18 ">Jobdesc</label>
                        <?php echo $dataloker->jobdesc; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12" >
                <div class="card ">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-8">
                               <h5 class="fz-aktivitasabsensi">Daftar Pelamar</h5>
                            </div> 
                        </div>
                        <div class="table-responsive">
                            <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                              
                                 <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Pelamar</th>
                                        <th>Email</th>
                                        <th>No Handphone</th>
                                        <th>Tanggal Melamar</th>
                                        <th>Status</th>
                                        <th>CV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datapelamar->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <td><?php echo $dt->email; ?></td>
                                            <td><?php echo $dt->nomor_telepon; ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal)); ?></td>
                                            <th><?php 
                                                if($dt->status_lamar=='0'){
                                                    echo ' <a href=#" class="btn btn-orange2">Proses</a>';
                                                }else if($dt->status_lamar=='1'){
                                                     echo ' <a href=#" class="btn btn-red2">Ditolak</a>';
                                                }else if($dt->status_lamar=='2'){
                                                     echo ' <a href=#" class="btn btn-green2">Diterima</a>';
                                                }
                                             ?></th>
                                            <td>
                                                <a href="<?php echo base_url()?>HR/HRRecruitmentDetailPelamar/<?php echo $dt->id_pelamar ?>/<?php echo $dataloker->id_loker?>" class="btn btn-green1">Lihat</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         