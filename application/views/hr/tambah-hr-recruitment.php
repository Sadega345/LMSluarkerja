
            
            
                       
            <div class="container">
                
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 col-12 m-t-20" >
                                <p class="fz-14-judul">Nama Pekerjaan </p>
                            </div>
                            <div class="col-md-4 col-12">
                                <select name="id_master_jenis_project" id="pekerjaan" class="form-control  fcheight" data-placeholder="Pilih Pekerjaan" tabindex="2" required>
                                        <option value="">--Pilih Pekerjaan--</option>
                                <?php
                                    foreach($datapekerjaan->result() as $dt){ ?>
                                        <option value="<?php echo $dt->id_master_jenis_project;?>"><?php echo $dt->jenis_project;?></option>
                                <?php
                                    }
                                ?>  
                                </select>
                            </div>
                        </div>
                        <div class="row m-t-10">
                            <div class="col-md-3 col-12 m-t-20" >
                                <p class="fz-14-judul">Waktu </p>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <div class="input-group mb-3" style="display: contents;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" class="input-sm form-control tglval fcheight" id="start" data-id="startdate" name="" data-date-format="yyyy-mm-dd" required autocomplete="off">
                                    </div>
                                    
                                    <span class="input-group-addon text-center m-t-20" style="width: 40px;">-</span>
                                    
                                    <div class="input-group mb-3" style="display: contents;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" class="input-sm form-control tglval fcheight" id="end" name="" data-id="enddate" data-date-format="yyyy-mm-dd" required autocomplete="off">
                                    </div>
                                </div>
                                <input type="hidden" name="tanggal_mulai" id="startdate">
                                <input type="hidden" name="tanggal_selesai" id="enddate">
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-md-4">
                            <label class="fz-18">Jadwal Test & Interview</label>
                        </div>
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-3" align="left">
                            <button type="button" name="add" id="add" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/Plus.svg" class="padd-right-5">Tambah Jadwal</button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div id="dynamic_field">
                        </div>     
                    </div>     
                    <hr>   

                    <div class="row m-t-10">
                        <div class="col-md-6 ">
                            <p class="fz-14-judul m-t-10">Requirement </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control summernote"  name="requirement" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <p class="fz-14-judul m-t-10">Jobdesc </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control summernote" rows="5" name="jobdesc"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>          

            </div>
        <script type="text/javascript">
            $(document).ready(function(){
                
                $("#selclient").change(function(){
                    pilihLokasi(this.value);
                });
            });
            function pilihLokasi(idclient){
                if(idclient!=""){
                    $("#rowsumber").hide();
                    $("#rowjabatan").hide();
                    $("#rowloker").hide();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>HR/ambilLokasi", 
                        data: {id_client : idclient}, 
                        dataType: "json",
                        beforeSend: function(e) {
                            if(e && e.overrideMimeType) {
                              e.overrideMimeType("application/json;charset=UTF-8");
                            }
                        },
                        success: function(response){ 
                            $("#rowlokasi").show();
                            $("#lokasi").html(response.data_lokasi).show();
                            $("#lokasi").select2();
                        },
                        error: function (xhr, ajaxOptions, thrownError) { 
                            alert(thrownError); 
                        }
                    }); 
                } else {
                    $("#rowlokasi").hide();
                }
            }
            
        </script>

       <!--  <script type="text/javascript">
            $('.input-daterange input').each(function() {
                //$(this).datepicker('clearDates');
                $(this).datepicker({
                    dateFormat:'dd/mm/yy'
                });
            });
        </script>
 -->        
        <script>  
            $(document).ready(function(){  
              var i=1;  
                $('#add').click(function(){  
                   i++;  
                   $('#dynamic_field').append('<div class="" id="row'+i+'">'+
                    '<div class="row m-t-10">'+
                    '<div class="col-md-2 col-12 m-t-20" >'+
                        '<p class="fz-14-judul">Tanggal </p>'+
                    '</div>'+
                    '<div class="col-md-4 col-12">'+
                       ' <input type="text" name="" class="form-control datepicker2 tglval fcheight" required autocomplete="off"  data-id="datepicker2'+i+'">'+
                        '<input type="hidden" name="tanggal[]" id="datepicker2'+i+'">'+
                    '</div>'+
                    '<div class="col-md-2 col-12 m-t-20">'+
                        '<p class="fz-14-judul">Jenis Test </p>'+
                    '</div>'+
                    '<div class="input-group mb-3" style="display: contents;">'+

                        '<input type="text" name="jenis[]" class="form-control fcheight padd-right-5">&nbsp;&nbsp;'+
                        '<div class="input-group-prepend m-t-10">'+
                            '<span class=""><button type="button" name="remove" id="'+i+'" class="btn btn-aksi btn_remove"><img src="https://Natadev.id/Penata/assets/img/Delete.svg" class=""></button></span>'+
                        '</div>'+
                    '</div>'+
                    
                    '</div>'+
                    '</div>');  
                   $('.datepicker2').datepicker({
			                showButtonPanel: true,
			                changeMonth: true,
			                changeYear: true,
			                dateFormat : 'dd/mm/yy'
			            }).on( "change", function() {
			                var datanya = $(this).data("id");
			            var date = $(this).datepicker("getDate");
			            //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
			            $("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
			        //from.datepicker( "option", "maxDate", getDate( this ) );
			        });
                });  
                $(document).on('click', '.btn_remove', function(){  
                   var button_id = $(this).attr("id");   
                   $('#row'+button_id+'').remove();  
                });
            });  
         </script>
         <script type="text/javascript">
         	$(document).ready(function(){
         		 $("#loading").hide();
         		 $("#rowdivisi").hide();

         	});
         	  $("#departemen").change(function(){
            //alert(this.value);

		            $("#divisi").hide();
		            $("#loading").show();
		            $.ajax({
		              type: "POST",
		              url: "<?php echo base_url(); ?>HR/ambilDivisi", 
		              data: {departemen : this.value}, 
		              dataType: "json",
		              beforeSend: function(e) {
		                if(e && e.overrideMimeType) {
		                  e.overrideMimeType("application/json;charset=UTF-8");
		                }
		              },
		              success: function(response){
		                $("#rowdivisi").show();
		                $("#loading").hide(); 
		                $("#divisi").html(response.data_divisi).show();
		              },
		              error: function (xhr, ajaxOptions, thrownError) { 
		                alert(thrownError); 
		              }
		            }); 
		            
		        });
         </script>