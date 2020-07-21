<div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="<?php echo base_url()?>assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <strong class="user-name">Fikhri Syamnurdin</strong>    
                    <span>UI Designer</span>
                </div>
                <hr>
            </div>
                
            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane animated fadeIn active" id="hr_menu">
                    <nav class="sidebar-nav">
                        <!-- <ul class="main-menu metismenu">
                            <li><a href="<?php echo base_url();?>HR"><i class="icon-home"></i><span>HR Dashboard</span></a></li>
                            <li><a href="<?php echo base_url();?>HR/onBoarding"><i class="fa fa-user-plus"></i>On Boarding</a></li>
                            <li><a href="<?php echo base_url();?>HR/offBoarding"><i class="icon-user"></i>Off Boarding</a></li>
                            <li>
                                <a href="#" class="has-arrow"><i class="icon-speedometer"></i><span>Attendance</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>HR/attendanceActivity">Attendance Activity</a></li>
                                    <li><a href="<?php echo base_url();?>HR/leaveRequest">Leave Requests</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow"><i class="icon-credit-card"></i><span>Finance</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>HR/payroll">Payroll</a></li>
                                    <li><a href="<?php echo base_url();?>HR/payrollHistory">Payroll History</a></li>
                                    <li><a href="<?php echo base_url();?>HR/claim">Claim</a></li>
                                </ul>
                            </li>
                             <li>
                                <a href="#" class="has-arrow"><i class="icon-briefcase"></i><span>Dirctory</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url();?>HR/employeeInformation">Employee Information</a></li>
                                    <li><a href="<?php echo base_url();?>HR/departement">Departement</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow"><i class="fa fa-university"></i><span>Company</span></a>
                                <ul>
                                    <li><a href="<?php echo base_url()?>HR/organizationStructure">Organization Structure</a></li>
                                    <li><a href="<?php echo base_url()?>HR/policies">Policies</a></li>
                                    <li><a href="<?php echo base_url()?>HR/announcement">Announcement</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>HR/settings"><i class="icon-settings"></i>Settings</a></li>
                        </ul> -->
                        <?php echo $this->menu->dynamicMenu(); ?>
                        
                    </nav>
                </div>
            </div>          
        </div>
    </div>