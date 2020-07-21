            <!-- <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Keuangan / Payroll History / Detail Gaji Pegawai</h6>
                    </div>
                </div>
            </div> -->

            <div class="row clearfix">
                <div class="col-lg-12">
                    <!-- <div class="card"> -->
                        
                        <?php foreach($datapegawai->result() as $rows){?>
                        <!-- Blue -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Rectangle-35">
                                    <div class="container padd-top-20">
                                        <div class="row">
                                            <div class="col-md-2 col-12" >
                                                <p class="fz-14 putih">NIK</p>
                                            </div>
                                            <div class="col-md-3 col-12" >
                                                <p class="fz-14 abuputih"><?php echo $rows->nik; ?></p>
                                            </div>
                                            <div class="col-md-3 col-12" >
                                                <p class="fz-14 putih">Departemen</p>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <p class="fz-14 abuputih"><?php echo $rows->desDepartemen; ?></p>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <p class="fz-14 putih">Periode</p>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <p class="fz-14 abuputih">
                                                <?php
                                                    if($rows->bulan==1){
                                                        echo "Januari";
                                                    }if($rows->bulan==2){
                                                        echo "Februari";
                                                    }if($rows->bulan==3){
                                                        echo "Maret";
                                                    }if($rows->bulan==4){
                                                        echo "April";
                                                    }if($rows->bulan==5){
                                                        echo "Mei";
                                                    }if($rows->bulan==6){
                                                        echo "Juni";
                                                    }if($rows->bulan==7){
                                                        echo "Juli";
                                                    }if($rows->bulan==8){
                                                        echo "Agustus";
                                                    }if($rows->bulan==9){
                                                        echo "September";
                                                    }if($rows->bulan==10){
                                                        echo "Oktober";
                                                    }if($rows->bulan==11){
                                                        echo "November";
                                                    }if($rows->bulan==12){
                                                        echo "Desember";
                                                    }
                                                    ?>&nbsp;<?php echo $rows->tahun; ?></h2>
                                                </p>
                                                
                                            </div>
                                            <div class="col-md-3" >
                                                <p class="fz-14 putih">Nama Pegawai</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="fz-14 abuputih"><?php echo $rows->nama_lengkap; ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-2 col-12" >
                                                <p class="fz-14 putih">Jabatan</p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 abuputih"><?php echo $rows->jenis_project; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Blue -->

                        <div class="body m-t-20">
                            <div class="row clearfix">
                                
                                <div class="col-md-12" align="left">
                                    
                                    

                                    <!-- Informasi Gaji -->
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <h6 class="hitampekat mb-3">Informasi Penggajian</h6>
                                                <div class="row form-group">
                                                    <div class="col-md-6 col-12">
                                                        <p class="hidden-sm fz-14">Gaji Pokok </p>
                                                        <p class="d-sm-none fz-14">Gaji Pokok </p>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <p class="fz-14 hitamsemu">Rp. <?php echo number_format($rows->standar_gaji,0,'.','.')?></p>
                                                    </div>
                                                </div>

                                                <?php 
                                                $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
                                                $hari_ini = date("Ymd",strtotime(date("Y-m-d")));
                                                $where = array('nik'=>$rows->nik,
                                                                'month(tanggal)'=>$rows->bulan,
                                                                'year(tanggal)'=>$rows->tahun,
                                                                'status'=>'1')
                                                                ;
                                                $overtime = $this->Nata_hris_hr_model->dataLemburOvertime($where);
                                                $tmplemburan=0;
                                                if ($overtime->num_rows() > 0) {
                                                    foreach ($overtime->result() as $lembur) {
                                                    $tanggal = strftime("%A",strtotime($lembur->tanggal));
                                                    
                                                    if ($tanggal == "Saturday"  || $tanggal == "Sunday") {
                                                        
                                                        $jam=($lembur->total_menit*60) / 3600;
                                                        if ($jam > 1 && $jam <= 5 ) {
                                                            $tmplemburan=50000*$jam;

                                                        }else if ($jam > 5) {
                                                            $tmplemburan2=75000*($jam-5);
                                                            $tmplemburan=(50000*5)+$tmplemburan2;
                                                            // echo "string".$tmplemburan;
                                                            //$tmplemburan=$tmplemburan2;
                                                        }
                                                        
                                                    }
                                                    elseif (isset($array[$hari_ini]) ) {
                                                        // echo "hari libur nasional";
                                                        $jam=($lembur->total_menit*60) / 3600;
                                                        if ($jam > 1 && $jam <= 5 ) {
                                                            $tmplemburan=50000*$jam;
                
                                                        }else if ($jam > 5) {
                                                            $tmplemburan2=75000*($jam-5);
                                                            $tmplemburan=(50000*5)+$tmplemburan2;
                                                            // echo "string".$tmplemburan;
                                                            //$tmplemburan=$tmplemburan2;
                                                        }
                                                    }
                                                    elseif ($tanggal == "Monday" || $tanggal == "Tuesday" || $tanggal == "Wednesday" || $tanggal == "Thursday" || $tanggal == "Friday" ) {
                                                        // echo "hari biasa";
                                                        $jam=($lembur->total_menit*60) / 3600;
                                                        if ($jam > 1 && $jam < 2 ) {
                                                            $tmplemburan=15000*$jam;
                
                                                        }else if ($jam >= 2) {
                                                            $tmplemburan2=35000*($jam-2);
                                                            $tmplemburan=(15000*2)+$tmplemburan2;
                                                            // echo "string".$tmplemburan;
                                                            //$tmplemburan=$tmplemburan2;
                                                        }
                                                    }
                                                    else{
                                                        // echo "masuk";
                                                        // echo $tanggal;
                                                        $jam=($lembur->total_menit*60) / 3600;
                                                        $tmplemburan=$tmplemburan+($dataViewPayslip->lemburan*$jam);
                                                        // $tmplemburan=$dataViewPayslip->lemburan*$jam;
                                                    }
                                                }
                                                
                                            ?>
                                            <div class="row form-group">
                                                <div class="col-md-6 col-12">
                                                    <p class="hidden-sm fz-14">Lemburan </p>
                                                    <p class="d-sm-none fz-14">Lemburan </p>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p class="fz-14 hitamsemu">Rp. <?php echo number_format($tmplemburan,0,'.','.')?></p>
                                                </div>
                                            </div>
                                            <?php }else{
                                                $tmplemburan=0;
                                            } ?>
                                        </div>

                                        <!-- Informasi Bank -->
                                        <div class="col-md-6 col-12">
                                            <label class="fz-18">Rekening Bank</label>
                                                <div class="row form-group">
                                                    <div class="col-md-6 col-12">
                                                        <p class="hidden-sm fz-14">Nomor Rekening </p>
                                                        <p class="d-sm-none fz-14">Nomor Rekening </p>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <p class="fz-14 hitamsemu"><?php echo $rows->nomor_rek?></p>
                                                    </div>
                                                </div>
                                                <!-- Nama Bank -->
                                                <div class="row form-group">
                                                    <div class="col-12 col-md-6">
                                                        <p class="hidden-sm fz-14">Nama Bank </p>
                                                        <p class="d-sm-none fz-14">Nama Bank </p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <p class="fz-14 hitamsemu"><?php echo $rows->nama_bank?></p>
                                                    </div>
                                                </div>
                                                <!-- Nama Pemilik Rek -->
                                                <div class="row form-group">
                                                    <div class="col-12 col-md-6">
                                                        <p class="hidden-sm fz-14">Nama Pemilik Rekening </p>
                                                        <p class="d-sm-none fz-14">Nama Pemilik Rekening </p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <p class="fz-14 hitamsemu"><?php echo $rows->atas_nama_rek?></p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- End Gaji -->
                                    
                                    
                                    <div class="row">
                                        <!-- Pajak -->
                                        <div class="col-md-6 col-12">
                                            <label class="fz-18">Pajak dan Kesehatan</label>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-6">
                                                    <p class="hidden-sm fz-14">NPWP </p>
                                                    <p class="d-sm-none fz-14">NPWP </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p class="fz-14 hitamsemu"><?php echo $rows->kode_npwp?></p>
                                                </div>
                                            </div>

                                            <!-- Bpjs Kesehatan -->
                                            <div class="row form-group">
                                                <div class="col-12 col-md-6">
                                                    <p class="hidden-sm fz-14">BPJS Kesehatan </p>
                                                    <p class="d-sm-none fz-14">BPJS Kesehatan </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p class="fz-14 hitamsemu">Rp. <?php echo number_format($rows->bpjs_kes,0,'.','.')?></p>
                                                </div>
                                            </div>
                                            

                                            <!-- Bpjs Ketenagakerjaan -->
                                            <div class="row form-group">
                                                <div class="col-12 col-md-6">
                                                    <p class="hidden-sm fz-14">BPJS Kesehatan </p>
                                                    <p class="d-sm-none fz-14">BPJS Kesehatan </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p class="fz-14 hitamsemu">Rp. <?php echo number_format($rows->bpjs_tk,0,'.','.')?></p>
                                                </div>
                                            </div>

                                            <!-- PPH -->
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p class="hidden-sm fz-14">PPH </p>
                                                    <p class="d-sm-none fz-14">PPH </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p class="fz-14 hitamsemu">Rp. <?php echo number_format($rows->pph,0,'.','.')?></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- End Pajak -->

                                        <div class="col-md-6 col-12">
                                            <label class="fz-18">Keterangan Perusahaan</label>
                                            <div class="row form-group">
                                                <div class="col-md-6 col-12">
                                                    <p class="hidden-sm fz-14">Keterangan </p>
                                                    <p class="d-sm-none fz-14">Keterangan </p>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p class="fz-14 hitamsemu"><?php echo $rows->keterangan?></p>
                                                </div>
                                            </div>

                                            <!-- Biaya Admin -->
                                            <div class="row form-group">
                                                <div class="col-md-6 col-12">
                                                    <p class="hidden-sm fz-14">Biaya Admin </p>
                                                    <p class="d-sm-none fz-14">Biaya Admin </p>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p class="fz-14 hitamsemu">Rp. <?php echo number_format($rows->biaya,0,'.','.')?></p>
                                                </div>
                                            </div>

                                            <!-- Disetorkan -->
                                            <div class="row form-group">
                                                <div class="col-md-6 col-12">
                                                    <p class=" hidden-sm">Disetorkan </p>
                                                    <p class="d-sm-none">Disetorkan </p>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <p class="fz-14 hitamsemu">Rp. <?php echo number_format($rows->disetorkan,0,'.','.')?></p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        
                        
                        </div>
                        <?php } ?>
                    <!-- </div> -->
                    
                </div>
            </div>