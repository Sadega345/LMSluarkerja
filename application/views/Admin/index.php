<!doctype html>
<html lang="en">
    <!--- HEAD -->
    <?php $this->load->view('template/head'); ?>
    <!--- CLOSE HEAD -->
        <body class="theme-blue">
            <div id="wrapper">
                <!--- HEADER -->
                <?php $this->load->view('template/header'); ?>
                <!--- CLOSE HEADER -->
                <!--- SIDE MENU -->
                <?php $this->load->view('template/menu-sidebar-hr'); ?>
                <!--- CLOSE SIDE MENU -->
                <!--- FOOTER -->
		        <?php $this->load->view('template/footer') ?>
		        <!--- CLOSE FOOTER -->
                <!--- CONTENT -->
                <div id="main-content">
                    <div class="container-fluid">
                        <?php $this->load->view($content); ?>
                    </div>
                </div>
                <!--- CLOSE CONTENT -->
            </div>
        
        </body>
</html>
