
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="tittle-menu"> Keuangan / Permohonan Overtime</h4>
                    </div>
                </div>
            </div>
            <!-- Pencarian -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <!-- <div class="card "> -->
                        <div class="body">
                            
                            <div class="container">
                                <form action="<?php echo base_url()?>HR/HRPermohonanOvertime" method="post">
                                  <div class="row m-b-20">
                                    <div class="col-md-2 m-t-10">   
                                        <h5 class="fz-aktivitasabsensi">Search Filter</h5>
                                    </div>
                                    <div class="col-md-10" align="right">
                                        <a href="<?php echo base_url() ?>HR/exportOvertime" >
                                            <button type="button" class="btn Rectangle-export col-md-3">
                                            
                                                <img src="<?php echo base_url() ?>assets/img/export.svg" class="padd-right-5">
                                               Export To Excel
                                              
                                            </button>
                                        </a>
                                        <button type="submit" class="btn Rectangle-cari col-md-2">
                                        
                                            <i class="fa fa-search padd-right-5 putih" ></i>
                                           Cari
                                          
                                        </button>
                                    </div>
                                  </div>

                                  <div class="row ">
                                      <div class="col-md-2 m-t-10">
                                          <label>NIK</label>        
                                      </div>
                                      <div class="col-md-4" align="left">
                                         <input type="text" name="nik" class="form-control fcheight" value="<?php echo $this->input->post('nik') ?>">
                                      </div>

                                      <!-- Nama Pegawai -->
                                      <div class="col-md-2 m-t-10">
                                          <label>Nama Pegawai</label>        
                                      </div>
                                      <div class="col-md-4" align="left">
                                         <input type="text" name="nama_lengkap" class="form-control fcheight" value="<?php echo $this->input->post('nama_lengkap') ?>">
                                      </div>
                                  </div>
                                <div class="row m-t-10">
                                    <!-- Status -->
                                    <div class="col-md-2 m-t-10">
                                        <label>Status</label>        
                                    </div>
                                    <div class="col-md-4" align="left">
                                        <select name="status" class="form-control fcheight">
                                            <option value="">Lihat semua</option>
                                             <option value="0" <?php echo $this->input->post('status')=='0'?'selected':''?> >Pengajuan</option>
                                              <option value="1" <?php echo $this->input->post('status')=='1'?'selected':''?>>Diterima </option>
                                               <option value="2" <?php echo $this->input->post('status')=='2'?'selected':''?>>Ditolak</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Tanggal Mulai -->
                                <div class="row m-t-10">
                                    <div class="col-md-2">
                                        <label class="float-left hidden-sm fz-14-judul m-t-20">Data Export </label>    
                                        <label class="d-sm-none fz-14-judul">Data Export </label>
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control tglval fcheight" data-id="startdate" id="start" data-date-format="dd-mm-yyyy" required autocomplete="off">
                                            </div>
                                            
                                            <span class="input-group-addon text-center mb-3 m-t-20" style="width: 40px;">-</span>
                                            
                                            <div class="input-group mb-3" style="display: contents;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="input-sm form-control tglval fcheight" data-id="enddate" id="end"  data-date-format="dd-mm-yyyy" required autocomplete="off">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </form>
                              
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>

            <div class="row clearfix m-t-20">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                               <div class="col-md-12 col-12">
                                <h6 class="hitam">Permohonan Overtime</h6>
                               </div> 
                            </div>
                                
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Keterangan</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ajax">
                                        <?php foreach ($dataOvertime->result() as $overtime ) { ?>
                                        <tr>
                                            <td><?php echo $overtime->nik ?></td>
                                            <td><?php echo $overtime->nama_lengkap ?></td>
                                            <td> <?php echo $overtime->keterangan ?></td>
                                            <td><?php echo strftime("%d %B %Y",strtotime($overtime->tanggal)); ?></td>
                                            <td>
                                                <?php 
                                                    if($overtime->status=='0'){
                                                        echo'<label class="btn Rectangle-probation">Pengajuan</label>';
                                                    }if ($overtime->status=='1') {
                                                        echo'<label class="btn Rectangle-permanent">Diterima</label>';
                                                    }if ($overtime->status=='2') {
                                                        echo'<label class="btn Rectangle-resign">Ditolak</label>';
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    
                                                    echo '<a href="javascript:;" onclick="view(\''.$overtime->id_overtime.'\')">
                                                    <button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat </button>
                                                    </a>';
                                                    
                                                ?>
                                                <?php if($overtime->status==0 || $overtime->status==2){ ?>
                                                <a href="javascript:;" class="btn btn-aksi" onclick="hapus('<?php echo $overtime->id_overtime ?>')"><img src="<?php   echo base_url() ?>assets/img/Delete.svg" class="padd-right-5"> Hapus</a>
                                                <?php } ?>
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

            <div class="modal fade bd-example-modal-lg" id="view" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                        <div id="viewovertime">
                        </div>
                    </div>
                  </div>
                </div>
            </div>

            <script type="text/javascript">
                // $.getScript('<?php //echo base_url() ?>assets/js/jquery.datetimepicker.full.js');
                $(function() {
                    $("#start, #end").datepicker({
                        showOn: "both",
                        beforeShow: customRange,
                        dateFormat: "dd M yy",
                    }).on( "change", function() {
                          var date = $("#start").datepicker("getDate");
                          var sdate = $.datepicker.formatDate("yy-mm-dd", date);
                          var date2 = $("#end").datepicker("getDate");
                          var edate = $.datepicker.formatDate("yy-mm-dd", date2);
                          permohonanover(sdate,edate);
                    });
                });
                function customRange(input) {
                    if (input.id == 'end') {
                        var minDate = new Date($('#start').val());
                        minDate.setDate(minDate.getDate() + 1)
                        return {
                            minDate: minDate
                        };
                    }
                }
                function permohonanover(val,val2){
                    $.ajax({
                        url: "<?php echo base_url();?>HR/HRPermohonanOvertimeAjax",
                        // data: {nik:a},
                        type: "post",
                        data: {
                            startdate:val,
                            enddate:val2
                        },
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#ajax').html(response);
                            // $('#viewovertime').html(response);

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                      });
                }
                $(document).ready(function(){
                    
                    $('#view').modal({backdrop: 'static', keyboard: false});
                })
                
                $(document).ready(function(){
                    <?php if($this->input->post('id_departemen')==""){ ?>
                        $(".rowdept").hide();    
                    <?php } ?>
                    
                    $(".selclient").change(function(){
                        pilihDept(this.value);
                        $(".selclient").val(this.value);
                    });
                     $(".seldept").change(function(){
                        $(".seldept").val(this.value);
                    });
                });

                function view(a){
                      $.ajax({
                        url: "<?php echo base_url();?>HR/viewPermohonanOvertime/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#view').modal('show');
                            $('#viewovertime').html(response);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                      });
                  }

                function effect_msg() {
                    // $('.msg').hide();
                    $('.msg').show(1000);
                    setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
                }

                function pilihDept(idclient){
                    if(idclient!=""){
                        $(".rowsumber").hide();
                        $(".rowjabatan").hide();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>HR/ambilDept", 
                            data: {id_client : idclient}, 
                            dataType: "json",
                            beforeSend: function(e) {
                                if(e && e.overrideMimeType) {
                                  e.overrideMimeType("application/json;charset=UTF-8");
                                }
                            },
                            success: function(response){ 
                                $(".rowdept").show();
                                $(".seldept").html(response.data_dept).show();
                                $(".seldept").select2();
                            },
                            error: function (xhr, ajaxOptions, thrownError) { 
                                alert(thrownError); 
                            }
                        }); 
                    } else {
                        $(".rowdept").hide();
                    }
                }

                function hapus(id){
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
                                url: "<?php echo base_url()?>HR/HapusOvertime/"+id,
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
                                //   deleteCookie('lunch');
                                //   deleteCookie('break');
                                //   deleteCookie('extra');
                                //   deleteCookie('time');
                                //   deleteCookie('absen');
                                    setTimeout(function(){
                                            window.location.href="<?php echo base_url()?>HR/HRPermohonanOvertime";
                                        
                                    },2000);
                                }
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                        }
                    });
                }
            </script>
         