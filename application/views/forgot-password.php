<!doctype html>
<html lang="en">
<?php $this->load->view('template/head.php') ?>
<body class="theme-orange" style="background-image: url('<?php echo base_url()?>assets/img/login.jpg');
    background-repeat: no-repeat;
    background-size: cover;" >
    <div class="container">
        <div class="row  m-t-75 p-10">
            <div class="col-md-7">
                <div class="row m-t-20">
                    <div class="col-md-12">
                        <p class="font-36 font-bold biru">LMS</p>
                        <p class="font-24 biru">Learning Management System</p>
                    </div>
                </div>
                <div class="row m-t-40">
                    <div class="col-md-12">
                        <img src="<?php echo base_url()?>assets/img/nata.png" alt="Lucid Logo" class="img-responsive logo" height="120px" >
                        <p class="font-24 biru">PT Nata Karya Indonesia</p>
                    </div>
                </div>
                <div class="row m-t-40">
                    <div class="col-md-12">
                        <p class="font-18 biru">Powered By:</p>
                        <img src="<?php echo base_url()?>assets/img/lsbaru.png" alt="Lucid Logo" class="img-responsive logo" height="50px">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 for-login">
                <div class="m-t-30" align="center">
                    <p class="font-32 biru">Forgot Password</p>
                </div>
                <div class="header" align="center">
                    <p class="font-18 biru">Enter your email address to reset your password.</p>
                </div>
                <div class="body">
                    <form class="form-auth-small" id="formreset" method="post" action="<?php echo base_url(); ?>Home/Reset">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-t-50">
                                        <input name="email" type="email" class="inputs col-md-12" id="email" placeholder="email" required>
                                    </div>
                                </div>   
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <div class="g-recaptcha" data-callback="robot" data-sitekey="6LddYZEUAAAAABhHESro4bZg_RtG_kLz9EdwluY0"></div>
                                    </center>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lg btn-block m-t-20 for-buttonlogin">Reset Password</button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 bottom text-center m-t-20">
                                    <a href="<?php echo base_url() ?>home/login" class="font-18 hijau">Login</a>
                                </div>
                            </div>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php $this->load->view('template/footer') ?>
    
</body>
</html>


