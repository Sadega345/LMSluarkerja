<!doctype html>
<html lang="en">
<?php $this->load->view('template/head.php') ?>
<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
?>
<body class="theme-orange" >
    <div class="container">
        <div class="row m-t-30">
            <div class="col-lg-12 col-md-12">
                <div class="card ">
                    <div class="row m-t-30 angka2">
                        <div class="col-md-3 col-2" align="center">
                            <img src="<?php echo base_url() ?>assets/img/penatalogo.png" width="50%">
                        </div>
                        <div class="col-md-6 col-6 angka3">
                            <label class="fz-48-tebal">Mari bekerja bersama</label>
                        <p class="fz-16-aplicant">Kami,tim recrutment PT.Growinc membutuhkan segera tenaga ahli untuk mengisi  beberapa posisi di perusahaan kami.</p>
                        </div>
                        <div class="col-md-3 col-4 " align="center">
                            <!-- <a href="<?php echo base_url() ?>home"><button type="button" class="btn Rectangle-cari col-8">Kembali</button></a> -->
                            <a href="<?php echo base_url() ?>home" >

                                <p class="fz-14 biru"><i class="fa fa-chevron-left biru"></i> &nbsp;Kembali ke Beranda</p>
                            </a>
                        </div>
                    </div>
                    
                    <div class="row m-t-30 angka3">
                        <div class="col-md-6 col-12">
                            <label class="fz-36-aplicant">Posisi yang tersedia</label>
                        </div>
                    </div>
                    <div class="row angka3">
            
                        <?php foreach ($dataloker->result() as $dataLoker) { ?>
                        <?php 
                            $start_date = new DateTime($dataLoker->tanggal_selesai);
                            $end_date = new DateTime(date('Y-m-d'));
                            $interval = $start_date->diff($end_date);
                            $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
                            $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
                            $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
                           // echo $interval->format('%r%a');
                        ?>
                            <div class="col-md-3">
                                <div class="card2"> 
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                
                                                <?php if($interval->format('%r%a')>=0){ ?>
                                                    <label class="btn  Rectangle-expired mb-5" style="float: right">Expired</label>
                                                    <div class="m-t-80">
                                                        <label class="fz-18 biru" style="cursor: pointer;"><?php echo $dataLoker->jenis_project ?></label>
                                                        <span>
                                                            <p class="fz-12"><?php echo $dataLoker->desKabupaten ?> <?php echo strftime("%d %B ",strtotime($dataLoker->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($dataLoker->tanggal_selesai)); ?></p>
                                                        </span>
                                                    </div>
                                                    <!-- echo '<label class="btn  Rectangle-expired mb-5" style="float: right">Expired</label>';
                                                    // echo '<img src="'.base_url().'assets/img/recruitment/'.($dataLoker->imageJabatan!=""?$dataLoker->imageJabatan:"user.png").'" alt="" height="100px">';
                                                    
                                                    echo "<label class='fz-18'>$dataLoker->jenis_project</label>";
                                                    echo '<span>
                                                            <p class="fz-12">'.$dataLoker->desKabupaten.
                                                                strftime("%d %B ",strtotime($dataLoker->tanggal_mulai)) .'-'.strftime(" %d %B %Y",strtotime($dataLoker->tanggal_selesai)).'</p>
                                                        </span>'; -->

                                                 <?php   } 
                                                ?>
                                            </div>
                                        </div>
                                        
                                            
                                        <?php if($interval->format('%r%a')<=0){ ?>
                                        <div class="m-t-80">
                                            <a href="javascript:void(0);" onclick="viewlamaran('<?php echo $dataLoker->id_loker ?>')" ><label class="fz-18 biru" style="cursor: pointer;"><?php echo $dataLoker->jenis_project ?></label></a>
                                            <span>
                                                <p class="fz-12"><?php echo $dataLoker->desKabupaten ?> <?php echo strftime("%d %B ",strtotime($dataLoker->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($dataLoker->tanggal_selesai)); ?></p>
                                            </span>
                                        </div>
                                        <?php } ?>
                                        
                                                
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    
                    </div>
                </div>
            </div> 
        </div>


    </div>  

    <div class="modal fade bd-example-modal-lg" id="view" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-3 col-2" align="center">
                            </div>
                            <div class="col-md-6 col-6" align="center">
                                <img  src="<?php //echo base_url() ?>assets/images/growinc.png" alt="" height="50px">
                            </div> -->
                            <div class="col-md-12 col-12 m-t-10" align="right">
                                <!-- <button type="button" class="btn Rectangle-cari " data-dismiss="modal">Kembali</button> -->
                                <form action="<?php echo base_url()?>Home/halamanlamaran" method="post">
                                    <input type="hidden" name="id_loker" id="id_loker" >
                                    <button class="btn Rectangle-cari" type="submit">Buat Lamaran
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="row m-t-30">
                            <div class="col-lg-12" align="center">
                                <img id="img" src="<?php //echo base_url() ?>assets/foto/onboard/driverb1.png" alt="" height="50px">
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#">
                                    <label id="nama_posisi" class="fz-36"></label>
                                </a>
                                <br>
                                <span>
                                    <span id="nama_lokasi"></span>
                                    <span id="tanggal_mulai" class="fz-12"></span> - <span id="tanggal_selesai" class="fz-12"></span>
                                </span>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <label class="fz-18">Requirement</label> 
                                <p id="requirement" class="fz-16-tebal"></p>
                            </div> 
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <label class="fz-18">Jobdesc</label>
                                <p id="jobdesc" class="fz-16-tebal"></p>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
              

            </div>
        </div>
    </div>

    
</body>

<?php $this->load->view('template/footer.php') ?>
<script type="text/javascript">
    $(document).ready(function(){
        // $('#view').modal({backdrop: 'static', keyboard: false});
    });
    function viewlamaran(id){
          $.ajax({
            url: "<?php echo base_url();?>Employee/viewLamaran",
            type: "post",
            data: {id:id} ,
            dataType:'json',
            success: function (response) {
               // alert(response.nama_lengkap);
                $('#view').modal('show');  
                 $('#id_loker').val(response.dataLoker.id_loker); 
                $('#nama_posisi').html(response.dataLoker.jenis_project); 
                $('#nama_lokasi').html(response.dataLoker.desKabupaten);
                $('#tanggal_mulai').html(response.dataLoker.tanggal_mulai);
                $('#tanggal_selesai').html(response.dataLoker.tanggal_selesai);
                $('#requirement').html(response.dataLoker.requirement);
                $('#jobdesc').html(response.dataLoker.jobdesc);
                if(response.dataLoker.imageJabatan!=''){
                     $('#img').attr('src','<?php echo base_url() ?>assets/img/recruitment/'+response.dataLoker.imageJabatan); 
                 }else{
                      $('#img').attr('src','<?php echo base_url() ?>assets/foto/user.png'); 
                 }; 

            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }


        });

       
    }
</script>
</html>
