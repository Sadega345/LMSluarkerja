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
                    <ul class="nav nav-tabs-new2">
                        <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" data-toggle="tab" href="#akademik">Data Akademik</a></li>
                        <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" data-toggle="tab" href="#pribadi">Data Pribadi</a></li>
                        <li class="nav-item col-md-3 col-12"><a class="nav-link <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" data-toggle="tab" href="#keluarga">Data Keluarga</a></li>
                    </ul>
                  </div>
                </div>
                <hr class="m-t--5">
            </div>

            <div class="tab-content">
              <div class="tab-pane <?php echo  $this->uri->segment(3)==2 || ($this->uri->segment(3)=="") ?'show active':'' ?>" id="akademik">
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
                            <a href="javascript:;" onclick="formedit()" class="btn for-buttonlogin col-md-12">Edit Profile</a>
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
                            <p class="font-14 abu">NIM</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">0201837281</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Nama Lengkap</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Tom Delongue</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Kelas</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Karyawan</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Fakultas</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Ilmu Komputer</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Program Studi</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">S1 Teknik Informatika</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Jenjang Prodi</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">S1</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Tahun Masuk</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">2020</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Semester</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">1 (Ganjil) 2020</p>
                          </div>
                        </div>                    

                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-pane <?php echo  $this->uri->segment(3)==3 ?'show active':'' ?>" id="pribadi">
                <div class="row clearfix">
                  <div class="col-md-4">
                    <div class="card m-h633">
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
                            <a href="javascript:;" onclick="formedit()" class="btn for-buttonlogin col-md-12">Edit Profile</a>
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
                            <p class="font-14 abu">Nama Lengkap</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Tom Delongue</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Jenis Kelamin</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Laki-Laki</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Email</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">tothestar@media.com</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">No Handphone</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">082127472817</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Tempat Lahir</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Los Angles</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Tanggal Lahir</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">11 Mei 1990</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Agama</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Islam</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Status Sipil</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Belum Menikah</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Pekerjaan</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Band</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Kewarganegaraan</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Amerika</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Alamat</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">Los angels galacticos</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Provinsi</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">California</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Kab/Kota</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">California</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <p class="font-14 abu">Kode Pos</p>
                          </div>
                          <div class="col-md-8">
                            <p class="font-14 biru">440291</p>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-pane <?php echo  $this->uri->segment(3)==4 ?'show active':'' ?>" id="keluarga">
                <div class="row clearfix">
                  <div class="col-md-4">
                    <div class="card m-h440">
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
                            <a href="javascript:;" onclick="formedit()" class="btn for-buttonlogin col-md-12">Edit Profile</a>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="card">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-12">
                                <p class="fz-14 biru nunito-bold p-t-25">Data Ayah</p>    
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Nama Ayah</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Delongue</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Tempat Lahir</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Los Angles</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Tanggal Lahir</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">11 Mei 1987</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">No Handphone</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">08291828271</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Pekerjaan</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Petani</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Kewarganegaraan</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Amerika</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Alamat</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Los Angles Galacticos</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Provinsi</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">California</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Kab/Kota</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">California</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Kode Pos</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">440161</p>
                              </div>
                            </div>

                          </div>

                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-12">
                                <p class="fz-14 biru nunito-bold p-t-25">Data Ibu</p>    
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Nama Ibu</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Maria Evania</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Tempat Lahir</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Los Angles</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Tanggal Lahir</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">11 Mei 1987</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">No Handphone</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">08291828271</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Pekerjaan</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Petani</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Kewarganegaraan</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Amerika</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Alamat</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">Los Angles Galacticos</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Provinsi</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">California</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Kab/Kota</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">California</p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5">
                                <p class="font-14 abu">Kode Pos</p>
                              </div>
                              <div class="col-md-7">
                                <p class="font-14 biru">440161</p>
                              </div>
                            </div>

                          </div>

                        </div>                    

                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <!-- edit modal -->
            <div class="modal fade bd-example-modal-lg" id="edit">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form action="<?php echo base_url()?>HR/ProsesEditResign" method="post">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18 biru">Profile Information</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formedit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6" align="center">
                                                <button type="submit" class="btn Rectangle-save col-md-3">Simpan</button>
                                                <button type="button" class="btn Rectangle-cancel col-md-3" data-dismiss="modal" >Batal</button>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#edit').modal({backdrop: 'static', keyboard: false});
                  });

                function formedit(){
                    // alert('nik: '+a);
                    $.ajax({
                      url: "<?php echo base_url();?>User/EditInformation",
                      // data: {nik:a},
                      type: "post",
                      // dataType:'json',
                      success: function (response) {
                         // alert('masuk');
                          $('#edit').modal('show');
                          $('#formedit').html(response);
                          var drEvent = $('#dropify-event').dropify();
                          $('.tglval').keydown(function (event){
                            event.preventDefault();
                          });
                          setTimeout(function(){
                            tgl();
                          },1000);
                          $('.summernote').summernote({
                            height: 300,
                            focus: true,
                            onpaste: function() {
                                alert('You have pasted something to the editor');
                            }
                        });
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                      }
                  });
                }
            </script>

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