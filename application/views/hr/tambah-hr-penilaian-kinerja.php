
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Penilaian Kinerja</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 ">
                            </div>
                            <div class="col-md-8 text-center col-8" >
                                 <h6 class="tittle-box">Tambah  Penilaian Kinerja</h6>
                            </div>
                            <div class="col-md-2 col-4">
                                <a href="<?php echo base_url() ?>HR/HRPenilaianKinerja" class="btn btn-blue">Kembali</a>
                            </div>
                        </div>
                    <div class="container">
                       
                            <!-- <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Nama Penilai</label>
                                    <label class="d-sm-none">Nama Penilai</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="text" name="nama_pic" class="form-control">
                                </div>
                            </div> -->
                            <div class="row  m-t-10 mb-5">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Klien </label>
                                    <label class="d-sm-none">Klien</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <select name="id_master_perusahaan" class="form-control  select2" data-placeholder="Pilih Klien" tabindex="2" required onchange="pilihkaryawan(this.value)">
                                            <option value="0">--Pilih Klien--</option>
                                    <?php
                                        foreach($dataKlien->result() as $dt){ ?>
                                            <option value="<?php echo $dt->id_master_perusahaan;?>"><?php echo $dt->nama_perusahaan;?></option>
                                    <?php
                                        }
                                    ?>  
                                    </select> 
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="karyawan">
                                        <?php foreach ($datakaryawan->result() as $dt) { ?>
                                            <tr>
                                                <td><?php echo $dt->nik; ?></td>
                                                <td><?php echo $dt->nama_lengkap; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url()?>HR/HRNilaiKinerja/<?php echo $dt->nik ?>">
                                                        <button class="btn btn-yellow">Nilai</button>
                                                    </a> 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php //foreach ($datakaryawan->result() as $dt) { ?>
                                           <!--  <tr>
                                                <td><?php //echo $dt->tanggal; ?></td>
                                                <td><?php// echo $dt->nama_pic; ?></td>
                                                <td><?php //echo $dt->nama_lengkap; ?></td>
                                                <td>
                                                    <a href="<?php //echo base_url()?>HR/ViewKPI/<?php// echo $dt->id_kpi ?>">
                                                        <button class="btn btn-green1">Lihat</button>
                                                    </a>
                                                    <a href="<?php //echo base_url()?>HR/HapusKPI/<?php //echo $dt->id_kpi ?>"  class="btn btn-red1" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus">Hapus
                                                    </a>
                                                    <a href="<?php// echo base_url()?>HR/EditKPI/<?php //echo $dt->id_kpi ?>">
                                                        <button class="btn btn-yellow">Edit</button>
                                                    </a> 
                                                </td>
                                            </tr> -->
                                        <?php// } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        <!-- </form> -->
                        
                    </div>
                </div>     
            </div> 
        </div>
        <script type="text/javascript">
            function pilihkaryawan(idperusahaan){
                if(idperusahaan!=""){
                    $.ajax({
                          type: "POST",
                      url: "<?php echo base_url(); ?>HR/ambilKaryawan", 
                      data: {id_master_perusahaan : idperusahaan}, 
                      dataType: "json",
                      beforeSend: function(e) {
                        if(e && e.overrideMimeType) {
                          e.overrideMimeType("application/json;charset=UTF-8");
                        }
                      },
                      success: function(response){ 
                        $('.js-basic-example').DataTable().destroy();
                        $("#karyawan").html(response.data_karyawan);
                        $('.js-basic-example').DataTable({ responsive: true });
                        
                      },
                      error: function (xhr, ajaxOptions, thrownError) { 
                        alert(thrownError); 
                      }
                    }); 
                } else {
                   
                }
            }
        </script>


         
                        
         