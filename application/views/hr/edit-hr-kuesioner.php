
            <?php  
                $a=explode("-", $datakuesionerdetail->tanggal_mulai); 
                $b=explode("-", $datakuesionerdetail->tanggal_selesai); 
                $tgl_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                $tgl_selesai=$b[2].'/'.$b[1].'/'.$b[0]; 
            ?>
            
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    
                    <div class="container">
                        <!-- <form action="<?php echo base_url()?>HR/ProsesEditKuesioner" method="post"> -->
                            <div class="row m-t-10">
                                <input type="hidden" name="id_questioner" class="form-control" value="<?php echo $datakuesionerdetail->id_questioner ?>">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14">Judul Kuesioner</p>
                                    <p class="d-sm-none fz-14">Judul Kuesioner</p>
                                </div>
                                <div class="col-md-4 col-12">
                                    <input type="text" autocomplete="off" name="judul" class="form-control fcheight" value="<?php echo $datakuesionerdetail->judul ?>" required>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14">Tanggal Mulai</p>
                                    <p class="d-sm-none fz-14">Tanggal Mulai</p>
                                </div>
                                <div class="col-md-4 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control tglvaledit fcheight" id="startformedit" data-id="startdateedit" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" value="<?php echo $tgl_mulai ?>">
                                        </div>
                                        
                                        <!-- <span class="input-group-addon text-center mb-3" style="width: 40px;">s/d</span> -->
                                        
                                        <!-- <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control tglvaledit" id="endformedit" name="" data-id="enddateedit" data-date-format="yyyy-mm-dd" required autocomplete="off" value="<?php //echo $tgl_selesai ?>">
                                        </div> -->
                                    </div>
                                </div>
                                <input type="hidden" name="tanggal_mulai" id="startdateedit" value="<?php echo $datakuesionerdetail->tanggal_mulai ?>">
                                <!-- <input type="hidden" name="tanggal_selesai" id="enddateedit" value="<?php //echo $datakuesionerdetail->tanggal_selesai ?>"> -->
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14">Tanggal Akhir</p>
                                    <p class="d-sm-none fz-14">Tanggal Akhir</p>
                                </div>
                                <div class="col-md-4 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control tglvaledit fcheight" id="endformedit" name="" data-id="enddateedit" data-date-format="yyyy-mm-dd" required autocomplete="off" value="<?php echo $tgl_selesai ?>">
                                        </div>
                                        <input type="hidden" name="tanggal_selesai" id="enddateedit" value="<?php echo $datakuesionerdetail->tanggal_selesai ?>">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14">Deskripsi</p>
                                    <p class="d-sm-none fz-14">Deskripsi</p>
                                </div>
                                <div class="col-md-9 col-12">
                                    <textarea class="form-control summernote" name="deskripsi" required><?php echo $datakuesionerdetail->deskripsi ?></textarea>
                                </div>
                            </div>
                            <div id="dynamic_field">
                                <div class="row m-t-10">
                                    <div class="col-md-6 col-12" >
                                        <label class="hidden-sm fz-18">Pertanyaan</label>
                                        <label class="d-sm-none fz-18">Pertanyaan</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <?php 
                                            $num=0; 
                                            echo '
                                                    <button type="button" name="add" id="add" class="btn Rectangle-diterima"><img src="'.base_url().'assets/img/Plus.svg" class="padd-right-5">Tambah Pertanyaan</button>

                                                ';
                                        ?>

                                    </div>
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12" >
                                        <p class="hidden-sm fz-14">Pertanyaan</p>
                                        <p class="d-sm-none fz-14">Pertanyaan</p>
                                    </div>
                                    <div class="col-md-9 col-10">
                                         <?php
                                            $numb=0; 
                                            foreach ($datakuesionerdetailpertanyaan->result() as $dt) { 
                                                if($numb>0){
                                                    echo ' <div class="col-md-3 col-4 m-t-10"  align="right">
                                                        </div>';

                                                }
                                                echo '<div class="row">
                                                		<div class="col-md-11 col-10">';
                                            ?>
                                            <input type="hidden" name="id[]" value="<?php echo $dt->id_questioner_pertanyaan ?>">
                                            
                                            <input type="text" class="form-control name_list fcheight" placeholder="pertanyaan" name="id_questioner_pertanyaan[]" aria-describedby="sizing-addon2" value="<?php echo $dt->pertanyaan ?>">
                                            
                                        <?php 
                                            
                                               echo '
                                               		</div>
                                                        <div class="col-md-1 col-2">
                                                           <a href="'.base_url().'HR/HapusKuesionerPertanyaan/'.$dt->id_questioner_pertanyaan.'/'.$datakuesionerdetail->id_questioner.'"> <button type="button" onClick="return confirm(\'Anda yakin ingin menghapus data ini? \')"  name="remove" class="btn btn-aksi btn_remove"><img src="'.base_url().'assets/img/Delete.svg"></button> </a>
                                                        </div>
                                                    </div>';
                                            
                                        ?>
                                      
                                    <?php $numb++; } ?>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12 m-t-10" >
                                    <fz-14 class="hidden-sm fz-14">Link Google Form</fz-14>
                                    <fz-14 class="d-sm-none fz-14">Link Google Form</fz-14>
                                </div>
                                <div class="col-md-9 col-12">
                                	<div class="row">
                                		<div class="col-md-11">
                                			<input type="text" name="link_google_doc" class="form-control fcheight" value="<?php echo $datakuesionerdetail->link_google_doc  ?>">
                                		</div>
                                	</div>
                                    
                                </div>
                            </div>

                    </div>
                
                    
                </div> 
            </div>
            <script>  
                 $(document).ready(function(){  
                      var i=1;  
                      $('#add').click(function(){  
                           i++;  
                           $('#dynamic_field').append('<div class="row" id="row'+i+'">'+
                            '<div class="col-md-3 col-4 m-t-10"  align="right">'+
                            '</div>'+
                            '<div class="col-md-9 col-10 m-t-10">'+
                            	'<div class="row">'+
	                            	'<div class="col-md-11 col-10">'+
		                                '<input type="text" class="form-control name_list fcheight" placeholder="pertanyaan" name="id_questioner_pertanyaan2[]" aria-describedby="sizing-addon2">'+
		                            '</div>'+

		                            
	                            	'<div class="col-md-1 col-2 m-t-10">'+
	                              		'<button type="button" name="remove" id="'+i+'" class="btn btn-aksi btn_remove"><img src="<?php echo base_url() ?>assets/img/Delete.svg"></button>'+
	                            	'</div>'+
	                            '</div>'+
	                        '</div>');
                      });  
                      $(document).on('click', '.btn_remove', function(){  
                           var button_id = $(this).attr("id");   
                           $('#row'+button_id+'').remove();  
                      });
                 });  
                 </script>


         
                        
         