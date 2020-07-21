
<style type="text/css">
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  /*right: -500px;*/
  top: -5px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #28a745;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}   
</style>
<div class="block-header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pengumuman / Berita</h6> -->
          <p class="fz-36 barlow-bold"> Pengumuman / Berita</p>
        </div>
    </div>
</div>
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
                  <?php if ($dataAkses == '1'){ ?>
                    <div class="col-md-7 col-7 m-t-10" align="right">
                      <a href="javascript:;" onclick="formtambah()" class="btn Rectangle-diterima col-4"><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Berita</a>
                    </div>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row clearfix m-t-20">
        <div class="col-sm-12 col-md-12" >
          <div class="body" id="berita">
             <?php foreach ($databerita->result() as $dataBerita) { ?>
              <div class="row">
                  <div class="col-12 col-md-2 text-center">
                      <img src="<?php echo base_url() ?>assets/img/berita/<?php echo $dataBerita->image!=''?$dataBerita->image:'noimage.png' ?>" class="img-fluid" />
                  </div>
                  <div class="col-sm-8 col-md-8 m-t-10">
                      <h6><?php echo $dataBerita->judul; ?></h6>
                      <p class="fz-14-isi"><?php echo $dataBerita->location; ?>,<?php echo strftime(" %d %B %Y",strtotime($dataBerita->tanggal)); ?></p>
                      <p class="fz-14-isi"><?php echo substr($dataBerita->deskripsi,0,175) ?>...</p>
                      <span>
                        <a href="javascript:;" onclick="formview('<?php echo $dataBerita->id_berita ?>')" class="btn btn-aksi col-md-3 col-6"><img src="<?php  echo base_url()?>assets/img/View.svg" class="padd-right-5">Selengkapnya</a> 
                          <?php if ($dataAkses == '1'){ ?>
                          
                          <a href="javascript:;" onclick="formedit('<?php echo $dataBerita->id_berita ?>')" class="btn btn-aksi "><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</a>

                          <a href="javascript:;>"  class="btn btn-aksi hapus"  title="Hapus"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus</a> 

                          <label class="switch " >
                              <input type="checkbox" onclick="ubah('<?php echo $dataBerita->id_berita ?>','<?php echo $dataBerita->status=='1'?'0':'1'?>')" <?php echo $dataBerita->status=='1'?'checked':''; ?>>
                              <span class="slider round"></span>
                          </label>

                          <?php } ?>
                          
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
<!-- edit modal -->
<div class="modal fade bd-example-modal-lg" id="edit">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
            <div class="modal-body" >
                  <form action="<?php echo base_url() ?>HR/ProsesEditBerita" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Edit Berita</label>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="formedit">
                                    </div>
                                </div>
                            </div>
                             <div class="row m-t-10">
                                <div class="col-md-6">
                                    <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                    <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- tambah modal -->
<div class="modal fade bd-example-modal-lg" id="tambah">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
            <div class="modal-body" >
                  <form action="<?php echo base_url() ?>HR/ProsesTambahBerita" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Tambah Berita</label>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="formtambah">
                                    </div>
                                </div>
                            </div>
                             <div class="row m-t-10">
                                <div class="col-md-6">
                                    <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                    <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- view modal -->
<div class="modal fade bd-example-modal-lg" id="view">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
            <div class="modal-body" >
                    <div class="col-lg-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <label class="fz-18">Detail Berita</label>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6" align="right">
                                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="formview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function(){
            $('#view').modal({backdrop: 'static', keyboard: false});
            $('#edit').modal({backdrop: 'static', keyboard: false});
            $('#tambah').modal({backdrop: 'static', keyboard: false});
            
            $(".hapus").click(function(){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-blue1',
                    cancelButton: 'btn btn-red1'
                  },
                  buttonsStyling: false,
                });
                   
                        swalWithBootstrapButtons.fire({
                            title: "Apakah Anda yakin?",
                            text: "Ingin menghapus data ini? ",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#dc3545",
                            confirmButtonText: "Ya",
                            cancelButtonText: "Tidak",
                            //closeOnConfirm: false,
                            //closeOnCancel: false,
                            reverseButtons: true,
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {
                               $.ajax({
                                    type: 'POST',
                                    url: "<?php echo base_url()?>HR/HapusBerita/<?php echo $dataBerita->id_berita ?>",
                                   success: function(data) {
                                        swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                        var curdate = new Date();
                                        var format = formatDate(curdate);
                                        var status = 'signout';
                                        var exp = new Date();
                                        //clearTimeout(t);
                                        seconds = 0; minutes = 0; hours = 0;
                                        setCookie('time', "00:00:00", exp);
                                        setCookie('absen', "00:00:00", exp);
                                        //update();
                                        //waktu = window.setInterval(update, 1000);
                                        deleteCookie('lunch');
                                        deleteCookie('break');
                                        deleteCookie('extra');
                                        deleteCookie('time');
                                        deleteCookie('absen');
                                        setTimeout(function(){
                                                window.location.href="<?php echo base_url()?>HR/HRBerita";
                                             
                                        },2000);
                                    }
                                });
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                            }
                        });
                
              });
          });
  </script>
<script type="text/javascript">
  function formview(a){
      $.ajax({
        url: "<?php echo base_url();?>HR/HRBeritaDetail/"+a,
        // data: {nik:a},
        type: "post",
        // dataType:'json',
        success: function (response) {
           // alert('masuk');
            $('#view').modal('show');
            $('#formview').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}

  function formedit(a){
      $.ajax({
        url: "<?php echo base_url();?>HR/EditHRBerita/"+a,
        // data: {nik:a},
        type: "post",
        // dataType:'json',
        success: function (response) {
           // alert('masuk');
            $('#edit').modal('show');
            $('#formedit').html(response);
            var drEvent = $('#dropify-event').dropify();
            $('.tglval').keydown(function (event){
              event.preventDefault();
            });
            setTimeout(function(){
              tgl();
            },1000);
            $('.summernote').summernote({
              height: 300,
              focus: true,
              onpaste: function() {
                  alert('You have pasted something to the editor');
              }
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}

  function formtambah(){
    $.ajax({
      url: "<?php echo base_url();?>HR/TambahHRBerita",
      // data: {nik:a},
      type: "post",
      // dataType:'json',
      success: function (response) {
         // alert('masuk');
          $('#tambah').modal('show');
          $('#formtambah').html(response);

          var drEvent = $('#dropify-event').dropify();
          $('.summernote').summernote({
            height: 300,
            focus: true,
            onpaste: function() {
                alert('You have pasted something to the editor');
            }
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
  });
}
  function ubah(a,b){
            $.ajax({
              url: '<?=site_url();?>HR/ubahsts', //calling this function
              data:{id:a,sts:b},
              type:'POST',
              cache: false,

          success: function(data) {
               // alert("success");
               location.reload();
            }
          });
          }
          function cari(cari){
              $.ajax({
              url: '<?=site_url();?>HR/cariBerita', //calling this function
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