
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
                <h6 class="tittle-box text-center">Jadwal Pelatihan</h6>
                <div class="table-responsive">
                    <table id="list-data-jadwal-pelatihan" class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Program Pelatihan</th>
                                <th>Lokasi</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php //foreach ($datapelatihan->result() as $dt) { ?>
                                <tr>
                                    <td><?php //echo $dt->nama_program; ?></td>
                                    <td><?php //echo $dt->lokasi; ?></td>
                                    <td><?php //echo strftime("%A, %d %B %Y",strtotime($dt->tanggal_mulai)); ?></td>
                                    <td><?php //echo strftime("%A, %d %B %Y",strtotime($dt->tanggal_selesai)); ?></td>
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
    $(document).ready(function(){
        jadwalpelatihan(0);
    })
    
</script>