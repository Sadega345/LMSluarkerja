<!doctype html>
<html lang="en">


<?php $this->load->view('template/head.php') ?>


<?php $this->load->view('template/head.php') ?>
<body class="theme-orange" style="background: url('<?php echo base_url() ?>assets/img/bg.png') no-repeat left center fixed;background-size: 85%;">
    <div class="container">
        <div class="row">
            <div class="col-md-6" >
                &nbsp;
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-4 col-12 m-t-75" style="background-color: #ffff">
                
                <div class="m-t-30" align="center">
                    <img class="img-responsive" width="70%" alt="school-logo" src="<?php echo base_url();?>assets/images/growinc.png">
                </div>
                <div class="header m-t-30" align="center">
                    <p class="lead">Recover my password</p>
                </div>
                <div class="body">
                    <p>Please enter your email address below to receive instructions for resetting password.</p>
                    <form id="formreset" class="form-auth-small" id="formreset" method="post" action="<?php echo base_url(); ?>Home/prosesReset">
                                <input name="nik" type="hidden" value="<?php echo $datakar->nik; ?>" readonly required>
                                <input name="key" type="hidden" value="<?php echo $key; ?>" />
                                <div class="form-group">
                                    <label class="control-label">Username</label>                                    
                                    <input name="email" type="email" class="form-control" id="email" placeholder="email" value="<?php echo $datakar->username; ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>                                    
                                    <input name="pass" id="newpass" type="password" class="form-control" placeholder="Password" onkeyup="checkSamePass(this.value)" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Konfirmasi Password</label>           
                                    <input name="passconf" id="confpass" type="password" class="form-control" placeholder="Password Konfirmasi" onkeyup="checkSamePass(this.value)" required>
                                    <p id="warn"></p>
                                </div>
                                <a href="javascript:;" class="btn btn-blue btn-lg btn-block tombol-resetPassword" >Reset Password</a>
                                <div class="bottom">
                                    <span class="helper-text">Know your password? <a href="<?php echo base_url() ?>home/login" class="tittle-box">Login</a></span>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".tombol-resetPassword").click(function(){
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-blue1',
                    cancelButton: 'btn btn-red1'
                  },
                  buttonsStyling: false,
                });
                if(emptyval("newpass") && emptyval("confpass")){
                    if($("#newpass").val()==$("#confpass").val()){
                        $("#formreset").submit();
                    } else {
                        swalWithBootstrapButtons.fire("Cancelled", "Konfirmasi Kata Sandi Harus Sama", "error"); 
                    }
                } else {
                    swalWithBootstrapButtons.fire("Cancelled", "Inputan tidak boleh kosong", "error");
                }
            });
        });
        function emptyval(idnya) {
            var x;
            x = document.getElementById(idnya).value;
            if (x == "") {
                //alert("Input File");
                return false;
            }
            return true;
        }
        function checkSamePass(){
            if($("#newpass").val()==$("#confpass").val()){
                $("#warn").html("");
            } else {
                $("#warn").html("Password tidak Sama");
            }
        }
    </script>
	<!-- END WRAPPER -->
</body>
</html>

