<!DOCTYPE HTML>
<html>
    <head>
    	<meta http-equiv="content-type" content="text/html" />
    	<meta name="author" content="lolkittens" />
    
    	<title>Untitled 1</title>
        <?php //$this->load->view('template/head'); ?>
        <?php $this->load->view('hr/hr-mail-style'); ?>
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php //echo $mailserver->mail_header; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h2><?php echo $mailtitle; ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="alert alert-primary">
                        <h4>Hi, <?php echo $datakar->nama_lengkap; ?></h4>
                        <?php
                        if($mailformat=="baru"){
                            ?>
                            Terima kasih telah melakukan pelamaran, tunggu informasi selanjutnya di portal berikut :<br />
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>">Continue to Your Account</a><br />
                            Berikut Detail Akun untuk Login ke portal tersebut :<br />
                            <div class="card">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label class="float-right hidden-sm">Email</label>
                                            <label class="d-sm-none">Email</label>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="float-left">: <pre><?php echo $datakar->username; ?></pre></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label class="float-right hidden-sm">Password</label>
                                            <label class="d-sm-none">Password</label>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="float-left">: <?php echo $datakar->password; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Happy Working</p>
                            <?php
                        }
                        ?>
                        <?php
                        if($mailformat=="diterima"){
                            ?>
                            Terima Kasih telah melakukan pelamaran sebagai :<br />
                            <?php echo $datakar->jenis_project; ?><br />
                            di<br />
                            <?php echo $datakar->kabupatennya; ?><br />
                            <?php if($datajadwal->num_rows()>0){ ?>
                            Jika berkenan, diharapkan untuk mengikuti proses berikutnya :
                            <div class="card">
                                <div class="body">
                                    <?php
                                    foreach($datajadwal->result() as $dtj){
                                        ?>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="float-right hidden-sm"><?php echo $dtj->jenis; ?></label>
                                                <label class="d-sm-none"><?php echo $dtj->jenis; ?></label>
                                            </div>
                                            <div class="col-6">
                                                <label class="float-left">: <?php echo $dtj->tanggal; ?></label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <p>Jika Anda tidak mengikuti proses tersebut, Mohon maaf Anda dinyatakan menolak bergabung dengan kami.</p>
                            <?php
                            }
                        }    
                        ?>
                        <?php
                        if($mailformat=="ditolak"){
                            ?>
                            Terima Kasih telah melakukan pelamaran sebagai :<br />
                            <?php echo $datakar->jenis_project; ?><br />
                            di<br />
                            <?php echo $datakar->kabupatennya; ?><br />
                            <div class="card">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            Mohon maaf pelamaran Anda belum bisa kami terima.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }    
                        ?>
                        <?php
                        if($mailformat=="reset"){
                            ?>
                            Kami mendapatkan permintaan untuk mereset kata sandi Anda<br />
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Home/ResetPass/<?php echo $resetkey."|".$datakar->nik; ?>">Reset Password</a><br />
                            <p>Link di atas berlaku hanya dalam kurun waktu 1x24 jam.</p>
                            <p>jika Anda mengabaikan informasi ini, kata sandi Anda tidak akan diubah.</p>
                            <?php
                        }
                        ?>
                        <?php
                        if($mailformat=="pegawai"){
                            ?>
                            Selamat Anda telah menjadi bagian kami sebagai :<br />
                            <?php echo $datakar->jenis_project; ?><br />
                            di<br />
                            <?php echo $datakar->kabupatennya; ?><br />
                            Berikut Akun untuk login ke portal Employee :
                            <div class="card">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="float-right hidden-sm">Email</label>
                                            <label class="d-sm-none">Email</label>
                                        </div>
                                        <div class="col-6">
                                            <label class="float-left">: <?php echo $datakar->username; ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="float-right hidden-sm">Password</label>
                                            <label class="d-sm-none">Password</label>
                                        </div>
                                        <div class="col-6">
                                            <label class="float-left">: <?php echo $datakar->password; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            Anda pun bisa login langsung lewat tombol di bawah ini :<br />
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>">Continue to Your Account</a><br />
                            <p>Happy Working</p>
                            <?php
                        }
                        ?>
                        <h5>Regards,<br />HR & Talent Development</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php //echo $mailserver->mail_footer; ?>
                </div>
            </div>
        </div>
    </body>
</html>