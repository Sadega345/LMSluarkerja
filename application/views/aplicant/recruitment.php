            <?php
            setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
            ?>
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <p class="fz-36">On Board / Open Recruitment</p>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card angka3">
                        <div class="p-15 ">
                            <!-- <h6 class="tittle-box">Lowongan Pekerjaan</h6> -->
                            <h5 class="fz-aktivitasabsensi">Lowongan Pekerjaan</h5>
                            <p class="abu">Kami,tim recrutment PT.Growinc membutuhkan segera tenaga ahli untuk mengisi <br> beberapa posisi di perusahaan kami.</p>
                        </div>
                        <form method="post" action="<?php echo base_url()?>aplicant/recruitment">
                            <div class="row">
                                
                                <div class="col-md-3 col-12" >
                                    <select name="id_loker" class="form-control fcheight select2me" data-placeholder="Pilih Kebijakan" tabindex="2" >
                                            <option value="">Semua Pekerjaan</option>
                                    <?php
                                        foreach($datapekerjaan->result() as $dt){ ?>
                                            <option value="<?php echo $dt->id_master_jenis_project;?>" <?php echo $this->input->post('id_loker')==$dt->id_master_jenis_project?'selected':'';  ?>><?php echo $dt->jenis_project;?></option>
                                    <?php
                                        }
                                    ?>  
                                    </select>
                                </div>
                                <!-- <div class="col-4" >
                                    <select name="id_lokasi" class="form-control  select2me" data-placeholder="Pilih Lokasi" tabindex="2" >
                                            <option value="">Semua Lokasi</option>
                                    <?php
                                        foreach($datalokasi->result() as $dt){ ?>
                                            <option value="<?php echo $dt->id_lokasi_kantor;?>" <?php echo $this->input->post('id_lokasi')==$dt->id_lokasi_kantor?'selected':'';  ?>><?php echo $dt->desKabupaten;?></option>
                                    <?php
                                        }
                                    ?>  
                                    </select>
                                </div> -->
                                <div class="col-md-3 col-12" >
                                    <button type="submit" class="btn Rectangle-cari col-md-12 fcheight">
                                        <i class="fa fa-search padd-right-5 putih" ></i>
                                       Cari
                                    </button>
                                   <!-- <button type="submit" class="btn Rectangle-cari">Cari</button> -->
                                </div>
                                <div class="col-1" >
                                    &nbsp;
                                </div>
                            </div>
                        </form>

                        <div class="row m-t-30 angka3">
                            <div class="col-md-6 col-12">
                                <label class="fz-36-aplicant">Posisi yang tersedia</label>
                            </div>
                        </div>

                        <div class="row angka3">
                            <?php foreach ($dataloker->result() as $dataLoker ) { ?>
                                <?php 
                                    $start_date = new DateTime($dataLoker->tanggal_selesai);
                                    $end_date = new DateTime(date('Y-m-d'));
                                    $interval = $start_date->diff($end_date);
                                    $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
                                    $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
                                    $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
                                    //echo $interval->format('%r%a'); // hasil : 217 hari

                                    $id_pelamar=$this->session->userdata('id_pelamar');
                                    $datalokerpelamar= $this->My_model->dataLokerPelamar($id_pelamar,$dataLoker->id_loker)->row();
                                    $datalokerpelamarrows= $this->My_model->dataLokerPelamar($id_pelamar,$dataLoker->id_loker)->num_rows();

                                    
                                 ?>
                                <div class="col-lg-4">
                                    <div class="card2">
                                        <div class="card-body">
                                             <div class="row">
                                                <div class="col-md-7" align="center">
                                                    
                                                </div>
                                                <div class="col-md-5" >
                                                    <?php 
                                                        if($datalokerpelamarrows>0){
                                                            if($datalokerpelamar->id_loker==$dataLoker->id_loker){
                                                           
                                                                if($datalokerpelamar->status_lamar==0){
                                                                    echo '<label class="btn  Rectangle-probation">proses</label>';    
                                                                }else if($datalokerpelamar->status_lamar==1){
                                                                    echo '<label class="btn  Rectangle-resign">ditolak</label>';    
                                                                }else if($datalokerpelamar->status_lamar==2){
                                                                    echo '<label class="btn Rectangle-permanent">Diterima</label>';   
                                                                }
                                                                
                                                            }else{
                                                                echo '<label class="m-t-30"></label>';
                                                            }
                                                        }else{
                                                                echo '<label class="m-t-30"></label>';
                                                            }
                                                    ?>
                                                   
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <div class="col-lg-12" align="center">
                                                    <img src="<?php echo base_url() ?>assets/img/recruitment/<?php echo $dataLoker->imageJabatan ?>" alt="" height="100px">
                                                </div> -->
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-lg-12">
                                                    <a href="javascript:void(0);" onclick="viewlamaran('<?php echo $dataLoker->id_loker ?>')">
                                                        <label class="fz-18 biru" style="cursor: pointer;"><?php echo $dataLoker->jenis_project ?></label>
                                                    </a>
                                                     
                                                     <?php //echo $dataLoker->desKabupaten ?>
                                                   
                                                    <span>
                                                        <p class="fz-12"><?php echo strftime("%d %B ",strtotime($dataLoker->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($dataLoker->tanggal_selesai)); ?>
                                                        </p>
                                                    </span>

                                                    <?php if($interval->format('%r%a') > 0 && $dataLoker->status=='0' ) { 
                                                        echo'<label class="btn Rectangle-resign">Expired</label>';
                                                    }elseif($interval->format('%r%a') > 0 && $dataLoker->status=='1'){
                                                        echo'<label class="btn Rectangle-resign">Expired</label>';
                                                    }elseif($interval->format('%r%a') <= 0 && $dataLoker->status=='0'){
                                                        echo'<label class="btn Rectangle-permanent">Open</label>';
                                                    }elseif($interval->format('%r%a') <= 0 && $dataLoker->status=='1'){
                                                        echo'<label class="btn Rectangle-resign">Close</label>';
                                                    }?>
                                                    <!-- <a href="javascript:void(0);" onclick="viewlamaran('<?php //echo $dataLoker->id_loker ?>')"><button class="btn btn-blue col-12">Selengkapnya</button></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- End Card -->
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
                                        <button type="button" class="btn Rectangle-cari col-4" data-dismiss="modal">Kembali</button>
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

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#view').modal({backdrop: 'static', keyboard: false});
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
                            //$('#status_lamar').html(response.dataLokerPelamar.status_lamar);
                            $('#jobdesc').html(response.dataLoker.jobdesc);
                            if(response.dataLoker.imageJabatan!=''){
                                 $('#img').attr('src','<?php echo base_url() ?>assets/img/recruitment/'+response.dataLoker.imageJabatan); 
                             }else{
                                  $('#img').attr('src','<?php echo base_url() ?>assets/foto/not.png'); 
                             };
                            
                             if(response.dataLokerPelamarrow > 0 || response.interval > 0 || response.dataLokerstatusrows ==0 || response.dataLokerDiterima>0 || response.dataLokerProses>0){ 
                                $("#btnlamar").hide();
                             }else{
                                $("#btnlamar").show();
                             }

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }


                    });

                   
                }
            </script>

            