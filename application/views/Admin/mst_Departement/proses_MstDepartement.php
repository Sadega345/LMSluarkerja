<script type="text/javascript">
                $(document).ready(function(){
                    $(".tombol-simpan").click(function(){
                        var data = $('.form-tambah').serialize();
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url()?>Admin/prosesTambahDepartement",
                            data: data,
                            success: function(data) {
                                alert(data);
                                window.location.href="<?php echo base_url()?>Admin/mstDepartement";
                            }
                        });
                    });
                     $(".tombol-ubah").click(function(){
                        var data = $('.form-ubah').serialize();
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url()?>Admin/prosesUbahDepartement",
                            data: data,
                            success: function(data) {
                                alert(data);
                                window.location.href="<?php echo base_url()?>Admin/mstDepartement";
                            }
                        });
                    });
                
                });

                 function hapusDepartement(a){
                    $.ajax({
                      url: '<?php echo base_url();?>Admin/prosesHapusDepartement', //calling this function
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