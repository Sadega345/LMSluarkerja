<!DOCTYPE html>
<html>
    <head>
        <title>Slip Gaji</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <style type="text/css">
            @page { margin: 25px; }
            * {
                /*font-size: 100%;*/
                font-family: Questrial;
            }
            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px
            }
            .col,
            .col-1,
            .col-10,
            .col-11,
            .col-12,
            .col-2,
            .col-3,
            .col-4,
            .col-5,
            .col-6,
            .col-7,
            .col-8,
            .col-9,
            .col-auto,
            .col-lg,
            .col-lg-1,
            .col-lg-10,
            .col-lg-11,
            .col-lg-12,
            .col-lg-2,
            .col-lg-3,
            .col-lg-4,
            .col-lg-5,
            .col-lg-6,
            .col-lg-7,
            .col-lg-8,
            .col-lg-9,
            .col-lg-auto,
            .col-md,
            .col-md-1,
            .col-md-10,
            .col-md-11,
            .col-md-12,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-md-auto,
            .col-sm,
            .col-sm-1,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-sm-auto,
            .col-xl,
            .col-xl-1,
            .col-xl-10,
            .col-xl-11,
            .col-xl-12,
            .col-xl-2,
            .col-xl-3,
            .col-xl-4,
            .col-xl-5,
            .col-xl-6,
            .col-xl-7,
            .col-xl-8,
            .col-xl-9,
            .col-xl-auto {
                position: relative;
                width: 100%;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px
            }
            .col-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }
            
            .col-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }
            
            .col-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }
            
            .col-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }
            
            .col-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }
            
            .col-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }
            
            .col-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%
            }
            
            .col-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }
            
            .col-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }
            
            .col-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%
            }
            
            .col-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%
            }
            
            .col-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }
            .table_tr1{
                background-color: rgb(224, 224, 224);
            }
            .table_tr1 td{
                padding: 7px 0px 7px 8px;
                font-weight: bold;
            }
            .table_tr2 td{
                padding: 7px 0px 7px 8px;
                border: 1px solid black;
            }

            .total_amount{
                background-color: rgb(224, 224, 224);
                font-weight: bold;
                text-align: right;

            }
            .total_amount td{
                padding: 7px 8px 7px 0px;
                border: 1px solid black;
                font-size: 15px;
            }
            table,table.content{
                width: 100%; vertical-align: middle;border-collapse: collapse;
            }
            table tr td{
               border: 1px solid black;
               padding:5px; 
               text-align: center;
               font-size: 13px;
            }
            table.content tr td{
                border: 0;
                padding:1px; 
                text-align: center;
                font-size: 11px;
            }
            table.content tr td.vertal{
                vertical-align: top;
            }
            table.content tr td.leftb{
                border-left: 1px solid black;
            }
            table.content tr td.rightb{
                border-right: 1px solid black;
            }
            table.content tr td.bottomb{
                border-bottom: 1px solid black;
            }
            table.content tr td.allborder{
                border: 1px solid black;
            }
            
            table tr td.left{
                text-align: left;
            }
            table tr td.right{
                text-align: right;
            }
            .full-widtha{
                width: 100%;
                margin:0;
            }
            body{
                margin:0;
                /* min-width: 100%; 
                min-height: 100%; 
                overflow: hidden; 
                alignment-adjust: central;*/
            }
            h1,h2,h3,h4,h5,h6{
                margin:0;
            }
            .box{
                display:inline-block;
                width:25px;
                height:25px; 
                border:1px solid black;
                background-color: transparent;
            }
            .boxs{
                display:inline-block;
                width:15px;
                height:15px; 
                border:1px solid black;
                background-color: transparent;
            }
            .pads{
                padding:3px;
            }
            .cl{
                display:inline-block;
                margin: 2px 0 0 2px;
                width:20px;
                height:20px; 
                background-color: transparent;
            }
            .cls{
                display:inline-block;
                margin: 2px 0 0 2px;
                width:10px;
                height:10px; 
                background-color: transparent;
            }
            .boxn{
                display: inline;
                padding: 15px;
            }
            .boxttd{
                height: 100px;
            }
            
            
        </style> 
        <!-- 
        <link rel="stylesheet" href="<?php //echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" /> 
        
        -->
    </head>
    <body>
<?php
setlocale(LC_ALL,"id_ID.utf8");
// $idpo=$dataProjectOrder->id_po;
// $sts=$this->uri->segment(3);
// $tglTerbit=explode(' ',$dataProjectOrder->tanggal_terbit);
?>
        <div class="full-widtha">
            <table >
                <tr>
                    <td align="center" rowspan="4" width="10%">
                        <!-- <img src="<?php //echo base_url() ?>assets/images/logo-aja.png" width="125px" height="50px" /> -->
                        <img src="<?php echo str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]) ?>/assets/logo_perusahaan/<?php echo $dataPerusahaan->logo!=""?$dataPerusahaan->logo:"not.png" ?>" width="125px" height="50px" />
                        <!-- <img src="<?php //echo base_url()?>assets/logo_perusahaan/<?php //echo $dataPerusahaan->logo!=""?$dataPerusahaan->logo:"not.png" ?>" class="img-fluid" height> -->
                    </td>
                    <td align="center" rowspan="4" width="20%">
                        <h2>SLIP GAJI KARYAWAN</h2>
                    </td>
                    
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <table>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Nama</h4>
                    </td>
                    <td>:</td>
                    <td style="text-align: left;" colspan="4"><?php echo $dataViewPayslip->nama_lengkap ?></td>

                    
                </tr>

                <tr>
                    <td>
                        <h4 style="text-align: left;">NIK</h4>
                    </td>
                    <td>:</td>
                    <td style="text-align: left;" colspan="4"><?php echo $dataViewPayslip->nik ?></td>

                    
                </tr>

                <tr>
                    <td>
                        <h4 style="text-align: left;">Jabatan</h4>
                    </td>
                    <td>:</td>
                    <td style="text-align: left;" colspan="4"><?php echo $dataViewPayslip->jenis_project ?></td>

                    
                </tr>

                <tr>
                    <td>
                        <h4 style="text-align: left;">Unit Bisnis</h4>
                    </td>
                    <td>:</td>
                    <td style="text-align: left;" colspan="4"><?php echo $dataViewPayslip->nama_perusahaan ?></td>
                </tr>

            </table>
        </div>
        <div class="full-widtha">
            <table >
                <tr>
                    <td align="center" rowspan="2" width="20%">

                        <h2><?php
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
                                    ?>&nbsp;<?php echo $dataViewPayslip->tahun; ?></h2>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="full-widtha">
            <table>
                <tr>
                    <td class="left" style="vertical-align: top;">
                        <h4>Pendapatan Kotor</h4>
                        <table>
                            <tr>
                                <td class="left">1.Upah Pokok</td>
                                <td>:</td>
                                <td>Rp. <?php echo number_format($dataViewPayslip->standar_gaji,0,',','.') ?></td>
                            </tr>

                            <?php 
                                $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
                                $hari_ini = date("Ymd",strtotime(date("Y-m-d")));
                                $where = array('nik'=>$dataViewPayslip->nik,
                                                'month(tanggal)'=>$dataViewPayslip->bulan,
                                                'year(tanggal)'=>$dataViewPayslip->tahun,
                                                'status'=>'1')
                                                ;
                                $overtime = $this->Nata_hris_employee_model->dataLemburOvertime($where);
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
                            <tr>
                                <td class="left">2.Lemburan </td>
                                <td>:</td>

                                <td>Rp. <?php echo number_format($tmplemburan,0,'.','.') ?></td>
                            </tr>

                            <?php }else{
                                $tmplemburan=0;
                            } ?>
                            <tr>
                                <td class="left" colspan="3">3.Tunjangan</td>    
                            </tr>
                            <?php 
                                    $tunjangan=0;
                                    if ($data_GajiLainnyaRow > 0 ){ ?>
                                        <?php foreach ($datainformasigajitunjangan->result() as $lainnya) { ?>
                                    
                            <tr>    
                                
                                    <td class="left">
                                        <?php echo $lainnya->jenis_tunjangan ?>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <?php echo 'Rp '.number_format($lainnya->nilai,0,',','.') ?>
                                        <?php $tunjangan=$tunjangan+$lainnya->nilai; ?>
                                    </td>
                                
                            </tr>
                            <?php }} ?>
                            <?php if($dataViewPayslipall->tunj_lainnya > 0){ ?>
                                    <?php  
                                        $explodeTunjanganLainnya = explode(',', $dataViewPayslipall->tunj_lainnya);
                                        $no=2;
                                        foreach ($explodeTunjanganLainnya as $lainnya) { 
                                            $NikLainnya=array('l.nik'=>$dataViewPayslipall->nik,'l.id_jenis_tunjangan'=>$lainnya);
                                            $tunjanganLainnya = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->row(); ?>
                                            <tr>
                                                <td class="left"><?php  echo $no; ?>.Tunjangan <?php //echo $tunjanganLainnya->jenis_tunjangan?></td>
                                                <td>:</td>
                                                <td>Rp. <?php echo number_format($tunjanganLainnya->nilai,0,',','.')?></td>
                                            </tr>
                                        <?php $no++; } ?>
                            <?php } ?> 
                            <tr>
                                <td>
                                    <h4>Jumlah I </h4>
                                </td>
                                <td>:</td>
                                <td>
                                     <?php if($dataViewPayslipall->tunj_lainnya > 0){ ?>
                                        <h4>Rp. <?php echo number_format(($dataViewPayslip->standar_gaji+$dataViewPayslipall->nilai_tunj_koefisien+$dataViewPayslipall->nilai_tunj_tmk+$dataViewPayslipall->nilai_tunj_jabatan+$dataViewPayslipall->jumlah_tunjangan_lainnya),0,',','.'); ?></h4>
                                        <!-- <h4>Rp. <?php echo number_format(($dataViewPayslip->standar_gaji+$dataViewPayslipall->nilai_tunj_koefisien+$dataViewPayslipall->nilai_tunj_tmk+$dataViewPayslipall->nilai_tunj_jabatan+$tunjangan),0,',','.'); ?></h4> -->
                                     <?php }else{ ?>
                                     <?php   } ?>
                                    <h4>Rp. 
                                        <?php //echo number_format(($dataViewPayslip->standar_gaji+$dataViewPayslipall->nilai_tunj_koefisien+$dataViewPayslipall->nilai_tunj_tmk+$dataViewPayslipall->nilai_tunj_jabatan+$tmplemburan),0,',','.') ;  ?>

                                        <?php echo number_format(($dataViewPayslip->standar_gaji+$tmplemburan+$tunjangan),0,',','.') ;  ?>
                                        
                                    </h4>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td class="left" style="vertical-align: top;">
                        <h4>Potongan-Potongan</h4>
                        <table>
                            <tr>
                                <td class="left">1.BPJS Kesehatan </td>
                                <td>:</td>

                                <td>Rp. <?php echo number_format($dataViewPayslip->bpjs_kes,0,',','.') ?></td>
                            </tr>

                            <tr>
                                <td class="left">2.BPJS TK </td>
                                <td>:</td>

                                <td>Rp. <?php echo number_format($dataViewPayslip->bpjs_tk,0,'.','.') ?></td>
                            </tr>
                            <tr>
                                <td class="left">3.PPH </td>
                                <td>:</td>

                                <td>Rp. <?php echo number_format($dataViewPayslip->pph,0,'.','.') ?></td>
                            </tr>

                            <?php
                            $no=4;
                            $nik=array('a.nik'=>$dataViewPayslip->nik);
                            $dataViewpotongan = $this->Nata_hris_employee_model->data_payslip_potongan($nik); 
                            $tmpnilai=0;
                            foreach ($dataViewpotongan->result() as $dtpotongan) { 
                                $tmpnilai = $tmpnilai+$dtpotongan->nominal;
                            ?>
                                <tr>
                                <td class="left"><?php  echo $no; ?>.<?php echo $dtpotongan->deskripsi ?></td>
                                <td>:</td>

                                <td>Rp. <?php echo number_format($dtpotongan->nominal,0,'.','.') ?></td>
                            </tr>
                            <?php $no++; } ?>

                            <!-- <?php 
                                // $tothadir = 0;
                                // $jum_hadir = $dataAbsensiEmployee->num_rows();
                                // $tothadir = ($jum_hadir*100)/22;
                            ?>
                            <tr>
                                <td class="left">3.Absensi Kehadiran</td>
                                <td>:</td>

                                <td><?php// echo number_format($tothadir,2,'.','.') ?> %</td>
                            </tr>

                            <tr>
                                <?php 
                                    //$totpph = 0;
                                    // $dataViewPayslip->sallary*$dataSettingRow->value;
                                 ?>
                                <td class="left">4.PPH</td>
                                <td>:</td>
                                <td>Rp. <?php //echo number_format($pph,0,'.','.') ?></td>
                            </tr>-->

                            <tr>
                                <td>
                                    <h4>Jumlah II</h4>
                                </td>
                                <td>:</td>
                                <td>
                                    <?php 
                                        $tmptot = $dataViewPayslip->bpjs_kes+$dataViewPayslip->bpjs_tk+$dataViewPayslip->pph+$tmpnilai;
                                     ?>
                                    <h4>Rp. <?php echo number_format(($tmptot),0,',','.'); ?></h4>
                                </td>
                            </tr> 
                        </table>
                    </td>
                </tr>

                
            </table>
        </div>
        
        <div class="full-widtha">
            <table>
                <tr>
                    <td width="50%"><label>Biaya Admin : </label><?php echo number_format($dataViewPayslipall->biaya,0,',','.') ; ?></td>
                    <td>
                        <?php 
                            if($dataViewPayslipall->tunj_lainnya > 0){ 
                                    
                                $jum1 =$dataViewPayslipall->gaji+$dataViewPayslipall->nilai_tunj_koefisien+$dataViewPayslipall->nilai_tunj_tmk+$dataViewPayslipall->nilai_tunj_jabatan+$dataViewPayslipall->jumlah_tunjangan_lainnya;
                                $jum2 =$dataViewPayslipall->nilai_bpjs_kes+$dataViewPayslipall->nilai_bpjs_tk+$dataViewPayslipall->nilai_pph+$tmpnilai;
                            }else{

                                $jum1 =$dataViewPayslipall->gaji+$dataViewPayslipall->nilai_tunj_koefisien+$dataViewPayslipall->nilai_tunj_tmk+$dataViewPayslipall->nilai_tunj_jabatan;
                                $jum2 =$dataViewPayslipall->nilai_bpjs_kes+$dataViewPayslipall->nilai_bpjs_tk+$dataViewPayslipall->nilai_pph+$tmpnilai;
                            }
                         ?>
                         <?php 
                            // $tmptotal = ($dataViewPayslipall->jumlah_disetorkan-$tmpnilai)+$tmplemburan+$tunjangan;
                            $tmptotal = ($dataViewPayslip->standar_gaji-$tmpnilai)+$tmplemburan+$tunjangan-($dataViewPayslip->bpjs_kes+$dataViewPayslip->bpjs_tk+$dataViewPayslip->pph+$tmpnilai);
                            
                          ?>
                        <h3>Upah Diterima (Jumlah I - Jumlah II) : Rp. <!-- <?php //echo number_format(($jum2-$dataViewPayslipall->biaya),3,',','.'); ?> -->
                            <?php echo number_format(($tmptotal),0,'.','.') ?>
                        </h3>
                    </td>
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <table>
                <tr>
                    <td>Dibuat Oleh</td>
                    <td>:</td>
                    <td>SDM & UMUM</td>

                    <td>*)Sudah Termasuk Biaya Transfer</td>
                </tr>
                <tr>
                    <td height="5%" class="allborder"></td>
                    <td height="5%" class="allborder"></td>
                    <td height="5%" class="allborder"></td>
                    <td height="5%" class="allborder"></td>
                </tr>
                
            </table>
        </div>
        
    </body>
</html>