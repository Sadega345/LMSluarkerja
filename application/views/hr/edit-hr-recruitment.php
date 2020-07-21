
            <?php  
                $a=explode("-", $dataloker->tanggal_mulai); 
                $b=explode("-", $dataloker->tanggal_selesai); 
                $tgl_mulai=$a[2].'/'.$a[1].'/'.$a[0]; 
                $tgl_selesai=$b[2].'/'.$b[1].'/'.$b[0]; 
            ?>
                            <div class="container">
                              <input type="hidden" name="id_loker" value="<?php echo $dataloker->id_loker ?>">
                              <div class="row  m-t-10">
                                <div class="col-md-3 m-t-20" >
                                    <p class="fz-14-judul">Nama Pekerjaan </p>
                                </div>
                                <div class="col-md-4 ">
                                       <select name="id_master_jenis_project" class="form-control  select2 fcheight" data-placeholder="Pilih Pekerjaan" tabindex="2" required>
                                                <option value="">--Pilih Pekerjaan--</option>
                                        <?php
                                            foreach($datapekerjaan->result() as $dt){ ?>
                                                <option value="<?php echo $dt->id_master_jenis_project;?>" <?php echo $dt->id_master_jenis_project==$dataloker->id_master_jenis_project?'selected':''; ?>><?php echo $dt->jenis_project;?></option>
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
                                                <input type="text" class="input-sm form-control tglval fcheight" id="start" data-id="startdate" name="" data-date-format="yyyy-mm-dd" required autocomplete="off" value="<?php echo  $tgl_mulai ?>">
                                            </div>
                                            
                                            <span class="input-group-addon text-center m-t-20" style="width: 40px;">-</span>
                                            
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control tglval fcheight" id="end" name="" data-id="enddate" data-date-format="yyyy-mm-dd" required autocomplete="off" value="<?php echo  $tgl_selesai ?>">
                                            </div>
                                        </div>
                                        <input type="hidden" name="awal" id="startdate" value="<?php echo $dataloker->tanggal_mulai ?>">
                                        <input type="hidden" name="akhir" id="enddate" value="<?php echo $dataloker->tanggal_selesai?>">
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-4">
                                        <label class="fz-18">Jadwal Test & Interview</label>
                                    </div>
                                    <div class="col-md-5">
                                    </div>
                                    <div class="col-md-3" >
                                        <button type="button" name="add" id="add" class="btn Rectangle-diterima"><img src="<?php echo base_url() ?>assets/img/Plus.svg" class="padd-right-5">Tambah Jadwal</button>
                                    </div>
                                </div>
                                <div id="dynamic_field">
                                    <?php if($datajadwal->num_rows()>0){
                                    foreach ($datajadwal->result() as $dt) { ?>
                                        <?php  
                                            $b=explode("-", $dt->tanggal); 
                                            $tanggal=$b[2].'/'.$b[1].'/'.$b[0]; 
                                        ?>
                                        <div class="row m-t-10">
                                          <div class="col-md-2 m-t-20" >
                                              <p class="fz-14-judul">Tanggal </p>
                                          </div>
                                          <div class="col-md-4 col-12">
                                             <input type="text" name="" class="form-control datepicker2 tglval fcheight" data-id="datepicker2" value="<?php echo $tanggal ?>" autocomplete="off" required>
                                              <input type="hidden" name="tanggal[]" value="<?php echo $dt->tanggal ?>"  id="datepicker2">
                                          </div>
                                          <div class="col-md-2 m-t-20" >
                                              <p class="fz-14-judul">Jenis Test</p>
                                          </div>
                                          <div class="input-group mb-3" style="display: contents;">
                                              <input type="text" name="jenis[]" class="form-control fcheight padd-right-5" value="<?php echo $dt->jenis ?>">&nbsp;&nbsp;
                                              <div class="input-group-prepend m-t-10">
                                                  <span class=""><button type="button" onClick='hapus(<?php echo $dt->id_loker_jadwal ?>,<?php echo $dt->id_loker ?>)' class="btn btn-aksi btn_remove"><img src="<?php echo base_url() ?>assets/img/Delete.svg" class=""></button></span>
                                              </div>
                                          </div>
                                        </div>
                                    <?php } } ?>
                                </div>
                                <hr>
                                <div class="row m-t-10">
                                    <div class="col-md-6 ">
                                        <p class="fz-14-judul m-t-10">Requirement </p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea class="form-control summernote" rows="5" name="requirement"><?php echo $dataloker->requirement ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <p class="fz-14-judul m-t-10">Jobdesc </p>
                                        <div class="row">
                                            <div class="col-md-12">
                                              <textarea class="form-control summernote" rows="5" name="jobdesc"><?php echo $dataloker->jobdesc ?></textarea>
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
                 function hapus(id,$id_loker){
                          const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                              confirmButton: 'btn btn-blue1',
                              cancelButton: 'btn btn-red1'
                            },
                            buttonsStyling: false,
                          });
                             
                                  swalWithBootstrapButtons.fire({
                                      title: "Apakah Anda yakin?",
                                      text: "Ingin menghapus data ini? ",
                                      type: "warning",
                                      showCancelButton: true,
                                      confirmButtonColor: "#dc3545",
                                      confirmButtonText: "Ya",
                                      cancelButtonText: "Tidak",
                                      //closeOnConfirm: false,
                                      //closeOnCancel: false,
                                      reverseButtons: true,
                                      allowOutsideClick: false
                                  }).then((result) => {
                                      if (result.value) {
                                         $.ajax({
                                              type: 'POST',
                                              url: "<?php echo base_url()?>HR/HapusJadwal/"+id,
                                             success: function(data) {
                                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                                  var curdate = new Date();
                                                  var format = formatDate(curdate);
                                                  var status = 'signout';
                                                  var exp = new Date();
                                                  //clearTimeout(t);
                                                  seconds = 0; minutes = 0; hours = 0;
                                                  setCookie('time', "00:00:00", exp);
                                                  setCookie('absen', "00:00:00", exp);
                                                  //update();
                                                  //waktu = window.setInterval(update, 1000);
                                                  deleteCookie('lunch');
                                                  deleteCookie('break');
                                                  deleteCookie('extra');
                                                  deleteCookie('time');
                                                  deleteCookie('absen');
                                                  setTimeout(function(){
                                                          window.location.href="<?php echo base_url()?>HR/HRRecruitment";
                                                       
                                                  },2000);
                                              }
                                          });
                                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                                      }
                                  });
                                }
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
                        '<input type="hidden" name="tanggalbaru[]" id="datepicker2'+i+'">'+
                    '</div>'+
                    '<div class="col-md-2 col-12 m-t-20">'+
                        '<p class="fz-14-judul">Jenis Test </p>'+
                    '</div>'+
                    '<div class="input-group mb-3" style="display: contents;">'+

                        '<input type="text" name="jenisbaru[]" class="form-control fcheight padd-right-5">&nbsp;&nbsp;'+
                        '<div class="input-group-prepend m-t-10">'+
                            '<span class=""><button type="button" name="remove" id="'+i+'" class="btn btn-aksi btn_remove"><img src="https://Natadev.id/Penata/assets/img/Delete.svg" class=""></button></span>'+
                        '</div>'+
                    '</div>'+
                    
                    '</div>'+
                    '</div>'); 


                //    $('#dynamic_field').append('<div class="" id="row'+i+'">'+
                //     '<div class="row m-t-10">'+
                //     '<div class="col-md-3 col-12 "  >'+
                //         '<label class="float-right hidden-sm">Tanggal </label>'+
                //                     '<label class="d-sm-none">Tanggal </label>'+
                //     '</div>'+
                //     '<div class="col-md-4 col-12">'+
                //         '<input type="text" name="" class="form-control datepicker2 tglval" autocomplete="off" required  data-id="datepicker2'+i+'">'+
                //         '<input type="hidden" name="tanggalbaru[]" id="datepicker2'+i+'">'+
                //     '</div>'+
                // '</div>'+
                // '<div class="row m-t-10">'+
                //    '<div class="col-md-3 col-12 "  >'+
                //         '<label class="float-right hidden-sm">Jenis Test  & Interview </label>'+
                //                     '<label class="d-sm-none">Jenis Test  & Interview </label>'+
                //     '</div>'+
                //     '<div class="col-md-4 col-12">'+
                //         '<input type="text" name="jenisbaru[]" class="form-control">'+
                //     '</div>'+

                //     '<div class="col-sm-1">'+
                //       '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>'+
                //     '</div>'+
                //     '</div>'+
                //     '</div>');  
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
                $(document).on('click', '.btn_remove', function(){  
                   var button_id = $(this).attr("id");   
                   $('#row'+button_id+'').remove();  
                });
            });  
        </script>


         
                        
         