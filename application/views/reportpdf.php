<!DOCTYPE html>
<html>
    <head>
        <title>Project Order</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <style type="text/css">
            html, body {
                display: block;
            }
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
                height:20px; 
                border:1px solid black;
                background-color: transparent;
            }
            .boxs{
                display:inline-block;
                width:10px;
                height:8px; 
                border:1px solid black;
                background-color: transparent;
            }
            .boxss{
                display:inline-block;
                width:15px;
                height:8px; 
               /* border:1px solid black;*/
                background-color: transparent;
            }
            .pads{
                padding:0px 3px 3px 10px;
            }
            .cl{
                display:inline-block;
                margin: 1px;
                width:20px;
                height:20px; 
                background-color: transparent;
            }
            .cls{
                display:inline-block;
                margin: 1px 0 0 1px;
                width:8px;
                height:8px; 
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
        
    </head>
    <body>
<?php
setlocale(LC_ALL,"id_ID.utf8");
$idpo=$dataProjectOrder->id_po;
$sts=$this->uri->segment(3);
$tglTerbit=explode(' ',$dataProjectOrder->tanggal_terbit);
?>
<?php
//print_r($_SERVER);
?>
        <div class="full-widtha">
            <table >
                <tr>
                    <td align="center" rowspan="4" width="10%">
                        <img src="<?php echo str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]) ?>/assets/images/logo-aja.png" width="125px" height="50px" />
                    </td>
                    <td align="center" rowspan="4" width="20%">
                        <h2>PROJECT ORDER</h2>
                    </td>
                    <td width="10%" class="left"> Nomor Dokumen</td>
                    <td width="10%" class="left"><?php echo $dataProjectOrder->nomor_dokumen ?></td>
                </tr>
                <tr>
                    <td class="left"> Tanggal Terbit</td>
                    <td class="left"><?php //echo $tglTerbit[0] ?></td>
                </tr>
                <tr>
                    <td class="left"> Revisi</td>
                    <td class="left"><?php echo $dataProjectOrder->revisi ?></td>
                </tr>
                <tr>
                    <td class="left"> Halaman</td>
                    <td class="left"><?php echo $dataProjectOrder->halaman ?></td>
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <table >
                <tr>
                    <td>No. Surat Kontrak</td>
                    <td><?php echo $dataProjectOrder->no_surat_kontrak ?></td>
                    <td>Tgl. Kontrak</td>
                    <td><?php echo strftime("%d-%B-%Y",strtotime($dataProjectOrder->tgl_kontrak)); ?></td>
                    <td>Nomor Project Order</td>
                    <td><?php echo $dataProjectOrder->no_projek_order ?></td>
                    <td>Tanggal Project Order</td>
                    <td><?php echo strftime("%d-%B-%Y",strtotime($dataProjectOrder->tanggal_projek_order)); ?></td>
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <table >
                <tr>
                    <td class="left">
                        <h4>
                            <?php
                            $imgcheck ='<img  class="cl" src="'.str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]).'assets/img/check-mark.png" />';
                            ?>
                            <div class="box"><?php echo $sts==1?$imgcheck:"&nbsp;"; ?></div> BARU 
                            <div class="box"><?php echo $sts==2?$imgcheck:"&nbsp;"; ?></div> PERPANJANGAN 
                            <div class="box"><?php echo $sts==3?$imgcheck:"&nbsp;"; ?></div> REVISI/ADENDUM 
                            <div class="box boxn">NOMOR</div>
                            <?php echo $dataProjectOrder->nomor; ?>
                        </h4>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="full-widtha">
            <table>
                <tr>
                    <td>
                        <h3>MARKETING</h3>
                    </td>
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <?php 
            $dtm['dataMarketing']=$dataProjectOrder;
            $this->load->view("report-pdf/tbl_marketing",$dtm); ?>
        </div>
        
        <div class="full-widtha">
            <table>
                <tr>
                    <td>
                        <h3>KEUANGAN</h3>
                    </td>
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <?php 
            $dtk['dataKeuangan']=$dataProjectOrder;
            $this->load->view("report-pdf/tbl_keuangan",$dtk); ?> 
        </div>
        
        <div class="full-widtha">
            <table>
                <tr>
                    <td>
                        <h3>OPERASIONAL - SDM</h3>
                    </td>
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <?php 
            $dts['dataSdm']=$dataProjectOrder;
            $this->load->view("report-pdf/tbl_sdm",$dts); ?>
        </div>
        
        <div class="full-widtha">
            <table>
                <tr>
                    <td>
                        <h3>PENGADAAN</h3>
                    </td>
                </tr>
            </table>
        </div>
        <div class="full-widtha">
            <?php 
            $dtp['dataPengadaan']=$dataProjectOrder;
            $this->load->view("report-pdf/tbl_pengadaan",$dtp); ?>
        </div>
        
        <div class="full-widtha">
            <table>
                <tr>
                    <td>
                        <h4>Manager Marketing</h4>
                    </td>
                    <td>
                        <h4>Manager SDM</h4>
                    </td>
                    <td>
                        <h4>Manager Operasional</h4>
                    </td>
                    <td>
                        <h4>Manager Keuangan</h4>
                    </td>
                    <td>
                        <h4>General Manager</h4>
                    </td>
                    <td>
                        <h4>Direktur</h4>
                    </td>
                </tr>
                <tr>
                    <td class="boxttd">&nbsp;</td>
                    <td class="boxttd">&nbsp;</td>
                    <td class="boxttd">&nbsp;</td>
                    <td class="boxttd">&nbsp;</td>
                    <td class="boxttd">&nbsp;</td>
                    <td class="boxttd">&nbsp;</td>
                </tr>
            </table>
        </div>
    </body>
</html>