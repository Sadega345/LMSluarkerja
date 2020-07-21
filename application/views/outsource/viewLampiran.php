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
             }?> / Data Lampiran</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="<?php echo base_url() ?>assets/images/logo-aja.png" alt="" width="100px" />
                    </div>
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
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
		                    <label>File PO</label>
		                    <?php 
                                if($dataProjectOrder->file_upload!=''){
                                    echo '<form id="hapusdoc" action="'.base_url().'Outsource/ProsesHapusDokumen" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="'. $dataProjectOrder->id_projek_order .'" />
                                    <input type="hidden" name="path" value="assets/img/po/'.$dataProjectOrder->id_projek_order."/".$dataProjectOrder->file_upload.'" />
                                    <input type="hidden" name="sts" value="'. $sts .'" />
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="file" name="file_upload" id="dropify-event2" data-default-file="'.base_url().'assets/img/po/'.$dataProjectOrder->id_projek_order."/".$dataProjectOrder->file_upload.'">
                                        </div>
                                        <div class="col-12 align-text-bottom">
                                            <input id="btnupdate" type="submit" class="btn btn-primary verticalbottom" onClick="return emptyval(\'dropify-event2\')" value="Update" />
                                        </div>
                                    </div>
                                    
                                    </form>';
                                }else{
                                    echo '<form id="adddoc" action="'.base_url().'Outsource/ProsesUploadDokumen" method="post" enctype="multipart/form-data">
                                                    <div class="input-group">
                                                        <input type="hidden" name="id" value="'. $dataProjectOrder->id_projek_order .'">
                                                        <input type="hidden" name="sts" value="'. $sts .'">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="file_upload" id="docnya" >
                                                            <label class="custom-file-label" for="docnya">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-green1" type="submit" onClick="return emptyval(\'docnya\')" >Upload</button>
                                                        </div>
                                                    </div>
                                                </form> ';
                                }
                            ?>
		                </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
		                    <label>File Lampiran</label>
                            <form id="uploadForm" action="<?php echo base_url() ?>Outsource/uploadLampiran" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="hidden" name="id" value="<?php echo $dataProjectOrder->id_projek_order ?>" />
                                        <input type="hidden" name="sts" value="<?php echo $sts; ?>" />
                                        <input type="file" class="custom-file-input" name="lampiran[]" multiple="multiple" id="inputfile" />
                                        <label class="custom-file-label" for="inputfile">Pilih file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-green1" name="submit" type="submit" onClick="return emptyval(\'inputfile\')">Upload</button>
                                    </div>
                                </div>
                            </form>
		                </div>  
                    </div>
                </div>
                <div id="uploadStatus"></div>
                <div class="row">
                    <div class="col-10">
                        <h6 class="tittle-box text-center">List Lampiran (<span id="jumdoc"><?php echo $dataLampiran->num_rows() ?></span> Dokumen)</h6>    
                    </div>
                    <div class="col-2 m-b-10">
                        <form method="post" action="<?php echo base_url() ?>Outsource/hapusLampiran">
                            <button id="btntrash" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> <span id="jumdel"></span></button>
                            <input type="hidden" name="id" value="<?php echo $dataProjectOrder->id_projek_order ?>" />
                            <input type="hidden" name="sts" value="<?php echo $sts; ?>" />
                            <input type="hidden" id="datalamp" name="datalamp" value="" />
                        </form>
                    </div>
                </div>
                <div class="row" id="imagesPreview">
                    <div class="gallery" ></div>
                    <?php
                    if($dataLampiran->num_rows()>0){
                        foreach($dataLampiran->result() as $row){
                            //echo '<div class="col-12 col-md-4"><input type="file" class="dropify" data-default-file="'.base_url().'assets/img/po/lampiran/'.$row->file_lampiran.'"></div>';
                            echo '<div class="col-12 col-md-4 m-b-10">
                            <img class="img-fluid" src="'.base_url().'assets/img/po/lampiran/'.$row->id_projek_order."/".$row->file_lampiran.'">
                                <label class="fancy-checkbox cblamp"  data-idl="'.$row->id_lampiran.'" >
                                    <input type="checkbox" name="pilih_lampiran[]" value="'.$row->id_lampiran.'" class="cblampiran" data-path="assets/img/po/lampiran/'.$row->id_projek_order.'/'.$row->file_lampiran.'" />
                                    <span></span>
                                </label>
                            </div>';
                        }
                    } else {
                        echo '<div class="form-control">Belum Ada Data</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- images upload form -->
<!--
<form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Outsource/uploadLampiran">
    <label>Choose Images</label>
    <input type="hidden" name="id" value="<?php //echo $dataProjectOrder->id_projek_order ?>" />
    <input type="file" name="lampiran[]" id="images" multiple >
    <input type="submit" name="submit" value="UPLOAD"/>
</form>
-->
<!-- display upload status -->

<!-- gallery view of uploaded images --> 

<script src="<?php echo base_url()?>assets/js/jquery.form.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnupdate").hide();
        $("#btntrash").hide();
        $('#uploadForm').ajaxForm({
            target:'#imagesPreview',
            beforeSubmit:function(){
                $('#uploadStatus').html('<div class="row"><div class="col-12 text-center"><img src="<?php echo base_url(); ?>assets/images/loading.gif"/></div></div>');
            },
            success:function(){
                $('#images').val('');
                $('#uploadStatus').html('');
                $("#jumdoc").html($("#jumbaru").val());
                $('.dropify').dropify();
                $(".cblampiran").change(function(){
                    hitungLampiran();
                });
            },
            error:function(){
                $('#uploadStatus').html('Images upload failed, please try again.');
            }
        });
        var drEvent = $('#dropify-event2').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
    
        drEvent.on('dropify.afterClear', function(event, element) {
            $("#hapusdoc").submit();
            //alert('File deleted');
            
        });
        $(".cblampiran").change(function(){
            hitungLampiran();
        });
        $('#dropify-event2').change(function(){
            var thisval=$(this).val();
            if(thisval!=""){
                $("#btnupdate").show();
                $('#hapusdoc').attr('action', '<?php echo base_url() ?>Outsource/ProsesEditDokumen');
            }
        });
    });
    
    function emptyval(idnya) {
        var x;
        x = document.getElementById(idnya).value;
        if (x == "") {
            alert("Input File");
            return false;
        };
    }
 
    function hitungLampiran(){
        var idlamp = [];
        var jumdel=0;
        $.each($('.cblampiran:checked'), function(){
            jumdel++;
            idlamp.push($(this).val());
        });
        if(jumdel>0){
            $("#btntrash").show();
            $("#jumdel").html(jumdel+" lampiran");
        } else {
            $("#btntrash").hide();
            $("#jumdel").html("");
        }
        $('#datalamp').val(idlamp.join(","));
    }
</script>