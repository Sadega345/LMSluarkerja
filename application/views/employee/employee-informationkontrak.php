            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Informasi Kepegawaian / Informasi Kontrak</h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h6 class="tittle-box" align="center">Informasi Kontrak</h6>
                        </div>
                        <div class="body" >
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>NIK</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php echo $dataKaryawan->nik; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Nama Pegawai</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php echo $dataKaryawan->nama_lengkap; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Jabatan</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php echo $dataKaryawan->keterangan; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Status Pegawai</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php
                                                if($dataKaryawan->status_karyawan=='1'){
                                                    echo "Permanen";
                                                }else if($dataKaryawan->status_karyawan=='2'){
                                                    echo "Freelance";
                                                }else if($dataKaryawan->status_karyawan=='3'){
                                                    echo "PKWT";
                                                }else if($dataKaryawan->status_karyawan=='4'){
                                                    echo "PKWTT";
                                                }else if($dataKaryawan->status_karyawan=='5'){
                                                    echo "Resign";
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Departemen</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php //echo $dataKaryawan->deskripsi; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Perusahaan</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php// echo $dataKaryawan->perusahaan; ?>
                                        </div>
                                    </div>
 -->
                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Tanggal Bergabung</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php echo strftime("%d %B %Y",strtotime($dataKaryawan->tanggal_masuk)); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Tanggal Berakhir</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label></label>
                                            <?php echo strftime("%d %B %Y",strtotime($dataKaryawan->tanggal_keluar)); ?>
                                        </div>
                                    </div>

                                   <!--  <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Melapor Ke</label>
                                        </div>
                                        <div class="col-md-6 col-6 ">
                                            <label></label>
                                            <?php //echo $dataKaryawan->Nama_penerima; ?>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        <br>
                        </div>
                    </div>
                    
                </div>
            </div>
            