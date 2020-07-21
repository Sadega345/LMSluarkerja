<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Penagihan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">Master Kelengkapan Data Penagihan</h6>
               
                <div class="table-responsive">
                     <div  align="right">
                         <a href="<?php echo base_url()?>Outsource/PO_TambahPenagihan"><button class="btn btn-blue col-md-3">Tambah Data <i class="fa fa-plus"></i></button></a>
                    </div>
                    <br>
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                      
                         <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Penagihan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $num=0; foreach ($dataPenagihan->result() as $datapenagihan) { $num++; ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $datapenagihan->nama_penagihan; ?></td>
                                <td>
                                    <a href="<?php echo base_url()?>Outsource/PO_EditPenagihan/<?php echo $datapenagihan->id_master_penagihan ?>">
                                        <button class="btn btn-warning">Edit</button>
                                    </a> 
                                    <a href="<?php echo base_url()?>Outsource/HapusPOPenagihan/<?php echo $datapenagihan->id_master_penagihan ?>"  class="btn btn-danger" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus">Hapus
                                    </a>
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