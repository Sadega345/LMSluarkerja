<!doctype html>
<html lang="en">
<?php $this->load->view('template/head.php') ?>
<body class="theme-orange" style="background-image: url('<?php echo base_url()?>assets/img/login.jpg');
    background-repeat: no-repeat;
    background-size: cover;" >
    <div class="container">
        <div class="row  m-t-75 p-10">
            <div class="col-md-7" >
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
                    <p class="font-32 biru">Welcome to LMS</p>
                </div>
                <div class="header" align="center">
                    <p class="font-18 biru">Log in to access your account</p>
                </div>
                <div class="body m-t-40">
                     <form role="form" action="<?php echo base_url() ?>Home/prosesLogin" method="post">
                        <div class="form-group m-t-30">
                            <?php echo form_input('user_name', $user_name, 'class="inputs col-12" placeholder="Student / Lecturer Email"') ?>

                        </div>
                        <div class="form-group m-t-30">
                          <?php echo form_password('password', $password, 'class="inputs col-12" placeholder="Password"') ?>
                        </div>
                        <div class="form-group m-t-40" align="center">
                            <button type="submit" class="btn  btn-lg btn-block for-buttonlogin" style="">Log in</button>
                        </div>
                        <div class="form-group m-t-30" align="center">
                            <p >
                                <a href="<?php echo base_url() ?>home/forgotPassword" class="font-18 hijau">Forgot Password?</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    
    <?php $this->load->view('template/footer') ?>
    <!-- Open eye -->
    <script type="text/javascript">
        $(".toggle-password").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });
    </script>

     <script type="text/javascript">
        $(document).ready(function(){
            <?php if($this->session->flashdata('msgpwd') != ''){ ?>
                new_alert('Ganti Password Anda','  <form role="form" action="<?php echo base_url() ?>Home/updatepassword" method="post">'+
                                '<div class="form-group">'+               
                                    '<input name="pass" id="newpass" type="password" class="form-control" placeholder="Password" onkeyup="checkSamePass(this.value)" required>'+
                                '</div>'+
                                '<div class="form-group">'+  
                                    '<input name="password" id="confpass" type="password" class="form-control" placeholder="Password Konfirmasi" onkeyup="checkSamePass(this.value)" required>'+
                                    '<p id="warn"></p>'+
                                '</div>'+

                                '<div class="form-group">'+
                                    '<label for="signin-password" class="control-label sr-only">Password</label>'+
                                    // '<input type="password" placeholder="masukan password" class="form-control" name="password" required>'+

                                    '<input type="hidden" placeholder="nik" class="form-control" name="nik" value="<?php echo $this->session->flashdata('nik') ?>">'+
                                    '<input type="hidden" placeholder="username" class="form-control" name="username" value="<?php echo $this->session->flashdata('username') ?>">'+
                                '</div>'+
                                '<div class="row">'+ 
                                    '<div class="col-md-12">'+
                                        '<a href="<?php echo base_url() ?>home/login" class="btn btn-danger btn-lg btn-block ">Batal</a>'+
                                        '<button type="submit" class="btn btn-blue btn-lg btn-block" id="kirim">Kirim </button>'+
                                    '</div>'+  
                                '</div>'+
                                
                            '</form>','warning');
                $('.swal2-confirm').hide();
            <?php  } ?>
            <?php if($this->session->flashdata('msge') != ''){ ?>
                new_alert('Masukan Email Anda','  <form role="form" action="<?php echo base_url() ?>Home/updateemail" method="post">'+
                                '<div class="form-group">'+
                                    '<label for="signin-password" class="control-label sr-only">Password</label>'+ 
                                    '<input type="Email" placeholder="Email" class="form-control" name="email" required>'+
                                    '<input type="hidden" placeholder="nik" class="form-control" name="nik" value="<?php echo $this->session->flashdata('nik') ?>">'+
                                    '<input type="hidden" placeholder="username" class="form-control" name="username" value="<?php echo $this->session->flashdata('username') ?>">'+
                                    '<input type="hidden" placeholder="password" class="form-control" name="password" value="<?php echo $this->session->flashdata('password') ?>">'+
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
    <script type="text/javascript">
        function checkSamePass(){
            if($("#newpass").val()==$("#confpass").val()){
                $("#warn").html("");
                $("#kirim").show()
            } else {
                $("#warn").html("Password tidak Sama");
                $("#kirim").hide();
            }
        }
    </script>
</body>
</html>


