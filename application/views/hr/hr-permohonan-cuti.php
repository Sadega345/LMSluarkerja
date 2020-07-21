            <?php  
              $tanggal="";
              $sampe_tanggal="";
                if($this->input->post('tanggal')=="" || $this->input->post('sampe_tanggal')=="" ){
                  echo "";
                }else{
                  $a=explode("-", $this->input->post('tanggal')); 
                  $tanggal=$a[2].'/'.$a[1].'/'.$a[0]; 
                    $b=explode("-", $this->input->post('sampe_tanggal')); 
                  $sampe_tanggal=$b[2].'/'.$b[1].'/'.$b[0];  
                }
            ?> 
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <!-- <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Absensi Pegawai / Permohonan Cuti</h6> -->
                         <h4 class="tittle-menu">Absensi Pegawai / Permohonan Cuti</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 m-b-20">
                     <!-- <div class="card "> -->
                         <div class="body">
                            <!-- <h6 class="tittle-box">Search Filter</h6> -->
                            <div class="container">

                                <form action="<?php  echo base_url()?>HR/HRPermohonanCuti" method="post">
                                    
                                    <div class="row m-b-20">
                                        <div class="col-md-2 m-t-10">   
                                            <h6>Search Filter</h6>   
                                        </div>
                                        <div class="col-md-10" align="right">
                                            <!-- <button type="submit" class="btn Rectangle-cari col-md-2"><i class="fa fa-search" style="color: #ffff;"></i> Cari</button> -->

                                            <button type="submit" class="btn Rectangle-cari col-md-2">
                                            
                                                <i class="fa fa-search padd-right-5 putih" ></i>
                                               Cari
                                              
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Nama Karyawan -->
                                        <div class="col-md-2 m-t-20">
                                            <label>Nama Karyawan</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                           <input type="text" name="nama_lengkap" class="form-control fcheight" value="<?php echo $this->input->post('nama_lengkap') ?>">
                                        </div>

                                        <!-- Tanggal Cuti -->
                                        <div class="col-md-2 m-t-20">
                                            <label>Tanggal Cuti</label>        
                                        </div>
                                        <div class="col-md-4" align="left" >
                                           <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                                <div class="input-group mb-3" style="display: contents;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="input-sm form-control fcheight" id="start" name="" data-date-format="yyyy-mm-dd" required readonly data-id="startdate" value="<?php echo $tanggal ?>" >
                                                </div>
                                                
                                                
                                                
                                                <!-- <div class="input-group mb-3" style="display: contents;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="input-sm form-control" id="end" name="" data-date-format="dd/mm/yyyy" required readonly data-id="enddate" value="<?php echo $sampe_tanggal ?>">
                                                </div> -->
                                                <input type="hidden" name="tanggal" id="startdate"  value="<?php echo $this->input->post('tanggal') ?>">
                                                <input type="hidden" name="sampe_tanggal" id="enddate" value="<?php echo $this->input->post('sampe_tanggal') ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row rowclient m-t-20" id="rowclient">
                                    <div class="col-md-2 m-t-20">
                                        <label>Unit Bisnis</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <select name="id_master_perusahaan" id="selclient" class="form-control select2 selclient" >
                                            <option selected value=""> Pilih Semua Unit Bisnis </option>
                                            <?php
                                            foreach($dataClient->result() as $dtc){
                                                ?>
                                                <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php echo $this->input->post('id_master_perusahaan')==$dtc->id_master_perusahaan?'selected':'';  ?>> <?php echo $dtc->nama_perusahaan; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Tanggal Cuti -->
                                    <div class="col-md-2 m-t-20">
                                        <label>Sampai Dengan</label>        
                                    </div>
                                    <div class="col-md-4" align="left" >
                                       <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control fcheight" id="end" name="" data-date-format="dd/mm/yyyy" required readonly data-id="enddate" value="<?php echo $sampe_tanggal ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row rowdept m-t-20" id="rowdept">
                                    <div class="col-md-2 m-t-20" >
                                        <label>Departemen </label>        
                                    </div>
                                     <div class="col-md-4" >
                                        <select name="id_departemen" id="seldept" class="form-control select2 seldept" >
                                            <option selected value=""> Pilih Semua Departemen </option>
                                            <?php
                                            foreach($dataDeptC->result() as $dtd){
                                                ?>
                                                <option value="<?php echo $dtd->id_departemen; ?>" <?php echo $this->input->post('id_departemen')==$dtd->id_departemen?'selected':'';  ?>> <?php echo $dtd->nama_departemen; ?></option>
                                                <?php
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="row m-t-20">
                                        <div class="col-md-2 m-t-20">
                                            <label>Jenis Cuti</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                            <select name="id_leave_kategori" class="fcheight select2me form-control" data-placeholder="Pilih Departemen" tabindex="2">
                                                <option value="">Semua Jenis</option>
                                            <?php
                                                foreach($dataleavekategori->result() as $dt){ ?>
                                                    <option value="<?php echo $dt->id_leave_kategori;?>" <?php echo $this->input->post('id_leave_kategori')==$dt->id_leave_kategori?'selected':'';  ?>><?php echo $dt->deskripsi;?></option>
                                            <?php
                                                }
                                            ?>  
                                            </select>
                                        </div>

                                        <!-- Status Persutujuan -->
                                        <div class="col-md-2 m-t-20">
                                            <label>Status Persetujuan</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                            <select name="status" class="form-control fcheight" >
                                                <option value="">Lihat semua</option>
                                                <option value="0" <?php echo $this->input->post('status')=='0'?'selected':''; ?>>Pengajuan</option>
                                                <option value="1" <?php echo $this->input->post('status')=='1'?'selected':''; ?>>Diterima</option>
                                                <option value="2" <?php echo $this->input->post('status')=='2'?'selected':''; ?>>Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-3 m-t-10">
                                            <label>Status Persetujuan</label>        
                                        </div>
                                        <div class="col-md-4" align="left">
                                            <select name="status" class="form-control">
                                                <option value="">Lihat semua</option>
                                                <option value="0" <?php echo $this->input->post('status')=='0'?'selected':''; ?>>Pengajuan</option>
                                                <option value="1" <?php echo $this->input->post('status')=='1'?'selected':''; ?>>Diterima</option>
                                                <option value="2" <?php echo $this->input->post('status')=='2'?'selected':''; ?>>Ditolak</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <!-- <div class="row">
                                        <div class="col-md-2 m-t-10">      
                                        </div>
                                         <div class="col-md-4" align="right">
                                            <button type="submit" class="btn btn-blue col-md-6"><i class="fa fa-search" style="color: #ffff;"></i> Cari</button>
                                        </div>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-6 col-12">
                                   <h5 class="fz-aktivitasabsensi">Permohonan Cuti</h5>
                               </div> 
                               <!-- <?php //if ($dataAkses == '1'){ ?>
                                    <div class="col-md-6 col-6" align="right">
                                        <a href="<?php  //echo base_url()?>HR/TambahHRPermohonanCuti" class="btn btn-blue col-md-6">Tambah </a>
                                    </div>
                               <?php //} ?> -->
                               
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Karyawan</th>
                                            <th>Departemen</th>
                                            <th>Jenis Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Durasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datapermohonancuti->result() as $dt) { ?>
                                            <?php 
                                                // $start_date = new DateTime($dt->tanggal);
                                                // $end_date = new DateTime($dt->sampe_tanggal);
                                                // $interval = $start_date->diff($end_date);
                                                // $tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
                                                // $bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
                                                // $hari = $interval->d>0 ? $interval->d. ' Hari ':'';
                                               
                                                $awal = $dt->tanggal;
                                                $akhir = $dt->sampe_tanggal;
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
                                            <tr>
                                                <td><?php echo $dt->nama_lengkap; ?></td>
                                                <td><?php echo $dt->desDepartemen; ?></td>
                                                <td><?php echo $dt->desCutiKategori; ?></td>
                                                <td><?php echo strftime(" %A %d %B %Y",strtotime($dt->tanggal)); ?></td>
                                                <td><?php echo strftime(" %d %B %Y",strtotime($dt->sampe_tanggal)); ?></td>
                                                <td><?php echo  $tmp; ?> hari</td>
                                                <td>
                                                    <?php 
                                                        if($dt->status==0){
                                                            echo '<label class="btn Rectangle-menunggu">Menunggu</label>';
                                                        }else if($dt->status==1){
                                                            echo '<label class="btn Rectangle-diterima">Diterima</label>';
                                                        }else if($dt->status==2){
                                                            echo '<label class="btn Rectangle-ditolak">Ditolak</label>';
                                                        }
                                                    ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php if ($dataAkses == '1'){ ?>
                                                        <a href="javascript:;" class="btn btn-aksi" onclick="viewcuti('<?php echo $dt->id_absensi_leave ?>')"><img src="<?php   echo base_url() ?>assets/img/View.svg" class="padd-right-5"> Lihat</a>
                                                        <?php if($dt->status==0 || $dt->status==2){ ?>
                                                        <a href="javascript:;" class="btn btn-aksi" onclick="hapus('<?php echo $dt->id_absensi_leave ?>')"><img src="<?php   echo base_url() ?>assets/img/Delete.svg" class="padd-right-5"> Hapus</a>
                                                        <?php } ?>
                                                        <?php if($dt->status==1){ ?>
                                                            <a href="<?php echo base_url()?>HR/cetakPermohonanCuti/<?php echo $dt->id_absensi_leave ?>" target="_blank" class="btn btn Rectangle-generate">Cetak</a>
                                                        <?php } ?>
                                                        <!-- <a href="<?php// echo base_url()?>HR/HRPermohonanCutiDetail/<?php //echo $dt->id_absensi_leave ?>" class="btn btn-aksi padd-right-5"> <img src="<?php   //echo base_url() ?>assets/img/View.svg"> Lihat</a> -->
                                                    <?php } ?>
                                                    
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
            <!-- modal View --> 
            <div class="modal fade bd-example-modal-lg" id="viewcuti" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                        <div id="cuti">
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <script type="text/javascript">
                 function hapus(id){
                          const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                              confirmButton: 'btn btn-blue1',
                              cancelButton: 'btn btn-red1'
                            },
                            buttonsStyling: false,
                          });
                             
                                  swalWithBootstrapButtons.fire({
                                      title: "Apakah Anda yakin?",
                                      text: "Ingin menghapus data ini? ",
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
                                              url: "<?php echo base_url()?>HR/HapusCuti/"+id,
                                             success: function(data) {
                                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                                  var curdate = new Date();
                                                  var format = formatDate(curdate);
                                                  var status = 'signout';
                                                  var exp = new Date();
                                                  //clearTimeout(t);
                                                  seconds = 0; minutes = 0; hours = 0;
                                                  setCookie('time', "00:00:00", exp);
                                                  setCookie('absen', "00:00:00", exp);
                                                  //update();
                                                  //waktu = window.setInterval(update, 1000);
                                                //   deleteCookie('lunch');
                                                //   deleteCookie('break');
                                                //   deleteCookie('extra');
                                                //   deleteCookie('time');
                                                //   deleteCookie('absen');
                                                  setTimeout(function(){
                                                          window.location.href="<?php echo base_url()?>HR/HRPermohonanCuti";
                                                       
                                                  },2000);
                                              }
                                          });
                                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                      }
                                  });
                                }

               function ubah(a,b,c){
                        var alasan=$('#alasan').val();
                        $.ajax({
                          url: '<?=site_url();?>HR/ubahstscuti', //calling this function
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
                    <?php if($this->input->post('id_departemen')==""){ ?>
                        $(".rowdept").hide();    
                    <?php } ?>
                    
                    $(".selclient").change(function(){
                        pilihDept(this.value);
                        $(".selclient").val(this.value);
                    });
                     $(".seldept").change(function(){
                        $(".seldept").val(this.value);
                    });
                });

                 function viewcuti(a){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/HRPermohonanCutiDetail/"+a,
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');

                                $('#viewcuti').modal('show');
                                $('#cuti').html(response);
                                // var table = $('.master').DataTable({
                                //   responsive: true
                                // });
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus, errorThrown);
                            }
                  });
                }

                function pilihDept(idclient){
                    if(idclient!=""){
                        $(".rowsumber").hide();
                        $(".rowjabatan").hide();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>HR/ambilDept", 
                            data: {id_client : idclient}, 
                            dataType: "json",
                            beforeSend: function(e) {
                                if(e && e.overrideMimeType) {
                                  e.overrideMimeType("application/json;charset=UTF-8");
                                }
                            },
                            success: function(response){ 
                                $(".rowdept").show();
                                $(".seldept").html(response.data_dept).show();
                                $(".seldept").select2();
                            },
                            error: function (xhr, ajaxOptions, thrownError) { 
                                alert(thrownError); 
                            }
                        }); 
                    } else {
                        $(".rowdept").hide();
                    }
                }
            </script>
         