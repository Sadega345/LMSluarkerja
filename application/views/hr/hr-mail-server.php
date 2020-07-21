
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Mail Server</h6>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <form method="post" class="ubahPassword" action="<?php echo base_url(); ?>RnD/changeMailServer">
                        <input type="hidden" name="id_mail" value="<?php echo $mailserver->id_mail; ?>" />
                        <div class="card">
                            <div class="header">
                                <h6 class="tittle-box" align="center">Mail Server</h6>
                            </div>
                            <div class="body">
                                <h6 class="tittle-box m-t-10">Setting</h6>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">Protocol </label>    
                                        <label class="d-sm-none">Protocol </label>
                                    </div>  
                                    <div class="col-md-4">
                                        <select name="protocol" class="form-control select2">
                                            <option value="mail" <?php echo $mailserver->protocol=="mail"?"selected":""; ?>>Mail</option>
                                            <option value="sendmail" <?php echo $mailserver->protocol=="sendmail"?"selected":""; ?>>SendMail</option>
                                            <option value="smtp" <?php echo $mailserver->protocol=="smtp"?"selected":""; ?>>SMTP</option>
                                        </select>
                                    </div>                 
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">SMTP Host </label>    
                                        <label class="d-sm-none">SMTP Host </label>
                                    </div>  
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="smtp_host" value="<?php echo $mailserver->smtp_host; ?>" />
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">SMTP User </label>    
                                        <label class="d-sm-none">SMTP User </label>
                                    </div>  
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="smtp_user" value="<?php echo $mailserver->smtp_user; ?>"/>
                                    </div>                 
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">SMTP Password </label>    
                                        <label class="d-sm-none">SMTP Password </label>
                                    </div>  
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="smtp_pass" value="<?php echo $mailserver->smtp_pass; ?>" />
                                    </div>                 
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">SMTP Port </label>    
                                        <label class="d-sm-none">SMTP Port </label>
                                    </div>  
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="smtp_port" value="<?php echo $mailserver->smtp_port; ?>" />
                                    </div>                 
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">SMTP Crypto </label>    
                                        <label class="d-sm-none">SMTP Crypto </label>
                                    </div>  
                                    <div class="col-md-4">
                                        <select name="smtp_crypto" class="form-control select2">
                                            <option value="tls" <?php echo $mailserver->smtp_crypto=="tls"?"selected":""; ?>>TLS</option>
                                            <option value="ssl" <?php echo $mailserver->smtp_crypto=="ssl"?"selected":""; ?>>SSL</option>
                                        </select>
                                    </div>                 
                                </div>
                                <h6 class="tittle-box m-t-10">Header & Footer</h6>
                                <br>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">Mail Name </label>    
                                        <label class="d-sm-none">Mail Name </label>
                                    </div>  
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="mail_name" value="<?php echo $mailserver->mail_name; ?>"/>
                                    </div>                 
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">Mail Header </label>    
                                        <label class="d-sm-none">Mail Header </label>
                                    </div>  
                                    <div class="col-md-9">
                                        <textarea class="form-control summernote" name="mail_header"><?php echo $mailserver->mail_header; ?></textarea>
                                    </div>                 
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-lg-3">
                                        <label class="float-right hidden-sm">Mail Footer </label>    
                                        <label class="d-sm-none">Mail Header </label>
                                    </div>  
                                    <div class="col-md-9">
                                        <textarea class="form-control summernote" name="mail_footer"><?php echo $mailserver->mail_footer; ?></textarea>
                                    </div>                 
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-1" >
                                    </div>
                                    <div class="col-lg-6" align="left">
                                        <div class="row">
                                            <div class="col-lg-6" align="left">
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="submit" class="btn btn-blue tombol-ubahPassword" value="Simpan" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div> <!-- body -->
                        </div>
                    </form>
                </div>
            </div>