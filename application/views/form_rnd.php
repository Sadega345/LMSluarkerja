<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> R&D</h2>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-6">
                        <a href="<?php echo base_url("RnD/pdf"); ?>" target="_blank" class="btn btn-primary">PDF Sample</a>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo base_url("RnD/excel"); ?>" target="_blank" class="btn btn-primary">Excel Sample</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Form Email 
                    <a href="<?php echo base_url() ?>RnD/MailServer" target="_blank" class="btn btn-primary"><i class="fa fa-cog"></i></a>
                </h2>
                <form method="post" action="<?php echo base_url() ?>RnD/MailFormat" target="_blank">
                    <div class="form-group">
                        <select class="select2" name="format">
                            <option value="baru">pelamaranbaru</option>
                            <option value="diterima">pelamaranditerima</option>
                            <option value="ditolak">pelamaranditolak</option>
                            <option value="reset">resetpassword</option>
                            <option value="pegawai">diterimajadipegawai</option>
                        </select>
                        <select name="nik" class="select2">
                            <?php /* foreach($datakaryawan->result() as $dtk){
                                ?>
                                <option value="<?php echo $dtk->nik;?>"><?php echo $dtk->nik; ?> - <?php echo $dtk->nama_lengkap; ?></option>
                                <?php
                            }  */?>
                        </select>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-file"></i></button>
                    </div>
                </form>
                <?php
                if($this->session->flashdata('msg')!=""){
                ?>
                    <label><?php echo $this->session->flashdata('msg'); ?></label>
                <?php
                }
                ?>
            </div>
            <form action="<?php echo base_url("RnD/kirimEmailnya"); ?>" method="post">
                <div class="body">
                    <div class="form-group">
                        <select class="select2" name="format">
                            <option value="baru">pelamaranbaru</option>
                            <option value="diterima">pelamaranditerima</option>
                            <option value="ditolak">pelamaranditolak</option>
                            <option value="reset">resetpassword</option>
                            <option value="pegawai">diterimajadipegawai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="nik" class="select2">
                            <?php  
                            if($datakaryawan->num_rows()>0){
                                foreach($datakaryawan->result() as $dtk2){
                                    ?>
                                    <option value="<?php echo $dtk2->nik;?>"><?php echo $dtk2->nik; ?> - <?php echo $dtk2->nama_lengkap; ?></option>
                                    <?php
                                }
                            }  ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" maxlength="100" type="email" autofocus />
                    </div>
                    <!--
                        <p>Subject : <input type="text" name="subject" maxlength="200" /></p>
                    -->
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="pesan" cols="5" rows="5"></textarea>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" value="Send Email" />
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="header">
                <h2>Form Upload</h2>
                <?php
                if($this->session->flashdata('msg_up')!=""){
                ?>
                    <label><?php echo $this->session->flashdata('msg_up'); ?></label>
                <?php
                }
                ?>
            </div>
            <form action="<?php echo base_url("RnD/uploadFiles"); ?>" method="post" enctype="multipart/form-data">
                <div class="body">
                    <div class="form-group">
                        <label>Files</label>
                        <input class="form-control" name="filenya[]" type="file" accept=".jpg,.jpeg,.png,.gif" autofocus multiple />
                    </div>
                    <!--
                        <p>Subject : <input type="text" name="subject" maxlength="200" /></p>
                    <div class="form-group">
                        <label>New Name</label>
                        <input class="form-control" name="newname" id="newname" type="text" maxlength="100" value="<?php echo date("YmdHis"); ?>" readonly />
                    </div>
                    -->
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" value="Upload Files" />
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
       <div class="card">
            <div class="header">
                <h2>Calendar</h2>
            </div>
            <div class="body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/js/pages/calendar.js"></script>
<script type="text/javascript">
    function getExt(input){
        var url = input.value;
        var ext = url.substr(url.lastIndexOf('.') + 1);
        //alert(ext);
        document.getElementById("newname").value = document.getElementById("newname").value+"."+ext;
    }
</script>