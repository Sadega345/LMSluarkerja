<div class="row">
    <div class="col-md-12">
         <div class="Rectangle-35">
            <div class="container padd-top-20" >
                <div class="row">
                    <div class="col-md-3" >
                        <p class="hidden-sm fz-14 putih">Judul Kuesioner </p>
                        <p class="d-sm-none fz-14 putih">Judul Kuesioner </p>
                    </div>
                    <div class="col-md-3">
                        <p class="hidden-sm fz-14 abuputih"><?php echo $datakuesionerdetail->judul ?></p>
                        <p class="d-sm-none fz-14 abuputih"><?php echo $datakuesionerdetail->judul ?></p>
                    </div>
                    <div class="col-md-3" >
                        <p class="hidden-sm fz-14 putih">Tanggal Mulai </p>
                        <p class="d-sm-none fz-14 putih">Tanggal Mulai </p>
                    </div>
                    <div class="col-md-3">
                        <p class="hidden-sm fz-14 abuputih"><?php echo strftime(" %d %B %Y",strtotime($datakuesionerdetail->tanggal_mulai)); ?></p>
                        <p class="d-sm-none fz-14 abuputih"><?php echo strftime(" %d %B %Y",strtotime($datakuesionerdetail->tanggal_mulai)); ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3" >
                        <p class="hidden-sm fz-14 putih">Tanggal Akhir </p>
                        <p class="d-sm-none fz-14 putih">Tanggal Akhir </p>
                    </div>
                    <div class="col-md-3">
                        <p class="hidden-sm fz-14 abuputih"><?php echo strftime(" %d %B %Y",strtotime($datakuesionerdetail->tanggal_selesai)); ?></p>
                        <p class="d-sm-none fz-14 abuputih"><?php echo strftime(" %d %B %Y",strtotime($datakuesionerdetail->tanggal_selesai)); ?></p>
                    </div>
                    
                </div>
            </div>
         </div>
    </div>
</div>

<div class="row m-t-20">
    <div class="col-12 col-md-12">
        <label class="hidden-sm fz-18">Deskripsi </label>
        <label class="d-sm-none fz-18">Deskripsi </label>
        <p class="hidden-sm fz-14"><?php echo $datakuesionerdetail->deskripsi ?></p>
        <p class="d-sm-none fz-14"><?php echo $datakuesionerdetail->deskripsi ?></p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12">
        <label class="hidden-sm fz-18">Pertanyaan </label>
        <label class="d-sm-none fz-18">Pertanyaan </label>
        <?php 
            foreach ($datakuesionerdetailpertanyaan->result() as $dataKuesionerDetailPertanyaan ) { ?>
                <p class="hidden-sm fz-14"> <?php echo $dataKuesionerDetailPertanyaan->pertanyaan ?></p>
                <p class="d-sm-none fz-14"> <?php echo $dataKuesionerDetailPertanyaan->pertanyaan ?></p>
            <?php } ?>
    </div>

</div>   