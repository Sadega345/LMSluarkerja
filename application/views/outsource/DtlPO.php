<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Project Order /  <?php  $sts=$this->uri->segment(3) ;
             if($sts=='1'){
             	echo "Detail Baru";
             }else if($sts=='2'){
             	echo "Detail Perpanjangan";
             }else{
             	echo "Detail Revisi";
             }?></h6>
        </div>
    </div>
</div>
<?php 
	$b=explode("-", $dataProjectOrder->tgl_kontrak); 
    $tglKontrak=$b[2].'/'.$b[1].'/'.$b[0]; 
    $c=explode("-", $dataProjectOrder->durasi_kontrak_akhir); 
    $tglAkhir=$c[2].'/'.$c[1].'/'.$c[0];
    $d=explode("-", $dataProjectOrder->durasi_kontrak_awal); 
    $tglAwal=$d[2].'/'.$d[1].'/'.$d[0]; 
    if($dataProjectOrder->tanggal_adendum_or_perpanjang!=Null){
	    $e=explode("-", $dataProjectOrder->tanggal_adendum_or_perpanjang); 
	    $tanggalperubahan=$e[2].'/'.$e[1].'/'.$e[0];
	}else{
		
	}
    $f=explode("-", $dataProjectOrder->tanggal_projek_order); 
    $tglProjectOrder=$f[2].'/'.$f[1].'/'.$f[0];

	$tglTerbit=explode(' ',$dataProjectOrder->tanggal_terbit);
	//$tglKontrak=explode(' ',$dataProjectOrder->tgl_kontrak);
	//$tglProjectOrder=explode(' ',$dataProjectOrder->tanggal_projek_order);
	//$tglAkhir=explode(' ',$dataProjectOrder->durasi_kontrak_akhir);
	//$tglAwal=explode(' ',$dataProjectOrder->durasi_kontrak_awal);
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
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <h2 class="tittle-box text-center m-t-30">PROJECT ORDER </h2>
            <div class="body">
            	<form>
                    <!--
            		<div class="row">
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Nomor Dokumen :</label>
			                    <input type="text" class="form-control" name="nomor_dokumen" readonly placeholder="Nomor Dokumen" value="<?php //echo $dataProjectOrder->nomor_dokumen ?>">
			                </div>
		                </div>
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Terbit :</label>
			                    <input type="date" class="form-control" name="tanggal_terbit" readonly placeholder="Tanggal Terbit" value="<?php //echo $tglTerbit[0] ?>">
			                </div>  
		              	</div>
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Revisi :</label>
			                    <input type="text" class="form-control" name="revisi" readonly placeholder="Revisi" value="<?php //echo $dataProjectOrder->revisi ?>">
			                </div>  
		              	</div>
		              	<div class="col-md-3">
			                <div class="form-group">
			                     <label>Halaman :</label>
			                    <input type="text" class="form-control" name="halaman" readonly placeholder="Halaman" value="<?php //echo $dataProjectOrder->halaman ?>">
			                </div>  
		              	</div>
		            </div>
                    -->
                    <?php if(($dataProjectOrder->id_projek_order_revisi!=0) || ($dataProjectOrder->id_projek_order_perpanjangan!=0)){ ?> 
                    <div class="row">
		                <div class="col-md-6">
			                <div class="form-group">
			                    <label>Nama Pemeriksa :</label>
			                    <input type="text" class="form-control " data-id="datepicker2" required placeholder="" readonly value="<?php echo $dataProjectOrder->nama_lengkap ?>" >
			                </div>
		                </div>
		                 <div class="col-md-6">
			                <div class="form-group">
			                    <label><?php echo $dataProjectOrder->id_projek_order_revisi!=0?'Tanggal Adendum/Revisi':'Tanggal Perpanjangan'; ?> :</label>
			                    <input type="text" class="form-control " placeholder="" readonly value="<?php echo $tanggalperubahan ?>" >
			                   
			                </div>  
		              	</div>
		            </div>
                    <?php } ?>
            		<div class="row">
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>No. Surat Kontrak :</label>
			                    <input type="text" class="form-control" name="no_surat_kontrak" readonly placeholder="No. Surat Kontrak" value="<?php echo $dataProjectOrder->no_surat_kontrak ?>" readonly> 
			                </div>
		                </div>
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Kontrak :</label>
			                    <input type="text" class="form-control" name="tgl_kontrak" readonly placeholder="Tanggal Kontrak" value="<?php echo $tglKontrak ?>" readonly>
			                </div>  
		              	</div>
		                <div class="col-md-3">
			                <div class="form-group">
			                    <label>Nomor Project Order :</label>
			                    <input type="text" class="form-control" name="no_project_order" readonly placeholder="Nomor Project Order" value="<?php echo $dataProjectOrder->no_projek_order ?>" readonly>
			                </div>  
		              	</div>
		              	<div class="col-md-3">
			                <div class="form-group">
			                    <label>Tanggal Project Order :</label>
			                    <input type="text" class="form-control" name="tanggal_projek_order" readonly placeholder="Tanggal Project Order" value="<?php echo $tglProjectOrder ?>" readonly>
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
	                    <h2>M A R K E T I N G </h2>
	                    <section>
				            <div class="form-group">
				              <label>Nama Pekerjaan :</label>
				              <textarea class="form-control" name="nama_pekerjaan" placeholder="Nama Pekerjaan" readonly><?php echo $dataProjectOrder->nama_pekerjaan ?></textarea>
				            </div>

				            <div class="form-group">
				              <label>Nama Perusahaan :</label>
				              <!-- <input type="text" class="form-control" readonly=""> -->
				              <!-- 	<select name="id_master_perusahaan" class="form-control" id="mySelect" onchange="myFunction(this.value)">
				              		<option disabled selected="">Nama Perusahaan</option>
				              		<?// foreach ($dataPerusahaan->result() as $perusahaan) { ?>	
				              			<option  value="<?php //echo $perusahaan->id_master_perusahaan ?>" <?php// echo $dataProjectOrder->id_master_perusahaan==$perusahaan->id_master_perusahaan?'selected':''; ?>><?php// echo $perusahaan->nama_perusahaan ?></option>
				          			<?php// } ?>
				          		</select> -->
				          		<input type="text" class="form-control" readonly="" id="kota" name="kota" value="<?php echo $dataProjectOrder->nama_perusahaan ?>">
				            </div>
				            <div class="form-group">
				              <label>Nama Lokasi :</label>
					            <ol>
					              <?php foreach ($dataLokasiC->result() as $dt) { ?>
					              	<li><?php echo $dt->desKabupaten; ?></li>
					              <?php } ?>
					          	</ol>
				            </div>
				            <div class="form-group">
				                <label>Alamat Perusahaan :</label>
				                <textarea class="form-control" rows="5" cols="30" id="alamat" readonly><?php echo $dataPerusahaanSelected->alamat; ?></textarea>
				            </div>
				           <!--  <div class="form-group">
				              <label>Kota :</label>
				              <input type="text" class="form-control" readonly="" id="kota" name="kota" value="<?php //echo $dataPerusahaanSelected->kota; ?>">
				            </div> -->

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
				                <label>Jenis Project :</label>
				                <br>
                                <?php foreach ($dataJenisProjek->result() as $projek){ 
                                if(in_array($projek->id_departemen, $jenisProjek) ){ ?>
                                	<li><?php echo  $projek->nama_departemen; ?></li>
				                	<!-- <label class="fancy-checkbox">
				                    <input type="checkbox" name="jenis_projek[]" value="<?php //echo $projek->id_master_jenis_project ?>" readonly <?php //echo in_array($projek->id_master_jenis_project, $jenisProjek)?'checked':""; ?>>
				                    <span> <?php// echo $projek->jenis_project ?></span>
				                </label> -->
				                <?php } } ?>
				                <p id="error-checkbox"></p>
				            </div>
				            <div class="form-group">
				              <label>Contact person :</label>
				              <input type="text" class="form-control" name="contact_person_marketing" readonly value="<?php echo $dataProjectOrder->contact_person ?>" readonly>
				            </div>
				            <div class=" col-6 col-md-12">
	                            <label>Durasi Kontrak</label>                                    
	                            <div class="input-daterange input-group" data-provide="datepicker">
	                                <input type="text" class="input-sm form-control" name="durasi_kontrak_awal" value="<?php echo $tglAwal ?>" readonly id="">
	                                <span class="input-group-addon text-center" style="width: 100px;padding-top: 8px">s/d</span>
	                                <input type="text" class="input-sm form-control" name="durasi_kontrak_akhir" value="<?php echo $tglAkhir ?>" readonly id="">
	                            </div>
	                        </div>
	                        <br>
	                        <div class="row">
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Nilai Kontrak Per Bulan :</label>
					                    <input type="text" class="form-control" name="nilai_kontrak_bulan" readonly placeholder="Rp." value="Rp. <?php echo  number_format($dataProjectOrder->nilai_kontrak_bulan,0,'.','.') ?>" readonly>
					                </div>
				                </div>
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Ppn :</label>
					                    <input type="text" class="form-control" name="ppn" readonly placeholder="Rp." value="Rp. <?php echo number_format($dataProjectOrder->ppn,0,'.','.') ?>" readonly>
					                </div>  
				              	</div>
				                <div class="col-md-4">
					                <div class="form-group">
					                    <label>Pph :</label>
					                    <input type="text" class="form-control" name="pph" readonly placeholder="Rp."  value="<?php echo number_format($dataProjectOrder->pph,0,'.','.')  ?>" readonly>
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
                                    <input type="text" class="form-control" name="cara_penagihan" value="<?php if($dataProjectOrder->cara_penagihan=='1'){
                                    	echo "Fluktuatif (ada lembur)";
                                    }else if($dataProjectOrder->cara_penagihan=='2'){
                                    	echo "Langsung Tagih";
                                    }else if($dataProjectOrder->cara_penagihan=='3'){
                                    	echo "Sesuai Nilai Kontrak";
                                    } ?>" readonly>
                                </label>
                            </div>
				            <div class="form-group">
				              <label>Penagihan ditujukan kepada :</label>
				              <input type="text" class="form-control" readonly name="penagihan_kepada" value="<?php echo $dataProjectOrder->nama_perusahaan ?>" read>
				            </div>
				            <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Contact Person :</label>
				                    <input type="text" class="form-control" readonly name="contact_person_keuangan" value="<?php echo $dataProjectOrder->cp_keuangan ?>">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" readonly name="no_telepon_keuangan" value="<?php echo $dataProjectOrder->nt_keuangan ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Tanggal Penagihan :</label>
				               		<div class="row">
				               			<div class="col-3 col-md-2">
				               				<input type="number" class="form-control" readonly name="tgl_penagihan" value="<?php echo $dataProjectOrder->tanggal_penagihan ?>">
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
				               				<input type="number" class="form-control" readonly name="jatuh_tempo" placeholder="Hari" value="<?php echo $dataProjectOrder->jatuh_tempo ?>">
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
                                    <input type="text" class="form-control" name="lembur_keuangan" value=" <?php echo  $dataProjectOrder->lembur_keuangan=='1'?'Ada':'Tidak Ada'; ?>" readonly>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="fancy-radio">
                                    <input type="text" name="lembur_manajemen" class="form-control" readonly value="<?php echo $dataProjectOrder->lembur_manajemen=='1'?'Dikenakan Fee Manajemen':'Tanpa Fee Manajemen'; ?>">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Pemberian lembur setiap tanggal :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="text" class="form-control col-md-2" name="pemberian_lembur_tiap_tanggal" value="<?php echo  $dataProjectOrder->pemberian_lembur_tiap_tanggal ?>" readonly>
                                </label>
                            </div>
				            <div class="form-group">
                                <label>Penggajian setiap tanggal :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="text" class="form-control col-md-2" name="penggajian_tiap_tanggal" value="<?php echo  $dataProjectOrder->penggajian_tiap_tanggal ?>" readonly>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>THR ditagihkan :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="text" class="form-control" name="thr_ditagihkan_keuangan" value="<?php echo  $dataProjectOrder->thr_ditagihkan=='1'?'Setiap Bulan':'Hari Sebelum Hari Raya' ?>" readonly>
                                </label>
                                
                            </div>
                            <div class="form-group">
                            	<label class="fancy-radio">
                                    <input type="text" class="form-control " name="thr_ditagihkan_manajemen" value="<?php echo  $dataProjectOrder->thr_ditagihkan_manajemen=='1'?'Dikenakan Fee Manajemen':'Tanpa Fee Manajemen' ?>" readonly>
                                </label>
                            </div>
				            <!-- <div class="form-group">
				              <label>Kelengkapan data penagihan (ditulis secara lengkap) :</label>
				             	<div class=" col-md-12">
	                                <select class="form-control select2" multiple  name="data_penagihan">
	                                <?php //foreach ($dataPenagihan->result() as $penagihan){ ?>
	                                    <option <?php //echo  in_array($penagihan->id_master_penagihan, $datapenagihan)?'selected':''; ?> value="<?php //echo $penagihan->id_master_penagihan ?>"><?php //echo $penagihan->nama_penagihan ?></option>
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
				                    <input type="text" class="form-control" readonly name="contact_person_sdm" placeholder="Nama" value="<?php echo $dataProjectOrder->cp_sdm ?>">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" readonly name="no_telepon_sdm" placeholder="No Telp." value="<?php echo $dataProjectOrder->nt_sdm ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Jumlah Personil (isi angka/jumlah) : 
				            	</label>
				               		<div class="row">
				               			<div class="col-12 col-md-2">
				               				<label>Orang</label>
				               				<input type="number" class="form-control" readonly name="" placeholder="" value="<?php echo ($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan) ?>">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>laki-laki</label>
				               				<input type="number" class="form-control" readonly name="personil_laki" placeholder="" value="<?php echo $dataProjectOrder->personil_laki ?>">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Perempuan</label>
				               				<input type="number" class="form-control" readonly name="personil_perempuan" placeholder="" value="<?php echo $dataProjectOrder->personil_perempuan ?>">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Korlap</label>
				               				<input type="number" class="form-control" readonly name="personil_korlap" placeholder="" value="<?php echo $dataProjectOrder->personil_korlap ?>">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<label>Anggota</label>
				               				<input type="number" class="form-control" readonly name="personil_anggota" placeholder="" value="<?php echo ($dataProjectOrder->personil_laki+$dataProjectOrder->personil_perempuan)-$dataProjectOrder->personil_korlap ?>">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				              <label>Jumlah Lokasi :</label>
				              <div class="row">
				              	<div class="col-md-2 col-2">
				              		 <input type="number" class="form-control" name="jumlah_lokasi" readonly value="<?php echo $dataProjectOrder->jumlah_lokasi ?>">
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
				                    <input type="text" class="form-control" readonly name="jumlah_penggajian" placeholder="Rp.UMK" value="<?php echo $dataProjectOrder->jumlah_penggajian!='UMK'?'Rp.'.number_format($dataProjectOrder->jumlah_penggajian,0,'.','.'):$dataProjectOrder->jumlah_penggajian ?>">
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Tunjangan :</label>
				                    <input type="text" class="form-control" readonly name="tunjangan" placeholder="Koofisien x UMK" value="Rp. <?php //echo number_format($dataProjectOrder->tunjangan,0,'.','.') ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				            	<label>Fasilitas BPJS dari Perusahaan :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Tenaga Kerja</label>
				               				<input type="number" class="form-control" readonly name="fasilitas_bpjs_tenaga_kerja" placeholder="%" value="<?php echo $dataProjectOrder->fasilitas_bpjs_tenaga_kerja;?>">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Kesehatan</label>
				               				<input type="number" class="form-control" readonly name="fasilitas_bpjs_kesehatan" placeholder="%" value="<?php echo $dataProjectOrder->fasilitas_bpjs_kesehatan ?>"> 
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Pensiun</label>
				               				<input type="number" class="form-control" readonly name="fasilitas_bpjs_pensiun" placeholder="%" value="<?php echo $dataProjectOrder->fasilitas_bpjs_pensiun ?>">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Potongan BPJS Tenaga Kerja :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Tenaga Kerja</label>
				               				<input type="number" class="form-control" readonly name="potongan_bpjs_tenaga_kerja" placeholder="%" value="<?php echo $dataProjectOrder->potongan_bpjs_tenaga_kerja ?>">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Kesehatan</label>
				               				<input type="number" class="form-control" readonly name="potongan_bpjs_kesehatan" placeholder="%" value="<?php echo $dataProjectOrder->potongan_bpjs_kesehatan ?>">
				               			</div>
				               			<div class="col-12 col-md-3">
				               				<label>BPJS Pensiun</label>
				               				<input type="number" class="form-control" readonly name="potongan_bpjs_pensiun" placeholder="%" value="<?php echo $dataProjectOrder->potongan_bpjs_pensiun ?>">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Fasilitas THR :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-3">
				               				<input type="text" class="form-control" readonly name="thr" placeholder="Rp." value="<?php echo $dataProjectOrder->thr ?>">
				               			</div>
				               			<div class="col-6 col-md-9">
				               				<div class="form-group">
				                                <label>Ditagihkan :</label>
				                                <label class="fancy-radio">
				                                    <input type="text" class="form-control" name="thr_ditagihkan_sdm" value="<?php echo $dataProjectOrder->thr_ditagihkan=='1'?'Bulanan':'Saat Hari Raya' ?>" readonly >
				                                </label>
				                            </div>
								        </div>
				               		</div>
				            </div>
				            <div class="form-group">
				            	<label>Fasilitas Seragam :</label>
				               		<div class="row">
				               			<div class="col-12 col-md-2">
				               				<input type="number" class="form-control" readonly name="fasilitas_seragam_pcs" placeholder="Stel" value="<?php echo $dataProjectOrder->fasilitas_seragam_pcs ?>">
				               			</div>
				               			<div class="col-12 col-md-2">
				               				<input type="number" class="form-control" readonly name="fasilitas_seragam_stel" placeholder="Pcs" value="<?php echo $dataProjectOrder->fasilitas_seragam_stel ?>">
				               			</div>
				               			<div class="col-6 col-md-2">
				               				<label>* Spesifikasi :</label>
				               			</div>
				               			<div class="col-12 col-md-6">
				               				<input type="text" class="form-control" readonly name="fasilitas_seragam_spesifikasi" placeholder="SPESIFIKASI " value="<?php echo $dataProjectOrder->fasilitas_seragam_spesifikasi ?>">
				               			</div>
				               		</div>
				            </div>
				            <div class="form-group">
				                <label>Fasilitas Lain-lain   :</label>
				                <br>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" value="1" readonly="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" <?php echo in_array('1', $fasilitaslain)?'checked':""; ?>>
				                    <span> ID Card </span>
				                </label>
				                <label class="fancy-checkbox">
				                    <input type="checkbox" name="fasilitas_lain[]" value="2" readonly="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox" <?php echo in_array('2', $fasilitaslain)?'checked':""; ?>>
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
                                    <input type="text" readonly class="form-control" value="<?php echo $dataProjectOrder->lembur_sdm=='1'?'Ada':'Tidak' ?>" >
                                </label>
                            </div>
                            <div class="form-group">
                            	<label class="fancy-radio">
                                    <input type="text" readonly class="form-control" value="<?php echo $dataProjectOrder->lembur_sesuai=='1'?'Hitung Sesuai Pemerintah':'Perhitungan Klien' ?>" >
                                </label>
                            </div>
				            <div class="form-group">
                                <label>Kontrak Kerja Personil :</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="text" readonly class="form-control" value="<?php if($dataProjectOrder->kontrak_kerja_personel=='1'){
                                    	echo "PKS";
                                    }else if($dataProjectOrder->kontrak_kerja_personel=='2'){
                                    	echo "PKS";
                                    }else if($dataProjectOrder->kontrak_kerja_personel=='3'){
                                    	echo "PKWTT";
                                    }?>" >
                                </label>
                            </div>
	                    </section>
	                    <h2>P E N G A D A A N </h2>
	                    <section>
	                        <div class="row">
				              <div class="col-md-6">
				                <div class="form-group">
				                    <label>Contact Person :</label>
				                    <input type="text" class="form-control" readonly name="contact_person_pengadaan" placeholder="Nama" value="<?php echo $dataProjectOrder->cp_pengadaan ?>">
				                </div>
				              </div>
				              <div class="col-md-6"> 
				                <div class="form-group">
				                    <label>No Telp :</label>
				                    <input type="text" class="form-control" readonly name="no_telepon_pengadaan" placeholder="No Telp." value="<?php echo $dataProjectOrder->nt_pengadaan ?>">
				                </div>  
				              </div>
				            </div>
				            <div class="form-group">
				              <label>Jumlah peralatan Security  :</label>
				              <input type="text" class="form-control" readonly name="jumlah_peralatan_security" placeholder="Rp." value="Rp. <?php echo number_format($dataProjectOrder->jumlah_peralatan_security,0,'.','.') ?>">
				            </div>
				            <div class="form-group">
				              <label>Jumlah chemical + equipment (terlampir) :</label>
				              <input type="text" class="form-control" readonly name="jumlah_chemical_equipment" placeholder="Rp." value="Rp. <?php echo number_format($dataProjectOrder->jumlah_chemical_equipment,0,'.','.') ?>">
				            </div>
				            <div class="form-group">
				              <label>Permintaan Khusus  :</label>
				              <input type="text" class="form-control" readonly name="permintaan_khusus" placeholder="Permintaan Khusus" value="<?php echo $dataProjectOrder->permintaan_khusus ?>">
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