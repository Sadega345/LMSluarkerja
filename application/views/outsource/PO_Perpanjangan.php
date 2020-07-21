<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Project Order / Perpanjangan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">Project Order Perpanjangan</h6>
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
                                <?php
                                 $idporev = $dataProject_Order->idporev;
                                 $arr=array("a.id_projek_order"=>$idporev);
                                $dataporev=$this->My_model->getProjectOrder($arr)->row();
                                 ?>
                                <td><?php echo $dataProject_Order->no_surat_kontrak; ?></td>
                                <td><?php echo strftime(" %d %B %Y",strtotime($dataProject_Order->tgl_kontrak)); ?></td>
                                <td><?php echo $dataProject_Order->no_projek_order; ?></td>
                                <td><?php echo strftime(" %d %B %Y",strtotime($dataProject_Order->tanggal_projek_order)); ?></td>
                                <td>
                                    <a href="<?php 	echo base_url() ?>Outsource/PO_dtl/<?php echo $dataProject_Order->status;  ?>/<?php echo($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po);  ?>">
                                        <button class="btn btn-success m-b-10">Detail</button>
                                    </a>
                                    <br />
                                    <p>
                                    <?php 
                                    //echo $dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po;
                                    $idporevisi=$dataProject_Order->idporev==""?$dataProject_Order->id_projek_order_revisi:$dataporev->id_projek_order_revisi;
                                    if($idporevisi=='0'){
                                         $idporevisi=$dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po;
                                     }

                                    $arr=array("id_projek_order_revisi"=>$idporevisi,'status_revisi'=>'1');
                                        $datarevisi=$this->My_model->getProjectOrderRevisi($arr);
                                      if($datarevisi->num_rows()>0){
                                        
                                        echo 'Proses Revisi/Adendum';
                                    
                                      }else{
                                        if($dataProject_Order->file_upload!=''){

                                        }else{
                                            echo ' <a href="'.base_url().'Outsource/DownloadPdfPOBaru/'. $dataProject_Order->status.'/'.($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po).'" class="btn btn-primary" data-toggle="tooltip" title="Download" data-placement="bottom">
                                                    <i class="fa fa-download"></i>
                                                    </a> ';
                                        }
                                    ?>
                                    <a href="<?php echo base_url() ?>Outsource/viewProjekOrder/<?php echo $dataProject_Order->status;  ?>/<?php echo $dataProject_Order->id_po;  ?>" class="btn btn-primary" data-toggle="tooltip" title="Data Personil" data-placement="top">
                                        <i class="fa fa-users"></i> <span class="d-sm-none">Data Personil</span>
                                    </a>
                                    <a href="<?php echo base_url() ?>Outsource/viewAttachment/<?php echo $dataProject_Order->status;  ?>/<?php echo $dataProject_Order->id_po;  ?>" class="btn btn-primary" data-toggle="tooltip" title="Data Lampiran" data-placement="top" >
                                        <i class="fa fa-file"></i> <span class="d-sm-none">Data Lampiran</span>
                                    </a>
                                    </p>
                                    
                                    <?php
                                    $like=array('a.id_projek_order_perpanjangan'=>$dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po);
                                    $tamp=$this->My_model->getProjectOrder($like);
                                     if($tamp->num_rows() <= 0 ){
                                      //  if($ambilpoperpanjangan->id_projek_order==$dataProject_Order->id_projek_order){
                                            echo '<a href="'.base_url().'Outsource/PO_dataperpanjangan/2/'.($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po).'"> 
                                                    <button class="btn btn-warning ">Perpanjangan</button>
                                                </a>
                                                <a href="'.base_url().'Outsource/PO_datarevisi/2/'. ($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po).'" class="btn btn-primary ">Revisi</a>';    

                                        }   ?>
                                    <?php 
                                        if($dataProject_Order->file_upload!=''){

                                        }else{
                                            // echo '<form action="'.base_url().'Outsource/ProsesUploadDokumen" method="post" enctype="multipart/form-data">
                                            //     <div class="input-group m-t-10">
                                            //         <input type="hidden" name="id" value="'. $dataProject_Order->id_projek_order .'">
                                            //         <div class="custom-file">
                                            //             <input type="file" class="custom-file-input" name="file_upload" id="inputGroupFile04">
                                            //             <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                            //         </div>
                                            //         <div class="input-group-append">
                                            //             <button class="btn btn-green1" type="submit">Upload</button>
                                            //         </div>
                                            //     </div>
                                            // </form>  ';
                                        }
                                    }
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