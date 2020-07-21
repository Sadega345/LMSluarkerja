<?php
$datapenagihan=explode(',',$dataKeuangan->data_penagihan);
?>
<table class="content">
    <tr>
        <td class="leftb left" width="20%">
            Cara Penagihan
        </td>
        <td width="1%">:</td>
        <td class="left" width="80%"  colspan="3">
            <?php
                $imgcheck ='<img  class="cls" src="'.str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]).'assets/img/check-mark.png" />';
            ?>
            <div class="boxs"><?php echo  $dataKeuangan->cara_penagihan=='3'?$imgcheck:""; ?></div> Sesuai Nilai Kontrak 
            <div class="boxs"><?php echo  $dataKeuangan->cara_penagihan=='1'?$imgcheck:""; ?></div> Fluktuatif (ada lembur) 
            <div class="boxs"><?php echo  $dataKeuangan->cara_penagihan=='2'?$imgcheck:""; ?></div> Langsung Tagih 
        </td>
        <td class="rightb" width="1%">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Penagihan ditujukan kepada
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3"><?php echo $dataKeuangan->nama_perusahaan ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Contact person
        </td>
        <td width="1%">:</td>
        <td class="left bottomb"><?php echo $dataKeuangan->cp_keuangan ?></td>
        <td class="left">No Telp :</td>
        <td class="left bottomb" width="20%"><?php echo $dataKeuangan->nt_keuangan ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Tanggal Penagihan
        </td>
        <td width="1%">:</td>
        <td class="left" colspan="3"><?php echo $dataKeuangan->tanggal_penagihan ?> (tanggal saat dimana tagihan yang benar harus sudah diterima klien)</td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Jatuh tempo penagihan
        </td>
        <td width="1%">:</td> 
        <td class="left" colspan="3"><?php echo $dataProjectOrder->jatuh_tempo ?> hari setelah tagihan diterima dengan benar</td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="leftb left" width="20%">
            Overtime/Lembur
        </td>
        <td width="1%">:</td>
        <td class="left" colspan="3">
            <div class="boxs"><?php echo  $dataProjectOrder->lembur_keuangan=='2'?$imgcheck:""; ?></div> Tidak 
            <div class="boxs"><?php echo  $dataProjectOrder->lembur_keuangan=='1'?$imgcheck:""; ?></div> Ada  
            <div class="boxs"><?php echo  $dataProjectOrder->lembur_manajemen=='1'?$imgcheck:""; ?></div> Dikenakan Fee Manajemen
            <div class="boxs"><?php echo  $dataProjectOrder->lembur_manajemen=='2'?$imgcheck:""; ?></div> Tanpa Fee Manajemen
        </td>
        <td class="rightb" width="1%">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Pemberian lembur setiap tanggal
        </td>
        <td width="1%">:</td>
        <td class="left" colspan="3">
            <div class="boxs"><?php echo  $dataProjectOrder->pemberian_lembur_tiap_tanggal=='1'?$imgcheck:""; ?></div> 1 
            <div class="boxs"><?php echo  $dataProjectOrder->pemberian_lembur_tiap_tanggal=='2'?$imgcheck:""; ?></div> 15  
            <div class="boxs"><?php echo  $dataProjectOrder->pemberian_lembur_tiap_tanggal=='3'?$imgcheck:""; ?></div> 20
            <div class="boxs"><?php echo  $dataProjectOrder->pemberian_lembur_tiap_tanggal=='4'?$imgcheck:""; ?></div> 25
            <div class="boxs"><?php echo  $dataProjectOrder->pemberian_lembur_tiap_tanggal=='5'?$imgcheck:""; ?></div> 30
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Penggajian setiap tanggal
        </td>
        <td width="1%">:</td>
        <td class="left" colspan="3">
            <div class="boxs"><?php echo  $dataProjectOrder->penggajian_tiap_tanggal=='1'?$imgcheck:""; ?></div> 1 
            <div class="boxs"><?php echo  $dataProjectOrder->penggajian_tiap_tanggal=='2'?$imgcheck:""; ?></div> 15  
            <div class="boxs"><?php echo  $dataProjectOrder->penggajian_tiap_tanggal=='3'?$imgcheck:""; ?></div> 20
            <div class="boxs"><?php echo  $dataProjectOrder->penggajian_tiap_tanggal=='4'?$imgcheck:""; ?></div> 25
            <div class="boxs"><?php echo  $dataProjectOrder->penggajian_tiap_tanggal=='5'?$imgcheck:""; ?></div> 30
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            THR ditagihkan
        </td>
        <td width="1%">:</td>
        <td class="left" colspan="3">
            <div class="boxs"><?php echo  $dataProjectOrder->thr_ditagihkan=='1'?$imgcheck:""; ?></div> Setiap Bulan 
            <div class="boxs"><?php echo  $dataProjectOrder->thr_ditagihkan=='2'?$imgcheck:""; ?></div> Hari Sebelum Hari Raya 
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">&nbsp;</td>
        <td width="1%">:</td>
        <td class="left" colspan="3">
            <div class="boxs"><?php echo  $dataProjectOrder->thr_ditagihkan_manajemen=='1'?$imgcheck:""; ?></div> Dikenakan Fee Manajemen 
            <div class="boxs"><?php echo  $dataProjectOrder->thr_ditagihkan_manajemen=='2'?$imgcheck:""; ?></div> Tanpa Fee Manajemen
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb vertal">
            Kelengkapan data penagihan <br /><i>(ditulis secara lengkap)</i>
        </td>
        <td width="1%">:</td>
        <td  class="left" colspan="3">
            <table class="content">
                <tr>
                <?php
                $num=1;
                foreach ($dataPenagihan->result() as $penagihan){
                    if(in_array($penagihan->id_master_penagihan, $datapenagihan)){
                        ?>
                        <td class="left" width="1%"><?php echo $num; ?>.</td>
                        <td class="left bottomb"><?php echo $penagihan->nama_penagihan ?></td>
                        <?php
                        if($num%3==0){
                            echo "</tr><tr>";
                        }
                        $num++;
                    }
                }
                ?>
            </table>
        </td>
        <td  class="rightb">&nbsp;</td>
    </tr>
    
</table>