<!-- <div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
             <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Directory / Pegawai</h6>
        </div>
    </div>
</div> -->
            
 <div class="row clearfix">
     <div class="col-lg-12 col-md-12">
        
        <div class="row">
            <div class="col-md-12">
                <div class="Rectangle-35">
                    <div class="container padd-top-20">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="fz-14 putih">NIK</p>
                            </div>
                            <div class="col-md-3">
                                <p class="fz-14 abuputih"><?php echo $dataKaryawannya->nik; ?></p>
                            </div>
                            <div class="col-md-3">
                                <p class="fz-14 putih">Unit Bisnis</p>
                            </div>
                            <div class="col-md-3">
                                <p class="fz-14 abuputih"><?php echo $dataKaryawannya->nama_perusahaan; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p class="fz-14 putih">Departemen</p>
                            </div>
                            <div class="col-md-3">
                                <p class="fz-14 abuputih"><?php echo $dataKaryawannya->desDepartemen; ?></p>
                            </div>
                            <div class="col-md-3" id="rowjabatan">
                                <p class="fz-14 putih">Jabatan</p>
                            </div>
                            <div class="col-md-3">
                                <?php 
                                    if($dataKaryawannyanumb==""){
                                        echo "<p class='fz-14 putih'>-</p>";
                                    }else{
                                        echo "<p class='fz-14 abuputih'>".$dataKaryawannya->jenis_project."</p>";
                                    }
                                ?> 
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
                    
                    
                    
                    
        <div id="wizard_horizontal">
            <h2>Informasi Pegawai</h2>
            <section>
                <?php $this->load->view("hr/view-hr-pegawai-info"); ?>
            </section>
            
            <h2>Informasi Kontak</h2>
            <section>
                <?php $this->load->view("hr/view-hr-pegawai-kontak"); ?>
            </section>
            
            <h2>Informasi Kontrak</h2>
            <section>
                <?php $this->load->view("hr/view-hr-pegawai-kontrak"); ?>
            </section>
            
            <h2>Informasi Penggajian</h2>
            <section>
                <?php $this->load->view("hr/view-hr-pegawai-gaji"); ?>
            </section>
        </div>

    </div> 
</div>