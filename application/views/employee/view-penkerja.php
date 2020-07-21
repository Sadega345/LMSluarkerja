<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <div class="row">
                    <div class="col-md-9 col-8 m-t-5">
                          <h6 class="tittle-box text-center">Aspek Penilaian Kinerja</h6>
                    </div>  
                    <div class="col-md-3 col-4">
                        <a href="<?php echo base_url()?>Employee/penilaianKinerja" class="btn btn-darkblue">Kembali</a>
                    </div>                 
                </div>
              
                <div class="row m-t-10">
                    <div class="col-md-3" align="right">
                        <label>Nama Pegawai</label>
                    </div>  
                    <div class="col-md-8">
                        <?php echo $dataViewPenKerja->nama_lengkap; ?>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-3" align="right">
                        <label>Jabatan</label>
                    </div>  
                    <div class="col-md-8">
                        <?php echo $dataViewPenKerja->jenis_project; ?>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-3" align="right">
                        <label>Periode Penilaian</label>
                    </div>  
                    <div class="col-md-8">
                        <?php echo $dataViewPenKerjaRow>0?date("F Y",strtotime($dataViewPenKerja->periode)):'-'; ?>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-3" align="right">
                        <label>Jenis Penilaian</label>
                    </div>  
                    <div class="col-md-8">
                        <?php echo $dataViewPenKerjaRow>0?$dataViewPenKerja->keterangan:'-'; ?>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-3" align="right">
                        <label>Hasil</label>
                    </div>  
                    <div class="col-md-8">
                        <?php
                            $hasil=0;
                            if($dataViewPenKerjaRow>0){
                                if($dataViewPenKerja->hasil==1){
                                    $hasil="Sangat Buruk";
                                }
                                if($dataViewPenKerja->hasil==2){
                                    $hasil="Buruk";
                                }
                                if($dataViewPenKerja->hasil==3){
                                    $hasil="Cukup";
                                }
                                if($dataViewPenKerja->hasil==4){
                                    $hasil="Memuaskan";
                                }
                                if($dataViewPenKerja->hasil==5){
                                    $hasil="Istimewa";
                                }
                                echo $hasil;
                            }else{
                                echo "-";
                            }
                        ?>
                        
                    </div>                 
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Aspek</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($dataViewPenKerjaRow>0){ ?>
                                    <?php
                                    $hasilkerja = explode(",",$dataViewPenKerja->id_review);
                                    ?>
                                    <?php foreach ($hasilkerja as $dataHasil ) { 
                                        $dataViewHasilKerja = $this->Nata_hris_employee_model->data_view_penhasilkerja($dataHasil);
                                        $hasilakhir="-";
                                        if($dataViewHasilKerja->opsi_buruk_sekali=='1'){
                                            $hasilakhir="Sangat Buruk";
                                        }
                                        if($dataViewHasilKerja->opsi_buruk=='1'){
                                            $hasilakhir="Buruk";
                                        }
                                        if($dataViewHasilKerja->opsi_cukup=='1'){
                                            $hasilakhir="Cukup";
                                        }
                                        if($dataViewHasilKerja->opsi_memuaskan=='1'){
                                            $hasilakhir="Memuaskan";
                                        }
                                        if($dataViewHasilKerja->opsi_istimewa=='1'){
                                            $hasilakhir="Istimewa";
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="break-word">
                                                    <?php echo $dataViewHasilKerja->judul; ?>
                                                </div> 
                                            </td>
                                            <td>
                                                <div class="break-word">
                                                    <?php echo $hasilakhir; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else{
                                    echo '<tr>
                                            <td>
                                                <div class="break-word">
                                                    -
                                                </div> 
                                            </td>
                                            <td>
                                                <div class="break-word">
                                                    -
                                                </div>
                                            </td>
                                        </tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
            <div class="body">
                <h6 class="tittle-box text-center">Catatan untuk hal-hal yang perlu diperbaiki</h6>
                <p> <?php echo $dataViewPenKerjaRow>0?$dataViewPenKerja->keterangan:'-'; ?></p>
            </div>
        </div>
    </div>
</div>

