                        
                        <div class="row m-t-10">
                            <div class="col-lg-3 col-md-3">
                                <label class="fz-18">Detail Cuti</label>
                            </div>
                            <div class="col-md-3 col-3">
                                 <?php 
                                    if($dataleaverequest->status==0){
                                        echo '<button class="Rectangle-probation">Pengajuan</button>';
                                    }else if ($dataleaverequest->status==1){
                                        echo '<button class="Rectangle-permanent">Disetujui</button>';
                                    }else if ($dataleaverequest->status==2){
                                        echo '<button class="Rectangle-resign">Ditolak</button>';
                                    }
                                ?>
                            </div>
                            <div class="col-lg-6 col-md-6" align="right">
                              <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                            </div>
                        </div>
                       
                         <div class="row m-t-10">
                            <div class="col-md-2">
                            </div> 
                            <div class="col-md-10">
                                <div class="row">
                                    <label class="fz-18">Informasi</label>
                                </div> 
                                <div class="row m-t-5">
                                    <div class="col-md-5" >
                                        <p class="fz-14-judul">Nama Pegawai </p>
                                    </div>
                                    <div class="col-md-7" >
                                        <p class="fz-14-isi"><?php echo $dataleaverequest->nama_lengkap ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5" >
                                        <p class="fz-14-judul">Jenis Cuti </p>
                                    </div>
                                    <div class="col-md-7" >
                                        <p class="fz-14-isi"><?php echo $dataleaverequest->desLeave; ?></p>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                   <label class="fz-18">Durasi</label>
                                </div> 
                                <div class="row m-t-5">
                                    <div class="col-md-5" >
                                        <p class="fz-14-judul">Durasi </p>
                                    </div>
                                    <div class="col-md-7" align="left">
                                        <p class="fz-14-isi"> 
                                        <?php  
                                                
                                            $awal = $dataleaverequest->tanggal;
                                            $akhir = $dataleaverequest->sampe_tanggal;
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
                                        <?php echo $tmp; ?> hari</p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Tanggal Mulai </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo strftime("%d %B %Y",strtotime($dataleaverequest->tanggal)); ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Tanggal Berakhir </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo strftime("%d %B %Y",strtotime($dataleaverequest->sampe_tanggal)); ?></p>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <label class="fz-18">Informasi Tambahan</label>
                                </div> 
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Selama Cuti Dapat Menghubungi </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo $dataleaverequest->contact_person; ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Telepon yang dapat dihubungi </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo $dataleaverequest->contact; ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Serah Terima Tugas Kepada</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo $dataleaverequest->serah_tugas_kepada; ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Alasan </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo $dataleaverequest->alasan; ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Ditambahkan oleh </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo $dataleaverequest->nama_lengkap; ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Tanggal</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi"><?php echo strftime("%d %B %Y",strtotime($dataleaverequest->tanggal_create)); ?></p>
                                    </div>
                                </div>
                                <div class="row m-t-5">
                                    <div class="col-md-5">
                                        <p class="fz-14-judul">Status </p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="fz-14-isi">
                                            <?php if ($dataleaverequest->status == '0'){ ?>
                                                Pengajuan
                                            <?php }elseif ($dataleaverequest->status == '1') { ?>
                                                Diterima
                                            <?php }elseif ($dataleaverequest->status == '2') { ?>
                                               Ditolak
                                            <?php } ?></p>
                                    </div>
                                </div>
                            </div>
                    

                       
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".tombol").click(function(){
                        const swalWithBootstrapButtons = Swal.mixin({
                          customClass: {
                            confirmButton: 'btn btn-blue1',
                            cancelButton: 'btn btn-red1'
                          },
                          buttonsStyling: false,
                        });
                           
                                swalWithBootstrapButtons.fire({
                                    title: "Apakah Anda yakin?",
                                    text: "Anda yakin ingin membatalkan cuti?",
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
                                            url: "<?php echo base_url()?>Employee/HapusLeaveRequest/<?php echo $dataleaverequest->id_absensi_leave ?>",
                                           success: function(data) {
                                                swalWithBootstrapButtons.fire("Sukses", "Cuti Dibatalkan", "success");
                                                setTimeout(function(){
                                                        window.location.href="<?php echo base_url()?>Employee/leaveRequest";
                                                     
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


         