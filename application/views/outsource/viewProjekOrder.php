<?php
$jenisProjek=explode(',',$dataProjectOrder->jenis_projek);
?>
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Project Order /  <?php  $sts=$this->uri->segment(3); $idpo=$this->uri->segment(4);
             if($sts=='1'){
             	echo "Detail Baru";
             }else if($sts=='2'){
             	echo "Detail Perpanjangan";
             }else{
             	echo "Detail Revisi";
             }?> / List Karyawan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    <!-- <div class="col-lg-2">
                        
                    </div> -->
                    <div class="col-lg-12" align="center">
                        <img src="<?php echo base_url() ?>assets/images/logo-aja.png" alt="" width="100px">
                        
                    </div>
                    <!-- <div class="col-lg-2">
                        <button type="button" class="btn btn-blue" data-dismiss="modal">Tutup</button>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">
                        <label>Nama Pekerjaan</label>
                    </div>
                    <div class="col-9">
                        <label>: <?php echo $dataProjectOrder->nama_pekerjaan; ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">
                        <label>Nama Perusahaan</label>
                    </div>
                    <div class="col-9">
                        <label>: <?php echo $dataProjectOrder->nama_perusahaan; ?></label>
                    </div>
                </div>
                <hr />
                <div class="form-group">
	            	<label>Jumlah Personil : 
	            		<!--
                        <button type="button" onclick="viewProjekOrder('<?php echo $dataProjectOrder->id_projek_order ?>')" class="btn btn-blue col-6 col-md-4" data-toogle="modal" data-target="#view">Detail Pegawai
	            		</button>
                        -->
	            		<!-- <a href="javascript:void(0);" onclick="viewProjekOrder('<?php echo $dataProjectOrder->id_projek_order ?>')" class="btn btn-blue col-6 col-md-4"><i class="fa fa-user"> <label>Detail Pegawai</label></i></a> -->
	            	</label>
               		<div class="row">
               			<div class="col-12 col-md-2">
               				<label class="float-left">Total Orang</label> 
               			</div>
               			<div class="col-12 col-md-2">
               				<label>Laki-laki</label>
               			</div>
               			<div class="col-12 col-md-2">
               				<label>Perempuan</label>
               			</div>
               			<div class="col-12 col-md-2">
               				<label>Korlap</label>
               			</div>
               			<div class="col-12 col-md-2">
               				<label>Anggota</label>
               			</div>
               		</div>
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <input type="number" id="totalorg" class="form-control" readonly required placeholder="" value="<?php echo ($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan) ?>">
                        </div>
                        <div class="col-12 col-md-2">
               				<input type="number" class="form-control" id="personil_laki" readonly required placeholder="" value="<?php echo $dataProjectOrder->personil_laki ?>">
               			</div>
               			<div class="col-12 col-md-2">
               				<input type="number" class="form-control" id="personil_perempuan" readonly required placeholder="" value="<?php echo $dataProjectOrder->personil_perempuan ?>">
               			</div>
               			<div class="col-12 col-md-2">
               				<input type="number" class="form-control" id="personil_korlap" readonly required placeholder="" value="<?php echo $dataProjectOrder->personil_korlap ?>">
               			</div>
               			<div class="col-12 col-md-2">
               				<input type="number" class="form-control" readonly required  placeholder="" value="<?php echo ($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan)-$dataProjectOrder->personil_korlap ?>">
               			</div>
                    </div>
	            </div>
                <div class="row">
                    <div class="col-12">
		                <label>Penggajian Sebesar :</label>  
                        <label class="control-label"><?php echo $dataProjectOrder->jumlah_penggajian; ?></label>
                    </div>
                </div>
                <div class="row">
                
                    <div class="col-4">
		                <label>Jenis Project :</label>  
                        <?php foreach ($dataJenisProjek->result() as $projek){ 
                                //if(in_array($projek->id_master_jenis_project, $jenisProjek)){
                                    echo '
                                    <div class="row">
                                    <p class="m-b-0 col-8">- '.$projek->nama_departemen.'</p>
                                    <p class="m-b-0 col-4">('.($projek->jumkar==""?0:$projek->jumkar).' orang)</p>
                                    </div>'; 
                                //}
                                ?>
		                <?php } ?>
                    </div>
                    <div class="col-8">
		                <label>Lokasi :</label>  
                        <?php foreach ($dataLokasi->result() as $lokasi){ 
                                //if(in_array($projek->id_master_jenis_project, $jenisProjek)){
                                    echo '
                                    <div class="row">
                                    <p class="m-b-0 col-4">- '.$lokasi->desKabupaten.' </p>
                                    <p class="m-b-0 col-3">('.($lokasi->jumkar==""?0:$lokasi->jumkar).' orang)</p>
                                    <p class="m-b-0 col-3">(Rp. '.number_format($lokasi->gaji,3,",",".").')</p>
                                    <input type="hidden" id="lokasi'.$lokasi->id_lokasi_kantor.'" value="'.$lokasi->gaji.'"></p>
                                    </div>'; 
                                //}
                                ?>
		                <?php } ?>
                    </div>
                    
                </div>
                <!-- <div class="row">
		                <?php /* foreach ($dataJenisProjek->result() as $projek2){ 
                                if(in_array($projek2->id_master_jenis_project, $jenisProjek)){
                                    ?>
                                    <div class="col-12 col-md-2">
                                        <input type="number" name="jenpro[]" value="0" class="form-control jenpro" data-id="<?php echo $projek2->id_master_jenis_project; ?>" min="0" max="<?php echo ($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan) ?>" />
                                    </div>
                                    <?php
                                }
                                ?>
		                <?php } */ ?>
                </div> -->
                <hr />
                <form method="post" action="<?php echo base_url(); ?>Outsource/viewProjekOrder/<?php echo $sts; ?>/<?php echo $idpo; ?>">
                <div class="row">
                    
                        <div class="col-4">
    		                <label>Pilih Lokasi :</label> 
                            <select name="pillok" class="form-control select2" onchange="this.form.submit()">
                                <option value="" selected >-- Pilih Lokasi --</option>
                                <?php foreach ($dataLokasi->result() as $lokasi){ 
                                    ?>
                                    <option value="<?php echo $lokasi->id_lokasi_kantor; ?>" <?php echo $lokasi->id_lokasi_kantor==$this->input->post("pillok")?"selected":""; ?>><?php echo $lokasi->desKabupaten; ?> (<?php echo ($lokasi->jumkar==""?0:$lokasi->jumkar); ?> orang)</option>
                                    <?php 
                                } ?>    
                            </select>
                        </div>
                        <div class="col-4">
    		                <label>Pilih Jenis Project :</label> 
                            <select name="piljp" class="form-control select2" onchange="this.form.submit()">
                                <option value="" selected >-- Pilih Jenis Project --</option>
                                <?php foreach ($dataJenisProjek->result() as $projek){ 
                                    ?>
                                    <option value="<?php echo $projek->id_departemen; ?>" <?php echo $projek->id_departemen==$this->input->post("piljp")?"selected":""; ?>><?php echo $projek->nama_departemen; ?> (<?php echo ($projek->jumkar==""?0:$projek->jumkar); ?> orang)</option>
                                    <?php 
                                } ?>    
                            </select>
                        </div>
                    
                </div>
                </form>
                <div class="row m-t-30">
                    <div class="col-lg-4">
                        
                    </div>
                    <div class="col-lg-4">
                        <h6 class="tittle-box text-center">Pilih Karyawan</h6>    
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                <br>
                <div id="isiaspek">
                    <div class="table-responsivex">
                        <form method="post" action="<?php echo base_url() ?>Outsource/simpanKaryawan" method="post">
                        <input type="hidden" name="id_po" value="<?php echo $dataProjectOrder->id_po; ?>" />

                        <!-- buka dan lanjut hari senin -->
                        <div class="table-responsive">
                            <div class="row m-b-20">
                            	<div class="col-md-8"></div>
                            	<div class="col-md-4" align="right">
                            		<a href="javascript:;" class="btn btn-blue col-md-4" onclick="buatTable('tblpegawai',1)">Cek All</a>
                            		<span><a href="javascript:;" class="btn btn-blue col-md-4" onclick="buatTable('tblpegawai',2)">Uncek All</a></span>
                            	</div>
                            </div>
                            <table id="tblpegawai" data-url="<?php echo base_url() ?>Outsource/ajaxTablePegawai" class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                              
                                 <thead class="thead-dark">
                                    <tr>
                                        <th width="20px">NIK</th>
                                        <th>Nama Pegawai</th>
                                        <th width="10px">Jenis Kelamin</th>
                                        <th  width="10px">Project</th>
                                        <th  width="10px">Pilih</th>
                                        <th  width="10px">Korlap</th>
                                        <th width="100px">Gaji</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  ?>
                                </tbody>
                            </table>
                        </div>

                            <?php
                            if(intval($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan)>0){
                            ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="hidden" id="jumL" value="0" readonly />
                                    <input type="hidden" id="jumP" value="0" readonly />
                                    <input type="hidden" id="jumKL" value="0" readonly />
                                    <input type="hidden" id="dataK" readonly />
                                    <input type="hidden" id="jumKl" readonly />
                                    <input type="hidden" id="dataKL" readonly />
                                    <input type="hidden" name="id_po" readonly value="<?php echo $idpo; ?>" />
                                    <input type="hidden" name="sts" readonly value="<?php echo $sts; ?>" />
                                </div>
                                <!-- <div class="col-lg-4">
                                    <button type="submit" class="btn btn-blue">Submit</button>
                                </div> -->
                                <div class="col-lg-4"></div>
                            </div>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div id="selpro" >
    <select class="form-control" name="pilih_project[]" id="selectpro" >
        <option value="">-- Pilih Project --</option>
        <?php foreach ($dataJenisProjek->result() as $projek2){ 
                if(in_array($projek2->id_master_jenis_project, $jenisProjek)){
                    echo '<option value="'.$projek2->id_master_jenis_project.'" >'.$projek2->jenis_project.'</option>'; 
                }
                ?>
        <?php } ?>
    </select>
</div>
<div id="gajirow" >
    <input type="text" class="form-control gaji" name="gaji[]" value="0" />
</div> 
<input type="hidden" id="cekall2" value="0">
<script type="text/javascript">
    var cekall2=0;
    $(document).ready(function(){
      buatTable("tblpegawai",0);
    });
    function buatTable(id,cekall){
        if(cekall==1 || cekall==2){
            cekall2=cekall;
            $('#cekall2').val(cekall);
            var dataK=$('#dataK').val();
            var split=dataK.split(",");
            console.log(dataK);
            if(dataK.toString().length>0){
                split.forEach(function(entry) {
                    //console.log(entry);
                    simpangaji(0,entry,0);
                });
            }
            $('#'+id).DataTable().destroy();
        }
        var urlny = $("#"+id).data("url");
        var maxL=parseInt($('#personil_laki').val());
        var maxP=parseInt($('#personil_perempuan').val());
        $('#'+id).DataTable( {
                "processing": true,
                "serverSide": true,
                "responsive":true,
                "bDestroy":true,
                "ajax":{
                    url : urlny, // json datasource
                    type: "post",  // method  , by default get
                    data:{id_projek_order:'<?php echo $dataProjectOrder->id_projek_order ?>',id_master_perusahaan:'<?php echo $dataProjectOrder->id_master_perusahaan ?>',id_lokasi_kantor:'<?php echo $dataProjectOrder->id_lokasi?>',id_jenis_projek:'<?php echo $dataProjectOrder->jenis_projek ?>',sts:'<?php echo $sts ?>',maxL:maxL,maxP:maxP,cekall:$('#cekall2').val()},
                    // "success": function(response){
                    //     console.log(response);
                    // },
                    error: function(){  // error handling
                        $("."+id+"-error").html("");
                        $("#"+id).append('<tbody class="'+id+'-error"><tr><th>No data found in the server</th></tr></tbody>');
                        
                        
                    }
                },
                "initComplete":function( settings, json){
                    console.log(json);
                    if(cekall==1 || cekall==2){
                    	location.reload();
                    }
                    cekall2=0;
                    $('#jumL').val(json.jumL);
                    $('#jumP').val(json.jumP);
                    $('#dataK').val(json.jumK);
                    $('#jumKl').val(json.jumKl);
                    $('#dataKL').val(json.dataKl);
                    var maxL=parseInt($('#personil_laki').val());
                    var maxP=parseInt($('#personil_perempuan').val());
                    $("#cselect").html("L : "+parseInt(json.jumL)+"/"+parseInt(maxL)+" | P : "+parseInt(json.jumP)+"/"+parseInt(maxP));
                    $('#cekall2').val(0);
                },
                fnDrawCallback:function(oSettings){
                cekall2=0;
                $('#cekall2').val(0);
                $('.simpan').hide();
                //$('.cbkl').hide();
                    //aksiPilkar();
                    //aksiPilkor();
                }
            } );
        //alert(urlny);
        /* $('#'+id).DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "../server_side/scripts/server_processing.php"
        } ); */
      }
</script>
<script type="text/javascript">
    $(function() {
        $("#selpro").hide();
        $("#gajirow").hide();
        toastr.options.timeOut = "true";
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-bottom-full-width';
        //toastr['info']('Hi there, this is notification demo with HTML support. So, you can add HTML elements like <a href="javascript:void(0);">this link</a>');
        <?php
        if($this->session->flashdata('msg')!=""){
            ?>
            toastr['info']('-<?php echo $this->session->flashdata('msg'); ?>-');
            <?php
        }
        ?>
        $('.btn-toastr').on('click', function() {
            $context = $(this).data('context');
            $message = $(this).data('message');
            $position = $(this).data('position');

            if ($context === '') {
                $context = 'info';
            }

            if ($position === '') {
                $positionClass = 'toast-bottom-full-width';
            } else {
                $positionClass = 'toast-' + $position;
            }

            toastr.remove();
            toastr[$context]($message, '', {
                positionClass: $positionClass
            });
        });
        
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        // aksiPilkar();
        // aksiPilkor();
        $(".jenpro").keyup(function(){
            var tal = parseInt($(this).val()) || 0;
            this.value = tal;
        });
        
        $('.js-basic-example3').DataTable({
            responsive: true,
            retrieve: true,
            columnDefs: [],
            "iDisplayLength": 10,
            "aaSorting": [],
    
            fnDrawCallback:function(oSettings){
                // $(".dataTables_filter").each(function(){
                    
                // });
               // aksiPilkar();
               //      aksiPilkor();
                 
                  
            },drawCallback: function() {
            	
              },
              fnInitComplete: function(oSettings,json){
                
              },
              initComplete: function () {
                  this.api().on( 'draw', function () {
                    
                  } );
                }
        });
        $(".dataTables_length").append('<span id="cselect" class="float-right"></span><span id="ckselect" class="hidden float-right"></span>');
        $(".dataTables_filter").append('<label class="fancy-checkboxx">'+
                    '&nbsp;<input type="checkbox" style="display: none;" id="selectall" >'+
                '</label>');
        initAll();
        $('.select2p').select2();
       
        
    });
    function cekAll(){
        
       // $('.cbkaryawan').attr("checked", false);
         
        var maxL=parseInt($('#personil_laki').val());
        var maxP=parseInt($('#personil_perempuan').val());
        var jumL=1;
        if(maxL>0){
            $.each($('.cbkaryawan[data-jk="L"]'), function(){
                // Check
                jumL++;
                $(this).attr("checked", true);
                console.log(jumL);
                console.log(maxL);
                if(jumL==maxL){
                    return false;
                }
            });
        }
        var jumP=1;
        if(maxP>0){
            $.each($('.cbkaryawan[data-jk="P"]'), function(){
                jumP++;
                $(this).attr("checked", true);
                if(jumP==maxP){
                   return false;
                }
            });
        }
    }
    function initAll(){
        //$('.s2pro').hide();
        $('.rowgaji').hide();
        var maxL=parseInt($('#personil_laki').val());
        var maxP=parseInt($('#personil_perempuan').val());
        var maxKL=parseInt($('#personil_korlap').val());
        var countkarL=$('.cbkaryawan[data-jk="L"]').filter(':checked').length;
        var countkarP=$('.cbkaryawan[data-jk="P"]').filter(':checked').length;
        var countkarKL=$('.cbkorlap').filter(':checked').length;
        $('.cbkl').hide();
        
        //var countkarKL=$('.cbkorlap').filter(':checked').length;
        $('#jumL').val(countkarL);
        $('#jumP').val(countkarP);
        $('#jumKL').val(countkarKL);
        var favorite = [];
        var jL=0;
        var jP=0;
        $.each($('.cbkaryawan[data-jk="L"]:checked'), function(){
            jL++;
            favorite.push($(this).val());
            var gaji=$(this).data("gaji");
            $('.cbkl[kl-nik="'+$(this).val()+'"]').show();
            //$('.s2pro[kl-nik="'+$(this).val()+'"]').show();
            $('.rowgaji[kl-nik="'+$(this).val()+'"]').show();
            $('.gaji[kl-nik="'+$(this).val()+'"]').val(gaji);
        });
        $.each($('.cbkaryawan[data-jk="P"]:checked'), function(){
            jP++;
            favorite.push($(this).val());
            var gaji=$(this).data("gaji");
            $('.cbkl[kl-nik="'+$(this).val()+'"]').show();
            //$('.s2pro[kl-nik="'+$(this).val()+'"]').show();
            $('.rowgaji[kl-nik="'+$(this).val()+'"]').show();
            $('.gaji[kl-nik="'+$(this).val()+'"]').val(gaji);
        });
        var favkl=[];
        $.each($('.cbkorlap:checked'), function(){            
            favkl.push($(this).val());
        });
        $('#dataK').val(favorite.join(","));
        $('#dataKL').val(favkl.join(","));
        //$('.cbkar[data-jk="L"]').hide();
        //$('.cbkaryawan[data-jk="L"]').attr("disabled", true);
        var jumakhir=parseInt($('#jumL').val())+parseInt($('#jumP').val());
        $("#cselect").html("L : "+parseInt(jL)+"/"+parseInt(maxL)+" | P : "+parseInt(jP)+"/"+parseInt(maxP));
        if(maxKL>0){
            if(countkarKL>0){
                //$("#ckselect").html(" | "+parseInt(countkarKL));
            }
        }
        // aksiPilkar();
        // aksiPilkor();
    }
    function aksiPilkar(value){
        //$('.cbkaryawan').change(function(){
            
            var numItems = $('.cbkaryawan').length;
            var countkar=$('.cbkaryawan').filter(':checked').length;
            var jumL=parseInt($('#jumL').val());
            var jumP=parseInt($('#jumP').val());
            var maxL=parseInt($('#personil_laki').val());
            var maxP=parseInt($('#personil_perempuan').val());
            var dataKk=$('#dataK').val();
            var dataK=dataKk.split(",");
            var jk = $('#kar'+value).data("jk");
            var thisval2 = $('#kar'+value).data("value");
            var maxi="";
            var textmax="";
            var dataKL=$('#dataKL').val().split(",");
            console.log('jumL'+jumL);
            console.log('jumP'+jumP);
            console.log('maxL'+maxL);
            console.log('maxP'+maxP);
            console.log('jk'+jk);
            console.log('thisval2'+thisval2);
            if(parseInt(jumL+jumP)==parseInt(maxL+maxP)){
                maxi="maxA";
                textmax="Reach The Maximum Limit";
            } else {
                if(maxL==jumL){
                    maxi="maxL";
                    textmax="Reach The Maximum Limit for Male";
                    $('.cbkaryawan[data-jk="L"]:checkbox:not(:checked)').hide();
                } else if(maxP==jumP){
                    maxi="maxP";
                    textmax="Reach The Maximum Limit for Female";
                } 
            }
             console.log(this);
            if($('#kar'+value).is(':checked')){
                console.log('checked');
                if(maxi!="maxA"){
                    if(jk=="L" && maxi=="maxL"){
                        toastr['info'](textmax);
                        $('#kar'+value).prop('checked',false);
                    } else if(jk=="P" && maxi=="maxP"){
                        toastr['info'](textmax);
                        $('#kar'+value).prop('checked',false);
                    } else {
                        $('.cbkl[kl-nik="'+thisval2+'"]').show();
                        /*
                        var $selpro = $('#selpro').clone();
                        $('.s2pro[kl-nik="'+$(this).val()+'"]').html($selpro);
                        */
                        /* $("#selpro").find(".select2p").each(function(index)
                        {
                            $(this).select2('destroy');
                        }); */
                        $isi = $('<div>'+$("#selpro").html()+'</div>');
                        $isi.find("#selectpro").addClass("select2n");
                        $isi2=$('<div>'+$("#gajirow").html()+'</div>');
                        $isi2.find(".gaji").attr("kl-nik",thisval2);
                        //$("#selpro").clone().appendTo('.s2pro[kl-nik="'+$(this).val()+'"]');
                        //$('.s2pro[kl-nik="'+$(this).val()+'"]').append($isi).show();
                        //$('.rowgaji[kl-nik="'+$(this).val()+'"]').show();
                        $('.rowgaji[kl-nik="'+thisval2+'"]').append($isi2).show();
                        var gaji=0;
                        <?php 
                            if($dataProjectOrder->jumlah_penggajian=='UMK'){ ?>
                                $('.gaji[kl-nik="'+thisval2+'"]').val($("#lokasi"+$('#kar'+value).data("lokasi")).val());
                                gaji=$('.gaji[kl-nik="'+thisval2+'"]').val();
                            <?php }else{ ?>
                                $('.gaji[kl-nik="'+thisval2+'"]').val('<?php echo $dataProjectOrder->jumlah_penggajian  ?>');
                                gaji=$('.gaji[kl-nik="'+thisval2+'"]').val();
                        <?php } ?>
                       
                        /* setTimeout(function(){
                            $(".select2p").select2();
                        },1000); */
                        $('.simpan2'+thisval2).show();
                        $('.simpan'+thisval2).show();
                        $('.cbkl').show();
                       // console.log(gaji);
                        simpangaji(<?php echo $dataProjectOrder->id_projek_order; ?>,thisval2,gaji);
                        $(".select2n").select2();
                        dataK.splice(0, 0, thisval2);
                        if(jk=="L"){
                            $('#jumL').val(parseInt(jumL+1));
                        } else if(jk=="P"){
                            $('#jumP').val(parseInt(jumP+1));
                        }
                        
                    }
                } else {
                    if(maxi=="maxA"){
                        toastr['info'](textmax);
                        $('#kar'+value).prop('checked',false);
                    }else {
                        if(jk=="L" && maxi=="maxL"){
                            toastr['info'](textmax);
                            $('#kar'+value).prop('checked',false);
                        } else if(jk=="P" && maxi=="maxP"){
                            toastr['info'](textmax);
                            $('#kar'+value).prop('checked',false);
                        }
                    }
                }
            } else {
                console.log('unchecked');
                //$('.cbkorlap[data-nik="'+$(this).val()+'"]').trigger("change");
                if($('.cbkorlap[data-nik="'+thisval2+'"]').prop('checked')){
                    $('.cbkorlap[data-nik="'+thisval2+'"]').prop('checked',false);
                    var jumKL=parseInt($('#jumKL').val());
                    var newKL=jumKL-1;
                    var indexnyakl = parseInt(dataKL.indexOf(thisval2));
                    if(indexnyakl>=0){
                        dataKL.splice(indexnyakl, 1);
                    }
                    $('#dataKL').val(dataKL.join(","));
                    $('#jumKL').val(parseInt(newKL));
                    if(parseInt(newKL)>0){
                        //$("#ckselect").html(" | "+parseInt(newKL)+" selected");
                    } else {
                        //$("#ckselect").html("");
                    }
                }
                $('.cbkl[kl-nik="'+thisval2+'"]').hide();
                //$('.s2pro[kl-nik="'+$(this).val()+'"]').html("");
                $('.gaji[kl-nik="'+thisval2+'"]').val(0);
                //$('.rowgaji[kl-nik="'+$(this).val()+'"]').hide();
                $('.rowgaji[kl-nik="'+thisval2+'"]').html("");
                var indexnya = dataK.indexOf(thisval2.toString());
                // console.log(dataK.join(","));
                // console.log(indexnya);
                if(indexnya>=0){
                    dataK.splice(indexnya, 1);
                }
                if(jk=="L"){
                    $('#jumL').val(parseInt(jumL-1));
                } else if(jk=="P"){
                    $('#jumP').val(parseInt(jumP-1));
                }
                $('.simpan2'+thisval2).hide();
                $('.simpan'+thisval2).hide();
                $('.cbkl').hide();
                simpangaji(0,thisval2,0);
            }
            $('#dataK').val(dataK.join(","));
            var jumakhir=parseInt($('#jumL').val())+parseInt($('#jumP').val());
            $("#cselect").html("L : "+parseInt($('#jumL').val())+"/"+parseInt(maxL)+" | P : "+parseInt($('#jumP').val())+"/"+parseInt(maxP));
            if(countkar>0){
                if(parseInt(maxL+maxP)==countkar){
                    $("#selectall").prop("checked", true);
                } else {
                    $("#selectall").prop("checked", false);
                }
                //$("#cselect").html(parseInt(maxL+maxP)+" selected");
            } else {
                $("#selectall").prop("checked", false);
                //$("#cselect").html("-");
            }
       // });
    }
    function simpannominalgaji(idkontrak){
        var gaji= $('.gaji[kl-nik="'+idkontrak+'"]').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url()?>Outsource/Updategaji",
            data:{idkontrak:idkontrak,gaji:gaji},
           success: function(data) {
                //$('.simpan'+idkontrak).hide();
            }
        });
    }
    function simpangaji(idpo,idkontrak,gaji){
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url()?>Outsource/Updatepersonil",
            data:{idpo:idpo,idkontrak:idkontrak,gaji:gaji},
           success: function(data) {
                
            }
        });
    }
    function simpankorlap(idkontrak,korlap){
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url()?>Outsource/Updatekorlap",
            data:{idkontrak:idkontrak,korlap:korlap},
           success: function(data) {
                
            }
        });
    }
    function aksiPilkor(value){
        //$('.cbkorlap').change(function(){
            var jumKL=parseInt($('#jumKl').val());
            var maxKL=parseInt($('#personil_korlap').val());
            var maxi="";
            var textmax="";
            var dataKL=$('#dataKL').val().split(",");
            var thisval = $('#kor'+value).data("value");
            if(parseInt(jumKL)==parseInt(maxKL)){
                maxi="maxA";
                textmax="Reach The Maximum Limit";
            } 
            if($('#kor'+value).is(':checked')){
                if(maxi!="maxA"){
                    dataKL.splice(0, 0, thisval);
                    $('#jumKl').val(parseInt(jumKL+1));
                    //checked
                    simpankorlap(thisval,1);
                } else {
                    if(maxi=="maxA"){
                        toastr['info'](textmax);
                        $('#kor'+value).prop('checked',false);
                    }
                }
            } else {
                var indexnya =dataKL.indexOf(thisval.toString());
                if(indexnya>=0){
                    dataKL.splice(indexnya, 1);
                }
                $('#jumKl').val(parseInt(jumKL-1));
                //uncehecked
                simpankorlap(thisval,0);
            }
            $('#dataKL').val(dataKL.join(","));
            var jumakhir=parseInt($('#jumKl').val());
            if(parseInt(jumakhir)>0){
                //$("#ckselect").html(" | "+parseInt(jumakhir)+" selected");
            } else {
                $("#ckselect").html("");
            }
        //});
    }
    function include(arr,obj) {
        return (arr.indexOf(obj) != -1);
    }
</script>