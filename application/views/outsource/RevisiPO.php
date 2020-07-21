<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Project Order /  <?php  $sts=$this->uri->segment(3) ;
             if($sts=='1'){
             	echo "Detail Baru";
             }else if($sts=='2'){
             	echo "Detail Perpanjangan";
             }else if($sts=='3' || $sts=='4'){
             	echo "Detail Revisi";
             }?></h6>
        </div>
    </div>
</div>
<?php 
	$tglTerbit=explode(' ',$dataProjectOrder->tanggal_terbit);
	//$tglKontrak=explode(' ',$dataProjectOrder->tgl_kontrak);
	//$tglProjectOrder=explode(' ',$dataProjectOrder->tanggal_projek_order);
	$b=explode("-", $dataProjectOrder->tgl_kontrak); 
    $tglKontrak=$b[2].'/'.$b[1].'/'.$b[0]; 
    $c=explode("-", $dataProjectOrder->tanggal_projek_order); 
    $tglProjectOrder=$c[2].'/'.$c[1].'/'.$c[0]; 
    $d=explode("-", $dataProjectOrder->durasi_kontrak_awal); 
    $tglAwal=$d[2].'/'.$d[1].'/'.$d[0]; 
    $e=explode("-", $dataProjectOrder->durasi_kontrak_akhir); 
    $tglAkhir=$e[2].'/'.$e[1].'/'.$e[0]; 
    $tanggal_adendum_or_perpanjang="";
    if($dataProjectOrder->tanggal_adendum_or_perpanjang!=null){
	    $f=explode("-", $dataProjectOrder->tanggal_adendum_or_perpanjang); 
	    $tanggal_adendum_or_perpanjang=$f[2].'/'.$f[1].'/'.$f[0]; 
	}

	// $tglAwal=explode(' ',$dataProjectOrder->durasi_kontrak_akhir);
	// $tglAkhir=explode(' ',$dataProjectOrder->durasi_kontrak_awal);
	$jenisProjek=explode(',',$dataProjectOrder->jenis_projek);
	$caraPenagihan=explode(',',$dataProjectOrder->cara_penagihan);
	$adalembur=explode(',',$dataProjectOrder->lembur_keuangan);
	$lemburManajemen=explode(',',$dataProjectOrder->lembur_manajemen);
	$pemberianlemburtiaptanggal=explode(',',$dataProjectOrder->pemberian_lembur_tiap_tanggal);
	$penggajiantiaptanggal=explode(',',$dataProjectOrder->penggajian_tiap_tanggal);
	$thrditagihkankeuangan=explode(',',$dataProjectOrder->thr_ditagihkan);
	$thrditagihkanmanajemen=explode(',',$dataProjectOrder->thr_ditagihkan_manajemen);
	$thrditagihkansdm=explode(',',$dataProjectOrder->thr_ditagihkan_sdm);
	$fasilitaslain=explode(',',$dataProjectOrder->fasilitas_lain);
	$lembursdm=explode(',',$dataProjectOrder->lembur_sdm);
	$lembursesuai=explode(',',$dataProjectOrder->lembur_sesuai);
	$kontrakkerjapersonel=explode(',',$dataProjectOrder->kontrak_kerja_personel);
	$datapenagihan=explode(',',$dataProjectOrder->data_penagihan);
	// print_r($datapenagihan);
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <h2 class="tittle-box text-center m-t-30">PROJECT ORDER</h2>
            <?php 
            	$tmp = $dataProjectOrder->no_projek_order;
            	$arr = array();
            	$hitung = substr_count($tmp, "-R");
            	$num = 0;
            	$no_po = $dataProjectOrder->no_projek_order;
            	if ($hitung > 0) {
            		$arr = explode("-R", $tmp);
            		$no_po = $arr[0];
            		$num = $arr[1];
            	}
            	
             ?>
            <div class="body">
            	<form method="post" id="simpan" action="<?php echo base_url() ?>Outsource/prosesTambahBaru">
            		<input type="hidden" name="status" value="<?php echo $sts!='4'?'3':'4'; ?>">
            		<input type="hidden" name="id_projek_order_revisi" value="<?php echo $dataProjectOrder->id_projek_order_revisi=='0'?$this->uri->segment(4):$dataProjectOrder->id_projek_order_revisi; ?>">
                    
                    <div class="row">
		                <div class="col-md-6">
			                <div class="form-group">
			                    <label>Nama Pemeriksa :</label>
			                    <select name="nama_pemeriksa" class="form-control select2" id="mySelect" >
				              		<option disabled selected="">Nama Pemeriksa</option>
				              		<?php foreach ($dataAllKaryawan->result() as $dt) { ?>	
				              			<option  value="<?php echo $dt->nik ?>" <?php echo $dt->nik==$dataProjectOrder->nama_pemeriksa?'selected':'';  ?>><?php echo $dt->nama_lengkap ?></option>
				          			<?php } ?>
				          		</select>
			                </div>
		                </div>
		                 <div class="col-md-6">
			                <div class="form-group">
			                    <label>Tanggal Adendum/Revisi :</label>
			                    <input type="text" class="form-control datepicker2" data-id="datepicker2" required placeholder="Tanggal Adendum/Revisi" readonly value="<?php echo $tanggal_adendum_or_perpanjang ?>">
			                    <input type="hidden" name="tanggal_perubahan" id="datepicker2" value="<?php echo $dataProjectOrder->tanggal_adendum_or_perpanjang ?>">
			                </div>  
		              	</div>
		            </div>

            		<div class="row">
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>No. Surat Kontrak :</label>
			                    <input type="text" class="form-control" name="no_surat_kontrak" required placeholder="No. Surat Kontrak" value="<?php echo $dataProjectOrder->no_surat_kontrak ?>">
			                </div>
		                </div>
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Kontrak :</label>
			                    <input type="text" class="form-control datepicker2" data-id="datepicker2" required placeholder="Tanggal Kontrak" value="<?php echo $tglKontrak ?>" readonly>
			                    <input type="hidden" name="tgl_kontrak" value="<?php echo $dataProjectOrder->tgl_kontrak ?>" id="datepicker2">

			                </div>  
		              	</div>
		                <div class="col-md-3">

			                <div class="form-group">
			                    <label>Nomor Project Order :</label>
			                    <input type="text" class="form-control" name="no_projek_order" readonly="" required placeholder="Nomor Project Order" value="<?php echo $no_po ?>">
			                </div>  
		              	</div>
		              	<div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Project Order :</label>
			                    <input type="text" class="form-control datepicker2" required placeholder="Tanggal Project Order" value="<?php echo $tglProjectOrder ?>" readonly data-id="datepicker2">
			                    <input type="hidden" name="tanggal_projek_order" value="<?php echo $dataProjectOrder->tanggal_projek_order ?>" id="datepicker2">
			                </div>  
		              	</div>
		            </div>
                    <!--
		            <div class="row">
		              	<div class="col-md-12">
			                <div class="form-group">
			                  <label>Nomor :</label>
			                  <input type="text" class="form-control" name="nomor"  placeholder="Nomor" value="<?php //echo $dataProjectOrder->nomor	 ?>">
			                </div>
		              	</div>
		            </div>
		            <div class="row">
		              	<div class="col-md-12">
			                <div class="form-group">
			                  <label>Paket :</label>
			                  <input type="text" class="form-control" name="paket" placeholder="Paket" value="<?php //echo $dataProjectOrder->paket	 ?>">
			                </div>
		              	</div>
		            </div>
                    -->
	                <div id="wizard_horizontal">
	                    <h2>M A R K E T I N G</h2>
	                    <section>
				            <div class="form-group">
				              <label>Nama Pekerjaan :</label>
				              <textarea class="form-control" name="nama_pekerjaan" placeholder="Nama Pekerjaan"><?php echo $dataProjectOrder->nama_pekerjaan ?></textarea>
				            </div>

				            <div class="form-group">
				              <label>Nama Perusahaan :</label>
				          		<input type="hidden" name="id_master_perusahaan" value="<?php echo $dataProjectOrder->id_master_perusahaan ?>">
				          		<input type="text" class="form-control" readonly="" value="<?php echo $dataProjectOrder->nama_perusahaan ?>">
				            </div>
                            <div class="form-group">
				              <label>Nama Lokasi :</label>
					            <ol>
					              <?php foreach ($dataLokasiC->result() as $dt) { ?>
					              	<li><?php echo $dt->desKabupaten; ?></li>
					              <?php } ?>
					          	</ol>
					          	<input type="hidden" name="id_lokasi" value="<?php echo $dataProjectOrder->id_lokasi ?>">
				          		<!-- <input type="hidden" name="id_lokasi[]" value="<?php //echo $dataProjectOrder->id_master_perusahaan ?>">
				          		<input type="text" class="form-control" readonly="" value="<?php //echo $dataProjectOrder->nama_perusahaan ?>"> -->
				            </div>
				            <div class="form-group">
				                <label>Alamat Perusahaan :</label>
				                <textarea class="form-control" rows="5" cols="30" id="alamat" readonly><?php echo $dataPerusahaanSelected->alamat; ?></textarea>
				            </div>
				            <div class="form-group">
				              <label>Kota :</label>
				              <input type="text" class="form-control" readonly="" id="kota" name="kota" value="<?php echo $dataPerusahaanSelected->kota; ?>">
				            </div>

				            <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No. Telp :</label>
				                    <input type="text" class="form-control" readonly="" id="no_telp_marketing" name="no_telepon_marketing" value="<?php echo $dataPerusahaanSelected->no_telp; ?>">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No. Faximile :</label>
				                    <input type="text" class="form-control" readonly="" id="no_faximile" name="no_faximile" value="<?php echo $dataPerusahaanSelected->no_faximile; ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				                <label>Jenis Project : </label>
				                <br>
                                <div class=" col-md-12">
	                                <select class="form-control show-tick ms select2" id="" multiple  name="jenis_project[]">
	                                <?php 
	                                	foreach ($dataJenisProjek->result() as $projek){ ?>
	                                    <option value="<?php echo $projek->id_departemen ?>" <?php echo in_array($projek->id_departemen, $jenisProjek)?'selected':''; ?>><?php echo $projek->nama_departemen ?></option>
	                                <?php } ?>
	                                </select>
	                            </div>
				            </div>
				            <!-- <div class="form-group">
				                <label>Jenis Project :</label>
				                <br>
                                <?php //foreach ($dataJenisProjek->result() as $projek){ ?>
				                	<label class="fancy-checkbox">
				                    <input type="checkbox" name="jenis_project[]" value="<?php //echo $projek->id_master_jenis_project ?>" required="" <?php //echo in_array($projek->id_master_jenis_project, $jenisProjek)?'checked':""; ?>>
				                    <span> <?php //echo $projek->jenis_project ?></span>
				                </label>
				                <?php //} ?>
				                <p id="error-checkbox"></p>
				            </div> -->
				            <div class="form-group">
				              <label>Contact person :</label>
				              <input type="text" class="form-control" name="contact_person_marketing" required value="<?php echo $dataProjectOrder->contact_person ?>">
				            </div>
				            <div class=" col-6 col-md-12">
	                            <label>Durasi Kontrak</label>                                    
	                            <div class="input-daterange input-group" data-provide="datepicker">
	                                 <input type="text" class="input-sm form-control" data-id="startdate" id="start" name="" value="<?php echo $tglAwal ?>" readonly>
	                                <span class="input-group-addon text-center" style="width: 100px;padding-top: 8px">s/d</span>
	                                <input type="text" class="input-sm form-control" name="" data-id="enddate" id="end" value="<?php echo $tglAkhir ?>" readonly>
	                                <input type="hidden" name="durasi_kontrak_awal" id="startdate" value="<?php echo $dataProjectOrder->durasi_kontrak_awal  ?>">
	                                <input type="hidden" name="durasi_kontrak_akhir" id="enddate" value="<?php echo $dataProjectOrder->durasi_kontrak_akhir  ?>">
	                            </div>
	                        </div>
	                        <br>
	                        <div class="row">
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Nilai Kontrak Per Bulan :</label>
					                    <input type="text" class="form-control" name="nilai_kontrak_bulan" required placeholder="Rp." value="<?php echo $dataProjectOrder->nilai_kontrak_bulan ?>">
					                </div>
				                </div>
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Ppn :</label>
					                    <input type="text" class="form-control" name="ppn" required placeholder="Rp." value="<?php echo $dataProjectOrder->ppn ?>">
					                </div>  
				              	</div>
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Pph23 :</label>
					                    <input type="text" class="form-control" name="pph" required placeholder="Rp."  value="<?php echo $dataProjectOrder->pph ?>">
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
                                    <input type="radio" name="cara_penagihan" value="3" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender" <?php echo  $dataProjectOrder->cara_penagihan=='3'?'checked':""; ?>>
                                    <span><i></i>Sesuai Nilai Kontrak</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="cara_penagihan" value="1" data-parsley-multiple="gender" <?php echo  $dataProjectOrder->cara_penagihan=='1'?'checked':""; ?>>
                                    <span><i></i>Fluktuatif (ada lembur)</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="cara_penagihan" value="2" data-parsley-multiple="gender" <?php echo  $dataProjectOrder->cara_penagihan=='2'?'checked':""; ?>>
                                    <span><i></i>Langsung Tagih</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
				            <div class="form-group">
				              <label>Penagihan ditujukan kepada :</label>
				              <input type="text" class="form-control" readonly="" required name="penagihan_kepada" value="<?php echo $dataProjectOrder->nama_perusahaan ?>">
				            </div>
				            <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Contact Person :</label>
				                    <input type="text" class="form-control" required name="contact_person_keuangan" value="<?php echo $dataProjectOrder->cp_keuangan ?>">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" required name="no_telepon_keuangan" value="<?php echo $dataProjectOrder->nt_keuangan ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Tanggal Penagihan :</label>
				               		<div class="row">
				               			<div class="col-3 col-md-2">
				               				<!-- <input type="number" class="form-control" required name="tanggal_penagihan" value="<?php// echo $dataProjectOrder->tanggal_penagihan ?>"> -->
				               				<select name="tanggal_penagihan" class="form-control select2 " required>
							              			<option disabled selected="" value="0">Tanggal</option>
			                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
				                                	<option value="<?php echo $i?>" <?php echo  $i==$dataProjectOrder->tanggal_penagihan?'selected':''; ?>><?php echo $i?></option>
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
				               				<!-- <input type="number" class="form-control" required name="jatuh_tempo" placeholder="Hari" value="<?php //echo $dataProjectOrder->jatuh_tempo ?>"> -->
				               				<select name="jatuh_tempo" class="form-control select2 " required>
							              			<option disabled selected="" value="0">Hari</option>
			                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
				                                	<option value="<?php echo $i?>" <?php echo  $i==$dataProjectOrder->jatuh_tempo?'selected':''; ?>><?php echo $i?></option>
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
                                    <input type="radio" name="lembur_keuangan" value="1" required <?php echo  $dataProjectOrder->lembur_keuangan=='1'?'checked':""; ?>>
                                    <span><i></i>Ada</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="lembur_keuangan" value="2" required <?php echo $dataProjectOrder->lembur_keuangan=='2'?'checked':""; ?>>
                                    <span><i></i>Tidak <?php echo $dataProjectOrder->lembur_keuangan ?> </span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_manajemen" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="fee" <?php echo in_array(1, $lemburManajemen)?'checked':""; ?>>
                                    <span><i></i>Dikenakan Fee Manajemen</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="lembur_manajemen" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="fee" <?php echo in_array(2, $lemburManajemen)?'checked':""; ?>>
                                    <span><i></i>Tanpa Fee Manajemen</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label>Pemberian lembur setiap tanggal :</label>
                                <br>
                                <select name="pemberian_lembur_tiap_tanggal" class="form-control select2 col-md-2" required>
				              			<option disabled selected="" value="0">Tanggal</option>
                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
	                                	<option value="<?php echo $i?>" <?php echo  $i==$dataProjectOrder->pemberian_lembur_tiap_tanggal?'selected':''; ?>><?php echo $i?></option>
				          			<?php } ?>
				          		</select>
                                
                            </div>
				            <div class="form-group">
                                <label>Penggajian setiap tanggal :</label>
                                <br>
                                <select name="penggajian_tiap_tanggal" class="form-control select2 col-md-2" required>
				              			<option disabled selected="" value="0">Tanggal</option>
                                	<?php for ($i=1; $i<=31  ; $i++) { ?>
	                                	<option value="<?php echo $i?>" <?php echo  $i==$dataProjectOrder->penggajian_tiap_tanggal?'selected':''; ?>><?php echo $i?></option>
				          			<?php } ?>
				          		</select>
                                
                            </div>
                            <div class="form-group">
                                <label>THR ditagihkan :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_keuangan" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_ditagihkan" <?php echo $dataProjectOrder->thr_ditagihkan=='1'?'checked':""; ?>>
                                    <span><i></i>Setiap Bulan</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_keuangan" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="Hari Sebelum Hari Raya" <?php echo $dataProjectOrder->thr_ditagihkan=='2'?'checked':""; ?>>
                                    <span><i></i>Hari Sebelum Hari Raya</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_manajemen" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_fee" <?php echo in_array(1, $thrditagihkanmanajemen)?'checked':""; ?>>
                                    <span><i></i>Dikenakan Fee Manajemen</span>
                                </label>
                                  <label class="fancy-radio">
                                    <input type="radio" name="thr_ditagihkan_manajemen" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_fee" <?php echo in_array(2, $thrditagihkanmanajemen)?'checked':""; ?>>
                                    <span><i></i>Tanpa Fee Manajemen</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
				            <!-- <div class="form-group">
				              <label>Kelengkapan data penagihan (ditulis secara lengkap) :</label>
				             	<div class=" col-md-12">
	                                <select class="form-control select2" multiple  name="data_penagihan">
	                                <?php //foreach ($dataPenagihan->result() as $penagihan){ ?>
	                                    <option <?php// echo  in_array($penagihan->id_master_penagihan, $datapenagihan)?'selected':''; ?> value="<?php //echo $penagihan->id_master_penagihan ?>"><?php //echo $penagihan->nama_penagihan ?></option>
	                                <?php //} ?>
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
				                    <input type="text" class="form-control" required name="contact_person_sdm" placeholder="Nama" value="<?php echo $dataProjectOrder->cp_sdm ?>">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" required name="no_telepon_sdm" placeholder="No Telp." value="<?php echo $dataProjectOrder->nt_sdm ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Jumlah Personil (isi angka/jumlah) : 
				            		<!--
                                    <button type="button" onclick="viewProjekOrder('<?php echo $dataProjectOrder->id_projek_order ?>')" class="btn btn-blue col-6 col-md-4" data-toogle="modal" data-target="#view">Detail Pegawai
				            		</button>
                                    -->
				            		<!-- <a href="javascript:void(0);" onclick="viewProjekOrder('<?php echo $dataProjectOrder->id_projek_order ?>')" class="btn btn-blue col-6 col-md-4"><i class="fa fa-user"> <label>Detail Pegawai</label></i></a> -->
				            	</label>
				               		<div class="row">
				               			<div class="col-12 col-md-2">
				               				<label>Orang</label>
				               				<input type="text" class="form-control" required name="" placeholder="" value="<?php echo ($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan) ?>" readonly id="personil_total">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>laki-laki</label>
				               				<input type="number" class="form-control" required name="personil_laki" placeholder="" value="<?php echo $dataProjectOrder->personil_laki ?>" id="pl">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Perempuan</label>
				               				<input type="number" class="form-control" required name="personil_perempuan" placeholder="" value="<?php echo $dataProjectOrder->personil_perempuan ?>" id="pr">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Korlap</label>
				               				<input type="number" class="form-control" required name="personil_korlap" placeholder="" value="<?php echo $dataProjectOrder->personil_korlap ?>" id="kr">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Anggota</label>
				               				<input type="text" class="form-control" required name="personil_anggota" placeholder="" value="<?php echo ($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan)-$dataProjectOrder->personil_korlap ?>" readonly id="agt">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				              <label>Jumlah Lokasi :</label>
				              <div class="row">
				              	<div class="col-md-2 col-2">
				              		 <input type="text" class="form-control" name="jumlah_lokasi" required value="<?php echo $dataProjectOrder->jumlah_lokasi ?>" readonly>
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
                                        <input type="text" class="form-control" id="txtgaji" required="" name="jumlah_penggajian" placeholder="" onkeypress="return hanyaAngka(event)" value="<?php echo $dataProjectOrder->jumlah_penggajian ?>">
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
                                        <input type="text" class="form-control" id="txttunjangan" required="" name="tunjangan" placeholder="" value="<?php echo $dataProjectOrder->tunjangan ?>">
                                    </div>
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Fasilitas BPJS dari Perusahaan :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Tenaga Kerja</label>
				               				<input type="number" class="form-control" required name="fasilitas_bpjs_tenaga_kerja" placeholder="%" value="<?php echo $dataProjectOrder->fasilitas_bpjs_tenaga_kerja;?>">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Kesehatan</label>
				               				<input type="number" class="form-control" required name="fasilitas_bpjs_kesehatan" placeholder="%" value="<?php echo $dataProjectOrder->fasilitas_bpjs_kesehatan ?>"> 
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Pensiun</label>
				               				<input type="number" class="form-control" required name="fasilitas_bpjs_pensiun" placeholder="%" value="<?php echo $dataProjectOrder->fasilitas_bpjs_pensiun ?>">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Potongan BPJS Tenaga Kerja :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Tenaga Kerja</label>
				               				<input type="number" class="form-control" required name="potongan_bpjs_tenaga_kerja" placeholder="%" value="<?php echo $dataProjectOrder->potongan_bpjs_tenaga_kerja ?>">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Kesehatan</label>
				               				<input type="number" class="form-control" required name="potongan_bpjs_kesehatan" placeholder="%" value="<?php echo $dataProjectOrder->potongan_bpjs_kesehatan ?>">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Pensiun</label>
				               				<input type="number" class="form-control" required name="potongan_bpjs_pensiun" placeholder="%" value="<?php echo $dataProjectOrder->potongan_bpjs_pensiun ?>">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Fasilitas THR :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<input type="text" class="form-control" required name="thr" placeholder="Rp." value="<?php echo $dataProjectOrder->thr ?>">
				               			</div>
				               			<div class="col-6 col-md-9">
				               				<div class="form-group">
				                                <label>Ditagihkan :</label>
				                                <label class="fancy-radio">
				                                    <input type="radio" name="thr_ditagihkan_sdm" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_ditagihkanx" <?php echo in_array(1, $thrditagihkansdm)?'checked':""; ?>>
				                                    <span><i></i>Bulanan</span>
				                                </label>
				                                <label class="fancy-radio">
				                                    <input type="radio" name="thr_ditagihkan_sdm" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="thr_ditagihkanx" <?php echo in_array(2, $thrditagihkansdm)?'checked':""; ?>>
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
				               				<input type="number" class="form-control" required name="fasilitas_seragam_pcs" placeholder="Stel" value="<?php echo $dataProjectOrder->fasilitas_seragam_pcs ?>">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<input type="number" class="form-control" required name="fasilitas_seragam_stel" placeholder="Pcs" value="<?php echo $dataProjectOrder->fasilitas_seragam_stel ?>">
				               			</div>
				               			<div class="col-6 col-md-2">
				               				<label>* Spesifikasi :</label>
				               			</div>
				               			<div class="col-12 col-md-6">
				               				<input type="text" class="form-control" required name="fasilitas_seragam_spesifikasi" placeholder="SPESIFIKASI " value="<?php echo $dataProjectOrder->fasilitas_seragam_spesifikasi ?>">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				                <label>Fasilitas Lain-lain   :</label>
				                <br>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" value="1" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" <?php echo in_array('1', $fasilitaslain)?'checked':""; ?>>
				                    <span> ID Card </span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" value="2" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" <?php echo in_array('2', $fasilitaslain)?'checked':""; ?>>
				                    <span> DPLK</span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" value="3" data-parsley-multiple="checkbox" <?php echo in_array('3', $fasilitaslain)?'checked':""; ?>>
				                    <span>Asuransi</span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" value="4" data-parsley-multiple="checkbox" <?php echo in_array('4', $fasilitaslain)?'checked':""; ?>>
				                    <span>Cuti</span>
				                </label>
				                 <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" value="5" data-parsley-multiple="checkbox" <?php echo in_array('5', $fasilitaslain)?'checked':""; ?>>
				                    <span> Pesangon</span>
				                </label>
				                <p id="error-checkbox"></p>
				            </div>
				            <div class="form-group">
                                <label>Overtime / lembur :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sdm" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt" <?php echo $dataProjectOrder->lembur_sdm=='2'?'checked':""; ?>>
                                    <span><i></i>Tidak</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sdm" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt" <?php echo $dataProjectOrder->lembur_sdm=='1'?'checked':""; ?>>
                                    <span><i></i>Ada</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sesuai" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt_hitung" <?php echo $dataProjectOrder->lembur_sesuai=='1'?'checked':""; ?>>
                                    <span><i></i>Hitung Sesuai Pemerintah</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="lembur_sesuai" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="ovt_hitung" <?php echo $dataProjectOrder->lembur_sesuai=='2'?'checked':""; ?>>
                                    <span><i></i>Perhitungan Klien</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
				            <div class="form-group">
                                <label>Kontrak Kerja Personil :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="kontrak_kerja_personel" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="kkp" <?php echo $dataProjectOrder->kontrak_kerja_personel=='1'?'checked':""; ?>>
                                    <span><i></i>PKS</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="kontrak_kerja_personel" value="2" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="kkp" <?php echo $dataProjectOrder->kontrak_kerja_personel=='2'?'checked':""; ?>>
                                    <span><i></i>PKWT</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="kontrak_kerja_personel" value="3" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="kkp" <?php echo $dataProjectOrder->kontrak_kerja_personel=='3'?'checked':""; ?>>
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
				                    <input type="text" class="form-control" required name="contact_person_pengadaan" placeholder="Nama" value="<?php echo $dataProjectOrder->cp_pengadaan ?>">
				                </div>
				              </div>
				              <div class="col-md-6"> 
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" required name="no_telepon_pengadaan" placeholder="No Telp." value="<?php echo $dataProjectOrder->nt_pengadaan ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				              <label>Jumlah peralatan Security  :</label>
				              <input type="text" class="form-control" required name="jumlah_peralatan_security" placeholder="Rp." value="<?php echo $dataProjectOrder->jumlah_peralatan_security ?>">
				            </div>
				            <div class="form-group">
				              <label>Jumlah chemical + equipment (terlampir) :</label>
				              <input type="text" class="form-control" required name="jumlah_chemical_equipment" placeholder="Rp." value="<?php echo $dataProjectOrder->jumlah_chemical_equipment ?>">
				            </div>
				            <div class="form-group">
				              <label>Permintaan Khusus  :</label>
				              <input type="text" class="form-control"  name="permintaan_khusus" placeholder="Permintaan Khusus" value="<?php echo $dataProjectOrder->permintaan_khusus ?>">
				            </div>
	                    </section>
	                </div>
	            </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="view" role="dialog">
    <div class="modal-dialog" style="max-width: 70%;" role="document" id="isian">
    	<div class="modal-content">
    		<div class="modal-body">
    			
    		</div>
    	</div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pl,#pr,#kr').keyup(function(){
    		var jumpr=parseInt($('#pr').val()) || 0;
    		var jumkr=parseInt($('#kr').val()) || 0;
    		var jumpl=parseInt($('#pl').val()) || 0;
    		$('#agt').val((jumpl+jumpr)-jumkr);
    		$('#personil_total').val((jumpl+jumpr));
    	});
	});
</script>
<script>
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


<script type="text/javascript">
    function viewProjekOrder(id_projek_order){
          $.ajax({
            url: "<?php echo base_url();?>Outsource/viewProjekOrder",
            type: "post",
            data: {id_projek_order:id_projek_order},
            success: function (response) {
               // alert("masuk");
               $('.modal-body').html(response);
               $('.js-basic-example2').DataTable({
			        responsive: true,
			        retrieve: true,
			        columnDefs: [],
			        "iDisplayLength": 100,
			        "aaSorting": [],

			        fnDrawCallback:function(oSettings){
			            $(".dataTables_filter").each(function(){
			                
			            });
                            
			        }
			    });
                $(".dataTables_filter").append('<label class="fancy-checkbox">'+
                            '&nbsp;<input type="checkbox" style="display: none;" id="selectall" name="selectall">'+
                            '<span id="cselect">Select All</span>'+
                        '</label>');
               $('#selectall').click(function(){
                	$('.cbkaryawan').prop('checked',$(this).prop('checked'));
                    var countkar=$('.cbkaryawan').filter(':checked').length;
                    if(countkar>0){
                        $("#cselect").html(countkar+" selected");
                    } else {
                        $("#cselect").html("Select All");
                    }
                });
                $('.cbkaryawan').change(function(){
                    var numItems = $('.cbkaryawan').length
                    var countkar=$('.cbkaryawan').filter(':checked').length;
                    if(countkar>0){
                        if(numItems==countkar){
                            $("#selectall").prop("checked", true);
                        } else {
                            $("#selectall").prop("checked", false);
                        }
                        $("#cselect").html(countkar+" selected");
                    } else {
                        $("#selectall").prop("checked", false);
                        $("#cselect").html("Select All");
                    }
                });
               $('#view').modal('show'); 
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }


        });

       
    }
</script>