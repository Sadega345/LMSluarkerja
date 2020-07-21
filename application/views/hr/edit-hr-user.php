
                    <div class="container">
                       
                        <input type="hidden" name="id_user" value="<?php echo $dataUserRow->id_user ?>">

                        <div class="row m-t-10">
                            <div class="col-md-2 m-t-10">
                                <P class="fz-14-judul">NIK</P>
                            </div>
                            <div class="col-md-5">
                                <input type="text" readonly="" class="form-control fcheight" name="" value="<?php echo $dataUserRow->nik.'-'.$dataUserRow->nama_lengkap ?>">
                            </div>
                        </div>

                        <div class="row m-t-10">
                            <div class="col-md-2 m-t-10">
                                <P class="fz-14-judul">Username</P>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="username" id="username" class="form-control fcheight" value="<?php echo $dataUserRow->username ?>">
                            </div>
                        </div>

                        <div class="row m-t-10">
                            <div class="col-md-2 m-t-10">
                                <P class="fz-14-judul">Password</P>
                            </div>
                            <div class="col-md-5">
                                <input type="password" class="form-control fcheight" name="password" value="<?php echo $dataUserRow->password ?>">
                            </div>
                        </div>
                      </form>

                        
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