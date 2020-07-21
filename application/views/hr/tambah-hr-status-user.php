
            
             
                    <div class="container">
                        <div class="row  m-t-10">
                            <div class="col-md-2 m-t-20" >
                                <p class="fz-14-judul">NIK </p>
                            </div>
                            <div class="col-md-5">
                                <!-- <input type="text" name="deskripsi" class="form-control"> -->
                                
                                <select name="nik"  class="form-control select2 fcheight" required>
                                    <option selected disabled> Pilih NIK </option>
                                    <?php
                                    foreach($dataUser->result() as $user){
                                        ?>
                                        <option value="<?php echo $user->nik; ?>"> <?php echo $user->nik.'-'.$user->nama_lengkap; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row  m-t-10">
                            <div class="col-md-2 m-t-20">
                                <p class="fz-14-judul">Username</p>
                            </div>
                            <div class="col-md-5">
                                <input name="username" required type="text" id="username" class="form-control fcheight"  />
                            </div>
                        </div>

                        <div class="row m-t-10">
                            <div class="col-md-2 m-t-20">
                                <p class="fz-14-judul">Password</p>
                            </div>
                            <div class="col-md-5 col-12">
                                <input name="password" required type="password" class="form-control fcheight"  />
                            </div>
                        </div>
                    </div>
                        

        <script type="text/javascript">
          $(document).ready(function(){
            $("#username").keyup(function(){
                 $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>HR/checkUsername", 
                  data: {username : this.value}, 
                  dataType: "json",
                  beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                  },
                  success: function(response){
                    if(response.hasil=="invalid"){
                        alert("Username sudah terpakai");
                        $("#username").val("");
                    } else {
                        return true;
                    } 
                  },
                  error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                  }
                }); 
            });
          });
        </script>