
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Klien & Departemen</h6>
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
                                 <h6 class="tittle-box">Tambah Lokasi Kantor</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form method="post" action="<?php echo base_url()?>Outsource/ProsesTambahLokasiKantor">
                        <!-- <div class="row">
                            <div class="col-md-3 col-5 m-t-10"  align="right">
                                <label>ID :</label>
                            </div>
                            <div class="col-md-4 col-7">
                                <input type="text" name="id" class="form-control">
                            </div>
                        </div> -->
                        
                        <input type="hidden" name="id_master_perusahaan" value="<?php echo $this->uri->segment(3) ?>">
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-10" >
                                <label class="float-right hidden-sm">Provinsi *</label>
                                <label class="d-sm-none">Provinsi *</label>
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
                                <label class="float-right hidden-sm">Kabupaten *</label>
                                <label class="d-sm-none">Kabupaten *</label>
                            </div>
                            <div class="col-lg-6">
                                <select name="id_kabupaten" class="form-control" id="selkab" onchange="pilihKec(this.value,0);" required>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 m-t-10" >
                            </div>
                            <div class="col-md-9 col-6" >
                                <button type="submit" class="btn btn-blue1">Simpan</button>
                                <a href="<?php echo base_url()?>Outsource/ViewHRKlienDepartemen/<?php echo $this->uri->segment(3) ?>" class="btn btn-red1">Batal</a>
                            </div>
                        </div>
                        <br>
                        </form>
                    </div>
                </div>
                    
                </div> 
            </div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#rowkab").hide();
    });
    function pilihKab(idprov,idkabsel){
        if(idprov!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilKab", 
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
    function pilihKec(idkab,idkecsel){
        if(idkab!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilKec", 
              data: {id_kabupaten : idkab}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowkec").show();
                $("#selkec").html(response.data_kecamatan).show();
                if(idkecsel!=0){
                    $('#selkec option[value='+idkecsel+']').attr('selected','selected');
                }
                $("#selkec").select2();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#rowkec").hide();
        }
    }
</script>