<!doctype html>
<html lang="en">
<?php $this->load->view('template/head.php') ?>
<body class="theme-orange" >
    <div class="container">
        <div class="row m-t-30">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Home/tambahpelamar">
                        <div class="container p-15">
                            <input type="hidden" name="id_loker" value="<?php echo $this->input->post('id_loker'); ?>">

                                <div class="row m-t-30 angka2">
			                        <div class="col-md-3 col-2" align="center">
			                            <img src="<?php echo base_url() ?>assets/img/penatalogo.png" width="70%">
			                        </div>
			                        <div class="col-md-6 col-6 angka3">
			                            
			                        </div>
			                        <div class="col-md-3 col-4 " align="center">
			                            <a href="<?php echo base_url() ?>home" >
			                                <p class="fz-14 biru"><i class="fa fa-chevron-left biru"></i> &nbsp;Kembali ke Beranda</p>
			                            </a>
			                        </div>
			                    </div>

                                <div class="row angka3">
                                    <div class="col-md-4 col-12">
                                        <label class="fz-16-tebal">Anda melamar ke PT. Growinc sebagai</label>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-lg-12" align="center">
                                        <img src="<?php //echo base_url() ?>assets/img/recruitment/<?php //echo $dataloker->imageJabatan!=""?$dataloker->imageJabatan:"user.png" ?>" alt="" height="50px">
                                    </div>
                                </div> -->

                                <div class="row angka3">
                                    <div class="col-md-6 col-12">
                                        <label class="fz-36"><?php echo $dataloker->jenis_project ?></label><br>
                                        <p class="fz-16-aplicant">Silahkan lengkapi Data Lamaran Anda</p>
                                    </div>

                                    <div class="col-md-6 col-12" align="right">
                                    	<button type="submit" class="btn Rectangle-cari col-4">Kirim Lamaran</button>
                                    </div>
                                </div>
                                <!-- <div class="row pt-15">
                                    <div class="col-lg-12 " align="center">
                                           <label >Lengkapi Data Lamaran Anda</label>
                                    </div>
                                </div> -->
                                <input type="hidden" name="tanggal" value="<?php echo  date('Y-m-d'); ?>">
                                <!-- Nama Lengkap & Telepon -->
                                <div class="row angka3">
				                    <div class="col-md-2 col-12" >
				                        <p class="float-left hidden-sm fz-14-judul m-t-20">Nama Lengkap* </p>
				                        <p class="d-sm-none fz-14-judul">Nama Lengkap* </p>
				                    </div>
				                    <div class="col-md-4 col-12">
				                        <input type="text" class="form-control fcheight" name="nama_lengkap" required>
				                    </div>

				                    <div class="col-md-2 col-12" >
				                        <p class="float-left hidden-sm fz-14-judul m-t-20">No.Telepon* </p>
				                        <p class="d-sm-none fz-14-judul">No.Telepon* </p>
				                    </div>
				                    <div class="col-md-4 col-12">
				                    	<input type="text" class="form-control fcheight" name="telp" required onkeypress="return hanyaAngka(event)">
				                    </div>
				                </div>

				                <!-- Email & Alamat-->
				                <div class="row angka3">
				                    <div class="col-md-2 col-12" >
				                        <p class="float-left hidden-sm fz-14-judul m-t-20">Email* </p>
				                        <p class="d-sm-none fz-14-judul">Email* </p>
				                    </div>
				                    <div class="col-md-4 col-12">
				                        <input type="email" class="form-control fcheight" name="email" required>
				                    </div>

				                    <div class="col-md-2 col-12" >
				                        <p class="float-left hidden-sm fz-14-judul m-t-20">Alamat* </p>
				                        <p class="d-sm-none fz-14-judul">Alamat* </p>
				                    </div>
				                    <div class="col-md-4 col-12">
				                        <input type="text" class="form-control fcheight" name="alamat" required>
				                    </div>
				                </div>
				                <!-- Lampirkan CV*(file pdf) -->
				                <div class="row angka3">
				                    <div class="col-md-2 col-12" >
				                        <p class="float-left hidden-sm fz-14-judul m-t-20">Lampirkan CV*(file pdf) </p>
				                        <p class="d-sm-none fz-14-judul">Lampirkan CV*(file pdf) </p>
				                    </div>
				                    <div class="col-md-4 col-12">
				                        <input type="file" name="file_cv" id="dropify-event" data-allowed-file-extensions="pdf" required>
				                    </div>
				                </div>

                                <!-- <div class="row pt-15">
                                    <div class="col-12 col-md-6" align="center">
                                        <input type="text" class="form-control fcheight" name="nama_lengkap" placeholder="Nama lengkap*" required>
                                    </div>
                                    <div class="col-12 col-md-6" align="center">
                                        <input type="text" class="form-control fcheight" name="telp" placeholder="No Telepon*" required onkeypress="return hanyaAngka(event)">
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                    <div class="col-12 col-md-6" align="center">
                                        <input type="email" class="form-control fcheight" name="email" placeholder="Email*" required>
                                    </div>
                                    <div class="col-12 col-md-6" align="center">
                                        <input type="text" class="form-control fcheight" name="alamat" placeholder="Alamat*" required>
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                    <div class="col-12 col-md-6" align="left">
                                        <br>
                                        <label>Background Pendidikan*</label>
                                        <p>Apakah Anda memasukan pendidikan terakhir di CV Anda?</p>
                                        <input type="radio" name="a"> Ya <br>
                                        <input type="radio" name="b"> Tidak
                                    </div>
                                    <div class="col-12 col-md-6" align="left">
                                        <br>
                                         <label>Pengalaman Kerja*</label>
                                        <p>Apakah Anda memasukan pengalaman kerja di CV Anda?</p>
                                        <input type="radio" name="a"> Ya <br>
                                        <input type="radio" name="b"> Tidak
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 col-md-6" align="left">
                                        <br>
                                        <label>Pendidikan Non-formal*</label>
                                        <p>Apakah Anda pernah mengikuti kursus/training?</p>
                                        <input type="radio" name="a"> Ya <br>
                                        <input type="radio" name="b"> Tidak
                                    </div>
                                    <div class="col-12 col-md-6" align="left">
                                        <br>
                                         <label>Foto*</label>
                                        <p>Apakah Anda melampirkan foto di CV Anda?</p>
                                        <input type="radio" name="a"> Ya <br>
                                        <input type="radio" name="b"> Tidak
                                    </div>
                                </div>-->

                                <!-- <div class="row m-t-20">
                                    <div class="col-12 col-md-12" align="center">
                                        <label>Lampirkan CV*(file pdf)</label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-3" align="center">
                                    </div>
                                    <div class="col-12 col-md-6" align="center">
                                        <input type="file" name="file_cv" id="dropify-event" data-allowed-file-extensions="pdf" required>
                                    </div>
                                    <div class="col-md-3" align="center">
                                    </div>
                                </div> --> 
                                <!-- <div class="row m-t-20">
                                    <div class="col-12 col-md-12" align="center">
                                        <button type="submit" class="btn Rectangle-cari col-4">Kirim</button>
                                    </div>
                                </div> -->
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</body>
<?php $this->load->view('template/footer.php') ?>
</html>
