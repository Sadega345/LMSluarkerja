<nav class="navbar navbar-fixed-top " >
        <div class="container-fluid " >
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>

            <div class="navbar-brand">
                <img src="<?php echo base_url()?>assets/images/iconnata.png" width="100%" alt="Lucid Logo" class="img-responsive logo">
            </div>
            
            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <!-- <input value="" class="form-control" placeholder="Search here..." type="text">
                    <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button> -->
                    <p class="m-t-5" style="color: #073b6d;font-size: 18px">Kampus NATA</p>
                </form>               
                
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">  

                        <li class="dropdown">
                            <!-- <a href="javascript:void(0);" class="dropdown-toggle icon-menu d-block d-sm-none d-md-none" data-toggle="dropdown"><i class="icon-equalizer"></i></a> -->
                            <ul class="dropdown-menu user-menu menu-icon animated bounceIn">
                                <!-- <li><a href="javascript:void(0);"><i class="icon-bubbles"></i> <span>Chat</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-envelope"></i> <span>Messsage</span></a></li> -->
                                <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li>
                                <li><a href="<?php echo base_url() ?>home/prosesLogout" onClick='return confirm("Anda yakin ingin Keluar? ")'><i class="icon-logout"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>

                        <!-- <li><a href="#" class="icon-menu d-none d-sm-block"><i class="icon-bubbles just-color-blue"></i></a></li>
                        <li><a href="#" class="icon-menu d-none d-sm-block"><i class="icon-envelope just-color-blue"></i><span class=""></span></a></li> -->
                       <!--  <li><a href="#" class="icon-menu "><i class="icon-bell just-color-blue"></i><span class=""></span></a></li> -->
                        <li><a href="javascript:;" class="icon-menu Logout" ><i class="icon-login " style="color: #2cb98a"></i></a></li>       
                    </ul>
                </div>
            </div>
        </div>
</nav>
   