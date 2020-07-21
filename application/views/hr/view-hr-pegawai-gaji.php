<div class="row">
    <div class="col-md-6 col-12">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Gaji Pokok </p>
                <p class="d-sm-none fz-14 hitam">Gaji Pokok </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp. <?php echo number_format($dataKaryawannya->standar_gaji,0,'.','.'); ?></p>
            </div>
        </div>

        <?php 
            $nik=array('a.nik'=>$dataKaryawannya->nik);
            $datatunjangan=$this->Nata_hris_hr_model->dataTunjangan($nik);
            $datatunjangan1=$this->Nata_hris_hr_model->dataTunjangan($nik)->num_rows();
            // echo $datatunjangan1;
        ?>
        <?php $numb=0; foreach ($datatunjangan->result() as $dt) {
            $numb=$numb+$dt->nilai;
        ?>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam"><?php echo $dt->jenis_tunjangan; ?> </p>
                <p class="d-sm-none fz-14 hitam"><?php echo $dt->jenis_tunjangan; ?> </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp.<?php echo number_format($dt->nilai,0,'.','.'); ?></p>
            </div>
        </div>
        <?php } ?>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Total Gaji </p>
                <p class="d-sm-none fz-14 hitam">Total Gaji </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp.<?php echo number_format(($numb+$dataKaryawannya->standar_gaji),0,'.','.'); ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Bank </p>
                <p class="d-sm-none fz-14 hitam">Bank </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nama_bank; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">No. Rekening </p>
                <p class="d-sm-none fz-14 hitam">No. Rekening </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nomor_rek; ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Atas Nama </p>
                <p class="d-sm-none fz-14 hitam">Atas Nama </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php echo $dataKaryawannya->atas_nama_rek; ?></p>
            </div>
        </div>
         <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam"> Nama Atasan</p>
                <p class="d-sm-none fz-14 hitam"> Nama Atasan</p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php echo $dataKaryawannya->nama_atasan!=""?$datanamaatasan->nama_panggilan:'-'; ?></p>
            </div>
        </div>

        <!-- <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Atas Nama </p>
                <p class="d-sm-none fz-14 hitam">Atas Nama </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php echo $dataKaryawannya->atas_nama_rek; ?></p>
            </div>
        </div> -->

    </div>

    <div class="col-md-6 col-12">
        <label class="fz-18">Informasi Ketentuan</label>
        <!-- <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Saldo Klaim </p>
                <p class="d-sm-none fz-14 hitam">Saldo Klaim </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp.<?php //echo number_format($dataKaryawannya->saldo_klaim,0,'.','.'); ?></p>
            </div>
        </div> -->

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">BPJS Kesehatan </p>
                <p class="d-sm-none fz-14 hitam">BPJS Kesehatan </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp.<?php echo number_format($dataKaryawannya->bpjs_kes,0,'.','.'); ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">BPJS Ketenagakerjaan </p>
                <p class="d-sm-none fz-14 hitam">BPJS Ketenagakerjaan </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp.<?php echo number_format($dataKaryawannya->bpjs_tk,0,'.','.'); ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">PPH </p>
                <p class="d-sm-none fz-14 hitam">PPH </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp.<?php echo number_format($dataKaryawannya->pph,0,'.','.'); ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Lemburan </p>
                <p class="d-sm-none fz-14 hitam">Lemburan </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">Rp.<?php echo number_format($dataKaryawannya->lemburan,0,'.','.'); ?></p>
            </div>
        </div>
        <?php 
            $nik=array('a.nik'=>$dataKaryawannya->nik);
            $datadtlcutipribadi= $this->Nata_hris_hr_model->datadtlcutipribadi($nik);
            // echo $datatunjangan1;
        ?>
        <?php  
        foreach ($datadtlcutipribadi->result() as $dt) {    
        ?>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam"><?php echo $dt->deskripsi; ?> </p>
                <p class="d-sm-none fz-14 hitam"><?php echo $dt->deskripsi; ?> </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php echo $dt->jumlah_hari; ?> Hari</p>
            </div>
        </div>
        <?php } ?>

        <!-- <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Jatah Cuti </p>
                <p class="d-sm-none fz-14 hitam">Jatah Cuti </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php //echo $dataKaryawannya->saldo_cuti>0?$dataKaryawannya->saldo_cuti." Hari":"-"; ?></p>
            </div>
        </div> -->

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Catatan </p>
                <p class="d-sm-none fz-14 hitam">Catatan </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu"><?php echo $dataKaryawannya->catatan; ?></p>
            </div>
        </div>
    </div>
</div>

