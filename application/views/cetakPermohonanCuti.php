<!DOCTYPE html>
<html>
    <head>
        <title>Pengajuan Cuti</title>
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
                        <img src="<?php echo str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]) ?>/assets/images/penata3x.png" width="125px" height="50px" />
                    </td>
                </tr>
            </table>
            <table >
                <tr>
                    <td align="center" rowspan="2" width="20%">
                        <h2>Pengajuan Cuti</h2>
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
                    <td colspan="4" style="text-align: left;"><?php echo $datapermohonancuti->nama_lengkap ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h4 style="text-align: left;">NIK</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo $datapermohonancuti->nik ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Departemen</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo $datapermohonancuti->desDepartemen ?>
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <h4 style="text-align: left;">Jenis Cuti</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo $datapermohonancuti->desCutiKategori; ?>
                    </td>
                </tr>
                <?php 
                    $start_date = new DateTime($datapermohonancuti->tanggal);
                    $end_date = new DateTime($datapermohonancuti->sampe_tanggal);
                    $interval = $start_date->diff($end_date);
                    $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
                    $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
                    $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
                    // echo "$interval->days hari "; // hasil : 217 hari
                 ?>

                <tr>
                    <td>
                        <h4 style="text-align: left;">Durasi</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo $interval->days+1; ?> Hari
                    </td>
                </tr>

                <tr>
                    <td>
                        <h4 style="text-align: left;">Tanggal Mulai</h4>
                    </td>
                    <td>:</td>
                    <td style="text-align: left;"><?php echo strftime(" %d %B %Y",strtotime($datapermohonancuti->tanggal)); ?></td>

                    <td>
                        <h4 style="text-align: left;">Tanggal Selesai</h4>
                    </td>
                    <td>:</td>
                    <td style="text-align: left;"><?php echo strftime(" %d %B %Y",strtotime($datapermohonancuti->sampe_tanggal)); ?></td>
                </tr>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Deskripsi</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo $datapermohonancuti->keterangan; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Dokumen</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php if($datapermohonancuti->dokumen==''){
                                    echo "Tidak Ada";
                                }else{
                                    echo "Ada";
                                }?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Ditambahkan Oleh</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo $datapermohonancuti->nama_lengkap; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Tanggal Pengajuan</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo strftime(" %d %B %Y",strtotime($datapermohonancuti->tanggal_create)); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Alasan</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php echo $datapermohonancuti->alasan; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 style="text-align: left;">Status</h4>
                    </td>
                    <td>:</td>
                    <td colspan="4" style="text-align: left;"><?php 
                                    if($datapermohonancuti->status==0){
                                        echo '<img src="'.str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]).'/assets/images/approved.png" width="150px" height="80px" />';
                                    }else if($datapermohonancuti->status==1){
                                        echo ' <img src="'.str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]).'/assets/images/approved.png" width="125px" height="50px" />';
                                    }else if($datapermohonancuti->status==2){
                                        echo '<img src="'.str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]).'/assets/images/reject.png" width="125px" height="50px" />';
                                    }
                                ?>
                    </td>
                </tr>

            </table>
        </div>
        
        <!-- 
        <div class="full-widtha">
            <table>
                <tr>
                    <td>Dibuat Oleh</td>
                    <td>:</td>
                    <td colspan="2">SDM & UMUM</td>

                    
                </tr>
                <tr>
                    <td height="5%" class="allborder"></td>
                    <td height="5%" class="allborder"></td>
                    <td height="5%" class="allborder" colspan="2"></td>
                    
                </tr>
                
            </table>
        </div> -->
        
    </body>
</html>