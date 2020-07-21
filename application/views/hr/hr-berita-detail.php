<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
?>

                <div class="row">
                    <div class="col-md-12" align="center">
                        <img src="<?php echo base_url() ?>assets/img/berita/<?php echo $databeritadetail->image!=''?$databeritadetail->image:'noimage.png'; ?>" class="img-responsive" height="250px" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" >
                        <label class="fz-18-tebal"><?php echo $databeritadetail->judul; ?></label>
                        <p class="fz-12"><?php echo $databeritadetail->location; ?>,<?php echo strftime(" %d %B %Y",strtotime($databeritadetail->tanggal)); ?></p>
                        <p><?php echo $databeritadetail->deskripsi; ?></p>
                    </div>
                </div>