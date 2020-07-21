<!-- <div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pengumuman / Berita / Detail </h6>
        </div>
    </div>
</div> -->
<!-- <div class="row clearfix">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="tittle-box" >Berita </h6>
                    </div>
                    <div class="col-md-1 m-t-5 col-2" align="right">
                        <label>Cari</label>
                    </div>
                    <div class="col-md-3 col-5" align="right">
                        <input type="text" name="cari" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="row clearfix">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-md-12" align="center">
                        <img src="<?php echo base_url() ?>assets/img/berita/<?php echo $dataviewberita->image!=''?$dataviewberita->image:'noimage.png'; ?>" class="img-responsive" height="250px" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <h5 class="tittle-box"><?php echo $dataviewberita->judul; ?></h5>
                         <p><?php echo $dataviewberita->location; ?>,<?php echo strftime(" %d %B %Y",strtotime($dataviewberita->tanggal)); ?></p>
                        <p><?php echo $dataviewberita->deskripsi; ?></p>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" align="center" >
                    <!-- <div class="btn-group btn-group-lg" role="group" aria-label="small button group">
                        <button type="button" class="btn btn-secondary">Left</button> -->
                        <a href="<?php echo base_url()?>Employee/berita" class="btn btn-aksi  col-md-3"><i class="fa fa-arrow-left"></i> &nbsp;  Beranda</a>
                       <!--  <button type="button" class="btn btn-secondary">Right</button>
                    </div> -->
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <?php foreach ($dataviewberita2->result() as $dt) { ?>
        <div class="col-md-4">
            <div class="card">
                <div class="body">
                    <h6 class="tittle-box"><?php echo $dt->judul; ?></h6>
                    <p><?php echo $dt->location; ?>,<?php echo strftime(" %d %B %Y",strtotime($dt->tanggal)); ?></p>
                    <p><?php echo substr($dt->deskripsi,0,100); ?>...</p>
                    <span align="center">
                            <button class="btn btn-aksi selengkapnya"  data-id="<?php echo $dt->id_berita ?>" type="button"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">Selengkapnya </button>
                    </span>
                </div>
            </div>
        </div>
    <?php } ?>       
</div>