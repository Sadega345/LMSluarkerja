            <div class="block-header p-t-25">
                <div class="row">
                    <div class="col-md-4 ">
                        <p class="fz-18 biru nunito-bold p-t-25"> My Profile / Profile Information</p>
                    </div>
                    <div class="col-md-8"  align="right">
                        <p class="nunito-bold biru fz-18 p-t-25">Server Time : August 6th 2019, 08:20:10 AM</p>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                     <p class="nunito-bold biru font-18 p-t-25">Personal Information</p>
                  </div>
                </div>
                <hr class="m-t--5">
            </div>

            

            <div class="row clearfix">
              <div class="col-md-4">
                <div class="card m-h560">
                  <div class="container">
                    <div class="row p-t-25">
                      <div class="col-md-12 text-center">
                        <div class="profile-image2 upload-demo-wrap  upload-demo"> 
                            <img src="<?php echo base_url()?>assets/img/karyawan/<?php echo $dataKaryawan->gambar_foto!=''?$dataKaryawan->gambar_foto:'not.png' ?>" class="img-circle-profil " id="imgico2">

                            <form enctype="multipart/form-data" action="<?php echo base_url() ?>Employee/scrop" class="fhide2" method="post" id="fhide">
                                <p for="ifile2">
                                    <img src="<?php echo base_url()?>assets/img/editpoto.png" class="icopotoprof heighticopotoprof" >
                                </p>
                                <input type="file" id="ifile2" name="gambar_foto">
                                <input type="hidden" id="hcrop" name="hcrop">
                                <input type="hidden" value="<?php echo $this->session->userdata('nik'); ?>" name="nik">
                                 <div id="upload-demo2"></div>
                                <button class="btnfoto" type="button">SUBMIT</button>
                            </form>

                        </div>
                      </div>
                    </div>

                    <div class="row text-center">
                      <div class="col-md-12">
                        <p class="font-14 biru">Tom Delongue</p>
                      </div>
                    </div>

                    <div class="row text-center">
                      <div class="col-md-12">
                        <p class="font-14 biru">tothestar@media.com</p>
                      </div>
                    </div>

                    <div class="row text-center">
                      <div class="col-md-12">
                        <a href="#" class="btn for-buttonlogin col-md-12">Edit Profile</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


              <div class="col-md-8">
                <div class="card">
                  <div class="body">
                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">NIK</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">0201837281</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Name</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Tom Delongue</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Gender</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Laki-Laki</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Handphone</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">0821728172819</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Personal Email</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">tothestars@media.com</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Place and birthdate</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">San diego</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Address</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Amerika</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">City</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Washington</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Postal Code</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">44162</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Religion</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Islam</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Marital Status</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Belum Menikah</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Occupation</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Menyanyi/Artist</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <p class="font-14 abu">Nationally</p>
                      </div>
                      <div class="col-md-8">
                        <p class="font-14 biru">Amerika</p>
                      </div>
                    </div>                      

                  </div>
                </div>
              </div>

            </div>
            
            <div class="row">
              <div class="col-md-12">
                 <p class="nunito-bold biru font-18">Emergency Contact</p>
              </div>
            </div>
            <hr class="m-t--5">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                      <div class="body">
                        <div class="row">
                          <div class="col-md-2">
                            <p class="font-14 abu">Name</p>
                          </div>
                          <div class="col-md-10">
                            <p class="font-14 biru">Tom Delongue</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <p class="font-14 abu">Address</p>
                          </div>
                          <div class="col-md-10">
                            <p class="font-14 biru">Amerika</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <p class="font-14 abu">City</p>
                          </div>
                          <div class="col-md-10">
                            <p class="font-14 biru">San Diego</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <p class="font-14 abu">Postal Code</p>
                          </div>
                          <div class="col-md-10">
                            <p class="font-14 biru">44162</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <p class="font-14 abu">Phone</p>
                          </div>
                          <div class="col-md-10">
                            <p class="font-14 biru">082718271829</p>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>

<script type="text/javascript">
	$(document).ready(function (e) {
    
	$('.btnfoto').hide();
    $("#ifile").on("change", function() {
        $("#fhide").submit();
    });
  	$('#upload-demo2').hide();
    	var $uploadCrop2;
			$uploadCrop2 = $('#upload-demo2').croppie({
					viewport: {
						width: 200,
						height: 200,
						type: 'circle'
					},
					//enableExif: true
					boundary:{width: 300,
						height: 200,}
				});
			//$uploadCrop.croppie('bind','<?php echo base_url() ?>assets/img/imgUser/not.png');
    $("#ifile2").on("change", function() {
    	$('#upload-demo2').show();
       //$("#fhide").submit();
       readFile(this);
    });
    $(".btnfoto").on("click", function() {
    	$uploadCrop2.croppie('result', {
				type: 'canvas',
				size: 'original'
			}).then(function (resp) {
				$('#hcrop').val(resp);
				$('.fhide2').submit();
				
			});
    });

function readFile(input) {
    	
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
				$('.upload-demo').addClass('ready');
				console.log(e.target.result);
				
            	$uploadCrop2.croppie('bind', {
            		url: e.target.result
            	}).then(function(){

            		$('#imgico2').hide();
            		
            		$('.btnfoto').show();
            		console.log('jQuery bind complete');
            	});
            	
            }
            
            reader.readAsDataURL(input.files[0]);
        }
        else {
	        swal("Sorry - you're browser doesn't support the FileReader API");
	    }
	}

});
</script>