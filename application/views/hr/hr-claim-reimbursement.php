
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="tittle-menu"> Keuangan / Claim Reimbursement</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <!-- <div class="card "> -->
                         <div class="body">
                            
                             <div class="container">
                                <form action="<?php echo base_url()?>HR/HRClaimReimbursement" method="post">
                                  <div class="row m-b-20">
                                    <div class="col-md-2 m-t-10">   
                                        <h5 class="fz-aktivitasabsensi">Search Filter</h5>
                                    </div>
                                    <div class="col-md-10" align="right">
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
                                  <div class="row rowclient m-t-10" id="rowclient">
                                    <div class="col-md-2 m-t-10">
                                        <label>Perusahaan</label>        
                                    </div>
                                    <div class="col-md-4" align="left">
                                        <select name="id_master_perusahaan" id="selclient" class="form-control select2 selclient" >
                                            <option selected value=""> Pilih Semua Perusahaan </option>
                                            <?php
                                            foreach($dataClient->result() as $dtc){
                                                ?>
                                                <option value="<?php echo $dtc->id_master_perusahaan; ?>" <?php echo $this->input->post('id_client')==$dtc->id_master_perusahaan?'selected':'';  ?>> <?php echo $dtc->nama_perusahaan; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-2 m-t-10">
                                        <label>Status</label>        
                                    </div>
                                    <div class="col-md-4" align="left">
                                        <select name="status" class="form-control fcheight">
                                            <option value="">Lihat semua</option>
                                             <option value="0" <?php echo $this->input->post('status')=='0'?'selected':''?> >Menunggu</option>
                                              <option value="1" <?php echo $this->input->post('status')=='1'?'selected':''?>>Disetujui </option>
                                               <option value="2" <?php echo $this->input->post('status')=='2'?'selected':''?>>Ditolak</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row rowdept m-t-10" id="rowdept">
                                    <div class="col-md-2 m-t-10" >
                                        <label>Departemen </label>        
                                    </div>
                                     <div class="col-md-4" >
                                        <select name="id_departemen" id="seldept" class="form-control  seldept" >
                                            <option selected value=""> Pilih Semua Departemen </option>
                                            <?php
                                            foreach($dataDeptC->result() as $dtd){
                                                ?>
                                                <option value="<?php echo $dtd->id_departemen; ?>" <?php echo $this->input->post('id_departemen')==$dtd->id_departemen?'selected':'';  ?>> <?php echo $dtd->nama_departemen; ?></option>
                                                <?php
                                            } 
                                            ?>
                                        </select>
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
                                <h6 class="hitam">Claim Reimbursement</h6>
                               </div> 
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                     <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Departemen</th>
                                            <th>Tanggal Dikeluarkan</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 	foreach ($dataKlaim->result() as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->nik; ?></td>
                                            <td><?php echo $dt->nama_lengkap; ?></td>
                                            <td><?php echo $dt->desDepartemen; ?></td>
                                            <td><?php echo strftime(" %d %B %Y",strtotime($dt->tanggal)); ?></td>
                                            <td>Rp. <?php echo number_format($dt->total,0,'.','.'); ?></td>
                                            <td><?php echo $dt->deskripsi; ?>	</td>
                                            <td>
                                            	<?php 	 
                                            		if($dt->status=='0'){
                                            			echo ' <button class="btn Rectangle-menunggu" style="cursor: default">Menunggu</button>';
                                            		}else if($dt->status=='1'){
                                            			echo ' <button class="btn Rectangle-diterima" style="cursor: default">Disetujui</button>';
                                            		}else if($dt->status=='2'){
                                            			echo ' <button class="btn Rectangle-ditolak" style="cursor: default">Ditolak</button>';
                                            		}else if($dt->status=='3'){
                                            				echo ' <button class="btn btn-blue2" style="cursor: default">Cair</button>';
                                            		}
                                            	?>
                                               
                                            </td>
                                            <td>
                                                <a href="javascript:;" onclick="viewreimburse('<?php echo $dt->id_claim_remburse ?>')" class="btn btn-aksi"><img src="<?php echo base_url()?>assets/img/View.svg" class="padd-right-5">Lihat</a>
                                                <?php if($dt->status=='1'){ ?>
                                                    <a href="<?php echo base_url()?>HR/cetakClaimReimbursement/<?php echo $dt->id_claim_remburse ?>" target="_blank" class="btn btn Rectangle-generate">Cetak</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php 	} ?>

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
                        <div id="viewreimburse">
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <script type="text/javascript">
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

                function viewreimburse(a){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/HRClaimReimbursementDetail/"+a,
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');
                                $('#view').modal('show');
                                $('#viewreimburse').html(response);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus, errorThrown);
                            }
                        });
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
            </script>
         