<div class="block-header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
             <h6 class="tittle-menu">Pengumuman / Kuesioner</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <div class="row mb-3">
                       <div class="col-md-6 col-12">
                           <h5 class="fz-aktivitasabsensi">Kuesioner</h5>
                       </div>                         
                    </div>
                <div class="table-responsive">
                    <table  class="table table-hover js-basic-example dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Judul Kuesioner</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Link Google Form</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataKuesioner->result() as $dt) { ?>
                            <tr>
                                <td><?php echo $dt->judul; ?></td>
                                <td><?php echo strftime("%A, %d %B %Y",strtotime($dt->tanggal_mulai)); ?></td>
                                <td><?php echo strftime("%A, %d %B %Y",strtotime($dt->tanggal_selesai)); ?></td>
                                <!-- <td><?php //echo $dt->link_google_doc; ?></td> -->
                                <?php if ($dt->link_google_doc == ""){ ?>
                                    <td>-</td>
                                    <td><?php echo $dt->deskripsi; ?></td>
                                <?php } else{ ?>
                                <td><a href="javascript:;" data-id="<?php echo $dt->id_questioner ?>" data-link="<?php echo $dt->link_google_doc ?>" title="Isi" class="isi"><?php echo "Link"; ?></a></td>
                                <td>-</td>
                                <?php } ?>
                                
                                <td>
                                    <?php 
                                    $wh=array("tq.status"=>'1');
                                    $nik=$this->session->userdata('nik');
                                    // echo $nik;
                                    $datakuesioner=$this->Nata_hris_employee_model->data_kuesioner($dt->id_questioner,$nik,$wh);
                                    $datakuesionerRow=$this->Nata_hris_employee_model->data_kuesioner($dt->id_questioner,$nik,$wh)->row();
                                    // echo $datakuesioner;

                                        if($datakuesioner->num_rows() > 0){
                                            if ($datakuesionerRow->jum_jawaban > 0 || $datakuesionerRow->hasil_isi > 0) {
                                                echo '<label class=" Rectangle-permanent">Selesai</label>';
                                            }else{
                                                echo ' <label class=" Rectangle-probation">Belum Selesai</label>';
                                            }
                                        }else{
                                            if ($datakuesionerRow->hasil_isi == 0) {
                                                echo ' <label class=" Rectangle-probation">Belum Selesai</label>';
                                            }else{
                                                echo ' <label class=" Rectangle-permanent">Selesai</label>';
                                            }
                                            
                                             
                                        }
                                    ?>
                                   </td>
                                <td>
                                     <?php
                                        if($datakuesioner->num_rows() > 0){
                                            // echo $datakuesionerRow->jum_jawaban;
                                            if ($datakuesionerRow->link_google_doc == '' && $datakuesionerRow->jum_jawaban == 0) {
                                                echo '<a href="javascript:;" onclick="isi('.$datakuesionerRow->id_questioner.')"><button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/Update.svg" class="padd-right-5">Isi</button></a>';

                                                // <form action="'.base_url().'Employee/isiKuesioner" method="post"> 
                                                //     <input type="hidden" name="id" value="'.$datakuesionerRow->id_questioner.'">
                                                //     <button type="submit"  class="btn btn-aksi"><img src="'.base_url().'assets/img/Update.svg" class="padd-right-5">Isi</button>
                                                //     </form>';
                                            }if($datakuesionerRow->jum_jawaban > 0){
                                                echo '<form action="'.base_url().'Employee/viewKuesioner" method="post"> 
                                            
                                             <input type="hidden" name="id" value="'.$datakuesionerRow->id_questioner.'">
                                             <button type="submit" class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat</button>
                                             </form>';
                                            }
                                        } 
                                        
                                    ?>
                                    
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
<!-- modal Isi -->
<div class="modal fade bd-example-modal-lg" id="viewisi" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-body" >
        <div class="row m-t-10">
              <div class="col-lg-3 col-md-3">
                  <label class="fz-18">Detail Kuesioner</label>
              </div>
              <div class="col-md-3 col-3">
              </div>
              <div class="col-lg-6 col-md-6" align="right">
                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
              </div>
          </div>
          <div id="isidata">
          </div>
      </div>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
                
    $(document).ready(function(){
       $(".isi").click(function(){
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-blue1',
              cancelButton: 'btn btn-red1'
            },
            buttonsStyling: false,
          });
                var link=$(this).data('link');
                var id=$(this).data('id');
                
                swalWithBootstrapButtons.fire({
                      title: "Apakah Anda yakin?",
                      text: "Ingin mengisi data ini? ",
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
                              url:'<?php //echo base_url()?>Employee/ProsesKuesioner/'+id,
                             success: function(data) {
                                  swalWithBootstrapButtons.fire("Sukses", "Isi", "success");
                                  setTimeout(function(){
                                          window.open(link,'_blank');
                                        
                                  },2000);
                              }
                          });
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                      }
                  });
          
        }); 
        
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function(){
       $('#viewisi').modal({backdrop: 'static', keyboard: false});
    })

    function isi(a){
          $.ajax({
            url: "<?php echo base_url();?>Employee/isiKuesioner/"+a,
            // data: {nik:a},
            type: "post",
            // dataType:'json',
            success: function (response) {
               // alert('masuk');
                $('#viewisi').modal('show');
                $('#isidata').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }
</script>