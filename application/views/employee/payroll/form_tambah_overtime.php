
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Payroll / Overtime / Form Tambah</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Form Tambah</h6>
                            <form method="post" class="form-tambah-overtime">
                                <input type="hidden" name="nik" class="form-control" value="<?php echo $this->session->userdata('nik'); ?>">
                                <input type="hidden" name="status" class="form-control" value="0" >
                                <div class="row">
                                    <div class="col-lg-3" >
                                        <label class="color-text-gray">Title </label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="title" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3" >
                                        <label class="color-text-gray">Date </label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="date" name="tanggal" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3" >
                                        <label class="color-text-gray">Lama Jam Lebur </label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" min="1" max="24" name="jumlah_jam_lembur" class="form-control" required="">
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-lg-3" >
                                        <label class="color-text-gray">Tujuan Lembur (Task)</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="5" name="keterangan"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary tombol-simpan-overtime">Ajukan</button>
                                        <a href="<?php echo base_url()?>Employee/overtime"><button type="button" class="btn btn-danger">Batal</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("employee/payroll/proses_overtime") ;?>