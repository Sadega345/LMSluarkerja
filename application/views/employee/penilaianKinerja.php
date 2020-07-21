<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Manajemen Kinerja / Penilaian Kinerja</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <h6 class="tittle-box text-center">Penilaian Kinerja</h6>
                <div class="table-responsive">
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode Penilaian</th>
                                <th>Nama Penilai</th>
                                <th>Jenis Penilaian</th>
                                <th>Hasil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataPenKerja->result() as $dataPolicies ) { ?>
                                <tr>
                                    <td>
                                        <div class="break-word">
                                            <?php echo date("F Y",strtotime($dataPolicies->tanggal)); ?>
                                        </div> 
                                    </td>
                                    <td>
                                        <div class="break-word">
                                            <?php echo $dataPolicies->nama_pic; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="break-word">
                                            <?php echo $dataPolicies->keterangan; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="break-word">
                                            <?php
                                            $hasil=0;
                                            if($dataPolicies->hasil==1){
                                                $hasil="Sangat Buruk";
                                            }
                                            if($dataPolicies->hasil==2){
                                                $hasil="Buruk";
                                            }
                                            if($dataPolicies->hasil==3){
                                                $hasil="Cukup";
                                            }
                                            if($dataPolicies->hasil==4){
                                                $hasil="Memuaskan";
                                            }
                                            if($dataPolicies->hasil==5){
                                                $hasil="Istimewa";
                                            }
                                            ?>
                                            <?php echo $hasil; ?>
                                        </div>
                                    </td>
                                    <td>
                                    	<a href="javascript:;" onclick="pindah('<?php echo $dataPolicies->id_review_score; ?>','<?php echo date('Y-m') ?>','<?php echo $dataPolicies->nik ?>')">
                                    		<button class="btn btn-green">Lihat</button>
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
<script type="text/javascript">
    function pindah(id,tanggal,nik){
        $.post( "<?php echo base_url()?>Employee/viewPenKerja", { id_review_score: id, tanggal: tanggal, nik : nik})
          .done(function( data ) {
            $( ".view").html(data);
          });
    }
</script>