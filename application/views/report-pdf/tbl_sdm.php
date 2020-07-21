<?php
    $imgcheck ='<img  class="cls" src="'.str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]).'assets/img/check-mark.png" />';
    $fasilitaslain=explode(',',$dataSdm->fasilitas_lain);
?>
<table class="content">
    <tr>
        <td class="leftb left" width="20%">
            Contact Person
        </td>
        <td width="1%">:</td>
        <td class="left bottomb"><?php echo $dataSdm->cp_sdm ?></td>
        <td class="left">No Telp :</td>
        <td class="left bottomb" width="20%"><?php echo $dataSdm->nt_sdm ?></td>
        <td class="rightb" width="1%">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Jumlah Personil 
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            <div class="boxss pads"><?php echo ($dataSdm->personil_laki+$dataSdm->personil_perempuan) ?></div> orang 
            <div class="boxss pads"><?php echo $dataSdm->personil_laki ?></div> Laki-laki  
            <div class="boxss pads"><?php echo $dataSdm->personil_perempuan ?></div> Perempuan
            <div class="boxss pads"><?php echo $dataSdm->personil_korlap ?></div> Korlap
            <div class="boxss pads"><?php echo ($dataSdm->personil_laki+$dataSdm->personil_perempuan)-$dataSdm->personil_korlap ?></div> Anggota
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Jumlah Lokasi
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3"><?php echo $dataSdm->jumlah_lokasi ?> Lokasi (data perlokasi <i>terlampir</i>)</td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Penggajian sebesar
        </td>
        <td width="1%">:</td>
        <td class="left bottomb">Rp. <?php echo number_format(floatval($dataSdm->jumlah_penggajian),0,'.','.');?></td>
        <td class="left">Tunjangan :</td>
        <td class="left bottomb" width="20%">Rp. <?php echo number_format($dataSdm->tunjangan,0,'.','.');?></td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Fasilitas BPJS dari Perusahaan
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            <div class="boxss pads"><?php echo $dataSdm->fasilitas_bpjs_tenaga_kerja;?>%</div> BPJS Tenaga Kerja 
            <div class="boxss pads"><?php echo $dataSdm->fasilitas_bpjs_kesehatan ?>%</div> BPJS Kesehatan  
            <div class="boxss pads"><?php echo $dataSdm->fasilitas_bpjs_pensiun ?>%</div> BPJS Pensiun
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="leftb left" width="20%">
            Potongan BPJS Tenaga Kerja
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            <div class="boxss pads"><?php echo $dataSdm->potongan_bpjs_tenaga_kerja;?>%</div> BPJS Tenaga Kerja 
            <div class="boxss pads"><?php echo $dataSdm->potongan_bpjs_kesehatan ?>%</div> BPJS Kesehatan  
            <div class="boxss pads"><?php echo $dataSdm->potongan_bpjs_pensiun ?>%</div> BPJS Pensiun
        </td>
        <td class="rightb" width="1%">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Fasilitas THR
        </td>
        <td width="1%">:</td>
        <td class="left bottomb">Rp.<?php echo number_format(floatval($dataSdm->thr),0,'.','.') ?></td>
        <td class="left">Ditagihkan :</td>
        <td class="left bottomb" width="20%">
            <div class="boxs"><?php echo  $dataSdm->thr_ditagihkan_sdm=='1'?$imgcheck:""; ?></div> Bulanan 
            <div class="boxs"><?php echo  $dataSdm->thr_ditagihkan_sdm=='2'?$imgcheck:""; ?></div> Saat Hari Raya
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Fasilitas seragam
        </td>
        <td width="1%">:</td>
        <td class="left bottomb">
            <div class="boxss pads"><?php echo $dataSdm->fasilitas_seragam_pcs ?></div> Stel 
            <div class="boxss pads"><?php echo $dataSdm->fasilitas_seragam_stel ?></div> Pcs  
        </td>
        <td class="left"><b>* Spesifikasi</b> :</td>
        <td class="left bottomb" width="20%"><?php echo $dataSdm->fasilitas_seragam_spesifikasi ?>"</td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Fasilitas Lain-lain
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            <div class="boxs"><?php echo in_array('1', $fasilitaslain)?$imgcheck:""; ?></div> ID CARD 
            <div class="boxs"><?php echo in_array('2', $fasilitaslain)?$imgcheck:""; ?></div> DPLK
            <div class="boxs"><?php echo in_array('3', $fasilitaslain)?$imgcheck:""; ?></div> Asuransi
            <div class="boxs"><?php echo in_array('4', $fasilitaslain)?$imgcheck:""; ?></div> Cuti
            <div class="boxs"><?php echo in_array('5', $fasilitaslain)?$imgcheck:""; ?></div> Pesangon
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Overtime/Lembur
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            <div class="boxs"><?php echo $dataSdm->lembur_sdm=='2'?$imgcheck:""; ?></div> Tidak  
            <div class="boxs"><?php echo $dataSdm->lembur_sdm=='1'?$imgcheck:""; ?></div> Ada 
            <div class="boxs"><?php echo $dataSdm->lembur_sesuai=='1'?$imgcheck:""; ?></div> Hitung Sesuai Pemerintah
            <div class="boxs"><?php echo $dataSdm->lembur_sesuai=='2'?$imgcheck:""; ?></div> Perhitungan Klien
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Kontrak Kerja Personil
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            <div class="boxs"><?php echo $dataSdm->kontrak_kerja_personel=='1'?$imgcheck:""; ?></div> PKS  
            <div class="boxs"><?php echo $dataSdm->kontrak_kerja_personel=='2'?$imgcheck:""; ?></div> PKWT 
            <div class="boxs"><?php echo $dataSdm->kontrak_kerja_personel=='3'?$imgcheck:""; ?></div> PKWTT
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
</table>