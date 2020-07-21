
            <!-- <div class="block-header">
                <div class="row">
                    <div class="col-md-6 col-12 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Benefit / Claim / Form Tambah</h6>
                    </div>
                </div>
            </div> -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="container ">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>Employee/prosesTambahClaim">
                                <!-- <div class="row">
                                    <div class="col-lg-12">
                                        <span>
                                            <b>* Pengajuan klaim tidak boleh melebihi sisa saldo</b>
                                        </span>
                                    </div>
                                </div> -->
                                <!-- <br>
                                <?php 
                                    // $TotKlaim=0; 
                                    // foreach ($dataClaimRemburse as $ClaimRemburse ) { 
                                        
                                    //     if ($ClaimRemburse->status == 1 || $ClaimRemburse->status == 3) {
                                    //         $TotKlaim=$TotKlaim+$ClaimRemburse->total;
                                            
                                    //     }
                                        ?>
                                <?php //} ?> -->
                                <!-- <div class="row">
                                    <div class="col-md-3 col-12">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Sisa Saldo </p>    
                                        <p class="d-sm-none fz-14-judul">Sisa Saldo </p> 
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <span>
                                            
                                            <p class="float-left hidden-sm fz-14-judul m-t-20" >Rp. <?php //echo number_format(($datakaryawan->saldo_klaim-$TotKlaim),0,'.','.') ?></p>
                                            <p class="d-sm-none fz-14-judul fz-14-judul">Rp. <?php// echo number_format(($datakaryawan->saldo_klaim-$TotKlaim),0,'.','.') ?> </p>
                                        </span>
                                    </div>
                                </div>
                                <br>  -->
                            	<div class="row m-t-10">
                                    <div class="col-md-3 col-12">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Pegawai </p>    
                                        <p class="d-sm-none fz-14-judul">Nama Pegawai </p>   
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input type="text" name="nama_karyawan" class="form-control fcheight" readonly="" value="<?php echo $datakaryawan->nama_lengkap ?>">
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12 ">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Tanggal Dikeluarkan </p>    
                                        <p class="d-sm-none fz-14-judul">Tanggal Dikeluarkan </p>    
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input type="text" data-id="startdate" id="start"  class="form-control fcheight datepicker2 klik-tanggal tglval" placeholder="dd-mm-yyyy" required autocomplete="off" data-date-format="yyyy-mm-dd">
                                        <input type="hidden" name="tanggal" id="startdate">
                                    </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Jumlah </p>    
                                        <p class="d-sm-none fz-14-judul">Jumlah </p>   
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input type="number" min="0"  name="total" class="form-control fcheight saldo" required="" autocomplete="off"> 
                                       <!-- <input type="number" min="0" max="<?php// echo $datakaryawan->saldo_klaim-$TotKlaim ?>" name="total" class="form-control fcheight saldo" required="" autocomplete="off">  -->
                                        <!-- <input type="number" min="0" name="total" class="form-control fcheightsaldo" required="" autocomplete="off"> -->
                                    </div>
                                </div>
                                
                                <div class="row m-t-10">
                                    <div class="col-md-3 col-12">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Bukti Struk </p>    
                                        <p class="d-sm-none fz-14-judul">Bukti Struk </p>    
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input type="file" name="file_bukti_transaksi[]" class="form-control fcheight" id="dropify-event" data-allowed-file-extensions="jpeg jpg png pdf" >
                                        <br>
                                        <span>File format: jpg, png, pdf </span>
                                        <br>
                                        <span>
                                            <b>* Struk asli harus diberikan ke HR Admin supaya klaim dapat diproses</b>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-2">
                                         <button type="button" name="add" id="add" class="btn btn-success"> + </button>
                                    </div>
                                </div>
                                <div id="dynamic_field">
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Deskripsi </p>    
                                        <p class="d-sm-none fz-14-judul">Deskripsi </p>    
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <textarea cols="20" rows="5" class="form-control fcheight" name="deskripsi" required=""></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="nik" class="form-control" value="<?php echo $this->session->userdata('nik'); ?>">
                                <input type="hidden" name="status" class="form-control" value="0">
                                <br>

                                <div class="row" >
                                    <div class="col-md-3 col-3">
                                    </div>
                                    <div class="col-md-6 col-6">
                                    	<!-- <?php //if(($datakaryawan->saldo_klaim-$TotKlaim)>0){ ?>
	                                        <button type="submit" class="btn Rectangle-cari tombol-simpan-claim">Simpan</button>
	                                    <?php// } ?> -->
                                        <button type="submit" class="btn Rectangle-cari tombol-simpan-claim">Simpan</button>
                                        <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                    </div>
                                </div>
                            </form>

                        
                    </div>
                </div>
            </div>

<script type="text/javascript">
  jQuery('#datetimepicker_unixtime').datetimepicker({
    format:'Y-m-d H:i:s'
  });
  
</script>

<script type="text/javascript">
    $('.saldo').on('keyup', function(e){
    $(this).val(parseInt($(this).val(),10));
    if (parseInt($(this).val()) > parseInt($(this).attr('max'))) {
        $(this).val($(this).attr('max'));
    }
});
</script>

<script>  
    $(document).ready(function(){  
          var i=1;  
          $('#add').click(function(){  
               i++;  
               $('#dynamic_field').append('<div class="row" id="row'+i+'">'+
                '<div class="col-md-3 col-4 m-t-10"  align="right">'+
                '</div>'+
                '<div class="col-md-6 col-10">'+
                    ' <input type="file" name="file_bukti_transaksi[]" class="dropify-event" data-allowed-file-extensions="jpeg jpg png pdf" required>'+
                '</div>'+

                '<div class="col-sm-1 col-2">'+
                  '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>'+
                '</div>'+
                '</div>');  
                 $('.dropify-event').dropify();
          });  
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });
    });  
</script>