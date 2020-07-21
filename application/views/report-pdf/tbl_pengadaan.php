<table class="content">
    <tr>
        <td class="leftb left" width="20%">
            Contact Person
        </td>
        <td width="1%">:</td>
        <td class="left bottomb"><?php echo $dataPengadaan->cp_pengadaan ?></td>
        <td class="left">No Telp :</td>
        <td class="left bottomb" width="20%"><?php echo $dataPengadaan->nt_pengadaan ?></td>
        <td class="rightb" width="1%">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Jumlah peralatan Security
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            Rp. <?php echo number_format($dataPengadaan->jumlah_peralatan_security,0,'.','.') ?>
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Jumlah chemical + equipment <br /><i>(terlampir)</i>
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            Rp. <?php echo number_format($dataPengadaan->jumlah_chemical_equipment,0,'.','.') ?>
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
    <tr>
        <td class="left leftb">
            Permintaan Khusus
        </td>
        <td width="1%">:</td>
        <td class="left bottomb" colspan="3">
            <?php echo $dataPengadaan->permintaan_khusus ?>
        </td>
        <td class="rightb">&nbsp;</td>
    </tr>
</table>