
            
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Departemen & Divisi</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 col-3">
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                 <h6 class="tittle-box">Tambah Divisi</h6>
                            </div>
                            <div class="col-md-2 col-4">
                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesTambahDivisi" method="post">
                            <div class="row">
                                <div class="col-md-3 " align="right">
                                    <label>Nama Departemen </label>        
                                </div>
                                <div class="col-md-4" align="left">
                                   <p><?php echo $datadepartemen->deskripsi; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-5 m-t-10"  align="right">
                                    <label>Nama Divisi </label>
                                </div>
                                <div class="col-md-4 col-7">
                                    <input type="hidden" name="id_departemen" class="form-control" value="<?php echo $datadepartemen->id_departemen; ?>">
                                    <input type="text" name="nama_divisi" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3" >
                                </div>
                                <div class="col-md-9 col-6" >
                                    <button class="btn btn-blue1" type="submit">Tambah</button>
                                    <a href="<?php echo base_url()?>HR/HRDepartemen" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>  
            </div> 
        </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                                   <!-- <h6 class="tittle-box text-center">Divisi</h6> -->
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Divisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($datadivisi->result() as $dt) { ?> 
                                        <tr>
                                            
                                            <td><?php echo $dt->nama_divisi; ?></td>
                                            <td>
                                                 <a href="<?php echo base_url()?>HR/HapusDivisi/<?php echo $dt->id_divisi?>/<?php echo $datadepartemen->id_departemen; ?>"  class="btn btn-red1" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus">Hapus
                                                                    </a>
                                                 <a href="<?php  echo base_url()?>HR/EditHRDivisi/<?php echo $dt->id_divisi; ?>/<?php echo $datadepartemen->id_departemen; ?>" class="btn btn-yellow">Edit Divisi</a>
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


         
                        
         