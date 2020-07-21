<div id="left-sidebar" class="sidebar d-none d-sm-block" style="position: unset;">
    <div class="sidebar-scroll">
       <!--  <div class="user-account d-none d-sm-block">
            <img src="<?php //echo base_url() ?>assets/images/penata3x.png" alt="Lucid Logo" height="35px" class="img-responsive logo ">
        </div> -->
        <!-- <div class="user-account d-block d-md-none d-sm-block" align="right"> -->
        <div class="user-account" align="right" style="padding-top: 100px;padding-bottom: 20px ;background-color: #f4f7f6">
            <?php 
                if(isset($data_karyawanNumRows) && $data_karyawanNumRows==0 ){
                    if($data_pelamarNumRows==0){
                    echo ' <img src="'.base_url().'assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">';
                    }else{
                        echo ' <img src="'.base_url().'assets/img/karyawan/'.($datapelamar->gambar_foto!=''?$datapelamar->gambar_foto:'not.png').'" class="rounded-circle user-photo" alt="User Profile Picture">';    
                    }
                }else{
                    echo ' <img src="'.base_url().'assets/img/karyawan/'.(isset($dataKaryawan->gambar_foto) && $dataKaryawan->gambar_foto!=''?$dataKaryawan->gambar_foto:'user.png').'" class="rounded-circle user-photo" alt="User Profile Picture">';
                }
             ?>
            <div class="dropdown">
                <?php 
                if(isset($data_karyawanNumRows) && $data_karyawanNumRows==0 ){
                    if($data_pelamarNumRows==0){
                      echo '<strong class="user-name">Super Admin</strong><span>Super Admin</span>';
                        }else{
                              echo ' <strong class="user-name">'.$datapelamar->nama_panggilan.'</strong>    
                <span>Aplicants</span>';
                
                
                        }
                }else{
                    echo ' <h class=" user-name nunito-bold" data-toggle="" style="color:#073b6d;font-size:14px">'.(isset($dataKaryawan->nama_panggilan)?$dataKaryawan->nama_panggilan:"-").'</h> 
                <span style="color:#b8c1c9;font-size:14px">'.(isset($dataKaryawanProjek->jenis_project)?$dataKaryawanProjek->jenis_project:"-").'</span>';
                }
             ?>
            </div>
        </div>
            
        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0 m-t-30">
            <div class="tab-pane animated fadeIn active" id="hr_menu">
                <nav class="sidebar-nav">
                    
                        <?php echo $this->menu->dynamicMenu(); ?>
                        
                </nav>
            </div>            
        </div>          
    </div>
</div>


<div id="left-sidebar" class="sidebar d-block d-md-none d-sm-block">
    <div class="sidebar-scroll">
        <div class="user-account d-none d-sm-block">
            <img src="<?php echo base_url() ?>assets/images/penata3x.png" alt="Lucid Logo" height="35px" class="img-responsive logo ">
        </div>
        <!-- <div class="user-account d-block d-md-none d-sm-block" align="right"> -->
        <div class="user-account" align="right">
            <?php 
                if(isset($data_karyawanNumRows) && $data_karyawanNumRows==0 ){
                    if($data_pelamarNumRows==0){
                    echo ' <img src="'.base_url().'assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">';
                    }else{
                        echo ' <img src="'.base_url().'assets/img/karyawan/'.($datapelamar->gambar_foto!=''?$datapelamar->gambar_foto:'not.png').'" class="rounded-circle user-photo" alt="User Profile Picture">';    
                    }
                }else{
                    echo ' <img src="'.base_url().'assets/img/karyawan/'.(isset($dataKaryawan->gambar_foto) && $dataKaryawan->gambar_foto!=''?$dataKaryawan->gambar_foto:'user.png').'" class="rounded-circle user-photo" alt="User Profile Picture">';
                }
             ?>
            <div class="dropdown">
                <?php 
                if(isset($data_karyawanNumRows) && $data_karyawanNumRows==0 ){
                    if($data_pelamarNumRows==0){
                      echo '<strong class="user-name">Super Admin</strong><span>Super Admin</span>';
                        }else{
                              echo ' <strong class="user-name">'.$datapelamar->nama_panggilan.'</strong>    
                <span>Aplicants</span>';
                
                
                        }
                }else{
                    echo ' <strong class="dropdown-toggle user-name" data-toggle="dropdown">'.(isset($dataKaryawan->nama_panggilan)?$dataKaryawan->nama_panggilan:"-").'</strong> <ul class="dropdown-menu dropdown-menu-right account animated flipInY">
                        <li><a href="javascript:;" class="icon-menu Logout" ><i class="icon-power"></i>Logout</a></li>
                    </ul>   
                <span>'.(isset($dataKaryawanProjek->jenis_project)?$dataKaryawanProjek->jenis_project:"-").'</span>';
                }
             ?>
            </div>
        </div>
            
        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0 m-t-30">
            <div class="tab-pane animated fadeIn active" id="hr_menu">
                <nav class="sidebar-nav">
                    
                        <?php echo $this->menu->dynamicMenu(); ?>
                        
                </nav>
            </div>            
        </div>          
    </div>
</div>
               
                