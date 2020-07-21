            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Informasi Kepegawaian / Keuangan Pajak</h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h5 class="tittle-box" align="center">Keuangan & Pajak</h5>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                
                            <div class="col-12" align="left">
                                <h6 class="tittle-box">Informasi Pegawai</h6>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>ID Pegawai</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php echo $dataKaryawan->nik; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Nama Pegawai</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php echo $dataKaryawan->nama_lengkap; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php echo $dataKaryawan->desJabatan; ?>
                                    </div>
                                </div>


                                <h6 class="tittle-box">Penerimaan</h6>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Gaji Pokok</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php echo 'Rp '.number_format($dataKaryawan->standar_gaji,2,',','.') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php 
                                        $tunjangan=0;
                                        if ($data_GajiLainnyaRow > 0 ){ ?>
                                        <?php foreach ($data_GajiLainnya->result() as $lainnya) { ?>
                                    
                                    
                                    <div class="col-md-3 col-5" align="right">
                                        <label><?php echo $lainnya->jenis_tunjangan ?></label>
                                    </div>
                                    <div class="col-md-8 col-4">
                                        <label></label>
                                        <?php echo 'Rp '.number_format($lainnya->nilai,2,',','.') ?>
                                        <?php $tunjangan=$tunjangan+$lainnya->nilai; ?>
                                    </div>
                                    <?php }} ?>
                                </div>
                                 <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label class="tittle-box">Gaji take home pay</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label>
                                            <?php echo 'Rp '.number_format(($dataKaryawan->standar_gaji+$tunjangan),2,',','.') ?>
                                        </label>
                                    </div>
                                </div>

                                <h6 class="tittle-box">Rekening Bank</h6>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>Nomor Rekening</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label></label>
                                        <?php echo $dataKaryawan->nomor_rek; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>Nama Bank</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label></label>
                                        <?php echo $dataKaryawan->desBank; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>Nama Pemilik Rekening</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label></label>
                                        <?php echo $dataKaryawan->atas_nama_rek; ?>
                                    </div>
                                </div>

                                

                                <h6 class="tittle-box">Pajak dan Kesehatan</h6>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>NPWP</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label></label>
                                        <?php if ($data_NPWPRow > 0){ ?>
                                            <?php echo $data_NPWP->kode_npwp ?>
                                        <?php } ?>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>BPJS Kesehatan</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label></label>
                                        <?php if ($data_BPJSRow > 0){ ?>
                                        
                                            <?php if ($data_BPJS->tipe_bpjs == 1) { 
                                              echo $data_BPJS->nomor_kartu
                                            ?>
                                        <?php }else{ 
                                            echo '-';
                                        ?>
                                    <?php }}else{ ?>
                                        <?php echo '-'; } ?> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>BPJS Ketenagakerjaan</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label></label>
                                        <?php if ($data_BPJSRow > 0) { ?>
                                            <?php if ($data_BPJS->tipe_bpjs == 2) {
                                            echo $data_BPJS->nomor_kartu;
                                        ?>
                                        <?php }else{
                                            echo '-';
                                         ?>
                                        <?php } }else{ ?>
                                        <?php echo '-'; } ?>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <br>
                        </div>
                    </div>
                    
                </div>
            </div>