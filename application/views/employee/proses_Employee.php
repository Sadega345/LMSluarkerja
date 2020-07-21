<script type="text/javascript">
    $(document).ready(function(){
        $("#newpass").attr("readonly",true);
        $("#confpass").attr("readonly",true);
        $(".tombol-ubah").click(function(){
            alert('masuk');
            var data = $('.form-ubah').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url()?>Employee/prosesUbahProfil",
                data: data,
                success: function(data) {
                    alert(data);
                    window.location.href="<?php echo base_url()?>Employee/myInformation";
                }
            });
        });
        $(".tombol-ubahPassword").click(function(){
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-blue1',
                cancelButton: 'btn btn-red1'
              },
              buttonsStyling: false,
            });
            if(emptyval("newpass") && emptyval("confpass")){
                if($("#newpass").val()==$("#confpass").val()){
                    swalWithBootstrapButtons.fire({
                        title: "Apakah Anda yakin?",
                        text: "Anda akan mengganti password lama anda!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#dc3545",
                        confirmButtonText: "Ya",
                        cancelButtonText: "Tidak",
                        //closeOnConfirm: false,
                        //closeOnCancel: false,
                        reverseButtons: true,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.value) {
                            var data = $('.ubahPassword').serialize();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo base_url()?>Employee/prosesUbahPassword",
                                data: data,
                                success: function(data) {
                                    swalWithBootstrapButtons.fire("Sukses", "Password Berhasil di ubah", "success");
                                    setTimeout(function(){
                                        <?php
                                        if($akun=="employee"){
                                        ?>
                                            window.location.href="<?php echo base_url()?>Employee/settings";
                                        <?php
                                        } else if($akun=="hr"){
                                            ?>
                                            window.location.href="<?php echo base_url()?>HR/HRAkun";
                                            <?php
                                        }
                                        ?>
                                    },2000);
                                }
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                        }
                    });
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
    function checkOldpass(val){
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url()?>Employee/checkPass",
            data: {oldpass:val},
            success: function(result) {
                if(result>0){
                    $("#oldpass").attr("readonly",true);
                    $("#newpass").attr("readonly",false);
                    $("#confpass").attr("readonly",false);
                    $("#newpass").focus();
                } else {
                    $("#oldpass").attr("readonly",false);
                    $("#newpass").attr("readonly",true);
                    $("#confpass").attr("readonly",true);
                }
            }
        });
        
    }
    function checkSamePass(val){
        if(val==$("#newpass").val()){
            $("#warn").html("");
        } else {
            $("#warn").html("Password tidak Sama");
        }
    }
    
</script>