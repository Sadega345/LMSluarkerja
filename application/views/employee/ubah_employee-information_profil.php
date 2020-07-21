            <!-- <div class="block-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h6 class="tittle-menu">
                            Employee Information / Ubah Profil</h6>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row clearfix m-b--40">
            	<div class="col-lg-12 col-md-12">
					<div class="card ">
	                	<div class="body">
	            			<h6 class="tittle-box" align="center">Edit Profil <?php //echo $dataKaryawan->nama_lengkap ?></h6>
				            <div class="row">
				            	<div class="col-md-1">
				            		
				            	</div>
				            	<div class="upload-demo-wrap  upload-demo">
				                    <img src="<?php //echo base_url()?>assets/img/karyawan/<?php //echo $dataKaryawan->gambar_foto!=''?$dataKaryawan->gambar_foto:'not.png' ?>" class="img-circle-profil " id="imgico2">
				                	<form enctype="multipart/form-data" action="<?php //echo base_url() ?>Employee/scrop" class="fhide2" method="post" id="fhide">
										<label for="ifile2">
											<img src="<?php //echo base_url()?>assets/img/editpoto.png" class="icopotoprof heighticopotoprof" >
										</label>
										<input type="file" id="ifile2" name="gambar_foto">
										<input type="hidden" id="hcrop" name="hcrop">
										<input type="hidden" value="<?php //echo $this->session->userdata('nik'); ?>" name="nik">
										 <div id="upload-demo2"></div>
										<button class="btnfoto" type="button">SUBMIT</button>
									</form>
							  	</div>
							</div>
				    	</div>
				    </div>
				</div>
			</div> -->

            <form method="post" action="<?php echo base_url()?>Employee/prosesUbahProfil" class="form-ubah">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                         <!-- <div class="card "> -->
                             <div class="body">
                                <div class="row">
                                    <div class="col-md-4" align="left">
                                        <h6 class="tittle-box">Data Diri</h6>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                   <div class="col-md-1">
                                		
                                   </div>
                                   <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="nama_lengkap" value="<?php //echo $dataKaryawan->nama_lengkap ?>">
                                        </div>
                                    </div>                 
                                </div> -->
                                <!-- <div class="row">
                                   	<div class="col-md-1">
                                		
                                   	</div>
                                   	<div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nama Panggilan</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="nama_panggilan" value="<?php //echo $dataKaryawan->nama_panggilan ?>">
                                        </div>
                                    </div>                 
                                </div> -->
                                <!-- <div class="row">
                                   	<div class="col-md-1">
                                		
                                   	</div>
                                   	<div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Tempat Tanggal Lahir</label>
                                        </div>
                                    </div>    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="tempat_lahir" value="<?php //echo $dataKaryawan->tempat_lahir ?>">
                                        </div>
                                    </div>  
                                    <div class="col-md-3">
                                    	<div class="form-group">
                                           <input type="date" class="form-control" name="tanggal_lahir" value="<?php //echo $dataKaryawan->tanggal_lahir ?>">
                                        </div>
                                    </div>           
                                </div> -->
                                <!-- <div class="row">
                                    
                                    <div class="col-md-3" align="right">
                                        <div class="form-group">
                                            <label>Jenis Kelamin </label>
                                        </div>
                                    </div>  
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="fancy-radio">
                                               <input type="radio" class="form-control" name="jenis_kelamin" value="<?php //echo $dataKaryawan->jenis_kelamin ?>" <?php e//cho $dataKaryawan->jenis_kelamin=='L'?'checked':'' ?>>
                                                <span><i></i>Laki-Laki</span>
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                           <label class="fancy-radio">
                                               <input type="radio" class="form-control" name="jenis_kelamin" value="<?php //echo $dataKaryawan->jenis_kelamin ?>" <?php //echo $dataKaryawan->jenis_kelamin=='P'?'checked':'' ?>>
                                                <span><i></i>Perempuan</span>
                                            </label>
                                        </div>
                                    </div>                 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Agama</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <select name="id_agama"  class="form-control select2"  tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    //foreach($dataAgama->result() as $dt){ ?>
                                                        <option value="<?php //echo $dt->id_agama;?>" <?php //echo $dt->id_agama==$dataKaryawanProfil->id_agama?'selected':'';?>><?php //echo $dt->deskripsi;?></option>
                                                <?php
                                                    //}
                                                ?>  
                                            </select>
                                        </div>
                                    </div>                 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Status Pernikahan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <select name="id_sts_nikah"  class="form-control select2"  tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    //foreach($dataNikah->result() as $nikah){ ?>
                                                        <option value="<?php //echo $nikah->id_sts_nikah;?>" <?php //echo $nikah->id_sts_nikah==$dataKaryawanProfil->id_sts_nikah?'selected':'';?>><?php //echo $nikah->deskripsi;?></option>
                                                <?php
                                                    //}
                                                ?>  
                                            </select>
                                        </div>
                                    </div>                 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Golongan Darah</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="golongan_darah" class="form-control select2" id="selgoldar">
                                                <option value="">-- Pilih Golongan Darah --</option>
                                                <?php
                                                // $datagoldar=array(
                                                //     "O","O+","O-"
                                                //     ,"A","A+","A-"
                                                //     ,"B","B+","B-"
                                                //     ,"AB","AB+","AB-"
                                                // );
                                                //foreach($datagoldar as $dtgd){
                                                    ?>
                                                    <option value="<?php //echo $dtgd; ?>" <?php //echo $dtgd==$dataKaryawan->golongan_darah?'selected':'';?> > <?php //echo $dtgd; ?></option>
                                                    <?php
                                                //}
                                                ?>
                                            </select>
                                           
                                        </div>
                                    </div>                 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="alamat" value="<?php //echo $dataKaryawan->alamat ?>">
                                        </div>
                                    </div>                
                                </div> -->
                                
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <select  class="form-control select2" id="selprov" onchange="pilihKab(this.value,0);" tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    //foreach($dataProvinsi->result() as $dt){ ?>
                                                        <option value="<?php //echo $dt->id_provinsi;?>" <?php //echo $dt->id_provinsi==$dataKaryawanProfil->id_provinsi?'selected':'';?>><?php //echo $dt->provinsi;?></option>
                                                <?php
                                                    //}
                                                ?>  
                                            </select>
                                        </div>
                                    </div>                 
                                </div> -->
                                
                                <!-- <div class="row" id="rowkab">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Kabupaten/Kota</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <select  class="form-control select2" id="selkab" onchange="pilihKec(this.value,0);" tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    //foreach($dataKabupaten->result() as $dt){ ?>
                                                        <option value="<?php //echo $dt->id_kabupaten;?>" <?php //echo $dt->id_kabupaten==$dataKaryawanProfil->id_kabupaten?'selected':'';?>><?php //echo $dt->kabupaten;?></option>
                                                <?php
                                                    //}
                                                ?>  
                                            </select>
                                        </div>
                                    </div>                 
                                </div> -->
                                
                                <!-- <div class="row" id="rowkec">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <select name="id_kecamatan"  class="form-control select2" id="selkec" tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    //foreach($dataKecamatan->result() as $dt){ ?>
                                                        <option value="<?php //echo $dt->id_kecamatan;?>" <?php //echo $dt->id_kecamatan==$dataKaryawanProfil->id_kecamatan?'selected':'';?>><?php //echo $dt->deskripsi;?></option>
                                                <?php
                                                    //}
                                                ?>  
                                            </select>
                                        </div>
                                    </div>                 
                                </div> -->
                                
                                
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Kode Pos</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="kode_pos" value="<?php //echo $dataKaryawan->kode_pos ?>">
                                        </div>
                                    </div>                 
                                </div> -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nomor Handphone</p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Nomor Handphone</p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="text" class="form-control fcheight" name="nomor_telepon" value="<?php echo $dataKaryawanProfil->nomor_telepon ?>">
                                    </div>                 
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nomor Handphone Kerabat</p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Nomor Handphone Kerabat</p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <input type="text" class="form-control fcheight" name="nomor_telepon_kerabat" value="<?php echo $dataKaryawanProfil->nomor_telepon_kerabat ?>">
                                    </div>                 
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Email</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="email" value="<?php //echo $dataKaryawan->email ?>">
                                        </div>
                                    </div>                 
                                </div> -->
                                
                                <!-- Data Bank -->
                                <div class="row">
                                    <div class="col-md-4" align="left">
                                        <h6 class="tittle-box">Rekening Bank</h6>
                                    </div>
                                </div>
                                <!-- <div class="row  m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Bank</p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Nama Bank</p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                         <select name="id_bank"  class="form-control fcheight select2" onchange="ubah(this.value)" tabindex="2" id="id_bank" required>
                                            <option value="">--Pilih--</option>
                                            <?php
                                                //foreach($dataBank->result() as $dt){ ?>
                                                    <option data-max='<?php //echo $dt->jumlah_digit ?>' value="<?php //echo $dt->id_bank;?>|<?php //echo $dt->jumlah_digit ?>" <?php //echo $dt->id_bank==$dataGaji->id_bank?'selected':'';?>><?php //echo $dt->deskripsi;?></option>
                                            <?php
                                                //}
                                            ?>  
                                        </select>
                                    </div>
                                </div> -->
                                <div class="row  m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nomor Rekening Bank</p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Nomor Rekening Bank</p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <?php if ($dataGajiRows == 0){ ?>
                                            <input type="text" class="form-control fcheight" id="norek" onkeypress="return hanyaAngka(event)" name="nomor_rek" value="">
                                        <?php }else{ ?>
                                            <!-- <input type="text" class="form-control fcheight" maxlength="<?php //echo $dataGaji->id_bank==2?13:10 ?>" onkeypress="return hanyaAngka(event)" id="norek" name="nomor_rek" value="<?php //echo $dataGaji->nomor_rek ?>"> -->
                                            <input type="text" class="form-control fcheight" maxlength="13" onkeypress="return hanyaAngka(event)" id="norek" name="nomor_rek" value="<?php echo $dataGaji->nomor_rek ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- <div class="row  m-t-10">
                                    <div class="col-md-3">
                                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Akun Rekening Bank</p>  
                                        <p class="d-sm-none fz-14-judul fz-14-judul">Nama Akun Rekening Bank</p>    
                                    </div>
                                    <div class="col-md-6 col-12" align="left">
                                        <?php //if ($dataGajiRows == 0){ ?>
                                            <input type="text" onkeypress="return hanyaHuruf(event)" class="form-control fcheight" name="atas_nama_rek" value="">
                                        <?php //}else{ ?>
                                           <input type="text" onkeypress="return hanyaHuruf(event)" class="form-control fcheight" name="atas_nama_rek" value="<?php //echo $dataGaji->atas_nama_rek ?>">
                                        <?php //} ?>
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                	<div class="col-md-1">
                                		
                                   	</div>
                                   	<div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nomor Rekening Bank</label>
                                        </div>
                                    </div>    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php// if ($dataGajiRows == 0){ ?>
                                                <input type="text" class="form-control" name="nomor_rek" value="">
                                            <?php //}else{ ?>
                                                <input type="text" class="form-control" name="nomor_rek" value="<?php //echo $dataGaji->nomor_rek ?>">
                                            <?php //} ?>
                                        </div>
                                    </div>             
                                </div> -->
                                <!-- <div class="row">
                                   	<div class="col-md-1">
                                		
                                   	</div>
                                   	<div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nama Bank</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <select name="id_bank"  class="form-control select2"  tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                   // foreach($dataBank as $dt){ ?>
                                                        <option value="<?php// echo $dt->id_bank;?>" <?php// echo $dt->id_bank==$dataKaryawan->id_bank?'selected':'';?>><?php// echo $dt->deskripsi;?></option>
                                                <?php
                                                  //  }
                                                ?>  
                                            </select>
                                        </div>
                                    </div>                 
                                </div> -->
                                <!-- <div class="row">
                                	<div class="col-md-1">
                                		
                                   	</div>
                                   	<div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nama Akun Rekening Bank</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <?php //if ($dataGajiRows == 0){ ?>
                                            <input type="text" class="form-control" name="atas_nama_rek" value="">
                                        <?php //}else{ ?>
                                           <input type="text" class="form-control" name="atas_nama_rek" value="<?php //echo $dataGaji->atas_nama_rek ?>">
                                        <?php// } ?>
                                        </div>
                                    </div>               
                                </div> -->
                                <!-- <br> -->

                                <!-- Tanggungan -->
                                <div class="row">
                                    
                                    <div class="col-md-7" align="left">
                                        <label class="tittle-box">Tanggungan</label>
                                    </div>
                                    <div class="col-md-5" align="right">
                                        <span>
                                        <a href="javascript:void(0);" onclick="showTanggungan()" class="btn Rectangle-cari"> Tambah Tanggungan
                                        </a>
                                        </span>

                                    </div>
                                </div>
                                        
                                <div class="table-responsive">
                                    <table  class="table js-employee" style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Tanggungan</th>
                                                <th>Hubungan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="isitanggungan">
                                            <?php 
                                                $no = 1;
                                                foreach ($dataTanggunganKaryawanProfil->result() as $tanggungan) {
                                             ?>
                                           <tr>
                                            
                                               <td><?php echo $no; ?></td>
                                               <td><?php echo $tanggungan->nama ?></td>
                                               <td><?php echo $tanggungan->status_hubungan_keluarga ?></td>
                                               <td>
                                                <a href="javascript:void(0);" class="btn btn-primary" onclick="editTanggungan(<?php echo $tanggungan->id_keluarga_pasangan ?>,'<?php echo $tanggungan->nama ?>','<?php echo $tanggungan->status_hubungan_keluarga ?>')">
                                                  Edit
                                                </a>

                                                   <a href="<?php echo base_url() ?>Employee/prosesHapusTanggungan/<?php echo $tanggungan->id_keluarga_pasangan ?>"  class="btn btn-red1" onClick="return confirm('Anda yakin ingin menghapus data ini? ')" title="Batal">Hapus
                                                    </a>
                                               </td>
                                            
                                           </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>

                                <!-- Pendidikan Terakhir -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label class="tittle-box">Pendidikan Terakhir</label>
                                    </div>
                                </div>
                                <?php //if ($dataPendidikanKaryawanProfil->num_rows() > 0){ ?>
                                <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Pendidikan Terakhir</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          
                                          <select name="id_pendidikan"  class="form-control select2"  tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    //foreach($dataPendidikanKar->result() as $dt){ ?>
                                                        <option value="<?php //echo $dt->id_pendidikan;?>" <?php //echo $dt->id_pendidikan==$dataPendidikanKaryawanProfil->row()->id_pendidikan?'selected':'';?>><?php //echo $dt->deskripsi;?></option>
                                                <?php
                                                    //}
                                                ?>  
                                            </select>
                                        </div>
                                    </div>           
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nama Institusi</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="nama_sekolah" value="<?php //echo $dataPendidikanKaryawanProfil->row()->nama_sekolah ?>">
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="jurusan" value="<?php //echo $dataPendidikanKaryawanProfil->row()->jurusan ?>">
                                        </div>
                                    </div> 
                                </div> -->

                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Tahun Masuk</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="number" min="1980" max="2019" class="form-control" name="tahun_masuk" value="<?php //echo $dataPendidikanKaryawanProfil->row()->tahun_masuk ?>">
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Tahun Lulus</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="number" min="1980" max="2019" class="form-control" name="tahun_lulus" value="<?php //echo $dataPendidikanKaryawanProfil->row()->tahun_lulus ?>">
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <?php //}else{ ?> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Pendidikan Terakhir</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          
                                          <select name="id_pendidikan"  class="form-control  select2me"  tabindex="2" required>
                                                <option value="">--Pilih--</option>
                                                <?php
                                                    //foreach($dataPendidikanKar->result() as $dt){ ?>
                                                        <option value="<?php //echo $dt->id_pendidikan;?>" <?php //echo $dt->id_pendidikan?>><?php //echo $dt->deskripsi;?></option>
                                                <?php
                                                    //}
                                                ?>  
                                            </select>
                                        </div>
                                    </div>           
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nama Institusi</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="nama_sekolah">
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="jurusan" >
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Tahun Masuk</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="number" min="1980" max="2019" class="form-control" name="tahun_masuk" >
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Tahun Selesai</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="number" min="1980" max="2019" class="form-control" name="tahun_lulus" >
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <?php //} ?> -->

                                <!-- Pengalaman Terakhir -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label class="tittle-box">Pengalaman Terakhir</label>
                                    </div>
                                </div> -->
                                <!-- <?php //if ($dataPengalamanKaryawanProfil->num_rows() > 0){ ?> -->
                                    <!-- <div class="row">
                                        <div class="col-md-1">
                                            
                                        </div>
                                        <div class="col-md-2" align="right">
                                            <div class="form-group">
                                                <label>Nama Instansi</label>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <input type="text" class="form-control" name="nama_perusahaan" value="<?php //echo $dataPengalamanKaryawanProfil->row()->nama_perusahaan ?>">
                                            </div>
                                        </div> 
                                    </div> -->

                                    <!-- <div class="row">
                                        <div class="col-md-1">
                                            
                                        </div>
                                        <div class="col-md-2" align="right">
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <input type="text" class="form-control" name="nama_jabatan" value="<?php //echo $dataPengalamanKaryawanProfil->row()->nama_jabatan ?>" >
                                            </div>
                                        </div> 
                                    </div> -->

                                    <!-- <div class="row">
                                        <div class="col-md-1">
                                            
                                        </div>
                                        <div class="col-md-2" align="right">
                                            <div class="form-group">
                                                <label>Tahun Masuk</label>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <input type="number" min="1980" max="2019" class="form-control" name="tahun_mulai" value="<?php //echo $dataPengalamanKaryawanProfil->row()->tahun_mulai ?>">
                                            </div>
                                        </div> 
                                    </div> -->

                                    <!-- <div class="row">
                                        <div class="col-md-1">
                                            
                                        </div>
                                        <div class="col-md-2" align="right">
                                            <div class="form-group">
                                                <label>Tahun Selesai</label>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <input type="number" min="1980" max="2019" class="form-control" name="tahun_selesai" value="<?php //echo $dataPengalamanKaryawanProfil->row()->tahun_selesai ?>">
                                            </div>
                                        </div> 
                                    </div> -->
                                <!-- <?php //}else{ ?> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Nama Instansi</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="nama_perusahaan" >
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="nama_jabatan" >
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Tahun Masuk</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="number" min="1980" max="2019" class="form-control" name="tahun_mulai" >
                                        </div>
                                    </div> 
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <div class="form-group">
                                            <label>Tahun Selesai</label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <input type="number" min="1980" max="2019" class="form-control" name="tahun_selesai" >
                                        </div>
                                    </div> 
                                </div> -->
                                <?php //} ?>
                                <div class="row m-t-10">
                                    <div class="col-lg-6 col-md-6">
                                      <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                      <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>

                
            </form>
                        
            <div id="rowtanggungan">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-5"  align="right">
                            <label>Nama Tanggungan</label>
                        </div> -->
                        <div class="col-md-5">
                            <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Tanggungan</p>  
                            <p class="d-sm-none fz-14-judul fz-14-judul">Nama Tanggungan</p> 
                        </div>
                        <div class="col-md-7 col-12" align="left">
                            <input id="namatanggungan" type="text" class="form-control fcheight" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- <div class="col-5"  align="right">
                            <label>Hubungan</label>
                        </div> -->
                        <div class="col-md-5">
                            <p class="float-left hidden-sm fz-14-judul m-t-20">Hubungan</p>  
                            <p class="d-sm-none fz-14-judul fz-14-judul">Hubungan</p> 
                        </div>
                        <div class="col-md-7 col-12" align="left">
                            <input id="hubungan" type="text" class="form-control fcheight" />
                        </div>
                    </div>
                </div>
            </div>

            <div id="edittanggungan">
                <input type="hidden" id="id_keluarga">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Tanggungan </p>  
                            <p class="d-sm-none fz-14-judul fz-14-judul">Nama Tanggungan </p>
                        </div>
                        <div class="col-md-7 col-12" align="left">
                            <input id="namatanggungan" type="text" class="form-control fcheight" value="<?php echo $dataTanggunganKaryawanProfilRow->nama ?>" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <p class="float-left hidden-sm fz-14-judul m-t-20">Hubungan </p>  
                            <p class="d-sm-none fz-14-judul fz-14-judul">Hubungan </p>
                        </div>
                        <div class="col-md-7 col-12" align="left">
                            <input id="hubungan" type="text" class="form-control fcheight" value="<?php echo $dataTanggunganKaryawanProfilRow->status_hubungan_keluarga ?>" />
                        </div>
                    </div>
                </div>
            </div>
                        

            <script type="text/javascript">
                var tabletanggungan = '';

                
                $(document).ready(function(){
                    var tabletanggungan = $('.js-employee').DataTable({
                        dom: 't',
                        responsive: true
                    });
                    $('#rowtanggungan').hide();
                    $('#edittanggungan').hide();
                });

                function refresh() {
                    $('.js-employee').DataTable({
                        dom: 't',
                        responsive: true
                    });
                    
                }
                function editTanggungan(id,nama,hubungan){
                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-blue1',
                        cancelButton: 'btn btn-red1'
                      },
                      buttonsStyling: false,
                    })
                    $rowtunjangan=$('<div id="poptanggungan">'+$("#edittanggungan").html()+'</div>');
                    swalWithBootstrapButtons.fire({
                      title: 'Edit Tanggungan',
                      html: $rowtunjangan,
                      //type: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Edit',
                      cancelButtonText: 'Batal',
                      /* reverseButtons: true, */
                      allowOutsideClick: false
                    }).then((result) => {
                      if (result.value) {
                        /* swalWithBootstrapButtons.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        ) */
                        var txttanggungan=$("#poptanggungan").find("#namatanggungan").val();
                        var txthubungan=$("#poptanggungan").find("#hubungan").val();
                        // alert(txttanggungan+' '+txthubungan);
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url()?>Employee/editTanggungan",
                            data: {id_pasangan:id,namatanggungan:txttanggungan,hubungan:txthubungan},
                            success: function(data) {
                                $('.js-employee').dataTable().fnDestroy();
                                $('#isitanggungan').html(data);
                                refresh();
                            }
                        });
                      } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        /* swalWithBootstrapButtons.fire(
                          'Cancelled',
                          'Your imaginary file is safe :)',
                          'error'
                        ) */
                      }
                    })
                    $("#poptanggungan").find("#id_keluarga").val(id);
                    $("#poptanggungan").find("#namatanggungan").val(nama);
                    $("#poptanggungan").find("#hubungan").val(hubungan);
                }
                function showTanggungan(){
                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-blue1',
                        cancelButton: 'btn btn-red1'
                      },
                      buttonsStyling: false,
                    })
                    $rowtunjangan=$('<div id="poptanggungan">'+$("#rowtanggungan").html()+'</div>');
                    swalWithBootstrapButtons.fire({
                      title: 'Tambah Tanggungan',
                      html: $rowtunjangan,
                      //type: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Tambah',
                      cancelButtonText: 'Batal',
                      /* reverseButtons: true, */
                      allowOutsideClick: false
                    }).then((result) => {
                      if (result.value) {
                        /* swalWithBootstrapButtons.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        ) */
                        var txttanggungan=$("#poptanggungan").find("#namatanggungan").val();
                        var txthubungan=$("#poptanggungan").find("#hubungan").val();
                        // alert(txttanggungan+' '+txthubungan);
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url()?>Employee/prosesTanggungan",
                            data: {namatanggungan:txttanggungan,hubungan:txthubungan},
                            success: function(data) {
                                $('.js-employee').dataTable().fnDestroy();
                                $('#isitanggungan').html(data);
                                refresh();
                            }
                        });
                      } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        /* swalWithBootstrapButtons.fire(
                          'Cancelled',
                          'Your imaginary file is safe :)',
                          'error'
                        ) */
                      }
                    })
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
							//$uploadCrop.croppie('bind','<?php //echo base_url() ?>assets/img/imgUser/not.png');
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
<script type="text/javascript">
    function pilihKab(idprov,idkabsel){
        if(idprov!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilKab", 
              data: {id_provinsi : idprov}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowkab").show();
                $("#selkab").html(response.data_kabupaten).show();
                if(idkabsel!=0){
                    $('#selkab option[value='+idkabsel+']').attr('selected','selected');
                } else {
                    $("#rowkec").hide();
                }
                $("#selkab").select2();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#rowkab").hide();
            $("#rowkec").hide();
        }
    }
    function pilihKec(idkab,idkecsel){
        if(idkab!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilKec", 
              data: {id_kabupaten : idkab}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowkec").show();
                $("#selkec").html(response.data_kecamatan).show();
                if(idkecsel!=0){
                    $('#selkec option[value='+idkecsel+']').attr('selected','selected');
                }
                $("#selkec").select2();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#rowkec").hide();
        }
    }
</script>

<script type="text/javascript">
    
    function ubah(id_bank){
        var param = id_bank.split("|");
        $('#norek').val('');

        //ngisi id selected
       // $('#id_bank').find(':selected').value=param[0];
        $('#norek').attr('maxlength', param[1]);
       
    }
</script>
            