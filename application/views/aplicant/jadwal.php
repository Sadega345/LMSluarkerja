            <?php
            setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
            ?>
            <div class="block-header">
                <div class="row">
                    <!-- <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> On Board / Jadwal Test & Interview</h6>
                    </div> -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <p class="fz-36">On Board / Jadwal Test & Interview</p>
                    </div>
                </div>
            </div>

            <div class="row angka3">
                <?php foreach ($datalokerpelamarall->result() as $datalokerpelamar) { ?>
                    <div class="col-lg-4">
                        <div class="card2">
                            <div class="card-body">
                                <!-- <div class="row">
                                    <div class="col-lg-12" align="center">
                                        <img src="<?php //echo base_url() ?>assets/img/recruitment/<?php //echo $datalokerpelamar->imageJabatan ?>" alt="" height="100px">
                                    </div>
                                </div> -->
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <a href="javascript:void(0);" >
                                            <label class="fz-18"><?php echo  $datalokerpelamar->desJabatan; ?></label>
                                        </a>
                                        <label class="fz-18">
                                            <?php echo  $datalokerpelamar->jenis_project; ?> 
                                        </label>
                                        <span>
                                            <p class="fz-12">
                                                <?php echo strftime("%d %B ",strtotime($datalokerpelamar->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($datalokerpelamar->tanggal_selesai)); ?>
                                                    
                                            </p>
                                        </span>
                                    </div>
                                </div>
                                <?php 
                                    if($datalokerpelamar->status_lamar=='0'){
                                        echo'<div class="row btn Rectangle-probation col-md-12">
                                        <div class="col-lg-12" align="center" >
                                            <i class="icon-info" style="color: orange"></i><br>
                                            <label style="color: orange">Pelamaran anda sedang kami proses...</label>
                                        </div>
                                    </div>';
                                    }else if($datalokerpelamar->status_lamar=='1'){
                                         echo'<div class="row btn Rectangle-resign col-md-12">
                                        <div class="col-lg-12" align="center">
                                            <i class="icon-info" style="color: red"></i><br>
                                            <label style="color: red">Maaf kami belum bisa menerima anda</label>
                                        </div>
                                    </div>';
                                    }else if($datalokerpelamar->status_lamar=='2'){ 
                                        echo '<div class="row btn Rectangle-permanent col-md-12">
                                            <div class="col-lg-12" align="center" >
                                                <i class="icon-info" style="color: green"></i><br>
                                                <label style="color: green">Selamat anda diterima <br> Ikuti Test Berikut.</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12" align="center">
                                                <table  class="dataTable " style="width: 100%">
                                                    <thead class="thead-dark" style=" background-image: linear-gradient(to right, #003399, #6699ff );color: #fff">
                                                        <tr align="center">
                                                            <th>Tanggal</th>
                                                            <th>Jenis Test &interview</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                        foreach ($datajadwallokerpelamar->result() as $dataJadwalLokerPelamar) { 
                                                            echo '<tr>
                                                                <td>'.strftime("%d %B ",strtotime($dataJadwalLokerPelamar->tanggal)).'</td>
                                                                <td>'.$dataJadwalLokerPelamar->jenis.'</td>    
                                                            </tr>';
                                                        } 
                                                        
                                                    echo'</tbody>
                                                </table>
                                            </div>
                                        </div>';
                                    } ?> 
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            