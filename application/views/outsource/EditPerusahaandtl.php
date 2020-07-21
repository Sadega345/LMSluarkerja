<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Perusahaan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <h6 class="tittle-box text-center m-t-30">Detail Perusahaan</h6>
            <div class="body">
            	<!-- <form method="post" id="simpan" action="<?php// echo base_url() ?>Outsource/EditPOPerusahaan"> -->
                <input type="hidden" class="form-control" required name="id" value="<?php echo $dataPerusahaan->id_master_perusahaan ?>">
                <div class="row m-t-10">
                  <div class="col-md-3 col-12 ">
                      <label class="float-right hidden-sm">Nama Perusahaan</label>
                      <label class="d-sm-none">Nama Perusahaan  </label>
                  </div>
                  <div class="col-md-8 col-12">
                    <?php echo $dataPerusahaan->nama_perusahaan ?>
                  </div>
                </div>
                <div class="row m-t-10">
                  <div class="col-md-3 col-12 ">
                      <label class="float-right hidden-sm">Alamat Perusahaan</label>
                      <label class="d-sm-none">Alamat Perusahaan  </label>
                  </div>
                  <div class="col-md-8 col-12">
                    <?php echo $dataPerusahaan->alamat ?>
                  </div>
                </div>
                <div class="row m-t-10">
                  <div class="col-md-3 col-12 ">
                      <label class="float-right hidden-sm">Contact Person </label>
                      <label class="d-sm-none">Contact Person  </label>
                  </div>
                  <div class="col-md-8 col-12">
                    <?php echo $dataPerusahaan->contact_person ?>
                  </div>
                </div>
                <div class="row m-t-10">
                  <div class="col-md-3 col-12 ">
                      <label class="float-right hidden-sm">No Telepon </label>
                      <label class="d-sm-none"> No Telepon  </label>
                  </div>
                  <div class="col-md-8 col-12">
                    <?php echo $dataPerusahaan->no_telp ?>
                  </div>
                </div>
                <div class="row m-t-10">
                  <div class="col-md-3 col-12 ">
                      <label class="float-right hidden-sm">No Faximile </label>
                      <label class="d-sm-none"> No Faximile  </label>
                  </div>
                  <div class="col-md-8 col-12">
                    <?php echo $dataPerusahaan->no_faximile ?>
                  </div>
                </div>

            		
		            <!-- <div class="form-group"> -->
		            	<!-- <button type="submit" class="btn btn-blue col-md-3">Simpan</button>
		            	<a href="<?php //echo base_url() ?>Outsource/masterPerusahaan"><button type="button" class="btn btn-danger col-md-3">Kembali</button></a>
		            </div> -->
	            <!-- </form> -->
	            	
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <!-- <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body"> -->


                <div class="col-lg-12 col-md-12 view">
                  <h6 class="text-center">Aturan Penggajian</h6>
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs-new2">

                                <li class="nav-item col-md-3 col-12"><a class="nav-link show active <?php //echo  $this->uri->segment(3)==1 || ($this->uri->segment(3)=="") ?'show active':'' ?> " data-toggle="tab" href="#bpjstk">BPJS TK</a></li>
                                <li class="nav-item col-md-3 col-12"><a class="nav-link <?php //echo  $this->uri->segment(3)==2 ?'show active':'' ?>" data-toggle="tab" href="#bpjskes">BPJS Kesehatan</a></li>
                                <li class="nav-item col-md-3 col-12"><a class="nav-link <?php //echo  $this->uri->segment(3)==2 ?'show active':'' ?>" data-toggle="tab" href="#pph">PPH</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active <?php //echo  $this->uri->segment(3)==1 || ($this->uri->segment(3)=="")?'show active':'' ?>" id="bpjstk">
                                  <?php
                                    $databpjstkpengali=array();
                                    $databpjstkjt=array();
                                    if($databpjstknumrows > 0){
                                      $databpjstkpengali=explode(',',$databpjstk->pengali) ; 
                                      $databpjstkjt=explode(',',$databpjstk->id_jenis_tunjangan) ;  
                                    } 
                                   
                                 ?>
                                  <form method="post" action="<?php echo base_url() ?>Outsource/ProsesTambahBPJSTK">
                                    <div class="row m-t-30">
                                        <div class="col-md-9">
                                          <div class="row">
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="1" <?php echo in_array(1, $databpjstkpengali)?'checked':''; ?>>
                                                  <span> GaPok</span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="2" <?php echo in_array(2, $databpjstkpengali)?'checked':''; ?>>
                                                  <span> Koefisien </span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-multiple="checkbox" value="3" <?php echo in_array(3, $databpjstkpengali)?'checked':''; ?>>
                                                  <span>TMK</span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-multiple="checkbox" value="4" <?php echo in_array(4, $databpjstkpengali)?'checked':''; ?>>
                                                  <span>Jabatan</span>
                                              </label>
                                            </div>
                                            <p id="error-checkbox"></p>
                                            <?php foreach ($datatunjangan->result() as $projek){ ?>
                                              <div class="col-md-3">
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox" name="id_jenis_tunjangan[]" data-parsley-multiple="checkbox" value="<?php echo $projek->id_jenis_tunjangan ?>" <?php echo in_array($projek->id_jenis_tunjangan, $databpjstkjt)?'checked':''; ?>>
                                                    <span><?php echo $projek->jenis_tunjangan ?></span>
                                                </label>
                                              </div>
                                          <?php } ?>
                                          </div>
                                        </div>
                                        <input type="hidden" name="id_master_perusahaan" value="<?php echo $this->uri->segment(3) ?>">
                                        <div class="col-md-3" >
                                          <input type="submit" class="btn btn-darkblue col-md-6" value="Simpan">
                                        </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="tab-pane <?php //echo  $this->uri->segment(3)==2 ?'show active':'' ?>" id="bpjskes">
                                  <?php
                                    $databpjskespengali=array();
                                    $databpjskesjt=array();
                                    if($databpjskesnumrows > 0){
                                      $databpjskespengali=explode(',',$databpjskes->pengali) ; 
                                      $databpjskesjt=explode(',',$databpjskes->id_jenis_tunjangan) ;  
                                    } 
                                   
                                 ?>
                                  <form method="post" action="<?php echo base_url() ?>Outsource/ProsesTambahBPJSKES">
                                    <div class="row m-t-30">
                                        <div class="col-md-9">
                                          <div class="row">
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="1" <?php echo in_array(1, $databpjskespengali)?'checked':''; ?>>
                                                  <span> GaPok</span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="2" <?php echo in_array(2, $databpjskespengali)?'checked':''; ?>>
                                                  <span> Koefisien </span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-multiple="checkbox" value="3" <?php echo in_array(3, $databpjskespengali)?'checked':''; ?>>
                                                  <span>TMK</span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-multiple="checkbox" value="4" <?php echo in_array(4, $databpjskespengali)?'checked':''; ?>>
                                                  <span>Jabatan</span>
                                              </label>
                                            </div>
                                            <p id="error-checkbox"></p>
                                            <?php foreach ($datatunjangan->result() as $projek){ ?>
                                              <div class="col-md-3">
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox" name="id_jenis_tunjangan[]" data-parsley-multiple="checkbox" value="<?php echo $projek->id_jenis_tunjangan ?>" <?php echo in_array($projek->id_jenis_tunjangan, $databpjskesjt)?'checked':''; ?>>
                                                    <span><?php echo $projek->jenis_tunjangan ?></span>
                                                </label>
                                              </div>
                                          <?php } ?>
                                          </div>
                                        </div>
                                        <input type="hidden" name="id_master_perusahaan" value="<?php echo $this->uri->segment(3) ?>">
                                        <div class="col-md-3" >
                                          <input type="submit" class="btn btn-darkblue col-md-6" value="Simpan">
                                        </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="tab-pane <?php //echo  $this->uri->segment(3)==2 ?'show active':'' ?>" id="pph">
                                    <?php
                                    $datapphpengali=array();
                                    $datapphjt=array();
                                    if($datapphnumrows > 0){
                                      $datapphpengali=explode(',',$datapph->pengali) ; 
                                      $datapphjt=explode(',',$datapph->id_jenis_tunjangan) ;  
                                    } 
                                   
                                 ?>
                                  <form method="post" action="<?php echo base_url() ?>Outsource/ProsesTambahPPH">
                                    <div class="row m-t-30">
                                        <div class="col-md-9">
                                          <div class="row">
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="1" <?php echo in_array(1, $datapphpengali)?'checked':''; ?>>
                                                  <span> GaPok</span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="2" <?php echo in_array(2, $datapphpengali)?'checked':''; ?>>
                                                  <span> Koefisien </span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-multiple="checkbox" value="3" <?php echo in_array(3, $datapphpengali)?'checked':''; ?>>
                                                  <span>TMK</span>
                                              </label>
                                            </div>
                                            <div class="col-md-3">
                                              <label class="fancy-checkbox ">
                                                  <input type="checkbox" name="pengali[]" data-parsley-multiple="checkbox" value="4" <?php echo in_array(4, $datapphpengali)?'checked':''; ?>>
                                                  <span>Jabatan</span>
                                              </label>
                                            </div>
                                            <p id="error-checkbox"></p>
                                            <?php foreach ($datatunjangan->result() as $projek){ ?>
                                              <div class="col-md-3">
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox" name="id_jenis_tunjangan[]" data-parsley-multiple="checkbox" value="<?php echo $projek->id_jenis_tunjangan ?>" <?php echo in_array($projek->id_jenis_tunjangan, $datapphjt)?'checked':''; ?>>
                                                    <span><?php echo $projek->jenis_tunjangan ?></span>
                                                </label>
                                              </div>
                                          <?php } ?>
                                          </div>
                                        </div>
                                        <input type="hidden" name="id_master_perusahaan" value="<?php echo $this->uri->segment(3) ?>">
                                        <div class="col-md-3" >
                                          <input type="submit" class="btn btn-darkblue col-md-6" value="Simpan">
                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      hapus();
      $('.master').DataTable({
          responsive: true,
          
          fnDrawCallback:function(oSettings){
             hapus();
          }
      });
  });
  function hapus(){
      $(".hapus").click(function(){
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-blue1',
              cancelButton: 'btn btn-red1'
            },
            buttonsStyling: false,
          });
                var type=$(this).data('type');
                var id=$(this).data('id');
                var bpjstk=$(this).data('bpjstk');

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
                        var url='';
                       // var no="";
                        if(type=='bpjstk'){
                            // url='<?php echo base_url()?>Outsource/HapusLokasiKantor/'+id;
                             url='<?php echo base_url()?>Outsource/HapusAturanBPJSTK/'+id;
                          }
                          if(type=='bpjskes'){
                             url='<?php echo base_url()?>Outsource/HapusAturanBPJSKES/'+id;
                          }
                          if(type=='pph'){
                             url='<?php echo base_url()?>Outsource/HapusAturanPPH/'+id;
                          }
                         $.ajax({
                              type: 'POST',
                              url:url,
                             success: function(data) {
                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                  setTimeout(function(){
                                          window.location.href="<?php echo base_url()?>Outsource/PO_EditPerusahaanDtl/"+bpjstk;
                                       
                                  },2000);
                              }
                          });
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                      }
                  });
          
        });

};
</script>
