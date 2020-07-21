<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
?>
<div class="block-header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
             <h6 class="tittle-menu"> Pengumuman / Pengumuman Perusahaan</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
            <div class="body">
                <div class="row mb-3">
                   <div class="col-md-6 col-12">
                       <h5 class="fz-aktivitasabsensi">Pengumuman Perusahaan</h5>
                   </div>                         
                </div>
                <div class="table-responsive">
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dataPengumumanPerusahaan->result() as $data_PengumumanPerusahaan ) { ?>
                            <tr>
                                <td><?php echo $data_PengumumanPerusahaan->judul; ?></td>
                                <td><?php echo strftime("%A, %d %B %Y",strtotime($data_PengumumanPerusahaan->tanggal_mulai)); ?></td>
                                <td><?php echo strftime("%A,%d %B %Y",strtotime($data_PengumumanPerusahaan->tanggal_selesai)); ?></td>
                                <td>
                                    <a href="javascript:;" onclick="viewpengumuman('<?php echo $data_PengumumanPerusahaan->id_pengumuman_perusahaan ?>')" class="btn btn-aksi"><img src="<?php echo base_url() ?>assets/img/View.svg" class="padd-right-5">Lihat</a>
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
            <div class="row m-t-20">
                <div class="col-md-10">
                    <h5 class="hitampekat">Detail Pengumuman</h5>
                </div>
                <div class="col-md-2" >
                    <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                </div>
            </div>
            <div id="viewp">
            </div>
        </div>
      </div>
    </div>
</div>
<!-- modal view -->
   <!--  <div class="modal fade bd-example-modal-lg" id="viewp" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg"  role="document">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row m-t-20">
                            <div class="col-md-10">
                                <h5 class="hitampekat">Detail Pengumuman</h5>
                            </div>
                            <div class="col-md-2" >
                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                            </div>
                        </div>
                        
                        <div class="row m-t-20">
                            <div class="col-md-12">
                                <div id="viewpengumuman">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#view').modal({backdrop: 'static', keyboard: false});
          });
        function viewpengumuman(a){
            $.ajax({
                url: "<?php echo base_url();?>Employee/detailPengumumanPerusahaan/"+a,
                // data: {nik:a},
                type: "post",
                // dataType:'json',
                success: function (response) {
                   // alert('masuk');
                    $('#view').modal('show');
                    $('#viewp').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
            });
        }
    </script>