
          
                    
                        
                        <form method="post" action="<?php echo base_url() ?>Employee/prosesQuestionerPertanyaan">
                        <input type="hidden" name="ratingValue" id="ratingValue" >
                        <input type="hidden" name="id_questioner_pertanyaan" id="id_questioner_pertanyaan" >
                        <input type="hidden" name="id_questioner"  value="<?php echo $datakuesioner->id_questioner ?>">
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 col-5"  align="">
                                 <p class="fz-14-judul">Judul Kuesioner </p>
                            </div>
                            <div class="col-md-8 col-7">
                                 <p class="fz-14-isi"><?php echo $datakuesioner->judul; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                           <div class="col-md-3 col-5"  align="">
                                 <p class="fz-14-judul">Departemen</p>
                            </div>
                            <div class="col-md-8 col-7">
                                 <p class="fz-14-isi"><?php echo $datakuesioner->deskripsi_departemen; ?></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 col-5"  align="">
                                 <p class="fz-14-judul">Tanggal Mulai</p>
                            </div>
                            <div class="col-md-8 col-7">
                                 <p class="fz-14-isi"><?php echo strftime("%d %B %Y",strtotime($datakuesioner->tanggal_mulai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                           <div class="col-md-3 col-5"  align="">
                                 <p class="fz-14-judul">Tanggal Berakhir</p>
                            </div>
                            <div class="col-md-8 col-7">
                                <p class="fz-14-isi"><?php echo strftime("%d %B %Y",strtotime($datakuesioner->tanggal_selesai)); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                           <div class="col-md-3 col-5"  align="">
                                 <p class="fz-14-judul">Deskripsi</p>
                            </div>
                            <div class="col-md-8 col-7">
                                 <p class="fz-14-isi"><?php echo $datakuesioner->deskripsi; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1 col-1">
                            </div>
                           <div class="col-md-3 col-5" >
                                 <p class="fz-14-judul">Kuesioner</p>
                            </div>
                        </div>
                        <?php 
                        $no=1;
                            foreach ($datapertanyaankuesioner->result() as $dt) { 
                        ?>
                        <div class="row">
                            <div class="col-md-1 col-1">
                            </div>
                            <div class="col-md-11 col-6">
                                <div class="form-group">
                                     <p class="fz-14-isi"><?php echo  $no.".&nbsp;".$dt->pertanyaan; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-6">
                            
                            <div class='rating-stars text-center' >
                                <ul id='stars' class="rstar" data-id="<?php echo $dt->id_questioner_pertanyaan ?>">
                                  <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star ' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star ' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <?php $no++;} ?>
                        
                        <div class="row">
                            <div class="col-md-2 col-3">
                                
                            </div>

                            <div class="col-md-4 col-6">
                                <button class="btn Rectangle-cari" name="kirim">Simpan</button>
                            </div>
                        </div>

                        </form>
                        <br>
        
        


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
        var lengthquestioner = $('.rstar').length;
        console.log('panjang questioner '+lengthquestioner);
        
        for (i = 0; i < stars.length; i++) {
          $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
          $(stars[i]).addClass('selected');
          
        }
        var tmpidpertanyaan = [];
        var tmpratingValue = [];

        $('.rstar').each(function(i, obj) {
            var id_questioner_pertanyaan = $(this).data('id');
            console.log('isi id_questioner_pertanyaan '+id_questioner_pertanyaan);
            
            tmpidpertanyaan.splice(0,0,id_questioner_pertanyaan);
            

            var ratingValue = parseInt($(this).find('.selected').last().data('value'), 10) || 0;

            tmpratingValue.splice(0,0,ratingValue);
            
            console.log('isi tmp rating '+tmpratingValue);

            // var tmp = Math.round($(this).find('.selected').last().data('value'));
            // tmp = parseInt(tmp) || 0;
            // var selectstar = round(parseInt(tmp),0);
            // tmprata = tmprata+parseInt(selectstar)/7;
            // tmpakhir = tmpakhir+tmp;
            // console.log('isi tmp '+tmp);
        });
        // JUST RESPONSE (Not needed)
        $('#id_questioner_pertanyaan').val(tmpidpertanyaan.join(','));
        $('#ratingValue').val(tmpratingValue.join(','));
        // console.log(stars.length);
        // console.log(onStar);
        // $('#hasilrata').val(round(tmprata,0));
        // $('#hasilakhir').val(tmpakhir);
      });
    });
</script>