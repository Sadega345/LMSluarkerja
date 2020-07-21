
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master Data / Tambah UMK</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-12" >
                                 <h6 class="tittle-box">Tambah UMK</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form method="post" action="<?php echo base_url()?>Outsource/ProsesTambahUMK" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Gaji</label>
                                <label class="d-sm-none">Gaji</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="gaji" class="form-control" required onkeypress="return hanyaAngka(event)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Provinsi</label>
                                <label class="d-sm-none">Provinsi</label>
                            </div>
                            <div class="col-lg-6">
                                <select name="id_provinsi" class="form-control select2" onchange="pilihKab(this.value,0);" id="selprov" required>
                                    <option value="" selected disabled>-- Pilih Provinsi --</option>
                                    <?php
                                    foreach($dataProvinsi->result() as $dtprov){
                                        ?>
                                        <option value="<?php echo $dtprov->id_provinsi; ?>"> <?php echo $dtprov->deskripsi; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="rowkab">
                            <div class="col-md-3 col-12 m-t-10">
                                <label class="float-right hidden-sm">Kabupaten</label>
                                <label class="d-sm-none">Kabupaten</label>
                            </div>
                            <div class="col-lg-6">
                                <select name="id_kabupaten" class="form-control" id="selkab" required>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 m-t-10" >
                            </div>
                            <div class="col-md-9 col-6" >
                                <button type="submit" class="btn btn-blue1">Simpan</button>
                                <a href="<?php echo base_url()?>Outsource/masterUMK" class="btn btn-red1">Batal</a>
                            </div>
                        </div>
                        <br>
                        </form>
                    </div>
                </div>
                    
                </div> 
            </div>
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#rowkab").hide();
    });
    function pilihKab(idprov,idkabsel){
        if(idprov!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilKabUMK", 
              data: {id_provinsi : idprov}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowkab").show();
                $("#selkab").html(response.data_kabupaten).show();
                if(idkabsel!=0){
                    $('#selkab option[value='+idkabsel+']').attr('selected','selected');
                } else {
                    $("#rowkec").hide();
                }
                $("#selkab").select2();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#rowkab").hide();
            $("#rowkec").hide();
        }
    }
    
</script>
         
                        
         