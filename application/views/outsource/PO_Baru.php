<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
?>

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Project Order Existing</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">Project Existing</h6>
                <div class="" align="right">
                	<!--  <a href="<?php// echo base_url() ?>Outsource/tambahPO"><button class="btn btn-blue col-12 col-md-3">Tambah Project Order <i class="fa fa-plus"></i> </button></a> -->
                </div>
               <br>
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
                            <tr>
                                 <?php
                                 $idporev = $dataProject_Order->idporev;
                                 $arr=array("a.id_projek_order"=>$idporev);
                                $dataporev=$this->My_model->getProjectOrder($arr)->row();
                                 ?>
                                <td><?php echo $dataProject_Order->idporev==""?$dataProject_Order->no_surat_kontrak:$dataporev->no_surat_kontrak; ?></td>
                                <td><?php echo $dataProject_Order->idporev==""?strftime(" %d %B %Y",strtotime($dataProject_Order->tgl_kontrak)):strftime(" %d %B %Y",strtotime($dataporev->tgl_kontrak)); ?></td>
                                <td><?php echo $dataProject_Order->idporev==""?$dataProject_Order->no_projek_order:$dataporev->no_projek_order; ?></td>
                                <td><?php echo $dataProject_Order->idporev==""?strftime(" %d %B %Y",strtotime($dataProject_Order->tanggal_projek_order)):strftime(" %d %B %Y",strtotime($dataporev->tanggal_projek_order)); ?></td>
                                <td>
                               
                                    <p><a href="<?php  echo base_url() ?>Outsource/PO_dtl/<?php echo $dataProject_Order->status;  ?>/<?php echo $dataProject_Order->id_po  ?>">
                                        <button class="btn btn-success">Detail</button>
                                    </a>
                                    </p>
                                    <p>
                                      <?php 
                                     //echo $dataProject_Order->idporev==""?$dataProject_Order->id_projek_order_revisi:$dataporev->id_projek_order_revisi;
                                        $arr=array("id_projek_order_revisi"=>$dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po,'status_revisi'=>'1');
                                        $datarevisi=$this->My_model->getProjectOrderRevisi($arr);
                                      if($datarevisi->num_rows()>0){
                                        
                                        echo 'Proses Revisi/Adendum';
                                    
                                      }else{
                                       //  $like=array('a.id_projek_order_perpanjangan'=>$dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po);
                                       //  $tamp=$this->My_model->getProjectOrder($like);
                                        
                                       //  //$likeR=array('a.id_projek_order_revisi'=>$dataProject_Order->id_projek_order);
                                       //  //$tampR=$this->My_model->getProjectOrder($likeR);
                                       
                                       // // $hitung=substr_count($dataProject_Order->no_projek_order, "-P");
                                       //  if($tamp->num_rows() <= 0 ){
                                            $fileupload= $dataProject_Order->idporev==""?$dataProject_Order->file_upload:$dataporev->file_upload;
                                            
                                             if($fileupload!=""){

                                            }else{
                                            
                                                echo '
                                                            <a href="'.base_url().'Outsource/DownloadPdfPOBaru/'. $dataProject_Order->status.'/'.($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po).'" class="btn btn-primary" data-toggle="tooltip" title="Download PO" data-placement="bottom">
                                                                <i class="fa fa-download"></i> <span class="d-sm-none">Download PO</span>
                                                            </a>';
                                            }
                                    ?>
                                   
                                     
                                    <a href="<?php echo base_url() ?>Outsource/viewProjekOrder/<?php echo $dataProject_Order->status;  ?>/<?php echo $dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po;  ?>" class="btn btn-primary" data-toggle="tooltip" title="Data Personil" data-placement="top">
                                        <i class="fa fa-users"></i> <span class="d-sm-none">Data Personil</span>
                                    </a>
                                    <a href="<?php echo base_url() ?>Outsource/viewAttachment/<?php echo $dataProject_Order->status;  ?>/<?php echo $dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po;  ?>" class="btn btn-primary" data-toggle="tooltip" title="Data Lampiran" data-placement="top" >
                                        <i class="fa fa-file"></i> <span class="d-sm-none">Data Lampiran</span>
                                    </a><br />
                                  
                                            <?php
                                            $like=array('a.id_projek_order_perpanjangan'=>$dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po);
                                            $tamp=$this->My_model->getProjectOrder($like);
                                            if( $tamp->num_rows() <= 0){ 
                                            
                                            echo '<a href="'.base_url().'Outsource/PO_dataperpanjangan/2/'. ($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po).'" class="btn btn-warning m-t-10">Perpanjangan</a> &nbsp;
                                            <a href="'.base_url().'Outsource/PO_datarevisi/3/'. ($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po).'" class="btn btn-primary m-t-10">Revisi</a>';
                                                 
                                       

                                        
                                        // if($tampR->num_rows() <= 0 && $tamp->num_rows() <= 0 ){
                                        //     echo '<a href="'.base_url().'Outsource/PO_datarevisi/3/'. $dataProject_Order->id_po.'" class="btn btn-primary m-t-10">Revisi</a>';        
                                        // }
                                    if($fileupload!=''){

                                        }else{
                                            // echo '<form action="'.base_url().'Outsource/ProsesUploadDokumen" method="post" enctype="multipart/form-data" data-toggle="tooltip" title="Upload PO" data-placement="bottom">
                                            //                 <div class="input-group m-t-10">
                                            //                     <input type="hidden" name="id" value="'. ($dataProject_Order->idporev==""?$dataProject_Order->id_po:$dataporev->id_po) .'">
                                            //                     <div class="custom-file">
                                            //                         <input type="file" class="custom-file-input" name="file_upload" id="inputGroupFile04">
                                            //                         <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                            //                     </div>
                                            //                     <div class="input-group-append">
                                            //                         <button class="btn btn-green1" type="submit">Upload</button>
                                            //                     </div>
                                            //                 </div>
                                            //             </form> ';
                                        } 
                                    } 
                                } ?>
                                    </p>
                                    
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