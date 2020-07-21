<div class="row">
    <div class="col-md-12">
        <div class="Rectangle-35">
            <div class="container padd-top-20" >
                <div class="row">
                    <div class="col-md-3" >
                        <p class="fz-14 putih">NIK</p>
                    </div>
                    <div class="col-md-3 ">
                       <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->nik; ?></p>
                    </div>
                    <div class="col-md-3" >
                        <p class="fz-14 putih">Departemen</p>
                    </div>
                    <div class="col-md-3 ">
                       <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->des_departemen; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="fz-14 putih">Nama Pegawai</p>
                    </div>
                    <div class="col-md-3">
                       <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->nama_lengkap; ?></p>
                    </div>
                    <div class="col-md-3" >
                        <p class="fz-14 putih">Jabatan</p>
                    </div>
                    <div class="col-md-3 ">
                       <p class="fz-14 abuputih"><?php echo  $dataEditTunjangan->des_jabatan; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row m-t-10">
    <div class="col-md-4 col-6 ">
        <p class="fz-14-judul">Besaran Tunjangan</p>
    </div>
    <div class="col-md-4 col-6">
        <p class="fz-14-isi">Rp. <?php echo  number_format($dataEditTunjangan->nilai,0,'.','.'); ?></p> 
    </div>
</div>

         
                        
         