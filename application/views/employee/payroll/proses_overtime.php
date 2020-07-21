<script type="text/javascript">
                $(document).ready(function(){
                    $(".tombol-simpan-overtime").click(function(){
                        var data = $('.form-tambah-overtime').serialize();
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url()?>Employee/prosesTambahOvertime",
                            data: data,
                            success: function(data) {
                                alert(data);
                                window.location.href="<?php echo base_url()?>Employee/overtime";
                            }
                        });
                      });
                    });

                 function hapusOvertime(a){
                    $.ajax({
                      url: '<?php echo base_url();?>Employee/prosesHapusOvertime', //calling this function
                      data:{id:a},
                      type:'POST',
                      cache: false,

                  success: function(data) {
                       alert("success");
                       location.reload();
                    }
                  });
                  }
            </script>