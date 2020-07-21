                                <div class="row">
                                    <div class="col-md-12">
                                         <div class="Rectangle-35">
                                            <div class="container padd-top-20" >
                                                <div class="row">
                                                    <div class="col-md-3" >
                                                        <p class="fz-14 putih">NIK</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="fz-14 abuputih"><?php echo $datainformasigaji->nik; ?></p>
                                                    </div>
                                                    <div class="col-md-3" >
                                                        <p class="fz-14 putih">Departemen</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="fz-14 abuputih"><?php echo $datainformasigaji->desDepartemen; ?></p>
                                                    </div>
                                                   <!--  <div class="col-md-2" >
                                                        <p class="fz-14 putih">Gaji Pokok</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p class="fz-14 abuputih">Gaji Pokok</p>
                                                    </div> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3" >
                                                        <p class="fz-14 putih">Nama Pegawai</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="fz-14 abuputih"><?php echo $datainformasigaji->nama_lengkap; ?></p>
                                                    </div>
                                                    <div class="col-md-3" >
                                                        <p class="fz-14 putih">Jabatan</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="fz-14 abuputih"><?php echo $datainformasigaji->jenis_project; ?></p>
                                                    </div>
                                                    <!-- <div class="col-md-2" >
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div> -->
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Informasi Penggajian</label>
                                        <div class="row">
                                            <div class="col-md-6 col-6" align="">
                                                <p class="fz-14-judul">Gaji Pokok</p>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <p class="fz-14-isi"><?php echo 'Rp '.number_format($datainformasigaji->gaji,0,',','.') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php 
                                                $tunjangan=0;
                                                if ($data_GajiLainnyaRow > 0 ){ ?>
                                                <?php foreach ($datainformasigajitunjangan->result() as $lainnya) { ?>
                                            
                                            
                                            <div class="col-md-6 col-5" align="">
                                                <p class="fz-14-judul"><?php echo $lainnya->jenis_tunjangan ?></p>
                                            </div>
                                            <div class="col-md-6 col-4">
                                                <p class="fz-14-isi"> <?php echo 'Rp '.number_format($lainnya->nilai,0,',','.') ?>
                                                <?php $tunjangan=$tunjangan+$lainnya->nilai; ?></p>
                                            </div>
                                            <?php }} ?> 
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-6 col-6" align="">
                                                <label class="fz-14-judul">Gaji take home pay</label>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <label class="fz-14-isi">
                                                    <?php //echo 'Rp '.number_format(($datainformasigaji->gaji+$tunjangan),0,',','.') ?>
                                                </label>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Rekening Bank</label>
                                        <div class="row">
                                            <div class="col-6 col-md-6" align="">
                                                <p class="fz-14-judul">Nomor Rekening</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p class="fz-14-isi"><?php echo $datainformasigaji->nomor_rek; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-md-6" align="">
                                                <p class="fz-14-judul">Nama Bank</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p class="fz-14-isi"><?php echo $datainformasigaji->nama_bank; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-md-6" align="">
                                                <p class="fz-14-judul">Nama Pemilik Rekening</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p class="fz-14-isi"><?php echo $datainformasigaji->atas_nama_rek; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Pajak dan Kesehatan</label>
                                        <div class="row">
                                            <div class="col-6 col-md-6" align="">
                                                <p class="fz-14-judul">NPWP</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p class="fz-14-isi"><?php if ($datainformasigajiNPWPRows > 0){ ?>
                                                    <?php echo $datainformasigajiNPWP->kode_npwp ?>
                                                <?php } ?> </p>
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 col-md-6" align="">
                                                <p class="fz-14-judul">BPJS Kesehatan</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p class="fz-14-isi"><?php echo $datainformasigaji->bpjs_kes!=0?$datainformasigaji->bpjs_kes:'-'; ?> </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 col-md-6" align="">
                                                <p class="fz-14-judul">BPJS Ketenagakerjaan</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p class="fz-14-isi"><?php echo $datainformasigaji->bpjs_tk!=0?$datainformasigaji->bpjs_tk:'-'; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-md-6" >
                                                <p class="fz-14-judul">PPH</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <p class="fz-14-isi"><?php echo $datainformasigaji->pph!=0?$datainformasigaji->pph:'-'; ?></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- <div class="col-md-6 col-6 ">
                                        <label class="fz-18">Keterangan Perusahaan</label>
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                a
                                            </div>
                                            <div class="col-md-6 col-6"">
                                                s
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>NIK</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php //echo $datainformasigaji->nik; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Nama Pegawai</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php //echo $datainformasigaji->nama_lengkap; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Departemen</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php //echo $datainformasigaji->desDepartemen; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label></label>
                                        <?php //echo $datainformasigaji->jenis_project; ?>
                                    </div>
                                </div>
 -->

                                