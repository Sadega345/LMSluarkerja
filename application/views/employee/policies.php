
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu">Informasi Organisasi / Kebijakan</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-9 col-12">
                                   <h5 class="fz-aktivitasabsensi">Kebijakan</h5>
                               </div>
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Jenis Kebijakan</th>
                                            <th>Nama Kebijakan</th>
                                           <!--  <th>Departemen</th> -->
                                            <th>Mulai Berlaku</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataPolicies->result() as $dataPolicies ) { ?>
                                            <tr>
                                                <td>
                                                    <div class="break-word">
                                                        <?php echo $dataPolicies->desPolicetype; ?>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <div class="break-word">
                                                        <?php echo $dataPolicies->judul; ?>
                                                    </div>
                                                </td>
                                                <!-- <td>
                                                    <div class="break-word">
                                                        <?php //echo $dataPolicies->desDepartemen; ?>
                                                    </div>
                                                </td> -->
                                                <td>
                                                    <div class="break-word">
                                                        <?php echo strftime("%d %B %Y",strtotime($dataPolicies->tanggal_mulai)); ?>
                                                    </div>
                                                    
                                                </td>
                                                <?php if ($dataPolicies->status == '1'){ ?>
                                                    <td>
                                                        <label class="Rectangle-permanent">Aktif</label>
                                                    </td>
                                                <?php }else{ ?>
                                                    <td>
                                                    	<label class="Rectangle-resign">Tidak Aktif</label>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                	<a href="javascript:;" onclick="view('<?php echo $dataPolicies->id_kebijakan; ?>')"class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">Lihat
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
            <div class="modal fade bd-example-modal-lg" id="view" >
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content" >
                    <div class="modal-body" >
                         <div class="row m-t-10">
                            <div class="col-lg-3 col-md-3">
                                <label class="fz-18">Detail Kebijakan</label>
                            </div>
                            <div class="col-md-3 col-3">
                            </div>
                            <div class="col-lg-6 col-md-6" align="right">
                              <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                            </div>
                        </div>
                        <div id="viewkebijakan">
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <script type="text/javascript">
                 $(document).ready(function(){
                    $('#view').modal({backdrop: 'static', keyboard: false});
                })
                function view(a){
                      $.ajax({
                        url: "<?php echo base_url();?>Employee/viewPolicies/"+a,
                        // data: {nik:a},
                        type: "post",
                        // dataType:'json',
                        success: function (response) {
                           // alert('masuk');
                            $('#view').modal('show');
                            $('#viewkebijakan').html(response);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }
                    });
                }
            </script>
         