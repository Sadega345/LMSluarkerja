<script type="text/javascript">
                $(document).ready(function(){
                    $(".tombol-simpan").click(function(){
                        var data = $('.form-tambah').serialize();
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url()?>Admin/prosesTambahMstSetting",
                            data: data,
                            success: function(data) {
                                alert(data);
                                window.location.href="<?php echo base_url()?>Admin/mstSetting";
                            }
                        });
                    });

                    $(".tombol-ubah").click(function(){
                        var data = $('.form-ubah').serialize();
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url()?>Admin/prosesUbahMstSetting",
                            data: data,
                            success: function(data) {
                                alert(data);
                                window.location.href="<?php echo base_url()?>Admin/mstSetting";
                            }
                        });
                    });

                });

                 function hapusMstSetting(a){
                    $.ajax({
                      url: '<?php echo base_url();?>Admin/prosesHapusMstSetting', //calling this function
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