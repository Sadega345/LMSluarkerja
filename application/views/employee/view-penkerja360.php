<?php $tmpvalidasi = $this->Nata_hris_employee_model->data_penkerja($nik,date('Y-m')); 
?>
<form method="post" action="<?php echo base_url() ?>Employee/prosesPenKerja360">
    <input type="hidden" name="nik" value="<?php echo $nik ?>">
    <input type="hidden" name="id_review_score" value="<?php echo $id_review_score ?>">
    <?php $hasil = $dataViewPenKerjaRow > 0 ? explode(',', $dataViewPenKerja->id_review):array(); ?>
    <input type="hidden" name="id_review" value="<?php echo $dataViewPenKerjaRow > 0? $dataViewPenKerja->id_review:'' ?>">
    <input type="hidden" placeholder="periode" name="periode" value="<?php echo $tanggal ?>">
    <input type="hidden" name="id_aspek" id="id_aspek" >
    <input type="hidden" name="ratingValue" id="ratingValue" >
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">
                <?php $tmparray = array(); ?>
                <?php foreach ($hasil as $hasilakhirnya){ 
                   $model = $this->Nata_hris_employee_model->data_view_penhasilkerja($hasilakhirnya);
                   $opsi = 0;
                   if ($model->opsi_istimewa == '1') {
                       $opsi = 5;
                   }elseif ($model->opsi_memuaskan == '1') {
                       $opsi = 4;
                   }elseif($model->opsi_cukup == '1'){
                        $opsi= 3;
                   }elseif($model->opsi_buruk == '1'){
                        $opsi= 2;
                   }elseif($model->opsi_buruk_sekali == '1'){
                        $opsi= 1;
                   }
                   $tmparray['r'.$model->id_review_aspek] = $opsi;
                ?>
                    
                <?php } ?>
                <h6 class="tittle-box text-center">REVIEW PENILAIAN PRESTASI KERJA (PPK) 1 TAHUN</h6>
                <div class="header">
                    <h5 class="tittle-box" align="left">Keuangan Pajak</h5>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo $dataPenKerja360->nama_lengkap; ?>
                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Jabatan</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo $dataPenKerja360->jabatan; ?>
                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Departemen</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                            <?php echo $dataPenKerja360->departemen ?>
                            
                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tanggal Bergabung</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo date("d F Y",strtotime($dataPenKerja360->tanggal_masuk)); ?>
                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tanggal Berakhir</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo date("d F Y",strtotime($dataPenKerja360->tanggal_keluar)); ?>
                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Masa Kerja</label>
                        </div>
                    </div>  
                    <?php 
                    	$start_date = new DateTime($dataPenKerja360->tanggal_masuk);
						$end_date = new DateTime($dataPenKerja360->tanggal_keluar);
						$interval = $start_date->diff($end_date);
						$tahun = $interval->y>0 ? $interval->y.' Tahun ':'';
						$bulan = $interval->m>0 ? $interval->m. ' Bulan ':'';
						$hari = $interval->d>0 ? $interval->d. ' Hari ':'';
						// echo "$interval->days hari "; // hasil : 217 hari
                     ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo $tahun.$bulan.$hari; ?>
                        </div>
                    </div>                 
                </div>

                <div class="header">
                    <h5 class="tittle-box" align="left">Kehadiran Karyawan</h5>
                </div>
                <?php 
                    $jum_cuti = $dataPenKerjaRow->num_rows();
                    $jum_sakit = $dataPenKerjaSakit->num_rows();
                    $jum_bolos = $dataPenKerjaBolos->num_rows();
                    $jum_terlambat = $dataTerlambat360->num_rows();
                 ?>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Sakit</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo $jum_sakit; ?>
                        </div>
                    </div>                 
                </div>

                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Izin</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                            <!-- <?php //echo $dataCutiRow > 0 ? $dataCuti->jumlah_cuti : '' ?> -->
                            <?php echo $jum_cuti; ?>
                        </div>
                    </div>                 
                </div>

                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Terlambat</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo $jum_terlambat; ?>
                        </div>
                    </div>                 
                </div>

                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tanpa Keterangan</label>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>:</label>
                           <?php echo $jum_bolos; ?>
                        </div>
                    </div>                 
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="header">
                            <h5 class="tittle-box" align="left">Aspek Penilaian</h5>    
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0);" onclick="viewaspek()" class="btn btn-blue"> Cara Penilaian
                        </a>
                    </div>
                </div>
                

                <?php foreach ($dataAspek->result() as $aspek){ ?>
                
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label><?php echo $aspek->judul ?></label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>:</label>                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    	 <div class='rating-stars text-center' >
						    <ul id='stars' class="rstar" data-id="<?php echo $aspek->id_review_aspek ?>">
						      <li class='star <?php if($tmparray['r'.$aspek->id_review_aspek] >= 1 ){ echo "selected"; } ?>' title='Poor' data-value='1'>
						        <i class='fa fa-star fa-fw'></i>
						      </li>
						      <li class='star <?php if($tmparray['r'.$aspek->id_review_aspek] >= 2 ){ echo "selected"; }?>' title='Fair' data-value='2'>
						        <i class='fa fa-star fa-fw'></i>
						      </li>
						      <li class='star <?php if($tmparray['r'.$aspek->id_review_aspek] >= 3 ){ echo "selected"; } ?>' title='Good' data-value='3'>
						        <i class='fa fa-star fa-fw'></i>
						      </li>
						      <li class='star <?php if($tmparray['r'.$aspek->id_review_aspek] >= 4 ){ echo "selected"; } ?>' title='Excellent' data-value='4'>
						        <i class='fa fa-star fa-fw'></i>
						      </li>
						      <li class='star <?php if($tmparray['r'.$aspek->id_review_aspek] >= 5 ){ echo "selected"; } ?>' title='WOW!!!' data-value='5'>
						        <i class='fa fa-star fa-fw'></i>
						      </li>
						    </ul>
						  </div>
                    </div>
                </div>

                <?php } ?>

                <div class="header">
                    <div class="row">
                        <div class="col-md-1">
                            
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6 class="tittle-box" align="left">Nilai Rata-Rata</h6>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                        	<div class="form-group">
                        		<input type="text" name="rata" id="hasilrata" class="inputan360" readonly  value="<?php echo $dataViewPenKerjaRow > 0 ? $dataViewPenKerja->hasil: 0 ?>">
                        	</div>
                        </div>
                        
                    </div>
                </div>
                <div class="header">
                    <div class="row">
                        <div class="col-md-1">
                        
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <h6 class="tittle-box" align="left">Nilai Akhir</h6>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>:</label>
                            </div>
                        </div>
                       	<div class="col-md-4">
                        	<div class="form-group">
                        		<input type="text" name="akhir" id="hasilakhir" class="inputan360" readonly="" value="<?php echo $dataViewPenKerjaRow > 0 ? $dataViewPenKerja->hasil_akhir: 0 ?>">
                        	</div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
    </div>

    <div class="col-lg-12 col-md-12 view" >
         <div class="card ">
             <div class="body">

                <h6 class="tittle-box text-center">Kesimpulan(Pilih Kriteria Yang Sesuai)</h6>
                
                

                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="radio" <?php echo $dataViewPenKerjaRow > 0 && $dataViewPenKerja->score=='1'?'checked':'' ?> name="nilai" value="1">
                            <label>1. Selesai Evaluasi dan meneruskan kontrak</label>
                        </div>
                    </div>  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>3,5 - 5</label>
                        </div>
                    </div>                 
                </div>

                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="radio" <?php echo $dataViewPenKerjaRow > 0 && $dataViewPenKerja->score=='2'?'checked':'' ?> name="nilai" value="2">
                            <label>2. Diperpanjang Evaluasi</label>
                        </div>
                    </div>  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>2,5 - 3,4</label>
                        </div>
                    </div>                 
                </div>

                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="radio" <?php echo $dataViewPenKerjaRow > 0 && $dataViewPenKerja->score=='3'?'checked':'' ?> name="nilai" value="3">
                            <label>3. Tidak Diperpanjang</label>
                        </div>
                    </div>  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>1 - 2,4</label>
                        </div>
                    </div>                 
                </div>

                <h6 class="tittle-box text-center">Catatan untuk hal-hal yang harus diperbaiki</h6>
                <div class="row">
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-11">
                        <textarea cols="85" rows="10" class="form-control" name="keterangan"><?php echo $dataViewPenKerjaRow > 0 ? $dataViewPenKerja->keterangan: '' ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        
                    </div>

                    <div class="col-md-4">
                        <?php if ($tmpvalidasi->num_rows() <= 0 ){ 
                                if ($nik != $this->session->userdata('nik')) {
                                    
                            ?>
                            <button class="btn btn-bluesubmit" name="kirim">Kirim </button> &nbsp;
                            
                        <?php }} ?>
                            <a href="<?php echo base_url() ?>Employee/review360">
                                <button class="btn btn-cancel" type="button" name="kirim">Kembali</button>
                            </a>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                

             </div>
         </div>
    </div>
</div>

<div class="modal fade" id="view" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="max-width: none;" role="document">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-2">
                            
                        </div>
                        <div class="col-lg-8" align="center">
                            <img src="<?php echo base_url() ?>assets/images/logo-aja.png" alt="" width="100px">
                            
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-blue" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            
                        </div>
                        <div class="col-lg-4">
                            <h6 class="tittle-box text-center">Rincian Aspek Penilaian</h6>    
                        </div>
                        <div class="col-lg-4">
                            
                        </div>
                    </div>
                    <br>
                    <div id="isiaspek">
                            
                    </div>
                    
                    <div id="isianaspek" style="display: none;">
                        <?php 
                            $judul = array('ISTIMEWA = 5',
                                            'MEMUASKAN = 4',
                                            'CUKUP = 3',
                                            'BURUK = 2',
                                            'BURUK SEKALI = 1'
                                        ); 
                            $tmp = 0;
                            $isi = array('Selalu melihat persoalan dari beberapa segi banyak mengemban ke gagasan-gagasan baru',
                                'Umumnya melihat persoalan dari beberapa segi. Cukup banyak gagasan yang dihasilkan',
                                'Berusaha melihat persoalan dari beberapa segi. Ada beberapa gagasan baru yang dihasilkan',
                                'Jarang sekali menghasilkan dari beberapa segi. Ada beberapa gagasan baru',
                                'Tidak pernah menghasilkan gagasan baru dan selalu melihat persoalan dari satu sisi');
                            foreach ($judul as $value) {
                                
                        ?>
                        
                        <div class="row">
                            <div class="col-lg-1">
                                
                            </div>    
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label><?php echo $value ?></label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1">
                                
                            </div>
                            <div class="col-lg-11">
                                <div class="form-group">
                                    <?php echo $isi[$tmp] ?>
                                </div>
                            </div>
                        </div>


                    <?php $tmp++; }?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
    function viewaspek(){
              $.ajax({
                url: "<?php echo base_url();?>Employee/viewAspek",
                type: "post",
                dataType:'json',
                success: function (response) {
                   // alert(response.nama_lengkap);
                    $('#view').modal('show');  
                    // $('#nama').html(response.datakaryawan.nama_lengkap);
                    var isian = $('#isianaspek').html();
                    $.each(response.dataaspek,function(k,v){
                        $('#isiaspek').append("<h6 class='tittle-box'>"+v.judul+"</h6>");
                        $('#isiaspek').append(isian);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }


            });

           
        }
    </script>
    <?php 
        if ($tmpvalidasi->num_rows() <= 0) { ?>
            <script type="text/javascript">
        $(document).ready(function(){
  
        /* 1. Visualizing things on Hover - See next part for action on click */
      $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
       
        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
          if (e < onStar) {
            $(this).addClass('hover');
          }
          else {
            $(this).removeClass('hover');
          }
        });
        
      }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
          $(this).removeClass('hover');
        });
      });
      
      
      /* 2. Action to perform on click */
      $('.rstar li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        

        var tmprata = 0;
        var tmpakhir = 0;
        var lengthaspek = $('.rstar').length;
        console.log(lengthaspek);
        
        for (i = 0; i < stars.length; i++) {
          $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
          $(stars[i]).addClass('selected');
          
        }
        var tmpidaspek = [];
        var tmpratingValue = [];

        $('.rstar').each(function(i, obj) {
            var id_aspek = $(this).data('id');
            console.log('isi id_aspek '+id_aspek);
            
            tmpidaspek.splice(0,0,id_aspek);
            

            var ratingValue = parseInt($(this).find('.selected').last().data('value'), 10) || '';
            
            tmpratingValue.splice(0,0,ratingValue);
            
            console.log('isi tmp rating '+tmpratingValue);

            var tmp = Math.round($(this).find('.selected').last().data('value'));
            tmp = parseInt(tmp) || 0;
            var selectstar = round(parseInt(tmp),0);
            tmprata = tmprata+parseInt(selectstar)/7;
            tmpakhir = tmpakhir+tmp;
            console.log('isi tmp '+tmp);
        });
        // JUST RESPONSE (Not needed)
        $('#id_aspek').val(tmpidaspek.join(','));
        $('#ratingValue').val(tmpratingValue.join(','));
        // console.log(stars.length);
        // console.log(onStar);
        $('#hasilrata').val(round(tmprata,0));
        $('#hasilakhir').val(tmpakhir);
      });
      
      
    });
    function round(value, precision) {
        var multiplier = Math.pow(10, precision || 0);
        return Math.round(value * multiplier) / multiplier;
    }
</script>
        
    <?php } ?>
    