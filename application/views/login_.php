<!doctype html>
<html lang="en">
<?php $this->load->view('template/head.php') ?>
<body class="theme-orange" style="background: url('../assets/img/bg.png') no-repeat left center fixed;background-size: 85%;">
    <div class="container">
        <div class="row">
            <div class="col-md-6" >
                &nbsp;
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-4 col-12 m-t-75" style="background-color: #ffff">
                        <div class="m-t-30" align="center">
                            <img class="img-responsive" width="70%" alt="school-logo" src="<?php echo base_url();?>assets/images/logo-aja.png">
                        </div>
                        <div class="header m-t-20" align="center">
                            <b>Masukan Akun Anda</b>
                        </div>
                        <div class="body m-t-20">
                             <form role="form" action="<?php echo base_url() ?>Home/prosesLogin" method="post">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Username</label>
                                    <?php echo form_input('user_name', $user_name, 'class="form-control" placeholder="Username"') ?>

                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                  <?php echo form_password('password', $password, 'class="form-control" placeholder="Password"') ?>
                                                            
                                </div>
                                <div class="form-group clearfix">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>
                                                <?php echo form_checkbox('remember', TRUE, $remember) ?> Ingat Saya
                                            </label>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <label>
                                                <a href="<?php echo base_url() ?>home/forgotPassword" class="tittle-box">Lupa password?</a>
                                            </label>
                                        </div>
                                      </div>
                                                  
                                </div>
                                <button type="submit" class="btn btn-blue btn-lg btn-block">MASUK</button>
                            </form>
                             <br>
                            <a href="<?php echo base_url() ?>home/loker"><button type="button" class="btn  btn-lg btn-block">DAFTAR LOKER</button> 
                        </div>
            </div>
        </div>
    </div>
   
    <!-- WRAPPER -->
    <!-- <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="card">
                        <div class="m-t-30" align="center">
                            <img class="img-responsive" width="150"  height="70" alt="school-logo" src="<?php echo base_url();?>assets/images/nata-logo.png">
                        </div>
                        <div class="header" align="center">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                             <form role="form" action="<?php echo base_url() ?>Home/prosesLogin" method="post">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <?php echo form_input('user_name', $user_name, 'class="form-control" placeholder="Email"') ?>

                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                  <?php echo form_password('password', $password, 'class="form-control" placeholder="Password"') ?>
                                                            
                                </div>
                                <div class="form-group clearfix">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>
                                                <?php echo form_checkbox('remember', TRUE, $remember) ?> Remember Me
                                            </label>
                                        </div>
                                      </div>
                                                  
                                </div>
                                <button type="submit" class="btn btn-blue btn-lg btn-block">LOGIN</button>
                                <br>
                                <div class="bottom" align="center">
                                    <span><a href="<?php echo base_url() ?>home/forgotPassword" class="tittle-box">Forgot password ?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END WRAPPER -->
    <?php $this->load->view('template/footer') ?>
     <script type="text/javascript">
        $(document).ready(function(){
            <?php if($this->session->flashdata('msge') != ''){ ?>
                new_alert('Masukan Email Anda','  <form role="form" action="<?php echo base_url() ?>Home/updateemail" method="post">'+
                                '<div class="form-group">'+
                                    '<label for="signin-password" class="control-label sr-only">Password</label>'+ 
                                    '<input type="Email" placeholder="Email" class="form-control" name="email" required>'+
                                    '<input type="hidden" placeholder="nik" class="form-control" name="nik" value="<?php echo $this->session->flashdata('nik') ?>">'+
                                '</div>'+
                                '<div class="row">'+ 
                                    '<div class="col-md-12">'+
                                        '<a href="<?php echo base_url() ?>home/login" class="btn btn-danger btn-lg btn-block ">Batal</a>'+
                                        '<button type="submit" class="btn btn-blue btn-lg btn-block">Kirim </button>'+
                                    '</div>'+  
                                '</div>'+
                                
                            '</form>','warning');
                $('.swal2-confirm').hide();
           <?php  } ?>
            <?php if($this->session->flashdata('msgjenisuser') != ''){ ?>
            <?php $tmpjenisuser = explode(',', $this->session->flashdata('user_type')); ?>
            <?php 
            $form ='<div class="row">';
            $empat = 4;
            if (count($tmpjenisuser) == 2) {
                $empat = 6;
            }
            foreach ($tmpjenisuser as $jenis){
                $form .= '<div class="col-md-'.$empat.'">'; 
                $txtjenis = '';
                if ($jenis == '1') {
                    $txtjenis = 'Employee';
                }elseif ($jenis == '3') {
                    $txtjenis = 'HR';
                }elseif ($jenis == '6') {
                    $txtjenis = 'Outsource';
                }
                $form .='<form role="form" action="'.base_url().'Home/prosesLogin" method="post">';
                $form .='<input type="hidden" name="user_name" value="'.$this->session->flashdata('username').'">';
                $form .='<input type="hidden" name="password" value="'.$this->session->flashdata('password').'">';
                $form .='<input type="hidden" name="jenis" value="'.$jenis.'">';
                $form .='<input type="submit" name="simpan" class="btn btn-primary" value="'.$txtjenis.'">';
                $form .='</form>';
                $form .='</div>';
             }
             $form .='</div>';
              ?>

                new_alert('Pilih Akses Akun','<?php echo $form ?>','success');
                $('.swal2-confirm').hide();
           <?php  } ?>
        });
        //function new_alert(title,message,result)
    </script>
</body>
</html>


