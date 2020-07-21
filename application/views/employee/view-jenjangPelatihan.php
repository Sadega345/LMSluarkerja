           
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pelatihan / Jadwal Pelatihan</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class="row m-t-10">
                            <div class="col-md-9 col-7" >
                                <h6 class="tittle-box text-center" >Jadwal Pelatihan</h6>
                            </div>
                            <div class="col-md-2 col-4" >
                                <a href="<?php echo base_url()?>Employee/jenjangPelatihan" class="btn btn-blue ">Kembali</a>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <br>
                        <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="float-right hidden-sm">Nama Program Pelatihan </label>    
                                <label class="d-sm-none">Nama Program Pelatihan </label>
                            </div>
                            <div class="col-md-4">
                                <p><?php echo $datajenjangpelatihan->nama_program; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="float-right hidden-sm">Nama Pelatih </label>    
                                <label class="d-sm-none">Nama Pelatih </label>
                            </div>
                            <div class="col-md-4">
                                <p><?php echo $datajenjangpelatihan->nama_pelatih; ?></p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4" >
                                <label class="float-right hidden-sm">Lokasi Pelatihan </label>    
                                <label class="d-sm-none">Lokasi Pelatihan </label>
                            </div>
                            <div class="col-md-4">
                                <p><?php echo $datajenjangpelatihan->lokasi; ?></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label class="float-right hidden-sm">Tanggal Mulai </label>    
                                <label class="d-sm-none">Tanggal Mulai </label>
                            </div>
                            <div class="col-md-4">
                                <p><?php echo strftime("%A, %d %B %Y",strtotime($datajenjangpelatihan->tanggal_mulai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                                <label class="float-right hidden-sm">Tanggal Berakhir </label>    
                                <label class="d-sm-none">Tanggal Berakhir </label>
                            </div>
                            <div class="col-md-4">
                                <p><?php echo strftime("%A ,%d %B %Y",strtotime($datajenjangpelatihan->tanggal_selesai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                                <label class="float-right hidden-sm">Keterangan </label>    
                                <label class="d-sm-none">Keterangan </label>
                            </div>
                            <div class="col-md-4">
                                <p><?php echo $datajenjangpelatihan->deskripsi; ?></p>
                            </div>
                        </div>

                        <?php if ($datajenjangpelatihan->status_lulus == '2'){ ?>
                        <div class="row">
                           <div class="col-md-4 col-5"  align="right">
                                <label>Alasan</label>
                            </div>
                            <div class="col-md-8 col-7">
                                <p><?php echo $datajenjangpelatihan->alasan; ?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="table-responsive m-t-20">
                            <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama Peserta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datajenjangpelatihanpeserta->result() as $dt) { ?>
                                        
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                             <td><?php echo $dt->nama_lengkap; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                </div>
                    
                </div> 
            </div>


<script type="text/javascript">
  function ubah(a,b){
        // var alasan=$('#alasan').val();
        bootbox.confirm("Anda yakin merubah data ini!", function(result){ 
            if(result){
                $.ajax({
                      url: '<?=site_url();?>Employee/ambilPelatihan', //calling this function
                      data:{id_training_jadwal:a,status:b},
                      type:'POST',
                      cache: false,

                  success: function(data) {
                      // alert("success");
                       location.reload();
                    }
                });
            }
            console.log('This was logged in the callback: ' + result); 
        });
      }
</script>