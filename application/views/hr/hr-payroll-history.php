
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         
                         <p class="fz-36 barlow-bold">Keuangan / Payroll History</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <!-- <div class="card "> -->
                         <div class="body">
                            <!-- <h6 class="tittle-box">Search Filter</h6> -->
                            <form action="<?php echo base_url()?>HR/HRPayrollHistory" method="post">
                                <div class="container">
                                    <div class="row m-b-20">
                                        <div class="col-md-2 m-t-10">   
                                            <h6>Search Filter</h6>   
                                        </div>
                                        <div class="col-md-10" align="right">
                                            <!-- <button type="submit" class="btn Rectangle-cari col-md-2"><i class="fa fa-search" style="color: #ffff;"></i> Cari</button> -->

                                            <button type="submit" class="btn Rectangle-cari col-md-2">
                                            
                                                <i class="fa fa-search padd-right-5 putih" ></i>
                                               Cari
                                              
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2 m-t-10">
                                            <label>Bank Payroll* </label>        
                                        </div>
                                         <div class="col-md-4" align="left">
                                            <select name="bank_approve_history" class="form-control fcheight">
                                                    <option readonly value="">Pilih Bank</option>
                                                    <?php foreach($databank->result() as $row){?>
                                                    <option value="<?php echo $row->id_bank ?>"
                                                        <?php if ($row->id_bank == $this->input->post('bank_approve_history')){ ?>
                                                            <?php echo "selected='selected'"; ?>
                                                        <?php } ?>>
                                                        <?php echo $row->deskripsi; ?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                        </div>
                                         <div class="col-md-2 m-t-10">
                                            <label>Payroll Bulan* </label>        
                                        </div>
                                         <div class="col-md-4" align="left">
                                            <select name="tanggal_approve_history" class="form-control fcheight">
                                                <option readonly value="">Pilih Bulan Dan Tahun</option>
                                                <?php 
                                                $bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                                for($i=2000; $i<= date('Y');$i++){
                                                    $angka = 1;

                                                    foreach ($bulan as $bul){ 
                                                    $bulat = sprintf('%02d', $angka);
                                                        echo "<option value='".$i.'-'.$bulat."' ".($i.'-'.$bulat==date('Y-m')?'selected':'').">".$bul.'-'.$i."</option>";
                                                        $angka++;
                                                    } 
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row m-t-20">
                                        <!-- <div class="col-md-2 m-t-10">      
                                        </div>
                                        <div class="col-md-8" align="center">
                                            <button type="submit" class="btn btn-blue col-md-3">Cari</button>
                                        </div> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body">
                            <div class="row">
                               <div class="col-md-12 col-12" >
                                   <h6 class="hitam">Gaji Pegawai</h6>
                               </div> 
                               <?php if ($dataAkses == '1'){ ?>
                                    <div class="col-md-12 col-12" align="right">
                                        <a href="<?php echo base_url()?>HR/spreadsheet" class="btn Rectangle-diterima col-md-2">
                                            <img src="<?php echo base_url() ?>assets/img/export.svg" class="padd-right-5">&nbsp;
                                        Export To CSV
                                        </a>
                                    </div>
                               <?php } ?>
                               
                            </div>
                            <div class="table-responsive">
                                <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                  
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Unit Bisnis</th>
                                            <th>Departemen</th>
                                            <th>Jabatan</th>
                                            <th>Bank</th>
                                            <th>Nominal</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($dataHistory->result() as $history){ ?>
                                            <tr>                                       
                                                <td><?php echo $history->nik?></td>
                                                <td><?php echo $history->nama?></td>
                                                <td><?php echo $history->perusahaan?></td>
                                                <td><?php echo $history->departemen?></td>
                                                <td><?php echo $history->jabatan?></td>
                                                <td><?php echo $history->bank?></td>
                                                <td>Rp. <?php echo number_format($history->nominal,0,'.','.')?></td>
                                                <td><?php echo strftime(" %d %B %Y",strtotime($history->tanggal));?></td>
                                                <td>
                                                    <!-- <a href="<?php //echo base_url()?>HR/ViewHRPayrollHistory/<?php //echo $history->nik?>" class="btn btn-green1">Lihat</a> -->

                                                    <a href="javascript:;" onclick="viewinfogaji('<?php echo $history->nik ?>','<?php echo $history->bulan ?>','<?php echo $history->tahun ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">lihat</a>
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
            
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="view">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <div class="col-lg-12">
                                <div class="row m-t-20">
                                    <div class="col-md-10">
                                        <label class="fz-18">Detail Gaji Pegawai</label>
                                    </div>
                                    <div class="col-md-2" >
                                        <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                    </div>
                                </div>
                                
                                <div class="row m-t-10">
                                    <div class="col-md-12">
                                        <div id="viewgaji">
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#view').modal({backdrop: 'static', keyboard: false});
                });

                function viewinfogaji(a,b,c){
                          $.ajax({
                            url: "<?php echo base_url();?>HR/ViewHRPayrollHistory/"+a+"/"+b+"/"+c,
                            // data: {nik:a},
                            type: "post",
                            // dataType:'json',
                            success: function (response) {
                               // alert('masuk');
                                $('#view').modal('show');
                                $('#viewgaji').html(response);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus, errorThrown);
                            }
                        });
                    }
            </script>