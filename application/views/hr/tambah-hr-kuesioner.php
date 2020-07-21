
            
            
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    
                        
                    <div class="container">
                        
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14 m-t-10">Judul Kuesioner</p>
                                    <p class="d-sm-none fz-14 m-t-10">Judul Kuesioner</p>
                                </div>
                                <div class="col-md-4 col-12">
                                    <input type="text" name="judul" autocomplete="off" class="form-control fcheight" required>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14 m-t-10">Tanggal Mulai</p>
                                    <p class="d-sm-none fz-14 m-t-10">Tanggal Mulai</p>
                                </div>
                                <div class="col-md-4 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" class="input-sm form-control tglval fcheight" id="startform" data-id="startdate" data-date-format="yyyy-mm-dd" required autocomplete="off">
                                        </div>
                                        
                                        <!-- <span class="input-group-addon text-center mb-3" style="width: 40px;">s/d</span>
                                        
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" autocomplete="off" class="input-sm form-control tglval fcheight" id="endform" data-id="enddate" data-date-format="yyyy-mm-dd" required  >
                                        </div> -->
                                    </div>
                                </div>
                                <input type="hidden" name="tanggal_mulai" id="startdate">
                                <!-- <input type="hidden" name="tanggal_selesai" id="enddate"> -->
                            </div>

                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14 m-t-10">Tanggal Akhir</p>
                                    <p class="d-sm-none fz-14 m-t-10">Tanggal Akhir</p>
                                </div>
                                <div class="col-md-4 col-12" >
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <div class="input-group mb-3" style="display: contents;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="text" autocomplete="off" class="input-sm form-control tglval fcheight" id="endform" data-id="enddate" data-date-format="yyyy-mm-dd" required  >
                                        </div>
                                    </div>
                                    <input type="hidden" name="tanggal_selesai" id="enddate">
                                </div>
                            </div>
                            
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14">Deskripsi</p>
                                    <p class="d-sm-none fz-14">Deskripsi</p>
                                </div>
                                <div class="col-md-9 col-12">
                                    <textarea class="form-control summernote" name="deskripsi" required></textarea>
                                </div>
                            </div>
                            <div id="dynamic_field">
                                <div class="row m-t-10">
                                    <div class="col-md-6 col-12" >
                                        <label class="hidden-sm fz-18">Pertanyaan</label>
                                        <label class="d-sm-none fz-18">Pertanyaan</label>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                         <button type="button" name="add" id="add" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/Plus.svg" class="padd-right-5">Tambah Pertanyaan</button>
                                    </div>
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12" >
                                        <p class="hidden-sm fz-14 m-t-10">Pertanyaan</p>
                                        <p class="d-sm-none fz-14 m-t-10">Pertanyaan</p>
                                    </div>
                                    <div class="col-md-8 col-10">
                                       <input type="text" autocomplete="off" class="form-control name_list fcheight" placeholder="pertanyaan" name="id_questioner_pertanyaan[]" aria-describedby="sizing-addon2">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-3 col-12" >
                                    <p class="hidden-sm fz-14 m-t-10">Link Google Form</p>
                                    <p class="d-sm-none fz-14 m-t-10">Link Google Form</p>
                                </div>
                                <div class="col-md-8 col-12">
                                    <input type="text" name="link_google_doc" class="form-control fcheight">
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
                            '<div class="col-md-8 col-10 m-t-10">'+
                                '<input type="text" autocomplete="off" class="form-control name_list fcheight" placeholder="pertanyaan" name="id_questioner_pertanyaan[]" aria-describedby="sizing-addon2">'+
                            '</div>'+

                            '<div class="col-sm-1 col-2 m-t-10">'+
                              '<button type="button" name="remove" id="'+i+'" class="btn btn-aksi btn_remove"><img src="<?php echo base_url() ?>assets/img/Delete.svg"></button>'+
                            '</div>'+
                            '</div>');  
                      });  
                      $(document).on('click', '.btn_remove', function(){  
                           var button_id = $(this).attr("id");   
                           $('#row'+button_id+'').remove();  
                      });
                });  
            </script>


         
                        
         