<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
?>

<div class="block-header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
             <h6 class="tittle-menu"> Pengumuman / Berita</h6>
        </div>
    </div>
</div>
<div id="viewberita">
    <div class="card">
        <div class="row clearfix">
            <div class="col-sm-12 col-md-12">
              <div class="body">
                <div class="container">
                  <div class="row">
                    <label class="fz-18">Berita</label>
                  </div>
                  <div class="row">
                      <div class="col-md-5 col-5">
                        <div class="input-group " >
                            <div class="input-group-prepend">
                                <span class="input-group-text-search"><i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</span>
                            </div>
                             <input type="text" name="cari" class="form-control transparent" placeholder="Cari berita" id="cari" onkeyup="cari(this.value)">
                        </div>  
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row clearfix m-t-20">
            <div class="col-sm-12 col-md-12" >
              <div class="body" id="berita">
                 <?php foreach ($dataBerita->result() as $dtBerita) { ?>
                  <div class="row">
                      <div class="col-12 col-md-2 text-center">
                          <img src="<?php echo base_url() ?>assets/img/berita/<?php echo $dtBerita->image!=''?$dtBerita->image:'noimage.png' ?>" class="img-fluid" />
                      </div>
                      <div class="col-sm-8 col-md-8 m-t-10">
                          <h6><?php echo $dtBerita->judul; ?></h6>
                          <p class="fz-14-isi"><?php echo $dtBerita->location; ?>,<?php echo strftime(" %d %B %Y",strtotime($dtBerita->tanggal)); ?></p>
                          <p class="fz-14-isi"><?php echo substr($dtBerita->deskripsi,0,175) ?>...</p>
                        <span>
                            <button class="btn btn-aksi  col-md-3 selengkapnya" data-id="<?php echo $dtBerita->id_berita ?>" type="button"><img src="<?php  echo base_url()?>assets/img/View.svg" class="padd-right-5">Selengkapnya </button> 
                        </span>
                      </div>
                      <div class="col-sm-2 col-md-2">
                         
                      </div>
                  </div> 
                  <hr> 
                <?php } ?>  
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function cari(cari){
              $.ajax({
              url: '<?=site_url();?>Employee/cariBerita', //calling this function
              data:{cari:cari},
              type:'POST',
              cache: false,

          success: function(data) {
            $('#berita').html(data);
               // alert("success");
               // location.reload();
            }
          });
          }
</script>

<script type="text/javascript">
    $(document).on("click", ".selengkapnya", function() {
        var id = $(this).data('id');
        
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('Employee/viewBerita'); ?>",
            data: "id=" +id
        })
        // alert(id)
        .done(function(data) {
            
            $('#viewberita').html(data);
        })
    })
</script>