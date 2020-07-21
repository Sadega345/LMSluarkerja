
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu">Dashboard</h6>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <?php foreach ($dataPengumumansatu->result() as $dst){ ?>
    			    <div class="col-md-2 col-5">
    			        <div class="Rectangle20 ">
    			             <img src="<?php echo base_url() ?>assets/img/pengumuman_.svg"><span><label class="angka2">pengumuman</label></span>
    			        </div>
    			    </div>
    			    <div class="col-md-10 col-7" >
    			        <div class="row">
    			            <label class="color1"><?php echo $dst->judul ?></label>
    			        </div>
    			        <div class="row ">
    			            <label class="color2"><?php echo strftime(" %d %B %Y",strtotime($dst->tanggal_mulai)); ?></label>
    			        </div>
    			    </div>
                <?php } ?>
			</div>
            

            <div class="row">
                <div class="col-md-12">
                	<!-- Absen -->
                    <div class="card ">
                    	<div class="background">
                    		<div class="card-body ">
                    			<div class="p-31 ">
                                	<div class="row">
	                                    <div class="col-md-4" >
	                                        <label class="fz-24 mt-5 barlow-bold">Selamat Datang!</label> 
	                                        <br>  
	                                        <label class="fz-18-nama"><?php echo $this->session->userdata('nama_lengkap') ?></label>  
	                                        <!-- sign in -->
	                                        <?php if ($dataAbsensiMasuk > 0) { ?>
                                                <p class="fz-16 hitamsemu">Sign In Hari ini <b><?php echo $dataAbsensi->tanggal_mulai ?></b></p>
                                                <p class="fz-16 hitamsemu">Sign Out Hari ini <b><?php echo $dataAbsensi->tanggal_selesai ?></b></p>
                                            <?php } ?>
                                            <!-- Total bekerja -->
                                            <?php if ($dataAbsensiMasuk > 0) { ?>
	                                             <?php 
	                                                $then = "2009-02-04";
	         
	                                                //Convert it into a timestamp.
	                                                $then = strtotime($dataAbsensi->tanggal_mulai);
	                                                 
	                                                //Get the current timestamp.
	                                                $now = strtotime($dataAbsensi->tanggal_selesai);
	                                                 
	                                                //Calculate the difference.
	                                                $difference = $now - $then;

	                                                $datetime1 = new DateTime($dataAbsensi->tanggal_mulai);
	                                                $datetime2 = new DateTime($dataAbsensi->tanggal_selesai);
	                                                $interval = $datetime1->diff($datetime2);
	                                                $h = sprintf('%02d', $interval->format(' %h'));
	                                                $m = sprintf('%02d', $interval->format(' %i'));
	                                                $s = sprintf('%02d', $interval->format(' %s'));
	                                               	$hour = $h > 0?' Jam':'';
	                                               	$minute = $m > 0?' Menit':'';
	                                               ?>
	                                                <!-- <h3 class=" text-center"><?php //echo $h.':'.$m.':'.$s.' '; ?></h3> -->
	                                                <p class="fz-16 hitamsemu">Total Waktu Bekerja Hari ini <b><?php echo $h.' '.$hour.': '.$m.' '.$minute.' ' ?></b> </p> 
	                                        <?php } ?>
	                                    </div>

	                                    <div class="col-md-6">
	                                        <div class="row">
	                                            <!-- <div class="col-md-10">
	                                                 <?php //if ($dataAbsensiMasuk > 0) { ?>
	                                                    <h6 class="text-center">Sign In Hari ini <?php //echo $dataAbsensi->tanggal_mulai ?> Am</h6>
	                                                <?php //} ?>
	                                            </div> -->
	                                            <div class="col-10">
	                                                <div class="row clearfix m-t-10">
	                                                    <div class="col-md-12 text-center mt-5">
	                                                        <h3 class="Timer fz-36" id="timerValue"><?php echo date('H:i:s'); ?></h3>    
	                                                    </div>
	                                                </div>
	                                                
	                                                <div class="row">
	                                                    <div class="col-md-4">
	                                                             
	                                                    </div>
	                                                    <div class="col-md-4">
	                                                        <button type="button" class="btn-blue" onclick="signout('signout')" id="signout">Sign Out</button>
	                                                    </div>
	                                                </div> 
	                                                <div class="row">
	                                                    <div class="col-md-4">
	                                                            
	                                                    </div>
	                                                    <div class="col-md-4">
	                                                        <button type="button" class="btn-black mt-2" id="signin" onclick="absen('signin')">Sign In</button>
	                                                    </div>
	                                                </div>

	                                                  <!--   <div class="col-6">
	                                                        <button type="button" class="btn-blue" id="lunch" onclick="lunch('lunch')">Out for lunch</button>
	                                                    </div> -->
	                                                    <!-- <div class="row clearfix">
	                                                        <div class="col-12">
	                                                            <button type="button" class="btn-black mt-2" id="break" onclick="lunch('break')">Out for break</button>
	                                                        </div>
	                                                        <div class="col-12">
	                                                            <button type="button" class="btn-black mt-2" id="extrabreak" onclick="lunch('extrabreak')">Out for extra break</button>
	                                                        </div>
	                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-4"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                        
                    </div>
                </div>
            <div class="row clearfix">
                        <div class="col-md-12" id="berita">
                        <div class="card  ">
                            <div class="p-20cust ">
                                <div class="row angka3">
                                    <div class="col-md-8">
                                        <?php $no=0; foreach ($dataCuti->result() as $dt) { $no=$no+$dt->jumlah_hari;?>
                                        <?php } ?>
                                        <h6 class="fz-18">Sisa Cuti [ <?php echo $no; ?> Hari ]</h6>        
                                    </div>
                                </div>
                                <?php if ($dataCuti->num_rows() > 0){ ?>
                                    
                                <div class="body">
                                    <?php  foreach ($dataCuti->result() as $dt) { ?>
                                            <div class="row">
                                                <label class="fz-16 abu"><?php echo $dt->deskripsi; ?> : <?php echo $dt->jumlah_hari; ?> Hari</label>
                                            </div>
                                    <?php } ?>
                                </div>
                            <?php }else{ ?>
                                    <div class="body">
                                        <div class="row">
                                            
                                            <div class="col-sm-12 col-md-12">
                                                <img src="<?php echo base_url() ?>assets/img/Nofile.svg" height="50px">
                                                <label class="color2"> 
                                                    Belum Punya Cuti
                                                </label> 
                                            </div>
                                            
                                        </div>    
                                   </div>
                                <?php } ?>
                            </div>
                        </div>
                        </div>
                    </div>

             <!-- Permohonan Cuti -->
            <?php if ($dataAtasan->num_rows()>0){ ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    
                    <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Daftar Permintaan Approval Cuti</h5>
                               </div>
                            </div>
                            <div class="table-responsive">
                                
                                <table class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Kategori Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Durasi </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataAtasaCutiApproval->result() as $permohonan){ ?>
                                            <?php  
                                                //Convert it into a timestamp.
                                                $then = strtotime($permohonan->tanggal);
                                                 
                                                //Get the current timestamp.
                                                $now = strtotime($permohonan->sampe_tanggal);
                                                 
                                                //Calculate the difference.
                                                $difference = $now - $then;
                                                 
                                                //Convert seconds into days.
                                                $days = floor($difference / (60*60*24) );
                                                $tmpdur = $days+1; 
                                            ?>
                                        
                                        <tr>
                                            <td><?php echo $permohonan->nama_lengkap ?></td>
                                            <td><?php echo $permohonan->desLeave ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($permohonan->tanggal)) ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($permohonan->sampe_tanggal)) ?></td>
                                            <td><?php echo $tmpdur; ?> hari</td>
                                            <td>
                                                <?php 
                                                    if($permohonan->status==0){
                                                        echo '<label class="btn Rectangle-menunggu">Menunggu</label>';
                                                    }else if($permohonan->status==1){
                                                        echo '<label class="btn Rectangle-diterima">Diterima</label>';
                                                    }else if($permohonan->status==2){
                                                        echo '<label class="btn Rectangle-ditolak">Ditolak</label>';
                                                    }
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-aksi" onclick="viewpermohonan('<?php echo $permohonan->id_absensi_leave ?>')"><img src="<?php   echo base_url() ?>assets/img/View.svg" class="padd-right-5"> Lihat</a>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
                
            <!-- Report Overtime -->
            <?php if ($dataAtasan->num_rows()>0){ ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    <div class="msg" style="display:none;">
                    
                    </div>
                     <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Report Overtime</h5>
                               </div>
                            </div>
                            <div class="table-responsive">
                                
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                <!-- <table id="list-data-klaim"  class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%"> -->
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Keterangan</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataOvertime->result() as $overtime ) { ?>
                                            
                                        <tr>
                                            <td><?php echo $overtime->nama_lengkap ?></td>
                                            <td> <?php echo $overtime->keterangan ?></td>
                                            <td><?php echo strftime("%d %B %Y",strtotime($overtime->tanggal)); ?></td>
                                            <td>
                                                <?php 
                                                    if($overtime->status=='0'){
                                                        echo'<label class="btn Rectangle-probation">Pengajuan</label>';
                                                    }if ($overtime->status=='1') {
                                                        echo'<label class="btn Rectangle-permanent">Diterima</label>';
                                                    }if ($overtime->status=='2') {
                                                        echo'<label class="btn Rectangle-resign">Ditolak</label>';
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    
                                                    echo '<a href="javascript:;" onclick="view(\''.$overtime->id_overtime.'\')">
                                                    <button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button>
                                                    </a>';
                                                    
                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!--  else{ ?> 
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 ">
                    <div class="msg" style="display:none;">
                    
                    </div>
                     <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Pengajuan Overtime</h5>
                               </div>
                            </div>
                            <div class="table-responsive">
                                
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Keterangan</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?//php foreach ($dataOvertimeSendiri->result() as $overtime ) //{ ?>
                                            
                                        <tr>
                                            <td><?php// echo $overtime->nama_lengkap ?></td>
                                            <td> <?php// echo $overtime->keterangan ?></td>
                                            <td><?php //echo strftime("%d %B %Y",strtotime($overtime->tanggal)); ?></td>
                                            <td>
                                                <?php 
                                                   // if($overtime->status=='0'){
                                                    //     echo'<label class="btn Rectangle-probation">Pengajuan</label>';
                                                    // }if ($overtime->status=='1') {
                                                    //     echo'<label class="btn Rectangle-permanent">Diterima</label>';
                                                    // }if ($overtime->status=='2') {
                                                    //     echo'<label class="btn Rectangle-resign">Ditolak</label>';
                                                    // }
                                                    
                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <?php //} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php// } ?> -->
            
            <div class="row">
                <!-- Calender -->
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- End Calender -->
            </div>   
               
            

            <div id="viewberita">

           

            <div class="row clearfix">
            	<!-- Task Baru -->
                <div class="col-md-12">
                    
                    <div class="row clearfix">
                        <div class="col-md-12" id="berita">
                        <div class="card  ">
                            <div class="p-20cust ">
                                <div class="row angka3">
                                    <div class="col-md-8">
                                        <h6 class="fz-18">Task</h6>        
                                    </div>
                                </div>
                                <?php if ($dataTask->num_rows() > 0){ ?>
                                	
                                
                                <?php foreach ($dataTask->result() as $dt) { ?>
                                    
                                        <div class="body">
                                            <div class="row">
                                                
                                                <div class="col-sm-12 col-md-12">
                                                    <label class="fz-16-tebal"><?php echo $dt->task; ?></label>
                                                    <span>
                                                        <p>
                                                        	<?php echo strftime(" %d %B %Y",strtotime($dt->tanggal_mulai)); ?> - <?php echo strftime(" %d %B %Y",strtotime($dt->tanggal_selesai)); ?>
                                                        </p>
                                                    </span>
                                                </div>
                                                
                                            </div>    
                                       </div>
                                    
                                <?php }}else{ ?>
                                	<div class="body">
                                        <div class="row">
                                            
	                                        <div class="col-sm-12 col-md-12">
	                                            <img src="<?php echo base_url() ?>assets/img/Nofile.svg" height="50px">
				                                <label class="color2"> 
				                                    Belum Punya Task
				                                </label> 
	                                        </div>
                                            
                                        </div>    
                                   </div>
                                <?php } ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
                <!-- End Task Baru -->

                <!-- Berita -->
                <div class="col-md-12">
                    
                    <div class="row clearfix">
                        <div class="col-md-12" id="berita">
                        <div class="card  ">
                            <div class="p-20cust ">
                                <div class="row angka3">
                                    <div class="col-md-8">
                                        <h6 class="fz-18">Berita Terbaru</h6>        
                                    </div>
                                    <div class="col-md-4" align="right">
                                        

                                        <a href="<?php echo base_url() ?>Employee/berita/">
						                    <label class="color1 biru">Berita lainnya &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-long-arrow-right biru"></i> </label>  
						                </a>
                                              
                                    </div>
                                </div>
                                <?php if ($dataBerita->num_rows() > 0){ ?>
                                	
                                
                                <?php foreach ($dataBerita->result() as $dataBerita) { ?>
                                    
                                        <div class="body">
                                            <div class="row">
                                                <div class="col-sm-2 col-md-4">
                                                    <img src="<?php echo base_url() ?>assets/img/berita/<?php echo $dataBerita->image!=''?$dataBerita->image:'noimage.png' ?>" class="img-responsive" width="100%" />
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <label class="fz-16-tebal"><?php echo $dataBerita->judul; ?></label>
                                                    <p class="fz-14 hitamsemu"><?php echo $dataBerita->location; ?>,<?php echo strftime(" %d %B %Y",strtotime($dataBerita->tanggal)); ?></p>
                                                    <p class="fz-14 hitamsemu">
                                                    	<?php echo substr($dataBerita->deskripsi,0,180); ?>...</p>
                                                    <span>
                                                        <form action="<?php echo base_url() ?>Employee/viewBerita" method="post">
                                                            <input type="hidden" name="id"  value="<?php echo $dataBerita->id_berita ?>">
                                                            
                                                            <button class="btn btn-aksi selengkapnya" type="button" data-id="<?php echo $dataBerita->id_berita ?>">
                                                            	<img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">Selengkapnya
                                                            </button>
                                                        </form>
                                                    </span>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                   
                                                </div>
                                            </div>    
                                       </div>
                                    
                                <?php }}else{ ?>
                                	<div class="body">
                                        <div class="row">
                                            
	                                        <div class="col-sm-12 col-md-12">
	                                            <img src="<?php echo base_url() ?>assets/img/Nofile.svg" height="50px">
				                                <label class="color2"> 
				                                    Belum Ada Berita Terbaru
				                                </label> 
	                                        </div>
                                            
                                        </div>    
                                   </div>
                                <?php } ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>

                <!-- <div class="col-md-8">
                    
                    <?php// if($dataKuesioner->num_rows()>0){ ?>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="card  ">
                                <div class="p-20cust ">
                                    <div class="row angka3">
                                        <div class="col-md-8">
                                            <label class="fz-18">Kuesioner Terbaru</label>
                                        </div>
                                        <div class="col-md-4" align="right">
                                            <a href="<?php// echo base_url() ?>Employee/Kuesioner/">
							                    <label class="color1 biru">Kuesioner lainnya &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-long-arrow-right biru"></i> </label>
							                </a>
                                        </div>
                                    </div>
                                    
                                    <div class="row angka3">
                                        <div class="col-md-6 col-12">
                                            <label class="fz-14-judul">
                                            	<?php //echo $dataKuesionerRow->judul; ?>
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-12" align="right">
                                        	<?php 
                                                
                                                // $wh=array("tq.status"=>'1');
                                                // $nik=$this->session->userdata('nik');
                                                // $datakuesioner=$this->Nata_hris_employee_model->data_kuesioner($dataKuesionerRow->id_questioner,$nik,$wh);
                                                // $datakuesionerRow=$this->Nata_hris_employee_model->data_kuesioner($dataKuesionerRow->id_questioner,$nik,$wh)->row();

                                                //     if($datakuesioner->num_rows() > 0){
                                                //         if ($datakuesionerRow->jum_jawaban > 0 || $datakuesionerRow->hasil_isi > 0) {
                                                //             echo '<label class="btn Rectangle-sts-diterima col-md-6">Selesai</label>';
                                                //         }else{
                                                //             echo ' <label class="btn Rectangle-sts-proses col-md-6">Belum Selesai</label>';
                                                //         }
                                                //     }else{
                                                //         if ($datakuesioner->row()->link_google_doc == '') {
                                                //             echo ' <label class="btn Rectangle-sts-proses col-md-6">Belum Selesai</label>';
                                                //         }else{
                                                //             echo ' <label class="btn Rectangle-sts-diterima col-md-6">Selesai</label>';
                                                //         }  
                                                //     }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row angka3">
                                        
                                        <div class="col-md-6 col-12">
                                            <p class="fz-12-hari">
                                            	<?php //echo strftime("%A, %d %B %Y",strtotime($dataKuesionerRow->tanggal_mulai)); ?> - <?php //echo strftime("%A, %d %B %Y",strtotime($dataKuesionerRow->tanggal_selesai)); ?>
                                            </p>
                                        </div>

                                        <div class="col-md-6 col-12" align="right">
                                        	<?php 
                                                // if($datakuesioner->num_rows() > 0){
                                                //     if ($datakuesionerRow->link_google_doc == '' && $datakuesionerRow->jum_jawaban == 0) {
                                                //         echo '<form action="'.base_url().'/Employee/isiKuesioner" method="post"> 
                                                //             <input type="hidden" name="id" value="'.$datakuesionerRow->id_questioner.'">
                                                //             <button type="submit" class="btn Rectangle-cari col-md-6">Isi</button>
                                                //             </form>';
                                                //     }if($datakuesionerRow->jum_jawaban > 0){
                                                //         echo '<form action="'.base_url().'/Employee/viewKuesioner" method="post"> 
                                                    
                                                //      <input type="hidden" name="id" value="'.$datakuesionerRow->id_questioner.'">
                                                     

	                                               //       <button class="btn btn-aksi" type="submit">
	                                               //      	<img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">Lihat
	                                               //      </button>
                                                //      </form>';

                                                //     }
                                                // }
                                            ?>
	                                        
                                        </div>
                                    </div>
                                    
                                    <div class="row angka3">
                                        
                                        <div class="col-md-6 col-12">
                                        	<?php// if ($dataKuesionerRow->link_google_doc == ""){ ?>

	                                            <div class="col-md-6 col-12">
	                                            	<p class="fz-14">-</p>
	                                            </div>
	                                        <?php// } else{ ?>
	                                            <?php //if ($dataKuesionerRow->hasil_isi == 0){ ?>
	                                                
	                                            
	                                                <div class="col-md-6 col-12">
	                                                    <a href="javascript:;" data-id="<?php// echo $dataKuesionerRow->id_questioner ?>" data-link="<?php //echo $dataKuesionerRow->link_google_doc ?>" title="Isi" class="isi"><?php //echo "Link"; ?></a>
	                                                </div>  
	                                        <?php //} }?>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                            </div>
                        </div>
                    <?php// } ?>
                </div> -->
                <div class="col-md-6">
                    <!-- <div class="row clearfix">
                        <div class="col-md-12" id="berita">
                        <div class="card  ">
                            <div class="p-20cust ">
                                <div class="row angka3">
                                    <div class="col-md-8">
                                       // <?php $no=0; foreach ($dataCuti->result() as $dt) { $no=$no+$dt->jumlah_hari;?>
                                        <?php } ?>
                                        <h6 class="fz-18">Sisa Cuti [ <?php //echo $no; ?> Hari ]</h6>        
                                    </div>
                                </div>
                                <?php //if ($dataCuti->num_rows() > 0){ ?>
                                    
                                <div class="body">
                                    <?php // foreach ($dataCuti->result() as $dt) { ?>
                                            <div class="row">
                                                <label class="fz-16 abu"><?php//echo $dt->deskripsi; ?> : <?php// echo $dt->jumlah_hari; ?> Hari</label>
                                            </div>
                                    <?php //} ?>
                                </div>
                            <?php// }else{ ?>
                                    <div class="body">
                                        <div class="row">
                                            
                                            <div class="col-sm-12 col-md-12">
                                                <img src="<?php// echo base_url() ?>assets/img/Nofile.svg" height="50px">
                                                <label class="color2"> 
                                                    Belum Punya Cuti
                                                </label> 
                                            </div>
                                            
                                        </div>    
                                   </div>
                                <?php //} ?>
                            </div>
                        </div>
                        </div>
                    </div> -->
                </div>

                <div class="col-md-6">

                    <!-- Pengumuman -->
                    <div class="col-md-12">
				        <div class="card">
				            <label class="angka3 mb-5 barlow-bold">Pengumuman Bulan Ini</label>
				            <?php foreach ($dataPengumuman->result() as $dt) { ?>
				                <div class="row">
				                    <div class="col-lg-1 col-md-1 col-sm-1 col-1">
				                    </div>
				                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
				                        <img src="<?php echo base_url() ?>assets/img/pengumuman_.svg">
				                    </div>
				                    <div class="col-lg-8 col-md-8 col-sm-8 col-8" style="padding-top: 5px">
				                        <div class="row">
				                            <label class="color2"><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal_mulai)); ?></label> 
				                        </div>
				                        <div class="row">
				                            <label class="color1"><?php echo $dt->judul ?></label> 
				                        </div>
				                    </div>
				                    <hr>
				                </div>
				            <?php } ?>
				            <div class="col-md-12">
				                <hr>
				            </div>
				            <div class="col-md-12 text-center">
				                <a href="<?php echo base_url() ?>Employee/pengumumanPerusahaan/">
				                    <label class="color1">Lihat berita lain &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-chevron-right"></i> </label>  
				                </a>
				            </div>
				        </div>
				    </div>

                    <!-- Task -->
                    <!-- <div class="col-md-12">
				        <div class="card">
				            <label class="angka3 mb-5">Task</label> -->
				            <?php //foreach ($dataTask->result() as $dt) { ?>
				                <!-- <div class="row"> -->
				                    <!-- <div class="col-lg-1 col-md-1 col-sm-1 col-1">
				                    </div>
				                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
				                        <img src="<?php //echo base_url() ?>assets/img/pengumuman_.svg">
				                    </div> -->
				                    <!-- <div class="col-lg-8 col-md-8 col-sm-8 col-8" style="padding-top: 5px">
				                        <div class="row">
				                            <label class="color2"><?php //echo $dt->task ?></label>
				                        </div>
				                        <div class="row">
				                            <label class="color1"><?php //echo strftime(" %d %B %Y",strtotime($dt->tanggal_mulai)); ?> - <?php //echo strftime(" %d %B %Y",strtotime($dt->tanggal_selesai)); ?></label> 
				                        </div>
				                    </div>
				                    <hr>
				                </div> -->
				            <?php //} ?>
				            <!-- <div class="col-md-12">
				                <hr>
				            </div>
				            <div class="col-md-12 text-center">
				                <a href="<?php //echo base_url() ?>Employee/pengumumanPerusahaan/">
				                    <label class="color1">Lihat berita lain &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-chevron-right"></i> </label>  
				                </a>
				            </div> -->
				        <!-- </div>
				    </div> -->

                        <!-- Remburse -->
                        <?php //if ($dataClaimRemburseRows > 0){ ?>
                        <!-- <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row clearfix">
                                <div class="card  ">
                                    <div class="p-20cust ">
                                        <h6 class="tittle-box">Reimbursement Bulan ini</h6>
                                        <div id="progress-striped progress-xs" class="progress progress-striped mb-0">
                                            <div class="progress-bar progress-bar-blue" data-transitiongoal="43" aria-valuenow="43" style="width: 43%;"></div>
                                        </div><br> -->
                                        <!-- Rp 300.000 -->
                                        <!-- <?php  
                                            /*$TotKlaim=0; 
                                            foreach ($dataClaimRemburse as $ClaimRemburse ) { 
                                                if ($ClaimRemburse->status == 1 || $ClaimRemburse->status == 3) {
                                                    $TotKlaim=$TotKlaim+$ClaimRemburse->total;
                                                }
                                            }*/
                                        ?>-->
                                        
                                        <!-- <label>Rp. <?php //echo number_format(($datakaryawan->saldo_klaim-$TotKlaim),0,'.','.') ?></label> -->

                                        <!-- <label>Rp. <?php //echo number_format(($dataClaimRemburse->total_remburse),0,'.','.') ?></label>
                                        <br>
                                        
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div> -->
                        <?php //} ?>

                    </div>
                </div>
            </div>

        </div>

    <div class="modal fade bd-example-modal-lg" id="view" >
        <div class="modal-dialog modal-lg" >
          <div class="modal-content" >
            <div class="modal-body" >
                <div id="viewovertime">
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="cuti" >
        <div class="modal-dialog modal-lg" >
          <div class="modal-content" >
            <div class="modal-body" >
                <div id="viewpermohonancuti">
                </div>
            </div>
          </div>
        </div>
    </div>
<script type="text/javascript">
    function viewpermohonan(a){
        // alert('masuk');
          $.ajax({
            url: "<?php echo base_url();?>Employee/viewpermohonanapprovalleaveRequest/"+a,
            // data: {nik:a},
            type: "post",
            // dataType:'json',
            success: function (response) {
               // alert('masuk');
                $('#cuti').modal('show');
                $('#viewpermohonancuti').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }

    function view(a){
          $.ajax({
            url: "<?php echo base_url();?>Employee/viewPermohonanOvertime/"+a,
            // data: {nik:a},
            type: "post",
            // dataType:'json',
            success: function (response) {
               // alert('masuk');
                $('#view').modal('show');
                $('#viewovertime').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
          });
    }

    function konfirmasi(){
                var konf = confirm("Anda yakin ingin membatalkan data ini? ");
                if (konf == true) {
                    $('#hapus').submit();
                }
              }

    function hapusOvertime(id){
      $.ajax({
        url: '<?php echo base_url();?>Employee/prosesHapusOvertime', //calling this function
        data:{id_overtime:id},
        type:'POST',
        cache: false,

    success: function(data) {
         alert("success");
         location.reload();
      }
    });
  }

    function ubah(a,b,c){
        var alasan=$('#alasan').val();
        $.ajax({
          url: '<?=site_url();?>Employee/ubahstscuti', //calling this function
          data:{id:a,sts:b,alasan:alasan,nik:c},
          type:'POST',
          //cache: false,

      success: function(data) {
            alert("success");
           location.reload();
        },
        error: function(data) {
            alert("error");
        }
      });
    }
</script>
<script type="text/javascript">
      $(document).ready(function(){
          $('#view').modal({backdrop: 'static', keyboard: false});
        // Any value represanting monthly repeat flag
        var REPEAT_MONTHLY = 1;
        // Any value represanting yearly repeat flag
        var REPEAT_YEARLY = 2;
     $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
           // defaultDate: ctoday,//'2018-07-12',
            // editable: true,
            // droppable:true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            eventRender: function (eventObj, $el) {
                $el.popover({
                    title: eventObj.title,
                    //content: eventObj.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });
            },
            eventLimit: true, // allow "more" link when too many events
            events: {
                url: '<?php echo base_url()."HR/jsonDataSampleUser"; ?>',
                    type: 'POST',
                    data: {
                      custom_param1: 'something',
                      custom_param2: 'somethingelse'
                    },
                    error: function() {
                      alert('there was an error while fetching events!');
                    },
                    color: 'yellow',   // a non-ajax option
                    textColor: 'black' // a non-ajax option
                   
            },
            dayRender: function( date, cell ) {
                // Get all events
                var events = $('#calendar').fullCalendar('clientEvents');
                console.log(events);
                    // Start of a day timestamp
                var dateTimestamp = date.hour(0).minutes(0);
                var recurringEvents = new Array();
                
                    // find all events with monthly repeating flag, having id, repeating at that day few months ago  
                var monthlyEvents = events.filter(function (event) {
                     
                  return event.repeat === REPEAT_MONTHLY &&
                    event.id &&
                    moment(event.start).hour(0).minutes(0).diff(dateTimestamp, 'months', true) % 1 == 0
                });
                
                // find all events with monthly repeating flag, having id, repeating at that day few years ago  
                var yearlyEvents = events.filter(function (event) {

                  return event.repeat === REPEAT_YEARLY &&
                    event.id &&
                    moment(event.start).hour(0).minutes(0).diff(dateTimestamp, 'years', true) % 1 == 0
                });


                recurringEvents = monthlyEvents.concat(yearlyEvents);

                $.each(recurringEvents, function(key, event) {
                  var timeStart = moment(event.start);

                  // Refething event fields for event rendering 
                  var eventData = {
                    id: event.id,
                    allDay: event.allDay,
                    title: event.title,
                    description: event.description,
                    start: date.hour(timeStart.hour()).minutes(timeStart.minutes()).format("YYYY-MM-DD"),
                    end: event.end ? event.end.format("YYYY-MM-DD") : "",
                    url: event.url,
                    className: 'bg_warning',
                    repeat: event.repeat
                  };
                        
                  // Removing events to avoid duplication
                  $('#calendar').fullCalendar( 'removeEvents', function (event) {
                      return eventData.id === event.id &&
                      moment(event.start).isSame(date, 'day');      
                  });
                  // Render event
                  $('#calendar').fullCalendar('renderEvent', eventData, true);

                });

              }
        });
});
</script>
    
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    var statusabsen = <?php echo $dataAbsensiMasuk; ?>;
    var loginabsen = '';
    var logoutabsen = '';
    var jamabsen = '';
    var jamlunch = '';
    var jambreak = '';
    var jamextra = '';
    <?php if ($dataAbsensiMasuk > 0) {
         $jam_sp = explode(" ", $dataAbsensi->tanggal_mulai);                           
     ?>
     logoutabsen = '<?php echo $dataAbsensi->tanggal_selesai; ?>';
     loginabsen = '<?php echo $dataAbsensi->tanggal_mulai; ?>';
     jamabsen = '<?php echo date('H:i:s') //$jam_sp[1] ?>';
     jamlunch = '<?php echo $dataAbsensi->setelah_lunch ?>';
     jambreak = '<?php echo $dataAbsensi->setelah_break ?>';
     jamextra = '<?php echo $dataAbsensi->setelah_extra_break ?>';
    
     //alert(jamabsen);
 	<?php } ?>
    // alert(loginabsen);
</script>
<script src="<?php echo base_url()?>assets/js/absen.js"></script> 
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    function initialize() {
        var loc = {};
        var geocoder = new google.maps.Geocoder();
        if(google.loader.ClientLocation) {
            loc.lat = google.loader.ClientLocation.latitude;
            loc.lng = google.loader.ClientLocation.longitude;

            var latlng = new google.maps.LatLng(loc.lat, loc.lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    alert(results[0]['formatted_address']);
                };
            });
        }
    }

    google.load("maps", "3.x", {other_params: "sensor=false", callback:initialize});

    </script>

    <script type="text/javascript">
        $(document).on("click", ".selengkapnya", function() {
            var id = $(this).data('id');
            
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('Employee/viewBerita'); ?>",
                data: "id=" +id
            })
            // alert(id)
            .done(function(data) {
                
                $('#viewberita').html(data);
            })
        })
    </script>

    <script type="text/javascript">
                
    $(document).ready(function(){
       $(".isi").click(function(){
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-blue1',
              cancelButton: 'btn btn-red1'
            },
            buttonsStyling: false,
          });
                var link=$(this).data('link');
                var id=$(this).data('id');
                
                swalWithBootstrapButtons.fire({
                      title: "Apakah Anda yakin?",
                      text: "Ingin mengisi data ini? ",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#dc3545",
                      confirmButtonText: "Ya",
                      cancelButtonText: "Tidak",
                      //closeOnConfirm: false,
                      //closeOnCancel: false,
                      reverseButtons: true,
                      allowOutsideClick: false
                  }).then((result) => {
                      if (result.value) {
                         $.ajax({
                              type: 'POST',
                              url:'<?php echo base_url()?>Employee/ProsesKuesioner/'+id,
                             success: function(data) {
                                  swalWithBootstrapButtons.fire("Sukses", "Isi", "success");
                                  setTimeout(function(){
                                          window.open(link,'_blank');
                                        
                                  },2000);
                              }
                          });
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                      }
                  });
          
        }); 
        
    });
</script>