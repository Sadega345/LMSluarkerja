
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                                <div class="col-md-3">
                                    <?php 
                                       /*if($dataViewPayslip->status==0){
                                            echo'<button type="button" class="btn btn-orange2">Pending</button>';
                                        }if ($dataViewPayslip->status==1) {
                                            echo'<button type="button" class="btn btn-green2">Success</button>';
                                        }if ($dataViewPayslip->status==2) {
                                            echo'<button type="button" class="btn btn-red2">Decline</button>';
                                        } */ 
                                    ?>
                                </div>   
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-2">
                                    <img src="<?php echo base_url()?>assets/logo_perusahaan/<?php echo $dataPerusahaan->logo!=""?$dataPerusahaan->logo:"not.png" ?>" class="img-fluid" height>
                                </div> 
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-3 col-12 m-t-10">
                                    <a href="<?php echo base_url()?>Employee/payslip" class="btn btn-blue">Kembali</a>
                                </div>                  
                            </div>
                            <h5 class="tittle-box m-t-20 text-center">Detail Slip Gaji</h5>
                            <div class="row">
                               <div class="col-md-2" align="left">
                                    <label class="" >Bank</label>
                                </div>  
                                <div class="col-md-4">
                                     <?php echo $dataViewPayslip->nama_bank==''?'-':$dataViewPayslip->nama_bank ?>
                                </div>
                                <div class="col-md-2" align="left">
                                    <label class="">No Rekening</label>
                                </div>  
                                <div class="col-md-4">
                                    <?php echo $dataViewPayslip->nomor_rek==''?'-':$dataViewPayslip->nomor_rek ?>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2" align="left">
                                    <label class="" >Nama</label>
                                </div>  
                                <div class="col-md-4">
                                    <?php echo $dataViewPayslip->nama_lengkap==''?'-':$dataViewPayslip->nama_lengkap ?>
                                </div>
                                <div class="col-md-2" align="left">
                                    <label class="">NPWP</label>
                                </div>  
                                <div class="col-md-4">
                                   <?php echo $dataViewPayslip->kode_npwp==''?'-':$dataViewPayslip->kode_npwp ?>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2" align="left">
                                    <label class="" >Jabatan</label>
                                </div>  
                                <div class="col-md-4">
                                    <?php echo $dataJabatan->jenis_project==''?'-':$dataJabatan->jenis_project ?>
                                </div>
                                <div class="col-md-2" align="left">
                                    <label class="">Periode</label>
                                </div>  
                                <div class="col-md-4">
                                    <?php
                                    if($dataViewPayslip->bulan==1){
                                        echo "Januari";
                                    }if($dataViewPayslip->bulan==2){
                                        echo "Februari";
                                    }if($dataViewPayslip->bulan==3){
                                        echo "Maret";
                                    }if($dataViewPayslip->bulan==4){
                                        echo "April";
                                    }if($dataViewPayslip->bulan==5){
                                        echo "Mei";
                                    }if($dataViewPayslip->bulan==6){
                                        echo "Juni";
                                    }if($dataViewPayslip->bulan==7){
                                        echo "Juli";
                                    }if($dataViewPayslip->bulan==8){
                                        echo "Agustus";
                                    }if($dataViewPayslip->bulan==9){
                                        echo "September";
                                    }if($dataViewPayslip->bulan==10){
                                        echo "Oktober";
                                    }if($dataViewPayslip->bulan==11){
                                        echo "November";
                                    }if($dataViewPayslip->bulan==12){
                                        echo "Desember";
                                    }
                                    ?>&nbsp;<?php echo $dataViewPayslip->tahun; ?>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-3" align="left">
                                    <h6 class="tittle-box m-t-10">Penerimaan</h6>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-2" align="left">
                                    <label class="">Gaji Pokok </label>
                                </div>
                                <?php if ($dataViewPayslip->standar_gaji == 0){ ?>
                                    <div class="col-md-4">
                                        Rp.-
                                    </div>
                                <?php }else{ ?>
                                <div class="col-md-4">
                                    Rp.<?php echo number_format($dataViewPayslip->standar_gaji,0,'.','.') ?>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                               <div class="col-md-3" align="left">
                                    <h6 class="tittle-box m-t-10">Tunjangan</h6>
                                </div>  
                            </div>
                            <div class="row">
                                
                                <?php 
                                $tunjangan=0;
                                if ($data_GajiLainnyaRow > 0 ){ ?>
                                    <?php foreach ($datainformasigajitunjangan->result() as $lainnya) { ?>
                                
                                
                                <div class="col-md-2 col-5" align="">
                                    <?php echo $lainnya->jenis_tunjangan ?>
                                </div>
                                <div class="col-md-4 col-4">
                                    <?php echo 'Rp '.number_format($lainnya->nilai,0,',','.') ?>
                                    <?php $tunjangan=$tunjangan+$lainnya->nilai; ?>
                                </div>
                                <?php }} ?> 
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
                            <?php if($dataViewPayslip2->nilai_tunj_koefisien != 0) {?>
                            <div class="row">
                                <div class="col-md-2" align="left">
                                    <label class="">Koefisien </label>
                                </div>
                                <div class="col-md-4">
                                    Rp.<?php echo number_format($dataViewPayslip2->nilai_tunj_koefisien,3,',','.') ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($dataViewPayslip2->nilai_tunj_tmk != 0) {?>
                            <div class="row">
                                <div class="col-md-2" align="left">
                                    <label class="">TMK </label>
                                </div>
                                <div class="col-md-4">
                                    Rp.<?php echo number_format($dataViewPayslip2->nilai_tunj_tmk,3,',','.') ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($dataViewPayslip2->nilai_tunj_jabatan != 0) {?>
                            <div class="row">
                                <div class="col-md-2" align="left">
                                    <label class="">Jabatan </label>
                                </div>
                                <div class="col-md-4">
                                    Rp.<?php echo number_format($dataViewPayslip2->nilai_tunj_jabatan,3,',','.') ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($dataViewPayslip2->tunj_lainnya > 0){ ?>
                                    <?php  
                                        $explodeTunjanganLainnya = explode(',', $dataViewPayslip2->tunj_lainnya);
                                        
                                        foreach ($explodeTunjanganLainnya as $lainnya) { 
                                            $NikLainnya=array('l.nik'=>$dataViewPayslip->nik,'l.id_jenis_tunjangan'=>$lainnya);
                                            $tunjanganLainnya = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->row(); ?>
                                            <div class="row">
                                                <div class="col-md-2" align="left">
                                                    <label>Tunjangan <?php echo $tunjanganLainnya->jenis_tunjangan?></label>
                                                </div>
                                                <div class="col-md-4">
                                                    Rp. <?php echo number_format($tunjanganLainnya->nilai,3,',','.')?>
                                                    
                                                </div>
                                            </div>
                                    <?php } ?>
                                <?php } ?>

                           <!--  <?php// if($dataTunjangan->num_rows()>0) { ?> -->
                                <div class="row">
                                   <div class="col-md-3" align="left">
                                        <h6 class="tittle-box m-t-10">Potongan</h6>
                                    </div>  
                                </div>
                                <div class="row">
                                   <div class="col-md-2" align="left">
                                        <label>BPJS Kesehatan</label>
                                    </div>
                                    <div class="col-md-4">
                                        Rp.<?php echo number_format($dataViewPayslip->bpjs_kes,0,'.','.') ?>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-2" align="left">
                                        <label>BPJS TK</label>
                                    </div>
                                    <div class="col-md-4">
                                        Rp.<?php echo number_format($dataViewPayslip->bpjs_tk,0,'.','.') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2" align="left">
                                        <label>PPH</label>
                                    </div>
                                    <div class="col-md-4">
                                        Rp.<?php echo number_format($dataViewPayslip->pph,0,'.','.') ?>
                                    </div>
                                </div>

                                
                            <!-- <?php //} ?> -->
                            <!-- <?php
                            //$tmpnilai = 0; 
                            //foreach ($dataTunjangan->result() as $tunjangan)//{ 

                            //$tmpnilai = $tmpnilai+$tunjangan->nilai;
                            ?> -->
                            <?php
                            $nik=array('a.nik'=>$dataViewPayslip->nik);
                            $dataViewpotongan = $this->Nata_hris_employee_model->data_payslip_potongan($nik); 
                            $tmpnilai=0;
                            foreach ($dataViewpotongan->result() as $dtpotongan) { 
                                $tmpnilai = $tmpnilai+$dtpotongan->nominal;
                            ?>
                                <div class="row">
                                   <div class="col-md-2" align="left">
                                        <label><?php echo $dtpotongan->deskripsi ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        Rp.<?php echo number_format($dtpotongan->nominal,0,'.','.') ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row m-t-10">
                               <div class="col-md-2" align="left">
                                    <h6 class="tittle-box ">Total Gaji</h6>
                                </div>  
                                
                                <div class="col-md-4">
                                    Rp.<?php echo number_format(($dataViewPayslip->disetorkan-$tmpnilai+$tmplemburan+$tunjangan),0,'.','.') ?>
                                </div>
                            </div>



                            <!-- div class="row">
                               <div class="col-md-2"><div class="row">
                               <div class="col-md-3" align="left">
                                    <h6 class="tittle-box m-t-10">Penerimaan</h6>
                                </div>  
                                <div class="col-md-3">
                                    <label class=""><?php //echo $dataViewPayslip->nama_lengkap ?></label>
                                </div>
                                <div class="col-md-3" align="left">
                                    <label class="">Periode</label>
                                </div>  
                                <div class="col-md-3">
                                    <label class=""><?php //echo $dataViewPayslip->nama_lengkap ?></label>
                                </div>                 
                            </div>
                                    <div class="form-group">
                                        <label class="">Nama</label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        : <label class=""><?php //echo $dataViewPayslip->nama_lengkap ?></label>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="">Departement</label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        : <label class=""><?php //echo $dataViewPayslip->deskripsi ?></label>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="">Date</label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                       : <label class=""><?php //echo $dataViewPayslip->tanggal ?></label>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="">Salary</label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        : <label class="">Rp. <?php //echo number_format($dataViewPayslip->total,0,'.','.'); ?></label>
                                    </div>
                                </div>                 
                            </div> -->
                           <!--  <div class="row">
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="">Status</label>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php 
                                       // if($dataViewPayslip->status==0){
                                       //      echo'<button type="button" class="btn btn-warning">Pending</button>';
                                       //  }if ($dataViewPayslip->status==1) {
                                       //      echo'<button type="button" class="btn btn-success">Success</button>';
                                       //  }if ($dataViewPayslip->status==2) {
                                       //      echo'<button type="button" class="btn btn-danger">Decline</button>';
                                       //  }  ?>
                                    </div>
                                </div> -->                 
                            </div>
                            
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a href="<?php echo base_url() ?>Employee/cetakgaji/<?php echo $dataViewPayslip->bulan ?>/<?php echo $dataViewPayslip->tahun ?>" target="_blank" class="btn btn-blue">Cetak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
         