<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Project Order / Baru</h6>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <h2 class="tittle-box text-center m-t-30">PROJECT ORDER</h2>
            <div class="body">
            	<form method="post" id="simpan" action="<?php echo base_url() ?>Outsource/prosesTambahBaru">
            		<input type="hidden" name="status" value="1">
            		<!--
                    <div class="row">
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Nomor Dokumen</label>
			                    <input type="text" class="form-control" name="nomor_dokumen" required="" placeholder="Nomor Dokumen">
			                </div>
		                </div>
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Terbit :</label>
			                    <input type="date" class="form-control" name="tanggal_terbit" required placeholder="Tanggal Terbit">
			                </div>  
		              	</div>
		              	<div class="col-md-3">
			                <div class="form-group">
			                    <label>Revisi :</label>
			                    <input type="text" class="form-control" name="revisi" required placeholder="Revisi">
			                </div>  
		              	</div>
		              	<div class="col-md-3">
			                <div class="form-group">
			                    <label>Halaman :</label>
			                    <input type="text" class="form-control" name="halaman" required placeholder="Halaman">
			                </div>
		                </div>
		            </div>
                    -->
		            <div class="row">
		                
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>No. Surat Kontrak :</label>
			                    <input type="text" class="form-control" name="no_surat_kontrak" required placeholder="Nomor Surat Kontrak">
			                </div>  
		              	</div>
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Kontrak :</label>
			                    <input type="text"  data-date-format="dd/mm/yyyy" class="form-control datepicker2" data-id="tglkontrak" required placeholder="Tanggal Kontrak" readonly>
                                <input type="hidden" id="tglkontrak" name="tgl_kontrak"  />
			                </div>  
		              	</div>
		              	<div class="col-md-3">
			                <div class="form-group">
			                    <label>Nomor Projek Order :</label>
			                    <input type="text" class="form-control" name="no_projek_order" required placeholder="Nomor Projek Order">
			                </div>  
		              	</div>
		              	<div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Project Order :</label>
			                    <input type="text" data-id="tglpo" class="form-control datepicker2" data-date-format="dd/mm/yyyy" required placeholder="Tanggal Project Order" readonly>
                                <input type="hidden" id="tglpo" name="tanggal_projek_order"  />
			                </div>  
		              	</div>
                    </div>
                    <!--  
		            <div class="row">
		              	<div class="col-md-12">
			                <div class="form-group">
			                  <label>Nomor :</label>
			                  <input type="text" class="form-control" name="nomor" placeholder="Nomor">
			                </div>
		              	</div>
		            </div>
		            <div class="row">
		              	<div class="col-md-12">
			                <div class="form-group">
			                  <label>Paket :</label>
			                  <input type="text" class="form-control" name="paket" placeholder="Paket">
			                </div>
		              	</div>
		            </div>
                    -->
	                <div id="wizard_horizontal">
	                    <h2>M A R K E T I N G</h2>
	                    <section>
				            <div class="form-group">
				              <label>Nama Pekerjaan :</label>
				              <input type="text" class="form-control" required name="nama_pekerjaan" placeholder="Nama Pekerjaan">
				            </div>
                            <div class="form-group" id="rowclient">
				              <label>Nama Perusahaan :</label>
				              <!-- <input type="text" class="form-control" required=""> -->
				              	<select name="id_master_perusahaan" class="form-control select2" id="selclient" >
				              		<option disabled selected="">Nama Perusahaan</option>
				              		<?php foreach ($dataPerusahaan->result() as $perusahaan) { ?>	
				              			<option value="<?php echo $perusahaan->id_master_perusahaan ?>"><?php echo $perusahaan->nama_perusahaan ?></option>
				          			<?php } ?>
				          		</select>
				            </div>
                            <div class="form-group">
				              <label>Lokasi :</label>
                              <select name="id_lokasi[]" id="lokasi" class="form-control select2" multiple required>
                                    <?php
                                    /* foreach($dataLokasiC->result() as $dtl){
                                        ?>
                                        <option value="<?php echo $dtl->id_lokasi_kantor; ?>"> <?php echo $dtl->desKabupaten; ?></option>
                                        <?php
                                    } */
                                    ?>
                                </select>
                            </div>
				            <div class="form-group">
				                <label>Alamat Perusahaan :</label>
				                <textarea class="form-control" rows="5" cols="30" id="alamat" readonly=""></textarea>
				            </div>
				            <div class="form-group">
				              <label>Kota :</label>
				              <input type="text" class="form-control" readonly="" id="kota" name="kota">
				            </div>

				            <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No. Telp :</label>
				                    <input type="text" class="form-control" readonly="" id="no_telp_marketing" name="no_telepon_marketing">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No. Faximile :</label>
				                    <input type="text" class="form-control" readonly="" id="no_faximile" name="no_faximile">
				                </div>  
				              </div>
				            </div>
				            <!-- <div class="form-group">
				                <label>Jenis Project :</label>
				                <br>
                                <div class=" col-md-12">
	                                <select class="form-control show-tick ms select2" id="" multiple  name="jenis_project[]">
	                                <?php// $a=array("Security", "Cleaning Service", "Warehouse Helper", "Admin", "Driver", "Other Outsource");
	                                	//foreach ($dataJenisProjek->result() as $projek)//{ ?>
	                                    <option value="<?php //echo $projek->id_master_jenis_project ?>" <?php //echo in_array($projek->jenis_project, $a)?'selected':''; ?>><?php //echo $projek->jenis_project ?></option>
	                                <?php// } ?>
	                                </select>
	                            </div> -->
				                <?php /* foreach ($dataJenisProjek->result() as $projek){ ?>
				                	<label class="fancy-checkbox">
				                    <input class="jenis_project" type="checkbox" name="jenis_projek[]" value="<?php echo $projek->id_master_jenis_project ?>" required data-jp="<?php echo $projek->jenis_project ?>">
				                    <span> <?php echo $projek->jenis_project ?></span>
				                </label>
				                <?php } */ ?>
				               <!--  <p id="error-checkbox"></p> -->
				            <div class="form-group">
				                <label>Jenis Project :</label>
				                <br>
                                <div class=" col-md-12">
	                                <select class="form-control show-tick ms select2" id="seldept" multiple  name="jenis_project[]">
	                                <?php 
	                                	foreach ($dataJenisProjek->result() as $projek){ ?>
	                                    <option value="<?php echo $projek->id_master ?>"><?php echo $projek->nama_departemen ?></option>
	                                <?php } ?>
	                                </select>
	                            </div>
				            </div>
				            <div class="form-group">
				              <label>Contact person :</label>
				              <input type="text" class="form-control" required="" id="contact_person_marketing" name="contact_person_marketing">
				            </div>
				            <div class=" col-6 col-md-12">
	                            <label>Durasi Kontrak</label>
                                <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <div class="input-group mb-3 col-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" data-id="tglstart" class="input-sm form-control" id="start" data-date-format="yyyy-mm-dd" required readonly>
                                        <input type="hidden" id="tglstart" name="durasi_kontrak_awal" />
                                    </div>
                                    
                                    <span class="input-group-addon text-center" style="width: 40px;">s/d</span>
                                    
                                    <div class="input-group mb-3 col-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" data-id="tglend" class="input-sm form-control" id="end" data-date-format="yyyy-mm-dd" required readonly>
                                        <input type="hidden" id="tglend" name="durasi_kontrak_akhir" />
                                    </div>
                                    
                                </div>                                    
	                            <!-- <div class="input-daterange input-group" data-provide="">
	                                <input type="text" class="input-sm form-control datepicker2" data-date-format="dd/mm/yyyy" name="durasi_kontrak_awal">
	                                <span class="input-group-addon text-center" style="width: 100px;padding-top: 8px">s/d</span>
	                                <input type="text" class="input-sm form-control datepicker2" data-date-format="dd/mm/yyyy" name="durasi_kontrak_akhir">
	                            </div> -->
	                        </div>
	                        <br>
	                        <div class="row">
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Nilai Kontrak Per Bulan :</label>
					                    <input type="text" data-id="nkb" class="form-control" onkeyup="ribuan(this,this.value)" required onkeypress="return hanyaAngka(event)" placeholder="Rp.">
                                        <input type="hidden" id="nkb" name="nilai_kontrak_bulan"/>
					                </div>
				                </div>
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Ppn :</label>
                                        <input type="text" data-id="ppn" class="form-control" onkeyup="ribuan(this,this.value)" required onkeypress="return hanyaAngka(event)" placeholder="Rp.">
                                        <input type="hidden" id="ppn" name="ppn"/>
					                </div>  
				              	</div>
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Pph:</label>
					                    <input type="number" class="form-control" required name="pph" placeholder="%" min="0" max="100">
                                       <!--  <input type="number" data-id="pph" class="form-control" onkeyup="ribuan(this,this.value)" required onkeypress="return hanyaAngka(event)" placeholder="Rp.">
                                        <input type="hidden" id="pph" name="pph"/> -->
					                </div>
				              	</div>
				            </div>
	                    </section>
	                    <h2>K E U A N G A N</h2>
	                    <section>
	                    	<div class="form-group">
                                <label>Cara Penagihan :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="cara_penagihan" value="3" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                    <span><i></i>Sesuai Nilai Kontrak</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="cara_penagihan" value="1" data-parsley-multiple="gender">
                                    <span><i></i>Fluktuatif (ada lembur)</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="cara_penagihan" value="2" data-parsley-multiple="gender">
                                    <span><i></i>Langsung Tagih</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
				            <div class="form-group">
				              <label>Penagihan ditujukan kepada :</label>
				              <input type="text" readonly="" class="form-control" required name="penagihan_kepada" id="penagihan">
				            </div>
				            <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Contact Person :</label>
				                    <input type="text" class="form-control" required name="contact_person_keuangan" id="contact_person_keuangan">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" required onkeypress="return hanyaAngka(event)" name="no_telepon_keuangan" id="no_telp_keuangan">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Tanggal Penagihan :</label>
				               		<div class="row">
				               			<div class="col-3 col-md-2">
				               				<!-- <input type="number" class="form-control" required name="tanggal_penagihan" min='0' max="100"> -->
				               				<select name="tanggal_penagihan" class="form-control select2 " required >
							              			<option disabled selected="" value="0">Tanggal</option>
			                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
				                                	<option value="<?php echo $i?>"><?php echo $i?></option>
							          			<?php } ?>
							          		</select>
				               			</div>
				               			<div class="col-9 col-md-10">
				               				<p>(tanggal saat dimana tagihan yang benar harus sudah diterima klien)</p>
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Jatuh Tempo :</label>
				               		<div class="row">
				               			<div class="col-3 col-md-2">
				               				<!-- <input type="number" class="form-control" required name="jatuh_tempo" placeholder="Hari" min='0' max="100"> -->
				               				<select name="jatuh_tempo" class="form-control select2 " required >
							              			<option disabled selected="" value="0">Hari</option>
			                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
				                                	<option value="<?php echo $i?>"><?php echo $i?></option>
							          			<?php } ?>
							          		</select>
				               			</div>
				               			<div class="col-9 col-md-10">
				               				<p> hari setelah tagihan diterima dengan benar</p>
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
                                <label>Overtime/ lembur :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_keuangan" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="lembur">
                                    <span><i></i>Tidak</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="lembur_keuangan" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="lembur">
                                    <span><i></i>Ada</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_manajemen" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="fee">
                                    <span><i></i>Dikenakan Fee Manajemen</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="lembur_manajemen" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="fee">
                                    <span><i></i>Tanpa Fee Manajemen</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label>Pemberian lembur setiap tanggal :</label>
                                <br>
                                <select name="pemberian_lembur_tiap_tanggal" class="form-control select2 col-md-2" required >
				              			<option disabled selected="" value="0">Tanggal</option>
                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
	                                	<option value="<?php echo $i?>"><?php echo $i?></option>
				          			<?php } ?>
				          		</select>

                                <!-- <label class="fancy-radio">
                                    <input type="radio" name="pemberian_lembur_tiap_tanggal" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="beri_lembur">
                                    <span><i></i>01</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="pemberian_lembur_tiap_tanggal" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="beri_lembur">
                                    <span><i></i>15</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="pemberian_lembur_tiap_tanggal" value="3" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="beri_lembur">
                                    <span><i></i>20</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="pemberian_lembur_tiap_tanggal" value="4" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="beri_lembur">
                                    <span><i></i>25</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="pemberian_lembur_tiap_tanggal" value="5" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="beri_lembur">
                                    <span><i></i>30</span>
                                </label>
                                <p id="error-radio"></p> -->
                            </div>
				            <div class="form-group">
                                <label>Penggajian setiap tanggal :</label>
                                <br>
                                <select name="penggajian_tiap_tanggal" class="form-control select2 col-md-2" required>
				              			<option disabled selected="" value="0">Tanggal</option>
                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
	                                	<option value="<?php echo $i?>"><?php echo $i?></option>
				          			<?php } ?>
				          		</select>
                                <!-- <label class="fancy-radio">
                                    <input type="radio" name="penggajian_tiap_tanggal" value="1" data-parsley-errors-container="#error-radio" data-parsley-multiple="penggajian">
                                    <span><i></i>01</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="penggajian_tiap_tanggal" value="2" data-parsley-errors-container="#error-radio" data-parsley-multiple="penggajian">
                                    <span><i></i>15</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="penggajian_tiap_tanggal" value="3" data-parsley-errors-container="#error-radio" data-parsley-multiple="penggajian">
                                    <span><i></i>20</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="penggajian_tiap_tanggal" value="4" data-parsley-errors-container="#error-radio" data-parsley-multiple="penggajian">
                                    <span><i></i>25</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="penggajian_tiap_tanggal" value="5" data-parsley-errors-container="#error-radio" data-parsley-multiple="penggajian">
                                    <span><i></i>30</span>
                                </label>
                                <p id="error-radio"></p> -->
                            </div>
                            <div class="form-group">
                                <label>THR ditagihkan :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_keuangan" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_ditagihkan">
                                    <span><i></i>Setiap Bulan</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_keuangan" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="Hari Sebelum Hari Raya">
                                    <span><i></i>Hari Sebelum Hari Raya</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_manajemen" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_fee">
                                    <span><i></i>Dikenakan Fee Manajemen</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_manajemen" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_fee">
                                    <span><i></i>Tanpa Fee Manajemen</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
				            <!-- <div class="form-group">
				              <label>Kelengkapan data penagihan (ditulis secara lengkap) :</label>
				             	<div class=" col-md-12">
	                                <select class="form-control select2" multiple  name="data_penagihan">
	                                <?php /* foreach ($dataPenagihan->result() as $penagihan){ ?>
	                                    <option value="<?php echo $penagihan->id_master_penagihan ?>"><?php echo $penagihan->nama_penagihan ?></option>
	                                <?php } */ ?>
	                                </select>
	                            </div>
				            </div> -->
	                    </section>
	                    <h2>O P E R A S I O N A L  -   S   D   M</h2>
	                    <section>
	                        <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Contact Person :</label>
				                    <input type="text" class="form-control" required name="contact_person_sdm" id="contact_person_sdm" placeholder="Nama">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" required onkeypress="return hanyaAngka(event)" name="no_telepon_sdm" id="no_telp_sdm" placeholder="No Telp.">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Jumlah Personil (isi angka/jumlah) </label> 
                                <!-- <input type="button" class="btn btn-primary" id="btnisi" value="Isi Anggota" /> -->
				               		<div class="row">
				               			<div class="col-12 col-md-2">
				               				<label>Orang</label>
				               				<input type="text" id="personil_total" class="form-control" required placeholder=""  readonly="">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>laki-laki</label>
				               				<input type="number" class="form-control" required name="personil_laki" placeholder=""  min="0" max="1000" id="pl">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Perempuan</label>
				               				<input type="number" class="form-control" required name="personil_perempuan" placeholder="" min="0" max="1000" id="pr" >
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Korlap</label>
				               				<input type="number" class="form-control" required name="personil_korlap" placeholder="" min="0" max="1000" id="kr">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Anggota</label>
				               				<input type="text" class="form-control" required name="personil_anggota" placeholder=""  readonly id="agt">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				              <label>Jumlah Lokasi :</label>
				              <div class="row">
				              	<div class="col-md-1 col-2">
				              		 <input type="text" class="form-control" required="" id="jumlokasi" name="jumlah_lokasi" readonly>
				              	</div>
				              	<div class="col-md-2 col-2">
				              		 <label>Lokasi</label>
				              	</div>
				              </div>
				            </div>
				            <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Penggajian sebesar :</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rp.</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:type_gaji('nominal');">Nominal</a>
                                                <a class="dropdown-item" href="javascript:type_gaji('umk');">UMK</a>
                                                <a class="dropdown-item" href="javascript:type_gaji('umk_t');">UMK (data terlampir)</a>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="txtgaji" required="" name="jumlah_penggajian" placeholder="" onkeypress="return hanyaAngka(event)" value="0">
                                    </div>
				                    
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Tunjangan :</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rp.</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:type_tunjangan('nominal');">Nominal</a>
                                                <a class="dropdown-item" href="javascript:type_tunjangan('koe_x_umk');">Koefisien x UMK</a>
                                                <a class="dropdown-item" href="javascript:type_tunjangan('koe_x_umk_t');">Koefisien x UMK (terlampir)</a>
                                                <a class="dropdown-item" href="javascript:type_tunjangan('ada');">Ada</a>
                                                <a class="dropdown-item" href="javascript:type_tunjangan('tidak_ada');">Tidak Ada</a>
                                                <a class="dropdown-item" href="javascript:type_tunjangan('other');">Lainnya</a>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="txttunjangan" required="" name="tunjangan" placeholder="" value="0">
                                    </div>
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Potongan BPJS dari Perusahaan :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Tenaga Kerja</label>
				               				<input type="number" class="form-control" required name="fasilitas_bpjs_tenaga_kerja" placeholder="%" min="0" max="100">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Kesehatan</label>
				               				<input type="number" class="form-control" required name="fasilitas_bpjs_kesehatan" placeholder="%" min="0" max="100">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Pensiun</label>
				               				<input type="number" class="form-control" required name="fasilitas_bpjs_pensiun" placeholder="%" min="0" max="100">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Potongan BPJS Tenaga Kerja :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Tenaga Kerja</label>
				               				<input type="number" class="form-control" required name="potongan_bpjs_tenaga_kerja" placeholder="%" min="0" max="100">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Kesehatan</label>
				               				<input type="number" class="form-control" required name="potongan_bpjs_kesehatan" placeholder="%" min="0" max="100">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Pensiun</label>
				               				<input type="number" class="form-control" required name="potongan_bpjs_pensiun" placeholder="%" min="0" max="100">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Fasilitas THR :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rp.</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:type_thr('nominal');">Nominal</a>
                                                        <a class="dropdown-item" href="javascript:type_thr('umk');">UMK</a>
                                                        <a class="dropdown-item" href="javascript:type_thr('thp');">THP</a>
                                                        <a class="dropdown-item" href="javascript:type_thr('ada');">Ada</a>
                                                        <a class="dropdown-item" href="javascript:type_thr('tidak_ada');">Tidak Ada</a>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="txtthr" required="" name="thr" placeholder="" onkeypress="return hanyaAngka(event)" value="0">
                                            </div>
				               				
				               			</div>
				               			<div class="col-6 col-md-9">
				               				<div class="form-group">
				                                <label>Ditagihkan :</label>
				                                <label class="fancy-radio">
				                                    <input type="radio" name="thr_ditagihkan_sdm" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_ditagihkan">
				                                    <span><i></i>Bulanan</span>
				                                </label>
				                                <label class="fancy-radio">
				                                    <input type="radio" name="thr_ditagihkan_sdm" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_ditagihkan">
				                                    <span><i></i>Saat Hari Raya</span>
				                                </label>
				                                <p id="error-radio"></p>
				                            </div>
								        </div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Fasilitas Seragam :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-2">
				               				<input type="number" class="form-control" required name="fasilitas_seragam_pcs" placeholder="Stel">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<input type="number" class="form-control" required name="fasilitas_seragam_stel" placeholder="Pcs">
				               			</div>
				               			<div class="col-6 col-md-2">
				               				<label>* Spesifikasi :</label>
				               			</div>
				               			<div class="col-12 col-md-6">
				               				<input type="text" class="form-control" required name="fasilitas_seragam_spesifikasi" placeholder="SPESIFIKASI ">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				                <label>Fasilitas Lain-lain   :</label>
				                <br>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="1">
				                    <span> ID Card</span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" value="2">
				                    <span> DPLK</span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" data-parsley-multiple="checkbox" value="3">
				                    <span>Asuransi</span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" data-parsley-multiple="checkbox" value="4">
				                    <span>Cuti</span>
				                </label>
				                 <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" data-parsley-multiple="checkbox" value="5">
				                    <span> Pesangon</span>
				                </label>
				                <p id="error-checkbox"></p>
				            </div>
				            <div class="form-group">
                                <label>Overtime / lembur :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sdm" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt">
                                    <span><i></i>Tidak</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sdm" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt">
                                    <span><i></i>Ada</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sesuai" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt_hitung">
                                    <span><i></i>Hitung Sesuai Pemerintah</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sesuai" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt_hitung">
                                    <span><i></i>Perhitungan Klien</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
				            <!-- <div class="form-group">
				                <label>Overtime / lembur    :</label>
				                <br>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="lembur" value="2" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
				                    <span> Tidak</span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="lembur" value="1" data-parsley-multiple="checkbox">
				                    <span>Ada</span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="lembur_sesuai" value="1" data-parsley-multiple="checkbox">
				                    <span>Hitung Sesuai Pemerintah</span>
				                </label>
				                 <label class="fancy-checkbox">
				                    <input type="checkbox" name="lembur_sesuai" value="2" data-parsley-multiple="checkbox">
				                    <span> Perhitungan Klien</span>
				                </label>
				                <p id="error-checkbox"></p>
				            </div> -->
				            <div class="form-group">
                                <label>Kontrak Kerja Personil :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="kontrak_kerja_personel" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="kkp">
                                    <span><i></i>PKS</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="kontrak_kerja_personel" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="kkp">
                                    <span><i></i>PKWT</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="kontrak_kerja_personel" value="3" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="kkp">
                                    <span><i></i>PKWTT</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
	                    </section>
	                    <h2>P E N G A D A A N </h2>
	                    <section>
	                        <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Contact Person :</label>
				                    <input type="text" class="form-control" required name="contact_person_pengadaan" id="contact_person_pengadaan" placeholder="Nama">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" required onkeypress="return hanyaAngka(event)" name="no_telepon_pengadaan" id="no_telp_pengadaan" placeholder="No Telp.">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				              <label>Jumlah peralatan Security  :</label>
                              <input type="text" data-id="jps" class="form-control" onkeyup="ribuan(this,this.value)" required onkeypress="return hanyaAngka(event)" placeholder="Rp.">
                              <input type="hidden" id="jps" name="jumlah_peralatan_security"/>
				            </div>
				            <div class="form-group">
				              <label>Jumlah chemical + equipment (terlampir) :</label>
                              <input type="text" data-id="jce" class="form-control" onkeyup="ribuan(this,this.value)" required onkeypress="return hanyaAngka(event)" placeholder="Rp.">
                              <input type="hidden" id="jce" name="jumlah_chemical_equipment"/>
				            </div>
				            <div class="form-group">
				              <label>Permintaan Khusus  :</label>
				              <input type="text" class="form-control"  name="permintaan_khusus" placeholder="Permintaan Khusus">
				            </div>
	                    </section>
	                </div>
	            </form>
            </div>
        </div>
    </div>
</div>
<div id="rowanggota">
    <div class="container" id="kosong">
        <div class="row">
            <div class="col-12 text-center">
                <label>Jenis Project Belum Diisi</label>
            </div>
        </div>
    </div>
    <div class="container" id="isian">
        <div class="row">
            <div class="col-4"  align="right">
                <label>Isi Anggota</label>
            </div>
            <div class="col-4">
                <label>Laki-laki</label>
            </div>
            <div class="col-4">
                <label>Perempuan</label>
            </div>
        </div>
        <div id="isijenpro">
            <div class="row">
                <div class="col-4"  align="right">
                    <label class="jenis">Jenis Project</label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control txtlaki" name="laki[]" placeholder=""  min="0" max="1000" value="0" required >
                </div>
                <div class="col-4">
                    <input type="text" class="form-control txtperempuan" name="perempuan[]" placeholder=""  min="0" max="1000" value="0" required >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"  align="right">
                <label>Total</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tlaki" name="totallaki" placeholder=""  min="0" max="10000" value="0" readonly >
            </div>
            <div class="col-4">
                <input type="text" class="form-control tperempuan" name="totalperempuan" placeholder=""  min="0" max="10000" value="0" readonly >
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
    	$("#selclient").change(function(){
	        myFunction(this.value);
	        pilihDept(this.value);
	    });
    	$('#lokasi').change(function(){
    		//alert($(this).val());
    		var jumlok=''+$(this).val();
    		//alert(jumlok.split(',').length);
    		$('#jumlokasi').val(jumlok.split(',').length);
    	});

    	$('#pl,#pr,#kr').keyup(function(){
    		var jumpr=parseInt($('#pr').val()) || 0;
    		var jumkr=parseInt($('#kr').val()) || 0;
    		var jumpl=parseInt($('#pl').val()) || 0;
    		$('#agt').val((jumpl+jumpr)-jumkr);
    		$('#personil_total').val((jumpl+jumpr));
    	});


        $("#rowanggota").hide();
        $("#btnisi").click(function(){
            isiAnggota();
        });
        $(".dropdown").on("show.bs.dropdown", function() {
            $(this).find(".dropdown-menu").first().stop(!0, !0).animate({
                top: "100%"
            }, 200)
        });
        $(".dropdown").on("hide.bs.dropdown", function() {
            $(this).find(".dropdown-menu").first().stop(!0, !0).animate({
                top: "80%"
            }, 200)
        });
        $('#txttunjangan').bind('keypress', hanyaAngka);
         
    });
    
    function pilihClient(idlokasi){
        if(idlokasi!=""){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>HR/ambilClient", 
                data: {id_lokasi : idlokasi}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    $("#rowclient").show();
                    $("#selclient").html(response.data_client).show();
                    $("#selclient").select2();
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#rowclient").hide();
        }
    }

    function pilihDept(idclient){
        if(idclient!=""){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Outsource/ambilDept", 
                data: {id_client : idclient}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    $("#rowdept").show();
                    $("#seldept").html(response.data_dept).show();
                    $("#seldept").select2();
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#rowdept").hide();
        }
    }
    function sumArray ( A ) {
        var sum = 0;
        var len = A.length;
        for ( key in A ) {
            if (!isNaN(A[key])) {
                sum += parseInt(A[key], 10);
            }
        }
        return sum;
    }
    
    function hitungTotal(){
        var pria=new Array();
        var wanita=new Array();
        var sts=true;
        $('.txtlaki').each(function(a,b){
            var thisval=$(this).val();
            var intval = thisval.split(".").join("");
            if(intval==""){intval=0;}
            if (intval<=0) {
                sts=false;
            }
            pria.push(parseInt(intval,10));
        });
        $('.txtperempuan').each(function(a,b){
            var thisval=$(this).val();
            var intval = thisval.split(".").join("");
            if(intval==""){intval=0;}
            if (intval<=0) {
                sts=false;
            }
            wanita.push(parseInt(intval,10));
        });
        var totL = 0;
        totL=sumArray(pria);
        var totP = 0;
        totP=sumArray(wanita);
        //console.log(totL);
        //console.log(totP);
        $(".tlaki").val(totL);
        $(".tperempuan").val(totP);
        
        if(sts == true){
            $(".swal2-confirm").show();
        } else {
            $(".swal2-confirm").hide();
        }
    }
    function isiAnggota(){
        showJP();
        $('.txtlaki').keyup(function(a,b){
            this.value = formatRupiah(this.value);
            hitungTotal();
        });
        $('.txtperempuan').keyup(function(a,b){
            this.value = formatRupiah(this.value);
            hitungTotal();
        });
    }
    function showJP(){
        var isinya= new Array();
        $('.jenis_project:checked').each(function(i, obj) {
            var thisval = $(this).data("jp");
            isinya.push(thisval);
        });
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-blue1',
            cancelButton: 'btn btn-red1'
          },
          buttonsStyling: false,
        });
        $rowtunjangan=$('<div id="popjp">'+$("#rowanggota").html()+'</div>');
        swalWithBootstrapButtons.fire({
            title: 'Tambah Personil',
            html: $rowtunjangan,
            //type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tambah',
            cancelButtonText: 'Batal',
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                var totL=$("#popjp").find(".tlaki").val();
                var totP=$("#popjp").find(".tperempuan").val();
                $('input[name=personil_laki]').val(totL);
                $('input[name=personil_perempuan]').val(totP);
                $('#personil_total').val(parseInt(totL)+parseInt(totP));
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            }
        });
        //var rupiah = document.getElementByClassName('txtlaki');
        
		/*rupiah.addEventListener('keyup', function(e){
			this.value = formatRupiah(this.value);
		}); */
        //var rupiah = document.getElementByClassName('txtperempuan');
		/* rupiah.addEventListener('keyup', function(e){
			this.value = formatRupiah(this.value);
		}); */
        $(".swal2-confirm").hide();
        if(isinya.length>0){
            $("#popjp").find("#kosong").hide();
            $("#popjp").find("#isian").show();
            var isijenis=new Array();
            $('.jenis_project:checked').each(function(i, obj) {
                var thisval = $(this).data("jp");
                //console.log("jenis"+thisval);
                $isi = $("#popjp").find("#isijenpro").clone();
                $isi.find(".jenis").html(thisval);
                var $klon = $isi.clone();
                //console.log($klon.html());
                //console.log($klon);
                isijenis.push($klon.html());
            });
            $("#popjp").find("#isijenpro").html(isijenis.join(" "));
        } else {
            $("#popjp").find("#kosong").show();
            $("#popjp").find("#isian").hide();
        }
    }
	function myFunction(id) {
	  // var x = document.getElementById("mySelect").value;
	  // document.getElementById("alamat").innerHTML = x;
	  $.ajax({
	  	url: "<?php echo base_url();?>Outsource/getPerusahaan",
        type: "post",
        data: {id:id} ,
        dataType:'json',
        success: function (response) {
        	// alert(response.dataPerusahaan.alamat);
            $("#lokasi").html(response.dataLokasi).show();
        	$('#alamat').val(response.dataPerusahaan.alamat);
        	$('#kota').val(response.dataPerusahaan.kota);
        	$('#no_telp_marketing').val(response.dataPerusahaan.no_telp);
        	$('#no_telp_keuangan').val(response.dataPerusahaan.no_telp);
        	$('#no_telp_sdm').val(response.dataPerusahaan.no_telp);
        	$('#no_telp_pengadaan').val(response.dataPerusahaan.no_telp);
        	$('#no_faximile').val(response.dataPerusahaan.no_faximile);
        	$('#contact_person_marketing').val(response.dataPerusahaan.contact_person);
        	$('#contact_person_keuangan').val(response.dataPerusahaan.contact_person);
        	$('#contact_person_sdm').val(response.dataPerusahaan.contact_person);
        	$('#contact_person_pengadaan').val(response.dataPerusahaan.contact_person);
        	$('#penagihan').val(response.dataPerusahaan.nama_perusahaan);
        }
	  })
	}
    function type_gaji(type){
        if(type=="nominal"){
            $("#txtgaji").val("0");
            $("#txtgaji").attr("readonly",false);
        } else if(type=="umk"){
            $("#txtgaji").val("UMK");
            $("#txtgaji").attr("readonly",true);
        } else if(type=="umk_t"){
            $("#txtgaji").val("UMK (data terlampir)");
            $("#txtgaji").attr("readonly",true);
        }
    }
    function type_thr(type){
        if(type=="nominal"){
            $("#txtthr").val("0");
            $("#txtthr").attr("readonly",false);
        } else if(type=="umk"){
            $("#txtthr").val("UMK");
            $("#txtthr").attr("readonly",true);
        } else if(type=="thp"){
            $("#txtthr").val("THP");
            $("#txtthr").attr("readonly",true);
        } else if(type=="ada"){
            $("#txtthr").val("Ada");
            $("#txtthr").attr("readonly",true);
        } else if(type=="tidak_ada"){
            $("#txtthr").val("Tidak Ada");
            $("#txtthr").attr("readonly",true);
        }
    }
    function type_tunjangan(type){
        if(type=="nominal"){
            $("#txttunjangan").attr("readonly",true);
            $('#txttunjangan').unbind("keypress");
            window.setTimeout(function(){
                $("#txttunjangan").val("0");
                $("#txttunjangan").attr("readonly",false);
                $('#txttunjangan').bind('keypress', hanyaAngka); // rebind action.
            }, 1000);
        } else if(type=="koe_x_umk"){
            $("#txttunjangan").val("Koefisien x UMK");
            $("#txttunjangan").attr("readonly",true);
        } else if(type=="koe_x_umk_t"){
            $("#txttunjangan").val("Koefisien x UMK (terlampir)");
            $("#txttunjangan").attr("readonly",true);
        } else if(type=="ada"){
            $("#txttunjangan").val("Ada");
            $("#txttunjangan").attr("readonly",true);
        } else if(type=="tidak_ada"){
            $("#txttunjangan").val("Tidak Ada");
            $("#txttunjangan").attr("readonly",true);
        } else if(type=="other"){
            $("#txttunjangan").attr("readonly",true);
            $('#txttunjangan').unbind("keypress");
            window.setTimeout(function(){
                $("#txttunjangan").val("-");
                $("#txttunjangan").attr("readonly",false);
                $('#txttunjangan').bind('keypress', Alamat); // rebind action.
            }, 1000);
            //$("#txttunjangan").attr("onkeypress",hanyaHuruf);
        }
    }
</script>