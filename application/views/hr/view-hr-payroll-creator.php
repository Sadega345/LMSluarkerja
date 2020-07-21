            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Keuangan / Payroll Creator / Detail Gaji Pegawai</h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                    <div class="col-md-4 col-4" >
                                    </div>
                                    <div class="col-md-4 col-4" >
                                        <h6 class="tittle-box text-center">Detail Gaji Pegawai</h6>
                                    </div>
                                    <div class="col-md-4 col-4" align="right">
                                        <a href="<?php echo base_url()?>HR/HRPayrollCreator/3" class="btn btn-blue col-md-6">Kembali</a>
                                    </div>
                                </div>
                        </div>
                        <!-- <?php// foreach($datapegawai->result() as $rows){?> -->
                        <div class="body">
                            <div class="row clearfix">
                                
                            <div class="col-12" align="left">
                                
                                
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>NIK</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label><?php echo $datapegawai->nik?></label>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Nama Pegawai</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label><?php echo $datapegawai->nama_lengkap?></label>
                                      
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Departemen</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label><?php echo $datapegawai->desDepartemen?></label>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label><?php echo $datapegawai->jenis_project?></label>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label class="tittle-box">Periode</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label  id=bulan><?php echo strftime('%B %Y')?></label>
                                    </div>
                                </div>


                                <h6 class="tittle-box">Informasi Penggajian</h6>
                                <div class="row">
                                    <div class="col-md-3 col-6" align="right">
                                        <label>Gaji Pokok</label>
                                    </div>
                                    <div class="col-md-9 col-6">
                                        <label>Rp. <?php echo number_format($datapegawai->gaji,3,',','.')?></label>
                                        
                                    </div>
                                </div>
                                <?php if($datapegawai->nilai_tunj_koefisien > 0){ ?>
                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Koefisien</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label>Rp. <?php echo number_format($datapegawai->nilai_tunj_koefisien,3,',','.')?></label>
                                            
                                        </div>
                                    </div>
                                <?php }  ?>
                                <?php if($datapegawai->nilai_tunj_tmk > 0){ ?>
                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>TMK</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label>Rp. <?php echo number_format($datapegawai->nilai_tunj_tmk,3,',','.')?></label>
                                            
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if($datapegawai->nilai_tunj_jabatan > 0){ ?>
                                    <div class="row">
                                        <div class="col-md-3 col-6" align="right">
                                            <label>Tunjangan Jabatan</label>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <label>Rp. <?php echo number_format($datapegawai->nilai_tunj_jabatan,3,',','.')?></label>
                                            
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if($datapegawai->tunj_lainnya > 0){ ?>
                                    <?php  
                                        $explodeTunjanganLainnya = explode(',', $datapegawai->tunj_lainnya);
                                        
                                        foreach ($explodeTunjanganLainnya as $lainnya) { 
                                            $NikLainnya=array('l.nik'=>$datapegawai->nik,'l.id_jenis_tunjangan'=>$lainnya);
                                            $tunjanganLainnya = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->row(); ?>
                                            <div class="row">
                                                <div class="col-md-3 col-6" align="right">
                                                    <label>Tunjangan <?php echo $tunjanganLainnya->jenis_tunjangan?></label>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <label>Rp. <?php echo number_format($tunjanganLainnya->nilai,3,',','.')?></label>
                                                    
                                                </div>
                                            </div>
                                    <?php } ?>
                                <?php } ?>
                               

                                <h6 class="tittle-box">Rekening Bank</h6>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>Nomor Rekening</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label><?php echo $datapegawai->nomor_rek?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>Nama Bank</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label><?php echo $datapegawai->nama_bank?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>Nama Pemilik Rekening</label>
                                    </div>
                                    <div class="col-6 col-md-9">
                                        <label><?php echo $datapegawai->atas_nama_rek?></label>
                                    </div>
                                </div>

                                

                                <h6 class="tittle-box">Pajak dan Kesehatan</h6>
                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>BPJS Kesehatan</label>
                                    </div>
                                    <div class="col-6 col-md-6">
                                            <label>Rp. <?php echo $datapegawai->nilai_bpjs_kes!=""?(number_format($datapegawai->nilai_bpjs_kes,3,',','.')):'-'; ?></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>BPJS Ketenagakerjaan</label>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <label>
                                            Rp. <?php echo $datapegawai->nilai_bpjs_kes!=""?(number_format($datapegawai->nilai_bpjs_tk  ,3,',','.')):'-'; ?>
                                        </label>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-6 col-md-3" align="right">
                                        <label>PPH</label>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <label>
                                            Rp. <?php echo $datapegawai->nilai_pph!=""?(number_format($datapegawai->nilai_pph  ,3,',','.')):'-'; ?>
                                        </label>
                                    </div>
                                </div>

                                <h6 class="tittle-box">Keterangan Perusahaan</h6>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label class="float-right hidden-sm">Keterangan : </label>    
                                        <label class="d-sm-none">Keterangan : </label>    
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label><?php echo $datapegawai->keterangan?></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label class="float-right hidden-sm">Biaya Admin : </label>    
                                        <label class="d-sm-none">Biaya Admin : </label>    
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Rp. <?php echo number_format($datapegawai->biaya,3,',','.')?></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label class="float-right hidden-sm">Disetorkan : </label>    
                                        <label class="d-sm-none">Disetorkan : </label>    
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Rp. <?php echo number_format($datapegawai->disetorkan,3,',','.')?></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <br>
                        </div>
                      <!--   <?php// } ?> -->
                    </div>
                    
                </div>
            </div>