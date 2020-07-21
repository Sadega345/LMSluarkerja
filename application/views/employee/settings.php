
            <div class="block-header p-t-25">
                <div class="row">
                    <div class="col-md-4 p-t-25">
                        <p class="fz-18 biru nunito-bold"> Settings</p>
                    </div>
                    <div class="col-md-8"  align="right">
                        <p class="nunito-bold biru fz-18 p-t-25">Server Time : August 6th 2019, 08:20:10 AM</p>
                    </div>
                </div>
            </div>

            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <form method="post" class="ubahPassword">
                        <div class="card">
                            
                            <div class="body">
                                <div class="row m-t-10">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" id="oldpass" class="inputs col-md-12" placeholder="Kata Sandi Lama" name="password_lama" onkeyup="checkOldpass(this.value)">
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>              
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" id="newpass" class="inputs col-md-12" placeholder="Kata Sandi Baru" name="password_baru">
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>              
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" id="confpass" class="inputs col-md-12" placeholder="Konfirmasi Kata Sandi Baru" name="password_konf" onkeyup="checkSamePass(this.value)">
                                    </div>
                                    <div class="col-md-4">
                                        <p id="warn"></p>
                                    </div>
                                </div>                           
                            <br>

                               <!--  <h6 class="tittle-box">Kelola Bahasa</h6>
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-4" align="right">
                                        <label>Bahasa Pengantar</label>
                                    </div>  
                                    <div class="col-md-4 col-8">
                                        <input type="text" class="form-control" name="" value="Bahasa Indonesia" readonly>
                                    </div>                 
                                </div> -->
                                
                            <br>

                            <!-- I'm Not Robot -->
                            <div class="row m-t-10">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="g-recaptcha" data-callback="robot" data-sitekey="6LddYZEUAAAAABhHESro4bZg_RtG_kLz9EdwluY0"></div>
                                </div>
                                <div class="col-md-4">
                                    
                                </div>
                            </div> 
                            <br>

                            <div class="row">
                                <div class="col-md-4" >
                                </div>
                                <div class="col-md-4 text-center">
                                    <a href="javascript:;" class="btn for-buttonlogin tombol-ubahPassword col-md-6">Simpan</a>
                                    <!-- <button href="javascript:;" class="btn btn-blue tombol-ubahPassword" disabled="" id="button">Simpan</button> -->
                                </div>
                                <div class="col-md-4" >
                                </div>
                            </div>
                            <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <?php 
            $dt=array();
            $dt['akun']="employee";
            $this->load->view("employee/proses_Employee",$dt) ;?>