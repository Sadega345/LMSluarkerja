
            
            <?php 
                $start_date = new DateTime($datapermohonancuti->tanggal);
                $end_date = new DateTime($datapermohonancuti->sampe_tanggal);
                $interval = $start_date->diff($end_date);
                $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
                $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
                $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
                // echo "$interval->days hari "; // hasil : 217 hari
             ?>

             <div class="col-lg-12">
                <div class="row m-t-10">
                    <div class="col-9 col-md-6">
                        <label class="fz-18 padd-right-5">Detail Cuti</label>
                            <?php 
                                if($datapermohonancuti->status==0){
                                    echo '<label class="Rectangle-probation">Menunggu</label>';
                                }else if($datapermohonancuti->status==1){
                                    echo '<label class="Rectangle-permanent">Diterima</label>';
                                }else if($datapermohonancuti->status==2){
                                    echo '<label class="Rectangle-resign">Ditolak</label>';
                                }
                            ?>
                    </div>
                    <div class="col-3 col-md-6" align="right">
                      <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                    </div>
                </div>
            </div>

            <div class="row m-t-20">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                    	<div class="col-md-6">
	                        <div class="container">
	                            <label class="fz-18">Informasi</label>
	                            <div class="row">
	                                <div class="col-md-5 col-5">
	                                    <p class="fz-14-judul">Nama Pegawai </p>
	                                </div>
	                                <div class="col-md-7 col-7">
	                                    <p class="fz-14-isi"><?php echo $datapermohonancuti->nama_lengkap; ?></p>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-5 col-5" >
	                                    <p class="fz-14-judul">Departemen </p>
	                                </div>
	                                <div class="col-md-7 col-7">
	                                   <p class="fz-14-isi"><?php echo $datapermohonancuti->desDepartemen; ?></p>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-5 col-5" >
	                                    <p class="fz-14-judul">Jenis Cuti </p>
	                                </div>
	                                <div class="col-md-7 col-7">
	                                    <p class="fz-14-isi"><?php echo $datapermohonancuti->desCutiKategori; ?></p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="container">
	                            <label class="fz-18">Durasi</label>
	                            <div class="row">
	                                <div class="col-md-5 col-5">
	                                    <p class="fz-14-judul">Durasi</p>
	                                </div>
	                                <div class="col-md-7 col-7">
										<?php
											$awal = $datapermohonancuti->tanggal;
											$akhir = $datapermohonancuti->sampe_tanggal;
											$then = strtotime($awal);
											$now = strtotime($akhir);
											// for 2 hari
											$lewat = array("Saturday","Sunday");
											$days = 0;
											$tmp=0;
											for ( $i = $then; $i <= $now; $i = $i + 86400 ) {
												$thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
												$tanggal = strftime("%A",strtotime($thisDate));
												if (!in_array($tanggal,$lewat)) {
													$days++;
												}
											}
											if($days == 0){
												$tmp=0;
											}else{
												$tmp = $days;
												
											}
										?>
	                                    <p class="fz-14-isi"><?php echo $tmp ?> Hari</p>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-5 col-5" >
	                                    <p class="fz-14-judul">Tanggal Mulai </p>
	                                </div>
	                                <div class="col-md-7 col-7">
	                                   <p class="fz-14-isi"><?php echo strftime(" %d %B %Y",strtotime($datapermohonancuti->tanggal)); ?></p>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-5 col-5" >
	                                    <p class="fz-14-judul">Tanggal Akhir</p>
	                                </div>
	                                <div class="col-md-7 col-7">
	                                    <p class="fz-14-isi"><?php echo strftime(" %d %B %Y",strtotime($datapermohonancuti->sampe_tanggal)); ?></p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
	                        <div class="container">
	                            <label class="fz-18">Deskripsi</label>
	                            <div class="row">
	                                <div class="col-md-5 col-5">
	                                    <p class="fz-14-judul">Deskripsi</p>
	                                </div>
	                                <div class="col-md-7 col-7">
	                                    <p class="fz-14-isi"><?php echo $datapermohonancuti->keterangan; ?></p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
	                        <div class="container">
	                            <label class="fz-18">Dokumen</label>
	                            <div class="row">
	                                <div class="col-md-5 col-5">
	                                    <p class="fz-14-judul">Deskripsi</p>
	                                </div>
	                                <div class="col-md-7 col-7">
	                                	<div class="row">
	                                		<?php if($datapermohonancuti->dokumen!=''){?>
		                                		<div class="col-md-3">
		                                			<img src="<?php echo base_url()?>assets/img/File.svg">		
		                                		</div>
		                                		<div class="col-md-9">
		                                			<form action="<?php echo base_url()?>HR/dokumenCuti" method="post">
		                                				<input type="hidden" name="path" value="<?php echo base_url()?>assets/img/cuti/<?php echo $datapermohonancuti->dokumen ?>">
		                                    			<input type="hidden" name="dokumen" value="<?php echo $datapermohonancuti->dokumen ?>">
		                                    			<input type="submit" class="btn Rectangle-generate" name="download" value="Download File" >
			                                		</form>
		                                		</div>
		                                	<?php } else{ ?>
		                                		<div class="col-md-3">
	                                            </div>
	                                            <div class="col-md-3">
	                                                -
	                                            </div>
		                                	<?php  } ?>

	                                	</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="container">
	                            <label class="fz-18">Informasi Tambahan</label>
	                            <div class="row">
	                                <div class="col-md-6 ">
	                                    <p class="fz-14-judul">Ditambahkan Oleh</p>
	                                </div>
	                                <div class="col-md-6 ">
	                                    <p class="fz-14-isi"><?php echo $datapermohonancuti->nama_lengkap; ?></p>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-6 ">
	                                    <p class="fz-14-judul">Tanggal</p>
	                                </div>
	                                <div class="col-md-6 ">
	                                    <p class="fz-14-isi"><?php echo strftime(" %d %B %Y",strtotime($datapermohonancuti->tanggal_create)); ?></p>
	                                </div>
	                            </div>
	                            <?php 
                            	if($datapermohonancuti->status!=0){ ?> 
		                            <div class="row">
		                                <div class="col-md-6 ">
		                                    <p class="fz-14-judul">Alasan</p>
		                                </div>
		                                <div class="col-md-6 ">
		                                    <p class="fz-14-isi"><?php echo $datapermohonancuti->alasan; ?></p>
		                                </div>
		                            </div>
		                            <div class="row">
		                                <div class="col-md-6 ">
		                                    <p class="fz-14-judul">Approval</p>
		                                </div>
		                                <div class="col-md-6 ">
		                                    <p class="fz-14-isi"><?php echo $datapermohonancuti->nama_atasan==""?"-":$datanamaatasan->nama_lengkap; ?></p>
		                                </div>
		                            </div>
		                        <?php } ?>
	                        </div>
	                    </div>
                    </div>
                    <?php if($datapermohonancuti->status==0){  ?>
	                    <div class="row m-t-20">
	                		<div class="col-lg-12 col-md-12">
	                    		<div class="row">
				                    <div class="col-md-12">
					                    <div class="container">
					                    	<label class="fz-18">Alasan</label>
				                            <div class="row">
				                                <div class="col-md-2 ">
				                                    <p class="fz-14-judul">Alasan</p>
				                                </div>
				                                <div class="col-md-6 ">
				                                	<textarea  class="form-control" rows="4" id="alasan"><?php echo $datapermohonancuti->alasan; ?></textarea>
				                                </div>
				                            </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="row m-t-20">
	                		<div class="col-lg-12 col-md-12">
	                    		<div class="row">
	                    			<div class="col-md-6 col-9" align="right">
	                                        <a href="javascript:;" onclick="ubah('<?php echo $datapermohonancuti->id_absensi_leave?>','1','<?php echo $datapermohonancuti->nik; ?>');" class="btn Rectangle-simpan">Terima</a>
	                                        <a href="javascript:;" onclick="ubah('<?php echo $datapermohonancuti->id_absensi_leave?>','2','<?php echo $datapermohonancuti->nik; ?>');" class="btn Rectangle-tutup">Tolak</a>
	                                    </div>
	                    		</div>
	                    	</div>
	                    </div>
                        <?php }elseif($datapermohonancuti->status==1){ ?>
                            <div class="row m-t-20">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container">
                                                <label class="fz-18">Alasan</label>
                                                <div class="row">
                                                    <div class="col-md-2 ">
                                                        <p class="fz-14-judul">Alasan</p>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <textarea  class="form-control" rows="4" id="alasan"><?php echo $datapermohonancuti->alasan; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-9" align="right">
                                                <a href="javascript:;" onclick="ubah('<?php echo $datapermohonancuti->id_absensi_leave?>','2','<?php echo $datapermohonancuti->nik; ?>');" class="btn Rectangle-tutup">Batalkan</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                        
                         

                        <?php 
                           // if($datapermohonancuti->status==0){ 
                               // echo'<div class="row">
                               //      <div class="col-md-3 col-5" align="right">
                               //          <label>Alasan </label>
                               //      </div>
                               //      <div class="col-md-6 col-6" align="left">
                               //         <textarea  class="form-control" rows="4" id="alasan">'.$datapermohonancuti->alasan.'</textarea>
                               //      </div>
                               //  </div>
                               //  <div class="row m-t-10">
                               //      <div class="col-md-6 col-9" align="right">
                               //          <a href="javascript:;" onclick="ubah(\''.$datapermohonancuti->id_absensi_leave.'\',1)" class="btn btn-blue1">Setuju</a>
                               //          <a href="javascript:;" onclick="ubah(\''.$datapermohonancuti->id_absensi_leave.'\',2)" class="btn btn-red1">Tolak</a>
                               //      </div>
                               //  </div>';
                            // }else { 
                            //     echo '<div class="row">
                            //         <div class="col-md-3 col-5" align="right">
                            //             <label>Alasan </label>
                            //         </div>
                            //         <div class="col-md-6 col-7" align="left">
                            //            <p>'.$datapermohonancuti->alasan.'</p>
                            //         </div>
                            //     </div>';
                            // }
                        ?>

                        
                        <br> 
                </div>
            </div>
            

            
