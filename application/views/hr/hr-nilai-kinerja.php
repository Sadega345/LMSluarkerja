
            <?php $tmpvalidasi = $this->Nata_hris_employee_model->data_penkerja($datakaryawan->nik,date('Y-m')); ?>
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Penilaian Kinerja</h6>
                    </div>
                </div>
            </div>
            
             <div class="row clearfix">
                 <div class="col-lg-12 col-md-12">
                    <div class="card  ">
                        <div class=" row p-15 ">
                            <div class="col-md-2 ">
                            </div>
                            <div class="col-md-8 text-center col-5" >
                                 <h6 class="tittle-box"> Penilaian Kinerja <?php echo $datakaryawan->nama_lengkap; ?></h6>
                            </div>
                            <div class="col-md-2 col-4">

                            </div>
                        </div>
                    <div class="container">
                        <form action="<?php echo base_url()?>HR/ProsesTambahPenilaianKinerja" method="post">
                            <input type="hidden" name="id_aspek" id="id_aspek" >
                            <input type="hidden" name="ratingValue" id="ratingValue" >
                            <input type="hidden" name="nik" value="<?php echo $datakaryawan->nik;; ?>" >
                            <div class="row  m-t-10">
                                <div class="col-md-3 col-12" >
                                    <label class="float-right hidden-sm">Nama Penilai </label>
                                    <label class="d-sm-none">Nama Penilai</label>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="text" name="nama_pic" class="form-control" required> 
                                </div>
                            </div>

                            <?php 
                            $totjum=0;
                            foreach ($dataAspek->result() as $aspek){ ?>
                            
                            <div class="row m-t-10">
                                <div class="col-md-1">
                                    
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label><?php echo $aspek->judul ?></label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                                                  
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    
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

                            <?php $totjum++; } ?>
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
                                            <input type="text" name="rata" id="hasilrata" class="inputan360" readonly >
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
                                            <input type="text" name="akhir" id="hasilakhir" class="inputan360" readonly>
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
                                                    <input type="radio"  name="nilai" value="1">
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
                                                    <input type="radio" name="nilai" value="2">
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
                                                    <input type="radio" name="nilai" value="3">
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
                                                <textarea cols="85" rows="10" class="form-control" name="keterangan"></textarea>
                                            </div>
                                        </div>

                                       
                                        

                                     </div>
                                 </div>
                            </div>
                           
                            <div class="row  m-t-10 mb-5">
                                <div class="col-md-3 col-3" >
                                </div>
                                <div class="col-md-6 col-6">
                                    <button type="submit" class="btn btn-blue1">Simpan</button>
                                    <a href="<?php echo base_url() ?>HR/TambahHRPenilaianKinerja" class="btn btn-red1">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
                    
                </div> 
            </div>

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

            tmprata = tmprata+parseInt(selectstar)/<?php echo $totjum; ?>;
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


         
                        
         