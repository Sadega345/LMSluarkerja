<div class="row form-group">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">Gaji Pokok</p>
        <p class="d-sm-none fz-14">Gaji Pokok</p>
    </div>
    <div class="col-md-5 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="hidden" name="id_karyawan_gaji" value="<?php echo $dataKaryawannya->id_karyawan_gaji ?>">
            <input type="text" name="standar_gaji" id="gapok" class="form-control text-right fcheight" maxlength="100"  value="<?php echo number_format($dataKaryawannya->standar_gaji,0,'.','.'); ?>">
        </div>
    </div>
    <div class="col-4" align="right">
        <a href="javascript:;" onclick="showTunjangan('edit');" id="btntamtunj" class="btn Rectangle-cari">Tambah Tunjangan</a>
    </div>
</div>
<!-- <?php //echo "as".$dataJenisTunjanganKaryawan->num_rows(); ?> -->
<div id="contenttunjangan">
    <?php $tot=0; foreach ($dataJenisTunjanganKaryawan->result() as $dtjtk) { ?>
    <div class="row">
        <div class="col-md-3 col-12 m-t-10">
            <p class=" hidden-sm fz-14"><?php echo $dtjtk->jenis_tunjangan; ?></p>
            <p class="d-sm-none fz-14"><?php echo $dtjtk->jenis_tunjangan; ?></p>
        </div>
        <div class="col-md-6 col-12">
            <input type="hidden" class="id_tunjubah" name="id_tunjanganubah[]" value="<?php echo $dtjtk->id_jenis_tunjangan ?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                    <?php $tot=$tot+$dtjtk->nilai; ?>
                </div>
                    <input type="text" name="besar_tunjanganubah[]" class="form-control inptunj text-right fcheight" maxlength="100" required value="<?php echo number_format($dtjtk->nilai,0,'.','.'); ?>" >&nbsp;<span><a href="<?php echo base_url()?>HR/HapusPegawaiTunjangan/<?php echo $dataKaryawannya->nik?>/<?php echo $dtjtk->id_karyawan_gaji_lainnya?>"  class="btn btn-aksi btn_remove" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus"><img src="<?php echo base_url() ?>assets/img/Delete.svg"></button></a></span>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="row" id="rowgaji">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14"> Total Gaji</p>
        <p class="d-sm-none fz-14"> Total Gaji</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" id="total_gaji" class="form-control text-right fcheight"  readonly value="<?php echo number_format(($tot+$dataKaryawannya->standar_gaji),0,'.','.') ?>">
        </div>
    </div>
</div>
<div class="row m-t-10">
    <div class="col-md-3 col-12 ">
        <p class=" hidden-sm fz-14">Bank </p>
        <p class="d-sm-none fz-14">Bank </p>
    </div>
    <div class="col-md-6 col-12">
        <select name="id_bank" class="form-control select2 fcheight" >
            <option selected disabled>-- Pilih Bank --</option>
            <?php
            foreach($databankpegawai->result() as $dtbank){
                echo '<option value="'.$dtbank->id_bank.'" '.($dataKaryawannya->id_bank==$dtbank->id_bank?'selected':'').' >'.$dtbank->deskripsi.'</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">No. Rekening </p>
        <p class="d-sm-none fz-14">No. Rekening </p>
    </div>
    <div class="col-md-6 col-12">
        <input name="nomor_rek" type="number" id="nomor_rek" class="form-control fcheight"  value="<?php echo $dataKaryawannya->nomor_rek ?>">
    </div>
</div>
<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">Atas Nama </p>
        <p class="d-sm-none fz-14">Atas Nama </p>
    </div>
    <div class="col-md-6 col-12">
        <input type="text" name="atas_nama_rek" id="atas_nama" class="form-control fcheight" onkeypress="return hanyaHuruf(event);"  value="<?php echo $dataKaryawannya->atas_nama_rek ?>">
    </div>
</div>
<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14"> Nama Atasan </p>
        <p class="d-sm-none fz-14"> Nama Atasan </p>
    </div>
    <div class="col-md-6 col-12">
       <select name="nama_atasan" class="form-control  select2 fcheight" >
            <option value="" selected disabled>-- Pilih Atasan --</option>
            <?php
            $ambilatasan = $this->Nata_hris_hr_model->dataambilatasan();
            foreach($ambilatasan->result() as $dt){
                ?>
                <option  value="<?php echo $dt->nik; ?>" <?php echo ($dt->nik==$dataKaryawannya->nama_atasan?'selected':'') ?> > <?php echo $dt->nik."-".$dt->nama_lengkap; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>

<div class="row m-t-10">
    <div class="col-md-6 col-12">
        <label class="fz-18">Informasi Ketentuan</label>
    </div>
</div>

<!-- <div class="row">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">Saldo Klaim</p>
        <p class="d-sm-none fz-14">Saldo Klaim</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="saldo_klaim" type="text" class="form-control fcheight" id="saldoklaim"  value="<?php// echo $dataKaryawannya->saldo_klaim ?>">
        </div>
    </div>
</div> -->

<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">BPJS Kesehatan</p>
        <p class="d-sm-none fz-14">BPJS Kesehatan</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="bpjs_kes" type="text" class="form-control fcheight" id="bpjs_kes"  value="<?php echo $dataKaryawannya->bpjs_kes ?>">
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">BPJS Ketenagakerjaan</p>
        <p class="d-sm-none fz-14">BPJS Ketenagakerjaan</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="bpjs_tk" type="text" class="form-control fcheight" id="bpjs_tk"  value="<?php echo $dataKaryawannya->bpjs_tk ?>">
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">PPH</p>
        <p class="d-sm-none fz-14">PPH</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="pph" type="text" class="form-control fcheight" id="pph"  value="<?php echo $dataKaryawannya->pph ?>">
        </div>
    </div>
</div>

<!-- <div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">Lembur</p>
        <p class="d-sm-none fz-14">Lembur</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
            </div>
            <input name="lemburan" type="text" class="form-control fcheight" id="lemburan"  value="<?php //echo $dataKaryawannya->lemburan ?>">
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6" align="right">
            <a href="javascript:;" onclick="showTunjangan2('edit');" id="btntamtunj2" class="btn Rectangle-cari">Tambah Cuti Pribadi</a>
    </div>
</div>
<div id="contenttunjangan2">
    <?php  foreach ($datadtlcutipribadi->result() as $dtjtk) { ?>
    <div class="row">
        <div class="col-md-3 col-12 m-t-10">
            <p class=" hidden-sm fz-14"><?php echo $dtjtk->deskripsi; ?></p>
            <p class="d-sm-none fz-14"><?php echo $dtjtk->deskripsi; ?></p>
        </div>
        <div class="col-md-6 col-12">
            <input type="hidden" class="id_tunjubahcuti" name="id_detail_cutipribadi_karyawanubah[]" value="<?php echo $dtjtk->id_leave_kategori ?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"></span>
                </div>
                    <input type="text" name="jumlah_hariubah[]" class="form-control inptunjcuti text-right fcheight" maxlength="100" required value="<?php echo number_format($dtjtk->jumlah_hari,0,'.','.'); ?>" >&nbsp;<span><a href="<?php echo base_url()?>HR/HapusPegawaiCuti/<?php echo $dataKaryawannya->nik?>/<?php echo $dtjtk->id_detail_cutipribadi_karyawan?>"  class="btn btn-aksi btn_remove" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus"><img src="<?php echo base_url() ?>assets/img/Delete.svg"></button></a></span>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<!-- <input name="saldo_cuti" type="hidden" min="1" class="form-control fcheight"  value="<?php echo $dataKaryawannya->saldo_cuti ?>"> -->

<!-- <div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">Jatah Cuti</p>
        <p class="d-sm-none fz-14">Jatah Cuti</p>
    </div>
    <div class="col-md-6 col-12">
        <div class="input-group mb-3">
            <input name="saldo_cuti" type="number" min="1" class="form-control fcheight"  value="<?php// echo $dataKaryawannya->saldo_cuti ?>">
            <div class="input-group-prepend">
                <span class="input-group-text">Hari</span>
            </div>
        </div>
        
    </div>
</div> -->

<!-- <div class="row" id="rowcv">
    <div class="col-md-3 col-5 m-t-10"  align="right">
        <label>Upload CV</label>
    </div>
    <div class="col-md-4 col-7">
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" name="cv_karyawan" class="custom-file-input" id="inputGroupFile02" >
                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
            </div>
        </div>        
    </div>
</div> -->
<div class="row ">
    <div class="col-md-3 col-12 m-t-10">
        <p class=" hidden-sm fz-14">Catatan</p>
        <p class="d-sm-none fz-14">Catatan</p>
    </div>
    <div class="col-md-6 col-12">
        <textarea name="catatan" class="form-control fcheight"><?php echo $dataKaryawannya->catatan ?></textarea>
    </div>
</div>
