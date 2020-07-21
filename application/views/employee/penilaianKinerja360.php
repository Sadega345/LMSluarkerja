
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Manajemen Kinerja / 360 Review</h6>
        </div>

    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <div class="msg" style="display:none;">
                    
                </div>
                <h6 class="tittle-box text-center">360 Review</h6>
                <div class="table-responsive">
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode Penilaian</th>
                                <th>Nama Penilaian</th>
                                <th>Departemen</th>
                                <th>Status</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataPenKerja->result() as $dataPolicies ) { ?>
                                <tr>
                                    <td>
                                        <div class="break-word">
                                            <?php $tmpdate = date("F Y",strtotime(date('Y-m-d'))); ?>
                                            <?php echo $tmpdate; ?>
                                        </div> 
                                    </td>
                                    <td>
                                        <div class="break-word">
                                            <?php echo $dataPolicies->nama_lengkap; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="break-word">
                                            <?php echo $dataPolicies->departemen; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="break-word">
                                            <?php $tmp = $this->Nata_hris_employee_model->data_penkerja($dataPolicies->nik,date('Y-m')); ?>
                                            <?php if ($tmp->num_rows() > 0) { ?>
                                                <a href="javascript:;" onclick="pindah('<?php echo $tmp->row()->id_review_score; ?>','<?php echo date('Y-m') ?>','<?php echo $dataPolicies->nik ?>')">
                                                    <button class="btn btn-blue">Lihat</button>
                                                </a>
                                                <!-- <label class="btn btn-green2">Terisi</label> -->
                                            <?php }else{ ?>
                                                <label class="btn btn-grey2">Belum Terisi</label>
                                            <?php } ?>
                                        </div>
                                    </td>
                                   <!--  <?php //if ($tmp->num_rows() > 0 ){ ?>
                                        <td>
                                            <a href="javascript:;" onclick="pindah('<?php //echo $tmp->row()->id_review_score; ?>','<?php //echo date('Y-m') ?>','<?php //echo $dataPolicies->nik ?>')">
                                                <button class="btn btn-blue">Lihat</button>
                                            </a>
                                        </td>
                                    <?php //}else{ ?> -->
                                        <!-- <td>
                                            <a href="javascript:;" onclick="pindah('0','<?php //echo date('Y-m') ?>','<?php //echo $dataPolicies->nik ?>')">
                                                <button class="btn btn-green">Isi Review</button>
                                            </a>
                                        </td> -->
                                    <?php //} ?>
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
        $.post( "<?php echo base_url()?>Employee/viewPenKerja360", { id_review_score: id, tanggal: tanggal, nik : nik})
          .done(function( data ) {
            $( ".view").html(data);
          });
    }
    window.onload = function(){
        <?php
            if ($this->session->flashdata('msg') != '') {
                echo "effect_msg();";
                echo "alert('".$this->session->flashdata('msg')."')";

            }
            if ($this->session->flashdata('msgsort') != '') {
                echo "effect_msg_sort();";
            }       
        ?>  
    }
    function effect_msg() {
        // $('.msg').hide();
        $('.msg').show(1000);
        setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
    }
</script>