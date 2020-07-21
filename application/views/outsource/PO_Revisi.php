<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Project Order / Revisi</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">Project Order Revisi</h6>
               
                <div class="table-responsive">

                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                      
                         <thead class="thead-dark">
                            <tr>
                                <th>No Surat Kontrak</th>
                                <th>Tanggal Kontrak</th>
                                <th>No Project Order</th>
                                <th>Tanggal Project Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($dataProjectOrder->result() as $dataProject_Order) { ?>
                            <?php  
                                $tglkontrak=explode(' ',$dataProject_Order->tgl_kontrak);
                                $tanggalprojeorder=explode(' ',$dataProject_Order->tanggal_projek_order);
                            ?>
                            <tr>
                                <td><?php echo $dataProject_Order->no_surat_kontrak; ?></td>
                                <td><?php echo date('d-m-Y',strtotime($tglkontrak[0])) ?></td>
                                <td><?php echo $dataProject_Order->no_projek_order; ?></td>
                                <td><?php echo date('d-m-Y',strtotime($tanggalprojeorder[0]));  ?></td>
                                <td>
                                    <?php 
                                        /* if($dataProject_Order->file_upload!=''){

                                        }else{
                                            echo ' <a href="'.base_url().'Outsource/DownloadPdfPOBaru/'. $dataProject_Order->status.'/'.$dataProject_Order->id_po.'" class="btn btn-primary" data-toggle="tooltip" title="Download" data-placement="bottom">
                                                    <i class="fa fa-download"></i>
                                                    </a> ';
                                        } */
                                    ?>
                                    <a href="<?php  echo base_url() ?>Outsource/PO_dtl/<?php echo $dataProject_Order->status;  ?>/<?php echo $dataProject_Order->id_po;  ?>">
                                        <button class="btn btn-success">Detail</button>
                                    </a>
                                    <?php
                                        //if($ambilporevisi->id_projek_order==$dataProject_Order->id_projek_order){
                                        if($dataProject_Order->idpo==$dataProject_Order->id_projek_order){
                                            if($dataProject_Order->status_revisi==1){
                                                echo '<p class="m-t-10 m-b-10"><a href="'.base_url().'Outsource/PO_datarevisi/4/'.$dataProject_Order->id_po.'"> 
                                                    <button class="btn btn-warning">Revisi</button>
                                                </a></p>
                                                <form method="post" action="'.base_url().'Outsource/prosesDone">
                                                
                                                <input type="hidden" name="id_po" value="'.$dataProject_Order->id_projek_order_revisi.'" />
                                                <input type="submit" class="btn btn-primary" value="Selesai">  
                                                </form>';
                                            }
                                        }  
                                    ?>
                                   <!--  <a href="<?php // echo base_url() ?>Outsource/PO_datarevisi/3/<?php //echo $dataProject_Order->id_po;  ?>">
                                        <button class="btn btn-warning">Revisi</button>
                                    </a> -->
                                    <?php 
                                        /* if($dataProject_Order->file_upload!=''){

                                        }else{
                                            echo '<form action="'.base_url().'Outsource/ProsesUploadDokumen" method="post" enctype="multipart/form-data">
                                                <div class="input-group m-t-10">
                                                    <input type="hidden" name="id" value="'. $dataProject_Order->id_projek_order .'">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file_upload" id="inputGroupFile04">
                                                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-green1" type="submit">Upload</button>
                                                    </div>
                                                </div>
                                            </form>  ';
                                        } */
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