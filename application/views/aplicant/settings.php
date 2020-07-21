
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"> Pengaturan</h6>
                    </div>
                </div>
            </div>

            <form method="post" class="ubahPassword">
                <div class="body">
                    <div class="card">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="row m-t-20">
                                    <div class="col-md-6">
                                        <label class="fz-18">Kelola Kata Sandi</label>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 m-t-20">
                                                <p class="fz-14-judul">Kata Sandi Lama </p>
                                            </div>  
                                            <div class="col-md-6">
                                                <input type="password" id="oldpass" class="form-control fcheight" name="password_lama" onkeyup="checkOldpass(this.value)">
                                            </div>                 
                                        </div>

                                        <div class="row m-t-10">
                                            <div class="col-md-6 m-t-20">
                                                <p class="fz-14-judul">Kata Sandi Baru </p>
                                            </div>  
                                            <div class="col-md-6">
                                                <input type="password" id="newpass" class="form-control fcheight" name="password_baru">
                                            </div>                 
                                        </div>

                                        <div class="row m-t-10">
                                            <div class="col-md-6 m-t-20">
                                                <p class="fz-14-judul">Konfirmasi Kata Sandi Baru </p>    
                                            </div>   
                                            <div class="col-md-6">
                                                <input type="password" id="confpass" class="form-control fcheight" name="password_konf" onkeyup="checkSamePass(this.value)">
                                            </div>
                                           <!--  <div class="col-md-4">
                                                <p id="warn"></p>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fz-18">Kelola Alamat Email</label>
                                        <div class="row m-t-10">
                                            <div class="col-lg-4 m-t-20">
                                                <p class="fz-14-judul">Email Sekarang </p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" readonly  class="form-control fcheight" value="<?php echo $datatrxuserpelamar->email ?>">
                                            </div>                 
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-lg-4 m-t-20">
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>                 
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-lg-4 m-t-20">
                                            </div>
                                            <div class="col-md-6">
                                                  &nbsp;
                                            </div>                 
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-lg-4 m-t-20">
                                            </div>
                                            <div class="col-md-6">
                                                  <a href="javascript:;" class="btn Rectangle-simpan-blue col-md-12 tombol-ubahPassword" >Simpan</a>
                                            </div>                 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row m-t-10">
                                <div class="col-md-6" >
                                        <a href="javascript:;" class="btn Rectangle-simpan-blue tombol-ubahPassword" >Simpan</a>
                                </div>
                            </div> -->
                            <br>
                        </div>
                    </div>
                </div>
            </form> 

            <?php 
            $dt=array();
            $dt['akun']="employee";
            $this->load->view("employee/proses_Employee",$dt) ;?>