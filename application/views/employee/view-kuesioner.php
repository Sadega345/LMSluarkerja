           
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pengumuman / Kuersioner</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-9 text-center col-5" >
                                 <h6 class="tittle-box">Kuesioner</h6>
                            </div>
                            <div class="col-md-3 col-3">
                                <a href="<?php echo base_url()?>Employee/kuesioner" class="btn btn-darkblue">Kembali</a>
                            </div>
                        </div>
                        
                        <?php $tmparray = array(); ?>
                        <?php foreach ($dataQuesionerLogRow->result() as $log){ 
                           $opsi = 0;
                           if ($log->opsi_istimewa == '1') {
                               $opsi = 5;
                           }elseif ($log->opsi_memuaskan == '1') {
                               $opsi = 4;
                           }elseif($log->opsi_cukup == '1'){
                                $opsi= 3;
                           }elseif($log->opsi_buruk == '1'){
                                $opsi= 2;
                           }elseif($log->opsi_buruk_sekali == '1'){
                                $opsi= 1;
                           }
                           $tmparray['r'.$log->id_questioner_pertanyaan] = $opsi;
                        ?>
                            
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-3 col-5"  align="right">
                                <label>Judul Kuesioner </label>
                            </div>
                            <div class="col-md-9 col-7">
                                <?php echo $datakuesioner->judul; ?>
                            </div>
                        </div>
                       <!--  <div class="row">
                           <div class="col-md-3 col-5"  align="right">
                                <label>Departemen</label>
                            </div>
                            <div class="col-md-9 col-7">
                                <p><?php// echo $datakuesioner->deskripsi_departemen; ?></p>
                            </div>
                        </div> -->
                        
                        <div class="row">
                            <div class="col-md-3 col-5"  align="right">
                                <label>Tanggal Mulai</label>
                            </div>
                            <div class="col-md-9 col-7">
                                <p><?php echo strftime("%d %B %Y",strtotime($datakuesioner->tanggal_mulai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-5"  align="right">
                                <label>Tanggal Berakhir</label>
                            </div>
                            <div class="col-md-9 col-7">
                                <p><?php echo strftime("%d %B %Y",strtotime($datakuesioner->tanggal_selesai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-5"  align="right">
                                <label>Deskripsi</label>
                            </div>
                            <div class="col-md-9 col-7">
                                <p><?php echo $datakuesioner->deskripsi; ?></p>
                            </div>
                        </div>
                        <?php 
                        $no=1;
                            foreach ($datapertanyaankuesioner->result() as $dt) { 
                        ?>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label><?php echo  $no."&nbsp;".$dt->pertanyaan; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4">
                            
                            <div class='rating-stars text-center' >
                                <ul id='stars' class="rstar" data-id="<?php echo $dt->id_questioner_pertanyaan ?>">
                                  <li class='star <?php if($tmparray['r'.$dt->id_questioner_pertanyaan] >= 1 ){ echo "selected"; } ?>' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star <?php if($tmparray['r'.$dt->id_questioner_pertanyaan] >= 2 ){ echo "selected"; } ?>' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star <?php if($tmparray['r'.$dt->id_questioner_pertanyaan] >= 3 ){ echo "selected"; } ?>' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star <?php if($tmparray['r'.$dt->id_questioner_pertanyaan] >= 4 ){ echo "selected"; } ?>' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star <?php if($tmparray['r'.$dt->id_questioner_pertanyaan] >= 5 ){ echo "selected"; } ?>' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <?php $no++;} ?>
                        <br>
                    </div>
                </div>
                    
                </div> 
            </div>


         