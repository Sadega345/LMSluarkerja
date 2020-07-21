<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Pelatihan / Jadwal Pelatihan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <div class="msg" style="display:none;">
                    
                </div>
                <h6 class="tittle-box text-center">Jadwal Pelatihan</h6>
                <div>
                    <p>
                        <label>Pelatihan</label>&nbsp;<span>:&nbsp;<?php //echo $datapelatihanjenjang->nama_pelatihan; ?></span>
                    </p>
                </div>
                <div class="table-responsive">
                    <table id="list-data-pelatihan"  class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Program Pelatihan</th>
                                <th>Nama Pelatih</th>
                                <th>Lokasi Pelatihan</th>
                                <th>Tanggal Mulai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php //foreach ($ambildatapelatihan->result() as $dt) { ?>
                                
                                <tr>
                                    <td><?php //echo $dt->nama_program; ?></td>
                                    <td><?php //echo $dt->nama_pelatih; ?></td>
                                    <td>
                                        <form action="<?php //echo base_url()?>Employee/ViewJenjangPelatihan" method="post">
                                            <input type="hidden" name="id" value="<?php //echo $dt->id_training_jadwal ?>">
                                            <input type="hidden" name="nik" value="<?php //echo $this->session->userdata('nik') ?>">
                                            <button type="submit" class="btn btn-green" >Lihat</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php //} ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
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

<script type="text/javascript">
    $(document).ready(function(){
        pelatihan(0);
    })
    
</script>