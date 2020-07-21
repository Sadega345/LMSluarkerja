<?php
$jenisProjek=explode(',',$dataMarketing->jenis_projek);
$tglAwal=explode(' ',$dataProjectOrder->durasi_kontrak_akhir);
$tglAkhir=explode(' ',$dataProjectOrder->durasi_kontrak_awal);
?>
<table class="content">
    <tr>
        <td class="leftb left" width="20%">
            Nama Pekerjaan
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="7"><?php echo $dataMarketing->nama_pekerjaan ?></td>
        <td class="rightb" width="1%">&nbsp;</td>
    </tr>
    <!-- <tr>
        <td class="left leftb">&nbsp;</td>
        <td width="1%">:</td>
        <td class="left bottomb">-</td>
        <td class="rightb">&nbsp;</td>
    </tr> -->
    <tr>
        <td class="left leftb">
            Nama Perusahaan
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="7"><?php echo $dataMarketing->nama_perusahaan; ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Alamat Perusahaan
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="7"><?php echo $dataMarketing->alamat; ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Kota
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="7"><?php echo $dataMarketing->kota; ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            No Telp.
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="2"><?php echo $dataMarketing->no_telp; ?></td>
        <td class="left" width="10%">No. Faximile</td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3"><?php echo $dataMarketing->no_faximile!=""?$dataMarketing->no_faximile:"-"; ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Jenis Project
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="7">
            <?php
            $imgcheck ='<img  class="cls" src="'.str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]).'assets/img/check-mark.png" />';
            foreach ($dataJenisProjek->result() as $projek){
                 if(in_array($projek->id_master_jenis_project, $jenisProjek) ){ 
                echo '<div class="boxs">'.(in_array($projek->id_master_jenis_project,$jenisProjek)?$imgcheck:"&nbsp;").'</div> '.$projek->jenis_project." ";
                }
            } ?>
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Contact Person
        </td>
        <td width="1%">:</td>
        <td class="left" colspan="7"><?php echo $dataMarketing->contact_person ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Durasi Kontrak
        </td>
        <td width="1%">:</td>
        <td class="left" colspan="7">
            <?php echo $tglAwal[0] ?>
            <span class="input-group-addon text-center" style="width: 100px;padding-top: 8px">s/d</span>
            <?php echo $tglAkhir[0] ?>
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td width="20%" class="left leftb">
            Nilai Kontrak Per Bulan
        </td>
        <td width="1%">:</td>
        <td class="left">Rp. <?php echo number_format($dataMarketing->nilai_kontrak_bulan,0,'.','.')  ?></td>
        <td width="5%">Ppn</td>
        <td width="1%">:</td>
        <td width="20%" class="right"><?php echo number_format($dataProjectOrder->ppn,0,'.','.') ?></td>
        <td width="5%">Pph 23</td>
        <td width="1%">:</td>
        <td width="20%" class="right"><?php echo number_format($dataProjectOrder->pph,0,'.','.') ?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
</table>